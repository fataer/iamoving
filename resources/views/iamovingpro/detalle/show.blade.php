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
{{-- @section('scripts')
	<!-- BEGIN JIVOSITE CODE {literal} -->
	<script type='text/javascript'>
	(function(){ var widget_id = 'x5a8kJ01E8';var d=document;var w=window;function l(){
		var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true;
		s.src = '//code.jivosite.com/script/widget/'+widget_id
			; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}
		if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}
		else{w.addEventListener('load',l,false);}}})();
		
		if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
		    $("#video_desktop").hide();
		    $("#video_mobile").show();
		}else{
		    $("#video_mobile").hide();
		    $("#video_desktop").show();
		}
	</script>
@endsection --}}
@section('styles')
	<style>
	.datepicker table tr td.disabled{
	    color: #e3e3e3 !important;
	}
	.datepicker table tr td{
	    color: #000 !important;
	    font-weight: bold;
	}
	
.modal-dialog {
  /*display: flex;
  flex-direction: column;
  justify-content: center;
  overflow-y: auto;
  min-height: calc(100vh - 60px);
  @media (max-width: 767px) {
    min-height: calc(100vh - 20px);
  }*/
}


@media only screen and (max-width: 600px) {
    .modal-dialog {
        min-height: calc(100vh - 20px);    
        margin-top:30px;
    }
}
	
#tooltip
{
    text-align: center;
    color: #fff;
    background: #111;
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
        .dropdown-menu {
            width:190px;
        }
        
        
	</style>
	<style>
.more_info1 {
  border-bottom: 1px dotted;
  position: relative;
}

.more_info1 .title {
    position: absolute;
    top: 20px;
    background: silver;
    padding: 4px;
    left: 0;
    white-space: nowrap;
}
	.card-img-overlay {
            padding: 0;
    }
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-parent:"";
	margin-top:0cm;
	margin-right:0cm;
	margin-bottom:8.0pt;
	margin-left:0cm;
	line-height:107%;
	mso-pagination:widow-orphan;
	font-size:11.0pt;
	font-family:"Calibri",sans-serif;
	mso-ascii-font-family:Calibri;
	mso-ascii-theme-font:minor-latin;
	mso-fareast-font-family:Calibri;
	mso-fareast-theme-font:minor-latin;
	mso-hansi-font-family:Calibri;
	mso-hansi-theme-font:minor-latin;
	mso-bidi-font-family:"Times New Roman";
	mso-bidi-theme-font:minor-bidi;
	mso-fareast-language:EN-US;}	
span.SpellE
	{mso-style-name:"";
	mso-spl-e:yes;}
span.GramE
	{mso-style-name:"";
	mso-gram-e:yes;}
	
	
	.table {
 display: table;
 height:100%;
}
.table-cell {
display: table-cell;
vertical-align: middle;
}
	
    </style>
@endsection
<!-- {/literal} END JIVOSITE CODE -->
@section('content')

@php
// id del inmueble
 $id = Request()->id;
@endphp
    <section class="py-2" style="padding-bottom:5rem!important;">
        @if($detalle->is_sale == '1')
            <input type="hidden" id="view_mode" value="venta" />
        @endif
		<div class="container-fluid">
			<div class="row no-gutters">
				<div class="col-lg-2">
				</div>
				<div class="col-lg-8">	
					@if ($detalle->video_primary)
						@if (strlen($detalle->video_primary) >100)
						<!--Este texto solo visible para escritorio-->
							<div id="video_desktop" class="col-12 text-center padding-bottom:0px;  d-none d-sm-none d-md-block" style="padding-left: 0px;padding-right: 0px;">					
								<div  class="bg-white"  style="height: 590px; overflow-y: hidden;">
									<!--<blockquote class="tiktok-embed" cite="https://www.tiktok.com/@iamoving/video/7047583050032614662" data-video-id="7047583050032614662" style="max-width: 605px;min-width: 325px;" > <section> <a target="_blank" title="@iamoving" href="https://www.tiktok.com/@iamoving">@iamoving</a> 🤩Es piso en una Maravilla🤩 <a title="arganzuela" target="_blank" href="https://www.tiktok.com/tag/arganzuela">#arganzuela</a> <a title="atocha" target="_blank" href="https://www.tiktok.com/tag/atocha">#atocha</a> <a title="buscopiso" target="_blank" href="https://www.tiktok.com/tag/buscopiso">#buscopiso</a> <a title="iamoving" target="_blank" href="https://www.tiktok.com/tag/iamoving">#IAMOVING</a> <a title="sevende" target="_blank" href="https://www.tiktok.com/tag/sevende">#sevende</a> <a title="buscocasa" target="_blank" href="https://www.tiktok.com/tag/buscocasa">#buscocasa</a> <a target="_blank" title="♬ The Business - Tiësto" href="https://www.tiktok.com/music/The-Business-6906410977651066882">♬ The Business - Tiësto</a> </section> </blockquote> <script async src="https://www.tiktok.com/embed.js"></script>-->
									<?php echo "{$detalle->video_primary}"
									?>
								</div>
							</div>
						<!--Este texto solo visible para smartphone-->
							<div id="video_mobile" class="text-center padding-bottom:0px;  d-block d-sm-block d-md-none">					
								<div class="bg-white"  style="height: 598px; overflow-y: hidden;">
									<!--<blockquote class="tiktok-embed" cite="https://www.tiktok.com/@iamoving/video/7047583050032614662" data-video-id="7047583050032614662" style="max-width: 605px;min-width: 325px;" > <section> <a target="_blank" title="@iamoving" href="https://www.tiktok.com/@iamoving">@iamoving</a> 🤩Es piso en una Maravilla🤩 <a title="arganzuela" target="_blank" href="https://www.tiktok.com/tag/arganzuela">#arganzuela</a> <a title="atocha" target="_blank" href="https://www.tiktok.com/tag/atocha">#atocha</a> <a title="buscopiso" target="_blank" href="https://www.tiktok.com/tag/buscopiso">#buscopiso</a> <a title="iamoving" target="_blank" href="https://www.tiktok.com/tag/iamoving">#IAMOVING</a> <a title="sevende" target="_blank" href="https://www.tiktok.com/tag/sevende">#sevende</a> <a title="buscocasa" target="_blank" href="https://www.tiktok.com/tag/buscocasa">#buscocasa</a> <a target="_blank" title="♬ The Business - Tiësto" href="https://www.tiktok.com/music/The-Business-6906410977651066882">♬ The Business - Tiësto</a> </section> </blockquote> <script async src="https://www.tiktok.com/embed.js"></script>-->
									<?php echo "{$detalle->video_primary}"
									?>
								</div>
							</div>			
								
						@else	
						<!--Este texto solo visible para escritorio-->
							<div id="video_desktop" class="col-12 text-center padding-bottom:0px;  d-none d-sm-none d-md-block" style="padding-left: 0px;padding-right: 0px;">					
								<div  class="bg-black"  style="height: 450px; overflow-y: hidden;">
									<iframe  src="https://www.youtube.com/embed/{{$detalle->video_primary}}?modestbranding=1&rel=0" class="video-fluid z-depth-1" width="100%" height="100%" mozallowfullscreen webkitallowfullscreen  allowfullscreen></iframe>
								</div>
							</div>
						<!--Este texto solo visible para smartphone-->
							<div id="video_mobile" class="text-center padding-bottom:0px;  d-block d-sm-block d-md-none">					
								<div class="bg-black"  style="height: 370px; overflow-y: hidden;">
									<iframe src="https://www.youtube.com/embed/{{$detalle->video_primary}}?modestbranding=1&rel=0" class="video-fluid z-depth-1" width="100%" height="100%" mozallowfullscreen webkitallowfullscreen  allowfullscreen></iframe>
								</div>
							</div>	
						@endif					
					@else
						<div class="row justify-content-center padding-bottom:0px;">
						<!--Este texto solo visible para escritorio-->
							<div class="col-12 text-center padding-bottom:0px;  d-none d-sm-none d-md-block" style="padding-left: 0px;padding-right: 0px;">
								<a href="#mInforme" role="button" data-toggle="modal" data-target="#mInforme" class="mr-2">
									<img  height="399px" src="/storage/{{$detalle->path_image_primary}}" alt="Fotos inmueble">
									
								</a>
							</div>
							<!--Este texto solo visible para smartphone-->
							<div class="col-12 text-center padding-bottom:0px;  d-block d-sm-block d-md-none">
								<a href="#mInformeMin" role="button" data-toggle="modal" data-target="#mInformeMin" class="mr-2">
									
									<img src="/storage/{{$detalle->path_image_primary}}" alt="Fotos inmueble">
								</a>
							</div>							
						</div>					
					@endif
			
		    <div  class="mt-2"><!-- style="padding-left:14px;padding-right:14px;">		-->
						@if ($detalle->id == 85 || $detalle->id == 93)
						<section>
						<a href="tel:{{ $detalle->telefono }}" type="button" class="btn btn-success btn-block">Llama a la propietaria: {{ $detalle->telefono }}</a>
						</section>
						@else
							
								@if ($detalle->id == 94)
									<section class="p-0">
									</section>
								@else
									@if($detalle->estado_inmueble == 'Disponible' || $detalle->estado_inmueble == 'Reservado' || $detalle->estado_inmueble == '' || $detalle->estado_inmueble == null)
										<section class="p-0">
											@if($detalle->id != 83)  
											<button v-if="user" type="button" style="padding: 0.95rem 0.75rem;"  id="btnVisita"  class="btn btn-success btn-block" @click.prevent="modalVisita">
												Solicitar una visita presencial
											</button>
											@else
											<button v-if="user" type="button" style="padding: 0.95rem 0.75rem;" class="btn btn-success btn-block" @click.prevent="modalVisita">
												Solicitar una visita con Reforviliaria
											</button>								
											@endif


											@if($detalle->id != 83)  
											<button v-else class="btn btn-success btn-block" style="padding: 0.95rem 0.75rem;" id="salevisita" @click.prevent="modalVisita">
												Solicitar una visita presencial
											</button>
											@else
										<button v-else class="btn btn-success btn-block" style="padding: 0.95rem 0.75rem;" @click.prevent="modalVisita">
												Solicitar una visita con Reforviliaria
											</button>								
											@endif

										</section>
									@else
										
										<!--<br><br><br><br>-->
									@endif
								@endif
						@endif	
			</div>

						
		
					<!--Este texto solo visible para escritorio-->
					<div class="mt-2" style="background: #9291910f"><!--;margin-left: 14px; margin-right: 14px;">-->
					
						<!--Este texto solo visible para smartphone-->					
					<!--<div class="mt-2  d-block d-sm-block d-md-none" style="background: #9291910f;">-->
					

						<div class="container pt-1 pb-0">
							@if($detalle->tipo_inmueble == 'Habitaciones')
								@if($detalle->id != 34)
							<h5>
								<i class="fas fa-arrow-right"></i> <i class="fas fa-arrow-right"></i> <b>Habitaciones en alquiler</b>
							</h5>
								@endif	
							@endif	
							<h5>
								Datos básicos del inmueble
							</h5>
							<ul class="fa-ul">
								@if ($detalle->tipo_inmueble == 'Habitaciones' && $detalle->bedrooms>1)
								<li>
								   <span class="fa-li" >💰</span> Desde <b>{{ $detalle->propiedad_precio }}</b> /mes
								</li>
								@else
									@if($detalle->id == 94)
									@else
										@if($detalle->id != 85)
											<li>
												<span class="fa-li" ><i class="fas fa-euro-sign"></i></span> <b>{{ number_format($detalle->propiedad_precio, 0, ',', '.') }}</b> @if ($detalle->is_sale == '0')/mes @endif 
											</li>
										@else
											<li>	
											<span class="fa-li" ><i class="fas fa-euro-sign"></i></span> <b>Precio a consultar</b> 
											</li>									
										@endif
									@endif
								@endif							
								@if($detalle->road)
									@if($detalle->id != 92)
										<li>
											<span class="fa-li" ><i class="fas fa-directions"></i></span>
											     @if (!empty($detalle->municipio) && $detalle->municipio !== null && $detalle->municipio !== 'Madrid')
        {{ $detalle->road }}, {{ $detalle->municipio }}
    @else
        {{ $detalle->road }}
    @endif
										</li>
									@else
										<li>
										
											<span class="fa-li" ><i class="fas fa-directions"></i></span>
											Castillejos - Tetuán
										</li>
									 @endif
								@endif
								@if($detalle->tipo_inmueble == 'Local/Oficina')
                                    @if($detalle->oficina == '1')
                                        <li>
                                            <span class="fa-li" ><i class="fas fa-check-double text-success"></i></span>
                                            Oficina
                                        </li>                                                       
                                    @else
    									<li>
    										<span class="fa-li" ><i class="fas fa-check-double text-success"></i></span>
    										Local
    									</li>	
                                    @endif							
								@else
									@if ($detalle->estudio)
									<li>
										<span class="fa-li" ><i class="fas fa-check-double text-success"></i></span>
										Estudio @if($detalle->tipo_inmueble == 'Habitaciones')  
													@if($detalle->id != 34)  
													compartido
													@endif
												@endif
									</li>
									@endif
									@if ($detalle->loft)
									<li>
										<span class="fa-li" ><i class="fas fa-check-double text-success"></i></span>
										Loft @if($detalle->tipo_inmueble == 'Habitaciones')  
												compartido
												@endif
									</li>
									@endif
									@if ($detalle->apartamento)
									<li>
										<span class="fa-li" ><i class="fas fa-check-double text-success"></i></span>
										@if ($detalle->id>368 and $detalle->id<373)
										Habitación privada en piso compartido
										@else
										Apartamento @if($detalle->tipo_inmueble == 'Habitaciones')  
												compartido
												@endif
										@endif
									</li>
									@endif
									@if ($detalle->piso)
									<li>
										<span class="fa-li" ><i class="fas fa-check-double text-success"></i></span>
										Piso @if($detalle->tipo_inmueble == 'Habitaciones')  
												compartido
												@endif
													@if($detalle->id == 231)  
													- Oficina (escriturado como vivienda)
													@endif
									</li>
									@endif
									@if ($detalle->chalet)
									<li>
										<span class="fa-li" ><i class="fas fa-check-double text-success"></i></span>
										@if($detalle->adosado_chalet == 1)
										    Chalet Adosado
										@elseif($detalle->adosado_chalet == 2)
										    Chalet Independiente
										@elseif($detalle->adosado_chalet == 1)
										    Chalet Pareado
										@else
    										Chalet @if($detalle->tipo_inmueble == 'Habitaciones')  
    												compartido
    										@endif
										@endif
									</li>
									@endif
									@if ($detalle->bajo)
									<li>
										<span class="fa-li" ><i class="fas fa-check-double text-success"></i></span>
										Bajo @if($detalle->tipo_inmueble == 'Habitaciones')  
												compartido
												@endif
									</li>
									@endif
									@if ($detalle->atico)
									<li>
										<span class="fa-li" ><i class="fas fa-check-double text-success"></i></span>
										Ático @if($detalle->tipo_inmueble == 'Habitaciones')  
												compartido
												@endif
									</li>
									@endif
									@if ($detalle->casa)
									<li>
										<span class="fa-li" ><i class="fas fa-check-double text-success"></i></span>
										Casa @if($detalle->tipo_inmueble == 'Habitaciones')  
												compartido
												@endif
									</li>
									@endif									
								@endif
								@if($detalle->id == 34)
										<li>
											<span class="fa-li" ><i class="fas fa-bed"></i></span>
											Estudio 1
										</li>
										<li>
											<span class="fa-li" ><i class="fas fa-bed"></i></span>
											Estudio 2
										</li>										
								@else
									@if($detalle->bedrooms>0)
										@if($detalle->tipo_inmueble == 'Local/Oficina')
											<li>
												<span class="fa-li" ><i class="fas fa-bed"></i></span>
												Estancias: {{$detalle->bedrooms}}
															
											</li>								
										@else										
											@if($detalle->id ==2)
											<li>
												<span class="fa-li" ><i class="fas fa-bed"></i></span>
												Habitación privada en piso compartido
											</li>									
											@else
											<li>
												<span class="fa-li" ><i class="fas fa-bed"></i></span>
												Dormitorios: @if($detalle->id !=57){{$detalle->bedrooms}}
															@else
															2
														@endif
											</li>
											@endif
										@endif
								 @endif
									@if($detalle->bathrooms>0)	
									<li>
										<span class="fa-li" ><i class="fas fa-bath"></i></span>
										 <?php 
													if($detalle->aseos>0){
														echo "Baños: ".$detalle->bathrooms." y Aseos: ".$detalle->aseos;
													}
													else{
														echo "Baños: ".$detalle->bathrooms;
													}
													
