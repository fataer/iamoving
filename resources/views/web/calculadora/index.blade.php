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
    <div class="container my-0">
        <div class="row text-center  my-0">
		                <!--div class="row justify-content-center">-->
                    <!--<div class="col-12 text-center  my-0">
                        <img src="/img/logo iamoving.png" alt="IAMOVING logotipo" width="350" class="m-0">
                    </div>-->
                <!--</div>-->
            <div class="col-12 my-0">
                <!--<div class="animated bounceInLeft fast">-->
                    <h2 class="display-5 my-3">CALCULADORAS IAMOVING</h2>

					<!--<h5 class="display-5 my-1" >
						Somos nosotros, vosotros o cualquier persona que no quiere sufrir más 
                    </h5>
					<h5 class="display-5 my-1"  >
						para encontrar su piso ideal. 
                    </h5>
					<h5 class="display-5 my-1" >
						Iamoving es una plataforma digital que pretende terminar
                    </h5>
					<h5 class="display-5  my-1">
						con la pesadilla que supone buscar piso.
                    </h5>	-->				
					 
                <!--</div>-->
				<p class="my-4"></p>
            </div>
<!--		  <div class="container">
					<div class="row  justify-content-center">
						<div class="col-md-10">
							<video-card 
									href="https://youtu.be/NhflkYA-g1Q"
									source="https://www.youtube.com/embed/NhflkYA-g1Q" >
					
								  
							</video-card>
						</div>
					</div>
					<p class="my-3"></p>
			</div>-->
   <!--         <div class="w-75 mx-auto">
                <div class="bg-warning my-4" style="min-height: 1px;"></div>
            </div>-->


<!--                        <div class="col-12">
                <div class="animated bounceInLeft delay-1s">
                    <h3 class="display-4">Iamoving</h3>     
                    <p>
Es una plataforma digital, usamos tecnología, para aportarte
beneficios y ayudarte a encontrar tu inmueble ideal.

                    </p>
                </div>
            </div>-->
            <!--<div class="w-75 mx-auto">
                <div class="bg-warning my-4" style="min-height: 0px;"></div>
            </div>-->
           <!-- <div class="w-75 mx-auto">
                <div class="bg-warning my-4" style="min-height: 0px;"></div>
            </div>-->
           <!-- <div class="w-75 mx-auto">
                <div class="bg-warning my-4" style="min-height: 1px;"></div>
            </div>-->
			
            <div class="col-12">
			<p class="my-3"></p>
                <!--<div class="animated bounceInLeft delay-1s">-->
				<p class="my-0">
				  <button type="button" class="btn btn-dark btn-lg btn-block border-dark dropdown-toggle"  data-toggle="collapse" 
				  data-target="#collapseExample0" aria-expanded="false" aria-controls="collapseExample0" aria-haspopup="true" 
				  style="font-weight:bold;color:#EADD1B;border-radius:0%; !important;;outline:none !important;outline-width: 0 !important; box-shadow: none;-moz-box-shadow: none;-webkit-box-shadow: none;" >
				  VENDER UNA PROPIEDAD
			      </button>
				</p>
				<div class="collapse  my-0" id="collapseExample0">
				  <div class="card  bg-transparent border-dark my-0">

						  <div class="card-body text-success  my-0">
							  <div class="col-md-6 text-center">
								<!--<h5 class="card-title">Success card title</h5>-->
						<!--		<h5 class="display-5 my-1" >Existen decenas de plataformas inmobiliarias con miles de casas, algo</h5>
								<h5 class="display-5 my-1" >que a simple vista parece facilitar la tarea de encontrar piso.</h5>
								<p class="my-3"></p>
								<h5 class="display-5 my-1" >Pero si estás leyendo esto sabrás más que de sobra lo difícil que es llegar al piso ideal,</h5>
								<h5 class="display-5 my-1" > y la cantidad de tiempo que se invierte en esto. La falta de información</h5>
								<h5 class="display-5 my-1" > y las fotos engañosas suelen desembocar en visitas frustradas y tiempo perdido.</h5>-->
								<rate-calculator ></rate-calculator>
								</div>
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
				  style="font-weight:bold;color:#EADD1B;border-radius:0%; !important;;outline:none !important;outline-width: 0 !important; box-shadow: none;-moz-box-shadow: none;-webkit-box-shadow: none;" >
				  BONIFICACION EN EFECTIVO
			      </button>
				</p>
				<div class="collapse  my-0" id="collapseExample1">
				  <div class="card  bg-transparent border-dark my-0">

						  <div class="card-body text-success  my-0">
						  <div class="col-md-6 text-center">
							<bon-calculator ></bon-calculator>
							</div>					
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
				  style="font-weight:bold;color:#EADD1B;border-radius:0%; !important;;outline:none !important;outline-width: 0 !important; box-shadow: none;-moz-box-shadow: none;-webkit-box-shadow: none;" >
				  ANUNCIO COMPRA 175.000 €
			      </button>
				</p>
				<div class="collapse  my-0" id="collapseExample2">
				  <div class="card  bg-transparent border-dark my-0">

						  <div class="card-body text-success  my-0">
						   <div class="col-md-6 text-center">

							<calculator-app default-value="175000"></calculator-app>
							</div>					
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
				  style="font-weight:bold;color:#EADD1B;border-radius:0%; !important;;outline:none !important;outline-width: 0 !important; box-shadow: none;-moz-box-shadow: none;-webkit-box-shadow: none;" >
				  BUSCANDO ALQUILER
			      </button>
				</p>
				<div class="collapse  my-0" id="collapseExample3">
				  <div class="card  bg-transparent border-dark my-0">

						  <div class="card-body text-success  my-0">
						 <div class="col-md-6 text-center">
