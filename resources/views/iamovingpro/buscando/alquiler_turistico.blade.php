@extends('layouts.iamovingpro')
@section('title', 'IAMOVING - Fácil de alquilar, comprar y vender')
@section('description', '¡Fácil de alquilar, comprar y vender!')
@section('image', 'https://iamoving.com/img/iamoving.png')
{{--@section('banner')
    @include('navigation.paginas')
@endsection--}}
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
							
										<div class="col-md-8 text-center mb-3">
												<h4 class="text-center mb-0"><img src="/img/inquilinos.png"  width="150" height="85" style="margin-bottom:10px;" alt="playa">  <img src="/img/corazon_rojo.png"  width="70" height="70" style="margin-bottom:10px;" alt="playa"> <img src="/img/branding.transparente.png"  width="170"  style="margin-bottom:10px;" alt="playa"></h4>
										</div>
									<div class="col-md-2">
									</div>
								</div>	
								
										<div class="section-title text-center my-0"  style="padding-top: 0px;padding-bottom: 0px;">
											<h5 class="text-center mb-0"><b>Sin comisión ni intermediarios, de particular a particular </b></h5>
										</div>					
										<p class="my-2 text-center">
												<!--<button type="button" id="btn_contrato" name="btn_contrato" class="btn btn-iamoving btn-lg" style="color:default;" data-toggle="modal" data-target="#modalAnuncia">Infórmate Gratis</button>-->
												<button type="button" id="btn_inicio" name="btn_inicio" class="btn-dark" style="color:yellow;"  data-toggle="modal" data-target="#modalAnuncia">Infórmate Gratis</button>
										</p>
										
						</div>
