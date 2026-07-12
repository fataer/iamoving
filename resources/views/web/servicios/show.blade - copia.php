@extends('layouts.web')

@section('content')
    <!--<div class="bg-black"  style="height: 450px; overflow-y: hidden;">
        <video id="primary-video" src="/storage/{{$service->video}}" class="video-fluid z-depth-1" width="100%" height="100%" controls></video>
    </div>-->
    <div class="container">
        <div  class="text-center mt-4">
            <h2>
                {{$service->nombre}}
            </h2>
            <h4>{{$service->descripcion}}</h4>
        </div>
        <hr>
        
        @if ($service->id == 5)
            <nav class="nav nav-pills nav-justified mb-3" id="pills-tab" role="tablist">
                <a class="nav-item nav-link active" 
                    id="pills-service-tab" 
                    data-toggle="pill" 
                    href="#pills-service" 
                    role="tab" 
                    aria-controls="pills-service" 
                    aria-selected="true">
                    {{$service->details[0]->nombre}}
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
                    <center><h2>20% Descuento MUDANZA</h2></center>
                    <p><b>Mudanzas GRUPO LORENZO</b>, empresa especializada en todo tipo de mudanzas y traslados, desde mudanzas internacionales hasta los portes más pequeños. Nuestro equipo de profesionales se encargará de hacer más ágil su mudanza: desmontaje, embalaje, tramitación de permisos, etc.</p><p>Contacto:  <a href="https://www.mudanzaslorenzo.es" target="_blank">www.mudanzaslorenzo.es</a></p><p>Teléfono móvil: <a href="tel:+34666918552">666 918 552</a></p>


                    <center><h2>20% dto. MANITAS</h2>
                    <p>Realizamos trabajo de pequeñas reparaciones en casa (colgar cuadros cambiar bombillas, arreglar o sustituir cerraduras, cuerdas de persianas, etc...).</p><p>Contacto: Lorenzo</p><p>Teléfono móvil: <a href="tel:+34666918552">666 918 552</a></p>

                    <center><h2>20% dto. PORTES</h2></center>
                    <p>Desde un solo bulto, mobiliario de oficina, recogida de muebles en Ikea, canapés, sofás, frigoríficos, cajas, recogida en centros comerciales, personal cualificado , rapidez en cada uno de nuestro servicios.</p><p>Contacto:  <a href="https://www.mudanzaslorenzo.es" target="_blank">www.mudanzaslorenzo.es</a></p><p>Teléfono móvil: <a href="tel:+34666918552">666 918 552</a></p>

                    <center><h2>20% dto. GUARDAMUEBLES</h2></center>
                    <p>Si tienes previsto realizar una reforma en tu hogar, nosotros nos encargamos de guardar todos tus muebles el tiempo que necesites. Te ofrecemos la oportunidad de alquilar el guardamuebles durante días, semanas, meses o una mayor duración.</p><p>Contacto:  <a href="httpS://www.mudanzaslorenzo.es" target="_blank">www.mudanzaslorenzo.es</a></p><p>Teléfono móvil: <a href="tel:+34666918552">666 918 552</a></p>

                    <center><h2>20% Descuento PINTURA</h2></center>
                    <p>Pintura en general, alisamos paredes y techos. Viviendas, locales, trasteros, terraza, portales, etc. Transporte y Herramientas propias.</p><p>Contacto:  <a href="http://www.pinturasydecoracionesdaniel.com" target="_blank">www.pinturasydecoracionesdaniel.com</a></p>
<p>Teléfono móvil: <a href="tel:+34663819781">663 819 781</a></p>

                    <center><h2>20% dto. ACUCHILLAR Y BARNIZAR PARQUET</h2>
                    <p>Somos especialistas en la acuchillado, lijado y barnizado de parquet tanto para reformas en pisos y viviendas como para obras de locales, tiendas y oficinas en Madrid.</p><p>Contacto: <a href="http://www.pinturasydecoracionesdaniel.com" target="_blank">www.pinturasydecoracionesdaniel.com</a></p><p>Teléfono móvil: <a href="tel:+34663819781">663 819 781</a></p>
<!--<p>Contacto:  <a href="http://www.pinturasydecoracionesdaniel.com" target="_blank">-->
                    <center><h2>20% dto. ARMARIOS Y VESTIDORES</h2>
                    <p>El equipo que formamos DECORMARA sabemos que lo importante para nuestros clientes es conseguir un espacio que refleje un estilo propio y, sobre todo, personal y distinguido. Nuestro lema es claro y directo; ayudar a nuestros clientes a crear su propio hogar, con nuestros armarios a media.</p><p>Contacto:  <a href="https://www.decormara.com" target="_blank">www.decormara.com</a></p><p>Teléfono móvil: <a href="tel:+34687539621">687 539 621</a></p>



                    <center><h2>20% dto. ELETRICIDAD</h2>
                    <p>En INGENINSA realizamos proyectos en los siguientes campos: Seguridad integral, Domótica, instalaciones eléctricas, etc.</p><p>Contacto:  gdiaz@ingeninsa.com</p><p>Teléfono móvil: <a href="tel:+34667540230">667 540 230</a></p>   

                    <center><h2>10% dto. CALEFACCIÓN / AIRE ACONDICIONADO</h2>
                    <p>Gariega Instalaciones, especialistas en mantenimiento e instalaciones de climatización, aire acondicionado y calefacción, particulares, doméstico, unifamiliares, negocios, comunidades de propietarios, locales, etc…</p><p>Contacto:  <a href="http://www.gariegainstalaciones.com" target="_blank">www.gariegainstalaciones.com</a></p><p>Teléfono móvil: <a href="tel:+34651891657">651 891 657</a></p>


                </div>
              <div class="tab-pane fade" id="pills-exploring" role="tabpanel" aria-labelledby="pills-exploring-tab">
                    <!--<video-card class="video-card"
                                :body="{{$service->details[1]}}" 
                                source="/storage/{{$service->details[1]->video}}"
                                only-title></video-card>-->
</p></center>
                     <center><h2></h2>
                    <p>
¡Exploramos los barrios de la ciudad! Filtramos lo que hay mejor para ti, llevándote experiencias únicas, las que tú mereces. Gym, tiendas, restaurantes…
</p></center>                                
                </div>
            </div>      

        @else
        <div class="row mb-5">
            @foreach ($service->details as $detail)
                <div class="col-md-4 col-sm-6 col-xs-12 mb-3">
                    <!--<div class="card video-card">-->
                       <!-- <video  width="100%" 
                                preload="metadata"
                                controls>
                            <source src="/storage/{{$detail->video}}"  type="video/mp4" />
                        </video>-->
                            <a class="card-link" data-toggle="collapse" href="#description-{{$detail->id}}" role="button" aria-expanded="false" aria-controls="description-{{$detail->id}}">
                            <div class="card card-image text-white"
                                    style="height: 180px;width: 325px;text-decoration:none; background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('/storage//{{$detail->foto_principal}}')" title="leer más">

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