<rental-calculator></rental-calculator>
			</div>
						  </div>					
					  </div>
                  </div>					  
            </div>
			            <div class="col-12">
			<p class="my-3"></p>
                <!--<div class="animated bounceInLeft delay-1s">-->
				<p class="my-0">
				  <button type="button" class="btn btn-dark btn-lg btn-block border-dark dropdown-toggle"  data-toggle="collapse" 
				  data-target="#collapseExample4" aria-expanded="false" aria-controls="collapseExample4" aria-haspopup="true" 
				  style="font-weight:bold;color:#EADD1B;border-radius:0%; !important;;outline:none !important;outline-width: 0 !important; box-shadow: none;-moz-box-shadow: none;-webkit-box-shadow: none;" >
				  COMPRANDO CON IAMOVING
			      </button>
				</p>
				<div class="collapse  my-0" id="collapseExample4">
				  <div class="card  bg-transparent border-dark my-0">

						  <div class="card-body text-success  my-0">
						 <div class="col-md-6 text-center">
<sale-calculator ></sale-calculator>
			</div>
						  </div>					
					  </div>
                  </div>					  
            </div>			
			


            <!--<div class="col-12">
                <div class="animated bounceInLeft delay-2s">
                    <h3 class="display-4">Transparencia y sin conflicto de intereses</h3>        
                    <p>
                        Como no cobramos ninguna comisión al propietario, no vendemos ni alquilamos 
                        su propiedad. Así que, defendemos, representamos y miramos totalmente por tus intereses. <b>Sin comisiones ocultas dentro de los precios, 
                        no pagas de más y si pagas por lo que realmente vale.</b> 
                    </p>
                </div>
            </div>

            <div class="w-75 mx-auto">
                <div class="bg-warning my-4" style="min-height: 1px;"></div>
            </div>
-->


        </div>
<div class="my-5"></div>
        {{-- <div class="d-flex justify-content-between py-5">
            <a href="#" class="color-letra">ANUNCIAR INMUEBLE GRATIS</a>
            <a href="#" class="color-letra">BUSCANDO INMUEBLE</a>
        </div> --}}
    </div>
@endsection