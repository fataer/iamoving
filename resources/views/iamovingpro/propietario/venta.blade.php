@extends('layouts.iamovingpro')
@section('title', 'IAMOVING - Busca tu casa')
@section('description', '¡Busca tu casa!')
@section('image', 'https://iamoving.com/img/iamoving.png')

@section('content')
    <div class="row mt-3">
        <div class="col-md-2"></div>
        <div class="col-md-8 text-center mb-3">
            <img src="/img/owner.png" width="70" height="70" style="margin-bottom:10px;" alt="vendedor">
        </div>
        <div class="col-md-2"></div>
    </div>

    <h2 class="card-text text-center mb-0">¿ERES PROPIETARIO?</h2>
    
    <div class="text-center mx-md-4 my-0" style="padding-top: 0px;padding-bottom: 0px;">
        <div class="container my-3">
            <div class="section-title text-center my-0" style="padding-top: 0px;padding-bottom: 0px;">
                <h3 class="text-center mb-1">
                    <b><font face="Agency FB">¡NOSOTROS NOS OCUPAMOS DE TODO POR TI!</font></b>
                </h3>
            </div>
        </div>

        <div class="col-12">
            <div class="animated bounceInLeft fast">
                <div class="row mt-0">
                    <div class="col-md-3"></div>

                    <div class="col-md-6 d-none d-sm-none d-md-block">
                        <div class="text-center">
                            <ul class="list-unstyled">
                                <li class="d-flex align-items-center justify-content-center mb-2">
                                    <span class="mr-2">•</span>
                                    <h5 class="display-5 mb-0">Totalmente gratis.</h5>
                                </li>
                                <li class="d-flex align-items-center justify-content-center mb-2">
                                    <span class="mr-2">•</span>
                                    <h5 class="display-5 mb-0">No tienes que firmar nada.</h5>
                                </li>
                                <li class="d-flex align-items-center justify-content-center">
                                    <span class="mr-2">•</span>
                                    <h5 class="display-5 mb-0">Y sin exclusivas.</h5>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-6 d-block d-sm-block d-md-none">
                        <div class="text-center">
                            <ul class="list-unstyled">
                                <li class="d-flex align-items-center justify-content-center mb-2">
                                    <ion-icon name="checkmark-circle-outline" class="mr-2"></ion-icon>
                                    <h5 class="display-5 mb-0">Totalmente gratis.</h5>
                                </li>
                                <li class="d-flex align-items-center justify-content-center mb-2">
                                    <ion-icon name="checkmark-circle-outline" class="mr-2"></ion-icon>
                                    <h5 class="display-5 mb-0">No tienes que firmar nada.</h5>
                                </li>
                                <li class="d-flex align-items-center justify-content-center">
                                    <ion-icon name="checkmark-circle-outline" class="mr-2"></ion-icon>
                                    <h5 class="display-5 mb-0">Y sin exclusivas.</h5>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3"></div>
                </div>
            </div>
        </div>

        <p class="my-4 text-center">
<button type="button" 
        id="btn_me_interesa_3" 
        name="btn_me_interesa_3" 
        class="btn btn-iamoving btn-lg" 
        style="color:default;" 
        data-toggle="modal" 
        data-target="#modalVenta">
    <!-- Versión escritorio -->
    <span class="d-none d-sm-inline">
        ME INTERESA
    </span>
    
    <!-- Versión móvil con icono -->
    <span class="d-inline d-sm-none">
        <i class="fab fa-whatsapp" style="font-size: 1.2em; vertical-align: middle;"></i>
        <span style="vertical-align: middle;"> Me interesa</span>
    </span>
