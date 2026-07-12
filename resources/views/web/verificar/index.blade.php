@extends('layouts.iamovingpro')
@section('title', 'IAMOVING - Fácil de alquilar, comprar y vender')
@section('description', '¡Fácil de alquilar, comprar y vender!')
@section('image', 'https://iamoving.com/img/iamoving.png')
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
				
															<h2 class="card-text text-center mb-5">COLABORADOR COMERCIAL </h2>											
										
										


			
			<div class="container my-0 mt-3">				
					
						<div class="container my-0 mt-1">											
							<div class="container" style="background-color:white;">
							</div>
						</div>
				@if (strpos(url()->current(),"propietario-alquiler")) 
				<form action="{{ url('comercial-colaborador?venta=0') }}" method="post" id="frm_colabora" onsubmit="loading()" enctype="multipart/form-data">
                @else
				<form action="{{ url('comercial-colaborador?venta=1') }}" method="post" id="frm_colabora" onsubmit="loading()" enctype="multipart/form-data">
				@endif
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <input placeholder="Nombre y apellidos" type="text" id="name" name="name" maxlength="100" class="form-control" required>
                    </div>
                        <div class="form-group">
                            <input placeholder="E-mail" type="email" id="email" name="email" maxlength="100" class="form-control" required>
                        </div>
                    <div class="form-group">
                        <input placeholder="Movil" type="text"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  id="phone" name="phone" maxlength="15" class="form-control" required>
                    </div>
                        <div class="form-group">
                            <input placeholder="Dirección" type="text" id="address" name="address" maxlength="120"  class="form-control" required>
                        </div>					
                        <div class="form-group">
                            <input placeholder="Número DNI/NIE" type="text" id="nif" name="nif" maxlength="20" class="form-control" required>
                        </div>	
                        <div class="form-group" style="text-align:left;">
                            <label>Foto Selfie</label>
                            <input type="file"class="form-control" id="avatar" name="avatar" accept="image/*" max-file-size="5" required/>
                        </div>
                        <div class="form-group" style="text-align:left;">
                            <label>DNI/NIE(envíanos fotos de ambas caras de tu documento)</label>
                            <input type="file"class="form-control" id="nif_img" name="nif_img[]" accept="image/*" max-file-size="5" max="2" multiple required/>
                        </div>
						

                    <div class="form-group">
                        <button class="btn btn-success btn-block" style="height:50px;" type="submit" id="btn_submit_colabora">
                            ENVIAR
                        </button>
                        
                    </div>						
                    <div class="form-group form-check text-center">
						<input type="checkbox" class="form-check-input" id="conditions" name="conditions"  required>
						<label class="form-check-label" for="conditions">He leído y estoy de acuerdo con <a href="/terminos-comercial" target="_blank">los términos y condiciones</a> y <a href="/politica-privacidad" target="_blank">la política de privacidad </a>de IAMOVING</label>
                    </div>							
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
        $("#btn_submit_colabora").text('Enviando...');
        $("#btn_submit_colabora").prop('disabled', true);
    }
    
    </script>
@endsection
@section('styles')
    <link rel="stylesheet" href="photon/fonts/icomoon/style.css">
    <link rel="stylesheet" href="photon/css/owl.carousel.min.css">
    <link rel="stylesheet" href="photon/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="photon/css/swiper.css">
   <link rel="stylesheet" href="photon/css/style.css">
<style>

.testimonial{
    background: #fff;
    text-align: center;
    /*padding: 30px 30px 50px;*/
    margin: 0 15px 8px;
    position: relative;
    margin-top: 15px;
}
/*
.testimonial:before,
.testimonial:after{
    content: "";
    border-top: 40px solid #fff;
    border-right: 125px solid transparent;
    position: absolute;
    bottom: -40px;
    left: 0;
}*/
.testimonial:after{
    border-right: none;
    border-left: 125px solid transparent;
    left: auto;
    right: 0;
}
.testimonial .icon{
    display: inline-block;
    font-size: 20px;
    color: #bd986b;
    margin-bottom: 10px;
	margin-top: 10px;
    opacity: 0.6;
}
.testimonial .description{
    font-size: 14px;
    color: #777;
    text-align: justify;
    margin-bottom: 10px;
    opacity: 0.9;
    letter-spacing: -1px;
}
.testimonial .testimonial-content{
    width: 100%;
    position: absolute;
    left: 0;
}
.testimonial .pic{
    display: inline-block;
    border: 6px solid white;
    border-radius: 50%;
    box-shadow: 0 0 2px 2px #daad86;
    overflow: hidden;
    z-index: 1;
    position: relative;
}
.testimonial .pic img{
    width: 100%;
    height: auto;
}
.testimonial .title{
    font-size: 16px;
    font-weight: bold;
    color: #333;
    text-transform: capitalize;
    margin: 0 0 5px 0;
}
.testimonial .post{
    display: block;
    font-size: 14px;
    color: #ffd9b8;
}

        .subtitle_feature_yellow{
            background-color: #EADD1B;
            color: #333;
            display: block;
            text-align: center;
            vertical-align: middle;
            border: 1px solid transparent;
            padding: 15px;
        }

        .subtitle_feature{
            background-color: #2d2e35;
            color: #EADD1B;
            display: block;
            text-align: center;
            vertical-align: middle;
            border: 1px solid transparent;
            padding: 15px;
        }

		/* Tablet and bigger */
		@media ( min-width: 768px ) {
			.grid-divider {
				position: relative;
				padding: 0;
			}
			.grid-divider>[class*='col-'] {
				position: static;
			}
			.grid-divider>[class*='col-']:nth-child(n+2):before {
				content: "";
				border-left: 3px solid #EADD1B;;
				position: absolute;
				top: 0;
				bottom: 0;
			}
			.col-padding {
				padding: 0 15px;
			}
		}
	
