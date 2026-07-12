<!DOCTYPE html>
<html lang="en">
<head>
    <title>IAMOVING - Busca tu casa ya</title>
    <meta charset="UTF-8">
    <meta name="description" content="LERAMIZ Landing Page Template">
    <meta name="keywords" content="LERAMIZ, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta property="og:title" content="IAMOVING - Busca tu casa">
	<meta property="og:description" content="¡Busca tu casa!"> <!--Maximum 65 characters-->
	<meta property="og:url" content="https://www.iamoving.com" /> 
	<!--Maximum 65 characters-->
	<meta property="og:image" content="https://iamoving.com/img/iamoving.png">   	

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.ico') }}" rel="shortcut icon" />
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
        .play-btn{
            position: inherit;
            text-align:center;
            margin-top:10px;
            z-index:1600;
        }
        .play-btn:hover{
            cursor: pointer;
        }
        .feature-text:hover{
            cursor: pointer;
        }
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
      
     font-size: 55px; 
      width: 250px; 
      position: relative; 
      top: 65px; 
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
        <!--<div class="site-breadcrumb">
            <div class="container">
                
            </div>

        </div>-->
        <!-- Page -->
        <div class="row no-gutters mt-4 mb-4">
            <div id="filter" class="col-xs-12 col-md-6" style="height: 800px; overflow-y: scroll;">
                <section class="page-section" >

                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 single-list-page">
							
                                <el-form :model="form" label-position="top" id="formulario" label-width="120px" @submit.prevent="submit">
                                    <!--<el-row  v-if="control==0">
                                        <label> <strong class="titulo-filter-vuejs">¿Entrar a vivir a partir de cuándo?</strong></label>
                                    </el-row>
                                    <el-form-item  v-if="control==0">
                                        <el-date-picker size="small" style="width: 30%;" v-model="form.date" type="date" format="dd/MM/yyyy" placeholder="¡Para ya!"></el-date-picker>
                                    </el-form-item>-->
                                       <!--TODO-->
									  <!-- <el-row  v-if="control==0">
                                        <el-col :span="6">
                                            <label><strong class="titulo-filter-vuejs"> Tipo de inmueble: </strong></label>
                                        </el-col>
                                            <el-form-item>
                                                <el-select size="small" v-model="form.tipoinmueble" id="tipoinmueble" name="tipoinmueble" @change="alquilerInmueble">
                                                    <el-option label="Pisos y casas" :value="1"></el-option>
													<el-option label="Habitaciones" :value="2"></el-option>
													<el-option label="Local/Oficina" :value="3"></el-option>
                                            </el-form-item>
                                        </el-row>			
                                        <el-row  v-if="control==1">
                                        <el-col :span="6">
                                            <label><strong class="titulo-filter-vuejs"> Tipo de inmueble: </strong></label>
                                        </el-col>
                                            <el-form-item>
                                                <el-select size="small" v-model="form.tipoinmueble" id="tipoinmueble" name="tipoinmueble" @change="venderInmueble">
                                                    <el-option label="Pisos y casas" :value="1"></el-option>
													<el-option label="Local/Oficina" :value="3"></el-option>
                                            </el-form-item>
                                        </el-row>-->
                                    <el-row>
                                        <h4 class="card-text" style="color:#eadd03;">{{$city->name}}</h4>
                                    </el-row>    
                                   <el-row>
                                        <el-form-item   v-if="control==0">
                                            <strong class="titulo-filter-vuejs">Tipo de inmueble</strong><br />
                                            <!--<input type="radio" :value="1" id="tipoinmueble" name="tipoinmueble"  v-model="form.tipoinmueble" /> Pisos y casas
                                            <input type="radio"     :value="2" id="tipoinmueble" name="tipoinmueble" v-model="form.tipoinmueble" /> Habitaciones
											<input type="radio"     :value="3" id="tipoinmueble" name="tipoinmueble" v-model="form.tipoinmueble" /> Local/Oficina-->
											<el-radio-group v-model="form.tipoinmueble" >
                                                <el-radio   :value="1" label="Pisos y casas" @change="reseteo" ></el-radio>
                                                <el-radio  :value="2" label="Habitaciones" @change="reseteo"></el-radio>
												<el-radio  :value="3" label="Local/Oficina" @change="reseteo" ></el-radio>
                                            </el-checkbox-group											
                                        </el-form-item>
                                    </el-row >	
                                   <el-row>
                                        <el-form-item   v-if="control==1">
                                            <strong class="titulo-filter-vuejs">Tipo de inmueble</strong><br />
                                            <!--<input type="radio" :value="1" id="tipoinmueble" name="tipoinmueble" label="Pisos y casas" v-model="form.tipoinmueble"/> Pisos y casas
											<input type="radio" :value="3" id="tipoinmueble" name="tipoinmueble" v-model="form.tipoinmueble" /> Local/Oficina-->
											<el-radio-group v-model="form.tipoinmueble">
                                                <el-radio   :value="1" label="Pisos y casas" @change="reseteo"></el-radio>
												<el-radio  :value="3" label="Local/Oficina" @change="reseteo"></el-radio>
                                            </el-checkbox-group												
                                        </el-form-item>
                                    </el-row >									
                                    <el-row>
                                        <el-col :span="6" style="width: 35%;">
                                            <label> <strong class="titulo-filter-vuejs">Presupuesto</strong></label>
                                            <el-form-item >
                                            <!--<el-input v-model="form.price" placeholder="Presupuesto máximo (€)" class="col-md-3 form-control-number" @blur="onBlurNumber"></el-input>-->
                                            <el-input v-model="form.propiedad_price" placeholder="Mínimo" @blur="onBlurNumbere"></el-input>
                                            </el-form-item>											
                                        </el-col>
										<el-col :span="1" >
										&nbsp;&nbsp;
										</el-col>
                                        <el-col :span="5" style="width: 35%;">
                                            <label> <strong class="titulo-filter-vuejs">&nbsp;&nbsp;</strong></label>
                                            <el-form-item >
                                            <!--<el-input v-model="form.price" placeholder="Presupuesto máximo (€)" class="col-md-3 form-control-number" @blur="onBlurNumber"></el-input>-->
                                            <el-input v-model="form.price" placeholder="Máximo" @blur="onBlurNumber"></el-input>
                                            </el-form-item>											
                                        </el-col>
                                    </el-row>
                                    <el-row v-if="form.tipoinmueble!='Habitaciones'">
                                        <el-col :span="6" style="width: 35%;">
                                            <label> <strong class="titulo-filter-vuejs">Tamaño (m<sup>2</sup>)</strong></label>
                                            <el-form-item >
                                            <!--<el-input v-model="form.price" placeholder="Presupuesto máximo (€)" class="col-md-3 form-control-number" @blur="onBlurNumber"></el-input>-->
                                            <el-input v-model="form.propiedad_tamano" placeholder="Mínimo" @blur="reseteo"></el-input>
                                            </el-form-item>											
                                        </el-col>
										<el-col :span="1" >
										&nbsp;&nbsp;
										</el-col>
                                        <el-col :span="5" style="width: 35%;">
                                            <label> <strong class="titulo-filter-vuejs">&nbsp;&nbsp;</strong></label>
                                            <el-form-item >
                                            <!--<el-input v-model="form.price" placeholder="Presupuesto máximo (€)" class="col-md-3 form-control-number" @blur="onBlurNumber"></el-input>-->
                                            <el-input v-model="form.tamano" placeholder="Máximo" @blur="reseteo"></el-input>
                                            </el-form-item>											
                                        </el-col>
                                    </el-row>									
                                  <!--  <el-row>
                                        <el-col :span="6" >
                                            <el-form-item style="width: 100%;">
                                            
                                            <el-input v-model="form.propiedad_price" placeholder="Presupuesto mín" @blur="onBlurNumbere"></el-input>
                                            </el-form-item>
                                        </el-col>
										<el-col :span="1" >
										&nbsp;
										</el-col>										
                                        <el-col :span="5" >
                                            <el-form-item style="width: 110%;">
                                            
                                            <el-input v-model="form.price" placeholder="Presupuesto máx" @blur="onBlurNumber"></el-input>
                                            </el-form-item>
                                        </el-col>
                                    </el-row>-->
                      <el-row v-if="form.tipoinmueble!='Local/Oficina'" >
                                    <el-row v-if="form.tipoinmueble!='Local/Oficina'">
                                        <el-col :span="6" >
                                            <label id="ndormitorios" name="ndormitorios"><strong class="titulo-filter-vuejs"> N° de Dorm.</strong></label>
                                        </el-col>
                                        <!--<el-form-item  style="position: absolute; left: 130px; bottom: -27px;">-->
										<el-form-item  style="position: absolute; left: 95px; bottom: -27px;">
                                            <el-checkbox-group v-model="form.piesas">
                                                <!--<el-checkbox label="0"></el-checkbox>-->
                                                <el-checkbox id="uno" label="1" @change="reseteo"></el-checkbox>
                                                <el-checkbox id="dos" label="2" @change="reseteo"></el-checkbox>
                                                <el-checkbox id="tres" label="3" @change="reseteo"></el-checkbox>
                                                <el-checkbox id="cuatro" label="4" @change="reseteo"></el-checkbox>
                                                <el-checkbox id="cinco" label="+5" @change="reseteo"></el-checkbox>
                                                <!-- <el-checkbox label="+6"></el-checkbox> -->
                                            </el-checkbox-group>
                                        </el-form-item>
                                    </el-row>
                                    <br>
                                    <el-row v-if="form.tipoinmueble!='Local/Oficina'" >
                                        <el-col :span="6"  >
                                            <label> <strong class="titulo-filter-vuejs">N° de Baños</strong></label>
                                        </el-col>
                                        <el-form-item  style="position: absolute; left: 95px; bottom: -27px;">
                                            <el-checkbox-group v-model="form.numerosBanos">
                                                <el-checkbox label="1" @change="reseteo"></el-checkbox>
                                                <el-checkbox label="2" @change="reseteo"></el-checkbox>
                                                <el-checkbox label="3" @change="reseteo"></el-checkbox>
                                                <el-checkbox label="4" @change="reseteo"></el-checkbox>
                                                <el-checkbox label="+5"  @change="reseteo"></el-checkbox>
                                            </el-checkbox-group>
                                        </el-form-item>
                                    </el-row>
									<br>
							 </el-row>
                                    <!--<br>-->
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
								
                                    <el-row v-if="form.tipoinmueble!='Local/Oficina'">
                                        <el-form-item  v-if="control==1">
                                            <strong class="titulo-filter-vuejs">Tipo de vivienda:</strong>
                                            <el-checkbox-group class="grop-check-vuejs" v-model="form.furnished_types">
                                                <el-checkbox label="Estudio" v-if="form.tipoinmueble=='Pisos y casas'"  @change="reseteo"></el-checkbox>
                                                <el-checkbox label="Loft" v-if="form.tipoinmueble=='Pisos y casas'"  @change="reseteo"></el-checkbox>
                                                <el-checkbox label="Apartamento" v-if="form.tipoinmueble=='Pisos y casas'"  @change="reseteo"></el-checkbox>
                                                <el-checkbox label="Piso"   id="piso_vivienda"  @change="reseteo"></el-checkbox>
                                                <el-checkbox label="Chalet" id="chalet_vivienda"  @change="reseteo"></el-checkbox>
                                                <el-checkbox label="Atico"  id="atico_vivienda"  @change="reseteo"></el-checkbox>
                                                <el-checkbox label="Bajo"   id="bajo_vivienda" @change="reseteo"></el-checkbox>
                                            </el-checkbox-group>
                                        </el-form-item>
                                       {{--  <el-form-item  v-if="control==0">
                                            <strong class="titulo-filter-vuejs">¿ Buscando amueblado o vacío ?</strong>
                                            <el-checkbox-group class="grop-check-vuejs" v-model="form.qualities">

                                                <el-checkbox label="Totalmente sin muebles"></el-checkbox>
                                                <el-checkbox label="Sin muebles con cocina equipada"></el-checkbox>
                                                <el-checkbox label="Semi-Amueblado"></el-checkbox>
                                                <div class="check-filter-vuejs">
                                                    <el-checkbox label="Amueblado"></el-checkbox>
                                                </div>

                                            </el-checkbox-group>
                                        </el-form-item> --}}

                                    </el-row>
							<div id="masfiltros">
                                    <template v-if="filters">

                                        <el-row v-if="control==0">
                                        <el-form-item  v-if="form.tipoinmueble!='Local/Oficina'">
                                            <strong class="titulo-filter-vuejs">Tipo de vivienda</strong>
                                            <el-checkbox-group class="grop-check-vuejs" v-model="form.furnished_types">
                                                <el-checkbox label="Estudio" id="estudio_vivienda" v-if="form.tipoinmueble=='Pisos y casas'" @change="reseteo"></el-checkbox>
                                                <el-checkbox label="Loft" id="loft_vivienda" v-if="form.tipoinmueble=='Pisos y casas'" @change="reseteo"></el-checkbox>
                                                <el-checkbox label="Apartamento" id="apartamento_vivienda" v-if="form.tipoinmueble=='Pisos y casas'" @change="reseteo"></el-checkbox>
                                                <el-checkbox label="Piso"   id="piso_vivienda" @change="reseteo"></el-checkbox>
                                                <el-checkbox label="Chalet" id="chalet_vivienda"  @change="reseteo"></el-checkbox>
                                                <el-checkbox label="Atico"  id="atico_vivienda"  @change="reseteo"></el-checkbox>
                                                <el-checkbox label="Bajo"   id="bajo_vivienda" @change="reseteo"></el-checkbox>
                                            </el-checkbox-group>
                                        </el-form-item>
                                        <el-form-item  v-if="form.tipoinmueble=='Pisos y casas'">
                                            <strong class="titulo-filter-vuejs">¿ Buscando amueblado o vacío ?</strong>
                                            <el-checkbox-group class="grop-check-vuejs" v-model="form.qualities">

                                                <el-checkbox label="Totalmente sin muebles"  @change="reseteo"></el-checkbox>
                                                <el-checkbox label="Sin muebles con cocina equipada"  @change="reseteo"></el-checkbox>
                                                <el-checkbox label="Semi-Amueblado"  @change="reseteo"></el-checkbox>
                                                <div class="check-filter-vuejs">
                                                    <el-checkbox label="Amueblado"  @change="reseteo"></el-checkbox>
                                                </div>

                                            </el-checkbox-group>
                                        </el-form-item>
                                        <el-form-item  v-if="form.tipoinmueble=='Habitaciones'">
                                            <strong class="titulo-filter-vuejs">¿ Buscando habitación amueblada o vacía ?</strong>
                                            <el-checkbox-group class="grop-check-vuejs" v-model="form.room">
                                                <el-checkbox label="Totalmente sin muebles"  @change="reseteo"></el-checkbox>
                                                <el-checkbox label="Semi-Amueblada"  @change="reseteo"></el-checkbox>
												<el-checkbox label="Amueblada"  @change="reseteo"></el-checkbox>
                                            </el-checkbox-group>
                                        </el-form-item>
                                    </el-row>
                                        <el-row>
                                            <label><strong class="titulo-filter-vuejs">Estado del inmueble</strong></label>
                                            <el-col>
                                                <el-form-item>
                                                    <el-checkbox-group class="grop-check-vuejs"
                                                        v-model="form.estadoInmueble">
                                                        <el-checkbox label="Obra nueva"  @change="reseteo"></el-checkbox>
														<el-checkbox label="Reformado a estrenar"  @change="reseteo"></el-checkbox>
														<el-checkbox label="A reformar"  @change="reseteo"></el-checkbox>
                                                        <div class="check-filter-vuejs">
															<el-checkbox label="En buen estado"  @change="reseteo"></el-checkbox>
															<el-checkbox label="Recién reformado"  @change="reseteo"></el-checkbox>
                                                        </div>

                                                    </el-checkbox-group>
                                                </el-form-item>
                                            </el-col>
                                        </el-row>

                                        <h4>¡Lo que es muy importante para mi!</h4>

                                        <el-row >

                                            <el-form-item v-if="form.tipoinmueble=='Local/Oficina'">
                                                <el-checkbox-group v-model="form.access">
                                                    <el-checkbox label="Exterior"  @change="reseteo"></el-checkbox>
                                                    <el-checkbox label="Interior"  @change="reseteo"></el-checkbox>
                                                    <el-checkbox label="Aire Acondicionado"  @change="reseteo">
                                                    </el-checkbox>
                                                    <div class="check-filter-vuejs">
                                                        <el-checkbox label="Ascensor"   @change="reseteo"></el-checkbox>
                                                        <el-checkbox label="Diáfano"  @change="reseteo"></el-checkbox>
                                                        <el-checkbox label="Dividido con mamparas"  @change="reseteo"></el-checkbox>
                                                    </div>
                                                    <div class="check-filter-vuejs">
                                                        <el-checkbox label="Dividido con tabiques"  @change="reseteo"></el-checkbox>
                                                            <el-checkbox label="Salida de humos"  @change="reseteo"></el-checkbox>
                                                            <el-checkbox label="A pie de calle"  @change="reseteo"></el-checkbox>														
                                                    </div>
                                                    <div class="check-filter-vuejs">
                                                        <el-checkbox label="En centro comercial"  @change="reseteo"></el-checkbox>
                                                            <el-checkbox label="Entreplanta"  @change="reseteo"></el-checkbox>
                                                            <el-checkbox label="Subterráneo"  @change="reseteo"></el-checkbox>														
                                                    </div>
                                                    <div class="check-filter-vuejs">
                                                        <el-checkbox label="Puerta de seguridad"  @change="reseteo"></el-checkbox>
                                                            <el-checkbox label="Sistemas de alarma"  @change="reseteo"></el-checkbox>
                                                            <el-checkbox label="Circuito cerrado de seguridad"  @change="reseteo"></el-checkbox>														
                                                    </div>													
                                                    <div class="check-filter-vuejs">
                                                        <el-checkbox label="Almacén"  @change="reseteo"></el-checkbox>
                                                            <el-checkbox label="Hace esquina"  @change="reseteo"></el-checkbox>
                                                            <el-checkbox label="Montacargas"  @change="reseteo"></el-checkbox>														
                                                    </div>													
                                                </el-checkbox-group>
                                            </el-form-item>
                                            <el-form-item v-if="form.tipoinmueble!='Local/Oficina'">
                                                <el-checkbox-group v-model="form.access">
                                                    <el-checkbox label="Ascensor"  @change="reseteo"></el-checkbox>
                                                    <el-checkbox label="Rampas de minusválidos en el portal"  @change="reseteo"></el-checkbox>
                                                    <el-checkbox label="Ascensor que entra un carrito de bebé"  @change="reseteo">
                                                    </el-checkbox>
                                                    <div class="check-filter-vuejs">
                                                        <el-checkbox label="Exterior"  @change="reseteo"></el-checkbox>
                                                        <el-checkbox label="Terraza"  @change="reseteo"></el-checkbox>
                                                        <el-checkbox label="Balcón"  @change="reseteo"></el-checkbox>
                                                        <el-checkbox label="Tendedero"  @change="reseteo"></el-checkbox>
                                                        <el-checkbox label="Acepta mascotas"  @change="reseteo"></el-checkbox>
                                                    </div>
                                                    <div class="check-filter-vuejs">
                                                        <el-checkbox label="Aire acondicionado"  @change="reseteo"></el-checkbox>
                                                            <el-checkbox label="Horno"  @change="reseteo"></el-checkbox>
                                                            <el-checkbox label="Lavavajillas"  @change="reseteo"></el-checkbox>														
                                                    </div>

                                                </el-checkbox-group>
                                            </el-form-item>											
                                        </el-row>


                                       {{--    <el-row  v-if="control==1">
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
                                        </el-row>  --}}

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
                                                    <el-checkbox value="Individual por gas natural" label="Individual por gas natural"  @change="reseteo"></el-checkbox>
                                                   <!-- <el-checkbox value="Eléctrica" label="Eléctrica"  @change="reseteo"></el-checkbox>-->
													<div class="check-filter-vuejs">
                                                    <el-checkbox value="Central" label="Central"  @change="reseteo"></el-checkbox>
													<!--<el-checkbox value="Central Biomasa" label="Central Biomasa"  @change="reseteo"></el-checkbox>-->
													</div>
													<!--<div class="check-filter-vuejs">
                                                    <el-checkbox value="Eléctrica (Bomba de frío/calor)" label="Eléctrica (Bomba de frío/calor)"  @change="reseteo"></el-checkbox>												
													</div>-->
													<div class="check-filter-vuejs">
													<el-checkbox value="Individual por gas natural (Suelo radiante)" label="Individual por gas natural (Suelo radiante)"  @change="reseteo"></el-checkbox>												
													</div>
													<!--<div class="check-filter-vuejs">
													<el-checkbox value="Sin calefacción" label="Sin calefacción"  @change="reseteo"></el-checkbox>
													</div>															-->
                                                </el-checkbox-group>
                                            </el-form-item>
                                        </el-row>

                                        <el-row>
                                            <label> <strong class="titulo-filter-vuejs">Caldera del agua</strong></label>
                                            <el-form-item>
                                                <el-checkbox-group class="grop-check-vuejs" v-model="form.calderaAgua">
                                                    <el-checkbox value="Gas natural" label="Gas natural"  @change="reseteo"></el-checkbox>
                                                   <!-- <el-checkbox value="Eléctrica" label="Eléctrica"  @change="reseteo"></el-checkbox>-->
                                                    <el-checkbox value="Central" label="Central"  @change="reseteo"></el-checkbox>
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
                                                        <el-checkbox label="1"  @change="reseteo"></el-checkbox>
                                                        <el-checkbox label="2"  @change="reseteo"></el-checkbox>
                                                        <el-checkbox label="3"  @change="reseteo"></el-checkbox>
                                                        <el-checkbox label="4"  @change="reseteo"></el-checkbox>
                                                        <el-checkbox label="+5"  @change="reseteo"></el-checkbox>
                                                    </el-checkbox-group>
                                                </el-form-item>
                                            </el-col>
                                        </el-row>
                                      