<!--							<div class="d-none d-md-block d-lg-block d-xl-block">
							<br>
							<br>
							</div>
						</div>-->		
					  <!--</div>-->
				  <!--</div>-->
				<!--</div>-->	

				<div class="container mt-5 my-1"  style="background-color:white;">
					<div class="row grid-divider" style="margin-right: 10px;">
						<div class="col-sm-6 mb-3">
						  <div class="col-padding">
						  <!--<p class="ml-4 text-center"><img src="/img/mobile.png"  width="70" height="70" style="margin-bottom:10px;" alt="movil"></p>-->
							<h4 class="my-2 mb-4 text-center" ><b>VIAJEROS / INQUILINOS</b></h4>
								<p class="ml-4 text-center">
								 <div class="row mt-0">
									<!--Este texto solo visible para escritorio-->
									<div class="col-md-12  d-none d-sm-none d-md-block">
									  <!--<div class="pricing-box">-->
										<ul class="ml-4">
										  <li class="ml-1"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Sin comisiones ni intermediarios, directo con el propietario </h5></li>
										  <li class="ml-1"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Verificamos todos los pisos, evitando estafas </h5></li>
										  <li class="ml-1"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Sin fotos engañosas ni visitas frustradas </h5></li>
										  <!--<li class="ml-1"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > La forma más rápida, segura y económica de alquilar </h5></li>-->
										</ul>
										<p  class="ml-1 mt-3" style="color: #2d2e35 !important;"><i class="fa fa-check"></i> La forma más rápida, segura y económica de alquilar </p>
									  <!--</div>-->
									</div>
									<!--Este texto solo visible para smartphone-->
									<div class="col-sm-5  d-block d-sm-block d-md-none">
									  <div class="pricing-box">
										<ul class="ml-4">
										  <li class="ml-5"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Sin comisiones ni intermediarios, directo con el propietario </h5></li>
										  <li class="ml-5"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Verificamos todos los pisos, evitando estafas </h5></li>
										  <li class="ml-5"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Sin fotos engañosas ni visitas frustradas </h5></li>
										  <!--<li class="ml-5"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > La forma más rápida, segura y económica de alquilar </h5></li>-->
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
							<!--<p class="ml-4 text-center"><img src="/img/visita.png"  width="70" height="70" style="margin-bottom:10px;" alt="visita"></p>-->
							<h4 class="my-2 mb-4 text-center"><b>PROPIETARIOS</b></h4>
						<p class="ml-4 text-center">
						 <div class="row mt-0">
							<!--Este texto solo visible para escritorio-->
							<div class="col-md-12  d-none d-sm-none d-md-block">
							  <!--<div class="pricing-box">-->
								<ul class="ml-4">
								  <li class="ml-1"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Sin comisiones ni intermediarios, directo con el inquilino  </h5></li>
								  <li class="ml-1"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Sin pérdida de tiempo con llamadas y visitas frustradas</h5></li>
								  <li class="ml-1"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Publicidad 100% gratuita y sin tarifas de renovación </h5></li>
								  <!--<li class="ml-1"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Aumentamos tus posibilidades de alquilar y ahorrarás tiempo y dinero </h5></li>-->
								</ul>
								<p  class="ml-1 mt-3" style="color: #2d2e35 !important;"><i class="fa fa-check"></i> Aumentamos tus posibilidades de alquilar y ahorrarás tiempo y dinero </p>
							  <!--</div>-->
							</div>
							<!--Este texto solo visible para smartphone-->
							<div class="col-sm-5  d-block d-sm-block d-md-none">
							  <div class="pricing-box">
								<ul class="ml-4">
								  <li class="ml-5"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Sin comisiones ni intermediarios, directo con el inquilino </h5></li>
								  <li class="ml-5"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Sin pérdida de tiempo con llamadas y visitas frustradas </h5></li>
								  <li class="ml-5"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Publicidad 100% gratuita y sin tarifas de renovación </h5></li>
								  <!--<li class="ml-5"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Aumentamos tus posibilidades de alquilar y ahorrarás tiempo y dinero </h5></li>-->
								</ul>
								<p  class="ml-5 mt-4" style="color: #2d2e35 !important;"><i class="fa fa-check"></i> Aumentamos tus posibilidades de alquilar y ahorrarás tiempo y dinero </p>								
							  </div>
							</div>							

						</div>							
						</p>
						  </div>
						</div>
					</div>
				</div>	
				 <!--<div class="container my-0">
					<div class="section-title text-center">
						<h1 class="font-weight-bold">Alquila tu piso sin dramas</h1>
					</div>
				</div>	-->			
				<!--imge-->
				<!--<div class="header--alquiler-image">-->
				 <!-- <div class="container">-->
					  <!--<div class="header--alquiler-text">-->
						<!--<div class="d-block d-md-block d-lg-block d-xl-block">
							<br>		
						</div>-->
						<div class="container my-3">
								<div class="row mt-5">
									<div class="col-md-2">
									</div>
							
										<div class="col-md-8 text-center mb-3">
												<img src="/img/beach.png"  width="70" height="70" style="margin-bottom:10px;" alt="beach">
										</div>
									<div class="col-md-2">
									</div>
								</div>						
										<div class="section-title text-center my-0"  style="padding-top: 0px;padding-bottom: 0px;">
											<h4 class="text-center mb-4"><b>VISÍTALO ANTES DE RESERVAR</b></h4>
										</div>					
										<!--<h4 class="mb-4 text-center mt-0"><b>¿CÓMO FUNCIONA?</b></h4>-->
										
										
										
										
										
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
																	Primera visita virtual
																</a>
																<a class="nav-item nav-link" href="#tab2" data-toggle="tab"
																	role="tab" aria-controls="tab2" aria-selected="false">
																	<span class="display-4 d-block">2</span>
																	Visita presencial
																</a>
																<!--<a class="nav-item nav-link" href="#tab3" data-toggle="tab"
																	role="tab" aria-controls="tab3" aria-selected="false">
																	<span class="display-4 d-block">3</span>
																	¡Me encanta el piso, lo quiero!
																</a>-->	
															<a class="nav-item nav-link" href="#tab4" data-toggle="tab"
																	role="tab" aria-controls="tab4" aria-selected="false">
																	<span class="display-4 d-block">3</span>
																	Alquila
																</a>
															</nav>
															<!-- Tab panes -->
															<div class="tab-content">
																<div role="tabpanel" class="tab-pane active" id="tab1">	
																	<div class="my-0" id="collapseExample3">
																	  <div class="card  bg-transparent border-dark my-0">
																			  <div class="card-body text-success  my-0">
																				<!--<h5 class="card-title">Success card title</h5>-->
																				<h5 class="display-5 text-center text-center my-1" >1-Encuentra tu casa en Iamoving.com y realiza una primera visita sin salir de casa (from anywhere).</h5>

																			  </div>					
																		  </div>
																	  </div>			  
									  
																</div>

																<div role="tabpanel" class="tab-pane" id="tab2">

																	<div class="my-0" id="collapseExample3">
																	  <div class="card  bg-transparent border-dark my-0">
																			  <div class="card-body text-success  my-0">
																				<!--<h5 class="card-title">Success card title</h5>-->
																				<h5 class="display-5 text-center text-center my-1" >2-¿Te gustó la visita virtual? Solicita una visita en persona con el propietario, sin intermediarios.</h5>
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
																				<!--<h5 class="card-title">Success card title</h5>-->
																				<h5 class="display-5 text-center text-center my-1" >3-Alquila directamente con la propiedad y ahorra miles de euros en comisiones.</h5>
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
										
										
										
										
										
										
										
										
										
										
										
										<div class="section-title text-center my-0"  style="padding-top: 10px;padding-bottom: 0px;">
											<h4 class="text-center mb-4"><b>¿No encontraste la propiedad que buscabas en nuestra plataforma?</b></h4>
											<h4 class="mb-4 text-center mt-0"><b>¿Solicita una visita virtual, cómo funciona?</b></h4>
										</div>	
										<div class="text-success my-1">
											<p class="card-text text-center">Envíanos los pisos que te gustan a través de los portales inmobiliarios o por otros canales e iremos allí por ti, el día y la hora que nos informes.</p>
										</div>	
										
										<span id="dots"></span><span id="more">
										<div class="text-success my-1">
											<p class="card-text text-center">Tomamos fotos, realizamos un informe detallado de cada espacio de la propiedad y un video que simula la experiencia de visitarlo físicamente. Si lo prefiere, también podemos hacer una visita virtual en tiempo real, guiada por ti.</p>
											<!--<p class="card-text text-center">Vamos al inmueble, hacemos fotos, tomamos medidas, realizamos un informe detallado de cada espacio y un video que simula la experiencia de visitar físicamente la propiedad y te dejaremos un enlace correspondiente a la visita.</p>-->
										</div>
										<div class="section-title text-center my-0"  style="padding-top: 10px;padding-bottom: 0px;">
											<h4 class="text-center mb-4"><b>+ de 600 VISITAS VIRTUALES REALIZADAS</b></h4>
										</div>					
										<div class="text-success my-1">
											<p class="card-text text-center">Nuestra experiencia ha demostrado que, por diversas razones, el formato Iamoving es más realista y efectivo que los anuncios en los portales inmobiliarios, donde solo se muestran una serie de fotografías de ciertos espacios e información muy básica sobre la propiedad.</p>
											<!--<p class="card-text text-center">Vamos al inmueble, hacemos fotos, tomamos medidas, realizamos un informe detallado de cada espacio y un video que simula la experiencia de visitar físicamente la propiedad y te dejaremos un enlace correspondiente a la visita.</p>-->
										</div>										
										</span>
										<p class="card-text text-center">
												<button class="btn-dark" style="color:yellow;" onclick="myFunction()" id="myBtn">Ver más..</button>
										</p>
										
						</div>
