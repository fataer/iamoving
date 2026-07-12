Vue.component('v-select', VueSelect.VueSelect);
Vue.component('file-upload', VueUploadComponent);
var base_url = "{{ url('/') }}";
const app = new Vue({
    el: '#app',
    data: {
        form: null,
        reference: null,
        formData: null,
        details: [],
        options: [],
        loading: false
    },
    methods: {
        add(item) {
            this.form[item].push({ ...formDefault[item][0] });
        },
        remove(item, index) {
            if (this.form[item][index].id) {
                this.form.trash.push(this.form[item][index].id);
            }
            
            this.form[item].splice(index, 1);
        },
        /*onSearch(search, loading) {
            loading(true);
            axios.get('/admin/informe/' + search).then(response => {
               //alert('hola search');
                this.options = response.data;
            }).catch(error => {
                //console.log(error);
            }).then(() => {
                loading(false);
            });
        },*/
                onSearch(search, loading) {
                    loading(true);
                    
                    this.search(loading, search, this);
                },
                search: _.debounce((loading, search, vm) => {
                    axios.get('/admin/informe/' + search).then(response => {
					//axios.post('/admin/informe/', {search}).then(response => {
                        vm.options = response.data;
                    
                    }).catch(error => {
                        console.log(error);
                    }).then(() => {
                        loading(false);
                    });
                }, 350),		
        inputFilter(newFile, oldFile, prevent) {
            if (newFile != null) {
                if (newFile && !oldFile) if (!/\.(jpeg|jpe|jpg|gif|png|webp|webm|MP4|3GP|WMV|MKV|AVI|FLV|MOV|M4V)$/i.test(newFile.name)) return prevent();

                this.formData.append(newFile.id, newFile.file);
            }
        },
        removeFile(files, row, id) {
            files.splice(row, 1);
        },
        setFormData() {
            //alert('setFormData');
            for (const key in this.form) {
                if (this.formData.has(key)) {
                    //alert('hola2');
                    this.formData.set(key, JSON.stringify(this.form[key]));
                }
                else {
                    this.formData.append(key, JSON.stringify(this.form[key]));
                }
            }
        },
        onSubmit() {
            this.setFormData();
            this.loading = true;

            axios.post(`/admin/informe/${this.reference.id}/update`, this.formData)
                .then(response => {
                    
                    //alert('adios'); 
                    swal("Actualización", `Referencia #${this.reference.id} actualizada`, "success");
                    //alert('hola');
                    //location.reload();
                    window.setTimeout(function(){ location.reload();} ,3000);
                })
                .catch((error) => {
                    console.error(error);

                    if (error.response.status === 422) {
                        swal('Actualización', error.response.data.message, 'error');
                    }
                    else {
                        swal('Actualización', error.response.data.message, 'error');
                    }
                })
                .then(() => {
                    this.loading = false;
                });
        }
    },
    watch: {
        reference({ detalles }) {
            this.formData = new FormData();
            this.form = _.cloneDeep(formDefault);

            for (const key in mapData) {
                if (typeof mapData[key] == 'string') {
                    //alert( 'key');
                    //alert( key);
                    this.form[key] = this.reference[mapData[key]];
                }
                else if (typeof mapData[key] == 'object') {
                    const details = detalles.filter(detail => detail.type == mapData[key].type);

                    details.forEach((detail, i) => {
                        if (i > 0 && Array.isArray(this.form[key])) 
                        {
                            this.form[key].push({ ...formDefault[key][0] })
                        }

                        _.forIn(mapData[key].fields, (value, field) => {
                            if (Array.isArray(this.form[key])) 
                            {
                                if (typeof value == 'function') 
                                {
                                    /*alert('function1');
                                    alert(detail);*/
                                    value(detail, this.form[key][i])
                                } 
                                else if (typeof value == 'string') 
                                {
                                   /* alert('string');
                                    alert(field);
                                    alert(value);
                                    alert(detail[field]);*/
                                    _//.set(this.form[key][i], value, detail[field]);
//SALON                                    
                                    var flagString = false;
//pintura_salon
                             /*       if (field == 'pintura_salon')
                                    {
                                        this.form[key][i].painting=detail[field]>0 ? 1 : 0 ;
                                        flagString=true;
                                    }*/
//salon_estrenar_tipo_ventana  typeOfWindow.brandNew
                                    if (field == 'salon_estrenar_tipo_ventana')
                                    {
                                        this.form[key][i].typeOfWindow.brandNew= detail[field]>0 ? 1 : 0 ;
                                        flagString=true;
                                    }
//salon_tipo_suelo_estrenar typeOfSoil.brandNew
                                   /* if (field =='salon_tipo_suelo_estrenar')
                                    {
                                        this.form[key][i].typeOfSoil.brandNew=detail[field]>0 ? 1 : 0 ;
                                        flagString=true;
                                    }*/
//salon_muebles_sofa muebles.sofa
                                    if (field =='salon_muebles_sofa')
                                    {
                                        this.form[key][i].muebles.sofa=detail[field]>0 ? 1 : 0 ;
                                        flagString=true;
                                    }									
//salon_muebles_sofa muebles.sofa
                                    if (field =='salon_muebles_sofa_cama')
                                    {
                                        this.form[key][i].muebles.sofa_cama=detail[field]>0 ? 1 : 0 ;
                                        flagString=true;
                                    }									
									//salon_muebles_sofa muebles.sofa
                                    if (field =='salon_muebles_tv')
                                    {
                                        this.form[key][i].muebles.tv=detail[field]>0 ? 1 : 0 ;
                                        flagString=true;
                                    }
																		//salon_muebles_sofa muebles.sofa
                                    if (field =='salon_muebles_mesa_comedor')
                                    {
                                        this.form[key][i].muebles.mesa_comedor=detail[field]>0 ? 1 : 0 ;
                                        flagString=true;
                                    }
//aire_condicionado_salon airConditioner
                                    if (field == 'aire_condicionado_salon')
                                    {
                                        this.form[key][i].airConditioner=detail[field]>0 ? 1 : 0 ;
                                        flagString=true;
                                    }
//salon_dclimati dclimalit
                                    if (field == 'salon_dclimati')
                                    {
                                        this.form[key][i].dclimalit=detail[field]>0 ? 1 : 0 ;
                                        flagString=true;
                                    }
//COCINA
//cocina_tipo_ventana_estrenar
                                    if (field == 'cocina_tipo_ventana_estrenar')
                                    {
                                        this.form[key][i].typeOfWindow.brandNew=detail[field]>0 ? 1 : 0 ;
                                        flagString=true;
                                    }
//cocina_equipaje_extractor
                                    if (field == 'cocina_equipaje_extractor')
                                    {
                                        this.form[key][i].luggage.extractor=detail[field]>0 ? 1 : 0 ;
                                        flagString=true;
                                    }
//cocina_equipaje_microondas luggage.microwaveOven
                                    if (field == 'cocina_equipaje_microondas')
                                    {
                                        this.form[key][i].luggage.microwaveOven=detail[field]>0 ? 1 : 0 ;
                                        flagString=true;
                                    }
//cocina_equipaje_horno luggage.oven
                                    if (field == 'cocina_equipaje_horno')
                                    {
                                        this.form[key][i].luggage.oven=detail[field]>0 ? 1 : 0 ;
                                        flagString=true;
                                    }
//cocina_equipaje_nevera luggage.fridge
                                    if (field == 'cocina_equipaje_nevera')
                                    {
                                        this.form[key][i].luggage.fridge=detail[field]>0 ? 1 : 0 ;
                                        flagString=true;
                                    }
//cocina_equipaje_lavadora luggage.washingMachine
                                    if (field == 'cocina_equipaje_lavadora')
                                    {
                                        this.form[key][i].luggage.washingMachine=detail[field]>0 ? 1 : 0 ;
                                        flagString=true;
                                    } 
//cocina_equipaje_secadora luggage.dryer                                    
                                    if (field =='cocina_equipaje_secadora')
                                    {
                                        this.form[key][i].luggage.dryer=detail[field]>0 ? 1 : 0 ;
                                        flagString=true;
                                    }
//cocina_equipaje_lavaseca luggage.washingDryer
                                    if (field == 'cocina_equipaje_lavaseca')
                                    {
                                        this.form[key][i].luggage.washingDryer=detail[field]>0 ? 1 : 0 ;
                                        flagString=true;
                                    } 									
//cocina_equipaje_lavavajillas luggage.dishwasher
                                    if (field =='cocina_equipaje_lavavajillas')
                                    {
                                        this.form[key][i].luggage.dishwasher=detail[field]>0 ? 1 : 0 ;
                                        flagString=true;
                                    }
//cocina_equipaje_menaje luggage.menaje
                                    if (field =='cocina_equipaje_menaje')
                                    {
                                        this.form[key][i].luggage.menaje=detail[field]>0 ? 1 : 0 ;
                                        flagString=true;
                                    }	
//cocina_equipaje_lavavajillas luggage.lavadero
                                    if (field =='cocina_equipaje_lavadero')
                                    {
                                        this.form[key][i].luggage.lavadero=detail[field]>0 ? 1 : 0 ;
                                        flagString=true;
                                    }									
//cocina_fuego_vitroceramica  typeOfFire.vitroceramica
                                    if (field =='cocina_fuego_vitroceramica')
                                    {
                                        this.form[key][i].typeOfFire.vitroceramica=detail[field]>0 ? 1 : 0 ;
                                        flagString=true;
                                    }
//cocina_fuego_vitroceramica  typeOfFire.induccion
                                    if (field =='cocina_fuego_induccion')
                                    {
                                        this.form[key][i].typeOfFire.induccion=detail[field]>0 ? 1 : 0 ;
                                        flagString=true;
                                    }									
//cocina_fuego_gas_nuevo typeOfFire.naturalGas
                                    if (field =='cocina_fuego_gas_nuevo')
                                    {
                                        this.form[key][i].typeOfFire.naturalGas=detail[field]>0 ? 1 : 0 ;
                                        flagString=true;
                                    }
//cocina_fuego_placa_electronica typeOfFire.electricPlate
                                    if (field =='cocina_fuego_placa_electronica')
                                    {
                                        this.form[key][i].typeOfFire.electricPlate=detail[field]>0 ? 1 : 0 ;
                                        flagString=true;
                                    }
//cocina_fuego_bombonra_gas typeOfFire.dasCylinder
                                    if (field =='cocina_fuego_bombonra_gas')
                                    {
                                        this.form[key][i].typeOfFire.dasCylinder=detail[field]>0 ? 1 : 0 ;
                                        flagString=true;
                                    }
//cocina_tipo_suelo_estrenar typeOfSoil.brandNew
                                 /*   if (field =='cocina_tipo_suelo_estrenar')
                                    {
                                        this.form[key][i].typeOfSoil.brandNew=detail[field]>0 ? 1 : 0 ;
                                        flagString=true;
                                    }*/
//cocina_dclimati dclimalit
                                    if (field =='cocina_dclimati')
                                    {
                                        this.form[key][i].dclimalit=detail[field]>0 ? 1 : 0 ;
                                        flagString=true;
                                    }
//dormitorio_tipo_ventana_estrenar  typeOfWindow.brandNew
                                    if (field =='dormitorio_tipo_ventana_estrenar')
                                    {
                                        this.form[key][i].typeOfWindowbrandNew=detail[field]>0 ? 1 : 0 ;
                                        flagString=true;
                                    }
//dormitorio_dclimati  dclimalit
                                    if (field =='dormitorio_dclimati')
                                    {
                                        this.form[key][i].dclimalit=detail[field]>0 ? 1 : 0 ;
                                        flagString=true;
                                    }
//aire_condicionado_dormitorio   airConditioner
                                    if (field =='aire_condicionado_dormitorio')
                                    {
                                        this.form[key][i].airConditioner=detail[field]>0 ? 1 : 0 ;
                                        flagString=true;
                                    }
//TODO                                  
//pintura_dormitorio painting null
//TODO OR
//dormitorio_pintura_recien paints.paintedMakes.year
//dormitorio_tipo_suelo_estrenar  typeOfSoil.brandNew
                                    /*if (field =='dormitorio_tipo_suelo_estrenar')
                                    {
                                        this.form[key][i].typeOfSoilbrandNew=detail[field]>0 ? 1 : 0 ;
                                        flagString=true;
                                    }*/
//canape_dormitorio  canape
                                    if (field =='canape_dormitorio')
                                    {
                                        this.form[key][i].canape=detail[field]>0 ? 1 : 0 ;
                                        flagString=true;
                                    }
//canape_dormitorio_salon  canape
                                    if (field =='canape_dormitorio_salon')
                                    {
                                        this.form[key][i].canape=detail[field]>0 ? 1 : 0 ;
                                        flagString=true;
                                    }									
//en_suite  suite
                                    if (field =='en_suite')
                                    {
                                        this.form[key][i].suite=detail[field]>0 ? 1 : 0 ;
                                        flagString=true;
                                    } 
//bano_tipo_ventana_estrenar typeOfWindow.brandNew
                                    if (field =='bano_tipo_ventana_estrenar')
                                    {
                                        this.form[key][i].typeOfWindowbrandNew=detail[field]>0 ? 1 : 0 ;
                                        flagString=true;
                                    }
//banos_suite bathroomInBedroom
                                    /*if (field =='salon_dormitorio_tipo_suelo_estrenar')
                                    {
                                        this.form[key][i].bathroomInBedroom=detail[field]>0 ? 1 : 0 ;
                                        flagString=true;
                                    }*/
//bano_tipo_suelo_estrenar typeOfSoil.brandNew
                                   /* if (field =='bano_tipo_suelo_estrenar')
                                    {
                                        this.form[key][i].typeOfSoilbrandNew=detail[field]>0 ? 1 : 0 ;
                                        flagString=true;
                                    }*/
//'banos_banera' : 'bath',
                                    if (field =='banos_banera')
                                    {
                                        this.form[key][i].bath=detail[field]>0 ? 1 : 0 ;
                                        flagString=true;
                                    }
//'banos_ducha' : 'shower',
                                    if (field =='banos_ducha')
                                    {
                                        this.form[key][i].shower=detail[field]>0 ? 1 : 0 ;
                                        flagString=true;
                                    }
//'banos_bide' : 'bidet',
                                    if (field =='banos_bide')
                                    {
                                        this.form[key][i].bidet=detail[field]>0 ? 1 : 0 ;
                                        flagString=true;
                                    }
//'banos_jacuzzi' : 'jacuzzi',
                                    if (field =='banos_jacuzzi')
                                    {
                                        this.form[key][i].jacuzzi=detail[field]>0 ? 1 : 0 ;
                                        flagString=true;
                                    }
//'bano_dclimati' : 'dclimalit',    
                                    if (field =='bano_dclimati')
                                    {
                                        this.form[key][i].dclimalit=detail[field]>0 ? 1 : 0 ;
                                        flagString=true;
                                    }                               
//aire_condicionado_dormitorio_salon airConditioner
                                    if (field =='aire_condicionado_dormitorio_salon')
                                    {
                                        this.form[key][i].airConditioner=detail[field]>0 ? 1 : 0 ;
                                        flagString=true;
                                    }
//salon_dormitorio_dclimati   dclimalit
                                    if (field =='salon_dormitorio_dclimati')
                                    {
                                        this.form[key][i].dclimalit=detail[field]>0 ? 1 : 0 ;
                                        flagString=true;
                                    }
//salon_tipo_ventana_estrenar  typeOfWindow.brandNew
                                    if (field =='salon_tipo_ventana_estrenar')
                                    {
                                        this.form[key][i].typeOfWindow.brandNew=detail[field]>0 ? 1 : 0 ;
                                        flagString=true;
                                    } 
                                     //TODO
                                     //pintura_dormitorio_salon  painting
                                   //if (field =='pintura_dormitorio_salon')
                                   // {
                                   //     this.form[key][i].painting=detail[field]>0 ? 1 : 0 ;
                                   //     flagString=true;
                                   // }
//dormitorio_muebles_sofa muebles.sofa
                                    if (field =='dormitorio_muebles_sofa')
                                    {
                                        this.form[key][i].sofa=detail[field]>0 ? 1 : 0 ;
                                        flagString=true;
                                    }									
//dormitorio_muebles_sofa_cama muebles.sofa_cama
                                    if (field =='dormitorio_muebles_sofa_cama')
                                    {
                                        this.form[key][i].sofa_cama=detail[field]>0 ? 1 : 0 ;
                                        flagString=true;
                                    }									
//dormitorio_muebles_tv muebles.tv
                                    if (field =='dormitorio_muebles_tv')
                                    {
                                        this.form[key][i].tv=detail[field]>0 ? 1 : 0 ;
                                        flagString=true;
                                    }
//dormitorio_muebles_mesa_comedor muebles.mesa_comedor
                                    if (field =='dormitorio_muebles_mesa_comedor')
                                    {
                                        this.form[key][i].mesa_comedor=detail[field]>0 ? 1 : 0 ;
                                        flagString=true;
                                    }							
//dormitorio_muebles_escritorio muebles.escritorio
                                    if (field =='dormitorio_muebles_escritorio')
                                    {
                                        this.form[key][i].escritorio=detail[field]>0 ? 1 : 0 ;
                                        flagString=true;
                                    }
//dormitorio_muebles_comoda muebles.comoda
                                    if (field =='dormitorio_muebles_comoda')
                                    {
                                        this.form[key][i].comoda=detail[field]>0 ? 1 : 0 ;
                                        flagString=true;
                                    }	
//salon_dormitorio_muebles_sofa muebles.sofa
                                    if (field =='salon_dormitorio_muebles_sofa')
                                    {
                                        this.form[key][i].muebles.sofa=detail[field]>0 ? 1 : 0 ;
                                        flagString=true;
                                    }									
//salon_dormitorio_muebles_sofa_cama muebles.sofa_cama
                                    if (field =='salon_dormitorio_muebles_sofa_cama')
                                    {
                                        this.form[key][i].muebles.sofa_cama=detail[field]>0 ? 1 : 0 ;
                                        flagString=true;
                                    }									
//salon_dormitorio_muebles_tv muebles.tv
                                    if (field =='salon_dormitorio_muebles_tv')
                                    {
                                        this.form[key][i].muebles.tv=detail[field]>0 ? 1 : 0 ;
                                        flagString=true;
                                    }
//salon_dormitorio_muebles_mesa_comedor muebles.mesa_comedor
                                    if (field =='salon_dormitorio_muebles_mesa_comedor')
                                    {
                                        this.form[key][i].muebles.mesa_comedor=detail[field]>0 ? 1 : 0 ;
                                        flagString=true;
                                    }							
//salon_dormitorio_muebles_escritorio muebles.escritorio
                                    if (field =='salon_dormitorio_muebles_escritorio')
                                    {
                                        this.form[key][i].muebles.escritorio=detail[field]>0 ? 1 : 0 ;
                                        flagString=true;
                                    }
//salon_dormitorio_muebles_comoda muebles.comoda
                                    if (field =='salon_dormitorio_muebles_comoda')
                                    {
                                        this.form[key][i].muebles.comoda=detail[field]>0 ? 1 : 0 ;
                                        flagString=true;
                                    }								   
 //salon_dormitorio_tipo_suelo_estrenar
                                    if (field =='salon_dormitorio_tipo_suelo_estrenar')
                                    {
                                        if (flagString==false)
                                        {
                                        _.set(this.form[key][i], value, detail[field]);
                                        }
                                    }
                                    else
                                    {
                                        if (flagString==false)
                                        {
                                        _.set(this.form[key][i], value, detail[field]);
                                        }
                                    }

                                }
                            } 
                            else 
                            {
                                    /*alert('else');
                                    alert(field);
                                    alert(this.form[key]);
                                    alert(value);
                                    alert(detail[field]);*/
                                var flagElse = false;
                                if (field == 'aparador')
                                {

                                        this.form.receiver.sideboard=detail[field]>0 ? 1 : 0 ;
                                        flagElse=true;
                                }
                                if (field == 'almacenamiento')
                                {

                                        this.form.receiver.storage=detail[field]>0 ? 1 : 0 ;
                                        flagElse=true;
                                }
                                else
                                {
                                    if (flagElse==false)
                                    {
                                        _.set(this.form[key], value, detail[field]);
                                    }
                                }                                
                            }   
                        })
                    });
                }
            }
        }
    }
});