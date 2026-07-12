@extends('voyager::master')
{{-- @extends('voyager::master')  de esta forma estiedo la plantilla --}}

@section('page_title', 'Informe detallado')
{{-- cambio los textos --}}

@section('page_header')
@include('voyager::multilingual.language-selector')
{{-- hago el include para poder hacer la traducion de esta sesssion --}}
@stop

@section('content')
    <main class="container"  id="form">
        <div class="page-header">
            <h1>@{{title}}</h1>
        </div>

        <section class="panel" style="padding: 1.5rem;">
            <fieldset>
                {{-- <legend>Proceso</legend> --}}
                <div class="form-group">
                    <label class="radio-inline">
                        <input type="radio" v-model="form.isSale" value="1">Alquiler
                       
                    </label>
                    <label class="radio-inline">
                        <input type="radio" v-model="form.isSale" value="0">Venta
                    </label>
                </div>
            </fieldset>
            <fieldset>
				<!--<div class="form-group"  v-if="form.isSale == '1'">			-->
				<legend>Tipo de inmueble?</legend>
					<div class="form-group"   v-if="form.isSale == '1'">
					<!--<div class="form-group" >-->
						<select name="tipo_inmueble" v-model="form.tipo_inmueble" id="tipo_inmueble" class="form-control">
							<option value="Pisos y casas" selected>Pisos y casas</option>
							<option value="Habitaciones">Habitaciones</option>
							<option value="Local/Oficina">Local/Oficina</option>
						</select>
					</div>
					<div class="form-group"   v-if="form.isSale == '0'">
						<select name="tipo_inmueble" v-model="form.tipo_inmueble" id="tipo_inmueble" class="form-control">
							<option value="Pisos y casas" selected >Pisos y casas</option>
							<!--<option value="Habitaciones">Habitaciones</option>-->
							<option value="Local/Oficina">Local/Oficina</option>
						</select>
					</div>				
			</fieldset>			
    
            <div class="page-content">
                @include('informes.includes.form')
            </div>
        </section>
    </main>
@stop

@section('css')
    <!-- Latest compiled and minified CSS -->
<style>
    .progress {
        height: 25px;
        margin-bottom: 10px;
    }
    
    .progress-bar {
        line-height: 25px;
        font-weight: bold;
        transition: width 0.3s ease;
    }
    
    
    .file-count {
        font-size: 14px;
        color: #666;
    }
.upload-details {
    background: rgba(255, 255, 255, 0.9);
    border-radius: 5px;
    padding: 10px;
    margin-top: 10px;
    border: 1px solid #ddd;
}

.upload-stats {
    background: #fff3cd;
    border-color: #ffeaa7;
    padding: 15px;
    border-radius: 5px;
    margin-bottom: 20px;
}

.upload-stats i {
    color: #f39c12;
    margin-right: 8px;
}

.upload-details small {
    color: #555;
    font-size: 12px;
}

.upload-details .glyphicon {
    margin-right: 5px;
    font-size: 12px;
}

/* Animación para el ícono de carga */
.glyphicon.spinning {
    animation: spin 1s infinite linear;
    -webkit-animation: spin2 1s infinite linear;
}
.image-thumbnail {
    display: inline-block;
    padding: 2px;
    border: 1px solid #ddd;
    border-radius: 4px;
    background: #f8f9fa;
}

.image-placeholder {
    width: 60px;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px dashed #ddd;
    border-radius: 4px;
    background: #f8f9fa;
}
@keyframes spin {
    from { transform: scale(1) rotate(0deg); }
    to { transform: scale(1) rotate(360deg); }
}

@-webkit-keyframes spin2 {
    from { -webkit-transform: rotate(0deg); }
    to { -webkit-transform: rotate(360deg); }
}    
</style>    
@stop

