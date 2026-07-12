@extends('layouts.iamovingpro')
@section('title')
<?php
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
if ($detalle->is_sale == '1'){
    $tipo=" en venta ";	
} else {
    $tipo=" en alquiler ";	
}
// Capturar municipio
if (!empty($detalle->municipio) && $detalle->municipio !== null && $detalle->municipio !== 'Madrid') {
    $municipio = $detalle->municipio;
} else {
    $municipio = null;
}
if($detalle->ciudad_inmueble)
{
		$city=$detalle->ciudad_inmueble;	
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
	echo $inmueble.$tipo.$dirección." - Iamoving";
?>
@endsection
@section('description')
<?php
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
}
	echo $inmueble.$texto1.$metros.$texto2.$dormitorio.$bano;
?>
@endsection
@section('image')
<?php
$url="https://iamoving.com/storage/";
//$path=$detalle->path_image_primary;
$path=str_replace(".jpeg","_444x250.jpg",$detalle->path_image_primary);
echo  $url.$path;
?>
@endsection

@section('content')
    <div class="py-2" style="margin-top:20px;">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-12">
                    <div class="collapse-content">
                        <div class="collapse-item">
                           <!-- @if($detalle->tipo_plan == 'Plan Prepago')
                                <h4 class="card-text text-center">
									Plan Prepago
								</h4>
                                <p  class="card-text text-center"><u>Se paga una vez que hayamos entregado todo el contenido audiovisual</u>(video, fotos y la publicación en iamoving.com).</p>
								<p  class="card-text text-center">1 visita virtual...49€ <img src="/img/info.png" title="+iva" rel="tooltip"  id="blah3"  width="15" height="15" style="margin-bottom:5px;" alt="info"></p>
                                <p  class="card-text text-center">Pago único, sin tarifa de renovación y de manera ilimitada</p>
                            @else
                                <h4 class="card-text text-center">
									Plan Postpago
								</h4>
                                <p  class="card-text text-center"><u>Solo pagas cuando el inmueble que ha sido publicado en Iamoving, haya sido alquilado o vendido a través de Iamoving o de otros canales.</u> <img src="/img/info.png" title="También se pagará, una vez que el inmueble que se publicó no fue alquilado ni vendido 12 meses después de su fecha de publicación." rel="tooltip"  id="blah2"  width="15" height="15" style="margin-bottom:5px;" alt="info"></p>
								<p  class="card-text text-center">1 visita virtual...99€ <img src="/img/info.png" title="+iva" rel="tooltip"  id="blah3"  width="15" height="15" style="margin-bottom:5px;" alt="info"></p>
                                <p  class="card-text text-center"><b>Pago único, sin tarifa de renovación y de manera ilimitada.</b></p>
                            @endif-->
                          <!--  <p  class="card-text text-center">No te compliques la vida, @if($detalle->is_sale) vende @else alquila @endif con iamoving</p>-->
                            
                            <!--<p  class="card-text text-center"><b>Soy {{$detalle->propietario_inmobiliaria}}</b></p>-->
                <h2 class="mt-4 mb-4 text-center">
                    @if($detalle->is_sale == '0')
                     ALQUILA CON IAMOVING
					@else
					VENDE GRATIS Y SIN EXCLUSIVA
					@endif
                
                </h2>
                <p class="my-1 text-center">
                    
                     Y Ahórrate lo más valioso...tu tiempo. Eliminamos 80% de visitas innecesarias.
                
                </p>
                <!--<p class="my-1 text-center">
                
                   Eliminamos 80% de visitas innecesarias.

                
                </p>-->
                <p class="my-1 text-center">
                @if($detalle->is_sale == '0')
                Gratis y sin exclusiva.
                @endif
                </p>							
							<p  class="card-text text-center">
							<ul class="list-group list-group-flush">
                                <li class="list-group-item"><b>Fecha de publicación:</b> 
                                    <span class="text-muted"> {{  date('d-m-Y', strtotime($detalle->fecha_de_alta))  }}</span>
                                </li>
                                <li class="list-group-item"><b>Ciudad:</b> 
                                    <span class="text-muted"> {{ $ciudad }}</span>
                                </li>								
                                <li class="list-group-item"><b>Nombre:</b> 
                                    <span class="text-muted"> {{ $detalle->nombre_e }}</span>
                                </li>
                                <li class="list-group-item"><b>Correo electrónico:</b> 
                                    <span class="text-muted"> {{ $detalle->email_e }}</span>
                                </li>
                                <li class="list-group-item"><b>Teléfono:</b> 
                                    <span class="text-muted"> {{ $detalle->telefono_e }}</span>
                                </li>
                                <li class="list-group-item"><b>Dirección completa del piso en @if($detalle->is_sale) venta @else alquiler @endif:</b> 
                                    <span class="text-muted">  {{ $detalle->road }}, {{ $detalle->numero_direccion }} {{ $detalle->number_apartment }} </span>
                                </li>
                            </ul>
							</p>
                            <br />
                            <div style="align-text:center;">
                                <div class="form-group">
                                    <button id="btnSend" class="btn btn-success btn-block" type="button">
                                        Ver la publicación 
                                    </button>
                                </div>
                            </div>							
                            <div class="form-group form-check text-center">
					            <input type="checkbox" class="form-check-input" id="conditions" name="conditions"  required>
						        <label class="form-check-label" for="conditions">He leído y estoy de acuerdo con <a href="/terminosI-condiciones" target="_blank">los términos y condiciones</a> y <a href="/politica-privacidad" target="_blank">la política de privacidad </a>de IAMOVING</label>
                            </div>	

                        </div>
                    </div>
                </div>
            </div>                
        </div>
    </div>