--}}

                                        <el-row v-if="control==0">
                                            <label><strong class="titulo-filter-vuejs">¿Cuál es la duración mínima del
                                                    contrato que estás buscando?</strong></label>
                                            <el-form-item>
                                                <el-select size="small" v-model="form.contract" placeholder="Seleccioné" @change="reseteo">
                                                    <el-option key="1" label="1 Mes" :value="1"  @change="reseteo"></el-option>
                                                    <el-option key="2" label="2 Mes" :value="2"  @change="reseteo"></el-option>
                                                    <el-option key="3" label="3 Mes" :value="3"  @change="reseteo"></el-option>
                                                    <el-option key="4" label="4 Mes" :value="4"  @change="reseteo"></el-option>
                                                    <el-option key="5" label="5 Mes" :value="5"  @change="reseteo"></el-option>
                                                    <el-option key="6" label="6 Mes" :value="6"  @change="reseteo"></el-option>
                                                    <el-option key="7" label="7 Mes" :value="7"  @change="reseteo"></el-option>
                                                    <el-option key="8" label="8 Mes" :value="8"  @change="reseteo"></el-option>
                                                    <el-option key="9" label="9 Mes" :value="9"  @change="reseteo"></el-option>
                                                    <el-option key="10" label="10 Mes" :value="10" @change="reseteo"></el-option>
                                                    <el-option key="11" label="11 Mes" :value="11" @change="reseteo"></el-option>
                                                    <el-option key="12" label="12 Mes" :value="12" @change="reseteo"></el-option>

                                                </el-select>
                                            </el-form-item>
                                        </el-row>


                                        <el-row  v-if="form.tipoinmueble!='Local/Oficina'">
                                            <label><strong class="titulo-filter-vuejs">Datos del edifico</strong></label>
                                            <el-form-item>
                                                <!--<el-checkbox-group v-model="form.qualities">-->
                                                    <el-checkbox-group v-model="form.building">
                                                        <el-checkbox label="Jardín"  @change="reseteo"></el-checkbox>
                                                        <el-checkbox label="Piscina"  @change="reseteo"></el-checkbox>
                                                        <el-checkbox label="Gym"  @change="reseteo"></el-checkbox>
                                                        <el-checkbox label="Sauna"  @change="reseteo"></el-checkbox>
                                                        <el-checkbox label="Zona deportiva"  @change="reseteo"></el-checkbox>
                                                        <el-checkbox label="Zona infantil"  @change="reseteo"></el-checkbox>
                                                        <div class="check-filter-vuejs">
                                                            <el-checkbox label="Garaje incluido en el precio"  @change="reseteo"></el-checkbox>
                                                            <el-checkbox label="Opción de garaje en el mismo edificio"  @change="reseteo">
                                                            </el-checkbox>
                                                            <el-checkbox label="Trastero incluido"  @change="reseteo"></el-checkbox>
                                                        </div>

                                                        <div class="check-filter-vuejs">
                                                            <el-checkbox label="Opción de trastero en el mismo edificio"  @change="reseteo">
                                                            </el-checkbox>
                                                        </div>



                                                    </el-checkbox-group>


                                                <!--</el-checkbox-group>-->
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
                                       {{--   <el-button type="primary" @click="submit">Filtrar</el-button>  --}}
                                        <el-button id="btnMasfiltros" type="info" @click="showFilters">@{{titleFilters}}</el-button>
                                    </el-form-item>
                                </el-form>
                            </div>
                            <div id="no_data" v-if="!dataFilter.length" style="padding-left: 15px;">No hay inmuebles disponibles para este filtro.Intente otro filtro.</div>
                        </div>
                    </div>
                    <div id="card_container" class="card-grid">
                    <!--<div :id="`box_${data.id}`" class="feature-item inmueble bg-white" v-for="data in dataFilter" v-if="data.estado_inmueble === 'Disponible' || data.estado_inmueble === 'Reservado' || data.estado_inmueble === 'Alquilado' || data.estado_inmueble === 'Vendido'">-->
					<div :id="`box_${data.id}`" class="feature-item inmueble bg-white" v-for="data in dataFilter" v-if="data.estado_inmueble === 'Disponible' || data.estado_inmueble === 'Reservado' || data.estado_inmueble === 'Alquilado' || data.estado_inmueble === 'Vendido'">
						<a :href="`/anuncio/${ data.id }`"  target="_blank">
                            <div class="feature-pic set-bg"
                                :style="{ backgroundImage: `url(/storage/${data.path_image_primary}_444x250.jpg)`.replace('.jpeg','')}">
                                <div class="sale-notic" v-if="data.is_sale == '1'">En Venta</div>
                                <div class="rent-notic" v-if="data.is_sale == '0'">En Alquiler </div>
                                <div class="play-btn" v-if="data.video_primary">
                                    <img width="75" height="75" src="/img/play_btn.png" @click="showVideo(data.id,data.video_primary,$event)" title="Ver video" style="z-index:1500" />
                                </div>
								<p id="text">
									<div class="rotar1" v-if="data.estado_inmueble == 'Vendido'">VENDIDO</div>
									<div class="rotar1" v-if="data.estado_inmueble == 'Alquilado'">ALQUILADO</div>
									<div class="rotar1" v-if="data.estado_inmueble == 'Reservado'">RESERVADO</div>
								</p>
							</div>
							
                        </a>
                        <div class="feature-text border-0">
                            <div class="text-center feature-title">
                                <h5><a :href="`/anuncio/${ data.id }`" target="_blank">Referencia @{{data.id}}</a></h5>
                                <p><i class="fa fa-map-marker"></i> @{{data.road}}</p>
								<p v-if="data.id==85">Precio a consultar</p>
								<p v-else-if="data.tipo_inmueble=='Habitaciones' && data.bedrooms>1">Desde € @{{ String(parseInt(data.propiedad_precio)).replace(/(.)(?=(\d{3})+$)/g,'$1.') }}</p>	
								<p v-else>€ @{{ String(parseInt(data.propiedad_precio)).replace(/(.)(?=(\d{3})+$)/g,'$1.') }}</p>								
								<p v-if="data.tipo_inmueble=='Habitaciones'">Habitaciones en alquiler</p>	
								<p v-if="data.tipo_inmueble=='Local/Oficina'">Local/Oficina</p>
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
                                        <!--<p><i class="fa fa-bed"></i> Dormitorios: @{{data.bedrooms}}</p>-->
                        <p v-if="data.bedrooms && data.tipo_inmueble!='Local/Oficina'" ><i class="fas fa-bed"></i> Dormitorios: @{{data.bedrooms}} </p>
						<p v-if="data.bedrooms && data.tipo_inmueble=='Local/Oficina'" ><i class="fas fa-bed"></i> Estancias: @{{data.bedrooms}} </p>										
                                        <p  v-if="data.bathrooms"><i class="fa fa-bath"></i> Baños: @{{data.bathrooms}}</p>
										<p  v-if="data.tipo_inmueble=='Local/Oficina' && !data.bathrooms && data.aseos"><i class="fa fa-bath"></i> Aesos: @{{data.aseos}}</p>
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
                        <input id="pac-input" name="pac-input" ref="search" class="controls" type="search" placeholder="¿Dónde quieres vivir?">
                    </div>
                </div>
                <div id="map"></div>
                <input type="hidden" id="city_lat" value="{{$city->lat}}" />
                <input type="hidden" id="city_lng" value="{{$city->lng}}" />
                <input type="hidden" id="city_zoom" value="{{$city->zoom}}" />
            </div>
        </div>
        
        <div id="modalVideo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mInformeLabel" aria-hidden="true">
            <div id="modalVideoDialog" class="modal-dialog modal-dialog-centered modal-image" role="application">
                <div class="modal-content animated fadeIn">
                    <div id="modalVideoBody" class="modal-body text-center">
                        
                    </div>
                </div>
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

       /* var max_price = @json($max);
        var price =  max_price!=null ? parseInt(max_price).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") : "";
		*/

        

        ELEMENT.locale(ELEMENT.lang.es);

        const filter = new Vue({
            el: '#filter',
            data() {
                return {
                    user: null,
                    dataFilter: [],
                    filters: false,
                    control: @json($category),
                    city:@json($cityId),
                    form: {
						//TODO
						tipoinmueble:'Pisos y casas',
                        furnished_types: [],
                        estadoInmueble: [],
                        numerosBanos: [],
                        calderaAgua: [],
                        piesas: [],
                        orientacion: [],
                        banosIncorporados: [],
                        banosIncorporadosHab: [],
                        price: '',
						propiedad_price: '',
			//price: price,
                        qualities: [],
						room: [],
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
				console.log("CREATED");
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
                
                $(document).on('click', '[data-dismiss="modal"]', function(){
                    console.log("CLosed");
                    $("#modalVideoBody").html("");
                });
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
    setFocus()
    {
      // Note, you need to add a ref="search" attribute to your input.
      //this.$refs.search.focus();
	  //this.pac-input.focus();
	  this.propiedad_price.focus();
	  //alert('H');
    },				
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
					this.submiteo();

                },
                onBlurNumber(e) {
                    //this.form.price = '€ ' + this.thousandSeprator(this.form.price);
                    if (this.form.price.indexOf("\u20AC") == -1) {
                        this.form.price = this.thousandSeprator(this.form.price) + " \u20AC";
                    }
					this.submiteo();
                },
                onBlurNumbere(e) {
                    //this.form.propiedad_price = '€ ' + this.thousandSeprator(this.form.propiedad_price);
                    if (this.form.propiedad_price.indexOf("\u20AC") == -1) {
                        this.form.propiedad_price = this.thousandSeprator(this.form.propiedad_price) + " \u20AC";
                    }
					this.submiteo();
                },
				reseteo(e) {
					this.submiteo();
					//TODO IMPORTANTE VER EL TEMA DE LA DURACIÓN DEL CONTRATO
					//document.getElementById("formulario").reset();
					//TODO VER EL COMBO PORQUE NO ESTABA YENDO BIEN!!!
					//document.getElementById("formulario").reset();
					//MUY IMPORTANTE COMO DETECTAR UNA CLASE!!!
					//alert(document.getElementById("piso_vivienda"));
					/*var item = document.getElementById("piso_vivienda");
					if (item){
						//alert(item.classList.contains( 'is-checked' ));
						var hasClase2 = item.classList.contains( 'is-checked' );				
						if (hasClase2){
							//alert('piso');
							$('#piso_vivienda').trigger('click');
							$("#piso_vivienda").removeClass ( 'is-checked' );
							$("#piso_vivienda > span").removeClass ( 'is-checked' );
							//$('input:checkbox').removeAttr('checked');
						}
					}
					//alert(document.getElementById("estudio_vivienda"));
					var item1 = document.getElementById("estudio_vivienda");
					if (item1){
						//alert(item1.classList.contains( 'is-checked' ));
						var hasClase21 = item1.classList.contains( 'is-checked' );		
						if (hasClase21){
							///alert('estudio');
							$('#estudio_vivienda').trigger('click');
							$("#estudio_vivienda").removeClass ( 'is-checked' );
							$("#estudio_vivienda > span").removeClass ( 'is-checked' );
							//$('input:checkbox').removeAttr('checked');
						}			
					}
					
					var item1 = document.getElementById("loft_vivienda");
					if (item1){
						//alert(item1.classList.contains( 'is-checked' ));
						var hasClase21 = item1.classList.contains( 'is-checked' );		
						if (hasClase21){
							///alert('estudio');
							$('#loft_vivienda').trigger('click');
							$("#loft_vivienda").removeClass ( 'is-checked' );
							$("#loft_vivienda > span").removeClass ( 'is-checked' );
							//$('input:checkbox').removeAttr('checked');
						}			
					}

					var item1 = document.getElementById("apartamento_vivienda");
					if (item1){
						//alert(item1.classList.contains( 'is-checked' ));
						var hasClase21 = item1.classList.contains( 'is-checked' );		
						if (hasClase21){
							///alert('estudio');
							$('#apartamento_vivienda').trigger('click');
							$("#apartamento_vivienda").removeClass ( 'is-checked' );
							$("#apartamento_vivienda > span").removeClass ( 'is-checked' );
							//$('input:checkbox').removeAttr('checked');
						}			
					}					
					
					var item1 = document.getElementById("chalet_vivienda");
					if (item1){
						//alert(item1.classList.contains( 'is-checked' ));
						var hasClase21 = item1.classList.contains( 'is-checked' );		
						if (hasClase21){
							///alert('estudio');
							$('#chalet_vivienda').trigger('click');
							$("#chalet_vivienda").removeClass ( 'is-checked' );
							$("#chalet_vivienda > span").removeClass ( 'is-checked' );
							//$('input:checkbox').removeAttr('checked');
						}			
					}

					var item1 = document.getElementById("atico_vivienda");
					if (item1){
						//alert(item1.classList.contains( 'is-checked' ));
						var hasClase21 = item1.classList.contains( 'is-checked' );		
						if (hasClase21){
							///alert('estudio');
							$('#atico_vivienda').trigger('click');
							$("#atico_vivienda").removeClass ( 'is-checked' );
							$("#atico_vivienda > span").removeClass ( 'is-checked' );
							//$('input:checkbox').removeAttr('checked');
						}			
					}					
					
					var item1 = document.getElementById("bajo_vivienda");
					if (item1){
						//alert(item1.classList.contains( 'is-checked' ));
						var hasClase21 = item1.classList.contains( 'is-checked' );		
						if (hasClase21){
							///alert('estudio');
							$('#bajo_vivienda').trigger('click');
							$("#bajo_vivienda").removeClass ( 'is-checked' );
							$("#bajo_vivienda > span").removeClass ( 'is-checked' );
							//$('input:checkbox').removeAttr('checked');
						}			
					}*/
					
				},
				submiteo() {
					//this.setFocus();
                    //console.log(this.form.date);
                    //Add 65 days more
					if (this.form.price.trim()=='€'){
						this.form.price='';
						//return;
					}
					if (this.form.propiedad_price.trim()=='€'){
						this.form.propiedad_price='';
						//return;
					}					
                    if (this.form.date != "") {
                         this.form.date.setDate(this.form.date.getDate()+65);
                    }
                    
                    console.log(this.form);
                    
                    axios.post('{{ url("iamovingpro/find") }}/'+this.control+'/' + this.city, this.form).then(response => {
                        console.log(response);
                        this.dataFilter = response.data;
                        reload_makers(response.data);
                    }).catch(error => {
                    }).then(() => {
                        
					//$('#ndormitorios').trigger('click');
					//$('#cinco').trigger('click');
                    
                        
                        
                    });
                    
                    
					$('#ndormitorios').trigger('click');
					//$('#cinco').trigger('click');
					//$('#btnMasfiltros').trigger('click');
					//this.form.price.focus();
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
				//holas(e) {
			//		alert('hola');
				//},
                onKeyDown(evt){
                    console.log(evt.keyCode);
                    if (evt.keyCode == 222 || evt.keyCode == 190 ||  evt.keyCode == 49 || evt.keyCode == 55 || evt.keyCode == 190 ||  evt.keyCode == 188){
                        evt.preventDefault()
                        return
                    }
                },
                showVideo(id, video, event){
                    event.preventDefault();
                    //var widthStyle = 'max-width: 530px;';
                    if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
                        widthStyle = 'max-width: 350px;';
                    }
                    //$('#modalVideoDialog').attr('style',widthStyle);
                    
                    var html = "";
                    html +='<div class="row"><div class="col-12"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div></div><div class="row"><div class="col-12 text-center d-md-block d-sm-block"><h5>Referencia ' + id + '</h5>';
                    if (video.length<100)
					{
						html +='<div id="div_frame" class="text-center" style="height:400px">';
						html +='<iframe ';
						html +='src="https://www.youtube.com/embed/' + video + '?modestbranding=1&rel=0" ';
						html +='class="video-fluid z-depth-1" ';
						html +='width="100%" ';
						html +='height="100%" ';
						html +='mozallowfullscreen ';
						html +='mozallowfullscreen ';
						html +='webkitallowfullscreen ';
						html +='allowfullscreen></iframe>';
						html +='</div></div></div>';
					}
					else
					{
						html +='<div id="div_frame" class="text-center" style="height:592px;overflow-y:hidden;">';
						html +='' + video + '';
						html +='</div></div></div>';
					}
                    $("#modalVideoBody").html(html);
                    $("#modalVideo").modal({
                        backdrop:'static',
                        keyboard: false
                    });           
                    
                }
            }
        });

      
    </script>
</body>

</html>
