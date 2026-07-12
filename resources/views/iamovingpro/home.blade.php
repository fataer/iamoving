	@extends('layouts.iamhome')
@section('title', 'IAMOVING - Busca tu casa')
@section('description', '¡Busca tu casa!')
	@section('image', 'https://iamoving.com/img/iamoving.png')
	@section('banner')
		@include('navigation.lookfor')
	@endsection
	@section('content')

						<br>
		<div id="modalInformacion" class="modal fade" role="dialog">
	  <div class="modal-dialog modal-lg">
		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-header">
			<h4 id="modal-request-title" class="modal-title">IAMOVING</h4>
		  </div>
		  <div class="modal-body">
					{!! csrf_field() !!} 
						<div class="col-md-12">
							<div class="form-group">
							<!--<label><b>Ahorrando dinero</b></label>-->
								<ul>
									<li class="ml-5">
										Se trata de una startup para la difusión de las visitas virtuales y facilitación de los procesos de arrendamiento o compraventa de inmuebles. No actuamos como inmobiliarias ni intermediarios, sin beneficiarse de ninguna manera del negocio directo entre las partes ni cobrando ningún tipo de comisión a los propietarios, compradores o inquilinos.								</li>
								</ul>
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
		<section class="feature-section spad" style="padding-top: 10px;padding-bottom: 40px;">
			  <div class="container my-0 mt-0" style="padding-top:20px;padding-right: 0px;padding-left: 0px;">
				<div class="row mt-0 mb-3">
					<div class="col-md-3">
					</div>
					<div class="col-md-6">
					
						<div class="section-title text-center" style="margin-bottom:0px;">
							<h4 class="font-weight-bold subtitle_feature text-center" >¡NOS ACABAN DE ENTRAR!</h4>
						</div>												
					</div>
					<div class="col-md-3">
					</div>
				</div>
			<div>
			  <!--  <div class="section-title text-center" style="margin-bottom:0px;">
					<h3 class="font-weight-bold subtitle_feature_yellow text-center">¡ NOS ACABAN DE ENTRAR !</h3>
				</div>-->

				<div class="owl-carousel">
					@foreach ($showcase as $item)
						<div class="item">
							<div id="card_container" class="card-grid">
								@if($item->estado_inmueble == 'Disponible' || $item->estado_inmueble == 'Reservado' || $item->estado_inmueble == 'Alquilado' || $item->estado_inmueble == 'Vendido')
									<div id="box_{{$item->id}}" class="feature-item inmueble ">
										<a href="/anuncio/{{ $item->id }}"  target="_blank" style="text-decoration:none;">
											<div class="feature-pic set-bg" style="background-image: url(/storage/{{$item->path_image_primary}})">
												<div class="@if($item->is_sale == '1') sale-notic @else rent-notic @endif">@if($item->is_sale == '1') En Venta @else En Alquiler @endif</div>
												@if($item->video_primary)
													<div class="play-btn">
														<img width="70" height="70" src="/img/play_btn.png" onclick="showVideo({{$item->id}},'{{$item->video_primary}}',event)" title="Ver video" />
													</div>
												@endif
												<p id="text">
													@if($item->estado_inmueble == 'Vendido')
														<div class="rotar1">VENDIDO</div>
													@endif
													@if($item->estado_inmueble == 'Alquilado')
														<div class="rotar1">ALQUILADO</div>
													@endif
													@if($item->estado_inmueble == 'Reservado')
														<div class="rotar1">RESERVADO</div>
													@endif
													
												</p>
											</div>
										</a>
										
										<div class="feature-text border-0" style="cursor:hand;" onclick="window.open('/anuncio/{{$item->id }}', '_blank');">
											<div class="text-center feature-title">
												<h5><a href="/anuncio/{{$item->id }}" style="color:#EADD1B;" target="_blank">Referencia {{$item->id}}</a></h5>
												<p><i class="fa fa-map-marker"></i> @if (!empty($item->municipio) && $item->municipio !== null && $item->municipio !== 'Madrid')
        {{ $item->road }}, {{ $item->municipio }}
    @else
        {{ $item->road }}
    @endif</p>
												@if($item->id == 85)
													<p class="price">Precio a consultar</p>
												@elsif($item->tipo_inmueble == 'Habitaciones' && $item->bedrooms > 1)
													<p class="price">Desde € {{ number_format($item->propiedad_precio, 0, ',', '.') }}</p>
												@else
												  <p class="price">€ {{ number_format($item->propiedad_precio, 0, ',', '.') }}</p>
												@endif
												
										
							
											</div>
											<div class="room-info-warp">
												<div class="room-info">
													<div class="rf-left">
														
														@if($item->bedrooms && $item->tipo_inmueble !='Local/Oficina')
															<p><i class="fas fa-bed"></i> Dormitorios: {{$item->bedrooms}} </p>    
														@endif
														@if($item->bedrooms && $item->tipo_inmueble =='Local/Oficina')
															<p><i class="fas fa-bed"></i> Estancias: {{$item->bedrooms}} </p>										    
														@endif
														
														
														<p><i class="fa fa-th-large"></i> {{$item->square_meters}} m<sup>2</sup></p>
													</div>
													<div class="rf-right">
														@if($item->estudio == 1)
															<p><i class="fa fa-check-square"></i> Estudio</p>    
														@endif
														@if($item->apartamento == 1)
															<p><i class="fa fa-check-square"></i> Apartamento</p>    
														@endif
														@if($item->chalet == 1)
															<p><i class="fa fa-check-square"></i> Chalet</p>    
														@endif
														@if($item->loft == 1)
															<p><i class="fa fa-check-square"></i> Loft</p>
														@endif
														@if($item->piso == 1)
															<p><i class="fa fa-check-square"></i> Piso</p>
														@endif
														@if($item->bajo == 1)
															<p><i class="fa fa-check-square"></i> Bajo</p>
														@endif
														@if($item->atico == 1)
															<p><i class="fa fa-check-square"></i> Ático</p>
														@endif
														
														@if($item->bathrooms)
															<p><i class="fa fa-bath"></i> Baños: {{$item->bathrooms}}</p>    
														@endif
														@if($item->tipo_inmueble =='Local/Oficina' && !$item->bathrooms && $item->aseos)
															<p><i class="fa fa-bath"></i> Aseos: {{$item->aseos}}</p>
														@endif
														
													</div>
													
												</div>
												<p class="fa-2x text-right">
				
												</p>
											</div>
										</div>
										
									</div>
								@endif
							</div>
						</div>    
					@endforeach
				</div>
				
			   
				
			 
					<!--<div class="my-0 col-12">
						<div class="row  justify-content-center align-items-center">
							<a href="#" class="btn btn-warning">Ver más..</a>
						</div>
					</div>-->
					<div class="my-0 col-12">
						<div class="row  justify-content-center align-items-center">
							<a href="/inmuebles"  class="btn btn-warning">Ver más inmuebles ..</a>
						</div>
					</div>				
			<br>
			<br>		
				<br>

