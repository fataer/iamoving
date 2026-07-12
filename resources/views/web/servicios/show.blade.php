@extends('layouts.iamovingpro')
@section('title', 'IAMOVING - Fácil de alquilar, comprar y vender')
@section('description', '¡Fácil de alquilar, comprar y vender!')
@section('image', 'https://iamoving.com/img/iamoving.png')
@section('content')
    <!--<div class="bg-black"  style="height: 450px; overflow-y: hidden;">
        <video id="primary-video" src="/storage/{{$service->video}}" class="video-fluid z-depth-1" width="100%" height="100%" controls></video>
    </div>-->
    <div class="container">
        <div  class="text-center mt-4">
            <h1>
                {{$service->nombre}}
            </h1>
            <h4>{{$service->descripcion}}</h4>
        </div>
        <hr>
        
        @if ($service->id >= 5)
            <nav class="nav nav-pills nav-justified mb-3" id="pills-tab" role="tablist">
                <a class="nav-item nav-link active" 
                    id="pills-service-tab" 
                    data-toggle="pill" 
                    href="#pills-service" 
                    role="tab" 
                    aria-controls="pills-service" 
                    aria-selected="true">
                    <!--{{$service->details[0]->nombre}}-->
                    Servicios:
                </a>
                
                <!--<a class="nav-item nav-link" 
                    id="pills-exploring-tab" 
                    data-toggle="pill" 
                    href="#pills-exploring" 
                    role="tab"
                    aria-controls="pills-exploring" 
                    aria-selected="false">
                    {{$service->details[1]->nombre}}
                </a>-->
            </nav>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-service" role="tabpanel" aria-labelledby="pills-service-tab">
                   <!-- <video-card class="video-card"
                                :body="{{$service->details[0]}}" 
                                source="/storage/{{$service->details[0]->video}}"
                                only-title></video-card>-->
                    <center><h2>Servicio verificado</h2>
                    <p>Buscamos, comprobamos y filtramos,
expertos en servicios que te ayudaran con lo que sea necesario.
Llevándote la mejor experiencia posible, 100% transparente, ahorrándote tiempo y dinero.
</p>


                    <center><h2>¡No pagues de más, sin comisiones ocultas dentro de los precios!</h2>
                    <p>Es muy habitual, que los porteros, inmobiliarias y los intermediarios en general, reciban una buena comisión de los servicios contratados por ti. Nosotros, no cobramos ni recibimos ninguna comisión de los servicios elegidos por ti. Así que con Iamoving, no se incrementan los precios de los servicios, para cubrir las <b>comisiones ocultas de los intermediarios</b>,
como suele pasar. Siendo más confiable, transparente y haciendo pagarte por el
precio justo. ¡Mejor! Pagando aún menos, con nuestros descuentos especiales.
</p>
 @if ($service->id == 5)
                    <center><h2>¿Cómo funciona?</h2>
                    <p>Por cada inmueble alquilado con Iamoving,
tendrás derecho un descuento especial de cada servicio mencionado abajo.
En el caso de no necesitar de todos los servicios que tenemos,
podrás regalar tus descuentos especiales a familiares, amigos o quien lo prefieras,
con la condición de que tú conocido viva en Madrid.
</p>
@endif
 @if ($service->id == 6)
                    <center><h2>¿Cómo funciona?</h2>
                    <p>Por cada inmueble comprado con Iamoving,
tendrás derecho un descuento especial de cada servicio mencionado abajo.
En el caso de no necesitar de todos los servicios que tenemos,
podrás regalar tus descuentos especiales a familiares, amigos o quien lo prefieras,
con la condición de que tú conocido viva en Madrid.
</p>
@endif
@if ($service->id == 7)
                    <center><h2>¿Cómo funciona?</h2>
                    <p>Por cada inmueble alquilado con Iamoving,
tendrás derecho un descuento especial de cada servicio mencionado abajo.
En el caso de no necesitar de todos los servicios que tenemos,
podrás regalar tus descuentos especiales a familiares, amigos o quien lo prefieras,
con la condición de que tú conocido viva en Madrid.
</p>
@endif
@if ($service->id == 8)
                    <center><h2>¿Cómo funciona?</h2>
                    <p>Por cada inmueble vendido con Iamoving,