?>
									</li>
									@else
										<li>
											<span class="fa-li" ><i class="fas fa-bath"></i></span>										
											@if($detalle->aseos>0) Aseos: {{$detalle->aseos}}@endif
										</li>										
									@endif
								@endif
								@if($detalle->square_meters)

								<li>
									<span class="fa-li" ><i class="fas fa-ruler-combined"></i></span>
									Metros construidos aprox. {{$detalle->square_meters}} m<sup>2</sup>
								</li>								
								@endif
						@if($detalle->id == 83 || $detalle->id == 85 || $detalle->id == 41 || $detalle->id == 94)  
						@else
						<li>
							<span class="fa-li" ><i class="fas fa-book"></i></span>
							Referencia: {{$detalle->id}}
						</li>
						<li>
								@if($detalle->estado_inmueble == 'Disponible')
									<span class="fa-li" ><i class="fas fa-check"></i></span>{{$detalle->estado_inmueble}}
								@elseif($detalle->estado_inmueble == 'Reservado')
									<span class="fa-li" ><i class="fa fa-frown"></i></span> {{$detalle->estado_inmueble}}
								@elseif($detalle->estado_inmueble == 'Alquilado')
									<span class="fa-li" ><i class="fa fa-frown"></i></span> {{$detalle->estado_inmueble}}	
								@elseif($detalle->estado_inmueble == 'Vendido')
									<span class="fa-li" ><i class="fa fa-frown"></i></span> {{$detalle->estado_inmueble}}
									<!-- cara blanca triste -><span class="fa-li" ><i class="far fa-frown"></i></span>-->
								@else
								@endif
						</li>
						@endif

								@if($detalle->fecha_de_alta)
										<li>
											<span class="fa-li" ><i class="fas fa-calendar"></i></span>
											 Fecha alta: {{  date('d-m-Y', strtotime($detalle->fecha_de_alta))  }}
										</li>
								@endif									
					
						
								@if($detalle->hay_transporte>0)
									@foreach ($transportes as $transporte)
									@endforeach								
								@endif
							
							</ul>
						
							<section class="collapse-content">
								<div class="collapse-item">
									<button id="id_fotos" name="id_fotos" class="btn-collapse text-left"  href="#mInforme"  style="cursor:pointer;color:#eadd03;width:100%;border: none;outline:none;" data-toggle="modal" data-target="#mInforme" role="button" aria-expanded="false" >
										<i class="fas fa-image fa-fw"></i>
										Fotos
									</button>
								</div>	
							@if($detalle->hay_barrio == 1)		
								<div class="collapse-item">
									<button  id="id_barrio"  class="btn-collapse text-left"  href="#mInformeBarrio"  style="cursor:pointer;color:#eadd03;width:100%;border: none;outline:none;" data-toggle="modal" data-target="#mInformeBarrio" role="button" aria-expanded="false" >
										<i class="fas fa-building fa-fw"></i>
										Barrio
										</button>
								</div>								
							@endif
								<div class="collapse-item">
									<button id="id_mapa"  class="btn-collapse text-left" href="#mMapa" style="cursor:pointer;color:#eadd03;width:100%;border: none;outline:none;" data-toggle="modal" data-target="#mMapa" role="button" aria-expanded="false" >
										<i class="fas fa-map fa-fw"></i>
										Mapa
										</button>
								</div>
							@if($detalle->path_plano)
								<div class="collapse-item">
									<button id="id_plano"  class="btn-collapse text-left" href="https://iamoving.com/storage/{{$detalle->path_plano}}" style="cursor:pointer;color:#eadd03;width:100%;border: none;outline:none;" data-toggle="modal" data-target="#mPlano" role="button" aria-expanded="false" >
										<i class="fas fa-drafting-compass fa-fw"></i>
										Plano
										</button>
								</div>				
							@endif									
							@if ($detalle->alquiler_casa)
								<div class="collapse-item" v-if="{{$detalle->is_sale}} == '0'">
									<button id="id_disponible" class="btn-collapse text-left" style="cursor:pointer;color:#eadd03;width:100%;border: none;outline:none;"  data-toggle="collapse" href="#collapse-fecha" role="button" aria-expanded="false" aria-controls="collapse-fecha">
										<i class="fas fa-calendar fa-fw"></i>
										Disponible
									</button>
									<div class="collapse" id="collapse-fecha"> 
										<div class="content-collapse">
											<ul class="list-group list-group-flush">

												<li class="list-group-item">
													<span class="text-muted">
														 A partir de {{  date('d-m-Y', strtotime($detalle->alquiler_casa))  }} 
														@if ($detalle->fecha_salida)
															hasta {{  date('d-m-Y', strtotime($detalle->fecha_salida))  }}
														@endif
													</span>
												</li>

											</ul>
										</div>
									</div>
								</div>
							@endif
								{{-- Calendario --}}
								@if ($detalle->contrato)
								<div class="collapse-item" v-if="{{$detalle->is_sale}} == '0'">
									<button id="id_minimo" class="btn-collapse text-left" style="cursor:pointer;color:#eadd03;width:100%;border: none;outline:none;" data-toggle="collapse" href="#collapse-calendario" role="button" aria-expanded="false" aria-controls="collapse-calendario">
										<i class="fas fa-calendar-check fa-fw"></i>
										Tiempo mínimo de contrato
										</button>
										
									
									<div class="collapse" id="collapse-calendario"> 
										<div class="content-collapse">
											<ul class="list-group list-group-flush">
												<li class="list-group-item">
													<span class="text-muted">{{$detalle->contrato}} {{$detalle->contrato > 1 ? 'meses' : 'mes'}} </span><a href="#mContrato" role="button" data-toggle="modal" data-target="#mContrato" class="mr-2"><img src="/img/info.png"  width="17" height="17" style="margin-bottom:5px;" alt="info"></a>
												</li>
											</ul>
										</div>
									</div>
								</div>
								@endif
								{{-- Calendario maximo--}}
								@if ($detalle->tiempo_maximo)
								<div class="collapse-item" v-if="{{$detalle->is_sale}} == '0'">
									<button id="id_maximo"  class="btn-collapse text-left" style="cursor:pointer;color:#eadd03;width:100%;border: none;outline:none;"  data-toggle="collapse" href="#collapse-calendario-maximo" role="button" 
									aria-expanded="false" aria-controls="collapse-calendario-maximo">
										<i class="fas fa-calendar-check fa-fw"></i>
										Tiempo máximo de contrato
										</button>
									<div class="collapse" id="collapse-calendario-maximo"> 
										<div class="content-collapse">
											<ul class="list-group list-group-flush">
												<li class="list-group-item">
													<span class="text-muted">{{$detalle->tiempo_maximo}} @if ($detalle->tiempo_maximo == '1')
														año
													@elseif ($detalle->tiempo_maximo == '5')
														años
													@else
														meses
													@endif
													</span><a href="#mContrato_maximo" role="button" data-toggle="modal" data-target="#mContrato_maximo" class="mr-2"><img src="/img/info.png"  width="17" height="17" style="margin-bottom:5px;" alt="info"></a>
												</li>
											</ul>
										</div>
									</div>
								</div>				
								@endif
								{{-- Estado --}}
								@if ($detalle->propiedad_estado)
								<div class="collapse-item">
									<button id="id_estado"  class="btn-collapse text-left" style="cursor:pointer;color:#eadd03;width:100%;border: none;outline:none;"  data-toggle="collapse" href="#collapse-estado" role="button" aria-expanded="false" aria-controls="collapse-estado">
										<i class="fas fa-house-damage fa-fw"></i>
										Estado
									</button>
									<div class="collapse" id="collapse-estado"> 
										<div class="content-collapse">
											<ul class="list-group list-group-flush">
												<li class="list-group-item">
													<span class="text-muted">{{ $detalle->propiedad_estado }}</span>
												</li>
											</ul>
										</div>
									</div>
								</div>
								@endif
								{{--Habitación Amueblada --}}
								@if ($detalle->tipo_inmueble == 'Habitaciones')
								<div class="collapse-item" >
									<button id="id_amuhab"  class="btn-collapse text-left"  style="cursor:pointer;color:#eadd03;width:100%;border: none;outline:none;"  data-toggle="collapse" href="#collapse-habitacion_vacia" role="button" aria-expanded="false" aria-controls="collapse-habitacion_vacia">
										<i class="fas fa-chair fa-fw"></i>
										¿Se encuentra amueblada la habitación?
									</button>
									<div class="collapse" id="collapse-habitacion_vacia"> 
										<div class="content-collapse">
											<ul class="list-group list-group-flush">
												<li class="list-group-item">
													<span class="text-muted">
													{{ $detalle->habitacion_vacia }}
													</span>
												</li>
											</ul>
										</div>
									</div>
								</div>	
								@endif
								{{-- Amueblado --}}
								@if ($detalle->amueblada)
								<div class="collapse-item" v-if="{{$detalle->is_sale}} == '0'">
									<button id="id_amueblado"  class="btn-collapse text-left" style="cursor:pointer;color:#eadd03;width:100%;border: none;outline:none;"  data-toggle="collapse" href="#collapse-amueblado" role="button" aria-expanded="false" aria-controls="collapse-amueblado">
										<i class="fas fa-chair fa-fw"></i>
										¿Se encuentra amueblado?
									</button>
									<div class="collapse" id="collapse-amueblado"> 
										<div class="content-collapse">
											<ul class="list-group list-group-flush">
												<li class="list-group-item">
													<span class="text-muted">
													{{ $detalle->amueblada }}
													</span>@if ($detalle->comentario_inmueble)
														<a href="#mComentarioMuebles" role="button" data-toggle="modal" data-target="#mComentarioMuebles" class="mr-2"><img src="/img/info.png"  width="17" height="17" style="margin-bottom:5px;" alt="info"></a>
													@endif
												</li>
											</ul>
										</div>
									</div>
								</div>
								@endif
								{{-- Amueblado venta--}}
								@if ($detalle->amueblada)
								<div class="collapse-item" v-if="{{$detalle->is_sale}} == '1'">
									<button id="id_amueblaventa" class="btn-collapse text-left"  style="cursor:pointer;color:#eadd03;width:100%;border: none;outline:none;"  data-toggle="collapse" href="#collapse-amueblado" role="button" aria-expanded="false" aria-controls="collapse-amueblado">
										<i class="fas fa-chair fa-fw"></i>
										¿Se vende amueblado?
									</button>
									<div class="collapse" id="collapse-amueblado"> 
										<div class="content-collapse">
											<ul class="list-group list-group-flush">
												<li class="list-group-item">
													<span class="text-muted">
													{{ $detalle->amueblada }}
													</span>@if ($detalle->comentario_inmueble)
														<a href="#mComentarioMuebles" role="button" data-toggle="modal" data-target="#mComentarioMuebles" class="mr-2"><img src="/img/info.png"  width="17" height="17" style="margin-bottom:5px;" alt="info"></a>
													@endif
												</li>
											</ul>
										</div>
									</div>
								</div>	
								@endif								
								{{-- Transporte --}}
								@if ($detalle->path_video_transport)
									<div class="collapse-item">
										<button id="id_transporte" class="btn-collapse text-left" style="cursor:pointer;color:#eadd03;width:100%;border: none;outline:none;"  data-toggle="collapse" href="#collapse-transporte" role="button" aria-expanded="false" aria-controls="collapse-transporte">
											<i class="fas fa-route fa-fw"></i>
											Transporte
										</button>
										<div class="collapse" id="collapse-transporte"> 
											<div class="content-collapse">
												<div class="bg-black"  style="height: 400px;">
													<video src="/storage/{{$detalle->path_video_transport}}" class="video-fluid z-depth-1" controls poster="https://iamoving.com/img/transporte.png" width="100%" height="100%" controls preload="none"></video>
												</div>
											</div>
										</div>
									</div>
								@endif
								{{-- Lo que es importante para mi --}}
								<div class="collapse-item">
									<button id="id_importante" class="btn-collapse text-left" style="cursor:pointer;color:#eadd03;width:100%;border: none;outline:none;"  data-toggle="collapse" href="#collapse-importante" role="button" aria-expanded="false" aria-controls="collapse-importante">
										<i class="fas fa-exclamation-circle fa-fw"></i>
										Muy importante
									</button>
									<div class="collapse" id="collapse-importante"> 
										<div class="content-collapse">
											<ul class="list-group list-group-flush">
												@if ($detalle->estudio || $detalle->loft || $detalle->apartamento || $detalle->piso || $detalle->bajo || $detalle->atico)	
    												@if ($detalle->lift)
    													<li class="list-group-item">
    														Ascensor: Si
    													</li>
    												@else
    													<li class="list-group-item">
    														Ascensor: No
    													</li>
    												@endif
												@endif											    
												@if ($detalle->exterior)
													<li class="list-group-item">
														Exterior
													</li>
												@endif
												@if ($detalle->interior)
													<li class="list-group-item">
														Interior
													</li>
												@endif
												@if ($detalle->terraza)
													<li class="list-group-item">
														Terraza
													</li>
												@endif
												@if ($detalle->balcon)
													<li class="list-group-item">
														Balcón
													</li>
												@endif
												@if ($detalle->patio)
													<li class="list-group-item">
														Patio
													</li>
												@endif												
												@if ($detalle->tendero)
													<li class="list-group-item">
														Tendedero
													</li>
												@endif
												@if ($detalle->aire_acondicionado)
													<li class="list-group-item">
														Aire acondicionado
													</li>
												@endif
												@if ($detalle->ventana_climalit)
													<li class="list-group-item">
														Ventana Climalit
													</li>
												@endif
												@if ($detalle->rampa)
													<li class="list-group-item">
														Acceso a minusválidos en el portal
													</li>
												@endif
												@if ($detalle->bebe_rampa)
													<li class="list-group-item">
														Ascensor entra un carrito de bebé
													</li>
												@endif
												@if ($detalle->portero)
													<li class="list-group-item">
														Portero
													</li>
												@endif
												@if ($detalle->video_portero)
													<li class="list-group-item">
														Video portero
													</li>
												@endif	
												@if ($detalle->lavavajillas)
													<li class="list-group-item">
														Lavavajillas
													</li>
												@endif	
												@if ($detalle->horno)
													<li class="list-group-item">
														Horno
													</li>
												@endif													
												@if ($detalle->piso_importante)
													<li class="list-group-item">
														<b>¿Qué Planta es?:</b>
														<span class="text-muted">{{$detalle->piso_importante}}</span>
													</li>
												@endif
												@if ($detalle->plantas_edificio)
													<li class="list-group-item">
														<b>¿Plantas del edificio?:</b>
														<span class="text-muted">{{$detalle->plantas_edificio}}</span>
													</li>
												@endif
												@if ($detalle->plantas_chalet)
													<li class="list-group-item">
														<b>¿Plantas del chalet?:</b>
														<span class="text-muted">{{$detalle->plantas_chalet}}</span>
													</li>
												@endif													
												@if ($detalle->calefaccion)
													<li class="list-group-item">
														<b>Calefacción:</b>
														<span class="text-muted">{{$detalle->calefaccion}}</span>
													</li>
												@endif
												@if ($detalle->calentador_agua)
													<li class="list-group-item">
														<b>Caldera del agua:</b>
														<span class="text-muted">{{$detalle->calentador_agua}}</span>
													</li>
												@endif 
												@if ($detalle->orientacion_solar)
													<li class="list-group-item">
														<b>Orientación:</b>
														<span class="text-muted">{{$detalle->orientacion_solar}}</span>
													</li>
												@endif												
												@if ($detalle->orientacion)
													<li class="list-group-item">
														<b>Orientación:</b>
														<span class="text-muted">{{$detalle->orientacion}}</span>
													</li>
												@endif
												@if ($detalle->suite)
													<li class="list-group-item">
														<b>Baño incorporado en la habitación:</b>
														<span class="text-muted">{{$detalle->suite}}</span>
													</li>
												@endif
												@if ($detalle->is_sale == '0')
													@if ($detalle->mascotas_no == '1')
													<li class="list-group-item">
														<b>No acepta mascotas</b><span style='font-family:"Segoe UI Emoji",sans-serif'>&#128542;</span>
													</li>														
													@else
													<li class="list-group-item">
														<b>¿Aceptan mascotas? </b><a href="#mMascotas" role="button" data-toggle="modal" data-target="#mMascotas" class="mr-2"><img src="/img/info.png"  width="17" height="17" style="margin-bottom:5px;" alt="info"></a>
													</li>
													@endif
												@endif
												@if ($detalle->tipo_suelo)
													<li class="list-group-item">
														<b>Tipo de Suelo:</b>
														<span class="text-muted">{{$detalle->tipo_suelo}}</span>
													</li>
												@endif
												@if ($detalle->tipo_pared)
													<li class="list-group-item">
														<b>Pared:</b>
														<span class="text-muted">{{$detalle->tipo_pared}}</span>
													</li>
												@endif	
												@if ($detalle->pintura_estado)
													<li class="list-group-item">
														<b>Estado Pintura:</b>
														<span class="text-muted">@if ($detalle->pintura_estado == '1')
															Recién pintado
														@elseif ($detalle->pintura_estado == '2')
														En buen estado
														@endif</span>
													</li>
												@endif													
												@if ($detalle->tipo_inmueble == 'Local/Oficina')
														@if ($detalle->numero_escaparates)
															<li class="list-group-item">
																<b>¿Cuántos escaparates tiene?:</b>
																<span class="text-muted">{{$detalle->numero_escaparates}}</span>
															</li>
														@endif	
														@if ($detalle->plantas_local)
															<li class="list-group-item">
																<b>¿Plantas del Local/Oficina?:</b>
																<span class="text-muted">{{$detalle->plantas_local}}</span>
															</li>
														@endif															
														@if ($detalle->diafano)
															<li class="list-group-item">
																Diafano
															</li>
														@endif
														@if ($detalle->divido_mamparas)
															<li class="list-group-item">
																Dividido con Mamparas
															</li>
														@endif
														@if ($detalle->divido_tabiques)
															<li class="list-group-item">
																Dividido con Tabiques
															</li>
														@endif
														@if ($detalle->salida_humos)
															<li class="list-group-item">
																Salida de humos
															</li>
														@endif
														@if ($detalle->pie_calle)
															<li class="list-group-item">
																A pie de calle
															</li>
														@endif
														@if ($detalle->centro_comercial)
															<li class="list-group-item">
																En centro comercial
															</li>
														@endif
														@if ($detalle->entreplanta)
															<li class="list-group-item">
																Entreplanta
															</li>
														@endif
														@if ($detalle->subterraneo)
															<li class="list-group-item">
															    Subterráneo
															</li>
														@endif														
														@if ($detalle->puerta_seguridad)
															<li class="list-group-item">
																Puerta de seguridad
															</li>
														@endif
														@if ($detalle->sistema_alarma)
															<li class="list-group-item">
																Sistema de alarma
															</li>
														@endif
														@if ($detalle->circuito_seguridad)
															<li class="list-group-item">
																Cirtuito cerrado de seguridad
															</li>
														@endif
														@if ($detalle->almacen)
															<li class="list-group-item">
																Almacén
															</li>
														@endif
														@if ($detalle->esquina)
															<li class="list-group-item">
																Hace esquina
															</li>
														@endif	
														@if ($detalle->numero_ascensores)
															<li class="list-group-item">
																<b>¿Cuantos ascensores tiene?:</b>
																<span class="text-muted">{{$detalle->numero_ascensores}}</span>
															</li>
														@endif															
														@if ($detalle->montacargas)
															<li class="list-group-item">
																Montacargas
															</li>
														@endif												
												
												@endif	
												{{-- 
												@if ($detalle->is_sale == '0')
													<li class="list-group-item">
														<b>La cocina tiene:</b>
														<span class="text-muted">
															{{$detalle->horno ? 'horno /' : null}}
															{{$detalle->lavavajillas ? 'lavavajillas' : null}}
														</span>
													</li>
												@endif
												--}}
											</ul>
										</div>
									</div>
								</div>
								{{-- Gastos aprox --}}
								@if ($detalle->is_sale==1)
								@if ($detalle->gastos_agua>0 || $detalle->gastos_basura>0 || $detalle->gastos_comunidad>0 || ($detalle->gastos_ibi>0 || str_contains($detalle->gastos_ibi, 'Exento')) || ($detalle->gastos_tbasura>0 || str_contains($detalle->gastos_tbasura, 'Exento')))
								<div class="collapse-item" v-if="{{$detalle->is_sale}} == '1'">
									<button id="id_garaje"  class="btn-collapse text-left" style="cursor:pointer;color:#eadd03;width:100%;border: none;outline:none;" data-toggle="collapse" href="#collapse-certificado" role="button" aria-expanded="false" aria-controls="collapse-certificado">
										<i class="fas fa-fw fa-hand-holding-usd"></i>
										Gastos aprox.
									</button>
									<div class="collapse" id="collapse-certificado"> 
										<div class="content-collapse">
											<ul class="list-group list-group-flush">
												@if ($detalle->gastos_agua>0)
												<li class="list-group-item">
													<b>Agua:</b> 
													<span class="text-muted">€ {{$detalle->gastos_agua}}/mes</span>
												</li>
												@endif
												@if ($detalle->gastos_basura>0)
												<li class="list-group-item">
													<b>Tasa de basura:</b> 
													<span class="text-muted">€ {{$detalle->gastos_basura}}/mes</span>
												</li>
												@endif
												@if ($detalle->gastos_comunidad>0)
												<li class="list-group-item">
													<b>Comunidad:</b> 
													<span class="text-muted">€ {{$detalle->gastos_comunidad}}/mes @if ($detalle->incluido_comunidad)
																													({{ $detalle->incluido_comunidad }})
																													@endif</span>
												</li>
												@endif
												@if ($detalle->gastos_ibi>0 || str_contains($detalle->gastos_ibi, 'Exento'))
												<li class="list-group-item">
													<b>ibi:</b> 
                                                    @if(str_contains($detalle->gastos_ibi, 'Exento'))
                                                        <span class="text-muted">{{ $detalle->gastos_ibi }}</span>
                                                    @else
                                                        <span class="text-muted">€ {{ number_format($detalle->gastos_ibi, 0, ',', '.') }}/año</span>
                                                    @endif
												</li>
												@endif
												@if ($detalle->gastos_tbasura>0 || str_contains($detalle->gastos_tbasura, 'Exento'))
												<li class="list-group-item">
													<b>Tasa Basura:</b> 
                                                    @if(str_contains($detalle->gastos_ibi, 'Exento'))
                                                        <span class="text-muted">{{ $detalle->gastos_tbasura }}</span>
                                                    @else
                                                        <span class="text-muted">€ {{ number_format($detalle->gastos_tbasura, 0, ',', '.') }}/año</span>
                                                    @endif
												</li>
												@endif												
											</ul>
										</div>
									</div>
								</div>
								@endif
								@endif
								{{-- Incluido en el precio --}}
								@if ($detalle->is_sale==1)
								@if ($detalle->garaje_incluido_precio  || $detalle->testero_incluido)
								<div class="collapse-item" v-if="{{$detalle->is_sale}} == '1'">
									<button id="id_incluido"  class="btn-collapse text-left" style="cursor:pointer;color:#eadd03;width:100%;border: none;outline:none;" data-toggle="collapse" href="#collapse-incluido" role="button" aria-expanded="false" aria-controls="collapse-incluido">
										<i class="fas fa-fw fa-hand-holding-usd"></i>
										Incluido en el precio
									</button>
									<div class="collapse" id="collapse-incluido"> 
										<div class="content-collapse">
											<ul class="list-group list-group-flush">
												@if ($detalle->garaje_incluido_precio)
													<li class="list-group-item">
                                                    @if ($detalle->plazas_garaje >1)
                                                        {{$detalle->plazas_garaje}} plazas de garaje
													@else
														Garaje
                                                    @endif
                                                    </li>
												@endif	
												@if ($detalle->testero_incluido)
													<li class="list-group-item">Trastero</li>
												@endif													
											</ul>												
										</div>
									</div>
								</div>
								@endif
								@endif								
								{{-- gastos incluidos --}}
						@if ($detalle->is_sale == '0' && $detalle->gastos_incluido_calentamiento || $detalle->gastos_incluido_agua || $detalle->gastos_incluido_luz || $detalle->gastos_incluidos_gas || $detalle->gastos_incluidos_basura || $detalle->gastos_incluido_comunidad || $detalle->gastos_incluido_ibi || $detalle->gastos_incluido_tbasura || $detalle->garaje_incluido_precio || $detalle->testero_incluido || $detalle->gastos_incluido_internet)			
								<div class="collapse-item" v-if="{{$detalle->is_sale}} == '0'">
									<button id="id_precio"  class="btn-collapse text-left" style="cursor:pointer;color:#eadd03;width:100%;border: none;outline:none;" data-toggle="collapse" href="#collapse-gastos" role="button" aria-expanded="false" aria-controls="collapse-gastos">
										<i class="fas fa-hand-holding-usd fa-fw"></i>
										Incluido en el precio
									</button> 

									<div class="collapse" id="collapse-gastos"> 
										<div class="content-collapse">

											<ul class="list-group list-group-flush">
												@if ($detalle->gastos_incluido_calentamiento)
													<li class="list-group-item">Calefacción</li>
												@endif
												@if ($detalle->gastos_incluido_agua)
													<li class="list-group-item">Agua</li>
												@endif
												@if ($detalle->gastos_incluido_luz)
													<li class="list-group-item">Luz</li>
												@endif
												@if ($detalle->gastos_incluidos_gas)
													<li class="list-group-item">Gas</li>
												@endif
												@if ($detalle->gastos_incluidos_basura)
													<li class="list-group-item">Tasa de basura</li>
												@endif
												@if ($detalle->gastos_incluido_comunidad)
													<li class="list-group-item">Comunidad</li>
												@endif
												@if ($detalle->gastos_incluido_ibi)
													<li class="list-group-item">ibi</li>
												@endif
												@if ($detalle->gastos_incluido_tbasura)
													<li class="list-group-item">tasa basura</li>
												@endif												
												@if ($detalle->garaje_incluido_precio)
													<li class="list-group-item">Garaje
                                                    @if ($detalle->garaje_dos_plazas)
                                                        (2 plazas)
                                                    @endif
                                                    </li>
												@endif	
												@if ($detalle->testero_incluido)
													<li class="list-group-item">Trastero</li>
												@endif													
												@if ($detalle->gastos_incluido_internet)
													<li class="list-group-item">Internet</li>
												@endif
											</ul>
										</div>
									</div>
								</div>
						@endif
								{{-- datos del edificios --}}
