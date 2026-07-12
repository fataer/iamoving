@extends('layouts.iamovingpro')
@section('title', 'IAMOVING - Fácil de alquilar, comprar y vender')
@section('description', '¡Fácil de alquilar, comprar y vender!')
@section('image', 'https://iamoving.com/img/iamoving.png')
@section('banner')
    @include('navigation.paginas')
@endsection
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
						<div class="container my-0">
								  <div class="row mt-0">
									<div class="col-md-2">
									</div>
							
										<div class="col-md-8 text-center mb-3">
												<img src="/img/beach.png"  width="70" height="70" style="margin-bottom:10px;" alt="beach">
										</div>
									<div class="col-md-2">
									</div>
								</div>						
										<div class="section-title text-center my-0"  style="padding-top: 0px;padding-bottom: 0px;">
											<h4 class="text-center mb-0"><b>VISITA LOS PISOS DESDE CUALQUIER LUGAR</b></h4>
										</div>					
										<h4 class="mb-4 text-center mt-0"><b>¿SOLICITA UNA VISITA VIRTUAL, CÓMO FUNCIONA?</b></h4>
										<div class="text-success my-1">
											<p class="card-text text-center">Envíanos los inmuebles que te han gustado mediante las plataformas inmobiliarias o a través de otros canales y vamos allí por ti, en el día y la hora que tú nos diga. Hacemos fotos, un informe detallado de cada espacio del inmueble y un video que simula la experiencia de visitarlo físicamente. Podrás dejar notas de observaciones nos reportando la información que no puede faltar en tu visita o si lo preferir, podemos realizar una visita virtual en tiempo real también, guiada por ti.</p>
										</div>	
										
										<span id="dots"></span><span id="more">
										<div class="section-title text-center my-0"  style="padding-top: 10px;padding-bottom: 0px;">
											<h4 class="text-center mb-4"><b>+ de 600 VISITAS VIRTUALES REALIZADAS</b></h4>
										</div>					
										<div class="text-success my-1">
											<p class="card-text text-center">Nuestra experiencia ha demostrado que por varias razones el formato de Iamoving es más realista y eficaz que los anuncios tradicionales de las plataformas inmobiliarias, donde solo se muestran una serie de fotografías de determinados espacios e informaciones muy básicas del inmueble.</p>
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
							
										<div class="col-md-8 text-center mt-5 mb-3">
											<img src="/img/visita.png"  width="70" height="70" style="margin-bottom:10px;" alt="visita">
										</div>
									<div class="col-md-2">
									</div>
								</div>						
										<div class="section-title text-center my-0"  style="padding-top: 0px;padding-bottom: 0px;">
											<h4 class="text-center mb-0"><b>¿PUEDO VISITAR EN PERSONA?</b></h4>
										</div>					
							<p class="ml-4 text-center">¡Claro que sí! Después de haber realizado una primera visita virtual y comprobado que el inmueble realmente te encaja, sin problemas. Tendrás trato directo con la propiedad, acordando con él para visitar personalmente el día y la hora de tu preferencia.</p>


										
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
					<!--	 <div class="row mt-5">
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
							<div class="col-md-4">
							</div>
							<div class="col-md-5">
							  <div class="pricing-box">
								<ul class="ml-5">
								   <li class="ml-4"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Ahorramos el bien más valioso, tu tiempo <img src="/img/info.png"  width="15" height="15" style="margin-bottom:5px;" alt="info"></h5></li>
								  <li class="ml-4"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Aumentamos tus posibilidades de alquilar <img src="/img/info.png"  width="15" height="15" style="margin-bottom:5px;" alt="info"></h5></li>
								  <li class="ml-4"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Evitamos todos los gastos innecesarios <img src="/img/info.png"  width="15" height="15" style="margin-bottom:5px;" alt="info"></h5></li>
								</ul>
							  </div>
							</div>
							<div class="col-md-3">
							</div>
						  </div>	-->
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
								  <li class="ml-5"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Aumentamos tus posibilidades de alquilar  <a  @click.prevent="modalAumenta"><img src="/img/info.png"  width="15" height="15" style="margin-bottom:5px;" alt="info"></a></h5></li>
								  <li class="ml-5"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Evitamos todos los gastos innecesarios  <a  @click.prevent="modalEvita"><img src="/img/info.png"  width="15" height="15" style="margin-bottom:5px;" alt="info"></a></h5></li>
								</ul>
							  <!--</div>-->
							</div>
							<!--Este texto solo visible para smartphone-->
							<div class="col-sm-5  d-block d-sm-block d-md-none">
							  <div class="pricing-box">
								<ul class="ml-4">
								  <li class="ml-0"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Ahorramos el bien más valioso, tu tiempo <a  @click.prevent="modalAhorra"><img src="/img/info.png"  width="15" height="15" style="margin-bottom:5px;" alt="info"></a></h5></li>
								  <li class="ml-0"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Aumentamos tus posibilidades de alquilar <a  @click.prevent="modalAumenta"><img src="/img/info.png"  width="15" height="15" style="margin-bottom:5px;" alt="info"></a></h5></li>
								  <li class="ml-0"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Evitamos todos los gastos innecesarios <a  @click.prevent="modalEvita"><img src="/img/info.png"  width="15" height="15" style="margin-bottom:5px;" alt="info"></a></h5></li>
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
							  <p class="card-text text-center">1 visita.......<b>45€</b></p>
							  <p class="card-text text-center">5 visitas.....<b>200€</b> <img src="/img/info.png" title="Cada visita te sale a 40€" rel="tooltip"  id="blah1"  width="15" height="15" style="margin-bottom:5px;" alt="info"></p>
							  <p class="card-text text-center">10 visitas....<b>350€</b> <img src="/img/info.png"  title="Cada visita te sale a 35€" rel="tooltip"  id="blah2"    width="15" height="15" style="margin-bottom:5px;" alt="info"></p>
							</div>
					  </div>
          </div>
        </div>
        <div class="col-md-5">
        </div>
      </div>	
						<p class="my-2 text-center">
							<button type="button" id="btn_visita" name="btn_visita" class="btn btn-iamoving btn-lg" style="color:default;" data-toggle="modal" data-target="#modalAnuncia">Infórmate GRATIS</button>
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
							<!--<p class="ml-4 text-center" style="margin-bottom: 0.1rem;"><img src="/img/presentacion.png"  width="70" height="70" style="margin-bottom:0px;" alt="presentacion"></p>-->
							<p class="text-center"><img src="/img/formulario.presentacion.jpg"  width="410" height="256" style="margin-bottom:0px;" alt="presentacion"></p>
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
											  <p class="card-text text-center">Preparamos un modelo de presentación referente tu perfil de inquilino, el propietario suele dar preferencia de visitas o aceptar ofertas cuando el conoce un poquito más sobre ti. Sabemos exactamente lo que ellos desean saber de ti.</p>
											<!--<h4 class="my-0 text-center">PRECIO</h4>-->
											<p class="card-text text-center"><b>10 €</b></p>
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
											  <p class="card-text text-center">La comunicación en el proceso de alquilar un inmueble es imprescindible, en el caso que necesites de un intérprete de idiomas podemos poner a su disposición un intérprete presencial en la visita contigo, ayudándote con tus dudas, preguntas y negociación, todo será más fácil y claro. (solicitar con 48 horas de antelación)</p>
											  <!--<h4 class="card-text text-center">PRECIO</h4>-->
											  <p class="card-text text-center">
												<div class="row" >											
													<div class="col-sm-4">
													<p class="card-text text-center"><b>1 visita 45 €</b></p>
													</div>
													<div class="col-sm-4">
													<p class="card-text text-center"><b>5 visitas 175 €</b> <img src="/img/info.png"  title="Cada visita te sale a 35€" rel="tooltip"  id="blah3" width="15" height="15" style="margin-bottom:5px;" alt="info"></p>
													</div>												
													<div class="col-sm-4">
													<p class="card-text text-center"><b>10 visitas 300 €</b> <img src="/img/info.png"  title="Cada visita te sale a 30€" rel="tooltip"  id="blah4" width="15" height="15" style="margin-bottom:5px;" alt="info"></p>
													</div>			
												</div>
											  </p>											  
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
											  <p class="card-text text-center">Es el momento que tendrás que dejar una señal para formalizar tu interés ante la propiedad, si lo preferir, hagas la reserva a través de la plataforma y evitamos fraudes, estafas que pueden ocurrir en este proceso.</p>
											<!--<h4 class="my-0 text-center">PRECIO</h4>-->
											<p class="card-text text-center"><b>20 €</b></p>
											<p class="my-2 text-center">
												<button type="button" id="btn_pagoseguro" name="btn_pagoseguro" class="btn btn-iamoving btn-lg" style="color:default;"  data-toggle="modal" data-target="#modalAnuncia">Infórmate GRATIS</button>
											</p>
									  </div>					
							  </div>
							</div>					  
						</div>                  
					</div>					
					<div class="row  justify-content-center">
						<div class="col-12">
							<p class="my-3"></p>
							<p class="ml-4 text-center" style="margin-bottom: 0.1rem;"><img src="/img/asesoria.juridica.png"  width="70" height="70" style="margin-bottom:0px;" alt="asesoriajuridica"></p>
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
											  <p class="card-text text-center">Antes verificamos el contrato para que no haya ninguna cláusula abusiva, durante respectando tus derechos de inquilino mientras dure el contrato y a final te defendemos de los abusos con los reembolsos de la fianza; que normalmente es más costoso el abogado que lo que puedas recuperar.</p>
											<!--<h4 class="my-0 text-center">PRECIO</h4>-->
											<p class="card-text text-center"><b>50 €</b></p>
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
											  <p class="card-text text-center">Ahorrarte malentendidos a final del contrato repercutiendo en la no devolución de tu fianza y depósito, que ha sido entregue al propietario en la firma del contrato. El problema es que, muchos propietarios no hacen un inventario y los que hacen, elaboran listados demasiado generales y no actualizados, y que, llegado el momento de rendir cuentas, puede ser una fuente de conflicto, ocasionando stress y frustración económica, más vale prevenir. De ahí la importancia de tener un buen inventario.</p>
											<!--<h4 class="my-0 text-center">PRECIO</h4>-->
											<p class="card-text text-center"><b>45 €</b></p>
											<p class="my-2 text-center">
												<button type="button" id="btn_inventario" name="btn_inventario" class="btn btn-dark btn-lg" style="color:#EADD1B;" data-toggle="modal" data-target="#modalAnuncia">Infórmate GRATIS</button>
											</p>
									  </div>					
							  </div>
							</div>					  
						</div>                  
					</div>					
				</div>


            {{-- fin contenido centrado --}}
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
									Olvídate de todas las llamadas y correos sin respuestas para obtener más informaciones sobre los inmuebles de tu interés. Con Iamoving, no hace falta realizar centenas llamadas o emails por más informaciones, tendrás todas las respuestas a tus preguntas en manos, 24h del día a tu disposición.
								</li>
							</ul>
	          				<label><b>2-Tiempo que conlleva realizar las visitas</b></label>
	          				<ul>
								<li class="ml-5">
									Tiempo que conlleva hasta llegar al inmueble, tu tiempo perdido con visitas frustradas que no aportan en nada y luego lo que tarda en volver a casa.
								</li>								
							</ul>
	          				<label><b>3-¿Cuánto vale tu tiempo?</b></label>
	          				<ul>
								<li class="ml-5">
									Pudiendo estar con tu familia, amigos o quizás ganando dinero y no perdiendo tiempo con miles de llamadas emails y visitas frustradas.
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
        <h4 id="modal-request-title" class="modal-title">Aumentamos tus posibilidades de alquilar</h4>
      </div>
      <div class="modal-body">
      			{!! csrf_field() !!} 
	          		<div class="col-md-12">
	          			<div class="form-group">
	          				<label><b>1-Visita virtual</b></label>
	          				<ul>
								<li class="ml-5">
									Se muestra realmente en qué estado está el inmueble, a diferencia de lo que sucede con las fotografías, donde sólo se muestran determinados espacios, verificamos piso por piso, evitando anuncios fraudulentos, visitas frustradas y aumentando tus posibilidades de encontrar lo realmente te interesa.
								</li>
							</ul>
	          				<label><b>2-Estarás por delante</b></label>
	          				<ul>
								<li class="ml-5">
									Muchas veces, nos quitan los pisos de las manos por la falta de tiempo en realizar visitas o por aún estar en otra provincia o país y cuando tenemos disponibilidad en visitar, ya está alquilado. Pudiendo visitar desde cualquier lugar a través de nuestra visita virtual, lo tendrás muy claro si te cuadras el piso o no, pudiendo ya transmitir tu real interés al propietario, iniciando una primera negociación y dejando ya medio apalabrado o formalizado.
								</li>
								<li class="ml-5">
									Sin contar las veces que nos escapan por el tiempo que conlleva concretar una segunda visita y volver con amigos, familiares, para que nos dejen su importante opinión, pues esta segunda opinión la tendrás en unos minutos, ya que tú puedes enviar la visita virtual a ellos inmediatamente.
								</li>
							</ul>
	          				<label><b>3-Sin conflicto de interés</b></label>
	          				<ul>
								<li class="ml-5">
									La mayoría de los que están buscando inmuebles dicen que no confían en las informaciones y fotos de los anuncios en los portales inmobiliarios. Los propietarios y las agencias ambos con los mismos intereses, ALQUILAR. Uno que desea cobrar su alquiler lo antes posible y el otro por sus comisiones. 
								</li>
								<li class="ml-5">
									Iamoving no recibe comisión del propietario ni del inquilino, somos neutrales, <b>mostramos la verdad sin ningún conflicto de intereses</b>. Así que, no ocultamos defectos o informaciones de los inmuebles y tampoco hacemos “maquillaje” en las fotos, <b>cosas que pueden ocurrir en este proceso</b>. Evitándote stress, pérdida de tiempo, frustraciones económicas y aumentando tus posibilidades de encontrar tu inmueble ideal.
								</li>
							</ul>
	          				<label><b>4-¿Quién vivi allí?</b></label>
	          				<ul>
								<li class="ml-5">
									Todo sabemos que nada vale estar en el mejor piso, barrio o tener la habitación más chula, si tus compañeros de piso no son compatibles contigo, por eso, te reportamos el perfil de los que ya viven allí, normas de la casa, lo que hacen, edad, nacionalidad, chicos o chicas, trabajadores o estudiantes, para que más do que vivir, puedas hacer buenos amigos y que esta etapa de tu vida sea una experiencia inolvidable, aumentando tus posibilidades de encontrar tu piso ideal.
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
        <h4 id="modal-request-title" class="modal-title">Evitamos todos los gastos económicos innecesarios</h4>
      </div>
      <div class="modal-body">
      			{!! csrf_field() !!} 
	          		<div class="col-md-12">
	          			<div class="form-group">
						<label><b>Ahorrando dinero</b></label>
	          				<ul>
								<li class="ml-5">
									Con los costes de llamadas, transporte, parking, taxis, etc…que conlleva el modelo tradicional para encontrar el inmueble ideal.
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
<style>

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
			 
			$("#btn_visita").click(function(){
				$("#tipo_publicacion").val("buscando_habitacion_visita");
			});
			 
			$("#btn_presentacion").click(function(){
				$("#tipo_publicacion").val("buscando_habitacion_presentacion");
			});
			
			$("#btn_traductor").click(function(){
				$("#tipo_publicacion").val("buscando_habitacion_traductor");
			});
			 
			$("#btn_pagoseguro").click(function(){
				$("#tipo_publicacion").val("buscando_habitacion_pagoseguro");
			});	
			 
			$("#btn_juridico").click(function(){
				$("#tipo_publicacion").val("buscando_habitacion_juridico");
			});	
			 
			$("#btn_inventario").click(function(){
				$("#tipo_publicacion").val("buscando_habitacion_inventario");
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