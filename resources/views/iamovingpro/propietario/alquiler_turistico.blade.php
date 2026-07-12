@extends('layouts.iamovingpro')
@section('title', 'IAMOVING - Fácil de alquilar, comprar y vender')
@section('description', '¡Fácil de alquilar, comprar y vender!')
@section('image', 'https://iamoving.com/img/iamoving.png')
{{--@section('banner')
    @include('navigation.paginas')
@endsectio--}}
@section('content')
<!--<section class="page-section single-blog mt-2" style="padding-top: 10px;padding-bottom: 0px;">
			<div class="container">
				<div class="row">
					<div class="col-md-1 blog-share">
					</div>				
					<div class="col-md-10 singel-blog-content" style="margin-bottom:0px;">					
						<div class="row justify-content-center">
							<div class="col-md-8 text-center">
								<img src="/img/branding.transparente.png" style="margin-bottom: 20px;" alt="iamoving smartphone">
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-1 blog-share">
					</div>
					<div class="col-md-10 singel-blog-content">					
						<div class="row justify-content-center">
							<div class="col-md-8 text-center">
								<h1 class="text-center mb-4" style="color:#2d2e35;">VIEWINGS FROM ANYWHERE </h1>
							</div>
						</div>
					</div>				
				</div>					
			</div>				
		</section>  -->
<!--<div class="header--alquiler-image">
  <div class="container">
	  <div class="header--alquiler-text">
		<div class="d-block d-md-block d-lg-block d-xl-block">
		<br>
		<br>
		<br>
		</div>

<p class="mt-0 mb-2">&nbsp;</p>
		<p class="mt-1 mb-5">&nbsp;</p>
	  <h1 class="text-center mt-5 mb-2" style="font-size:3.2em;">VIEWINGS FROM ANYWHERE</h1>	
	  		<div class="d-block d-md-block d-lg-block d-xl-block">
			<br>
		</div>
	</div>
  </div>
</div>-->
<!-- page -->

    <section class="gallery-section spad" style="padding-top: 20px;padding-bottom: 0px;">
						<div class="container my-0">
								  <div class="row mt-0">
									<div class="col-md-2">
									</div>
							
										<div class="col-md-8 text-center mb-0">
												<img src="/img/inqui.png"  width="710" height="50" style="margin-bottom:0px;" alt="playa">  
																						</div>
<div class="col-md-12 text-center mb-0">										
										<img src="/img/corazon_rojo.png"  width="70" height="70" style="margin-bottom:0px;" alt="playa"> 
										</div>
<div class="col-md-12 text-center mb-0">										
										<img src="/img/branding.transparente.png"  width="170"  style="margin-bottom:0px;" alt="playa">
										</div>
									<div class="col-md-2">
									</div>
								</div>		
								
										<!--<div class="section-title text-center my-0"  style="padding-top: 0px;padding-bottom: 0px;">
											<h5 class="text-center mb-0"><b>Sin comisión ni intermediarios, de particular a particular </b></h5>
										</div>					-->
										<p class="my-5 text-center">
												<!--<button type="button" id="btn_contrato" name="btn_contrato" class="btn btn-iamoving btn-lg" style="color:default;" data-toggle="modal" data-target="#modalAnuncia">Infórmate Gratis</button>-->
												<button type="button" id="btn_inicio" name="btn_inicio" class="btn-dark" style="color:yellow;"  data-toggle="modal" data-target="#modalAnuncia">Infórmate Gratis</button>
										</p>
										
						</div>
										<div class="row mt-4 justify-content-center align-items-center">
											<div class="container">
												<div class="row">
													<div class="col-md-12">
														<!-- Nav tabs -->
														<div class="card">
															<nav class="nav nav-pills nav-justified border-bottom" role="tablist">
																<a class="nav-item nav-link active" href="#tab11" data-toggle="tab"
																	role="tab" aria-controls="tab11" aria-selected="true">
																	<span class="display-5 d-block">PROPIETARIOS</span>
																	
																</a>
																<a class="nav-item nav-link" href="#tab22" data-toggle="tab"
																	role="tab" aria-controls="tab22" aria-selected="false">
																	<span class="display-5 d-block">INQUILINOS / VIAJEROS</span>
																	
																</a>
																<!--<a class="nav-item nav-link" href="#tab33" data-toggle="tab"
																	role="tab" aria-controls="tab33" aria-selected="false">
																	<span class="display-4 d-block">3</span>
																	¡Me encanta el piso, lo quiero!
																</a>-->	
															<a class="nav-item nav-link" href="#tab44" data-toggle="tab"
																	role="tab" aria-controls="tab44" aria-selected="false">
																	<span class="display-5 d-block">INMOBILIARIAS</span>
																	
																</a>
															</nav>
															<!-- Tab panes -->
															<div class="tab-content">
																<div role="tabpanel" class="tab-pane active" id="tab11">	
																	<div class="my-0" id="collapseExample32">
																	  <div class="card  bg-transparent border-dark my-0">
																			  <div class="card-body text-success  my-0">
																				<!--<h5 class="card-title">Success card title</h5>-->
										<div class="col-sm-5  d-block d-sm-block d-md-none">
											<ul class="ml-4">
											  <li class="ml-1"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Sin comisiones ni intermediarios, directo con el inquilino </h5></li>
											  <li class="ml-1"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Sin pérdida de tiempo con llamadas y visitas frustradas</h5></li>
											  <li class="ml-1"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Publicidad 100% gratuita y sin tarifas de renovación </h5></li>
											</ul>
											<p  class="ml-1 mt-3" style="color: #2d2e35 !important;"><i class="fa fa-check"></i> Aumentamos tus posibilidades de alquilar y ahorrarás tiempo y dinero</p>
										</div>
										<div class="ml-5 d-none d-sm-none d-md-block">
											<ul class="ml-4">
												<ul class="ml-5">
													<ul class="ml-5">
														<ul class="ml-5">
															<ul class="ml-4">
															  <li class="ml-5"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Sin comisiones ni intermediarios, directo con el inquilino </h5></li>
															  <li class="ml-5"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Sin pérdida de tiempo con llamadas y visitas frustradas</h5></li>
															  <li class="ml-5"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Publicidad 100% gratuita y sin tarifas de renovación </h5></li>
															</ul>
															<p  class="ml-5 mt-3" style="color: #2d2e35 !important;"><i class="fa fa-check"></i> Aumentamos tus posibilidades de alquilar y ahorrarás tiempo y dinero</p>
														</ul>
													</ul>
												</ul>
											</ul>
										</div>										

																			  </div>					
																		  </div>
																	  </div>			  
									  
																</div>

																<div role="tabpanel" class="tab-pane" id="tab22">

																	<div class="my-0" id="collapseExample32">
																	  <div class="card  bg-transparent border-dark my-0">
																			  <div class="card-body text-success  my-0">
																				<!--<h5 class="card-title">Success card title</h5>-->
										<div class="col-sm-5  d-block d-sm-block d-md-none">
											<ul class="ml-4">
											  <li class="ml-1"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Sin comisiones ni intermediarios, directo con el propietario </h5></li>
											  <li class="ml-1"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Verificamos todos los pisos, evitando estafas</h5></li>
											  <li class="ml-1"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Sin fotos engañosas ni visitas frustradas </h5></li>
											</ul>
											<p  class="ml-1 mt-3" style="color: #2d2e35 !important;"><i class="fa fa-check"></i> La forma más rápida, segura y económica de alquilar</p>
										</div>
										<div class="ml-5 d-none d-sm-none d-md-block">
											<ul class="ml-4">
												<ul class="ml-5">
													<ul class="ml-5">
														<ul class="ml-5">
															<ul class="ml-4">
															  <li class="ml-5"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Sin comisiones ni intermediarios, directo con el propietario </h5></li>
															  <li class="ml-5"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Verificamos todos los pisos, evitando estafas</h5></li>
															  <li class="ml-5"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Sin fotos engañosas ni visitas frustradas </h5></li>
															</ul>
															<p  class="ml-5 mt-3" style="color: #2d2e35 !important;"><i class="fa fa-check"></i> La forma más rápida, segura y económica de alquilar</p>
														</ul>
													</ul>
												</ul>
											</ul>
										</div>											
										<!--	<ul class="ml-4">
											  <li class="ml-1"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Sin comisiones ni intermediarios, directo con el propietario </h5></li>
											  <li class="ml-1"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Verificamos todos los pisos, evitando estafas</h5></li>
											  <li class="ml-1"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Sin fotos engañosas ni visitas frustradas </h5></li>
											</ul>
											<p  class="ml-1 mt-3" style="color: #2d2e35 !important;"><i class="fa fa-check"></i> La forma más rápida, segura y económica de alquilar</p>																				
										-->
																			  </div>					
																		  </div>
																	  </div>												
																</div>
																<div role="tabpanel" class="tab-pane" id="tab33">
																</div>
																
																<div role="tabpanel" class="tab-pane" id="tab44">	
																	<div class="my-0" id="collapseExample32">
																	  <div class="card  bg-transparent border-dark my-0">
																			  <div class="card-body text-success  my-0">
																				<!--<h5 class="card-title">Success card title</h5>-->
										<div class="col-sm-5  d-block d-sm-block d-md-none">
											<ul class="ml-4">
											  <li class="ml-1"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Ahorro de tiempo y dinero </h5></li>
											  <li class="ml-1"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Te ayudamos en todo lo que necesites</h5></li>
											  <li class="ml-1"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Aumentamos tus posibilidades </h5></li>
											</ul>
											<p  class="ml-1 mt-3" style="color: #2d2e35 !important;"><i class="fa fa-check"></i> Conseguimos bajar tus costes y aumentar tus posibilidades</p>
										</div>
										<div class="ml-5 d-none d-sm-none d-md-block">
											<ul class="ml-5">
											<ul class="ml-5">
												<ul class="ml-5">
													<ul class="ml-5">
														<ul class="ml-5">
															<ul class="ml-4">
															  <li class="ml-5"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Ahorro de tiempo y dinero </h5></li>
															  <li class="ml-5"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Te ayudamos en todo lo que necesites</h5></li>
															  <li class="ml-5"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Aumentamos tus posibilidades </h5></li>
															</ul>
															<p  class="ml-5 mt-3" style="color: #2d2e35 !important;"><i class="fa fa-check"></i> Conseguimos bajar tus costes y aumentar tus posibilidades</p>
														</ul>
													</ul>
												</ul>
											</ul>
											</ul>
										</div>										
										<!--<ul class="ml-4">
										  <li class="ml-1"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Ahorro de tiempo y dinero  </h5></li>
										  <li class="ml-1"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Te ayudamos en todo lo que necesites</h5></li>
										  <li class="ml-1"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Aumentamos tus posibilidades</h5></li>
										</ul>
										<p  class="ml-1 mt-3" style="color: #2d2e35 !important;"><i class="fa fa-check"></i> Conseguimos bajar tus costes y aumentar tus posibilidades</p>
										-->
																			  </div>					
																		  </div>
																	  </div>	
													
																</div>	

													
															</div>
														</div>
													</div>
												</div>
											</div>
										
										</div>						
						
			<!--	<div class="container mt-5 my-1"  style="background-color:white;">
					<div class="row grid-divider" style="margin-right: 10px;">
						<div class="col-sm-6 mb-3">
						  <div class="col-padding">
							<h4 class="my-2 mb-4 text-center" ><b>VIAJEROS / INQUILINOS</b></h4>
								<p class="ml-4 text-center">
								 <div class="row mt-0">
									<div class="col-md-12  d-none d-sm-none d-md-block">
										<ul class="ml-4">
								  <li class="ml-1"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Sin comisiones ni intermediarios, directo con el propietario </h5></li>
								  <li class="ml-1"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Verificamos todos los pisos, evitando estafas </h5></li>
								  <li class="ml-1"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Sin fotos engañosas ni visitas frustradas </h5></li>
								</ul>
								<p  class="ml-1 mt-3" style="color: #2d2e35 !important;"><i class="fa fa-check"></i> La forma más rápida, segura y económica de alquilar</p>
							  
							</div>
							<div class="col-sm-5  d-block d-sm-block d-md-none">
							  <div class="pricing-box">
								<ul class="ml-4">
								  <li class="ml-5"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Sin comisiones ni intermediarios, directo con el propietario </h5></li>
								  <li class="ml-5"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Verificamos todos los pisos, evitando estafas </h5></li>
								  <li class="ml-5"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Sin fotos engañosas ni visitas frustradas </h5></li>
								</ul>
								<p  class="ml-5 mt-4" style="color: #2d2e35 !important;"><i class="fa fa-check"></i> La forma más rápida, segura y económica de alquilar</p>
									  </div>
									</div>							

								</div>							
								</p>
						  </div>
						</div>
						<div class="col-sm-6">
						  <div class="col-padding">
							<h4 class="my-2 mb-4 text-center"><b>PROPIETARIOS</b></h4>
													<p class="ml-4 text-center">
						 <div class="row mt-0">
							<div class="col-md-12  d-none d-sm-none d-md-block">
								<ul class="ml-4">
								  <li class="ml-1"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Sin comisiones ni intermediarios, directo con el inquilino   </h5></li>
								  <li class="ml-1"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Sin pérdida de tiempo con llamadas y visitas frustradas </h5></li>
								  <li class="ml-1"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Publicidad 100% gratuita y sin tarifas de renovación </h5></li>
								</ul>
								<p  class="ml-1 mt-3" style="color: #2d2e35 !important;"><i class="fa fa-check"></i> Aumentamos tus posibilidades de alquilar y ahorrarás tiempo y dinero</p>
							  
							</div>
							<div class="col-sm-5  d-block d-sm-block d-md-none">
							  <div class="pricing-box">
								<ul class="ml-4">
								  <li class="ml-5"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Sin comisiones ni intermediarios, directo con el inquilino   </h5></li>
								  <li class="ml-5"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Sin pérdida de tiempo con llamadas y visitas frustradas </h5></li>
								  <li class="ml-5"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Publicidad 100% gratuita y sin tarifas de renovación </h5></li>
								</ul>
								<p  class="ml-5 mt-4" style="color: #2d2e35 !important;"><i class="fa fa-check"></i> Aumentamos tus posibilidades de alquilar y ahorrarás tiempo y dinero</p>
							  </div>
							</div>							

						</div>							
						</p>
						  </div>
						</div>
					</div>
				</div>						-->
						
						<!--<div class="container my-0">
								  <div class="row mt-5">
									<div class="col-md-2">
									</div>
							
										<div class="col-md-8 text-center mb-3">
												<img src="/img/beach.png"  width="70" height="70" style="margin-bottom:10px;" alt="playa">
										</div>
									<div class="col-md-2">
									</div>
								</div>						
										<div class="section-title text-center my-0"  style="padding-top: 0px;padding-bottom: 0px;">
											<h4 class="text-center mb-0"><b>ENSEÑA TU PROPIEDAD DESDE DONDE SEA</b></h4>
										</div>					
										<h4 class="mb-4 text-center mt-0"><b>VISITA VIRTUAL</b></h4>
										<div class="text-success my-1">
											<p class="card-text text-center">De esa manera, aquellos interesados ​​en reservar tu espacio pueden hacer una primera visita, FROM ANYWHERE. Dándoles más confianza, reduciendo el miedo a lo desconocido y aumentando tus posibilidades de reserva.</p>
										</div>	
										
										<span id="dots"></span><span id="more">
										<div class="section-title text-center my-0"  style="padding-top: 10px;padding-bottom: 0px;">
											<h4 class="text-center mb-4"><b>+ de 600 VISITAS VIRTUALES REALIZADAS</b></h4>
										</div>					
										<div class="text-success my-1">
											<p class="card-text text-center">Nuestra experiencia ha demostrado que, por diversas razones, el formato Iamoving es más realista y efectivo que los anuncios en los portales inmobiliarios, donde solo se muestran una serie de fotografías de ciertos espacios e información muy básica sobre la propiedad.</p>
										
										</div>										
										</span>
										<p class="card-text text-center">
												<button class="btn-dark" style="color:yellow;" onclick="myFunction()" id="myBtn">Ver más..</button>
										</p>
										
						</div>-->
