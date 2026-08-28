
<!DOCTYPE html>
<html lang="en">
<head>
    <title>IAMOVING - Busca tu casa</title>
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
	<!--CAMBIO-->
	<link href="{{ asset('img/favicon.ico') }}" rel="shortcut icon" />
    <!--<link href="{{ asset('img/favicon.ico') }}" rel="shortcut icon" />-->
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
    <link rel="stylesheet" type="text/css" href="{{asset('css/buscador_buscar.css')}}">
    <!-- import CSS -->
    <link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">
    <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js" integrity="sha384-0pzryjIRos8mFBWMzSSZApWtPl/5++eIfzYmTgBBmXYdhvxPc+XcFEk+zJwDgWbP" crossorigin="anonymous"></script>
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    <style>
  .el-button {
    text-align: left !important;
    padding-left: 10px !important;
}
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

    .box-properties{
        margin-top:20px;
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
    }
    
    .properties{
        width:60%;
        flex-direction:row;
    }
    
    .map-pro{
        width:40%;
        height:100vh;
    }
    
    .float-button{
        display: none;
    }
    
    .mobile-btn-save{
        display:none;
    }
    
    #property_floating_box{
            display:none;
    }
    
    @media only screen and (max-width:480px) {
        .pac-input{
            width:140px;
        }
        
        .properties{
            width:100%;
            
        }
        
        /*.properties{
            display:none;
        }*/
        
        .map-pro{
            /*height:100vh !important;
            
            margin-bottom:20px;
            margin-top:10px;*/
            width:95%;
            display: none;
        }

        #property_floating_box{
            display:flex;
        }

        .filter-bar{
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
        }
        
        .float-button{
            display:block;
            position:fixed;
            right:5px;
            bottom:5px;
            background-color:#fff;
            padding: 10px;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            text-align:center;
            box-shadow: 5px 5px 8px #888888;
            z-index:1001;
        }
        
        .mobile-btn-save{
            display:block;
            position:fixed;
            left:35%;
            bottom:5px;
            z-index:1001;
        }
        .el-popover{
            left:0px !important;   
        }
        
    }
    
    @media only screen and (min-width: 480px) and (max-width:768px) {
        .box-properties{
            display: flex;
            /*flex-direction: column-reverse;*/
        }
        
        .pac-input{
            width:250px;
        }
        
        .properties{
            width:100%;
        }
        
        .map-pro{
            /*width:100%;
            height:300px;
            margin-bottom:20px;
            margin-top:10px;*/
            display:none;
        }

        .filter-bar{
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
        }
        
    }
    
    #property_img{
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .filter-bar{
        display: flex;
        flex-direction: row;
    }

    .default-with-border{
        border: 1px solid #DCDFE6;
        width:100%;
        background-color:#fff;
    }

    .spacing{
        margin-left:10px;
        margin-right:10px;
        width:25%;
    }

    .el-popover{
        max-height:400px !important;
        overflow-y:auto !important;
    }

    #divFilter{
      margin: 0px;
      display: none;
      padding: 0px;
      position: absolute;
      right: 0px;
      top: 0px;
      width: 100%;
      height: 100%;
      background-color: rgb(255, 255, 255);
      z-index: 30001;
      opacity: 0.8;
    }

    #loading {
      position: absolute;
      color: #000;
      top: 50%;
      left: 45%;
    }
    
    .div-col{
        display:flex;
        flex-direction:column;
        
    }
    
    .link-delete{
        color:#3490dc;
    }
    .link-delete:hover{
        cursor:pointer;
    }
        /* Anular la flecha personalizada en los selects del modal móvil */
#mobile-filters-content select.form-control {
    background-image: none !important;
    padding-right: 12px !important;
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
<!-- Después del div id="app" y antes del div id="divFilter" -->
<!-- Contador de resultados y botones móvil - SOLO VISIBLE EN MÓVIL -->
<div id="mobile-controls" class="d-block d-md-none" style="background: #f8f9fa; border-bottom: 1px solid #dee2e6;">
    <!-- ============================================ -->
    <!-- 1. CONTADOR DE RESULTADOS Y BOTONES MÓVIL   -->
    <!-- ============================================ -->
    <div id="mobile-controls" class="d-block d-md-none" style="background: #f8f9fa; border-bottom: 1px solid #dee2e6;">
<!-- Contador de resultados -->
<div id="mobile-results" style="padding: 12px 15px 8px;">
<!--    <div class="results-text" style="font-size: 15px; font-weight: 500; color: #1a1a1a;">
        <span id="result-count">{{ count($data) }}</span> 
        <span id="result-type">casas y pisos</span> 
        <span id="result-operation">en venta</span> 
        en <span id="result-city">{{ $city->name ?? 'Madrid' }}</span>
    </div>-->
<div id="results-count-container" style="font-family: 'Source Sans Pro', sans-serif; font-size: 25px; font-weight: 990; color: #2d2e35;{{ count($data) == 0 ? ' display: none;' : '' }}">
    <span id="result-count">{{ count($data) }}</span> 
    <span id="result-type">casas y pisos</span> 
    <span id="result-operation">en venta</span> 
    en <span id="result-city">{{ $city->name ?? 'Madrid' }}</span>
</div>    
<div id="no-results-message" style="{{ count($data) == 0 ? 'display: block;' : 'display: none;' }} font-family: 'Source Sans Pro', sans-serif; font-size: 25px; font-weight: 990; color: #2d2e35; text-align: center; padding: 20px 15px; line-height: 1.4;">
    No se han encontrado resultados con el filtro que has seleccionado
</div>
</div>
        
        <!-- Botones de acción -->
        <div id="mobile-actions"  class="d-block d-md-none"  style="display: flex; padding: 8px 15px 12px; gap: 8px;">
            <button id="btn-filters-mobile" class="btn btn-outline-secondary" style="flex: 1; border-radius: 20px; padding: 8px 12px; font-size: 14px; border-color: #d1d5db; color: #374151; background: #fff;">
                <i class="fas fa-sliders-h" style="margin-right: 5px;"></i> Filtrar
            </button>
            <button id="btn-map-mobile" class="btn btn-outline-secondary" style="flex: 1; border-radius: 20px; padding: 8px 12px; font-size: 14px; border-color: #d1d5db; color: #374151; background: #fff;">
                <i class="fas fa-map" style="margin-right: 5px;"></i> Mapa
            </button>
        </div>
    </div>
    
    <!-- ============================================ -->
    <!-- 2. MODAL DE FILTROS MÓVIL                   -->
    <!-- ============================================ -->
    <div class="modal fade" id="mobileFiltersModal" tabindex="-1" role="dialog" aria-labelledby="mobileFiltersModalLabel" style="z-index: 9999;">
        <div class="modal-dialog modal-dialog-scrollable" role="document" style="margin: 0; max-width: 100%; height: 100%;">
            <div class="modal-content" style="border-radius: 0; height: 100%; background: #f8f9fa;">
                <!-- Cabecera del modal -->
                <div class="modal-header" style="border-bottom: 1px solid #e5e7eb; padding: 15px 20px; background: #fff;">
                    <h5 class="modal-title" style="font-weight: 600; color: #1a1a1a;">Filtros</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 24px;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <!-- Cuerpo del modal -->
                <div class="modal-body" style="padding: 0; overflow-y: auto; background: #fff;">
                    <div id="mobile-filters-content" style="padding: 20px;">
                        <!-- Los filtros se generarán dinámicamente con Vue -->
                    </div>
                </div>
                
                <!-- Footer del modal -->
                <div class="modal-footer" style="border-top: 1px solid #e5e7eb; padding: 15px 20px; background: #fff; display: block;">
<button id="mobile-apply-filters" class="btn btn-primary btn-block" style="border-radius: 25px; padding: 14px; font-weight: 600; font-size: 16px; background: #2d2e35;color: #eadd03; border: none;">
    Ver <span id="mobile-result-count">{{ count($data) }}</span> viviendas
</button>
                    <button id="mobile-clear-filters" class="btn btn-link btn-block" style="color: #eadd03; text-decoration: none; padding: 10px; font-size: 14px; border: none;">
                        Borrar filtros
                    </button>
                </div>
            </div>
        </div>
    </div>
    </div><!-- ✅ CIERRE del wrapper #mobile-controls (línea 388) que faltaba -->

        <div id="divFilter">
            <p id="loading">Filtrando...</p>
        </div>
        <div id="filter" style="">

<!-- ✅ Contador / Sin resultados SOLO ESCRITORIO, encima de los filtros -->
            <div class="d-none d-md-block" style="margin: 0 0 15px;">
                <div id="result-header-desktop"
                     style="font-family: 'Source Sans Pro', sans-serif; font-size: 25px; font-weight: 990; color: #2d2e35; display: {{ count($data) == 0 ? 'none' : 'block' }};">
                    <span id="result-count-desktop" class="ml-3">{{ count($data) }}</span>
                    <span id="result-type-desktop">casas y pisos</span>
                    <span id="result-operation-desktop">en venta</span>
                    en <span id="result-city-desktop">{{ $city->name ?? 'Madrid' }}</span>
                </div>
                <div id="no-results-message-desktop"
                     style="font-family: 'Source Sans Pro', sans-serif; font-size: 25px; font-weight: 990; color: #2d2e35; line-height: 1.4; display: {{ count($data) == 0 ? 'block' : 'none' }};" class="ml-3">
                    No se han encontrado resultados con el filtro que has seleccionado
                </div>
            </div>
            

            <!--<el-form :model="form" label-position="top" id="formulario" label-width="120px" @submit.prevent="submit"> -->
                <!-- Añadir clase d-none d-md-block para ocultar en móvil -->
            <el-form :model="form" label-position="top" id="formulario" label-width="120px" @submit.prevent="submit" class="d-none d-md-block">                
                <div class="filter-bar">
                    <div class="spacing">
                        <el-row>
                            <el-popover
                                placement="bottom-start"
                                width="100%"
                                trigger="manual"
                                title="Tipo de Imueble"
                                v-model="visibleTipoInmueble"
                                >
                                <template>
                                    
                                        <div style="position:absolute; top:5px; right:15px;">
                                            <button type="button" class="close" aria-label="Close" @click="visibleTipoInmueble = !visibleTipoInmueble">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        
                                            <el-radio v-model="form.tipoinmueble" label="Pisos y casas" @change="reseteo">Pisos y casas</el-radio>
                                            <el-radio v-model="form.tipoinmueble" label="Habitaciones" @change="reseteo">Habitaciones</el-radio>
                                            <el-radio v-model="form.tipoinmueble" label="Local/Oficina" @change="reseteo">Local/Oficina</el-radio>
                                            <!--<div style="text-align:center;"><el-button type="primary" v-if="dataCounter.length > 0" @click="showResults">Ver @{{dataCounter.length}} resultados</el-button></div>-->
                                            <div style="text-align:center;"><el-button type="primary" @click="visibleTipoInmueble = false">Ver @{{dataFilter.length}} resultados</el-button></div>
                                        
                                    </div>
                                </template>
