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
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js_theme/masonry.pkgd.min.js') }}" defer></script>
    <script src="{{ asset('js_theme/main.js') }}" defer></script>
	<script src="{{ asset('js/popper.min.js ') }}" defer></script>
    <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js" integrity="sha384-0pzryjIRos8mFBWMzSSZApWtPl/5++eIfzYmTgBBmXYdhvxPc+XcFEk+zJwDgWbP" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="icon" type="image/png" href="{{ asset('img/marker.ico') }}" />
    <link href="{{ asset('css_theme/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('css_theme/animate.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/jquery-eu-cookie-law-popup.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/sweetalert2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/bootstrap-clockpicker.min.css') }}" rel="stylesheet" />
    @yield('styles')

    <script src="{{ asset('js/jquery-eu-cookie-law-popup.js') }}" defer></script>
    <script src="{{ asset('js/sweetalert2.min.js') }}" defer></script>
        
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.slim.min.js"></script>
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap-clockpicker.min.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap-notify.min.js') }}" defer></script>
    
    

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
    </style>
<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '841153322970616');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=841153322970616&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-153274977-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-153274977-1');
</script>

</head>
<body>
    <!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>
    <div id="app">
        <!--<div id="global_message" class="alert alert-success text-center" style="margin-bottom:0;"></div>-->
        <!-- Header section -->
        @include('navigation.navigate')
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
    @include('navigation.footer')

    @yield('scripts')
    
    <div class="eupopup eupopup-bottomright"></div>
    <script>
        $(document).ready( function() {
            $("#global_message").hide();
            if ($(".eupopup").length > 0) {
                $(document).euCookieLawPopup().init({
                    'popupTitle' : 'Este sitio utiliza cookies',
                    'popupText' : 'Para información sobre nuestra politica de cookies haga click en el enlace "Mas información"',
                    'buttonContinueTitle': 'Aceptar',
                    'buttonLearnmoreTitle' : 'Mas información',
                    'cookiePolicyUrl': '/politicas_cookies',
                    'buttonLearnmoreOpenInNewWindow' : true
                });
            }

            $('.pickdate').datepicker({
                language: "es",
                todayHighlight: true,
                autoclose: true,
                format: "dd/mm/yyyy"
            });

        });

        $(document).bind("user_cookie_already_accepted", function(event, object) {
            console.log("User consent: " + $(object).attr('consent'));
        });
        
        $(document).bind("user_cookie_consent_changed", function(event, object) {
            console.log("User cookie consent changed: " + $(object).attr('consent') );
        });

        
    </script>
</body>
</html>