<!--							<div class="d-none d-md-block d-lg-block d-xl-block">
							<br>
							<br>
							</div>
						</div>-->		
					  
				  
					

<!--						<div class="container my-0">
								  <div class="row mt-4">
									<div class="col-md-2">
									</div>
							
										<div class="col-md-8 text-center mb-3">
												<img src="/img/beach.png"  width="70" height="70" style="margin-bottom:10px;" alt="playa">
										</div>
									<div class="col-md-2">
									</div>
								</div>						
										<div class="section-title text-center my-0"  style="padding-top: 0px;padding-bottom: 0px;">
											<h4 class="text-center mb-0"><b>ENSEÑA TU CASA DESDE DONDE SEA</b></h4>
										</div>					
										<h4 class="mb-4 text-center mt-0"><b>PRIMERA VISITA VRTUAL</b></h4>
										<div class="text-success my-1">
											<p class="card-text text-center">De esta manera, nadie pierde el tiempo visitando o recibiendo visitas que no aportan en nada, el inquilino solo visita los inmuebles que realmente le interesa y reduce las molestias al propietario al filtrarse las visitas de curiosos.</p>
										</div>	
										
										<span id="dots"></span><span id="more">
										<div class="section-title text-center my-0"  style="padding-top: 10px;padding-bottom: 0px;">
											<h4 class="text-center mb-4"><b>+ de 600 VISITAS VIRTUALES REALIZADAS</b></h4>
										</div>					
										<div class="text-success my-1">
											<p class="card-text text-center">Nuestra experiencia ha demostrado que, por diversas razones el formato Iamoving es más realista y efectivo que los anuncios en los portales inmobiliarios, donde solo se muestran una serie de fotografías de ciertos espacios e información muy básica sobre la propiedad.</p>
										</div>										
										</span>
										<p class="card-text text-center">
												<button class="btn-dark" style="color:yellow;" onclick="myFunction()" id="myBtn">Ver más..</button>
										</p>
										
						</div>-->