<!--							<div class="d-none d-md-block d-lg-block d-xl-block">
							<br>
							<br>
							</div>
						</div>-->		
					  <!--</div>-->
				  <!--</div>-->
				<!--</div>-->	
						<div class="container my-0">
								  <div class="row mt-0">
									<div class="col-md-2">
									</div>
							
										<div class="col-md-8 text-center mt-4 mb-3">
											<img src="/img/visita.png"  width="70" height="70" style="margin-bottom:10px;" alt="visita">
										</div>
									<div class="col-md-2">
									</div>
								</div>						
										<div class="section-title text-center my-0"  style="padding-top: 0px;padding-bottom: 0px;">
											<h4 class="text-center mb-0"><b>¿PUEDO VISITAR EN PERSONA?</b></h4>
										</div>					
							<p class="ml-4 text-center">¡Claro que sí! Después de haber realizado una primera visita virtual y verificado que el piso realmente se adapta a ti, no hay problema. Tendrá contacto directo con la propiedad, haciendo una cita con él para visitar personalmente el día y la hora de tu preferencia.</p>


										
						</div>				

				<!--<div class="container mt-5 my-1">
					<div class="row grid-divider">
						<div class="col-sm-6 mb-3">
						  <div class="col-padding">
						  <p class="ml-4 text-center"><img src="/img/mobile.png"  width="70" height="70" style="margin-bottom:10px;" alt="movil"></p>
							<h4 class="my-2 mb-4 text-center" ><b>¿CÓMO FUNCIONA?</b></h4>
						<p class="ml-4 text-center">Basta enviar por WhatsApp o email el enlace <a href="https://www.iamoving.com/anuncio/568" target="_blank">https://www.iamoving.com/anuncio/568</a> de tu visita virtual que hemos realizado a todos los interesados que te contacten, mediante las plataformas inmobiliarias o a través de otros canales. Si lo preferires, escribe directamente en la descripción de tu propio anuncio, explicándoles.</p>
						<span id="dots1"></span><span id="more1">
							<p class="ml-4 text-center">Para concertar una visita o más información entrar en <a href="https://www.iamoving.com" target="_blank">iamoving.com</a>, escribir el número de <b>Referencia: 694 y buscar</b>.</p>
							<div id="circulo" style="width: 34rem;height: 10rem;">
							  <p class="mx-4 mt-4 text-center">Así, los interesados en visitar tu piso podrán realizar <b>una primera visita sin salir de casa</b>, conociendo a fondo todos los detalles del inmueble antes de una primera visita.</p>
							</div>
						</span>
						<p class="mt-2 card-text text-center">
								<button class="btn-dark" style="color:yellow;" onclick="myFunction1()" id="myBtn1">Ver más..</button>
						</p>
						  </div>
						</div>
					</div>
				</div>-->
						<!-- <div class="row mt-5">
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
						  </div>
						  
						 <div class="row mt-0">
							<div class="col-md-4 col-sm-0 col-xs-0">
							</div>
							<div class="col-md-5  col-sm-12 col-xs-12">
							  <div class="pricing-box">
								<ul class="ml-5">
								  <li class="ml-4"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Ahorramos el bien más valioso, tu tiempo <img src="/img/info.png"  width="15" height="15" style="margin-bottom:5px;" alt="info"></h5></li>
								  <li class="ml-4"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Aumentamos tus posibilidades de alquilar <img src="/img/info.png"  width="15" height="15" style="margin-bottom:5px;" alt="info"></h5></li>
								  <li class="ml-4"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Evitamos todos los gastos innecesarios <img src="/img/info.png"  width="15" height="15" style="margin-bottom:5px;" alt="info"></h5></li>
								</ul>
							  </div>
							</div>
							<div class="col-md-3   col-sm-0 col-xs-0">
							</div>
						  </div>-->
						 <div class="row mt-5">
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
							<!--Este texto solo visible para escritorio-->
							<div class="col-md-5 ml-3  d-none d-sm-none d-md-block">
							  <!--<div class="pricing-box">-->
								<ul class="ml-5">
								  <li class="ml-5"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Ahorramos el bien más valioso, tu tiempo <a  @click.prevent="modalAhorra"><img src="/img/info.png"  width="15" height="15" style="margin-bottom:5px;" alt="info"></a></h5></li> <!---->
								  <li class="ml-5"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Aumentamos por 11 tus posibilidades de alquilar  <a  @click.prevent="modalAumenta"><img src="/img/info.png"  width="15" height="15" style="margin-bottom:5px;" alt="info"></a></h5></li>
								  <li class="ml-5"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Sin comisiones y evitamos gastos económicos innecesarios <a  @click.prevent="modalEvita"><img src="/img/info.png"  width="15" height="15" style="margin-bottom:5px;" alt="info"></a></h5></li>
								</ul>
							  <!--</div>-->
							</div>
							<!--Este texto solo visible para smartphone-->
							<div class="col-sm-5  d-block d-sm-block d-md-none">
							  <div class="pricing-box">
								<ul class="ml-4">
								  <li class="ml-0"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Ahorramos el bien más valioso, tu tiempo <a  @click.prevent="modalAhorra"><img src="/img/info.png"  width="15" height="15" style="margin-bottom:5px;" alt="info"></a></h5></li>
								  <li class="ml-0"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Aumentamos por 11 tus posibilidades de alquilar <a  @click.prevent="modalAumenta"><img src="/img/info.png"  width="15" height="15" style="margin-bottom:5px;" alt="info"></a></h5></li>
								  <li class="ml-0"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Sin comisiones y evitamos gastos económicos innecesarios <a  @click.prevent="modalEvita"><img src="/img/info.png"  width="15" height="15" style="margin-bottom:5px;" alt="info"></a></h5></li>
								</ul>
							  </div>
							</div>							
							<div class="col-md-3">
							</div>
						</div>							  
     <div class="row mt-3 mb-3">
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
							  <p class="card-text text-center"><b>45€</b> <img src="/img/info.png" title="+iva" rel="tooltip"  id="blah3"  width="15" height="15" style="margin-bottom:5px;" alt="info"></p>
							  <!--<p class="card-text text-center">5 visitas.....<b>175€</b> <img src="/img/info.png" title="Cada visita te sale a 35€" rel="tooltip"  id="blah1"  width="15" height="15" style="margin-bottom:5px;" alt="info"></p>
							  <p class="card-text text-center">10 visitas....<b>300€</b> <img src="/img/info.png"  title="Cada visita te sale a 30€" rel="tooltip"  id="blah2"    width="15" height="15" style="margin-bottom:5px;" alt="info"></p>-->
							</div>
					  </div>
          </div>
        </div>
        <div class="col-md-5">
        </div>
      </div>	
						<p class="my-2 text-center">
							<button type="button" id="btn_conflicto" name="btn_conflicto" class="btn btn-iamoving btn-lg" style="color:#2d2e35;" data-toggle="modal" data-target="#modalAnuncia">Infórmate GRATIS</button>
						</p>
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
				<div  class="container my-0">
					<div class="row  justify-content-center">
						<div class="col-12">
							
							<!--<p class="text-center"><img src="/img/formulario.presentacion.jpg"  width="410" height="256" style="margin-bottom:0px;" alt="presentacion"></p>
							<p class="my-0">-->
							<p class="my-3"></p>
							<p class="ml-4 text-center"  style="margin-bottom: 0.1rem;"><img src="/img/couple.png"  width="80" height="70" style="margin-bottom:0px;" alt="perfil"></p>
							<p class="my-0">							
							  <button type="button" class="btn btn-dark btn-lg btn-block border-dark dropdown-toggle"  data-toggle="collapse" 
							  data-target="#collapseExample1" aria-expanded="false" aria-controls="collapseExample1" aria-haspopup="true" 
							  style="font-weight:bold;color:#EADD1B;border-radius:0%; !important;;outline:none !important;outline-width: 0 !important; box-shadow: none;-moz-box-shadow: none;-webkit-box-shadow: none;" >
							  MODELO DE PRESENTACION AL PROPIETARIO
							  </button>
							</p>
							<div class="collapse  my-0" id="collapseExample1">
							  <div class="card  bg-transparent border-dark my-0">
									  <div class="card-body text-success  my-0">
											  <p class="card-text text-center">Preparamos una plantilla para presentar al propietario tu perfil de inquilino, el propietario generalmente prioriza las visitas o acepta ofertas cuando saben un poco más sobre ti. Sabemos exactamente qué información necesitan saber para que tu sea su favorito entre muchos candidatos.</p>
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
							  <p class="card-text text-center">1 modelo...<b>10€</b></p>
							</div>
					  </div>
          </div>
        </div>
        <div class="col-md-5">
        </div>
      </div>							
											<!--<p class="card-text text-center"><b>10 €</b></p>-->
											<p class="my-2 text-center">
												<button type="button" id="btn_presentacion" name="btn_presentacion" class="btn btn-dark btn-lg" style="color:#EADD1B;" data-toggle="modal" data-target="#modalAnuncia">Infórmate GRATIS</button>
											</p>
									  </div>					
							  </div>
							</div>					  
						</div> 
					</div>
					<div class="row  justify-content-center">
						<div class="col-12">
							<p class="my-3"></p>
							<p class="ml-4 text-center"  style="margin-bottom: 0.1rem;"><img src="/img/traductor.png"  width="80" height="70" style="margin-bottom:0px;" alt="traductor"></p>
							<p class="my-0">
							  <button type="button" class="btn btn-dark btn-lg btn-block border-dark dropdown-toggle"  data-toggle="collapse" 
							  data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample2" aria-haspopup="true" 
							  style="font-weight:bold;color:#EADD1B;border-radius:0%; !important;;outline:none !important;outline-width: 0 !important; box-shadow: none;-moz-box-shadow: none;-webkit-box-shadow: none;" >
							  IAMOVING TRADUCTOR  
							  </button>
							</p>
							<div class="collapse  my-0" id="collapseExample2">
							  <div class="card bg-transparent border-dark my-0">
									  <div class="card-body text-success my-0">
											  <p class="card-text text-center">La comunicación en el proceso de alquiler de una propiedad es esencial, si necesita un intérprete de idiomas, podemos proporcionarle un intérprete personal durante la visita, ayudándole con tus dudas, preguntas y negociaciones, todo será más fácil y claro. (solicitar con 48 horas de antelación)</p>
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
							  <!--<p class="card-text text-center">Pack de 5...<b>175€</b> <img src="/img/info.png"  title="Cada traductor te sale a 35€" rel="tooltip"  id="blah3" width="15" height="15" style="margin-bottom:5px;" alt="info"></p>
							  <p class="card-text text-center">Pack de 10...<b>300€</b> <img src="/img/info.png"  title="Cada traductor te sale a 30€" rel="tooltip"  id="blah4" width="15" height="15" style="margin-bottom:5px;" alt="info"></p>-->
							  <p class="card-text text-center"><b>Incluye:</b> 1 presentación virtual de IAMOVING (fotos, informe detallado del inmueble, medidas y el video)</p>
							</div>
					  </div>
          </div>
        </div>
        <div class="col-md-5">
        </div>
      </div>												  
				<!--					  <p class="card-text text-center">
												<div class="row" >											
													<div class="col-sm-4">
													<p class="card-text text-center"><b>1 traductor 45 €</b></p>
													</div>
													<div class="col-sm-4">
													<p class="card-text text-center"><b>Pack de 5 175 €</b> <img src="/img/info.png"  title="Cada traductor te sale a 35€" rel="tooltip"  id="blah3" width="15" height="15" style="margin-bottom:5px;" alt="info"></p>
													</div>												
													<div class="col-sm-4">
													<p class="card-text text-center"><b>Pack de 10 300 €</b> <img src="/img/info.png"  title="Cada traductor te sale a 30€" rel="tooltip"  id="blah4" width="15" height="15" style="margin-bottom:5px;" alt="info"></p>
													</div>			
												</div>
											  </p>	-->										  
											<p class="my-2 text-center">
												<button type="button" id="btn_traductor" name="btn_traductor" class="btn btn-dark btn-lg" style="color:#EADD1B;" data-toggle="modal" data-target="#modalAnuncia">Infórmate GRATIS</button>
											</p>
									  </div>					
								</div>
							 </div>					  
						</div>                  
					</div>	
					<div class="row  justify-content-center">
						<div class="col-12">
							<p class="my-3"></p>
							<p class="ml-4 text-center" style="margin-bottom: 0.1rem;"><img src="/img/secure.payment.png"  width="70" height="70" style="margin-bottom:0px;" alt="secure.payment"></p>
							<p class="my-0">
							
							  <button type="button" class="btn btn-dark btn-lg btn-block border-dark dropdown-toggle"  data-toggle="collapse" 
							  data-target="#collapseExample3" aria-expanded="false" aria-controls="collapseExample3" aria-haspopup="true" 
							  style="font-weight:bold;color:#EADD1B;border-radius:0%; !important;;outline:none !important;outline-width: 0 !important; box-shadow: none;-moz-box-shadow: none;-webkit-box-shadow: none;" >
							  ME ENCANTO LA VISITA, PAGO SEGURO 
							  </button>
							</p>
							<div class="collapse  my-0" id="collapseExample3">
							  <div class="card  bg-transparent border-dark my-0">
									  <div class="card-body text-success  my-0">
											  <p class="card-text text-center">Es el momento en que tendrá que dejar una señal, pagos, para formalizar tu interés en la propiedad, si lo prefiere, haga tu reserva a través de la plataforma y evitamos fraudes, estafas que pueden ocurrir en este proceso.</p>
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
							  <!--<p class="card-text text-center">Pack de 5...<b>75€</b> <img src="/img/info.png"  title="Cada pago seguro te sale a 15€" rel="tooltip"  id="blah3" width="15" height="15" style="margin-bottom:5px;" alt="info"></p>
							  <p class="card-text text-center">Pack de 10...<b>100€</b> <img src="/img/info.png"  title="Cada pago seguro te sale a 10€" rel="tooltip"  id="blah4" width="15" height="15" style="margin-bottom:5px;" alt="info"></p>-->
							</div>
					  </div>
          </div>
        </div>
        <div class="col-md-5">
        </div>
      </div>											
											<!--<p class="card-text text-center">
												<div class="row" >											
													<div class="col-sm-4">
													<p class="card-text text-center"><b>1 Pago seguro 20 €</b></p>
													</div>
													<div class="col-sm-4">
													<p class="card-text text-center"><b>Pack de 5 75 €</b> <img src="/img/info.png"  title="Cada pago seguro te sale a 15€" rel="tooltip"  id="blah3" width="15" height="15" style="margin-bottom:5px;" alt="info"></p>
													</div>												
													<div class="col-sm-4">
													<p class="card-text text-center"><b>Pack de 10 100 €</b> <img src="/img/info.png"  title="Cada pago seguro te sale a 10€" rel="tooltip"  id="blah4" width="15" height="15" style="margin-bottom:5px;" alt="info"></p>
													</div>			
												</div>
											  </p>-->
											<p class="my-2 text-center">
												<button type="button" id="btn_pagoseguro" name="btn_pagoseguro" class="btn btn-dark btn-lg" style="color:#EADD1B;"  data-toggle="modal" data-target="#modalAnuncia">Infórmate GRATIS</button>
											</p>
									  </div>					
							  </div>
							</div>					  
						</div>                  
					</div>					
					<div class="row  justify-content-center">
						<div class="col-12">
							<p class="my-3"></p>
							<p class="ml-4 text-center" style="margin-bottom: 0.1rem;"><img src="/img/asesoria.juridica.png"  width="70" height="70" style="margin-bottom:0px;" alt="asesoría.jurídica"></p>
							<p class="my-0">
							
							  <button type="button" class="btn btn-dark btn-lg btn-block border-dark dropdown-toggle"  data-toggle="collapse" 
							  data-target="#collapseExample4" aria-expanded="false" aria-controls="collapseExample4" aria-haspopup="true" 
							  style="font-weight:bold;color:#EADD1B;border-radius:0%; !important;;outline:none !important;outline-width: 0 !important; box-shadow: none;-moz-box-shadow: none;-webkit-box-shadow: none;" >
							  NUESTRO APOYO JURIDICO
							  </button>
							</p>
							<div class="collapse  my-0" id="collapseExample4">
							  <div class="card  bg-transparent border-dark my-0">
									  <div class="card-body text-success  my-0">
											  <p class="card-text text-center">1-Verificamos el contrato para que no haya cláusulas abusivas.</p>
											<p class="card-text text-center">2-Que respeten tus derechos de inquilino mientras dure el contrato.</p>
											<p class="card-text text-center">3-Te defendemos del abuso mediante el reembolso de su depósito o fianza; que el abogado suele ser más caro de lo que se puede recuperar, cosas que pueden ocurrir en este proceso.</p>
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
							  <p class="card-text text-center"><b>100€</b> <img src="/img/info.png" title="+iva" rel="tooltip"  id="blah3"  width="15" height="15" style="margin-bottom:5px;" alt="info"></p>
							  <!--<p class="card-text text-center">Pack de 5...<b>450€</b> <img src="/img/info.png"  title="Cada pago seguro te sale a 90€" rel="tooltip"  id="blah3" width="15" height="15" style="margin-bottom:5px;" alt="info"></p>
							  <p class="card-text text-center">Pack de 10...<b>800€</b> <img src="/img/info.png"  title="Cada pago seguro te sale a 80€" rel="tooltip"  id="blah4" width="15" height="15" style="margin-bottom:5px;" alt="info"></p>-->
							</div>
					  </div>
          </div>
        </div>
        <div class="col-md-5">
        </div>
      </div>								
											<!--<p class="card-text text-center">
												<div class="row" >											
													<div class="col-sm-4">
													<p class="card-text text-center"><b>1 apoyo jurídico 100 €</b></p>
													</div>
													<div class="col-sm-4">
													<p class="card-text text-center"><b>Pack de 5 450 €</b> <img src="/img/info.png"  title="Cada pago seguro te sale a 90€" rel="tooltip"  id="blah3" width="15" height="15" style="margin-bottom:5px;" alt="info"></p>
													</div>												
													<div class="col-sm-4">
													<p class="card-text text-center"><b>Pack de 10 800 €</b> <img src="/img/info.png"  title="Cada pago seguro te sale a 80€" rel="tooltip"  id="blah4" width="15" height="15" style="margin-bottom:5px;" alt="info"></p>
													</div>			
												</div>
											  </p>-->
											<p class="my-2 text-center">
												<button type="button" id="btn_juridico" name="btn_juridico" class="btn btn-dark btn-lg" style="color:#EADD1B;" data-toggle="modal" data-target="#modalAnuncia">Infórmate GRATIS</button>
											</p>
									  </div>					
							  </div>
							</div>					  
						</div>                  
					</div>
					<div class="row  justify-content-center">
						<div class="col-12">
							<p class="my-3"></p>
							<p class="ml-4 text-center" style="margin-bottom: 0.1rem;"><img src="/img/inventario.new.png"  width="70" height="70" style="margin-bottom:0px;" alt="inventario"></p>
							<p class="my-0">
							
							  <button type="button" class="btn btn-dark btn-lg btn-block border-dark dropdown-toggle"  data-toggle="collapse" 
							  data-target="#collapseExample5" aria-expanded="false" aria-controls="collapseExample5" aria-haspopup="true" 
							  style="font-weight:bold;color:#EADD1B;border-radius:0%; !important;;outline:none !important;outline-width: 0 !important; box-shadow: none;-moz-box-shadow: none;-webkit-box-shadow: none;" >
							  INVENTARIO DE MUEBLES Y ENSERES
							  </button>
							</p>
							<div class="collapse  my-0" id="collapseExample5">
							  <div class="card  bg-transparent border-dark my-0">
									  <div class="card-body text-success  my-0">
											  <p class="card-text text-center">Evitamos malentendidos al final del contrato, lo que resulta en la no devolución de tu depósito y fianza, que se entregó al propietario en la firma del contrato. El problema es que muchos propietarios no hacen un inventario y aquellos que lo hacen, hacen listados demasiado generales y desactualizados y que, cuando llega el momento de liquidar cuentas al término del contrato, puede ser una fuente de conflicto, causando estrés y frustración económica, es mejor evitarlo. De ahí la importancia de tener un inventario de muebles y enseres.</p>
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
							  <!--<p class="card-text text-center">Pack de 5...<b>210€</b> <img src="/img/info.png"  title="Cada pago seguro te sale a 42€" rel="tooltip"  id="blah3" width="15" height="15" style="margin-bottom:5px;" alt="info"></p>
							  <p class="card-text text-center">Pack de 10...<b>400€</b> <img src="/img/info.png"  title="Cada pago seguro te sale a 40€" rel="tooltip"  id="blah4" width="15" height="15" style="margin-bottom:5px;" alt="info"></p>-->
							</div>
					  </div>
          </div>
        </div>
        <div class="col-md-5">
        </div>
      </div>												
										<!--	<p class="card-text text-center">
												<div class="row" >											
													<div class="col-sm-4">
													<p class="card-text text-center"><b>1 Inventario 45 €</b></p>
													</div>
													<div class="col-sm-4">
													<p class="card-text text-center"><b>Pack de 5 210 €</b> <img src="/img/info.png"  title="Cada pago seguro te sale a 42€" rel="tooltip"  id="blah3" width="15" height="15" style="margin-bottom:5px;" alt="info"></p>
													</div>												
													<div class="col-sm-4">
													<p class="card-text text-center"><b>Pack de 10 400 €</b> <img src="/img/info.png"  title="Cada pago seguro te sale a 40€" rel="tooltip"  id="blah4" width="15" height="15" style="margin-bottom:5px;" alt="info"></p>
													</div>			
												</div>
											  </p>-->
											<p class="my-2 text-center">
												<button type="button" id="btn_inventario" name="btn_inventario" class="btn btn-dark btn-lg" style="color:#EADD1B;" data-toggle="modal" data-target="#modalAnuncia">Infórmate GRATIS</button>
											</p>
									  </div>					
							  </div>
							</div>					  
						</div>                  
					</div>
					<!--<div class="row  justify-content-center">
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
													<p class="card-text text-center"><b>Sea premium, ahorra dinero y problemas a la hora de alquilar.</b></p>
													</div>												
													<div class="col-sm-2">
													<p class="card-text text-center"><b></b></p>
													</div>			
												</div>
											  </p>												  
											<p class="my-2 text-center">
												<button type="button" id="btn_iampremium" name="btn_iampremium" class="btn btn-dark btn-lg" style="color:#EADD1B;" data-toggle="modal" data-target="#modalAnuncia">Infórmate Gratis</button>
											</p>
									  </div>					
								</div>
							 </div>					  
						</div> 			
					</div>		-->				
				</div>

		<br>
		
		<!--	<div class="section-title text-center my-4">
                <h3 class="font-weight-bold subtitle_feature">EXPERIENCIAS DE ALQUILAR CON IAMOVING</h3>
            </div>			

			<div class="row justify-content-center my-0">		
				 <div class="container-fluid" data-aos="fade" data-aos-delay="500">
					<div class="swiper-container images-carousel">
						<div class="swiper-wrapper" style="height:18em;">
