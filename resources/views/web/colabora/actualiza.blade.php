@extends('layouts.iamovingpro')
@section('title')
<?php
$colaborador=$service->name;
if ($service->tipo_comercial == '1') {
	$tipo= "Comercial";
} else {
	$tipo= "Colaborador Audiovisual";		
}
/*if ($detalle->estudio) {
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
} else {
    $inmueble= "Piso";
}
if ($detalle->is_sale == '1'){
    $tipo=" en venta ";	
} else {
    $tipo=" en alquiler ";	
}
if($detalle->road)
{
    $dirección="en ".$detalle->road.", Madrid";
} */
	//echo "Hola soy ".$colaborador." ".$tipo." de IAMOVING";
	echo "Hola soy ".$colaborador." de IAMOVING";
?>
@endsection
@section('description')
<?php
/*if ($service->tipo_comercial == '1') {
	$desc= "(Comercial de IAMOVING)";
} else {
	$desc= "(tomo fotos y videos para IAMOVING)";		
}*/
	$desc= "Mi teléfono es: " . $service->phone;
	echo $desc;
?>
@endsection
@section('image')
<?php
$url="https://iamoving.com/storage/";
$path=$service->avatar;
echo  $url.$path;
?>
@endsection
@section('content')

    <div class="container">
		<!--<div  class="text-center mt-4">
			<img src="{{asset('img/branding.transparente.png')}}" style="margin-right: 50px;margin-bottom: 15px;" alt="" width="233px">
		</div>-->
        <div  class="text-center mt-4">
            <h3>
              ACTUALIZACIÓN DE LAS CONDICIONES IAMOVING AGENTE COLABORADOR
            </h3>
		</div>
	<!--	<div  class="text-center mt-4">
			<img class="card-img-top" style="background-color:#EADD03;width:20%;"  src="/storage/colaboradores/default.png" alt="Card image cap">
		</div>		-->
		<div  class="text-center mt-4">
			<h4>Hola <b>{{$service->name}}</b> desde IAMOVING hemos actualizado la condiciones del agente colaborador que necesitamos que aceptes.</h4>
		</div>
		@if($service->nota)											
	   <h4>La actualización se debe al siguiente cambio:</h4>
        
		<div  class="text-center mt-4">
			<h4><i>{{$service->nota}}{{$service->nota2}}</i></h4>
        </div>
		@endif
		<div  class="text-center mt-4">
Gracias y un saludo.
        </div>		
        <hr>
         <!--       <form action="{{ url('acepta_notificar') }}" method="post" id="frm_acepta" onsubmit="loading()" enctype="multipart/form-data">
                    {!! csrf_field() !!}		-->
                    <div class="form-group form-check text-center">
						<input type="checkbox" class="form-check-input" id="conditions" name="conditions"  required>
						<label class="form-check-label" for="conditions">He leído y estoy de acuerdo con <a href="/terminos-colaborador" target="_blank">los términos de colaboración</a> y <a href="/politica-privacidad" target="_blank">la política de privacidad </a>de IAMOVING</label>
                    </div>							
                    <!--<div class="form-group">
                        <textarea id="body" name="body" class="form-control" rows="4" placeholder="Descríbenos por favor tus servicios. ¡Cuéntenos en que te diferencias! " required></textarea>
                    </div>-->
                    <hr>
                    <div class="form-group">
                        <button class="btn btn-success btn-block" type="submit" id="btnSend">
                            Enviar
                        </button>
                        
                    </div>
                <!--</form>        -->
        <hr>
      <!--  <div class="fb-comments" data-href="{{ env('APP_DEBUG') ? 'http://localhost' : url()->current() }}" data-width="100%" data-numposts="5"></div>-->
    </div>
@endsection
@section('scripts')
<script>
    $(function() {
        var detalle_id = "{{$service->id}}";
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $("#btnSend").click(function(){
            if($('#conditions').is(':checked')){
                $("#btnSend").text('Procesando...');
                $("#btnSend").prop('disabled', true);
                $.ajax({
                     type:'POST',
                     url:'/actualiza_notificar',
                     data: {id: detalle_id},
                     success:function(data){
                        alert("Continuar");
                        $("#btnSend").text('Enviar');
                        location.reload();
                     },
                     error: function(XMLHttpRequest, textStatus, errorThrown) { 
                        $("#btnSend").prop('disabled',false);
                        $("#btnSend").text('Enviar');
                        alert("No se ha podido enviar su actualización. Repita la operación"); 
                    } 
                });
            }else{
                alert("Debe aceptar los términos de colaboración y la política de privacidad");
            }
        });
    });
</script>	
@endsection