<!--							<div class="d-none d-md-block d-lg-block d-xl-block">
							<br>
							<br>
							</div>
						</div>-->		
					  
							<div class="container my-2">
								  <div class="row mt-3">
									<div class="col-md-2">
									</div>
							
										<div class="col-md-8 text-center mb-3">
												<img src="/img/videocall.png"  width="70" height="70" style="margin-bottom:10px;" alt="playa">
										</div>
									<div class="col-md-2">
									</div>
								</div>						
										<div class="section-title text-center my-0"  style="padding-top: 0px;padding-bottom: 0px;">
											<h4 class="text-center mb-0"><b>TOUR VIRTUAL</b></h4>
										</div>					
																					  <h2 class="card-text text-center">¿ERES PROFESIONAL O PROPIETARIO?</h2>
											  <p class="card-text text-center">MEJORAMOS TU FORMA DE ALQUILAR Y VENDER</p>

										
										<span id="dots"></span><span id="more">
										<div class="text-success my-1">
											<p class="card-text text-center">De esta manera, nadie pierde el tiempo visitando o recibiendo visitas que no aportan nada, el inquilino o el comprador solo visitan los inmuebles que realmente les interesan y reducen las molestias filtrando visitas de curiosos.</p>
										</div>											
										<div class="section-title text-center my-0"  style="padding-top: 10px;padding-bottom: 0px;">
											<h4 class="text-center mb-4"><b>+ de 600 VISITAS VIRTUALES REALIZADAS</b></h4>
										</div>					
										<div class="text-success my-1">
											<p class="card-text text-center">Nuestra experiencia ha demostrado que, por diversas razones el formato Iamoving es más realista y efectivo que los anuncios en los portales inmobiliarios, donde solo se muestran una serie de fotografías de ciertos espacios e información muy básica sobre la propiedad.</p>
											
										</div>										
										</span>
										<p class="card-text text-center">
												<button class="btn-dark" style="color:yellow;" onclick="myFunction()" id="myBtn">Ver más..</button>
										</p>
										
						</div>
						   <div class="row mt-5">
							<div class="col-md-4">
							</div>
							<div class="col-md-4">
							  <div class="pricing-box">
							 <p class="ml-0 text-center"><img src="/img/mobile.png"  width="70" height="70" style="margin-bottom:10px;" alt="diana"></p>
							  <h4 class="text-center mb-4"><b>¿CÓMO FUNCIONA?</b></h4>
							  </div>
							</div>
							<div class="col-md-4">
							</div>
						  </div>
										<div class="row  justify-content-center align-items-center">
											<div class="container">
												<div class="row">
													<div class="col-md-12">
														<!-- Nav tabs -->
														<div class="card">
															<nav class="nav nav-pills nav-justified border-bottom" role="tablist">
																<a class="nav-item nav-link active" href="#tab1" data-toggle="tab"
																	role="tab" aria-controls="tab1" aria-selected="true">
																	<span class="display-4 d-block">1</span>
																	
																</a>
																<a class="nav-item nav-link" href="#tab2" data-toggle="tab"
																	role="tab" aria-controls="tab2" aria-selected="false">
																	<span class="display-4 d-block">2</span>
																	
																</a>
																<!--<a class="nav-item nav-link" href="#tab3" data-toggle="tab"
																	role="tab" aria-controls="tab3" aria-selected="false">
																	<span class="display-4 d-block">3</span>
																	¡Me encanta el piso, lo quiero!
																</a>-->	
															<a class="nav-item nav-link" href="#tab4" data-toggle="tab"
																	role="tab" aria-controls="tab4" aria-selected="false">
																	<span class="display-4 d-block">3</span>
																	
																</a>
															</nav>
															<!-- Tab panes -->
															<div class="tab-content">
																<div role="tabpanel" class="tab-pane active" id="tab1">	
																	<div class="my-0" id="collapseExample3">
																	  <div class="card  bg-transparent border-dark my-0">
																			  <div class="card-body text-success  my-0">
																				<!--<h5 class="card-title">Success card title</h5>-->
																				<h5 class="display-5 text-center text-center my-1" >1-Vamos al inmueble y creamos la visita virtual. Aportamos todo tipo de información e imágenes que a uno le gustaría disponer antes de acudir a una visita,  tomamos fotos, medidas, video y realizamos un informe detallado de la propiedad.</h5>

																			  </div>					
																		  </div>
																	  </div>			  
									  
																</div>

																<div role="tabpanel" class="tab-pane" id="tab2">

																	<div class="my-0" id="collapseExample3">
																	  <div class="card  bg-transparent border-dark my-0">
																			  <div class="card-body text-success  my-0">
																				<h5 class="display-5 text-center text-center my-1" >2-Podrás subir el video, las fotos y la visita virtual completa que hemos creado en tus anuncios que ya están publicados en otros canales, ganando más visibilidad y posicionamiento. También podrás enviarlos por WhatsApp o por correo a todos los interesados.</h5>
																				<!--<h5 class="display-5 text-center text-center my-1" >De este modo, todo se quedará más fácil, sería como tener una secretaria 24h al día contestando las dudas y preguntas de todos los interesados.</h5>
																				<h5 class="display-5 text-center text-center my-1" >Sin contar que también podrás ofrecer y enviar por WhatsApp o correo electrónico el enlace de la visita virtual, a todos los interesados, algo muy práctico.</h5>-->
																			  </div>					
																		  </div>
																	  </div>												
																</div>
																<div role="tabpanel" class="tab-pane" id="tab3">
																</div>
																
																<div role="tabpanel" class="tab-pane" id="tab4">	
																	<div class="my-0" id="collapseExample3">
																	  <div class="card  bg-transparent border-dark my-0">
																			  <div class="card-body text-success  my-0">
																				
																				<h5 class="display-5 text-center text-center my-1" >3-Después que la parte interesada ha realizado una primera visita virtual y estar convencida de que el piso realmente encaja, te llegará una solicitud de visita sin ninguna intermediación y con su perfil de inquilino/comprador…. para que veas, si el perfil del interesado también te interesa con su nombre, edad, teléfono, correo electrónico, dónde trabaja, sueldo aproximado, si eres inversor, etc..</h5>
																				<!--<h5 class="display-5 text-center text-center my-1" >Después de que nuestro usuario haga su <b>Tour Virtual</b> y esté convencido de que tu casa realmente se ajusta a lo que está buscando, podrá solicitar una visita presencial; en este momento, el pedido de visita se te enviará directamente, sin ninguna intermediación, con su perfil de inquilino: nombre, edad, teléfono, correo electrónico, dónde trabaja, sueldo aproximado, etc., para que veas si el perfil te interesa.</h5>-->
																				<h5 class="display-5 text-center text-center mt-3" ><b>Escoge el día, la hora y los candidatos que tú prefieras para enseñar el piso y conocerlos en persona.</b></h5>
																			  </div>					
																		  </div>
																	  </div>	
													
																</div>		

													
															</div>
														</div>
													</div>
												</div>
											</div>
										
										</div>			  
					
						<div class="container my-0 mt-3">
						   <div class="row mt-1">
							<div class="col-md-4">
							</div>
							<div class="col-md-4">
							  <div class="pricing-box">
							 <p class="ml-0 text-center"><img src="/img/diana.png"  width="70" height="70" style="margin-bottom:10px;" alt="diana"></p>
							  <h4 class="text-center mb-4"><b>¿QUÉ CONSEGUIMOS?</b></h4>
							  </div>
							</div>
							<div class="col-md-4">
							</div>
						  </div>	
					<div class="row  justify-content-center">
						<div class="col-12">
							<p class="my-1"></p>
							<!--<p class="ml-4 text-center"  style="margin-bottom: 0rem;"><img src="/img/plano.png"  width="70" height="70" style="margin-bottom:0px;" alt="plano"></p>-->
							<p class="my-0">
							  <button type="button" class="btn btn-warning btn-lg btn-block border-warning dropdown-toggle"  data-toggle="collapse" 
							  data-target="#collapseExample23" aria-expanded="false" aria-controls="collapseExample23" aria-haspopup="true" 
							  style="font-weight:bold;border-radius:0%; !important;;outline:none !important;outline-width: 0 !important; box-shadow: none;-moz-box-shadow: none;-webkit-box-shadow: none;" >
							  AUMENTAMOS TUS POSIBILIDADES DE ALQUILAR Y DE RESERVAS
							  </button>
							</p>
							<div class="collapse  my-0" id="collapseExample23">
							  <div class="card bg-transparent border-dark my-0">
										<div class="card-body text-success my-0">
											  <!--<h2 class="card-text text-center">Realizamos visitas</h2>-->
											  <h5 class="card-text text-center"><b>Ya que hay muchos viajeros que no suelen alquilar solo por fotografías.</b></h5>
							<div class="col-md-10 ml-2">
							
								<ul class="ml-0">
								  <li class="ml-0 mt-4"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > <b>Tour Virtual, recibirá más reservas</b></h5></li>
								  <li class="ml-5" style="list-style:none;"><h5 class="display-5" >La compra online es un riesgo, sobre todo en la industria de alquiler turístico o temporal, ya que no es lo mismo adquirir un artículo que pueda retornarse, que reservar una habitación o una casa unos días, semanas, o meses en otra ciudad o país. Con la visita virtual se muestra realmente en qué estado está el inmueble, a diferencia de lo que sucede con las fotografías, donde sólo se muestran determinados espacios.</h5></li>
								  <li class="ml-0 mt-4"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > <b>Atención a los interesados 24h al día</b></h5></li>
								  <li class="ml-5" style="list-style:none;"><h5 class="display-5" >Nuestro modelo de publicación de los anuncios responde automáticamente las preguntas de todos los interesados las 24 horas del día, ya que un correo electrónico o una llamada perdida reducirán de inmediato tus posibilidades de alquilar frente a la competencia.</h5></li>								  
								  <li class="ml-5" style="list-style:none;"><h5 class="display-5" >Los viajeros dicen que un recorrido virtual les da más confianza, siendo un valor decisivo en la hora de reservar</h5></li>								  
								  <li class="ml-0 mt-4"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > <b>Interesados de otras provincias y otros países</b></h5></li>
								  <li class="ml-5" style="list-style:none;"><h5 class="display-5" >No tener que viajar para ver la propiedad y poder hacerlo las 24 horas del día, los 365 días del año, genera una atracción para aquellos interesados ​​que residen en otras provincias o incluso en otros países (profesionales expatriados o estudiantes).</h5></li>								  
								  <li class="ml-0 mt-4"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > <b>Una segunda opinión</b></h5></li>
								  <li class="ml-5" style="list-style:none;"><h5 class="display-5" >Otra ventaja es que, además de que la parte interesada puede visitar la propiedad tantas veces como lo desee en el día y en el lugar que prefiera, también puede mostrar la propiedad a su familia y amigos antes de reservar o alquilar, dándoles más confianza y aumentando tus posibilidades de alquiler.</h5></li>								  
								  <li class="ml-0 mt-4"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > <b>Sin conflicto de intereses</b></h5></li>
								  <li class="ml-5" style="list-style:none;"><h5 class="display-5" >La mayoría de los que están buscando pisos online, afirman que no confían en la información y en las fotografías de las plataformas tradicionales.</h5></li>								  								  
								  <li class="ml-5" style="list-style:none;"><h5 class="display-5" >Los propietarios y las plataformas, ambos con los mismos intereses, MÁS RESERVAS. Uno porque desea monetizar su alquiler lo más rápido posible y el otro por sus comisiones.</h5></li>								  								  
								  <li class="ml-5" style="list-style:none;"><h5 class="display-5" >Iamoving no recibe comisión del propietario ni del inquilino, somos neutrales, mostramos la verdad sin ningún conflicto de intereses.</h5></li>								  								  
								  <li class="ml-5" style="list-style:none;"><h5 class="display-5" >Por lo tanto, nuestros usuarios saben que no ocultamos defectos o información sobre las propiedades y tampoco “maquillamos” las fotos, cosas puede suceder en este proceso. Siendo más confiable y dándoles más confianza en la toma de sus decisiones.</h5></li>								  								  
									<li class="ml-0 mt-4"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > <b>Promocionar tu espacio</b></h5></li>
								  <li class="ml-5" style="list-style:none;"><h5 class="display-5" >Además, debe tener en cuenta que los viajeros son un excelente vehículo para promocionar tus casas o habitaciones. A los usuarios les encanta compartir sus experiencias y en un formato de video, la promoción de tu lugar será más atractiva.</h5></li>								  								  
								  <li class="ml-0 mt-4"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > <b>¿Quién vive allí? (Información solo para quien está alquilando una habitación en un piso)</b></h5></li>
								  <li class="ml-5" style="list-style:none;"><h5 class="display-5" >Conocer el perfil de todos los ocupantes de la casa es esencial para aquellos interesados ​ que están buscando una habitación en un piso compartido, como; qué hacen, edad, nacionalidad, chicas o chicos, trabajadores o estudiantes, etc. Reducimos su miedo a lo desconocido y aumentamos su confianza, automáticamente aumentando tus posibilidades de alquiler y de más reservas.</h5></li>

								 </ul>

								</div>								
									  
									  </div>					
								</div>
							 </div>					  
						</div> 
					</div>
					<div class="row  justify-content-center">
						<div class="col-12">
							<p class="my-3"></p>
							<!--<p class="ml-4 text-center"  style="margin-bottom: 0rem;"><img src="/img/plano.png"  width="70" height="70" style="margin-bottom:0px;" alt="plano"></p>-->
							<p class="my-0">
							  <button type="button" class="btn btn-warning btn-lg btn-block border-warning dropdown-toggle"  data-toggle="collapse" 
							  data-target="#collapseExample24" aria-expanded="false" aria-controls="collapseExample24" aria-haspopup="true" 
							  style="font-weight:bold;border-radius:0%; !important;;outline:none !important;outline-width: 0 !important; box-shadow: none;-moz-box-shadow: none;-webkit-box-shadow: none;" >
							   AHORRAMOS MUCHÍSIMO TIEMPO Y DINERO
							  </button>
							</p>
							<div class="collapse  my-0" id="collapseExample24">
							  <div class="card bg-transparent border-dark my-0">
									  <div class="card-body text-success my-0">
											  <!--<h2 class="card-text text-center">Realizamos visitas</h2>-->
											  <!--<h1 class="card-text text-center"><b> Vender o alquilar un piso solo con fotografías y sin conocer el perfil del interesado, suele generar miles de vistas que no aportan en nada. Evitamos incontables visitas frustradas.</b></h1>-->
							<div class="col-md-10 ml-2">
							
								<ul class="ml-0">
								  <li class="ml-0 mt-4"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > <b>Pérdida de tiempo con visitas frustradas</b></h5></li>								  
								  <li class="ml-5" style="list-style:none;"><h5 class="display-5" >Tiempo que tomaría llegar a la propiedad para hacer visitas.</h5></li>								  								  
								  <li class="ml-5" style="list-style:none;"><h5 class="display-5" >Tiempo perdido con visitas que no aportan nada.</h5></li>								  								  
								  <li class="ml-5" style="list-style:none;"><h5 class="display-5" >Más el tiempo que lleva regresar a casa.</h5></li>								  								  
								  
								  <li class="ml-0 mt-4"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > <b>Tiempo con llamadas y emails</b></h5></li>								  
								  <li class="ml-5" style="list-style:none;"><h5 class="display-5" >⦁	Sin perder tiempo respondiendo las mismas preguntas cientos de veces, lamentablemente la mayoría de los correos electrónicos y las llamadas entrantes no son de potenciales inquilinos y compradores, lo que hace que este proceso sea una gran pérdida de tiempo. Nuestro modelo de publicación tendrá todas las respuestas a cualquier pregunta relacionada con tu propiedad, las 24 horas del día.</h5></li>								  					

								  <li class="ml-0 mt-4"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > <b>¿Qué te gusta hacer en tu tiempo libre?</b></h5></li>								  
								  <li class="ml-5" style="list-style:none;"><h5 class="display-5" >Estar con tu familia, amigos o quizás haciendo dinero y no perdiendo tiempo con miles de llamadas, correos electrónicos y visitas frustradas.</h5></li>								  					

								  <li class="ml-0 mt-4"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > <b>Evitamos gastos innecesarios con visitas frustradas</b></h5></li>								  
								  <li class="ml-5" style="list-style:none;"><h5 class="display-5" >tales como: transporte, taxi, combustible, parking, etc.</h5></li>								  					

								  <li class="ml-0 mt-4"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > <b>Sin cancelaciones de última hora</b></h5></li>								  
								  <li class="ml-5" style="list-style:none;"><h5 class="display-5" >⦁	Con Iamoving, se muestra realmente en qué estado se encuentra la propiedad, evitando cancelaciones de último minuto, que generan estrés y daños económicos.</h5></li>								  					

								  <li class="ml-0 mt-4"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > <b>Para inmobiliarias</b></h5></li>								  
								  <li class="ml-5" style="list-style:none;"><h5 class="display-5" >Nuestro modelo de visita virtual reduce automáticamente tu coste en personal para realización de visitas.</h5></li>								  					

								  <li class="ml-0 mt-4"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > <b>Sin comisiones</b></h5></li>								  
								  <li class="ml-5" style="list-style:none;"><h5 class="display-5" >No cobramos comisiones a ninguna de las partes.</h5></li>									
								 </ul>

								</div>								
									  
									  </div>					
								</div>
							 </div>					  
						</div> 
					</div>							  
					<!--	 <div class="row mt-0">
							<div class="col-md-1">
							</div>
							
							<div class="col-md-10 ml-2">
							
								<ul class="ml-0">
								  <li class="ml-0"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > <b>Aumentamos tus posibilidades de alquilar y de reservas:</b>  ya que hay muchos viajeros no suelen alquilar solo por fotografías.</h5></li> 
								  <span id="dots1"></span><span id="more1">
								  <li class="ml-0 mt-4"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > <b>Tour Virtual, recibirá más reservas</b></h5></li>
								  <li class="ml-5" style="list-style:none;"><h5 class="display-5" >La compra online es un riesgo, sobre todo en la industria de alquiler turístico o temporal, ya que no es lo mismo adquirir un artículo que pueda retornarse, que reservar una habitación o una casa unos días, semanas, o meses en otra ciudad o país. Con la visita virtual se muestra realmente en qué estado está el inmueble, a diferencia de lo que sucede con las fotografías, donde sólo se muestran determinados espacios.</h5></li>
								  <li class="ml-0 mt-4"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > <b>Atención a los interesados 24h al día</b></h5></li>
								  <li class="ml-5" style="list-style:none;"><h5 class="display-5" >Nuestro modelo de publicación de los anuncios responde automáticamente las preguntas de todos los interesados las 24 horas del día, ya que un correo electrónico o una llamada perdida reducirán de inmediato tus posibilidades de alquilar frente a la competencia.</h5></li>								  
								  <li class="ml-5" style="list-style:none;"><h5 class="display-5" >Los viajeros dicen que un recorrido virtual les da más confianza, siendo un valor decisivo en la hora de reservar</h5></li>								  
								  <li class="ml-0 mt-4"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > <b>Interesados de otras provincias y otros países</b></h5></li>
								  <li class="ml-5" style="list-style:none;"><h5 class="display-5" >No tener que viajar para ver la propiedad y poder hacerlo las 24 horas del día, los 365 días del año, genera una atracción para aquellos interesados ​​que residen en otras provincias o incluso en otros países (profesionales expatriados o estudiantes).</h5></li>								  
								  <li class="ml-0 mt-4"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > <b>Una segunda opinión</b></h5></li>
								  <li class="ml-5" style="list-style:none;"><h5 class="display-5" >Otra ventaja es que, además de que la parte interesada puede visitar la propiedad tantas veces como lo desee en el día y en el lugar que prefiera, también puede mostrar la propiedad a su familia y amigos antes de reservar o alquilar, dándoles más confianza y aumentando tus posibilidades de alquiler.</h5></li>								  
								  <li class="ml-0 mt-4"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > <b>Sin conflicto de intereses</b></h5></li>
								  <li class="ml-5" style="list-style:none;"><h5 class="display-5" >La mayoría de los que están buscando pisos online, afirman que no confían en la información y en las fotografías de las plataformas tradicionales.</h5></li>								  								  
								  <li class="ml-5" style="list-style:none;"><h5 class="display-5" >Los propietarios y las plataformas, ambos con los mismos intereses, MÁS RESERVAS. Uno porque desea monetizar su alquiler lo más rápido posible y el otro por sus comisiones.</h5></li>								  								  
								  <li class="ml-5" style="list-style:none;"><h5 class="display-5" >Iamoving no recibe comisión del propietario ni del inquilino, somos neutrales, mostramos la verdad sin ningún conflicto de intereses.</h5></li>								  								  
								  <li class="ml-5" style="list-style:none;"><h5 class="display-5" >Por lo tanto, nuestros usuarios saben que no ocultamos defectos o información sobre las propiedades y tampoco “maquillamos” las fotos, cosas puede suceder en este proceso. Siendo más confiable y dándoles más confianza en la toma de sus decisiones.</h5></li>								  								  
									<li class="ml-0 mt-4"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > <b>Promocionar tu espacio</b></h5></li>
								  <li class="ml-5" style="list-style:none;"><h5 class="display-5" >Además, debe tener en cuenta que los viajeros son un excelente vehículo para promocionar tus casas o habitaciones. A los usuarios les encanta compartir sus experiencias y en un formato de video, la promoción de tu lugar será más atractiva.</h5></li>								  								  
								  <li class="ml-0 mt-4"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > <b>¿Quién vive allí? (Información solo para quien está alquilando una habitación en un piso)</b></h5></li>
								  <li class="ml-5" style="list-style:none;"><h5 class="display-5" >⦁	Conocer el perfil de todos los ocupantes de la casa es esencial para aquellos interesados ​ que están buscando una habitación en un piso compartido, como; qué hacen, edad, nacionalidad, chicas o chicos, trabajadores o estudiantes, etc. Reducimos su miedo a lo desconocido y aumentamos su confianza, automáticamente aumentando tus posibilidades de alquiler y de más reservas.</h5></li>								  								  
																</span>
								<p class="mt-2 card-text text-center">
										<button class="btn-dark" style="color:yellow;" onclick="myFunction1()" id="myBtn1">Ver más..</button>
								</p>								  
								  <li class="ml-0" style="list-style:none;"><h5 class="display-5" > <b>AHORRAMOS MUCHÍSIMO TIEMPO Y DINERO:</b></h5></li>
								  <span id="dots2"></span><span id="more2">
								  <li class="ml-0 mt-4"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > <b>Pérdida de tiempo con visitas frustradas</b></h5></li>								  
								  <li class="ml-5" style="list-style:none;"><h5 class="display-5" >Tiempo que tomaría llegar a la propiedad para hacer visitas.</h5></li>								  								  
								  <li class="ml-5" style="list-style:none;"><h5 class="display-5" >Tiempo perdido con visitas que no aportan nada.</h5></li>								  								  
								  <li class="ml-5" style="list-style:none;"><h5 class="display-5" >Más el tiempo que lleva regresar a casa.</h5></li>								  								  
								  
								  <li class="ml-0 mt-4"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > <b>Tiempo con llamadas y emails</b></h5></li>								  
								  <li class="ml-5" style="list-style:none;"><h5 class="display-5" >⦁	Sin perder tiempo respondiendo las mismas preguntas cientos de veces, lamentablemente la mayoría de los correos electrónicos y las llamadas entrantes no son de potenciales inquilinos y compradores, lo que hace que este proceso sea una gran pérdida de tiempo. Nuestro modelo de publicación tendrá todas las respuestas a cualquier pregunta relacionada con tu propiedad, las 24 horas del día.</h5></li>								  					

								  <li class="ml-0 mt-4"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > <b>¿Qué te gusta hacer en tu tiempo libre?</b></h5></li>								  
								  <li class="ml-5" style="list-style:none;"><h5 class="display-5" >Estar con tu familia, amigos o quizás haciendo dinero y no perdiendo tiempo con miles de llamadas, correos electrónicos y visitas frustradas.</h5></li>								  					

								  <li class="ml-0 mt-4"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > <b>Evitamos gastos innecesarios con visitas frustradas</b></h5></li>								  
								  <li class="ml-5" style="list-style:none;"><h5 class="display-5" >tales como: transporte, taxi, combustible, parking, etc.</h5></li>								  					

								  <li class="ml-0 mt-4"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > <b>Sin cancelaciones de última hora</b></h5></li>								  
								  <li class="ml-5" style="list-style:none;"><h5 class="display-5" >⦁	Con Iamoving, se muestra realmente en qué estado se encuentra la propiedad, evitando cancelaciones de último minuto, que generan estrés y daños económicos.</h5></li>								  					

								  <li class="ml-0 mt-4"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > <b>Para inmobiliarias</b></h5></li>								  
								  <li class="ml-5" style="list-style:none;"><h5 class="display-5" >Nuestro modelo de visita virtual reduce automáticamente tu coste en personal para realización de visitas.</h5></li>								  					

								  <li class="ml-0 mt-4"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > <b>Sin comisiones</b></h5></li>								  
								  <li class="ml-5" style="list-style:none;"><h5 class="display-5" >No cobramos comisiones a ninguna de las partes.</h5></li>	
									</span>
									<p class="mt-2 card-text text-center">
										<button class="btn-dark" style="color:yellow;" onclick="myFunction2()" id="myBtn2">Ver más..</button>
									</p>

							</ul>
								
							
							</div>
					
							<div class="col-md-1">
							</div>
						</div>-->
						<div class="container my-0 mt-3">
						 <!--  <div class="row mt-1">
							<div class="col-md-4">
							</div>
							<div class="col-md-4">
							  <div class="pricing-box">
							 <p class="ml-0 text-center"><img src="/img/warning.png"  width="70" height="70" style="margin-bottom:0px;" alt="diana"></p>
							  </div>
							</div>
							<div class="col-md-4">
							</div>
						  </div>						-->

										<!--<span id="dots4"></span><span id="more5">-->
											 <div class="row mt-2 mb-3">
												<div class="col-md-4">
												</div>
												<div class="col-md-4">
												  <div class="text-center">
															   <button type="button" class="btn btn-iamoving btn-lg btn-block border-warning" 
														   aria-haspopup="true" style="cursor:default;border-radius:0%; !important;outline:none !important;outline-width: 0 !important; box-shadow: none;-moz-box-shadow: none;-webkit-box-shadow: none;">
																			  <b>PRECIO</b>
														  </button>
															  <div class="card card-body bg-transparent border-warning">
																	<div class="card-body text-success">
																			  <!--<p class="card-text text-center">1 visita virtual.......<b>45€</b> <img src="/img/info.png" title="+iva" rel="tooltip"  id="blah3"  width="15" height="15" style="margin-bottom:5px;" alt="info"></p>-->
																			  <p class="card-text text-center">1 visita virtual....<b>45€</b> <img src="/img/info.png" title="+iva" rel="tooltip"  id="blah3"  width="15" height="15" style="margin-bottom:5px;" alt="info"></p>
																			  <!--<p class="card-text text-center">Pack de 5.....<b>200€</b> <img src="/img/info.png" title="Cada visita te sale a 40€+iva" rel="tooltip"  id="blah1"  width="15" height="15" style="margin-bottom:5px;" alt="info"></p>
																			  <p class="card-text text-center">Pack de 10....<b>350€</b> <img src="/img/info.png"  title="Cada visita te sale a 35€+iva" rel="tooltip"  id="blah2"    width="15" height="15" style="margin-bottom:5px;" alt="info"></p>-->
																			  <p class="card-text text-center">Pago único, sin tarifa de renovación y de manera ilimitada</p>
																	</div>
															  </div>
												  </div>
												</div>
												<div class="col-md-5">
												</div>
												
											  </div>
									 <div class="row mt-4">
									<div class="col-md-1">
									</div>
									<div class="col-md-10 ml-2">
										<ul class="ml-0">
										<!--<li class="ml-0"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > <b>La presentación virtual de IAMOVING incluye:</b> fotos, informe detallado, medidas, video del inmueble y poder conocer el perfil del interesado antes de cada visita.</h5></li> -->
										<li class="ml-0"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > <b>Los servicios de IAMOVING incluyen:</b> videos, edición, fotografías , informes y poder conocer el perfil del interesado antes de cada visita.</h5></li> 
										<li class="ml-0"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Si quieres, te entregamos todas las imágenes y el video, sin marcas de agua y sin mencionar el nombre de IAMOVING, permitiéndote la libertad de usarlo como mejor te parezca.</h5></li> 
										  <!--<li class="ml-0"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > <b>Aviso importante:</b> Si quieres, entregamos todas las imágenes, video, sin marcas de agua y sin mencionar el nombre de IAMOVING, permitiendo a nuestros clientes la libertad de usarlo como mejor les parezca.</h5></li> -->
										</ul>
									</div>						
									<div class="col-md-1">
									</div>
								</div>
											  	<p class="my-2 text-center">
												<button type="button" id="btn_inquilino" name="btn_inquilino" class="btn btn-iamoving btn-lg" style="color:default;" data-toggle="modal" data-target="#modalAnuncia">Infórmate Gratis</button>
												</p>
												<!--</span>
								<p class="mt-2 card-text text-center">
										<button class="btn-dark" style="color:yellow;" onclick="myFunction4()" id="myBtn4">Ver más..</button>
								</p>						-->						
						   <div class="container" style="background-color:white;">
						  <!-- <div class="row mt-5">
							<div class="col-md-4">
							</div>
							<div class="col-md-4">
							  <div class="pricing-box">
							 <p class="ml-0 text-center"><img src="/img/free_iamoving.png"  width="70" height="70" style="margin-bottom:0px;" alt="diana"></p>
							  <h4 class="text-center mb-4"><b>GRATIS</b></h4>
							  </div>
							</div>
							<div class="col-md-4">
							</div>
						  </div> 	-->										  
										<div class="text-success my-0">
											<p class="card-text text-center"><b>Solo para propietarios:</b> Publicamos la visita virtual de tu inmueble en nuestra plataforma y en nuestras redes sociales, sin ningún tipo de coste adicional.</p>
											<!--<p class="card-text text-center">Comprando una visita virtual te realizamos una presentación virtual(del mismo inmueble) en venta también (sin coste adicional).</p>-->
											<!--<p class="card-text text-center"><b>Nota</b>: En el caso de no interesarte disponer de la vista virtual después de una semana, sin problemas, borramos todo el material realizado sin ningún tipo de indemnización o compromiso.</p>-->
										
										</div>	 
							
							
						<!-- <div class="row mt-0">
							<div class="col-md-1">
							</div>
							
							<div class="col-md-10 ml-2">
																<ul class="ml-0 mt-3">
