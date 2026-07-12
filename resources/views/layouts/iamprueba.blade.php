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
<!-- facebook verificación de dominio -->
<meta name="facebook-domain-verification" content="2xh581290w4pq0qsa6d99aqhp2du8n" />
<!-- facebook verificación de dominio -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'iamoving')</title>

    <!-- Scripts -->
    <!-- <script src="https://sdk.accountkit.com/es_ES/sdk.js" defer></script> -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js_theme/main.js') }}" defer></script>

    <!-- Fonts -->
    <link href="{{ asset('css_theme/style.css') }}" rel="stylesheet" />

    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />

    
<style type="text/css">
/* CSS Reset para el formulario */
#form-reference * {
    box-sizing: border-box !important;
    margin: 0 !important;
    padding: 0 !important;
}

/* Contenedor principal */
#form-reference {
    width: 100% !important;
    max-width: 600px !important;
}

/* Filas del formulario */
#form-reference .row {
    display: flex !important;
    width: 100% !important;
    margin-bottom: 10px !important;
}

/* Todos los inputs y botones del formulario */
.btn-outline-dark,
.custom-select,
.form-control,
#input-filter,
#icity,
#city,
.btn-group-toggle .btn,
#btnBuscar {
    height: 40px !important;
    line-height: 38px !important;
    border: 1px solid #ccc !important;
    font-size: 1.125rem !important;
    border-radius: 0 !important;
    width: 100% !important;
    display: block !important;
    text-align: center !important;
    background-color: white !important;
}

/* Estilo para Comprar (activo) */
.btn-outline-dark.active {
    color: #b02c98 !important;
    border-color: #b02c98 !important;
}

/* Forzar mismo ancho para los inputs de cada fila */
#form-reference .row > * {
    flex: 1 !important;
    padding: 0 5px !important;
}

/* Grupo de botones toggle (Comprar/Alquilar) */
.btn-group-toggle {
    display: flex !important;
    width: 100% !important;
    gap: 10px !important;
}

/* Botones dentro del grupo toggle */
.btn-group-toggle .btn {
    flex: 1 !important;
}

/* Botón buscar */
#btnBuscar {
    background-color: #EADD03 !important;
    border-color: #EADD03 !important;
    color: #333 !important;
    font-weight: bold !important;
    width: 90% !important;
    margin: 0 auto !important;
    display: block !important;
}

/* Ajustes específicos para contenedores */
.form-group, .col-4, .col-6, .col-8, .offset-2 {
    margin: 0 !important;
    padding: 0 5px !important;
}

/* Eliminar cualquier offset o desplazamiento */
.offset-2 {
    margin-left: 0 !important;
}

/* Ajuste para el título */
h2.busca-tu-casa {
    margin-bottom: 20px !important;
    font-weight: bold !important;
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
		@if(Request::is('anuncio/*') or Request::is('anuncio/*')) 
	        <div class="loading"></div>
	    @else
	        <div class="loader"></div>
	    @endif
	</div>
    <div id="app">
        @include('navigation.navpro')
        @yield('preheader')
        @yield('banner')
        @if(isset($token))
            <modal-auth id="modal-auth" user="{{ Auth::user() }}" secret="{{ $token }}"></modal-auth>
        @elseif(isset($route))
            <modal-auth id="modal-auth" user="{{ Auth::user() }}" recover="{{ $route }}"></modal-auth>
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
        
       
        function validateInput(evt) {
          var theEvent = evt || window.event;
        
          // Handle paste
          if (theEvent.type === 'paste') {
              key = event.clipboardData.getData('text/plain');
          } else {
          // Handle key press
              var key = theEvent.keyCode || theEvent.which;
              key = String.fromCharCode(key);
          }
          var regex = /[0-9]|\./;
          if( !regex.test(key) ) {
            theEvent.returnValue = false;
            if(theEvent.preventDefault) theEvent.preventDefault();
          }
          
        }
        
        function validateInputOut(evt) {
          if($("#input-filter").val().length > 0){
            $("#input-filter").prop('required',true);
            $("#city").prop('required',false);
          }else{
            $("#input-filter").prop('required',false);
            $("#city").prop('required',true);
          }  
        }
        
        function setGrayControls(){
            console.log("FOCUS");
            $(".btn.btn-outline-dark.btn-lg").each(function( index ) {
                $(this).attr('class','btn btn-outline-dark btn-lg');
            });
            var city = $("#city");
            city.attr('class','custom-select gray_select');
            $("#icity").attr('class','form-control input-gray');
            
        }
        
        function restoreControls(){
            console.log("FOCUS OUT");
            $(".btn-group-toggle input:radio").each(function( index ) {
                if($(this).is(':checked')){
                    var selector = $(this).attr('data-label');
                    $(selector).attr('class','btn btn-outline-dark btn-lg active');
                }else{
                    var selector = $(this).attr('data-label');
                    $(selector).attr('class','btn btn-outline-dark btn-lg');
                }
            });
            var city = $("#city");
            city.attr('class','custom-select purple_select');
            $("#icity").attr('class','form-control input-purple');
            
        }

        
        function setCityRequired(){
            $("#input-filter").val("");
            $("#input-filter").prop('required',false);
            $("#city").prop('required',true);
        }
        
        var timeoutTimer;
        //15 minutos de sesión
		var expireTime = 1000*60*15;
        
        
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



</body>
</html>