<el-button slot="reference" round @click="visibleTipoInmueble = !visibleTipoInmueble" style="width:100%; padding-left: 15px; text-align: left">@{{form.tipoinmueble}}</el-button>

                            </el-popover>
                        </el-row>
                    </div>
                    <div class="spacing">
                        <el-row>
                            <el-popover
                                placement="bottom-start"
                                width="100%"
                                trigger="manual"
                                title="Precio"
                                v-model="visiblePrice"
                            >
                                <template>
                                    <div style="position:absolute; top:5px; right:15px;">
                                        <button type="button" class="close" aria-label="Close" @click="visiblePrice = !visiblePrice">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    
                                    <div style="flex:1; flex-direction:column;">
                                        <div style="flex:1; flex-direction:row;">
                                            <div style="margin-right:3px;">
                                                <label> <strong class="titulo-filter-vuejs">Mínimo</strong></label>
                                                <el-form-item><el-input v-model="form.propiedad_price" placeholder="€" @blur="onBlurNumbere"></el-input></el-form-item>
                                            </div>
                                            
                                            <div style="margin-right:3px;">
                                                <label> <strong class="titulo-filter-vuejs">Máximo</strong></label>
                                                <el-form-item><el-input v-model="form.price" placeholder="€" @blur="onBlurNumber"></el-input></el-form-item>
                                            </div>
                                        </div>
                                    
                                        <div>
                                            
                                            <!--<div style="text-align:center;"><el-button type="primary" v-if="dataCounter.length > 0" @click="showResults">Ver @{{dataCounter.length}} resultados</el-button></div>-->
                                            <div style="text-align:center;"><el-button type="primary" @click="visiblePrice = false">Ver @{{dataFilter.length}} resultados</el-button></div>
                                        </div>
                                    </div>
                                </template>    
                                <el-button slot="reference" round @click="visiblePrice = !visiblePrice"  style="width:100%">@{{priceText}}</el-button>
                            </el-popover>
                        </el-row>
                        
                    </div>
                    <div class="spacing" v-if="form.tipoinmueble!='Habitaciones'">
                        <el-row>
                            <el-popover
                                placement="bottom-start"
                                width="100%"
                                trigger="manual"
                                title="Tamaño"
                                v-model="visibleSize"
                            >
                                <template>
                                    <div style="position:absolute; top:5px; right:15px;">
                                        <button type="button" class="close" aria-label="Close" @click="visibleSize = !visibleSize">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    
                                    <div style="flex:1; flex-direction:column;">
                                        <div style="flex:1; flex-direction:row;">
                                            <div style="margin-right:3px;">
                                                <label> <strong class="titulo-filter-vuejs">Mínimo</strong></label>
                                                <el-form-item><el-input v-model="form.propiedad_tamano" placeholder="m&sup2;" @blur="reseteo"></el-input></el-form-item>
                                            </div>
                                            <div style="margin-right:3px;">
                                                <label> <strong class="titulo-filter-vuejs">Máximo</strong></label>
                                                <el-form-item><el-input v-model="form.tamano" placeholder="m&sup2;" @blur="reseteo"></el-input></el-form-item>
                                            </div>

                                        </div>
                                    </div>
                                    <div>
                                        <div style="text-align:center;"><el-button type="primary" @click="visibleSize = false">Ver @{{dataFilter.length}} resultados</el-button></div>
                                    </div>
                                </template>    
                                <el-button slot="reference" round @click="visibleSize = !visibleSize"  style="width:100%">@{{sizeText}}</el-button>
                            </el-popover>
                        </el-row>
                    </div>
                    <div class="spacing" v-if="form.tipoinmueble!='Local/Oficina'">
                        <el-row>
                            <el-popover
                                placement="bottom-start"
                                width="100%"
                                trigger="manual"
                                title="Dormitorios"
                                v-model="visibleBeds"
                            >
                                <template>
                                    <div style="position:absolute; top:5px; right:15px;">
                                        <button type="button" class="close" aria-label="Close" @click="visibleBeds = !visibleBeds">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <el-form-item>
                                        <el-checkbox-group v-model="form.piesas">
                                            <el-checkbox label="1" @change="reseteo"></el-checkbox>
                                            <el-checkbox label="2" @change="reseteo"></el-checkbox>
                                            <el-checkbox label="3" @change="reseteo"></el-checkbox>
                                            <el-checkbox label="4" @change="reseteo"></el-checkbox>
                                            <el-checkbox label="5 ó más" @change="reseteo"></el-checkbox>
                                        </el-checkbox-group>
                                    </el-form-item>
                                    <div style="text-align:center;"><el-button type="primary" @click="visibleBeds = false">Ver @{{dataFilter.length}} resultados</el-button></div>
                                </template>
<!-- Para el botón de Dormitorios -->
<el-button slot="reference" round @click="visibleBeds = !visibleBeds" style="width:100%; padding-left: 15px; text-align: left">@{{bedroomsText}}</el-button>
                                    
                            </el-popover>
                        </el-row>
                    </div>
                    <div class="spacing" v-if="form.tipoinmueble!='Local/Oficina'">
                        <el-row>
                            <el-popover
                                placement="bottom-start"
                                width="100%"
                                trigger="manual"
                                title="Baños"
                                v-model="visibleBads"
                            >
                                <template>
                                    <div style="position:absolute; top:5px; right:15px;">
                                        <button type="button" class="close" aria-label="Close" @click="visibleBads = !visibleBads">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <el-form-item>
                                        <el-checkbox-group v-model="form.numerosBanos">
                                            <el-checkbox label="1" @change="reseteo"></el-checkbox>
                                            <el-checkbox label="2" @change="reseteo"></el-checkbox>
                                            <el-checkbox label="3" @change="reseteo"></el-checkbox>
                                            <el-checkbox label="4" @change="reseteo"></el-checkbox>
                                            <el-checkbox label="5 ó más" @change="reseteo"></el-checkbox>
                                        </el-checkbox-group>
                                    </el-form-item>
                                    <div style="text-align:center;"><el-button type="primary" @click="visibleBads = false">Ver @{{dataFilter.length}} resultados</el-button></div>
                                </template>
<el-button slot="reference" round @click="visibleBads = !visibleBads"  style="width:100%">@{{badroomsText}}</el-button>
                                
                                
                            </el-popover>
                        </el-row>
                    </div>
                    <div class="spacing">
                        <el-row>
                            <el-popover
                                placement="bottom-start"
                                width="100%"
                                trigger="manual"
                                v-model="visibleFilters"
                            >
                                <template>
                                    <!-- ✅ Cabecera fija: Ver XX resultados + Eliminar filtros a la izquierda, cerrar a la derecha -->
                                    <div style="display:flex; align-items:center; justify-content:space-between; gap:10px; padding:8px 12px; border-bottom:1px solid #ebeef5; background:#fff; position:sticky; top:0; z-index:5;">
                                        <div style="display:flex; align-items:center; gap:12px;">
                                            <el-button type="primary" size="small" @click="visibleFilters = false">Ver @{{dataFilter.length}} resultados</el-button>
                                            <span class="link-delete" @click="clearLayerFilters" style="cursor:pointer; white-space:nowrap;">Eliminar filtros</span>
                                        </div>
                                        <button type="button" class="close" aria-label="Close" @click="visibleFilters = !visibleFilters" style="margin:0; line-height:1;">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>                                  
                                    <el-row style="padding:10px;max-height:370px;overflow-y: auto;overflow-x: hidden;">
                                        <el-row v-if="control==0">
                                            <el-col>
                                                <el-form-item  v-if="form.tipoinmueble!='Local/Oficina'">
                                                    <strong class="titulo-filter-vuejs">Tipo de vivienda</strong>
                                                    <el-checkbox-group class="grop-check-vuejs" v-model="form.furnished_types">
                                                        <el-checkbox label="Estudio" id="estudio_vivienda" v-if="form.tipoinmueble=='Pisos y casas'" @change="reseteo"></el-checkbox>
                                                        <el-checkbox label="Loft" id="loft_vivienda" v-if="form.tipoinmueble=='Pisos y casas'" @change="reseteo"></el-checkbox>
                                                        <el-checkbox label="Apartamento" id="apartamento_vivienda" v-if="form.tipoinmueble=='Pisos y casas'" @change="reseteo"></el-checkbox>
                                                        <el-checkbox label="Piso"   id="piso_vivienda" @change="reseteo"></el-checkbox>
                                                        <el-checkbox label="Chalet" id="chalet_vivienda"  @change="reseteo"></el-checkbox>
                                                        <el-checkbox label="Casa" id="casa_vivienda" v-if="form.tipoinmueble=='Pisos y casas'" @change="reseteo"></el-checkbox>
                                                        <el-checkbox label="Atico"  id="atico_vivienda"  @change="reseteo"></el-checkbox>
                                                        <el-checkbox label="Bajo"   id="bajo_vivienda" @change="reseteo"></el-checkbox>
                                                        <el-checkbox label="Dúplex" id="duplex_vivienda" @change="reseteo"></el-checkbox>
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
                                            </el-col>
                                        </el-row>
                                        <el-row v-else>
                                            
                                                <el-col>
                                                    <el-form-item  v-if="form.tipoinmueble!='Local/Oficina'">
                                                        <strong class="titulo-filter-vuejs">Tipo de vivienda</strong>
                                                        <el-checkbox-group class="grop-check-vuejs" v-model="form.furnished_types">
                                                            <el-checkbox label="Estudio" id="estudio_vivienda" v-if="form.tipoinmueble=='Pisos y casas'" @change="reseteo"></el-checkbox>
                                                            <el-checkbox label="Loft" id="loft_vivienda" v-if="form.tipoinmueble=='Pisos y casas'" @change="reseteo"></el-checkbox>
                                                            <el-checkbox label="Apartamento" id="apartamento_vivienda" v-if="form.tipoinmueble=='Pisos y casas'" @change="reseteo"></el-checkbox>
                                                            <el-checkbox label="Piso"   id="piso_vivienda" @change="reseteo"></el-checkbox>
                                                            <el-checkbox label="Chalet" id="chalet_vivienda"  @change="reseteo"></el-checkbox>
                                                            <el-checkbox label="Casa" id="casa_vivienda" v-if="form.tipoinmueble=='Pisos y casas'" @change="reseteo"></el-checkbox>
                                                            <el-checkbox label="Atico"  id="atico_vivienda"  @change="reseteo"></el-checkbox>
                                                            <el-checkbox label="Bajo"   id="bajo_vivienda" @change="reseteo"></el-checkbox>
                                                            <el-checkbox label="Dúplex" id="duplex_vivienda" @change="reseteo"></el-checkbox>

                                                        </el-checkbox-group>
                                                    </el-form-item>
                                                </el-col>
                                            
                                        </el-row>
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
                                        <h4>¡Muy importante para mi!</h4>
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
                    <el-checkbox label="Exterior"  @change="reseteo"></el-checkbox>
            <el-checkbox label="Interior"  @change="reseteo"></el-checkbox>
            <el-checkbox label="Terraza"  @change="reseteo"></el-checkbox>
            <el-checkbox label="Balcón"  @change="reseteo"></el-checkbox>
            <el-checkbox label="Patio"  @change="reseteo"></el-checkbox>
            <el-checkbox label="Aire acondicionado"  @change="reseteo"></el-checkbox>
        <!--<el-checkbox label="Rampas de minusválidos en el portal"  @change="reseteo"></el-checkbox>
        <el-checkbox label="Ascensor que entra un carrito de bebé"  @change="reseteo">
        </el-checkbox>-->
        <!--<div class="check-filter-vuejs">
            <el-checkbox label="Exterior"  @change="reseteo"></el-checkbox>
            <el-checkbox label="Interior"  @change="reseteo"></el-checkbox>
            <el-checkbox label="Terraza"  @change="reseteo"></el-checkbox>
            <el-checkbox label="Balcón"  @change="reseteo"></el-checkbox>
            <el-checkbox label="Patio"  @change="reseteo"></el-checkbox>
        </div>-->
        <!--<div class="check-filter-vuejs">
            <el-checkbox label="Aire acondicionado"  @change="reseteo"></el-checkbox>
        </div>-->
    </el-checkbox-group>
                                            </el-form-item>											
                                        </el-row>
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
        <el-checkbox-group v-model="form.building">
            <el-checkbox label="Jardín"  @change="reseteo"></el-checkbox>
            <el-checkbox label="Piscina"  @change="reseteo"></el-checkbox>
            <el-checkbox label="Gym"  @change="reseteo"></el-checkbox>
            <el-checkbox label="Sauna"  @change="reseteo"></el-checkbox>
            <el-checkbox label="Zona deportiva"  @change="reseteo"></el-checkbox>
            <el-checkbox label="Zona infantil"  @change="reseteo"></el-checkbox>
            <div class="check-filter-vuejs">
                <el-checkbox label="Garaje incluido en el precio"  @change="reseteo"></el-checkbox>
                <el-checkbox label="Trastero incluido"  @change="reseteo"></el-checkbox>
            </div>
        </el-checkbox-group>
    </el-form-item>
