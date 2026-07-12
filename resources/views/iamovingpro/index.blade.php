<!DOCTYPE html>
<html lang="en">
@section('title', 'IAMOVING - Fácil de alquilar, comprar y vender')
@section('description', '¡Fácil de alquilar, comprar y vender!')
@section('image', 'https://iamoving.com/img/iamoving.png')
<head>
    <title>Iamoving</title>
    <meta charset="UTF-8">
    <meta name="description" content="LERAMIZ Landing Page Template">
    <meta name="keywords" content="LERAMIZ, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="shortcut icon" />
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js_theme/maina.js') }}" defer></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}" />
    <link rel="stylesheet" href="{{asset('css_theme/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css_theme/animate.css')}}" />
    <link rel="stylesheet" href="{{asset('css_theme/owl.carousel.css')}}" />
    <link rel="stylesheet" href="{{asset('css_theme/style.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/buscador.css')}}">
    <!-- import CSS -->
    <link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">
    <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js" integrity="sha384-0pzryjIRos8mFBWMzSSZApWtPl/5++eIfzYmTgBBmXYdhvxPc+XcFEk+zJwDgWbP" crossorigin="anonymous"></script>
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    <style>
        .badge {
            padding: 0.25rem .5rem !important;
            font-size: .7rem;
            font-weight: 300;
        }

        .el-checkbox,
        .el-checkbox__input {
            cursor: pointer;
            display: inline-block;
            position: relative;
            white-space: nowrap;
            margin: 4px;
        }

        .grop-check-vuejs {
            margin: -12px !important;
        }

        .check-filter-vuejs {
            margin: -14px 0 0 0 !important;
        }
        .box_selected{
            border:5px solid #EADD1B;
        }
        .titulo-filter-vuejs {
            font-size: 17px;
        }
        .el-checkbox__label {
            padding-left: 0px;
        }


#image
{    
    position:absolute;

}
#text
{
    z-index:100;
    position:absolute;    
    
    /*font-size:24px;
    font-weight:bold;
    left:150px;
    top:350px;*/
}
.rotar1 
    { 
      -webkit-transform: rotate(-45deg); 
      -moz-transform: rotate(-45deg); 
      -ms-transform: rotate(-45deg); 
      -o-transform: rotate(-45deg); 
      transform: rotate(-45deg); 
      
      -webkit-transform-origin: 50% 50%; 
      -moz-transform-origin: 50% 50%; 
      -ms-transform-origin: 50% 50%; 
      -o-transform-origin: 50% 50%; 
      transform-origin: 50% 50%; 
      
     font-size: 65px; 
      width: 250px; 
      position: relative; 
      top: 150px; 
	  color:#EADD1B;
    }


        
    </style>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
   <script>
        function formateo(input)
            {
            var num = input.value.replace(/\./g,'');
            if(!isNaN(num)){
            num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
            num = num.split('').reverse().join('').replace(/^[\.]/,'');
            input.value = num;
            }
              
            else{ //alert('Solo se permiten numeros');
            input.value = input.value.replace(/[^\d\.]*/g,'');
            }
            }
    function numberFormat(numero){
        // Variable que contendra el resultado final
        var resultado = "";
 
        // Si el numero empieza por el valor "-" (numero negativo)
        if(numero[0]=="-")
        {
            // Cogemos el numero eliminando los posibles puntos que tenga, y sin
            // el signo negativo
            nuevoNumero=numero.replace(/\./g,'').substring(1);
        }else{
            // Cogemos el numero eliminando los posibles puntos que tenga
            nuevoNumero=numero.replace(/\./g,'');
        }
 
        // Si tiene decimales, se los quitamos al numero
        if(numero.indexOf(",")>=0)
            nuevoNumero=nuevoNumero.substring(0,nuevoNumero.indexOf(","));
 
        // Ponemos un punto cada 3 caracteres
        for (var j, i = nuevoNumero.length - 1, j = 0; i >= 0; i--, j++)
            resultado = nuevoNumero.charAt(i) + ((j > 0) && (j % 3 == 0)? ".": "") + resultado;
 
        // Si tiene decimales, se lo añadimos al numero una vez forateado con 
        // los separadores de miles
        if(numero.indexOf(",")>=0)
            resultado+=numero.substring(numero.indexOf(","));
 
        if(numero[0]=="-")
        {
            // Devolvemos el valor añadiendo al inicio el signo negativo
            return "-"+resultado;
        }else{
            return resultado;
        }
    }            
    </script>