<!--TESTIMONIOS BEGIN-->
@include('partials.testimonios')
	<!--TESTIMONIOS FIN-->

					
			</div>
			
		</section>
		
		<div id="modalVideo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mInformeLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-image" role="application">
					<div class="modal-content animated fadeIn">
						<div class="modal-body text-center">
								<div class="row">
									<div class="col-12">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>     
									</div>
								</div>
								<div class="row">
									<div class="col-12">
										<h5 class="modal-title"><span id="modal_title_video"></span></h5>
										<div id="div_frame" class="text-center" style="height:400px">
											
										</div>
									</div>
								</div>
						</div>
					</div>
				</div>
		</div>
	@endsection

	@section('styles')
		<link rel="stylesheet" href="/css_theme/owl.carousel.css"/>
		<link rel="stylesheet" href="photon/fonts/icomoon/style.css">
		<link rel="stylesheet" href="photon/css/owl.carousel.min.css">
		<link rel="stylesheet" href="photon/css/owl.theme.default.min.css">
		<link rel="stylesheet" href="photon/css/swiper.css">
	   <link rel="stylesheet" href="photon/css/style.css">
		<style>

		
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
					padding: 0 1px;
				}
			}
			/*active para que sea yellow*/

			.nav>a.active{
			   background-color: #EADD1B;
			}
			
			a.nounderline:link
			{
			text-decoration:none;
			}

			btn.mejoradogris
			{
				font-weight:bold;color:#2D2D37;border-radius:0%; !important;;outline:none !important;outline-width: 0 !important; box-shadow: none;-moz-box-shadow: none;-webkit-box-shadow: none;
			}
			/*active */
			
			.subtitle_feature{
				background-color: #EADD1B;
				color: #333;
				display: block;
				text-align: center;
				vertical-align: middle;
				border: 1px solid transparent;
				padding: 15px;
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

			select option {
				margin: 40px;
				background: rgba(0, 0, 0, 0.3);
				color: #fff;
				text-shadow: 0 1px 0 rgba(0, 0, 0, 0.4);
			}

			.dropbtn {
				background-color: #C0C0C0;
				color: white;
				padding: 16px;
				font-size: 22px;
				border: none;
				cursor: pointer;
				width:100%;
			}

			.dropbtn:hover, .dropbtn:focus {
				background-color: #C0C0C0;
			}

			
			#inputBarrio {
				border-box: box-sizing;
				background-position: 14px 12px;
				background-repeat: no-repeat;
				font-size: 16px;
				padding: 14px 20px 12px 45px;
				border: none;
				border-bottom: 1px solid #ddd;
				width:100%;
			}

			
			#inputBarrio:focus {outline: 3px solid #ddd;}

			
			.dropdown {
				position: relative;
				display: inline-block;
			}

			
			.dropdown-content {
				display: none;
				position: absolute;
				background-color: #2D2E35;
				min-width: 230px;
				border: 1px solid #ddd;
				z-index: 1000;
				width:97.5%;
			}

			
			.dropdown-content a {
				color: white;
				padding: 12px 16px;
				text-decoration: none;
				display: block;
			}

			
			.dropdown-content a:hover {background-color: #2D2E35; color:#EADD1B;}

			.show {display:block;}

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
	.owl-prev {
		width: 15px;
		height: 100px;
		position: absolute;
		top: 40%;
		margin-left: -25px;
		display: block !important;
		border:0px solid black;
		font-size: 35;
		
	}

	.owl-next{
		width: 15px;
		height: 100px;
		position: absolute;
		top: 40%;
		right: -5px;
		display: block !important;
		border: 0px solid black;
		font-size: 35;
	}
	.feature-title h5 {
		font-weight: 400;
		margin-bottom: 5px;
	}

	.price{
		font-size: 1.125rem;
	}

	.feature-title a {
		color: #333;
	}

	.feature-item{
		border: 1px solid #333;
		background: transparent;
	}

	input[type=number]::-webkit-outer-spin-button,

	input[type=number]::-webkit-inner-spin-button {

		-webkit-appearance: none;

		margin: 0;

	}

	 

	input[type=number] {

		-moz-appearance:textfield;

	}

	.rotar1 
		{ 
		  -webkit-transform: rotate(-45deg); 
		  -moz-transform: rotate(-45deg); 
		  -ms-transform: rotate(-45deg); 
		  -o-transform: rotate(-45deg); 
		  transform: rotate(-45deg); 
		  
		  -webkit-transform-origin: 50% 50%; 
		  -moz-transform-origin: 50% 50%; 
		  -ms-transform-origin: 50% 50%; 
		  -o-transform-origin: 50% 50%; 
		  transform-origin: 50% 50%; 
		  
		 font-size: 65px; 
		  position: relative; 
		  top: 160px;
		  color:#EADD1B;
	}

	@media (max-width:480px){
		.rotar1 
		{ 
		  -webkit-transform: rotate(-45deg); 
		  -moz-transform: rotate(-45deg); 
		  -ms-transform: rotate(-45deg); 
		  -o-transform: rotate(-45deg); 
		  transform: rotate(-45deg); 
		  
		  -webkit-transform-origin: 50% 50%; 
		  -moz-transform-origin: 50% 50%; 
		  -ms-transform-origin: 50% 50%; 
		  -o-transform-origin: 50% 50%; 
		  transform-origin: 50% 50%; 
		  
		  font-size: 65px; 
		  position: relative; 
		  top: 130px; 
		  
		  color:#EADD1B;
		}
	}

	.play-btn{
		position: absolute;
		top: 20%;
		left: 40%;
		z-index:1000;
	}
	.play-btn:hover{
		cursor: pointer;
		text-decoration: none;
	}

	.owl-item{
		width: 363.333px;
		margin-right: 10px;
	}

	@media only screen and (max-width: 600px) {

		/*.modal-dialog {
		  width: 100%;
		  height: 100%;
		  margin: 0;
		  padding: 0;
		}
		
		.modal-content {
		  height: auto;
		  min-height: 100%;
		  border-radius: 0;
		}
		
		#div_frame{
			position: relative;
			top: 10%;
			
		}*/
		
		.row{
			margin-right: 0px !important;
			margin-left: 0px !important;
		}
		
		.owl-prev{
			display: none !important;
		}
		
		.owl-next{
			display: none !important;
		}
		
	}

		</style>
	@endsection

	@section('scripts')
		<script src="/js_theme/owl.carousel.min.js" defer></script>
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
			var base_url = "";
			var token = @json($token); 
			var recover = @json($route); 
			var verification_code = @json($verification_code);
			

			$(window).resize(function(){
				
				console.log("resized");
				
			});

			window.addEventListener('DOMContentLoaded', function() {
				/*if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
					$("#desktopCard").hide();
					$("#mobileCard").show();
				}*/
				$("#global_message").hide();
				if(token!=null){
					$("#btnEntrar").trigger('click');   
				}
				if(recover){
					$("#btnEntrar").trigger('click');   
				}

				if(verification_code!=null){
					$.get(base_url + "/auth/verify?verification_code="+verification_code, function(data, status){
						//var response = JSON.parse(data);
						if(data.data){
							//$("#global_message").html("Su cuenta ha sido verificada con exito");
							//$("#global_message").show();

							Swal.fire({
							  type: 'success',
							  title: 'Gracias',
							  html: '<p>Su cuenta ha sido verificada con exito</p>',
							});

							if(localStorage.getItem("user")){
								var tmp = JSON.parse(localStorage.getItem("user"));
								tmp.email_verified_at = new Date();
								localStorage.setItem("user", JSON.stringify(tmp));
								setTimeout(function(){ location.href = "/"; }, 3000);
								
							}
						}

					});
				}
				
				$('.carousel').carousel();
			
				$('.owl-carousel').owlCarousel({
					margin:10,			
					responsive:{
						0:{
							items:1
						},
						600:{
							items:2
						},
						1000:{
							items:3
						}
					},
					nav: true,
					navText: ['<span class="icon-keyboard_arrow_left">', '<span class="icon-keyboard_arrow_right">']
				});
				if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
					$("#modalVideo").css('max-width,','95wv');
				}
				$("#modalVideo").on('hidden.bs.modal', function () {
					$("#div_frame").html("");
				});
	  /*  $(document).ready(function() {
		  $("#owl-demo").owlCarousel({
			  navigation : true, // Show next and prev buttons
			  slideSpeed : 300,
			  paginationSpeed : 400,
			  singleItem:true
		  });
	});	*/
	$(document).ready(function(){
		$("#owl-demo").owlCarousel({
			items:3,
			itemsDesktop:[1000,3],
			itemsDesktopSmall:[979,2],
			itemsTablet:[768,2],
			itemsMobile:[650,1],
			pagination:true,
			autoPlay:true,
			navigation:true,
		});
		
		

	});		
		   // $( ".owl-prev").owlCarousel.html('<i class="fa fa-chevron-left"></i>');

			//$( ".owl-next").owlCarousel.html('<i class="fa fa-chevron-right"></i>');

				
				// filter
				$('#form-reference').on('submit', function(e) {
					e.preventDefault();
					if($('#input-filter').val().trim().length > 0){
						location.href = 'anuncio/' + $('#input-filter').val();
					}else{
						var category = 0;
						$(".btn-group-toggle input:radio").each(function( index ) {
							if($(this).is(':checked')){
								category = $(this).val() ;    
							}
						});
						var url = '/iamovingpro/find?category=' + category;
						if($("#city").val()!=""){
							url += "&city=" + $("#city").val();
							location.href = url;
						}
						
					}
				});

			
				
			});
			


			function openZones() {
				document.getElementById("barrios").classList.toggle("show");
			}

			function filterFunction() {
				var input, filter, ul, li, a, i;
				input = document.getElementById("inputBarrio");
				filter = input.value.toUpperCase();
				div = document.getElementById("barrios");
				a = div.getElementsByTagName("a");
				for (i = 0; i < a.length; i++) {
					txtValue = a[i].textContent || a[i].innerText;
					if (txtValue.toUpperCase().indexOf(filter) > -1) {
					a[i].style.display = "";
					} else {
					a[i].style.display = "none";
					}
				}
			}

			function showVideo(id, video, e){
				console.log(video);
				e.preventDefault();
				//alert(video.length);
				if (video.length < 100) {
					var ifra = '<iframe src="https://www.youtube.com/embed/' + video + '"?modestbranding=1&rel=0';
					ifra += 'class="video-fluid z-depth-1" ';
					ifra += 'width="100%" ';
					ifra += 'height="100%" ';
					ifra += 'mozallowfullscreen ';
					ifra += 'webkitallowfullscreen  ';
					ifra += 'allowfullscreen></iframe>';
					$("#div_frame").html(ifra);
					$("#div_frame").css("height", "400px");				
				} else {
					var ifra ='' + video +'';
					$("#div_frame").html(ifra);
					$("#div_frame").css("height", "592px");	
					$("#div_frame").css("overflow-y", "hidden");		
				}			


				$("#modal_title_video").html("Referencia " + id);

				$("#modalVideo").modal({
					backdrop:'static',
					keyboard: false
				});       
				
			}

		</script>
	@endsection