@if ($detalle->jardin || $detalle->piscina || $detalle->gym || $detalle->sauna || $detalle->zona_deportiva || $detalle->zona_infantil 
 || $detalle->garaje_opcion || $detalle->opcion_trastero_edificio || $detalle->aproximate_cost_garages || $detalle->venta_cost_garage || 
 $detalle->antiguedad_edificio 
 || ($detalle->garaje_comprar && ($detalle->garaje_comprar == 'Opción de garaje en el mismo edificio' || $detalle->garaje_comprar == 'Opción de garaje en el mismo edificio con acceso directo'))
 || ($detalle->garaje_alquilar && ($detalle->garaje_alquilar == 'Opción de garaje en el mismo edificio' || $detalle->garaje_alquilar == 'Opción de garaje en el mismo edificio con acceso directo')))		
								<div class="collapse-item">
									<button id="id_edificio" class="btn-collapse text-left" style="cursor:pointer;color:#eadd03;width:100%;border: none;outline:none;"  data-toggle="collapse" href="#collapse-edificio" role="button" aria-expanded="false" aria-controls="collapse-edificio">
										<i class="fas fa-fw fa-building"></i>
										@if ($detalle->chalet)
										Datos de la casa
										@else
										Datos del edificio
										@endif
									</button>
									<div class="collapse" id="collapse-edificio"> 
										<div class="content-collapse">

											<ul class="list-group list-group-flush">
												@if ($detalle->jardin)
													<li class="list-group-item">Jardín</li>
												@endif
												@if ($detalle->piscina)
													<li class="list-group-item">Piscina</li>
												@endif
												@if ($detalle->gym)
													<li class="list-group-item">Gym</li>
												@endif
												@if ($detalle->sauna)
													<li class="list-group-item">Sauna</li>
												@endif
												@if ($detalle->zona_deportiva)
													<li class="list-group-item">Zona deportiva</li>
												@endif
												@if ($detalle->zona_infantil)
													<li class="list-group-item">Zona infantil</li>
												@endif
												@if ($detalle->garaje_opcion)
													<li class="list-group-item">Opción de garaje en el mismo edificio</li>    													
												@endif
				{{-- NUEVOS CAMPOS DE GARAJE PARA COMPRAR --}}
				@if ($detalle->garaje_comprar && ($detalle->garaje_comprar == 'Opción de garaje en el mismo edificio' || $detalle->garaje_comprar == 'Opción de garaje en el mismo edificio con acceso directo'))
					<li class="list-group-item">
						{{ $detalle->garaje_comprar }}
						@if($detalle->precio_compra_garaje && $detalle->precio_compra_garaje > 0): 
						    {{ number_format($detalle->precio_compra_garaje, 0, ',', '.') }} €
						@endif
					</li>
				@endif
				
				{{-- NUEVOS CAMPOS DE GARAJE PARA ALQUILAR --}}
				@if ($detalle->garaje_alquilar && ($detalle->garaje_alquilar == 'Opción de garaje en el mismo edificio' || $detalle->garaje_alquilar == 'Opción de garaje en el mismo edificio con acceso directo'))
					<li class="list-group-item">
						{{ $detalle->garaje_alquilar }}
						@if($detalle->precio_alquilar_garaje && $detalle->precio_alquilar_garaje > 0): 
						    {{ number_format($detalle->precio_alquilar_garaje, 0, ',', '.') }} €/mes
						@endif
					</li>
				@endif												
												@if ($detalle->opcion_trastero_edificio)
													<li class="list-group-item">Opción de trastero en el mismo edificio</li>
												@endif
												
    												@if ($detalle->aproximate_cost_garages)
    													<li class="list-group-item">
    														<b>Precio aprox. de plaza de garaje en alquiler por la zona:</b> 
    														<span class="text-muted"> {{ $detalle->aproximate_cost_garages }} €/mes</span>
    													</li>
    												@endif
												@if($detalle->id != 1426)
                                                    @if ($detalle->venta_cost_garage)
                                                        <li class="list-group-item">
                                                            <b>Precio aprox. de plaza de garaje en venta por la zona:</b> 
                                                            <span class="text-muted"> {{ number_format($detalle->venta_cost_garage, 0, ',', '.') }} €</span>
                                                        </li>
                                                    @endif                   
                                                @endif                   
												@if ($detalle->antiguedad_edificio)
													<li class="list-group-item">
														<b>Antigüedad del edificio:</b>
														<span class="text-muted">{{ $detalle->antiguedad_edificio }}</span>
													</li>
												@endif
												@if ($detalle->certificado_energetico) 
													<li class="list-group-item">
														<b>Certificado:</b>
														<span class="text-muted">{{$detalle->certificado_energetico}}</span>
													</li>
												@endif
											</ul>
										</div>
									</div>
								</div>
								@endif
{{-- NUEVO BLOQUE: ALREDEDORES --}}
@if (($detalle->garaje_comprar && $detalle->garaje_comprar == 'Opción de garaje en los alrededores')
 || ($detalle->garaje_alquilar && $detalle->garaje_alquilar == 'Opción de garaje en los alrededores'))
<div class="collapse-item">
	<button id="id_alrededores" class="btn-collapse text-left" style="cursor:pointer;color:#eadd03;width:100%;border: none;outline:none;"  data-toggle="collapse" href="#collapse-alrededores" role="button" aria-expanded="false" aria-controls="collapse-alrededores">
		<i class="fas fa-fw fa-map-marked-alt"></i>
		Alrededores
	</button>
	<div class="collapse" id="collapse-alrededores"> 
		<div class="content-collapse">
			<ul class="list-group list-group-flush">
				{{-- GARAJE PARA COMPRAR EN LOS ALREDEDORES --}}
				@if ($detalle->garaje_comprar && $detalle->garaje_comprar == 'Opción de garaje en los alrededores')
					<li class="list-group-item">
						{{ $detalle->garaje_comprar }}
						@if($detalle->precio_compra_garaje && $detalle->precio_compra_garaje > 0): 
						    {{ number_format($detalle->precio_compra_garaje, 0, ',', '.') }} €
						@endif
					</li>
				@endif
				
				{{-- GARAJE PARA ALQUILAR EN LOS ALREDEDORES --}}
				@if ($detalle->garaje_alquilar && $detalle->garaje_alquilar == 'Opción de garaje en los alrededores')
					<li class="list-group-item">
						{{ $detalle->garaje_alquilar }}
						@if($detalle->precio_alquilar_garaje && $detalle->precio_alquilar_garaje > 0): 
						    {{ number_format($detalle->precio_alquilar_garaje, 0, ',', '.') }} €/mes
						@endif
					</li>
				@endif
			</ul>
		</div>
	</div>
</div>
@endif								
								{{-- nota --}}
								@if ($detalle->path_video_nota)
									<div class="collapse-item">
										<button id="id_nota" class="btn-collapse text-left" style="cursor:pointer;color:#eadd03;width:100%;border: none;outline:none;"  data-toggle="collapse" href="#collapse-nota" role="button" aria-expanded="false" aria-controls="collapse-nota">
											<i class="fas fa-play fa-fw"></i>
											Nota
										</button>
										<div class="collapse" id="collapse-nota"> 
											<div class="content-collapse">
												<div class="bg-black"  style="height: 400px;">
													<video src="/storage/{{$detalle->path_video_nota}}" class="video-fluid z-depth-1" width="100%" height="100%" controls preload="none"></video>
												</div>
											</div>
										</div>
									</div>
								@endif

								@if($detalle->alquiler_aproximado > 0)
									@if ($detalle->is_sale == '1')
										<div class="collapse-item">
											<button id="id_alquiler" class="btn-collapse text-left" style="cursor:pointer;color:#eadd03;width:100%;border: none;outline:none;" data-toggle="collapse" href="#collapse-inversor" role="button" aria-expanded="false" aria-controls="collapse-edificio">
												<i class="fas fa-fw fa-building"></i>
												¿Eres inversor? Mira el precio apróx. del alquiler
											</button>
											<div class="collapse" id="collapse-inversor"> 
												<div class="content-collapse">
													<ul class="list-group list-group-flush">
														<li class="list-group-item"><span class="text-muted">€ <?php
echo number_format($detalle->alquiler_aproximado, 0, '', '.');
?>	/mes</span>
															@if ($detalle->comentario_alquiler_aprox)
															   <a href="#mComentarioAlquiler" role="button" data-toggle="modal" data-target="#mComentarioAlquiler" class="mr-2"><img src="/img/info.png"  width="17" height="17" style="margin-bottom:5px;" alt="info"></a>
															@endif														
														</li>
													</ul>
												</div>
											</div>
										</div>
									@endif	
								@endif
							@if($detalle->hay_datosedificio == 1) 
							@if($detalle->garaje_opcion || $detalle->opcion_trastero_edificio || $detalle->aproximate_cost_garages || $detalle->venta_cost_garage || $detalle->certificado_energetico)	
							<div class="collapse-item">
									<button id="id_info" class="btn-collapse text-left" style="cursor:pointer;color:#eadd03;width:100%;border: none;outline:none;" data-toggle="collapse" href="#collapse-info" role="button" aria-expanded="false" aria-controls="collapse-info">
										<i class="fas fa-fw fa-info-circle"></i>
										Más información
									</button>
									<div class="collapse" id="collapse-info"> 
										<div class="content-collapse">

											<ul class="list-group list-group-flush">
											@if($detalle->hay_datosedificio == 1)
												@if ($detalle->garaje_opcion)
													<li class="list-group-item">Opción de garaje en el mismo edificio</li>
												@endif
												@if ($detalle->opcion_trastero_edificio)
													<li class="list-group-item">Opción de trastero en el mismo edificio</li>
												@endif
												@if ($detalle->aproximate_cost_garages)
													<li class="list-group-item">
														<b>Precio aprox. de plaza de garaje en alquiler por la zona:</b> 
														<span class="text-muted"> {{ $detalle->aproximate_cost_garages }} €/mes</span>
													</li>
												@endif
                                                @if ($detalle->venta_cost_garage)
                                                    <li class="list-group-item">
                                                        <b>Precio aprox. de plaza de garaje en venta por la zona:</b> 
                                                        <span class="text-muted"> {{ number_format($detalle->venta_cost_garage, 0, ',', '.') }} €</span>
                                                    </li>
                                                @endif                                                   
												@if ($detalle->certificado_energetico) 
													<li class="list-group-item">
														<b>Certificado:</b>
														<span class="text-muted">{{$detalle->certificado_energetico}}</span>
													</li>
												@endif
											@endif
											</ul>
										</div>
									</div>
								</div>
							@endif
							@endif
							@if($detalle->is_sale == '0')
							<div class="collapse-item">
									<button id="id_pago" class="btn-collapse text-left" style="cursor:pointer;color:#eadd03;width:100%;border: none;outline:none;" data-toggle="collapse" href="#collapse-pago_inicial" role="button" aria-expanded="false" aria-controls="collapse-info">
										<i class="fas fa-credit-card fa-fw"></i>
										Pago inicial
									</button>
									<div class="collapse" id="collapse-pago_inicial"> 
										<div class="content-collapse" style="margin-left 2rem!important;padding: 0.25rem 0rem;">

											<ul class="list-group list-group-flush">
											@if($detalle->id != 41)
												@if($detalle->condiciones > 1)
													<li class="ml-5"><i class="icon ion-md-checkmark-circle-outline"></i>
														<b>Fianza/Depósito:</b> 
														<span class="text-muted"> {{$detalle->condiciones}} Meses</span>
																<br>
																<font size="2.0pt;"> A veces los meses del depósito/fianza podrán aumentar o disminuir dependiendo de la solvencia presentada por la parte interesada.</font>														
													</li>
												@else
													@if($detalle->condiciones == 1)
														<li class="ml-5"><i class="icon ion-md-checkmark-circle-outline"></i>
															<b>Fianza/Depósito:</b> 
															<span class="text-muted"> {{$detalle->condiciones}} Mes</span>
																<br>
																<font size="2.0pt;"> A veces los meses del depósito/fianza podrán aumentar o disminuir dependiendo de la solvencia presentada por la parte interesada.</font>																																																														
														</li>														
													@endif
													@if($detalle->condiciones == 0.5)
														<li class="ml-5"><i class="icon ion-md-checkmark-circle-outline"></i>
															<b>Fianza/Depósito:</b> 
															<span class="text-muted"> {{$detalle->condiciones}} Mes</span>
																<br>
																<font size="2.0pt;"> A veces los meses del depósito/fianza podrán aumentar o disminuir dependiendo de la solvencia presentada por la parte interesada.</font>																																																														
														</li>														
													@endif
												@endif

													<li class="ml-5"><i class="icon ion-md-checkmark-circle-outline"></i>
														<b>Mes en curso</b>
														<br>														
														<font size="2.0pt;">¿Qué significa "Mes en curso"? Pago del mes en curso por adelantado, en caso que el mes ya esté empezado, se abonará la parte proporcional que aún falta hasta el final de mes.</font>
													</li>												
											@endif
											</ul>
										</div>
									</div>
							</div>
								@if($detalle->is_sale == '0' &&	 $detalle->id != 41)
								<div class="collapse-item">
										<button id="id_requisitos" class="btn-collapse text-left" style="cursor:pointer;color:#eadd03;width:100%;border: none;outline:none;"  data-toggle="collapse" href="#collapse-requisitos" role="button" aria-expanded="false" aria-controls="collapse-info">
											<i class="fas fa-fw fa-book"></i>
											Requisitos para alquilar
										</button>
										<div class="collapse" id="collapse-requisitos"> 
											<div class="content-collapse" style="margin-left 2rem!important;padding: 0.25rem 0rem;">

												<ul class="list-group list-group-flush">


														<div class="modal-content" style="border:0px;">
														  <div class="modal-header">
															<h5 id="modal-request-title" class="modal-title">¿Qué documentos necesito para alquilar?</h5>
														  </div>
														  <div class="modal-body" style="padding: 0.4rem;">
																		<div class="col-md-12">
																			<div class="form-group">
																				<label><b>AVISO IMPORTANTE:</b> La aprobación final para alquilar un inmueble publicado en IAMOVING, <b>será siempre del propietario</b>, independientemente de si se cumplen los requisitos solicitados abajo, gracias.</label>
																				@if ($detalle->documentos_sin_contrato =='1')
																				<label><b>Documentación Personal</b>: no es necesario tener nómina ni contrato de trabajo que identifique a la persona que va a firmar el contrato, solámente se requiere DNI, NIE o incluso pasaporte.</label>
																				<!--<ul>
																					<li class="ml-5">
																						Nos es necesario tener nómina ni contrato de trabajo que identifique a la persona que va a firmar el contrato, solámente se requiere DNI, NIE o incluso pasaporte.
																					</li>
																				</ul>-->
																				@else
																				<label><b>1-Documentación Personal</b>: que identifique a la persona que va a firmar el contrato (DNI, NIE o incluso pasaporte).</label>
																				<!--<ul>
																					<li class="ml-5">
																						Que identifique a la persona que va a firmar el contrato (DNI, NIE o incluso pasaporte).
																					</li>
																				</ul>	-->							
																				
																				@if ($detalle->id ==360)
																					<label><b>2-Documentación que acredite la solvencia económica</b>: Funcionarios y Jubilados con pensión vitalicia</label>
																				<!--<ul>
																					<li class="ml-5">
																						<b>Funcionarios</b>
																					</li>
																					<li class="ml-5">
																						<b>Jubilados con pensión vitalicia</b>
																				
																					</li>
																				</ul>-->								
																				@else
																					<label><b>2-Documentación que acredite la solvencia económica</b>: <b>Para Trabajadores por cuenta ajena</b> se necesitan las dos últimas nóminas y el Contrato laboral. <b>Para Trabajadores Autónomos</b> se necesita ltima declaración de la renta (Modelo 100), último trimestre de la declaración del IVA y acreditación de la fecha de alta como autónomo en la empresa.</label>
																				<!--<ul>
																					<li class="ml-5">
																						<b>Trabajadores por cuenta ajena:</b>
																							<ol type="a" >
																								<li class="ml-5">
																									Las 2 últimas nóminas.
																								</li>
																								<li class="ml-5">
																									Contrato laboral.
																								</li>
																							</ol>
																					</li>-->
																					<!--<li class="ml-5">
																						<b>Trabajadores Autónomos:</b>
																							<ol type="a" >
																								<li class="ml-5">
																									Última declaración de la renta (Modelo 100).
																								</li>
																								<li class="ml-5">
																									Último trimestre de la declaración del IVA.
																								</li>
																								<li class="ml-5">
																									 Acreditación de la fecha de alta como autónomo en la empresa.
																								</li>											
																							</ol>									
																					</li>
																				</ul>-->
																				@endif
																				<label><b>3-Ingresos</b>: La suma de ingresos mínimos entre todos los inquilinos suele ser dos veces y medio mayor al coste del alquiler.</label>
																				<!--<ul>
																					<li class="ml-5">
																						La suma de ingresos mínimos entre todos los inquilinos suele ser dos veces y medio mayor al coste del alquiler.
																					</li>
																				</ul>-->
																				<br>
																				<label style="margin-bottom: 0rem;"><b>4-Avalistas/+meses de depósito</b></label>

																				<ul>
																					@if ($detalle->id !=360)
																					<li class="ml-3">
																						Si eres estudiante o no estás trabajando y no se puede demostrar solvencia económica, se suele pedir un aval personal o más meses de depósito.
																					</li>
																					@endif								
																					<li class="ml-3">
																						<b>Aval personal</b> (necesario aportar la documentación mencionada en los puntos 1 y 2 de dichos avalistas).
																					</li>
																					@if ($detalle->id !=360)
																					<li class="ml-3">
																						<b>Más meses de depósito</b> (en el caso de que el propietario acepte este tipo de garantía, negociar los meses directamente con este).
																					</li>					
																					@endif								
																				</ul>
																				
																				@endif
																			</div>

																		</div>				
														  </div>
														</div>

												
												</ul>
											</div>
										</div>
								</div>
								@endif
							@endif
							@if($detalle->iamoving_pro >0)
								@if($detalle->fecha_de_alta)
									<!--<div class="mt-4">
													<span class="alert alert-secondary"> Fecha alta: {{  date('d-m-Y', strtotime($detalle->fecha_de_alta))  }}</span> 
									</div>-->
								@endif
													
							@endif							
							</section>
						</div>
					</div>
		    <div  class="mt-2"><!-- style="padding-left:14px;padding-right:14px;">		-->
						@if ($detalle->id == 85 || $detalle->id == 93)
						<section>
						<a href="tel:{{ $detalle->telefono }}" type="button" class="btn btn-success btn-block">Llama a la propietaria: {{ $detalle->telefono }}</a>
						</section>
						@else
							
								@if ($detalle->id == 94)
									<section class="p-0">
									</section>
								@else
									@if($detalle->estado_inmueble == 'Disponible' || $detalle->estado_inmueble == 'Reservado' || $detalle->estado_inmueble == '' || $detalle->estado_inmueble == null)
										<section class="p-0">
											@if($detalle->id != 83)  
											<button v-if="user" type="button" style="padding: 0.95rem 0.75rem;"  id="btnVisita"  class="btn btn-success btn-block" @click.prevent="modalVisita">
												Solicitar una visita presencial
											</button>
											@else
											<button v-if="user" type="button" style="padding: 0.95rem 0.75rem;" class="btn btn-success btn-block" @click.prevent="modalVisita">
												Solicitar una visita con Reforviliaria
											</button>								
											@endif


											@if($detalle->id != 83)  
											<button v-else class="btn btn-success btn-block" style="padding: 0.95rem 0.75rem;" id="salevisita" @click.prevent="modalVisita">
												Solicitar una visita presencial
											</button>
											@else
										<button v-else class="btn btn-success btn-block" style="padding: 0.95rem 0.75rem;" @click.prevent="modalVisita">
												Solicitar una visita con Reforviliaria
											</button>								
											@endif

										</section>
									@else
										
										<!--<br><br><br><br>-->
									@endif
								@endif
						@endif						
				</div>
				
<div class="col-lg-2">
</div>
			

			</div>
		</div>
	
		<div class="modal fade" id="mInforme" tabindex="-1" role="dialog" aria-labelledby="mInformeLabel" aria-hidden="true">
		<!--<div id="modal-report-content" class="modal-dialog modal-image" role="application" style="max-width: 420px;max-height: 720px;">-->
		            <div id="modal-report-content" class="modal-dialog modal-image" style="display:flex;flex-direction:column;justify-content:center;overflow-y: auto;min-height:calc(100vh - 60px);" role="application" style="max-width: 530px;">
			    
				        <report-content reference="{{$detalle->id}}" />
			        </div>
			
		</div>

	@if($detalle->hay_barrio == 1)
		<div class="modal fade" id="mInformeBarrio" tabindex="-1" role="dialog" aria-labelledby="mInformeBarrio" aria-hidden="true">
			<!--<div class="modal-dialog modal-dialog-centered modal-image" role="application" style="max-width: 530px;">-->
			<div class="modal-dialog modal-dialog-centered modal-image" role="application" style="max-width: 530px;flex-direction: unset;">			
				<report-lugar reference="{{$detalle->id}}" />
			</div>
		</div>		
	@endif
	@if ($detalle->comentario_inmueble)
		<div class="modal fade" id="mComentarioMuebles" tabindex="-1" role="dialog" aria-labelledby="mComentarioMuebles" aria-hidden="true">
			  <div class="modal-dialog modal-lg">
				<!-- Modal content-->
				<div class="modal-content">
				  <div class="modal-header">
				   
				  </div>
				  <div class="modal-body">
							{!! csrf_field() !!} 
								<div class="col-md-12">
									<div class="form-group">
										<label><b>{{$detalle->comentario_inmueble}}</b></label>						
									</div>

								</div>
								<div class="col-md-12 text-center">
									<button class="btn btn-dark" style="color:#EADD1B;" data-dismiss="modal"  type="button">
										Cerrar
									</button>						
								</div>					
				  </div>
				</div>
			  </div>			
		</div>		
	@endif
	@if ($detalle->comentario_alquiler_aprox)
		<div class="modal fade" id="mComentarioAlquiler" tabindex="-1" role="dialog" aria-labelledby="mComentarioAlquiler" aria-hidden="true">
			  <div class="modal-dialog modal-lg">
				<!-- Modal content-->
				<div class="modal-content">
				  <div class="modal-header">
				   
				  </div>
				  <div class="modal-body">
							{!! csrf_field() !!} 
								<div class="col-md-12">
									<div class="form-group">
										<label><b>{{$detalle->comentario_alquiler_aprox}}</b></label>						
									</div>

								</div>
								<div class="col-md-12 text-center">
									<button class="btn btn-dark" style="color:#EADD1B;" data-dismiss="modal"  type="button">
										Cerrar
									</button>						
								</div>					
				  </div>
				</div>
			  </div>			
		</div>		
	@endif	
		<div class="modal fade" id="mMascotas" tabindex="-1" role="dialog" aria-labelledby="mMascotas" aria-hidden="true">
			  <div class="modal-dialog modal-lg">
				<!-- Modal content-->
				<div class="modal-content">
				  <div class="modal-header">
				   <!-- <h4 id="modal-request-title" class="modal-title">¿Qué documentos necesito para alquilar?</h4>-->
				  </div>
				  <div class="modal-body">
							{!! csrf_field() !!} 
								<div class="col-md-12">
									<div class="form-group">
										<label><b>En caso de que tengas una mascota o tengas la intención de tener una, esta información debe mencionarse en tu perfil de usuario cuando solicites una visita. Muchos propietarios dicen NO A MASCOTAS y luego cambian de opinión cuando conocen el perfil de la parte interesada. De esta manera, garantizamos que la propiedad que te pareció perfecta no se te escapará debido a un problema de información o comunicación.</b></label>						
									</div>

								</div>
								<div class="col-md-12 text-center">
									<button class="btn btn-dark" style="color:#EADD1B;" data-dismiss="modal"  type="button">
										Cerrar
									</button>						
								</div>					
				  </div>
				</div>
			  </div>			
		</div>	
		<div class="modal fade" id="mContrato" tabindex="-1" role="dialog" aria-labelledby="mContrato" aria-hidden="true">
			  <div class="modal-dialog modal-lg">
				<!-- Modal content-->
				<div class="modal-content">
				  <div class="modal-header">
				   <!-- <h4 id="modal-request-title" class="modal-title">¿Qué documentos necesito para alquilar?</h4>-->
				  </div>
				  <div class="modal-body">
							{!! csrf_field() !!} 
								<div class="col-md-12">
									<div class="form-group">
										<label><b>A veces, los propietarios son flexibles con respecto al tiempo mínimo de contrato, te recomendamos que muestres interés de alquilar, si el tiempo mínimo de alquiler que tu necesitas se aproxima con lo que desea el propietario.</b></label>						
										<label><b>De esta manera, te garantizamos que el piso que te ha gustado, no se te va a escapar por un problema de información o comunicación.</b></label>						
									</div>

								</div>
								<div class="col-md-12 text-center">
									<button class="btn btn-dark" style="color:#EADD1B;" data-dismiss="modal"  type="button">
										Cerrar
									</button>						
								</div>					
				  </div>
				</div>
			  </div>			
		</div>
		<div class="modal fade" id="mContrato_maximo" tabindex="-1" role="dialog" aria-labelledby="mContrato_maximo" aria-hidden="true">
			  <div class="modal-dialog modal-lg">
				<!-- Modal content-->
				<div class="modal-content">
				  <div class="modal-header">
				   <!-- <h4 id="modal-request-title" class="modal-title">¿Qué documentos necesito para alquilar?</h4>-->
				  </div>
				  <div class="modal-body">
							{!! csrf_field() !!} 
								<div class="col-md-12">
									<div class="form-group">
										<label><b>Tiempo máximo del contrato</b></label>						
										<label><b>Se trata del período máximo en el que el propietario está de acuerdo en alquilar su propiedad.</b></label>						
									</div>

								</div>
								<div class="col-md-12 text-center">
									<button class="btn btn-dark" style="color:#EADD1B;" data-dismiss="modal"  type="button">
										Cerrar
									</button>						
								</div>					
				  </div>
				</div>
			  </div>			
		</div>			
