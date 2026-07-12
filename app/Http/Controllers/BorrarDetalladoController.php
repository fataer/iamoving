<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{
    InformeDetalladoCabecera,
    InformeDetalladoDetalle,
    Multimedia,
    Transporte
};
use Carbon\Carbon;
use SplFileInfo, File, DB;
use \App\Http\Traits\FileTrait;

class BorrarDetalladoController extends Controller
{
    use FileTrait;

    private $folder = "/inmueble";


    public function edit()
    {
        return view('borrar.edit');
    }
    
    private function uploadFile($file, $id) 
    {
        return $this->upload($file, "{$this->folder}/{$id}");
    }
    
    public function search($search)
    {
        try {
            // Get base query depending on user role
            if(auth()->user()->role_id == 1){
                $query = InformeDetalladoCabecera::where('id', 'like', "%{$search}%");
            } else {
                $query = InformeDetalladoCabecera::where('id', 'like', "%{$search}%")
                    ->where('user_id', auth()->user()->id);
            }
            
            // Add eager loading for detalles and multimedia
            $query->with(['detalles', 'multimedia' => function($query) {
                // Make sure to select all needed fields
                $query->select(
                    'id',
                    'fk_id_informe_detallado_cabecera',
                    'fk_id_informe_detallado_detalle',
                    'fotos_detalle',
                    'created_at',
                    'updated_at'
                );
            }]);
            
            $informe = $query->get();
            
            // Log for debugging
            \Log::info("Search results for ID {$search}: " . json_encode($informe));
            
            return response()->json($informe);
        } catch (\Exception $e) {
            \Log::error("Error in search: " . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    
    public function update(Request $request, $id)
    {
        try {
            \Log::info("Updating informe ID: {$id}");
            \Log::info("Request data: " . json_encode($request->all()));
            
            $informe = InformeDetalladoCabecera::findOrFail($id);
            
            // Process form data
            // Get the door data
            $doorData = json_decode($request->input('door'), true);
            $receiverData = json_decode($request->input('receiver'), true);
            
            \Log::info("Door data: " . json_encode($doorData));
            \Log::info("Receiver data: " . json_encode($receiverData));
            
            // Handle file uploads for door
            if (!empty($doorData['files'])) {
                \Log::info("Processing door files: " . count($doorData['files']));
                
                foreach ($doorData['files'] as $fileInfo) {
                    if (!isset($fileInfo['id']) || !$request->hasFile($fileInfo['id'])) {
                        continue;
                    }
                    
                    $file = $request->file($fileInfo['id']);
                    $path = $this->uploadFile($file, $id);
                    
                    \Log::info("Uploaded door file to: {$path}");
                    
                    // Save to multimedia table with detail_id = 11 (door)
                    Multimedia::create([
                        'fk_id_informe_detallado_cabecera' => $id,
                        'fk_id_informe_detallado_detalle' => 11, // Door type
                        'fotos_detalle' => $path
                    ]);
                }
            }
            
            // Handle file uploads for receiver
            if (!empty($receiverData['files'])) {
                \Log::info("Processing receiver files: " . count($receiverData['files']));
                
                foreach ($receiverData['files'] as $fileInfo) {
                    if (!isset($fileInfo['id']) || !$request->hasFile($fileInfo['id'])) {
                        continue;
                    }
                    
                    $file = $request->file($fileInfo['id']);
                    $path = $this->uploadFile($file, $id);
                    
                    \Log::info("Uploaded receiver file to: {$path}");
                    
                    // Save to multimedia table with detail_id = 10 (receiver)
                    Multimedia::create([
                        'fk_id_informe_detallado_cabecera' => $id,
                        'fk_id_informe_detallado_detalle' => 10, // Receiver type
                        'fotos_detalle' => $path
                    ]);
                }
            }
            
            // Update other form values as needed
            // ...
            
            return response()->json(['message' => 'Informe actualizado con éxito']);
        } catch (\Exception $e) {
            \Log::error("Error in update: " . $e->getMessage());
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
    
    /**
     * Delete a photo from the multimedia table
     * 
     * @param int $id The ID of the multimedia record to delete
     * @return \Illuminate\Http\JsonResponse
     */
    public function deletePhoto($id)
    {
        try {
            \Log::info("Deleting photo ID: {$id}");
            
            // Find the multimedia record
            $multimedia = Multimedia::findOrFail($id);
            
            // Get the file path
            $filePath = $multimedia->fotos_detalle;
            \Log::info("Photo file path: {$filePath}");
            
            // Delete the physical file if it exists
            if ($filePath && file_exists(public_path($filePath))) {
                unlink(public_path($filePath));
                \Log::info("Deleted physical file");
            }
            
            // Delete the database record
            $multimedia->delete();
            \Log::info("Deleted database record");
            
            return response()->json(['success' => true, 'message' => 'Foto eliminada con éxito']);
        } catch (\Exception $e) {
            \Log::error("Error deleting photo: " . $e->getMessage());
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }


/*
public function getMultimediaByReference($id)
{
    try {
        // Log básico para depuración
        \Log::info("Consultando multimedia para referencia ID: {$id}");
        
        // Consulta directa simplificada
        $multimedia = DB::table('multimedia')
            ->where('fk_id_informe_detallado_cabecera', $id)
            ->get();
        
        \Log::info("Encontrados " . count($multimedia) . " registros multimedia");
        
        // Respuesta sin procesamiento adicional
        return response()->json([
            'multimedia' => $multimedia,
            'debug' => [
                'reference_id' => $id,
                'count' => count($multimedia),
                'timestamp' => date('Y-m-d H:i:s')  // Para verificar que se ejecuta la versión actualizada
            ]
        ]);
    } catch (\Exception $e) {
        \Log::error("Error en getMultimediaByReference: " . $e->getMessage());
        return response()->json([
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString(),
            'multimedia' => []
        ], 500);
    }
}
*/
/**
 * Get multimedia records directly by reference ID
 * Fixed to ensure correct response format
 * 
 * @param int $id Reference ID
 * @return \Illuminate\Http\JsonResponse
 */
/*public function getMultimediaByReference($id)
{
    try {
        \Log::info("Consultando multimedia para referencia ID: {$id}");
        
        // Execute direct query to ensure we get all fields
        $multimedia = DB::table('multimedia')
            ->where('fk_id_informe_detallado_cabecera', $id)
            ->get();
        
        \Log::info("Encontrados " . count($multimedia) . " registros multimedia");
        
        // IMPORTANTE: Asegurar que la respuesta tenga el formato esperado
        // La página debug-fotos-avanzado espera:
        // {
        //   "multimedia": [...],
        //   "debug": { ... }
        // }
        $response = [
            'multimedia' => $multimedia, // Esto debe ser un array, NO un objeto
            'debug' => [
                'reference_id' => $id,
                'count' => count($multimedia),
                'timestamp' => date('Y-m-d H:i:s')
            ]
        ];
        
        return response()->json($response);
    } catch (\Exception $e) {
        \Log::error("Error en getMultimediaByReference: " . $e->getMessage());
        return response()->json([
            'error' => $e->getMessage(),
            'multimedia' => [], // Incluir multimedia vacío para mantener estructura
            'debug' => [
                'reference_id' => $id,
                'error' => true,
                'trace' => $e->getTraceAsString()
            ]
        ], 500);
    }
}*/
/**
 * Get multimedia records directly by reference ID with detail information
 * Includes details about room types
 * 
 * @param int $id Reference ID
 * @return \Illuminate\Http\JsonResponse
 */
public function getMultimediaByReference($id)
{
    try {
        \Log::info("Consultando multimedia para referencia ID: {$id}");
        
        // Get the multimedia records
        $multimedia = DB::table('multimedia')
            ->where('fk_id_informe_detallado_cabecera', $id)
            ->get();
        
        \Log::info("Encontrados " . count($multimedia) . " registros multimedia");
        
        // Get details for each multimedia record that has a detail ID
        $detailIds = $multimedia->pluck('fk_id_informe_detallado_detalle')
            ->filter()
            ->unique()
            ->toArray();
            
        $details = [];
        
        if (!empty($detailIds)) {
            $detailsData = DB::table('informe_detallado_detalle')
                ->whereIn('id', $detailIds)
                ->select('id', 'type', 'fk_id_informe_detallado_cabecera')
                ->get();
                
            foreach ($detailsData as $detail) {
                $details[$detail->id] = $detail;
            }
            
            \Log::info("Detalles encontrados: " . count($details));
        }
        
        // Prepare the response
        $response = [
            'multimedia' => $multimedia,
            'debug' => [
                'reference_id' => $id,
                'count' => count($multimedia),
                'timestamp' => date('Y-m-d H:i:s')
            ],
            'details' => $details
        ];
        
        return response()->json($response);
    } catch (\Exception $e) {
        \Log::error("Error en getMultimediaByReference: " . $e->getMessage());
        
        return response()->json([
            'multimedia' => [],
            'debug' => [
                'reference_id' => $id,
                'error' => true,
                'message' => $e->getMessage()
            ],
            'details' => []
        ], 500);
    }
}
 

/**
 * Get detail record by ID
 * This is used for debugging purposes
 * 
 * @param int $id Detail ID
 * @return \Illuminate\Http\JsonResponse
 */

 
public function getDetailById($id)
{
    try {
        \Log::info("Consultando detalle ID: {$id}");
        
        $detail = InformeDetalladoDetalle::findOrFail($id);
        
        \Log::info("Detalle encontrado. Tipo: " . $detail->type);
        
        return response()->json($detail);
    } catch (\Exception $e) {
        \Log::error("Error en getDetailById: " . $e->getMessage());
        return response()->json(['error' => $e->getMessage()], 500);
    }
}

/**
 * Delete multimedia record and backup to multimedia_bkp
 * 
 * @param int $id Multimedia ID
 * @return \Illuminate\Http\JsonResponse
 */
public function deleteMultimedia($id)
{
    DB::beginTransaction();
    
    try {
        // Log the action
        \Log::info("Deleting multimedia record ID: {$id}");
        
        // Find the multimedia record
        $multimedia = DB::table('multimedia')->where('id', $id)->first();
        
        if (!$multimedia) {
            return response()->json([
                'success' => false,
                'message' => 'Registro multimedia no encontrado'
            ], 404);
        }
        
        // Generate INSERT query for backup
        $insertQuery = $this->generateInsertQuery($multimedia);
        
        // Insert into backup table with additional fields
        $backupData = [
            'id' => $multimedia->id,
            'fk_id_informe_detallado_cabecera' => $multimedia->fk_id_informe_detallado_cabecera,
            'fk_id_informe_detallado_detalle' => $multimedia->fk_id_informe_detallado_detalle,
            'fotos_cabecera' => $multimedia->fotos_cabecera,
            'fotos_detalle' => $multimedia->fotos_detalle,
            'nota_cabecera' => $multimedia->nota_cabecera,
            'nota_detalle' => $multimedia->nota_detalle,
            'created_at' => $multimedia->created_at,
            'updated_at' => $multimedia->updated_at,
            'video_session' => $multimedia->video_session ?? null,
            'foto_session' => $multimedia->foto_session ?? null,
            // Additional backup fields
            'deleted_at' => now(),
            'estado' => 0,
            'query_insert' => $insertQuery
        ];
        
        // Insert into backup table
        DB::table('multimedia_bkp')->insert($backupData);
        
        // Delete from original table
        DB::table('multimedia')->where('id', $id)->delete();
        
        // If all operations succeeded, commit the transaction
        DB::commit();
        
        return response()->json([
            'success' => true,
            'message' => 'Registro eliminado y respaldado correctamente',
            'backup_id' => $id
        ]);
    } catch (\Exception $e) {
        // If any operation fails, roll back the transaction
        DB::rollBack();
        
        \Log::error("Error deleting multimedia: " . $e->getMessage());
        return response()->json([
            'success' => false,
            'message' => 'Error al eliminar y respaldar: ' . $e->getMessage()
        ], 500);
    }
}

/**
 * Generate INSERT query from a multimedia record
 * 
 * @param object $multimedia The multimedia record
 * @return string
 */
private function generateInsertQuery($multimedia)
{
    // Convert object to array
    $data = (array)$multimedia;
    
    // Build column names string
    $columns = implode(', ', array_map(function($column) {
        return "`$column`";
    }, array_keys($data)));
    
    // Build values string
    $values = implode(', ', array_map(function($value) {
        if ($value === null) {
            return 'NULL';
        } elseif (is_string($value)) {
            return "'" . str_replace("'", "\'", $value) . "'";
        } else {
            return $value;
        }
    }, array_values($data)));
    
    // Construct full INSERT query
    return "INSERT INTO `multimedia` ($columns) VALUES ($values);";
}

}