<span id="dots3"></span><span id="more4">
								<li class="ml-0"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > <b>La mayoría de los inquilinos huyen de las inmobiliarias</b></h5></li> 
								<li class="ml-5" style="list-style:none;"><h5 class="display-5">En Iamoving no publicamos agencias ni intermediarios, somos una referencia a todos los inquilinos que no quieren alquilar a través de las inmobiliarias. De este modo, los inquilinos pueden encontrar fácilmente los pisos de particulares en nuestra plataforma, ya que tu anuncio no estará mezclado entre miles de agencias, como suele pasar en los portales.</h5></li>
								  <li class="ml-0"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > <b>Sin comisiones a los inquilinos</b></h5></li>
								  <li class="ml-5" style="list-style:none;"><h5 class="display-5" >No va a estar encareciendo costes al inquilino, aumentando tu demanda de interesados.</h5></li>
								  <li class="ml-0"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > <b>Los inquilinos saben que no cobramos comisión al propietario</b></h5></li>
								  <li class="ml-5" style="list-style:none;"><h5 class="display-5" >⦁	No recibimos ninguna comisión del propietario, de este modo, nuestros usuarios saben que el propietario no incrementa el precio de la renta para cubrir las comisiones de agencias, plataformas o intermediarios, como de costumbre.</h5></li>								  
								  <li class="ml-0"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > <b>De particular a particular</b></h5></li>
								  <li class="ml-5" style="list-style:none;"><h5 class="display-5" >La ventaja de negociar directamente con la parte interesada es que el interés de la negociación es tuyo y no del intermediario. De esta forma el proceso se vuelve más transparente y económico, ya que no hay comisiones.</b>.</h5></li>								  
