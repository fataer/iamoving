<?php
namespace App\Http\Controllers\iamovingtospain;
use App\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Document\WorkbookProtection; // <-- Namespace correcto
use Symfony\Component\HttpFoundation\StreamedResponse;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Cell\DataType; // Solo si usas DataType::TYPE_STRING

class EmailController extends Controller
{

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'email' => 'required|email|max:255',
                'nombre' => 'nullable|max:255',
                'utm_source' => 'nullable|max:255',
                'utm_ad' => 'nullable|max:255',
                'utm_placement' => 'nullable|max:255'
            ]);

            // Crear registro inicial en la base de datos
            $email = new Email();
            $email->email = $request->email;
            $email->nombre = $request->nombre;
            $email->utm_source = $request->utm_source;
            $email->utm_ad = $request->utm_ad;
            $email->utm_placement = $request->utm_placement;
            $email->save();

            Log::info('Email registrado:', $email->toArray());       

            // Loggear en el archivo específico
            \Log::channel('emails')->info('Nuevo email capturado: ' . $request->email);

            // Enviar a Klaviyo y obtener el perfil
            $profileInfo = $this->sendToKlaviyo($request->email, $request->nombre);
            
            // Si obtuvimos información del perfil, actualizar el nombre en la base de datos
            if ($profileInfo && isset($profileInfo['nombre'])) {
                $email->nombre = $profileInfo['nombre'];
                $email->save();
                
                \Log::info('Nombre actualizado desde Klaviyo:', [
                    'email' => $request->email,
                    'nombre' => $profileInfo['nombre']
                ]);
            }

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            // Loggear error en el log general
            \Log::error('Error guardando email: ' . $e->getMessage(), [
                'exception' => $e
            ]);

            return response()->json(['success' => false], 500);
        }
    }

    private function getFullNameFromProfile($attributes)
    {
        $firstName = $attributes['first_name'] ?? '';
        $lastName = $attributes['last_name'] ?? '';
        
        // Si tenemos ambos nombres, los combinamos
        if ($firstName && $lastName) {
            return trim($firstName . ' ' . $lastName);
        }
        
        // Si solo tenemos uno de los dos, o ninguno
        return trim($firstName . $lastName);
    }

    private function sendToKlaviyo($email, $nombre = null)
    {
        // Configura las credenciales de Klaviyo
        $klaviyoApiKey = config('services.klaviyo.api_key');
        $listId = 'VrZbqa'; // ID específico de la lista
    
        if (!$klaviyoApiKey) {
            throw new \Exception("Klaviyo API Key not configured.");
        }
    
        $client = new Client();
        $profileEndpoint = "https://a.klaviyo.com/api/profiles/";
        $profileInfo = [];
        
        try {
            // Dividir el nombre en first_name y last_name si está disponible
            $nameParts = $nombre ? explode(' ', trim($nombre), 2) : [];
            $firstName = $nameParts[0] ?? null;
            $lastName = $nameParts[1] ?? null;

            // Crear el perfil primero
            $profileResponse = $client->post($profileEndpoint, [
                'headers' => [
                    'Authorization' => 'Klaviyo-API-Key ' . $klaviyoApiKey,
                    'Content-Type' => 'application/json',
                    'revision' => '2023-09-15'
                ],
                'json' => [
                    'data' => [
                        'type' => 'profile',
                        'attributes' => array_filter([
                            'email' => $email,
                            'first_name' => $firstName,
                            'last_name' => $lastName
                        ])
                    ]
                ]
            ]);

            $profileData = json_decode($profileResponse->getBody(), true);
            $profileId = $profileData['data']['id'];
            
            // Obtener la información completa del perfil
            $getProfileResponse = $client->get($profileEndpoint . $profileId, [
                'headers' => [
                    'Authorization' => 'Klaviyo-API-Key ' . $klaviyoApiKey,
                    'revision' => '2023-09-15'
                ]
            ]);
            
            $fullProfileData = json_decode($getProfileResponse->getBody(), true);
            
            // Extraer el nombre completo del perfil
            if (isset($fullProfileData['data']['attributes'])) {
                $attributes = $fullProfileData['data']['attributes'];
                $profileInfo['nombre'] = $this->getFullNameFromProfile($attributes);
            }

            // Añadir el perfil a la lista
            $listEndpoint = "https://a.klaviyo.com/api/lists/{$listId}/relationships/profiles/";
            
            $response = $client->post($listEndpoint, [
                'headers' => [
                    'Authorization' => 'Klaviyo-API-Key ' . $klaviyoApiKey,
                    'Content-Type' => 'application/json',
                    'revision' => '2023-09-15'
                ],
                'json' => [
                    'data' => [
                        [
                            'type' => 'profile',
                            'id' => $profileId
                        ]
                    ]
                ]
            ]);

            if ($response->getStatusCode() === 204) {
                \Log::info('Subscriber successfully added to Klaviyo list', ['email' => $email]);
            }

        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $responseBody = json_decode($e->getResponse()->getBody()->getContents(), true);
            
            // Si el perfil ya existe, intentar obtener su información y añadirlo a la lista
            if (isset($responseBody['errors']) && $responseBody['errors'][0]['code'] === 'duplicate_profile') {
                try {
                    $profileId = $responseBody['errors'][0]['meta']['duplicate_profile_id'];
                    
                    // Obtener la información del perfil existente
                    $getProfileResponse = $client->get($profileEndpoint . $profileId, [
                        'headers' => [
                            'Authorization' => 'Klaviyo-API-Key ' . $klaviyoApiKey,
                            'revision' => '2023-09-15'
                        ]
                    ]);
                    
                    $fullProfileData = json_decode($getProfileResponse->getBody(), true);
                    
                    // Extraer el nombre completo del perfil
                    if (isset($fullProfileData['data']['attributes'])) {
                        $attributes = $fullProfileData['data']['attributes'];
                        $profileInfo['nombre'] = $this->getFullNameFromProfile($attributes);
                    }
                    
                    // Intentar añadir el perfil existente a la lista
                    $listEndpoint = "https://a.klaviyo.com/api/lists/{$listId}/relationships/profiles/";
                    
                    $response = $client->post($listEndpoint, [
                        'headers' => [
                            'Authorization' => 'Klaviyo-API-Key ' . $klaviyoApiKey,
                            'Content-Type' => 'application/json',
                            'revision' => '2023-09-15'
                        ],
                        'json' => [
                            'data' => [
                                [
                                    'type' => 'profile',
                                    'id' => $profileId
                                ]
                            ]
                        ]
                    ]);

                    if ($response->getStatusCode() === 204) {
                        \Log::info('Existing subscriber added to Klaviyo list', ['email' => $email]);
                    }
                } catch (\Exception $innerException) {
                    \Log::error('Error adding existing profile to list', [
                        'error' => $innerException->getMessage(),
                        'email' => $email
                    ]);
                }
            } else {
                \Log::error('Klaviyo API Error', [
                    'errors' => $responseBody['errors'] ?? 'Unknown error',
                    'email' => $email
                ]);
                
                throw new \Exception("Error adding subscriber to Klaviyo list: " . json_encode($responseBody));
            }
        }
        
        return $profileInfo;
    }
    
    // Función para suscribir a la lista (separa la lógica de suscripción)
    public function exportToExcel(): JsonResponse
    {
        try {
            // Verificar si hay registros y loguear el resultado
            $emails = Email::all();
            $emailCount = $emails->count();
            
            \Log::info('Iniciando exportación de Excel', [
                'total_registros' => $emailCount
            ]);

            if ($emailCount === 0) {
                \Log::warning('No se encontraron registros para exportar');
                return response()->json([
                    'success' => false,
                    'message' => 'No hay registros para exportar'
                ]);
            }

            // Loguear los primeros registros para verificar la estructura
            \Log::info('Muestra de registros:', [
                'primeros_registros' => $emails->take(2)->toArray()
            ]);

            // Create new Spreadsheet object
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            // Set headers
            $headers = ['ID', 'Fecha', 'Nombre', 'Email', 'UTM_source', 'UTM_ad', 'UTM_placement'];
            foreach ($headers as $columnIndex => $header) {
                $column = chr(65 + $columnIndex);
                $sheet->setCellValue($column . '1', $header);
                $sheet->getStyle($column . '1')->getFont()->setBold(true);
            }

            // Add data rows
            $currentRow = 2;
            foreach ($emails as $email) {
                // Formatear la fecha correctamente
                $fecha = '';
                if (!empty($email->created_at)) {
                    try {
                        // Intentar convertir a objeto Carbon si es string
                       // $fecha = is_string($email->created_at) 
                    //        ? Carbon::parse($email->created_at)->format('Y-m-d H:i:s')
                     //       : $email->created_at->format('Y-m-d H:i:s');
// En el bloque donde formateas la fecha:
$fecha = $email->created_at 
    ? Carbon::parse($email->created_at)->format('Y-m-d H:i:s') 
    : 'Fecha no disponible';                     
                    } catch (\Exception $e) {
                        \Log::warning("Error al formatear fecha para el registro {$email->id_email}: " . $e->getMessage());
                        $fecha = $email->created_at; // Usar el valor original si hay error
                    }
                }

                $sheet->setCellValue('A' . $currentRow, $email->id_email); // Cambiado de id a id_email
                $sheet->setCellValue('B' . $currentRow, $fecha);
                $sheet->setCellValue('C' . $currentRow, $email->nombre ?? '');
                $sheet->setCellValue('D' . $currentRow, $email->email ?? '');
                $sheet->setCellValue('E' . $currentRow, $email->utm_source ?? '');
                $sheet->setCellValue('F' . $currentRow, $email->utm_ad ?? '');
                $sheet->setCellValue('G' . $currentRow, $email->utm_placement ?? '');
                $currentRow++;
            }

            // Auto-size columns
            foreach (range('A', 'G') as $column) {
                $sheet->getColumnDimension($column)->setAutoSize(true);
            }

            // Definir la ruta del archivo
            //$storageBasePath = storage_path('app/public/img');
            //$storageBasePath = public_path('img');
            //$storageBasePath = '/home/u819346592/domains/iamoving.com/public_html/storage/img';
            $storageBasePath = config('paths.custom_storage') . 'img';
            $filename = 'leads.xlsx';
            $fullPath = $storageBasePath . '/' . $filename;

            // Verificar y crear el directorio si no existe
            if (!file_exists($storageBasePath)) {
                if (!mkdir($storageBasePath, 0755, true)) {
                    throw new \Exception("No se pudo crear el directorio {$storageBasePath}");
                }
            }

            // Verificar permisos de escritura
            if (!is_writable($storageBasePath)) {
                throw new \Exception("No hay permisos de escritura en {$storageBasePath}");
            }

            // Crear el writer y guardar el archivo
            $writer = new Xlsx($spreadsheet);
            $writer->save($fullPath);




            // Verificar que el archivo se creó y tiene contenido
            if (!file_exists($fullPath)) {
                throw new \Exception("El archivo no se creó correctamente");
            }

            $fileSize = filesize($fullPath);
            if ($fileSize === 0) {
                throw new \Exception("El archivo se creó pero está vacío");
            }

            \Log::info('Excel generado exitosamente', [
                'ruta' => $fullPath,
                'tamaño' => $fileSize,
                'registros_procesados' => $emailCount
            ]);

            /*return response()->json([
                'success' => true,
                'url' => asset('storage/img/leads.xlsx'),
                'records_processed' => $emailCount,
                'file_size' => $fileSize,
                'storage_path' => $fullPath
            ]);*/
            return response()->json([
                            'Ok' => true
                        ]);
        } catch (\Exception $e) {
            \Log::error('Error al generar Excel: ' . $e->getMessage(), [
                'exception' => $e,
                'trace' => $e->getTraceAsString()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Error al generar Excel: ' . $e->getMessage()
            ], 500);
        }
    }