<div class="swiper-slide">			
			<video-card 
							href="https://youtu.be/8epVHl-n39k" 
							source="https://www.youtube.com/embed/8epVHl-n39k" >
							</video-card>
 </div>							
            <div class="swiper-slide">
						<video-card 
							href="https://youtu.be/oOR_0B9L7zQ" 
							source="https://www.youtube.com/embed/oOR_0B9L7zQ" >

							</video-card>

            </div>
            <div class="swiper-slide">
              
						<video-card 
							href="https://youtu.be/9MNarTj7pDY" 
							source="https://www.youtube.com/embed/9MNarTj7pDY" >
							</video-card>              
            </div>
            <div class="swiper-slide">
              
							<div class="card">
					  
								<div class="testimonial">
									
										<h3 class="title">Cristina inquilina <a href="/anuncio/327">Referencia 327</a></h3></h3>
																	
									<span class="icon fa fa-quote-left"></span>
									<p class="description">
										 Mi experiencia con IAMOVING ha sido excelente desde el comienzo. Buscaba alquilar un piso y el mismo día que me contacté coordinamos una visita al piso que yo quería. La gestión fue rápida, eficaz y siempre estuvieron a disposición para mi.
									</p>

								</div>
				
                            </div>
            </div>
            <div class="swiper-slide">
              
							<div class="card">
					  
								<div class="testimonial">
									
										<h3 class="title">Anais, inquilina <a href="/anuncio/405">Referencia 405</a></h3></h3>
																	
									<span class="icon fa fa-quote-left"></span>
									<p class="description">
										He encontrado un piso excepcional a través de la oferta de Iamoving . Me han facilitado la visita y he podido encontrar un piso cumpliendo con todos mis requisitos. Desde entonces alquilo un piso a mi gusto.
									</p>

								</div>
				
                            </div>
            </div>
            <div class="swiper-slide">
              
							<div class="card">
					  
								<div class="testimonial">
									
										<h3 class="title">Blanca, inquilina <a href="/anuncio/328">Referencia 328</a></h3></h3>
																	
									<span class="icon fa fa-quote-left"></span>
									<p class="description">
										Desde el principio el servicio por parte de Iamoving ha sido rapido, profesional y resolutivo. He podido ver el piso el mismo día que he visto el anúncio y he contactado con la inmobiliaria y todo el proceso ha sido fácil y rápido. El piso donde vivo es precioso, estoy muy contenta, y ha sido de especial ayuda el video explicando el barrio donde estaba ubicado, que desconocia, pero estoy muy contenta no solo con el piso pero también con su entorno.
									</p>

								</div>
				
                            </div>
            </div>		
            <div class="swiper-slide">
              
							<div class="card">
					  
								<div class="testimonial">
									
										<h3 class="title">Aarón, inquilino <a href="/anuncio/531">Referencia 531</a></h3></h3>
																	
									<span class="icon fa fa-quote-left"></span>
									<p class="description">
										Genial todo! Muy amables y atentos, un placer trabajar con ustedes!
									</p>

								</div>
				
                            </div>
            </div>	
						</div>
						<div class="swiper-button-prev"></div>
						<div class="swiper-button-next"></div>
					</div>
				  </div>		
				</div>		  -->			
		</div>				
                                  

            <br>
            {{-- fin contenido centrado --}}
			                @include('iamovingpro.buscando.includes.anuncia')
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
	          				<label><b>1-Sin llamadas y emails</b></label>
	          				<ul>
								<li class="ml-5">
									Olvídate de todas las llamadas y correos electrónicos no respondidos para obtener más información sobre las propiedades que te interesan. Con Iamoving, no hay necesidad de hacer cientos de llamadas o correos electrónicos para obtener más información, tendrá todas las respuestas a tus preguntas a mano, las 24 horas del día, a tu disposición.
								</li>
							</ul>
	          				<label><b>2-Realizar las visitas frustradas</b></label>
	          				<ul>
								<li class="ml-5">
									Normalmente, necesitamos molestar amigos o conocidos que ya viven en la ciudad de tu interés para que lo visiten por ti.
								</li>
								<ul class="ml-5">
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
							</ul>
	          				<label><b>3-¿Qué te gusta hacer en tu tiempo libre?</b></label>
	          				<ul>
								<li class="ml-5">
									Estar con tu familia, con amigos o quizás haciendo dinero y no perdiendo tiempo con miles de llamadas, correos electrónicos y visitas frustradas.
								</li>
							</ul>
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
        <h4 id="modal-request-title" class="modal-title">Aumentamos por 11 tus posibilidades de alquilar</h4>
      </div>
      <div class="modal-body">
      			{!! csrf_field() !!} 
	          		<div class="col-md-12">
	          			<div class="form-group">
	          				<label><b>1-Visita virtual</b></label>
	          				<ul>
								<li class="ml-5">
									La compra online es un riesgo, sobre todo en la industria de alquiler turístico o temporal, ya que no es lo mismo adquirir un artículo que pueda retornarse, que reservar una habitación o un piso unos días, semanas, o meses en otra ciudad o país. 
								</li>
								<li class="ml-5">
									Con la visita virtual se muestra realmente en qué estado está el inmueble, a diferencia de lo que sucede con las fotografías, donde sólo se muestran determinados espacios. Verificamos casa por casa personalmente, evitando anuncios fraudulentos, visitas frustradas y aumentando tus posibilidades de encontrar lo que realmente te interesa.
								</li>								
							</ul>						
	          				<label><b>2-Estarás por delante</b></label>
	          				<ul>
								<li class="ml-5">
									Una buena oportunidad se alquila muy rápido, nos quitan de las manos, esto es muy común debido a la falta de tiempo que tenemos para hacer visitas o incluso si estamos en otra provincia o país. Con Iamoving, puedes visitar desde cualquier lugar a través de nuestro recorrido virtual, aclarando si te gusta la propiedad o no, de modo que ya pueda transmitir tu interés real al propietario, comenzando una primera negociación y sin dejar que se escape.

								</li>
							</ul>
	          				<label><b>3-¿Vives en otra ciudad o país?</b></label>
	          				<ul>
								<li class="ml-5">
									No tiene que viajar para visitar la propiedad, puede hacerlo las 24 horas del día, los 365 días del año, FROM ANYWHERE.
								</li>