</span>								
								<p class="mt-2 card-text text-center">
										<button class="btn-dark" style="color:yellow;" onclick="myFunction3()" id="myBtn3">Ver más..</button>
									</p>
							</ul>	
							</div>
														
							<div class="col-md-1">
							</div>
										
						</div>-->
						</div>
						</div>
						 <!--<div class="row mt-5">
							<div class="col-md-4">
							</div>
							<div class="col-md-4">
							  <div class="pricing-box">
							  <p class="ml-4 text-center"><img src="/img/diana.png"  width="70" height="70" style="margin-bottom:10px;" alt="diana"></p>
							  <h4 class="text-center mb-4"><b>¿QUÉ CONSEGUIMOS?</b></h4>
							  </div>
							</div>
							<div class="col-md-4">
							</div>
						  </div>-->
					<!--	<div class="row mt-5">
							<div class="col-md-4">
							</div>
							<div class="col-md-4">
							  <div class="pricing-box">
							  <p class="ml-0 text-center"><img src="/img/diana.png"  width="70" height="70" style="margin-bottom:10px;" alt="diana"></p>
							  <h4 class="text-center mb-4"><b>¿QUÉ CONSEGUIMOS?</b></h4>
							  </div>
							</div>
							<div class="col-md-4">
							</div>
						  </div>
						  
						 <div class="row mt-0">
							<div class="col-md-4">
							</div>
							<div class="col-md-5 ml-3  d-none d-sm-none d-md-block">
								<ul class="ml-5">
								  <li class="ml-5"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Ahorramos el bien más valioso, tu tiempo <a  @click.prevent="modalAhorra"><img src="/img/info_iamoving.png"  width="15" height="15" style="margin-bottom:5px;" alt="info"></a></h5></li>
								  <li class="ml-5"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Aumentamos por 11 tus posibilidades de reservas <a  @click.prevent="modalAumentaArriba"><img src="/img/info_iamoving.png"  width="15" height="15" style="margin-bottom:5px;" alt="info"></a></h5></li>
								  <li class="ml-5"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" >Sin comisiones y evitamos gastos innecesarios en este proceso <a  @click.prevent="modalEvita"><img src="/img/info_iamoving.png"  width="15" height="15" style="margin-bottom:5px;" alt="info"></a></h5></li>
								</ul>
							  
							</div>
							<div class="col-sm-5  d-block d-sm-block d-md-none">
							  <div class="pricing-box">
								<ul class="ml-4">
								  <li class="ml-0"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Ahorramos el bien más valioso, tu tiempo <a  @click.prevent="modalAhorra"><img src="/img/info_iamoving.png"  width="15" height="15" style="margin-bottom:5px;" alt="info"></a></h5></li>
								  <li class="ml-0"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Aumentamos por 11 tus posibilidades de reservas <a  @click.prevent="modalAumentaArriba"><img src="/img/info_iamoving.png"  width="15" height="15" style="margin-bottom:5px;" alt="info"></a></h5></li>
								  <li class="ml-0"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Sin comisiones y evitamos gastos innecesarios en este proceso <a  @click.prevent="modalEvita"><img src="/img/info_iamoving.png"  width="15" height="15" style="margin-bottom:5px;" alt="info"></a></h5></li>
								</ul>
							  </div>
							</div>							
							<div class="col-md-3">
							</div>
						</div>	-->					  
							<!--<div class="container my-0">
								  <div class="row mt-5">
									<div class="col-md-2">
									</div>
							
								<div class="col-md-8 text-center mb-3">
												<img src="/img/free_iamoving.png"  width="70" height="70" style="margin-bottom:10px;" alt="free">
										</div>
									<div class="col-md-2">
									</div>
								</div>						
										<<div class="section-title text-center my-0"  style="padding-top: 0px;padding-bottom: 0px;">
											<h4 class="text-center mb-0"><b>GRATIS</b></h4>
										</div>					
										<h5 class="mb-4 text-center mt-0"><b>ANUNCIO GRATIS EN IAMOVING  Y SIN COMISIONES PARA INQUILINOS Y PROPIETARIOS.</b></h5>

										
							</div>-->
       <div class="container my-0 mt-4">
		     <div class="row mt-3 mb-3">
				<div class="col-md-4">
				</div>
			<div class="col-md-4">
				
			<div class="section-title text-center" style="margin-bottom:0px;">
                <h3 class="font-weight-bold subtitle_feature text-center" >SERVICIOS ADICIONALES</h3>
            </div>												
			</div>
							<div class="col-md-4">
				</div>
		</div>
												
				<!--<div  class="container my-0">
					<div class="row  justify-content-center">
						<div class="col-12">
							<p class="my-3"></p>
							<p class="ml-4 text-center"  style="margin-bottom: 0rem;"><img src="/img/estudio.solvencia.png"  width="70" height="70" style="margin-bottom:0px;" alt="lista"></p>
							<p class="my-1">
							  <button type="button" class="btn btn-dark btn-lg btn-block border-dark dropdown-toggle"  data-toggle="collapse" 
							  data-target="#collapseExample4" aria-expanded="false" aria-controls="collapseExample4" aria-haspopup="true" 
							  style="font-weight:bold;color:#EADD1B;border-radius:0%; !important;;outline:none !important;outline-width: 0 !important; box-shadow: none;-moz-box-shadow: none;-webkit-box-shadow: none;" >
							  ESTUDIO DE SOLVENCIA
							  </button>
							</p>
							<div class="collapse  my-0" id="collapseExample4">
							  <div class="card bg-transparent border-dark my-0">
									  <div class="card-body text-success my-0">
											  <h2 class="card-text text-center">Me encantó la visita, pero ¿puedo verificar si la parte interesada es confiable?</h2>
											  <p class="card-text text-center"><b>Sí, a través de un análisis de solvencia</b>, verificamos y eliminamos:</p>
						 <div class="row mt-0">
							<div class="col-md-3">
							</div>
							<div class="col-md-7 ml-1  d-none d-sm-none d-md-block">
								<ul class="ml-0">
								  <li class="ml-0"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > <b>Inquilinos insolventes</b>, cuyos sus ingresos o su situación laboral no son suficientes para afrontar el pago del alquiler.</h5></li> 
								  <li class="ml-0"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > <b>Inquilino fraudulento</b>, que falsifica su documentación laboral, contratos, nóminas para parecer solvente.</h5></li>
								  <li class="ml-0"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > <b>Inquilino moroso</b>, tiene solvencia económica pero no cumple con sus obligaciones de pago, algunos incluso van de piso en piso sin pagar el alquiler, como un estilo de vida.</h5></li>
								</ul>
							</div>
							<div class="col-sm-5  d-block d-sm-block d-md-none">
							  <div class="pricing-box">
								<ul class="ml-2">
								  <li class="ml-0"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > <b>Inquilinos insolventes</b>, cuyos sus ingresos o su situación laboral no son suficientes para afrontar el pago del alquiler.</h5></li>
								  <li class="ml-0"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > <b>Inquilino fraudulento</b>, que falsifica su documentación laboral, contratos, nóminas para parecer solvente.</h5></li>
								  <li class="ml-0"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > <b>Inquilino moroso</b>, tiene solvencia económica pero no cumple con sus obligaciones de pago, algunos incluso van de piso en piso sin pagar el alquiler, como un estilo de vida.</h5></li>
								</ul>
							  </div>
							</div>							
							<div class="col-md-2">
							</div>
						</div>
					<div class="row mt-3 mb-3">
					<div class="col-md-4">
					</div>
					<div class="col-md-4">
					  <div class="text-center">
								   <button type="button" class="btn btn-dark btn-lg btn-block border-dark" 
							   aria-haspopup="true" 
							   style="font-weight:bold;color:#EADD1B;border-radius:0%; !important;;outline:none !important;outline-width: 0 !important; box-shadow: none;-moz-box-shadow: none;-webkit-box-shadow: none;" >
												  PRECIO
							  </button>
								  <div class="card card-body bg-transparent border-dark">
										<div class="card-body text-success">
										  <p class="card-text text-center"><b>30€</b> <img src="/img/info.png" title="+iva" rel="tooltip"  id="blah3"  width="15" height="15" style="margin-bottom:5px;" alt="info"></p>

										</div>
								  </div>
					  </div>
					</div>
					<div class="col-md-5">
					</div>
				  </div>						
						  <p class="card-text text-center">
												<div class="row" >											
													<div class="col-sm-4">
													<p class="card-text text-center"></p>
													</div>
													<div class="col-sm-4">
													<p class="card-text text-center"><b>Solo para viajeros o inquilinos españoles</b></p>
													</div>												
													<div class="col-sm-4">
													<p class="card-text text-center"></p>
													</div>			
												</div>
											  </p>	
											<p class="my-2 text-center">
												<button type="button" id="btn_solvencia" name="btn_solvencia" class="btn btn-iamoving btn-lg" style="color:default;" data-toggle="modal" data-target="#modalAnuncia">Infórmate Gratis</button>
											</p>
									  </div>					
								</div>
							 </div>					  
						</div> 			
					</div>-->	
					<div class="row  justify-content-center">
						<div class="col-12">
							<p class="my-3"></p>
							
							<p class="ml-4 text-center"  style="margin-bottom: 0rem;"><img src="/img/secure.payment.png"  width="70" height="70" style="margin-bottom:0px;" alt="lista"></p>
							<p class="my-1">
							  <button type="button" class="btn btn-dark btn-lg btn-block border-dark dropdown-toggle"  data-toggle="collapse" 
							  data-target="#collapseExample5" aria-expanded="false" aria-controls="collapseExample5" aria-haspopup="true" 
							  style="font-weight:bold;color:#EADD1B;border-radius:0%; !important;;outline:none !important;outline-width: 0 !important; box-shadow: none;-moz-box-shadow: none;-webkit-box-shadow: none;" >
							  ME ENCANTÓ LA VISITA, PAGO SEGURO
							  </button>
							</p>
							<div class="collapse  my-0" id="collapseExample5">
							  <div class="card bg-transparent border-dark my-0">
									  <div class="card-body text-success my-0">
											  
											  <p class="card-text text-center">Es el momento de recibir el pago del viajero, haga a través de la plataforma y evitamos fraudes, estafas que pueden ocurrir en este proceso.</p>
		     <div class="row mt-3 mb-3">
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
          <div class="text-center">
		  			   <button type="button" class="btn btn-dark btn-lg btn-block border-dark" 
				   aria-haspopup="true" 
				   style="font-weight:bold;color:#EADD1B;border-radius:0%; !important;;outline:none !important;outline-width: 0 !important; box-shadow: none;-moz-box-shadow: none;-webkit-box-shadow: none;" >
				   <!--style="cursor:default;border-radius:0%; !important;outline:none !important;				   outline-width: 0 !important; box-shadow: none;-moz-box-shadow: none;-webkit-box-shadow: none;color:#EADD1B;">-->
				  				      PRECIO
			      </button>
					  <div class="card card-body bg-transparent border-dark">
							<div class="card-body text-success">
							  <p class="card-text text-center"><b>20€</b> <img src="/img/info.png" title="+iva" rel="tooltip"  id="blah3"  width="15" height="15" style="margin-bottom:5px;" alt="info"></p>
							  <!--<p class="card-text text-center">Pack de 5...<b>75€</b> <img src="/img/info.png"  title="Cada epago seguro te sale a 15€" rel="tooltip"  id="blah5" width="15" height="15" style="margin-bottom:5px;" alt="info"></p>
							  <p class="card-text text-center">Pack de 10...<b>100€</b> <img src="/img/info.png"  title="Cada pago seguro te sale a 10€" rel="tooltip"  id="blah6" width="15" height="15" style="margin-bottom:5px;" alt="info"></p>-->
							</div>
					  </div>
          </div>
        </div>
        <div class="col-md-5">
        </div>
      </div>	
											 <!-- <p class="card-text text-center">
												<div class="row" >											
													<div class="col-sm-4">
													<p class="card-text text-center"><b>1 pago seguro 20 €</b></p>
													</div>
													<div class="col-sm-4">
													<p class="card-text text-center"><b>Pack de 5 75 €</b> <img src="/img/info.png"  title="Cada epago seguro te sale a 15€" rel="tooltip"  id="blah5" width="15" height="15" style="margin-bottom:5px;" alt="info"></p>
													</div>												
													<div class="col-sm-4">
													<p class="card-text text-center"><b>Pack de 10 100 €</b> <img src="/img/info.png"  title="Cada pago seguro te sale a 10€" rel="tooltip"  id="blah6" width="15" height="15" style="margin-bottom:5px;" alt="info"></p>
													</div>			
												</div>
											  </p>	-->										  
											<p class="my-2 text-center">
												<button type="button" id="btn_pago" name="btn_pago" class="btn btn-iamoving btn-lg" style="color:default;" data-toggle="modal" data-target="#modalAnuncia">Infórmate Gratis</button>
											</p>
									  </div>					
								</div>
							 </div>					  
						</div> 			
					</div>
				<!--	<div class="row  justify-content-center">
						<div class="col-12">
							<p class="my-3"></p>
							<p class="ml-4 text-center"  style="margin-bottom: 0rem;"><img src="/img/playa.png"  width="70" height="70" style="margin-bottom:0px;" alt="visita_virtual"></p>
							<p class="my-1">
							  <button type="button" class="btn btn-dark btn-lg btn-block border-dark dropdown-toggle"  data-toggle="collapse" 
							  data-target="#collapseExample41" aria-expanded="false" aria-controls="collapseExample41" aria-haspopup="true" 
							  style="font-weight:bold;color:#EADD1B;border-radius:0%; !important;;outline:none !important;outline-width: 0 !important; box-shadow: none;-moz-box-shadow: none;-webkit-box-shadow: none;" >
							  PRIMERA VISITA VIRTUAL
							  </button>
							</p>
							<div class="collapse  my-0" id="collapseExample41">
							  <div class="card bg-transparent border-dark my-0">
									  <div class="card-body text-success my-0">
											  <h2 class="card-text text-center">¿ERES PROFESIONAL O PROPIETARIO?</h2>
											  <p class="card-text text-center">MEJORAMOS TU FORMA DE ALQUILAR Y VENDER</p>
							<div class="card-body text-success my-0" style="padding: 0.5rem;">						  
						  	<p class="card-text text-center mb-4">De esta manera, nadie pierde el tiempo visitando o recibiendo visitas que no aportan nada, el inquilino o el comprador solo visitan los inmuebles que realmente les interesan y reducen las molestias filtrando visitas de curiosos.</p>
							<h4 class="text-center mb-4"><b>+ de 600 VISITAS VIRTUALES REALIZADAS</b></h4>
							<p class="card-text text-center mb-4">Nuestra experiencia ha demostrado que, por diversas razones nuestro formato es más realista y efectivo que los anuncios tradicionales, donde solo se muestran una serie de fotografías de ciertos espacios e información muy básica sobre la propiedad.</p>
						  </div>
						   <div class="row mt-1">
							<div class="col-md-4">
							</div>
							<div class="col-md-4">
							  <div class="pricing-box">
							 <p class="ml-0 text-center"><img src="/img/mobile.png"  width="70" height="70" style="margin-bottom:10px;" alt="diana"></p>
							  <h4 class="text-center mb-4"><b>¿CÓMO FUNCIONA?</b></h4>
							  </div>
							</div>
							<div class="col-md-4">
							</div>
						  </div>
										<div class="row  justify-content-center align-items-center">
											<div class="container">
												<div class="row">
													<div class="col-md-12">
														<div class="card">
															<nav class="nav nav-pills nav-justified border-bottom" role="tablist">
																<a class="nav-item nav-link active" href="#tab1" data-toggle="tab"
																	role="tab" aria-controls="tab1" aria-selected="true">
																	<span class="display-4 d-block">1</span>
																	
																</a>
																<a class="nav-item nav-link" href="#tab2" data-toggle="tab"
																	role="tab" aria-controls="tab2" aria-selected="false">
																	<span class="display-4 d-block">2</span>
																	
																</a>

															<a class="nav-item nav-link" href="#tab4" data-toggle="tab"
																	role="tab" aria-controls="tab4" aria-selected="false">
																	<span class="display-4 d-block">3</span>
																	
																</a>
															</nav>

															<div class="tab-content">
																<div role="tabpanel" class="tab-pane active" id="tab1">	
																	<div class="my-0" id="collapseExample3">
																	  <div class="card  bg-transparent border-dark my-0">
																			  <div class="card-body text-success  my-0">
																				<h5 class="display-5 text-center text-center my-1" >1-Vamos a la propiedad, tomamos fotos, medidas y creamos un video que simula la experiencia de visitar físicamente el inmueble y los alrededores.</h5>

																			  </div>					
																		  </div>
																	  </div>			  
									  
																</div>

																<div role="tabpanel" class="tab-pane" id="tab2">

																	<div class="my-0" id="collapseExample3">
																	  <div class="card  bg-transparent border-dark my-0">
																			  <div class="card-body text-success  my-0">
																				<h5 class="display-5 text-center text-center my-1" >2-<b>En los Portales inmobiliarios o en otros canales</b>: podrás subir directamente todas las imágenes que hemos realizado en tu propio anuncio que ya está publicado en los portales, <b>ganando más posicionamiento y visibilidad</b>.</h5>
																			  </div>					
																		  </div>
																	  </div>												
																</div>
																<div role="tabpanel" class="tab-pane" id="tab3">
																</div>
																
																<div role="tabpanel" class="tab-pane" id="tab4">	
																	<div class="my-0" id="collapseExample3">
																	  <div class="card  bg-transparent border-dark my-0">
																			  <div class="card-body text-success  my-0">
																				<h5 class="display-5 text-center text-center my-1" >3-Envia por WhatsApp o correo electrónico la visita virtual a todos los interesados que contacten contigo a través de tus anuncios.</h5>
																			  </div>					
																		  </div>
																	  </div>	
													
																</div>	

													
															</div>
														</div>
													</div>
												</div>
											</div>
										
										</div>						  
						   <div class="row mt-3">
							<div class="col-md-4">
							</div>
							<div class="col-md-4">
							  <div class="pricing-box">
							 <p class="ml-0 text-center"><img src="/img/diana.png"  width="70" height="70" style="margin-bottom:10px;" alt="diana"></p>
							  <h4 class="text-center mb-4"><b>¿QUÉ CONSEGUIMOS?</b></h4>
							  </div>
							</div>
							<div class="col-md-4">
							</div>
						  </div>
						  
						 <div class="row mt-0">
							<div class="col-md-1">
							</div>
							
							<div class="col-md-10 ml-2">
							
								<ul class="ml-0">
								  <li class="ml-0"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > <b>Aumentamos tus posibilidades de alquilar o vender:</b> ya que hay muchos compradores e inquilinos que solo van a visitar un piso cuando lo tienen claro que les gusta online.</h5></li> 
								  <li class="ml-0"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > <b>Sin contar</b> la importancia de la visita virtual a los inversores, expatriados, estudiantes o turistas que se encuentran en otras provincias o incluso en otros países.</h5></li>
								  <li class="ml-0"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > <b>Ahorramos muchísimo tiempo y dinero:</b> vender o alquilar un piso solo con fotografías, suele generar miles de vistas que no aportan en nada. Evitamos incontables visitas frustradas.</h5></li>
								</ul>
							
							</div>
							
						
							<div class="col-md-1">
							</div>
						</div>
											 <div class="row mt-2 mb-3">
												<div class="col-md-4">
												</div>
												<div class="col-md-4">
												  <div class="text-center">
															   <button type="button" class="btn btn-iamoving btn-lg btn-block border-warning" 
														   aria-haspopup="true" style="cursor:default;border-radius:0%; !important;outline:none !important;outline-width: 0 !important; box-shadow: none;-moz-box-shadow: none;-webkit-box-shadow: none;">
																			  <b>PRECIO</b>
														  </button>
															  <div class="card card-body bg-transparent border-warning">
																	<div class="card-body text-success">
																	<p class="card-text text-center">Pago único, sin tarifa de renovación y de manera ilimitada</p>
																	  <p class="card-text text-center">1 visita virtual.......<b>45€</b></p>
																	  <p class="card-text text-center">Pack de 5.....<b>200€</b> <img src="/img/info.png" title="Cada visita te sale a 40€" rel="tooltip"  id="blah1"  width="15" height="15" style="margin-bottom:5px;" alt="info"></p>
																	  <p class="card-text text-center">Pack de 10....<b>350€</b> <img src="/img/info.png"  title="Cada visita te sale a 35€" rel="tooltip"  id="blah2"    width="15" height="15" style="margin-bottom:5px;" alt="info"></p>
																	</div>
															  </div>
												  </div>
												</div>
												<div class="col-md-5">
												</div>
											  </div>
										<div class="text-success my-1">
											<p class="card-text text-center"><b>Aviso importante:</b> Entregamos el vídeo original en alta definición (HD) con una resolución de 1920x1080 píxeles, sin comprimir, con la máxima calidad. (Si quieres, entregamos todas las imágenes y vídeo sin marcas de agua y sin mencionar el nombre de “IAMOVING”, permitiendo a nuestros clientes la libertad de usarlo como mejor les parezca)</p>
										</div>	 											  
										<div class="text-success my-4">
											<p class="card-text text-center"><b>Solo para propietarios:</b> Comprando una visita virtual, publicamos de manera gratuita tu inmueble en nuestra plataforma IAMOVING, si lo deseas.</p>
										</div>	 	 
											<p class="my-2 text-center">
												
												<button type="button" id="btn_inquilino" name="btn_inquilino" class="btn btn-iamoving btn-lg" style="color:default;" data-toggle="modal" data-target="#modalAnuncia">Infórmate Gratis</button>
												
											</p>						
						
									  </div>					
								</div>
							 </div>					  
						</div> 			
					</div>-->
					<div class="row  justify-content-center">
						<div class="col-12">
							<p class="my-3"></p>
							<p class="ml-4 text-center"  style="margin-bottom: 0rem;"><img src="/img/plano.png"  width="70" height="70" style="margin-bottom:0px;" alt="plano"></p>
							<p class="my-0">
							  <button type="button" class="btn btn-dark btn-lg btn-block border-dark dropdown-toggle"  data-toggle="collapse" 
							  data-target="#collapseExample13" aria-expanded="false" aria-controls="collapseExample13" aria-haspopup="true" 
							  style="font-weight:bold;color:#EADD1B;border-radius:0%; !important;;outline:none !important;outline-width: 0 !important; box-shadow: none;-moz-box-shadow: none;-webkit-box-shadow: none;" >
							  PLANO
							  </button>
							</p>
							<div class="collapse  my-0" id="collapseExample13">
							  <div class="card bg-transparent border-dark my-0">
									  <div class="card-body text-success my-0">
											  <!--<h2 class="card-text text-center">Realizamos visitas</h2>-->
											  <p class="card-text text-center">Agrega un plano a tu visita virtual y ayude a los inquilinos y compradores a visualizar mejor tu propiedad, aumentando tus posibilidades.</p>
								 <div class="row mt-3 mb-3">
									<div class="col-md-4">
									</div>
									<div class="col-md-4">
									  <div class="text-center">
												   <button type="button" class="btn btn-dark btn-lg btn-block border-dark" 
											   aria-haspopup="true" 
											   style="font-weight:bold;color:#EADD1B;border-radius:0%; !important;;outline:none !important;outline-width: 0 !important; box-shadow: none;-moz-box-shadow: none;-webkit-box-shadow: none;" >
											   <!--style="cursor:default;border-radius:0%; !important;outline:none !important;				   outline-width: 0 !important; box-shadow: none;-moz-box-shadow: none;-webkit-box-shadow: none;color:#EADD1B;">-->
																  PRECIO
											  </button>
												  <div class="card card-body bg-transparent border-dark">
														<div class="card-body text-success">
														  <p class="card-text text-center">Inmueble hasta 50m<sup>2</sup>...<b>45€</b></p>
														  <p class="card-text text-center" style="font-size: 15px;">· Inmuebles con más de 50m<sup>2</sup> se suma 0,30€ por cada m<sup>2</sup></p>
														</div>
												  </div>
									  </div>
									</div>
									<div class="col-md-5">
									</div>
								</div>								
									  
											<p class="my-2 text-center">
												<button type="button" id="btn_plano" name="btn_plano" class="btn btn-iamoving btn-lg" style="color:default;" data-toggle="modal" data-target="#modalAnuncia">Infórmate Gratis</button>
											</p>
									  </div>					
								</div>
							 </div>					  
						</div> 
					</div>						
					<div class="row  justify-content-center">
						<div class="col-12">
							<p class="my-3"></p>
							<p class="ml-4 text-center" style="margin-bottom: 0.1rem;"><img src="/img/contrato.png"  width="70" height="70" style="margin-bottom:0px;" alt="legal"></p>
							<p class="my-0">
							
							  <button type="button" class="btn btn-dark btn-lg btn-block border-dark dropdown-toggle"  data-toggle="collapse" 
							  data-target="#collapseExample1" aria-expanded="false" aria-controls="collapseExample1" aria-haspopup="true" 
							  style="font-weight:bold;color:#EADD1B;border-radius:0%; !important;;outline:none !important;outline-width: 0 !important; box-shadow: none;-moz-box-shadow: none;-webkit-box-shadow: none;" >
							  REDACCIÓN DE CONTRATOS 
							  </button>
							</p>
							<div class="collapse  my-0" id="collapseExample1">
							  <div class="card  bg-transparent border-dark my-0">
									  <div class="card-body text-success  my-0">
											  <p class="card-text text-center">Si lo necesita, hacemos el contrato de alquiler y te ayudaremos con todas tus dudas, preguntas o cláusulas que desee incluir, te ofrecemos asistencia legal personalizada.</p>
		     <div class="row mt-3 mb-3">
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
          <div class="text-center">
		  			   <button type="button" class="btn btn-dark btn-lg btn-block border-dark" 
				   aria-haspopup="true" 
				   style="font-weight:bold;color:#EADD1B;border-radius:0%; !important;;outline:none !important;outline-width: 0 !important; box-shadow: none;-moz-box-shadow: none;-webkit-box-shadow: none;" >
				   <!--style="cursor:default;border-radius:0%; !important;outline:none !important;				   outline-width: 0 !important; box-shadow: none;-moz-box-shadow: none;-webkit-box-shadow: none;color:#EADD1B;">-->
				  				      PRECIO
			      </button>
					  <div class="card card-body bg-transparent border-dark">
							<div class="card-body text-success">
							  <p class="card-text text-center"><b>50€</b> <img src="/img/info.png" title="+iva" rel="tooltip"  id="blah3"  width="15" height="15" style="margin-bottom:5px;" alt="info"></p>
							  <!--<p class="card-text text-center">Pack de 5...<b>225€</b> <img src="/img/info.png"  title="Cada redacción de contrato te sale a 45€" rel="tooltip"  id="blah3" width="15" height="15" style="margin-bottom:5px;" alt="info"></p>
							  <p class="card-text text-center">Pack de 10...<b>400€</b> <img src="/img/info.png"  title="Cada redacción de contrato te sale a 40€" rel="tooltip"  id="blah4" width="15" height="15" style="margin-bottom:5px;" alt="info"></p>-->
							</div>
					  </div>
          </div>
        </div>
        <div class="col-md-5">
        </div>
      </div>												
											 <!-- <p class="card-text text-center">
												<div class="row" >											
													<div class="col-sm-4">
													<p class="card-text text-center"><b>1 redacción de contrato 50 €</b></p>
													</div>
													<div class="col-sm-4">
													<p class="card-text text-center"><b>Pack de 5 225 €</b> <img src="/img/info.png"  title="Cada redacción de contrato te sale a 45€" rel="tooltip"  id="blah3" width="15" height="15" style="margin-bottom:5px;" alt="info"></p>
													</div>												
													<div class="col-sm-4">
													<p class="card-text text-center"><b>Pack de 10 400 €</b> <img src="/img/info.png"  title="Cada redacción de contrato te sale a 40€" rel="tooltip"  id="blah4" width="15" height="15" style="margin-bottom:5px;" alt="info"></p>
													</div>			
												</div>
											  </p>	-->
											<p class="my-2 text-center">
												<button type="button" id="btn_contrato" name="btn_contrato" class="btn btn-iamoving btn-lg" style="color:default;" data-toggle="modal" data-target="#modalAnuncia">Infórmate Gratis</button>
											</p>
									  </div>					
							  </div>
							</div>					  
						</div>                  
					</div>
					<div class="row  justify-content-center">
						<div class="col-12">
							<p class="my-3"></p>
						
							<p class="ml-4 text-center"  style="margin-bottom: 0.1rem;"><img src="/img/inventario.new.png"  width="80" height="70" style="margin-bottom:0px;" alt="inventario"></p>
							<p class="my-0">
							  <button type="button" class="btn btn-dark btn-lg btn-block border-dark dropdown-toggle"  data-toggle="collapse" 
							  data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample2" aria-haspopup="true" 
							  style="font-weight:bold;color:#EADD1B;border-radius:0%; !important;;outline:none !important;outline-width: 0 !important; box-shadow: none;-moz-box-shadow: none;-webkit-box-shadow: none;" >
							  INVENTARIO DE BIENES Y MUEBLES 
							  </button>
							</p>
							<div class="collapse  my-0" id="collapseExample2">
							  <div class="card bg-transparent border-dark my-0">
									  <div class="card-body text-success my-0">
											  <p class="card-text text-center">Fotos, videos y un informe detallado del interior de la propiedad, es la forma más efectiva de controlar todo cuando se alquilará. Ahorro de malentendidos y frustraciones económicas al final del contrato.</p>
