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
        <div id="divFilter">
            <p id="loading">Filtrando...</p>
        </div>
        <div id="filter" style="">

            <el-form :model="form" label-position="top" id="formulario" label-width="120px" @submit.prevent="submit">                
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
                                            <div style="text-align:center;"><el-button type="primary" v-if="dataCounter.length > 0" @click="showResults">Ver @{{dataCounter.length}} resultados</el-button></div>
                                        
                                    </div>
                                </template>
                                <!--<el-button slot="reference"  @click="visibleTipoInmueble = !visibleTipoInmueble" style="width:100%">@{{form.tipoinmueble}}</el-button>-->
<!-- Modificación para el botón de Tipo de Inmueble -->
<!--<el-button slot="reference" @click="visibleTipoInmueble = !visibleTipoInmueble" style="width:100%; text-align:center;">
    <span class="d-block text-center">@{{form.tipoinmueble}}</span>
</el-button>                                -->
<!-- Para el botón de Tipo de Inmueble -->
<el-button slot="reference" @click="visibleTipoInmueble = !visibleTipoInmueble" style="width:100%; padding-left: 15px; text-align: left">@{{form.tipoinmueble}}</el-button>

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
                                            
                                            <div style="text-align:center;"><el-button type="primary" v-if="dataCounter.length > 0" @click="showResults">Ver @{{dataCounter.length}} resultados</el-button></div>
                                        </div>
                                    </div>
                                </template>    
                                <el-button slot="reference" @click="visiblePrice = !visiblePrice"  style="width:100%">@{{priceText}}</el-button>
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
                                        <div style="text-align:center;"><el-button type="primary" v-if="dataCounter.length > 0" @click="showResults">Ver @{{dataCounter.length}} resultados</el-button></div>
                                    </div>
                                </template>    
                                <el-button slot="reference" @click="visibleSize = !visibleSize"  style="width:100%">@{{sizeText}}</el-button>
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
                                            <el-checkbox label="+5" @change="reseteo"></el-checkbox>
                                        </el-checkbox-group>
                                    </el-form-item>
                                    <div style="text-align:center;"><el-button type="primary" v-if="dataCounter.length > 0" @click="showResults">Ver @{{dataCounter.length}} resultados</el-button></div>
                                </template>
                                
                                <!--<el-button slot="reference" @click="visibleBeds = !visibleBeds"  style="width:100%">@{{bedroomsText}}</el-button>-->
                                <!-- Modificación para el botón de Dormitorios -->
                                  <!--  <el-button slot="reference" @click="visibleBeds = !visibleBeds" style="width:100%; text-align:center;">
                                        <span class="d-block text-center">@{{bedroomsText}}</span>
                                    </el-button>-->