</button>            
        </p>

        <div class="row mt-3">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="pricing-box">
                    <p class="ml-0 text-center">
                        <img src="/img/mobile.png" width="70" height="70" style="margin-bottom:10px;" alt="diana">
                    </p>
                    <h4 class="text-center mb-4"><b>¿CÓMO FUNCIONA?</b></h4>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>

        <section class="collapse-content">
            <div class="container my-0 mt-3">
                <div class="collapse-item">
                    <button class="btn-collapse text-left" style="cursor:pointer;width:100%;border: none;outline:none;" data-toggle="collapse" href="#collapse-busqueda" role="button" aria-expanded="false" aria-controls="collapse-busqueda">
                        1. COMPRADORES
                    </button>
                    <div class="collapse" id="collapse-busqueda">
                        <div class="content-collapse">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <span class="text-muted">
                                        Atendiendo la solicitud de nuestros compradores, les presentamos tu vivienda.
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="collapse-item">
                    <button class="btn-collapse text-left" style="cursor:pointer;width:100%;border: none;outline:none;" data-toggle="collapse" href="#collapse-busqueda1" role="button" aria-expanded="false" aria-controls="collapse-busqueda1">
                        2. PUBLICITAMOS
                    </button>
                    <div class="collapse" id="collapse-busqueda1">
                        <div class="content-collapse">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <span class="text-muted">
                                        Creamos un anuncio con información detallada de tu inmueble y lo difundimos estratégicamente en múltiples canales: nuestra plataforma propia, las redes sociales de IAMOVING (Instagram, Facebook, YouTube y TikTok), Yaencontré e Idealista. De esta forma, maximizamos el alcance de tu propiedad sin que esto te genere ninguna molestia, compromiso o coste adicional.
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="collapse-item">
                    <button class="btn-collapse text-left" style="cursor:pointer;width:100%;border: none;outline:none;" data-toggle="collapse" href="#collapse-busqueda3" role="button" aria-expanded="false" aria-controls="collapse-busqueda3">
                        3. VISITAS FILTRADAS
                    </button>
                    <div class="collapse" id="collapse-busqueda3">
                        <div class="content-collapse">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item" style="text-align: left;">
                                    <span class="text-muted">
                                        1. El 80% de las visitas realizadas a través del modelo tradicional son innecesarias, ya que la mayoría de los interesados ni siquiera han leído toda la información y características de tu inmueble anunciado, por lo que tu propiedad no se ajusta realmente a sus necesidades.
                                    </span>
                                </li>
                                <li class="list-group-item" style="text-align: left;">
                                    <span class="text-muted">
                                        2. Sin contar que muchos tampoco han realizado un estudio financiero previo para conocer su capacidad máxima de compra.
                                    </span>
                                </li>
                                <li class="list-group-item" style="text-align: left;">
                                    <span class="text-muted">
                                        3. Y por último, la seguridad: Durante los últimos años han aparecido complicaciones derivadas de las visitas para comprar viviendas, por ejemplo, okupas que visitan pisos vacíos para posteriormente ocuparlos.
                                    </span>
                                </li>
                                <li class="list-group-item" style="text-align: left;">
                                    <span class="text-muted">
                                        <b>Pensando en este problema, nuestro sistema informático solo permite solicitudes de visitas presenciales una vez que:</b>
                                    </span>
                                </li>
                                <li class="list-group-item" style="text-align: left;">
                                    <span class="text-muted">
                                        · Nuestro usuario haya visualizado todos los contenidos del anuncio donde le facilitamos todo tipo de información de tu propiedad (por seguridad no mencionamos el número del portal en el anuncio).
                                    </span>
                                </li>
                                <li class="list-group-item" style="text-align: left;">
                                    <span class="text-muted">
                                        · Nos haya informado cuál sería su forma de pago:
                                    </span>
                                </li>
                                <li class="list-group-item" style="text-align: left; padding-left: 40px;">
                                    <span class="text-muted">
                                        - Si ya dispone del dinero y no necesita un crédito.
                                    </span>
                                </li>
                                <li class="list-group-item" style="text-align: left; padding-left: 40px;">
                                    <span class="text-muted">
                                        - Si ya ha realizado un estudio financiero y dispone de un crédito hipotecario aprobado por el valor de tu vivienda.
                                    </span>
                                </li>
                                <li class="list-group-item" style="text-align: left; padding-left: 40px;">
                                    <span class="text-muted">
                                        - O si aún no ha realizado un estudio financiero, pero ya está buscando casas.
                                    </span>
                                </li>
                                <li class="list-group-item" style="text-align: left;">
                                    <span class="text-muted">
                                        · Y por último, nuestro usuario tiene que facilitarnos sus datos personales para saber quién accede a tu propiedad.
                                    </span>
                                </li>
                                <li class="list-group-item" style="text-align: left;">
                                    <span class="text-muted">
                                        De esta manera, recibirás peticiones de visitas de nuestros usuarios compradores, donde tú podrás conocer su perfil antes de cada visita y confirmarla si te interesa o, en caso contrario, rechazarla.
                                    </span>
                                </li>
                                <li class="list-group-item" style="text-align: left;">
                                    <span class="text-muted">
                                        Escoge el día, la hora y el comprador que tú prefieras para enseñarle el piso y conocerle en persona.
                                    </span>
                                </li>
                                <li class="list-group-item" style="text-align: left;">
                                    <span class="text-muted">
                                        De esta manera, nadie pierde el tiempo visitando o recibiendo visitas que no aportan valor; nuestro usuario solo visita los inmuebles que realmente le interesan y eliminamos las visitas sin potencial de compra.
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="collapse-item">
                    <button class="btn-collapse text-left" style="cursor:pointer;width:100%;border: none;outline:none;" data-toggle="collapse" href="#collapse-busqueda9" role="button" aria-expanded="false" aria-controls="collapse-busqueda9">
                        4. ASESORÍA JURÍDICA
                    </button>
                    <div class="collapse" id="collapse-busqueda9">
                        <div class="content-collapse">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <span class="text-muted">
                                        Redacción del contrato de arras.
                                    </span>
                                </li>
                                <li class="list-group-item">
                                    <span class="text-muted">
                                        Redacción y/o Revisión y/o Asesoramiento para la formalización de la Escritura de Compraventa.
                                    </span>
                                </li>
                                <li class="list-group-item">
                                    <span class="text-muted">
                                        Resolución de consultas relativas al contrato de arras y/o escritura de compraventa por escrito, mediante correo electrónico.
                                    </span>
                                </li>
                                <li class="list-group-item">
                                    <span class="text-muted">
                                        Redacción y envío de todas aquellas comunicaciones que deban ser remitidas a la parte compradora y hasta la formalización de la escritura de compraventa.
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="collapse-item">
                    <button class="btn-collapse text-left" style="cursor:pointer;width:100%;border: none;outline:none;" data-toggle="collapse" href="#collapse-busqueda10" role="button" aria-expanded="false" aria-controls="collapse-busqueda10">
                        5. VENDE GRATIS
                    </button>
                    <div class="collapse" id="collapse-busqueda10">
                        <div class="content-collapse">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <span class="text-muted">
                                        VENDE tu casa con IAMOVING, totalmente gratuito, fácil y seguro.
                                    </span>
                                </li>
                                <li class="list-group-item">
                                    <span class="text-muted">
                                        La parte vendedora no tiene ningún compromiso de exclusividad con IAMOVING. No tienes que firmar contrato ni pagarnos absolutamente nada.
                                    </span>
                                </li>
                                <li class="list-group-item">
                                    <span class="text-muted">
                                        Nuestros honorarios los pagan los compradores que utilizan nuestro servicio.
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <p class="my-4 text-center">
<button type="button" 
        id="btn_me_interesa_4" 
        name="btn_me_interesa_4" 
        class="btn btn-iamoving btn-lg" 
        style="color:default;" 
        data-toggle="modal" 
        data-target="#modalVenta">
    <!-- Versión escritorio -->
    <span class="d-none d-sm-inline">
        ME INTERESA
    </span> 
    <!-- Versión móvil con icono -->
    <span class="d-inline d-sm-none">
        <i class="fab fa-whatsapp" style="font-size: 1.2em; vertical-align: middle;"></i>
        <span style="vertical-align: middle;"> Me interesa</span>
    </span> 
</button>     
        </p>
    </div>

    <br>

    <section class="feature-section" style="padding-top: 20px; padding-bottom: 60px;">
        <div class="container">
            @include('partials.testimonios')
        </div>
    </section>

    <br/>

    @include('iamovingpro.propietario.includes.anuncia')
    @include('iamovingpro.propietario.includes.venta')
    @include('iamovingpro.propietario.includes.ayuda')



@endsection 

@section('styles')
    <link rel="stylesheet" href="photon/fonts/icomoon/style.css">
    <link rel="stylesheet" href="photon/css/owl.carousel.min.css">
    <link rel="stylesheet" href="photon/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="photon/css/swiper.css">
    <link rel="stylesheet" href="photon/css/style.css">
    <link rel="stylesheet" href="{{ asset('css/testimonios.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vender.css') }}">

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

@include('iamovingpro.propietario.includes.vender-scripts')
@endsection
