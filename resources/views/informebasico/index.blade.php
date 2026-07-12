@extends('voyager::master')

@section('page_title', 'Informe basico')

@section('page_header')
    {{-- hago el include para poder hacer la traducion de esta sesssion --}}
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
<main class="container">
    <div class="page-header">
        <h1>Informe Basico</h1>
         {{-- {{dd(request()->route()->parameters)}} --}}
        
    </div>
    <div class="panel" id="form"  style="padding: 1.5rem;">
        <nav role="searchbox">
            <label for="numero_dormitorio">Referencia</label>
            <v-select label="id" :filterable="false" v-model="reference" :options="options" @search="onSearch">
                <template slot="no-options">Buscando referencia..</template>
                <template slot="option" slot-scope="option">
                    <div class="d-center">@{{option.id}}</div>
                </template>
                <template slot="selected-option" scope="option">
                    <div class="selected d-center">@{{option.id}}</div>
                </template>
            </v-select>
        </nav>

        
        <main class="page-content settings"  v-if="reference != null">    
            <hr>
            <h2 style="text-align: center;text-transform: uppercase;">
                Informe 
                <span v-show="reference.is_sale == '1'">Venta</span>
                <span v-show="reference.is_sale == '0'">Alquiler</span>
                <span v-show="reference.tipo_inmueble == 'Pisos y casas'"> de Pisos y casas</span>
                <span v-show="reference.tipo_inmueble == 'Habitaciones'"> de Habitaciones</span>				
				<span v-show="reference.tipo_inmueble == 'Local/Oficina'"> de Local/Oficina</span>
            </h2>
            @include('informebasico.includes.form')
        </main>

        <div class="modal fade" id="mapModal" tabindex="-1" role="dialog" ref="vuemodal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" placeholder="Lugares" class="form-control" id="searchMap">
                        </div>
                    </div>

                    <div class="container">
                        <div class="container">
                            <div id="map_canvas" style="width:100%; height:300px;"></div>
                        </div>
                    </div>

                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">
    <style>
        legend {
            border-bottom: none;
            padding-top: 1rem;
        }
        .form-fieldset fieldset:not(:first-child) legend {
            border-top: 1px solid #e5e5e5;
        }
        .pac-container {
            background-color: #FFF;
            z-index: 20010;
            position: fixed;
            display: inline-block;
            float: left;
        }
        .modal{
            z-index: 20000;   
        }
        .modal-backdrop{
            z-index: 10;        
        }?
        

    </style>
@stop