public function exportAllData(): JsonResponse
{
    try {
        // Create new Spreadsheet object
        $spreadsheet = new Spreadsheet();

        // First Sheet - Emails (similar to existing exportToExcel)
        $emailSheet = $spreadsheet->getActiveSheet();
        $emailSheet->setTitle('email');
        
        $emails = Email::all();
        $emailCount = $emails->count();
        
        \Log::info('Iniciando exportación de Excel - Hoja Emails', [
            'total_registros' => $emailCount
        ]);

        // Set headers for email sheet
        $emailHeaders = ['ID', 'Fecha', 'Nombre', 'Email', 'UTM_source', 'UTM_ad', 'UTM_placement'];
        foreach ($emailHeaders as $columnIndex => $header) {
            $column = chr(65 + $columnIndex);
            $emailSheet->setCellValue($column . '1', $header);
            $emailSheet->getStyle($column . '1')->getFont()->setBold(true);
        }

        // Add data rows for email sheet
        $currentRow = 2;
        foreach ($emails as $email) {
            $fecha = $email->created_at 
                ? Carbon::parse($email->created_at)->format('Y-m-d H:i:s') 
                : 'Fecha no disponible';

            $emailSheet->setCellValue('A' . $currentRow, $email->id_email);
            $emailSheet->setCellValue('B' . $currentRow, $fecha);
            $emailSheet->setCellValue('C' . $currentRow, $email->nombre ?? '');
            $emailSheet->setCellValue('D' . $currentRow, $email->email ?? '');
            $emailSheet->setCellValue('E' . $currentRow, $email->utm_source ?? '');
            $emailSheet->setCellValue('F' . $currentRow, $email->utm_ad ?? '');
            $emailSheet->setCellValue('G' . $currentRow, $email->utm_placement ?? '');
            $currentRow++;
        }

        // Auto-size columns for email sheet
        foreach (range('A', 'G') as $column) {
            $emailSheet->getColumnDimension($column)->setAutoSize(true);
        }

        // Second Sheet - Aterrizajes
        $aterrizajesSheet = $spreadsheet->createSheet();
        $aterrizajesSheet->setTitle('aterrizajes');
        
        $aterrizajes = \DB::table('aterrizajes')->get();
        
        \Log::info('Procesando hoja de Aterrizajes', [
            'total_registros' => $aterrizajes->count()
        ]);

        // Set headers for aterrizajes sheet
        $aterrizajesHeaders = ['ID', 'Fecha', 'UTM_source', 'UTM_ad', 'UTM_placement'];
        foreach ($aterrizajesHeaders as $columnIndex => $header) {
            $column = chr(65 + $columnIndex);
            $aterrizajesSheet->setCellValue($column . '1', $header);
            $aterrizajesSheet->getStyle($column . '1')->getFont()->setBold(true);
        }

        // Add data rows for aterrizajes sheet
        $currentRow = 2;
        foreach ($aterrizajes as $aterrizaje) {
            $fecha = $aterrizaje->created_at 
                ? Carbon::parse($aterrizaje->created_at)->format('Y-m-d H:i:s') 
                : 'Fecha no disponible';

            $aterrizajesSheet->setCellValue('A' . $currentRow, $aterrizaje->id_aterrizaje);
            $aterrizajesSheet->setCellValue('B' . $currentRow, $fecha);
            $aterrizajesSheet->setCellValue('C' . $currentRow, $aterrizaje->utm_source ?? '');
            $aterrizajesSheet->setCellValue('D' . $currentRow, $aterrizaje->utm_ad ?? '');
            $aterrizajesSheet->setCellValue('E' . $currentRow, $aterrizaje->utm_placement ?? '');
            $currentRow++;
        }

        // Auto-size columns for aterrizajes sheet
        foreach (range('A', 'E') as $column) {
            $aterrizajesSheet->getColumnDimension($column)->setAutoSize(true);
        }

        // Third Sheet - Consulta
        $consultaSheet = $spreadsheet->createSheet();
        $consultaSheet->setTitle('consulta');
        
        $consultas = \DB::table('nuevaconsulta')->get();
        
        \Log::info('Procesando hoja de Consultas', [
            'total_registros' => $consultas->count()
        ]);

        // Set headers for consulta sheet
        $consultaHeaders = [
            'ID', 'Fecha', 'nombre', 'apellidos', 'pais', 'otroPais', 'telefono', 'email',
            'mesConsulta', 'estado', 'stripe_session_id', 'stripe_payment_intent',
            'stripe_payment_status', 'stripe_amount_total', 'stripe_currency',
            'stripe_customer', 'stripe_customer_email', 'stripe_customer_name',
            'stripe_payment_method', 'stripe_payment_method_types', 'stripe_captured_amount',
            'stripe_cancel_reason', 'stripe_payment_intent_status', 'stripe_last_payment_error',
            'aceptadas_condiciones', 'error_sincronizacion'
        ];

        foreach ($consultaHeaders as $columnIndex => $header) {
            $column = $this->getColumnLetter($columnIndex);
            $consultaSheet->setCellValue($column . '1', $header);
            $consultaSheet->getStyle($column . '1')->getFont()->setBold(true);
        }

        // Add data rows for consulta sheet
        $currentRow = 2;
        foreach ($consultas as $consulta) {
            $fecha = $consulta->created_at 
                ? Carbon::parse($consulta->created_at)->format('Y-m-d H:i:s') 
                : 'Fecha no disponible';

            $columnIndex = 0;
            $consultaSheet->setCellValue($this->getColumnLetter($columnIndex++) . $currentRow, $consulta->id);
            $consultaSheet->setCellValue($this->getColumnLetter($columnIndex++) . $currentRow, $fecha);
            $consultaSheet->setCellValue($this->getColumnLetter($columnIndex++) . $currentRow, $consulta->nombre ?? '');
            $consultaSheet->setCellValue($this->getColumnLetter($columnIndex++) . $currentRow, $consulta->apellidos ?? '');
            $consultaSheet->setCellValue($this->getColumnLetter($columnIndex++) . $currentRow, $consulta->pais ?? '');
            $consultaSheet->setCellValue($this->getColumnLetter($columnIndex++) . $currentRow, $consulta->otroPais ?? '');
            $consultaSheet->setCellValue($this->getColumnLetter($columnIndex++) . $currentRow, $consulta->telefono ?? '');
            $consultaSheet->setCellValue($this->getColumnLetter($columnIndex++) . $currentRow, $consulta->email ?? '');
            $consultaSheet->setCellValue($this->getColumnLetter($columnIndex++) . $currentRow, $consulta->mesConsulta ?? '');
            $consultaSheet->setCellValue($this->getColumnLetter($columnIndex++) . $currentRow, $consulta->estado ?? '');
            $consultaSheet->setCellValue($this->getColumnLetter($columnIndex++) . $currentRow, $consulta->stripe_session_id ?? '');
            $consultaSheet->setCellValue($this->getColumnLetter($columnIndex++) . $currentRow, $consulta->stripe_payment_intent ?? '');
            $consultaSheet->setCellValue($this->getColumnLetter($columnIndex++) . $currentRow, $consulta->stripe_payment_status ?? '');
            $consultaSheet->setCellValue($this->getColumnLetter($columnIndex++) . $currentRow, $consulta->stripe_amount_total ?? '');
            $consultaSheet->setCellValue($this->getColumnLetter($columnIndex++) . $currentRow, $consulta->stripe_currency ?? '');
            $consultaSheet->setCellValue($this->getColumnLetter($columnIndex++) . $currentRow, $consulta->stripe_customer ?? '');
            $consultaSheet->setCellValue($this->getColumnLetter($columnIndex++) . $currentRow, $consulta->stripe_customer_email ?? '');
            $consultaSheet->setCellValue($this->getColumnLetter($columnIndex++) . $currentRow, $consulta->stripe_customer_name ?? '');
            $consultaSheet->setCellValue($this->getColumnLetter($columnIndex++) . $currentRow, $consulta->stripe_payment_method ?? '');
            $consultaSheet->setCellValue($this->getColumnLetter($columnIndex++) . $currentRow, $consulta->stripe_payment_method_types ?? '');
            $consultaSheet->setCellValue($this->getColumnLetter($columnIndex++) . $currentRow, $consulta->stripe_captured_amount ?? '');
            $consultaSheet->setCellValue($this->getColumnLetter($columnIndex++) . $currentRow, $consulta->stripe_cancel_reason ?? '');
            $consultaSheet->setCellValue($this->getColumnLetter($columnIndex++) . $currentRow, $consulta->stripe_payment_intent_status ?? '');
            $consultaSheet->setCellValue($this->getColumnLetter($columnIndex++) . $currentRow, $consulta->stripe_last_payment_error ?? '');
            $consultaSheet->setCellValue($this->getColumnLetter($columnIndex++) . $currentRow, $consulta->aceptadas_condiciones ?? '');
            $consultaSheet->setCellValue($this->getColumnLetter($columnIndex++) . $currentRow, $consulta->error_sincronizacion ?? '');
            $currentRow++;
        }

        // Auto-size columns for consulta sheet
        for ($i = 0; $i < count($consultaHeaders); $i++) {
            $consultaSheet->getColumnDimension($this->getColumnLetter($i))->setAutoSize(true);
        }

        // Save the file
        //$storageBasePath = '/home/u819346592/domains/iamoving.com/public_html/storage/img';
        $storageBasePath = config('paths.custom_storage') . 'img';
        $filename = 'all_data.xlsx';
        $fullPath = $storageBasePath . '/' . $filename;

        // Verificar y crear el directorio si no existe
        if (!file_exists($storageBasePath)) {
            if (!mkdir($storageBasePath, 0755, true)) {
                throw new \Exception("No se pudo crear el directorio {$storageBasePath}");
            }
        }

        // Verificar permisos de escritura
        if (!is_writable($storageBasePath)) {
            throw new \Exception("No hay permisos de escritura en {$storageBasePath}");
        }

        // Crear el writer y guardar el archivo
        $writer = new Xlsx($spreadsheet);
        $writer->save($fullPath);

        // Verificar que el archivo se creó y tiene contenido
        if (!file_exists($fullPath)) {
            throw new \Exception("El archivo no se creó correctamente");
        }

        $fileSize = filesize($fullPath);
        if ($fileSize === 0) {
            throw new \Exception("El archivo se creó pero está vacío");
        }

        \Log::info('Excel con todos los datos generado exitosamente', [
            'ruta' => $fullPath,
            'tamaño' => $fileSize,
            'hojas_procesadas' => ['email', 'aterrizajes', 'consulta']
        ]);

        return response()->json([
            'Ok' => true
        ]);

    } catch (\Exception $e) {
        \Log::error('Error al generar Excel completo: ' . $e->getMessage(), [
            'exception' => $e,
            'trace' => $e->getTraceAsString()
        ]);
        
        return response()->json([
            'success' => false,
            'message' => 'Error al generar Excel: ' . $e->getMessage()
        ], 500);
    }
}