</el-row>
                                </template>
<el-button slot="reference" round @click="visibleFilters = !visibleFilters"  style="width:100%">Filtros <span class="badge badge-pill badge-primary">@{{counterFilters}}</span></el-button>
                            </el-popover>
                        </el-row>
                    </div>
                </div>
            </el-form>           
            

            <div class="box-properties">

                <div class="properties">

                   <!-- <div style="height: 800px; overflow-y: scroll;">-->

<div id="card_scroll" style="height: 800px; overflow-y: scroll;">
                    

                    <section class="page-section" >

                        
                        <div id="card_container" class="card-grid">
                        <!--<div :id="`box_${data.id}`" class="feature-item inmueble bg-white" v-for="data in dataFilter" v-if="data.estado_inmueble === 'Disponible' || data.estado_inmueble === 'Reservado' || data.estado_inmueble === 'Alquilado' || data.estado_inmueble === 'Vendido'">-->
<div :id="`box_${data.id}`" class="feature-item inmueble bg-white" v-for="data in dataFilter" v-if="data.estado_inmueble === 'Disponible' || data.estado_inmueble === 'Reservado'">                        
                            <a :href="`/anuncio/${ data.id }`"  target="_blank">
                                <div class="feature-pic set-bg"
                                    :style="{ backgroundImage: `url(/storage/${data.path_image_primary}_444x250.jpg)`.replace('.jpeg','').replace('.jpg_444x250.jpg','_444x250.jpg')}">
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
                                    <p>
        <i class="fa fa-map-marker"></i> 
        <span v-if="data.municipio && data.municipio !== null && data.municipio !== 'Madrid'">
            @{{data.road}}, @{{data.municipio}}
        </span>
        <span v-else>
            @{{data.road}}
        </span>                                        
                                    </p>
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
                        <!-- ✅ Mensaje cuando NO hay resultados en la lista -->
                        <div v-if="dataFilter.length === 0"
                             style="padding: 30px 20px; font-family: 'Source Sans Pro', sans-serif; color: #2d2e35; line-height: 1.6;">
                            <p style="font-size: 22px; font-weight: 700; margin-bottom: 12px;">
                                Lo siento, pero no hemos encontrado lo que buscas. 😮
                            </p>
                            <p v-if="activeFiltersText" style="color: #6c757d; margin-bottom: 20px;">
                                @{{ activeFiltersText }}
                            </p>                            
                            <p style="font-weight: 700; margin-bottom: 8px;">Puedes probar:</p>
                            <ul style="list-style: disc; padding-left: 20px; margin-bottom: 0;">
                                <li style="margin-bottom: 8px;">
                                    <a href="#" @click.prevent="verTodosClick"
                                       style="color: #1a73e8; text-decoration: underline; cursor: pointer;">
                                        Ver todos los inmuebles @{{ verTodosOperacion }} en {{ $city->name ?? 'Madrid' }} (@{{ verTodosTotal }})
                                    </a>                                    
                                </li>
                                <li>Prueba a ampliar tu búsqueda modificando algún filtro.</li>
                            </ul>
                        </div>                        
                    </section>
                </div>
                </div>
                <div class="map-pro">
                    
                    
                    
                    <img src="{{asset('img/marker.ico')}}" style="display: none!important;">
                    <div class="row" id="buscador-estilos">
                        <div class="col-lg-4">
                            <input id="pac-input" name="pac-input" ref="search" class="controls" type="search" placeholder="Escribe donde quieres vivir">
                        </div>
                    </div>
                    <div id="map"></div>
                    <input type="hidden" id="city_lat" value="{{$city->lat}}" />
                    <input type="hidden" id="city_lng" value="{{$city->lng}}" />
                    <input type="hidden" id="city_zoom" value="{{$city->zoom}}" />
                    
                </div>
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
        
        <div id="property_floating_box" style="
            display:none;
            width: 67vw;
            z-index:1001;
            background-color: #fff;
            position: fixed;
            bottom: 60px;
            left: 15%;
            border-radius: 5px;
            border-bottom: 2px solid #eadd03;
            ">
<div id="close-pop-container" style="position:absolute; top:0; right:0; padding:15px; z-index:10; cursor:pointer;">
    <img src="/img/closey.png" width="15" id="close-pop" />
</div>
            <a id="uri_property" href="#" style="display:flex;flex-direction: column;">
                <div style="width:100%; background-color:#fff">
                    <img id="property_img" src="" />
                </div>
                <div id="property_title" style="width:100%;display:flex;flex-direction:column;padding:5px;text-align:center;">
                    
                </div>
                <div style="width:100%;display:flex;flex-direction:row;padding-left:5px;padding-right:5px;">
                    <div id="property_type" style="width:50%;padding-left:5px"></div>
                    <div id="property_beds" style="width:50%;"></div>
                    
                </div>
                <div style="width:100%;display:flex;flex-direction:row;padding-left:5px;padding-right:5px;">
                    <div id="property_size" style="width:50%;padding-left:5px"></div>
                    <div id="property_bathrooms" style="width:50%;"></div>
                </div>
            </a>
        </div>

        <div class="modal fade" id="mFilters" tabindex="-1" role="dialog" aria-labelledby="mFiltersLabel">
            <div id="modalFilterDialog" class="modal-dialog modal-dialog-centered modal-image modal-sm" role="application">
                <div class="modal-content animated fadeIn">
                    <div class="modal-header">
                        <h5 class="modal-title">Guardado</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <br /><br />
                    <div class="modal-body">
                        <p>Hemos guardado los siguientes filtros de búsqueda</p>
                        <div style="padding-left:20px;padding-right:10px;" id="content-filters">
                            
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a type="button" href="{{url('/avisame')}}" class="btn btn-primary btn-block">Gestionar busquedas guardadas</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="modal fade" id="mFiltersError" tabindex="-1" role="dialog" aria-labelledby="mFiltersErrorLabel">
            <div id="modalFilterDialog" class="modal-dialog modal-dialog-centered modal-image modal-sm" role="application">
                <div class="modal-content animated fadeIn">
                    <div class="modal-header">
                        <h5 class="modal-title">Aviso</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <br /><br />
                    <div class="modal-body">
                        <p>Disculpe no ha sido posible guardar sus preferencias de búsqueda, intente de nuevo</p>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary btn-block" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        
        <!--<div class="float-button" id="map-list">
            <img id="img-map-list" src="/img/map_icon.png" />
        </div>-->
        
        <!--<div class='mobile-btn-save'>
            <button type="button" id="mobile-btn-save-filter" class="btn btn-primary">
                Guardar busqueda
            </button>
        </div>-->
    
    <!-- Footer section -->
    @include('navigation.footerpro')
    <!-- Footer section end -->
    
<!-- ============================================ -->
<!-- 1. PRIMERO: Scripts de jQuery, etc -->
<!-- ============================================ -->
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="{{asset('js_theme/masonry.pkgd.min.js')}}"></script>
<script src="{{asset('js_theme/main.js')}}"></script>
<script src="{{asset('js_theme/owl.carousel.min.js')}}"></script>    
    <!--====== Javascripts & Jquery ======-->

<!-- ============================================ -->
<!-- 2. SEGUNDO: DATOS INICIALES -->
<!-- ============================================ -->
<script type="text/javascript">
    var data = @json($data);
    window.cardData = data;
    console.log("📊 window.cardData inicializado con:", window.cardData.length, "propiedades");
</script>
<!-- ============================================ -->
<!-- 3. TERCERO: CARGAR buscador_new.js -->
<!-- ============================================ -->
<script src="{{asset('js/buscador_new.js')}}"></script>
    <!-- SOLUCIÓN: Carga correcta de Google Maps con async/defer -->
<!-- ============================================ -->
<!-- 4. CUARTO: Cargar Google Maps -->
<!-- ============================================ -->

<script>
    let googleMapsLoaded = false;
    function initGoogleMapsScript() {
        if (googleMapsLoaded) return;
        googleMapsLoaded = true;
        
        var script = document.createElement('script');
        script.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDZILGdMqrThTYKDDsbolOgLF9fm4lrcfA&libraries=places&loading=async&callback=initMap';
        script.async = true;
        script.defer = true;
        document.head.appendChild(script);
    }
        // SOLUCIÓN: Función de inicialización del mapa
