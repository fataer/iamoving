<?php

namespace App\Http\Controllers\iamovingpro;

use DB;
use Illuminate\Http\Request;
use \App\InformeDetalladoCabecera;
use App\Http\Controllers\Controller;
use App\Ciudad;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade as PDF;
use App\Oferta;
use App\OfertaCompra;
use App\Comprador;
use App\Mail\OfertaPropietarioMail;
use App\Mail\OfertaCompradorMail;
use App\Mail\OfertaArrendatarioMail;
use App\Mail\OfertaAdjuntosMail;

class OfertaCompraController extends Controller
{
    
    // Función para formatear partes individuales del nombre
private function formatearParteName($texto) {
    // Si está vacío, devolver como está
    if (empty($texto)) {
        return $texto;
    }
    
    // Convertir todo a minúsculas primero
    $texto = mb_strtolower(trim($texto), 'UTF-8');
    
    // Lista de palabras que deben permanecer en minúsculas
    $excepciones = ['de', 'del', 'la', 'los', 'el'];
    
    // Dividir en palabras
    $palabras = explode(' ', $texto);
    
    // Capitalizar cada palabra excepto las excepciones
    foreach ($palabras as $key => $palabra) {
        // Si la palabra está vacía, saltar
        if (empty($palabra)) {
            continue;
        }
        
        // Verificar si la palabra es una excepción
        if (!in_array($palabra, $excepciones)) {
            // Capitalizar primera letra manteniendo el resto en minúsculas
            $palabras[$key] = mb_strtoupper(mb_substr($palabra, 0, 1, 'UTF-8'), 'UTF-8') . 
                            mb_substr($palabra, 1, null, 'UTF-8');
        }
    }
    
    // Reconstruir el texto
    return implode(' ', $palabras);
}
    