</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <div id="app">
        <!-- Header section -->
        @include('navigation.navpro')
        <!-- Header section end -->
        <!-- Page top section -->

        @if(isset($token))
            <modal-auth id="modal-auth" user="{{ Auth::user() }}" secret="{{ $token }}"></modal-auth>
        @else 
            <modal-auth id="modal-auth" user="{{ Auth::user() }}" secret=""></modal-auth>
        @endif
    </div>
        {{--    <section class="page-top-section set-bg" data-setbg="img/page-top-bg.jpg">
                <div class="container text-white">
                    <h2>BUSCADOR</h2>
                </div>
            </section> --}}

        <!--  Page top end -->
        <!-- Breadcrumb -->
        <div class="site-breadcrumb">
            <div class="container">
                
            </div>

        </div>
        <!-- Page -->
        <div class="row no-gutters mb-4">
            <div id="filter" class="col-xs-12 col-md-6" style="height: 800px; overflow-y: scroll;">
                <section class="page-section" >

                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 single-list-page">
                                <el-form :model="form" label-position="top" label-width="120px" @submit.prevent="submit">
                                    <!--<el-row  v-if="control==0">
                                        <label> <strong class="titulo-filter-vuejs">¿Entrar a vivir a partir de cuándo?</strong></label>
                                    </el-row>
                                    <el-form-item  v-if="control==0">
                                        <el-date-picker size="small" style="width: 30%;" v-model="form.date" type="date" format="dd/MM/yyyy" placeholder="¡Para ya!"></el-date-picker>
                                    </el-form-item>-->
                                    <el-row>
                                        <label> <strong class="titulo-filter-vuejs">Presupuesto máx.</strong></label>
                                    </el-row>
                                    <el-form-item style="width: 30%;">
                                       <!--<el-input v-model="form.price" placeholder="Presupuesto máximo (€)" class="col-md-3 form-control-number" @blur="onBlurNumber"></el-input>-->
									   <el-input v-model="form.price" placeholder="Presupuesto máximo" @blur="onBlurNumber"></el-input>
                                    </el-form-item>
                                    <el-row >
                                        <el-col :span="6" >
                                            <label><strong class="titulo-filter-vuejs"> N° de dormitorios</strong></label>
                                        </el-col>
                                        <el-form-item  style="position: absolute; left: 130px; bottom: -27px;">
                                            <el-checkbox-group v-model="form.piesas">
                                                <!--<el-checkbox label="0"></el-checkbox>-->
                                                <el-checkbox label="1"></el-checkbox>
                                                <el-checkbox label="2"></el-checkbox>
                                                <el-checkbox label="3"></el-checkbox>
                                                <el-checkbox label="4"></el-checkbox>
                                                <el-checkbox label="+5"></el-checkbox>
                                                <!-- <el-checkbox label="+6"></el-checkbox> -->
                                            </el-checkbox-group>
                                        </el-form-item>
                                    </el-row>
                                    <br>
                                    <el-row  >
                                        <el-col :span="6" >
                                            <label> <strong class="titulo-filter-vuejs">N° de baños</strong></label>
                                        </el-col>
                                        <el-form-item  style="position: absolute; left: 95px; bottom: -27px;">
                                            <el-checkbox-group v-model="form.numerosBanos">
                                                <el-checkbox label="1"></el-checkbox>
                                                <el-checkbox label="2"></el-checkbox>
                                                <el-checkbox label="3"></el-checkbox>
                                                <el-checkbox label="4"></el-checkbox>
                                                <el-checkbox label="+5"></el-checkbox>
                                            </el-checkbox-group>
                                        </el-form-item>
                                    </el-row>
                                    <br>
                                    <!--<el-row>
                                        <el-col>
                                            <label><strong class="titulo-filter-vuejs">M² mínimo:</strong></label>
                                        </el-col>

                                        <el-col :span="6">

                                            <el-form-item>
                                                <el-input-number size="small" v-model="form.square_meter" size="small"
                                                    :min="0"></el-input-number>
                                            </el-form-item>


                                        </el-col>
                                    </el-row> -->
								
                                    <el-row>
                                        <el-form-item  v-if="control==1">
                                            <strong class="titulo-filter-vuejs">Tipo de inmueble:</strong>
                                            <el-checkbox-group class="grop-check-vuejs" v-model="form.qualities">
                                                <el-checkbox label="Estudio"></el-checkbox>
                                                <el-checkbox label="Loft"></el-checkbox>
                                                <el-checkbox label="Apartamento"></el-checkbox>
                                                <el-checkbox label="Piso"></el-checkbox>
                                                <el-checkbox label="Chalet"></el-checkbox>
                                                <el-checkbox label="Atico"></el-checkbox>
                                                <el-checkbox label="Bajo"></el-checkbox>
                                            </el-checkbox-group>
                                        </el-form-item>
                                       {{--  <el-form-item  v-if="control==0">
                                            <strong class="titulo-filter-vuejs">¿ Buscando amueblado o vacío ?</strong>
                                            <el-checkbox-group class="grop-check-vuejs" v-model="form.qualities">

                                                <el-checkbox label="Totalmente sin muebles"></el-checkbox>
                                                <el-checkbox label="Vacío c/ la cocina equipada"></el-checkbox>
                                                <el-checkbox label="Semi amueblado"></el-checkbox>
                                                <div class="check-filter-vuejs">
                                                    <el-checkbox label="Amueblado"></el-checkbox>
                                                </div>

                                            </el-checkbox-group>
                                        </el-form-item> --}}

                                    </el-row>
								<div id="masfiltros">
                                    <template v-if="filters">

                                        <el-row v-if="control==0">
                                        <el-form-item >
                                            <strong class="titulo-filter-vuejs">Tipo de inmueble</strong>
                                            <el-checkbox-group class="grop-check-vuejs" v-model="form.qualities">
                                                <el-checkbox label="Estudio"></el-checkbox>
                                                <el-checkbox label="Loft"></el-checkbox>
                                                <el-checkbox label="Apartamento"></el-checkbox>
                                                <el-checkbox label="Piso"></el-checkbox>
                                                <el-checkbox label="Chalet"></el-checkbox>
                                                <el-checkbox label="Atico"></el-checkbox>
                                                <el-checkbox label="Bajo"></el-checkbox>
                                            </el-checkbox-group>
                                        </el-form-item>
                                        <el-form-item  >
                                            <strong class="titulo-filter-vuejs">¿ Buscando amueblado o vacío ?</strong>
                                            <el-checkbox-group class="grop-check-vuejs" v-model="form.qualities">

                                                <el-checkbox label="Totalmente sin muebles"></el-checkbox>
                                                <el-checkbox label="Vacío c/ la cocina equipada"></el-checkbox>
                                                <el-checkbox label="Semi amueblado"></el-checkbox>
                                                <div class="check-filter-vuejs">
                                                    <el-checkbox label="Amueblado"></el-checkbox>
                                                </div>

                                            </el-checkbox-group>
                                        </el-form-item>

                                    </el-row>
                                        <el-row>
                                            <label><strong class="titulo-filter-vuejs">Estado del inmueble</strong></label>
                                            <el-col>
                                                <el-form-item>
                                                    <el-checkbox-group class="grop-check-vuejs"
                                                        v-model="form.estadoInmueble">
                                                        <el-checkbox label="Obra nueva"></el-checkbox>
                                                        <!--<el-checkbox label="Antigüedad hasta 10 años"></el-checkbox>-->
                                                        <el-checkbox label="Obra nueva con menos de 10 años"></el-checkbox>
                                                        <el-checkbox label="Reformado a estrenar"></el-checkbox>
                                                        <div class="check-filter-vuejs">
                                                            <!--<el-checkbox label="Ha sido reformado a menos de 10 años">-->
                                                            <el-checkbox label="Reformado hace menos de 10 años">
                                                            </el-checkbox>
                                                            <!--<el-checkbox label="Reformado o antigüedad hace más de 10 años.">-->
                                                            <el-checkbox label="No ha sido reformado o reformado hace más de 10 años">
                                                            </el-checkbox>
                                                        </div>

                                                    </el-checkbox-group>
                                                </el-form-item>
                                            </el-col>
                                        </el-row>

                                        <h4>¡Lo que es muy importante para mi!</h4>

                                        <el-row>

                                            <el-form-item>
                                                <el-checkbox-group v-model="form.access">
                                                    <el-checkbox label="Ascensor"></el-checkbox>
                                                    <el-checkbox label="Rampas de minusválidos en el portal"></el-checkbox>
                                                    <el-checkbox label="Ascensor que entra un carrito de bebé">
                                                    </el-checkbox>
                                                    <div class="check-filter-vuejs">
                                                        <el-checkbox label="Exterior"></el-checkbox>
                                                        <el-checkbox label="Terraza"></el-checkbox>
                                                        <el-checkbox label="Balcón"></el-checkbox>
                                                        <el-checkbox label="Tendedero"></el-checkbox>
                                                        <el-checkbox label="Acepta mascotas"></el-checkbox>
                                                    </div>
                                                    <div class="check-filter-vuejs">
                                                        <el-checkbox label="Aire acondicionado"></el-checkbox>
                                                    </div>

                                                </el-checkbox-group>
                                            </el-form-item>
                                        </el-row>


                                          <el-row  v-if="control==1">
                                            <el-col>
                                                <label><strong class="titulo-filter-vuejs">Baño incorporado en la
                                                        habitacion:</strong></label>
                                                <el-form-item>
                                                    <el-checkbox-group class="grop-check-vuejs"
                                                        v-model="form.banosIncorporados">
                                                        <el-checkbox label="1"></el-checkbox>
                                                        <el-checkbox label="2"></el-checkbox>
                                                        <el-checkbox label="3"></el-checkbox>
                                                        <el-checkbox label="4"></el-checkbox>
                                                        <el-checkbox label="+5"></el-checkbox>
                                                    </el-checkbox-group>
                                                </el-form-item>
                                            </el-col>
                                        </el-row>

                                        {{-- 
                                                <el-row>

                                                        <el-col >
                                                                <el-form-item>
                                                                <el-checkbox-group v-model="form.ambient">
                                                                    
                                                                </el-checkbox-group>
                                                            </el-form-item>
                                                        </el-col>
                                                 </el-row> --}}

                                        <el-row>
                                            <label><strong class="titulo-filter-vuejs">Calefacción</strong></label>
                                            <el-form-item>
                                                <el-checkbox-group class="grop-check-vuejs" v-model="form.heating">
                                                    <el-checkbox value="Gas natural" label="Gas natural"></el-checkbox>
                                                    <el-checkbox value="Eléctrica" label="Eléctrica"></el-checkbox>
                                                    <el-checkbox value="Central" label="Central"></el-checkbox>
                                                </el-checkbox-group>
                                            </el-form-item>
                                        </el-row>

                                        <el-row>
                                            <label> <strong class="titulo-filter-vuejs">Caldera del agua</strong></label>
                                            <el-form-item>
                                                <el-checkbox-group class="grop-check-vuejs" v-model="form.calderaAgua">
                                                    <el-checkbox value="Gas natural" label="Gas natural"></el-checkbox>
                                                    <el-checkbox value="Eléctrica" label="Eléctrica"></el-checkbox>
                                                    <el-checkbox value="Central" label="Central"></el-checkbox>
                                                </el-checkbox-group>
                                            </el-form-item>
                                        </el-row>
 {{--
                                        <el-row>

                                            <el-col>
                                                <label><strong class="titulo-filter-vuejs">Orientación:</strong></label>
                                                <el-form-item>--}}
                                                    {{-- <el-select size="small" v-model="form.room_bathrooms" placeholder="Seleccioné">
                                                                    <el-option key="1" label="Norte" value="Norte"></el-option>
                                                                    <el-option key="2" label="Sur" value="2"></el-option>
                                                                    <el-option key="3" label="Este" value="3"></el-option>
                                                                    <el-option key="4" label="Sureste" value="4"></el-option>
                                                                    <el-option key="5" label="Noroeste" value="5"></el-option>
                                                                    <el-option key="6" label="Suroeste" value="6"></el-option>
                                                                    <el-option key="7" label="7" value="7"></el-option>
                                                                </el-select> --}}
                                                   {{--  <el-checkbox-group class="grop-check-vuejs" v-model="form.orientacion">

                                                        <el-checkbox label="Norte"></el-checkbox>
                                                        <el-checkbox label="Sur"></el-checkbox>
                                                        <el-checkbox label="Este"></el-checkbox>
                                                        <el-checkbox label="Oeste"></el-checkbox>
                                                        <el-checkbox label="Sureste/"></el-checkbox>
                                                        <el-checkbox label="Noreste"></el-checkbox>
                                                        <el-checkbox label="Noroeste"></el-checkbox>
                                                        <el-checkbox label="Suroeste"></el-checkbox>
                                                    </el-checkbox-group>
                                                </el-form-item>
                                            </el-col>
                                        </el-row>--}}
{{--
                                           <el-row  v-if="control==0">
                                            <el-col>
                                                <label><strong class="titulo-filter-vuejs">Baño incorporado en la
                                                        habitacion:</strong></label>
                                                <el-form-item>
                                                    <el-checkbox-group class="grop-check-vuejs"
                                                        v-model="form.banosIncorporadosHab">
                                                        <el-checkbox label="1"></el-checkbox>
                                                        <el-checkbox label="2"></el-checkbox>
                                                        <el-checkbox label="3"></el-checkbox>
                                                        <el-checkbox label="4"></el-checkbox>
                                                        <el-checkbox label="+5"></el-checkbox>
                                                    </el-checkbox-group>
                                                </el-form-item>
                                            </el-col>
                                        </el-row>
                                      
--}}

                                        <el-row v-if="control==0">
                                            <label><strong class="titulo-filter-vuejs">¿Cuál es la duración mínima del
                                                    contrato que estás buscando?</strong></label>
                                            <el-form-item>
                                                <el-select size="small" v-model="form.contract" placeholder="Seleccioné">
                                                    <el-option key="1" label="1 Mes" :value="1"></el-option>
                                                    <el-option key="2" label="2 Mes" :value="2"></el-option>
                                                    <el-option key="3" label="3 Mes" :value="3"></el-option>
                                                    <el-option key="4" label="4 Mes" :value="4"></el-option>
                                                    <el-option key="5" label="5 Mes" :value="5"></el-option>
                                                    <el-option key="6" label="6 Mes" :value="6"></el-option>
                                                    <el-option key="7" label="7 Mes" :value="7"></el-option>
                                                    <el-option key="8" label="8 Mes" :value="8"></el-option>
                                                    <el-option key="9" label="9 Mes" :value="9"></el-option>
                                                    <el-option key="10" label="10 Mes" :value="10"></el-option>
                                                    <el-option key="11" label="11 Mes" :value="11"></el-option>
                                                    <el-option key="12" label="12 Mes" :value="12"></el-option>

                                                </el-select>
                                            </el-form-item>
                                        </el-row>


                                        <el-row>
                                            <label><strong class="titulo-filter-vuejs">Datos del edifico</strong></label>
                                            <el-form-item>
                                                <el-checkbox-group v-model="form.qualities">
                                                    <el-checkbox-group v-model="form.building">
                                                        <el-checkbox label="Jardín"></el-checkbox>
                                                        <el-checkbox label="Piscina"></el-checkbox>
                                                        <el-checkbox label="Gym"></el-checkbox>
                                                        <el-checkbox label="Sauna"></el-checkbox>
                                                        <el-checkbox label="Zona deportiva"></el-checkbox>
                                                        <el-checkbox label="Zona infantil"></el-checkbox>
                                                        <div class="check-filter-vuejs">
                                                            <el-checkbox label="Garaje incluido en el precio"></el-checkbox>
                                                            <el-checkbox label="Opción de garaje en el mismo edificio">
                                                            </el-checkbox>
                                                            <el-checkbox label="Trastero incluido"></el-checkbox>
                                                        </div>

                                                        <div class="check-filter-vuejs">
                                                            <el-checkbox label="Opción de trastero en el mismo edificio">
                                                            </el-checkbox>
                                                        </div>



                                                    </el-checkbox-group>


                                                </el-checkbox-group>
                                            </el-form-item>
                                        </el-row>


                                        {{--    <el-form-item label="Ambiente:">
                                                        <el-checkbox-group v-model="form.ambient">
                                                            <el-checkbox label="Exterior"></el-checkbox>
                                                            <el-checkbox label="Terraza"></el-checkbox>
                                                            <el-checkbox label="Balcón"></el-checkbox>
                                                            <el-checkbox label="Tendedero"></el-checkbox>
                                                            <el-checkbox label="Interior"></el-checkbox>
                                                        </el-checkbox-group>
                                                    </el-form-item>
                                                    <el-form-item label="Accesos 2*:">
                                                        <el-checkbox-group v-model="form.access2">
                                                            <el-checkbox label="Acepta Mascotas"></el-checkbox>
                                                            <el-checkbox label="Aire acondicionadol"></el-checkbox>
                                                            <el-checkbox label="Horno"></el-checkbox>
                                                            <el-checkbox label="Lavavajillas"></el-checkbox>
                                                        </el-checkbox-group>
                                                    </el-form-item> --}}

                                    </template>
								</div>
                                    <el-form-item>
                                        <el-button type="primary" @click="submit">Filtrar</el-button>
                                        <el-button id="btnMasfiltros" type="info" @click="showFilters">@{{titleFilters}}</el-button>
                                    </el-form-item>
                                </el-form>
                            </div>
                            <div id="no_data" v-if="!dataFilter.length" style="padding-left: 15px;">No hay inmuebles disponibles para este filtro.Intente otro filtro.</div>
                        </div>
                    </div>
                    <div id="card_container" class="card-grid">
                    <div :id="`box_${data.id}`" class="feature-item inmueble bg-white" v-for="data in dataFilter" v-if="data.estado_inmueble === 'Disponible' || data.estado_inmueble === 'Reservado' || data.estado_inmueble === 'Alquilado' || data.estado_inmueble === 'Vendido'">
                      <!--<div :id="`box_${data.id}`" class="feature-item inmueble bg-white" v-for="data in dataFilter" v-if="(data.estado_inmueble === 'Disponible' || data.estado_inmueble === 'Reservado') && data.iamoving_pro > 0 ">-->
						<a :href="`/VisitaVirtual/${ data.id }`"  target="_blank">
                            <div class="feature-pic set-bg"
                                :style="{ backgroundImage: `url(/storage/${data.path_image_primary}_444x250.jpg)`.replace('.jpeg','')}">
                                <div class="sale-notic" v-if="data.is_sale == '1'">En Venta</div>
                                <div class="rent-notic" v-if="data.is_sale == '0'">En Alquiler </div>
								<p id="text">
									<div class="rotar1" v-if="data.estado_inmueble == 'Vendido'">VENDIDO</div>
									<div class="rotar1" v-if="data.estado_inmueble == 'Alquilado'">ALQUILADO</div>
									<div class="rotar1" v-if="data.estado_inmueble == 'Reservado'">RESERVADO</div>
								</p>
							</div>
							
                        </a>
                        <div class="feature-text border-0">
                            <div class="text-center feature-title">
                                <h5><a :href="`/VisitaVirtual/${ data.id }`" target="_blank">Referencia @{{data.id}}</a></h5>
                                <p><i class="fa fa-map-marker"></i> @{{data.road}}</p>
								<p v-if="data.id==85">Precio a consultar</p>
								<p v-else-if="data.tipo_inmueble=='Habitaciones' && data.bedrooms>1">Desde € @{{ String(parseInt(data.propiedad_precio)).replace(/(.)(?=(\d{3})+$)/g,'$1.') }}</p>	
								<p v-else>€ @{{ String(parseInt(data.propiedad_precio)).replace(/(.)(?=(\d{3})+$)/g,'$1.') }}</p>								
								<p v-if="data.tipo_inmueble=='Habitaciones'">Habitaciones en alquiler</p>	
                            </div>
                            <div class="room-info-warp">
                                <div class="room-info">
                                    <div class="rf-left">
                                        <p v-if="data.estudio==1"><i class="fa fa-check-square"></i> Estudio</p>
                                        <p v-if="data.apartamento==1"><i class="fa fa-check-square"></i> Apartamento</p>
                                        <p v-if="data.chalet==1"><i class="fa fa-check-square"></i> Chalet</p>
                                        <p v-if="data.loft==1"><i class="fa fa-check-square"></i> Loft</p>
                                        <p v-if="data.piso==1"><i class="fa fa-check-square"></i> Piso</p>
                                        <p v-if="data.bajo==1"><i class="fa fa-check-square"></i> Bajo</p>
                                        <p v-if="data.atico==1"><i class="fa fa-check-square"></i> Ático</p>
                                        <p><i class="fa fa-th-large"></i> @{{data.square_meters}} m<sup>2</sup></p>
                                    </div>
                                    <div class="rf-right">
                                        <p><i class="fa fa-bed"></i> Dormitorios: @{{data.bedrooms}}</p>
                                        <p><i class="fa fa-bath"></i> Baños: @{{data.bathrooms}}</p>
                                        <!--<p><i class="fa fa-bath"></i> Baños: @{{data.path_image_primary}}</p>-->
                                    </div>
                                    
                                </div>
                                <p class="fa-2x text-right">

                                </p>
                            </div>
                        </div>
                    </div>
                    </div>
                </section>
            </div>
            <div class="hidden-xs col-md-6">
                <img src="{{asset('img/marker.ico')}}" style="display: none!important;">
                <div class="row" id="buscador-estilos">
                    <div class="col-lg-4">
                        <input id="pac-input" class="controls" type="text" placeholder="¿Dónde quieres vivir?">
                    </div>
                </div>
                <div id="map"></div>
            </div>
        </div>

        
    
    <!-- Footer section -->
    @include('navigation.footerpro')
    <!-- Footer section end -->
    <!--====== Javascripts & Jquery ======-->
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6c9CV5eg2Tc1nfcKacjp7AVySHeHBjdU&libraries=places"
        async defer></script>
    <script type="text/javascript">
        var data = @json($data);
        //console.log(data);
    </script>    
    
    

    
    <!--<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>-->
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="{{asset('js_theme/masonry.pkgd.min.js')}}"></script>
    <script src="{{asset('js_theme/main.js')}}"></script>

    <script src="{{asset('js_theme/owl.carousel.min.js')}}"></script>
    <!-- <script type="text/javascript" src="{{asset('js/buscador.js')}}"></script> -->

    
    
    
    <!-- load for map -->
    
    
    <!-- import Vue before Element -->
    <!--<script src="https://unpkg.com/vue/dist/vue.min.js"></script> -->
    <script src="{{asset('js/vue.min.js')}}"></script>
    <!-- import JavaScript -->
    <script src="https://unpkg.com/element-ui/lib/index.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/element-ui/2.5.4/locale/es.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
