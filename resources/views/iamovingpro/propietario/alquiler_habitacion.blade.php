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
												<img src="/img/beach.png"  width="70" height="70" style="margin-bottom:10px;" alt="playa">
										</div>
									<div class="col-md-2">
									</div>
								</div>						
										<div class="section-title text-center my-0"  style="padding-top: 0px;padding-bottom: 0px;">
											<h4 class="text-center mb-0"><b>ENSEÑA TU CASA DESDE CUALQUIER LUGAR</b></h4>
										</div>					
										<h4 class="mb-4 text-center mt-0"><b>VISITA VIRTUAL</b></h4>
										<div class="text-success my-1">
											<p class="card-text text-center">De esta manera, nadie pierde el tiempo visitando o recibiendo visitas que no aportan en nada, el inquilino solo visita los inmuebles que realmente le interesan y reduce las molestias a la propiedad al filtrarse las visitas de curiosos.</p>
										</div>	
										
										<span id="dots"></span><span id="more">
										<div class="section-title text-center my-0"  style="padding-top: 10px;padding-bottom: 0px;">
											<h4 class="text-center mb-4"><b>+ de 600 VISITAS VIRTUALES REALIZADAS</b></h4>
										</div>					
										<div class="text-success my-1">
											<p class="card-text text-center">Nuestra experiencia ha demostrado que por varias razones el formato de Iamoving es más realista y eficaz que los anuncios tradicionales de las plataformas inmobiliarias, donde solo se muestran una serie de fotografías de determinados espacios e informaciones muy básicas del inmueble.</p>
											<p class="card-text text-center">Vamos al inmueble, hacemos fotos, tomamos medidas, realizamos un informe detallado de cada espacio y un video que simula la experiencia de visitar físicamente la propiedad y te dejaremos un enlace correspondiente a la visita.</p>
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

				<div class="container mt-5 my-1">
					<div class="row grid-divider" style="margin-right: 10px;">
						<div class="col-sm-6 mb-3">
						  <div class="col-padding">
						  <p class="ml-4 text-center"><img src="/img/mobile.png"  width="70" height="70" style="margin-bottom:10px;" alt="movil"></p>
							<h4 class="my-2 mb-4 text-center" ><b>¿CÓMO FUNCIONA?</b></h4>
						<p class="ml-4 text-center">Basta enviar por WhatsApp o email el enlace <a href="https://www.iamoving.com/anuncio/568" target="_blank">https://www.iamoving.com/anuncio/568</a> de tu visita virtual que hemos realizado a todos los interesados que te contacten, mediante las plataformas inmobiliarias o a través de otros canales.</p>
						<span id="dots1"></span><span id="more1">
							<p class="ml-4 text-center">Para concertar una visita o más información entrar en <a href="https://www.iamoving.com" target="_blank">iamoving.com</a>, escribir el número de <b>Referencia: 694 y buscar</b>.</p>
							<!--<div id="circulo" style="width: 34rem;height: 10rem;">
							  <p class="mx-4 mt-4 text-center">Así, los interesados en visitar tu piso podrán realizar <b>una primera visita sin salir de casa</b>, conociendo a fondo todos los detalles del inmueble antes de una primera visita.</p>
							</div>-->
							<div class="d-none d-sm-none d-md-block">
								<div id="circulo"  style="width: 32rem;height: 10rem;">
								  <p class="mx-4 mt-4 text-center">Así, los interesados en visitar tu piso podrán realizar <b>una primera visita sin salir de casa</b>, conociendo a fondo todos los detalles del inmueble antes de una primera visita.</p>
								</div>
							</div>
							<div  class="d-block d-sm-block d-md-none">
								<div id="circulo" style="width: 23rem;height: 12rem;">
								  <p class="mx-4 mt-4 text-center">Así, los interesados en visitar tu piso podrán realizar <b>una primera visita sin salir de casa</b>, conociendo a fondo todos los detalles del inmueble antes de una primera visita.</p>
								</div>							
							</div>								
						</span>
						<p class="mt-2 card-text text-center">
								<button class="btn-dark" style="color:yellow;" onclick="myFunction1()" id="myBtn1">Ver más..</button>
						</p>
						  </div>
						</div>
						<div class="col-sm-6">
						  <div class="col-padding">
							<p class="ml-4 text-center"><img src="/img/visita.png"  width="70" height="70" style="margin-bottom:10px;" alt="visita"></p>
							<h4 class="my-2 mb-4 text-center"><b>VISITA CON EL POTENCIAL INQUILINO, ANTES CONOZCA EL PERFIL DEL INTERESADO</b></h4>
							<p class="ml-4 text-center">Una vez que el interesado haya realizado su visita virtual y esté convencido de que tu piso realmente encaja con lo que está buscando, el podrás solicitar una visita presencial, en este momento esta solicitud llegarás directamente a ti, sin ninguna intermediación  
								<span id="dots2">...</span><span id="more2">con su perfil de inquilino, como: nombre, edad, teléfono, e-mail, donde trabaja, sueldo aprox, etc. Para que veas si el perfil de inquilino te interesa también, en el caso que aún no lo tengas claro, podrás hablar directamente con el potencial inquilino antes de confirmar o rechazar una visita.</span></p>
							<span id="more3">
							<!--<div id="circulo" style="width: 34rem;height: 10rem;">
						  <p class="mx-4 mt-4 text-center">Escoge el día, la hora y el inquilino que tú prefieras para enseñarle el piso y conocerle en persona.</p>
							</div>-->
								<div class="d-none d-sm-none d-md-block">
									<div id="circulo" style="width: 32rem;height: 8rem;">
										<p class="mx-4 mt-4 text-center">Escoge el día y la hora para enseñarle el piso y conocerle en persona.</p>
									</div>
								</div>
								<div class="d-block d-sm-block d-md-none">
									<div id="circulo" style="width: 23rem;height: 6rem;">
										<p class="mx-4 mt-4 text-center">Escoge el día y la hora para enseñarle el piso y conocerle en persona.</p>
									</div>
								</div>								
							</span>
							<p class="mt-2 card-text text-center">
								<button class="btn-dark" style="color:yellow;" onclick="myFunction2()" id="myBtn2">Ver más..</button>
						</p>
						  </div>
						</div>
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
								  <li class="ml-5"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Aumentamos tus posibilidades de alquiler  <a  @click.prevent="modalAumenta"><img src="/img/info.png"  width="15" height="15" style="margin-bottom:5px;" alt="info"></a></h5></li>
								  <li class="ml-5"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Evitamos todos los gastos innecesarios  <a  @click.prevent="modalEvita"><img src="/img/info.png"  width="15" height="15" style="margin-bottom:5px;" alt="info"></a></h5></li>
								</ul>
							  <!--</div>-->
							</div>
							<!--Este texto solo visible para smartphone-->
							<div class="col-sm-5  d-block d-sm-block d-md-none">
							  <div class="pricing-box">
								<ul class="ml-4">
								  <li class="ml-0"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Ahorramos el bien más valioso, tu tiempo <a  @click.prevent="modalAhorra"><img src="/img/info.png"  width="15" height="15" style="margin-bottom:5px;" alt="info"></a></h5></li>
								  <li class="ml-0"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Aumentamos tus posibilidades de alquiler <a  @click.prevent="modalAumenta"><img src="/img/info.png"  width="15" height="15" style="margin-bottom:5px;" alt="info"></a></h5></li>
								  <li class="ml-0"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Evitamos todos los gastos innecesarios <a  @click.prevent="modalEvita"><img src="/img/info.png"  width="15" height="15" style="margin-bottom:5px;" alt="info"></a></h5></li>
								</ul>
							  </div>
							</div>							
							<div class="col-md-3">
							</div>
						</div>						  
						 <!--<div class="row mt-0">
							<div class="col-md-4">
							</div>
							<div class="col-md-5">
							  <div class="pricing-box">
								<ul class="ml-5">
								  <li class="ml-4"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Ahorramos el bien más valioso, tu tiempo <img src="/img/info.png"  width="15" height="15" style="margin-bottom:5px;" alt="info"></h5></li>
								  <li class="ml-4"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Aumentamos tus posibilidades de alquiler<img src="/img/info.png"  width="15" height="15" style="margin-bottom:5px;" alt="info"></h5></li>
								  <li class="ml-4"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Evitamos todos los gastos innecesarios <img src="/img/info.png"  width="15" height="15" style="margin-bottom:5px;" alt="info"></h5></li>
								</ul>
							  </div>
							</div>
							<div class="col-md-3">
							</div>
						  </div>-->	  
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
												<!--<button type="button" id="btn_contrato" name="btn_contrato" class="btn btn-iamoving btn-lg" style="color:default;" data-toggle="modal" data-target="#modalAnuncia">Infórmate Gratis</button>-->
												<button type="button" id="btn_inquilino" name="btn_inquilino" class="btn btn-iamoving btn-lg" style="color:default;" data-toggle="modal" data-target="#modalAnuncia">Infórmate Gratis</button>
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
		<!-- <div class="container my-5">
					<div class="section-title text-center my-0"  style="padding-top: 0px;padding-bottom: 0px;">
						<h3 class="font-weight-bold subtitle_feature">CÓMO FUNCIONA</h3>
					</div>					
					<div class="text-success my-1">
						<p class="card-text text-center">Basta enviar por WhatsApp o email el enlace <a href="https://www.iamoving.com/anuncio/568" target="_blank">https://www.iamoving.com/anuncio/568</a> de tu visita virtual que hemos realizado a todos los interesados que te contacten, mediante las plataformas inmobiliarias o a través de otros canales. Si lo preferires, escribe directamente en la descripción de tu propio anuncio, explicándoles.</p>
						<p class="card-text text-center">Para concertar una visita o más información entrar en <a href="https://www.iamoving.com" target="_blank">iamoving.com</a>, escribir el número de <b>Referencia: 694 y buscar</b>.</p>
						<p class="card-text text-center">Así, los interesados en visitar tu piso podrán realizar <b>una primera visita sin salir de casa</b>, conociendo a fondo todos los detalles del inmueble antes de una primera visita. Trabajamos así para ahorrarte tiempo con miles de llamadas, emails y visitas frustradas.</p>
					</div>					
				</div>
				 <div class="container my-0">
					<div class="section-title text-center my-0"  style="padding-top: 0px;padding-bottom: 0px;">
						<h3 class="font-weight-bold subtitle_feature">CONOZCA EL PERFIL DE LOS INTERESADOS</h3>
					</div>					
					<div class="text-success my-1">
						<p class="card-text text-center">Una vez que el interesado haya realizado su visita virtual y esté convencido de que tu piso realmente encaja con lo que está buscando, el podrás solicitar una visita presencial, en este momento esta solicitud te llegarás directamente a ti, sin ninguna intermediación, con su perfil de inquilino, como: nombre, edad, teléfono, e-mail, donde trabaja, sueldo aprox, etc. Para que tu veas si el perfil de inquilino te cuadras también, en el caso que aún no lo tengas claro, podrás hablar directamente con el potencial inquilino. Si es el tipo de inquilino que estás buscando, podrás confirmar la visita o sino rechazar.</p>
					</div>					
				</div>				
				 <div class="container my-0">
					<div class="section-title text-center my-0"  style="padding-top: 0px;padding-bottom: 0px;">
						<h3 class="font-weight-bold subtitle_feature">VISITA CON EL POTENCIAL INQUILINO</h3>
					</div>					
					<div class="text-success my-1">
						<p class="card-text text-center">Escoge el día, la hora y el inquilino que tú prefieras para enseñarle el piso y conocerle en persona.</p>
						  <h4 class="card-text text-center">PRECIO</h4>
						  <p class="card-text text-center">
							<div class="row" >											
								<div class="col-sm-4">
								<p class="card-text text-center"><b>1 visita 45 €</b></p>
								</div>
								<div class="col-sm-4">
								<p class="card-text text-center"><b>5 visitas 200 €</b></p>
								</div>												
								<div class="col-sm-4">
								<p class="card-text text-center"><b>10 visitas 350 €</b></p>
								</div>			
							</div>
						  </p>	
						<p class="my-2 text-center">
							<button type="button" id="btn_inquilino" name="btn_inquilino" class="btn btn-dark btn-lg" style="color:#EADD1B;" data-toggle="modal" data-target="#modalAnuncia">Infórmate Gratis</button>
						</p>						
					</div>					
				</div>	--->													
				<div  class="container my-0">
					<div class="row  justify-content-center">
						<div class="col-12">
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
											  <p class="card-text text-center">Caso lo necesites, te ayudamos con el contrato, una atención jurídica personalizada a ti. Redactamos cualquier contrato de alquiler, con todas aquellas cláusulas que quieran incluir.</p>
											<!--<h4 class="my-0 text-center">PRECIO</h4>-->
											<p class="card-text text-center"><b>50 €</b></p>
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
											  <p class="card-text text-center">Fotos, video y un informe detallado del interior del inmueble, es la forma más eficaz de tener controlados todo cuando va a ser alquilado. Ahorrando malentendidos y frustraciones económicas a final del contrato.</p>
											  <!--<h4 class="card-text text-center">PRECIO</h4>-->
											  <p class="card-text text-center">
												<div class="row" >											
													<div class="col-sm-4">
													<p class="card-text text-center"><b>1 visita 45 €</b></p>
													</div>
													<div class="col-sm-4">
													<p class="card-text text-center"><b>5 visitas 200 €</b> <img src="/img/info.png"  title="Cada visita te sale a 40€" rel="tooltip"  id="blah3" width="15" height="15" style="margin-bottom:5px;" alt="info"></p>
													</div>												
													<div class="col-sm-4">
													<p class="card-text text-center"><b>10 visitas 350 €</b> <img src="/img/info.png"  title="Cada visita te sale a 35€" rel="tooltip"  id="blah4" width="15" height="15" style="margin-bottom:5px;" alt="info"></p>
													</div>			
												</div>
											  </p>											  
											<p class="my-2 text-center">
												<button type="button" id="btn_inventario" name="btn_inventario" class="btn btn-iamoving btn-lg" style="color:default;" data-toggle="modal" data-target="#modalAnuncia">Infórmate Gratis</button>
											</p>
									  </div>					
								</div>
							 </div>					  
						</div>                  
					</div>					
					<div class="row  justify-content-center">
						<div class="col-12">
							<p class="my-3"></p>
							<!--<div class="animated bounceInLeft delay-1s">-->
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
											  <p class="card-text text-center">Entendemos que puede resultarte difícil realizar las vistas de su vivienda, si está ocupado o si no estas cerca de la propiedad, te ayudaremos con las visitas. El Tiempo disponible de cada visita será de una hora o sea podrás agendar varias visitas, añadiendo una visita.</p>
											  <!--<h4 class="card-text text-center">PRECIO</h4>-->
											  <p class="card-text text-center">
												<div class="row" >											
													<div class="col-sm-4">
													<p class="card-text text-center"><b>1 visita 25 €</b></p>
													</div>
													<div class="col-sm-4">
													<p class="card-text text-center"><b>5 visitas 100 €</b> <img src="/img/info.png"  title="Cada visita te sale a 20€" rel="tooltip"  id="blah5" width="15" height="15" style="margin-bottom:5px;" alt="info"></p>
													</div>												
													<div class="col-sm-4">
													<p class="card-text text-center"><b>10 visitas 150 €</b> <img src="/img/info.png"  title="Cada visita te sale a 15€" rel="tooltip"  id="blah6" width="15" height="15" style="margin-bottom:5px;" alt="info"></p>
													</div>			
												</div>
											  </p>											  
											<p class="my-2 text-center">
												<button type="button" id="btn_open" name="btn_open" class="btn btn-iamoving btn-lg" style="color:default;" data-toggle="modal" data-target="#modalAnuncia">Infórmate Gratis</button>
											</p>
									  </div>					
								</div>
							 </div>					  
						</div> 
                    <!--    <div class="col-md-6 col-sm-6 col-xs-12 mt-4 mb-3"   align="center">
							<div class="card" style="width: 23rem;border:2px solid #EADD03;">
								<a class="card-link  dropdown-toggle" data-toggle="collapse" href="#description-4" 
									role="button" aria-expanded="false" aria-controls="description-4">
									<div class="card-header" style="background-color:#EADD03; ">
									  <img class="card-img-top" style="background-color:#EADD03;width:20%;"  src="/img/visita.png" alt="Card image cap">
									  <h5 class="card-title">OPEN HOUSE</h5>
									</div>
								</a>
							</div>
						</div>-->
							<!--  <div class="card-body collapse" id="description-4">
									  <div class="card-body text-success my-0">
											  <h2 class="card-text text-center">Realizamos visitas</h2>
											  <p class="card-text text-center">Entendemos que puede resultarte difícil realizar las vistas de su vivienda, si está ocupado o si no estas cerca de la propiedad, te ayudaremos con las visitas. El Tiempo disponible de cada visita será de una hora o sea podrás agendar varias visitas, añadiendo una visita.</p>
											  <h4 class="card-text text-center">PRECIO</h4>
											  <p class="card-text text-center">
												<div class="row" >											
													<div class="col-sm-4">
													<p class="card-text text-center"><b>1 visita 25 €</b></p>
													</div>
													<div class="col-sm-4">
													<p class="card-text text-center"><b>5 visitas 99 €</b> <img src="/img/info.png"  title="Cada visita te sale a 20€" rel="tooltip"  id="blah5" width="15" height="15" style="margin-bottom:5px;" alt="info"></p>
													</div>												
													<div class="col-sm-4">
													<p class="card-text text-center"><b>10 visitas 149 €</b> <img src="/img/info.png"  title="Cada visita te sale a 15€" rel="tooltip"  id="blah6" width="15" height="15" style="margin-bottom:5px;" alt="info"></p>
													</div>			
												</div>
											  </p>											  
											<p class="my-2 text-center">
												<button type="button" id="btn_contrato" name="btn_contrato" class="btn btn-iamoving btn-lg" style="color:default;" data-toggle="modal" data-target="#modalAnuncia">Infórmate Gratis</button>
											</p>
									  </div>
							  </div>-->
							
											
					</div>
				</div>
                                    

            <br>
                @include('web.anuncios.includes.anuncia')
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
									Sin pérdida de tiempo contestando las mismas preguntas centenas de veces, la mayoría de los emails y llamadas recibidas se trata de “interesados” que no cumplen tus requisitos solicitados o que ni realmente interesa tu inmueble, convirtiendo este previo proceso en una enorme pérdida de tiempo.  Nuestro modelo de presentación tendrás todas las respuestas a cualquier pregunta referente a tu inmueble, 24 horas del día.
								</li>
							</ul>
	          				<label><b>2-Tiempo con visitas frustradas</b></label>
	          				<ul>
								<li class="ml-5">
									Ahorrando el tiempo que conlleva llegar hasta el inmueble para realizar las visitas, el tiempo perdido con visitas que no aportan en nada y luego lo que tarda en volver a casa.
								</li>								
							</ul>
	          				<label><b>3-¿Cuánto vale tu tiempo?</b></label>
	          				<ul>
								<li class="ml-5">
									Pudiendo estar con tu familia, amigos o quizás ganando dinero y no perdiendo tiempo con miles de llamadas, emails y visitas frustradas.
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
	          				<label><b>1-Atención a los interesados 24h al día</b></label>
	          				<ul>
								<li class="ml-5">
									Nuestro modelo de presentación del inmueble contesta en automático todas las dudas o preguntas de los interesados 24h al día, ya que un email o una llamada no respondida de inmediato estará reduciendo tus posibilidades de alquilar, así a la competencia.
								</li>
							</ul>
	          				<label><b>2-Estarás por delante</b></label>
	          				<ul>
								<li class="ml-5">
									Los interesados dicen que una visita virtual del inmueble les genera más confianza que una serie de fotografías convencionales en la toma previa en filtrar sus visitas. 
								</li>
							
							</ul>
	          				<label><b>3-Una segunda opinión</b></label>
	          				<ul>
								<li class="ml-5">
									Otra de las ventajas es que a parte del interesado poder visitar el inmueble tantas veces como se desee el día y a la hora a la que uno prefiera, podrás también mostrar a sus familiares y amigos la propiedad antes de alquilarla, transmitiéndoles más confianza y aumentando así tus posibilidades de alquiler.
								</li>
							</ul>
	          				<label><b>4-Interesados de otras provincias y otros países.</b></label>
	          				<ul>
								<li class="ml-5">
									El no tener que desplazarse para ver el inmueble y poder hacerlo las 24h del día los 365 días del año, genera una atracción por parte de los interesados que residen en otras provincias o incluso de profesionales expatriados en otros países.
								</li>
								<!--<li class="ml-5">
									Aval personal (necesario aportar la documentación mencionada en los puntos 1 y 2 de los avalistas).
								</li>
								<li class="ml-5">
									Depósito (negociar los meses de depósito directamente con la propiedad).
								</li>-->								
							</ul>
	          				<label><b>5-Sin conflicto de interés </b></label>
	          				<ul>
								<li class="ml-5">
									La mayoría de los que están buscando inmuebles dicen que no confían en las informaciones y fotos de los anuncios en los portales inmobiliarios. Propietarios e inmobiliarias ambos con los mismos intereses, ALQUILAR. Uno porque desea cobrar su alquiler lo antes posible y el otro por sus comisiones.
								</li>
								<li class="ml-5">
									Iamoving no recibe comisión del propietario ni del inquilino, somos neutrales, <b>mostramos la verdad sin ningún conflicto de intereses</b>. Así que, los que están buscando pisos en los portales inmobiliarios, saben que no ocultamos defectos o informaciones de los inmuebles y tampoco hacemos “maquillaje” en las fotos, <b>cosas que pueden ocurrir en este proceso</b>. Siendo más confiable, generándoles más confianza en la toma previa de sus decisiones y así aumentando tus posibilidades de alquilar también.
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
	          				<ul>
								<li class="ml-5">
									Con las visitas que no en aportan en nada, como: transporte, combustible, parking, etc.
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
			 
			$("#btn_inquilino").click(function(){
				$("#tipo_publicacion").val("propietario_habitacion_inquilino");
			});
			 
			$("#btn_contrato").click(function(){
				$("#tipo_publicacion").val("propietario_habitacion_contrato");
			});	
 
			$("#btn_inventario").click(function(){
				$("#tipo_publicacion").val("propietario_habitacion_inventario");
			});
			 
			$("#btn_open").click(function(){
				$("#tipo_publicacion").val("propietario_habitacion_visitas");
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