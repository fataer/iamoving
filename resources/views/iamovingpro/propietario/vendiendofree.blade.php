@extends('layouts.iamovingpro')
@section('title', 'IAMOVING - Fácil de alquilar, comprar y vender')
@section('description', '¡Fácil de alquilar, comprar y vender!')
@section('image', 'https://iamoving.com/img/iamoving.png')
@section('content')
<!-- page -->
<section class="page-section single-blog  mt-5" style="padding-bottom:60px;">
    <div class="container">
            <div class="row">
<!--<div class="col-md-1 blog-share">
                    <h5>Compartir</h5>
                    <div class="share-links">
                        <a href="#" class="sn-facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="sn-twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="sn-google-plus"><i class="fab fa-google-plus-g"></i></a>
                        <a href="#" class="sn-instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="sn-pinterest"><i class="fab fa-pinterest-p"></i></a>
                    </div>-->
                    <div class="col-md-1 blog-share">
                    <h5></h5>
                    <div class="share-links">
                        <i ></i></a>
                        <i ></i></a>
                        <i ></i></a>
                        <i ></i></a>
                        <i ></i></a>
                    </div>
                </div>
				
            <div class="col-md-10 singel-blog-content">
                <!--<div class="row justify-content-center">
                    <div class="col-12 col-md-12 col-lg-12 col-xl-12 text-center">
                    <video-card 
                        href="https://youtu.be/GWunZWkOELI" 
                        source="https://www.youtube.com/embed/GWunZWkOELI" 
                        :body="{&quot;id&quot;:5,&quot;nombre&quot;:&quot;IAMPRO&quot;,&quot;descripcion&quot;:null,&quot;direccion&quot;:null,&quot;foto_principal&quot;:null,&quot;video_principal&quot;:&quot;4_SWDNiU2yQ&quot;,&quot;estado&quot;:&quot;1&quot;,&quot;lat&quot;:null,&quot;long&quot;:null,&quot;created_at&quot;:&quot;2019-03-26 18:16:19&quot;,&quot;updated_at&quot;:&quot;2019-03-26 18:16:19&quot;,&quot;ciudad&quot;:null,&quot;video&quot;:null}" width="40%">
                          
                        </video-card>
                    </div>
                </div>			-->
                <div class="row justify-content-center mb-4">
                    <div class="col text-center">
                        <img src="/img/iamoving_free_grey_transparent.png" alt="IAMPRO logotipo" width="175" class="m-0">
                    </div>
                </div>
                <!--<h2 class="my-4 text-center">¡De particular a particular!</h2>-->
                <h2 class="my-1 text-center"><b>Sin intermediación de IAMOVING</b></h2>
				<!--<h2 class="my-4 text-center"><b>¡GANA DINERO!</b></h2>-->
                <!--<div class="row justify-content-center">
                    <div class="col-12 col-md-12 col-lg-12 col-xl-12 text-center">
                    <video-card 
                        href="https://youtu.be/879gAQ-GB_U" 
                        source="https://www.youtube.com/embed/879gAQ-GB_U" >-->
                        <!--:body="{&quot;id&quot;:5,&quot;nombre&quot;:&quot;Conviértete en agente IAMPRO&quot;,&quot;descripcion&quot;:null,&quot;direccion&quot;:null,&quot;foto_principal&quot;:null,&quot;video_principal&quot;:&quot;4_SWDNiU2yQ&quot;,&quot;estado&quot;:&quot;1&quot;,&quot;lat&quot;:null,&quot;long&quot;:null,&quot;created_at&quot;:&quot;2019-03-26 18:16:19&quot;,&quot;updated_at&quot;:&quot;2019-03-26 18:16:19&quot;,&quot;ciudad&quot;:null,&quot;video&quot;:null}" width="40%">-->
                          
                 <!--       </video-card>
                    </div>
                </div>-->	
				<!--<p class="my-4"></p>
                <p class="my-1 text-center">

                    ¿Conoces a alguien que vaya a alquilar o vender su piso? 

                </p>
                <p class="my-1 text-center">
                    ¿Eres un profesional del sector inmobiliario, llevas muchos inmuebles y no tienes tiempo de atenderlos a todos?

                </p>-->
                <!--<p class="my-4 text-center">

                    <b>Pues sigue leyendo esto que te interesa...</b>

                </p>-->
				<!--<p class="my-4"></p>-->
                <!--<p class="my-1 text-center">

                    <h2 class="my-1 text-center"><b>Ahórrate lo más valioso, tu tiempo</b></h2>

                </p>
				<p class="my-4 text-center">
					<h4 class="my-4 text-center"><b>Anuncia gratis y sin exclusiva.</b></h4>
				</p>-->	
                 <p class="my-1 text-center">
                    
                    <b>Vende de forma independiente, como particular o inmobiliaria.</b>
				</p>
                
                <!--<a  @click.prevent="modalAhorra"><img src="/img/info.png"  width="15" height="15" style="margin-bottom:5px;" alt="info"></a></h2>	-->
                <p class="my-1 text-center">
                    
                    Publicación de 1 inmueble...<b>99€</b> <img src="/img/info.png" title="+iva" rel="tooltip"  id="blah3"  width="15" height="15" style="margin-bottom:5px;" alt="info">
                
                </p>
                <p class="my-1 text-center">
                
                   Pago único, sin tarifa de renovación y de manera ilimitada.

                
                </p>				
				
				<p class="my-4 text-center font-weight-bold subtitle_feature">
					<button type="button"  class="btn btn-lg" style="background-color:#333333;color:#ffffff;font-weight:bold;"  data-toggle="modal" data-target="#modalAnuncia">Infórmate Gratis</button>
				</p>							

            <div class="col-12">
			<p class="my-3"></p>
                <!--<div class="animated bounceInLeft delay-1s">-->
				<p class="my-0">
				  <button type="button" class="btn btn-dark btn-lg btn-block border-dark dropdown-toggle"  data-toggle="collapse" 
				  data-target="#collapseExample0" aria-expanded="false" aria-controls="collapseExample0" aria-haspopup="true" 
				  style="font-weight:bold;color:#ffffff;border-radius:0%; !important;;outline:none !important;outline-width: 0 !important; box-shadow: none;-moz-box-shadow: none;-webkit-box-shadow: none;" >
				  VISITA VIRTUAL
			      </button>
				</p>
				<div class="collapse  my-0" id="collapseExample0">
				  <div class="card  bg-transparent border-dark my-0">

						  <div class="card-body text-success  my-0">
							<!--<h5 class="card-title">Success card title</h5>-->
							<p class="card-text text-center">Un recorrido virtual es más realista que una serie de fotografías convencionales, el comprador solo visita las viviendas que realmente le interesan y reduce las molestias para el propietario al filtrarse las visitas de curiosos.  Hacemos fotos, videos, tomamos medidas y realizamos un informe detallado de tu casa. Sabemos que, a la hora de vender, todos los detalles son muy importantes. Por eso, ofrecemos también un recorrido virtual por los alrededores del inmueble.</p>
							<p class="card-text text-center">Así, los interesados en visitar tu piso podrán hacer <b>una primera visita sin salir de casa</b> y conocer a fondo todos los detalles, antes de visitarla en persona. Trabajamos para ahorrarte tiempo con miles llamadas, emails  visitas que no aportan nada.</p>
						  </div>					
					  </div>
                  </div>					  
            </div>
            <div class="col-12">
			<p class="my-3"></p>
                <!--<div class="animated bounceInLeft delay-1s">-->
				<p class="my-0">
				  <button type="button" class="btn btn-dark btn-lg btn-block border-dark dropdown-toggle"  data-toggle="collapse" 
				  data-target="#collapseExample1" aria-expanded="false" aria-controls="collapseExample1" aria-haspopup="true" 
				  style="font-weight:bold;color:#ffffff;border-radius:0%; !important;;outline:none !important;outline-width: 0 !important; box-shadow: none;-moz-box-shadow: none;-webkit-box-shadow: none;" >
				  REPORTAJE AUDIOVISUAL
			      </button>
				</p>
				<div class="collapse  my-0" id="collapseExample1">
				  <div class="card  bg-transparent border-dark my-0">

						  <div class="card-body text-success  my-0">
								  <p class="card-text text-center">A parte, te entregamos todo el contenido audiovisual, para que puedas subir en tus anuncios que ya están publicados en otros canales…lógicamente mejorando tu posicionamiento y consiguiendo muchos más contactos y visitas en los portales inmobiliarios.</p>							
						  </div>					
					  </div>
                  </div>					  
            </div>
            <div class="col-12">
			<p class="my-3"></p>
                <!--<div class="animated bounceInLeft delay-1s">-->
				<p class="my-0">
				  <button type="button" class="btn btn-dark btn-lg btn-block border-dark dropdown-toggle"  data-toggle="collapse" 
				  data-target="#collapseExample3" aria-expanded="false" aria-controls="collapseExample3" aria-haspopup="true" 
				  style="font-weight:bold;color:#ffffff;border-radius:0%; !important;;outline:none !important;outline-width: 0 !important; box-shadow: none;-moz-box-shadow: none;-webkit-box-shadow: none;" >
					PUBLICACIÓN
			      </button>
				</p>
				<div class="collapse  my-0" id="collapseExample3">
				  <div class="card  bg-transparent border-dark my-0">

						  <div class="card-body text-success  my-0">
							<p class="card-text text-center"> Publicitamos tu inmueble en nuestra plataforma y en nuestras redes sociales.</p>
						  </div>					
					  </div>
                  </div>					  
            </div>			
            <div class="col-12">
			<p class="my-3"></p>
                <!--<div class="animated bounceInLeft delay-1s">-->
				<p class="my-0">
				  <button type="button" class="btn btn-dark btn-lg btn-block border-dark dropdown-toggle"  data-toggle="collapse" 
				  data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample2" aria-haspopup="true" 
				  style="font-weight:bold;color:#ffffff;border-radius:0%; !important;;outline:none !important;outline-width: 0 !important; box-shadow: none;-moz-box-shadow: none;-webkit-box-shadow: none;" >
				  COMPRADORES DEL EXTRANJERO
			      </button>
				</p>
				<div class="collapse  my-0" id="collapseExample2">
				  <div class="card  bg-transparent border-dark my-0">

						  <div class="card-body text-success  my-0">
							  <p class="card-text text-center">Al no tener que desplazarse para ver el inmueble y poder hacerlo las 24h del día los 365 días del año, genera una atracción por parte de los compradores que residen en otras provincias o incluso en otros países, aumentando así, las posibilidades de venta.</p>
						  </div>					
					  </div>
                  </div>					  
            </div>

          <!--  <div class="col-12">
			<p class="my-3"></p>
				<p class="my-0">
				  <button type="button" class="btn btn-dark btn-lg btn-block border-dark dropdown-toggle"  data-toggle="collapse" 
				  data-target="#collapseExample4" aria-expanded="false" aria-controls="collapseExample4" aria-haspopup="true" 
				  style="font-weight:bold;color:#ffffff;border-radius:0%; !important;;outline:none !important;outline-width: 0 !important; box-shadow: none;-moz-box-shadow: none;-webkit-box-shadow: none;" >
				  PERFIL DEL INTERESADO
			      </button>
				</p>
				<div class="collapse  my-0" id="collapseExample4">
				  <div class="card  bg-transparent border-dark my-0">

						  <div class="card-body text-success  my-0">
							<p class="card-text text-center">Una vez que el comprador haya realizado su visita virtual y esté convencido de que tu piso encaja con lo que está buscando, este podrá solicitar una visita presencial. Escoge el día y la hora que tú prefieras para enseñarle el piso, sin visitas frustradas. </p>
						  </div>					
					  </div>
                  </div>					  
            </div>-->
            <!--<div class="col-12">
			<p class="my-3"></p>
				<p class="my-0">
				  <button type="button" class="btn btn-dark btn-lg btn-block border-dark dropdown-toggle"  data-toggle="collapse" 
				  data-target="#collapseExample5" aria-expanded="false" aria-controls="collapseExample5" aria-haspopup="true" 
				  style="font-weight:bold;color:#ffffff;border-radius:0%; !important;;outline:none !important;outline-width: 0 !important; box-shadow: none;-moz-box-shadow: none;-webkit-box-shadow: none;" >
				  HONORARIOS
			      </button>
				</p>
				<div class="collapse  my-0" id="collapseExample5">
				  <div class="card  bg-transparent border-dark my-0">

						  <div class="card-body text-success  my-0">
							<p class="card-text text-center">3% iva no incluido.</p>
						  </div>					
					  </div>
                  </div>					  
            </div>-->
	
			<!--	<p>
				 <div class="row" >
				  <div class="col-sm-6 mb-3 mb-md-0 border-warning">
				  <button type="button" class="btn btn-iamoving btn-lg btn-block border-warning dropdown-toggle"  data-toggle="collapse" 
				  data-target="#collapseExample0" aria-expanded="false" aria-controls="collapseExample0" aria-haspopup="true" style="border-radius:0%; !important;" >				   
				   
				  				      VISITA VIRTUAL
			      </button>
					<div class="collapse" id="collapseExample0">
					  <div class="card card-body bg-transparent border-warning">
							<div class="card-body text-success">
							  <p class="card-text text-center">Un recorrido virtual es más realista que una serie de fotografías convencionales, el comprador solo visita las viviendas que realmente le interesan y reduce las molestias para el propietario al filtrarse las visitas de curiosos.  Hacemos fotos, videos, tomamos medidas y realizamos un informe detallado de tu casa. Sabemos que, a la hora de vender, todos los detalles son muy importantes. Por eso, ofrecemos también un recorrido virtual por los alrededores del inmueble.</p>
							</div>
					  </div>
					</div>				  
				  </div>

				  <div class="col-sm-6">
					  
					  <button type="button" class="btn btn-iamoving btn-lg btn-block border-warning dropdown-toggle"  data-toggle="collapse" 
					  data-target="#collapseExample1" aria-expanded="false" aria-controls="collapseExample1" aria-haspopup="true" style="border-radius:0%; !important;" >				   
					   
										  PUBLICACIÓN
					  </button>
						<div class="collapse" id="collapseExample1">
						  <div class="card card-body bg-transparent border-warning">
								<div class="card-body text-success">
								  <p class="card-text text-center my-4">&nbsp;</p>
								  <p class="card-text text-center my-0">&nbsp;</p>
								  <p class="card-text text-center">No sólo en nuestra plataforma, sino también en instagram, facebook e idealista.</p>
								  <p class="card-text text-center my-4">&nbsp;</p>
								  <p class="card-text text-center my-0">&nbsp;</p>
								</div>
						  </div>
						</div>	
						
				  </div>
				</div>
				
				</p>
				-->
			<!--	<p>
				 <div class="row" >
				  <div class="col-sm-6 mb-3 mb-md-0 border-warning">
				  <button type="button" class="btn btn-iamoving btn-lg btn-block border-warning dropdown-toggle"  data-toggle="collapse" data-target="#collapseExample2" aria-expanded="false" 
				  aria-controls="collapseExample2" aria-haspopup="true" style="border-radius:0%; !important;" >				   
				   
				  				      COMPRADORES DEL EXTRANJERO. VISITAS 24H AL DÍA

			      </button>
					<div class="collapse" id="collapseExample2">
					  <div class="card card-body bg-transparent border-warning">
							<div class="card-body text-success">
							  <p class="card-text text-center">Al no tener que desplazarse para ver el inmueble y poder hacerlo las 24h del día los 365 días del año, genera una atracción por parte de los compradores que residen en otras provincias o incluso en otros países, aumentando así, las posibilidades de venta.</p>
							  <p class="card-text text-center my-0"></p>
							</div>
					  </div>
					</div>				  
				  </div>

				  <div class="col-sm-6">
					  
					  <button type="button" class="btn btn-iamoving btn-lg btn-block border-warning dropdown-toggle"  data-toggle="collapse" data-target="#collapseExample3" aria-expanded="false" 
					  aria-controls="collapseExample3" aria-haspopup="true" style="border-radius:0%; !important;" >				   
					   
										  ENSEÑA TU CASA DESDE CUALQUIER LUGAR
					  </button>
						<div class="collapse" id="collapseExample3">
						  <div class="card card-body bg-transparent border-warning">
								<div class="card-body text-success">
								<p class="card-text text-center">Así, los interesados en visitar tu piso podrán hacer <b>una primera visita sin salir de casa</b> y conocer a fondo todos los detalles, antes de visitarla en persona. Trabajamos para ahorrarte tiempo con miles llamadas, emails  visitas que no aportan nada.</p>
								</div>
						  </div>
						</div>	
						
				  </div>
				</div>
				
				</p>
				
								<p>
				 <div class="row" >
				  <div class="col-sm-6 mb-3 mb-md-0 border-warning">

				  <button type="button" class="btn btn-iamoving btn-lg btn-block border-warning dropdown-toggle"  data-toggle="collapse" data-target="#collapseExample4" aria-expanded="false" 
				  aria-controls="collapseExample4" aria-haspopup="true" style="border-radius:0%; !important;" >				   
				   
				  				      VISITA CON EL POTENCIAL COMPRADOR
			      </button>
					<div class="collapse" id="collapseExample4">
					  <div class="card card-body bg-transparent border-warning">
							<div class="card-body text-success">
							  <p class="card-text text-center">Escoge el día y la hora que tú prefieras para enseñarle el piso. ¡Sin visitas frustradas! Entendemos que puede resultar difícil realizar las visitas de tu vivienda si está ocupado o si no vives cerca de la propiedad, te ayudaremos con las visitas.</p>
							</div>
					  </div>
					</div>				  
				  </div>

				  <div class="col-sm-6">
					  
					  <button type="button" class="btn btn-iamoving btn-lg btn-block border-warning dropdown-toggle"  data-toggle="collapse" data-target="#collapseExample5" aria-expanded="false" 
					  aria-controls="collapseExample5" aria-haspopup="true" style="border-radius:0%; !important;" >				   
					   
										  ASESORIA JURIDÍCA
					  </button>
						<div class="collapse" id="collapseExample5">
						  <div class="card card-body bg-transparent border-warning">
								<div class="card-body text-success">
									<p class="card-text text-center my-2">&nbsp;</p>
								  <p class="card-text text-center">Realizamos todos los trámites jurídicos, cuidamos de todo papeleo.</p>
								  <p class="card-text text-center my-2">&nbsp;</p>
								</div>
						  </div>
						</div>	
						
				  </div>
				</div>
				
				</p>-->
				
						<!--		<p>
				 <div class="row" >
				  <div class="col-sm-6 mb-3 mb-md-0 border-warning">
				  <button type="button" class="btn btn-iamoving btn-lg btn-block border-warning dropdown-toggle"  data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" 
				  aria-controls="collapseExample" aria-haspopup="true" style="border-radius:0%; !important;" >				   
				   
				  				      HONORARIOS
			      </button>
					<div class="collapse" id="collapseExample">
					  <div class="card card-body bg-transparent border-warning">
							<div class="card-body text-success">
							  <p class="card-text text-center"></p>
							</div>
					  </div>
					</div>				  
				  </div>


				</div>
				
				</p>-->				
												<div class="mt-4 col-md-12 ml-2">
													<ul class="ml-0" style="background-color:white;">
													<!--<li class="ml-0"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > <b>La presentación virtual de IAMOVING incluye:</b> fotos, informe detallado, medidas, video del inmueble y poder conocer el perfil del interesado antes de cada visita.</h5></li> -->
													<li class="ml-0" style="list-style:none"><p class="card-text text-center"> <b>Nuestros servicios incluyen</b>: videos, edición, fotografías, informes, poder conocer el perfil del interesado antes de cada visita y publicación en Iamoving. <a  @click.prevent="modalAhorra"><img src="/img/info_iamoving.png"  width="15" height="15" style="margin-bottom:5px;" alt="info"></a></p></li>
												<!--	<li class="ml-0"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > Si quieres, te entregamos todas las imágenes y el video, sin marcas de agua y sin mencionar el nombre de IAMOVING, permitiéndote la libertad de usarlo como mejor te parezca.</h5></li> 										-->
													  <!--<li class="ml-0"><i class="icon ion-md-checkmark-circle-outline"></i><h5 class="display-5" > <b>Aviso importante:</b> Si quieres, entregamos todas las imágenes, video, sin marcas de agua y sin mencionar el nombre de IAMOVING, permitiendo a nuestros clientes la libertad de usarlo como mejor les parezca.</h5></li> -->
													</ul>
												</div>					
				<p class="my-4 text-center font-weight-bold subtitle_feature">
					<button type="button"  class="btn btn-lg" style="background-color:#333333;color:#ffffff;font-weight:bold;"  data-toggle="modal" data-target="#modalAnuncia">Infórmate Gratis</button>
				</p>				
			@include('iamovingpro.propietario.includes.anuncia')
            {{-- fin contenido centrado --}}
        </div>
    </div>
