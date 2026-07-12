<header class="header-section position-relative" style="background: #f8e900;">
	{{-- style="position: fixed !important;" --}}
	<br>
	<div class="container" style="background: #f8e900;">
		<div class="row"  style="background: #f8e900;">
			<div class="col-12"  style="background: #f8e900;">
				<div class="site-navbar">
					<a href="{{route('home')}}" class="site-logo"><img src="{{asset('img/icono_viewings1.png')}}" style="margin-right: 50px;margin-bottom: 15px;" alt="" width="170px"></a>
					<div class="nav-switch" >
						<i class="fa fa-bars"></i>
					</div>
					<!--<a href="/IAMpro"  class="site-logo"><img src="/img/iampro.icon.menu.png" alt="IAMPRO logotipo" class="m-1" style="margin-right: 10px"  width="115px"></a>-->
					<ul class="main-menu" style="margin-bottom: 14px;">

						<li>
							<a href="/somos-iamoving">SOBRE </a>
						</li>						
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
								aria-haspopup="true" aria-expanded="false"><b>TENGO UN INMUEBLE</b></a>
							<div class="dropdown-menu" style="top: -40px;">
								<a class="dropdown-item" href="{{url('alquiler')}}"
									style="color: #191717;">ALQUILER LARGA DURACIÓN</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="{{url('alquiler-turistico')}}"
									style="color: #191717;">ALQUILER VACIONAL/TEMPORAL</a>
								<div class="dropdown-divider"></div>								
								<a class="dropdown-item" href="{{url('vender')}} "
									style="color: #191717;">VENDER</a>

							</div>
						</li>

						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
								aria-haspopup="true" aria-expanded="false"><b>BUSCANDO CASA</b></a>
							<div class="dropdown-menu" style="top: -40px;">
								<a class="dropdown-item" href="{{url('buscando-alquiler')}}"
									style="color: #191717;">ALQUILER LARGA DURACIÓN</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="{{url('buscando-turistico')}}"
									style="color: #191717;">ALQUILER VACIONAL/TEMPORAL</a>
								<div class="dropdown-divider"></div>								
								<a class="dropdown-item" href="{{url('comprar')}} "
									style="color: #191717;">COMPRAR</a>

							</div>
						</li>					
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