<!--								<li class="ml-5">
									Sin contar las veces que nos escapan por el tiempo que conlleva concretar una segunda visita y volver con amigos, familiares, para que nos dejen su importante opinión, pues esta segunda opinión la tendrás en unos minutos, ya que tú puedes enviar la visita virtual a ellos inmediatamente.
								</li>-->
							</ul>
	          				<label><b>4-Sin comisiones ocultas</b></label>
	          				<ul>
								<li class="ml-5">
									Nuestro modelo de presentación de propiedades responde automáticamente todas tus preguntas o consultas sobre la propiedad que te interesa las 24 horas del día, ya que un correo electrónico o una llamada perdida reducirán inmediatamente tus posibilidades de visitas y decisiones.
								</li>
							<!--	<li class="ml-5">
									Por lo general, el propietario incrementa el precio del alquiler para cubrir los gastos que tuvo con los intermediarios, siendo incluso peor que una comisión fija, ya que tu pagarás una cantidad más alta cada mes de alquiler hasta el final del contrato, por ejemplo:
								</li>
								<ul class="ml-5">
									<li class="ml-5">
										Precio real de la propiedad…………………………………………………………1.000 €
									</li>
									<li class="ml-5">
										Comisión que el propietario pagará al intermediario………………1.000 €
									</li>
									<li class="ml-5">
										Precio que sale la propiedad al mercado…………………………………1.083 €
									</li>
								</ul>
								<li class="ml-5">
									En Iamoving, no recibimos ninguna comisión del propietario ni del inquilino, por lo que el propietario no aumenta el precio de la renta para cubrir las comisiones de agencias, plataformas o intermediarios, como suele pasar.
								</li>
								<ul class="ml-5">								
									<li class="ml-5">
										Sin comisiones a los propietarios 
									</li>	
									<li class="ml-5">
										Conseguimos bajar muchísimo el precio del alquiler 
									</li>
									<li class="ml-5">
										Aumentamos tus posibilidades de encontrar tu hogar ideal
									</li>
								</ul>-->
							</ul>
	          				<label><b>5-Sin frustraciones </b></label>
	          				<ul>
								<li class="ml-5">
									A veces, encontramos la propiedad ideal, pero al reprogramar una segunda visita con amigos o familiares, para que puedan dejarnos su importante opinión, la propiedad fue alquilada, convirtiéndose en una gran frustración. Con Iamoving, puede enviar de inmediato el recorrido virtual a sus conocidos y obtener su opinión rápidamente, para que no se pierdan.
								</li>
							</ul>
	          				<label><b>6-Sin conflicto de intereses</b></label>
	          				<ul>
								<li class="ml-5">
									La mayoría de los que están buscando inmuebles online afirman que no confían en la información y en las fotografías de los anuncios en las plataformas tradicionales. Los propietarios y los intermediarios ambos con los mismos intereses, ALQUILAR y MÁS RESERVAS. Uno porque desea monetizar su alquiler lo más rápido posible y el otro por sus comisiones.
								</li>
								<li class="ml-5">
									Iamoving no recibe comisión del propietario ni del interesado, somos neutrales, mostramos la verdad sin ningún conflicto de intereses.
								</li>								
								<li class="ml-5">
									Por lo tanto, no ocultamos defectos o información sobre las propiedades y tampoco “maquillamos” las fotos, cosas puede suceder en este proceso. Evitamos anuncios fraudulentos y aumentando tus posibilidades de encontrar lo que realmente te interesa.
								</li>																
							</ul>
	          				<label><b>7-Sin intermediarios</b></label>
	          				<ul>
								<li class="ml-5">
									En Iamoving, no hay plataformas que cobran comisiones ni intermediarios; de esa manera, podéis encontrar fácilmente los pisos de particulares en nuestra plataforma, algo imposible hoy en día, un mercado dominado por las plataformas intermediarias.
								</li>