    /**
     * Método para procesar el formulario de oferta de compra
     */
    public function sendCompra(Request $request)
    {
        try {
            // Capturar el parámetro test_email
            $testEmail = $request->query('test_email', null);
            // Iniciar transacción para garantizar la integridad de los datos
            DB::beginTransaction();
            
            // Obtener la cantidad de compradores
            $numeroCompradores = $request->input('numero_compradores');
            
            // Obtener el importe sin puntos u otros caracteres
            $importeConFormato = $request->input('importe');
            $importeSoloDigitos = preg_replace('/[^0-9]/', '', $importeConFormato);
            
            // Obtener el plazo de escritura con valor por defecto de 60 si es nulo o vacío
            $plazoEscritura ='';
            $plazoEscritura = $request->input('plazo_escritura');
            if (empty($plazoEscritura)) {
                $plazoEscritura = 60;
            }
            // Obtener el plazo de escritura con valor por defecto de 5 si es nulo o vacío
            $plazoFormalizar ='';
            $plazoFormalizar = $request->input('plazo_formalizar');
            if (empty($plazoFormalizar)) {
                $plazoFormalizar = 5;
            }            
            // Obtener el comisióm iamoving con valor por defecto de 3 si es nulo o vacío
            $comisionIamoving ='';
            $comisionIamoving = $request->input('comision_iamoving');
            if (empty($comisionIamoving)) {
                $comisionIamoving = 3;
            } 
             // Obtener el comisióm iva con valor por defecto de 'más iva' y si viene chequeado o con valor =1, entonces '(iva incluido)'
            $comisionIva ='';
            $comisionIva = $request->input('comision_iva');
            if ($comisionIva == 1) {
                $comisionIva = '(IVA incluido)';
            }
            else
            {
                $comisionIva = 'más IVA';    
            }
            // Calcular arras por defecto (10% del importe) y restante (90% del importe)
            $arras ='';
            $arras = $request->input('arras');            
            if (empty($arras)) {
                $arras = round($importeSoloDigitos * 0.1);
                $restante = $importeSoloDigitos - $arras;
                $porciento_arras=0.1*100;
            }
            else
            {
                $restante = $importeSoloDigitos - $arras;
                $porciento_arras=$arras *100/$importeSoloDigitos;
            }
            $porciento_arras = (floor($porciento_arras) == $porciento_arras)     ? number_format($porciento_arras, 0, ',', '.')     : number_format($porciento_arras, 2, ',', '.');
            // Obtener fecha actual
            $fechaActual = Carbon::now();
            $dia = $fechaActual->day;
            
            // Array de nombres de meses en español
            $mesesEnEspanol = [
                1 => 'Enero',
                2 => 'Febrero',
                3 => 'Marzo',
                4 => 'Abril',
                5 => 'Mayo',
                6 => 'Junio',
                7 => 'Julio',
                8 => 'Agosto',
                9 => 'Septiembre',
                10 => 'Octubre',
                11 => 'Noviembre',
                12 => 'Diciembre'
            ];
            
            $mesEnLetra = $mesesEnEspanol[$fechaActual->month];
            $anio = $fechaActual->year;
            
            // Construir dirección completa
           /* $direccionCompleta = $request->input('road') . ', número ' . $request->input('numero_direccion');
            
            // Verificar si hay número de apartamento/piso
            if ($request->filled('number_apartment')) {
                $direccionCompleta .= ', vivienda ' . $request->input('number_apartment');
            }
            
            // Agregar código postal y ciudad
            $direccionCompleta .= ', ' . $request->input('codigo_postal') . ' de ' . $request->input('ciudad');
            */
            
            // Construir dirección completa con las condiciones especificadas
            $direccionCompleta = $request->input('road') . ', número ' . $request->input('numero_direccion');
            
            // Verificar si hay número de apartamento/piso
            if ($request->filled('number_apartment')) {
                //$direccionCompleta .= ', vivienda ' . $request->input('number_apartment');
                $direccionCompleta .= ', ' . strtolower($request->input('inmueble')) . ' ' . $request->input('number_apartment');
            }
            else
            {
                if ($request->input('inmueble')=="Casa" || $request->input('inmueble')=="Chalet"){
                    $direccionCompleta .= ' (' . $request->input('inmueble') . ')';
                }
            }
            // Obtener valores para la dirección
            $codigoPostal = $request->input('codigo_postal');
            $municipio = $request->input('municipio');
            $ciudad = $request->input('ciudad');
            
            // Construcción del final de la dirección según las condiciones especificadas
            if (!empty($codigoPostal)) {
                if (empty($municipio) && empty($ciudad)) {
                    $direccionCompleta .= ', ' . $codigoPostal . ' de Madrid';
                } else if (empty($municipio)) {
                    $direccionCompleta .= ', ' . $codigoPostal . ' de ' . $ciudad;
                } else if ($municipio == $ciudad) {
                    $direccionCompleta .= ', ' . $codigoPostal . ' de ' . $municipio;
                } else {
                    $direccionCompleta .= ', ' . $codigoPostal . ' de ' . $municipio . ' (' . $ciudad . ')';
                }
            } else {
                // Caso en que no hay código postal
                if (empty($municipio) && empty($ciudad)) {
                    $direccionCompleta .= ', Madrid';
                } else if (empty($municipio)) {
                    $direccionCompleta .= ', ' . $ciudad;
                } else {
                    $direccionCompleta .= ', ' . $municipio;
                }
            }

            // Crear nueva oferta de compra
            $ofertaCompra = new OfertaCompra();
            $ofertaCompra->email_contacto = $request->input('email');
            $ofertaCompra->numero_compradores = $numeroCompradores;
            $ofertaCompra->oferta = $importeSoloDigitos;
            $ofertaCompra->arras = $arras;
            $ofertaCompra->restante = $restante;
            $ofertaCompra->porciento_arras= $porciento_arras;
            $ofertaCompra->inmueble_id = $request->input('referencia');
            $ofertaCompra->nombre_calle = $request->input('road');
            $ofertaCompra->numero_calle = $request->input('numero_direccion');
            $ofertaCompra->piso_calle = $request->input('number_apartment');
            $ofertaCompra->codigo_postal = $request->input('codigo_postal');
            $ofertaCompra->ciudad = $request->input('ciudad');
            $ofertaCompra->email_propietario = $request->input('email_e');
            $ofertaCompra->trastero_numero = $request->input('trastero_numero');
            $ofertaCompra->garaje_numero = $request->input('garaje_numero');
            $ofertaCompra->dia = $dia;
            $ofertaCompra->mes = $mesEnLetra;
            $ofertaCompra->annio = $anio;
            $ofertaCompra->direccion_completa = $direccionCompleta;
            $ofertaCompra->plazo_escritura = $plazoEscritura;
            $ofertaCompra->plazo_formalizar = $plazoFormalizar;
            $ofertaCompra->comision_iamoving = $comisionIamoving;
            $ofertaCompra->comision_iva = $comisionIva;
             $ofertaCompra->test_email = $testEmail; // Guardar el parámetro
            //$ofertaCompra->aceptadas_condiciones = 1; // Valor por defecto
            
            // Guardar la oferta de compra
            $ofertaCompra->save();
            
            // Guardar los compradores según la cantidad seleccionada
            for ($i = 1; $i <= $numeroCompradores; $i++) {
                $nombreCompleto = $request->input('nombre_comprador_' . $i);
                $nombresCompradores[$i] = $nombreCompleto;
                
    // Verificar si el tipo de documento es 3 (CIF) para aplicar mayúsculas
    if ($request->input('tipo_documento_comprador_' . $i) == 3) {
        // Para CIF (empresas), convertir el nombre a mayúsculas
        $nombre = mb_strtoupper($nombreCompleto, 'UTF-8');
    } else {
        // Para otros tipos de documentos, usar el formateo normal
        $nombre = $this->formatearParteName($nombreCompleto);
    }
                
                $comprador = new Comprador();
                $comprador->oferta_compra_id = $ofertaCompra->id;
                $comprador->nombre = $nombre;
                $comprador->tipo_documento_id = $request->input('tipo_documento_comprador_' . $i);
                $comprador->numero_documento = strtoupper($request->input('documento_comprador_' . $i));
                $comprador->email_comprador = $request->input('email'); // Usar el email de contacto para todos
                
                // Comprobar si es una empresa (CIF) y guardar los datos del representante
                if ($request->input('tipo_documento_comprador_' . $i) == 3) { // 3 es CIF
                    // Guardar información del representante legal
                    if ($request->filled('nombre_representante_' . $i)) {
                        $nombreRepresentante = $request->input('nombre_representante_' . $i);
                        $comprador->nombre_representante = $this->formatearParteName($nombreRepresentante);
                        $comprador->tipo_documento_id_representante = $request->input('tipo_documento_representante_' . $i);
                        $comprador->numero_documento_representante = strtoupper($request->input('documento_representante_' . $i));
                    }
                }
                
                $comprador->save();
            }
            
            // Generar y guardar el PDF de la oferta
            $this->generarPDF($ofertaCompra);
            
            // Confirmar la transacción
            DB::commit();
            
            return redirect()->back()->with('success', 'A continuación te hemos enviado el documento de oferta a tu correo electrónico para que puedas finalizar la oferta de compra.');
            
        } catch (\Exception $e) {
            // Revertir la transacción en caso de error
            DB::rollback();
            
            // Registrar el error
            \Log::error('Error al guardar oferta de compra: ' . $e->getMessage());
            
            return redirect()->back()->with('error', 'Ha ocurrido un error al enviar la oferta. Por favor, inténtelo de nuevo.');
        }
    }
    
/**
 * Método para generar el documento Word de la oferta de compra
 * 
 * @param OfertaCompra $ofertaCompra
 * @return array Resultado de la operación con información detallada
 */
public function generarWord(OfertaCompra $ofertaCompra)
{
    $result = [
        'success' => false,
        'word_path' => null,
        'pdf_path' => null,
        'errors' => [],
        'log' => []
    ];
    
    try {
        // Registrar inicio del proceso
        $this->logInfo($result, "Iniciando generación de documento Word para oferta ID: {$ofertaCompra->id}");
        
        // Verificar que la oferta exista
        if (!$ofertaCompra || !$ofertaCompra->exists) {
            $this->logError($result, "La oferta de compra no existe o es inválida");
            return $result;
        }

        // Obtener los compradores asociados a esta oferta
        $compradores = $ofertaCompra->compradores()->get();
        
        // Verificar que hay compradores
        if ($compradores->isEmpty()) {
            $this->logError($result, "No se encontraron compradores asociados a la oferta ID: {$ofertaCompra->id}");
            return $result;
        }
        
        $this->logInfo($result, "Se encontraron {$compradores->count()} compradores para la oferta");
        
        // Verificar ruta de la plantilla
        $path="/storage/ofertacompra/templates/";
        $file="oferta_compra_template.docx";
        $templatePath = '/home/u819346592/domains/iamoving.com/public_html/storage/ofertacompra/templates/oferta_compra_template.docx';
        //base_path('public_html/storage/ofertacompra/templates/oferta_compra_template.docx');
        if (!file_exists($templatePath)) {
            $this->logError($result, "Plantilla no encontrada en: {$templatePath}");
            return $result;
        }
        
        $this->logInfo($result, "Plantilla encontrada en: {$templatePath}");
        
        // Inicializar PhpWord y cargar plantilla
        try {
            $this->logInfo($result, "Inicializando PHPWord y cargando plantilla");
            $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor($templatePath);
        } catch (\Exception $e) {
            $this->logError($result, "Error al cargar la plantilla con PHPWord: " . $e->getMessage());
            return $result;
        }
        
        // Reemplazar variables básicas
        try {
            $this->logInfo($result, "Reemplazando variables básicas en la plantilla");
            
            $templateProcessor->setValue('inmueble_id', $ofertaCompra->inmueble_id);
            $this->logInfo($result, "Variable 'inmueble_id' establecida: {$ofertaCompra->inmueble_id}");
            
            $templateProcessor->setValue('dia', $ofertaCompra->dia);
            $this->logInfo($result, "Variable 'dia' establecida: {$ofertaCompra->dia}");
            
            $templateProcessor->setValue('mes', $ofertaCompra->mes);
            $this->logInfo($result, "Variable 'mes' establecida: {$ofertaCompra->mes}");
            
            $templateProcessor->setValue('annio', $ofertaCompra->annio);
            $this->logInfo($result, "Variable 'annio' establecida: {$ofertaCompra->annio}");
            
            $templateProcessor->setValue('direccionCompleta', $ofertaCompra->direccion_completa);
            $this->logInfo($result, "Variable 'direccionCompleta' establecida");
            
            // Formatear importes con separadores de miles y decimales adecuados
            $importeFormateado = number_format($ofertaCompra->oferta, 2, ',', '.');
            $templateProcessor->setValue('importe', $importeFormateado);
            $this->logInfo($result, "Variable 'importe' establecida: {$importeFormateado}");
            
            $arrasFormateado = number_format($ofertaCompra->arras, 2, ',', '.');
            $templateProcessor->setValue('arras', $arrasFormateado);
            $this->logInfo($result, "Variable 'arras' establecida: {$arrasFormateado}");
            
            $restanteFormateado = number_format($ofertaCompra->restante, 2, ',', '.');
            $porciento_arras = number_format($ofertaCompra->porciento_arras, 1, ',', '.');
            $templateProcessor->setValue('restante', $restanteFormateado);
            $this->logInfo($result, "Variable 'restante' establecida: {$restanteFormateado}");
            
            // Procesar variable complementos
            $garaje_numero = isset($ofertaCompra->garaje_numero) ? $ofertaCompra->garaje_numero : '';
            $trastero_numero = isset($ofertaCompra->trastero_numero) ? $ofertaCompra->trastero_numero : '';
            
            // Inicializar la variable complementos con un punto por defecto
            $complementos = '.';
            
            // Procesar información de garajes
            $garaje_parte = '';
            if (!empty($garaje_numero)) {
                $garajes = explode(';', $garaje_numero);
                $num_garajes = count($garajes);
                
                if ($num_garajes == 1) {
                    $garaje_parte = "una plaza de garaje número ({$garajes[0]})";
                } else {
                    $ultimo_garaje = array_pop($garajes);
                    $garajes_texto = implode(', ', $garajes);
                    $garaje_parte = "{$num_garajes} plazas de garaje números ({$garajes_texto} y {$ultimo_garaje})";
                }
            }
            
            // Procesar información de trasteros
            $trastero_parte = '';
            if (!empty($trastero_numero)) {
                $trasteros = explode(';', $trastero_numero);
                $num_trasteros = count($trasteros);
                
                if ($num_trasteros == 1) {
                    $trastero_parte = "un trastero número ({$trasteros[0]})";
                } else {
                    $ultimo_trastero = array_pop($trasteros);
                    $trasteros_texto = implode(', ', $trasteros);
                    $trastero_parte = "{$num_trasteros} trasteros números ({$trasteros_texto} y {$ultimo_trastero})";
                }
            }
            
            // Combinar las partes para formar la variable complementos
            if (!empty($garaje_parte) && !empty($trastero_parte)) {
                $complementos = ", junto a {$garaje_parte}, y {$trastero_parte}.";
            } elseif (!empty($garaje_parte)) {
                $complementos = ", junto a {$garaje_parte}.";
            } elseif (!empty($trastero_parte)) {
                $complementos = ", junto a {$trastero_parte}.";
            }
            
            $templateProcessor->setValue('complementos', $complementos);
            $this->logInfo($result, "Variable 'complementos' establecida");
            
        } catch (\Exception $e) {
            $this->logError($result, "Error al reemplazar variables básicas: " . $e->getMessage());
            return $result;
        }
        
        // Construir y reemplazar información de compradores
        try {
            $this->logInfo($result, "Construyendo información de compradores");
            
            $numeroCompradores = $ofertaCompra->numero_compradores;
            $datosCompradores = '';
            $firmas = '';
            
            switch ($numeroCompradores) {
                case 1:
                    $comprador = $compradores[0];
                    $nombreCompleto = $this->obtenerNombreCompleto($comprador);
                    
                    $tipoDocumento = $comprador->tipoDocumento()->first();
                    $tipoDocumentoNombre = $tipoDocumento ? $tipoDocumento->nombre : 'DNI';
                     $datosCompradores="D./Dª. {$nombreCompleto}, mayor de edad y con {$tipoDocumentoNombre} número {$comprador->numero_documento}";
                    \Log::info("datosCompradores: $datosCompradores");
                    $firmas = "D./Dª. {$nombreCompleto}";
                    break;
                    
                case 2:
                    $comprador1 = $compradores[0];
                    $comprador2 = $compradores[1];
                    $nombreCompleto1 = $this->obtenerNombreCompleto($comprador1);
                    $nombreCompleto2 = $this->obtenerNombreCompleto($comprador2);
                    
                    $tipoDoc1 = $comprador1->tipoDocumento()->first();
                    $tipoDoc2 = $comprador2->tipoDocumento()->first();
                    $tipoDocNombre1 = $tipoDoc1 ? $tipoDoc1->nombre : 'DNI';
                    $tipoDocNombre2 = $tipoDoc2 ? $tipoDoc2->nombre : 'DNI';
                    
                    $datosCompradores = "D./Dª. {$nombreCompleto1}, mayor de edad y con {$tipoDocNombre1} número {$comprador1->numero_documento}, y D./Dª. {$nombreCompleto2}, mayor de edad y con {$tipoDocNombre2} número {$comprador2->numero_documento}";
                    $firmas = "D./Dª. {$nombreCompleto1}\n\n\n\n\n\n\n\n\n\n\nD./Dª. {$nombreCompleto2}";
                    break;
                    case 3:
                        $comprador1 = $compradores[0];
                        $comprador2 = $compradores[1];
                        $comprador3 = $compradores[2];
                        
                        $nombreCompleto1 = $this->obtenerNombreCompleto($comprador1);
                        $nombreCompleto2 = $this->obtenerNombreCompleto($comprador2);
                        $nombreCompleto3 = $this->obtenerNombreCompleto($comprador3);
                        
                        $tipoDoc1 = $comprador1->tipoDocumento()->first();
                        $tipoDoc2 = $comprador2->tipoDocumento()->first();
                        $tipoDoc3 = $comprador3->tipoDocumento()->first();
                        
                        $tipoDocNombre1 = $tipoDoc1 ? $tipoDoc1->nombre : 'DNI';
                        $tipoDocNombre2 = $tipoDoc2 ? $tipoDoc2->nombre : 'DNI';
                        $tipoDocNombre3 = $tipoDoc3 ? $tipoDoc3->nombre : 'DNI';
                        
                        $datosCompradores = "D./Dª. {$nombreCompleto1}, mayor de edad y con {$tipoDocNombre1} número {$comprador1->numero_documento}, " .
                                            "D./Dª. {$nombreCompleto2}, mayor de edad y con {$tipoDocNombre2} número {$comprador2->numero_documento}, y " .
                                            "D./Dª. {$nombreCompleto3}, mayor de edad y con {$tipoDocNombre3} número {$comprador3->numero_documento}";
                        
                        $firmas = "D./Dª. {$nombreCompleto1}\n\n\n\n\n\n\n\n\n\n\nD./Dª. {$nombreCompleto2}\n\n\n\n\n\n\n\n\n\n\nD./Dª. {$nombreCompleto3}";
                        break;
                    
                    case 4:
                        $comprador1 = $compradores[0];
                        $comprador2 = $compradores[1];
                        $comprador3 = $compradores[2];
                        $comprador4 = $compradores[3];
                        
                        $nombreCompleto1 = $this->obtenerNombreCompleto($comprador1);
                        $nombreCompleto2 = $this->obtenerNombreCompleto($comprador2);
                        $nombreCompleto3 = $this->obtenerNombreCompleto($comprador3);
                        $nombreCompleto4 = $this->obtenerNombreCompleto($comprador4);
                        
                        $tipoDoc1 = $comprador1->tipoDocumento()->first();
                        $tipoDoc2 = $comprador2->tipoDocumento()->first();
                        $tipoDoc3 = $comprador3->tipoDocumento()->first();
                        $tipoDoc4 = $comprador4->tipoDocumento()->first();
                        
                        $tipoDocNombre1 = $tipoDoc1 ? $tipoDoc1->nombre : 'DNI';
                        $tipoDocNombre2 = $tipoDoc2 ? $tipoDoc2->nombre : 'DNI';
                        $tipoDocNombre3 = $tipoDoc3 ? $tipoDoc3->nombre : 'DNI';
                        $tipoDocNombre4 = $tipoDoc4 ? $tipoDoc4->nombre : 'DNI';
                        
                        $datosCompradores = "D./Dª. {$nombreCompleto1}, mayor de edad y con {$tipoDocNombre1} número {$comprador1->numero_documento}, " .
                                            "D./Dª. {$nombreCompleto2}, mayor de edad y con {$tipoDocNombre2} número {$comprador2->numero_documento}, " .
                                            "D./Dª. {$nombreCompleto3}, mayor de edad y con {$tipoDocNombre3} número {$comprador3->numero_documento}, y " .
                                            "D./Dª. {$nombreCompleto4}, mayor de edad y con {$tipoDocNombre4} número {$comprador4->numero_documento}";
                        
                        $firmas = "D./Dª. {$nombreCompleto1}\n\n\n\n\n\n\n\n\n\n\nD./Dª. {$nombreCompleto2}\n\n\n\n\n\n\n\n\n\n\nD./Dª. {$nombreCompleto3}\n\n\n\n\n\n\n\n\n\n\nD./Dª. {$nombreCompleto4}";
                        break;
                    
                    case 5:
                        $comprador1 = $compradores[0];
                        $comprador2 = $compradores[1];
                        $comprador3 = $compradores[2];
                        $comprador4 = $compradores[3];
                        $comprador5 = $compradores[4];
                        
                        $nombreCompleto1 = $this->obtenerNombreCompleto($comprador1);
                        $nombreCompleto2 = $this->obtenerNombreCompleto($comprador2);
                        $nombreCompleto3 = $this->obtenerNombreCompleto($comprador3);
                        $nombreCompleto4 = $this->obtenerNombreCompleto($comprador4);
                        $nombreCompleto5 = $this->obtenerNombreCompleto($comprador5);
                        
                        $tipoDoc1 = $comprador1->tipoDocumento()->first();
                        $tipoDoc2 = $comprador2->tipoDocumento()->first();
                        $tipoDoc3 = $comprador3->tipoDocumento()->first();
                        $tipoDoc4 = $comprador4->tipoDocumento()->first();
                        $tipoDoc5 = $comprador5->tipoDocumento()->first();
                        
                        $tipoDocNombre1 = $tipoDoc1 ? $tipoDoc1->nombre : 'DNI';
                        $tipoDocNombre2 = $tipoDoc2 ? $tipoDoc2->nombre : 'DNI';
                        $tipoDocNombre3 = $tipoDoc3 ? $tipoDoc3->nombre : 'DNI';
                        $tipoDocNombre4 = $tipoDoc4 ? $tipoDoc4->nombre : 'DNI';
                        $tipoDocNombre5 = $tipoDoc5 ? $tipoDoc5->nombre : 'DNI';
                        
                        $datosCompradores = "D./Dª. {$nombreCompleto1}, mayor de edad y con {$tipoDocNombre1} número {$comprador1->numero_documento}, " .
                                            "D./Dª. {$nombreCompleto2}, mayor de edad y con {$tipoDocNombre2} número {$comprador2->numero_documento}, " .
                                            "D./Dª. {$nombreCompleto3}, mayor de edad y con {$tipoDocNombre3} número {$comprador3->numero_documento}, " .
                                            "D./Dª. {$nombreCompleto4}, mayor de edad y con {$tipoDocNombre4} número {$comprador4->numero_documento}, y " .
                                            "D./Dª. {$nombreCompleto5}, mayor de edad y con {$tipoDocNombre5} número {$comprador5->numero_documento}";
                                            
                        
                        $firmas = "D./Dª. {$nombreCompleto1}\n\n\n\n\n\n\n\n\n\n\nD./Dª. {$nombreCompleto2}\n\n\n\n\n\n\n\n\n\n\nD./Dª. {$nombreCompleto3}\n\n\n\n\n\n\n\n\n\n\nD./Dª. {$nombreCompleto4}\n\n\n\n\n\n\n\n\n\n\nD./Dª. {$nombreCompleto5}";
                        break;
            }
            
            $templateProcessor->setValue('datosCompradores', $datosCompradores);
            $this->logInfo($result, "Variable 'datosCompradores' establecida");
            
            $templateProcessor->setValue('firmas', $firmas);
            $this->logInfo($result, "Variable 'firmas' establecida");
            
        } catch (\Exception $e) {
            $this->logError($result, "Error al construir información de compradores: " . $e->getMessage());
            return $result;
        }
        
        // Generar nombre para el archivo Word
        try {
            $this->logInfo($result, "Generando nombre de archivo");
            
            $today = Carbon::now()->format('Ymd');
            $primerComprador = $compradores[0];
            $nombreComprador = str_replace(' ', '_', $this->obtenerNombreCompleto($primerComprador));
            
            $path_contrato = $today . '_' . $nombreComprador . '_oferta_compra_' . $ofertaCompra->id . '_ref_' . $ofertaCompra->inmueble_id . '.docx';
            $path_contrato = preg_replace('/[^a-zA-Z0-9_\-\.]/', '_', $path_contrato); // Sanitizar nombre de archivo
            
            $this->logInfo($result, "Nombre de archivo generado: {$path_contrato}");
        } catch (\Exception $e) {
            $this->logError($result, "Error al generar nombre de archivo: " . $e->getMessage());
            return $result;
        }
        
        // Crear directorio si no existe
        try {
            $directorio = 'ofertacompra/' . $ofertaCompra->id;
            $directorioCompleto = '/home/u819346592/domains/iamoving.com/public_html/storage/' . $directorio;
            
            if (!file_exists($directorioCompleto)) {
                mkdir($directorioCompleto, 0755, true);
                $this->logInfo($result, "Directorio creado: {$directorioCompleto}");
            } else {
                $this->logInfo($result, "Directorio ya existe: {$directorioCompleto}");
            }
        } catch (\Exception $e) {
            $this->logError($result, "Error al crear directorio: " . $e->getMessage());
            return $result;
        }
        
        // Guardar el documento Word
        try {
            $wordFilePath = '/home/u819346592/domains/iamoving.com/public_html/storage/' . $directorio . '/' . $path_contrato;
            $this->logInfo($result, "Guardando documento Word en: {$wordFilePath}");
            
            $templateProcessor->saveAs($wordFilePath);
            
            if (file_exists($wordFilePath)) {
                $this->logInfo($result, "Documento Word guardado correctamente");
                $result['word_path'] = 'storage/' . $directorio . '/' . $path_contrato;
            } else {
                $this->logError($result, "El documento Word no se guardó correctamente");
                return $result;
            }
        } catch (\Exception $e) {
            $this->logError($result, "Error al guardar documento Word: " . $e->getMessage());
            return $result;
        }
        
        // Guardar la ruta del contrato en la oferta
        try {
            $this->logInfo($result, "Actualizando registro en base de datos");
            
            $ofertaCompra->path_oferta = $path_contrato;
            $ofertaCompra->save();
            
            $this->logInfo($result, "Registro actualizado correctamente");
        } catch (\Exception $e) {
            $this->logError($result, "Error al actualizar registro en base de datos: " . $e->getMessage());
            // No retornamos aquí porque el documento ya se generó
        }
        
        // Convertir a PDF si se requiere
       /* if (extension_loaded('gd') && class_exists('\PhpOffice\PhpWord\Settings')) {
            try {
                $this->logInfo($result, "Iniciando conversión a PDF");
                
                $pdfFileName = str_replace('.docx', '.pdf', $path_contrato);
                $pdfFilePath = storage_path('app/public/' . $directorio . '/' . $pdfFileName);
                
                $this->logInfo($result, "Ruta de destino del PDF: {$pdfFilePath}");
                
                // Intento de conversión a PDF
                $success = $this->convertWordToPdf($wordFilePath, $pdfFilePath);
                
                if ($success && file_exists($pdfFilePath)) {
                    $this->logInfo($result, "Conversión a PDF exitosa");
                    $result['pdf_path'] = 'storage/' . $directorio . '/' . $pdfFileName;
                    
                    // Actualizar la ruta del PDF en la oferta
                    $ofertaCompra->path_oferta_pdf = $pdfFileName;
                    $ofertaCompra->save();
                } else {
                    $this->logError($result, "La conversión a PDF falló, pero el documento Word se generó correctamente");
                }
            } catch (\Exception $e) {
                $this->logError($result, "Error en conversión a PDF: " . $e->getMessage());
                // No retornamos aquí porque al menos el documento Word se generó
            }
        } else {
            $this->logError($result, "No se pudo convertir a PDF: Extensión GD no cargada o PHPWord no configurado correctamente");
        }*/
        
        
        // Si llegamos aquí, al menos el Word se generó correctamente
        $result['success'] = true;
        $this->logInfo($result, "Proceso completado con éxito");
        
        return $result;
        
    } catch (\Exception $e) {
        $this->logError($result, "Error general en generarWord: " . $e->getMessage());
        $this->logError($result, "Traza de la excepción: " . $e->getTraceAsString());
        return $result;
    }
}

/**
 * Método auxiliar para obtener el nombre completo de un comprador
 */
/*private function obtenerNombreCompleto($comprador)
{
    $nombreCompleto = $comprador->nombre . ' ' . $comprador->primer_apellido;
    if (!empty($comprador->segundo_apellido)) {
        $nombreCompleto .= ' ' . $comprador->segundo_apellido;
    }
    return $nombreCompleto;
}*/
private function obtenerNombreCompleto($comprador)
{
    // Construir nombre completo base
    $nombreCompleto = $comprador->nombre . ' ' . $comprador->primer_apellido;
    if (!empty($comprador->segundo_apellido)) {
        $nombreCompleto .= ' ' . $comprador->segundo_apellido;
    }
    
    // Aplicar trim para eliminar espacios en blanco al inicio y final
    $nombreCompleto = trim($nombreCompleto);
    
    // Convertir todo a minúsculas primero
    $nombreCompleto = mb_strtolower($nombreCompleto, 'UTF-8');
    
    // Dividir en palabras
    $palabras = explode(' ', $nombreCompleto);
    
    // Lista de palabras que deben permanecer en minúsculas
    $excepciones = ['de', 'del', 'la', 'los', 'el'];
    
    // Capitalizar cada palabra excepto las excepciones
    foreach ($palabras as $key => $palabra) {
        // Si la palabra está vacía (por ejemplo, espacios múltiples), saltar
        if (empty($palabra)) {
            continue;
        }
        
        // Verificar si la palabra es una excepción
        if (!in_array($palabra, $excepciones)) {
            // Capitalizar primera letra manteniendo el resto en minúsculas
            $palabras[$key] = mb_strtoupper(mb_substr($palabra, 0, 1, 'UTF-8'), 'UTF-8') . 
                             mb_substr($palabra, 1, null, 'UTF-8');
        }
    }
    
    // Reconstruir el nombre completo
    $nombreCompleto = implode(' ', $palabras);
    
    return $nombreCompleto;
}

/**
 * Método para agregar información de log
 */
private function logInfo(&$result, $message)
{
    $timestamp = date('Y-m-d H:i:s');
    $result['log'][] = "[INFO {$timestamp}] {$message}";
    \Log::info($message);
}

/**
 * Método para agregar errores al log
 */
private function logError(&$result, $message)
{
    $timestamp = date('Y-m-d H:i:s');
    $result['errors'][] = $message;
    $result['log'][] = "[ERROR {$timestamp}] {$message}";
    \Log::error($message);
}

/**
 * Convierte un documento Word a PDF
 */
/*protected function convertWordToPdf($inputFile, $outputFile)
{
    try {
        // Verifica qué versión de PHPWord estás utilizando
        if (method_exists(\PhpOffice\PhpWord\Settings::class, 'setPdfRendererPath')) {
            // Versión más reciente de PHPWord
            \PhpOffice\PhpWord\Settings::setPdfRendererName(\PhpOffice\PhpWord\Settings::PDF_RENDERER_TCPDF);
            \PhpOffice\PhpWord\Settings::setPdfRendererPath(base_path('vendor/tecnickcom/tcpdf'));
        } else {
            // Error: La versión de PHPWord no soporta conversión directa a PDF
            \Log::error('La versión instalada de PHPWord no soporta conversión directa a PDF');
            return false;
        }
        
        // Cargar el documento Word
        $phpWord = \PhpOffice\PhpWord\IOFactory::load($inputFile);
        
        // Crear escritor de PDF
        $pdfWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'PDF');
        
        // Guardar como PDF
        $pdfWriter->save($outputFile);
        
        return file_exists($outputFile);
    } catch (\Exception $e) {
        \Log::error('Error al convertir Word a PDF: ' . $e->getMessage());
        return false;
    }
}*/
/**
 * Convierte un documento Word a PDF usando TCPDF
 * 
 * @param string $inputFile Ruta completa al archivo Word
 * @param string $outputFile Ruta completa donde se guardará el PDF
 * @return bool
 */
/*protected function convertWordToPdf($inputFile, $outputFile)
{
    try {
        // Verificar que TCPDF está instalado
        if (!class_exists('TCPDF')) {
            \Log::error('La clase TCPDF no está disponible. Asegúrate de que tecnickcom/tcpdf esté instalado.');
            return false;
        }
        
        // Configurar PHPWord para usar TCPDF
        \PhpOffice\PhpWord\Settings::setPdfRendererName(\PhpOffice\PhpWord\Settings::PDF_RENDERER_TCPDF);
        \PhpOffice\PhpWord\Settings::setPdfRendererPath(base_path('vendor/tecnickcom/tcpdf'));
        
        // Cargar el documento Word
        $phpWord = \PhpOffice\PhpWord\IOFactory::load($inputFile);
        
        // Crear el escritor de PDF
        $pdfWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'PDF');
        
        // Guardar como PDF
        $pdfWriter->save($outputFile);
        
        if (!file_exists($outputFile)) {
            \Log::error("El archivo PDF no se generó correctamente en: $outputFile");
            return false;
        }
        
        \Log::info("PDF generado correctamente en: $outputFile");
        return true;
    } catch (\Exception $e) {
        \Log::error('Error al convertir Word a PDF: ' . $e->getMessage());
        \Log::error('Traza del error: ' . $e->getTraceAsString());
        return false;
    }
}*/

protected function convertWordToPdf($inputFile, $outputFile)
{
    try {

        
        // Configurar PHPWord para usar TCPDF
        \PhpOffice\PhpWord\Settings::setPdfRendererName(\PhpOffice\PhpWord\Settings::PDF_RENDERER_MPDF);
        \PhpOffice\PhpWord\Settings::setPdfRendererPath(base_path('vendor/mpdf/mpdf'));
        
        // Cargar el documento Word
        $phpWord = \PhpOffice\PhpWord\IOFactory::load($inputFile);
        
        // Crear el escritor de PDF
        $pdfWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'PDF');
        
        // Guardar como PDF
        $pdfWriter->save($outputFile);
        
        if (!file_exists($outputFile)) {
            \Log::error("El archivo PDF no se generó correctamente en: $outputFile");
            return false;
        }
        
        \Log::info("PDF generado correctamente en: $outputFile");
        return true;
    } catch (\Exception $e) {
        \Log::error('Error al convertir Word a PDF: ' . $e->getMessage());
        \Log::error('Traza del error: ' . $e->getTraceAsString());
        return false;
    }
}
    
    /**
     * Método para generar el PDF de la oferta de compra
     * 
     * @param OfertaCompra $ofertaCompra
     * @return bool
     */