<!--capa Ahorrando-->
<div id="modalAhorrando" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <!--<div class="modal-header">
        <h4 id="modal-request-title" class="modal-title">15 días de exclusividad</h4>
      </div>-->
      <div class="modal-body">
      			{!! csrf_field() !!} 
	          		<div class="col-md-12">
	          			<div class="form-group">
	          				<ul>
								<li class="ml-5">
<b>Si  quieres, te entregamos todas las imágenes y el video, sin marcas de agua y sin mencionar el nombre de IAMOVING, permitiéndote la libertad de usarlo como mejor te parezca.</b>
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
                                                          <style data-jss="" data-meta="MuiPaper" data-jss-server-side="true">.jss33{background-color:#fff}.jss34{border-radius:2px}.jss35{box-shadow:none}.jss36{box-shadow:0 1px 3px 0 rgba(0,0,0,.2),0 1px 1px 0 rgba(0,0,0,.14),0 2px 1px -1px rgba(0,0,0,.12)}.jss37{box-shadow:0 1px 5px 0 rgba(0,0,0,.2),0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.12)}.jss38{box-shadow:0 1px 8px 0 rgba(0,0,0,.2),0 3px 4px 0 rgba(0,0,0,.14),0 3px 3px -2px rgba(0,0,0,.12)}.jss39{box-shadow:0 2px 4px -1px rgba(0,0,0,.2),0 4px 5px 0 rgba(0,0,0,.14),0 1px 10px 0 rgba(0,0,0,.12)}.jss40{box-shadow:0 3px 5px -1px rgba(0,0,0,.2),0 5px 8px 0 rgba(0,0,0,.14),0 1px 14px 0 rgba(0,0,0,.12)}.jss41{box-shadow:0 3px 5px -1px rgba(0,0,0,.2),0 6px 10px 0 rgba(0,0,0,.14),0 1px 18px 0 rgba(0,0,0,.12)}.jss42{box-shadow:0 4px 5px -2px rgba(0,0,0,.2),0 7px 10px 1px rgba(0,0,0,.14),0 2px 16px 1px rgba(0,0,0,.12)}.jss43{box-shadow:0 5px 5px -3px rgba(0,0,0,.2),0 8px 10px 1px rgba(0,0,0,.14),0 3px 14px 2px rgba(0,0,0,.12)}.jss44{box-shadow:0 5px 6px -3px rgba(0,0,0,.2),0 9px 12px 1px rgba(0,0,0,.14),0 3px 16px 2px rgba(0,0,0,.12)}.jss45{box-shadow:0 6px 6px -3px rgba(0,0,0,.2),0 10px 14px 1px rgba(0,0,0,.14),0 4px 18px 3px rgba(0,0,0,.12)}.jss46{box-shadow:0 6px 7px -4px rgba(0,0,0,.2),0 11px 15px 1px rgba(0,0,0,.14),0 4px 20px 3px rgba(0,0,0,.12)}.jss47{box-shadow:0 7px 8px -4px rgba(0,0,0,.2),0 12px 17px 2px rgba(0,0,0,.14),0 5px 22px 4px rgba(0,0,0,.12)}.jss48{box-shadow:0 7px 8px -4px rgba(0,0,0,.2),0 13px 19px 2px rgba(0,0,0,.14),0 5px 24px 4px rgba(0,0,0,.12)}.jss49{box-shadow:0 7px 9px -4px rgba(0,0,0,.2),0 14px 21px 2px rgba(0,0,0,.14),0 5px 26px 4px rgba(0,0,0,.12)}.jss50{box-shadow:0 8px 9px -5px rgba(0,0,0,.2),0 15px 22px 2px rgba(0,0,0,.14),0 6px 28px 5px rgba(0,0,0,.12)}.jss51{box-shadow:0 8px 10px -5px rgba(0,0,0,.2),0 16px 24px 2px rgba(0,0,0,.14),0 6px 30px 5px rgba(0,0,0,.12)}.jss52{box-shadow:0 8px 11px -5px rgba(0,0,0,.2),0 17px 26px 2px rgba(0,0,0,.14),0 6px 32px 5px rgba(0,0,0,.12)}.jss53{box-shadow:0 9px 11px -5px rgba(0,0,0,.2),0 18px 28px 2px rgba(0,0,0,.14),0 7px 34px 6px rgba(0,0,0,.12)}.jss54{box-shadow:0 9px 12px -6px rgba(0,0,0,.2),0 19px 29px 2px rgba(0,0,0,.14),0 7px 36px 6px rgba(0,0,0,.12)}.jss55{box-shadow:0 10px 13px -6px rgba(0,0,0,.2),0 20px 31px 3px rgba(0,0,0,.14),0 8px 38px 7px rgba(0,0,0,.12)}.jss56{box-shadow:0 10px 13px -6px rgba(0,0,0,.2),0 21px 33px 3px rgba(0,0,0,.14),0 8px 40px 7px rgba(0,0,0,.12)}.jss57{box-shadow:0 10px 14px -6px rgba(0,0,0,.2),0 22px 35px 3px rgba(0,0,0,.14),0 8px 42px 7px rgba(0,0,0,.12)}.jss58{box-shadow:0 11px 14px -7px rgba(0,0,0,.2),0 23px 36px 3px rgba(0,0,0,.14),0 9px 44px 8px rgba(0,0,0,.12)}.jss59{box-shadow:0 11px 15px -7px rgba(0,0,0,.2),0 24px 38px 3px rgba(0,0,0,.14),0 9px 46px 8px rgba(0,0,0,.12)}</style>
                                                          <style data-jss="" data-meta="MuiSvgIcon" data-jss-server-side="true">.jss215{fill:currentColor;width:1em;height:1em;display:inline-block;font-size:24px;transition:fill .2s cubic-bezier(.4,0,.2,1) 0s;user-select:none;flex-shrink:0}.jss216{color:#5063f0}.jss217{color:#36b67e}.jss218{color:rgba(0,0,0,.54)}.jss219{color:#c6292e}.jss220{color:rgba(0,0,0,.26)}</style>
                                                          <style data-jss="" data-meta="MuiAvatar" data-jss-server-side="true">.jss261{width:40px;height:40px;display:flex;position:relative;overflow:hidden;font-size:1.25rem;align-items:center;flex-shrink:0;font-family:Roboto,Helvetica,Arial,sans-serif;user-select:none;border-radius:50%;justify-content:center}.jss262{color:#fafafa;background-color:#bdbdbd}.jss263{width:100%;height:100%;text-align:center;object-fit:cover}</style>
                                                          <style data-jss="" data-meta="MuiChip" data-jss-server-side="true">.jss254{color:rgba(0,0,0,.87);height:32px;cursor:default;border:none;display:inline-flex;outline:0;padding:0;font-size:.8125rem;transition:background-color .3s cubic-bezier(.4,0,.2,1) 0s,box-shadow .3s cubic-bezier(.4,0,.2,1) 0s;font-family:Roboto,Helvetica,Arial,sans-serif;align-items:center;white-space:nowrap;border-radius:16px;justify-content:center;text-decoration:none;background-color:#e0e0e0}.jss255{cursor:pointer;-webkit-tap-highlight-color:transparent}.jss255:focus,.jss255:hover{background-color:#cecece}.jss255:active{box-shadow:0 1px 3px 0 rgba(0,0,0,.2),0 1px 1px 0 rgba(0,0,0,.14),0 2px 1px -1px rgba(0,0,0,.12);background-color:#c5c5c5}.jss256:focus{background-color:#cecece}.jss257{width:32px;color:#616161;height:32px;font-size:1rem;margin-right:-4px}.jss258{width:19px;height:19px}.jss259{cursor:inherit;display:flex;align-items:center;user-select:none;white-space:nowrap;padding-left:12px;padding-right:12px}.jss260{color:rgba(0,0,0,.26);cursor:pointer;height:auto;margin:0 4px 0 -8px;-webkit-tap-highlight-color:transparent}.jss260:hover{color:rgba(0,0,0,.4)}</style>
														  <style data-jss="" data-meta="MuiListItemText" data-jss-server-side="true">.jss221{flex:1 1 auto;padding:0 16px;min-width:0}.jss221:first-child{padding-left:0}.jss222:first-child{padding-left:56px}.jss223{font-size:.8125rem}.jss224.jss226{font-size:inherit}.jss225.jss226{font-size:inherit}</style>
														  <style data-jss="" data-meta="MuiList" data-jss-server-side="true">.jss200{margin:0;padding:0;position:relative;list-style:none}.jss201{padding-top:8px;padding-bottom:8px}.jss202{padding-top:4px;padding-bottom:4px}.jss203{padding-top:0}</style>
														  <style data-jss="" data-meta="MuiListItem" data-jss-server-side="true">.jss204{width:100%;display:flex;position:relative;box-sizing:border-box;text-align:left;align-items:center;justify-content:flex-start;text-decoration:none}.jss205{position:relative}.jss206{background-color:rgba(0,0,0,.08)}.jss207{padding-top:12px;padding-bottom:12px}.jss208{padding-top:8px;padding-bottom:8px}.jss209{opacity:.5}.jss210{border-bottom:1px solid rgba(0,0,0,.12);background-clip:padding-box}.jss211{padding-left:16px;padding-right:16px}@media (min-width:600px){.jss211{padding-left:24px;padding-right:24px}}.jss212{transition:background-color 150ms cubic-bezier(.4,0,.2,1) 0s}.jss212:hover{text-decoration:none;background-color:rgba(0,0,0,.08)}@media (hover:none){.jss212:hover{background-color:transparent}}.jss213{padding-right:32px}</style>
														  <style data-styled-components="dXmWES gBVOkB gJSIof hJtXAX ennvRr beARfa erBcUv bUDmxF chXjd XGznH igrgBm gTJEJf cIabBZ hjBPaq hBnwDG ikUjOx kClLBD frsdOu ifaIBM eVFVHD jiARkd ibMzuR eSXgoZ KcvRp gzeFNP hewaoz ijGWLb dFfBsL ceeDHP dfRjos cPxFMD Llvfd cCUkNc crmnOp flhJMf fkIsxQ hsYizb jLBqWK MDUIL kuvAWT MFaSx lehBNN" data-styled-components-is-local="true">.chXjd{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:inherit;text-align:inherit;margin-bottom:0;font-size:14px;font-weight:500;line-height:24px}.XGznH{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:#fff;text-align:inherit;margin-bottom:8px;font-size:34px;font-weight:400;line-height:40px}.igrgBm{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:#fff;text-align:inherit;margin-bottom:0;font-size:24px;font-weight:400;line-height:32px}.gTJEJf{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:inherit;text-align:center;margin-bottom:8px;font-size:24px;font-weight:400;line-height:32px}.cIabBZ{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:rgba(0,0,0,.54);text-align:center;margin-bottom:8px;font-size:20px;font-weight:500;line-height:24px}.hjBPaq{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:inherit;text-align:center;margin-bottom:8px;font-size:20px;font-weight:500;line-height:24px}.hBnwDG{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:rgba(0,0,0,.54);text-align:center;margin-bottom:8px;font-size:14px;font-weight:400;line-height:20px}.ikUjOx{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:inherit;text-align:left;margin-bottom:8px;font-size:20px;font-weight:500;line-height:24px}.kClLBD{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:rgba(0,0,0,.54);text-align:left;margin-bottom:8px;font-size:14px;font-weight:400;line-height:20px}.frsdOu{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:inherit;text-align:inherit;margin-bottom:8px;font-size:14px;font-weight:400;line-height:20px}.ifaIBM{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:#5063f0;text-align:inherit;margin-bottom:8px;font-size:14px;font-weight:400;line-height:20px}.eVFVHD{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:inline;color:#5063f0;text-align:inherit;margin-bottom:0;font-size:14px;font-weight:400;line-height:20px}.jiARkd{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:inherit;text-align:inherit;margin-bottom:0;font-size:14px;font-weight:400;line-height:20px}.ibMzuR{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:#757575;text-align:inherit;margin-bottom:0;font-size:14px;font-weight:400;line-height:20px}.eSXgoZ{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:inherit;text-align:center;margin-bottom:0;font-size:14px;font-weight:400;line-height:20px}.KcvRp{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:#36b67e;text-align:inherit;margin-bottom:8px;font-size:14px;font-weight:400;line-height:20px}.gzeFNP{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:inline;color:#36b67e;text-align:inherit;margin-bottom:0;font-size:14px;font-weight:400;line-height:20px}.hewaoz{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:rgba(0,0,0,.87);text-align:inherit;margin-bottom:8px;font-size:14px;font-weight:400;line-height:20px}.ijGWLb{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:inline;color:rgba(0,0,0,.87);text-align:inherit;margin-bottom:0;font-size:14px;font-weight:400;line-height:20px}.dFfBsL{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:inherit;text-align:center;margin-bottom:8px;font-size:14px;font-weight:400;line-height:20px}.ceeDHP{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:inherit;text-align:center;margin-bottom:0;font-size:24px;font-weight:400;line-height:32px}.dfRjos{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:inherit;text-align:center;margin-bottom:0;font-size:34px;font-weight:400;line-height:40px}.cPxFMD{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:inherit;text-align:inherit;margin-bottom:8px;font-size:20px;font-weight:500;line-height:24px}.Llvfd{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:rgba(0,0,0,.54);text-align:inherit;margin-bottom:0;font-size:14px;font-weight:400;line-height:20px}.cCUkNc{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:rgba(0,0,0,.54);text-align:inherit;margin-bottom:8px;font-size:16px;font-weight:400;line-height:24px}.crmnOp{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:rgba(0,0,0,.54);text-align:inherit;margin-bottom:0;font-size:16px;font-weight:400;line-height:24px}.flhJMf{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:inherit;text-align:center;margin-bottom:0;font-size:16px;font-weight:400;line-height:24px}.fkIsxQ{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:#fff;text-align:center;margin-bottom:8px;font-size:20px;font-weight:500;line-height:24px}.hsYizb{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:#fff;text-align:center;margin-bottom:8px;font-size:14px;font-weight:400;line-height:20px}.jLBqWK{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:rgba(0,0,0,.54);text-align:center;margin-bottom:0;font-size:24px;font-weight:400;line-height:32px}.MDUIL{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:inherit;text-align:center;margin-bottom:0;font-size:14px;font-weight:500;line-height:24px}.kuvAWT{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:rgba(0,0,0,.54);text-align:inherit;margin-bottom:0;font-size:12px;font-weight:400;line-height:16px}.MFaSx{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:#5063f0;text-align:inherit;margin-bottom:0;font-size:16px;font-weight:400;line-height:24px}.lehBNN{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:#5063f0;text-align:inherit;margin-bottom:0;font-size:14px;font-weight:400;line-height:20px}.ennvRr{min-height:56px}.beARfa{height:56px;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center}.erBcUv{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;height:100%}.bUDmxF{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-box-pack:end;-webkit-justify-content:flex-end;-ms-flex-pack:end;justify-content:flex-end;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;height:100%}.hJtXAX{margin:0 auto;max-width:1032px;height:100%;width:100%}.dXmWES{display:none;background-color:transparent;height:100vh;left:0;position:fixed;top:0;width:100vw;z-index:1500}.gBVOkB>div>div{max-width:76%}</style>
														  <style data-styled-components="kcdrgG gbgWxw kGwXKn iqQlkx erYulP iyFjeg dzqYJX kxNuvV" data-styled-components-is-local="true">.erYulP{background-color:#bdbdbd;height:1px}.dzqYJX{background-color:#e0e0e0;height:1px}.iqQlkx{margin-top:0;margin-bottom:0;margin-left:0;margin-right:0}.iyFjeg{margin-top:16px;margin-bottom:0;margin-left:0;margin-right:0}.kxNuvV{margin-top:16px;margin-bottom:16px;margin-left:0;margin-right:0}.kcdrgG{background-color:#5063f0;color:#fff;height:24px;margin-right:0}.gbgWxw{background-color:#36b67e;color:#fff;height:24px;margin-right:0}.kGwXKn{background-color:#757575;color:#fff;height:24px;margin-right:0}</style>
														  <style data-styled-components="jRMlPf bIjFSD kFonpi cDbjPL jMeSWB kssgEf cBqmhB gGlJek fsPzpa gPbtZL iMongt iyBYz qdGDr hsUnyu gvSOMz fBCnjt htIvPI dHNjDd hwnlfP eTPBlk bOZbmT lldQGB fExEbq bHLhwF NTnEt ljgrBQ bjiHAd kWbEJZ orrIZ pRFLs gAyQQz jvOyHm kksBWm dGwtKs cQmYyz" data-styled-components-is-local="true">.cQmYyz{margin-bottom:0}.jRMlPf{margin-bottom:0;padding-left:16px}.kksBWm{margin-bottom:16px;padding-left:0}.jvOyHm{display:inline-block;margin-bottom:8px;margin-top:32px}.NTnEt{-webkit-text-decoration:none;text-decoration:none;color:#424242}.NTnEt:hover{color:#5063f0;-webkit-transition:color .4s ease;transition:color .4s ease}.ljgrBQ{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;height:32px;-webkit-box-pack:start;-webkit-justify-content:flex-start;-ms-flex-pack:start;justify-content:flex-start;margin:16px 0}.dGwtKs{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;height:32px;-webkit-box-pack:end;-webkit-justify-content:flex-end;-ms-flex-pack:end;justify-content:flex-end;margin:16px 0}.bjiHAd{margin-bottom:8px}.kWbEJZ{margin-bottom:8px}.pRFLs{margin-bottom:8px}.orrIZ{margin-bottom:8px}.gAyQQz{-webkit-text-decoration:none;text-decoration:none;color:#757575}.gAyQQz:hover{color:#757575;-webkit-transition:color .4s ease;transition:color .4s ease}.fExEbq{background-color:#fafafa;padding:16px 0;margin:0}.bHLhwF{margin:0 24px}.bOZbmT{-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;background-color:#5063f0;border-radius:0;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;-webkit-box-pack:justify;-webkit-justify-content:space-between;-ms-flex-pack:justify;justify-content:space-between;padding:24px;padding-bottom:48px}@media (max-width:599.95px){.bOZbmT{padding-bottom:32px;padding-top:0}}.lldQGB{-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;margin-top:24px}.gPbtZL{font-size:34px;font-weight:400;line-height:40px}@media (max-width:959.95px){.gPbtZL{font-size:24px;font-weight:400;line-height:32px}}.iMongt{font-size:16px;font-weight:400;line-height:24px}.kFonpi{color:inherit;display:inline-block;-webkit-text-decoration:none;text-decoration:none;margin-right:40px}.bIjFSD{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-box-pack:end;-webkit-justify-content:flex-end;-ms-flex-pack:end;justify-content:flex-end;-webkit-align-items:baseline;-webkit-box-align:baseline;-ms-flex-align:baseline;align-items:baseline}.cDbjPL{-webkit-flex-direction:row;-ms-flex-direction:row;flex-direction:row;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-wrap:wrap;-ms-flex-wrap:wrap;flex-wrap:wrap;-webkit-align-items:flex-start;-webkit-box-align:flex-start;-ms-flex-align:flex-start;align-items:flex-start;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center}.iyBYz{-webkit-flex-direction:row;-ms-flex-direction:row;flex-direction:row;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-wrap:wrap;-ms-flex-wrap:wrap;flex-wrap:wrap;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center}.htIvPI{-webkit-flex-direction:row;-ms-flex-direction:row;flex-direction:row;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-wrap:wrap;-ms-flex-wrap:wrap;flex-wrap:wrap;-webkit-align-items:stretch;-webkit-box-align:stretch;-ms-flex-align:stretch;align-items:stretch;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center}.jMeSWB{position:relative;box-sizing:border-box;width:100%;padding:0 8px;-webkit-flex:0 0 100%;-ms-flex:0 0 100%;flex:0 0 100%;max-width:100%}@media (min-width:600px){.jMeSWB{-webkit-flex:0 0 100%;-ms-flex:0 0 100%;flex:0 0 100%;max-width:100%}}@media (min-width:960px){.jMeSWB{-webkit-flex:0 0 50%;-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%}}@media (min-width:1280px){.jMeSWB{-webkit-flex:0 0 50%;-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%}}@media (min-width:1920px){.jMeSWB{-webkit-flex:0 0 50%;-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%}}.qdGDr{position:relative;box-sizing:border-box;width:100%;padding:0 8px;-webkit-flex:0 0 100%;-ms-flex:0 0 100%;flex:0 0 100%;max-width:100%}@media (min-width:600px){.qdGDr{-webkit-flex:0 0 16.666666666666664%;-ms-flex:0 0 16.666666666666664%;flex:0 0 16.666666666666664%;max-width:16.666666666666664%}}@media (min-width:960px){.qdGDr{-webkit-flex:0 0 16.666666666666664%;-ms-flex:0 0 16.666666666666664%;flex:0 0 16.666666666666664%;max-width:16.666666666666664%}}@media (min-width:1280px){.qdGDr{-webkit-flex:0 0 16.666666666666664%;-ms-flex:0 0 16.666666666666664%;flex:0 0 16.666666666666664%;max-width:16.666666666666664%}}@media (min-width:1920px){.qdGDr{-webkit-flex:0 0 16.666666666666664%;-ms-flex:0 0 16.666666666666664%;flex:0 0 16.666666666666664%;max-width:16.666666666666664%}}.hsUnyu{position:relative;box-sizing:border-box;width:100%;padding:0 8px;-webkit-flex:0 0 100%;-ms-flex:0 0 100%;flex:0 0 100%;max-width:100%}@media (min-width:600px){.hsUnyu{-webkit-flex:0 0 50%;-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%}}@media (min-width:960px){.hsUnyu{-webkit-flex:0 0 50%;-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%}}@media (min-width:1280px){.hsUnyu{-webkit-flex:0 0 50%;-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%}}@media (min-width:1920px){.hsUnyu{-webkit-flex:0 0 50%;-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%}}.gvSOMz{position:relative;box-sizing:border-box;width:100%;padding:0 8px;-webkit-flex:0 0 100%;-ms-flex:0 0 100%;flex:0 0 100%;max-width:100%}@media (min-width:600px){.gvSOMz{-webkit-flex:0 0 8.333333333333332%;-ms-flex:0 0 8.333333333333332%;flex:0 0 8.333333333333332%;max-width:8.333333333333332%}}@media (min-width:960px){.gvSOMz{-webkit-flex:0 0 8.333333333333332%;-ms-flex:0 0 8.333333333333332%;flex:0 0 8.333333333333332%;max-width:8.333333333333332%}}@media (min-width:1280px){.gvSOMz{-webkit-flex:0 0 8.333333333333332%;-ms-flex:0 0 8.333333333333332%;flex:0 0 8.333333333333332%;max-width:8.333333333333332%}}@media (min-width:1920px){.gvSOMz{-webkit-flex:0 0 8.333333333333332%;-ms-flex:0 0 8.333333333333332%;flex:0 0 8.333333333333332%;max-width:8.333333333333332%}}.fBCnjt{position:relative;box-sizing:border-box;width:100%;padding:0 8px;-webkit-flex:0 0 100%;-ms-flex:0 0 100%;flex:0 0 100%;max-width:100%}@media (min-width:600px){.fBCnjt{-webkit-flex:0 0 25%;-ms-flex:0 0 25%;flex:0 0 25%;max-width:25%}}@media (min-width:960px){.fBCnjt{-webkit-flex:0 0 25%;-ms-flex:0 0 25%;flex:0 0 25%;max-width:25%}}@media (min-width:1280px){.fBCnjt{-webkit-flex:0 0 25%;-ms-flex:0 0 25%;flex:0 0 25%;max-width:25%}}@media (min-width:1920px){.fBCnjt{-webkit-flex:0 0 25%;-ms-flex:0 0 25%;flex:0 0 25%;max-width:25%}}.dHNjDd{position:relative;box-sizing:border-box;width:100%;padding:0 8px;-webkit-flex:0 0 50%;-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%}@media (min-width:600px){.dHNjDd{-webkit-flex:0 0 50%;-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%}}@media (min-width:960px){.dHNjDd{-webkit-flex:0 0 50%;-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%}}@media (min-width:1280px){.dHNjDd{-webkit-flex:0 0 50%;-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%}}@media (min-width:1920px){.dHNjDd{-webkit-flex:0 0 50%;-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%}}.hwnlfP{position:relative;box-sizing:border-box;width:100%;padding:0 8px;-webkit-flex:0 0 100%;-ms-flex:0 0 100%;flex:0 0 100%;max-width:100%}@media (min-width:600px){.hwnlfP{-webkit-flex:0 0 100%;-ms-flex:0 0 100%;flex:0 0 100%;max-width:100%}}@media (min-width:960px){.hwnlfP{-webkit-flex:0 0 100%;-ms-flex:0 0 100%;flex:0 0 100%;max-width:100%}}@media (min-width:1280px){.hwnlfP{-webkit-flex:0 0 100%;-ms-flex:0 0 100%;flex:0 0 100%;max-width:100%}}@media (min-width:1920px){.hwnlfP{-webkit-flex:0 0 100%;-ms-flex:0 0 100%;flex:0 0 100%;max-width:100%}}.eTPBlk{position:relative;box-sizing:border-box;width:100%;padding:0 8px;-webkit-flex:0 0 66.66666666666666%;-ms-flex:0 0 66.66666666666666%;flex:0 0 66.66666666666666%;max-width:66.66666666666666%}@media (min-width:600px){.eTPBlk{-webkit-flex:0 0 66.66666666666666%;-ms-flex:0 0 66.66666666666666%;flex:0 0 66.66666666666666%;max-width:66.66666666666666%}}@media (min-width:960px){.eTPBlk{-webkit-flex:0 0 83.33333333333334%;-ms-flex:0 0 83.33333333333334%;flex:0 0 83.33333333333334%;max-width:83.33333333333334%}}@media (min-width:1280px){.eTPBlk{-webkit-flex:0 0 91.66666666666666%;-ms-flex:0 0 91.66666666666666%;flex:0 0 91.66666666666666%;max-width:91.66666666666666%}}@media (min-width:1920px){.eTPBlk{-webkit-flex:0 0 91.66666666666666%;-ms-flex:0 0 91.66666666666666%;flex:0 0 91.66666666666666%;max-width:91.66666666666666%}}.cBqmhB{line-height:1.5}@media (max-width:599.95px){.cBqmhB{text-align:center;font-size:24px;font-weight:400;line-height:32px}}@media (max-width:599.95px){.fsPzpa{font-size:16px;font-weight:400;line-height:24px}}.kssgEf{padding-right:32px}@media (max-width:599.95px){.kssgEf{padding:32px 16px;text-align:center}}@media (max-width:599.95px){.gGlJek{max-width:190px;margin:0 auto}}</style>
														  <style data-styled-components="jmUojt dVZpFn gEonKY fYgwDV iApApL kBcekM kKAqKs gZzrSB fBbfOY htgUWi fHaeNg doEYka bokSOt jCQGKS jJsluQ ecJbVf hAjjvO gWOtiB RHDgE gyWGXd jDJpTw kClokr jeqLQt hvImqV gqysQO jWLPEz jugaIX fEgzNb jGCInU gSwQos kJSChf bSjNsS cMtsMw kbXedg fYiiuQ bWRwhi eynmni gkpJHv dppadL ecJbVg" data-styled-components-is-local="true">@media (max-width:959.95px){.dVZpFn{-webkit-order:-1;-ms-flex-order:-1;order:-1}}@media (max-width:599.95px){.dVZpFn{padding:0}}.kBcekM{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex}.iApApL{border:none;margin:0;padding:0;min-width:0}.gEonKY{background-color:#fff;padding:8px 24px;border-radius:2px}@media (max-width:599.95px){.gEonKY{border-radius:0;padding-left:8px;padding-right:8px}}.fYgwDV{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column}@media (max-width:599.95px){.fYgwDV{margin:24px 16px 16px;border:solid 1px #e0e0e0;padding:16px}}.kKAqKs{-webkit-align-self:center;-ms-flex-item-align:center;align-self:center;padding-top:24px}.gZzrSB{-webkit-align-self:center;-ms-flex-item-align:center;align-self:center;margin:24px 0}.jmUojt{background-color:#5063f0;padding:32px 0}@media (max-width:599.95px){.jmUojt{padding:0}}.kbXedg{margin:8px 0}@media (max-width:599.95px){.kbXedg{text-align:center}}.cMtsMw{padding:8px 16px;background-color:#e0e0e0;max-width:410px;top:50%;right:16px;-webkit-transform:translateY(-50%);-ms-transform:translateY(-50%);transform:translateY(-50%)}@media (min-width:960px){.cMtsMw{max-width:670px;position:absolute}}@media (max-width:599.95px){.cMtsMw{background-color:transparent;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;-webkit-transform:none;-ms-transform:none;transform:none}}.gSwQos{padding:32px 0;overflow:hidden}@media (max-width:599.95px){.gSwQos{padding:0;padding-bottom:16px;margin:0 24px}}.kJSChf{position:relative;margin-top:32px}@media (max-width:599.95px){.kJSChf{margin-top:16px}}.bSjNsS{margin-left:16px}@media (max-width:599.95px){.bSjNsS{margin-left:0;width:100%}}.bokSOt{margin:24px 0}.doEYka{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;padding-top:24px;padding-bottom:16px}.fBbfOY{padding:32px;-webkit-align-content:center;-ms-flex-line-pack:center;align-content:center}.htgUWi{text-align:center}@media (max-width:599.95px){.htgUWi{margin-top:24px}}.fHaeNg{-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;height:100%}@media (max-width:599.95px){.fHaeNg.textContent *{text-align:center}}.dppadL{position:absolute;left:0;top:0;width:100%;height:100%}.eynmni{width:100%;position:relative}.gkpJHv{width:100%;display:block;padding:6.4%}.jGCInU{padding:48px 16px;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;height:auto}@media (max-width:599.95px){.jGCInU{background-color:transparent;padding:32px 16px}}.bWRwhi{margin-top:auto;padding-top:24px;width:170px}.fYiiuQ{margin-top:32px}.jCQGKS{background-color:#e0e0e0;overflow:hidden;padding-top:16px;padding-bottom:48px}.jJsluQ{padding-bottom:24px}.hvImqV{line-height:2.5;position:absolute;top:0;left:0;right:0;color:#fff;background-color:#36b67e}.gyWGXd{font-size:54px;line-height:1}.RHDgE{font-size:24px;font-weight:400;line-height:32px}.hAjjvO{padding:24px 0}.jDJpTw{padding:16px;min-height:130px}.gWOtiB{height:unset;padding-bottom:4px;padding-top:4px}.kClokr{margin-right:0;color:#5063f0}.gqysQO{margin-right:0;color:#36b67e}.fEgzNb{margin-right:0;color:inherit}.jeqLQt{margin-top:16px}.ecJbVf{text-align:center;padding:32px 0;position:relative;height:100%}.jugaIX{background-color:#fafafa;color:#424242;font-size:14px;font-weight:400;line-height:20px}.ecJbVg{text-align:center;padding:32px 0;position:relative;height:70%}.jugaIX{background-color:#fafafa;color:#424242;font-size:14px;font-weight:400;line-height:20px}.jWLPEz{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;height:100%}</style>
														  <style data-styled-components="gzHlrG hsCtPg fUOAvB dLPVue ilVeTz ePPSMY hhNpJT fuLfMH grdcPs LECyq cnVKvy exhWPQ dtfZhD yzWpN" data-styled-components-is-local="true">.gzHlrG{background-color:#fafafa;overflow:hidden;padding:24px;padding-top:16px;padding-bottom:32px;text-align:center}.fUOAvB{background-color:#e0e0e0;overflow:hidden;padding:24px;padding-top:16px;padding-bottom:32px;text-align:center}.hsCtPg{max-width:290px;margin:0 auto}.cnVKvy{margin-bottom:32px}.grdcPs{padding-top:48px;padding-bottom:48px;background-color:#e0e0e0}.LECyq{margin-top:32px;margin-bottom:32px}.exhWPQ{-webkit-flex:1;-ms-flex:1;flex:1;text-align:center;padding-left:8px;padding-right:8px}@media (max-width:959.95px){.exhWPQ{-webkit-flex:0 0 100%;-ms-flex:0 0 100%;flex:0 0 100%;margin-bottom:16px}.exhWPQ:nth-child(n+4){display:none}}.yzWpN{-webkit-flex:1;-ms-flex:1;flex:1;text-align:center;padding-left:8px;padding-right:8px}@media (max-width:959.95px){.yzWpN{-webkit-flex:0 0 100%;-ms-flex:0 0 100%;flex:0 0 100%}.yzWpN:nth-child(n+4){display:none}}.dtfZhD{width:100%}@media (max-width:959.95px){.dtfZhD{width:auto}}.hhNpJT{margin-top:16px}.ePPSMY{text-align:center;-webkit-align-self:flex-start;-ms-flex-item-align:start;align-self:flex-start}@media (max-width:599.95px){.ePPSMY{margin:24px 0;-webkit-align-self:center;-ms-flex-item-align:center;align-self:center}}.fuLfMH{background-color:#36b67e;margin-right:8px;margin-top:8px}.fuLfMH>span{color:#fff}.dLPVue{padding:48px 32px}.ilVeTz{margin-top:32px}@media (max-width:599.95px){.ilVeTz{text-align:center}}</style>	   
</section>
<!-- page end-->
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
    <script src="{{ asset('js/jquery.form.min.js') }}" defer></script>
    <script src="{{ asset('js/sweetalert2.min.js') }}" defer></script>
    <script>
        $(document).ready(function() { 
            $("#tipo_publicacion").val("venta_free");
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
		
    </script>
@endsection