@section('javascript')
    {{-- Vue and Axios --}}
    <!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.17/vue.js"></script>-->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.17/vue.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    {{-- fin inicio logica formulario --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://unpkg.com/vue-upload-component"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        Vue.component('file-upload', VueUploadComponent)
        
        const form =  new Vue({
            components: {
                FileUpload: VueUploadComponent
            },
            el: '#form',
            data() {

                return {
                    livingRoomBedroomsClone: null,
                    formData: new FormData(),
                    bathServicesClone: null,
                    serviceRoomsClone: null,
                    restroomsClone: null,
                    bathroomsClone: null,
					bathrooms1Clone: null,
					bathrooms2Clone: null,
					bathrooms3Clone: null,
					bathrooms4Clone: null,
					bathrooms5Clone: null,
					bathrooms6Clone: null,
                    kitchensClone: null,
                    hallwaysClone: null,
                    bedroomsClone: null,
					bedrooms1Clone: null,
					bedrooms2Clone: null,
					bedrooms3Clone: null,
					bedrooms4Clone: null,
					bedrooms5Clone: null,
					bedrooms6Clone: null,
                    dealersClone: null,
                    salonsClone: null,
					transportesClone: null,
					transportes1Clone: null,
					transportes2Clone: null,
					transportes3Clone: null,
					transportes4Clone: null,
					transportes5Clone: null,
					transportes6Clone: null,
        uploadProgress: 0,
        uploadedFiles: 0,
        totalFiles: 0,
        uploadError: null,
        uploadTimeout: null,
        uploadStartTime: null,
        lastLoaded: 0,
        lastTime: 0,
        uploadSpeed: 0, // KB/s
        estimatedTime: 0, // segundos restantes        
                    loading: false,
                    form: {
                        receiver: {
                            sideboard: null,
                            storage: null,
                            closet: null,
                            type:null,
                            size: null,
                            videos: [],
                            take: null,
                            files: [],
                        },
                        place: {
                            description: null,
                            measure: null,
							units:null,
                            medio: null,
				description_1: null,
				measure_1: null,
				units_1: null,
				medio_1: null,	
				description_2: null,
				measure_2: null,
				units_2: null,
				medio_2: null,	
				description_3: null,
				measure_3: null,
				units_3: null,
				medio_3: null,	
				description_4: null,
				measure_4: null,
				units_4: null,
				medio_4: null,	
				description_5: null,
				measure_5: null,
				units_5: null,
				medio_5: null,
				description_6: null,
				measure_6: null,
				units_6: null,
				medio_6: null,	
				description_7: null,
				measure_7: null,
				units_7: null,
				medio_7: null,
				description_8: null,
				measure_8: null,
				units_8: null,
				medio_8: null,
				description_9: null,
				measure_9: null,
				units_9: null,
				medio_9: null,				
                            videos: [],
                            files: [],
                        },						
                        garage: {
                            description: null,
                            size: null,
							type:null,
                            number: null,
                            situation: null,
                            videos: [],
                            files: [],
                        },
                        boxroom: {
                            description: null,
                            size: null,
                            videos: [],
                            files: [],
                        },	
                        facade: {
                            description: null,
                            videos: [],
                            files: [],
                        },
                        portal: {
                            description: null,
                            videos: [],
                            files: [],
                        },
                        lift: {
                            description: null,
                            number: null,
                            videos: [],
                            files: [],
                        },						
                        swimming: {
                            description: null,

                            videos: [],
                            files: [],
                        },
                        garden: {
                            description: null,
                            videos: [],
                            files: [],
                        },
                        gym: {
                            description: null,
                            videos: [],
                            files: [],
                        },
                        sauna: {
                            description: null,
                            videos: [],
                            files: [],
                        },
                        sports: {
                            description: null,
                            videos: [],
                            files: [],
                        },
                        childarea: {
                            description: null,
                            videos: [],
                            files: [],
                        },						
                        salons: [{
                            furniture: {
                                pieceOfFurniture: [],
                                for: null
                            },
                            airConditioner: null,
                            orientation: null,
                            typeOfWindow: {
                                brandNew: null,
                                changed: {
                                    year: null,
                                    month: null
                                },
                                putting: {
                                    year: null,
                                    month: null
                                },
                                windoww: ''
                            },
                            paints: {
                                paintedMakes: {
                                    year: null,
                                    month: null
                                },
                                justPainted: {
                                    year: null,
                                    month: null
                                }
                            },
                            typeOfSoil: {
                                brandNew: null,
                                changed: {
                                    year: null,
                                    month: null
                                },
                                putting: {
                                    year: null,
                                    month: null
                                },
                                type: ''
                            },
							muebles: {
								sofa: null,
								sofa_cama: null,
								tv: null,
								mesa_comedor: null
							},
                            dclimalit: null,
                            painting: null,
                            windoww: null,
                            balcony: null,
                            terrace: null,
                            notes: null,
                            size: null,
                            take: null,
                            wall: null,
                            videos: [],
                            files: []
                        }],
                        kitchens: [{
                            typeOfKitchen: null,
                            typeOfFire: {
                                vitroceramica: null,
								induccion: null,
                                electricPlate: null,
                                dasCylinder: null,
                                naturalGas: null
                            },
                            windoww: null,
                            balcony: null,
                            terrace: null,
                            luggage: {
                                washingMachine: null,
								washingDryer: null,
                                microwaveOven: null,
                                dishwasher: null,
                                extractor: null,
                                fridge: null,
                                dryer: null,
                                oven: null,
								menaje: null,
								lavadero: null
                            },
                            typeOfWindow: {
                                brandNew: null,
                                changed: {
                                    year: null,
                                    month: null
                                },
                                putting: {
                                    year: null,
                                    month: null
                                },
                                windoww: ''
                            },
                            typeOfSoil: {
                                brandNew: null,
                                changed: {
                                    year: null,
                                    month: null
                                },
                                putting: {
                                    year: null,
                                    month: null
                                },
                                type: ''
                            },
                            state: {
                                brandNew: null,
                                reformedAgo: {
                                    year: null,
                                    month: null
                                },
                                state: ''
                            },
                            dclimalit: null,
                            take: null,
                            size: null,
                            videos: [],
                            files: []
                        }],
                        bedrooms: [{
                            airConditioner: null,
                            sizeBedroom: null,
                            orientation: null,
                            typeBed: null,
							canape: null,
                            typeOfWindow: {
                                brandNew: null,
                                changed: {
                                    year: null,
                                    month: null
                                },
                                putting: {
                                    year: null,
                                    month: null
                                },
                                windoww: ''
                            },
                            closet: {
                                closet: '',
                                doors: null
                            },
                            typeOfSoil: {
                                brandNew: null,
                                changed: {
                                    year: null,
                                    month: null
                                },
                                putting: {
                                    year: null,
                                    month: null
                                },
                                type: ''
                            },
                            paints: {
                                paintedMakes: {
                                    year: null,
                                    month: null
                                },
                                justPainted: {
                                    year: null,
                                    month: null
                                }
                            },
							muebles: {
								sofa: null,
								sofa_cama: null,
								tv: null,
								mesa_comedor: null,
								escritorio: null,
								comoda: null
							},							
                            dclimalit: null,
                            painting: null,
                            balcony: null,
                            terrace: null,
                            windoww: null,
                            suite: null,
                            wall: null,
                            take: null,
                            size: null,
                            videos: [],
                            files: []
                        }],
                        bedrooms1: [{
                            airConditioner: null,
                            sizeBedroom: null,
                            orientation: null,
                            typeBed: null,
							canape: null,
                            typeOfWindow: {
                                brandNew: null,
                                changed: {
                                    year: null,
                                    month: null
                                },
                                putting: {
                                    year: null,
                                    month: null
                                },
                                windoww: ''
                            },
                            closet: {
                                closet: '',
                                doors: null
                            },
                            typeOfSoil: {
                                brandNew: null,
                                changed: {
                                    year: null,
                                    month: null
                                },
                                putting: {
                                    year: null,
                                    month: null
                                },
                                type: ''
                            },
                            paints: {
                                paintedMakes: {
                                    year: null,
                                    month: null
                                },
                                justPainted: {
                                    year: null,
                                    month: null
                                }
                            },
							muebles: {
								sofa: null,
								sofa_cama: null,
								tv: null,
								mesa_comedor: null,
								escritorio: null,
								comoda: null
							},							
                            dclimalit: null,
                            painting: null,
                            balcony: null,
                            terrace: null,
                            windoww: null,
                            suite: null,
                            wall: null,
                            take: null,
                            size: null,
                            videos: [],
                            files: []
                        }],	
                        bedrooms2: [{
                            airConditioner: null,
                            sizeBedroom: null,
                            orientation: null,
                            typeBed: null,
							canape: null,
                            typeOfWindow: {
                                brandNew: null,
                                changed: {
                                    year: null,
                                    month: null
                                },
                                putting: {
                                    year: null,
                                    month: null
                                },
                                windoww: ''
                            },
                            closet: {
                                closet: '',
                                doors: null
                            },
                            typeOfSoil: {
                                brandNew: null,
                                changed: {
                                    year: null,
                                    month: null
                                },
                                putting: {
                                    year: null,
                                    month: null
                                },
                                type: ''
                            },
                            paints: {
                                paintedMakes: {
                                    year: null,
                                    month: null
                                },
                                justPainted: {
                                    year: null,
                                    month: null
                                }
                            },
							muebles: {
								sofa: null,
								sofa_cama: null,
								tv: null,
								mesa_comedor: null,
								escritorio: null,
								comoda: null
							},							
                            dclimalit: null,
                            painting: null,
                            balcony: null,
                            terrace: null,
                            windoww: null,
                            suite: null,
                            wall: null,
                            take: null,
                            size: null,
                            videos: [],
                            files: []
                        }],						
                        bedrooms3: [{
                            airConditioner: null,
                            sizeBedroom: null,
                            orientation: null,
                            typeBed: null,
							canape: null,
                            typeOfWindow: {
                                brandNew: null,
                                changed: {
                                    year: null,
                                    month: null
                                },
                                putting: {
                                    year: null,
                                    month: null
                                },
                                windoww: ''
                            },
                            closet: {
                                closet: '',
                                doors: null
                            },
                            typeOfSoil: {
                                brandNew: null,
                                changed: {
                                    year: null,
                                    month: null
                                },
                                putting: {
                                    year: null,
                                    month: null
                                },
                                type: ''
                            },
                            paints: {
                                paintedMakes: {
                                    year: null,
                                    month: null
                                },
                                justPainted: {
                                    year: null,
                                    month: null
                                }
                            },
							muebles: {
								sofa: null,
								sofa_cama: null,
								tv: null,
								mesa_comedor: null,
								escritorio: null,
								comoda: null
							},							
                            dclimalit: null,
                            painting: null,
                            balcony: null,
                            terrace: null,
                            windoww: null,
                            suite: null,
                            wall: null,
                            take: null,
                            size: null,
                            videos: [],
                            files: []
                        }],						
                        bedrooms4: [{
                            airConditioner: null,
                            sizeBedroom: null,
                            orientation: null,
                            typeBed: null,
							canape: null,
                            typeOfWindow: {
                                brandNew: null,
                                changed: {
                                    year: null,
                                    month: null
                                },
                                putting: {
                                    year: null,
                                    month: null
                                },
                                windoww: ''
                            },
                            closet: {
                                closet: '',
                                doors: null
                            },
                            typeOfSoil: {
                                brandNew: null,
                                changed: {
                                    year: null,
                                    month: null
                                },
                                putting: {
                                    year: null,
                                    month: null
                                },
                                type: ''
                            },
                            paints: {
                                paintedMakes: {
                                    year: null,
                                    month: null
                                },
                                justPainted: {
                                    year: null,
                                    month: null
                                }
                            },
							muebles: {
								sofa: null,
								sofa_cama: null,
								tv: null,
								mesa_comedor: null,
								escritorio: null,
								comoda: null
							},							
                            dclimalit: null,
                            painting: null,
                            balcony: null,
                            terrace: null,
                            windoww: null,
                            suite: null,
                            wall: null,
                            take: null,
                            size: null,
                            videos: [],
                            files: []
                        }],	
                        bedrooms5: [{
                            airConditioner: null,
                            sizeBedroom: null,
                            orientation: null,
                            typeBed: null,
							canape: null,
                            typeOfWindow: {
                                brandNew: null,
                                changed: {
                                    year: null,
                                    month: null
                                },
                                putting: {
                                    year: null,
                                    month: null
                                },
                                windoww: ''
                            },
                            closet: {
                                closet: '',
                                doors: null
                            },
                            typeOfSoil: {
                                brandNew: null,
                                changed: {
                                    year: null,
                                    month: null
                                },
                                putting: {
                                    year: null,
                                    month: null
                                },
                                type: ''
                            },
                            paints: {
                                paintedMakes: {
                                    year: null,
                                    month: null
                                },
                                justPainted: {
                                    year: null,
                                    month: null
                                }
                            },
							muebles: {
								sofa: null,
								sofa_cama: null,
								tv: null,
								mesa_comedor: null,
								escritorio: null,
								comoda: null
							},							
                            dclimalit: null,
                            painting: null,
                            balcony: null,
                            terrace: null,
                            windoww: null,
                            suite: null,
                            wall: null,
                            take: null,
                            size: null,
                            videos: [],
                            files: []
                        }],						
                        bedrooms6: [{
                            airConditioner: null,
                            sizeBedroom: null,
                            orientation: null,
                            typeBed: null,
							canape: null,
                            typeOfWindow: {
                                brandNew: null,
                                changed: {
                                    year: null,
                                    month: null
                                },
                                putting: {
                                    year: null,
                                    month: null
                                },
                                windoww: ''
                            },
                            closet: {
                                closet: '',
                                doors: null
                            },
                            typeOfSoil: {
                                brandNew: null,
                                changed: {
                                    year: null,
                                    month: null
                                },
                                putting: {
                                    year: null,
                                    month: null
                                },
                                type: ''
                            },
                            paints: {
                                paintedMakes: {
                                    year: null,
                                    month: null
                                },
                                justPainted: {
                                    year: null,
                                    month: null
                                }
                            },
							muebles: {
								sofa: null,
								sofa_cama: null,
								tv: null,
								mesa_comedor: null,
								escritorio: null,
								comoda: null
							},							
                            dclimalit: null,
                            painting: null,
                            balcony: null,
                            terrace: null,
                            windoww: null,
                            suite: null,
                            wall: null,
                            take: null,
                            size: null,
                            videos: [],
                            files: []
                        }],						
                        livingRoomBedrooms: [{
                            airConditioner: null,
                            orientation: null,
                            dclimalit: null,
                            furniture: {
                                pieceOfFurniture: [],
                                for: null
                            },
                            typeOfWindow: {
                                brandNew: null,
                                changed: {
                                    year: null,
                                    month: null
                                },
                                putting: {
                                    year: null,
                                    month: null
                                },
                                windoww: ''
                            },
                            typeOfSoil: {
                                brandNew: null,
                                changed: {
                                    year: null,
                                    month: null
                                },
                                putting: {
                                    year: null,
                                    month: null
                                },
                                type: ''
                            },
                            paints: {
                                paintedMakes: {
                                    year: null,
                                    month: null
                                },
                                justPainted: {
                                    year: null,
                                    month: null
                                }
                            },
                            closet: {
                                closet: '',
                                doors: null
                            },
							muebles: {
								sofa: null,
								sofa_cama: null,
								tv: null,
								mesa_comedor: null,
								escritorio: null,
								comoda: null
							},							
                            painting: null,
                            balcony: null,
                            typeBed: null,
							canape: null,
                            terrace: null,
                            windoww: null,
                            take: null,
                            wall: null,
                            size: null,
                            videos: [],
                            files: []
                        }],
                        bathrooms: [{
                            bathroomInBedroom: null,
                            dclimalit: null,
                            reformStatus: {
                                brandNew: null,
                                reformedAgo: {
                                    year: null,
                                    month: null
                                },
                                state: '',
                            },
                            typeOfWindow: {
                                brandNew: null,
                                changed: {
                                    year: null,
                                    month: null
                                },
                                putting: {
                                    year: null,
                                    month: null
                                },
                                windoww: ''
                            },
                            typeOfSoil: {
                                brandNew: null,
                                changed: {
                                    year: null,
                                    month: null
                                },
                                putting: {
                                    year: null,
                                    month: null
                                },
                                type: ''
                            },
                            jacuzzi: null,
                            windoww: null,
                            shower: null,
                            bidet: null,
                            bath: null,
                            size: null,
                            take: null,
                            videos: [],
                            files: []
                        }],
                        bathrooms1: [{
                            bathroomInBedroom: null,
                            dclimalit: null,
                            reformStatus: {
                                brandNew: null,
                                reformedAgo: {
                                    year: null,
                                    month: null
                                },
                                state: '',
                            },
                            typeOfWindow: {
                                brandNew: null,
                                changed: {
                                    year: null,
                                    month: null
                                },
                                putting: {
                                    year: null,
                                    month: null
                                },
                                windoww: ''
                            },
                            typeOfSoil: {
                                brandNew: null,
                                changed: {
                                    year: null,
                                    month: null
                                },
                                putting: {
                                    year: null,
                                    month: null
                                },
                                type: ''
                            },
                            jacuzzi: null,
                            windoww: null,
                            shower: null,
                            bidet: null,
                            bath: null,
                            size: null,
                            take: null,
                            videos: [],
                            files: []
                        }],	
                        bathrooms2: [{
                            bathroomInBedroom: null,
                            dclimalit: null,
                            reformStatus: {
                                brandNew: null,
                                reformedAgo: {
                                    year: null,
                                    month: null
                                },
                                state: '',
                            },
                            typeOfWindow: {
                                brandNew: null,
                                changed: {
                                    year: null,
                                    month: null
                                },
                                putting: {
                                    year: null,
                                    month: null
                                },
                                windoww: ''
                            },
                            typeOfSoil: {
                                brandNew: null,
                                changed: {
                                    year: null,
                                    month: null
                                },
                                putting: {
                                    year: null,
                                    month: null
                                },
                                type: ''
                            },
                            jacuzzi: null,
                            windoww: null,
                            shower: null,
                            bidet: null,
                            bath: null,
                            size: null,
                            take: null,
                            videos: [],
                            files: []
                        }],
                        bathrooms3: [{
                            bathroomInBedroom: null,
                            dclimalit: null,
                            reformStatus: {
                                brandNew: null,
                                reformedAgo: {
                                    year: null,
                                    month: null
                                },
                                state: '',
                            },
                            typeOfWindow: {
                                brandNew: null,
                                changed: {
                                    year: null,
                                    month: null
                                },
                                putting: {
                                    year: null,
                                    month: null
                                },
                                windoww: ''
                            },
                            typeOfSoil: {
                                brandNew: null,
                                changed: {
                                    year: null,
                                    month: null
                                },
                                putting: {
                                    year: null,
                                    month: null
                                },
                                type: ''
                            },
                            jacuzzi: null,
                            windoww: null,
                            shower: null,
                            bidet: null,
                            bath: null,
                            size: null,
                            take: null,
                            videos: [],
                            files: []
                        }],						
                        bathrooms4: [{
                            bathroomInBedroom: null,
                            dclimalit: null,
                            reformStatus: {
                                brandNew: null,
                                reformedAgo: {
                                    year: null,
                                    month: null
                                },
                                state: '',
                            },
                            typeOfWindow: {
                                brandNew: null,
                                changed: {
                                    year: null,
                                    month: null
                                },
                                putting: {
                                    year: null,
                                    month: null
                                },
                                windoww: ''
                            },
                            typeOfSoil: {
                                brandNew: null,
                                changed: {
                                    year: null,
                                    month: null
                                },
                                putting: {
                                    year: null,
                                    month: null
                                },
                                type: ''
                            },
                            jacuzzi: null,
                            windoww: null,
                            shower: null,
                            bidet: null,
                            bath: null,
                            size: null,
                            take: null,
                            videos: [],
                            files: []
                        }],						
                        bathrooms5: [{
                            bathroomInBedroom: null,
                            dclimalit: null,
                            reformStatus: {
                                brandNew: null,
                                reformedAgo: {
                                    year: null,
                                    month: null
                                },
                                state: '',
                            },
                            typeOfWindow: {
                                brandNew: null,
                                changed: {
                                    year: null,
                                    month: null
                                },
                                putting: {
                                    year: null,
                                    month: null
                                },
                                windoww: ''
                            },
                            typeOfSoil: {
                                brandNew: null,
                                changed: {
                                    year: null,
                                    month: null
                                },
                                putting: {
                                    year: null,
                                    month: null
                                },
                                type: ''
                            },
                            jacuzzi: null,
                            windoww: null,
                            shower: null,
                            bidet: null,
                            bath: null,
                            size: null,
                            take: null,
                            videos: [],
                            files: []
                        }],						
                        bathrooms6: [{
                            bathroomInBedroom: null,
                            dclimalit: null,
                            reformStatus: {
                                brandNew: null,
                                reformedAgo: {
                                    year: null,
                                    month: null
                                },
                                state: '',
                            },
                            typeOfWindow: {
                                brandNew: null,
                                changed: {
                                    year: null,
                                    month: null
                                },
                                putting: {
                                    year: null,
                                    month: null
                                },
                                windoww: ''
                            },
                            typeOfSoil: {
                                brandNew: null,
                                changed: {
                                    year: null,
                                    month: null
                                },
                                putting: {
                                    year: null,
                                    month: null
                                },
                                type: ''
                            },
                            jacuzzi: null,
                            windoww: null,
                            shower: null,
                            bidet: null,
                            bath: null,
                            size: null,
                            take: null,
                            videos: [],
                            files: []
                        }],						
                        restrooms: [{
                            size: null,
							take: null,
                            videos: [],
                            files: []
                        }],
                        hallways: [{
                            closet: {
                                closet: '',
                                doors: null
                            },
                            storage: null,
                            size: null,
                            take: null,
                            videos: [],
                            files: []
                        }],
                        dealers: [{
                            closet: {
                                closet: '',
                                doors: null
                            },
                            size: null,
                            take: null,
                            videos: [],
                            files: []
                        }],
                        serviceRooms: [{
                            size: null,
							take: null,
                            videos: [],
                            files: []
                        }],
                        bathServices: [{
                            size: null,
							take: null,
                            videos: [],
                            files: []
                        }],
                        transportes: [{
                            type: null,
							name: null,
							lines: null,
							measure: null,
							units: null,
							medio: null
                        }],
                        transportes1: [{
                             type: null,
							name: null,
							lines: null,
							measure: null,
							units: null,
							medio: null
                        }],
                        transportes2: [{
                             type: null,
							name: null,
							lines: null,
							measure: null,
							units: null,
							medio: null
                        }],	
                        transportes3: [{
                             type: null,
							name: null,
							lines: null,
							measure: null,
							units: null,
							medio: null
                        }],	
                        transportes4: [{
                             type: null,
							name: null,
							lines: null,
							measure: null,
							units: null,
							medio: null
                        }],	
                        transportes5: [{
                             type: null,
							name: null,
							lines: null,
							measure: null,
							units: null,
							medio: null
                        }],	
                        transportes6: [{
                             type: null,
							name: null,
							lines: null,
							measure: null,
							units: null,
							medio: null
                        }],							
                        doorFiles: [],
                        isSale: "0",
						tipo_inmueble: "Pisos y casas",
                        door: '0'
                    }
                }
            },
            computed: {
                title() {
                    if (this.form.isSale == 1 && this.form.tipo_inmueble == 'Pisos y casas') return 'Pisos y casas en alquiler';
                    if (this.form.isSale == 1 && this.form.tipo_inmueble == 'Habitaciones') return 'Habitaciones en alquiler';
					if (this.form.isSale == 1 && this.form.tipo_inmueble == 'Local/Oficina') return 'Local/Oficina en alquiler';
					if (this.form.isSale == 0 && this.form.tipo_inmueble == 'Pisos y casas') return 'Pisos y casas en venta';
					if (this.form.isSale == 0 && this.form.tipo_inmueble == 'Habitaciones') return 'Habitaciones en venta';
					if (this.form.isSale == 0 && this.form.tipo_inmueble == 'Local/Oficina') return 'Local/Oficina en venta';
                    //return 'Formulario de venta';
					if (this.form.isSale == 1) return 'Formulario de alquiler';
                    return 'Formulario de venta';
                }
            },
            mounted() {

                this.livingRoomBedroomsClone = JSON.parse(JSON.stringify(this.form.livingRoomBedrooms[0]));
                this.serviceRoomsClone = JSON.parse(JSON.stringify(this.form.serviceRooms[0]));
                this.bathServicesClone = JSON.parse(JSON.stringify(this.form.bathServices[0]));
				//
				this.bathroomsClone = JSON.parse(JSON.stringify(this.form.bathrooms[0]));
				this.bathrooms1Clone = JSON.parse(JSON.stringify(this.form.bathrooms1[0]));
				this.bathrooms2Clone = JSON.parse(JSON.stringify(this.form.bathrooms2[0]));
				this.bathrooms3Clone = JSON.parse(JSON.stringify(this.form.bathrooms3[0]));
				this.bathrooms4Clone = JSON.parse(JSON.stringify(this.form.bathrooms4[0]));
				this.bathrooms5Clone = JSON.parse(JSON.stringify(this.form.bathrooms5[0]));
				this.bathrooms6Clone = JSON.parse(JSON.stringify(this.form.bathrooms6[0]));
                // 	
                this.restroomsClone = JSON.parse(JSON.stringify(this.form.restrooms[0]));
                //
				this.bedroomsClone = JSON.parse(JSON.stringify(this.form.bedrooms[0]));
				this.bedrooms1Clone = JSON.parse(JSON.stringify(this.form.bedrooms1[0]));
				this.bedrooms2Clone = JSON.parse(JSON.stringify(this.form.bedrooms2[0]));
				this.bedrooms3Clone = JSON.parse(JSON.stringify(this.form.bedrooms3[0]));
				this.bedrooms4Clone = JSON.parse(JSON.stringify(this.form.bedrooms4[0]));
				this.bedrooms5Clone = JSON.parse(JSON.stringify(this.form.bedrooms5[0]));
				this.bedrooms6Clone = JSON.parse(JSON.stringify(this.form.bedrooms6[0]));
				//
                this.hallwaysClone = JSON.parse(JSON.stringify(this.form.hallways[0]));
                this.kitchensClone = JSON.parse(JSON.stringify(this.form.kitchens[0]));
                this.dealersClone = JSON.parse(JSON.stringify(this.form.dealers[0]));
                this.salonsClone = JSON.parse(JSON.stringify(this.form.salons[0]));
				//
				this.transportesClone = JSON.parse(JSON.stringify(this.form.transportes[0]));
				this.transportes1Clone = JSON.parse(JSON.stringify(this.form.transportes1[0]));
				this.transportes2Clone = JSON.parse(JSON.stringify(this.form.transportes2[0]));
				this.transportes3Clone = JSON.parse(JSON.stringify(this.form.transportes3[0]));
				this.transportes4Clone = JSON.parse(JSON.stringify(this.form.transportes4[0]));
				this.transportes5Clone = JSON.parse(JSON.stringify(this.form.transportes5[0]));
				this.transportes6Clone = JSON.parse(JSON.stringify(this.form.transportes6[0]));
                // 
            },
            methods: {
        addT(item) {
            this.form[item].push({ ...formDefault[item][0] });
        },
        removeT(item, index) {
            if (this.form[item][index].id) {
                this.form.trash.push(this.form[item][index].id);
            }
            
            this.form[item].splice(index, 1);
        },				
                //add(list, clone, index) {
				//	alert(list.length);
				//	alert(clone);
				//	alert(index);
				//	alert(clone+index);
				add(list, clone) {
						//alert(list.length);
                    if (list.length < 2) 
					{
						list.push(clone);
					}
                },
				addDorm(list, clone) {
						//alert(list.length);
                    if (list.length < 8) 
					{	 	if (list.length == 1) 
							{
								list.push(this.bedroomsClone);
							}
							else if (list.length == 2) 
							{
								list.push(this.bedrooms1Clone);
							}
							else if (list.length == 3) 
							{
								list.push(this.bedrooms2Clone);
							}							
							else if (list.length == 4) 
							{
								list.push(this.bedrooms3Clone);
							}
							else if (list.length == 5) 
							{
								list.push(this.bedrooms4Clone);
							}
							else if (list.length == 6) 
							{
								list.push(this.bedrooms5Clone);
							}
							else if (list.length == 7) 
							{
								list.push(this.bedrooms6Clone);
							}							
					}
                },
				addBano(list, clone) {
						//alert(list.length);
                    if (list.length < 8) 
					{	 	if (list.length == 1) 
							{
								list.push(this.bathroomsClone);
							}
							else if (list.length == 2) 
							{
								list.push(this.bathrooms1Clone);
							}
							else if (list.length == 3) 
							{
								list.push(this.bathrooms2Clone);
							}							
							else if (list.length == 4) 
							{
								list.push(this.bathrooms3Clone);
							}
							else if (list.length == 5) 
							{
								list.push(this.bathrooms4Clone);
							}
							else if (list.length == 6) 
							{
								list.push(this.bathrooms5Clone);
							}
							else if (list.length == 7) 
							{
								list.push(this.bathrooms6Clone);
							}							
					}
                },				
				addTrasportes(list, clone) {
						//alert(list.length);
                    if (list.length < 8) 
					{	 	if (list.length == 1) 
							{
								list.push(this.transportesClone);
							}
							else if (list.length == 2) 
							{
								list.push(this.transportes1Clone);
							}
							else if (list.length == 3) 
							{
								list.push(this.transportes2Clone);
							}							
							else if (list.length == 4) 
							{
								list.push(this.transportes3Clone);
							}
							else if (list.length == 5) 
							{
								list.push(this.transportes4Clone);
							}
							else if (list.length == 6) 
							{
								list.push(this.transportes5Clone);
							}
							else if (list.length == 7) 
							{
								list.push(this.transportes6Clone);
							}							
					}
                },
                remove(list, row) {
                    if (list.length > 1) list.splice(row, 1);
                },
                removeFile(files, row, id) {
                    files.splice(row, 1);
                    
                    this.formData.delete(id);
                },
                inputFilter(newFile, oldFile, prevent) {
                    if (newFile != null) {
                        if (newFile && !oldFile) if (!/\.(jpeg|jpe|jpg|gif|png|webp|webm|MP4|3GP|WMV|MKV|AVI|FLV|MOV|M4V)$/i.test(newFile.name)) return prevent();
                        
                        let URL = window.URL || window.webkitURL;
                        newFile.blob = '';
                        
                        if (URL && URL.createObjectURL) newFile.blob = URL.createObjectURL(newFile.file);
                        
                        this.formData.append(newFile.id, newFile.file);
                    }
                },
    validateFileSize() {
        let totalSize = 0;
        //const maxSize = 30 * 1024 * 1024; // 30MB
        const maxSize = 60 * 1024 * 1024; // 60MB
        
        // Función helper para sumar tamaños de arrays
        const sumFilesSize = (filesArray) => {
            if (filesArray && Array.isArray(filesArray)) {
                filesArray.forEach(file => {
                    if (file.size) totalSize += file.size;
                });
            }
        };
        
        // Sumar tamaños de archivos principales
        sumFilesSize(this.form.doorFiles);
        
        // Sumar tamaños de secciones con archivos/videos
    const sections = [
        this.form.receiver.files, this.form.receiver.videos,
        this.form.garage.files, this.form.garage.videos,
        this.form.boxroom.files, this.form.boxroom.videos,
        this.form.facade.files, this.form.facade.videos,
        this.form.portal.files, this.form.portal.videos,
        this.form.lift.files, this.form.lift.videos,
        this.form.swimming.files, this.form.swimming.videos,
        this.form.garden.files, this.form.garden.videos,
        this.form.gym.files, this.form.gym.videos,
        this.form.sauna.files, this.form.sauna.videos,
        this.form.sports.files, this.form.sports.videos,
        this.form.childarea.files, this.form.childarea.videos,
        this.form.place.files, this.form.place.videos
    ];
        
        sections.forEach(files => sumFilesSize(files));
        
        // Sumar tamaños de arrays dinámicos
        ['salons', 'kitchens', 'bedrooms', 'livingRoomBedrooms', 
         'bathrooms', 'restrooms', 'hallways', 'dealers', 
         'serviceRooms', 'bathServices'].forEach(key => {
            if (this.form[key] && Array.isArray(this.form[key])) {
                this.form[key].forEach(item => {
                    sumFilesSize(item.files);
                    sumFilesSize(item.videos);
                });
            }
        });
        
            const sizeInMB = (totalSize / 1024 / 1024).toFixed(2);
            console.log(`Tamaño total calculado: ${sizeInMB}MB`);
            
            if (totalSize > maxSize) {
                this.uploadError = `El tamaño total (${sizeInMB}MB) excede el límite de 60MB. Por favor, reduce el número o tamaño de los archivos.`;
                return false;
            }
        return true;
    },                
// En el archivo index.blade.php, dentro del método onSubmit():

onSubmit() {
    // Primero validar tamaño de archivos (opcional)
    if (!this.validateFileSize()) {
        swal(this.title, this.uploadError, 'warning');
        return;
    }

    // Luego validar número de archivos
    if (!this.validateFileCount()) {
        swal(this.title, this.uploadError, 'warning');
        return;
    }
    this.loading = true;
    this.uploadProgress = 0;
    this.uploadError = null;
    this.uploadTimeout = null; // Resetear timeout
    
    // Contar archivos totales para mostrar progreso
    this.totalFiles = this.countTotalFiles();
    this.uploadedFiles = 0;
    
    // Variables para cálculo de velocidad
    this.uploadStartTime = Date.now();
    this.lastLoaded = 0;
    this.uploadSpeed = 0;
    this.estimatedTime = 0;
    
    // Después de establecer loading = true, desplazar a la capa
    this.$nextTick(() => {
        const progressElement = document.querySelector('.alert-info[v-if="loading"], #upload-progress');
        if (progressElement) {
            progressElement.scrollIntoView({ 
                behavior: 'smooth', 
                block: 'start' 
            });
        } else {
            window.scrollTo({ 
                top: 0, 
                behavior: 'smooth' 
            });
        }
        
        // Mostrar mensaje inicial
// Mostrar mensaje inicial
if (this.totalFiles === 0) {
    swal({
        title: "Sin archivos",
        text: "¿Estás seguro de continuar sin subir imágenes?\n\nLímites:\n• 60MB máximo total\n• 50 archivos máximo",
        icon: "warning",
        buttons: ["Cancelar", "Continuar"],
        dangerMode: true,
    }).then((willProceed) => {
        if (willProceed) {
            this.proceedWithUpload();
        } else {
            this.loading = false;
        }
    });
} else {
    /*
    // Mostrar resumen de archivos antes de subir
    const sizeValid = this.validateFileSize();
    const countValid = this.validateFileCount();
    
    if (!sizeValid || !countValid) {
        swal(this.title, this.uploadError, 'warning');
        this.loading = false;
        return;
    }
    
    // Mostrar confirmación con resumen
    swal({
        title: "Confirmar subida",
        html: `
            <div style="text-align: left; padding: 10px;">
                <p>¿Estás seguro de subir los siguientes archivos?</p>
                <ul style="margin-left: 20px;">
                    <li><strong>Total archivos:</strong> ${this.totalFiles}/50</li>
                    <li><strong>Límite por subida:</strong> 50 archivos</li>
                    <li><strong>Límite de tamaño:</strong> 60MB</li>
                </ul>
                <p style="font-size: 12px; color: #666; margin-top: 10px;">
                    Esto puede tardar varios minutos dependiendo de la cantidad de archivos y tu conexión.
                </p>
            </div>
        `,
        icon: "info",
        buttons: ["Cancelar", "Subir archivos"],
    }).then((willUpload) => {
        if (willUpload) {
            this.proceedWithUpload();
        } else {
            this.loading = false;
        }
        
    });*/
    this.proceedWithUpload();
}
    });
},

proceedWithUpload() {
    // Configurar timeout para detectar conexiones lentas
    this.uploadTimeout = setTimeout(() => {
        if (this.loading && this.uploadProgress < 10) {
            this.uploadError = 'La subida está tardando más de lo normal. Verifica tu conexión a internet.';
            swal({
                title: "Conexión lenta",
                text: this.uploadError,
                icon: "warning",
                buttons: ["Cancelar", "Reintentar"],
                dangerMode: true,
            }).then((retry) => {
                if (retry) {
                    clearTimeout(this.uploadTimeout);
                    this.onSubmit(); // Reintentar
                } else {
                    this.cancelUpload();
                }
            });
        }
    }, 30000); // 30 segundos
    
    // Configurar axios para mostrar progreso de subida
    const config = {
        headers: {
            'Content-Type': 'multipart/form-data'
        },
        onUploadProgress: (progressEvent) => {
            if (progressEvent.lengthComputable) {
                // Progreso real de la subida (ajustado para que comience desde 20%)
                const rawProgress = Math.round((progressEvent.loaded * 100) / progressEvent.total);
                this.uploadProgress = 20 + Math.round(rawProgress * 0.8); // De 20% a 100%
                
                // Calcular velocidad de subida
                const currentTime = Date.now();
                const elapsedTime = (currentTime - this.uploadStartTime) / 1000; // en segundos
                const loadedDelta = progressEvent.loaded - this.lastLoaded;
                const timeDelta = elapsedTime - this.lastTime || 1;
                
                if (timeDelta > 0) {
                    // Calcular velocidad en KB/s
                    this.uploadSpeed = Math.round((loadedDelta / 1024) / timeDelta);
                    
                    // Calcular tiempo estimado restante
                    if (this.uploadSpeed > 0) {
                        const remainingBytes = progressEvent.total - progressEvent.loaded;
                        this.estimatedTime = Math.round((remainingBytes / 1024) / this.uploadSpeed);
                    }
                }
                
                this.lastLoaded = progressEvent.loaded;
                this.lastTime = elapsedTime;
                
                // Actualizar contador de archivos procesados
                // Estimación basada en el progreso
                const estimatedFiles = Math.round((this.uploadProgress / 100) * this.totalFiles);
                this.uploadedFiles = estimatedFiles;
                
                // Si está al 100%, asegurar que muestra todos los archivos
                if (progressEvent.loaded === progressEvent.total) {
                    this.uploadedFiles = this.totalFiles;
                }
            }
        },
        timeout: 600000, // 10 minutos (puedes mantenerlo o aumentar a 480000 para coincidir con PHP)
        maxContentLength: Infinity,
        maxBodyLength: Infinity
    };
    
    // Preparar FormData
    for (var row in this.form) {
        if (this.formData.has(row)) {
            this.formData.set(row, JSON.stringify(this.form[row]));
        } else {
            this.formData.append(row, JSON.stringify(this.form[row]));
        }
    }
    
    // Simular progreso inicial de procesamiento (0-20%)
    const processInterval = setInterval(() => {
        if (this.uploadProgress < 20) {
            this.uploadProgress += 2;
            // Actualizar archivos procesados durante la preparación
            this.uploadedFiles = Math.round((this.uploadProgress / 100) * this.totalFiles);
        } else {
            clearInterval(processInterval);
        }
    }, 100);
    
    // Realizar petición POST
    axios.post('/admin/informe-detallado-cabecera', this.formData, config)
.then(response => {
    clearInterval(processInterval);
    clearTimeout(this.uploadTimeout);
    this.uploadProgress = 100;
    this.uploadedFiles = this.totalFiles;
    
    // Guardar la referencia
    const referencia = response.data[0];
    
    // Crear el contenido HTML primero
    const refHTML = `
        <div style="margin: 20px 0;">
            <p style="font-size: 16px; margin-bottom: 10px;">Referencia generada:</p>
            <div style="display: inline-flex; align-items: center; background: #f1f8ff; padding: 10px 15px; border-radius: 5px; border: 1px solid #c8e1ff;">
                <strong style="font-size: 18px; margin-right: 15px;">#${referencia}</strong>
                <button 
                    id="copy-ref-btn" 
                    style="background: #007bff; color: white; border: none; padding: 5px 10px; border-radius: 3px; cursor: pointer; font-size: 14px;"
                >
                    📋 Copiar
                </button>
            </div>
            <p style="font-size: 12px; color: #666; margin-top: 10px;">Copia la referencia para usarla después</p>
        </div>
    `;
    
    // Mostrar el SweetAlert
    const alert = swal({
        title: this.title,
        content: {
            element: "div",
            attributes: {
                innerHTML: refHTML
            }
        },
        icon: "success",
        button: "OK",
        closeOnClickOutside: false,
        closeOnEsc: false
    });
    
    // Agregar funcionalidad de copiar
    setTimeout(() => {
        const copyBtn = document.getElementById('copy-ref-btn');
        if (copyBtn) {
            copyBtn.onclick = function() {
                navigator.clipboard.writeText(referencia).then(() => {
                    const originalText = this.textContent;
                    this.textContent = '✓ Copiado!';
                    this.style.background = '#28a745';
                    
                    setTimeout(() => {
                        this.textContent = originalText;
                        this.style.background = '#007bff';
                    }, 2000);
                });
            };
        }
    }, 100);
    
    // Manejar el cierre del modal
    if (alert && alert.then) {
        alert.then(() => {
            location.reload();
        });
    }
})
        .catch(error => {
            clearInterval(processInterval);
            clearTimeout(this.uploadTimeout);
            console.error("Error en subida:", error);
            
            // Determinar tipo de error
            let errorMessage = 'Error desconocido';
            
            if (error.code === 'ECONNABORTED') {
                errorMessage = 'La subida ha superado el tiempo límite. Intenta con menos archivos o verifica tu conexión.';
            } else if (error.response) {
                switch (error.response.status) {
                    case 413:
                        errorMessage = 'Los archivos son demasiado grandes. El servidor los ha rechazado.';
                        break;
                    case 422:
                        errorMessage = error.response.data.message || 'Error de validación en el servidor.';
                        break;
                    case 500:
                        errorMessage = 'Error interno del servidor. Por favor, intenta más tarde.';
                        break;
                    default:
                        errorMessage = `Error ${error.response.status}: ${error.response.data.message || 'Error del servidor'}`;
                }
            } else if (error.request) {
                errorMessage = 'No se pudo conectar con el servidor. Verifica tu conexión a internet.';
            } else {
                errorMessage = error.message || 'Error configurando la petición';
            }
            
            this.uploadError = errorMessage;
            
            // Mostrar error con opción de reintentar
            swal({
                title: "Error en la subida",
                text: errorMessage,
                icon: "error",
                buttons: ["Cancelar", "Reintentar"],
                dangerMode: true,
            }).then((retry) => {
                if (retry) {
                    // Reiniciar y reintentar
                    this.formData = new FormData();
                    this.onSubmit();
                } else {
                    this.cancelUpload();
                }
            });
        })
        .finally(() => {
            // Limpiar timeout si aún existe
            if (this.uploadTimeout) {
                clearTimeout(this.uploadTimeout);
            }
            
            // Resetear después de 2 segundos para que el usuario vea el 100%
            setTimeout(() => {
                this.loading = false;
                this.uploadProgress = 0;
                this.uploadedFiles = 0;
                this.totalFiles = 0;
                this.uploadError = null;
                this.uploadSpeed = 0;
                this.estimatedTime = 0;
                this.formData = new FormData(); // Preparar para nueva subida
            }, 2000);
        });
},
    cancelUpload() {
        // Cancelar la subida
        clearTimeout(this.uploadTimeout);
        this.loading = false;
        this.uploadProgress = 0;
        this.uploadedFiles = 0;
        this.totalFiles = 0;
        this.uploadError = null;
        
        // Mostrar mensaje de cancelación
        swal({
            title: "Subida cancelada",
            text: "La subida ha sido cancelada.",
            icon: "info",
            button: "OK",
            timer: 2000
        });
    },
countTotalFiles() {
    let total = 0;
    
    // Función helper para contar archivos
    const countFiles = (filesArray) => {
        if (filesArray && Array.isArray(filesArray)) {
            return filesArray.length;
        }
        return 0;
    };
    
    // Contar archivos en cada sección principal
    total += countFiles(this.form.doorFiles);
    
    // Secciones con archivos/videos
    const sections = [
        this.form.receiver.files, this.form.receiver.videos,
        this.form.garage.files, this.form.garage.videos,
        this.form.boxroom.files, this.form.boxroom.videos,
        this.form.facade.files, this.form.facade.videos,
        this.form.portal.files, this.form.portal.videos,
        this.form.lift.files, this.form.lift.videos,
        this.form.swimming.files, this.form.swimming.videos,
        this.form.garden.files, this.form.garden.videos,
        this.form.gym.files, this.form.gym.videos,
        this.form.sauna.files, this.form.sauna.videos,
        this.form.sports.files, this.form.sports.videos,
        this.form.childarea.files, this.form.childarea.videos,
        this.form.place.files, this.form.place.videos
    ];
    
    sections.forEach(files => total += countFiles(files));
    
    // Contar archivos en arrays dinámicos (salons, bedrooms, etc.)
    ['salons', 'kitchens', 'bedrooms', 'livingRoomBedrooms', 
     'bathrooms', 'restrooms', 'hallways', 'dealers', 
     'serviceRooms', 'bathServices'].forEach(key => {
        if (this.form[key] && Array.isArray(this.form[key])) {
            this.form[key].forEach(item => {
                total += countFiles(item.files);
                total += countFiles(item.videos);
            });
        }
    });
    
    return total;
},
validateFileCount() {
    const totalFiles = this.countTotalFiles();
    const maxFiles = 50; // Límite de 50 archivos
    
    if (totalFiles > maxFiles) {
        this.uploadError = `Has seleccionado ${totalFiles} archivos. El límite máximo es de ${maxFiles} archivos por subida. Por favor, reduce la cantidad de archivos.`;
        return false;
    }
    return true;
},
    
    resetForm() {
        // Solo resetea si es necesario después de éxito
        this.formData = new FormData();
        this.uploadError = null;
        // Puedes agregar más lógica de reset si lo necesitas
    }                
            }/*,
    watch: {
        reference({ detalles }) {
			form: null,
			formData: null,
            this.formData = new FormData();
            this.form = _.cloneDeep(formDefault);
			}}
			*/
        });
    </script>
@stop