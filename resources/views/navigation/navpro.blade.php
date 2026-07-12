<header class="header-section position-relative" style="background: #f4f3f3;">
	{{-- style="position: fixed !important;" --}}
	<br>
	<div class="container" style="background: #f4f3f3;">
		<div class="row"  style="background: #f4f3f3;">
			<div class="col-12"  style="background: #f4f3f3;">
				<div class="site-navbar">
					<a href="{{route('home')}}" class="site-logo"><img src="{{asset('img/iamoving_blanco.jpeg')}}" style="margin-right: 50px;margin-bottom: 15px;" alt="" width="170px"></a>
					<div class="nav-switch" >
						<i class="fa fa-bars"></i>
					</div>
					<!--<a href="/IAMpro"  class="site-logo"><img src="/img/iampro.icon.menu.png" alt="IAMPRO logotipo" class="m-1" style="margin-right: 10px"  width="115px"></a>-->
					<ul class="main-menu" style="margin-bottom: 14px;">
						<!--<li>
							<a href="/premium">📞<b>@if (strpos(url()->current(),"/en")) CALL US! @else LLAMAR @endif</b></a>
						</li>-->	
						<li>
							<a href="/somos-iamoving">@if (strpos(url()->current(),"/en")) ABOUT US @else SOBRE @endif</a>
						</li>	
						<li>
<!--<div id="google_translate_element"></div>
<script>
    function googleTranslateElementInit() {
        new google.translate.TranslateElement(
            {pageLanguage: 'en'},
            'google_translate_element'
        );
    }
</script>
<script src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
share  follow 					
						</li>	-->					
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
								aria-haspopup="true" aria-expanded="false"><b>@if (strpos(url()->current(),"/en")) I'M AN OWNER @else SOY PROPIETARIO @endif</b></a>
							<div class="dropdown-menu" style="top: -40px;">
								<a class="dropdown-item" href="{{url('alquiler')}}"
									style="color: #191717;">@if (strpos(url()->current(),"/en")) TO LET @else ALQUILER @endif</a>
								<!--<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="{{url('alquiler-turistico')}}"
									style="color: #191717;">ALQUILER VACIONAL/TEMPORAL</a>-->
								<div class="dropdown-divider"></div>								
								<a class="dropdown-item" href="{{url('vender')}} "
									style="color: #191717;">@if (strpos(url()->current(),"/en")) SELLING @else VENDER @endif</a>

							</div>
						</li>

						<!--<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
								aria-haspopup="true" aria-expanded="false"><b>@if (strpos(url()->current(),"/en")) SEARCHING HOME @else BUSCANDO CASA @endif</b></a>
							<div class="dropdown-menu" style="top: -40px;">
								<a class="dropdown-item" href="{{url('buscando-alquiler')}}"
									style="color: #191717;">@if (strpos(url()->current(),"/en")) RENTAL @else ALQUILER @endif</a>

								<div class="dropdown-divider"></div>								
								<a class="dropdown-item" href="{{url('comprar')}} "
									style="color: #191717;">@if (strpos(url()->current(),"/en")) BUYING @else COMPRAR @endif</a>

							</div>
						</li>-->
					
						<!--<li class="nav-item dropdown">
						<language-switcher></language-switcher>
						</li>-->
                       <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="flag-icon flag-icon-us"> </span> English</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown09">
                                <a class="dropdown-item" href="#fr"><span class="flag-icon flag-icon-fr"> </span>  French</a>
                                <a class="dropdown-item" href="#it"><span class="flag-icon flag-icon-it"> </span>  Italian</a>
                                <a class="dropdown-item" href="#ru"><span class="flag-icon flag-icon-ru"> </span>  Russian</a>
                            </div>
                        </li>-->	
						<!--<li v-if="user" class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-user-circle"></i>
								<span v-text="user.name"></span>
							</a>
							<div id="user_logged_menu" class="dropdown-menu" aria-labelledby="navbarDropdown">
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" @click.prevent="profile">
									<i class="fas fa-user"></i>
									@if (strpos(url()->current(),"/en")) Profile @else Perfil @endif
								</a>
								<a class="dropdown-item" @click.prevent="visitas">
									<i class="fas fa-calendar-check"></i>
									@if (strpos(url()->current(),"/en")) Visits @else Visitas @endif
								</a>

								<a class="dropdown-item" @click.prevent="logout">
									<i class="fas fa-power-off"></i>
									@if (strpos(url()->current(),"/en")) Log out @else Salir @endif
								</a>
							</div>
						</li>
						<div v-else class="user-panel">
							<a id="btnEntrar" href="#modal-auth" data-toggle="modal"><i class="fas fa-sign-in-alt"></i> @if (strpos(url()->current(),"/en")) LOG IN @else ENTRAR @endif</a>
						</div>-->

					</ul>
				</div>
			</div>
		</div>
	</div>
</header>
<style>
 /* Estilos específicos para iOS */
@supports (-webkit-touch-callout: none) {
  /* Asegurar que el menú principal tenga la estructura correcta */
  .main-menu {
    position: relative !important;
  }

  /* Ajustar la posición del botón ENTRAR */
  .user-panel {
    position: relative;
    z-index: 1;
  }

  /* Forzar el posicionamiento correcto del submenú */
  .main-menu .nav-item.dropdown .dropdown-menu {
    position: absolute !important;
    left: 0 !important;
    right: auto !important;
    top: 100% !important;
    transform: none !important;
    margin: 0 !important;
    width: auto !important;
    min-width: 200px !important;
  }

  /* Asegurar que el menú desplegable esté por encima de otros elementos */
  .dropdown-menu.show {
    z-index: 1050 !important;
  }
}
</style>