<!--								<li class="ml-5">
									Sin contar las veces que nos escapan por el tiempo que conlleva concretar una segunda visita y volver con amigos, familiares, para que nos dejen su importante opinión, pues esta segunda opinión la tendrás en unos minutos, ya que tú puedes enviar la visita virtual a ellos inmediatamente.
								</li>-->
							</ul>
	          				<label><b>8-Sin comisiones</b></label>
	          				<ul>
								<li class="ml-5">
									Es una gran impotencia encontrar tu casa ideal y no poder alquilar, ya que el pago inicial aumenta demasiado con las comisiones. En Iamoving no hay comisiones, no encareciendo costes a ti, de modo que aumentamos tus posibilidades de encontrar tu hogar ideal.
								</li>
							</ul>	
	          				<label><b>9-Sin comisiones ocultas</b></label>
	          				<ul>
								<li class="ml-5">
									Algunas agencias o plataformas inmobiliarias no cobran ninguna comisión al INQUILINO, sino al propietario, pero no piensen que no está pagando nada
								</li>
								<li class="ml-5">
									Por lo general, el propietario incrementa el precio del alquiler para cubrir los gastos que tuvo con los intermediarios, siendo incluso peor que una comisión fija, ya que tu pagarás una cantidad más alta cada mes de alquiler hasta el final del contrato.
								</li>
								<li class="ml-5">
									En Iamoving, no recibimos ninguna comisión del propietario ni del inquilino, por lo que el propietario no aumenta el precio de la renta para cubrir las comisiones de agencias, plataformas o intermediarios, como suele pasar.
								</li>
								<ul class="ml-5">								
									<li class="ml-5">
										Sin comisiones a los propietarios 
									</li>	
									<li class="ml-5">
										Conseguimos bajar muchísimo el precio del alquiler 
									</li>
									<li class="ml-5">
										Aumentamos tus posibilidades de encontrar tu hogar ideal
									</li>
								</ul>								
							</ul>
	          				<label><b>10-De particular a particular</b></label>
	          				<ul>
								<li class="ml-5">
									La ventaja de negociar directamente con el propietario es que el interés de la negociación es tuyo y no del intermediario. De esta forma el proceso se vuelve más transparente y económico, ya que no hay comisiones.
								</li>
							</ul>							
	          				<label><b>11-¿Quién vivi allí? (<u>información solopara quien está buscando habitación privada en piso compartido</u>)</b></label>
	          				<ul>
								<li class="ml-5">
									Todos sabemos que no vale la pena estar en el mejor piso, vecindario o tener la mejor habitación, si tus compañeros del piso no son compatibles contigo, por lo que informamos el perfil de aquellos que ya viven allí, lo que hacen, edad, nacionalidad, chicas o chicos, trabajadores o estudiantes, para que, además de vivir, pueda hacer buenos amigos y que esta fase de tu vida sea una experiencia inolvidable, aumentando tus posibilidades de encontrar el apartamento ideal.
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
        <h4 id="modal-request-title" class="modal-title">Sin comisiones y evitamos gastos económicos innecesarios </h4>
      </div>
      <div class="modal-body">
      			{!! csrf_field() !!} 
	          		<div class="col-md-12">
	          			<div class="form-group">
						<label><b>1-Sin cancelaciones de última hora</b></label>
	          				<ul>
								<li class="ml-5">
									Con Iamoving, se muestra realmente en qué estado se encuentra la propiedad, evitando cancelaciones de último minuto, que generan estrés y daños económicos.
								</li>
							</ul>						
						<label><b>2-Sin visitas frustradas</b></label>
	          				<ul>
								<li class="ml-5">
									Gastos con visitas que no aportan nada, tales como: transporte, combustible, parking, taxi, etc.
								</li>
							</ul>
						<label><b>3-Sin comisiones</b></label>
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
			 
			$("#btn_conflicto").click(function(){
				$("#tipo_publicacion").val("buscando_turistico_conflicto");
			});
			 
			$("#btn_presentacion").click(function(){
				$("#tipo_publicacion").val("buscando_turistico_presentacion");
			});
			 
			$("#btn_traductor").click(function(){
				$("#tipo_publicacion").val("buscando_turistico_traductor");
			});
			 
			$("#btn_pagoseguro").click(function(){
				$("#tipo_publicacion").val("buscando_turistico_pagoseguro");
			});	
 
			$("#btn_juridico").click(function(){
				$("#tipo_publicacion").val("buscando_turistico_juridico");
			});	
 
			$("#btn_inventario").click(function(){
				$("#tipo_publicacion").val("buscando_turistico_inventario");
			});
			$("#btn_iampremium").click(function(){
				$("#tipo_publicacion").val("buscando_turistico_iampremium");
			});		
			$("#btn_inicio").click(function(){
				$("#tipo_publicacion").val("buscando_turistico_inicio");
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

			
    </script>
@endsection