@if($detalle->path_plano)
<div class="modal fade" id="mPlano" tabindex="-1" role="dialog" aria-labelledby="mPlano" aria-hidden="true">
  <div class="modal-dialog modal-xl" style="max-width: 98vw; margin: 5px auto;">
    <div class="modal-content">
      <div class="modal-header py-0">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" style="font-weight:bold;color:#EADD1B;">&times;</span>
        </button>
      </div>
      <div class="modal-body p-0">
        <div class="plano-container">
          @php
            $extension = strtolower(pathinfo($detalle->path_plano, PATHINFO_EXTENSION));
          @endphp
          
          @if($extension === 'pdf')
            <object 
              data="/storage/{{$detalle->path_plano}}"
              type="application/pdf"
              width="100%"
              height="100%"
              class="pdf-viewer">
                <div class="fallback-message">
                  <p>Tu navegador no puede mostrar el PDF directamente.</p>
                  <a href="/storage/{{$detalle->path_plano}}" target="_blank" class="btn btn-primary">
                    Abrir PDF en nueva ventana
                  </a>
                </div>
            </object>
          @else
            <img 
              src="/storage/{{$detalle->path_plano}}"
              class="plano-image"
              alt="Plano del inmueble">
          @endif
        </div>
      </div>
    </div>
  </div>
</div>

<style>
.modal-dialog.modal-xl {
  max-height: 99vh;
  margin: 2px auto !important;
}

.modal-content {
  height: calc(99vh - 4px);
}

  .modal-header {
    min-height: 30px;
    padding: 2px 10px !important;
  }

  .plano-container {
    height: calc(100vh - 134px); /* Ajustado para dejar espacio al botón */
  }

  .pdf-viewer {
    height: calc(100vh - 134px) !important;
    width: 100%;
  }
  
  /* Mantener los ajustes para imágenes */
  .plano-image {
    max-width: 95%;
    max-height: calc(95vh - 180px); /* Ajustado para dejar espacio al botón */
  }

.fallback-message {
  text-align: center;
  padding: 20px;
}

/* Media queries para móviles */
@media (max-width: 767px) {
  .modal-dialog {
    margin: 0;
    max-width: 100%;
    height: 100vh !important;
  }
  
  .modal-content {
    border: 0;
    border-radius: 0;
  }
  
  .modal-header {
    padding: 0.5rem;
  }
  
  .plano-container {
    height: calc(100vh - 48px);
  }
  
  .pdf-viewer {
    height: calc(100vh - 48px);
  }
  
  .plano-image {
    max-height: calc(100vh - 48px);
  }
}

/* Ajuste para orientación horizontal en móviles */
@media (max-width: 767px) and (orientation: landscape) {
  .plano-container,
  .pdf-viewer,
  .plano-image {
    height: calc(100vh - 35px);
  }
}

/* Media query específica para escritorio */
@media (min-width: 768px) {
  .modal-dialog.modal-xl {
    max-height: calc(100vh - 100px); /* Reservar espacio para el botón */
    margin: 2px auto 60px !important; /* Aumentar margen inferior */
  }

  .modal-content {
    height: calc(100vh - 104px);
  }

  .modal-header {
    min-height: 30px;
    padding: 2px 10px !important;
  }

  .plano-container {
    height: calc(99vh - 34px);
  }

  .pdf-viewer {
    height: calc(99vh - 34px) !important;
    width: 100%;
  }
  
  /* Mantener los ajustes originales para imágenes */
  .plano-image {
    max-width: 95%;
    max-height: calc(95vh - 80px);
  }
}
</style>

<script>
// Mejorar la experiencia al abrir PDFs en móviles
document.addEventListener('DOMContentLoaded', function() {
  if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
    const pdfViewer = document.querySelector('.pdf-viewer');
    if (pdfViewer) {
      pdfViewer.addEventListener('click', function(e) {
        if (e.target.tagName === 'OBJECT') {
          window.open(this.getAttribute('data'), '_blank');
        }
      });
    }
  }
});

// Añadir controles de zoom para imágenes
const planoImage = document.querySelector('.plano-image');
if (planoImage) {
  let scale = 1;
  let isDragging = false;
  let startX, startY, translateX = 0, translateY = 0;
  
  planoImage.addEventListener('wheel', function(e) {
    e.preventDefault();
    
    const rect = this.getBoundingClientRect();
    const x = e.clientX - rect.left;
    const y = e.clientY - rect.top;
    
    const oldScale = scale;
    scale += e.deltaY * -0.001;
    scale = Math.min(Math.max(0.5, scale), 4);
    
    if (scale !== oldScale) {
      const scaleChange = scale / oldScale;
      translateX = x - (x - translateX) * scaleChange;
      translateY = y - (y - translateY) * scaleChange;
      
      this.style.transform = `translate(${translateX}px, ${translateY}px) scale(${scale})`;
    }
  });
  
  // Permitir arrastrar la imagen cuando está ampliada
  planoImage.addEventListener('mousedown', function(e) {
    isDragging = true;
    startX = e.clientX - translateX;
    startY = e.clientY - translateY;
  });
  
  document.addEventListener('mousemove', function(e) {
    if (!isDragging) return;
    
    translateX = e.clientX - startX;
    translateY = e.clientY - startY;
    planoImage.style.transform = `translate(${translateX}px, ${translateY}px) scale(${scale})`;
  });
  
  document.addEventListener('mouseup', function() {
    isDragging = false;
  });
}

// Mejorar la detección del tipo de archivo
function isValidPDF(url) {
  return new Promise((resolve) => {
    const xhr = new XMLHttpRequest();
    xhr.open('HEAD', url, true);
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4) {
        resolve(xhr.getResponseHeader('Content-Type') === 'application/pdf');
      }
    };
    xhr.send();
  });
}

// Reiniciar zoom y posición al cerrar el modal
document.querySelector('#mPlano').addEventListener('hidden.bs.modal', function () {
  const planoImage = document.querySelector('.plano-image');
  if (planoImage) {
    scale = 1;
    translateX = 0;
    translateY = 0;
    planoImage.style.transform = `translate(0px, 0px) scale(1)`;
  }
});
</script>
@endif	
	<div class="modal fade" id="mMapa" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-xl">
		
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-weight:bold;color:#EADD1B;">&times;</span>
				</button>
			</div>
				@if($detalle->hay_transporte>0)
					<div id="mapa" style="height: 60vh; width: 100%;"></div>
				@else
					<div id="mapa" style="height: 80vh; width: 100%;"></div>
				@endif
					@if($detalle->hay_transporte>0)
																
								
					<div class="modal-body">
					Transporte:
						<div class="col-md-12">
							<div class="form-group">
								<ul>
								@foreach ($transportes as $transporte)
									@if ($transporte->tipo_transporte == '1metro')
										<?php
											//$iteracion=str_replace(" ",".png><img width=16px height=16px src=/storage/transporte/",$transporte->lineas);
											$iteraciones = explode(" ",$transporte->lineas);
											/*if(strlen(trim($iteracion))>0){
											    $html_metro="<img width=16px height=16px src=/storage/transporte/".$iteracion.".png>";
											}else{
											    $html_metro="";
											}*/
											$html_metro="";

											if($ciudad)
											{
												$city = $ciudad."/";
											} 
											else
											{
												$city="Madrid/";
											}											
											foreach($iteraciones as $iteracion){
											    if(strlen(trim($iteracion))>0){
											    $html_metro.="<img width=16px height=16px src=/storage/transporte/".$city.$iteracion.".png>";
											    }
											}
										?>
									<li class="ml-1">
										<span class="more_info" title="Metro"><img src="/storage/transporte/{{ $transporte->tipo_transporte }}.png" alt="Foto metro"> </span>
										{{ $transporte->parada }} 
										<?php echo $html_metro;?> 
										> 
										{{ $transporte->medida }} {{ $transporte->unidad_medida }} >
										<span class="more_info" title="{{ $transporte->medio }}"><img  width="16px" height="16px"  src="/storage/transporte/{{ $transporte->medio }}.png">  </span>
									</li>									
									@elseif ($transporte->tipo_transporte == '2metroLigero')
										<?php
											/*$iteracion_ligero=str_replace(" ",".png><img width=16px height=16px src=/storage/transporte/M",$transporte->lineas);
											$html_metro_ligero="<img width=16px height=16px src=/storage/transporte/".$iteracion_ligero.".png>";*/
											$iteracion_ligero = explode(" ",$transporte->lineas);
											$html_metro_ligero="";
											foreach($iteracion_ligero as $il){
											    if(strlen(trim($il))>0){
											    $html_metro_ligero.="<img width=16px height=16px src=/storage/transporte/".$il.".png>";
											    }
											}									
										?>
										<li class="ml-1">
											<span class="more_info" title="Metro Ligero"><img src="/storage/transporte/{{ $transporte->tipo_transporte }}.png"  alt="Foto metro"> </span>
											{{ $transporte->parada }} 
											<?php echo $html_metro_ligero;?> 
											> 
											{{ $transporte->medida }} {{ $transporte->unidad_medida }} >
											<span class="more_info" title="{{ $transporte->medio }}"><img  width="16px" height="16px"  src="/storage/transporte/{{ $transporte->medio }}.png"> </span>
										</li>																		
									@elseif ($transporte->tipo_transporte == '3cercanias')
										<?php
											$html_metro_tren="<font size=3 face=arial  style=color:red>".$transporte->lineas."</font>";
										?>
										<li class="ml-1">
											<span class="more_info" title="Cercanias"><img src="/storage/transporte/{{ $transporte->tipo_transporte }}.png" alt="Foto metro"> </span>
												{{ $transporte->parada }}
												<?php echo $html_metro_tren;?> 
											> 
											{{ $transporte->medida }} {{ $transporte->unidad_medida }} >
											<span class="more_info" title="{{ $transporte->medio }}"><img  width="16px" height="16px"  src="/storage/transporte/{{ $transporte->medio }}.png"> </span>
										</li>									
									@elseif ($transporte->tipo_transporte == '4autobus')
									<?php
											$html_metro_bus="<font size=3 face=arial  style=color:blue>".$transporte->lineas."</font>";
										?>
										<li class="ml-1">
											<span class="more_info" title="Parada de autobuses"><img src="/storage/transporte/{{ $transporte->tipo_transporte }}.png" alt="Foto metro"> </span>
											<?php echo $html_metro_bus;?> 
											> 
											{{ $transporte->medida }} {{ $transporte->unidad_medida }} >
											<span class="more_info" title="{{ $transporte->medio }}"><img  width="16px" height="16px"  src="/storage/transporte/{{ $transporte->medio }}.png"> </span>
										</li>									
									@elseif ($transporte->tipo_transporte == '5bicicleta')
										<li class="ml-1">
											<span class="more_info" title="Estación de bicicletas"><img src="/storage/transporte/{{ $transporte->tipo_transporte }}.png"  alt="Foto metro"> </span>
											> 
											{{ $transporte->medida }} {{ $transporte->unidad_medida }} >
											<span class="more_info" title="{{ $transporte->medio }}"><img  width="16px" height="16px"  src="/storage/transporte/{{ $transporte->medio }}.png"> </span>
										</li>
									@elseif ($transporte->tipo_transporte == '6tranvia')
									<?php
											$html_metro_tranvia="<font size=3 face=arial  style=color:green>".$transporte->lineas."</font>";
										?>
										<li class="ml-1">
											<span class="more_info" title="Parada de tranvía"><img src="/storage/transporte/{{ $transporte->tipo_transporte }}.png" alt="Foto metro"> </span>
											<?php echo $html_metro_tranvia;?> 
											> 
											{{ $transporte->medida }} {{ $transporte->unidad_medida }} >
											<span class="more_info" title="{{ $transporte->medio }}"><img  width="16px" height="16px"  src="/storage/transporte/{{ $transporte->medio }}.png"> </span>
										</li>									
									@endif
								@endforeach	
								</ul>						
							</div>

						</div>				
					</div>
				@endif	
		</div>
	  </div>
</div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-xl">
		
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
		  </div>
						<div id="video_div" class="bg-black"  style="height: 450px; overflow-y: hidden;">
							<iframe src="https://www.youtube.com/embed/{{$detalle->video_primary}}?modestbranding=1&rel=0" class="video-fluid z-depth-1" width="100%" height="100%" mozallowfullscreen webkitallowfullscreen  allowfullscreen></iframe>
						</div>				
		</div>
	  </div>
      </div>

<div id="modalRequest" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 id="modal-request-title" class="modal-title"></h4>
      </div>
      <div class="modal-body">
          <div class="text-center">
            <h5>Procesando</h5><br>
            <div class="waiting"></div>
            <br>
          </div>
      </div>
    </div>
  </div>
</div>

<div id="modalCita" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">

      <div class="modal-body">
      		<form method="post" id="citaForm" @submit.prevent="citaSubmitHandle" ref="cform"> 
      			{!! csrf_field() !!} 
      			<input type="hidden" name="reference" value="{{ $detalle->id }} " />
	            <div class="row" id="step1">
		          		<div class="col-md-12 text-center">
							<h5 id="modal-request-title" class="modal-title mb-1"><b>Paso 1/2</b></h5>
		          		</div>				
						<div class="col-md-6">
							<h5 id="modal-request-title" class="modal-title mb-3"><b><span
style='font-size:11.5pt;font-family:"Segoe UI Emoji",sans-serif;mso-bidi-font-family:
"Segoe UI Emoji";color:#000000'>&#9200;&#128198;</span></b> <b><u>¿Cuándo te gustaría realizar la visita?</u></b></h5>
							<div class="form-group">
								<!--<label>Escoge la fecha</label>-->
								<input type="text" id="date" name="date" placeholder="Escoge la fecha" class="form-control" autocomplete="off" required  maxlength="10" readonly  style="background-color:white;">
							</div>
							<div class="form-group">
								<!--<label>Escoge la hora</label>-->
								<div class="input-group clockpicker">
									<input id="time" name="time" type="text"  placeholder="Escoge la hora"  class="form-control" autocomplete="off" value="" required maxlength="5" readonly style="background-color:white;">
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-time"></span>
									</span>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group" style="font-size:4px;">
							@if ($detalle->calendar || $detalle->hora_manana || $detalle->hora_comida || $detalle->hora_tarde || $detalle->hora_dia || $detalle->flexibilidad || $detalle->schedule )
							<p class="my-0 mb-3" style="font-size:14px;"><b><u>Días y horarios que la propiedad prefiere enseñar el inmueble:</u></b></p>
					
							@if ($detalle->calendar)
								<p class="my-0 mb-2" style="font-size:12px;"><b>Días de visita:</b> {{ $detalle->calendar }}</p>
							@endif
							@if ($detalle->hora_dia)
								<p class="my-0 mb-2" style="font-size:12px;">Todo el día desde {{ $detalle->hora_dia }}:{{ $detalle->minuto_dia }} hasta {{ $detalle->hora_dia_hasta }}:{{ $detalle->minuto_dia_hasta }} </p>
							@endif						
							@if ($detalle->hora_manana)
								<p class="my-0 mb-2" style="font-size:12px;">Por la mañana desde {{ $detalle->hora_manana }}:{{ $detalle->minuto_manana }} hasta {{ $detalle->hora_manana_hasta }}:{{ $detalle->minuto_manana_hasta }} </p>
							@endif
							@if ($detalle->hora_comida)
								<p class="my-0 mb-2" style="font-size:12px;">A la comida desde {{ $detalle->hora_comida }}:{{ $detalle->minuto_comida }} hasta {{ $detalle->hora_comida_hasta }}:{{ $detalle->minuto_comida_hasta }} </p>
							@endif
							@if ($detalle->hora_tarde)
								<p  class="my-0 mb-2" style="font-size:12px;">Por la tarde desde {{ $detalle->hora_tarde }}:{{ $detalle->minuto_tarde }} hasta {{ $detalle->hora_tarde_hasta }}:{{ $detalle->minuto_tarde_hasta }} </p>
							@endif
							@if ($detalle->flexibilidad)
								<p  class="my-0 mb-2" style="font-size:12px;"><b>Nota:</b> {{ $detalle->flexibilidad }}</p>
							@endif						
							@if ($detalle->schedule)
								<p class="my-0 mb-2" style="font-size:12px;"><u>{{ $detalle->schedule }}</u></p>
							@endif
							@endif
							</div>
						</div>
	          		
	          		@if($detalle->is_sale == '0')
					<div class="col-md-12 text-center" v-if="user!=null && user.datos_alquiler =='1'">
		          			<button id="btnContinuar" class="btn btn-dark" style="color:#EADD1B;" type="button">
		                        Continuar
							</button>
		          	</div>
		          		<div class="col-md-12 text-center" v-else>
		          			<button id="btnContinuar" class="btn btn-dark" style="color:#EADD1B;" type="button">
		                        Continuar
							</button>
		          		</div>
		          	@else
		          		<div class="col-md-12 text-center">
		          			<button class="btn btn-dark" style="color:#EADD1B;" type="button" id="btnContinuarSale">
		                        Continuar
							</button>
		          		</div>
		          	@endif						
	            </div>
			   <div  style="max-height: calc(100vh - 155px);overflow-y: auto;" id="step2">
	            	<div class="col-md-12  text-center">
	            		<div class="form-group">
	            				<b>Paso 2/2</b>
	            		</div>
					</div>			   
	            	<div class="col-md-12">
	            		<div class="form-group">	            				
<p class="MsoNormal text-center"><span class=GramE>😠 <b>¿</span>A qué no te
gusta perder el tiempo con visitas Innecesarias no?</b> Tampoco a los propietarios. Los propietarios suelen
dar prioridad a las visitas cuando conocen el perfil de los interesados.<o:p></o:p></p>

<p class=MsoNormal><o:p></o:p></p>

<!--<p class=MsoNormal><span style='font-family:"Segoe UI Emoji",sans-serif;
mso-bidi-font-family:"Segoe UI Emoji"'>&#128285;</span> Tampoco a los propietarios. Los propietarios suelen
dar prioridad a las visitas cuando conocen el perfil de los interesados. <o:p></o:p></p>-->

<!--<p class=MsoNormal><o:p></o:p></p>-->

				<p class=MsoNormal><span style='font-family:"Segoe UI Emoji",sans-serif;
				mso-bidi-font-family:"Segoe UI Emoji"'>&#128285;</span> Tampoco la propiedad. Los propietarios suelen dar prioridad a las visitas cuando conocen el perfil de los interesados.. <o:p></o:p></p>


				<p class=MsoNormal><o:p></o:p></p>

<p class="MsoNormal text-center"><span style='font-family:"Segoe UI Emoji",sans-serif;
mso-bidi-font-family:"Segoe UI Emoji"'>&#128640;</span> Se <span class=SpellE>tú</span>
la prioridad, entre muchas solicitudes que el propietario recibe a diario.<o:p></o:p></p>

<p class=MsoNormal>&nbsp;<o:p></o:p></p>

<p class=MsoNormal><b>Te dejamos algunas sencillas preguntas que al propietario le gustaría conocer antes de confirmar una visita.</b></p>								
	            		</div>
					</div>
					<div class="col-md-12">
						<div class="row">				
							<div class="form-group col-md-6">
								<label>🔢 <b>¿Cuántos inquilinos vais a vivir?</b></label>
								<select id="numero_personas" name="numero_personas" class="form-control" >
									<option value=""></option>
									@for ($i = 1; $i <= 20; $i++)
										<option value="{{ $i }}">{{ $i }}</option>    
									@endfor
								</select>
							</div>
							<div class="form-group  col-md-6">
								<label>👥 <b>¿Tipo de relación entre los inquilinos?</b></label>

								<select id="tipo_personas" name="tipo_personas" class="form-control" >
									<option value=""></option>
									<option value="Solo para mi">Solo para mi</option>
									<option value="Pareja">Pareja</option>
									<option value="Familia">Familia</option>
									<option value="Compañeros de trabajo">Compañeros de trabajo</option>
									<option value="Estudiantes">Estudiantes</option>
									<option value="Amigos">Amigos</option>
								</select>
							</div>						
						</div>
						<div class="row">
							<div class="form-group col-md-6">
								<label>💼🎒👵 <b>¿Los inquilinos estáis Trabajando, Jubilados o Estudiando?</b></label>
								<select id="estudias_o_trabajas" name="estudias_o_trabajas" class="form-control" >
									<option value=""></option>							
									<option value="Trabajando">Trabajando</option>
									<option value="Estudiando">Estudiando</option>
									<!--<option value="Pensionista">Pensionista</option>-->
									<option value="Sin trabajar">Sin trabajar</option>
									<option value="Estudiando y trabajando">Estudiando y trabajando</option>
                                    <option value="Jubilados">Jubilados</option>
								</select>							
							</div>
							<div class="form-group col-md-6">
								<label><b><span
