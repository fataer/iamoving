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
    <script src="{{ asset('js_theme/masonry.pkgd.min.js') }}" defer></script>
    <script src="{{ asset('js_theme/main.js') }}" defer></script>
	<script src="{{ asset('js/popper.min.js ') }}" defer></script>
	<script src="{{ asset('js/ios.js ') }}" defer></script>
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
        .dropdown-item{
            cursor:pointer;
			width:81%;
        }		
        
        .btn-outline-dark{
    border: 1px solid #495057 !important;
    color: #495057 !important;
    height:40px !important;
}
        
   .btn.btn-outline-dark.btn-lg.active{
    border: 1px solid #b02c98 !important;
    color: #b02c98 !important;
    background-color: #fff !important;
    height:40px !important;

       
   }
   
   .btn.btn-outline-dark.btn-lg.active.focus{
    border: 1px solid #b02c98 !important;
    color: #b02c98 !important;
    background-color: #fff !important;
    height:40px !important;
    box-shadow: 0 0 1.5px 1px #b02c98;
       
   }
   
   .btn-outline-dark:hover{
    border: 1px solid #b02c98 !important;
    color: #b02c98 !important;
    background-color: #fff !important;
    height:40px !important;
    box-shadow: 0 0 1.5px 1px #b02c98;
}
   
    
    .gray_select{
        border: 1px solid #495057 !important;
        color: #495057 !important;
        background-color: #fff !important;
    }
    
    .purple_select{
        border: 1px solid #b02c98 !important;
        color: #b02c98 !important;
        background-color: #fff !important;
    }

    select option{
        border: 1px solid #b02c98 !important;
        color: #b02c98 !important;
     
        background-color: #fff !important;
    }
    
    selecn{
        border: 1px solid #b02c98 !important;
        color: #b02c98 !important;
        background-color: #fff !important;
    }

    .ref:focus { 
        outline: none !important;
        border-color: #b02c98;
        box-shadow: 0 0 10px #b02c98;
        color: #b02c98;
    }
    
    .ref:focus::placeholder{
        color: #b02c98;   
    }
    
    .header--main-image .header--main-text>*{
        color:#000 !important;
    }
    
    .input-gray{
       width:97%;
       text-align:center;
       color:#495057;
       opacity:.9;
       border:1px solid #495057;font-size:1.125rem;
    }

    .input-purple{
       width:97%;
       text-align:center;
       color:#b02c98;
       opacity:.9;
       border:1px solid #b02c98;font-size:1.125rem;
    }


    </style>


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
		<!--<section class="page-section single-blog mt-2" style="padding-top: 10px;padding-bottom: 0px;">
			<div class="container">
				<div class="row">
					<div class="col-md-1 blog-share">
					</div>				
					<div class="col-md-10 singel-blog-content">					
						<div class="row justify-content-center">
							<div class="col-md-8 text-center">
								<img src="/img/telefono.png" style="margin-bottom:10px;" alt="iamoving smartphone">
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
								<h1 class="text-center mb-4">Viewings from anywhere</h1>
							</div>
						</div>
					</div>				
				</div>					
			</div>				
		</section>			-->
		<!-- Hero section -->
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
    <script>


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

    <!-- Cookie Consent Banner (RGPD compliant) -->
    @include('partials.cookie-consent')

</body>
</html>