//        import * as buscador from '{{asset('js/buscador.js')}}'

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var max_price = @json($max);
        var price =  max_price!=null ? parseInt(max_price).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") : "";
        
        

        ELEMENT.locale(ELEMENT.lang.es);

        const filter = new Vue({
            el: '#filter',
            data() {
                return {
                    user: null,
                    dataFilter: [],
                    filters: false,
                    control: @json($category),
                    form: {
                        furnished_types: [],
                        estadoInmueble: [],
                        numerosBanos: [],
                        calderaAgua: [],
                        piesas: [],
                        orientacion: [],
                        banosIncorporados: [],
                        banosIncorporadosHab: [],
                        price: '',
			//price: price,
                        qualities: [],
                        building: [],
                        ambient: [],
                        heating: [],
                        access2: [],
                        access: [],
                        region: '',
                        date: '',
                        user: ''
                       
                    }
                }
            },
            created() {
                //console.log("Filter created");
				//alert('1');
                this.dataFilter = data;
               
            },
            mounted() {
				//alert('2');
                const plugin = document.createElement("script");
                plugin.setAttribute(
                    "src",
                    "https://www.iamoving.com/js/buscador.js"
                );
                plugin.async = true;
                document.head.appendChild(plugin);
            },
            computed: {
                titleFilters() {
                    if (this.filters) {
						//alert('hola');
						$('#masfiltros').show();
						return 'Menos filtros';
					}
					else
					{
						//alert('adios');
						$('#masfiltros').hide();
						return 'Mostrar +';
					}
                }
            },
            methods: {
                showFilters() {
					//alert('hola');
                    this.filters = !this.filters;
					if (this.filters) {
						//alert('hola1');
						//return 'Menos filtros';
					}
					else
					{
						//alert('adios1');
						//return 'Mostrar +';
					}
                },
                submit() {
					
                    //console.log(this.form.date);
                    //Add 65 days more
                    if (this.form.date != "") {
                         this.form.date.setDate(this.form.date.getDate()+65);
                    }
                    axios.post('{{ url("iamovingpro/find") }}/' + this.control, this.form).then(response => {
                        //console.log(response.data);
                        this.dataFilter = response.data;
                        reload_makers(response.data);
                    }).catch(error => {
                    }).then(() => {

                    });
                },
                onBlurNumber(e) {
                    //this.form.price = '€ ' + this.thousandSeprator(this.form.price);
                    if (this.form.price.indexOf("\u20AC") == -1) {
                        this.form.price = this.thousandSeprator(this.form.price) + " \u20AC";
                    }
                },
                thousandSeprator(amount) {
                    if (amount !== '' || amount !== undefined || amount !== 0 || amount !== '0' || amount !== null) {
                        //return '€ ' +  amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
						return amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                    } else {
                        //return '€ ' + amount;
						return amount;
                    }
                },
                onKeyDown(evt){
                    console.log(evt.keyCode);
                    if (evt.keyCode == 222 || evt.keyCode == 190 ||  evt.keyCode == 49 || evt.keyCode == 55 || evt.keyCode == 190 ||  evt.keyCode == 188){
                        evt.preventDefault()
                        return
                    }
                }
            }
        });

      
    </script>
</body>

</html>
