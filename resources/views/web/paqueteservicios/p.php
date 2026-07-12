@extends('layouts.iamovingpro')
@section('title', 'IAMOVING - Fácil de alquilar, comprar y vender')
@section('description', '¡Fácil de alquilar, comprar y vender!')
@section('image', 'https://iamoving.com/img/iamoving.png')
<style type="text/css">
   .color-letra{
     color: #2d2e35;
   } 
</style>

@section('content')
<br>
<br>
    <div class="container mb-5">
        <div class="row text-center justify-content-center">
            <div class="col-10">
						<div class="container my-0">
							 <div class="row mt-0">
								<div class="col-md-2">
								</div>
						
									<div class="col-md-8 text-center mb-0">
											<img src="/img/icono.png"  width="" height="" style="margin-bottom:0px;" alt="playa">  
									</div>
								<div class="col-md-2">
								</div>
							</div>											
						</div>                

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
											<div class="container my-2">
															<div class="section-title text-center my-0"  style="padding-top: 0px;padding-bottom: 0px;">
																<h2 class="text-center mb-0"><b><font face="Agency FB">ALQUILA TOALMENTE GRATIS Y SIN EXLUSIVAS</font></b></h2>
															</div>																
															  <div class="row mt-3">
																<div class="col-md-2">
																</div>
														
																	<div class="col-md-8 text-center mb-3">
																			<img src="/img/owner.png"  width="70" height="70" style="margin-bottom:10px;" alt="playa">
																	</div>
																<div class="col-md-2">
																</div>
															</div>						
															<!--<div class="section-title text-center my-0"  style="padding-top: 0px;padding-bottom: 0px;">
																<h4 class="text-center mb-0"><b>TOUR VIRTUAL</b></h4>
															</div>-->					
															<h2 class="card-text text-center">¿ERES PROPIETARIO?</h2>
																<!--  <p class="card-text text-center">MEJORAMOS TU FORMA DE ALQUILAR</p>-->
															<div class="section-title text-center my-0"  style="padding-top: 0px;padding-bottom: 0px;">
																<h2 class="text-center mb-0"><b><font face="Agency FB">COLABORA CON IAMOVING Y GANARÁS BOFICACIÓN EN FECTIVO</font></b></h2>
															</div>
															
															<!--<span id="dots"></span><span id="more">-->
															<div class="text-success my-1">
																<p class="card-text text-center"><i>50% de nuestros honorarios</i></p>
															</div>											
															<!--<div class="section-title text-center my-0"  style="padding-top: 10px;padding-bottom: 0px;">
																<h4 class="text-center mb-4"><b>+ de 800 VISITAS VIRTUALES REALIZADAS</b></h4>
															</div>					
															<div class="text-success my-1">
																<p class="card-text text-center">Nuestra experiencia ha demostrado que, por diversas razones, el formato de Iamoving es más realista y efectivo de lo normal donde solo se muestran una serie de fotografías de ciertos espacios e información muy básica sobre la propiedad.</p>
																
															</div>	-->
														
											</div>
						   <div class="row mt-5">
							<div class="col-md-1">
							</div>
							<div class="col-md-10">
							  <div class="pricing-box">
							 <p class="ml-0 text-center"><img src="/img/mobile.png"  width="70" height="70" style="margin-bottom:10px;" alt="diana"></p>
							  <h4 class="text-center mb-4"><b>¿CÓMO FUNCIONAN NUESTROS SERVICIOS Y NUESTRA COLABORACIÓN?</b></h4>
							  </div>
							</div>
							<div class="col-md-1">
							</div>
						  </div>												
											
			<div class="container my-0 mt-3">
			
					<div class="row  justify-content-center">
						<div class="col-12">
							<p class="my-3"></p>
							<!--<p class="ml-4 text-center"  style="margin-bottom: 0rem;"><img src="/img/plano.png"  width="70" height="70" style="margin-bottom:0px;" alt="plano"></p>-->
							<p class="my-0">
							  <button type="button" class="btn btn-warning btn-lg btn-block border-warning dropdown-toggle"  data-toggle="collapse" 
							  data-target="#collapseExample24" aria-expanded="false" aria-controls="collapseExample24" aria-haspopup="true" 
							  style="font-weight:bold;border-radius:0%; !important;;outline:none !important;outline-width: 0 !important; box-shadow: none;-moz-box-shadow: none;-webkit-box-shadow: none;" >
							  AUMENTAMOS TUS POSIBILIDADES DE ALQUILER 
							  </button>
							</p>
							<div class="collapse  my-0" id="collapseExample24">
							  <div class="card bg-transparent border-dark my-0">
									  <div class="card-body text-success my-0">
											  <!--<h2 class="card-text text-center">Realizamos visitas</h2>-->
											 <!-- <h5 class="card-text text-center"><b> Vender o alquilar un piso solo con fotografías y sin conocer el perfil del interesado, suele generar miles de vistas que no aportan en nada. Evitamos incontables visitas frustradas.</b></h5>-->
											<div class="col-md-12 ml-2">
											
												<ul class="ml-0">
												
												  <li class="ml-0 mt-4"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > <b>Muchos más contactos y visitas en otros canales</b></h5></li>								  
												  <li class="ml-0" style="list-style:none;"><h5 class="display-5" >Los algoritmos de los portales mejoran mucho el posicionamiento de tu anuncio cuando tienen videos, más fotos y más clics.</h5></li>								  								  												
												  <li class="ml-0 mt-4"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > <b>Tour Virtual, estarás por delante</b></h5></li>								  
												  <li class="ml-0" style="list-style:none;"><h5 class="display-5" >Los inquilinos dicen que un <b>Tour Virtual</b> les da más confianza que una serie de fotografías convencionales, siendo un valor decisivo en la hora de filtrar sus visitas. Aumentando tus posibilidades.</h5></li>								  								  
												  <li class="ml-0 mt-4"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > <b>Atención a los interesados 24h al día</b></h5></li>								  
												  <li class="ml-0" style="list-style:none;"><h5 class="display-5" >Nuestro modelo de publicación de los anuncios responde automáticamente las preguntas de todos los interesados las 24 horas del día, ya que un correo electrónico o una llamada perdida reducirán de inmediato tus posibilidades de alquilar frente a la competencia.</h5></li>								  					

												  <li class="ml-0 mt-4"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > <b>Interesados de otras provincias y otros países</b></h5></li>								  
												  <li class="ml-0" style="list-style:none;"><h5 class="display-5" >No tener que viajar para ver la propiedad y poder hacerlo las 24 horas del día, los 365 días del año, genera una atracción para los expatriados, estudiantes que se encuentran en el extranjero.</h5></li>								  					

												  <li class="ml-0 mt-4"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > <b>Una segunda opinión</b></h5></li>								  
												  <li class="ml-0" style="list-style:none;"><h5 class="display-5" >Otra ventaja es que, además de que la parte interesada puede visitar la propiedad tantas veces como lo desee en el día y en el lugar que prefiera, también puede mostrar la propiedad a su familia y amigos antes de señalizar, dándoles más confianza y aumentando tus posibilidades de alquilar.</h5></li>								  					


												  <!--<li class="ml-0 mt-4"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > <b>¿Quién vive allí? (<u>Información solo para quien está alquilando una habitación privada en un piso compartido?</u>)</b></h5></li>								  
												  <li class="ml-0" style="list-style:none;"><h5 class="display-5" >Conocer el perfil de todos los ocupantes de la casa es esencial para aquellos interesados ​ que están buscando una habitación en un piso compartido, como; qué hacen, edad, nacionalidad, chicas o chicos, trabajadores o estudiantes, etc. Reducimos su miedo a lo desconocido y aumentamos su confianza, automáticamente aumentando tus posibilidades de alquilar.</h5></li>								  					-->

												  <!--<li class="ml-0 mt-4"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > <b>Sin comisiones</b></h5></li>								  
												  <li class="ml-5" style="list-style:none;"><h5 class="display-5" >No cobramos comisiones a ninguna de las partes.</h5></li>-->
												 </ul>

											</div>								
									  
									 </div>					
								</div>
							 </div>					  
						</div> 
					</div>				
					<div class="row  justify-content-center">
						<div class="col-12">
							<p class="my-1"></p>
							<p class="my-0">
							  <button type="button" class="btn btn-warning btn-lg btn-block border-warning dropdown-toggle"  data-toggle="collapse" 
							  data-target="#collapseExample23" aria-expanded="false" aria-controls="collapseExample23" aria-haspopup="true" 
							  style="font-weight:bold;border-radius:0%; !important;;outline:none !important;outline-width: 0 !important; box-shadow: none;-moz-box-shadow: none;-webkit-box-shadow: none;" >
							  1.- BÚSQUEDA
							  </button>
							</p>
							<div class="collapse  my-0" id="collapseExample23">
							  <div class="card bg-transparent border-dark my-0">
										<div class="card-body text-success my-0">
											  <!--<h2 class="card-text text-center">Realizamos visitas</h2>-->
											  <h5 class="card-text text-center"><b>Bajo la petición de nuestros usuarios, buscamos su casa ideal.</b></h5>							
									  
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
							  2.- ANUNCIO
							  </button>
							</p>
							<div class="collapse  my-0" id="collapseExample24">
							  <div class="card bg-transparent border-dark my-0">
										<div class="card-body text-success my-0">
											  <!--<h2 class="card-text text-center">Realizamos visitas</h2>-->
											  <h5 class="card-text text-center"><b>Creamos un anuncio con toda la información detallada de tu propiedad evitándote visitas innecesarias.</b></h5>							
									  
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
							  data-target="#collapseExample34" aria-expanded="false" aria-controls="collapseExample34" aria-haspopup="true" 
							  style="font-weight:bold;border-radius:0%; !important;;outline:none !important;outline-width: 0 !important; box-shadow: none;-moz-box-shadow: none;-webkit-box-shadow: none;" >
							  3.- PUBLICACIÓN
							  </button>
							</p>
							<div class="collapse  my-0" id="collapseExample34">
								<div class="card bg-transparent border-dark my-0">
										<div class="card-body text-success my-0">
											  <!--<h2 class="card-text text-center">Realizamos visitas</h2>-->
											  <h5 class="card-text text-center"><b>Publicitamos tu inmueble en nuestra plataforma, nuestras redes sociales y en <a href="https://wwww,idealista.com" target="_blank">www.idealista.com</a></b></h5>							
									  
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
							  data-target="#collapseExample314" aria-expanded="false" aria-controls="collapseExample314" aria-haspopup="true" 
							  style="font-weight:bold;border-radius:0%; !important;;outline:none !important;outline-width: 0 !important; box-shadow: none;-moz-box-shadow: none;-webkit-box-shadow: none;" >
							  4.- PERFIL DEL INQUILINO
							  </button>
							</p>
							<div class="collapse  my-0" id="collapseExample314">
							<div class="card bg-transparent border-dark my-0">
										<div class="card-body text-success my-0">
											  <!--<h2 class="card-text text-center">Realizamos visitas</h2>-->
											  <h5 class="card-text text-center"><b>Recibirás peticiones de visitas de nuestros usuarios inquilinos donde podrás conocer su perfil antes de cada visita y confirmar la visita si te interesa o, en caso contrario, rechazarla.</b></h5>							
									  
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
							  data-target="#collapseExample3124" aria-expanded="false" aria-controls="collapseExample3124" aria-haspopup="true" 
							  style="font-weight:bold;border-radius:0%; !important;;outline:none !important;outline-width: 0 !important; box-shadow: none;-moz-box-shadow: none;-webkit-box-shadow: none;" >
							  5.- VISITAS
							  </button>
							</p>
							<div class="collapse  my-0" id="collapseExample3124">
							<div class="card bg-transparent border-dark my-0">
										<div class="card-body text-success my-0">
											  <!--<h2 class="card-text text-center">Realizamos visitas</h2>-->
											  <h5 class="card-text text-center"><b>Escoge el día, la hora y el inquilino que tú prefieras para enseñarle el piso en persona.</b></h5>							
									  
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
							  data-target="#collapseExample134" aria-expanded="false" aria-controls="collapseExample134" aria-haspopup="true" 
							  style="font-weight:bold;border-radius:0%; !important;;outline:none !important;outline-width: 0 !important; box-shadow: none;-moz-box-shadow: none;-webkit-box-shadow: none;" >
							  6.- ESTUDIO DE SOLVENCIA  
							  </button>
							</p>
							<div class="collapse  my-0" id="collapseExample134">
								<div class="card bg-transparent border-dark my-0">
										<div class="card-body text-success my-0">
											  <!--<h2 class="card-text text-center">Realizamos visitas</h2>-->
											  <h5 class="card-text text-center"><b>Me encantó la visita, me cuadra el inquilino, pero ¿puedo comprobar que sea fiable y no un inquilino moroso? </b></h5>							
											  <h5 class="card-text text-center"><b>Sí, a través de un análisis de solvencia, morosidad y viabilidad, comprobaremos que el potencial inquilino sea fiable y no un inquilino moroso.</b></h5>							
									  
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
							  data-target="#collapseExample64" aria-expanded="false" aria-controls="collapseExample64" aria-haspopup="true" 
							  style="font-weight:bold;border-radius:0%; !important;;outline:none !important;outline-width: 0 !important; box-shadow: none;-moz-box-shadow: none;-webkit-box-shadow: none;" >
							  7.- ASESORÍA JURÍDICA Y FISCAL
							  </button>
							</p>
							<div class="collapse  my-0" id="collapseExample64">
							  <div class="card bg-transparent border-dark my-0">
									  <div class="card-body text-success my-0">
											  <!--<h2 class="card-text text-center">Realizamos visitas</h2>-->
											 <!-- <h5 class="card-text text-center"><b> Vender o alquilar un piso solo con fotografías y sin conocer el perfil del interesado, suele generar miles de vistas que no aportan en nada. Evitamos incontables visitas frustradas.</b></h5>-->
											<div class="col-md-12 ml-2">
											
												<ul class="ml-0">
												
												  <li class="ml-0 mt-4"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > <b>Negociación y redacción del contrato de alquiler en tu nombre y en defensa de tus intereses.</b></h5></li>								  
												  <li class="ml-0 mt-4"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > <b>Resolución de consultas relativas al contrato de arrendamiento por escrito, mediante correo electrónico.</b></h5></li>								  
												  <li class="ml-0 mt-4"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > <b>Redacción y envío de todas aquellas comunicaciones que deban ser remitidas al arrendatario.</b></h5></li>								  
												  <li class="ml-0 mt-4"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > <b>Actualización de la renta anual según IPC.</b></h5></li>								  
												  <li class="ml-0 mt-4"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > <b>Asesoramiento en cuanto a las distintas obligaciones fiscales que puedan derivarse del contrato de arrendamiento: alta en Hacienda como Arrendador y liquidación de IVA.</b></h5></li>								  
												  <li class="ml-0 mt-4"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > <b>Reclamaciones extrajudiciales en caso de impago de rentas o cualquier otra cantidad asimilable.</b></h5></li>								  
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
							  data-target="#collapseExample74" aria-expanded="false" aria-controls="collapseExample74" aria-haspopup="true" 
							  style="font-weight:bold;border-radius:0%; !important;;outline:none !important;outline-width: 0 !important; box-shadow: none;-moz-box-shadow: none;-webkit-box-shadow: none;" >
							  8.- SIN COMISIONES NI TARIFAS
							  </button>
							</p>
							<div class="collapse  my-0" id="collapseExample74">
								<div class="card bg-transparent border-dark my-0">
										<div class="card-body text-success my-0">
											  <!--<h2 class="card-text text-center">Realizamos visitas</h2>-->
											  <h5 class="card-text text-center"><b>ALQUILA tu casa con IAMOVING, totalmente gratuito, fácil y seguro.</b></h5>							
									  
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
							  data-target="#collapseExample77" aria-expanded="false" aria-controls="collapseExample77" aria-haspopup="true" 
							  style="font-weight:bold;border-radius:0%; !important;;outline:none !important;outline-width: 0 !important; box-shadow: none;-moz-box-shadow: none;-webkit-box-shadow: none;" >
							  9.- BONIFICACIÓN EN EFECTIVO
							  </button>
							</p>
							<div class="collapse  my-0" id="collapseExample77">
							<div class="card bg-transparent border-dark my-0">
										<div class="card-body text-success my-0">
											  <!--<h2 class="card-text text-center">Realizamos visitas</h2>-->
											  <h5 class="card-text text-center"><b>Si nuestro usuario alquila tu casa, tú ganarás la mitad de nuestros honorarios, normalmente 1 mes de alquiler, que le cobramos al inquilino. Por ejemplo, si se alquilará tu inmueble por 1.000 € tu recibirías de IAMOVING 500 € de bonificación en efectivo por colaborar con nosotros.</b></h5>							
									  
									  </div>	
							</div>
							 </div>					  
						</div> 
					</div>						
				</div>
				
                <form action="{{ url('colabora_notificar_iamigo') }}" method="post" id="frm_colabora" onsubmit="loading()" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="row mt-5">
                        <div class="form-group col-md-12">
                            <h5 class="card-text text-center">📝 <b>Necesitamos tus datos de contacto para poder enviarte las solicitudes de visita de nuestros usuarios</b>:</h5>
                        </div>
                    </div>

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
                            <input placeholder="Calle del inmueble que se alquila" type="text" id="nombre_calle" name="nombre_calle" maxlength="120"  class="form-control" required>
                        </div>					
                        <div class="form-group">
                            <input placeholder="Número" type="text" id="numero_calle" name="numero_calle" maxlength="20" class="form-control" required>
                        </div>	
                        <div class="form-group">
							<input placeholder="Piso" type="text" id="piso_calle" name="piso_calle" maxlength="20" class="form-control" required>
                        </div>
                        <div class="form-group">
							<input placeholder="Ciudad" type="text" id="ciudad" name="ciudad" maxlength="30" class="form-control" required>
                        </div>
                        <div class="form-group">
							<input placeholder="Código Postal" type="text" id="codigo_postal" name="codigo_postal" maxlength="5" class="form-control" required>
                        </div> 
						<input type="hidden" name="es_venta" name="es_venta" value="0">						
                    <div class="form-group form-check text-center">
						<input type="checkbox" class="form-check-input" id="conditions" name="conditions"  required>
						<label class="form-check-label" for="conditions">He leído y estoy de acuerdo con <a href="/terminos-colaboracion-iamigo" target="_blank">los términos de colaboración de propietario</a> y <a href="/politica-privacidad" target="_blank">la política de privacidad </a>de IAMOVING</label>
                    </div>							
                    <!--<div class="form-group">
                        <textarea id="body" name="body" class="form-control" rows="4" placeholder="Descríbenos por favor tus servicios. ¡Cuéntenos en que te diferencias! " required></textarea>
                    </div>-->
                    <hr>
                    <div class="form-group">
                        <button class="btn btn-success btn-block" type="submit" id="btn_submit_colabora">
                            COLABORAR
                        </button>
                        
                    </div>
                </form>
            </div>
        </div>
  

    </div>
    
@endsection
@section('scripts')
<script>
    function loading(){
        $("#btn_submit_colabora").text('Enviando...');
        $("#btn_submit_colabora").prop('disabled', true);
    }
    
    </script>
@endsection