// Inicialización del mapa (ÚNICA fuente de verdad)
function initMap() {
    if (typeof google === 'undefined') {
        console.error('Google Maps API no se ha cargado');
        return;
    }

    // 1) Crear el mapa
    const cityLat  = parseFloat(document.getElementById('city_lat').value);
    const cityLng  = parseFloat(document.getElementById('city_lng').value);
    const cityZoom = parseFloat(document.getElementById('city_zoom').value);

    window.map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: cityLat, lng: cityLng },
        zoom: cityZoom
    });
    window.makekDB = [];

    // 2) Pintar los markers iniciales (los MISMOS datos que la lista)
    const datosIniciales = window.cardData || [];
    if (typeof window.reload_makers === 'function') {
        window.reload_makers(datosIniciales);
    }

    // 3) Buscador de direcciones
    const input = document.getElementById('pac-input');
    if (input) {
        const autocomplete = new google.maps.places.Autocomplete(input, {
            componentRestrictions: { country: 'es' }
        });
        autocomplete.addListener('place_changed', function () {
            const place = autocomplete.getPlace();
            if (!place.geometry) return;
            if (place.geometry.viewport) {
                window.map.fitBounds(place.geometry.viewport);
            } else {
                window.map.setCenter(place.geometry.location);
                window.map.setZoom(15);
            }
        });
    }

// 4) Click en tarjeta -> activar su marker (delegado: sobrevive a los re-render de Vue)
    $(document).off('click.inmueble').on('click.inmueble', '.inmueble', function () {
        // En móvil estamos en la vista de lista: NO activar el marker
        // (si no, además de abrir la ventana de la referencia se abriría el popup)
        var isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
        if (isMobile) return;

        const id = $(this).attr('id').split('_')[1];
        if (typeof refreshIconsGlobal === 'function') refreshIconsGlobal(id);
        if (window.makekDB) {
            for (let i = 0; i < window.makekDB.length; i++) {
                if (window.makekDB[i].get('store_id') == id) {
                    google.maps.event.trigger(window.makekDB[i], 'click');
                }
            }
        }
        $('body,html').animate({ scrollTop: 80 }, 500);
    });

    console.log('✅ Mapa inicializado con', (window.makekDB || []).length, 'markers');
}
window.initMap = initMap;
        
   // Cargar cuando el DOM esté listo
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initGoogleMapsScript);
    } else {
        initGoogleMapsScript();
    }