style='font-size:11.5pt;line-height:107%;font-family:"Segoe UI Emoji",sans-serif;
mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:"Segoe UI Emoji";
color:#000000'>&#128021;&#128570;</span></b> <b>¿Tenéis mascotas?</b></label>
								<select id="mascotas" name="mascotas" class="form-control" >
									<option value=""></option>							
									<option value="No">No</option>
									<option value="Perro">Perro</option>
									<option value="Gato">Gato</option>
									<option value="2 perros">2 perros</option>
									<option value="2 gatos">2 gatos</option>
									<option value="Perro y gato">Perro y gato</option>
									<option value="+ de 2 perros o gatos">+ de 2 perros o gatos</option>
								</select>							
							</div>						
						</div>
                        <div class="row" id="estudiando0">
                            <div class="form-group col-md-12">
                                <label>⁉ <b>¿Estudiantes o sin trabajar?</b> Aquellos que estén estudiando o que no trabajen y no puedan demostrar solvencia, deberán presentar un aval personal o más meses de depósitos adicionales como garantía de pago.</label>
                                <!--<label><b>Aval personal/Solidario</b>: En este caso, los propietarios desean conocer los apartados aval 1, aval 2 y aval 3.</label>-->
                                <label><b>Deposito adicional</b>: Negociar directamente la cantidad de los meses con la propiedad.</label>
                            </div>
                        </div>


                        <div class="row" id="estudiando01">
                            <div class="form-group col-md-12">
                                <label>⁉ <b>¿Estudiantes?</b> Aquellos que estén estudiando y no puedan demostrar solvencia, deberán presentar un aval personal o más meses de depósitos adicionales como garantía de pago.</label>
                                <!--<label><b>Aval personal/Solidario</b>: En este caso, los propietarios desean conocer los apartados aval 1, aval 2 y aval 3.</label>-->
                                <label><b>Deposito adicional</b>: Negociar directamente la cantidad de los meses con la propiedad.</label>
                            </div>
                        </div>



                        <div class="row" id="estudiando02">
                            <div class="form-group col-md-12">
                                <label>⁉ <b>¿Sin trabajar?</b> Aquellos que no trabajen y no puedan demostrar solvencia, deberán presentar un aval personal o más meses de depósitos adicionales como garantía de pago.</label>
                                <!--<label><b>Aval personal/Solidario</b>: En este caso, los propietarios desean conocer los apartados aval 1, aval 2 y aval 3.</label>-->
                                <label><b>Deposito adicional</b>: Negociar directamente la cantidad de los meses con la propiedad.</label>
                            </div>
                        </div>					
					<div class="row" id="trabajando1">
						<div class="form-group col-md-6">
							<div id="trabajo_normal">
								<label><b><span
style='font-size:11.5pt;line-height:107%;font-family:"Segoe UI Emoji",sans-serif;
mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:"Segoe UI Emoji";
color:#000000'>&#8265;</span></b> <b>¿Dónde trabajáis?</b></label>
							</div>
							<div id="trabajo_estudiar">
								<label><b><span
style='font-size:11.5pt;line-height:107%;font-family:"Segoe UI Emoji",sans-serif;
mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:"Segoe UI Emoji";
color:#000000'>&#8265;</span></b> <b>¿Dónde trabajan los <u>avalistas?</u></b></label>
							</div>	
							<div id="trabajo_estudiar_trabajar">
								<label><b><span
style='font-size:11.5pt;line-height:107%;font-family:"Segoe UI Emoji",sans-serif;
mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:"Segoe UI Emoji";
color:#000000'>&#8265;</span></b> <b>¿Dónde trabajáis los inquilinos y los <u>avalistas</u>?</b></label>
							</div>						
							<!--<label>¿Dónde trabajáis?</label>-->
							<input type="text" id="trabajo" name="trabajo" class="form-control"  maxlength="160">							
						</div>
						<div class="form-group col-md-6">
							<div id="tipo_trabajo_normal">
								<label><b><span
style='font-size:11.5pt;line-height:107%;font-family:"Segoe UI Emoji",sans-serif;
mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:"Segoe UI Emoji";
color:#000000'>&#8265;</span></b> <b>¿Función que desempeñáís?</b></label>
							</div>
							<div id="tipo_trabajo_estudiar">
								<label><b><span
style='font-size:11.5pt;line-height:107%;font-family:"Segoe UI Emoji",sans-serif;
mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:"Segoe UI Emoji";
color:#000000'>&#8265;</span></b> <b>¿Función que desempañan los <u>avalistas</u>?</b></label>
							</div>	
							<div id="tipo_trabajo_estudiar_trabajar">
								<label><b><span
style='font-size:11.5pt;line-height:107%;font-family:"Segoe UI Emoji",sans-serif;
mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:"Segoe UI Emoji";
color:#000000'>&#8265;</span></b> <b>¿Función que desempeñáís los inquilinos y los <u>avalistas</u>?</b></label>
							</div>								
								<input type="text" id="tipo_trabajo" name="tipo_trabajo" class="form-control" maxlength="160">							
						</div>						
					</div>
						<div class="row" id="trabajando2">
						<div class="form-group col-md-6">
							<div id="tipo_contrato_normal">
								<label><b><span
style='font-size:11.5pt;line-height:107%;font-family:"Segoe UI Emoji",sans-serif;
mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:"Segoe UI Emoji";
color:#000000'>&#128195;</span></b> <b>Tipo de contrato</b>: autónomo, indefinido, temporal, obra y servicio, becario, pensionista ¿otros?</label>
							</div>
							<div id="tipo_contrato_estudiar">
								<label><b><span
style='font-size:11.5pt;line-height:107%;font-family:"Segoe UI Emoji",sans-serif;
mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:"Segoe UI Emoji";
color:#000000'>&#128195;</span></b> <b>Tipo de contrato de los <u>avalistas</u></b>: autónomo, indefinido, temporal, obra y servicio, becario, pensionista ¿otros?</label>
							</div>	
							<div id="tipo_contrato_estudiar_trabajar">
								<label><b><span
style='font-size:11.5pt;line-height:107%;font-family:"Segoe UI Emoji",sans-serif;
mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:"Segoe UI Emoji";
color:#000000'>&#128195;</span></b> <b>Tipo de contrato de los inquilinos y los <u>avalistas</u></b>: autónomo, indefinido, temporal, obra y servicio, becario, pensionista ¿otros?</label>
							</div>						                                             
							<!--<label>Tipo de contrato: autónomo, indefinido, temporal, obra y servicio, becario, ¿otros?</label>-->
								<input type="text" id="tipo_contrato" name="tipo_contrato" class="form-control"  maxlength="160">		
						</div>
						<div class="form-group col-md-6">
							<div id="sueldo_aproximado_normal">
								<label><b><span
style='font-size:11.5pt;line-height:107%;font-family:"Segoe UI Emoji",sans-serif;
mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:"Segoe UI Emoji";
color:#000000'>&#128176;</span></b> <b>Sueldo neto mensual aproximado entre todos los inquilinos</b></label>
							</div>
							<div id="sueldo_aproximado_estudiar">
								<label><b><span
style='font-size:11.5pt;line-height:107%;font-family:"Segoe UI Emoji",sans-serif;
mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:"Segoe UI Emoji";
color:#000000'>&#128176;</span></b> <b>Sueldo neto mensual aproximado entre todos los <u>avalistas</u></b></label>
							</div>	
							<div id="sueldo_aproximado_estudiar_trabajar">
								<label><b><span
style='font-size:11.5pt;line-height:107%;font-family:"Segoe UI Emoji",sans-serif;
mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:"Segoe UI Emoji";
color:#000000'>&#128176;</span></b> <b>Sueldo neto mensual aproximado entre todos los inquilinos y los <u>avalistas</u></b></label>
							</div>							
							
							<input type="text" id="sueldo_aproximado" name="sueldo_aproximado" class="form-control" maxlength="18">				
						</div>						
					</div>
				
					<div class="row">
						<div class="form-group col-md-6">
							<label><b><span
style='font-size:11.5pt;line-height:107%;font-family:"Segoe UI Emoji",sans-serif;
mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:"Segoe UI Emoji";
color:#000000'>&#128198;</span></b> <b>¿Entraríais a partir de cuándo?</b></label>
	          				<input type="text" id="fecha_desde" name="fecha_desde" class="form-control" autocomplete="off" maxlength="10" readonly style="background-color:white;">							
						</div>
						<div class="form-group col-md-6">
							<label><b><span
style='font-size:11.5pt;line-height:107%;font-family:"Segoe UI Emoji",sans-serif;
mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:"Segoe UI Emoji";
color:#000000'>&#8265;</span></b> <b>¿Duración mínima del alquiler?</b></label>
							<select id="duracion_alquiler" name="duracion_alquiler" class="form-control" >
								<option value=""></option>							
								<option value="1 mes">1 mes</option>
								<option value="3 meses">3 meses</option>
								<option value="6 meses">6 meses</option>
								<option value="9 meses">9 meses</option>
								<option value="1 año">1 año</option>
								<option value="1 año y medio">1 año y medio</option>
								<option value="2 años">2 años</option>
								<option value="3 años">3 años</option>
								<option value="4 años">4 años</option>
								<option value="5 años">5 años</option>
								<option value="+ de 5 años">+ de 5 años</option>
								<option value="indefinido">indefinido</option>								
							</select>							
						</div>						
					</div>
					<div class="row">
	            		<div class="form-group  col-md-12">
	            			<label><b><span
style='font-size:11.5pt;line-height:107%;font-family:"Segoe UI Emoji",sans-serif;
mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:"Segoe UI Emoji";
color:#000000'>&#128172;</span></b> <b>Cuenta algo de ti al propietario</b></label>
	            			<textarea id="comentario_persona" name="comentario_persona" class="form-control" rows="2" maxlength="250"></textarea>
	            		</div>
					</div>
					<div class="row">
	            		<div class="form-group  mt-4 mb-0  col-md-12" v-if="user==null">
	            			<label><b>Necesitamos tu contacto para que podamos gestionar tu solicitud de visita directamente con el propietario:</b></label>
	            		</div>
					</div>	            		
					<div class="row">
	            		<div class="form-group  col-md-6" v-if="user==null">
	            			<label><b><span
style='font-size:11.5pt;line-height:107%;font-family:"Segoe UI Emoji",sans-serif;
mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:"Segoe UI Emoji";
color:#000000'>&#128100;</span></b> <b>Nombre:</b></label>
							<input type="text" id="nombre_completo" name="nombre_completo" class="form-control" maxlength="30">	
	            		</div>
	            		<div class="form-group  col-md-6" v-if="user==null">
	            			<label><b><span
style='font-size:11.5pt;line-height:107%;font-family:"Segoe UI Emoji",sans-serif;
mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:"Segoe UI Emoji";
color:#000000'>&#128100;</span></b> <b>Apellidos:</b></label>
							<input type="text" id="apellidos_completo" name="apellidos_completo" class="form-control" maxlength="55">	
	            		</div>						
					</div>
					<div class="row">
	            		<div class="form-group  col-md-6" v-if="user==null">
	            			<label>📧 <b>Email de contacto:</b></label>
							<input type="email" id="email_contacto" name="email_contacto" class="form-control" maxlength="100">	
	            		</div>
	            		<div class="form-group  col-md-6" v-if="user==null">
	            			<label>📱 <b>Móvil de contacto con whatsapp:</b></label>
							<input type="text" id="movil_contacto" name="movil_contacto" class="form-control" maxlength="15">	
	            		</div>						
					</div>	
							<div class="row">					
								<div class="form-group  col-md-12" v-if="user==null">			
										<div class="form-group  col-md-12">	
											<input type="checkbox" id="acepta_condiciones" name="acepta_condiciones" >	
Al solicitar una visita presencial confirmas que has leído, comprendes y aceptas los <a href="/terminosI-condiciones" target="_blank">términos y condiciones</a> y las <a href="/politica-privacidad" target="_blank">politicas de privacidad</a> de <b>IAMOVING ONLINE, S.L.</b>
										</div>					
								</div>
							</div>											    
	            	</div>
					<div class="row" id="step3">
						<div class="col-md-12">
							<div class="form-group">
									<b>Paso 3. Te dejamos algunas sencillas preguntas que la propiedad le gustaría saber antes de confirmar una visita en persona. Los propietarios siempre dan prioridad cuanta más información tienen de los interesados.</b>
							</div>
						</div>
					</div>
	            		<div class="col-md-12 text-center">
	            			<button id="btnAtras" class="btn btn-dark" style="color:#EADD1B;" type="button">
		                        Atrás
							</button>
		          			<!--<button id="btn_Continuar2" class="btn btn-dark" style="color:#EADD1B;" type="button">-->
							<!--<button id="solicitar_visita" class="btn btn-dark" style="color:#EADD1B;" type="submit">-->
							<button id="solicitar_visita" class="btn btn-success" style="color:#ffffff;" type="submit">
		                        Solicitar Visita Presencial
							</button>
		          		</div>
		          		
		        </div>	
 @if($detalle->is_sale != 0)				
		        <div class="row" style="max-height: calc(100vh - 155px);overflow-y: auto;" id="step4">
	            	<div class="col-md-12  text-center">
	            		<div class="form-group">
	            				<b>Paso 2/2</b>
	            		</div>
					</div>		            	

<!-- INICIO BLOQUE MODIFICADO -->
<div class="col-md-12">
    <div class="form-group" style="margin-bottom: 0;">
        <!-- Contenedor que en móvil pone el icono justo después del texto -->
        <div class="text-with-icon">
            <p class="MsoNormal" style="margin-bottom: 0; display: inline;">
                <b>Te dejamos algunas sencillas preguntas que al propietario le gustaría conocer antes de confirmar una visita.</b>
            </p>
            <!--<span class="info-icon" style="cursor: pointer; display: inline-flex; align-items: center; justify-content: center; width: 20px; height: 20px; border-radius: 50%; background-color: #eadd03; color: #000; font-size: 12px; font-weight: bold; line-height: 1; margin-left: 6px;">ⓘ</span>-->
<span class="info-icon" style="cursor: pointer; display: inline-flex; align-items: center; justify-content: center; width: 20px; height: 20px; font-size: 14px; font-weight: bold; line-height: 1; margin-left: 6px; color: #666;">ⓘ</span>            
        </div>
    </div>
    
    <!-- Tooltip oculto que se mostrará al hacer hover/tap -->
    <div class="info-tooltip" style="display: none; background-color: #f9f9f9; border-left: 4px solid #eadd03; padding: 15px; margin-top: 10px; border-radius: 4px; box-shadow: 0 2px 6px rgba(0,0,0,0.1);">
        <p class="MsoNormal text-center" style="margin-top: 0;">
            <span class="GramE">
                <span style='font-family:"Segoe UI Emoji",sans-serif;'>&#128545;</span> 
                <b>¿A qué no te gusta perder el tiempo con visitas innecesarias no?</b>
            </span>
        </p>
        <p class="MsoNormal">
            <span style='font-family:"Segoe UI Emoji",sans-serif;'>&#128285;</span> 
            Tampoco la propiedad. Los propietarios suelen dar prioridad a las visitas cuando conocen el perfil de los interesados.
        </p>
        <p class="MsoNormal text-center">
            <span style='font-family:"Segoe UI Emoji",sans-serif;'>&#128640;</span> 
            Sé tú la prioridad, entre muchas solicitudes que el propietario recibe a diario.
        </p>
    </div>
</div>

<style>
/* Estilos específicos para escritorio y móvil */
.info-icon {
    transition: opacity 0.2s;
    vertical-align: middle;
}

.info-icon:hover {
    opacity: 0.6;
    color: #000;
}

/* En escritorio: el icono se comporta igual */
@media (min-width: 768px) {
    .text-with-icon {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 6px;
    }
    
    .text-with-icon p {
        margin-bottom: 0;
    }
}

/* En móvil: aseguramos que el icono esté justo después del texto */
@media (max-width: 767px) {
    .text-with-icon {
        display: inline;
    }
    
    .text-with-icon p {
        display: inline;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var icon = document.querySelector('.info-icon');
    var tooltip = document.querySelector('.info-tooltip');
    
    if (!icon || !tooltip) return;
    
    // Variable para controlar el estado en móvil
    var isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
    var tapTimeout;
    
    // Función para mostrar el tooltip
    function showTooltip() {
        tooltip.style.display = 'block';
    }
    
    // Función para ocultar el tooltip
    function hideTooltip() {
        tooltip.style.display = 'none';
    }
    
    if (isMobile) {
        // En móvil: mostrar/ocultar al hacer tap, el icono está justo después del texto
        icon.addEventListener('touchstart', function(e) {
            e.preventDefault();
            e.stopPropagation();
            // Si ya está visible, lo ocultamos; si no, lo mostramos
            if (tooltip.style.display === 'block') {
                hideTooltip();
            } else {
                showTooltip();
                // Ocultar automáticamente después de 5 segundos en móvil
                if (tapTimeout) clearTimeout(tapTimeout);
                tapTimeout = setTimeout(hideTooltip, 5000);
            }
        });
        
        // Opcional: tocar fuera del tooltip lo cierra
        document.addEventListener('touchstart', function(e) {
            if (!icon.contains(e.target) && !tooltip.contains(e.target)) {
                hideTooltip();
                if (tapTimeout) clearTimeout(tapTimeout);
            }
        });
    } else {
        // En escritorio: mostrar al pasar el ratón, ocultar al salir
        icon.addEventListener('mouseenter', showTooltip);
        icon.addEventListener('mouseleave', hideTooltip);
        // También permitir ocultar si se hace clic fuera
        document.addEventListener('click', function(e) {
            if (!icon.contains(e.target) && !tooltip.contains(e.target)) {
                hideTooltip();
            }
        });
    }
});
</script>
<!-- FIN BLOQUE MODIFICADO -->

<!-- NUEVA PREGUNTA 1: ¿La casa sería para? -->
<div class="form-group col-md-12">
		        		<label><b><span
style='font-size:11.5pt;line-height:107%;font-family:"Segoe UI Emoji",sans-serif;
mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:"Segoe UI Emoji";
color:#000000'>&#8265;</span></b> <b>1. ¿La casa sería para?</b></label>
    <select id="casa_para" name="casa_para" class="form-control" required>
        <option value=""></option>
        <option value="Solo para mí">Solo para mí</option>
        <option value="Somos una pareja">Somos una pareja</option>
        <option value="Somos una familia">Somos una familia</option>
        <option value="99">Prefiero no contestar</option>
    </select>
</div>					
		        	<div class="form-group col-md-12">
		        		<label><b><span
style='font-size:11.5pt;line-height:107%;font-family:"Segoe UI Emoji",sans-serif;
mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:"Segoe UI Emoji";
color:#000000'>&#8265;</span></b> <b>2. ¿Vives en España?</b></label>
		        		<!--<input type="text" id="live_spain" name="live_spain" class="form-control" maxlength="100" required />-->
    							<select id="live_spain" name="live_spain" class="form-control"  required>
    								<option value=""></option>							
    								<option value="Si">Si</option>
    								<option value="No">No</option>
    								<option value="99">Prefiero no contestar</option>
    							</select>		        		
		        	</div>
		        	<div class="form-group col-md-12">
		        		<label><b><span
style='font-size:11.5pt;line-height:107%;font-family:"Segoe UI Emoji",sans-serif;
mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:"Segoe UI Emoji";
color:#000000'>&#8265;</span></b> <b>3. ¿El comprador es una persona física o una sociedad?</b></label>
<!--	        		<input type="text" id="inversor" name="inversor" class="form-control" maxlength="100" required />-->
    							<select id="inversor" name="inversor" class="form-control"  required>
    								<option value=""></option>							
    								<option value="Persona física">Persona física</option>
    								<option value="Sociedad">Sociedad</option>
    								<option value="99">Prefiero no contestar</option>
    							</select>
		        	</div>
		        	<div class="form-group col-md-12">
		        		<label><b><span
style='font-size:11.5pt;line-height:107%;font-family:"Segoe UI Emoji",sans-serif;
mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:"Segoe UI Emoji";
color:#000000'>&#8265;</span></b> <b>4. ¿Cuál sería la forma de pago?</b></label>
       		        		
    							<select id="credito" name="credito" class="form-control"  required>
    								<option value=""></option>							
    								<option value="Ya dispongo del dinero, no necesito de un crédito">Ya dispongo del dinero, no necesito de un crédito</option>
    								<option value="Tengo que pedir un crédito hipotecario">Tengo que pedir un crédito hipotecario</option>
    								<option value="Tengo un crédito hipotecario aprobado sobre este valor">Tengo un crédito hipotecario aprobado sobre este valor</option>
    								<option value="99">Prefiero no contestar</option>
    							</select>	
		        	</div>
	            		<div class="form-group  col-md-12">
	            			<label><b><span
style='font-size:11.5pt;line-height:107%;font-family:"Segoe UI Emoji",sans-serif;
mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:"Segoe UI Emoji";
color:#000000'>&#128172;</span></b> <b>5. Cuenta algo de ti al propietario</b></label>
	            			<textarea id="sobreti_venta" name="sobreti_venta" class="form-control" rows="2" maxlength="250"></textarea>
	            		</div>
<div style="width: 100%; text-align: center; margin-top: 1rem; margin-bottom: 1rem;">
    <img src="/img/owner.png" width="70" height="70" style="margin-bottom:10px;" alt="comprador">
</div>            		            		
								<div class="form-group  mt-1 mb-0  col-md-12" v-if="user==null">
									<label><b>Necesitamos tu contacto para que podamos gestionar tu solicitud de visita directamente con el propietario:</b></label>
								</div>
								<div class="form-group  col-md-6" v-if="user==null">
									<label><b><span
style='font-size:11.5pt;line-height:107%;font-family:"Segoe UI Emoji",sans-serif;
mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:"Segoe UI Emoji";
color:#000000'>&#128100;</span></b> <b>Nombre:</b></label>
									<input type="text" id="nombre_completo_venta" name="nombre_completo_venta" class="form-control" minLength="2" maxlength="30">	
								</div>
								<div class="form-group  col-md-6" v-if="user==null">
									<label><b><span