<div class="row mt-3 mb-3">
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
          <div class="text-center">
		  			   <button type="button" class="btn btn-dark btn-lg btn-block border-dark" 
				   aria-haspopup="true" 
				   style="font-weight:bold;color:#EADD1B;border-radius:0%; !important;;outline:none !important;outline-width: 0 !important; box-shadow: none;-moz-box-shadow: none;-webkit-box-shadow: none;" >
				   <!--style="cursor:default;border-radius:0%; !important;outline:none !important;				   outline-width: 0 !important; box-shadow: none;-moz-box-shadow: none;-webkit-box-shadow: none;color:#EADD1B;">-->
				  				      PRECIO
			      </button>
					  <div class="card card-body bg-transparent border-dark">
							<div class="card-body text-success">
							  <p class="card-text text-center"><b>45€</b> <img src="/img/info.png" title="+iva" rel="tooltip"  id="blah3"  width="15" height="15" style="margin-bottom:5px;" alt="info"></p>
							  <!--<p class="card-text text-center">Pack de 5...<b>200€</b> <img src="/img/info.png"  title="Cada inventario te sale a 40€" rel="tooltip"  id="blah3" width="15" height="15" style="margin-bottom:5px;" alt="info"></p>
							  <p class="card-text text-center">Pack de 10..<b>350€</b> <img src="/img/info.png"  title="Cada inventario te sale a 35€" rel="tooltip"  id="blah4" width="15" height="15" style="margin-bottom:5px;" alt="info"></p>-->
							</div>
					  </div>
          </div>
        </div>
        <div class="col-md-5">
        </div>
      </div>												  
											<!--  <p class="card-text text-center">
												<div class="row" >											
													<div class="col-sm-4">
													<p class="card-text text-center"><b>1 inventario 45 €</b></p>
													</div>
													<div class="col-sm-4">
													<p class="card-text text-center"><b>Pack de 5 200 €</b> <img src="/img/info.png"  title="Cada inventario te sale a 40€" rel="tooltip"  id="blah3" width="15" height="15" style="margin-bottom:5px;" alt="info"></p>
													</div>												
													<div class="col-sm-4">
													<p class="card-text text-center"><b>Pack de 10 350 €</b> <img src="/img/info.png"  title="Cada inventario te sale a 35€" rel="tooltip"  id="blah4" width="15" height="15" style="margin-bottom:5px;" alt="info"></p>
													</div>			
												</div>
											  </p>	-->										  
											<p class="my-2 text-center">
												<button type="button" id="btn_inmueble" name="btn_inmueble" class="btn btn-iamoving btn-lg" style="color:default;" data-toggle="modal" data-target="#modalAnuncia">Infórmate Gratis</button>
											</p>
									  </div>					
								</div>
							 </div>					  
						</div>                  
					</div>					
					<div class="row  justify-content-center">
						<div class="col-12">
							<p class="my-3"></p>
							
							<p class="ml-4 text-center"  style="margin-bottom: 0rem;"><img src="/img/openhouse.png"  width="70" height="70" style="margin-bottom:0px;" alt="lista"></p>
							<p class="my-0">
							  <button type="button" class="btn btn-dark btn-lg btn-block border-dark dropdown-toggle"  data-toggle="collapse" 
							  data-target="#collapseExample3" aria-expanded="false" aria-controls="collapseExample3" aria-haspopup="true" 
							  style="font-weight:bold;color:#EADD1B;border-radius:0%; !important;;outline:none !important;outline-width: 0 !important; box-shadow: none;-moz-box-shadow: none;-webkit-box-shadow: none;" >
							  OPEN HOUSE
							  </button>
							</p>
							<div class="collapse  my-0" id="collapseExample3">
							  <div class="card bg-transparent border-dark my-0">
									  <div class="card-body text-success my-0">
											  <h2 class="card-text text-center">Realizamos visitas</h2>
											  <p class="card-text text-center">Entendemos que le puede resultar difícil realizar visitas, si está muy ocupado o si no está cerca de la propiedad, lo ayudaremos con las visitas. El tiempo disponible para cada visita será de una hora, lo que significa que puede concertar varias visitas agregando una visita.</p>
		     <div class="row mt-3 mb-3">
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
          <div class="text-center">
		  			   <button type="button" class="btn btn-dark btn-lg btn-block border-dark" 
				   aria-haspopup="true" 
				   style="font-weight:bold;color:#EADD1B;border-radius:0%; !important;;outline:none !important;outline-width: 0 !important; box-shadow: none;-moz-box-shadow: none;-webkit-box-shadow: none;" >
				   <!--style="cursor:default;border-radius:0%; !important;outline:none !important;				   outline-width: 0 !important; box-shadow: none;-moz-box-shadow: none;-webkit-box-shadow: none;color:#EADD1B;">-->
				  				      PRECIO
			      </button>
					  <div class="card card-body bg-transparent border-dark">
							<div class="card-body text-success">
							  <p class="card-text text-center"><b>25€</b> <img src="/img/info.png" title="+iva" rel="tooltip"  id="blah3"  width="15" height="15" style="margin-bottom:5px;" alt="info"></p>
							  <!--<p class="card-text text-center">Pack de 5...<b>100€</b> <img src="/img/info.png"  title="Cada visita te sale a 20€" rel="tooltip"  id="blah5" width="15" height="15" style="margin-bottom:5px;" alt="info"></p>
							  <p class="card-text text-center">Pack de 10..<b>150€</b> <img src="/img/info.png"  title="Cada visita te sale a 15€" rel="tooltip"  id="blah6" width="15" height="15" style="margin-bottom:5px;" alt="info"></p>-->
							</div>
					  </div>
          </div>
        </div>
        <div class="col-md-5">
        </div>
      </div>											  
											<!--  <p class="card-text text-center">
												<div class="row" >											
													<div class="col-sm-4">
													<p class="card-text text-center"><b>1 visita 25 €</b></p>
													</div>
													<div class="col-sm-4">
													<p class="card-text text-center"><b>Pack de 5 100 €</b> <img src="/img/info.png"  title="Cada visita te sale a 20€" rel="tooltip"  id="blah5" width="15" height="15" style="margin-bottom:5px;" alt="info"></p>
													</div>												
													<div class="col-sm-4">
													<p class="card-text text-center"><b>Pack de 10 150 €</b> <img src="/img/info.png"  title="Cada visita te sale a 15€" rel="tooltip"  id="blah6" width="15" height="15" style="margin-bottom:5px;" alt="info"></p>
													</div>			
												</div>
											  </p>		-->									  
											<p class="my-2 text-center">
												<button type="button" id="btn_open" name="btn_open" class="btn btn-iamoving btn-lg" style="color:default;" data-toggle="modal" data-target="#modalAnuncia">Infórmate Gratis</button>
											</p>
									  </div>					
								</div>
							 </div>					  
						</div> 			
					</div>
									
					<div class="row  justify-content-center">
						<div class="col-12">
							<p class="my-3"></p>
							
							<p class="ml-4 text-center"  style="margin-bottom: 0rem;"><img src="/img/traductor.png"  width="70" height="70" style="margin-bottom:0px;" alt="lista"></p>
							<p class="my-1">
							  <button type="button" class="btn btn-dark btn-lg btn-block border-dark dropdown-toggle"  data-toggle="collapse" 
							  data-target="#collapseExample6" aria-expanded="false" aria-controls="collapseExample6" aria-haspopup="true" 
							  style="font-weight:bold;color:#EADD1B;border-radius:0%; !important;;outline:none !important;outline-width: 0 !important; box-shadow: none;-moz-box-shadow: none;-webkit-box-shadow: none;" >
							  IAMOVING TRADUCTOR 
							  </button>
							</p>
							<div class="collapse  my-0" id="collapseExample6">
							  <div class="card bg-transparent border-dark my-0">
									  <div class="card-body text-success my-0">
											  <p class="card-text text-center">La comunicación en el proceso de alquiler de una propiedad es esencial, si necesita un intérprete de idiomas, podemos proporcionarle un intérprete personal durante la visita, ayudando con tus dudas, preguntas y negociación, todo será más fácil y claro. (solicitar con 48 horas de anticipación)</p>
		     <div class="row mt-3 mb-3">
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
          <div class="text-center">
		  			   <button type="button" class="btn btn-dark btn-lg btn-block border-dark" 
				   aria-haspopup="true" 
				   style="font-weight:bold;color:#EADD1B;border-radius:0%; !important;;outline:none !important;outline-width: 0 !important; box-shadow: none;-moz-box-shadow: none;-webkit-box-shadow: none;" >
				   <!--style="cursor:default;border-radius:0%; !important;outline:none !important;				   outline-width: 0 !important; box-shadow: none;-moz-box-shadow: none;-webkit-box-shadow: none;color:#EADD1B;">-->
				  				      PRECIO
			      </button>
					  <div class="card card-body bg-transparent border-dark">
							<div class="card-body text-success">
							  <p class="card-text text-center"><b>45€</b> <img src="/img/info.png" title="+iva" rel="tooltip"  id="blah3"  width="15" height="15" style="margin-bottom:5px;" alt="info"></p>
							  <!--<p class="card-text text-center">Pack de 5...<b>175€</b> <img src="/img/info.png"  title="Cada traductor te sale a 35€" rel="tooltip"  id="blah5" width="15" height="15" style="margin-bottom:5px;" alt="info"></p>
							  <p class="card-text text-center">Pack de 10..<b>300€</b> <img src="/img/info.png"  title="Cada traductor te sale a 30€" rel="tooltip"  id="blah6" width="15" height="15" style="margin-bottom:5px;" alt="info"></p>-->
							</div>
					  </div>
          </div>
        </div>
        <div class="col-md-5">
        </div>
      </div>											  											  
										<!--	  <p class="card-text text-center">
												<div class="row" >											
													<div class="col-sm-4">
													<p class="card-text text-center"><b>1 traductor 45 €</b></p>
													</div>
													<div class="col-sm-4">
													<p class="card-text text-center"><b>Pack de 5 175 €</b> <img src="/img/info.png"  title="Cada traductor te sale a 35€" rel="tooltip"  id="blah5" width="15" height="15" style="margin-bottom:5px;" alt="info"></p>
													</div>												
													<div class="col-sm-4">
													<p class="card-text text-center"><b>Pack de 10 300 €</b> <img src="/img/info.png"  title="Cada traductor te sale a 30€" rel="tooltip"  id="blah6" width="15" height="15" style="margin-bottom:5px;" alt="info"></p>
													</div>			
												</div>
											  </p>	-->										  
											<p class="my-2 text-center">
												<button type="button" id="btn_traductor" name="btn_traductor" class="btn btn-iamoving btn-lg" style="color:default;" data-toggle="modal" data-target="#modalAnuncia">Infórmate Gratis</button>
											</p>
									  </div>					
								</div>
							 </div>					  
						</div> 			
					</div>					

		<!--			<div class="row  justify-content-center">
						<div class="col-12">
							<p class="my-3"></p>
							
							<p class="ml-4 text-center"  style="margin-bottom: 0rem;"><img src="/img/premium.png"  width="70" height="70" style="margin-bottom:0px;" alt="lista"></p>
							<p class="my-1">
							  <button type="button" class="btn btn-dark btn-lg btn-block border-dark dropdown-toggle"  data-toggle="collapse" 
							  data-target="#collapseExample7" aria-expanded="false" aria-controls="collapseExample7" aria-haspopup="true" 
							  style="font-weight:bold;color:#EADD1B;border-radius:0%; !important;;outline:none !important;outline-width: 0 !important; box-shadow: none;-moz-box-shadow: none;-webkit-box-shadow: none;" >
							  IAMPREMIUM
							  </button>
							</p>
							<div class="collapse  my-0" id="collapseExample7">
							  <div class="card bg-transparent border-dark my-0">
									  <div class="card-body text-success my-0">
											  <h2 class="card-text text-center">¿Qué es IAMpremium?</h2>
											  <p class="card-text text-center">Al contratar más de dos servicios en Iamoving, se convertirá en un <b>Propietario premium</b> y obtendrá un <b>10% de descuento</b> en la suma de todos los servicios contratados.</p>
											  
											  <p class="card-text text-center">
												<div class="row" >											
													<div class="col-sm-2">
													<p class="card-text text-center"><b></b></p>
													</div>
													<div class="col-sm-8">
													<p class="card-text text-center"><b>¡¡Sea premium!! Ahorra dinero y problemas a la hora de alquilar.</b></p>
													</div>												
													<div class="col-sm-2">
													<p class="card-text text-center"><b></b></p>
													</div>			
												</div>
											  </p>												  
											<p class="my-2 text-center">
												<button type="button" id="btn_iampremium" name="btn_iampremium" class="btn btn-iamoving btn-lg" style="color:default;" data-toggle="modal" data-target="#modalAnuncia">Infórmate Gratis</button>
											</p>
									  </div>					
								</div>
							 </div>					  
						</div> 			
					</div>-->
				</div>

                   <br>
		<br>
		
	<!--		<div class="section-title text-center my-4">
                <h3 class="font-weight-bold subtitle_feature">EXPERIENCIAS DE PROPIETARIOS CON IAMOVING</h3>
            </div>			

			<div class="row justify-content-center my-0">		
				 <div class="container-fluid" data-aos="fade" data-aos-delay="500">
					<div class="swiper-container images-carousel">
						<div class="swiper-wrapper" style="height:18em;">
							<div class="swiper-slide">
							  
											<div class="card">
									  
												<div class="testimonial">
													
														<h3 class="title">María Propietaria <a href="/anuncio/800">Referencia 800</a></h3></h3>
																					
													<span class="icon fa fa-quote-left"></span>
													<p class="description">
														 He alquilado un estudio a través de Iamoving. La experiencia ha sido muy buena. Muy ágiles y profesionales. Me ha quedado muy buen recuerdo para volver a trabajar con ellos. Muchas gracias.
													</p>

												</div>
								
											</div>
							</div>		
							<div class="swiper-slide">
										  <div class="card">
									  
												<div class="testimonial">
													
														<h3 class="title">María Propietaria <a href="/anuncio/485">Referencia 485</a></h3>
																					
													<span class="icon fa fa-quote-left"></span>
													<p class="description">
														 Soy propietaria de un ático en Martínez Campos aquí en Madrid, me lo alquilaron los de Iamoving y estoy encantada, han sido muy profesionales y eficaces, aparte de rápidos y encontrando un inquilino muy solvente. Les recomiendo encarecidamente. Gracias Iamoving!!! 
													</p>

												</div>
										  </div>              
							  
							</div>
							<div class="swiper-slide">
							  
									 <video-card 
										href="https://youtu.be/GS7r9numiAg" 
										source="https://www.youtube.com/embed/GS7r9numiAg" >
									</video-card>
							  
							</div>
							<div class="swiper-slide">
							  
													<video-card 
									href="https://youtu.be/Zb5t8mBTAkQ" 
									source="https://www.youtube.com/embed/Zb5t8mBTAkQ" >
								</video-card>

							  
							</div>
							<div class="swiper-slide">
							  
											<div class="card">
									  
												<div class="testimonial">
													
														<h3 class="title">Carmen Propietaria <a href="/anuncio/512">Referencia 512</a></h3></h3>
																					
													<span class="icon fa fa-quote-left"></span>
													<p class="description">
														 Ha sido fantástico trabajar con vosotros.En una tarde concentrasteis las visitas y surgió una pareja que lo ha alquilado. Hemos quedado tan contentos que esperamos contar siempre con vuestros servicios ya que los hemos encontrado serios y rápidos. Muchísimas gracias.
													</p>

												</div>
								
											</div>
							</div>
							<div class="swiper-slide">
							  
											<div class="card">
									  
												<div class="testimonial">
													
														<h3 class="title">Raúl Propietario <a href="/anuncio/292">Referencia 292</a></h3></h3>
																					
													<span class="icon fa fa-quote-left"></span>
													<p class="description">
														El pasado mes de Julio decidí alquilar mi piso con IAMOVING. Les indiqué las condiciones que quería para el alquiler y ellos se encargaron del resto: búsqueda de candidatos, realización de fotos y su publicación en la web, etc. En pocos días estaba todo cerrado. Además incluyeron un seguro de protección de alquiler por un año gratuitamente.
													</p>

												</div>
								
											</div>
							</div>	
							<div class="swiper-slide">
							  
											<div class="card">
									  
												<div class="testimonial">
													
														<h3 class="title">José Propietario <a href="/anuncio/392">Referencia 392</a></h3></h3>
																					
													<span class="icon fa fa-quote-left"></span>
													<p class="description">
														Estoy plenamente satisfecho con el servicio de IAMOVING, ya no sólo porque alquilé mi piso en tiempo récord sino que además tienes la garantía de cobrar tus cuotas puntualmente y un seguro de alquiler, que cubre impagos, daños a la propiedad, etc. Y lo mejor de todo, es que yo no tuve que pagar ese seguro ni una comisión por el alquiler de mi piso.
													</p>

												</div>
								
											</div>
							</div>	
							<div class="swiper-slide">
							  
											<div class="card">
									  
												<div class="testimonial">
													
														<h3 class="title">Miguel Propietario <a href="/anuncio/705">Referencia 705</a></h3></h3>
																					
													<span class="icon fa fa-quote-left"></span>
													<p class="description">
														Iamoving ha alquilado mi piso con gran profesionalidad y rapidez, realizando todas las gestiones oportunas para conseguir unos inquilinos adecuados. Estoy muy contento con su trabajo, volvería a poner mi propiedad en sus manos. Les recomiendo si quieres un trabajo profesional.
													</p>

													</div>
								
											</div>
							</div>			
						</div>
						<div class="swiper-button-prev"></div>
						<div class="swiper-button-next"></div>
					</div>
				  </div>		
				</div>					
		</div>	-->				   
