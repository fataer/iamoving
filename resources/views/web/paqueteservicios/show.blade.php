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
	echo "Hola soy ".$colaborador." ".$tipo." de IAMOVING";
?>
@endsection
@section('description')
<?php
if ($service->tipo_comercial == '1') {
	$desc= "(Comercial de IAMOVING)";
} else {
	$desc= "(tomo fotos y videos para IAMOVING)";		
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
	$texto1= " de ";
	$metros = $detalle->square_meters;
	$texto2 = " m2, ";
if ($detalle->bedrooms==1) {
    $dormitorio= "1 dormitorio y ";
} elseif ($detalle->bedrooms==0) {
    $dormitorio= "";
} elseif ($detalle->bedrooms>1) {
    $dormitorio= $detalle->bedrooms." dormitorios y ";
} else {
    $dormitorio= "";
}
if ($detalle->bathrooms==1) {
    $bano= "1 baño.";
} elseif ($detalle->bathrooms==0) {
    $bano= "";
} elseif ($detalle->bathrooms>1) {
    $bano= $detalle->bathrooms." baños.";
} else {
    $bano= "";
}*/
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
		</div>
        <div  class="text-center mt-1">
            <h1>
              AGENTE COLABORADOR
            </h1>
		</div>-->
		@if ($service->avatar == 'colaboradores/default.png')
		@else
		<div  class="text-center mt-4">
			<img class="card-img-top" style="background-color:#EADD03;width:20%;"  src="/storage/{{$service->avatar}}" alt="Card image cap">
		</div>
		@endif
		<div  class="text-center mt-4">
			<img class="card-img-top" style="background-color:#EADD03;width:20%;"  src="/storage/colaboradores/default.png" alt="Card image cap">
		</div>		
		<div  class="text-center mt-4">
			<h4>Hola, soy <b>{{$service->name}}</b> @if ($service->tipo_comercial == '1')
													(Comercial de IAMOVING)</h4>
													@else
													(tomo fotos y videos para IAMOVING)</h4>
													@endif
	   <h4>Mi teléfono es: <b>{{$service->phone}}</b></h4>
        </div>
		@if ($service->campo2=='1')
		<div  class="text-center mt-4">
			<b>Nota:</b> No hay ningún coste, porque es mi primera visita de prueba, así que la publicación en IAMOVING será ilimitada, todas las fotos y los videos que se hagan, no existe ninguna tarifa, totalmente gratis y sin ninguna tarifa de renovación. Si tienes alguna duda o preguntas, podrás entrar en contacto a través de <a href="&#109;&#097;&#105;&#108;&#116;&#111;:&#105;&#110;&#102;&#111;&#064;&#105;&#097;&#109;&#111;&#118;&#105;&#110;&#103;&#046;&#099;&#111;&#109;" style="color:#EADD03;">info@iamoving.com</a>, un saludo.

        </div>
		@endif
        <hr>
        
        <hr>
        <div class="fb-comments" data-href="{{ env('APP_DEBUG') ? 'http://localhost' : url()->current() }}" data-width="100%" data-numposts="5"></div>
    </div>
@endsection