<!-- Para el botón de Dormitorios -->
<el-button slot="reference" @click="visibleBeds = !visibleBeds" style="width:100%; padding-left: 15px; text-align: left">@{{bedroomsText}}</el-button>
                                    
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
                                            <el-checkbox label="+5" @change="reseteo"></el-checkbox>
                                        </el-checkbox-group>
                                    </el-form-item>
                                    <div style="text-align:center;"><el-button type="primary" v-if="dataCounter.length > 0" @click="showResults">Ver @{{dataCounter.length}} resultados</el-button></div>
                                </template>
                                <el-button slot="reference" @click="visibleBads = !visibleBads"  style="width:100%">@{{badroomsText}}</el-button>
                                
                                
                            </el-popover>
                        </el-row>
                    </div>
                    <div class="spacing">
                        <el-row>
                            <el-popover
                                placement="bottom-start"
                                width="100%"
                                trigger="manual"
                                title="Filtros"
                                v-model="visibleFilters"
                            >
                                <template>
                                    <div style="position:absolute; top:12px; left:70px;">
                                        <span class="link-delete" @click="clearFilters">Eliminar filtros</span>
                                    </div>
                                    <div style="position:absolute; top:5px; right:15px;">
                                        <button type="button" class="close" aria-label="Close" @click="visibleFilters = !visibleFilters">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <el-row style="padding:10px;max-height:370px;overflow-y: auto;overflow-x: hidden;">
                                        <el-row v-if="counterFilters > 0">
                                            <el-col>
                                                <span @click="clearFilters" class="link">Borrar filtros</span>
                                            </el-col>
                                        </el-row>
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
                                                            <el-checkbox label="Atico"  id="atico_vivienda"  @change="reseteo"></el-checkbox>
                                                            <el-checkbox label="Bajo"   id="bajo_vivienda" @change="reseteo"></el-checkbox>
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
                                                            <el-checkbox label="Horno" @change="reseteo"></el-checkbox>
                                                            <el-checkbox label="Lavavajillas" @change="reseteo"></el-checkbox>														
                                                    </div>
    
                                                </el-checkbox-group>
                                            </el-form-item>											
                                        </el-row>
                                        <el-row>
                                            <label><strong class="titulo-filter-vuejs">Calefacción</strong></label>
                                            <el-form-item>
                                                <el-checkbox-group class="grop-check-vuejs" v-model="form.heating">
                                                    <el-checkbox value="Individual por gas natural" label="Individual por gas natural"  @change="reseteo"></el-checkbox>
    											<div class="check-filter-vuejs">
                                                    <el-checkbox value="Central" label="Central"  @change="reseteo"></el-checkbox>
    
    												</div>
    												<div class="check-filter-vuejs">
    												<el-checkbox value="Individual por gas natural (Suelo radiante)" label="Individual por gas natural (Suelo radiante)"  @change="reseteo"></el-checkbox>												
    												</div>
                                                </el-checkbox-group>
                                            </el-form-item>
                                        </el-row>
                                        <el-row>
                                            <label> <strong class="titulo-filter-vuejs">Caldera del agua</strong></label>
                                            <el-form-item>
                                                <el-checkbox-group class="grop-check-vuejs" v-model="form.calderaAgua">
                                                    <el-checkbox value="Gas natural" label="Gas natural"  @change="reseteo"></el-checkbox>
                                                    <el-checkbox value="Central" label="Central"  @change="reseteo"></el-checkbox>
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
                                                            <el-checkbox label="Opción de garaje en el mismo edificio"  @change="reseteo">
                                                            </el-checkbox>
                                                            <el-checkbox label="Trastero incluido"  @change="reseteo"></el-checkbox>
                                                        </div>
    
                                                        <div class="check-filter-vuejs">
                                                            <el-checkbox label="Opción de trastero en el mismo edificio"  @change="reseteo">
                                                            </el-checkbox>
                                                        </div>
    
    
    
                                                    </el-checkbox-group>
                                            </el-form-item>
                                        </el-row>
                                    </el-row>
                                    <div style="text-align:center;"><el-button type="primary" v-if="dataCounter.length > 0" @click="showResults">Ver @{{dataCounter.length}} resultados</el-button></div>
                                </template>
                                <el-button slot="reference" @click="visibleFilters = !visibleFilters"  style="width:100%">Filtros <span class="badge badge-pill badge-primary">@{{counterFilters}}</span></el-button>
                            </el-popover>
                        </el-row>
                    </div>
                    <div class='spacing' v-if="user!=null">
                        <button type="button" id="btn-save-filter" class="btn btn-primary">
                            Guardar busqueda
                        </button>
                    </div>
                </div>
            </el-form>           
            

            <div class="box-properties">

                <div class="properties">

                    <div style="height: 800px; overflow-y: scroll;">


                    

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
                    </section>
                </div>
                </div>
                <div class="map-pro">
                    
                    
                    
                    <img src="{{asset('img/marker.ico')}}" style="display: none!important;">
                    <div class="row" id="buscador-estilos">
                        <div class="col-lg-4">
                             <!-- Añade autocomplete="off" para evitar conflictos -->
        <input id="pac-input" name="pac-input" autocomplete="off" class="controls" type="search" placeholder="¿Dónde quieres vivir?">
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
            <div style="position:absolute; top:5px;right:5px">
                <img src="/img/closeb.png" width="15" id="close-pop" />
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
        
        <div class="float-button" id="map-list">
            <img id="img-map-list" src="/img/map_icon.png" />
        </div>
        
        <div class='mobile-btn-save'>
            <button type="button" id="mobile-btn-save-filter" class="btn btn-primary">
                Guardar busqueda
            </button>
        </div>
    
    <!-- Footer section -->
    @include('navigation.footerpro')
    <!-- Footer section end -->
    <!--====== Javascripts & Jquery ======-->