</br>
                @include('iamovingpro.propietario.includes.anuncia')
<!--capa Ahorrando-->
<div id="modalAhorrando" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 id="modal-request-title" class="modal-title">Ahorramos el bien más valioso, tu tiempo</h4>
      </div>
      <div class="modal-body">
      			{!! csrf_field() !!} 
	          		<div class="col-md-12">
	          			<div class="form-group">
	          				<label><b>1-Tiempo con llamadas y emails</b></label>
	          				<ul>
								<li class="ml-5">
									Sin perder tiempo respondiendo las mismas preguntas cientos de veces, lamentablemente la mayoría de los correos electrónicos y las llamadas entrantes no son de potenciales inquilinos, lo que hace que este proceso sea una gran pérdida de tiempo. Nuestro modelo de publicación tendrá todas las respuestas a cualquier pregunta relacionada con tu propiedad, las 24 horas del día.
								</li>
							</ul>
	          				<label><b>2-Pérdida de tiempo con visitas frustradas</b></label>
	          				<ul>
								<li class="ml-5">
									Tiempo que tomaría llegar a la propiedad para hacer visitas.
								</li>
								<li class="ml-5">
									Tiempo perdido con visitas que no aportan nada.
								</li>
								<li class="ml-5">
									Más el tiempo que lleva regresar a casa.
								</li>								
							</ul>
	          				<label><b>3-¿Cuánto vale tu tiempo?</b></label>
	          				<ul>
								<li class="ml-5">
									Estar con tu familia, con amigos o tal vez haciendo dinero y no perdiendo tiempo con miles de llamadas, correos electrónicos y visitas frustradas.
								</li>
							</ul>							
	          				<!--<label><b>3-¿Qué te gusta hacer en tu tiempo libre?</b></label>
	          				<ul>
								<li class="ml-5">
									Estar con tu familia, amigos o quizás haciendo dinero y no perdiendo tiempo con miles de llamadas, correos electrónicos y visitas frustradas.
								</li>
							</ul>-->
	          				<!--<label><b>4-Avalistas</b></label>
	          				<ul>
								<li class="ml-5">
									Si eres estudiante o no estás trabajando y no se puede demostrar solvencia económica, se suele pedir un aval personal o más meses de depósito.
								</li>
								<li class="ml-5">
									Aval personal (necesario aportar la documentación mencionada en los puntos 1 y 2 de los avalistas).
								</li>
								<li class="ml-5">
									Depósito (negociar los meses de depósito directamente con la propiedad).
								</li>								
							</ul>-->							
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
<!--capa Aumentando-->
<div id="modalAumentando" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 id="modal-request-title" class="modal-title">Aumentamos tus posibilidades de alquilar</h4>
      </div>
      <div class="modal-body">
      			{!! csrf_field() !!} 
	          		<div class="col-md-12">
	          			<div class="form-group">
	          				<label><b>1-Visita virtual, estarás por delante</b></label>
	          				<ul>
								<li class="ml-5">
									Los inquilinos dicen que un recorrido virtual les da más confianza que una serie de fotografías convencionales, siendo un valor decisivo en la hora de filtrar sus visitas. Aumentando tus posibilidades, ya que un tour virtual vale más que mil imágenes.
								</li>
							</ul>
	          				<label><b>2-Atención a los interesados 24h al día</b></label>
	          				<ul>
								<li class="ml-5">
									Nuestro modelo de publicación de los anuncios responde automáticamente las preguntas de todos los interesados las 24 horas del día, ya que un correo electrónico o una llamada perdida reducirán de inmediato tus posibilidades de alquilar frente a la competencia.
								</li>
							
							</ul>
	          				<label><b>3-Interesados de otras provincias y otros países</b></label>
	          				<ul>
								<li class="ml-5">
									No tener que viajar para ver la propiedad y poder hacerlo las 24 horas del día, los 365 días del año, genera una atracción para aquellos interesados ​​que residen en otras provincias o incluso en otros países <b>(profesionales expatriados o estudiantes)</b>.
								</li>
							</ul>
	          				<label><b>4-Una segunda opinión</b></label>
	          				<ul>
								<li class="ml-5">
									Otra ventaja es que, además de que la parte interesada puede visitar la propiedad tantas veces como lo desee en el día y en el lugar que prefiera, también puede mostrar la propiedad a su familia y amigos antes de alquilar o señalizar, dándoles más confianza y aumentando tus posibilidades de alquilar
								</li>
								<!--<li class="ml-5">
									Aval personal (necesario aportar la documentación mencionada en los puntos 1 y 2 de los avalistas).
								</li>
								<li class="ml-5">
									Depósito (negociar los meses de depósito directamente con la propiedad).
								</li>-->								
							</ul>
	          				<label><b>5-Sin conflicto de interés</b></label>
	          				<ul>
								<li class="ml-5">
									La mayoría de los que están buscando pisos online afirman que no confían en la información y en las fotografías de los anuncios en los portales inmobiliarios. Los propietarios y agentes inmobiliarios, ambos con los mismos intereses, ALQUILAR. Uno porque desea monetizar su alquiler lo más rápido posible y el otro por sus comisiones.
								</li>
								<li class="ml-5">
									Iamoving no recibe comisión del propietario ni del inquilino, somos neutrales, mostramos la verdad sin ningún conflicto de intereses.
								</li>
								<li class="ml-5">
									Por lo tanto, nuestros usuarios saben que no ocultamos defectos o información sobre las propiedades y tampoco “maquillamos” las fotos, cosas puede ocurrir en este proceso. Siendo más confiable y dándoles más confianza en la toma de sus decisiones.
								</li>								
								<!--<li class="ml-5">
									Iamoving no recibe comisión del propietario ni del inquilino, somos neutrales, <b>mostramos la verdad sin ningún conflicto de intereses</b>. Así que, los que están buscando pisos en los portales inmobiliarios, saben que no ocultamos defectos o informaciones de los inmuebles y tampoco hacemos “maquillaje” en las fotos, <b>cosas que pueden ocurrir en este proceso</b>. Siendo más confiable, generándoles más confianza en la toma previa de sus decisiones y así aumentando tus posibilidades de alquilar también.
								</li>-->
							</ul>
	          				<label><b>6-¿Quién vive allí? (<u>Información solo para quien está alquilando una habitación privada en un piso compartido</u>)</b></label><!--<img src="/img/info.png" title="Cada visita te sale a 40€" rel="tooltip"  id="blah3"  width="15" height="15" style="margin-bottom:5px;" alt="info">-->
	          				<ul>
								<li class="ml-5">
									Conocer el perfil de todos los ocupantes de la casa es esencial para aquellos interesados ​ que están buscando una habitación en un piso compartido, como; qué hacen, edad, nacionalidad, chicas o chicos, trabajadores o estudiantes, etc. Reducimos su miedo a lo desconocido y aumentamos su confianza, automáticamente aumentando tus posibilidades de alquilar.
								</li>
								<!--<li class="ml-5">
									Iamoving no recibe comisión del propietario ni del inquilino, somos neutrales, <b>mostramos la verdad sin ningún conflicto de intereses</b>. Así que, los que están buscando pisos en los portales inmobiliarios, saben que no ocultamos defectos o informaciones de los inmuebles y tampoco hacemos “maquillaje” en las fotos, <b>cosas que pueden ocurrir en este proceso</b>. Siendo más confiable, generándoles más confianza en la toma previa de sus decisiones y así aumentando tus posibilidades de alquilar también.
								</li>-->
							</ul>
	          				<!--<label><b>7-Los inquilinos huyen de las inmobiliarias</b></label>
	          				<ul>
								<li class="ml-5">
									En Iamoving no hay agencias ni intermediarios, somos una referencia a todos los inquilinos que no quieren alquilar a través de las inmobiliarias. De este modo, los inquilinos pueden encontrar fácilmente los pisos de particulares en nuestra plataforma, ya que tu anuncio no estará mezclado entre miles de agencias, como suele pasar en los portales inmobiliarios.

								</li>

							</ul>
	          				<label><b>8-Sin comisiones a los inquilinos  </b></label>
	          				<ul>
								<li class="ml-5">
									No va a estar encareciendo costes al inquilino, aumentando tu demanda de interesados
								</li>
						
							</ul>
	          				<label><b>9-Los inquilinos saben que no cobramos comisión al propietario</b></label>
	          				<ul>
								<li class="ml-5">
									No recibimos ninguna comisión del propietario, de este modo, nuestros usuarios saben que el propietario no incrementa el precio de la renta para cubrir las comisiones de agencias, plataformas o intermediarios, como de costumbre.
								</li>
							</ul>						
	          				<label><b>10-De particular a particular</b></label>
	          				<ul>
								<li class="ml-5">
									La ventaja de negociar directamente con la parte interesada es que el interés de la negociación es tuyo y no del intermediario. De esta forma el proceso se vuelve más transparente y económico, ya que no hay comisiones.
								</li>
							</ul>-->							
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
<!--capa Aumentando arriba-->
<div id="modalAumentandoArriba" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 id="modal-request-title" class="modal-title">⦁	Aumentamos 11 x tus posibilidades de reservas</h4>
      </div>
      <div class="modal-body">
      			{!! csrf_field() !!} 
	          		<div class="col-md-12">
	          			<div class="form-group">
	          				<label><b>1-Visita virtual, recibirá más reservas</b></label>
	          				<ul>
								<li class="ml-5">
									La compra online es un riesgo, sobre todo en la industria de alquiler turístico o temporal, ya que no es lo mismo adquirir un artículo que pueda retornarse, que reservar una habitación o una casa unos días, semanas, o meses en otra ciudad o país. Con la visita virtual se muestra realmente en qué estado está el inmueble, a diferencia de lo que sucede con las fotografías, donde sólo se muestran determinados espacios.
								</li>
							</ul>
	          				<label><b>2-Atención a los interesados 24h al día</b></label>
	          				<ul>
								<li class="ml-5">
									Nuestro modelo de publicación de los anuncios responde automáticamente las preguntas de todos los interesados las 24 horas del día, ya que un correo electrónico o una llamada perdida reducirán de inmediato tus posibilidades de alquilar frente a la competencia.
								</li>
							
							</ul>
	          				<ul>
								<li class="ml-5">
									Los viajeros dicen que un recorrido virtual les da más confianza, siendo un valor decisivo en la hora de reservar.
								</li>
							
							</ul>							
	          				<label><b>3-Interesados de otras provincias y otros países</b></label>
	          				<ul>
								<li class="ml-5">
									No tener que viajar para ver la propiedad y poder hacerlo las 24 horas del día, los 365 días del año, genera una atracción para aquellos interesados ​​que residen en otras provincias o incluso en otros países (profesionales expatriados o estudiantes).
								</li>
							</ul>
	          				<label><b>4-Una segunda opinión</b></label>
	          				<ul>
								<li class="ml-5">
									Otra ventaja es que, además de que la parte interesada puede visitar la propiedad tantas veces como lo desee en el día y en el lugar que prefiera, también puede mostrar la propiedad a su familia y amigos antes de reservar o alquilar, dándoles más confianza y aumentando tus posibilidades de alquiler.
								</li>
								<!--<li class="ml-5">
									Aval personal (necesario aportar la documentación mencionada en los puntos 1 y 2 de los avalistas).
								</li>
								<li class="ml-5">
									Depósito (negociar los meses de depósito directamente con la propiedad).
								</li>-->								
							</ul>
	          				<label><b>5-Sin conflicto de interés</b></label>
	          				<ul>
								<li class="ml-5">
									La mayoría de los que están buscando pisos online, afirman que no confían en la información y en las fotografías de las plataformas tradicionales. Los propietarios y las plataformas, ambos con los mismos intereses, MÁS RESERVAS. Uno porque desea monetizar su alquiler lo más rápido posible y el otro por sus comisiones.
								</li>
								<li class="ml-5">
									Iamoving no recibe comisión del propietario ni del inquilino, somos neutrales, mostramos la verdad sin ningún conflicto de intereses.
								</li>
								<li class="ml-5">
									Por lo tanto, nuestros usuarios saben que no ocultamos defectos o información sobre las propiedades y tampoco “maquillamos” las fotos, cosas puede suceder en este proceso. Siendo más confiable y dándoles más confianza en la toma de sus decisiones.
								</li>								
								<!--<li class="ml-5">
									Iamoving no recibe comisión del propietario ni del inquilino, somos neutrales, <b>mostramos la verdad sin ningún conflicto de intereses</b>. Así que, los que están buscando pisos en los portales inmobiliarios, saben que no ocultamos defectos o informaciones de los inmuebles y tampoco hacemos “maquillaje” en las fotos, <b>cosas que pueden ocurrir en este proceso</b>. Siendo más confiable, generándoles más confianza en la toma previa de sus decisiones y así aumentando tus posibilidades de alquilar también.
								</li>-->
							</ul>
	          				<label><b>6-Promocionar tu espacio</b></label><!--<img src="/img/info.png" title="Cada visita te sale a 40€" rel="tooltip"  id="blah3"  width="15" height="15" style="margin-bottom:5px;" alt="info">-->
	          				<ul>
								<li class="ml-5">
									Además, debe tener en cuenta que los viajeros son un excelente vehículo para promocionar tus casas o habitaciones. A los usuarios les encanta compartir sus experiencias y en un formato de video, la promoción de tu lugar será más atractiva.
								</li>
								<!--<li class="ml-5">
									Iamoving no recibe comisión del propietario ni del inquilino, somos neutrales, <b>mostramos la verdad sin ningún conflicto de intereses</b>. Así que, los que están buscando pisos en los portales inmobiliarios, saben que no ocultamos defectos o informaciones de los inmuebles y tampoco hacemos “maquillaje” en las fotos, <b>cosas que pueden ocurrir en este proceso</b>. Siendo más confiable, generándoles más confianza en la toma previa de sus decisiones y así aumentando tus posibilidades de alquilar también.
								</li>-->
							</ul>							
	          				<label><b>7-¿Quién vive allí? (<u>Información solo para quien está alquilando una habitación en un piso </u>)</b></label><!--<img src="/img/info.png" title="Cada visita te sale a 40€" rel="tooltip"  id="blah3"  width="15" height="15" style="margin-bottom:5px;" alt="info">-->
	          				<ul>
								<li class="ml-5">
									Conocer el perfil de todos los ocupantes de la casa es esencial para aquellos interesados ​ que están buscando una habitación en un piso compartido, como; qué hacen, edad, nacionalidad, chicas o chicos, trabajadores o estudiantes, etc. Reducimos su miedo a lo desconocido y aumentamos su confianza, automáticamente aumentando tus posibilidades de alquiler y de más reservas.
								</li>
								<!--<li class="ml-5">
									Iamoving no recibe comisión del propietario ni del inquilino, somos neutrales, <b>mostramos la verdad sin ningún conflicto de intereses</b>. Así que, los que están buscando pisos en los portales inmobiliarios, saben que no ocultamos defectos o informaciones de los inmuebles y tampoco hacemos “maquillaje” en las fotos, <b>cosas que pueden ocurrir en este proceso</b>. Siendo más confiable, generándoles más confianza en la toma previa de sus decisiones y así aumentando tus posibilidades de alquilar también.
								</li>-->
							</ul>
	          				<label><b>8-La mayoría de los inquilinos y viajeros huyen de los intermediarios</b></label>
	          				<ul>
								<li class="ml-5">
									En Iamoving no hay intermediarios, somos una referencia a todos que no quieren alquilar a través de las plataformas intermediarias. De este modo, los interesados pueden encontrar fácilmente los pisos de particulares en nuestra plataforma. 

								</li>
								<!--<li class="ml-5">
									Iamoving no recibe comisión del propietario ni del inquilino, somos neutrales, <b>mostramos la verdad sin ningún conflicto de intereses</b>. Así que, los que están buscando pisos en los portales inmobiliarios, saben que no ocultamos defectos o informaciones de los inmuebles y tampoco hacemos “maquillaje” en las fotos, <b>cosas que pueden ocurrir en este proceso</b>. Siendo más confiable, generándoles más confianza en la toma previa de sus decisiones y así aumentando tus posibilidades de alquilar también.
								</li>-->
							</ul>
	          				<label><b>9-Sin comisiones a los viajeros e inquilinos</b></label>
	          				<ul>
								<li class="ml-5">
									No va a estar encareciendo costes al inquilino, aumentando tu demanda de interesados. 
								</li>
