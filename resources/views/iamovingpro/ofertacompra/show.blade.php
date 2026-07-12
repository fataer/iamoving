@extends('layouts.iamovingpro')
@section('title')
<?php
if($detalle->tipo_inmueble == 'Local/Oficina'){
    if ($detalle->oficina == '1'){
        $inmueble= "Oficina";
    }
    else{

	   $inmueble= "Local";
    }
}
else
{
	if ($detalle->estudio) {
		$inmueble= "Estudio";
	} elseif ($detalle->loft) {
		$inmueble= "Loft";
	} elseif ($detalle->apartamento) {
		$inmueble= "Apartamento";
	} elseif ($detalle->piso) {
		$inmueble= "Piso";
	} elseif ($detalle->chalet) {
	    if ($detalle->adosado_chalet==1) {
	        $inmueble= "Chalet Adosado";    
	    }  elseif ($detalle->adosado_chalet==2) {
	        $inmueble= "Chalet Independiente";    
	    } elseif ($detalle->adosado_chalet==3) {
	        $inmueble= "Chalet Pareado";    
	    } else {
	    		$inmueble= "Chalet";
	    }
	} elseif ($detalle->bajo) {
		$inmueble= "Bajo";
	} elseif ($detalle->atico) {
		$inmueble= "Ático";	
	} elseif ($detalle->casa) {
		$inmueble= "Casa";			
	} else {
		$inmueble= "Piso";
	}
}
if ($detalle->is_sale == '1'){
    $tipo=" en venta ";	
} else {
    $tipo=" en alquiler ";	
}
//if($detalle->ciudad_inmueble)
// Capturar municipio
if (!empty($detalle->municipio) && $detalle->municipio !== null && $detalle->municipio !== 'Madrid') {
    $municipio = $detalle->municipio;
} else {
    $municipio = null;
}
if($ciudad)
{
	//$city=$detalle->ciudad_inmueble;	
	$city = $ciudad;
} 
else
{
	$city="Madrid";
}
/*if($detalle->road)
{
    $direccion="en ".$detalle->road.", ".$city;
}*/

if($detalle->road)
{
    if ($municipio) {
        $direccion="en ".$detalle->road.", ".$municipio.", ".$city;
    } else {
        $direccion="en ".$detalle->road.", ".$city;
    }
} 
	echo $inmueble.$tipo.$direccion;
?>
@endsection
@section('description')
<?php
if($detalle->tipo_inmueble == 'Local/Oficina'){
    if ($detalle->oficina == '1'){
        $inmueble= "Oficina";
    }
    else{

       $inmueble= "Local";
    }
}
else
{
	if ($detalle->estudio) {
		$inmueble= "Estudio";
	} elseif ($detalle->loft) {
		$inmueble= "Loft";
	} elseif ($detalle->apartamento) {
		$inmueble= "Apartamento";
	} elseif ($detalle->piso) {
		$inmueble= "Piso";
	} elseif ($detalle->chalet) {
		$inmueble= "Chalet";
	} elseif ($detalle->bajo) {
		$inmueble= "Bajo";
	} elseif ($detalle->atico) {
		$inmueble= "Ático";	
	} elseif ($detalle->casa) {
		$inmueble= "Casa";			
	} else {
		$inmueble= "Piso";
	}
}
	$texto1= " de ";
	$metros = $detalle->square_meters;
	$texto2 = " m2, ";

if($detalle->tipo_inmueble == 'Local/Oficina'){
	if ($detalle->bedrooms==1) {
		$dormitorio= "1 estancia y ";
	} elseif ($detalle->bedrooms==0) {
		$dormitorio= "";
	} elseif ($detalle->bedrooms>1) {
		$dormitorio= $detalle->bedrooms." estancias y ";
	} else {
		$dormitorio= "";
	}
}
else
{	
	if ($detalle->bedrooms==1) {
		$dormitorio= "1 dormitorio y ";
	} elseif ($detalle->bedrooms==0) {
		$dormitorio= "";
	} elseif ($detalle->bedrooms>1) {
		$dormitorio= $detalle->bedrooms." dormitorios y ";
	} else {
		$dormitorio= "";
	}
}

if($detalle->tipo_inmueble == 'Local/Oficina'){
	$bano= "2 aseos.";
}
else
{
	if ($detalle->bathrooms==1) {
		$bano= "1 baño.";
	} elseif ($detalle->bathrooms==0) {
		$bano= "";
	} elseif ($detalle->bathrooms>1) {
		$bano= $detalle->bathrooms." baños.";
	} else {
		$bano= "";
	}
}
	echo $inmueble.$texto1.$metros.$texto2.$dormitorio.$bano;
?>
@endsection
@section('image')
<?php
$url="https://iamoving.com/storage/";
//$path=$detalle->path_image_primary;
if (str_contains($detalle->path_image_primary, '.jpeg')) {
	$path=str_replace(".jpeg","_444x250.jpg",$detalle->path_image_primary);
}else{
	$path=str_replace(".jpg","_444x250.jpg",$detalle->path_image_primary);
}
echo  $url.$path;
?>
@endsection
@section('content')
    <section class="gallery-section spad" style="padding-top: 20px;padding-bottom: 0px;">
											<div class="container my-2">
													<!--  <div class="row mt-3">
														<div class="col-md-2">
														</div>
												
															<div class="col-md-8 text-center mb-3">
																	<img src="/img/icono.png"  width="450" height="150" style="margin-bottom:10px;">
															</div>
														<div class="col-md-2">
														</div>
													</div>	-->
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                
                @if ($message = Session::get('error'))                
                    <div class="alert alert-danger alert-block">
                        <strong>{{ $message }}</strong>
                    </div>
                @endif													

														
											</div>	
														<!--	 <div class="row mt-3">
																<div class="col-md-2">
																</div>
														
																	<div class="col-md-8 text-center mb-3">
																			<img src="/img/owner.png"  width="70" height="70" style="margin-bottom:10px;" alt="playa">
																	</div>
																<div class="col-md-2">
																</div>
															</div>	-->					
				
															<h4 class="card-text text-center mb-2">Oferta de Compra</h4>
															<h4 class="card-text text-center mb-4">Ref. {{$detalle->id}} </h4>																
										
										


			
			<div class="container my-0 mt-3">				
					
						<div class="container my-0 mt-1">											
							<div class="container" style="background-color:white;">
							</div>
						</div>
				<!--<form action="{{ url('ofertacompra-formulario') }}" method="post" id="frm_colabora" onsubmit="loading()" enctype="multipart/form-data">-->
				    <form action="{{ url('ofertacompra-formulario') }}{{ request()->has('test_email') ? '?test_email='.request()->test_email : '' }}" method="post" id="frm_colabora" onsubmit="loading()" enctype="multipart/form-data">

                    {!! csrf_field() !!}
                    <h5 class="text-center"><u><b id="titulo-datos-compradores">Datos de los Compradores</b></u></h5>