// Helper function to get Excel column letter
private function getColumnLetter($columnIndex): string
{
    $dividend = $columnIndex + 1;
    $columnLetter = '';
    
    while ($dividend > 0) {
        $modulo = ($dividend - 1) % 26;
        $columnLetter = chr(65 + $modulo) . $columnLetter;
        $dividend = (int)(($dividend - $modulo) / 26);
    }
    
    return $columnLetter;
}

	public function exportAllDataEnc(): JsonResponse
	{
		try {
			// Create new Spreadsheet object
			$spreadsheet = new Spreadsheet();

			// First Sheet - Emails (similar to existing exportToExcel)
			$emailSheet = $spreadsheet->getActiveSheet();
			$emailSheet->setTitle('email');
			
			$emails = Email::all();
			$emailCount = $emails->count();
			
			\Log::info('Iniciando exportación de Excel - Hoja Emails', [
				'total_registros' => $emailCount
			]);

			// Set headers for email sheet
			$emailHeaders = ['ID', 'Fecha', 'Nombre', 'Email', 'UTM_source', 'UTM_ad', 'UTM_placement'];
			foreach ($emailHeaders as $columnIndex => $header) {
				$column = chr(65 + $columnIndex);
				$emailSheet->setCellValue($column . '1', $header);
				$emailSheet->getStyle($column . '1')->getFont()->setBold(true);
			}

			// Add data rows for email sheet
			$currentRow = 2;
			foreach ($emails as $email) {
				$fecha = $email->created_at 
					? Carbon::parse($email->created_at)->format('Y-m-d H:i:s') 
					: 'Fecha no disponible';

				$emailSheet->setCellValue('A' . $currentRow, $email->id_email);
				$emailSheet->setCellValue('B' . $currentRow, $fecha);
				$emailSheet->setCellValue('C' . $currentRow, $email->nombre ?? '');
				$emailSheet->setCellValue('D' . $currentRow, $email->email ?? '');
				$emailSheet->setCellValue('E' . $currentRow, $email->utm_source ?? '');
				$emailSheet->setCellValue('F' . $currentRow, $email->utm_ad ?? '');
				$emailSheet->setCellValue('G' . $currentRow, $email->utm_placement ?? '');
				$currentRow++;
			}

			// Auto-size columns for email sheet
			foreach (range('A', 'G') as $column) {
				$emailSheet->getColumnDimension($column)->setAutoSize(true);
			}

			// Second Sheet - Aterrizajes
			$aterrizajesSheet = $spreadsheet->createSheet();
			$aterrizajesSheet->setTitle('aterrizajes');
			
			$aterrizajes = \DB::table('aterrizajes')->get();
			
			\Log::info('Procesando hoja de Aterrizajes', [
				'total_registros' => $aterrizajes->count()
			]);

			// Set headers for aterrizajes sheet
			$aterrizajesHeaders = ['ID', 'Fecha', 'UTM_source', 'UTM_ad', 'UTM_placement'];
			foreach ($aterrizajesHeaders as $columnIndex => $header) {
				$column = chr(65 + $columnIndex);
				$aterrizajesSheet->setCellValue($column . '1', $header);
				$aterrizajesSheet->getStyle($column . '1')->getFont()->setBold(true);
			}

			// Add data rows for aterrizajes sheet
			$currentRow = 2;
			foreach ($aterrizajes as $aterrizaje) {
				$fecha = $aterrizaje->created_at 
					? Carbon::parse($aterrizaje->created_at)->format('Y-m-d H:i:s') 
					: 'Fecha no disponible';

				$aterrizajesSheet->setCellValue('A' . $currentRow, $aterrizaje->id_aterrizaje);
				$aterrizajesSheet->setCellValue('B' . $currentRow, $fecha);
				$aterrizajesSheet->setCellValue('C' . $currentRow, $aterrizaje->utm_source ?? '');
				$aterrizajesSheet->setCellValue('D' . $currentRow, $aterrizaje->utm_ad ?? '');
				$aterrizajesSheet->setCellValue('E' . $currentRow, $aterrizaje->utm_placement ?? '');
				$currentRow++;
			}

			// Auto-size columns for aterrizajes sheet
			foreach (range('A', 'E') as $column) {
				$aterrizajesSheet->getColumnDimension($column)->setAutoSize(true);
			}

			// Third Sheet - Consulta
			$consultaSheet = $spreadsheet->createSheet();
			$consultaSheet->setTitle('consulta');
			
			$consultas = \DB::table('nuevaconsulta')->get();
			
			\Log::info('Procesando hoja de Consultas', [
				'total_registros' => $consultas->count()
			]);

			// Set headers for consulta sheet
			$consultaHeaders = [
				'ID', 'Fecha', 'nombre', 'apellidos', 'pais', 'otroPais', 'telefono', 'email',
				'mesConsulta', 'estado', 'stripe_session_id', 'stripe_payment_intent',
				'stripe_payment_status', 'stripe_amount_total', 'stripe_currency',
				'stripe_customer', 'stripe_customer_email', 'stripe_customer_name',
				'stripe_payment_method', 'stripe_payment_method_types', 'stripe_captured_amount',
				'stripe_cancel_reason', 'stripe_payment_intent_status', 'stripe_last_payment_error',
				'aceptadas_condiciones', 'error_sincronizacion'
			];

			foreach ($consultaHeaders as $columnIndex => $header) {
				$column = $this->getColumnLetter($columnIndex);
				$consultaSheet->setCellValue($column . '1', $header);
				$consultaSheet->getStyle($column . '1')->getFont()->setBold(true);
			}

			// Add data rows for consulta sheet
			$currentRow = 2;
			foreach ($consultas as $consulta) {
				$fecha = $consulta->created_at 
					? Carbon::parse($consulta->created_at)->format('Y-m-d H:i:s') 
					: 'Fecha no disponible';

				$columnIndex = 0;
				$consultaSheet->setCellValue($this->getColumnLetter($columnIndex++) . $currentRow, $consulta->id);
				$consultaSheet->setCellValue($this->getColumnLetter($columnIndex++) . $currentRow, $fecha);
				$consultaSheet->setCellValue($this->getColumnLetter($columnIndex++) . $currentRow, $consulta->nombre ?? '');
				$consultaSheet->setCellValue($this->getColumnLetter($columnIndex++) . $currentRow, $consulta->apellidos ?? '');
				$consultaSheet->setCellValue($this->getColumnLetter($columnIndex++) . $currentRow, $consulta->pais ?? '');
				$consultaSheet->setCellValue($this->getColumnLetter($columnIndex++) . $currentRow, $consulta->otroPais ?? '');
				$consultaSheet->setCellValue($this->getColumnLetter($columnIndex++) . $currentRow, $consulta->telefono ?? '');
				$consultaSheet->setCellValue($this->getColumnLetter($columnIndex++) . $currentRow, $consulta->email ?? '');
				$consultaSheet->setCellValue($this->getColumnLetter($columnIndex++) . $currentRow, $consulta->mesConsulta ?? '');
				$consultaSheet->setCellValue($this->getColumnLetter($columnIndex++) . $currentRow, $consulta->estado ?? '');
				$consultaSheet->setCellValue($this->getColumnLetter($columnIndex++) . $currentRow, $consulta->stripe_session_id ?? '');
				$consultaSheet->setCellValue($this->getColumnLetter($columnIndex++) . $currentRow, $consulta->stripe_payment_intent ?? '');
				$consultaSheet->setCellValue($this->getColumnLetter($columnIndex++) . $currentRow, $consulta->stripe_payment_status ?? '');
				$consultaSheet->setCellValue($this->getColumnLetter($columnIndex++) . $currentRow, $consulta->stripe_amount_total ?? '');
				$consultaSheet->setCellValue($this->getColumnLetter($columnIndex++) . $currentRow, $consulta->stripe_currency ?? '');
				$consultaSheet->setCellValue($this->getColumnLetter($columnIndex++) . $currentRow, $consulta->stripe_customer ?? '');
				$consultaSheet->setCellValue($this->getColumnLetter($columnIndex++) . $currentRow, $consulta->stripe_customer_email ?? '');
				$consultaSheet->setCellValue($this->getColumnLetter($columnIndex++) . $currentRow, $consulta->stripe_customer_name ?? '');
				$consultaSheet->setCellValue($this->getColumnLetter($columnIndex++) . $currentRow, $consulta->stripe_payment_method ?? '');
				$consultaSheet->setCellValue($this->getColumnLetter($columnIndex++) . $currentRow, $consulta->stripe_payment_method_types ?? '');
				$consultaSheet->setCellValue($this->getColumnLetter($columnIndex++) . $currentRow, $consulta->stripe_captured_amount ?? '');
				$consultaSheet->setCellValue($this->getColumnLetter($columnIndex++) . $currentRow, $consulta->stripe_cancel_reason ?? '');
				$consultaSheet->setCellValue($this->getColumnLetter($columnIndex++) . $currentRow, $consulta->stripe_payment_intent_status ?? '');
				$consultaSheet->setCellValue($this->getColumnLetter($columnIndex++) . $currentRow, $consulta->stripe_last_payment_error ?? '');
				$consultaSheet->setCellValue($this->getColumnLetter($columnIndex++) . $currentRow, $consulta->aceptadas_condiciones ?? '');
				$consultaSheet->setCellValue($this->getColumnLetter($columnIndex++) . $currentRow, $consulta->error_sincronizacion ?? '');
				$currentRow++;
			}

			// Auto-size columns for consulta sheet
			for ($i = 0; $i < count($consultaHeaders); $i++) {
				$consultaSheet->getColumnDimension($this->getColumnLetter($i))->setAutoSize(true);
			}

			// Save the file
			//$storageBasePath = '/home/u819346592/domains/iamoving.com/public_html/storage/img';
			$storageBasePath = config('paths.custom_storage') . 'img';
			$filename = 'all_data.xlsx';
			$fullPath = $storageBasePath . '/' . $filename;

			// Verificar y crear el directorio si no existe
			if (!file_exists($storageBasePath)) {
				if (!mkdir($storageBasePath, 0755, true)) {
					throw new \Exception("No se pudo crear el directorio {$storageBasePath}");
				}
			}

			// Verificar permisos de escritura
			if (!is_writable($storageBasePath)) {
				throw new \Exception("No hay permisos de escritura en {$storageBasePath}");
			}

			// Crear el writer y guardar el archivo
			$writer = new Xlsx($spreadsheet);
			$writer->save($fullPath);

			// Verificar que el archivo se creó y tiene contenido
			if (!file_exists($fullPath)) {
				throw new \Exception("El archivo no se creó correctamente");
			}

			$fileSize = filesize($fullPath);
			if ($fileSize === 0) {
				throw new \Exception("El archivo se creó pero está vacío");
			}

			\Log::info('Excel con todos los datos generado exitosamente', [
				'ruta' => $fullPath,
				'tamaño' => $fileSize,
				'hojas_procesadas' => ['email', 'aterrizajes', 'consulta']
			]);

// 3. Encriptar el archivo
$key = "tu_clave_secreta_de_32_caracteres"; // Guardar de forma segura
$iv = random_bytes(16);
$data = file_get_contents($fullPath);
$encrypted = openssl_encrypt(
    $data,
    'aes-256-cbc',
    $key,
    OPENSSL_RAW_DATA,
    $iv
);

file_put_contents($fullPath . '.enc', $iv . $encrypted);
unlink($fullPath); // Eliminar original

			return response()->json([
				'Ok' => true
			]);

		} catch (\Exception $e) {
			\Log::error('Error al generar Excel completo: ' . $e->getMessage(), [
				'exception' => $e,
				'trace' => $e->getTraceAsString()
			]);
			
			return response()->json([
				'success' => false,
				'message' => 'Error al generar Excel: ' . $e->getMessage()
			], 500);
		}
	}

}