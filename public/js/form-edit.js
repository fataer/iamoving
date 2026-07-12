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
        // Variables para el feedback
        uploadError: null,
        uploadProgress: 0,
        totalFiles: 0,
        totalSize: 0,
        uploadedFiles: 0,
        uploadSpeed: 0,
        estimatedTime: 0,
        uploadStartTime: null,
        lastUploadedBytes: 0,
        lastUpdateTime: null,
        uploadSpeedHistory: [],
        isMobile: false,
        uploadStatus: 'preparando',
        // Nueva variable para controlar el bloqueo
        isUploading: false
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
        onSearch(search, loading) {
            loading(true);
            this.search(loading, search, this);
        },
        search: _.debounce((loading, search, vm) => {
            axios.get('/admin/informe/' + search).then(response => {
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
            for (const key in this.form) {
                if (this.formData.has(key)) {
                    this.formData.set(key, JSON.stringify(this.form[key]));
                } else {
                    this.formData.append(key, JSON.stringify(this.form[key]));
                }
            }
        },
debugFiles() {
    console.log('=== DEBUG DE ARCHIVOS ===');
    console.log('Total files:', this.totalFiles);
    console.log('Total size:', this.totalSize);
    console.log('Uploaded files:', this.uploadedFiles);
    console.log('Form data:', this.form);
    
    // Recalcular manualmente
    this.calculateTotalFiles();
},    
calculateTotalFiles() {
    let total = 0;
    let totalSize = 0;
    
    // Función helper para contar archivos en una sección
    const countFilesInSection = (section) => {
        if (!section) return { count: 0, size: 0 };
        
        let sectionCount = 0;
        let sectionSize = 0;
        
        if (section.files && Array.isArray(section.files)) {
            section.files.forEach(file => {
                if (file && file.file instanceof File) {
                    sectionCount++;
                    sectionSize += file.size || 0;
                }
            });
        }
        
        return { count: sectionCount, size: sectionSize };
    };
    
    // Contar en todas las secciones del formulario
    const sections = ['door', 'receiver', 'garage', 'boxroom', 'facade', 'portal', 'lift', 
                     'swimming', 'garden', 'gym', 'sauna', 'sports', 'childarea'];
    
    sections.forEach(sectionName => {
        const result = countFilesInSection(this.form[sectionName]);
        total += result.count;
        totalSize += result.size;
    });
    
    // Contar en arrays de secciones
    const arraySections = ['salons', 'kitchens', 'bedrooms', 'livingRoomBedrooms', 
                          'bathrooms', 'restrooms', 'hallways', 'dealers', 
                          'serviceRooms', 'bathServices'];
    
    arraySections.forEach(sectionName => {
        if (this.form[sectionName] && Array.isArray(this.form[sectionName])) {
            this.form[sectionName].forEach(item => {
                const result = countFilesInSection(item);
                total += result.count;
                totalSize += result.size;
            });
        }
    });
    
    this.totalFiles = total;
    this.totalSize = totalSize;
    
    console.log('=== CÁLCULO DE ARCHIVOS ===');
    console.log(`Total archivos: ${total}`);
    console.log(`Tamaño total: ${this.formatFileSize(totalSize)}`);
    
    return total;
},
        formatFileSize(bytes) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const sizes = ['Bytes', 'KB', 'MB', 'GB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
        },
    formatTime(seconds) {
        if (seconds <= 0) return 'Casi listo';
        if (seconds < 10) return 'Unos segundos';
        
        if (seconds < 60) {
            return `${Math.round(seconds)} seg`;
        } else if (seconds < 3600) {
            const minutes = Math.floor(seconds / 60);
            const secs = Math.round(seconds % 60);
            if (secs > 0 && minutes < 5) {
                return `${minutes} min ${secs} seg`;
            }
            return `${minutes} min`;
        } else {
            const hours = Math.floor(seconds / 3600);
            const minutes = Math.floor((seconds % 3600) / 60);
            if (minutes > 0) {
                return `${hours} h ${minutes} min`;
            }
            return `${hours} h`;
        }
    },
updateUploadProgress(event) {
    console.log('Progress event:', event);
    
    if (event.lengthComputable) {
        const currentTime = new Date().getTime();
        const currentLoaded = event.loaded;
        const total = event.total;
        
        // Actualizar progreso
        this.uploadProgress = Math.round((currentLoaded / total) * 100);
        
        // Calcular velocidad
        if (this.lastUpdateTime && this.lastUploadedBytes > 0) {
            const timeDiff = (currentTime - this.lastUpdateTime) / 1000;
            const bytesDiff = currentLoaded - this.lastUploadedBytes;
            
            if (timeDiff > 0) {
                const instantSpeed = bytesDiff / timeDiff;
                this.uploadSpeedHistory.push(instantSpeed);
                
                if (this.uploadSpeedHistory.length > 5) {
                    this.uploadSpeedHistory.shift();
                }
                
                const avgSpeed = this.uploadSpeedHistory.reduce((a, b) => a + b, 0) / this.uploadSpeedHistory.length;
                this.uploadSpeed = Math.round(avgSpeed / 1024); // Convertir a KB/s
                
                // Calcular tiempo restante - MEJORADO
                if (this.uploadSpeed > 0 && this.uploadProgress < 100) {
                    const remainingBytes = total - currentLoaded;
                    const remainingKB = remainingBytes / 1024;
                    this.estimatedTime = Math.max(1, Math.round(remainingKB / this.uploadSpeed));
                } else if (this.uploadProgress >= 100) {
                    // Cuando el progreso es 100%, el tiempo estimado debe ser 0
                    this.estimatedTime = 0;
                }
            }
        } else if (!this.lastUpdateTime) {
            // Primera actualización - estimar tiempo basado en velocidad promedio
            const elapsedTime = (currentTime - this.uploadStartTime) / 1000;
            if (elapsedTime > 1 && currentLoaded > 0) {
                const avgSpeed = currentLoaded / elapsedTime / 1024;
                if (avgSpeed > 0 && total > currentLoaded) {
                    const remainingKB = (total - currentLoaded) / 1024;
                    this.estimatedTime = Math.round(remainingKB / avgSpeed);
                }
            }
        }
        
        // Calcular archivos subidos
        if (this.totalFiles > 0 && total > 0) {
            this.uploadedFiles = Math.max(1, Math.round((currentLoaded / total) * this.totalFiles));
        }
        
        this.lastUpdateTime = currentTime;
        this.lastUploadedBytes = currentLoaded;
        
        console.log(`Progreso: ${this.uploadProgress}%, Tiempo estimado: ${this.estimatedTime}s`);
    }
},

    updateEstimatedTime() {
        // Si estamos subiendo y tenemos una velocidad calculada
        if (this.uploadStatus === 'subiendo' && this.uploadProgress < 100) {
            // Si tenemos datos de velocidad y progreso
            if (this.uploadSpeed > 0 && this.totalSize > 0 && this.uploadProgress > 0) {
                const uploadedBytes = (this.uploadProgress / 100) * this.totalSize;
                const remainingBytes = this.totalSize - uploadedBytes;
                const remainingKB = remainingBytes / 1024;
                
                // Calcular tiempo restante basado en velocidad actual
                const timeRemaining = remainingKB / this.uploadSpeed;
                
                // Aplicar un factor de ajuste basado en la variabilidad de velocidad
                let adjustedTime = timeRemaining;
                
                // Si tenemos historial de velocidad, ajustar según variabilidad
                if (this.uploadSpeedHistory.length >= 3) {
                    const lastSpeeds = this.uploadSpeedHistory.slice(-3);
                    const avgRecent = lastSpeeds.reduce((a, b) => a + b, 0) / lastSpeeds.length;
                    const speedRatio = avgRecent / this.uploadSpeed;
                    
                    // Si la velocidad reciente es muy diferente, ajustar la estimación
                    if (speedRatio < 0.7 || speedRatio > 1.3) {
                        adjustedTime = remainingKB / (avgRecent / 1024); // Usar velocidad reciente
                    }
                }
                
                this.estimatedTime = Math.max(1, Math.round(adjustedTime));
                console.log(`Tiempo estimado calculado: ${this.estimatedTime}s (velocidad: ${this.uploadSpeed} KB/s)`);
            }
        }
    },
// Añadir este método después de calculateTotalFiles
recalculateFilesOnChange() {
    // Esta función se puede llamar cuando se agregan/quitan archivos
    this.$nextTick(() => {
        const oldTotal = this.totalFiles;
        this.calculateTotalFiles();
        
        if (this.totalFiles !== oldTotal) {
            console.log(`Archivos actualizados: ${oldTotal} -> ${this.totalFiles}`);
        }
    });
},
    estimateUploadTime() {
        // Estimación más realista basada en tamaño y cantidad de archivos
        const totalKB = this.totalSize / 1024;
        const avgSpeed = 100; // KB/s como velocidad promedio inicial
        
        if (totalKB > 0) {
            // Tiempo base por tamaño
            let estimatedSeconds = totalKB / avgSpeed;
            
            // Agregar overhead por cantidad de archivos (0.3 segundos por archivo)
            const fileOverhead = this.totalFiles * 0.3;
            estimatedSeconds += fileOverhead;
            
            // Agregar margen de seguridad (20%)
            estimatedSeconds *= 1.2;
            
            return Math.max(5, Math.round(estimatedSeconds)); // Mínimo 5 segundos
        }
        return 0;
    },
async onSubmit() {
    // IMPORTANTE: Solo bloquear cuando realmente estamos subiendo
    this.isUploading = true;
    this.uploadError = null;
    this.uploadProgress = 0;
    this.uploadSpeed = 0;
    this.estimatedTime = 0;
    this.uploadedFiles = 0;
    
    // Recalcular totalFiles
    this.calculateTotalFiles();
    
    console.log(`=== INICIANDO SUBIDA ===`);
    console.log(`Total archivos: ${this.totalFiles}`);
    console.log(`Tamaño total: ${this.formattedTotalSize}`);
    console.log(`Tiempo estimado inicial: ${this.estimateUploadTime()} segundos`);
    
    this.uploadSpeedHistory = [];
    this.loading = true;
    this.uploadStatus = 'preparando';
    this.uploadStartTime = new Date().getTime();
    this.lastUpdateTime = null;
    this.lastUploadedBytes = 0;
    
    // Agregar un interval para actualizar el tiempo estimado
    if (this.timeUpdateInterval) {
        clearInterval(this.timeUpdateInterval);
    }
    
    this.timeUpdateInterval = setInterval(() => {
        if (this.uploadStatus === 'subiendo' && this.uploadProgress < 100) {
            this.updateEstimatedTime();
            console.log(`[Interval] Tiempo estimado actualizado: ${this.estimatedTime}s`);
        } else if (this.uploadStatus === 'completado' || this.uploadStatus === 'error') {
            clearInterval(this.timeUpdateInterval);
        }
    }, 1000); // Actualizar cada segundo
    
    try {
        this.setFormData();
        
        // Debug: Verificar contenido de FormData
        console.log('FormData entries:');
        let fileCount = 0;
        for (let pair of this.formData.entries()) {
            if (pair[1] instanceof File) {
                fileCount++;
                console.log(`Archivo ${fileCount}: ${pair[1].name} (${pair[1].size} bytes)`);
            }
        }
        console.log(`Archivos en FormData: ${fileCount}`);
        
        const config = {
            onUploadProgress: (progressEvent) => {
                this.uploadStatus = 'subiendo';
                if (progressEvent.lengthComputable) {
                    this.updateUploadProgress(progressEvent);
                } else {
                    // Si no es lengthComputable, hacer una estimación
                    if (progressEvent.loaded && this.uploadStartTime) {
                        const elapsedTime = (new Date().getTime() - this.uploadStartTime) / 1000;
                        if (elapsedTime > 0) {
                            const speed = progressEvent.loaded / elapsedTime / 1024;
                            this.uploadSpeed = Math.round(speed);
                            
                            // Estimar progreso basado en tiempo transcurrido
                            if (this.totalSize > 0) {
                                const estimatedProgress = Math.min(95, Math.round((progressEvent.loaded / this.totalSize) * 100));
                                this.uploadProgress = estimatedProgress;
                                this.uploadedFiles = Math.round((estimatedProgress / 100) * this.totalFiles);
                            }
                        }
                    }
                }
            },
            headers: {
                'Content-Type': 'multipart/form-data'
            },
            timeout: 300000 // 5 minutos
        };
        
        console.log(`Iniciando petición POST a /admin/informe/${this.reference.id}/update`);
        
        axios.post(`/admin/informe/${this.reference.id}/update`, this.formData, config)
        .then(response => {
            console.log('Respuesta del servidor recibida');
            this.uploadStatus = 'procesando';
            this.uploadProgress = 100;
            this.uploadedFiles = this.totalFiles;
            this.estimatedTime = 0;
            
            // SweetAlert original
            swal({
                title: "¡Actualización realizada con éxito!",
                text: `Referencia #${this.reference.id} actualizada correctamente`,
                icon: "success",
                timer: 5000,
                buttons: {
                    ok: {
                        text: "OK",
                        value: true,
                        visible: true,
                        className: "btn btn-primary"
                    }
                }
            }).then(() => {
                // Se ejecuta cuando se hace clic en OK o cuando termina el timer
                this.uploadStatus = 'completado';
                
                // Restablecer el botón de copiar si existe
                const copyBtn = document.querySelector('.btn-copy-reference');
                if (copyBtn) {
                    copyBtn.innerHTML = `<i class="glyphicon glyphicon-copy"></i> Copiar #${this.reference.id}`;
                    copyBtn.className = 'btn btn-sm btn-outline-secondary';
                    copyBtn.disabled = false;
                }
                
                location.reload();
            });
        })
        .catch((error) => {
            console.error('Error en la petición:', error);
            this.uploadStatus = 'error';
            this.uploadProgress = 0;
            this.estimatedTime = 0;
            
            if (error.response?.status === 422) {
                swal({
                    title: 'Error de validación',
                    text: error.response.data.message || 'Por favor, verifica los datos ingresados',
                    icon: 'error'
                });
            }
            else if (error.code === 'ECONNABORTED') {
                swal({
                    title: 'Tiempo de espera agotado',
                    text: 'La conexión tardó demasiado. Intenta con menos archivos o verifica tu conexión a internet.',
                    icon: 'error'
                });
            }
            else {
                swal({
                    title: 'Error en la actualización',
                    text: error.response?.data?.message || 'Ocurrió un error al procesar la solicitud',
                    icon: 'error'
                });
            }
        })
        .finally(() => {
            console.log('Finalizando proceso de subida');
            this.loading = false;
            this.isUploading = false;
            
            // Limpiar interval
            if (this.timeUpdateInterval) {
                clearInterval(this.timeUpdateInterval);
            }
            
            // Si hay error, mantener los datos por un momento
            if (this.uploadError) {
                setTimeout(() => {
                    this.uploadProgress = 0;
                    this.uploadSpeed = 0;
                }, 2000);
            }
        });
        
    } catch (error) {
        console.error('Error en la preparación de la subida:', error);
        
        let errorMessage = 'Error al procesar la solicitud';
        
        if (error.response) {
            const status = error.response.status;
            
            if (status === 422) {
                errorMessage = 'Error de validación. Por favor verifica los datos.';
            } else if (status === 413) {
                errorMessage = 'Archivos demasiado grandes. Límite total: 60MB';
            } else if (status === 419) {
                errorMessage = 'La sesión ha expirado. Recarga la página.';
            } else if (status === 500) {
                errorMessage = 'Error interno del servidor';
            } else if (error.response.data && error.response.data.message) {
                errorMessage = error.response.data.message;
            }
            
        } else if (error.request) {
            errorMessage = 'No se pudo conectar con el servidor';
        } else if (error.code === 'ECONNABORTED') {
            errorMessage = 'La conexión tardó demasiado. Intenta con menos archivos.';
        }
        
        this.uploadError = errorMessage;
        this.uploadStatus = 'error';
        
        // Limpiar interval
        if (this.timeUpdateInterval) {
            clearInterval(this.timeUpdateInterval);
        }
        
        swal('Error', errorMessage, 'error');
        this.loading = false;
        this.isUploading = false;
    }
},
        checkMobile() {
            this.isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
        },
        getSpeedText() {
            if (this.uploadSpeed === 0) return 'Calculando...';
            
            if (this.uploadSpeed < 100) {
                return `${this.uploadSpeed} KB/s`;
            } else if (this.uploadSpeed < 1024) {
                return `${this.uploadSpeed} KB/s`;
            } else {
                return `${(this.uploadSpeed / 1024).toFixed(1)} MB/s`;
            }
        }
    },
    computed: {
        formattedTotalSize() {
            return this.formatFileSize(this.totalSize);
        },
formattedEstimatedTime() {
    if (this.uploadStatus === 'subiendo' && this.estimatedTime > 0) {
        // Mostrar tiempo restante mientras se sube
        return this.formatTime(this.estimatedTime);
    } else if (this.uploadStatus === 'procesando') {
        // Mostrar mensaje cuando el servidor está procesando
        return 'Procesando...';
    } else if (this.totalSize > 0 && this.uploadStatus === 'preparando') {
        // Estimación inicial antes de empezar
        return this.formatTime(this.estimateUploadTime());
    } else if (this.uploadStatus === 'completado') {
        return '¡Completado!';
    } else if (this.uploadStatus === 'error') {
        return 'Error';
    }
    return 'Calculando...';
},
        statusMessage() {
            switch (this.uploadStatus) {
                case 'preparando':
                    return 'Preparando subida...';
                case 'subiendo':
                    return `Subiendo archivos... (${this.uploadedFiles}/${this.totalFiles})`;
                case 'procesando':
                    return 'Procesando información en el servidor...';
                case 'completado':
                    return '¡Completado!';
                case 'error':
                    return 'Error en la subida';
                default:
                    return 'Preparando...';
            }
        },
        // Nueva propiedad computada para determinar si mostrar el bloqueador
        shouldShowBlocker() {
            // Solo mostrar cuando estamos en móvil Y realmente subiendo (no solo loading)
            return this.isMobile && this.isUploading && this.uploadStatus === 'subiendo';
        }
    },
    mounted() {
        this.checkMobile();
        window.addEventListener('resize', this.checkMobile);
    },
    // Agregar un método para limpiar intervals:
beforeDestroy() {
    if (this.timeUpdateInterval) {
        clearInterval(this.timeUpdateInterval);
    }
    window.removeEventListener('resize', this.checkMobile);
},
    watch: {
        form: {
            deep: true,
            handler() {
                if (this.form) {
                // Usar setTimeout para evitar actualizaciones excesivas
                clearTimeout(this._filesTimeout);
                this._filesTimeout = setTimeout(() => {
                    this.recalculateFilesOnChange();
                }, 300);
                }
            }
        },
        reference({ detalles }) {
            this.formData = new FormData();
            this.form = _.cloneDeep(formDefault);
            this.totalFiles = 0;
            this.totalSize = 0;

            for (const key in mapData) {
                if (typeof mapData[key] == 'string') {
                    this.form[key] = this.reference[mapData[key]];
                } else if (typeof mapData[key] == 'object') {
                    const details = detalles.filter(detail => detail.type == mapData[key].type);

                    details.forEach((detail, i) => {
                        if (i > 0 && Array.isArray(this.form[key])) {
                            this.form[key].push({ ...formDefault[key][0] })
                        }

                        _.forIn(mapData[key].fields, (value, field) => {
                            if (Array.isArray(this.form[key])) {
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
            
            // Calcular archivos iniciales después de cargar la referencia
            this.$nextTick(() => {
                this.totalFiles = this.calculateTotalFiles();
            });
        }
    }
});

// Agregar estilos CSS
const style = document.createElement('style');
style.textContent = `
    .spinning {
        animation: spin 1s infinite linear;
        display: inline-block;
        margin-right: 5px;
    }
    @keyframes spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
    .upload-stats {
        margin: 15px 0;
        padding: 10px;
        border-radius: 4px;
        background-color: #f8f9fa;
        border-left: 4px solid #17a2b8;
    }
    #upload-progress {
        margin: 20px 0;
        padding: 15px;
        border-radius: 6px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }
    .upload-details {
        margin-top: 10px;
        font-size: 0.9em;
        opacity: 0.9;
    }
    .progress {
        height: 20px;
        margin-bottom: 10px;
        border-radius: 10px;
        background-color: rgba(255, 255, 255, 0.2);
    }
    .progress-bar {
        background-color: #4CAF50;
        border-radius: 10px;
        transition: width 0.3s ease;
    }
    .upload-info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 10px;
        margin-top: 10px;
    }
    .upload-info-item {
        background: rgba(255, 255, 255, 0.1);
        padding: 8px;
        border-radius: 4px;
        text-align: center;
    }
    .upload-info-item .label {
        font-size: 0.8em;
        opacity: 0.8;
        display: block;
        margin-bottom: 3px;
    }
    .upload-info-item .value {
        font-weight: bold;
        font-size: 1.1em;
    }
    .mobile-blocker {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(2px);
    }
    .speed-meter {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 3px 8px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 12px;
        font-size: 0.85em;
    }
    .speed-icon {
        animation: pulse 2s infinite;
    }
    @keyframes pulse {
        0% { opacity: 0.7; }
        50% { opacity: 1; }
        100% { opacity: 0.7; }
    }
`;
document.head.appendChild(style);