<div class="form-group">
    <input placeholder="E-mail de contacto de uno de los compradores" type="email" id="email" name="email" maxlength="300" class="form-control" required>
</div>
<div class="form-group">
    <input placeholder="Confirmar E-mail de contacto de uno de los compradores" type="email" id="email_confirmacion" name="email_confirmacion" maxlength="300" class="form-control" required>
</div>					
					<!--<h5 class="card-text text-center mb-4"><b>AVISO IMPORTANTE</b>: Por favor, envíanos los datos y la documentación de todos los que serán los arrendatarios del contrato de compra. Lo mismo, en el caso de haber avalistas.</h5>	-->
					
					<!--<h5 class="card-text text-center mb-0"><b id="titulo-compradores">COMPRADORES</b></h5>-->
                    
                    <!-- Combo para número de compradores -->
<div class="form-group">
    <label class="text-center w-100"><b>Número de compradores:</b></label>
    <select id="numero_compradores" name="numero_compradores" class="form-control">
        <option value="1" selected>1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select>
</div>                    
                    
					<!--<input type="hidden" id="numero_arrendatarios" name="numero_arrendatarios" value="1" />-->
                    
                    <!-- Campos de compradores dinámicos -->
                    <div id="compradores-container">
                        
                        <!-- Comprador 1 (siempre visible) -->
                        <div class="comprador-fields" id="comprador-1">
                            
                                <h6 class="etiqueta-comprador text-center" style="display: none;"><b>Comprador 1</b></h6>
                            <div class="form-group">
                                <select id="tipo_documento_comprador_1" name="tipo_documento_comprador_1" class="form-control" required>
                                    <option value="" selected>Seleccione tipo de documento...</option>
                                    <option value="1" >DNI</option>
                                    <option value="2">NIE</option>
                                    <option value="3">CIF</option>
                                </select>
                            </div>  
                            <div class="form-group">
                                <input placeholder="Número DNI/NIE/CIF" type="text" id="documento_comprador_1" name="documento_comprador_1" maxlength="12" class="form-control" required>
                                <!--<input type="hidden" id="tipo_documento_comprador_1" name="tipo_documento_comprador_1" value="1">-->
                            </div>                            
                            <div class="form-group">
                                <input placeholder="Nombre y apellidos" type="text" id="nombre_comprador_1" name="nombre_comprador_1" maxlength="150" class="form-control" required>
                            </div>

                        </div>
                        
                        <!-- Comprador 2 (inicialmente oculto) -->
                        <div class="comprador-fields" id="comprador-2" style="display: none;">
                             <h6 class="etiqueta-comprador text-center"><b>Comprador 2</b></h6>
                    <div class="form-group">
                        <select id="tipo_documento_comprador_2" name="tipo_documento_comprador_2" class="form-control" required>
                            <option value="" selected>Seleccione tipo de documento...</option>
                            <option value="1" >DNI</option>
                            <option value="2">NIE</option>
                            <option value="3">CIF</option>
                        </select>
                    </div>                                               
                            <div class="form-group">
                                <input placeholder="Nombre y apellidos" type="text" id="nombre_comprador_2" name="nombre_comprador_2" maxlength="150" class="form-control">
                            </div>
                            <div class="form-group">
                                <input placeholder="Número DNI/NIE/CIF" type="text" id="documento_comprador_2" name="documento_comprador_2" maxlength="12" class="form-control">
                                <!--<input type="hidden" id="tipo_documento_comprador_2" name="tipo_documento_comprador_2" value="1">-->
                            </div>
                        </div>
                        
                        <!-- Comprador 3 (inicialmente oculto) -->
                        <div class="comprador-fields" id="comprador-3" style="display: none;">
                            <h6 class="etiqueta-comprador text-center"><b>Comprador 3</b></h6>
                    <div class="form-group">
                        <select id="tipo_documento_comprador_3" name="tipo_documento_comprador_3" class="form-control" required>
                            <option value="" selected>Seleccione tipo de documento...</option>
                            <option value="1" >DNI</option>
                            <option value="2">NIE</option>
                            <option value="3">CIF</option>
                        </select>
                    </div>                                              
                            <div class="form-group">
                                <input placeholder="Nombre y apellidos" type="text" id="nombre_comprador_3" name="nombre_comprador_3" maxlength="150" class="form-control">
                            </div>
                            <div class="form-group">
                                <input placeholder="Número DNI/NIE/CIF" type="text" id="documento_comprador_3" name="documento_comprador_3" maxlength="12" class="form-control">
                                <!--<input type="hidden" id="tipo_documento_comprador_3" name="tipo_documento_comprador_3" value="1">-->
                            </div>
                        </div>
                        
                        <!-- Comprador 4 (inicialmente oculto) -->
                        <div class="comprador-fields" id="comprador-4" style="display: none;">
                            <h6 class="etiqueta-comprador text-center"><b>Comprador 4</b></h6>
                    <div class="form-group">
                        <select id="tipo_documento_comprador_4" name="tipo_documento_comprador_4" class="form-control" required>
                            <option value="" selected>Seleccione tipo de documento...</option>
                            <option value="1" >DNI</option>
                            <option value="2">NIE</option>
                            <option value="3">CIF</option>
                        </select>
                    </div>                             

                            <div class="form-group">
                                <input placeholder="Nombre y apellidos" type="text" id="nombre_comprador_4" name="nombre_comprador_4" maxlength="150" class="form-control">
                            </div>
                            <div class="form-group">
                                <input placeholder="Número DNI/NIE/CIF" type="text" id="documento_comprador_4" name="documento_comprador_4" maxlength="12" class="form-control">
                               <!-- <input type="hidden" id="tipo_documento_comprador_4" name="tipo_documento_comprador_4" value="1">-->
                            </div>
                        </div>
                        
                        <!-- Comprador 5 (inicialmente oculto) -->
                        <div class="comprador-fields" id="comprador-5" style="display: none;">
                            <h6 class="etiqueta-comprador text-center"><b>Comprador 5</b></h6>
                    <div class="form-group">
                        <!--<label><b>Número de compradores:</b></label>-->
                        <select id="tipo_documento_comprador_5" name="tipo_documento_comprador_5" class="form-control" required>
                            <option value="" selected>Seleccione tipo de documento...</option>
                            <option value="1" >DNI</option>
                            <option value="2">NIE</option>
                            <option value="3">CIF</option>
                        </select>
                    </div>  
                            <div class="form-group">
                                <input placeholder="Nombre y apellidos" type="text" id="nombre_comprador_5" name="nombre_comprador_5" maxlength="150" class="form-control">
                            </div>
                            <div class="form-group">
                                <input placeholder="Número DNI/NIE/CIF" type="text" id="documento_comprador_5" name="documento_comprador_5" maxlength="12" class="form-control">
                                <!--<input type="hidden" id="tipo_documento_comprador_5" name="tipo_documento_comprador_5" value="1">-->
                            </div>
                        </div>
                    </div>
                        <label class="w-100 text-center"><u><b>Datos de la oferta</b></u></label>
                        <div class="form-group">
                            <label class="w-100 text-center"><b>Importe de la Oferta (€):</b></label>
							<!--<input type="number" min="100" max="700000" step="1" placeholder="Oferta" id="importe" name="importe"  class="form-control" maxlength="7" required>-->
							<input type="text" id="importe" name="importe"  class="form-control" maxlength="13"  required>
						</div>	

						<input type="hidden" id="referencia" name="referencia"  value="{{ $detalle->id }}" />	
						<input type="hidden" id="road" name="road"  value="{{ $detalle->road_real }}" />
						<input type="hidden" id="numero_direccion"  name="numero_direccion"  value="{{ $detalle->numero_direccion }}" />
						<input type="hidden" id="number_apartment"  name="number_apartment"  value="{{ $detalle->number_apartment }}" />
						<input type="hidden" id="codigo_postal" name="codigo_postal"  value="{{ $detalle->codigo_postal }}" />
						<input type="hidden" id="ciudad" name="ciudad"  value="{{ $ciudad }}" />
						<input type="hidden" id="email_e" name="email_e"  value="{{ $detalle->email_e }}" />
						<input type="hidden" id="trastero_numero" name="trastero_numero"  value="{{ $detalle->trastero_numero }}" />
						<input type="hidden" id="garaje_numero" name="garaje_numero"  value="{{ $detalle->garaje_numero }}" />
						<input type="hidden" id="plazo_escritura" name="plazo_escritura"  value="{{ $detalle->plazo_escritura }}" />
						<input type="hidden" id="comision_iamoving" name="comision_iamoving"  value="{{ $detalle->comision_iamoving }}" />
						<input type="hidden" id="comision_iva" name="comision_iva"  value="{{ $detalle->comision_iva }}" />
						<input type="hidden" id="arras" name="arras"  value="{{ $detalle->arras }}" />
						<input type="hidden" id="plazo_formalizar" name="plazo_formalizar"  value="{{ $detalle->plazo_formalizar }}" />
						<input type="hidden" id="municipio" name="municipio"  value="{{ $detalle->municipio }}" />
						<input type="hidden" id="inmueble" name="inmueble"  value="{{ $inmueble }}" />
						<input type="hidden" id="fake" name="fake"  value="0" />
                    <div class="form-group">
                        <button class="btn btn-success btn-block" style="height:50px;" type="submit" id="btn_submit_colabora">
                            ENVIAR OFERTA
                        </button>
                        
                    </div>						
                    <!--<div class="form-group form-check text-center">
						<input type="checkbox" class="form-check-input" id="conditions" name="conditions"  required>
						<label class="form-check-label" for="conditions">He leído y estoy de acuerdo con <a href="/terminosI-condiciones" target="_blank">los términos y condiciones</a> y <a href="/politica-privacidad" target="_blank">la política de privacidad </a>de IAMOVING</label>
                    </div>-->							
                    <!--<div class="form-group">
                        <textarea id="body" name="body" class="form-control" rows="4" placeholder="Descríbenos por favor tus servicios. ¡Cuéntenos en que te diferencias! " required></textarea>
                    </div>-->
                    <hr>

                </form>

            {{-- fin contenido centrado --}}

