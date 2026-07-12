<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

<!--<title>IAMOVING - Fácil de comprar y alquilar</title>--> <!--Maximum of 65 characters-->
<title>@yield('title')</title>
<meta name="description" content="¡Elegir tu piso perfecto va mucho más allá! Especialistas en alquiler y venta de pisos en Madrid. Alquiler y venta de apartamentos, casas, áticos y pisos - IAMOVING"/>
<!--<meta name="robots" content="nosnippet">-->
<meta name="robots" content="index, follow">
<meta property="og:title" content="@yield('title')">
<meta property="og:description" content="@yield('description')"> <!--Maximum 65 characters-->
<meta property="og:url" content="https://www.iamoving.com" /> 
<!--Maximum 65 characters-->
<meta property="og:image" content="@yield('image')">    

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'iamoving')</title>

    <!-- Scripts -->
    <!-- <script src="https://sdk.accountkit.com/es_ES/sdk.js" defer></script> -->
	@if (strpos(url()->current(),"/en"))
	<script src="{{ asset('js/app-en.js') }}" defer></script>
	@else  
		<script src="{{ asset('js/app.js') }}" defer></script>
	@endif
	<script src="{{ asset('js_theme/masonry.pkgd.min.js') }}" defer></script>
    <script src="{{ asset('js_theme/main.js') }}" defer></script>
	<script src="{{ asset('js/popper.min.js ') }}" defer></script>
	<script src="{{ asset('js/ios.js ') }}" defer></script>
	<script src="{{ asset('js/embed.js ') }}"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js" integrity="sha384-0pzryjIRos8mFBWMzSSZApWtPl/5++eIfzYmTgBBmXYdhvxPc+XcFEk+zJwDgWbP" crossorigin="anonymous"></script>
    <!-- Ionicons -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="icon" type="image/png" href="{{ asset('img/marker.ico') }}" />
    <link href="{{ asset('css_theme/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('css_theme/animate.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/sweetalert2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/bootstrap-clockpicker.min.css') }}" rel="stylesheet" />
<style>
/* Ajustes visuales para banner de cookies en móvil */
@media (max-width: 768px) {
    .eupopup,
    .eupopup-container {
        left: 10px !important;
        right: 10px !important;
        width: auto !important;
        max-width: calc(100% - 20px) !important;
        padding: 15px !important;
        box-sizing: border-box !important;
    }
    
    .eupopup h3,
    .eupopup h4 {
        word-wrap: break-word !important;
        overflow-wrap: break-word !important;
        padding-right: 25px !important;
    }
    
    .eupopup p {
        word-wrap: break-word !important;
        overflow-wrap: break-word !important;
        white-space: normal !important;
        max-width: 100% !important;
    }
    
    .eupopup-buttons {
        display: flex !important;
        flex-direction: row !important;
        gap: 15px !important;
        justify-content: center !important;
    }
    
    .eupopup button,
    .eupopup a {
        background: transparent !important;
        color: #FFC107 !important;
        text-decoration: underline !important;
        border: none !important;
        padding: 5px 10px !important;
        font-weight: bold !important;
    }
    
    .eupopup button:hover,
    .eupopup a:hover {
        color: #FFD54F !important;
    }
}
</style>
@yield('styles')
    @yield('styles')

    <script src="{{ asset('js/sweetalert2.min.js') }}" defer></script>
        
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.slim.min.js"></script>
	@if (strpos(url()->current(),"/en"))
		<script src="{{ asset('js/bootstrap-datepicker.en.min.js') }}" defer></script>
	@else
		<script src="{{ asset('js/bootstrap-datepicker.min.js') }}" defer></script>
	@endif
    <script src="{{ asset('js/bootstrap-clockpicker.min.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap-notify.min.js') }}" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />


    <style>
        .waiting {
            width: 40px;
            height: 40px;
            position: absolute;
            top: 50%;
            left: 50%;
            margin-top: -13px;
            margin-left: -13px;
            border-radius: 60px;
            animation: loader 0.8s linear infinite;
            -webkit-animation: loader 0.8s linear infinite;
        }
        .dropdown-item{
            cursor:pointer;
			width:81%;
        }		
        
        #formGroupExampleInput {
          background-color:red;
          width:300px;
          color:#2D2D37;
        }
        
        #formGroupExampleInput::placeholder {
         color:#2D2D37;
        }
        
        #formGroupExampleInput::-webkit-input-placeholder {
          color: #2D2D37;
        }
        #formGroupExampleInput::-moz-placeholder {
          color: #2D2D37;
             opacity:  1;
        }
        #formGroupExampleInput:-ms-input-placeholder {
          color: #2D2D37;
        }
        #formGroupExampleInput:-moz-placeholder {
          color: #2D2D37;
           opacity: 1 ;
        }
        
        input[type=number]::-webkit-outer-spin-button,
        input[type=number]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        
        input[type=number] {
            -moz-appearance:textfield;
        }
        
        @media only screen and (max-width: 600px) {

            .pagination{
                flex-wrap: wrap !important;
            }
            
            .modal{
                width:100% !important;
            }
        }

    </style>

<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://www.google.com/recaptcha/api.js?render={{ env('RECAPTCHA_SITE_KEY') }}"></script>