<!--								<li class="ml-5">
									Iamoving no recibe comisión del propietario ni del inquilino, somos neutrales, mostramos la verdad sin ningún conflicto de intereses.
								</li>
								<li class="ml-5">
									Por lo tanto, nuestros usuarios saben que no ocultamos defectos o información sobre las propiedades y tampoco “maquillamos” las fotos, cosas puede ocurrir en este proceso. Siendo más confiable y dándoles más confianza en la toma de sus decisiones.
								</li>	-->							
							</ul>
	          				<label><b>10-Los interesados saben que no cobramos comisión al propietario</b></label>
	          				<ul>
								<li class="ml-5">
									No recibimos ninguna comisión del propietario, de este modo, nuestros usuarios saben que el propietario no incrementa el precio de la renta para cubrir las comisiones de las plataformas, como de costumbre.
								</li>
							</ul>						
	          				<label><b>11-De particular a particular</b></label>
	          				<ul>
								<li class="ml-5">
									La ventaja de negociar directamente con la parte interesada es que el interés de la negociación es tuyo y no del intermediario. De esta forma el proceso se vuelve más transparente y económico, ya que no hay comisiones.
								</li>
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
<!--capa Evitando-->
<div id="modalEvitando" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 id="modal-request-title" class="modal-title">Sin comisiones y evitamos gastos innecesarios en este proceso</h4>
      </div>
      <div class="modal-body">
      			{!! csrf_field() !!} 
	          		<div class="col-md-12">
	          			<div class="form-group">
	          				<label><b>1-Sin visitas frustradas</b></label>
	          				<ul>
								<li class="ml-5">
									Gastos con visitas que no aportan nada, tales como: transporte, combustible, parking, etc.
								</li>
							</ul>
	          				<label><b>2-Sin cancelaciones de última hora</b></label>
	          				<ul>
								<li class="ml-5">
									Con Iamoving, se muestra realmente en qué estado se encuentra la propiedad, evitando cancelaciones de último minuto, que generan estrés y daños económicos.
								</li>
							
							</ul>
	          				<label><b>3-Sin intermediarios</b></label>
	          				<ul>
								<li class="ml-5">
									Ahorrarás miles de euros en comisiones.
								</li>
							
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
</section>
<!-- page end-->
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
            $("#tipo_publicacion").val("venta");
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
			 
			$("#btn_inquilino").click(function(){
				$("#tipo_publicacion").val("propietario_alquiler_turistico");
			});
			$("#btn_plano").click(function(){
				$("#tipo_publicacion").val("propietario_alquiler_turistico_plano");
			});
			$("#btn_inicio").click(function(){
				$("#tipo_publicacion").val("propietario_alquiler_turistico_inicio");
			});
			

			
			$("#btn_solvencia").click(function(){
				$("#tipo_publicacion").val("propietario_alquiler_turistico_solvencia");
			});
					
			$("#btn_pago").click(function(){
				$("#tipo_publicacion").val("propietario_alquiler_turistico_pago");
			});
			
			$("#btn_contrato").click(function(){
				$("#tipo_publicacion").val("propietario_alquiler_turistico_contrato");
			});	
			$("#btn_inmueble").click(function(){
				$("#tipo_publicacion").val("propietario_alquiler_turistico_inmueble");
			});	
			
			$("#btn_open").click(function(){
				$("#tipo_publicacion").val("propietario_alquiler_turistico_open");
			});	
			$("#btn_traductor").click(function(){
				$("#tipo_publicacion").val("propietario_alquiler_turistico_traductor");
			});	
			$("#btn_iampremium").click(function(){
				$("#tipo_publicacion").val("propietario_alquiler_turistico_iampremium");
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