</section>
<!-- page end-->
@endsection
@section('scripts')
<script>
    function loading(){
        $("#btn_submit_colabora").text('ENVIANDO OFERTA...');
        $("#btn_submit_colabora").prop('disabled', true);
    }
    
    // Función para formatear números con separadores de miles
    function formatearNumero(numero) {
        // Eliminar cualquier carácter que no sea dígito
        const numeroLimpio = numero.replace(/\D/g, '');
        
        // Formatear con puntos como separadores de miles
        return numeroLimpio.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    }
    
    // Función para detectar el tipo de documento (NIF, NIE, CIF)
    function detectarTipoDocumento(documento) {
        // Limpiamos el documento de guiones y espacios
        const doc = documento.replace(/[-\s]/g, '').toUpperCase();
        
        // Comprobar si es NIE (comienza con X, Y o Z)
        if (/^[XYZ]/i.test(doc)) {
            return 3; // NIE
        }
        
        // Comprobar si es CIF (comienza con letra distinta de X, Y, Z, D, N, L, K, M)
        if (/^[ABCEFGHJPQRSUVW]/i.test(doc)) {
            return 2; // CIF
        }
        
        // En otro caso, asumimos que es NIF
        return 1; // NIF
    }
    
    // Función para validar y actualizar los tipos de documentos
    function validarDocumento(index) {
        const documento = $("#documento_comprador_" + index).val();
        if (documento.trim() !== '') {
            const tipoDocumento = detectarTipoDocumento(documento);
            $("#tipo_documento_comprador_" + index).val(tipoDocumento);
        }
    }
    
    // Función para actualizar placeholder según el tipo de documento seleccionado
    function actualizarPlaceholder(index) {
        const tipoDocumento = $("#tipo_documento_comprador_" + index).val();
        const inputDocumento = $("#documento_comprador_" + index);
        
        switch(tipoDocumento) {
            case "1":
                inputDocumento.attr("placeholder", "Número DNI");
                break;
            case "2":
                inputDocumento.attr("placeholder", "Número NIE");
                break;
            case "3":
                inputDocumento.attr("placeholder", "Número CIF");
                break;
            default:
                inputDocumento.attr("placeholder", "Número DNI/NIE/CIF");
        }
    }
    
    // Función para validar NIF español (8 dígitos + letra)
    function validarNIF(nif) {
        const dni = nif.toUpperCase().replace(/\s/g, '').replace(/-/g, '');
        const regexp = /^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKE]$/;
        
        if (!regexp.test(dni)) return false;
        
        const letra = dni.charAt(8);
        const numero = dni.substring(0, 8);
        const letrasValidas = 'TRWAGMYFPDXBNJZSQVHLCKE';
        const letraCalculada = letrasValidas.charAt(numero % 23);
        
        return letra === letraCalculada;
    }
    
    // Función para validar NIE español (X/Y/Z + 7 dígitos + letra)
    function validarNIE(nie) {
        const nieClean = nie.toUpperCase().replace(/\s/g, '').replace(/-/g, '');
        const regexp = /^[XYZ][0-9]{7}[TRWAGMYFPDXBNJZSQVHLCKE]$/;
        
        if (!regexp.test(nieClean)) return false;
        
        // Convertir NIE a equivalente NIF para validación
        const tipo = nieClean.charAt(0);
        const letra = nieClean.charAt(8);
        let numero = parseInt(nieClean.substring(1, 8));
        
        // Convertir la primera letra a su equivalente numérico
        let firstDigit = 0;
        if (tipo === 'X') firstDigit = 0;
        else if (tipo === 'Y') firstDigit = 1;
        else if (tipo === 'Z') firstDigit = 2;
        
        // Calcular letra usando el algoritmo del NIF
        const fullNumber = parseInt(firstDigit + nieClean.substring(1, 8));
        const letrasValidas = 'TRWAGMYFPDXBNJZSQVHLCKE';
        const letraCalculada = letrasValidas.charAt(fullNumber % 23);
        
        return letra === letraCalculada;
    }
    
    // Función para validar CIF español (letra + 8 dígitos)
    function validarCIF(cif) {
        // Corrección: CIF es letra + 8 dígitos (no 7)
        const cifClean = cif.toUpperCase().replace(/\s/g, '').replace(/-/g, '');
        
        // Validación básica del formato: letra inicial válida + 8 dígitos
        if (!/^[ABCDEFGHJKLMNPQRSUVW]\d{8}$/i.test(cifClean)) {
            return false;
        }
        
        // Para simplificar y debido a la complejidad del algoritmo real del CIF,
        // aceptamos cualquier CIF con formato válido (letra + 8 dígitos)
        return true;
    }
    
    // Función para validar documento según el tipo seleccionado
    function validarDocumentoSegunTipo(index) {
        const tipoDocumento = $("#tipo_documento_comprador_" + index).val();
        const documento = $("#documento_comprador_" + index).val().toUpperCase();
        let valido = false;
        let mensajeError = '';
        
        if (!tipoDocumento || tipoDocumento === "" || documento.trim() === '') {
            // No hay tipo seleccionado o documento vacío
            return true;
        }
        
        switch(tipoDocumento) {
            case "1":
                valido = validarNIF(documento);
                mensajeError = 'NIF inválido. Formato: 8 dígitos + letra.';
                break;
            case "2":
                valido = validarNIE(documento);
                mensajeError = 'NIE inválido. Formato: X/Y/Z + 7 dígitos + letra.';
                break;
            case "3":
                valido = validarCIF(documento);
                mensajeError = 'CIF inválido. Formato: letra + 8 dígitos.';
                break;
            default:
                valido = true;
        }
        
        const inputDocumento = $("#documento_comprador_" + index);
        
        if (!valido) {
            // Establecer mensaje de error y marcar como inválido
            inputDocumento.addClass('is-invalid');
            
            // Si no existe el mensaje de error, crearlo
            let nextElement = inputDocumento.next('.invalid-feedback');
            if (nextElement.length === 0) {
                inputDocumento.after('<div class="invalid-feedback">' + mensajeError + '</div>');
            } else {
                nextElement.text(mensajeError);
            }
        } else {
            // Quitar marca de inválido
            inputDocumento.removeClass('is-invalid');
            inputDocumento.next('.invalid-feedback').remove();
        }
        
        return valido;
    }
    
    // Función para validar todos los documentos visibles
    function validarTodosLosDocumentos() {
        const numCompradores = parseInt($("#numero_compradores").val());
        let todosValidos = true;
        
        for (let i = 1; i <= numCompradores; i++) {
            const esValido = validarDocumentoSegunTipo(i);
            if (!esValido) {
                todosValidos = false;
            }
        }
        
        return todosValidos;
    }
    
    // Función para mostrar/ocultar campos de compradores según el número seleccionado
    function actualizarCamposCompradores() {
        const numCompradores = parseInt($("#numero_compradores").val());
        
        // Ocultar todos los bloques de compradores
        $(".comprador-fields").hide();
        
        // Mostrar solo los bloques necesarios
        for (let i = 1; i <= numCompradores; i++) {
            $("#comprador-" + i).show();
            
            // Hacer obligatorios los campos visibles
            $("#nombre_comprador_" + i).prop('required', true);
            $("#documento_comprador_" + i).prop('required', true);
            $("#tipo_documento_comprador_" + i).prop('required', true);
        }
        
        // Quitar required de los campos ocultos
        for (let i = numCompradores + 1; i <= 5; i++) {
            $("#nombre_comprador_" + i).prop('required', false);
            $("#documento_comprador_" + i).prop('required', false);
            $("#tipo_documento_comprador_" + i).prop('required', false);
        }
        
        // Mostrar u ocultar etiquetas de "Comprador X" según el número seleccionado
        if (numCompradores === 1) {
            // Si solo hay un comprador, ocultar la etiqueta "Comprador 1"
            $(".etiqueta-comprador").hide();
            // Cambiar a singular los títulos
            $("#titulo-compradores").text("COMPRADOR");
            $("#titulo-datos-compradores").text("Datos del Comprador");
        } else {
            // Si hay más de un comprador, mostrar todas las etiquetas de compradores visibles
            $(".etiqueta-comprador").show();
            // Cambiar a plural los títulos
            $("#titulo-compradores").text("COMPRADORES");
            $("#titulo-datos-compradores").text("Datos de los Compradores");
        }
    }
 