</script>



    
    
    
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
        var persistedQueryParam = getParameterByName('in');
            
        function getParameterByName(name) {
            var match = RegExp('[?&]' + name + '=([^&]*)').exec(window.location.search);
            return match && decodeURIComponent(match[1].replace(/\+/g, ' '));
        }
        
        if (persistedQueryParam && persistedQueryParam.length > 0) {
            $('a[href]').each(function () {
              var elem = $(this);
              if(!elem.hasClass('dropdown-toggle') && elem.attr('id')!=='btnEntrar'){
                  var href = elem.attr('href');
                  elem.attr('href', href + (href.indexOf('?') != -1 ? '&' : '?') + 'in=' + persistedQueryParam);
              }
            });
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $("#map-list").click(function(){
            if($(".properties").is(":visible")){
                $(".properties").hide();
                $(".map-pro").show();
                //$("#img-map-list").attr("src","/img/list-icon.png");
            }else{
                $(".properties").show();
                $(".map-pro").hide();
                //$("#img-map-list").attr("src","/img/map_icon.png");
                $("#property_floating_box").hide();
            }

        })
        
       /* $("#close-pop").click(function(){
            $("#property_floating_box").hide();
        })*/
// Cierre del popup móvil
$("#close-pop-container, #close-pop").on('click', function(e) {
    e.stopPropagation();   // Evita que el clic llegue al enlace
    e.preventDefault();    // Previene cualquier acción por defecto
    $("#property_floating_box").hide();
});      

       /* var max_price = @json($max);
        var price =  max_price!=null ? parseInt(max_price).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") : "";
		*/
		
		if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
		}else{
            window.addEventListener('resize', function(event) {
                if ($(window).width() > 640) {
                    $(".properties").css("display", "block");
                    $("#property_floating_box").css("display", "none");
                    $(".map-pro").show();
                    $('.mobile-btn-save').hide();
                }else{
                    $(".map-pro").hide();
                    let usrSes = localStorage.getItem('user');
                    if(usrSes){
                        $('.mobile-btn-save').show();
                    }
                }
            }, true);
		}
        
        if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
            let usrSes = localStorage.getItem('user');
            if(usrSes){
                $('.mobile-btn-save').show();
            }else{
                $('.mobile-btn-save').hide();
            }
        }
        

        ELEMENT.locale(ELEMENT.lang.es);

        const filter = new Vue({
            el: '#filter',
            data() {
                return {
                    user: null,
                    dataFilter: [],
                    dataCounter: [],
                    filters: false,
                    control: @json($category),
                    city:@json($cityId),
                    visibleOrder: false,
order: 'relevance',
                    form: {
						//TODO
						category: @json($category),
                        city:@json($cityId),
						tipoinmueble: 'Pisos y casas',
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
                        user: '',
                        propiedad_tamano:'',
                        tamano:'',
                        contract:''
                    },
                    visibleTipoInmueble:false,
                    visiblePrice: false,
                    visibleSize: false,
                    visibleBeds: false,
                    visibleBads:false,
                    visibleFilters:false,
                    priceText:'Precio',
                    sizeText:'Tamaño',
                    bedroomsText:'Dormitorio(s)',
                    badroomsText:'Baño(s)',
                    counterFilters: 0,
                    htmlFilters: "",
                    mobileFiltersVisible: false,
                    mobileResultsCount: 0,
                    ventaTotal: null,
                    currentView: 'list',
                    isMobile: false                    
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
    localStorage.removeItem("iamoving_filters");
    
    // ============================================
    // INICIALIZAR DATOS DEL MAPA
    // ============================================
    // window.cardData YA ESTÁ DEFINIDO desde el script inicial
    // Solo actualizamos si es necesario
    if (this.dataFilter && this.dataFilter.length > 0) {
        window.cardData = this.dataFilter;
    }
    console.log("📊 window.cardData en Vue:", window.cardData.length, "propiedades");
    
    // Si el mapa ya está cargado y hay datos, cargar markers
    if (window.map && window.cardData.length > 0) {
        if (typeof window.reload_makers === 'function') {
            setTimeout(() => {
                window.reload_makers(window.cardData);
            }, 500);
        }
    }
    
    var intervalId = null;

                
                $(document).on('click', '[data-dismiss="modal"]', function(){
                    console.log("CLosed");
                    $("#modalVideoBody").html("");
                });
                var vm = this;
                intervalId = setInterval(function(){
                    var usrSes = localStorage.getItem('user');
                
                    if(usrSes){
                        vm.user = JSON.parse(usrSes);
                        clearInterval(intervalId);
                    }
                }, 1000 );
                
                /*$(document).on('click',"#btn-save-filter", function(){
                    var usr = JSON.parse(localStorage.getItem('user'));
                    var payload = vm.form;
                    payload['user_id'] = usr.id;
                    axios.post('{{ url("iamovingpro/filters") }}', payload).then(response => {
                        console.log(response);
                        if(response.data.success){
                            $("#mFilters").modal('show');
                        }else{
                            $("#mFiltersError").modal('show');
                        }
                    }).catch(error => {
                        $("#mFiltersError").modal('show');
                    });
                })*/
                
                
                $("#content-filters").html("<ul><li>" + this.form.tipoinmueble + "</li></ul>");
                
                /*var localStorageFilters = localStorage.getItem("iamoving_filters");
                if(localStorageFilters){
                    var localF = JSON.parse(localStorageFilters);
                    console.log(localF);
                    this.form.tipoinmueble = localF.tipoinmueble;
                    this.form.furnished_types = localF.furnished_types.length > 0 ? localF.furnished_types : [];
                    this.form.estadoInmueble = localF.estadoInmueble.length > 0 ? localF.estadoInmueble : [];
                    this.form.numerosBanos = localF.numerosBanos.length > 0 ? localF.numerosBanos : [];
                    this.calderaAgua = localF.calderaAgua.length > 0 ? localF.calderaAgua : [];
                    this.form.piesas = localF.piesas.length > 0 ? localF.piesas : [];
                    this.form.orientacion = localF.orientacion.length > 0 ? localF.orientacion : [];
                    this.form.banosIncorporados = localF.banosIncorporados.length > 0 ? localF.banosIncorporados : [];
                    this.form.banosIncorporadosHab = localF.banosIncorporadosHab.length > 0 ? localF.banosIncorporadosHab : [];
                    this.form.price = localF.price !== '' ? localF.price : '';
                    this.form.propiedad_price = localF.propiedad_price !== '' ? localF.propiedad_price : '';
			        this.form.qualities = localF.qualities.length > 0 ? localF.qualities : [];
					this.form.room = localF.room.length > 0 ? localF.room : [];
                    this.form.building = localF.building.length > 0 ? localF.building : [];
                    this.form.ambient = localF.ambient.length > 0 ? localF.ambient : [];
                    this.form.heating = localF.heating.length > 0 ? localF.heating : [];
                    this.form.access2 = localF.access2.length > 0 ? localF.access2 : [];
                    this.form.access = localF.access.length > 0 ? localF.access : [];
                    this.form.region = localF.region !== '' ? localF.region : '';
                    this.propiedad_tamano = localF.propiedad_tamano !== '' ? localF.propiedad_tamano : '';
                    this.tamano = localF.tamano !== '' ? localF.tamano : '';
                    this.contract = localF.contract!=='' ? localF.contract : '';
                    
                    
                    if (this.form.propiedad_price.trim()!=='' || this.form.price.trim()!==''){
					    this.priceText = this.form.propiedad_price.trim() + " - " + this.form.price.trim();
					}else{
					    this.priceText = 'Precio';
					}
					
					if(this.form.propiedad_tamano.trim()!=='' || this.form.tamano.trim()!==''){
					    this.sizeText = this.form.propiedad_tamano.trim() + " - " + this.form.tamano.trim();
					}else{
					    this.sizeText = 'Tamaño';
					}

					
					if(this.form.piesas.length > 0){
					    let text = '';
					    for(let i=0;i< this.form.piesas.length;i++){
					        if(text.trim()===''){
					            text = this.form.piesas[i];
					        }else{
					            if(i == this.form.piesas.length-1){
					                text = text + " o " + this.form.piesas[i];   
					            }else{
					                text = text + "," + this.form.piesas[i];   
					            }
					        }
					    }
					    this.bedroomsText = text + " Dormitorio(s)";
					}else{
					    this.bedroomsText = "Dormitorio(s)";
					}
					
					if(this.form.numerosBanos.length > 0){
					    let text = '';
					    for(let i=0;i< this.form.numerosBanos.length;i++){
					        if(text.trim()===''){
					            text = this.form.numerosBanos[i];
					        }else{
					            if(i == this.form.numerosBanos.length-1){
					                text = text + " o " + this.form.numerosBanos[i];   
					            }else{
					                text = text + "," + this.form.numerosBanos[i];   
					            }
					        }
					    }
					    this.badroomsText = text + " Baño(s)";
					}else{
					    this.badroomsText = "Baño(s)";
					}
					let counter = 0;
					
					if(this.form.furnished_types.length > 0){
				        counter++;
				    }
                    if(this.form.qualities.length > 0){
                        counter++;
                    }
                    if(this.form.room.length > 0){
                        counter++;
                    }
                    if(this.form.estadoInmueble.length > 0){
                        counter++;
                    }
                    if(this.form.access.length > 0){ 
                        counter++;
                    }
                    if(this.form.heating.length > 0){
                        counter++;

                    }
                    if(this.form.calderaAgua.length > 0){
                        counter++;
                    }
                    if(this.form.contract.length > 0){
                        counter++;
                    }
                    if(this.form.building.length > 0){
                        counter++;
                    }
                       
                    this.counterFilters = counter;
                    console.log(this.form)
                    console.log("LOADED LOCALSTORAGE")
                    this.submiteo(true);
                    //this.showResults();
                }*/
                // Detectar si es móvil
                this.isMobile = window.innerWidth <= 768;
                window.addEventListener('resize', () => {
                    this.isMobile = window.innerWidth <= 768;
                });
                
                // Configurar listeners móviles
                this.setupMobileListeners();
                
                // Actualizar contador inicial
                this.$nextTick(() => {
                    this.updateMobileResults();
                    
                    // También actualizar el texto de la cabecera con los valores iniciales
                    const count = this.dataFilter ? this.dataFilter.length : 0;
                    const formattedCount = count.toLocaleString();
                    const tipoInmueble = this.form.tipoinmueble || 'Pisos y casas';
                    const tipoInmuebleLower = tipoInmueble.toLowerCase();
                    const operacion = this.control == 1 ? 'en venta' : (this.control == 0 ? 'en alquiler' : '');
                    const ciudad = document.getElementById('result-city')?.textContent || 'Madrid';
                    
                    const resultsText = document.querySelector('#mobile-results .results-text');
                    if (resultsText) {
                        resultsText.textContent = `${formattedCount} ${tipoInmuebleLower} ${operacion} en ${ciudad}`;
                    }
                    
                    // Actualizar elementos individuales
                    document.getElementById('result-count').textContent = formattedCount;
                    document.getElementById('result-type').textContent = tipoInmuebleLower;
                    document.getElementById('result-operation').textContent = operacion;                    
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
                },
                // ✅ Total de inmuebles (para el enlace "Ver todos...")
                totalInmuebles() {
                    return (typeof data !== 'undefined' && data) ? data.length : 0;
                },
                // ✅ Operación a mostrar en el enlace (con override a venta si no hay alquileres)
                verTodosOperacion() {
                    const forzarVenta = (this.totalInmuebles === 0 && this.control == 0);
                    if (forzarVenta) return 'en venta';
                    return this.control == 1 ? 'en venta' : (this.control == 0 ? 'en alquiler' : '');
                },
                // ✅ Número a mostrar en el enlace
                verTodosTotal() {
                    const forzarVenta = (this.totalInmuebles === 0 && this.control == 0);
                    return forzarVenta ? (this.ventaTotal !== null ? this.ventaTotal : '…') : this.totalInmuebles;
                },                
                // ✅ Filtros activos separados por comas
        activeFiltersText() {
                    const f = this.form;
                    const parts = [];
                    if (f.tipoinmueble) parts.push(f.tipoinmueble);
                    // ✅ Operación (category) y ciudad (city) de la URL, como un filtro más
                    const operacion = this.control == 1 ? 'en venta' : (this.control == 0 ? 'en alquiler' : '');
                    if (operacion) parts.push(operacion);
                    parts.push(@json($city->name ?? 'Madrid'));
                    if (f.propiedad_price) parts.push('desde ' + f.propiedad_price);
                    if (f.price) parts.push('hasta ' + f.price);
                    if (f.propiedad_tamano) parts.push('desde ' + f.propiedad_tamano + ' m²');
                    if (f.tamano) parts.push('hasta ' + f.tamano + ' m²');
                    ['estadoInmueble','furnished_types','numerosBanos','piesas',
                     'qualities','room','building','ambient','heating','access',
                     'access2','orientacion','banosIncorporados','banosIncorporadosHab',
                     'calderaAgua'].forEach(k => {
                        if (Array.isArray(f[k]) && f[k].length > 0) parts.push(f[k].join(', '));
                    });
                    if (f.contract) parts.push(f.contract);
                    return parts.join(', ');
                }
            },
            methods: {
                // ✅ Click del enlace "Ver todos..."
                verTodosClick() {
                    const forzarVenta = (this.totalInmuebles === 0 && this.control == 0);
                    if (forzarVenta) {
                        // No hay inmuebles en alquiler: ir a venta (recarga en modo venta)
                        window.location.href = '{{ url("iamovingpro/buscar") }}?category=1&city=' + this.city;
                    } else {
                        this.clearFilters();
                    }
                },                
    getPriceOptions() {
        const options = [];
        // De 60.000 a 300.000 en 20.000
        for (let i = 60000; i <= 300000; i += 20000) {
            options.push({ value: i, label: i.toLocaleString() + ' €' });
        }
        // De 300.000 a 1.000.000 en 50.000
        for (let i = 350000; i <= 1000000; i += 50000) {
            options.push({ value: i, label: i.toLocaleString() + ' €' });
        }
        // De 1.000.000 a 3.000.000 en 100.000
        for (let i = 1100000; i <= 3000000; i += 100000) {
            options.push({ value: i, label: i.toLocaleString() + ' €' });
        }
        return options;
    },
applyOrder() {
    this.visibleOrder = false;
    this.submiteo(true);
},    
    // Generar opciones para el select de tamaño
    getSizeOptions() {
        const options = [];
        // De 20 a 200 en 20
        for (let i = 20; i <= 200; i += 20) {
            options.push({ value: i, label: i + ' m²' });
        }
        // De 200 a 500 en 50
        for (let i = 250; i <= 500; i += 50) {
            options.push({ value: i, label: i + ' m²' });
        }
        // De 500 a 900 en 100
        for (let i = 600; i <= 900; i += 100) {
            options.push({ value: i, label: i + ' m²' });
        }
        return options;
    },                 
                setFocus()
                {
                  this.propiedad_price.focus();
            	  
                },	
                clearFilters(){
                    console.log("clearFilters")
                    this.form = {
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
                        qualities: [],
						room: [],
                        building: [],
                        ambient: [],
                        heating: [],
                        access2: [],
                        access: [],
                        region: '',
                        date: '',
                        user: '',
                        propiedad_tamano:'',
                        tamano:'',
                        contract:''
                    
                    },
                    this.visibleTipoInmueble = false;
                    this.visiblePrice = false;
                    this.visibleSize = false;
                    this.visibleBeds = false;
                    this.visibleBads = false;
                    this.visibleFilters = false;
                    this.priceText = 'Precio';
                    this.sizeText = 'Tamaño';
                    this.bedroomsText = 'Dormitorio(s)';
                    this.badroomsText = 'Baño(s)';
                    this.counterFilters = 0;
                    this.htmlFilters = "";
                    
                    this.submiteo(true);
                    
                    
                },
                // ✅ Eliminar SOLO los filtros de esta capa (popover de filtros avanzados) — solo escritorio
                clearLayerFilters() {
                    this.form.furnished_types = [];
                    this.form.qualities      = [];
                    this.form.room           = [];
                    this.form.estadoInmueble = [];
                    this.form.access         = [];
                    this.form.heating        = [];
                    this.form.calderaAgua    = [];
                    this.form.contract       = '';
                    this.form.building       = [];
                    this.submiteo(true);
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
                    if (this.form.price.indexOf("\u20AC") == -1) {
                        this.form.price = this.thousandSeprator(this.form.price) + " \u20AC";
                    }
					this.submiteo();
                },
                onBlurNumbere(e) {
                    if (this.form.propiedad_price.indexOf("\u20AC") == -1) {
                        this.form.propiedad_price = this.thousandSeprator(this.form.propiedad_price) + " \u20AC";
                    }
					this.submiteo();
                },
showResults(){
    console.log("📊 Mostrando resultados:", this.dataCounter.length);
    this.dataFilter = this.dataCounter;  
    
    // ============================================
    // ACTUALIZAR EL MAPA
    // ============================================
    window.cardData = this.dataCounter;
    
    if (typeof window.clearAllMarkers === 'function') {
        window.clearAllMarkers();
    } else {
        if (window.markerDB && window.markerDB.length > 0) {
            window.markerDB.forEach(marker => {
                if (marker && marker.setMap) {
                    marker.setMap(null);
                }
            });
            window.markerDB = [];
        }
        if (window.advancedMarkers) {
            window.advancedMarkers.clear();
        }
        if (window.makekDB && window.makekDB.length > 0) {
            window.makekDB.forEach(marker => {
                if (marker && marker.setMap) {
                    marker.setMap(null);
                }
            });
            window.makekDB = [];
        }
    }
    
    if (typeof window.reload_makers === 'function') {
        console.log("🔄 Usando window.reload_makers con", this.dataCounter.length, "propiedades");
        window.reload_makers(this.dataCounter);
    } else if (typeof reload_makers === 'function') {
        console.log("🔄 Usando reload_makers con", this.dataCounter.length, "propiedades");
        reload_makers(this.dataCounter);
    } else if (typeof createMarkers === 'function') {
        console.log("🔄 Usando createMarkers con", this.dataCounter.length, "propiedades");
        createMarkers();
    } else {
        console.warn("⚠️ No se encontró función para recargar markers");
    }
    
    // 4. Actualizar contador de resultados móvil
    this.updateMobileResults();
    
    // 5. Actualizar el texto principal de resultados (escritorio) - CON VERIFICACIÓN
    const resultCountEl = document.getElementById('result-count');
    if (resultCountEl) {
        resultCountEl.textContent = this.dataCounter.length.toLocaleString();
    }
    
    // 6. Actualizar el contador del botón "Ver X viviendas" - CON VERIFICACIÓN
    const resultCountSpan = document.getElementById('mobile-result-count');
    if (resultCountSpan) {
        resultCountSpan.textContent = this.dataCounter.length.toLocaleString();
    }
    
    // 7. Si el mapa está visible, recargar también desde aquí
    if (this.currentView === 'map') {
        setTimeout(() => {
            if (window.map && typeof google !== 'undefined') {
                google.maps.event.trigger(window.map, 'resize');
            }
        }, 300);
    }
},
				checkFilter(key,filter){
				    return this[filter].includes(key)
				},
                reseteo(e) {
                    console.log("Filtro cambiado, aplicando...");
                    this.submiteo(true);  // true para que se aplique automáticamente
                },
submiteo(autoload) {
    console.log("SUBMITEA - Aplicando filtros");
    
    var jsonFilters = JSON.stringify(this.form);
    localStorage.setItem("iamoving_filters", jsonFilters);
    
    console.log(jsonFilters);
    
    // Cambiar texto del botón a "Filtrando..." - CON VERIFICACIÓN
    const applyBtn = document.getElementById('mobile-apply-filters');
    if (applyBtn && !applyBtn.disabled) {
        applyBtn.innerHTML = 'Filtrando...';
        applyBtn.disabled = true;
    }
    
    // ============================================
    // PROCESAR TEXTOS DE FILTROS
    // ============================================
    let countFiltersText = 1;
    let textFilters = "<ul>";
    textFilters += "<li>" + this.form.tipoinmueble + "</li>"; 

    if (this.form.price.trim()=='€'){
        this.form.price='';
    }
    
    if (this.form.propiedad_price.trim()=='€'){
        this.form.propiedad_price='';
    }   
    
    // ========== VALIDACIÓN DE PRECIOS ==========
    // Convertir a número (eliminar puntos, símbolos, etc.)
    const minPrice = this.form.propiedad_price
        ? parseFloat(this.form.propiedad_price.toString().replace(/[^0-9.]/g, ''))
        : null;
    const maxPrice = this.form.price
        ? parseFloat(this.form.price.toString().replace(/[^0-9.]/g, ''))
        : null;

    // Si ambos están definidos, comprobar que min < max
    if (minPrice !== null && maxPrice !== null && minPrice >= maxPrice) {
        // Mostrar mensaje de error (usando Element UI)
        this.$message.error('El precio mínimo no puede ser mayor o igual al máximo');
        
        // Restaurar botón si estaba en estado de carga
        if (applyBtn) {
            applyBtn.disabled = false;
            applyBtn.innerHTML = 'Ver viviendas';
        }
        
        // Ocultar indicador de carga
        const divFilter = document.getElementById('divFilter');
        if (divFilter) {
            divFilter.style.display = 'none';
        }
        
        return; // Cancelar la petición
    }
    // ============================================
    
    if (this.form.propiedad_price.trim()!=='' || this.form.price.trim()!==''){
        this.priceText = this.form.propiedad_price.trim() + " - " + this.form.price.trim();
        if(countFiltersText < 7){
            textFilters += '<li>Precio ' + this.priceText + '</li>';
            countFiltersText++;
        }
    }else{
        this.priceText = 'Precio';
    }
    
    if(this.form.propiedad_tamano.trim()!=='' || this.form.tamano.trim()!==''){
        this.sizeText = this.form.propiedad_tamano.trim() + " - " + this.form.tamano.trim();
        if(countFiltersText < 7){
            textFilters += '<li>Tamaño ' + this.priceText + '</li>';
            countFiltersText++;
        }
    }else{
        this.sizeText = 'Tamaño';
    }
    
    if(this.form.piesas.length > 0){
        let text = '';
        for(let i=0;i< this.form.piesas.length;i++){
            if(text.trim()===''){
                text = this.form.piesas[i];
            }else{
                if(i == this.form.piesas.length-1){
                    text = text + " o " + this.form.piesas[i];   
                }else{
                    text = text + "," + this.form.piesas[i];   
                }
            }
        }
        this.bedroomsText = text + " Dormitorio(s)";
        if(countFiltersText < 7){
            textFilters += '<li>' + this.bedroomsText + '</li>';
            countFiltersText++;
        }
    }else{
        this.bedroomsText = "Dormitorio(s)";
    }
    
    if(this.form.numerosBanos.length > 0){
        let text = '';
        for(let i=0;i< this.form.numerosBanos.length;i++){
            if(text.trim()===''){
                text = this.form.numerosBanos[i];
            }else{
                if(i == this.form.numerosBanos.length-1){
                    text = text + " o " + this.form.numerosBanos[i];   
                }else{
                    text = text + "," + this.form.numerosBanos[i];   
                }
            }
        }
        this.badroomsText = text + " Baño(s)";
        if(countFiltersText < 7){
            textFilters += '<li>' + this.badroomsText + '</li>';
            countFiltersText++;
        }
    }else{
        this.badroomsText = "Baño(s)";
    }
    
    let counter = 0;
    if(this.form.furnished_types.length > 0){
        counter++;
        if(countFiltersText < 7){
            textFilters += '<li>Tipo de vivienda</li>';
            countFiltersText++;
        }
    }
    if(this.form.qualities.length > 0){
        counter++;
        if(countFiltersText < 7){
            textFilters += '<li>Amueblado o vacío</li>';
            countFiltersText++;
        }
    }
    if(this.form.room.length > 0){
        counter++;
        if(countFiltersText < 7){
            textFilters += '<li>Habitación amueblada o vacía</li>';
            countFiltersText++;
        }
    }
    if(this.form.estadoInmueble.length > 0){
        counter++;
        if(countFiltersText < 7){
            textFilters += '<li>Estado del inmueble</li>';
            countFiltersText++;
        }
    }
    if(this.form.access.length > 0){ 
        counter++;
        if(countFiltersText < 7){
            textFilters += '<li>Lo que es muy importante para mi</li>';
            countFiltersText++;
        }
    }
    if(this.form.heating.length > 0){
        counter++;
        if(countFiltersText < 7){
            textFilters += '<li>Calefacción</li>';
            countFiltersText++;
        }
    }
    if(this.form.calderaAgua.length > 0){
        counter++;
        if(countFiltersText < 7){
            textFilters += '<li>Caldera del agua</li>';
            countFiltersText++;
        }
    }
    if(this.form.contract.length > 0){
        counter++;
        if(countFiltersText < 7){
            textFilters += '<li>Duración mínima del contrato</li>';
            countFiltersText++;
        }
    }
    if(this.form.building.length > 0){
        counter++;
        if(countFiltersText < 7){
            textFilters += '<li>Datos del edificio</li>';
            countFiltersText++;
        }
    }
       
    this.counterFilters = counter;
    if(countFiltersText >= 7){
        textFilters += '<li>...</li>';    
    }
    textFilters += '</ul>';
    $("#content-filters").html(textFilters);
    
    if (this.form.date != "") {
        this.form.date.setDate(this.form.date.getDate()+65);
    }
    
    // ============================================
    // MOSTRAR LOADING Y HACER PETICIÓN AJAX
    // ============================================
    document.getElementById('divFilter').style.display = 'block';
    console.log("📡 Enviando petición a:", '{{ url("iamovingpro/buscar") }}/'+this.control+'/' + this.city);
var payload = this.form;
payload.order = this.order;   // ← añadir esta línea
    axios.post('{{ url("iamovingpro/buscar") }}/'+this.control+'/' + this.city, this.form)
        .then(response => {
            console.log("✅ Respuesta recibida:", response.data.length, "resultados");
            
            if(response.data.length > 0){
                this.dataCounter = response.data;
            }else{
                this.dataCounter = [];
            }
            
            this.showResults();
            this.updateMobileResults();
            
            // Restaurar botón - CON VERIFICACIÓN
            if (applyBtn) {
                applyBtn.disabled = false;
                const count = this.dataCounter.length;
                applyBtn.innerHTML = `Ver ${count.toLocaleString()} viviendas`;
            }
        })
        .catch(error => {
            console.error("❌ Error al filtrar:", error);
            const divFilter = document.getElementById('divFilter');
            if (divFilter) {
                divFilter.style.display = 'none';
            }
            
            if (applyBtn) {
                applyBtn.disabled = false;
                applyBtn.innerHTML = 'Ver viviendas';
            }
        })
        .then(() => {
            const divFilter = document.getElementById('divFilter');
            if (divFilter) {
                divFilter.style.display = 'none';
            }
        });
    
    $('#ndormitorios').trigger('click');
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
                },
                showVideo(id, video, event){
                    event.preventDefault();
                    if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
                        widthStyle = 'max-width: 350px;';
                    }
                    
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
                    
                },
// Añadir este método a tu componente Vue
getCityName() {
    // Si tienes un array de ciudades, puedes mapear el ID al nombre
    const cities = {
        1: 'Madrid',
        // Añadir más ciudades cuando existan
    };
    return cities[this.city] || 'Madrid';
},                
setupMobileListeners() {
            // Botón de filtros
            $('#btn-filters-mobile').on('click', () => {
                this.openMobileFilters();
            });
            
            // Botón de mapa
            $('#btn-map-mobile').on('click', () => {
                this.toggleMapView();
            });
            
// En setupMobileListeners
$('#order-select-mobile').on('change', function() {
    if (window.filterVue) {
        window.filterVue.order = $(this).val();
        window.filterVue.submiteo(true);
    }
});
            
            // Aplicar filtros desde móvil
            $('#mobile-apply-filters').on('click', () => {
                this.applyMobileFilters();
            });
            
            // Borrar filtros
            $('#mobile-clear-filters').on('click', () => {
                this.clearMobileFilters();
            });
            
            // Cerrar modal al hacer click fuera
            $(document).on('click', '#mobileFiltersModal .modal-backdrop', () => {
                $('#mobileFiltersModal').modal('hide');
            });
        },
        
        openMobileFilters() {
            // Generar contenido de filtros para móvil
            this.generateMobileFilters();
            $('#mobileFiltersModal').modal({
                backdrop: 'static',
                keyboard: true
            });
            $('#mobileFiltersModal').modal('show');
        },
    generateMobileFilters() {
    // Obtener las opciones de precio y tamaño
    const priceOptions = this.getPriceOptions();
    const sizeOptions = this.getSizeOptions();
    
    // Generar opciones HTML para precio
    let priceOptionsHtml = '<option value="">Mín</option>';
    priceOptions.forEach(opt => {
        const selected = this.form.propiedad_price == opt.value ? 'selected' : '';
        priceOptionsHtml += `<option value="${opt.value}" ${selected}>${opt.label}</option>`;
    });
    
    // Generar opciones HTML para tamaño
    let sizeOptionsHtml = '<option value="">Mín</option>';
    sizeOptions.forEach(opt => {
        const selected = this.form.propiedad_tamano == opt.value ? 'selected' : '';
        sizeOptionsHtml += `<option value="${opt.value}" ${selected}>${opt.label}</option>`;
    });
    
    let html = '';
    
    // ============================================
    // 1. TIPO DE INMUEBLE
    // ============================================
    html += `
        <div class="filter-group" style="margin-bottom: 24px; border-bottom: 1px solid #f0f0f0; padding-bottom: 16px;">
            <h6 style="font-weight: 600; margin-bottom: 12px; color: #1a1a1a; font-size: 15px;">Tipo de inmueble</h6>
            <div style="display: flex; flex-direction: column; gap: 10px;">
                <label style="display: flex; align-items: center; gap: 10px; font-weight: normal; cursor: pointer; color: #1a1a1a; font-size: 14px;">
                    <input type="radio" name="tipoinmueble_mobile" value="Pisos y casas" ${this.form.tipoinmueble == 'Pisos y casas' ? 'checked' : ''} onchange="window.filterVue.form.tipoinmueble = 'Pisos y casas'; window.filterVue.reseteo();">
                    Pisos y casas
                </label>
                <label style="display: flex; align-items: center; gap: 10px; font-weight: normal; cursor: pointer; color: #1a1a1a; font-size: 14px;">
                    <input type="radio" name="tipoinmueble_mobile" value="Habitaciones" ${this.form.tipoinmueble == 'Habitaciones' ? 'checked' : ''} onchange="window.filterVue.form.tipoinmueble = 'Habitaciones'; window.filterVue.reseteo();">
                    Habitaciones
                </label>
                <label style="display: flex; align-items: center; gap: 10px; font-weight: normal; cursor: pointer; color: #1a1a1a; font-size: 14px;">
                    <input type="radio" name="tipoinmueble_mobile" value="Local/Oficina" ${this.form.tipoinmueble == 'Local/Oficina' ? 'checked' : ''} onchange="window.filterVue.form.tipoinmueble = 'Local/Oficina'; window.filterVue.reseteo();">
                    Local/Oficina
                </label>
            </div>
        </div>
    `;
    
    // ============================================
    // 2. PRECIO
    // ============================================
    html += `
        <div class="filter-group" style="margin-bottom: 24px; border-bottom: 1px solid #f0f0f0; padding-bottom: 16px;">
            <h6 style="font-weight: 600; margin-bottom: 12px; color: #1a1a1a; font-size: 15px;">Precio</h6>
            <div style="display: flex; gap: 10px;">
                <div style="flex: 1;">
                    <select class="form-control" style="border-radius: 8px; font-size: 14px; border-color: #d1d5db; height: 40px; appearance: auto; -webkit-appearance: auto; background: #fff;" 
                            onchange="window.filterVue.form.propiedad_price = this.value; window.filterVue.reseteo();">
                        ${priceOptionsHtml}
                    </select>
                </div>
                <div style="flex: 1;">
                    <select class="form-control" style="border-radius: 8px; font-size: 14px; border-color: #d1d5db; height: 40px; appearance: auto; -webkit-appearance: auto; background: #fff;" 
                            onchange="window.filterVue.form.price = this.value; window.filterVue.reseteo();">
                        <option value="">Máx</option>
                        ${priceOptionsHtml.replace('Mín', 'Máx')}
                    </select>
                </div>
            </div>
        </div>
    `;
    
    // ============================================
    // 3. TAMAÑO
    // ============================================
    html += `
        <div class="filter-group" style="margin-bottom: 24px; border-bottom: 1px solid #f0f0f0; padding-bottom: 16px;">
            <h6 style="font-weight: 600; margin-bottom: 12px; color: #1a1a1a; font-size: 15px;">Tamaño</h6>
            <div style="display: flex; gap: 10px;">
                <div style="flex: 1;">
                    <select class="form-control" style="border-radius: 8px; font-size: 14px; border-color: #d1d5db; height: 40px; appearance: auto; -webkit-appearance: auto; background: #fff;" 
                            onchange="window.filterVue.form.propiedad_tamano = this.value; window.filterVue.reseteo();">
                        ${sizeOptionsHtml}
                    </select>
                </div>
                <div style="flex: 1;">
                    <select class="form-control" style="border-radius: 8px; font-size: 14px; border-color: #d1d5db; height: 40px; appearance: auto; -webkit-appearance: auto; background: #fff;" 
                            onchange="window.filterVue.form.tamano = this.value; window.filterVue.reseteo();">
                        <option value="">Máx</option>
                        ${sizeOptionsHtml.replace('Mín', 'Máx')}
                    </select>
                </div>
            </div>
        </div>
    `;
    
    // ============================================
    // 4. TIPO DE VIVIENDA
    // ============================================
const furnishedTypes = this.form.furnished_types || [];
html += `
    <div class="filter-group" style="margin-bottom: 24px; border-bottom: 1px solid #f0f0f0; padding-bottom: 16px;">
        <h6 style="font-weight: 600; margin-bottom: 12px; color: #1a1a1a; font-size: 15px;">Tipo de vivienda</h6>
        <div style="display: flex; flex-direction: column; gap: 10px;">
            ${['Estudio','Loft','Apartamento','Piso','Chalet','Casa','Atico','Bajo','Dúplex'].map(type => `
                <label style="display: flex; align-items: center; gap: 10px; font-weight: normal; cursor: pointer; color: #1a1a1a; font-size: 14px;">
                    <input type="checkbox" value="${type}" ${furnishedTypes.includes(type) ? 'checked' : ''} 
                           onchange="window.filterVue.toggleFilter('furnished_types', '${type}', this.checked);">
                    ${type}
                </label>
            `).join('')}
        </div>
    </div>
`;
    
    // ============================================
    // 5. DORMITORIOS
    // ============================================
    const piesas = this.form.piesas || [];
    html += `
        <div class="filter-group" style="margin-bottom: 24px; border-bottom: 1px solid #f0f0f0; padding-bottom: 16px;">
            <h6 style="font-weight: 600; margin-bottom: 12px; color: #1a1a1a; font-size: 15px;">Dormitorios</h6>
            <div style="display: flex; flex-direction: column; gap: 10px;">
                ${['1','2','3','4','5'].map(val => {
                    const label = val == '5' ? '5 dormitorios o más' : val;
                    return `
                        <label style="display: flex; align-items: center; gap: 10px; font-weight: normal; cursor: pointer; color: #1a1a1a; font-size: 14px;">
                            <input type="checkbox" value="${val}" ${piesas.includes(val) ? 'checked' : ''} 
                                   onchange="window.filterVue.toggleFilter('piesas', '${val}', this.checked);">
                            ${label}
                        </label>
                    `;
                }).join('')}
            </div>
        </div>
    `;
    
    // ============================================
    // 6. BAÑOS
    // ============================================
    const numerosBanos = this.form.numerosBanos || [];
    html += `
        <div class="filter-group" style="margin-bottom: 24px; border-bottom: 1px solid #f0f0f0; padding-bottom: 16px;">
            <h6 style="font-weight: 600; margin-bottom: 12px; color: #1a1a1a; font-size: 15px;">Baños</h6>
            <div style="display: flex; flex-direction: column; gap: 10px;">
                ${['1','2','3','4','5'].map(val => {
                    const label = val == '5' ? '5 Baños o más' : val;
                    return `
                        <label style="display: flex; align-items: center; gap: 10px; font-weight: normal; cursor: pointer; color: #1a1a1a; font-size: 14px;">
                            <input type="checkbox" value="${val}" ${numerosBanos.includes(val) ? 'checked' : ''} 
                                   onchange="window.filterVue.toggleFilter('numerosBanos', '${val}', this.checked);">
                            ${label}
                        </label>
                    `;
                }).join('')}
            </div>
        </div>
    `;
    
    // ============================================
    // 7. ESTADO DEL INMUEBLE
    // ============================================
    const estadoInmueble = this.form.estadoInmueble || [];
    html += `
        <div class="filter-group" style="margin-bottom: 24px; border-bottom: 1px solid #f0f0f0; padding-bottom: 16px;">
            <h6 style="font-weight: 600; margin-bottom: 12px; color: #1a1a1a; font-size: 15px;">Estado del inmueble</h6>
            <div style="display: flex; flex-direction: column; gap: 10px;">
                ${['Obra nueva','Reformado a estrenar','A reformar','En buen estado','Recién reformado'].map(type => `
                    <label style="display: flex; align-items: center; gap: 10px; font-weight: normal; cursor: pointer; color: #1a1a1a; font-size: 14px;">
                        <input type="checkbox" value="${type}" ${estadoInmueble.includes(type) ? 'checked' : ''} 
                               onchange="window.filterVue.toggleFilter('estadoInmueble', '${type}', this.checked);">
                        ${type}
                    </label>
                `).join('')}
            </div>
        </div>
    `;
    
// ============================================
// 8. ¡MUY IMPORTANTE PARA MÍ!
// ============================================
const access = this.form.access || [];
//const accessItems = ['Ascensor','Rampas de minusválidos en el portal','Ascensor que entra un carrito de bebé',
//                     'Exterior','Interior','Terraza','Balcón','Patio','Aire acondicionado'];
const accessItems = ['Ascensor','Exterior','Interior','Terraza','Balcón','Patio','Aire acondicionado'];
html += `
    <div class="filter-group" style="margin-bottom: 24px; border-bottom: 1px solid #f0f0f0; padding-bottom: 16px;">
        <h6 style="font-weight: 600; margin-bottom: 12px; color: #1a1a1a; font-size: 15px;">¡Muy importante para mí!</h6>
        <div style="display: flex; flex-direction: column; gap: 10px;">
            ${accessItems.map(type => `
                <label style="display: flex; align-items: center; gap: 10px; font-weight: normal; cursor: pointer; color: #1a1a1a; font-size: 14px;">
                    <input type="checkbox" value="${type}" ${access.includes(type) ? 'checked' : ''} 
                           onchange="window.filterVue.toggleFilter('access', '${type}', this.checked);">
                    ${type}
                </label>
            `).join('')}
        </div>
    </div>
`;
    

// ============================================
// 11. DATOS DEL EDIFICIO
// ============================================
const building = this.form.building || [];
const buildingItems = ['Jardín','Piscina','Gym','Sauna','Zona deportiva','Zona infantil',
                      'Garaje incluido en el precio','Trastero incluido'];
html += `
    <div class="filter-group" style="margin-bottom: 24px;">
        <h6 style="font-weight: 600; margin-bottom: 12px; color: #1a1a1a; font-size: 15px;">Datos del edificio</h6>
        <div style="display: flex; flex-direction: column; gap: 10px;">
            ${buildingItems.map(type => `
                <label style="display: flex; align-items: center; gap: 10px; font-weight: normal; cursor: pointer; color: #1a1a1a; font-size: 14px;">
                    <input type="checkbox" value="${type}" ${building.includes(type) ? 'checked' : ''} 
                           onchange="window.filterVue.toggleFilter('building', '${type}', this.checked);">
                    ${type}
                </label>
            `).join('')}
        </div>
    </div>
`;
    
    document.getElementById('mobile-filters-content').innerHTML = html;
},
        
updateMobileResults() {
    const count = this.dataFilter ? this.dataFilter.length : 0;
    this.mobileResultsCount = count;
    
    const formattedCount = count.toLocaleString();
    
    // ============================================
    // 1. ACTUALIZAR TEXTO DE LA CABECERA
    // ============================================
    let tipoInmueble = this.form.tipoinmueble || 'Pisos y casas';
    let tipoInmuebleLower = tipoInmueble.toLowerCase();
    
    let operacion = '';
    if (this.control == 1) {
        operacion = 'en venta';
    } else if (this.control == 0) {
        operacion = 'en alquiler';
    } else {
        operacion = '';
    }
    
    let ciudad = document.getElementById('result-city')?.textContent || 'Madrid';
    
    let textoResultados = '';
    if (count > 0) {
        textoResultados = `${formattedCount} ${tipoInmuebleLower} ${operacion} en ${ciudad}`;
    } else {
        textoResultados = `0 ${tipoInmuebleLower} ${operacion} en ${ciudad}`;
    }
    
    // ============================================
    // ACTUALIZAR CON VERIFICACIÓN DE EXISTENCIA
    // ============================================
    
    // Actualizar el elemento de resultados
    const resultsText = document.querySelector('#mobile-results .results-text');
    if (resultsText) {
        resultsText.textContent = textoResultados;
        resultsText.style.display = count > 0 ? 'block' : 'none';
    }
    
    // Actualizar el contador de resultados - CON VERIFICACIÓN
    const resultCountEl = document.getElementById('result-count');
    if (resultCountEl) {
        resultCountEl.textContent = formattedCount;
    }
    
    // Actualizar el tipo de inmueble - CON VERIFICACIÓN
    const resultTypeEl = document.getElementById('result-type');
    if (resultTypeEl) {
        resultTypeEl.textContent = tipoInmuebleLower;
    }
    
    // Actualizar la operación - CON VERIFICACIÓN
    const resultOperationEl = document.getElementById('result-operation');
    if (resultOperationEl) {
        resultOperationEl.textContent = operacion;
    }
    
    // Mostrar/ocultar mensaje de "No se han encontrado resultados" y el contador
    const noResultsMsg = document.getElementById('no-results-message');
    const countContainer = document.getElementById('results-count-container');
    if (count > 0) {
        if (noResultsMsg) noResultsMsg.style.display = 'none';
        if (countContainer) countContainer.style.display = 'block';
    } else {
        if (noResultsMsg) {
            noResultsMsg.style.display = 'block';
            noResultsMsg.textContent = `No se han encontrado resultados con el filtro que has seleccionado`;
        }
        if (countContainer) countContainer.style.display = 'none';
    }
    
    // ============================================
    // 2. ACTUALIZAR BOTÓN "Ver X viviendas"
    // ============================================
    const applyBtn = document.getElementById('mobile-apply-filters');
    if (applyBtn) {
        const countText = count > 0 ? formattedCount : '0';
        applyBtn.innerHTML = `Ver ${countText} viviendas`;
    }
    
    // Actualizar también el span dentro del botón - CON VERIFICACIÓN
    const resultCountSpan = document.getElementById('mobile-result-count');
    if (resultCountSpan) {
        resultCountSpan.textContent = formattedCount;
    }
// ===== Contador / Sin resultados de ESCRITORIO (encima de los filtros) =====
    const dCount = document.getElementById('result-count-desktop');
    if (dCount) dCount.textContent = formattedCount;

    const dType = document.getElementById('result-type-desktop');
    if (dType) dType.textContent = tipoInmuebleLower;

    const dOperation = document.getElementById('result-operation-desktop');
    if (dOperation) dOperation.textContent = operacion;

    const dHeader = document.getElementById('result-header-desktop');
    const dNoResults = document.getElementById('no-results-message-desktop');
    if (count > 0) {
        if (dHeader) dHeader.style.display = 'block';
        if (dNoResults) dNoResults.style.display = 'none';
    } else {
        if (dHeader) dHeader.style.display = 'none';
        if (dNoResults) dNoResults.style.display = 'block';
    }   
},
        
applyMobileFilters() {
    console.log("🔘 applyMobileFilters llamado");
    const applyBtn = document.getElementById('mobile-apply-filters');
    if (applyBtn) {
        applyBtn.innerHTML = 'Filtrando...';
        applyBtn.disabled = true;
    }
    
    this.submiteo(true);
    
    setTimeout(() => {
        $('#mobileFiltersModal').modal('hide');
        if (applyBtn) {
            applyBtn.disabled = false;
            const count = this.dataFilter ? this.dataFilter.length : 0;
            applyBtn.innerHTML = `Ver ${count.toLocaleString()} viviendas`;
        }
    }, 300);
},
        
        clearMobileFilters() {
            // Limpiar todos los filtros
            this.form = {
                tipoinmueble: 'Pisos y casas',
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
                qualities: [],
                room: [],
                building: [],
                ambient: [],
                heating: [],
                access2: [],
                access: [],
                region: '',
                date: '',
                user: '',
                propiedad_tamano: '',
                tamano: '',
                contract: ''
            };
            
            // Resetear textos de los botones
            this.priceText = 'Precio';
            this.sizeText = 'Tamaño';
            this.bedroomsText = 'Dormitorio(s)';
            this.badroomsText = 'Baño(s)';
            this.counterFilters = 0;
            
            this.submiteo(true);
            $('#mobileFiltersModal').modal('hide');
            this.updateMobileResults();
        },
        
toggleMapView() {
    if (this.currentView === 'list') {
        this.currentView = 'map';
        // Mostrar mapa, ocultar lista
        $('.properties').hide();
        $('.map-pro').show();
        $('#btn-map-mobile').html('<i class="fas fa-list" style="margin-right: 5px;"></i> Lista');
        
        // ============================================
        // RECARGAR EL MAPA CON LOS DATOS FILTRADOS
        // ============================================
        console.log("🗺️ Cambiando a vista mapa con", this.dataFilter.length, "propiedades");
        
        // Asegurar que los datos del mapa estén actualizados
        const dataToShow = this.dataFilter.length > 0 ? this.dataFilter : this.dataCounter;
        window.cardData = dataToShow;
        
        // Limpiar markers existentes
        if (typeof window.clearAllMarkers === 'function') {
            window.clearAllMarkers();
        } else {
            if (window.markerDB && window.markerDB.length > 0) {
                window.markerDB.forEach(marker => {
                    if (marker && marker.setMap) {
                        marker.setMap(null);
                    }
                });
                window.markerDB = [];
            }
            if (window.advancedMarkers) {
                window.advancedMarkers.clear();
            }
            if (window.makekDB && window.makekDB.length > 0) {
                window.makekDB.forEach(marker => {
                    if (marker && marker.setMap) {
                        marker.setMap(null);
                    }
                });
                window.makekDB = [];
            }
        }
        
        // Crear nuevos markers
        if (typeof window.reload_makers === 'function') {
            console.log("🔄 Recargando mapa con", dataToShow.length, "propiedades");
            window.reload_makers(dataToShow);
        } else if (typeof reload_makers === 'function') {
            reload_makers(dataToShow);
        } else if (typeof createMarkers === 'function') {
            createMarkers();
        }
        
        // Ajustar tamaño del mapa
        setTimeout(() => {
            if (window.map && typeof google !== 'undefined') {
                google.maps.event.trigger(window.map, 'resize');
            }
        }, 300);
        
    } else {
        this.currentView = 'list';
        // Mostrar lista, ocultar mapa
        $('.properties').show();
        $('.map-pro').hide();
        $('#btn-map-mobile').html('<i class="fas fa-map" style="margin-right: 5px;"></i> Mapa');
        $('#property_floating_box').hide();
    }
},
        
        toggleRelevance() {
            // Implementar ordenación por relevancia
            const currentOrder = this.dataFilter;
            // Ordenar por... (puedes implementar diferentes criterios)
            // Por ejemplo: por precio, por antigüedad, etc.
            alert('Funcionalidad de relevancia - Próximamente');
        },
    toggleFilter(field, value, checked) {
        if (!this.form[field]) {
            this.$set(this.form, field, []);
        }
        if (checked) {
            if (!this.form[field].includes(value)) {
                this.form[field].push(value);
            }
        } else {
            const index = this.form[field].indexOf(value);
            if (index > -1) {
                this.form[field].splice(index, 1);
            }
        }
        // Aplicar filtros inmediatamente
        this.reseteo();
    }        
        
    },
watch: {
    dataFilter: {
        handler: function(newData, oldData) {
            console.log("📊 dataFilter cambió:", newData ? newData.length : 0, "propiedades");
            this.updateMobileResults();
            
            // Si el mapa está visible, actualizarlo
            if (this.currentView === 'map' && newData) {
                window.cardData = newData;
                
                // Limpiar markers existentes
                if (window.clearAllMarkers) {
                    window.clearAllMarkers();
                } else if (window.markerDB) {
                    window.markerDB.forEach(marker => {
                        if (marker && marker.setMap) {
                            marker.setMap(null);
                        }
                    });
                    window.markerDB = [];
                    if (window.advancedMarkers) {
                        window.advancedMarkers.clear();
                    }
                } else if (window.makekDB) {
                    window.makekDB.forEach(marker => {
                        if (marker && marker.setMap) {
                            marker.setMap(null);
                        }
                    });
                    window.makekDB = [];
                }
                
                // Recargar markers
                if (typeof window.reload_makers === 'function') {
                    window.reload_makers(newData);
                } else if (typeof reload_makers === 'function') {
                    reload_makers(newData);
                } else if (typeof createMarkers === 'function') {
                    createMarkers();
                }
            }
        },
        deep: true
    }
}
        });
        
// ============================================
// FUNCIÓN GLOBAL DE RESPALDO PARA RECARGAR EL MAPA
// ============================================
window.forceRefreshMap = function(data) {
    console.log("🔄 Forzando refresco del mapa con", data ? data.length : 0, "propiedades");
    
    if (!data) {
        data = window.cardData || [];
    }
    
    window.cardData = data;
    
    // Limpiar markers
    if (window.markerDB && window.markerDB.length > 0) {
        window.markerDB.forEach(marker => {
            if (marker && marker.setMap) {
                marker.setMap(null);
            }
        });
        window.markerDB = [];
    }
    if (window.advancedMarkers) {
        window.advancedMarkers.clear();
    }
    
    // Recrear markers
    if (typeof createMarkers === 'function') {
        createMarkers();
    } else if (typeof reload_makers === 'function') {
        reload_makers(data);
    } else if (typeof window.reload_makers === 'function') {
        window.reload_makers(data);
    } else {
        console.error("❌ No se encontró función para crear markers");
    }
};

// Exponer la instancia de Vue globalmente
window.filterVue = filter;
    </script>
</body>

</html>