style='font-size:11.5pt;line-height:107%;font-family:"Segoe UI Emoji",sans-serif;
mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:"Segoe UI Emoji";
color:#000000'>&#128100;</span></b> <b>Apellidos:</b></label>
									<input type="text" id="apellidos_completo_venta" name="apellidos_completo_venta" class="form-control"  minLength="2" maxlength="55">	
								</div>
								<div class="form-group  col-md-6" v-if="user==null">
									<label>📧 <b>Email de contacto:</b></label>
									<input type="email" id="email_contacto_venta" name="email_contacto_venta" class="form-control" maxlength="100" oninput="validarEmails()">	
								</div>
								<div class="form-group  col-md-6" v-if="user==null">
									<label>📧 <b>Confirma Email de contacto:</b></label>
									<input type="email" id="confirmacion_email_contacto_venta" name="confirmacion_email_contacto_venta" class="form-control" maxlength="100" oninput="validarEmails()" 
       title="Los emails no coinciden" onpaste="return false;" oncontextmenu="return false;" autocomplete="off">	
								</div>								
			<div class="form-group  col-md-6" v-if="user==null">
				<label>📱 <b>Móvil de contacto con whatsapp:</b></label>
				<input type="text" id="movil_contacto_venta" name="movil_contacto_venta" class="form-control" minLength="9" maxlength="15" oninput="validarPhones()">
			</div>
								<div class="form-group  col-md-6" v-if="user==null">
									<label>📱 <b>Confirmar móvil de contacto con whatsapp:</b></label>
									<input type="text" id="confirmacion_movil_contacto_venta" name="confirmacion_movil_contacto_venta" class="form-control" minLength="9" maxlength="15" oninput="validarPhones()" 
       title="Los móviles no coinciden" onpaste="return false;" oncontextmenu="return false;" autocomplete="off">	
								</div>				
	
									<div class="form-group  col-md-12"  v-if="user==null">
									<input type="checkbox" id="acepta_condiciones_venta" name="acepta_condiciones_venta" >
Al solicitar una visita presencial confirmas que has leído, comprendido y aceptas los <a href="/terminosI-condiciones" target="_blank">términos y condiciones</a> y las <a href="/politica-privacidad" target="_blank">politicas de privacidad</a> de <b>IAMOVING ONLINE, S.L.</b>
									</div>									
												
		        	<div class="col-md-12 text-center">
            			<button id="btnAtrasSale" class="btn btn-dark" style="color:#EADD1B;" type="button">
	                        Atrás
						</button>
						<button class="btn btn-success" style="color:#ffffff;" type="submit">
	                        Solicitar visita presencial
						</button>
	          		</div>
		        </div>
@endif	            
       
	        </form> 
      </div>
    </div>
  </div>
</div>

<div id="modalPedido" class="modal fade" role="dialog">
 	<div class="modal-dialog modal-lg">
		<!-- Modal content-->
    <div class="modal-content">

      	<div class="modal-body">
      		<form method="post" id="citaFormPedido" @submit.prevent="pedidoSubmitHandle" ref="cform_pedido"> 
      			{!! csrf_field() !!} 
      			<input type="hidden" name="reference"  value="{{ $detalle->id }} " />
      			<input type="hidden" name="tipo_visita" value="pedido" />
      	<!--<div class="row" >-->
      			    
      			    @if($detalle->is_sale == 0)
      			 <div id="pstep1" style="max-height: calc(100vh - 155px);overflow-y: auto;">
      			    
    	            	<div class="col-md-12">
    	            		<div class="form-group">
    	            				<b>Te dejamos algunas sencillas preguntas que la propiedad desea saber antes de aceptar una oferta. Los propietarios siempre dan prioridad cuanta más información tienen de los interesados.</b>
    	            		</div>
    					</div>
    					<div class="col-md-12">
    						<div class="row">				
    							<div class="form-group col-md-6">
    								<label><b>¿Cuántos inquilinos vais a vivir?</b></label>
    								<select id="p_numero_personas" name="numero_personas" class="form-control" required>
    									<option value=""></option>
    									@for ($i = 1; $i <= 20; $i++)
    										<option value="{{ $i }}">{{ $i }}</option>    
    									@endfor
    								</select>
    							</div>
    							<div class="form-group  col-md-6">
    								<label><b>¿Tipo de relación entre los inquilinos?</b></label>
    
    								<select id="p_tipo_personas" name="tipo_personas" class="form-control"  required>
    									<option value=""></option>
    									<option value="Solo para mi">Solo para mi</option>
    									<option value="Pareja">Pareja</option>
    									<option value="Familia">Familia</option>
    									<option value="Compañeros de trabajo">Compañeros de trabajo</option>
    									<option value="Estudiantes">Estudiantes</option>
    									<option value="Amigos">Amigos</option>
    								</select>
    							</div>						
    						</div>
    						<div class="row">
    							<div class="form-group col-md-6">
    								<label><b>¿Los inquilinos estáis Trabajando, Jubilados o Estudiando?</b></label>
    								<select id="p_estudias_o_trabajas" name="p_estudias_o_trabajas" class="form-control"  required>
    									<option value=""></option>							
    									<option value="Trabajando">Trabajando</option>
    									<option value="Estudiando">Estudiando</option>
    									<!--<option value="Pensionista">Pensionista</option>-->
    									<option value="Sin trabajar">Sin trabajar</option>
    									<option value="Estudiando y trabajando">Estudiando y trabajando</option>
                                        <option value="Jubilados">Jubilados</option>
    								</select>							
    							</div>
    							<div class="form-group col-md-6">
    								<label><b>¿Tenéis mascotas?</b></label>
    								<select id="p_mascotas" name="mascotas" class="form-control"  required>
    									<option value=""></option>							
    									<option value="No">No</option>
    									<option value="Perro">Perro</option>
    									<option value="Gato">Gato</option>
    									<option value="2 perros">2 perros</option>
    									<option value="2 gatos">2 gatos</option>
    									<option value="Perro y gato">Perro y gato</option>
    									<option value="+ de 2 perros o gatos">+ de 2 perros o gatos</option>
    								</select>							
    							</div>						
    						</div>
                        <div class="row" id="p_estudiando0">
                            <div class="form-group col-md-12">
                                <label><b>¿Estudiantes o sin trabajar?</b> Aquellos que estén estudiando o que no trabajen y no puedan demostrar solvencia, deberán presentar un aval personal o más meses de depósitos adicionales como garantía de pago.</label>
                                <!--<label><b>Aval personal/Solidario</b>: En este caso, los propietarios desean conocer los apartados aval 1, aval 2 y aval 3.</label>-->
                                <label><b>Deposito adicional</b>: Negociar directamente la cantidad de los meses con la propiedad.</label>
                            </div>
                        </div>


                        <div class="row" id="p_estudiando01">
                            <div class="form-group col-md-12">
                                <label><b>¿Estudiantes?</b> Aquellos que estén estudiando y no puedan demostrar solvencia, deberán presentar un aval personal o más meses de depósitos adicionales como garantía de pago.</label>
                                <!--<label><b>Aval personal/Solidario</b>: En este caso, los propietarios desean conocer los apartados aval 1, aval 2 y aval 3.</label>-->
                                <label><b>Deposito adicional</b>: Negociar directamente la cantidad de los meses con la propiedad.</label>
                            </div>
                        </div>



                        <div class="row" id="p_estudiando02">
                            <div class="form-group col-md-12">
                                <label><b>¿Sin trabajar?</b> Aquellos que no trabajen y no puedan demostrar solvencia, deberán presentar un aval personal o más meses de depósitos adicionales como garantía de pago.</label>
                                <!--<label><b>Aval personal/Solidario</b>: En este caso, los propietarios desean conocer los apartados aval 1, aval 2 y aval 3.</label>-->
                                <label><b>Deposito adicional</b>: Negociar directamente la cantidad de los meses con la propiedad.</label>
                            </div>
                        </div>
    					<div class="row" id="p_trabajando1">
    						<div class="form-group col-md-6">
    							<div id="p_trabajo_normal">
    								<label><b>¿Dónde trabajáis?</b></label>
    							</div>
    							<div id="p_trabajo_estudiar">
    								<label><b>¿Dónde trabajan los <u>avalistas?</u></b></label>
    							</div>	
    							<div id="p_trabajo_estudiar_trabajar">
    								<label><b>¿Dónde trabajáis los inquilinos y los <u>avalistas</u>?</b></label>
    							</div>						
    							<!--<label>¿Dónde trabajáis?</label>-->
    							<input type="text" id="p_trabajo" name="trabajo" class="form-control"  maxlength="160"  required>							
    						</div>
    						<div class="form-group col-md-6">
    							<div id="p_tipo_trabajo_normal">
    								<label><b>¿Función que desempeñáís?</b></label>
    							</div>
    							<div id="p_tipo_trabajo_estudiar">
    								<label><b>¿Función que desempañan los <u>avalistas</u>?</b></label>
    							</div>	
    							<div id="p_tipo_trabajo_estudiar_trabajar">
    								<label><b>¿Función que desempeñáís los inquilinos y los <u>avalistas</u>?</b></label>
    							</div>								
    								<input type="text" id="p_tipo_trabajo" name="tipo_trabajo" class="form-control" maxlength="160" required>							
    						</div>						
    					</div>
    						<div class="row" id="p_trabajando2">
    						<div class="form-group col-md-6">
    							<div id="p_tipo_contrato_normal">
    								<label><b>Tipo de contrato</b>: autónomo, indefinido, temporal, obra y servicio, becario, pensionista ¿otros?</label>
    							</div>
    							<div id="p_tipo_contrato_estudiar">
    								<label><b>Tipo de contrato de los <u>avalistas</u></b>: autónomo, indefinido, temporal, obra y servicio, becario, pensionista ¿otros?</label>
    							</div>	
    							<div id="p_tipo_contrato_estudiar_trabajar">
    								<label><b>Tipo de contrato de los inquilinos y los <u>avalistas</u></b>: autónomo, indefinido, temporal, obra y servicio, becario, pensionista ¿otros?</label>
    							</div>						
    							<!--<label>Tipo de contrato: autónomo, indefinido, temporal, obra y servicio, becario, ¿otros?</label>-->
    								<input type="text" id="p_tipo_contrato" name="tipo_contrato" class="form-control"  maxlength="160" required>		
    						</div>
    						<div class="form-group col-md-6">
    							<div id="p_sueldo_aproximado_normal">
    								<label><b>Sueldo neto mensual aproximado entre todos los inquilinos</b></label>
    							</div>
    							<div id="p_sueldo_aproximado_estudiar">
    								<label><b>Sueldo neto mensual aproximado entre todos los <u>avalistas</u></b></label>
    							</div>	
    							<div id="p_sueldo_aproximado_estudiar_trabajar">
    								<label><b>Sueldo neto mensual aproximado entre todos los inquilinos y los <u>avalistas</u></b></label>
    							</div>							
    							<!--<label>Sueldo neto mensual aproximado entre todos los inquilinos</label>-->
    							<input type="text" id="p_sueldo_aproximado" name="sueldo_aproximado" class="form-control" maxlength="11" required>				
    						</div>						
    					</div>
    					
    					<div class="row">
    						<div class="form-group col-md-6">
    							<label><b>¿Entraríais a partir de cuándo?</b></label>
    	          				<input type="text" id="p_fecha_desde" name="fecha_desde" readonly class="form-control" autocomplete="off" required  maxlength="10" readonly  style="background-color:white;" >							
    						</div>
    						<div class="form-group col-md-6">
    							<label><b>¿Duración mínima del alquiler?</b></label>
    							<select id="p_duracion_alquiler" name="duracion_alquiler" class="form-control"  required>
    								<option value=""></option>							
    								<option value="1 mes">1 mes</option>
    								<option value="3 meses">3 meses</option>
    								<option value="6 meses">6 meses</option>
    								<option value="9 meses">9 meses</option>
    								<option value="1 año">1 año</option>
    								<option value="1 año y medio">1 año y medio</option>
    								<option value="2 años">2 años</option>
    								<option value="3 años">3 años</option>
    								<option value="4 años">4 años</option>
    								<option value="5 años">5 años</option>
    								<option value="+ de 5 años">+ de 5 años</option>
    								<option value="indefinido">indefinido</option>								
    							</select>							
    						</div>						
    					</div>
    					<div class="row" id="p_div_contraoferta">
    						<div class="form-group col-md-12">
    							<label><b>Aviso importante:</b> muchos propietarios dan prioridad a los interesados que no hacen una contraoferta.</label>
    							<!--<label><b>Aval personal/Solidario</b>: En este caso, los propietarios desean conocer los apartados aval 1, aval 2 y aval 3.</label>-->
    							<!--<label><b>Deposito adicional</b>: Negociar directamente la cantidad de los meses con la propiedad.</label>-->
    						</div>
    					</div>
    					<div class="row">
    	            		<div class="form-group  col-md-12">
    	            			<label><b>¿Hacer contraoferta?</b></label>
    	            			<input type="text" id="p_contraoferta" name="contraoferta" class="form-control" maxlength="20" required>				
    	            		</div>
    					</div>						
    					<div class="row">
    	            		<div class="form-group  col-md-12">
    	            			<label><b><span
style='font-size:11.5pt;line-height:107%;font-family:"Segoe UI Emoji",sans-serif;
mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:"Segoe UI Emoji";
color:#000000'>&#128172;</span></b> <b>Cuenta algo de ti al propietario</b></label>
    	            			<textarea id="p_comentario_persona" name="comentario_persona" class="form-control" maxlength="250" rows="2"></textarea>
    	            		</div>
    					</div>
							<div class="row">
								<div class="form-group  mt-4 mb-0  col-md-12" v-if="user==null">
									<label>📒 <b>Necesitamos tu contacto para enviar tu contraoferta al propietario:</b></label>
								</div>
							</div>	            		
							<div class="row">
								<div class="form-group  col-md-6" v-if="user==null">
									<label><b><span
style='font-size:11.5pt;line-height:107%;font-family:"Segoe UI Emoji",sans-serif;
mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:"Segoe UI Emoji";
color:#000000'>&#128100;</span></b> <b>Nombre:</b></label>
									<input type="text" id="p_nombre_completo" name="nombre_completo" class="form-control" maxlength="30">	
								</div>
								<div class="form-group  col-md-6" v-if="user==null">
									<label><b><span
style='font-size:11.5pt;line-height:107%;font-family:"Segoe UI Emoji",sans-serif;
mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:"Segoe UI Emoji";
color:#000000'>&#128100;</span></b> <b>Apellidos:</b></label>
									<input type="text" id="p_apellidos_completo" name="apellidos_completo" class="form-control" maxlength="55">	
								</div>								
							</div>
							<div class="row">
								<div class="form-group  col-md-6" v-if="user==null">
									<label>📧 <b>Email de contacto:</b></label>
									<input type="email" id="p_email_contacto" name="email_contacto" class="form-control" maxlength="100">	
								</div>
								<div class="form-group  col-md-6" v-if="user==null">
									<label>📱 <b>Móvil de contacto con whatsapp:</b></label>
									<input type="text" id="p_movil_contacto" name="movil_contacto" class="form-control" maxlength="15">	
								</div>						
							</div>	
							<div class="row">
								<div class="form-group  col-md-12" v-if="user==null">
										<input type="checkbox" id="p_acepta_condiciones" name="acepta_condiciones" >	
										 Al realizar una contraoferta estás aceptando los <a href="/terminosI-condiciones"  target="_blank">términos y condiciones</a> y las <a href="/politica-privacidad"  target="_blank">politicas de privacidad</a> de <b>IAMOVING</b>
								</div>					
							</div>																
    				</div>
    				
	            	<div class="col-md-12 text-center">	
									<button id="btnAtras6" class="btn btn-dark" style="color:#EADD1B;" data-dismiss="modal" aria-label="Close">
										Atrás
									</button>					
    	            	<button id="p_solicitar_visita" class="btn btn-dark" style="color:#EADD1B;" type="submit">
    		                Hacer contraoferta
    					</button>
    				</div>
	            </div>
	            @else
				 @if($detalle->is_sale != 0)
	            <div class="row" style="max-height: calc(100vh - 155px);overflow-y: auto;" id="pstep2">
						<div class="col-md-12">
							<div class="form-group">
									<b>Te dejamos algunas sencillas preguntas que la propiedad desea saber antes de aceptar una oferta.</b>
							</div>
						</div>
<div class="form-group col-md-12">
		        		<label><b><span
style='font-size:11.5pt;line-height:107%;font-family:"Segoe UI Emoji",sans-serif;
mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:"Segoe UI Emoji";
color:#000000'>&#8265;</span></b> <b>1. ¿La casa sería para?</b></label>
    <select id="pcasa_para" name="pcasa_para" class="form-control" required>
        <option value=""></option>
        <option value="Solo para mí">Solo para mí</option>
        <option value="Somos una pareja">Somos una pareja</option>
        <option value="Somos una familia">Somos una familia</option>
        <option value="99">Prefiero no contestar</option>
    </select>
</div>						
    					<div class="col-md-12">
    						<div class="row">				
    							<div class="form-group col-md-12">
									<label><b><span
style='font-size:11.5pt;line-height:107%;font-family:"Segoe UI Emoji",sans-serif;
mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:"Segoe UI Emoji";
color:#000000'>&#8265;</span></b> <b>2. ¿Vives en España?</b></label>
									<!--<input type="text" id="plive_spain" name="live_spain" class="form-control" maxlength="100" required />-->
    							<select id="plive_spain" name="live_spain" class="form-control"  required>
    								<option value=""></option>							
    								<option value="Si">Si</option>
    								<option value="No">No</option>
    								<option value="99">Prefiero no contestar</option>
    							</select>		        									
								</div>
							</div>
						</div>
    					<div class="col-md-12">
    						<div class="row">				
    							<div class="form-group col-md-12">
        		        		<label><b><span
style='font-size:11.5pt;line-height:107%;font-family:"Segoe UI Emoji",sans-serif;
mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:"Segoe UI Emoji";
color:#000000'>&#8265;</span></b> <b>3. ¿El comprador es una persona física o una sociedad?</b></label>
        		        		<!--<input type="text" id="pinversor" name="inversor" class="form-control" maxlength="100" required />-->
    							<select id="pinversor" name="inversor" class="form-control"  required>
    								<option value=""></option>							
    								<option value="Persona física">Persona física</option>
    								<option value="Sociedad">Sociedad</option>
    								<option value="99">Prefiero no contestar</option>
    							</select>								
								</div>
							</div>
						</div>
    					<div class="col-md-12">
    						<div class="row">				
    							<div class="form-group col-md-12">
        		        		<label><b><span
style='font-size:11.5pt;line-height:107%;font-family:"Segoe UI Emoji",sans-serif;
mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:"Segoe UI Emoji";
color:#000000'>&#8265;</span></b> <b>4. ¿Cuál sería la forma de pago?</b></label>
        		        		
    							<select id="pcredito" name="credito" class="form-control"  required>
    								<option value=""></option>							
    								<option value="Ya dispongo del dinero, no necesito de un crédito">Ya dispongo del dinero, no necesito de un crédito</option>
    								<option value="Tengo que pedir un crédito hipotecario">Tengo que pedir un crédito hipotecario</option>
    								<option value="Tengo un crédito hipotecario aprobado sobre este valor">Tengo un crédito hipotecario aprobado sobre este valor</option>												
    								<option value="99">Prefiero no contestar</option>
    							</select>								
								</div>
							</div>
						</div>
    					<div class="col-md-12">
    						<div class="row">				
    							<div class="form-group col-md-12">
    							<label><b>Aviso importante:</b>  muchos propietarios dan prioridad a los interesados que no hacen una contraoferta.</label>
    							<!--<label><b>Aval personal/Solidario</b>: En este caso, los propietarios desean conocer los apartados aval 1, aval 2 y aval 3.</label>-->
    							<!--<label><b>Deposito adicional</b>: Negociar directamente la cantidad de los meses con la propiedad.</label>-->
								</div>
							</div>
						</div>
    					<div class="col-md-12">
    						<div class="row">				
    							<div class="form-group col-md-12">
    	            			<label><b>5. ¿Hacer contraoferta?</b></label>
    	            			<input type="text" id="p_contraoferta_venta" name="contraoferta_venta" class="form-control" maxlength="20" required>				
								</div>
							</div>
						</div>							
    					<div class="col-md-12">
    						<div class="row">						
								<div class="form-group  col-md-12">
									<label><b><span
style='font-size:11.5pt;line-height:107%;font-family:"Segoe UI Emoji",sans-serif;
mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:"Segoe UI Emoji";
color:#000000'>&#128172;</span></b> <b>5. Cuenta algo de ti al propietario</b></label>
									<textarea id="psobreti_venta" name="sobreti_venta" class="form-control" rows="2" maxlength="250"></textarea>
								</div>	
							</div>
<div style="width: 100%; text-align: center; margin-top: 1rem; margin-bottom: 1rem;">
    <img src="/img/owner.png" width="70" height="70" style="margin-bottom:10px;" alt="comprador">
</div>        		
								<div class="form-group mb-0  col-md-12" v-if="user==null">
									<div class="row">						
										<div class="form-group  mt-1 mb-0  col-md-12">								
											<label><b>Necesitamos tu contacto para enviar tu contraoferta al propietario:</b></label>
										</div>
									</div>
								</div>
								<div class="form-group mb-0  col-md-12" v-if="user==null">
									<div class="row">						
										<div class="form-group  col-md-6">	
									<label><b><span
style='font-size:11.5pt;line-height:107%;font-family:"Segoe UI Emoji",sans-serif;
mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:"Segoe UI Emoji";
color:#000000'>&#128100;</span></b> <b>Nombre:</b></label>
									<input type="text" id="p_nombre_completo_venta" name="nombre_completo_venta" class="form-control" minLength="2" maxlength="30">	
										</div>
									</div>
										<div class="form-group  col-md-6">	
									<label><b><span