$(document).ready(function(){
    // Function to create HTML elements for company representatives
    function createCompanyRepFields(compIndex) {
        return `
            <div class="company-rep-fields" id="representante-${compIndex}">
                <h6 class="etiqueta-representante text-center"><b>Representante Empresa ${compIndex}</b></h6>
                <div class="form-group">
                    <select id="tipo_documento_representante_${compIndex}" name="tipo_documento_representante_${compIndex}" class="form-control" required>
                        <option value="" selected>Seleccione tipo de documento...</option>
                        <option value="1">DNI</option>
                        <option value="2">NIE</option>
                    </select>
                </div>
                <div class="form-group">
                    <input placeholder="Nombre y apellidos representante" type="text" id="nombre_representante_${compIndex}" name="nombre_representante_${compIndex}" maxlength="150" class="form-control" required>
                </div>
                <div class="form-group">
                    <input placeholder="Número DNI/NIE representante" type="text" id="documento_representante_${compIndex}" name="documento_representante_${compIndex}" maxlength="12" class="form-control" required>
                </div>
            </div>
        `;
    }

    // Setup event handlers for representative fields
    function setupRepresentanteEvents(index) {
        // When type of document changes, update placeholder
        $("#tipo_documento_representante_" + index).change(function() {
            actualizarPlaceholderRepresentante(index);
            
            // If there's content in the document field, validate with new type
            if ($("#documento_representante_" + index).val().trim() !== '') {
                validarDocumentoRepresentanteSegunTipo(index);
            }
        });
        
        // When document field loses focus, validate it
        $("#documento_representante_" + index).on('blur', function() {
            validarDocumentoRepresentanteSegunTipo(index);
        });
        
        // Allow only valid characters for documents and convert to uppercase
        $("#documento_representante_" + index).on('input', function() {
            // Allow letters, numbers and hyphens
            let valor = $(this).val().replace(/[^a-zA-Z0-9\-]/g, '');
            // Convert to uppercase
            valor = valor.toUpperCase();
            $(this).val(valor);
        });
        
        // Initialize placeholder for representative document field
        actualizarPlaceholderRepresentante(index);
    }

    // Update placeholder for representative document field based on selected type
    function actualizarPlaceholderRepresentante(index) {
        const tipoDocumento = $("#tipo_documento_representante_" + index).val();
        const inputDocumento = $("#documento_representante_" + index);
        
        switch(tipoDocumento) {
            case "1":
                inputDocumento.attr("placeholder", "Número DNI representante");
                break;
            case "2":
                inputDocumento.attr("placeholder", "Número NIE representante");
                break;
            default:
                inputDocumento.attr("placeholder", "Número DNI/NIE representante");
        }
    }

    // Validate representative document based on selected type
    function validarDocumentoRepresentanteSegunTipo(index) {
        const tipoDocumento = $("#tipo_documento_representante_" + index).val();
        const documento = $("#documento_representante_" + index).val().toUpperCase();
        let valido = false;
        let mensajeError = '';
        
        if (!tipoDocumento || tipoDocumento === "" || documento.trim() === '') {
            // No type selected or empty document
            return true;
        }
        
        switch(tipoDocumento) {
            case "1":
                valido = validarNIF(documento);
                mensajeError = 'NIF inválido. Formato: 8 dígitos + letra.';
                break;
            case "2":
                valido = validarNIE(documento);
                mensajeError = 'NIE inválido. Formato: X/Y/Z + 7 dígitos + letra.';
                break;
            default:
                valido = true;
        }
        
        const inputDocumento = $("#documento_representante_" + index);
        
        if (!valido) {
            // Set error message and mark as invalid
            inputDocumento.addClass('is-invalid');
            
            // If error message doesn't exist, create it
            let nextElement = inputDocumento.next('.invalid-feedback');
            if (nextElement.length === 0) {
                inputDocumento.after('<div class="invalid-feedback">' + mensajeError + '</div>');
            } else {
                nextElement.text(mensajeError);
            }
        } else {
            // Remove invalid mark
            inputDocumento.removeClass('is-invalid');
            inputDocumento.next('.invalid-feedback').remove();
        }
        
        return valido;
    }

    // Update placeholder for buyer name input
    function actualizarPlaceholderNombre(index) {
        const tipoDocumento = $("#tipo_documento_comprador_" + index).val();
        const inputNombre = $("#nombre_comprador_" + index);
        
        if (tipoDocumento === "3") {
            inputNombre.attr("placeholder", "Nombre Empresa");
        } else {
            inputNombre.attr("placeholder", "Nombre y apellidos");
        }
    }

    // Validate all visible representative documents
    function validarTodosLosDocumentosRepresentantes() {
        const numCompradores = parseInt($("#numero_compradores").val());
        let todosValidos = true;
        
        for (let i = 1; i <= numCompradores; i++) {
            // Check if company representative fields exist
            if ($("#representante-" + i).length > 0 && $("#representante-" + i).is(":visible")) {
                const esValido = validarDocumentoRepresentanteSegunTipo(i);
                if (!esValido) {
                    todosValidos = false;
                }
            }
        }
        
        return todosValidos;
    }

// Función para validar que los emails coincidan
function validarEmailsCoinciden() {
    const email = $("#email").val().toLowerCase().trim();
    const emailConfirmacion = $("#email_confirmacion").val().toLowerCase().trim();
    
    // Si ambos campos están vacíos, no validar aún
    if (email === '' && emailConfirmacion === '') {
        return true;
    }
    
    const coinciden = email === emailConfirmacion;
    const inputEmailConfirmacion = $("#email_confirmacion");
    
    if (!coinciden && emailConfirmacion !== '') {
        // Marcar como inválido
        inputEmailConfirmacion.addClass('is-invalid');
        
        // Si no existe el mensaje de error, crearlo
        let nextElement = inputEmailConfirmacion.next('.invalid-feedback');
        if (nextElement.length === 0) {
            inputEmailConfirmacion.after('<div class="invalid-feedback">Los emails no coinciden.</div>');
        }
    } else {
        // Quitar marca de inválido
        inputEmailConfirmacion.removeClass('is-invalid');
        inputEmailConfirmacion.next('.invalid-feedback').remove();
    }
    
    return coinciden;
}

// Validar email de confirmación al perder el foco
$("#email_confirmacion").on('blur', function() {
    validarEmailsCoinciden();
});

// Validar también cuando cambia el email principal
$("#email").on('blur', function() {
    // Si el campo de confirmación tiene contenido, validar
    if ($("#email_confirmacion").val().trim() !== '') {
        validarEmailsCoinciden();
    }
});

// Validar en tiempo real mientras se escribe en el campo de confirmación
$("#email_confirmacion").on('input', function() {
    // Si hay algo escrito en ambos campos, validar en tiempo real
    if ($(this).val().trim() !== '' && $("#email").val().trim() !== '') {
        validarEmailsCoinciden();
    }
});    

    // Function to format numbers with thousands separators
    function formatearNumero(numero) {
        // Remove any character that is not a digit
        const numeroLimpio = numero.replace(/\D/g, '');
        
        // Format with dots as thousands separators
        return numeroLimpio.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    }
    
    // Function to detect document type (NIF, NIE, CIF)
    function detectarTipoDocumento(documento) {
        // Clean the document of hyphens and spaces
        const doc = documento.replace(/[-\s]/g, '').toUpperCase();
        
        // Check if it's NIE (starts with X, Y or Z)
        if (/^[XYZ]/i.test(doc)) {
            return 3; // NIE
        }
        
        // Check if it's CIF (starts with letter different from X, Y, Z, D, N, L, K, M)
        if (/^[ABCEFGHJPQRSUVW]/i.test(doc)) {
            return 2; // CIF
        }
        
        // Otherwise, we assume it's NIF
        return 1; // NIF
    }
    
    // Function to validate and update document types
    function validarDocumento(index) {
        const documento = $("#documento_comprador_" + index).val();
        if (documento.trim() !== '') {
            const tipoDocumento = detectarTipoDocumento(documento);
            $("#tipo_documento_comprador_" + index).val(tipoDocumento);
        }
    }
    
    // Function to update placeholder according to selected document type
    function actualizarPlaceholder(index) {
        const tipoDocumento = $("#tipo_documento_comprador_" + index).val();
        const inputDocumento = $("#documento_comprador_" + index);
        
        switch(tipoDocumento) {
            case "1":
                inputDocumento.attr("placeholder", "Número DNI");
                break;
            case "2":
                inputDocumento.attr("placeholder", "Número NIE");
                break;
            case "3":
                inputDocumento.attr("placeholder", "Número CIF");
                break;
            default:
                inputDocumento.attr("placeholder", "Número DNI/NIE/CIF");
        }
        
        // Also update the name placeholder
        actualizarPlaceholderNombre(index);
    }
    
    // Function to validate Spanish NIF (8 digits + letter)
    function validarNIF(nif) {
        const dni = nif.toUpperCase().replace(/\s/g, '').replace(/-/g, '');
        const regexp = /^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKE]$/;
        
        if (!regexp.test(dni)) return false;
        
        const letra = dni.charAt(8);
        const numero = dni.substring(0, 8);
        const letrasValidas = 'TRWAGMYFPDXBNJZSQVHLCKE';
        const letraCalculada = letrasValidas.charAt(numero % 23);
        
        return letra === letraCalculada;
    }
    
    // Function to validate Spanish NIE (X/Y/Z + 7 digits + letter)
    function validarNIE(nie) {
        const nieClean = nie.toUpperCase().replace(/\s/g, '').replace(/-/g, '');
        const regexp = /^[XYZ][0-9]{7}[TRWAGMYFPDXBNJZSQVHLCKE]$/;
        
        if (!regexp.test(nieClean)) return false;
        
        // Convert NIE to equivalent NIF for validation
        const tipo = nieClean.charAt(0);
        const letra = nieClean.charAt(8);
        let numero = parseInt(nieClean.substring(1, 8));
        
        // Convert first letter to its numeric equivalent
        let firstDigit = 0;
        if (tipo === 'X') firstDigit = 0;
        else if (tipo === 'Y') firstDigit = 1;
        else if (tipo === 'Z') firstDigit = 2;
        
        // Calculate letter using NIF algorithm
        const fullNumber = parseInt(firstDigit + nieClean.substring(1, 8));
        const letrasValidas = 'TRWAGMYFPDXBNJZSQVHLCKE';
        const letraCalculada = letrasValidas.charAt(fullNumber % 23);
        
        return letra === letraCalculada;
    }
    
    // Function to validate Spanish CIF (letter + 8 digits)
    function validarCIF(cif) {
        // Correction: CIF is letter + 8 digits (not 7)
        const cifClean = cif.toUpperCase().replace(/\s/g, '').replace(/-/g, '');
        
        // Basic validation of format: valid initial letter + 8 digits
        if (!/^[ABCDEFGHJKLMNPQRSUVW]\d{8}$/i.test(cifClean)) {
            return false;
        }
        
        // To simplify and due to the complexity of the real CIF algorithm,
        // we accept any CIF with valid format (letter + 8 digits)
        return true;
    }
    
    // Function to validate document according to selected type
    function validarDocumentoSegunTipo(index) {
        const tipoDocumento = $("#tipo_documento_comprador_" + index).val();
        const documento = $("#documento_comprador_" + index).val().toUpperCase();
        let valido = false;
        let mensajeError = '';
        
        if (!tipoDocumento || tipoDocumento === "" || documento.trim() === '') {
            // No type selected or empty document
            return true;
        }
        
        switch(tipoDocumento) {
            case "1":
                valido = validarNIF(documento);
                mensajeError = 'NIF inválido. Formato: 8 dígitos + letra.';
                break;
            case "2":
                valido = validarNIE(documento);
                mensajeError = 'NIE inválido. Formato: X/Y/Z + 7 dígitos + letra.';
                break;
            case "3":
                valido = validarCIF(documento);
                mensajeError = 'CIF inválido. Formato: letra + 8 dígitos.';
                break;
            default:
                valido = true;
        }
        
        const inputDocumento = $("#documento_comprador_" + index);
        
        if (!valido) {
            // Set error message and mark as invalid
            inputDocumento.addClass('is-invalid');
            
            // If error message doesn't exist, create it
            let nextElement = inputDocumento.next('.invalid-feedback');
            if (nextElement.length === 0) {
                inputDocumento.after('<div class="invalid-feedback">' + mensajeError + '</div>');
            } else {
                nextElement.text(mensajeError);
            }
        } else {
            // Remove invalid mark
            inputDocumento.removeClass('is-invalid');
            inputDocumento.next('.invalid-feedback').remove();
        }
        
        return valido;
    }
    
    // Function to validate all visible documents
    function validarTodosLosDocumentos() {
        const numCompradores = parseInt($("#numero_compradores").val());
        let todosValidos = true;
        
        for (let i = 1; i <= numCompradores; i++) {
            const esValido = validarDocumentoSegunTipo(i);
            if (!esValido) {
                todosValidos = false;
            }
        }
        
        return todosValidos;
    }
    
    // Function to show/hide buyer fields according to the selected number
    function actualizarCamposCompradores() {
        const numCompradores = parseInt($("#numero_compradores").val());
        
        // Hide all buyer blocks
        $(".comprador-fields").hide();
        $(".company-rep-fields").hide();
        
        // Show only necessary blocks
        for (let i = 1; i <= numCompradores; i++) {
            $("#comprador-" + i).show();
            
            // Make visible fields required
            $("#nombre_comprador_" + i).prop('required', true);
            $("#documento_comprador_" + i).prop('required', true);
            $("#tipo_documento_comprador_" + i).prop('required', true);
            
            // Check if we need to show company representative fields
            const tipoDocumento = $("#tipo_documento_comprador_" + i).val();
            if (tipoDocumento === "3") {
                if ($("#representante-" + i).length > 0) {
                    $("#representante-" + i).show();
                    // Make representative fields required
                    $("#nombre_representante_" + i).prop('required', true);
                    $("#documento_representante_" + i).prop('required', true);
                    $("#tipo_documento_representante_" + i).prop('required', true);
                }
            }
        }
        
        // Remove required from hidden fields
        for (let i = numCompradores + 1; i <= 5; i++) {
            $("#nombre_comprador_" + i).prop('required', false);
            $("#documento_comprador_" + i).prop('required', false);
            $("#tipo_documento_comprador_" + i).prop('required', false);
            
            // Also remove required from hidden representative fields
            if ($("#representante-" + i).length > 0) {
                $("#nombre_representante_" + i).prop('required', false);
                $("#documento_representante_" + i).prop('required', false);
                $("#tipo_documento_representante_" + i).prop('required', false);
            }
        }
        
        // Show or hide "Comprador X" labels according to the selected number
        if (numCompradores === 1) {
            // If there's only one buyer, hide "Comprador 1" label
            $(".etiqueta-comprador").hide();
            // Change titles to singular
            $("#titulo-compradores").text("COMPRADOR");
            $("#titulo-datos-compradores").text("Datos del Comprador");
        } else {
            // If there's more than one buyer, show all visible buyer labels
            $(".etiqueta-comprador").show();
            // Change titles to plural
            $("#titulo-compradores").text("COMPRADORES");
            $("#titulo-datos-compradores").text("Datos de los Compradores");
        }
    }
 
    // Initialize fields when page loads
    actualizarCamposCompradores();
    
    // Initialize placeholders for visible fields
    for (let i = 1; i <= 5; i++) {
        actualizarPlaceholder(i);
        // Check if the document type is already set to CIF and add representative fields if needed
        if ($("#tipo_documento_comprador_" + i).val() === "3" && $("#comprador-" + i).is(":visible")) {
            if ($("#representante-" + i).length === 0) {
                const repHTML = createCompanyRepFields(i);
                $(repHTML).insertAfter($("#comprador-" + i).find("#documento_comprador_" + i).parent());
                setupRepresentanteEvents(i);
            }
        }
    }
    
    // Set up amount field to format with thousands dots
    $("#importe").on('input', function() {
        // Save cursor position
        const start = this.selectionStart;
        const end = this.selectionEnd;
        
        // Get current value and length
        const valorActual = $(this).val();
        const longitudActual = valorActual.length;
        
        // Format number
        const valorFormateado = formatearNumero(valorActual);
        
        // Set formatted value
        $(this).val(valorFormateado);
        
        // Adjust cursor position due to insertion of dots
        const longitudNueva = valorFormateado.length;
        const diferencia = longitudNueva - longitudActual;
        
        // Reset cursor position adjusting for added dots
        if (diferencia !== 0 && start !== valorActual.length) {
            this.setSelectionRange(start + diferencia, end + diferencia);
        }
    });
    
    // Update fields when number of buyers selector changes
    $("#numero_compradores").change(function() {
        actualizarCamposCompradores();
    });
    
    // Set up events for document fields
    for (let i = 1; i <= 5; i++) {
        // When document type changes, update placeholder and check if representative fields needed
        $("#tipo_documento_comprador_" + i).change(function() {
            actualizarPlaceholder(i);
            
            // Check if it's CIF to add or remove company representative fields
            if ($(this).val() === "3") {
                // Add company representative fields if they don't exist
                if ($("#representante-" + i).length === 0) {
                    const repHTML = createCompanyRepFields(i);
                    $(repHTML).insertAfter($("#comprador-" + i).find("#documento_comprador_" + i).parent());
                    setupRepresentanteEvents(i);
                } else {
                    $("#representante-" + i).show();
                    $("#nombre_representante_" + i).prop('required', true);
                    $("#documento_representante_" + i).prop('required', true);
                    $("#tipo_documento_representante_" + i).prop('required', true);
                }
            } else {
                // If not CIF and representative fields exist, hide them
                if ($("#representante-" + i).length > 0) {
                    $("#representante-" + i).hide();
                    $("#nombre_representante_" + i).prop('required', false);
                    $("#documento_representante_" + i).prop('required', false);
                    $("#tipo_documento_representante_" + i).prop('required', false);
                }
            }
            
            // If there's content in document field, validate with new type
            if ($("#documento_comprador_" + i).val().trim() !== '') {
                validarDocumentoSegunTipo(i);
            }
        });
        
        // When document field loses focus, validate it
        $("#documento_comprador_" + i).on('blur', function() {
            validarDocumentoSegunTipo(i);
        });
        
        // Allow only valid characters for documents and convert to uppercase
        $("#documento_comprador_" + i).on('input', function() {
            // Allow letters, numbers and hyphens
            let valor = $(this).val().replace(/[^a-zA-Z0-9\-]/g, '');
            // Convert to uppercase
            valor = valor.toUpperCase();
            $(this).val(valor);
        });
    }
    
    // Validate form on submit
    $("#frm_colabora").on('submit', function(e) {
        e.preventDefault(); // Prevent automatic submission
        
        // Validate all documents
        const documentosValidos = validarTodosLosDocumentos();
        
        // Validate all representative documents if any
        const representantesValidos = validarTodosLosDocumentosRepresentantes();
        
        // Validate that emails match
        const emailsValidos = validarEmailsCoinciden();
        
        // If all validations pass, submit the form
        if (documentosValidos && representantesValidos && emailsValidos) {
            loading(); // Change button text and disable it
            // Wait a moment to ensure button updates visually
            setTimeout(() => {
                this.submit(); // Submit the form
            }, 50);
        } else {
            // Focus on first field with error
            
            // First check if emails match
            if (!emailsValidos) {
                $("#email_confirmacion").focus();
                // Reset button state
                $("#btn_submit_colabora").text('ENVIAR OFERTA');
                $("#btn_submit_colabora").prop('disabled', false);
                return;
            }
            
            const numCompradores = parseInt($("#numero_compradores").val());
            let errorFound = false;
            
            // Then check buyer documents
            for (let i = 1; i <= numCompradores; i++) {
                if ($("#documento_comprador_" + i).hasClass('is-invalid')) {
                    $("#documento_comprador_" + i).focus();
                    errorFound = true;
                    break;
                }
            }
            
            // If no buyer document errors, check representative documents
            if (!errorFound) {
                for (let i = 1; i <= numCompradores; i++) {
                    if ($("#representante-" + i).length > 0 && $("#representante-" + i).is(":visible") && 
                        $("#documento_representante_" + i).hasClass('is-invalid')) {
                        $("#documento_representante_" + i).focus();
                        break;
                    }
                }
            }
            
            // Reset button state if there are errors
            $("#btn_submit_colabora").text('ENVIAR OFERTA');
            $("#btn_submit_colabora").prop('disabled', false);
        }
    });

    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1;
    var yyyy = today.getFullYear();
    if (dd < 10) {
        dd = '0' + dd;
    } 
    if (mm < 10) {
        mm = '0' + mm;
    } 
    var today = dd + '/' + mm + '/' + yyyy;


    $('#date').datepicker({
        language: "es",
        format: "dd/mm/yyyy",
        startDate: today,
        autoclose: true,
        ignoreReadonly: true
        //daysOfWeekDisabled: disable_days
    });

    $('#fecha_desde').datepicker({
        language: "es",
        format: "dd/mm/yyyy",
        startDate: today,
        autoclose: true,
        ignoreReadonly: true
        //daysOfWeekDisabled: disable_days
    });	
    
    $('.clockpicker').clockpicker({
        placement: 'top',
        align: 'left',
        donetext: 'OK'
    });
});
</script>
@endsection