/*    public function generarPDF(OfertaCompra $ofertaCompra)
    {
        try {
            // Obtener los compradores asociados a esta oferta
            $compradores = $ofertaCompra->compradores()->get();
            
            // Verificar que hay compradores
            if ($compradores->isEmpty()) {
                return false;
            }
            
            // Preparar las variables para la vista
            $data = [
                'inmueble_id' => $ofertaCompra->inmueble_id,
                'dia' => $ofertaCompra->dia,
                'mes' => $ofertaCompra->mes,
                'annio' => $ofertaCompra->annio,
                'numeroCompradores' => $ofertaCompra->numero_compradores,
                'direccionCompleta' => $ofertaCompra->direccion_completa,
                'importeSoloDigitos' => $ofertaCompra->oferta,
                'arras' => $ofertaCompra->arras,
                'restante' => $ofertaCompra->restante,
                'fecha_letra' => $ofertaCompra->dia . ' de ' . $ofertaCompra->mes . ' de ' . $ofertaCompra->annio,
            ];
            
            // Preparar los datos de los compradores
            foreach ($compradores as $index => $comprador) {
                $orden = $index + 1;
                $nombreCompleto = $comprador->nombre . ' ' . $comprador->primer_apellido;
                if (!empty($comprador->segundo_apellido)) {
                    $nombreCompleto .= ' ' . $comprador->segundo_apellido;
                }
                
                // Obtener el tipo de documento
                $tipoDocumento = $comprador->tipoDocumento()->first();
                $tipoDocumentoNombre = $tipoDocumento ? $tipoDocumento->nombre : '';
                
                $data['nombre_comprador_' . $orden] = $nombreCompleto;
                $data['tipo_documento_comprador_' . $orden] = $tipoDocumentoNombre;
                $data['documento_comprador_' . $orden] = $comprador->numero_documento;
            }
            
            // Generar un nombre para el archivo PDF
            $today = Carbon::now()->format('Ymd');
            $path_contrato = $today . '_' . str_replace(' ', '_', $data['nombre_comprador_1']) . '_oferta_compra_ref_' . $ofertaCompra->inmueble_id . '.pdf';
            $path_contrato = str_replace(' ', '_', $path_contrato);
            
            // Guardar la ruta del contrato en la oferta
            $ofertaCompra->path_oferta = $path_contrato;
            $ofertaCompra->save();
            
            // Generar el PDF
            $content = PDF::loadView('iamovingpro.ofertacompra.oferta', $data)->output();
            
            // Crear directorio si no existe
            $directorio = 'ofertacompra/' . $ofertaCompra->id;
            if (!Storage::disk('public')->exists($directorio)) {
                Storage::disk('public')->makeDirectory($directorio);
            }
            
            // Guardar el PDF
            Storage::disk('public')->put($directorio . '/' . $path_contrato, $content);
            
            return true;
        } catch (\Exception $e) {
            \Log::error('Error al generar PDF de oferta de compra: ' . $e->getMessage());
            return false;
        }
    }*/
    