<!-- 1. Cargar datos -->
<script>
    if (typeof window.data === 'undefined') {
        window.data = @json($data);
        console.log("Datos cargados:", window.data ? window.data.length : 0, "propiedades");
    }
</script>

<!-- 2. Cargar Google Maps -->
<script>
    let googleMapsLoaded = false;
    let mapInitializationPending = false;
    
    function loadGoogleMapsAPI() {
        if (googleMapsLoaded) {
            if (typeof initMap === 'function' && !window.map) {
                initMap();
            }
            return;
        }
        
        window.googleMapsCallback = function() {
            console.log('Google Maps API cargada correctamente');
            googleMapsLoaded = true;
            
            if (typeof initMap === 'function') {
                initMap();
            }
        };
        
        const script = document.createElement('script');
        script.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCRPcquinY1U6_qxkfRlFENFwUEtTIs_-4&libraries=marker,places&callback=googleMapsCallback&loading=async&v=beta';
        script.async = true;
        script.defer = true;
        script.onerror = function() {
            console.error('Error al cargar Google Maps API');
        };
        
        const existingScripts = document.querySelectorAll('script[src*="maps.googleapis.com"]');
        if (existingScripts.length === 0) {
            document.head.appendChild(script);
        }
    }
    
    document.addEventListener('DOMContentLoaded', function() {
        if (document.getElementById('map')) {
            setTimeout(loadGoogleMapsAPI, 500);
        }
    });
</script>

<!-- 3. Cargar buscador_buscar.js UNA SOLA VEZ -->
<script src="{{asset('js/buscador_buscar.js')}}"></script>
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
                $("#img-map-list").attr("src","/img/list-icon.png");
            }else{
                $(".properties").show();
                $(".map-pro").hide();
                $("#img-map-list").attr("src","/img/map_icon.png");
                $("#property_floating_box").hide();
            }

        })
        
        $("#close-pop").click(function(){
            $("#property_floating_box").hide();
        })

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
                    htmlFilters: ""
                }
            },
            created() {
                //console.log("Filter created");
				//alert('1');
				console.log("CREATED");
                this.dataFilter = data;
               
            },
            mounted() {
    var intervalId = null;
    // ELIMINAR ESTAS LÍNEAS:
    // const plugin = document.createElement("script");
    // plugin.setAttribute(
    //     "src",
    //     "https://www.iamoving.com/js/buscador_buscar.js"
    // );
    // plugin.async = true;
    // document.head.appendChild(plugin);
    
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
                
                $(document).on('click',"#btn-save-filter", function(){
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
                })
                
                $("#content-filters").html("<ul><li>" + this.form.tipoinmueble + "</li></ul>");
                
                var localStorageFilters = localStorage.getItem("iamoving_filters");
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
                }
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
				    this.dataFilter = this.dataCounter;  
				    reload_makers(this.dataCounter);
				},
				checkFilter(key,filter){
				    return this[filter].includes(key)
				},
				reseteo(e) {
					this.submiteo();
									
				},
				submiteo(autoload) {
                    console.log("SUBMITEA")
                    var jsonFilters = JSON.stringify(this.form);
                    localStorage.setItem("iamoving_filters", jsonFilters);

                    console.log(jsonFilters);
                    let countFiltersText = 1;
                    let textFilters = "<ul>";
                    textFilters += "<li>" + this.form.tipoinmueble + "</li>"; 

					if (this.form.price.trim()=='€'){
						this.form.price='';
	   				}
					
					if (this.form.propiedad_price.trim()=='€'){
						this.form.propiedad_price='';
					}	
					
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
					//
					
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
                    
                    
                     
                    document.getElementById('divFilter').style.display = 'block';
                    
                    axios.post('{{ url("iamovingpro/find") }}/'+this.control+'/' + this.city, this.form).then(response => {
                        console.log(response);
                        //this.dataFilter = response.data;
                        //reload_makers(response.data);
                        if(response.data.length > 0){
                            this.dataCounter = response.data;
                            if(autoload){
                                this.showResults();
                            }
                        }else{
                            this.dataCounter = [];
                            this.showResults();
                            
                        }
                        console.log(this.dataCounter);
                    }).catch(error => {
                        document.getElementById('divFilter').style.display = 'none';
                    }).then(() => {
                        document.getElementById('divFilter').style.display = 'none';
                    
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
                    
                }
            }
        });

      
    </script>
</body>

</html>