</head>
<body>
    <!-- Page Preloder -->
	<div id="preloder">
	    @if(Request::is('anuncio/*') or Request::is('anuncio/*')) 
	        <div class="loading"></div>
	    @else
	        <div class="loader"></div>
	    @endif
	</div>
    <div id="app">
        <!--<div id="global_message" class="alert alert-success text-center" style="margin-bottom:0;"></div>-->
        <!-- Header section -->
        @include('navigation.navpro')
        @yield('preheader')
		<!-- Hero section -->
        @yield('banner')
        @if(isset($token))
            <modal-auth id="modal-auth" user="{{ Auth::user() }}" secret="{{ $token }}"></modal-auth>
        @else 
            <modal-auth id="modal-auth" user="{{ Auth::user() }}" secret=""></modal-auth>
        @endif
        <main>
            @yield('content')
        </main>
   
        <div id="modalResend" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                <div class="modal-header">
                    <h4 id="modal-request-title" class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <h5>Procesando tu petición</h5><br>
                        <div class="waiting"></div>
                        <br>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Footer section -->
	<!--@include('navigation.prefooter')-->
    @include('navigation.footerpro')

    @yield('scripts')
    

<script>

    $(document).bind("user_cookie_already_accepted", function(event, object) {
        console.log("User consent: " + $(object).attr('consent'));
    });
    
    $(document).bind("user_cookie_consent_changed", function(event, object) {
        console.log("User cookie consent changed: " + $(object).attr('consent') );
    });
    
    var timeoutTimer;
    var expireTime = 1000*60*5;
    
    function expireSession(){
        clearTimeout(timeoutTimer);
        timeoutTimer = setTimeout("IdleTimeout()", expireTime);
    }
    function IdleTimeout() {
        if (localStorage.getItem("token") !== null) {
            localStorage.removeItem("token");
            localStorage.removeItem("user");
            location.href = '/';
        }
    }
    
    $(document).on('click mousemove scroll touchstart touchmove', function() {
        expireSession();
    });
    expireSession();
</script>

    <!-- Cookie Consent Banner (RGPD compliant) -->
    @include('partials.cookie-consent')

@if(Request::is('112vender') || Request::is('122vender/*'))
<!-- Botón de WhatsApp Mejorado -->
<a href="https://wa.me/34649623700?text=Hola%21%20Estoy%20interesado%20en%20vender%20mi%20casa%20con%20IAMOVING.%20¿Podr%C3%ADais%20darme%20m%C3%A1s%20informaci%C3%B3n%3F" 
   id="whatsapp-button" 
   target="_blank" 
   aria-label="Chatear por WhatsApp">
    <div class="whatsapp-content">
        <ion-icon name="logo-whatsapp"></ion-icon>
        <span class="whatsapp-text">¿Vendes tu casa? ¡Escríbenos!</span>
    </div>
</a>

<style>
    #whatsapp-button {
        position: fixed !important;
        bottom: 30px !important;
        right: 30px !important;
        background-color: #25d366 !important;
        border-radius: 60px !important;
        padding: 12px 25px 12px 20px !important;
        text-decoration: none !important;
        box-shadow: 0 8px 25px rgba(37, 211, 102, 0.4) !important;
        z-index: 999999999 !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        transition: all 0.3s ease !important;
        border: 2px solid rgba(255,255,255,0.2) !important;
        animation: pulse 2s infinite !important;
    }

    #whatsapp-button:hover {
        background-color: #128C7E !important;
        transform: scale(1.1) !important;
        box-shadow: 0 15px 35px rgba(18, 140, 126, 0.5) !important;
        animation: none !important;
    }

    .whatsapp-content {
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        gap: 10px !important;
    }

    #whatsapp-button ion-icon {
        font-size: 35px !important;
        color: white !important;
        filter: drop-shadow(0 2px 5px rgba(0,0,0,0.2)) !important;
    }

    .whatsapp-text {
        color: white !important;
        font-size: 16px !important;
        font-weight: 600 !important;
        font-family: 'Nunito', sans-serif !important;
        text-shadow: 0 1px 2px rgba(0,0,0,0.2) !important;
        letter-spacing: 0.5px !important;
        white-space: nowrap !important;
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
            box-shadow: 0 8px 25px rgba(37, 211, 102, 0.4);
        }
        70% {
            transform: scale(1.05);
            box-shadow: 0 15px 35px rgba(37, 211, 102, 0.6);
        }
        100% {
            transform: scale(1);
            box-shadow: 0 8px 25px rgba(37, 211, 102, 0.4);
        }
    }

    /* Versión móvil - solo icono para ahorrar espacio */
    @media (max-width: 768px) {
        #whatsapp-button {
            bottom: 20px !important;
            right: 20px !important;
            padding: 15px !important;
            border-radius: 50% !important;
            animation: pulse 2s infinite !important;
        }

        .whatsapp-text {
            display: none !important;
        }

        #whatsapp-button ion-icon {
            font-size: 40px !important;
            margin: 0 !important;
        }
    }

    /* Pequeño tooltip en móvil al hacer hover */
    @media (max-width: 768px) {
        #whatsapp-button:hover::after {
            content: "Vende tu casa";
            position: absolute;
            bottom: 70px;
            right: 0;
            background-color: #333;
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 14px;
            font-family: 'Nunito', sans-serif;
            white-space: nowrap;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            pointer-events: none;
        }
    }
</style>

<script>
    document.getElementById('whatsapp-button')?.addEventListener('click', function() {
        // Tracking
        if (typeof registrarClick !== 'undefined') {
            registrarClick('WhatsApp - Vende tu casa');
        }
        if (typeof fbq !== 'undefined') {
            fbq('trackCustom', 'WhatsAppClick', {
                boton: 'Vende tu casa',
                pagina: 'vender'
            });
        }
        if (typeof gtag !== 'undefined') {
            gtag('event', 'whatsapp_click', {
                'event_category': 'contacto',
                'event_label': 'vende_tu_casa'
            });
        }
        
        console.log('✅ WhatsApp click - Mensaje: Vender casa');
    });
</script>
@endif

</body>
</html>