style='font-size:11.5pt;line-height:107%;font-family:"Segoe UI Emoji",sans-serif;
mso-fareast-font-family:"Times New Roman";mso-bidi-font-family:"Segoe UI Emoji";
color:#000000'>&#128100;</span></b> <b>Apellidos:</b></label>
									<input type="text" id="p_apellidos_completo_venta" name="apellidos_completo_venta" class="form-control" minLength="2" maxlength="55">	
										</div>
									
								</div>
								<div class="form-group  col-md-12" v-if="user==null">
									<div class="row">						
										<div class="form-group  col-md-6">	
											<label>📧 <b>Email de contacto:</b></label>
											<input type="email" id="p_email_contacto_venta" name="email_contacto_venta" class="form-control" maxlength="100">	
										</div>
										<div class="form-group  col-md-6" v-if="user==null">
											<label>📱 <b>Móvil de contacto con whatsapp:</b></label>
											<input type="text" id="p_movil_contacto_venta" name="movil_contacto_venta" class="form-control" minLength="2" maxlength="15">	
										</div>						
									</div>
								</div>
								<div class="form-group  col-md-12" v-if="user==null">
									<div class="row">						
										<div class="form-group  col-md-12">	
										<label>
										<input type="checkbox" id="p_acepta_condiciones_venta" name="acepta_condiciones_venta"> Al realizar una contraoferta estás aceptando los <a href="/terminosI-condiciones" target="_blank">términos y condiciones</a> y las <a href="/politica-privacidad" target="_blank">politicas de privacidad</a> de <b>IAMOVING</b>
										</label>
										</div>					
									</div>
								</div>																	
    					<div class="col-md-12 text-center">
    						<div class="row">						
								<div class="form-group  col-md-12 text-center">	
									<button id="btnAtras4" class="btn btn-dark" style="color:#EADD1B;" data-dismiss="modal" aria-label="Close">
										Atrás
									</button>
									<button id="btnAtrasSale" class="btn btn-dark" style="color:#EADD1B;" type="submit">
										Hacer contraoferta
									</button>
								</div>	
							</div>
						</div>
        	     </div>
				 @endif
        	   @endif
      		</form>
      	</div>
    </div>
	</div>
</div>



<div id="modalVerificado" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 id="modal-request-title" class="modal-title">Piso Verificado</h4>
      </div>
      <div class="modal-body">
      			{!! csrf_field() !!} 
	          		<div class="col-md-12">
	          			<div class="form-group">
							<label>Nuestro equipo verifica e investiga personalmente todos los pisos. Hacemos video, fotos desde todos los ángulos y realizamos un informe detallado. Así, evitamos cualquier tipo de engaño y de anuncio fraudulento.</label>
							
	          			</div>

	          		</div>
	          		<div class="col-md-12">
	          			<div class="form-group">
							<h4 id="modal-request-title" class="modal-title">Iamoving va más lejos</h4>
							<label>Queremos ofrecerte la mejor experiencia posible, pues sabemos que a la hora de comprar una casa, la zona en la que esté ubicada es muy importante. Por eso, ofrecemos también un tour virtual por el barrio en el que se encuentra el piso, disminuyendo aún más las malditas visitas frustradas.</label>
	          			</div>

	          		</div>					
		          		<div class="col-md-12 text-center">
		          			<button class="btn btn-dark" style="color:#EADD1B;" data-dismiss="modal"  type="button">
		                        Cerrar
							</button>						
		          		</div>					
      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')
<script>
  (g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})({
    key: "AIzaSyDZILGdMqrThTYKDDsbolOgLF9fm4lrcfA",
    v: "weekly",
    // Añade esta línea:
    libraries: "marker"
  });
</script>
	<script>
	$(document).ready(function(){
		var id=@json($id); 
		var is_sale = @json($detalle->is_sale);
		var latitud = @json($detalle->latitud);
		var longitud = @json($detalle->longitud);
		var available_days = @json($detalle->calendar);
		if(available_days){
			available_days = available_days.split(",");
		}
		
		$('#mInforme').on('shown.bs.modal', function (e) {
            console.log("mInforme");
        });
		




		
		var days = ["0","1","2","3","4","5","6"];
		if(available_days.length > 0){
			for(i=0;i<available_days.length;i++){
				switch (available_days[i].trim()){
					case 'Lunes': days.splice(days.indexOf('1'),1); break;
					case 'Martes': days.splice(days.indexOf('2'),1); break;
					case 'Miercoles': days.splice(days.indexOf('3'),1); break;
					case 'Jueves': days.splice(days.indexOf('4'),1); break;
					case 'Viernes': days.splice(days.indexOf('5'),1); break;
					case 'Sabado': days.splice(days.indexOf('6'),1); break;
					case 'Domingo': days.splice(days.indexOf('0'),1); break;
				}
			}
		}
		var disable_days = days.join(",");

		//var detalle=@json($detalle);

		var producion="https://www.iamoving.com/img/marker.ico";
		var desarrollo="https://www.iamoving.com/img/marker.ico";
		
let map;
function initMap() {
    var myLatLng = null;
    if(latitud != null && longitud != null){
        myLatLng = {
            lat: parseFloat(latitud), 
            lng: parseFloat(longitud)
        }
    } else {
        myLatLng = { 
            lat: 40.4381307,
            lng: -3.8199627
        }
    }

    var map = new google.maps.Map(document.getElementById('mapa'), {
        center: myLatLng,
        zoom: 16,
        disableDefaultUI: false,
        zoomControl: true,
        mapTypeControl: false,
        streetViewControl: false,
        fullscreenControl: true
    });

    var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        title: 'Ubicación de la propiedad',
        icon: 'https://www.iamoving.com/img/marker.ico'
    });
}
/*
async function initMap() {
    // 1. Cargar las bibliotecas nuevas que necesitamos
    const { Map } = await google.maps.importLibrary("maps");
    const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");
    
    var myLatLng = null;
    if(latitud!=null && longitud!=null){
        myLatLng = {
            lat: parseFloat(latitud), 
            lng: parseFloat(longitud)
        }
    } else {
        myLatLng = { 
            lat:40.4381307,
            lng:-3.8199627
        }
    }

    // 2. Crear el mapa. ¡IMPORTANTE! Añadir mapId.
    map = new Map(document.getElementById('mapa'), {
        center: myLatLng,
        zoom: 16,
        // ¡REEMPLAZA ESTE TEXTO POR TU MAP ID REAL!
        mapId: 'TU_MAP_ID_AQUI' 
    });

    // 3. Crear el icono personalizado como elemento HTML
    const iconUrl = "https://www.iamoving.com/img/marker.ico"; // Tu icono
    const customIcon = document.createElement("img");
    customIcon.src = iconUrl;
    // Ajusta el tamaño si es necesario (ej: 32x32 píxeles)
    customIcon.style.width = "32px";
    customIcon.style.height = "32px";

    // 4. Crear el marcador avanzado CON TU ICONO PERSONALIZADO
    marker = new AdvancedMarkerElement({
        map: map,
        position: myLatLng,
        // Esto es clave: asignas tu elemento HTML como contenido
        content: customIcon,
        title: 'Ubicación de la propiedad' // Texto que aparece al pasar el ratón
    });
}*/

		
    // Cargar el mapa cuando la API esté lista
    google.maps.importLibrary("maps").then(() => {
        setTimeout(function () { 
            initMap();
        }, 2000);
    });

			$("#step2").hide();
			$("#step3").hide();
            $("#step4").hide();
            
            $('#modalCita').on('hidden.bs.modal', function () {
                $("#step2").hide();
    			$("#step3").hide();
                $("#step4").hide();
            });
            
            $('#modalPedido').on('hidden.bs.modal', function () {
                $("#step2").hide();
    			$("#step3").hide();
                $("#step4").hide();
            });
            
            console.log(is_sale);
            
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
				//beforeShowDay: highlightDays,
      //todayHighlight: true,
      //startDate: new Date(),
	   startDate: today,
    			autoclose: true,
    			ignoreReadonly: true
				//orientation: 'top'
    			//daysOfWeekDisabled: disable_days
            });

			$('#fecha_desde').datepicker({
                language: "es",
                format: "dd/mm/yyyy",
    			startDate: today,
    			autoclose: true,
    			ignoreReadonly: true
				//orientation: 'top'
    			//daysOfWeekDisabled: disable_days
            });
            
            $('#p_fecha_desde').datepicker({
                language: "es",
                format: "dd/mm/yyyy",
    			startDate: today,
    			autoclose: true,
    			ignoreReadonly: true
    			//daysOfWeekDisabled: disable_days
            });
			
            $('.clockpicker').clockpicker({
				default: 'now',
			    placement: 'bottom',
			    align: 'left',
			    donetext: 'OK',
				autoclose: 'true'
			});
	
			$("#time").click(function(){
				//alert('hola2');
   $("#time").prop('readonly', true);
$("#date").prop('readonly', true);
			});

			$("#date").click(function(){
				//alert('hola2');
   $("#time").prop('readonly', true);
$("#date").prop('readonly', true);
			});			
			
         $("#date").hover(
            function(){
   $("#time").prop('readonly', true);
$("#date").prop('readonly', true);
           });

         $("#time").hover(
            function(){
   $("#time").prop('readonly', true);
$("#date").prop('readonly', true);
           });			   
			
			$("#btnSolicitarV").click(function(){
				//alert('hola2');
				$("#time").removeAttr("readonly");
				$("#date").removeAttr("readonly");
			});			

			
			//para venta
			$("#btnSolicitar1").click(function(){
				$("#time").removeAttr("readonly");
				$("#date").removeAttr("readonly");
			});			

		$("#solicitar_visita").click(function(){
				$("#fecha_desde").removeAttr("readonly");
			});
			
		$("#p_solicitar_visita").click(function(){
				
				//cargaDatosUser();
				$("#p_fecha_desde").removeAttr("readonly");
			});
			
			
			
			$("#btnContinuar").click(function(){
				//reset poner
				//$("#citaForm")[0].reset();
				limpiarFormulario();
				cargaDatosUser();

				if($("#date").val()!='' && $("#time").val()!=''){
			var user = JSON.parse(localStorage.getItem("user"));
            console.log(user);
			console.log("cargaDatosUser");					
					if (user == null) {
						$("#nombre_completo").prop('required',true);
						$("#apellidos_completo").prop('required',true);
						$("#email_contacto").prop('required',true);
						$("#movil_contacto").prop('required',true);
						$("#acepta_condiciones").prop('required',true);					
					}					
					$("#step1").hide();
					$("#step2").show();	
					$("#step3").hide();
					$("#estudiando0").hide();
                    $("#estudiando01").hide();
                    $("#estudiando02").hide();
					//$("#estudiando1").hide();
					//$("#estudiando2").hide();
					$("#trabajando1").hide();
					$("#trabajando2").hide();
					$("#numero_personas").prop('required',true);
					$("#tipo_personas").prop('required',true);
					$("#estudias_o_trabajas").prop('required',true);
					$("#mascotas").prop('required',true);
					$("#fecha_desde").prop('required',true);
					$("#duracion_alquiler").prop('required',true);
					if($('select[name=estudias_o_trabajas]').val() == 'Trabajando' || $('select[name=estudias_o_trabajas]').val() == 'Jubilados'){
						$("#trabajando1").show();
                        if($('select[name=estudias_o_trabajas]').val() == 'Jubilados'){
                            $("#trabajando1").hide();
                        }
						$("#trabajando2").show();
						$("#estudiando0").hide();
                        $("#estudiando01").hide();
                        $("#estudiando02").hide();

						$("#trabajo").prop('required',true);
						$("#tipo_trabajo").prop('required',true);
                        if($('select[name=estudias_o_trabajas]').val() == 'Jubilados'){
                            $("#trabajo").prop('required',false);
                            $("#tipo_trabajo").prop('required',false);
                        }                        
						$("#tipo_contrato").prop('required',true);
						$("#sueldo_aproximado").prop('required',true);	
						
						$("#trabajo_normal").show();
						$("#trabajo_estudiar").hide();
						$("#trabajo_estudiar_trabajar").hide();					

						$("#tipo_trabajo_normal").show();
						$("#tipo_trabajo_estudiar").hide();
						$("#tipo_trabajo_estudiar_trabajar").hide();	

						$("#tipo_contrato_normal").show();
						$("#tipo_contrato_estudiar").hide();
						$("#tipo_contrato_estudiar_trabajar").hide();

						$("#sueldo_aproximado_normal").show();
						$("#sueldo_aproximado_estudiar").hide();
						$("#sueldo_aproximado_estudiar_trabajar").hide();					
					}
					if($('select[name=estudias_o_trabajas]').val() == 'Estudiando' || $('select[name=estudias_o_trabajas]').val() =='Sin trabajar'){
						$("#trabajando1").show();
						$("#trabajando2").show();
                            $("#estudiando0").hide();
                            if($('select[name=estudias_o_trabajas]').val() == 'Estudiando'){
                                $("#estudiando01").show();
                                $("#estudiando02").hide();
                            }
                            if($('select[name=estudias_o_trabajas]').val() == 'Sin trabajar'){
                                $("#estudiando02").show();
                                $("#estudiando01").hide();
                            }   

						$("#trabajo").prop('required',true);
						$("#tipo_trabajo").prop('required',true);
						$("#tipo_contrato").prop('required',true);
						$("#sueldo_aproximado").prop('required',true);
						

						
						$("#trabajo_normal").hide();
						$("#trabajo_estudiar").show();
						$("#trabajo_estudiar_trabajar").hide();					

						$("#tipo_trabajo_normal").hide();
						$("#tipo_trabajo_estudiar").show();
						$("#tipo_trabajo_estudiar_trabajar").hide();	

						$("#tipo_contrato_normal").hide();
						$("#tipo_contrato_estudiar").show();
						$("#tipo_contrato_estudiar_trabajar").hide();

						$("#sueldo_aproximado_normal").hide();
						$("#sueldo_aproximado_estudiar").show();
						$("#sueldo_aproximado_estudiar_trabajar").hide();					
					
					}

					if($('select[name=estudias_o_trabajas]').val() == 'Estudiando y trabajando'){
						$("#trabajando1").show();
						$("#trabajando2").show();
						$("#estudiando0").show();
                            $("#estudiando01").hide();
                            $("#estudiando02").hide();                        

						$("#trabajo").prop('required',true);
						$("#tipo_trabajo").prop('required',true);
						$("#tipo_contrato").prop('required',true);
						$("#sueldo_aproximado").prop('required',true);	

						$("#trabajo_normal").hide();
						$("#trabajo_estudiar").hide();
						$("#trabajo_estudiar_trabajar").show();					

						$("#tipo_trabajo_normal").hide();
						$("#tipo_trabajo_estudiar").hide();
						$("#tipo_trabajo_estudiar_trabajar").show();	

						$("#tipo_contrato_normal").hide();
						$("#tipo_contrato_estudiar").hide();
						$("#tipo_contrato_estudiar_trabajar").show();

						$("#sueldo_aproximado_normal").hide();
						$("#sueldo_aproximado_estudiar").hide();
						$("#sueldo_aproximado_estudiar_trabajar").show();					
					}
					if($('select[name=estudias_o_trabajas]').val() == ''){
						$("#trabajando1").hide();
						$("#trabajando2").hide();
						$("#estudiando0").hide();
                        $("#estudiando01").hide();
                        $("#estudiando02").hide();

						$("#trabajo").prop('required',false);
						$("#tipo_trabajo").prop('required',false);
						$("#tipo_contrato").prop('required',false);
						$("#sueldo_aproximado").prop('required',false);	
						
						$("#trabajo_normal").hide();
						$("#trabajo_estudiar").hide();
						$("#trabajo_estudiar_trabajar").hide();					

						$("#tipo_trabajo_normal").hide();
						$("#tipo_trabajo_estudiar").hide();
						$("#tipo_trabajo_estudiar_trabajar").hide();	

						$("#tipo_contrato_normal").hide();
						$("#tipo_contrato_estudiar").hide();
						$("#tipo_contrato_estudiar_trabajar").hide();

						$("#sueldo_aproximado_normal").hide();
						$("#sueldo_aproximado_estudiar").hide();
						$("#sueldo_aproximado_estudiar_trabajar").hide();							
						
					}					
				}
				else
				{
					
				}
			});	

			$("select[name=estudias_o_trabajas]").change(function(){
				//alert($('select[name=estudias_o_trabajas]').val());
				if($('select[name=estudias_o_trabajas]').val() == 'Trabajando' || $('select[name=estudias_o_trabajas]').val() == 'Jubilados'){
					$("#trabajando1").show();
                    if($('select[name=estudias_o_trabajas]').val() == 'Jubilados'){
                        $("#trabajando1").hide();
                    }
					$("#trabajando2").show();
					$("#estudiando0").hide();
                    $("#estudiando01").hide();
                    $("#estudiando02").hide();

					$("#trabajo").prop('required',true);
					$("#tipo_trabajo").prop('required',true);
                    if($('select[name=estudias_o_trabajas]').val() == 'Jubilados'){
                        $("#trabajo").prop('required',false);
                        $("#tipo_trabajo").prop('required',false);
                    }                    
					$("#tipo_contrato").prop('required',true);
					$("#sueldo_aproximado").prop('required',true);	
					
					$("#trabajo_normal").show();
					$("#trabajo_estudiar").hide();
					$("#trabajo_estudiar_trabajar").hide();					

					$("#tipo_trabajo_normal").show();
					$("#tipo_trabajo_estudiar").hide();
					$("#tipo_trabajo_estudiar_trabajar").hide();	

					$("#tipo_contrato_normal").show();
					$("#tipo_contrato_estudiar").hide();
					$("#tipo_contrato_estudiar_trabajar").hide();

					$("#sueldo_aproximado_normal").show();
					$("#sueldo_aproximado_estudiar").hide();
					$("#sueldo_aproximado_estudiar_trabajar").hide();					
				}
				if($('select[name=estudias_o_trabajas]').val() == 'Estudiando' || $('select[name=estudias_o_trabajas]').val() =='Sin trabajar'){
					$("#trabajando1").show();
					$("#trabajando2").show();
                            $("#estudiando0").hide();
                            if($('select[name=estudias_o_trabajas]').val() == 'Estudiando'){
                                $("#estudiando01").show();
                                $("#estudiando02").hide();
                            }
                            if($('select[name=estudias_o_trabajas]').val() == 'Sin trabajar'){
                                $("#estudiando02").show();
                                $("#estudiando01").hide();
                            }

					$("#trabajo").prop('required',true);
					$("#tipo_trabajo").prop('required',true);
					$("#tipo_contrato").prop('required',true);
					$("#sueldo_aproximado").prop('required',true);
					

					
					$("#trabajo_normal").hide();
					$("#trabajo_estudiar").show();
					$("#trabajo_estudiar_trabajar").hide();					

					$("#tipo_trabajo_normal").hide();
					$("#tipo_trabajo_estudiar").show();
					$("#tipo_trabajo_estudiar_trabajar").hide();	

					$("#tipo_contrato_normal").hide();
					$("#tipo_contrato_estudiar").show();
					$("#tipo_contrato_estudiar_trabajar").hide();

					$("#sueldo_aproximado_normal").hide();
					$("#sueldo_aproximado_estudiar").show();
					$("#sueldo_aproximado_estudiar_trabajar").hide();					
					
				}

				if($('select[name=estudias_o_trabajas]').val() == 'Estudiando y trabajando'){
					$("#trabajando1").show();
					$("#trabajando2").show();
					$("#estudiando0").show();
                            $("#estudiando01").hide();
                            $("#estudiando02").hide();                    

					$("#trabajo").prop('required',true);
					$("#tipo_trabajo").prop('required',true);
					$("#tipo_contrato").prop('required',true);
					$("#sueldo_aproximado").prop('required',true);	

					$("#trabajo_normal").hide();
					$("#trabajo_estudiar").hide();
					$("#trabajo_estudiar_trabajar").show();					

					$("#tipo_trabajo_normal").hide();
					$("#tipo_trabajo_estudiar").hide();
					$("#tipo_trabajo_estudiar_trabajar").show();	

					$("#tipo_contrato_normal").hide();
					$("#tipo_contrato_estudiar").hide();
					$("#tipo_contrato_estudiar_trabajar").show();

					$("#sueldo_aproximado_normal").hide();
					$("#sueldo_aproximado_estudiar").hide();
					$("#sueldo_aproximado_estudiar_trabajar").show();					
				}
				if($('select[name=estudias_o_trabajas]').val() == ''){
					$("#trabajando1").hide();
					$("#trabajando2").hide();
					$("#estudiando0").hide();
                            $("#estudiando01").hide();
                            $("#estudiando02").hide();                                   

					$("#trabajo").prop('required',false);
					$("#tipo_trabajo").prop('required',false);
					$("#tipo_contrato").prop('required',false);
					$("#sueldo_aproximado").prop('required',false);	
					
					$("#trabajo_normal").hide();
					$("#trabajo_estudiar").hide();
					$("#trabajo_estudiar_trabajar").hide();					

					$("#tipo_trabajo_normal").hide();
					$("#tipo_trabajo_estudiar").hide();
					$("#tipo_trabajo_estudiar_trabajar").hide();	

					$("#tipo_contrato_normal").hide();
					$("#tipo_contrato_estudiar").hide();
					$("#tipo_contrato_estudiar_trabajar").hide();

					$("#sueldo_aproximado_normal").hide();
					$("#sueldo_aproximado_estudiar").hide();
					$("#sueldo_aproximado_estudiar_trabajar").hide();							
					
				}			

			});
			
			$("#btn_Continuar2").click(function(){

					$("#step1").hide();
					$("#step2").hide();	
					$("#step3").show();	
					$("#step4").hide();

			});				


			$("#salevisita").click(function(){
				$('html, body').animate({scrollTop:0}, 'slow'); 
				});


				$("#pedido_reservar_logado").click(function(){
				//$('html, body').animate({scrollTop:0}, 'slow'); 
				$("#citaForm")[0].reset();
				$("#citaFormPedido")[0].reset();
				cargaDatosUser();
				});

				$("#pedido_reservar").click(function(){
				$('html, body').animate({scrollTop:0}, 'slow'); 
				$("#citaForm")[0].reset();
				$("#citaFormPedido")[0].reset();
				cargaDatosUser();
				});

			$("#btnAtras").click(function(){
				//alert('hola');
				$("#step2").hide();
				$("#step3").hide();
				$("#step1").show();
				$("#numero_personas").prop('required',false);
				$("#tipo_personas").prop('required',false);
				$("#estudias_o_trabajas").prop('required',false);
				$("#mascotas").prop('required',false);
				$("#fecha_desde").prop('required',false);
				$("#duracion_alquiler").prop('required',false);	

				$("#trabajo").prop('required',false);
				$("#tipo_trabajo").prop('required',false);
				$("#tipo_contrato").prop('required',false);
				$("#sueldo_aproximado").prop('required',false);	
			var user = JSON.parse(localStorage.getItem("user"));
            console.log(user);
			console.log("cargaDatosUser");				
				if (user == null) {
					$("#nombre_completo").prop('required',false);
					$("#apellidos_completo").prop('required',false);
					$("#email_contacto").prop('required',false);
					$("#movil_contacto").prop('required',false);
					$("#acepta_condiciones").prop('required',false);					
				}				
			});

			$("#btnAtras2").click(function(){
				$("#step2").show();
				$("#step1").hide();
				$("#step3").hide();
				$("#step4").hide();
			});
		
			
			//modal pedidos
            $("#p_estudiando0").hide();
            $("#p_estudiando01").hide();
            $("#p_estudiando02").hide();
            $("#p_trabajando1").hide();
            $("#p_trabajando2").hide();
            $("#p_numero_personas").prop('required',true);
            $("#p_tipo_personas").prop('required',true);
            $("#p_estudias_o_trabajas").prop('required',true);
            $("#p_mascotas").prop('required',true);
            $("#p_fecha_desde").prop('required',true);
            $("#p_duracion_alquiler").prop('required',true);
			$("#p_sueldo_aproximado").prop('required',true);
            $("#p_tipo_contrato").prop('required',true);
            $("#p_tipo_trabajo").prop('required',true);
            $("#p_trabajo").prop('required',true);	
			var user = JSON.parse(localStorage.getItem("user"));
            console.log(user);
			console.log("cargaDatosUser");			
				if (user == null) {
					$("#p_nombre_completo").prop('required',true);
					$("#p_apellidos_completo").prop('required',true);
					$("#p_email_contacto").prop('required',true);
					$("#p_movil_contacto").prop('required',true);
					$("#p_acepta_condiciones").prop('required',true);					
				}			
			
            $("#p_estudias_o_trabajas").change(function(){
            if($('select[name=p_estudias_o_trabajas]').val() == 'Trabajando' || $('select[name=p_estudias_o_trabajas]').val() == 'Jubilados'){
                    $("#p_trabajando1").show();
                    if($('select[name=p_estudias_o_trabajas]').val() == 'Jubilados'){
                        $("#p_trabajando1").hide();
                    }
                    $("#p_trabajando2").show();
                    $("#p_estudiando0").hide();
            $("#p_estudiando01").hide();
            $("#p_estudiando02").hide();                    
                    $("#p_trabajo").prop('required',true);
                    $("#p_tipo_trabajo").prop('required',true);
                    if($('select[name=p_estudias_o_trabajas]').val() == 'Jubilados'){
                        $("#p_trabajo").prop('required',false);
                        $("#p_tipo_trabajo").prop('required',false);
                    }                    
                    $("#p_tipo_contrato").prop('required',true);
                    $("#p_sueldo_aproximado").prop('required',true);  
                    
                    $("#p_trabajo_normal").show();
                    $("#p_trabajo_estudiar").hide();
                    $("#p_trabajo_estudiar_trabajar").hide();                 
    
                    $("#p_tipo_trabajo_normal").show();
                    $("#p_tipo_trabajo_estudiar").hide();
                    $("#p_tipo_trabajo_estudiar_trabajar").hide();    
    
                    $("#p_tipo_contrato_normal").show();
                    $("#p_tipo_contrato_estudiar").hide();
                    $("#p_tipo_contrato_estudiar_trabajar").hide();
    
                    $("#p_sueldo_aproximado_normal").show();
                    $("#p_sueldo_aproximado_estudiar").hide();
                    $("#p_sueldo_aproximado_estudiar_trabajar").hide();                   
                }
                if($('select[name=p_estudias_o_trabajas]').val() == 'Estudiando' || $('select[name=p_estudias_o_trabajas]').val() =='Sin trabajar'){
                    $("#p_trabajando1").show();
                    $("#p_trabajando2").show();
                            $("#p_estudiando0").hide();
                            if($('select[name=p_estudias_o_trabajas]').val() == 'Estudiando'){
                                $("#p_estudiando01").show();
                                $("#p_estudiando02").hide();
                            }
                            if($('select[name=p_estudias_o_trabajas]').val() == 'Sin trabajar'){
                                $("#p_estudiando02").show();
                                $("#p_estudiando01").hide();
                            }               
                    
                    $("#p_trabajo").prop('required',true);
                    $("#p_tipo_trabajo").prop('required',true);
                    $("#p_tipo_contrato").prop('required',true);
                    $("#p_sueldo_aproximado").prop('required',true);
                    
                    
                    $("#p_trabajo_normal").hide();
                    $("#p_trabajo_estudiar").show();
                    $("#p_trabajo_estudiar_trabajar").hide();                 
    
                    $("#p_tipo_trabajo_normal").hide();
                    $("#p_tipo_trabajo_estudiar").show();
                    $("#p_tipo_trabajo_estudiar_trabajar").hide();    
    
                    $("#p_tipo_contrato_normal").hide();
                    $("#p_tipo_contrato_estudiar").show();
                    $("#p_tipo_contrato_estudiar_trabajar").hide();
    
                    $("#p_sueldo_aproximado_normal").hide();
                    $("#p_sueldo_aproximado_estudiar").show();
                    $("#p_sueldo_aproximado_estudiar_trabajar").hide();                   
                                   
                }
    
                if($('select[name=p_estudias_o_trabajas]').val() == 'Estudiando y trabajando'){
                    $("#p_trabajando1").show();
                    $("#p_trabajando2").show();
                            $("#p_estudiando0").show();
                            $("#p_estudiando01").hide();
                            $("#p_estudiando02").hide();
                    $("#p_trabajo").prop('required',true);
                    $("#p_tipo_trabajo").prop('required',true);
                    $("#p_tipo_contrato").prop('required',true);
                    $("#p_sueldo_aproximado").prop('required',true);  
                    $("#p_trabajo_normal").hide();
                    $("#p_trabajo_estudiar").hide();
                    $("#p_trabajo_estudiar_trabajar").show();                 
    
                    $("#p_tipo_trabajo_normal").hide();
                    $("#p_tipo_trabajo_estudiar").hide();
                    $("#p_tipo_trabajo_estudiar_trabajar").show();    
    
                    $("#p_tipo_contrato_normal").hide();
                    $("#p_tipo_contrato_estudiar").hide();
                    $("#p_tipo_contrato_estudiar_trabajar").show();
    
                    $("#p_sueldo_aproximado_normal").hide();
                    $("#p_sueldo_aproximado_estudiar").hide();
                    $("#p_sueldo_aproximado_estudiar_trabajar").show();                   
                }
                if($('select[name=p_estudias_o_trabajas]').val() == ''){
                    $("#p_trabajando1").hide();
                    $("#p_trabajando2").hide();
                    $("#p_estudiando0").hide();
                            $("#p_estudiando01").hide();
                            $("#p_estudiando02").hide();                    
                    $("#p_trabajo").prop('required',false);
                    $("#p_tipo_trabajo").prop('required',false);
                    $("#p_tipo_contrato").prop('required',false);
                    $("#p_sueldo_aproximado").prop('required',false); 
                    
                    $("#p_trabajo_normal").hide();
                    $("#p_trabajo_estudiar").hide();
                    $("#p_trabajo_estudiar_trabajar").hide();                 
    
                    $("#p_tipo_trabajo_normal").hide();
                    $("#p_tipo_trabajo_estudiar").hide();
                    $("#p_tipo_trabajo_estudiar_trabajar").hide();    
    
                    $("#p_tipo_contrato_normal").hide();
                    $("#p_tipo_contrato_estudiar").hide();
                    $("#p_tipo_contrato_estudiar_trabajar").hide();
    
                    $("#p_sueldo_aproximado_normal").hide();
                    $("#p_sueldo_aproximado_estudiar").hide();
                    $("#p_sueldo_aproximado_estudiar_trabajar").hide();                           
                    
                }
            });


            $("#btnContinuarSale").click(function(){
			if($("#date").val()!='' && $("#time").val()!=''){
                $("#step4").show();
                $("#step1").hide();
				$("#step2").hide();
				$("#step3").hide();
				$("#live_spain").prop('required',true);
                $("#inversor").prop('required',true);
                $("#credito").prop('required',true);
			var user = JSON.parse(localStorage.getItem("user"));
            console.log(user);
			console.log("cargaDatosUser");				
					if (user == null) {
						$("#nombre_completo_venta").prop('required',true);
						$("#apellidos_completo_venta").prop('required',true);
						$("#email_contacto_venta").prop('required',true);
						$("#confirmacion_email_contacto_venta").prop('required',true);
						$("#movil_contacto_venta").prop('required',true);
						$("#confirmacion_movil_contacto_venta").prop('required',true);
						$("#acepta_condiciones_venta").prop('required',true);					
					}				
				}
                
            });
            
            $("#btnAtrasSale").click(function(){
                $("#step1").show();
				$("#step2").hide();
				$("#step1").show();
				$("#step3").hide();
				$("#step4").hide();
				$("#live_spain").prop('required',false);
                $("#inversor").prop('required',false);
                $("#credito").prop('required',false);
			var user = JSON.parse(localStorage.getItem("user"));
            console.log(user);
			console.log("cargaDatosUser");				
					if (user == null) {
						$("#nombre_completo_venta").prop('required',false);
						$("#apellidos_completo_venta").prop('required',false);
						$("#email_contacto_venta").prop('required',false);
						$("#confirmacion_email_contacto_venta").prop('required',false);
						$("#movil_contacto_venta").prop('required',false);
						$("#confirmacion_movil_contacto_venta").prop('required',false);
						$("#acepta_condiciones_venta").prop('required',false);					
					}				
				
			});
            