@endsection
@section('styles')
	<style>
#tooltip
{
    text-align: center;
    color: #EADD1B;
    background: #2d2e35;
    position: absolute;
    z-index: 100;
    padding: 15px;
}
 
    #tooltip:after /* triangle decoration */
    {
        width: 0;
        height: 0;
        border-left: 10px solid transparent;
        border-right: 10px solid transparent;
        border-top: 10px solid #111;
        content: '';
        position: absolute;
        left: 50%;
        bottom: -10px;
        margin-left: -10px;
    }
 
        #tooltip.top:after
        {
            border-top-color: transparent;
            border-bottom: 10px solid #111;
            top: -20px;
            bottom: auto;
        }
 
        #tooltip.left:after
        {
            left: 10px;
            margin: 0;
        }
 
        #tooltip.right:after
        {
            right: 10px;
            left: auto;
            margin: 0;
        }
		


	</style>
@endsection
@section('scripts')
<script>
    $(function() {
        var detalle_id = "{{$detalle->id}}";
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
                     url:'/registro_propietario',
                     data: {id: detalle_id},
                     success:function(data){
                        //alert("Continuar");
                        $("#btnSend").text('Enviar');
                        location.reload();
                     },
                     error: function(XMLHttpRequest, textStatus, errorThrown) { 
                        $("#btnSend").prop('disabled',false);
                        $("#btnSend").text('Enviar');
                        alert("No se ha podido enviar su mensaje. Repita la operación"); 
                    } 
                });
            }else{
                alert("Para ver la publicación, debes aceptar los términos y condiciones y la política de privacidad");
            }
        });
    });
	
$( function()
{
    var targets = $( '[rel~=tooltip]' ),
        target  = false,
        tooltip = false,
        title   = false;
 
    targets.bind( 'mouseenter', function()
    {
        target  = $( this );
        tip     = target.attr( 'title' );
        tooltip = $( '<div id="tooltip"></div>' );
 
        if( !tip || tip == '' )
            return false;
 
        target.removeAttr( 'title' );
        tooltip.css( 'opacity', 0 )
               .html( tip )
               .appendTo( 'body' );
 
        var init_tooltip = function()
        {
            if( $( window ).width() < tooltip.outerWidth() * 1.5 )
                tooltip.css( 'max-width', $( window ).width() / 2 );
            else
                tooltip.css( 'max-width', 340 );
 
            var pos_left = target.offset().left + ( target.outerWidth() / 2 ) - ( tooltip.outerWidth() / 2 ),
                pos_top  = target.offset().top - tooltip.outerHeight() - 20;
 
            if( pos_left < 0 )
            {
                pos_left = target.offset().left + target.outerWidth() / 2 - 20;
                tooltip.addClass( 'left' );
            }
            else
                tooltip.removeClass( 'left' );
 
            if( pos_left + tooltip.outerWidth() > $( window ).width() )
            {
                pos_left = target.offset().left - tooltip.outerWidth() + target.outerWidth() / 2 + 20;
                tooltip.addClass( 'right' );
            }
            else
                tooltip.removeClass( 'right' );
 
            if( pos_top < 0 )
            {
                var pos_top  = target.offset().top + target.outerHeight();
                tooltip.addClass( 'top' );
            }
            else
                tooltip.removeClass( 'top' );
 
            tooltip.css( { left: pos_left, top: pos_top } )
                   .animate( { top: '+=10', opacity: 1 }, 50 );
        };
 
        init_tooltip();
        $( window ).resize( init_tooltip );
 
        var remove_tooltip = function()
        {
            tooltip.animate( { top: '-=10', opacity: 0 }, 50, function()
            {
                $( this ).remove();
            });
 
            target.attr( 'title', tip );
        };
 
        target.bind( 'mouseleave', remove_tooltip );
        tooltip.bind( 'click', remove_tooltip );
    });
});
$(".more_info1").click(function () {
    var $title = $(this).find(".title");
    if (!$title.length) {
        $(this).append('<span class="title">' + $(this).attr("title") + '</span>');
    } else {
        $title.remove();
    }
});	
</script>
@endsection
