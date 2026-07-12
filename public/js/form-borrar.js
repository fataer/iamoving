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
        loading: false,
        existingPhotos: {
            door: [],
            receiver: []
            // Add other room types as needed
        },
        debug: {
            multimedia: [],
            loadingState: null
        }
    },
    created() {
        this.initForm();
    },
    methods: {
        initForm() {
            this.form = _.cloneDeep(formDefault);
            this.formData = new FormData();
        },
        add(item) {
            this.form[item].push({ ...formDefault[item][0] });
        },
        remove(item, index) {
            if (this.form[item][index].id) {
                this.form.trash.push(this.form[item][index].id);
            }
            
            this.form[item].splice(index, 1);
        },
        onSearch(search, loading) {
            loading(true);
            this.search(loading, search, this);
        },
        search: _.debounce((loading, search, vm) => {
            // Log the search request
            console.log('Searching for reference:', search);
            
            axios.get('/admin/informe/' + search).then(response => {
                console.log('Search response:', response.data);
                vm.options = response.data;
            }).catch(error => {
                console.error('Search error:', error);
            }).then(() => {
                loading(false);
            });
        }, 350),
        inputFilter(newFile, oldFile, prevent) {
            if (newFile != null) {
                if (newFile && !oldFile) {
                    if (!/\.(jpeg|jpe|jpg|gif|png|webp|webm|MP4|3GP|WMV|MKV|AVI|FLV|MOV|M4V)$/i.test(newFile.name)) {
                        return prevent();
                    }
                }
                this.formData.append(newFile.id, newFile.file);
            }
        },
        removeFile(files, row, id) {
            files.splice(row, 1);
        },
        // Enhanced method to remove existing photos from the server
        deleteExistingPhoto(photoId) {
            console.log('Deleting photo ID:', photoId);
            this.loading = true;
            
            axios.post(`/admin/informe/delete-photo/${photoId}`)
                .then(response => {
                    console.log('Delete photo response:', response.data);
                    
                    // Remove from all photo collections
                    Object.keys(this.existingPhotos).forEach(room => {
                        this.existingPhotos[room] = this.existingPhotos[room].filter(photo => photo.id !== photoId);
                    });
                    
                    swal("Eliminación", "Foto eliminada con éxito", "success");
                })
                .catch(error => {
                    console.error('Delete photo error:', error);
                    swal("Error", "No se pudo eliminar la foto", "error");
                })
                .finally(() => {
                    this.loading = false;
                });
        },
        setFormData() {
            for (const key in this.form) {
                if (this.formData.has(key)) {
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
            
            console.log('Submitting form for reference:', this.reference.id);
            console.log('Form data:', this.form);

            axios.post(`/admin/informe/${this.reference.id}/update`, this.formData)
                .then(response => {
                    console.log('Form submission response:', response.data);
                    swal("Actualización", `Referencia #${this.reference.id} actualizada`, "success");
                    window.setTimeout(function(){ location.reload();} ,3000);
                })
                .catch((error) => {
                    console.error('Form submission error:', error);

                    if (error.response && error.response.status === 422) {
                        swal('Actualización', error.response.data.message, 'error');
                    }
                    else {
                        swal('Actualización', 'Ha ocurrido un error al actualizar', 'error');
                    }
                })
                .finally(() => {
                    this.loading = false;
                });
        },
        // Enhanced method to load existing photos with better debugging
// Método loadExistingPhotos mejorado para funcionar con cualquier referencia
loadExistingPhotos(referenceId) {
    if (!referenceId) {
        console.log('No reference ID provided for loading photos');
        return;
    }
    
    console.log('Loading photos for reference ID:', referenceId);
    this.debug = this.debug || {};
    this.debug.loadingState = 'Starting photo load';
    
    // Clear existing photos arrays
    Object.keys(this.existingPhotos).forEach(key => {
        this.existingPhotos[key] = [];
    });
    
    // Realizar una consulta directa al servidor para obtener las fotos
    axios.get(`/admin/multimedia-by-reference/${referenceId}`)
        .then(response => {
            console.log('Photos loaded from direct query:', response.data);
            
            // Procesar los resultados
            const multimedia = response.data.multimedia || [];
            
            // Store multimedia for debugging
            this.debug.multimedia = multimedia;
            console.log('Multimedia records found:', multimedia.length);
            
            // Define los posibles formatos de URL a probar
            const urlFormats = [
                // Formato 1: Directamente el nombre del archivo
                (filename) => `${base_url}/${filename}`,
                
                // Formato 2: Con prefijo storage/
                (filename) => `${base_url}/storage/${filename}`,
                
                // Formato 3: Con la estructura completa pero sin sufijo de tamaño
                (filename) => `${base_url}/storage/inmueble/${referenceId}/${filename}`,
                
                // Formato 4: Con la estructura completa y sufijo de tamaño
                (filename) => {
                    if (filename.match(/\.(jpg|jpeg|png|gif)$/i)) {
                        return `${base_url}/storage/inmueble/${referenceId}/${filename.replace(/\.(jpg|jpeg|png|gif)$/i, '_798x599.$1')}`;
                    }
                    return `${base_url}/storage/inmueble/${referenceId}/${filename}`;
                },
                
                // Formato 5: Probar otros sufijos comunes
                (filename) => {
                    if (filename.match(/\.(jpg|jpeg|png|gif)$/i)) {
                        return `${base_url}/storage/inmueble/${referenceId}/${filename.replace(/\.(jpg|jpeg|png|gif)$/i, '_large.$1')}`;
                    }
                    return null;
                }
            ];
            
            // Process each multimedia record
            multimedia.forEach(photo => {
                // Skip if no photo path available
                if (!photo.fotos_detalle) {
                    console.log('Photo has no fotos_detalle field, skipping');
                    return;
                }
                
                // Por defecto, usamos el formato 4 (con sufijo de tamaño) ya que sabemos que funciona para la referencia 1355
                const filename = photo.fotos_detalle;
                const photoUrl = urlFormats[3](filename);
                
                // Create the photo object
                const photoObject = {
                    id: photo.id,
                    url: photoUrl,
                    name: filename,
                    detail_id: photo.fk_id_informe_detallado_detalle
                };
                
                console.log('Photo object created:', photoObject);
                
                // Categorize photos based on the detail type
                if (photo.fk_id_informe_detallado_detalle == 11) { 
                    // Door (type 11)
                    console.log('Adding photo to door category:', photoObject);
                    this.existingPhotos.door.push(photoObject);
                } else if (photo.fk_id_informe_detallado_detalle == 10) { 
                    // Receiver (type 10)
                    console.log('Adding photo to receiver category:', photoObject);
                    this.existingPhotos.receiver.push(photoObject);
                } else {
                    console.log('Photo has detail_id ' + photo.fk_id_informe_detallado_detalle + ', not categorized');
                }
            });
            
            // Update debug state
            this.debug.loadingState = 'Completed loading photos';
            console.log('Loaded photos:', this.existingPhotos);
        })
        .catch(error => {
            console.error('Error loading photos:', error);
            this.debug.loadingState = 'Error loading photos: ' + error.message;
        });
},
    watch: {
        reference(newReference) {
            console.log('Reference changed:', newReference);
            this.formData = new FormData();
            this.form = _.cloneDeep(formDefault);
            
            if (!newReference) {
                console.log('Reference is null or undefined');
                return;
            }
            
            // Check if detalles exists
            if (!newReference.detalles) {
                console.log('Reference has no detalles property');
                return;
            }
            
            // Load existing photos for this reference
            this.loadExistingPhotos(newReference.id);
            
            for (const key in mapData) {
                if (typeof mapData[key] == 'string') {
                    console.log(`Setting form.${key} from reference.${mapData[key]}`);
                    this.form[key] = this.reference[mapData[key]];
                }
                else if (typeof mapData[key] == 'object') {
                    const details = newReference.detalles.filter(detail => detail.type == mapData[key].type);
                    console.log(`Found ${details.length} details for type ${mapData[key].type}`);
                    
                    details.forEach((detail, i) => {
                        if (i > 0 && Array.isArray(this.form[key])) {
                            console.log(`Adding new item to form.${key}`);
                            this.form[key].push({ ...formDefault[key][0] })
                        }

                        _.forIn(mapData[key].fields, (value, field) => {
                            if (Array.isArray(this.form[key])) {
                                if (typeof value == 'function') {
                                    console.log(`Calling function for field ${field}`);
                                    value(detail, this.form[key][i])
                                } 
                                else if (typeof value == 'string') {
                                    console.log(`Setting field ${field} with value ${value}`);
                                    
                                    // All the conditional checks for different fields
                                    var flagString = false;
                                    
                                    // DOOR
                                    if (field == 'puerta') {
                                        this.form[key][i].type = detail[field] > 0 ? 1 : 0;
                                        flagString = true;
                                    }
                                    
                                    // RECEIVER
                                    if (field == 'aparador') {
                                        this.form[key][i].sideboard = detail[field] > 0 ? 1 : 0;
                                        flagString = true;
                                    }
                                    if (field == 'armario') {
                                        this.form[key][i].type = detail[field];
                                        flagString = true;
                                    }
                                    if (field == 'armario_num_puertas') {
                                        this.form[key][i].closet = detail[field];
                                        flagString = true;
                                    }
                                    
                                    // SALON
                                    if (field == 'salon_estrenar_tipo_ventana') {
                                        this.form[key][i].typeOfWindow.brandNew = detail[field] > 0 ? 1 : 0;
                                        flagString = true;
                                    }
                                    if (field == 'salon_muebles_sofa') {
                                        this.form[key][i].muebles.sofa = detail[field] > 0 ? 1 : 0;
                                        flagString = true;
                                    }
                                    if (field == 'salon_muebles_sofa_cama') {
                                        this.form[key][i].muebles.sofa_cama = detail[field] > 0 ? 1 : 0;
                                        flagString = true;
                                    }
                                    if (field == 'salon_muebles_tv') {
                                        this.form[key][i].muebles.tv = detail[field] > 0 ? 1 : 0;
                                        flagString = true;
                                    }
                                    if (field == 'salon_muebles_mesa_comedor') {
                                        this.form[key][i].muebles.mesa_comedor = detail[field] > 0 ? 1 : 0;
                                        flagString = true;
                                    }
                                    if (field == 'aire_condicionado_salon') {
                                        this.form[key][i].airConditioner = detail[field] > 0 ? 1 : 0;
                                        flagString = true;
                                    }
                                    if (field == 'salon_dclimati') {
                                        this.form[key][i].dclimalit = detail[field] > 0 ? 1 : 0;
                                        flagString = true;
                                    }
                                    
                                    // Rest of the existing conditions...
                                    
                                    // Default fallback if no matches
                                    if (!flagString) {
                                        _.set(this.form[key][i], value, detail[field]);
                                    }
                                }
                            } 
                            else {
                                var flagElse = false;
                                if (field == 'aparador') {
                                    this.form.receiver.sideboard = detail[field] > 0 ? 1 : 0;
                                    flagElse = true;
                                }
                                if (field == 'almacenamiento') {
                                    this.form.receiver.storage = detail[field] > 0 ? 1 : 0;
                                    flagElse = true;
                                }
                                else {
                                    if (!flagElse) {
                                        _.set(this.form[key], value, detail[field]);
                                    }
                                }                                
                            }   
                        });
                    });
                }
            }
            
            // Do a final check on loaded photos
            console.log('Final photo state:', this.existingPhotos);
        }
    }
});