@section('javascript')
    {{-- Vue and Axios --}}
    <script src="{{ asset('js/application.js') }}"></script>
    <script src="https://unpkg.com/vue-select@latest"></script>
    {{-- Sweetalert --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    {{-- <script src="https://unpkg.com/axios/dist/axios.min.js"> </script> --}}
    <!--<script src="//maps.googleapis.com/maps/api/js?key=AIzaSyC6c9CV5eg2Tc1nfcKacjp7AVySHeHBjdU&libraries=places"></script>-->
	<!--<script src="//maps.googleapis.com/maps/api/js?key=AIzaSyCRPcquinY1U6_qxkfRlFENFwUEtTIs_-4&libraries=places"></script>-->
	<!--<script src="//maps.googleapis.com/maps/api/js?key=AIzaSyCRPcquinY1U6_qxkfRlFENFwUEtTIs_-4&libraries=places"></script>-->
	<!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD6My-zzN0_vzu9t2xibmK18m5QH1bS0-M&libraries=places"></script>-->
	
	   <!-- <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRPcquinY1U6_qxkfRlFENFwUEtTIs_-4&libraries=places"
        async defer></script>-->
	<script src="//maps.googleapis.com/maps/api/js?key=AIzaSyDZILGdMqrThTYKDDsbolOgLF9fm4lrcfA&libraries=places"></script>	
    <script type="text/javascript">
        Vue.component('v-select', VueSelect.VueSelect);

        var base_url = "{{ url('/') }}";

        var form =  new Vue({
            el: '#form',
            
            data() {
                return {
                    reference: null,
                    options: [],
                    direccion:'',
                    title: 'Informe Basico',
                    form: {},
                    precieFormar:null,
                    price: 0,
                    idfilter:'',
                    idOrientacion:'',
                    dataOrientacion:[],
                    caparepresentante: '',
                    estadoInmueble:'',
                    copiedLink: null  // ← AÑADIR ESTA LÍNEA
                }
            },

               created() {

                if(navigator.geolocation){

                     navigator.geolocation.getCurrentPosition(c => {
                      var lat =c.coords.latitude;
                      var long=c.coords.longitude;
                      var dataDirecciones= `${lat},${long}`;
                       var del = this;    
                      del.direccion= dataDirecciones; 
                        
                 });

               } 

            },
            watch: {
                reference: {
                    handler(val, oldVal) {
                         this.idOrientacion= val.id; 
                        //let bedrooms = val.bedrooms //val.detalles.filter((item) => item.tamano_aproximado_dormitorio != null);
                        //let bathrooms = val.bathrooms//val.detalles.filter((item) => item.tamano_aprox_banos != null);
                        
// Agregar dentro del watch de reference, junto con los demás campos
this.form.garaje_comprar = val.garaje_comprar;
this.form.precio_compra_garaje = val.precio_compra_garaje > 0 ? val.precio_compra_garaje : 0;
this.form.garaje_alquilar = val.garaje_alquilar;
this.form.precio_alquilar_garaje = val.precio_alquilar_garaje > 0 ? val.precio_alquilar_garaje : 0;

                        this.estadoInmueble = val.estado_inmueble;
                        
                        this.form.reference = val.id;
                        this.idfilter=this.form.reference;
                        //this.form.barrios= val.barrios;
                        this.form.plazo_escritura= val.plazo_escritura;
                        this.form.comision_iamoving= val.comision_iamoving;
                        this.form.comision_iva = val.comision_iva>0 ? 1 : 0 ;
                        this.form.arras= val.arras;
                        this.form.plazo_formalizar= val.plazo_formalizar;
                        this.form.municipio= val.municipio;

                        
						this.form.tipo_dni_agencia= val.tipo_dni_agencia;
                        this.form.dni_agencia= val.dni_agencia;
                        this.form.nombre_agencia= val.nombre_agencia;
                        this.form.email_agencia=val.email_agencia;
                        this.form.telefono_agencia=val.telefono_agencia;
                        this.form.agencia_aceptar=val.agencia_aceptar; 
						

						
						/// new andres
                        /*this.form.tipo_dni= val.tipo_dni;
                        this.form.dni= val.dni;
                        this.form.nombre= val.nombre;
                        this.form.email=val.email;
                        this.form.telefono=val.telefono;*/
                        this.form.propetario=val.propetario;

                        this.form.pago_unico=val.pago_unico;
                        this.form.iva_pago_unico=val.iva_pago_unico>0 ? 1 : 0;	
					

                        this.form.tipo_dni_e= val.tipo_dni_e;
                        this.form.dni_e= val.dni_e;
                        this.form.nombre_e= val.nombre_e;
                        this.form.email_e=val.email_e;
						this.form.email_visita=val.email_visita;
                        this.form.telefono_e=val.telefono_e;
                        this.form.propetario_e=val.propetario_e;

                        /*this.form.tipo_dni_iampro= val.tipo_dni_iampro;
                        this.form.dni_iampro= val.dni_iampro;
                        this.form.nombre_iampro= val.nombre_iampro;
                        this.form.email_iampro=val.email_iampro;
                        this.form.telefono_iampro=val.telefono_iampro;
                        this.form.iampro_aceptar=val.iampro_aceptar;    */
                                            
                        this.form.numero= val.numero_direccion;
                        this.form.time= val.fecha_de_alta;


                        this.form.price_property =val.propiedad_precio;
                        this.form.bedrooms = val.bedrooms;
                        this.form.meters = val.square_meters;
                        this.form.study = val.estudio>0 ? 1 : 0 ;
                        this.form.loft = val.loft>0 ? 1 : 0 ;
                        this.form.apartment = val.apartamento>0 ? 1 : 0 ;
                        this.form.floor = val.piso>0 ? 1 : 0 ;
                        this.form.chalet = val.chalet>0 ? 1 : 0 ;
                        this.form.casa = val.casa>0 ? 1 : 0 ;
                        this.form.low = val.bajo>0 ? 1 : 0 ;
                        this.form.penthouse = val.atico>0 ? 1 : 0 ;
                        this.form.duplex = val.duplex>0 ? 1 : 0 ;
                        //this.form.address = this.direccion;
                        this.form.latitud = val.latitud;
                        this.form.longitud = val.longitud;
                        this.form.road = val.road;
                        this.form.road_real = val.road_real;
                        this.form.trastero_numero = val.trastero_numero;
                        this.form.garaje_numero = val.garaje_numero;
                        this.form.bathrooms = val.bathrooms;
						this.form.aseos = val.aseos;
                        this.form.contract = val.contrato;
						this.form.tiempo_maximo = val.tiempo_maximo;	
						
                        this.form.state_property = val.propiedad_estado;
                        this.form.furnished = val.amueblada;
						//
						this.form.tipo_suelo = val.tipo_suelo;
						this.form.tipo_pared = val.tipo_pared;
						this.form.pintura_estado = val.pintura_estado;
						this.form.codigo_postal = val.codigo_postal;
						//
						this.form.habitacion_vacia = val.habitacion_vacia;
						//
						this.form.city = val.ciudad_inmueble;
						//this.form.tipo_inmueble = val.tipo_inmueble;
						
                        this.form.orientation = val.orientacion;
                        this.form.home_rental = val.alquiler_casa;
                        this.form.departure_date = val.fecha_salida;
                        this.form.exterior = val.exterior>0 ? 1 : 0 ;
                        this.form.inside = val.interior>0 ? 1 : 0 ;
                        this.form.terrace = val.terraza>0 ? 1 : 0 ;
                        this.form.balcony = val.balcon>0 ? 1 : 0 ;
                        this.form.patio = val.patio>0 ? 1 : 0 ;
                        this.form.important_floor = val.piso_importante;
						this.form.plantas_edificio = val.plantas_edificio;
                        this.form.number_apartment = val.number_apartment;
                        this.form.lift = val.lift>0 ? 1 : 0 ;
                        this.form.ventana_climalit = val.ventana_climalit>0 ? 1 : 0 ;
                        this.form.ramp = val.rampa>0 ? 1 : 0 ;
                        this.form.baby_cart_lift = val.bebe_rampa>0 ? 1 : 0 ;
						//portero
						this.form.portero = val.portero>0 ? 1 : 0;
						this.form.video_portero = val.video_portero>0 ? 1 : 0;
						//
						//
						//
						this.form.numero_escaparates = val.numero_escaparates;
						this.form.plantas_local = val.plantas_local;
						this.form.diafano = val.diafano>0 ? 1 : 0;
						this.form.divido_mamparas = val.divido_mamparas>0 ? 1 : 0;
						this.form.divido_tabiques = val.divido_tabiques>0 ? 1 : 0;
						this.form.salida_humos = val.salida_humos>0 ? 1 : 0;
						this.form.pie_calle = val.pie_calle>0 ? 1 : 0;
						this.form.centro_comercial = val.centro_comercial>0 ? 1 : 0;
						this.form.entreplanta = val.entreplanta>0 ? 1 : 0;
						this.form.subterraneo = val.subterraneo>0 ? 1 : 0;
						this.form.puerta_seguridad = val.puerta_seguridad>0 ? 1 : 0;
						this.form.sistema_alarma = val.sistema_alarma>0 ? 1 : 0;
						this.form.circuito_seguridad = val.circuito_seguridad>0 ? 1 : 0;
						this.form.almacen = val.almacen>0 ? 1 : 0;
						this.form.esquina = val.esquina>0 ? 1 : 0;
						this.form.numero_ascensores = val.numero_ascensores;
						this.form.montacargas = val.montacargas>0 ? 1 : 0;
						//plantas chalet
						this.form.plantas_chalet = val.plantas_chalet;
						this.form.adosado_chalet = val.adosado_chalet;
						//
                        this.form.heating = val.calefaccion;
                        this.form.incluido_comunidad = val.incluido_comunidad;
						this.form.plazas_garaje = val.plazas_garaje;
						//this.form.plazas_garaje = val.plazas_garaje>0 ? val.plazas_garaje : 0;
						this.form.orientacion_solar = val.orientacion_solar;
						
                        this.form.water_boiler = val.calentador_agua;
                        this.form.pets = val.mascotas_no>0 ? 1 : 0 ;
                        this.form.storekeepers = val.tenderos>0 ? 1 : 0 ;
                        this.form.air_conditioner = val.aire_acondicionado>0 ? 1 : 0 ;
                        this.form.suite_room = val.suite>0 ? val.suite: 0;
                        this.form.dishwasher = val.lavavajillas>0 ? 1 : 0 ;
                        this.form.oven = val.horno>0 ? 1 : 0 ;
                        this.form.energy_certificate = val.certificado_energetico;
                        this.form.expenses_included_heating = val.gastos_incluido_calentamiento>0 ? 1 : 0 ;
                        this.form.expenses_included_water = val.gastos_incluido_agua>0 ? 1 : 0 ;
                        this.form.expenses_included_light = val.gastos_incluido_luz>0 ? 1 : 0 ;
                        this.form.expenses_included_gas = val.gastos_incluidos_gas>0 ? 1 : 0 ;
                        this.form.expenses_included_garbage = val.gastos_incluidos_basura>0 ? 1 : 0 ;
                        this.form.expenses_included_community = val.gastos_incluido_comunidad>0 ? 1 : 0 ;
                        this.form.expenses_included_ibi = val.gastos_incluido_ibi>0 ? 1 : 0 ;
                        this.form.gastos_incluido_tbasura = val.gastos_incluido_tbasura>0 ? 1 : 0 ;
                        this.form.expenses_included_internet = val.gastos_incluido_internet>0 ? 1 : 0 ;
                        this.form.water_expenses = val.gastos_agua;
                        this.form.garbage_expenses = val.gastos_basura;
                        this.form.community_expenses = val.gastos_comunidad;
                        this.form.ibi_expenses = val.gastos_ibi;
                        this.form.gastos_tbasura = val.gastos_tbasura;
                        this.form.yard = val.jardin>0 ? 1 : 0 ;
                        this.form.swimming_pool = val.piscina>0 ? 1 : 0;
                        this.form.gym = val.gym>0 ? 1 : 0;
                        this.form.sauna = val.sauna>0 ? 1 : 0;
                        this.form.sport_zone = val.zona_deportiva>0 ? 1 : 0;
                        this.form.childish_zone = val.zona_infantil>0 ? 1 : 0;
                        this.form.garage_included_price = val.garaje_incluido_precio>0 ? 1 : 0;
						this.form.garage_two_places = val.garaje_dos_plazas>0 ? 1 : 0;
                        this.form.garage_option = val.garaje_opcion>0 ? 1 : 0;
                        this.form.testero_included = val.testero_incluido>0 ? 1 : 0;
                        this.form.storage_room_option_building = val.opcion_trastero_edificio>0 ? 1 : 0;
                        this.form.approximate_cost_garages = val.aproximate_cost_garages>0 ? val.aproximate_cost_garages : 0;
                        this.form.venta_cost_garage = val.venta_cost_garage>0 ? val.venta_cost_garage : 0;                  
                        this.form.antiquity_building = val.antiguedad_edificio;
                        this.form.price = val.precio;
                        this.form.bail = val.fianza;
                        this.form.video_primary = val.video_primary;
                        this.precieFormar= val.propiedad_precio;

                        this.form.calendar = val.calendar ? val.calendar.split(', ') : [];
                        this.form.schedule = val.schedule;
                        this.form.published = val.published>0 ? 1 : 0;
                        this.form.alquiler_aproximado = val.alquiler_aproximado;
                        this.form.condiciones = val.condiciones;
						//
						//this.form.comision_inmobiliaria = val.comision_inmobiliaria;						
						//this.form.propietario_inmobiliaria = val.propietario_inmobiliaria;
						//this.form.tipo_plan = val.tipo_plan;
						//
                        this.form.inmueblestate = val.estado_inmueble;
						this.form.comentario_inmueble = val.comentario_inmueble;
						this.form.comentario_alquiler_aprox = val.comentario_alquiler_aprox;
						
						this.form.hora_manana = val.hora_manana;
						this.form.hora_comida = val.hora_comida;
						this.form.hora_tarde = val.hora_tarde;
						this.form.minuto_manana = val.minuto_manana;
						this.form.minuto_comida = val.minuto_comida;
						this.form.minuto_tarde = val.minuto_tarde;
						this.form.flexibilidad = val.flexibilidad;
						
						this.form.hora_manana_hasta = val.hora_manana_hasta;
						this.form.hora_comida_hasta = val.hora_comida_hasta;
						this.form.hora_tarde_hasta = val.hora_tarde_hasta;
						this.form.minuto_manana_hasta = val.minuto_manana_hasta;
						this.form.minuto_comida_hasta = val.minuto_comida_hasta;
						this.form.minuto_tarde_hasta = val.minuto_tarde_hasta;
						
						//Durante todo el día
						this.form.hora_dia = val.hora_dia;
						this.form.minuto_dia = val.minuto_dia;
						this.form.hora_dia_hasta = val.hora_dia_hasta;
						this.form.minuto_dia_hasta = val.minuto_dia_hasta;
						
						this.form.sin_burocracia = val.sin_burocracia>0 ? 1 : 0;
						//alert(val.anuncio_basico);
						this.form.anuncio_basico = val.anuncio_basico>0 ? 1 : 0;
						//alert(val.iamoving_pro);
						this.form.iamoving_pro = val.iamoving_pro>0 ? 1 : 0;	
						this.form.cobrar_visita = val.cobrar_visita>0 ? 1 : 0;	
						this.form.email_enviado = val.email_enviado;
						
						
						
						
						//alert('hola2');
						 //
						 
						/*//if (document.getElementById('anuncio_basico')!= null)
						//{
							if (this.form.anuncio_basico  == 1)
							  {
								document.getElementById('iamoving_pro').checked=false;
								document.getElementById('cobrar_visita').checked=false;
								document.getElementById('datos_edificio').style.display = "block";
								document.getElementById('garaje_trastero').style.display = "block";
								document.getElementById('garaje_y_trastero').style.display = "block";
								document.getElementById('capadisponible').style.display = "none";
								document.getElementById('capacalendario').style.display = "none";
								alert('hola');
								document.getElementById('capaburocracia').style.display = "none";
							  }
						//}
						//if (document.getElementById('iamoving_pro')!= null)
						//{
							if (this.form.iamoving_pro  == 1)
							 {

								if (document.getElementById('anuncio_basico')!= null)
								{									  
									document.getElementById('anuncio_basico').checked=false;
								}
								 document.getElementById('datos_edificio').style.display = "none";
								 document.getElementById('garaje_trastero').style.display = "none";
								 document.getElementById('garaje_y_trastero').style.display = "none";
								 document.getElementById('capadisponible').style.display = "block";
								 document.getElementById('capacalendario').style.display = "block";
								 alert('hola1');
								 document.getElementById('capaburocracia').style.display = "block";
							  }						  
						//}*/
						/*if (document.getElementById('dni_e')!= null || document.getElementById('nombre_e')!= null 
						|| document.getElementById('email_e')!= null || document.getElementById('telefono_e')!= null)
						{
							 document.getElementById('caparepresentante').style.display = "block";
						}
						else
						{
							//if (document.getElementById('caparepresentante')!=null)
								document.getElementById('caparepresentante').style.display = "none";
						}*/
                    },
                    deep: true
                }
            },
            methods: {
                onSearch(search, loading) {
                    loading(true);
                    						//alert('SI0');
                    this.search(loading, search, this);
                },
                onEstadoChange(event){
                    console.log(this.form.inmueblestate);
                    this.estadoInmueble = this.form.inmueblestate;
                },
                search: _.debounce((loading, search, vm) => {
                    axios.post(base_url + '/reportAll', {search}).then(response => {
                        vm.options = response.data;
                   //alert('SI1');
                    }).catch(error => {
                        console.log(error);
                    }).then(() => {
                        loading(false);
						//alert('SI2');
                    });
                }, 350),
                onSubmit() {
                    axios.post('{{route('voyager.informebasico.store')}}', this.form)
                    .then(response => {
                        swal(this.title, `Referencia #${this.form.reference} actualizada`, "success");
						 window.setTimeout(function(){ location.reload();} ,2000);
                    }).catch(error => {
                        if (error.response.status === 422) {
                            swal(this.title, error.response.data.message, 'error');
                        }
                        else {
                            swal(this.title, error.response.data.message, 'error');
                        }
                    })
                },
onGarajeComprarChange() {
    if (!this.form.garaje_comprar || this.form.garaje_comprar === '') {
        this.form.precio_compra_garaje = 0;
    }
    // Forzar actualización
    this.$forceUpdate();
},

onGarajeAlquilarChange() {
    if (!this.form.garaje_alquilar || this.form.garaje_alquilar === '') {
        this.form.precio_alquilar_garaje = 0;
    }
    // Forzar actualización
    this.$forceUpdate();
},
    // ← AÑADIR ESTE MÉTODO AQUÍ
    copyToClipboard(text, linkId) {
        // Crear un elemento temporal para copiar el texto
        const textarea = document.createElement('textarea');
        textarea.value = text;
        textarea.style.position = 'fixed';
        textarea.style.opacity = '0';
        document.body.appendChild(textarea);
        
        // Seleccionar y copiar el texto
        textarea.select();
        textarea.setSelectionRange(0, 99999); // Para dispositivos móviles
        
        try {
            document.execCommand('copy');
            
            // Mostrar mensaje de éxito
            this.copiedLink = linkId;
            
            // Ocultar mensaje después de 3 segundos
            setTimeout(() => {
                this.copiedLink = null;
            }, 3000);
            
        } catch (err) {
            console.error('Error al copiar al portapapeles:', err);
            swal('Error', 'No se pudo copiar al portapapeles', 'error');
        }
        
        // Eliminar el elemento temporal
        document.body.removeChild(textarea);
    },
    // FIN DEL MÉTODO AÑADIDO
    
                orientacionFuncion(){
                    return axios.get(base_url + '/api/filter-data-meters/'+this.idOrientacion).then((res)=>{
                            //console.log(res.data);
                            if(res.data){
                            return this.dataOrientacion= res.data.data;
                            }
                            

                    }); 
                },
                initMap(){
                    //console.log("Init Map")
                    let myLatlng;
                    let map;
                    let marker;
                    let searchBox;
                    var address = '';
                    var geocoder = new google.maps.Geocoder();

                    var producion="https://www.iamoving.com/img/marker.ico";
                    var desarrollo="https://www.iamoving.com/img/marker.ico";

                    var componentForm = {
                        street_number: 'short_name',
                        route: 'long_name',
                        locality: 'long_name',
                        administrative_area_level_1: 'short_name',
                        country: 'long_name',
                        postal_code: 'short_name'
                    };
                    
                    myLatlng = new google.maps.LatLng(40.4381307,-3.8199627);

                    let myOptions = {
                        zoom: 14,
                        zoomControl: true,
                        center: myLatlng,
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    };
                    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
                    marker = new google.maps.Marker({
                        position: myLatlng,
                        map: map,
                        draggable: true,
                        icon: desarrollo
                    });

                    

                    function geocodePosition(pos) {
                        console.log("geocode");
                        geocoder.geocode({
                            latLng: pos
                        }, function(responses) {
                            console.log(responses);
                            if (responses && responses.length > 0) {
                                
                                //marker.formatted_address = responses[0].formatted_address;
                                form.form.address = responses[0].formatted_address;
                                console.log(responses[0].formatted_address);
                            } else {
                                form.form.address = "";
                            }
                        });
                    }


                    function setAddress(event){
                        form.form.latitud = event.latLng.lat().toString();
                        form.form.longitud = event.latLng.lng().toString();
                        document.getElementById("latitud").value = event.latLng.lat();
                        document.getElementById("longitud").value = event.latLng.lng();

                        geocodePosition(event.latLng);
                    }

                    marker.addListener('drag',setAddress);

                    searchBox = new google.maps.places.Autocomplete(document.getElementById("searchMap"));
                    google.maps.event.addListener(searchBox,'place_changed',function(){
                        var place = searchBox.getPlace();
                        var bounds = new google.maps.LatLngBounds();
                        bounds.extend(place.geometry.location);
                        marker.setPosition(place.geometry.location);
                        map.panTo(place.geometry.location);
                        form.form.latitud = place.geometry.location.lat().toString();
                        form.form.longitud = place.geometry.location.lng().toString();
                        document.getElementById("latitud").value = place.geometry.location.lat();
                        document.getElementById("longitud").value = place.geometry.location.lng();

                        geocodePosition(place.geometry.location);

                    });
                    
                }
            },
            computed: {
                estadoSelected(){
                    return this.form.inmueblestate;
                },
                roomOrientation() {
                    //return this.reference.detalles.find(detalle => detalle.type == 0).orientacion_salon;

                },
                bedroomOrientation() {
                    //return this.reference.detalles.find(detalle => detalle.type == 2).orientacion_dormitorio;
                },

                orientacionSalon(){
                    // val
                       if(this.idOrientacion){
                         // return "papu";
                         var num=5;
                         var urlPro="https://www.iamoving.com/api/filter-data-meters/"+num;
                         return this.orientacionFuncion();

                       }
                          
                     
                },
            },
            mounted: function() {
                $(this.$refs.vuemodal).on('shown.bs.modal', this.initMap)
                $(this.$refs.vuemodal).on('hidden.bs.modal', this.hideMap)

                google.maps.event.addDomListener(window, 'resize', this.initMap);
                google.maps.event.addDomListener(window, 'load', this.initMap);
				//alert('dos0');
            },
			updated: function () {
			  this.$nextTick(function () {
				// Code that will run only after the
				// entire view has been re-rendered
				
							if (this.form.anuncio_basico  == 1)
							  {
								  //alert('anuncio_basico');
								/*if (document.getElementById('iamoving_pro')!= null)
								{
									document.getElementById('iamoving_pro').checked=false;
								}*/
								if (document.getElementById('cobrar_visita')!= null)
								{								
									document.getElementById('cobrar_visita').checked=false;
								}
								if (document.getElementById('datos_edificio')!= null)
								{									
									document.getElementById('datos_edificio').style.display = "block";
								}
								/*if (document.getElementById('garaje_trastero')!= null)
								{
									document.getElementById('garaje_trastero').style.display = "block";
								}
								if (document.getElementById('garaje_y_trastero')!= null)
								{								
									document.getElementById('garaje_y_trastero').style.display = "block";
								}*/
								if (document.getElementById('capadisponible')!= null)
								{																
									document.getElementById('capadisponible').style.display = "none";
								}
								if (document.getElementById('capacalendario')!= null)
								{										
									document.getElementById('capacalendario').style.display = "none";
								}
								//alert('hola');
								if (document.getElementById('capaburocracia')!= null)
								{									
									document.getElementById('capaburocracia').style.display = "none";
								}
								if (document.getElementById('capaiampro')!= null)
								{										
									document.getElementById('capaiampro').style.display = "block";
								}
								this.form.anuncio_basico=1;
							  }
						//}
						//if (document.getElementById('iamoving_pro')!= null)
						//{
							if (this.form.iamoving_pro  == 1)
							 {
								//alert('iamoving_proiamoving_pro');
								/*if (document.getElementById('anuncio_basico')!= null)
								{									  
									document.getElementById('anuncio_basico').checked=false;
								}*/
								if (document.getElementById('datos_edificio')!= null)
								{								
									document.getElementById('datos_edificio').style.display = "none";
								}
								/*if (document.getElementById('garaje_trastero')!= null)
								{								 
									document.getElementById('garaje_trastero').style.display = "none";
								}
								if (document.getElementById('garaje_y_trastero')!= null)
								{								 
									document.getElementById('garaje_y_trastero').style.display = "none";
								}*/
								if (document.getElementById('capadisponible')!= null)
								{								 
									document.getElementById('capadisponible').style.display = "block";
								}
								 if (document.getElementById('capacalendario')!= null)
								{
									document.getElementById('capacalendario').style.display = "block";
								}
								 //alert('hola1');
								 if (document.getElementById('capaburocracia')!= null)
								{
									document.getElementById('capaburocracia').style.display = "block";
								}
								if (document.getElementById('capaiampro')!= null)
								{										
									document.getElementById('capaiampro').style.display = "none";
								}
								this.form.iamoving_pro=1;
							  }					
			  })
			}



        });


        function checkBasico()
		{
		  var checkbox = document.getElementById('anuncio_basico');
		  if (checkbox.checked != true)
		  {
			  //alert('check');
			  this.form.anuncio_basico=0;
			  document.getElementById('anuncio_basico').checked=false;
			document.getElementById('datos_edificio').style.display = "block";
			/*document.getElementById('garaje_trastero').style.display = "block";
			document.getElementById('garaje_y_trastero').style.display = "block";*/
			document.getElementById('capadisponible').style.display = "block";
			document.getElementById('capacalendario').style.display = "block";
			document.getElementById('capaburocracia').style.display = "none";
			document.getElementById('capaiampro').style.display = "block";
		  }
		  else
		  {
			  //alert('check1');

			if (document.getElementById('iamoving_pro').checked==true)
			{
				alert('Para seleccionar anuncio básico, primero debe quitar Iamoving.com');
				document.getElementById('anuncio_basico').checked=false;
			}
			else
			{
				this.form.anuncio_basico=1;
				document.getElementById('anuncio_basico').checked=true;
				document.getElementById('datos_edificio').style.display = "block";
				/*document.getElementById('garaje_trastero').style.display = "block";
				document.getElementById('garaje_y_trastero').style.display = "block";*/
				document.getElementById('capadisponible').style.display = "none";
				document.getElementById('capacalendario').style.display = "none";
				document.getElementById('capaburocracia').style.display = "none";
				document.getElementById('capaiampro').style.display = "block";
			}
		  }
		}

		function showImportante()
				{
		  var dropdown = document.getElementById('tipo_inmueble');
		  if (dropdown.value != 'Local/Oficina')
		  {
			 // alert('no nave');
			document.getElementById('local').style.display = "none";
		  }
		  else
		  {
			   // alert('Nave');
				document.getElementById('local').style.display = "block";
			//	document.getElementById('local').style.display = "inline";
		  }
		} 
		
		/*function showInfo()
				{
		  var dropdown = document.getElementById('propietario_inmobiliaria');
		  if (dropdown.value == 'Iamoving')
		  {
			 // alert('no nave');
			this.form.email='info@iamoving.com';
			//document.getElementById('email').value = "info@iamoving.com";
			//this.form.email="info@iamoving.com";
			//this.form.email="info@iamoving.com";
			 
		  }
		  else
		  {
			   // alert('Nave');
				//document.getElementById('email').value = "info@iamoving.com";
			//	document.getElementById('local').style.display = "inline";
		  }
		} */		
		
        function checkIamovingPRO()
		{
		  var checkbox = document.getElementById('iamoving_pro');
		  if (checkbox.checked != true)
		  {
			 // alert('check2');
			  this.form.iamoving_pro=0;
			  document.getElementById('iamoving_pro').checked=false;
			document.getElementById('datos_edificio').style.display = "block";
			/*document.getElementById('garaje_trastero').style.display = "block";
			document.getElementById('garaje_y_trastero').style.display = "block";*/
			document.getElementById('capadisponible').style.display = "block";
			document.getElementById('capacalendario').style.display = "block";
			document.getElementById('capaburocracia').style.display = "none";
			document.getElementById('capaiampro').style.display = "block";
		  }
		  else
		  {
			 // alert('check3');
			if (document.getElementById('anuncio_basico').checked==true)
			{
				alert('Para seleccionar iamoving.com, primero debe quitar anuncio básico');
				document.getElementById('iamoving_pro').checked=false;
			}
			else
			{
				 document.getElementById('anuncio_basico').checked=false;
				 this.form.anuncio_basico=0;
				 //this.form.iamoving_pro=1;
				 document.getElementById('iamoving_pro').checked=true;
				 document.getElementById('datos_edificio').style.display = "none";
				 /*document.getElementById('garaje_trastero').style.display = "none";
				 document.getElementById('garaje_y_trastero').style.display = "none";*/
				 //alert('aparece calendario');
				 document.getElementById('capadisponible').style.display = "block";
				document.getElementById('capacalendario').style.display = "block";
				document.getElementById('capaburocracia').style.display = "block";
				document.getElementById('capaiampro').style.display = "none";
			}
		  }
		}        

    </script>
@stop