// Cargar el mapa cuando la API esté lista
google.maps.importLibrary("maps").then(() => {
    setTimeout(function () { 
        initMap();
    }, 2000);
});
				//poner resert
				$("#citaForm")[0].reset();
				$("#citaFormPedido")[0].reset();
				cargaDatosUser();
			 
            //$("#phone").val(user.phone);
	}); // end event dom

	function limpiarFormulario(){
					$("#numero_personas").val("");
				//}
				$("#tipo_personas").val("");
				$("#estudias_o_trabajas").val("");
				$("#mascotas").val("");
				$("#trabajo").val("");
				$("#tipo_trabajo").val("");
				$("#tipo_contrato").val("");
				$("#sueldo_aproximado").val("");	
					$("#fecha_desde").val("");	
								$("#duracion_alquiler").val("");
				$("#comentario_persona").val("");
			var user = JSON.parse(localStorage.getItem("user"));
            console.log(user);
			console.log("cargaDatosUser");				
				if (user == null) {
					$("#nombre_completo").val("");	
					$("#apellidos_completo").val("");
					$("#email_contacto").val("");	
					$("#movil_contacto").val("");
					$("#acepta_condiciones").val("");					
				}
		
	}
	function cargaDatosUser(){
			var user = JSON.parse(localStorage.getItem("user"));
            console.log(user);
			console.log("cargaDatosUser");
			 if (user !== null) {		
				//if (user.numpersonas_alquiler !== null){
					$("#numero_personas").val(user.numpersonas_alquiler);
				//}
				$("#tipo_personas").val(user.familia_alquiler);
				$("#estudias_o_trabajas").val(user.estudias_o_trabajas);
				$("#mascotas").val(user.mascotas);
				$("#trabajo").val(user.dondetrabajas_alquiler);
				$("#tipo_trabajo").val(user.trabajo_alquiler);
				$("#tipo_contrato").val(user.tipocontrato_alquiler);
				$("#sueldo_aproximado").val(user.sueldoaproximado_alquiler);
				var today = new Date();
				var dd = today.getDate();

				var mm = today.getMonth()+1; 
				var yyyy = today.getFullYear();
				if(dd<10) 
				{
					dd='0'+dd;
				} 

				if(mm<10) 
				{
					mm='0'+mm;
				} 			
				today = dd+'/'+mm+'/'+yyyy;
				var fechaFormulario = user.fecha_desde_alquiler;
				// Comparamos solo las fechas => no las horas!!
				//hoy.setHours(0,0,0,0);
				//fechaFormulario.setHours(0,0,0,0); // Lo iniciamos a 00:00 horas

				if (today <= fechaFormulario) {
					//alert('mayor');
					$("#fecha_desde").val(user.fecha_desde_alquiler);
				}
				else{
					//alert('menor');
					$("#fecha_desde").val('');
				}			
				$("#duracion_alquiler").val(user.duracion_alquiler);
				$("#comentario_persona").val(user.sobreti_alquiler);			
				
				$("#p_numero_personas").val(user.numpersonas_alquiler);
				$("#p_tipo_personas").val(user.familia_alquiler);			
				$("#p_estudias_o_trabajas").val(user.estudias_o_trabajas);
				$("#p_mascotas").val(user.mascotas);
				$("#p_trabajo").val(user.dondetrabajas_alquiler);
				$("#p_tipo_trabajo").val(user.trabajo_alquiler);
				$("#p_tipo_contrato").val(user.tipocontrato_alquiler);
				$("#p_sueldo_aproximado").val(user.sueldoaproximado_alquiler);
				//$("#p_fecha_desde").val(user.fecha_desde_alquiler);
				var p_today = new Date();
				var p_dd = p_today.getDate();

				var p_mm = p_today.getMonth()+1; 
				var p_yyyy = p_today.getFullYear();
				if(p_dd<10) 
				{
					p_dd='0'+p_dd;
				} 

				if(p_mm<10) 
				{
					p_mm='0'+p_mm;
				} 			
				p_today = p_dd+'/'+p_mm+'/'+p_yyyy;
				var p_fechaFormulario = user.fecha_desde_alquiler;
				// Comparamos solo las fechas => no las horas!!

				if (p_today <= p_fechaFormulario) {

					$("#p_fecha_desde").val(user.fecha_desde_alquiler);
				}
				else{

					$("#p_fecha_desde").val('');
				}
				$("#p_duracion_alquiler").val(user.duracion_alquiler);
				$("#p_comentario_persona").val(user.sobreti_alquiler);
				$("#p_contraoferta").val(user.contraoferta_alquiler);
				if($('select[name=p_estudias_o_trabajas]').val() == 'Trabajando' || $('select[name=p_estudias_o_trabajas]').val() == 'Jubilados'){
						$("#p_trabajando1").show();
                        if($('select[name=p_estudias_o_trabajas]').val() == 'Jubilados'){
                            $("#p_trabajando1").hide();
                        }
						$("#p_trabajando2").show();
						$("#p_estudiando0").hide();
                            $("#p_estudiando01").hide();
                            $("#p_estudiando02").hide();                        
						
                        $("#p_trabajo").prop('required',true);
						$("#p_tipo_trabajo").prop('required',true);
                        if($('select[name=p_estudias_o_trabajas]').val() == 'Jubilados'){
                            $("#p_trabajo").prop('required',false);
                            $("#p_tipo_trabajo").prop('required',false);
                        }                        
						$("#p_tipo_contrato").prop('required',true);
						$("#p_sueldo_aproximado").prop('required',true);  
						
						$("#p_trabajo_normal").show();
						$("#p_trabajo_estudiar").hide();
						$("#p_trabajo_estudiar_trabajar").hide();                 
		
						$("#p_tipo_trabajo_normal").show();
						$("#p_tipo_trabajo_estudiar").hide();
						$("#p_tipo_trabajo_estudiar_trabajar").hide();    
		
						$("#p_tipo_contrato_normal").show();
						$("#p_tipo_contrato_estudiar").hide();
						$("#p_tipo_contrato_estudiar_trabajar").hide();
		
						$("#p_sueldo_aproximado_normal").show();
						$("#p_sueldo_aproximado_estudiar").hide();
						$("#p_sueldo_aproximado_estudiar_trabajar").hide();                   
					}
					if($('select[name=p_estudias_o_trabajas]').val() == 'Estudiando' || $('select[name=p_estudias_o_trabajas]').val() =='Sin trabajar'){
						$("#p_trabajando1").show();
						$("#p_trabajando2").show();
                            $("#p_estudiando0").hide();
                            if($('select[name=p_estudias_o_trabajas]').val() == 'Estudiando'){
                                $("#p_estudiando01").show();
                                $("#p_estudiando02").hide();
                            }
                            if($('select[name=p_estudias_o_trabajas]').val() == 'Sin trabajar'){
                                $("#p_estudiando02").show();
                                $("#p_estudiando01").hide();
                            }                           
						
						$("#p_trabajo").prop('required',true);
						$("#p_tipo_trabajo").prop('required',true);
						$("#p_tipo_contrato").prop('required',true);
						$("#p_sueldo_aproximado").prop('required',true);
						
						
						$("#p_trabajo_normal").hide();
						$("#p_trabajo_estudiar").show();
						$("#p_trabajo_estudiar_trabajar").hide();                 
		
						$("#p_tipo_trabajo_normal").hide();
						$("#p_tipo_trabajo_estudiar").show();
						$("#p_tipo_trabajo_estudiar_trabajar").hide();    
		
						$("#p_tipo_contrato_normal").hide();
						$("#p_tipo_contrato_estudiar").show();
						$("#p_tipo_contrato_estudiar_trabajar").hide();
		
						$("#p_sueldo_aproximado_normal").hide();
						$("#p_sueldo_aproximado_estudiar").show();
						$("#p_sueldo_aproximado_estudiar_trabajar").hide();                   
									   
					}
		
					if($('select[name=p_estudias_o_trabajas]').val() == 'Estudiando y trabajando'){
						$("#p_trabajando1").show();
						$("#p_trabajando2").show();
						$("#p_estudiando0").show();
                        $("#p_estudiando01").hide();
                        $("#p_estudiando02").hide();
						$("#p_trabajo").prop('required',true);
						$("#p_tipo_trabajo").prop('required',true);
						$("#p_tipo_contrato").prop('required',true);
						$("#p_sueldo_aproximado").prop('required',true);  
						$("#p_trabajo_normal").hide();
						$("#p_trabajo_estudiar").hide();
						$("#p_trabajo_estudiar_trabajar").show();                 
		
						$("#p_tipo_trabajo_normal").hide();
						$("#p_tipo_trabajo_estudiar").hide();
						$("#p_tipo_trabajo_estudiar_trabajar").show();    
		
						$("#p_tipo_contrato_normal").hide();
						$("#p_tipo_contrato_estudiar").hide();
						$("#p_tipo_contrato_estudiar_trabajar").show();
		
						$("#p_sueldo_aproximado_normal").hide();
						$("#p_sueldo_aproximado_estudiar").hide();
						$("#p_sueldo_aproximado_estudiar_trabajar").show();                   
					}
					
					if($('select[name=p_estudias_o_trabajas]').val() == ''){
						$("#p_trabajando1").hide();
						$("#p_trabajando2").hide();
						$("#p_estudiando0").hide();
                        $("#p_estudiando01").hide();
                        $("#p_estudiando02").hide();                        
						
						$("#p_trabajo").prop('required',false);
						$("#p_tipo_trabajo").prop('required',false);
						$("#p_tipo_contrato").prop('required',false);
						$("#p_sueldo_aproximado").prop('required',false); 
						
						$("#p_trabajo_normal").hide();
						$("#p_trabajo_estudiar").hide();
						$("#p_trabajo_estudiar_trabajar").hide();                 
		
						$("#p_tipo_trabajo_normal").hide();
						$("#p_tipo_trabajo_estudiar").hide();
						$("#p_tipo_trabajo_estudiar_trabajar").hide();    
		
						$("#p_tipo_contrato_normal").hide();
						$("#p_tipo_contrato_estudiar").hide();
						$("#p_tipo_contrato_estudiar_trabajar").hide();
		
						$("#p_sueldo_aproximado_normal").hide();
						$("#p_sueldo_aproximado_estudiar").hide();
						$("#p_sueldo_aproximado_estudiar_trabajar").hide();                           
						
					}
			 }
	}
	
	function preventSpecials(evt){
            if (evt.keyCode == 222 || evt.keyCode == 190 ||  evt.keyCode == 49 || evt.keyCode == 55 || evt.keyCode == 190 ||  evt.keyCode == 188){
                evt.preventDefault()
                return
            }
    }

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
function checkContenidos()
{
	                                Swal.fire(
                                    'Aviso',
                                    'Usted ya tiene una visita programada para este inmueble',
                                    'info'
                                ); 

}

	</script>
<script type="text/javascript">
var idleTime = 0;
$(document).ready(function () {
    //Increment the idle time counter every minute.
    var idleInterval = setInterval(timerIncrement, 60000); // 1 minute

    //Zero the idle timer on mouse movement.
    $(this).mousemove(function (e) {
        idleTime = 0;
    });
    $(this).keypress(function (e) {
        idleTime = 0;
    });
});

function timerIncrement() {
    idleTime = idleTime + 1;
    if (idleTime > 8) { // 27 minutes
        window.location.reload();
    }
}

function validarEmails() {
    const email = document.getElementById('email_contacto_venta').value;
    const confirmarEmail = document.getElementById('confirmacion_email_contacto_venta').value;
    
    if (email !== confirmarEmail && confirmarEmail !== '') {
        // Usar setCustomValidity para mostrar el mensaje personalizado
        document.getElementById('confirmacion_email_contacto_venta').setCustomValidity('Los emails no coinciden');
        return false;
    }
    
    // Limpiar el mensaje si coinciden
    document.getElementById('confirmacion_email_contacto_venta').setCustomValidity('');
    return true;
}

// Validar en tiempo real
document.getElementById('confirmacion_email_contacto_venta').addEventListener('input', validarEmails);
document.getElementById('email_contacto_venta').addEventListener('input', validarEmails);

//Tema repetir móvil
function validarPhones() {
    const phone = document.getElementById('movil_contacto_venta').value;
    const confirmarPhone = document.getElementById('confirmacion_movil_contacto_venta').value;
    
    if (phone !== confirmarPhone && confirmarPhone !== '') {
        // Usar setCustomValidity para mostrar el mensaje personalizado
        document.getElementById('confirmacion_movil_contacto_venta').setCustomValidity('Los móviles no coinciden');
        return false;
    }
    
    // Limpiar el mensaje si coinciden
    document.getElementById('confirmacion_movil_contacto_venta').setCustomValidity('');
    return true;
}

// Validar en tiempo real
document.getElementById('confirmacion_movil_contacto_venta').addEventListener('input', validarPhones);
document.getElementById('movil_contacto_venta').addEventListener('input', validarPhones);
</script> 	
@endsection