#circulo {
	border-radius: 50%;
	background: #EADD1B;
	display: flex;
	justify-content: center;
	align-items: center;
	text-align: center;
}
#circulo > p {
	font-family: sans-serif;
	color: #2d2e35;
	font-size: 1rem;
	
}	


.test {
  width: 530px;
  height: 320px;
  background-color: yellow;
}
</style>
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
		
#more {display: none;}		
#more1 {display: none;}
#more2 {display: none;}
#more3 {display: none;}
#more4 {display: none;}
#more5 {display: none;}

	</style>
    
@endsection
@section('scripts')
    <script src="{{ asset('js/jquery.form.min.js') }}" defer></script>
    <script src="{{ asset('js/sweetalert2.min.js') }}" defer></script>
  <script src="photon/js/jquery-3.3.1.min.js"></script>
  <script src="photon/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="photon/js/owl.carousel.min.js"></script>
  <script src="photon/js/jquery.stellar.min.js"></script>
  <script src="photon/js/jquery.countdown.min.js"></script>
  <script src="photon/js/jquery.magnific-popup.min.js"></script>
  <script src="photon/js/swiper.min.js"></script>
  <script src="photon/js/aos.js"></script>
  <script src="photon/js/main.js"></script>	
    <script>
       $(document).ready(function() { 
            $("#tipo_publicacion").val("alquiler");
            function processJson(data) { 
                $("#btnSend").prop("disabled",false);
                $("#btnSend").html('Enviar');
                if(data.success){
                    $("#modalAnuncia").modal('toggle');
                    Swal.fire(
                        'Gracias',
                        'Su información ha sido recibida!',
                        'success'
                    );
                    $('#publicarForm')[0].reset();
                }else{
                    Swal.fire(
                        'Lo sentimos',
                        'No hemos podido recibir su información. Intente nuevamente',
                        'error'
                    );
                }
            }

            function errorRequest(){
                $("#btnSend").prop("disabled",false);
                $("#btnSend").html('Enviar');
                Swal.fire(
                    'Lo sentimos',
                    'No hemos podido recibir su información. Intente nuevamente',
                    'error'
                );
            }
            
            $('#publicarForm').ajaxForm({ 
                dataType:  'json',         
                success:   processJson,
                beforeSubmit: function(arr, $form, options) {                  
                    $("#btnSend").prop("disabled",true);
                    $("#btnSend").html('Enviando su información');
                    
                },
                error: errorRequest
            });
            
			$("#btn_inicio").click(function(){
				$("#tipo_publicacion").val("propietario_alquiler_inicio");
			});
			
			$("#btn_inquilino").click(function(){
				$("#tipo_publicacion").val("propietario_alquiler_inquilino");				
			});
			$("#btn_plano").click(function(){
				$("#tipo_publicacion").val("propietario_alquiler_plano");
			});			
			//
			$("#btn_contrato").click(function(){
				$("#tipo_publicacion").val("propietario_alquiler_contrato");
			});	
 
			$("#btn_inventario").click(function(){
				$("#tipo_publicacion").val("propietario_alquiler_inventario");
			});
			 
			$("#btn_visitas").click(function(){
				$("#tipo_publicacion").val("propietario_alquiler_visitas");
			});	
			//
			$("#btn_solvencia").click(function(){
				$("#tipo_publicacion").val("propietario_alquiler_solvencia");
			});
			$("#btn_asegura").click(function(){
				$("#tipo_publicacion").val("propietario_alquiler_asegura");
			});
			$("#btn_administracion").click(function(){
				$("#tipo_publicacion").val("propietario_alquiler_administracion");
			});	
			$("#btn_iampremium").click(function(){
				$("#tipo_publicacion").val("propietario_alquiler_iampremium");
			});	
			$("#btn_alquilar").click(function(){
				$("#tipo_publicacion").val("propietario_alquiler_iamoving");
			});	
            
        });
		
	

        function preventSpecials(evt){
            evt.target.value = evt.target.value.replace("'","").replace('"',"").replace("?","").replace("¿","").replace(">","").replace("<","").replace("!","").replace("¡","").replace('&',"").replace('=',"");
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

function myFunction() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Ver más...";
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Ver menos...";
    moreText.style.display = "inline";
  }
}	

function myFunction1() {
  var dots = document.getElementById("dots1");
  var moreText = document.getElementById("more1");
  var btnText = document.getElementById("myBtn1");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Ver más...";
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Ver menos...";
    moreText.style.display = "inline";
  }
}


function myFunction2() {
  var dots = document.getElementById("dots2");
  var moreText = document.getElementById("more2");
  var moreText3 = document.getElementById("more3");
  var btnText = document.getElementById("myBtn2");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Ver más...";
    moreText.style.display = "none";
	moreText3.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Ver menos...";
    moreText.style.display = "inline";
	moreText3.style.display = "inline";
  }
}

function myFunction3() {
  var dots = document.getElementById("dots3");
  var moreText3 = document.getElementById("more4");
  var btnText = document.getElementById("myBtn3");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Ver más...";
	moreText3.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Ver menos...";
	moreText3.style.display = "inline";
  }
}

function myFunction4() {
  var dots = document.getElementById("dots4");
  var moreText3 = document.getElementById("more5");
  var btnText = document.getElementById("myBtn4");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Ver más...";
	moreText3.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Ver menos...";
	moreText3.style.display = "inline";
  }
}									
			
    </script>
@endsection