tendrás derecho un descuento especial de cada servicio mencionado abajo.
En el caso de no necesitar de todos los servicios que tenemos,
podrás regalar tus descuentos especiales a familiares, amigos o quien lo prefieras,
con la condición de que tú conocido viva en Madrid.
</p>
@endif

                </div>
              <!--<div class="tab-pane fade" id="pills-exploring" role="tabpanel" aria-labelledby="pills-exploring-tab">-->
                    <!--<video-card class="video-card"
                                :body="{{$service->details[1]}}" 
                                source="/storage/{{$service->details[1]->video}}"
                                only-title></video-card>-->
<!--</p></center>-->
                    <!-- <center><h2></h2>-->
                   <!-- <p>
¡Exploramos los barrios de la ciudad! Filtramos lo que hay mejor para ti, llevándote experiencias únicas, las que tú mereces. Gym, tiendas, restaurantes…
</p></center>                                
                </div>-->
            </div>      
        <div class="row mb-5">
            @foreach ($service->details as $detail)
                <div class="col-md-4 col-sm-6 col-xs-12 mb-3">
                    <!--<div class="card video-card">-->
                       <!-- <video  width="100%" 
                                preload="metadata"
                                controls>
                            <source src="/storage/{{$detail->video}}"  type="video/mp4" />
                        </video>-->
                            <a class="card-link" data-toggle="collapse" href="#description-{{$detail->id}}" 
							role="button" aria-expanded="false" aria-controls="description-{{$detail->id}}">
                            <div class="card card-image text-white"
                                    style="height: 180px;width: 325px;text-decoration:none; background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('/storage//{{$detail->foto_principal}}')" 
									title="leer más">

                            </div>                              
                        </a>
                        <div class="card-body">
                            <h3 class="card-title font-italic">
                               <!-- <a class="card-link" data-toggle="collapse" href="#description-{{$detail->id}}" role="button" aria-expanded="false" aria-controls="description-{{$detail->id}}">-->
                                   {{$detail->nombre}}
                                <!--</a>-->
                            </h3>
                            <!--<a href="/servicio/{{$service->id}}/{{$detail->id}}/">-->
                                <div class="card-text text-muted collapse" id="description-{{$detail->id}}">
                                   {!! $detail->descripcion !!}
                                   
                                </div>
                            <!--</a>-->
                        </div> 
                    <!--</div>-->
                </div>
            @endforeach
        </div>

        @else
        <div class="row mb-5">
            @foreach ($service->details as $detail)
                <div class="col-md-6 col-sm-6 col-xs-12 mb-3"   align="center">
					<div class="card" style="width: 23rem;border:2px solid #EADD03;">
						<a class="card-link  dropdown-toggle" data-toggle="collapse" href="#description-{{$detail->id}}" 
							role="button" aria-expanded="false" aria-controls="description-{{$detail->id}}">
							<div class="card-header" style="background-color:#EADD03; ">
							  <img class="card-img-top" style="background-color:#EADD03;width:20%;"  src="/storage/{{$detail->foto_principal}}" alt="Card image cap">
							  <h5 class="card-title">{{$detail->nombre}}</h5>
							</div>
						</a>
						 <!-- <div class="card-body">

							<p class="card-text">Piso verificado</p>
						  </div>-->
						  <!--<ul class="list-group list-group-flush">
							<li class="list-group-item" style="text-align: left;">Cras justo odio</li>
							<li class="list-group-item">Dapibus ac facilisis in</li>
							<li class="list-group-item">Vestibulum at eros</li>
						  </ul>-->
						  <div class="card-body  collapse" id="description-{{$detail->id}}">
							 {!! $detail->descripcion !!}
						  </div>
					</div>
                </div>
            @endforeach
        </div>
        @endif

        <hr>
        <div class="fb-comments" data-href="{{ env('APP_DEBUG') ? 'http://localhost' : url()->current() }}" data-width="100%" data-numposts="5"></div>
    </div>
@endsection

@section('scripts')
  <!--  <script async defer src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.2"></script>

    <script>
        window.addEventListener('DOMContentLoaded', function() {
            const primary = '/storage/{{$service->video}}';
            const primaryVideo = $('#primary-video');
            const videoCards = $('.card.video-card');

            videoCards.on('click', function(e) {
                const src = $(this).find('video').attr('src');

                primaryVideo.attr('src', src);
                primaryVideo[0].load();
            });
        });
    </script>-->
@endsection