public function generarPDF(OfertaCompra $ofertaCompra)
{
    try {
        // Obtener los compradores asociados a esta oferta
        $compradores = $ofertaCompra->compradores()->get();
        
        // Verificar que hay compradores
        if ($compradores->isEmpty()) {
            \Log::error('No hay compradores asociados a la oferta: ' . $ofertaCompra->id);
            return false;
        }
        
        // Preparar las variables para la vista
        $data = [
            'inmueble_id' => $ofertaCompra->inmueble_id,
            'dia' => $ofertaCompra->dia,
            'mes' => $ofertaCompra->mes,
            'annio' => $ofertaCompra->annio,
            'numeroCompradores' => $ofertaCompra->numero_compradores,
            'direccionCompleta' => $ofertaCompra->direccion_completa,
            'importeSoloDigitos' => $ofertaCompra->oferta,
            'arras' => $ofertaCompra->arras,
            'restante' => $ofertaCompra->restante,
            'porciento_arras' => $ofertaCompra->porciento_arras,
            'fecha_letra' => $ofertaCompra->dia . ' de ' . $ofertaCompra->mes . ' de ' . $ofertaCompra->annio,
            // Agregar plazoEscritura al array de datos
            'plazoEscritura' => $ofertaCompra->plazo_escritura,
            'plazoFormalizar' => $ofertaCompra->plazo_formalizar,
            // Agregar comisionIamoving al array de datos
            'comisionIamoving' => $ofertaCompra->comision_iamoving,            
            'comisionIva' => $ofertaCompra->comision_iva,
            'complementos' => isset($data['complementos']) ? $data['complementos'] : '.',            
        ];
        
        // Procesar variable complementos
        $garaje_numero = isset($ofertaCompra->garaje_numero) ? $ofertaCompra->garaje_numero : '';
        $trastero_numero = isset($ofertaCompra->trastero_numero) ? $ofertaCompra->trastero_numero : '';
        
        // Inicializar la variable complementos con un punto por defecto
        $complementos = '.';
        
        // Procesar información de garajes
        $garaje_parte = '';
        if (!empty($garaje_numero)) {
            $garajes = explode(';', $garaje_numero);
            $num_garajes = count($garajes);
            
            if ($num_garajes == 1) {
                $garaje_parte = "una plaza de garaje número ({$garajes[0]})";
            } else {
                $ultimo_garaje = array_pop($garajes);
                $garajes_texto = implode(', ', $garajes);
                $garaje_parte = "{$num_garajes} plazas de garaje números ({$garajes_texto} y {$ultimo_garaje})";
            }
        }
        
        // Procesar información de trasteros
        $trastero_parte = '';
        if (!empty($trastero_numero)) {
            $trasteros = explode(';', $trastero_numero);
            $num_trasteros = count($trasteros);
            
            if ($num_trasteros == 1) {
                $trastero_parte = "un trastero número ({$trasteros[0]})";
            } else {
                $ultimo_trastero = array_pop($trasteros);
                $trasteros_texto = implode(', ', $trasteros);
                $trastero_parte = "{$num_trasteros} trasteros números ({$trasteros_texto} y {$ultimo_trastero})";
            }
        }
        
        // Combinar las partes para formar la variable complementos
        if (!empty($garaje_parte) && !empty($trastero_parte)) {
            $complementos = ", junto a {$garaje_parte}, y {$trastero_parte}.";
        } elseif (!empty($garaje_parte)) {
            $complementos = ", junto a {$garaje_parte}.";
        } elseif (!empty($trastero_parte)) {
            $complementos = ", junto a {$trastero_parte}.";
        }
        
        $data['complementos'] = $complementos;
        
        // Preparar los datos de los compradores
        foreach ($compradores as $index => $comprador) {
            $orden = $index + 1;
            $nombreCompleto = $comprador->nombre . ' ' . $comprador->primer_apellido;
            if (!empty($comprador->segundo_apellido)) {
                $nombreCompleto .= ' ' . $comprador->segundo_apellido;
            }
            
            // Obtener el tipo de documento
            $tipoDocumento = $comprador->tipoDocumento()->first();
            $tipoDocumentoNombre = $tipoDocumento ? $tipoDocumento->nombre : '';
            
            $data['nombre_comprador_' . $orden] = $nombreCompleto;
            $data['tipo_documento_comprador_' . $orden] = $tipoDocumentoNombre;
            $data['documento_comprador_' . $orden] = $comprador->numero_documento;
        }
        
// Construir datosCompradores y firmas
$numeroCompradores = $ofertaCompra->numero_compradores;
$datosCompradores = '';
$firmas = '';

switch ($numeroCompradores) {
    case 1:
        $comprador = $compradores[0];
        $nombreCompleto = $this->obtenerNombreCompleto($comprador);
        
        $tipoDocumento = $comprador->tipoDocumento()->first();
        $tipoDocumentoNombre = $tipoDocumento ? $tipoDocumento->nombre : 'DNI';
        
        // Comprobar si es una empresa (CIF)
        if ($comprador->tipo_documento_id == 3) { // 3 es CIF
            // Si tiene representante
            if (!empty($comprador->nombre_representante)) {
                // Obtener el tipo de documento del representante
                $tipoDocumentoRepresentante = $comprador->tipo_documento_id_representante == 1 ? 'DNI' : 'NIE';
                $nombreCompleto = strtoupper($nombreCompleto);
                $datosCompradores = "la mercantil {$nombreCompleto}, con {$tipoDocumentoNombre} número {$comprador->numero_documento}, representada en este acto por D./Dª. {$comprador->nombre_representante}, con {$tipoDocumentoRepresentante} número {$comprador->numero_documento_representante}";
                // Cambio aquí: solo mostrar la empresa en la firma
                $firmas = "La mercantil {$nombreCompleto}";
            } else {
                // Si no tiene representante, mostrar solo la empresa
                $datosCompradores = "la mercantil {$nombreCompleto}, con {$tipoDocumentoNombre} número {$comprador->numero_documento}";
                $firmas = "La mercantil {$nombreCompleto}";
            }
        } else {
            // Si es persona física
            $datosCompradores = "D./Dª. {$nombreCompleto}, con {$tipoDocumentoNombre} número {$comprador->numero_documento}";
            $firmas = "D./Dª. {$nombreCompleto}";
        }
        break;
        
    case 2:
        $comprador1 = $compradores[0];
        $comprador2 = $compradores[1];
        
        $nombreCompleto1 = $this->obtenerNombreCompleto($comprador1);
        $nombreCompleto2 = $this->obtenerNombreCompleto($comprador2);
        
        $tipoDoc1 = $comprador1->tipoDocumento()->first();
        $tipoDoc2 = $comprador2->tipoDocumento()->first();
        $tipoDocNombre1 = $tipoDoc1 ? $tipoDoc1->nombre : 'DNI';
        $tipoDocNombre2 = $tipoDoc2 ? $tipoDoc2->nombre : 'DNI';
        
        // Preparar datos del primer comprador
        $datos1 = "";
        $firma1 = "";
        if ($comprador1->tipo_documento_id == 3) { // Si es CIF (empresa)
            if (!empty($comprador1->nombre_representante)) {
                $tipoDocRep1 = $comprador1->tipo_documento_id_representante == 1 ? 'DNI' : 'NIE';
                $nombreCompleto1 = strtoupper($nombreCompleto1);
                $datos1 = "la mercantil {$nombreCompleto1}, con {$tipoDocNombre1} número {$comprador1->numero_documento}, representada en este acto por D./Dª. {$comprador1->nombre_representante}, con {$tipoDocRep1} número {$comprador1->numero_documento_representante}";
                // Cambio aquí: solo mostrar la empresa en la firma
                $firma1 = "La mercantil {$nombreCompleto1}";
            } else {
                $datos1 = "la mercantil {$nombreCompleto1}, con {$tipoDocNombre1} número {$comprador1->numero_documento}";
                $firma1 = "La mercantil {$nombreCompleto1}";
            }
        } else {
            $datos1 = "D./Dª. {$nombreCompleto1}, con {$tipoDocNombre1} número {$comprador1->numero_documento}";
            $firma1 = "D./Dª. {$nombreCompleto1}";
        }
        
        // Preparar datos del segundo comprador
        $datos2 = "";
        $firma2 = "";
        if ($comprador2->tipo_documento_id == 3) { // Si es CIF (empresa)
            if (!empty($comprador2->nombre_representante)) {
                $tipoDocRep2 = $comprador2->tipo_documento_id_representante == 1 ? 'DNI' : 'NIE';
                $nombreCompleto2 = strtoupper($nombreCompleto2);
                $datos2 = "la mercantil {$nombreCompleto2}, con {$tipoDocNombre2} número {$comprador2->numero_documento}, representada en este acto por D./Dª. {$comprador2->nombre_representante}, con {$tipoDocRep2} número {$comprador2->numero_documento_representante}";
                // Cambio aquí: solo mostrar la empresa en la firma
                $firma2 = "La mercantil {$nombreCompleto2}";
            } else {
                $datos2 = "la mercantil {$nombreCompleto2}, con {$tipoDocNombre2} número {$comprador2->numero_documento}";
                $firma2 = "La mercantil {$nombreCompleto2}";
            }
        } else {
            $datos2 = "D./Dª. {$nombreCompleto2}, con {$tipoDocNombre2} número {$comprador2->numero_documento}";
            $firma2 = "D./Dª. {$nombreCompleto2}";
        }
        
        // Combinar datos de ambos compradores
        $datosCompradores = "{$datos1}, y {$datos2}";
        $firmas = "{$firma1}<br><br><br><br><br><br><br><br>{$firma2}";
        break;
        
    case 3:
        $comprador1 = $compradores[0];
        $comprador2 = $compradores[1];
        $comprador3 = $compradores[2];
        
        $nombreCompleto1 = $this->obtenerNombreCompleto($comprador1);
        $nombreCompleto2 = $this->obtenerNombreCompleto($comprador2);
        $nombreCompleto3 = $this->obtenerNombreCompleto($comprador3);
        
        $tipoDoc1 = $comprador1->tipoDocumento()->first();
        $tipoDoc2 = $comprador2->tipoDocumento()->first();
        $tipoDoc3 = $comprador3->tipoDocumento()->first();
        
        $tipoDocNombre1 = $tipoDoc1 ? $tipoDoc1->nombre : 'DNI';
        $tipoDocNombre2 = $tipoDoc2 ? $tipoDoc2->nombre : 'DNI';
        $tipoDocNombre3 = $tipoDoc3 ? $tipoDoc3->nombre : 'DNI';
        
        // Preparar datos de cada comprador
        $datos1 = "";
        $firma1 = "";
        if ($comprador1->tipo_documento_id == 3) {
            if (!empty($comprador1->nombre_representante)) {
                $tipoDocRep1 = $comprador1->tipo_documento_id_representante == 1 ? 'DNI' : 'NIE';
                $nombreCompleto1 = strtoupper($nombreCompleto1);
                $datos1 = "la mercantil {$nombreCompleto1}, con {$tipoDocNombre1} número {$comprador1->numero_documento}, representada en este acto por D./Dª. {$comprador1->nombre_representante}, con {$tipoDocRep1} número {$comprador1->numero_documento_representante}";
                // Cambio aquí: solo mostrar la empresa en la firma
                $firma1 = "La mercantil {$nombreCompleto1}";
            } else {
                $datos1 = "la mercantil {$nombreCompleto1}, con {$tipoDocNombre1} número {$comprador1->numero_documento}";
                $firma1 = "La mercantil {$nombreCompleto1}";
            }
        } else {
            $datos1 = "D./Dª. {$nombreCompleto1}, con {$tipoDocNombre1} número {$comprador1->numero_documento}";
            $firma1 = "D./Dª. {$nombreCompleto1}";
        }
        
        $datos2 = "";
        $firma2 = "";
        if ($comprador2->tipo_documento_id == 3) {
            if (!empty($comprador2->nombre_representante)) {
                $tipoDocRep2 = $comprador2->tipo_documento_id_representante == 1 ? 'DNI' : 'NIE';
                $nombreCompleto2 = strtoupper($nombreCompleto2);
                $datos2 = "la mercantil {$nombreCompleto2}, con {$tipoDocNombre2} número {$comprador2->numero_documento}, representada en este acto por D./Dª. {$comprador2->nombre_representante}, con {$tipoDocRep2} número {$comprador2->numero_documento_representante}";
                // Cambio aquí: solo mostrar la empresa en la firma
                $firma2 = "La mercantil {$nombreCompleto2}";
            } else {
                $datos2 = "la mercantil {$nombreCompleto2}, con {$tipoDocNombre2} número {$comprador2->numero_documento}";
                $firma2 = "La mercantil {$nombreCompleto2}";
            }
        } else {
            $datos2 = "D./Dª. {$nombreCompleto2}, con {$tipoDocNombre2} número {$comprador2->numero_documento}";
            $firma2 = "D./Dª. {$nombreCompleto2}";
        }
        
        $datos3 = "";
        $firma3 = "";
        if ($comprador3->tipo_documento_id == 3) {
            if (!empty($comprador3->nombre_representante)) {
                $tipoDocRep3 = $comprador3->tipo_documento_id_representante == 1 ? 'DNI' : 'NIE';
                $nombreCompleto3 = strtoupper($nombreCompleto3);
                $datos3 = "la mercantil {$nombreCompleto3}, con {$tipoDocNombre3} número {$comprador3->numero_documento}, representada en este acto por D./Dª. {$comprador3->nombre_representante}, con {$tipoDocRep3} número {$comprador3->numero_documento_representante}";
                // Cambio aquí: solo mostrar la empresa en la firma
                $firma3 = "La mercantil {$nombreCompleto3}";
            } else {
                $datos3 = "la mercantil {$nombreCompleto3}, con {$tipoDocNombre3} número {$comprador3->numero_documento}";
                $firma3 = "La mercantil {$nombreCompleto3}";
            }
        } else {
            $datos3 = "D./Dª. {$nombreCompleto3}, con {$tipoDocNombre3} número {$comprador3->numero_documento}";
            $firma3 = "D./Dª. {$nombreCompleto3}";
        }
        
        $datosCompradores = "{$datos1}, {$datos2}, y {$datos3}";
        $firmas = "{$firma1}<br><br><br><br><br><br><br><br>{$firma2}<br><br><br><br><br><br><br><br>{$firma3}";
        break;
        
    case 4:
        $comprador1 = $compradores[0];
        $comprador2 = $compradores[1];
        $comprador3 = $compradores[2];
        $comprador4 = $compradores[3];
        
        $nombreCompleto1 = $this->obtenerNombreCompleto($comprador1);
        $nombreCompleto2 = $this->obtenerNombreCompleto($comprador2);
        $nombreCompleto3 = $this->obtenerNombreCompleto($comprador3);
        $nombreCompleto4 = $this->obtenerNombreCompleto($comprador4);
        
        $tipoDoc1 = $comprador1->tipoDocumento()->first();
        $tipoDoc2 = $comprador2->tipoDocumento()->first();
        $tipoDoc3 = $comprador3->tipoDocumento()->first();
        $tipoDoc4 = $comprador4->tipoDocumento()->first();
        
        $tipoDocNombre1 = $tipoDoc1 ? $tipoDoc1->nombre : 'DNI';
        $tipoDocNombre2 = $tipoDoc2 ? $tipoDoc2->nombre : 'DNI';
        $tipoDocNombre3 = $tipoDoc3 ? $tipoDoc3->nombre : 'DNI';
        $tipoDocNombre4 = $tipoDoc4 ? $tipoDoc4->nombre : 'DNI';
        
        // Preparar datos de cada comprador
        $datos1 = "";
        $firma1 = "";
        if ($comprador1->tipo_documento_id == 3) {
            if (!empty($comprador1->nombre_representante)) {
                $tipoDocRep1 = $comprador1->tipo_documento_id_representante == 1 ? 'DNI' : 'NIE';
                $nombreCompleto1 = strtoupper($nombreCompleto1);
                $datos1 = "la mercantil {$nombreCompleto1}, con {$tipoDocNombre1} número {$comprador1->numero_documento}, representada en este acto por D./Dª. {$comprador1->nombre_representante}, con {$tipoDocRep1} número {$comprador1->numero_documento_representante}";
                // Cambio aquí: solo mostrar la empresa en la firma
                $firma1 = "La mercantil {$nombreCompleto1}";
            } else {
                $datos1 = "la mercantil {$nombreCompleto1}, con {$tipoDocNombre1} número {$comprador1->numero_documento}";
                $firma1 = "La mercantil {$nombreCompleto1}";
            }
        } else {
            $datos1 = "D./Dª. {$nombreCompleto1}, con {$tipoDocNombre1} número {$comprador1->numero_documento}";
            $firma1 = "D./Dª. {$nombreCompleto1}";
        }
        
        $datos2 = "";
        $firma2 = "";
        if ($comprador2->tipo_documento_id == 3) {
            if (!empty($comprador2->nombre_representante)) {
                $tipoDocRep2 = $comprador2->tipo_documento_id_representante == 1 ? 'DNI' : 'NIE';
                $nombreCompleto2 = strtoupper($nombreCompleto2);
                $datos2 = "la mercantil {$nombreCompleto2}, con {$tipoDocNombre2} número {$comprador2->numero_documento}, representada en este acto por D./Dª. {$comprador2->nombre_representante}, con {$tipoDocRep2} número {$comprador2->numero_documento_representante}";
                // Cambio aquí: solo mostrar la empresa en la firma
                $firma2 = "La mercantil {$nombreCompleto2}";
            } else {
                $datos2 = "la mercantil {$nombreCompleto2}, con {$tipoDocNombre2} número {$comprador2->numero_documento}";
                $firma2 = "La mercantil {$nombreCompleto2}";
            }
        } else {
            $datos2 = "D./Dª. {$nombreCompleto2}, con {$tipoDocNombre2} número {$comprador2->numero_documento}";
            $firma2 = "D./Dª. {$nombreCompleto2}";
        }
        
        $datos3 = "";
        $firma3 = "";
        if ($comprador3->tipo_documento_id == 3) {
            if (!empty($comprador3->nombre_representante)) {
                $tipoDocRep3 = $comprador3->tipo_documento_id_representante == 1 ? 'DNI' : 'NIE';
                $nombreCompleto3 = strtoupper($nombreCompleto3);
                $datos3 = "la mercantil {$nombreCompleto3}, con {$tipoDocNombre3} número {$comprador3->numero_documento}, representada en este acto por D./Dª. {$comprador3->nombre_representante}, con {$tipoDocRep3} número {$comprador3->numero_documento_representante}";
                // Cambio aquí: solo mostrar la empresa en la firma
                $firma3 = "La mercantil {$nombreCompleto3}";
            } else {
                $datos3 = "la mercantil {$nombreCompleto3}, con {$tipoDocNombre3} número {$comprador3->numero_documento}";
                $firma3 = "La mercantil {$nombreCompleto3}";
            }
        } else {
            $datos3 = "D./Dª. {$nombreCompleto3}, con {$tipoDocNombre3} número {$comprador3->numero_documento}";
            $firma3 = "D./Dª. {$nombreCompleto3}";
        }
        
        $datos4 = "";
        $firma4 = "";
        if ($comprador4->tipo_documento_id == 3) {
            if (!empty($comprador4->nombre_representante)) {
                $tipoDocRep4 = $comprador4->tipo_documento_id_representante == 1 ? 'DNI' : 'NIE';
                $nombreCompleto4 = strtoupper($nombreCompleto4);
                $datos4 = "la mercantil {$nombreCompleto4}, con {$tipoDocNombre4} número {$comprador4->numero_documento}, representada en este acto por D./Dª. {$comprador4->nombre_representante}, con {$tipoDocRep4} número {$comprador4->numero_documento_representante}";
                // Cambio aquí: solo mostrar la empresa en la firma
                $firma4 = "La mercantil {$nombreCompleto4}";
            } else {
                $datos4 = "la mercantil {$nombreCompleto4}, con {$tipoDocNombre4} número {$comprador4->numero_documento}";
                $firma4 = "La mercantil {$nombreCompleto4}";
            }
        } else {
            $datos4 = "D./Dª. {$nombreCompleto4}, con {$tipoDocNombre4} número {$comprador4->numero_documento}";
            $firma4 = "D./Dª. {$nombreCompleto4}";
        }
        
        $datosCompradores = "{$datos1}, {$datos2}, {$datos3}, y {$datos4}";
        $firmas = "{$firma1}<br><br><br><br><br><br><br><br>{$firma2}<br><br><br><br><br><br><br><br>{$firma3}<br><br><br><br><br><br><br><br>{$firma4}";
        break;
        
    case 5:
        $comprador1 = $compradores[0];
        $comprador2 = $compradores[1];
        $comprador3 = $compradores[2];
        $comprador4 = $compradores[3];
        $comprador5 = $compradores[4];
        
        $nombreCompleto1 = $this->obtenerNombreCompleto($comprador1);
        $nombreCompleto2 = $this->obtenerNombreCompleto($comprador2);
        $nombreCompleto3 = $this->obtenerNombreCompleto($comprador3);
        $nombreCompleto4 = $this->obtenerNombreCompleto($comprador4);
        $nombreCompleto5 = $this->obtenerNombreCompleto($comprador5);
        
        $tipoDoc1 = $comprador1->tipoDocumento()->first();
        $tipoDoc2 = $comprador2->tipoDocumento()->first();
        $tipoDoc3 = $comprador3->tipoDocumento()->first();
        $tipoDoc4 = $comprador4->tipoDocumento()->first();
        $tipoDoc5 = $comprador5->tipoDocumento()->first();
        
        $tipoDocNombre1 = $tipoDoc1 ? $tipoDoc1->nombre : 'DNI';
        $tipoDocNombre2 = $tipoDoc2 ? $tipoDoc2->nombre : 'DNI';
        $tipoDocNombre3 = $tipoDoc3 ? $tipoDoc3->nombre : 'DNI';
        $tipoDocNombre4 = $tipoDoc4 ? $tipoDoc4->nombre : 'DNI';
        $tipoDocNombre5 = $tipoDoc5 ? $tipoDoc5->nombre : 'DNI';
        
        // Preparar datos de cada comprador
        $datos1 = "";
        $firma1 = "";
        if ($comprador1->tipo_documento_id == 3) {
            if (!empty($comprador1->nombre_representante)) {
                $tipoDocRep1 = $comprador1->tipo_documento_id_representante == 1 ? 'DNI' : 'NIE';
                $nombreCompleto1 = strtoupper($nombreCompleto1);
                $datos1 = "la mercantil {$nombreCompleto1}, con {$tipoDocNombre1} número {$comprador1->numero_documento}, representada en este acto por D./Dª. {$comprador1->nombre_representante}, con {$tipoDocRep1} número {$comprador1->numero_documento_representante}";
                // Cambio aquí: solo mostrar la empresa en la firma
                $firma1 = "La mercantil {$nombreCompleto1}";
            } else {
                $datos1 = "la mercantil {$nombreCompleto1}, con {$tipoDocNombre1} número {$comprador1->numero_documento}";
                $firma1 = "La mercantil {$nombreCompleto1}";
            }
        } else {
            $datos1 = "D./Dª. {$nombreCompleto1}, con {$tipoDocNombre1} número {$comprador1->numero_documento}";
            $firma1 = "D./Dª. {$nombreCompleto1}";
        }
        
        $datos2 = "";
        $firma2 = "";
        if ($comprador2->tipo_documento_id == 3) {
            if (!empty($comprador2->nombre_representante)) {
                $tipoDocRep2 = $comprador2->tipo_documento_id_representante == 1 ? 'DNI' : 'NIE';
                $nombreCompleto2 = strtoupper($nombreCompleto2);
                $datos2 = "la mercantil {$nombreCompleto2}, con {$tipoDocNombre2} número {$comprador2->numero_documento}, representada en este acto por D./Dª. {$comprador2->nombre_representante}, con {$tipoDocRep2} número {$comprador2->numero_documento_representante}";
                // Cambio aquí: solo mostrar la empresa en la firma
                $firma2 = "La mercantil {$nombreCompleto2}";
            } else {
                $datos2 = "la mercantil {$nombreCompleto2}, con {$tipoDocNombre2} número {$comprador2->numero_documento}";
                $firma2 = "La mercantil {$nombreCompleto2}";
            }
        } else {
            $datos2 = "D./Dª. {$nombreCompleto2}, con {$tipoDocNombre2} número {$comprador2->numero_documento}";
            $firma2 = "D./Dª. {$nombreCompleto2}";
        }
        
        $datos3 = "";
        $firma3 = "";
        if ($comprador3->tipo_documento_id == 3) {
            if (!empty($comprador3->nombre_representante)) {
                $tipoDocRep3 = $comprador3->tipo_documento_id_representante == 1 ? 'DNI' : 'NIE';
                $nombreCompleto3 = strtoupper($nombreCompleto3);
                $datos3 = "la mercantil {$nombreCompleto3}, con {$tipoDocNombre3} número {$comprador3->numero_documento}, representada en este acto por D./Dª. {$comprador3->nombre_representante}, con {$tipoDocRep3} número {$comprador3->numero_documento_representante}";
                // Cambio aquí: solo mostrar la empresa en la firma
                $firma3 = "La mercantil {$nombreCompleto3}";
            } else {
                $datos3 = "la mercantil {$nombreCompleto3}, con {$tipoDocNombre3} número {$comprador3->numero_documento}";
                $firma3 = "La mercantil {$nombreCompleto3}";
            }
        } else {
            $datos3 = "D./Dª. {$nombreCompleto3}, con {$tipoDocNombre3} número {$comprador3->numero_documento}";
            $firma3 = "D./Dª. {$nombreCompleto3}";
        }
        
        $datos4 = "";
        $firma4 = "";
        if ($comprador4->tipo_documento_id == 3) {
            if (!empty($comprador4->nombre_representante)) {
                $tipoDocRep4 = $comprador4->tipo_documento_id_representante == 1 ? 'DNI' : 'NIE';
                $nombreCompleto4 = strtoupper($nombreCompleto4);
                $datos4 = "la mercantil {$nombreCompleto4}, con {$tipoDocNombre4} número {$comprador4->numero_documento}, representada en este acto por D./Dª. {$comprador4->nombre_representante}, con {$tipoDocRep4} número {$comprador4->numero_documento_representante}";
                // Cambio aquí: solo mostrar la empresa en la firma
                $firma4 = "La mercantil {$nombreCompleto4}";
            } else {
                $datos4 = "la mercantil {$nombreCompleto4}, con {$tipoDocNombre4} número {$comprador4->numero_documento}";
                $firma4 = "La mercantil {$nombreCompleto4}";
            }
        } else {
            $datos4 = "D./Dª. {$nombreCompleto4}, con {$tipoDocNombre4} número {$comprador4->numero_documento}";
            $firma4 = "D./Dª. {$nombreCompleto4}";
        }
        
        $datos5 = "";
        $firma5 = "";
        if ($comprador5->tipo_documento_id == 3) {
            if (!empty($comprador5->nombre_representante)) {
                $tipoDocRep5 = $comprador5->tipo_documento_id_representante == 1 ? 'DNI' : 'NIE';
                $nombreCompleto5 = strtoupper($nombreCompleto5);
                $datos5 = "la mercantil {$nombreCompleto5}, con {$tipoDocNombre5} número {$comprador5->numero_documento}, representada en este acto por D./Dª. {$comprador5->nombre_representante}, con {$tipoDocRep5} número {$comprador5->numero_documento_representante}";
                // Cambio aquí: solo mostrar la empresa en la firma
                $firma5 = "La mercantil {$nombreCompleto5}";
            } else {
                $datos5 = "la mercantil {$nombreCompleto5}, con {$tipoDocNombre5} número {$comprador5->numero_documento}";
                $firma5 = "La mercantil {$nombreCompleto5}";
            }
        } else {
            $datos5 = "D./Dª. {$nombreCompleto5}, con {$tipoDocNombre5} número {$comprador5->numero_documento}";
            $firma5 = "D./Dª. {$nombreCompleto5}";
        }
        
        $datosCompradores = "{$datos1}, {$datos2}, {$datos3}, {$datos4}, y {$datos5}";
        $firmas = "{$firma1}<br><br><br><br><br><br><br>{$firma2}<br><br><br><br><br><br><br>{$firma3}<br><br><br><br><br><br><br>{$firma4}<br><br><br><br><br><br><br>{$firma5}";
        break;
}

        
        // Añadir las variables a los datos para la vista
        $data['datosCompradores'] = $datosCompradores;
        $data['firmas'] = $firmas;
        
        // Generar un nombre para el archivo PDF con el ID de la oferta
        $today = Carbon::now()->format('Ymd');
        $primerComprador = $compradores[0];
        $nombreComprador = str_replace(' ', '_', $this->obtenerNombreCompleto($primerComprador));
            
        $path_contrato = $today . '_' . $nombreComprador . '_oferta_compra_' . $ofertaCompra->id . '_ref_' . $ofertaCompra->inmueble_id . '.pdf';
        $path_contrato = preg_replace('/[^a-zA-Z0-9_\-\.]/', '_', $path_contrato);
        
        // Definir la ruta base para el storage
        $base_storage_path = '/home/u819346592/domains/iamoving.com/public_html/storage';
        
        // Crear directorio si no existe
        $directorio = 'ofertacompra/' . $ofertaCompra->id;
        $directorioCompleto = $base_storage_path . '/' . $directorio;
        
        if (!file_exists($directorioCompleto)) {
            mkdir($directorioCompleto, 0755, true);
            \Log::info('Directorio creado: ' . $directorioCompleto);
        }
        
        // Crear directorio temporal para mPDF si no existe
        $tempDir = $base_storage_path . '/temp';
        if (!file_exists($tempDir)) {
            mkdir($tempDir, 0755, true);
            \Log::info('Directorio temporal creado: ' . $tempDir);
        }
        
        // Renderizar la vista a HTML
        $html = view('iamovingpro.ofertacompra.oferta', $data)->render();
        
        // Verificar que estamos obteniendo contenido HTML
        if (empty($html)) {
            \Log::error('La vista renderizada está vacía');
            return false;
        }
        
        // Configuración de mPDF
        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4',
            'margin_left' => 15,
            'margin_right' => 15,
            'margin_top' => 15,
            'margin_bottom' => 15,
            'default_font' => 'dejavusans',
            'tempDir' => $tempDir,
            'orientation' => 'P', // P para portrait (vertical) o L para landscape (horizontal)
            'setAutoTopMargin' => 'stretch', // Ajusta automáticamente los márgenes superiores
            'setAutoBottomMargin' => 'stretch', // Ajusta automáticamente los márgenes inferiores
        ]);
        
        // Añadir el HTML al PDF
        $mpdf->WriteHTML($html);
        
        // Ruta completa donde se guardará el PDF
        $rutaArchivo = $directorioCompleto . '/' . $path_contrato;
        
        // Guardar el PDF
        $mpdf->Output($rutaArchivo, \Mpdf\Output\Destination::FILE);
        
        // Verificar si el archivo se creó y tiene contenido
        if (file_exists($rutaArchivo) && filesize($rutaArchivo) > 0) {
            \Log::info('PDF generado correctamente: ' . $rutaArchivo . ' - Tamaño: ' . filesize($rutaArchivo) . ' bytes');
            
            // También guardar usando Storage para asegurar que está en el lugar correcto
            $content = file_get_contents($rutaArchivo);
            Storage::disk('public')->put($directorio . '/' . $path_contrato, $content);
            
            // Guardar la ruta completa del archivo en la oferta
            $ofertaCompra->path_oferta = $rutaArchivo;
            $ofertaCompra->save();
            
            // Obtener el primer nombre del primer comprador
            $primerComprador = $compradores[0];
            $nombreCompleto = $primerComprador->nombre;
            
            // Extraer solo la primera palabra del nombre
            $primerNombre = explode(' ', trim($nombreCompleto))[0];
            
            // Convertir a minúsculas y luego capitalizar la primera letra
            $primerNombre = ucfirst(mb_strtolower($primerNombre, 'UTF-8'));
            
            \Log::info('Nombre del primer comprador para el correo: ' . $primerNombre);
            
            // Enviar correo electrónico con el PDF adjunto
try {
    \Log::info('Preparando envío de correo electrónico con PHPMailer');
    
    // Lista de destinatarios
    // Lista de destinatarios condicional
    if ($ofertaCompra->test_email) {
        // Destinatarios de prueba
        $destinatarios = [
            'benjamindevega@gmail.com',
            // Otros correos de prueba si es necesario
        ];
    } else {
        $destinatarios = [
            $ofertaCompra->email_contacto,
            'roberto@iamoving.com',
            'juridico@iamoving.com'
        ];
    }
    // Destinatario en copia oculta
    $copiaOculta = 'fataer@gmail.com';
    
    // Filtrar destinatarios vacíos
    $destinatarios = array_filter($destinatarios, function($email) {
        return !empty($email);
    });
    
    // Si no hay destinatarios válidos, registrar un error
    if (empty($destinatarios)) {
        \Log::error('No hay destinatarios válidos para enviar el correo');
        return true; // Aún así, consideramos que el PDF se generó correctamente
    }
    
    // Construir asunto del correo
    $subject = 'Oferta de Compra Ref. ' . $ofertaCompra->inmueble_id;
    
    // Separar el destinatario principal (comprador) de los demás
    $destinatarioPrincipal = $ofertaCompra->email_contacto;
    $otrosDestinatarios = array_filter($destinatarios, function($email) use ($destinatarioPrincipal) {
        return !empty($email) && $email !== $destinatarioPrincipal;
    });
    
    // Verificar que el destinatario principal existe
    if (empty($destinatarioPrincipal)) {
        // Si no hay destinatario principal, usar el primer destinatario disponible
        $destinatarioPrincipal = reset($destinatarios);
        $otrosDestinatarios = array_filter($destinatarios, function($email) use ($destinatarioPrincipal) {
            return $email !== $destinatarioPrincipal;
        });
    }
    
    // Obtener el primer nombre del primer comprador
    $primerComprador = $compradores[0];
    $nombreCompleto = $primerComprador->nombre;
    
    // Extraer solo la primera palabra del nombre
    $primerNombre = explode(' ', trim($nombreCompleto))[0];
    
    // Convertir a minúsculas y luego capitalizar la primera letra
    $primerNombre = ucfirst(mb_strtolower($primerNombre, 'UTF-8'));
    
    // Cargar la plantilla de correo y reemplazar variables
    $template = file_get_contents(resource_path('views/emails/oferta_comprador.blade.php'));
    $template = str_replace(['{{ isset($primerNombre) ? \' \' . $primerNombre : \'\' }}', '<?php echo date(\'Y\')?>'], 
                          [' ' . $primerNombre, date('Y')], 
                          $template);
    
    // Obtener el contenido del archivo PDF
    $pdfContent = file_get_contents("https://iamoving.com/storage/ofertacompra/".$ofertaCompra->id."/".$path_contrato);
    $pdfFilename = 'Oferta Compra Ref. '.$ofertaCompra->inmueble_id.'.pdf';
    
    \Log::info('Enviando correo desde roberto@iamoving.com a: ' . $destinatarioPrincipal . ' con copia a: ' . implode(', ', $otrosDestinatarios) . ' y copia oculta a: ' . $copiaOculta);
    
    // Usar el servicio directo para enviar el correo
    $mailEnviado = \App\Services\DirectMailService::sendMail(
        $destinatarioPrincipal,
        $otrosDestinatarios,
        $copiaOculta,
        $subject,
        $template,
        $pdfContent,
        $pdfFilename
    );
    
    if ($mailEnviado) {
        \Log::info('Correo enviado correctamente con PHPMailer');
    } else {
        \Log::error('Error al enviar correo electrónico con PHPMailer');
    }

} catch (\Exception $e) {
    \Log::error('Error al enviar correo electrónico: ' . $e->getMessage());
    \Log::error('Traza del error de correo: ' . $e->getTraceAsString());
    // No retornamos false aquí porque el PDF se generó correctamente
}
            return true;
        } else {
            \Log::error('Error: El archivo PDF no se generó correctamente en: ' . $rutaArchivo);
            if (file_exists($rutaArchivo)) {
                \Log::error('El archivo existe pero su tamaño es: ' . filesize($rutaArchivo) . ' bytes');
            }
            return false;
        }
    } catch (\Exception $e) {
        \Log::error('Error al generar PDF de oferta de compra: ' . $e->getMessage());
        \Log::error('Traza: ' . $e->getTraceAsString());
        return false;
    }

}

    public function show_ini($id)
    {
        Session::put('ofertacompra_url', request()->fullUrl());
		$detalle = InformeDetalladoCabecera::where('id',$id)->where('published',true)->get();

        if ($detalle->count()>0) {
            $detalle = $detalle->first();
            $ciudad = "Madrid";
            if($detalle->ciudad_inmueble){
                $ciudad = Ciudad::find($detalle->ciudad_inmueble)->name;
            }
            
            if(strlen(trim($detalle->estado_inmueble)) > 0 && strtolower(trim($detalle->estado_inmueble)) == 'registro'){
                
                return view('iamovingpro.ofertacompra.registro', compact(['detalle','ciudad']));
                    
            }else{

                $services = \App\Servicio::find([
                    ($detalle->is_sale == 1 ? 1 : 2),
                    3
                ]);
                
                if ($detalle->barrios) {
                    $area = \App\Zone::find($detalle->barrios);
    				if($detalle->hay_transporte>0) {
    					$transportes = \App\InformeDetalladoDetalle::where('fk_id_informe_detallado_cabecera', $id)
    					//$transportes = \App\InformeDetalladoDetalle::where('fk_id_informe_detallado_cabecera','=', 1049)
    											->where('type','=','23')
    																						->where('tipo_transporte','!=','null')
    																						->orderBy('tipo_transporte', 'asc')
                                                ->get();
        
    					return view('iamovingpro.ofertacompra.show', compact(['detalle', 'services', 'area','transportes','ciudad']));
    				}
    				else
    				{
    					return view('iamovingpro.ofertacompra.show', compact(['detalle', 'services', 'area','ciudad']));
    				}
    			}
    			else
    			{
    				if($detalle->hay_transporte>0) {
    			   $transportes = \App\InformeDetalladoDetalle::where('fk_id_informe_detallado_cabecera', $id)
    				//$transportes = \App\InformeDetalladoDetalle::where('fk_id_informe_detallado_cabecera','=', 1049)
    											->where('type','=','23')
    																						->where('tipo_transporte','!=','null')
    																						->orderBy('tipo_transporte', 'asc')
    											->get();
    	
    					return view('iamovingpro.ofertacompra.show', compact(['detalle', 'services', 'transportes','ciudad']));
    				}
    				
    			}
    			
    			if($detalle->hay_transporte>0) {
                    $transportes = \App\InformeDetalladoDetalle::where('fk_id_informe_detallado_cabecera', $id)
    			    //$transportes = \App\InformeDetalladoDetalle::where('fk_id_informe_detallado_cabecera','=', 1049)
    											->where('type','=','23')
    																						->where('tipo_transporte','!=','null')
    																						->orderBy('tipo_transporte', 'asc')
                                                ->get();

					return view('iamovingpro.ofertacompra.show', compact(['detalle', 'services','transportes','ciudad']));

                }
				return view('iamovingpro.ofertacompra.show', compact(['detalle', 'services','ciudad']));
            }
        }

        abort(404);
//	return redirect('/');
    }	

    public function send(Request $request){
		//HAY QUE MULTIPLICAR LA FIANZA POR LA Oferta
		//CALCULAR EL IVA DE LA OFERTA TAMBIÉN
		//FALTA LA REFERENCIA
		//FALTAN ESTOS DOS CAMPOS
		$inmueble_id = $request->referencia;
		$email = $request->email;
        $name = $request->name;
		$name2 = $request->name2;
		$name3 = $request->name3;
		$name4 = $request->name4;
		$name5 = $request->name5;
		$id = $request->referencia;
		$numero_arrendatarios = $request->numero_arrendatarios;
		$avalistas = $request->avalistas;
		//$fecha_entrada = str_replace("/20", "/", $request->date);
		$fecha_entrada = str_replace("/", "-", $request->date);
		$importe =  $request->importe;
		$fianza =$request->fianza;
		$email_propietario=$request->email_e;	
		$iva=21;
		$nombre_calle =$request->road;
		$numero_calle = $request->numero_direccion;
		$piso_calle =$request->number_apartment;
		$ciudad=$request->ciudad;
		$codigo_postal=$request->codigo_postal;
		
		$dni = $request->nif;
		$dni2 = $request->nif2;
		$dni3 = $request->nif3;
		$dni4 = $request->nif4;
		$dni5 = $request->nif5;
		//MODULO DE IDENTIFICACION DE DOCUMENTO ACREDITATIVO
		$idDoc="documento";
		 if (isset($dni)) {
			if ( substr(strtoupper($dni), 0, 1)=="X" or substr(strtoupper($dni), 0, 1)=="Y"){
				$idDoc="NIE";
			}
			elseif ( substr(strtoupper($dni), 0, 1)=="0" or substr(strtoupper($dni), 0, 1)=="1" or substr(strtoupper($dni), 0, 1)=="2" or substr(strtoupper($dni), 0, 1)=="3" or substr(strtoupper($dni), 0, 1)=="4" or substr(strtoupper($dni), 0, 1)=="5" or substr(strtoupper($dni), 0, 1)=="6" or substr(strtoupper($dni), 0, 1)=="7" or substr(strtoupper($dni), 0, 1)=="8"  or substr(strtoupper($dni), 0, 1)=="9"){
				$idDoc="DNI";
			}
		}
		
		$idDoc2="documento";
		 if (isset($dni2)) {
			if ( substr(strtoupper($dni2), 0, 1)=="X" or substr(strtoupper($dni2), 0, 1)=="Y"){
				$idDoc2="NIE";
			}
			elseif ( substr(strtoupper($dni2), 0, 1)=="0" or substr(strtoupper($dni2), 0, 1)=="1" or substr(strtoupper($dni2), 0, 1)=="2" or substr(strtoupper($dni2), 0, 1)=="3" or substr(strtoupper($dni2), 0, 1)=="4" or substr(strtoupper($dni2), 0, 1)=="5" or substr(strtoupper($dni2), 0, 1)=="6" or substr(strtoupper($dni2), 0, 1)=="7" or substr(strtoupper($dni2), 0, 1)=="8"  or substr(strtoupper($dni2), 0, 1)=="9"){
				$idDoc2="DNI";
			}
		}
		
		$idDoc3="documento";
		 if (isset($dni3)) {
			if ( substr(strtoupper($dni3), 0, 1)=="X" or substr(strtoupper($dni3), 0, 1)=="Y"){
				$idDoc3="NIE";
			}
			elseif ( substr(strtoupper($dni3), 0, 1)=="0" or substr(strtoupper($dni3), 0, 1)=="1" or substr(strtoupper($dni3), 0, 1)=="2" or substr(strtoupper($dni3), 0, 1)=="3" or substr(strtoupper($dni3), 0, 1)=="4" or substr(strtoupper($dni3), 0, 1)=="5" or substr(strtoupper($dni3), 0, 1)=="6" or substr(strtoupper($dni3), 0, 1)=="7" or substr(strtoupper($dni3), 0, 1)=="8"  or substr(strtoupper($dni3), 0, 1)=="9"){
				$idDoc3="DNI";
			}
		}

		$idDoc4="documento";
		 if (isset($dni4)) {
			if ( substr(strtoupper($dni4), 0, 1)=="X" or substr(strtoupper($dni4), 0, 1)=="Y"){
				$idDoc4="NIE";
			}
			elseif ( substr(strtoupper($dni4), 0, 1)=="0" or substr(strtoupper($dni4), 0, 1)=="1" or substr(strtoupper($dni4), 0, 1)=="2" or substr(strtoupper($dni4), 0, 1)=="3" or substr(strtoupper($dni4), 0, 1)=="4" or substr(strtoupper($dni4), 0, 1)=="5" or substr(strtoupper($dni4), 0, 1)=="6" or substr(strtoupper($dni4), 0, 1)=="7" or substr(strtoupper($dni4), 0, 1)=="8"  or substr(strtoupper($dni4), 0, 1)=="9"){
				$idDoc4="DNI";
			}
		}

		$idDoc5="documento";
		 if (isset($dni5)) {
			if ( substr(strtoupper($dni5), 0, 1)=="X" or substr(strtoupper($dni5), 0, 1)=="Y"){
				$idDoc5="NIE";
			}
			elseif ( substr(strtoupper($dni5), 0, 1)=="0" or substr(strtoupper($dni5), 0, 1)=="1" or substr(strtoupper($dni5), 0, 1)=="2" or substr(strtoupper($dni5), 0, 1)=="3" or substr(strtoupper($dni5), 0, 1)=="4" or substr(strtoupper($dni5), 0, 1)=="5" or substr(strtoupper($dni5), 0, 1)=="6" or substr(strtoupper($dni5), 0, 1)=="7" or substr(strtoupper($dni5), 0, 1)=="8"  or substr(strtoupper($dni5), 0, 1)=="9"){
				$idDoc5="DNI";
			}
		}		
		//MODULO DE IDENTIFICACION DE DOCUMENTO ACREDITATIVO
		$today_1 = Carbon::now()->format('d-m-Y');
		$num = date("d", strtotime($today_1));
		$anno = date("Y", strtotime($today_1));
		$num_entrada = date("d", strtotime($fecha_entrada));
		$anno_entrada = date("Y", strtotime($fecha_entrada));
		$mes = array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');
		$mes = $mes[(date('m', strtotime($today_1)) * 1) - 1];
		$mes_entrada = array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');
		$mes_entrada = $mes_entrada[(date('m', strtotime($fecha_entrada)) * 1) - 1];		
		$fecha_letra= $num . ' de ' . $mes . ' del ' . $anno;
		$fecha_entrada_letra= $num_entrada . ' de ' . $mes_entrada . ' del ' . $anno_entrada;
		$path_contrato = $today_1.'_'.$name.'_oferta_ref_'.$id.'.pdf';
				
        	
		//Grabar
		    $oferta = new Oferta();
			$oferta->inmueble_id = $inmueble_id;
			$oferta->email = $email;
			$oferta->name = $name;
			$oferta->name2 = $name2;
			$oferta->name3 = $name4;
			$oferta->name4 = $name4;
			$oferta->name5 = $name5;
			
			$oferta->dni = $dni;
			$oferta->dni2 = $dni2;
			$oferta->dni3 = $dni3;
			$oferta->dni4 = $dni4;
			$oferta->dni5 = $dni5;
			$oferta->numero_arrendatarios = $numero_arrendatarios;
			$oferta->avalistas = $avalistas;
			$oferta->fecha_entrada = $fecha_entrada;
			$oferta->importe = $importe;
			$oferta->fianza = $fianza;
			$oferta->email_propietario = $email_propietario;
			$oferta->iva = $iva;
			$oferta->nombre_calle = $nombre_calle;
			$oferta->numero_calle = $numero_calle;
			$oferta->piso_calle = $piso_calle;
			$oferta->ciudad = $ciudad;
			$oferta->codigo_postal = $codigo_postal;
			$direccion_completa=$nombre_calle.', '.$numero_calle.', Piso '.$piso_calle.' - '.$codigo_postal.' '.$ciudad;
			$oferta->direccion_completa = $direccion_completa;
			
			$importe_fianza=$importe*$fianza;
			$oferta->total_fianza = $importe_fianza;
			$importe_iva=$importe*$iva/100;
			$oferta->importe_iva = $importe_iva;
			$total=$importe*$fianza + $importe*$iva/100;
			$oferta->importe_total =$total;
			
			
			$oferta->aceptadas_condiciones = Carbon::now()->format('Y-m-d H:i:s');
			$oferta->path_contrato = $path_contrato;
			$oferta->numero_arrendatarios = $numero_arrendatarios;

			
			$oferta->save();
			
            if($request->hasFile('nif_img')){
                $nifs = $request->file('nif_img');
                foreach ($nifs as $idx=>$nif) {
                    $nif->storeAs('oferta/'.$oferta->id.'/nif', $nif->getClientOriginalName());
                    $path = "oferta/". $oferta->id ."/nif/" .$nif->getClientOriginalName();
                    if($idx == 0){
                        $oferta->nif_image = $path;
                    }elseif($idx == 1){
                        $oferta->nif_image2 = $path;
                    }else if($idx == 2){
                        $oferta->nif2_image = $path;
                    }else if($idx == 3){
                        $oferta->nif2_image2 = $path;
                    }else if($idx == 4){
                        $oferta->nif3_image = $path;
                    }else if($idx == 5){
                        $oferta->nif3_image2 = $path;
                    }else if($idx == 6){
                        $oferta->nif4_image = $path;
                    }else if($idx == 7){
                        $oferta->nif4_image2 = $path;
                    }else if($idx == 8){
                        $oferta->nif5_image = $path;
                    }else if($idx == 9){
                        $oferta->nif5_image2 = $path;
                    }                
					
                    $oferta->save();
                    
                }
    
            }
			
            if($request->hasFile('contrato_img')){
                $contratos = $request->file('contrato_img');
                foreach ($contratos as $idx=>$contrato) {
                    $contrato->storeAs('oferta/'.$oferta->id.'/contrato', $contrato->getClientOriginalName());
                    $path = "oferta/". $oferta->id ."/contrato/" .$contrato->getClientOriginalName();
                    if($idx == 0){
                        $oferta->contrato_image = $path;
                    }elseif($idx == 1){
                        $oferta->contrato_image2 = $path;
                    }else if($idx == 2){
                        $oferta->contrato2_image = $path;
                    }else if($idx == 3){
                        $oferta->contrato2_image2 = $path;
                    }else if($idx == 4){
                        $oferta->contrato3_image = $path;
                    }else if($idx == 5){
                        $oferta->contrato3_image2 = $path;
                    }else if($idx == 6){
                        $oferta->contrato4_image = $path;
                    }else if($idx == 7){
                        $oferta->contrato4_image2 = $path;
                    }else if($idx == 8){
                        $oferta->contrato5_image = $path;
                    }else if($idx == 9){
                        $oferta->contrato5_image2 = $path;
                    }                
					
                    $oferta->save();
                    
                }
    
            }

            if($request->hasFile('nomina_img')){
                $nominas = $request->file('nomina_img');
                foreach ($nominas as $idx=>$nomina) {
                    $nomina->storeAs('oferta/'.$oferta->id.'/nomina', $nomina->getClientOriginalName());
                    $path = "oferta/". $oferta->id ."/nomina/" .$nomina->getClientOriginalName();
                    if($idx == 0){
                        $oferta->nomina_image = $path;
                    }elseif($idx == 1){
                        $oferta->nomina_image2 = $path;
                    }else if($idx == 2){
                        $oferta->nomina2_image = $path;
                    }else if($idx == 3){
                        $oferta->nomina2_image2 = $path;
                    }else if($idx == 4){
                        $oferta->nomina3_image = $path;
                    }else if($idx == 5){
                        $oferta->nomina3_image2 = $path;
                    }else if($idx == 6){
                        $oferta->nomina4_image = $path;
                    }else if($idx == 7){
                        $oferta->nomina4_image2 = $path;
                    }else if($idx == 8){
                        $oferta->nomina5_image = $path;
                    }else if($idx == 9){
                        $oferta->nomina5_image2 = $path;
                    }                
					
                    $oferta->save();
                    
                }
    
            }

            if($request->hasFile('nif_img_aval')){
                $nifs_aval = $request->file('nif_img_aval');
                foreach ($nifs_aval as $idx=>$nif_aval) {
                    $nif_aval->storeAs('oferta/'.$oferta->id."/nif_aval", $nif_aval->getClientOriginalName());
                    $path = "oferta/". $oferta->id ."/nif_aval/" .$nif_aval->getClientOriginalName();
                    if($idx == 0){
                        $oferta->nif_aval_image = $path;
                    }elseif($idx == 1){
                        $oferta->nif_aval_image2 = $path;
                    }else if($idx == 2){
                        $oferta->nif2_aval_image = $path;
                    }else if($idx == 3){
                        $oferta->nif2_aval_image2 = $path;
                    }else if($idx == 4){
                        $oferta->nif3_aval_image = $path;
                    }else if($idx == 5){
                        $oferta->nif3_aval_image2 = $path;
                    }else if($idx == 6){
                        $oferta->nif4_aval_image = $path;
                    }else if($idx == 7){
                        $oferta->nif4_aval_image2 = $path;
                    }else if($idx == 8){
                        $oferta->nif5_aval_image = $path;
                    }else if($idx == 9){
                        $oferta->nif5_aval_image2 = $path;
                    }                
					
                    $oferta->save();
                    
                }
    
            }
			
            if($request->hasFile('contrato_img_aval')){
                $contratos_aval = $request->file('contrato_img_aval');
                foreach ($contratos_aval as $idx=>$contrato_aval) {
                    $contrato_aval->storeAs('oferta/'.$oferta->id.'/contrato_aval', $contrato_aval->getClientOriginalName());
                    $path = "oferta/". $oferta->id ."/contrato_aval/" .$contrato_aval->getClientOriginalName();
                    if($idx == 0){
                        $oferta->contrato_aval_image = $path;
                    }elseif($idx == 1){
                        $oferta->contrato_aval_image2 = $path;
                    }else if($idx == 2){
                        $oferta->contrato2_aval_image = $path;
                    }else if($idx == 3){
                        $oferta->contrato2_aval_image2 = $path;
                    }else if($idx == 4){
                        $oferta->contrato3_aval_image = $path;
                    }else if($idx == 5){
                        $oferta->contrato3_aval_image2 = $path;
                    }else if($idx == 6){
                        $oferta->contrato4_aval_image = $path;
                    }else if($idx == 7){
                        $oferta->contrato4_aval_image2 = $path;
                    }else if($idx == 8){
                        $oferta->contrato5_aval_image = $path;
                    }else if($idx == 9){
                        $oferta->contrato5_aval_image2 = $path;
                    }                
					
                    $oferta->save();
                    
                }
    
            }			
			
            if($request->hasFile('nomina_img_aval')){
                $nominas_aval = $request->file('nomina_img_aval');
                foreach ($nominas_aval as $idx=>$nomina_aval) {
                    $nomina_aval->storeAs('oferta/'.$oferta->id.'/nomina_aval', $nomina_aval->getClientOriginalName());
                    $path = "oferta/". $oferta->id ."/nomina_aval/" .$nomina_aval->getClientOriginalName();
                    if($idx == 0){
                        $oferta->nomina_aval_image = $path;
                    }elseif($idx == 1){
                        $oferta->nomina_aval_image2 = $path;
                    }else if($idx == 2){
                        $oferta->nomina2_aval_image = $path;
                    }else if($idx == 3){
                        $oferta->nomina2_aval_image2 = $path;
                    }else if($idx == 4){
                        $oferta->nomina3_aval_image = $path;
                    }else if($idx == 5){
                        $oferta->nomina3_aval_image2 = $path;
                    }else if($idx == 6){
                        $oferta->nomina4_aval_image = $path;
                    }else if($idx == 7){
                        $oferta->nomina4_aval_image2 = $path;
                    }else if($idx == 8){
                        $oferta->nomina5_aval_image = $path;
                    }else if($idx == 9){
                        $oferta->nomina5_aval_image2 = $path;
                    }                
					
                    $oferta->save();
                    
                }
    
            }
			
			
			$content = PDF::loadView('iamovingpro.ofertacompra.oferta', compact(['name','dni','idDoc','name2','dni2','idDoc2','name3','dni3','idDoc3','name4','dni4','idDoc4','name5','dni5','idDoc5','direccion_completa','importe_iva','total','importe_fianza','numero_arrendatarios','fecha_letra','name','email','dni','inmueble_id','fecha_entrada_letra','importe','fianza','iva']))->output();
			$path_contrato= str_replace(" ", "_", $path_contrato);			
			Storage::disk('public')->put('/oferta/'.$oferta->id.'/'.$path_contrato, $content);			
			$num_oferta=$oferta->id;
			//TODO DESCOMENTAR!!!!
			//TODO CAMBIAR POR MAIL_PU --> $mail_to = explode(",",env('MAIL_PU'));
			$mail_to = explode(",",env('MAIL_PU'));
            $bcc = explode(",",env('MAIL_OCULTO'));
            
        
            $nif_image = null;
            $nif_image2 = null;
			$nif2_image = null;
            $nif2_image2 = null;
            $nif3_image = null;
			$nif3_image2 = null;
            $nif4_image = null;
            $nif4_image2 = null;
			$nif5_image = null;
            $nif5_image2 = null;

            if($oferta->nif_image!=''){
                $nif_image = url('/') . "/storage/" . $oferta->nif_image;
            }
            if($oferta->nif_image2!=''){
                $nif_image2 = url('/') . "/storage/" . $oferta->nif_image2;
            }
            if($oferta->nif2_image!=''){
                $nif2_image = url('/') . "/storage/" . $oferta->nif2_image;
            }
            if($oferta->nif2_image2!=''){
                $nif2_image2 = url('/') . "/storage/" . $oferta->nif2_image2;
            }			
            if($oferta->nif3_image!=''){
                $nif3_image = url('/') . "/storage/" . $oferta->nif3_image;
            }
            if($oferta->nif3_image2!=''){
                $nif3_image2 = url('/') . "/storage/" . $oferta->nif3_image2;
            }			
            if($oferta->nif4_image!=''){
                $nif4_image = url('/') . "/storage/" . $oferta->nif4_image;
            }
            if($oferta->nif4_image2!=''){
                $nif4_image2 = url('/') . "/storage/" . $oferta->nif4_image2;
            }			
            if($oferta->nif5_image!=''){
                $nif5_image = url('/') . "/storage/" . $oferta->nif5_image;
            }
            if($oferta->nif5_image2!=''){
                $nif5_image2 = url('/') . "/storage/" . $oferta->nif5_image2;
            }	

            $contrato_image = null;
            $contrato_image2 = null;
			$contrato2_image = null;
            $contrato2_image2 = null;
            $contrato3_image = null;
			$contrato3_image2 = null;
            $contrato4_image = null;
            $contrato4_image2 = null;
			$contrato5_image = null;
            $contrato5_image2 = null;

            if($oferta->contrato_image!=''){
                $contrato_image = url('/') . "/storage/" . $oferta->contrato_image;
            }
            if($oferta->contrato_image2!=''){
                $contrato_image2 = url('/') . "/storage/" . $oferta->contrato_image2;
            }
            if($oferta->contrato2_image!=''){
                $contrato2_image = url('/') . "/storage/" . $oferta->contrato2_image;
            }
            if($oferta->contrato2_image2!=''){
                $contrato2_image2 = url('/') . "/storage/" . $oferta->contrato2_image2;
            }			
            if($oferta->contrato3_image!=''){
                $contrato3_image = url('/') . "/storage/" . $oferta->contrato3_image;
            }
            if($oferta->contrato3_image2!=''){
                $contrato3_image2 = url('/') . "/storage/" . $oferta->contrato3_image2;
            }			
            if($oferta->contrato4_image!=''){
                $contrato4_image = url('/') . "/storage/" . $oferta->contrato4_image;
            }
            if($oferta->contrato4_image2!=''){
                $contrato4_image2 = url('/') . "/storage/" . $oferta->contrato4_image2;
            }			
            if($oferta->contrato5_image!=''){
                $contrato5_image = url('/') . "/storage/" . $oferta->contrato5_image;
            }
            if($oferta->contrato5_image2!=''){
                $contrato5_image2 = url('/') . "/storage/" . $oferta->contrato5_image2;
            }

            $nomina_image = null;
            $nomina_image2 = null;
			$nomina2_image = null;
            $nomina2_image2 = null;
            $nomina3_image = null;
			$nomina3_image2 = null;
            $nomina4_image = null;
            $nomina4_image2 = null;
			$nomina5_image = null;
            $nomina5_image2 = null;

            if($oferta->nomina_image!=''){
                $nomina_image = url('/') . "/storage/" . $oferta->nomina_image;
            }
            if($oferta->nomina_image2!=''){
                $nomina_image2 = url('/') . "/storage/" . $oferta->nomina_image2;
            }
            if($oferta->nomina2_image!=''){
                $nomina2_image = url('/') . "/storage/" . $oferta->nomina2_image;
            }
            if($oferta->nomina2_image2!=''){
                $nomina2_image2 = url('/') . "/storage/" . $oferta->nomina2_image2;
            }			
            if($oferta->nomina3_image!=''){
                $nomina3_image = url('/') . "/storage/" . $oferta->nomina3_image;
            }
            if($oferta->nomina3_image2!=''){
                $nomina3_image2 = url('/') . "/storage/" . $oferta->nomina3_image2;
            }			
            if($oferta->nomina4_image!=''){
                $nomina4_image = url('/') . "/storage/" . $oferta->nomina4_image;
            }
            if($oferta->nomina4_image2!=''){
                $nomina4_image2 = url('/') . "/storage/" . $oferta->nomina4_image2;
            }			
            if($oferta->nomina5_image!=''){
                $nomina5_image = url('/') . "/storage/" . $oferta->nomina5_image;
            }
            if($oferta->nomina5_image2!=''){
                $nomina5_image2 = url('/') . "/storage/" . $oferta->nomina5_image2;
            }	
			
            $nif_aval_image = null;
            $nif_aval_image2 = null;
			$nif2_aval_image = null;
            $nif2_aval_image2 = null;
            $nif3_aval_image = null;
			$nif3_aval_image2 = null;
            $nif4_aval_image = null;
            $nif4_aval_image2 = null;
			$nif5_aval_image = null;
            $nif5_aval_image2 = null;

            if($oferta->nif_aval_image!=''){
                $nif_aval_image = url('/') . "/storage/" . $oferta->nif_aval_image;
            }
            if($oferta->nif_aval_image2!=''){
                $nif_aval_image2 = url('/') . "/storage/" . $oferta->nif_aval_image2;
            }
            if($oferta->nif2_aval_image!=''){
                $nif2_aval_image = url('/') . "/storage/" . $oferta->nif2_aval_image;
            }
            if($oferta->nif2_aval_image2!=''){
                $nif2_aval_image2 = url('/') . "/storage/" . $oferta->nif2_aval_image2;
            }			
            if($oferta->nif3_aval_image!=''){
                $nif3_aval_image = url('/') . "/storage/" . $oferta->nif3_aval_image;
            }
            if($oferta->nif3_aval_image2!=''){
                $nif3_aval_image2 = url('/') . "/storage/" . $oferta->nif3_aval_image2;
            }			
            if($oferta->nif4_aval_image!=''){
                $nif4_aval_image = url('/') . "/storage/" . $oferta->nif4_aval_image;
            }
            if($oferta->nif4_aval_image2!=''){
                $nif4_aval_image2 = url('/') . "/storage/" . $oferta->nif4_aval_image2;
            }			
            if($oferta->nif5_aval_image!=''){
                $nif5_aval_image = url('/') . "/storage/" . $oferta->nif5_aval_image;
            }
            if($oferta->nif5_aval_image2!=''){
                $nif5_aval_image2 = url('/') . "/storage/" . $oferta->nif5_aval_image2;
            }				
			
            $contrato_aval_image = null;
            $contrato_aval_image2 = null;
			$contrato2_aval_image = null;
            $contrato2_aval_image2 = null;
            $contrato3_aval_image = null;
			$contrato3_aval_image2 = null;
            $contrato4_aval_image = null;
            $contrato4_aval_image2 = null;
			$contrato5_aval_image = null;
            $contrato5_aval_image2 = null;

            if($oferta->contrato_aval_image!=''){
                $contrato_aval_image = url('/') . "/storage/" . $oferta->contrato_aval_image;
            }
            if($oferta->contrato_aval_image2!=''){
                $contrato_aval_image2 = url('/') . "/storage/" . $oferta->contrato_aval_image2;
            }
            if($oferta->contrato2_aval_image!=''){
                $contrato2_aval_image = url('/') . "/storage/" . $oferta->contrato2_aval_image;
            }
            if($oferta->contrato2_aval_image2!=''){
                $contrato2_aval_image2 = url('/') . "/storage/" . $oferta->contrato2_aval_image2;
            }			
            if($oferta->contrato3_aval_image!=''){
                $contrato3_aval_image = url('/') . "/storage/" . $oferta->contrato3_aval_image;
            }
            if($oferta->contrato3_aval_image2!=''){
                $contrato3_aval_image2 = url('/') . "/storage/" . $oferta->contrato3_aval_image2;
            }			
            if($oferta->contrato4_aval_image!=''){
                $contrato4_aval_image = url('/') . "/storage/" . $oferta->contrato4_aval_image;
            }
            if($oferta->contrato4_aval_image2!=''){
                $contrato4_aval_image2 = url('/') . "/storage/" . $oferta->contrato4_aval_image2;
            }			
            if($oferta->contrato5_aval_image!=''){
                $contrato5_aval_image = url('/') . "/storage/" . $oferta->contrato5_aval_image;
            }
            if($oferta->contrato5_aval_image2!=''){
                $contrato5_aval_image2 = url('/') . "/storage/" . $oferta->contrato5_aval_image2;
            }				
			
            $nomina_aval_image = null;
            $nomina_aval_image2 = null;
			$nomina2_aval_image = null;
            $nomina2_aval_image2 = null;
            $nomina3_aval_image = null;
			$nomina3_aval_image2 = null;
            $nomina4_aval_image = null;
            $nomina4_aval_image2 = null;
			$nomina5_aval_image = null;
            $nomina5_aval_image2 = null;

            if($oferta->nomina_aval_image!=''){
                $nomina_aval_image = url('/') . "/storage/" . $oferta->nomina_aval_image;
            }
            if($oferta->nomina_aval_image2!=''){
                $nomina_aval_image2 = url('/') . "/storage/" . $oferta->nomina_aval_image2;
            }
            if($oferta->nomina2_aval_image!=''){
                $nomina2_aval_image = url('/') . "/storage/" . $oferta->nomina2_aval_image;
            }
            if($oferta->nomina2_aval_image2!=''){
                $nomina2_aval_image2 = url('/') . "/storage/" . $oferta->nomina2_aval_image2;
            }			
            if($oferta->nomina3_aval_image!=''){
                $nomina3_aval_image = url('/') . "/storage/" . $oferta->nomina3_aval_image;
            }
            if($oferta->nomina3_aval_image2!=''){
                $nomina3_aval_image2 = url('/') . "/storage/" . $oferta->nomina3_aval_image2;
            }			
            if($oferta->nomina4_aval_image!=''){
                $nomina4_aval_image = url('/') . "/storage/" . $oferta->nomina4_aval_image;
            }
            if($oferta->nomina4_aval_image2!=''){
                $nomina4_aval_image2 = url('/') . "/storage/" . $oferta->nomina4_aval_image2;
            }			
            if($oferta->nomina5_aval_image!=''){
                $nomina5_aval_image = url('/') . "/storage/" . $oferta->nomina5_aval_image;
            }
            if($oferta->nomina5_aval_image2!=''){
                $nomina5_aval_image2 = url('/') . "/storage/" . $oferta->nomina5_aval_image2;
            }				
            
            $subject = "Oferta sobre tu inmueble con IAMOVING";
			//Enviar a Roberto MAIL_PU<<-------- TODOOOO!!!
            \Mail::to($mail_to)->bcc($bcc)->send(new OfertaPropietarioMail($subject,$inmueble_id,$num_oferta,$email_propietario,$path_contrato,$numero_arrendatarios,$avalistas,$nif_image,$nif_image2,$nif2_image,$nif2_image2,$nif3_image,$nif3_image2,$nif4_image,$nif4_image2,$nif5_image,$nif5_image2,$contrato_image,$contrato_image2,$contrato2_image,$contrato2_image2,$contrato3_image,$contrato3_image2,$contrato4_image,$contrato4_image2,$contrato5_image,$contrato5_image2,$nomina_image,$nomina_image2,$nomina2_image,$nomina2_image2,$nomina3_image,$nomina3_image2,$nomina4_image,$nomina4_image2,$nomina5_image,$nomina5_image2,$nif_aval_image,$nif_aval_image2,$nif2_aval_image,$nif2_aval_image2,$nif3_aval_image,$nif3_aval_image2,$nif4_aval_image,$nif4_aval_image2,$nif5_aval_image,$nif5_aval_image2,$contrato_aval_image,$contrato_aval_image2,$contrato2_aval_image,$contrato2_aval_image2,$contrato3_aval_image,$contrato3_aval_image2,$contrato4_aval_image,$contrato4_aval_image2,$contrato5_aval_image,$contrato5_aval_image2,$nomina_aval_image,$nomina_aval_image2,$nomina2_aval_image,$nomina2_aval_image2,$nomina3_aval_image,$nomina3_aval_image2,$nomina4_aval_image,$nomina4_aval_image2,$nomina5_aval_image,$nomina5_aval_image2, $email));
			//$subject = "Oferta sobre tu inmueble con IAMOVING Ref. ".$inmueble_id;
			//\Mail::to($mail_to)->bcc($bcc)->send(new OfertaAdjuntosMail($subject,$num_oferta,$email_propietario,$path_contrato,$numero_arrendatarios,$avalistas,$nif_image,$nif_image2,$nif2_image,$nif2_image2,$nif3_image,$nif3_image2,$nif4_image,$nif4_image2,$nif5_image,$nif5_image2,$contrato_image,$contrato_image2,$contrato2_image,$contrato2_image2,$contrato3_image,$contrato3_image2,$contrato4_image,$contrato4_image2,$contrato5_image,$contrato5_image2,$nomina_image,$nomina_image2,$nomina2_image,$nomina2_image2,$nomina3_image,$nomina3_image2,$nomina4_image,$nomina4_image2,$nomina5_image,$nomina5_image2,$nif_aval_image,$nif_aval_image2,$nif2_aval_image,$nif2_aval_image2,$nif3_aval_image,$nif3_aval_image2,$nif4_aval_image,$nif4_aval_image2,$nif5_aval_image,$nif5_aval_image2,$contrato_aval_image,$contrato_aval_image2,$contrato2_aval_image,$contrato2_aval_image2,$contrato3_aval_image,$contrato3_aval_image2,$contrato4_aval_image,$contrato4_aval_image2,$contrato5_aval_image,$contrato5_aval_image2,$nomina_aval_image,$nomina_aval_image2,$nomina2_aval_image,$nomina2_aval_image2,$nomina3_aval_image,$nomina3_aval_image2,$nomina4_aval_image,$nomina4_aval_image2,$nomina5_aval_image,$nomina5_aval_image2));
			
			$subject = "Oferta sobre la referencia ".$inmueble_id. " con IAMOVING";
			\Mail::to($email)->bcc($mail_to)->send(new OfertaArrendatarioMail($subject,$inmueble_id,$num_oferta,$email,$importe,$path_contrato));
            
			
            if(count(\Mail::failures()) > 0 ) {
				
					if ($request->session()->has('comercial_url')) {
						 return redirect($request->session()->get('ofertacompra_url'))->with('error','No se ha podido enviar su mensaje');
					}
                return redirect()->route('comercial')->with('error','No se ha podido enviar su mensaje');
            }else{
					if ($request->session()->has('ofertacompra_url')) {
						 return redirect($request->session()->get('ofertacompra_url'))->with('success','Acabamos de enviar a tu correo electrónico el documento de oferta para formalizar tu interés.');
					}				
                //return redirect()->route('oferta/'.$inmueble_id)->with('success','Su mensaje ha sido enviado');
            }
        

        return response()->json($data);
	}
}