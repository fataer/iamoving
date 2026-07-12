<header class="header-section position-relative" >
	{{-- style="position: fixed !important;" --}}
	<br>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="site-navbar">
					<a href="{{route('home')}}" class="site-logo"><img src="{{asset('img/icono.png')}}" style="margin-right: 50px" alt="" width="122px"></a>
					<div class="nav-switch" >
						<i class="fa fa-bars"></i>
					</div>
					<a href="/IAMpro"  class="site-logo"><img src="/img/iampro.icon.menu.png" alt="IAMPRO logotipo" class="m-1" style="margin-right: 10px"  width="115px"></a>
					<ul class="main-menu" style="margin-bottom: 14px;">

						<li>
							<a href="/quien-somos">SOBRE IAMOVING</a>
						</li>
						<li>
							<a href="/testimonios-iamoving">TESTIMONIOS</a>
						</li>						
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
								aria-haspopup="true" aria-expanded="false">SOY PROPIETARIO</a>
							<div class="dropdown-menu" style="top: -40px;">
								<a class="dropdown-item" href="{{url('alquila-con-nosotros')}}"
									style="color: #191717;">ALQUILAR</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="{{url('vende-con-nosotros')}} "
									style="color: #191717;">VENDER</a>

							</div>
						</li>

						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
								aria-haspopup="true" aria-expanded="false">BUSCA TU PISO</a>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="{{url('buscando-inmuebles-alquiler')}}"
									style="color: #191717;">ALQUILER</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="{{url('buscando-inmuebles-venta')}}"
									style="color: #191717;">COMPRAR</a>

							</div>
						</li>
						<!--<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
								aria-haspopup="true" aria-expanded="false">idioma</a>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="{{url('buscando-inmuebles-alquiler')}}"
									style="color: #191717;">español</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#" style="color: #191717;">ingles</a>

							</div>
						</li>-->
						<li v-if="user" class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-user-circle"></i>
								<span v-text="user.name"></span>
							</a>
							<div id="user_logged_menu" class="dropdown-menu" aria-labelledby="navbarDropdown">
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" @click.prevent="profile">
									<i class="fas fa-user"></i>
									Perfil
								</a>
								<a class="dropdown-item" @click.prevent="visitas">
									<i class="fas fa-calendar-check"></i>
									Visitas
								</a>
								<a class="dropdown-item" @click.prevent="favoritos">
									<i class="fas fa-heart"></i>
									Favoritos
								</a>
								<a class="dropdown-item" @click.prevent="logout">
									<i class="fas fa-power-off"></i>
									Salir
								</a>
							</div>
						</li>
						<div v-else class="user-panel">
							<a id="btnEntrar" href="#modal-auth" data-toggle="modal"><i class="fas fa-sign-in-alt"></i> ENTRAR</a>
						</div>


					</ul>
				</div>
			</div>
		</div>
	</div>
</header>