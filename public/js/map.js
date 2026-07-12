const form = [
    { label: 'Salón', videos: [], files: [] },
    { label: 'Cocina', videos: [], files: [] },
    { label: 'Dormitorio', videos: [], files: [] },
    { label: 'Salón - Dormitorio', videos: [], files: [] },
    { label: 'baño', videos: [], files: [] },
    { label: 'Aseo', videos: [], files: [] },
    { label: 'Pasillo', videos: [], files: [] },
    { label: 'Distribuidor', videos: [], files: [] },
    { label: 'Habitación de servicio', videos: [], files: [] },
    { label: 'Baño de servicio', videos: [], files: [] },
	{ label: 'Recibidor', videos: [], files: [] },
    { label: 'Puerta', videos: [], files: [] },
	{ label: 'Garaje', videos: [], files: [] },
	{ label: 'Trastero', videos: [], files: [] },
	{ label: 'Fachada', videos: [], files: [] },
	{ label: 'Portal', videos: [], files: [] },
	{ label: 'Ascensor', videos: [], files: [] },
	{ label: 'Piscina', videos: [], files: [] },
	{ label: 'Jardín', videos: [], files: [] },
	{ label: 'Gimnasio', videos: [], files: [] },
	{ label: 'Sauna', videos: [], files: [] },
	{ label: 'Zona deportiva', videos: [], files: [] },
	{ label: 'Zona infantil', videos: [], files: [] },
	{ label: 'Transporte', videos: [], files: [] },
	{ label: 'Lugares de interés', videos: [], files: [] }
	

];

// process: 1 only, 2 loop
const mapData = {
    isSale: 'is_sale',
	tipo_inmueble: 'tipo_inmueble',
    door: {
        type: 11,
        fields: {
            'id': 'id',
            'puerta': 'type'
        },
    },
    receiver: {
        type: 10,
        fields: {
            'id': 'id',
            'aparador': 'sideboard',
            'almacenamiento': 'storage',
            'armario_num_puertas': 'closet',
            'armario': 'type',
            'tamano_prox_recibidor': 'size',
            'sepuede_sacar_algo_mueble_recibidor': 'take',
        }
    },
	garage: {
        type: 12,
        fields: {
            'id': 'id',
            'descripcion': 'description',
            'tamano': 'size',
            'tipo': 'type',
            'numero': 'number',
            'situacion': 'situation',
        }
    },
	 boxroom: {
        type: 13,
        fields: {
            'id': 'id',
            'descripcion': 'description',
            'tamano': 'size',
        }
    },
	facade: {
        type: 14,
        fields: {
            'id': 'id',
            'descripcion': 'description',
            /*'tamano': 'size',
            'tipo': 'type',
            'numero': 'number',
            'situacion': 'situation',*/
        }
    },
	portal: {
        type: 15,
        fields: {
            'id': 'id',
            'descripcion': 'description',
            /*'tamano': 'size',
            'tipo': 'type',
            'numero': 'number',
            'situacion': 'situation',*/
        }
    },	
	    lift: {
        type: 16,
        fields: {
            'id': 'id',
            'descripcion': 'description',
            'numero': 'number',
        }
    },
	    swimming: {
        type: 17,
        fields: {
            'id': 'id',
            'descripcion': 'description',
            /*'tamano': 'size',
            'tipo': 'type',
            'numero': 'number',
            'situacion': 'situation',*/
        }
    },
	    garden: {
        type: 18,
        fields: {
            'id': 'id',
            'descripcion': 'description',
            /*'tamano': 'size',
            'tipo': 'type',
            'numero': 'number',
            'situacion': 'situation',*/
        }
    },
	    gym: {
        type: 19,
        fields: {
            'id': 'id',
            'descripcion': 'description',
            /*'tamano': 'size',
            'tipo': 'type',
            'numero': 'number',
            'situacion': 'situation',*/
        }
    },
	    sauna: {
        type: 20,
        fields: {
            'id': 'id',
            'descripcion': 'description',
            /*'tamano': 'size',
            'tipo': 'type',
            'numero': 'number',
            'situacion': 'situation',*/
        }
    },
	    sports: {
        type: 21,
        fields: {
            'id': 'id',
            'descripcion': 'description',
            /*'tamano': 'size',
            'tipo': 'type',
            'numero': 'number',
            'situacion': 'situation',*/
        }
    },
	    childarea: {
        type: 22,
        fields: {
            'id': 'id',
            'descripcion': 'description',
           /* 'tamano': 'size',
            'tipo': 'type',
            'numero': 'number',
            'situacion': 'situation',*/
        }
    },	
    salons: {
        type: 0,
        fields: {
            'id': 'id',
            'tamano_aproximado_salon': 'size',
            'venta_salon': 'windoww',
            'orientacion_salon': 'orientation',
            'tipo_ventana_salon': 'typeOfWindow.windoww',
            'pintura_salon': 'painting',
            'salon_pared': 'wall',
            'tipo_suelo_salon': 'typeOfSoil.type',
            'salon_estrenar_tipo_ventana': 'typeOfWindow.brandNew',
            'salon_cambiado_hace_tipo_ventana'(db, obj) {
                // db separado por -
                const yearAndMount = db['salon_cambiado_hace_tipo_ventana'].split('-');

                if (yearAndMount[0]) {
                    _.set(obj, 'typeOfWindow.changed.year', yearAndMount[0]);
                }

                if (yearAndMount[1]) {
                    _.set(obj, 'typeOfWindow.changed.month', yearAndMount[1]);
                }
            },

            'salon_puesta_hace_tipo_ventana'(db, obj) {
                // db separado por -
                const yearAndMount = db['salon_puesta_hace_tipo_ventana'].split('-');

                if (yearAndMount[0]) {
                    _.set(obj, 'typeOfWindow.putting.year', yearAndMount[0]);
                }

                if (yearAndMount[1]) {
                    _.set(obj, 'typeOfWindow.putting.month', yearAndMount[1]);
                }
            },
            'salon_pintuta_cambiada_hace'(db, obj) {
                // db separado por -
                const yearAndMount = db['salon_pintuta_cambiada_hace'].split('-');

                if (yearAndMount[0]) {
                    _.set(obj, 'paints.justPainted.year', yearAndMount[0]);
                }

                if (yearAndMount[1]) {
                    _.set(obj, 'paints.justPainted.month', yearAndMount[1]);
                }
            },
            'salon_tipo_suelo_estrenar': 'typeOfSoil.brandNew',
            'salon_tipo_suelo_cambiado'(db, obj) {
                // db separado por -
                const yearAndMount = db['salon_tipo_suelo_cambiado'].split('-');

                if (yearAndMount[0]) {
                    _.set(obj, 'typeOfSoil.changed.year', yearAndMount[0]);
                }

                if (yearAndMount[1]) {
                    _.set(obj, 'typeOfSoil.changed.month', yearAndMount[1]);
                }
            },
            'salon_tipo_suelo_puesto'(db, obj) {
                // db separado por -
                const yearAndMount = db['salon_tipo_suelo_puesto'].split('-');

                if (yearAndMount[0]) {
                    _.set(obj, 'typeOfSoil.putting.year', yearAndMount[0]);
                }

                if (yearAndMount[1]) {
                    _.set(obj, 'typeOfSoil.putting.month', yearAndMount[1]);
                }
            }, 
            'salon_dormitorio_balcon_m': 'balcony',
            'salon_dormitorio_tereza_m': 'terrace',
			'salon_muebles_sofa': 'muebles.sofa',
			'salon_muebles_sofa_cama': 'muebles.sofa_cama',
			'salon_muebles_tv': 'muebles.tv',
			'salon_muebles_mesa_comedor': 'muebles.mesa_comedor',
            'aire_condicionado_salon': 'airConditioner',
            'sepuede_sacar_algo_mueble_salon': 'take',
            'salon_dclimati': 'dclimalit',
        }
    },
    kitchens: {
        type: 1,
        fields: {
            'id': 'id',
            'tanano_aproximado_cocina': 'size',
            'estado_cocina': 'state.state',
            'cocina_estado_estrenar': 'state.brandNew',
            'cocina_estado_reformada'(db, obj) {
                // db separado por -
                const yearAndMount = db['cocina_estado_reformada'].split('-');

                if (yearAndMount[0]) {
                    _.set(obj, 'state.reformedAgo.year', yearAndMount[0]);
                }

                if (yearAndMount[1]) {
                    _.set(obj, 'state.reformedAgo.month', yearAndMount[1]);
                }
            },
            'tipo_cocina': 'typeOfKitchen',
            'ventana_cocina': 'windoww',
            'tipo_ventana_cocina': 'typeOfWindow.windoww',
            'cocina_tipo_ventana_estrenar': 'typeOfWindow.brandNew',
            'cocina_tipo_ventana_cambiado'(db, obj) {
                // db separado por -
                const yearAndMount = db['cocina_tipo_ventana_cambiado'].split('-');

                if (yearAndMount[0]) {
                    _.set(obj, 'typeOfWindow.changed.year', yearAndMount[0]);
                }

                if (yearAndMount[1]) {
                    _.set(obj, 'typeOfWindow.changed.month', yearAndMount[1]);
                }
            },
            'cocina_tipo_ventana_puesta'(db, obj) {
                // db separado por -
                const yearAndMount = db['cocina_tipo_ventana_puesta'].split('-');

                if (yearAndMount[0]) {
                    _.set(obj, 'typeOfWindow.putting.year', yearAndMount[0]);
                }

                if (yearAndMount[1]) {
                    _.set(obj, 'typeOfWindow.putting.month', yearAndMount[1]);
                }
            },
            'cocina_balcon_m': 'balcony',
            'cocina_terreza_m': 'terrace',
            'cocina_equipaje_extractor': 'luggage.extractor',
            'cocina_equipaje_microondas': 'luggage.microwaveOven',
            'cocina_equipaje_horno': 'luggage.oven',
            'cocina_equipaje_nevera': 'luggage.fridge',
            'cocina_equipaje_lavadora': 'luggage.washingMachine',
            'cocina_equipaje_secadora': 'luggage.dryer',
			'cocina_equipaje_lavaseca': 'luggage.washingDryer',
            'cocina_equipaje_lavavajillas': 'luggage.dishwasher',
			'cocina_equipaje_menaje': 'luggage.menaje',
			'cocina_equipaje_lavadero': 'luggage.lavadero',
            'cocina_fuego_vitroceramica': 'typeOfFire.vitroceramica',
			'cocina_fuego_induccion': 'typeOfFire.induccion',
            'cocina_fuego_gas_nuevo': 'typeOfFire.naturalGas',
            'cocina_fuego_placa_electronica': 'typeOfFire.electricPlate',
            'cocina_fuego_bombonra_gas': 'typeOfFire.dasCylinder',
            'tipo_suelo_cocina': 'typeOfSoil.type',
            'cocina_tipo_suelo_estrenar': 'typeOfSoil.brandNew',
            'cocina_tipo_suelo_cambiado'(db, obj) {
                // db separado por -
                const yearAndMount = db['cocina_tipo_suelo_cambiado'].split('-');

                if (yearAndMount[0]) {
                    _.set(obj, 'typeOfSoil.changed.year', yearAndMount[0]);
                }

                if (yearAndMount[1]) {
                    _.set(obj, 'typeOfSoil.changed.month', yearAndMount[1]);
                }
            },
            'cocina_tipo_suelo_puesto'(db, obj) {
                // db separado por -
                const yearAndMount = db['cocina_tipo_suelo_puesto'].split('-');

                if (yearAndMount[0]) {
                    _.set(obj, 'typeOfSoil.putting.year', yearAndMount[0]);
                }

                if (yearAndMount[1]) {
                    _.set(obj, 'typeOfSoil.putting.month', yearAndMount[1]);
                }
            },
            'cocina_dclimati': 'dclimalit',
            'sepuede_sacar_algo_mueble_cocina': 'take',
        }
    },
    bedrooms: {
        type: 2,
        fields: {
            'id': 'id',
            'tamano_aproximado_dormitorio': 'size',
            'tamano_dormitorio' : 'sizeBedroom',
            'armarios_dormitorio': 'closet',
            'dormitorio_armarios_dormitorio_puertas' : 'doors',
            'ventana_dormitorio' : 'windoww',
            'orientacion_dormitorio' : 'orientation',
            'tipo_ventana_dormitorio' : 'typeOfWindowwindoww',
            'dormitorio_tipo_ventana_estrenar' : 'typeOfWindowbrandNew',
            'dormitorio_tipo_ventana_cambiado'(db, obj) {
                // db separado por -
                const yearAndMount = db['dormitorio_tipo_ventana_cambiado'].split('-');

                if (yearAndMount[0]) {
                    _.set(obj, 'typeOfWindowchangedyear', yearAndMount[0]);
                }

                if (yearAndMount[1]) {
                    _.set(obj, 'typeOfWindowchangedmonth', yearAndMount[1]);
                }
            },
            'dormitorio_tipo_ventana_puesto'(db, obj) {
                // db separado por -
                const yearAndMount = db['dormitorio_tipo_ventana_puesto'].split('-');

                if (yearAndMount[0]) {
                    _.set(obj, 'typeOfWindowputtingyear', yearAndMount[0]);
                }

                if (yearAndMount[1]) {
                    _.set(obj, 'typeOfWindowputtingmonth', yearAndMount[1]);
                }
            },
            'dormitorio_balcon_m' : 'balcony',
            'dormitorio_terreza_m' : 'terrace',
'dormitorio_muebles_sofa': 'sofa',
'dormitorio_muebles_sofa_cama': 'sofa_cama',
'dormitorio_muebles_tv': 'tv',
'dormitorio_muebles_mesa_comedor': 'mesa_comedor',
'dormitorio_muebles_escritorio': 'escritorio',
'dormitorio_muebles_comoda': 'comoda',			
            'dormirotio_pared' : 'wall',
            'sepuede_sacar_algo_mueble_dormirorio' : 'take',
            'dormitorio_dclimati' : 'dclimalit',
            'aire_condicionado_dormitorio' : 'airConditioner',
			'tipo_cama_dormitorio' : 'typeBed',
			'canape_dormitorio' : 'canape',
            'pintura_dormitorio' : 'painting',
            'dormitorio_pintura_recien'(db, obj) {
                // db separado por -
                const yearAndMount = db['dormitorio_pintura_recien'].split('-');

                if (yearAndMount[0]) {
                    _.set(obj, 'paintspaintedMakesyear', yearAndMount[0]);
                }

                if (yearAndMount[1]) {
                    _.set(obj, 'paintspaintedMakesmonth', yearAndMount[1]);
                }
            },
            //'dormitorio_pintura_recien' : 'paints.paintedMakes.year',
            'dormitorio_pintura_recien_pintada'(db, obj) {
                // db separado por -
                const yearAndMount = db['dormitorio_pintura_recien_pintada'].split('-');

                if (yearAndMount[0]) {
                    _.set(obj, 'paintsjustPaintedyear', yearAndMount[0]);
                }

                if (yearAndMount[1]) {
                    _.set(obj, 'paintsjustPaintedmonth', yearAndMount[1]);
                }
            },
            'dormitorio_pared' : 'wall',
            'tipo_suelo_dormitorio' : 'typeOfSoiltype',
            'dormitorio_tipo_suelo_estrenar' : 'typeOfSoilbrandNew',
            'dormitorio_tipo_suelo_cambiado'(db, obj) {
                // db separado por -
                const yearAndMount = db['dormitorio_tipo_suelo_cambiado'].split('-');

                if (yearAndMount[0]) {
                    _.set(obj, 'typeOfSoilchangedyear', yearAndMount[0]);
                }

                if (yearAndMount[1]) {
                    _.set(obj, 'typeOfSoilchangedmonth', yearAndMount[1]);
                }
            },
            'dormitorio_tipo_suelo_puesto'(db, obj) {
                // db separado por -
                const yearAndMount = db['dormitorio_tipo_suelo_puesto'].split('-');

                if (yearAndMount[0]) {
                    _.set(obj, 'typeOfSoilputtingyear', yearAndMount[0]);
                }

                if (yearAndMount[1]) {
                    _.set(obj, 'typeOfSoilputtingmonth', yearAndMount[1]);
                }
            },
            'en_suite' : 'suite',
            'precio': 'precio'
        }
    },
    livingRoomBedrooms: {
        type: 3,
        fields: {
            'id': 'id',
            'tamano_aprox_salon' : 'size',
            'salon_dormitorio_pared' : 'wall',
            'salon_dormitorio_balcon_m' : 'balcony',
            'salon_dormitorio_tereza_m' : 'terrace',
            'salon_dormitorio_dclimati' : 'dclimalit',
            'sepuede_sacar_algo_mueble_salon_dormitorio' : 'take',
            'ventana_dormitorio_salon' : 'windoww',
            'salon_tipo_ventana_estrenar' : 'typeOfWindow.brandNew',
            'salon_tipo_ventana_cambiado'(db, obj) {
                // db separado por -
                const yearAndMount = db['salon_tipo_ventana_cambiado'].split('-');

                if (yearAndMount[0]) {
                    _.set(obj, 'typeOfWindow.changed.year', yearAndMount[0]);
                }

                if (yearAndMount[1]) {
                    _.set(obj, 'typeOfWindow.changed.month', yearAndMount[1]);
                }
            },
            'salon_tipo_ventana_puesto'(db, obj) {
                // db separado por -
                const yearAndMount = db['salon_tipo_ventana_puesto'].split('-');

                if (yearAndMount[0]) {
                    _.set(obj, 'typeOfWindow.putting.year', yearAndMount[0]);
                }

                if (yearAndMount[1]) {
                    _.set(obj, 'typeOfWindow.putting.month', yearAndMount[1]);
                }
            },
            'orientacion_dormitorio_salon' : 'orientation',
            'tipo_ventana_dormitorio_salon' : 'typeOfWindow.windoww',
            'pintura_dormitorio_salon' : 'painting',

            'salon_pintura_recien'(db, obj) {
                // db separado por -
                const yearAndMount = db['salon_pintura_recien'].split('-');

                if (yearAndMount[0]) {
                    _.set(obj, 'paints.paintedMakes.year', yearAndMount[0]);
                }

                if (yearAndMount[1]) {
                    _.set(obj, 'paints.paintedMakes.month', yearAndMount[1]);
                }
            },
            'salon_pintura_recien_pintada'(db, obj) {
                // db separado por -
                const yearAndMount = db['salon_pintura_recien_pintada'].split('-');

                if (yearAndMount[0]) {
                    _.set(obj, 'paints.justPainted.year', yearAndMount[0]);
                }

                if (yearAndMount[1]) {
                    _.set(obj, 'paints.justPainted.month', yearAndMount[1]);
                }
            },
            'tipo_suelo_dormitorio_salon' : 'typeOfSoil.type',
            'salon_dormitorio_tipo_suelo_estrenar': 'typeOfSoil.brandNew',
            'salon_dormitorio_tipo_suelo_cambiado'(db, obj) {
                // db separado por -
                const yearAndMount = db['salon_dormitorio_tipo_suelo_cambiado'].split('-');

                if (yearAndMount[0]) {
                    _.set(obj, 'typeOfSoil.changed.year', yearAndMount[0]);
                }

                if (yearAndMount[1]) {
                    _.set(obj, 'typeOfSoil.changed.month', yearAndMount[1]);
                }
            },
            'salon_dormitorio_tipo_suelo_puesto'(db, obj) {
                // db separado por -
                const yearAndMount = db['salon_dormitorio_tipo_suelo_puesto'].split('-');

                if (yearAndMount[0]) {
                    _.set(obj, 'typeOfSoil.putting.year', yearAndMount[0]);
                }

                if (yearAndMount[1]) {
                    _.set(obj, 'typeOfSoil.putting.month', yearAndMount[1]);
                }
            }, 
'salon_dormitorio_muebles_sofa': 'muebles.sofa',
'salon_dormitorio_muebles_sofa_cama': 'muebles.sofa_cama',
'salon_dormitorio_muebles_tv': 'muebles.tv',
'salon_dormitorio_muebles_mesa_comedor': 'muebles.mesa_comedor',
'salon_dormitorio_muebles_escritorio': 'muebles.escritorio',
'salon_dormitorio_muebles_comoda': 'muebles.comoda',            
            'aire_condicionado_dormitorio_salon' : 'airConditioner',
            'tipo_cama_dormitorio_salon' : 'typeBed',
			'canape_dormitorio_salon' : 'canape',
            'armarios_dormitorio_saldon' : 'closet.closet',
            'salon_dorimitorio_puertas' : 'closet.doors',
        }
    },
    bathrooms: {
        type: 4,
        fields: {
            'id': 'id',
            'tamano_aprox_banos' : 'size',
            'bano_dentro_dormitorio' : 'bathroomInBedroom',
            'banos_suite' : 'bathroomInBedroom',
            'estado_reforma_banos' : 'reformStatusstate',
            'banos_estado_estrenar' : 'reformStatusbrandNew',
            'banos_estado_reformada'(db, obj) {
                // db separado por -
                const yearAndMount = db['banos_estado_reformada'].split('-');

                if (yearAndMount[0]) {
                    _.set(obj, 'reformStatusreformedAgoyear', yearAndMount[0]);
                }

                if (yearAndMount[1]) {
                    _.set(obj, 'reformStatusreformedAgomonth', yearAndMount[1]);
                }
            },
            'banos_banera' : 'bath',
            'banos_ducha' : 'shower',
            'banos_bide' : 'bidet',
            'banos_jacuzzi' : 'jacuzzi',
            'bano_dclimati' : 'dclimalit',
            'sepuede_sacar_algo_mueble_bano' : 'take',
            'venta_banos' : 'windoww',
            'tipo_ventana' : 'typeOfWindowwindoww',
            'bano_tipo_ventana_estrenar' : 'typeOfWindowbrandNew',
            'bano_tipo_ventana_cambiado'(db, obj) {
                // db separado por -
                const yearAndMount = db['bano_tipo_ventana_cambiado'].split('-');

                if (yearAndMount[0]) {
                    _.set(obj, 'typeOfWindowchangedyear', yearAndMount[0]);
                }

                if (yearAndMount[1]) {
                    _.set(obj, 'typeOfWindowchangedmonth', yearAndMount[1]);
                }
            },
            'bano_tipo_ventana_puesto'(db, obj) {
                // db separado por -
                const yearAndMount = db['bano_tipo_ventana_puesto'].split('-');

                if (yearAndMount[0]) {
                    _.set(obj, 'typeOfWindowputtingyear', yearAndMount[0]);
                }

                if (yearAndMount[1]) {
                    _.set(obj, 'typeOfWindowputtingmonth', yearAndMount[1]);
                }
            },
            'tipo_suelo_banos' : 'typeOfSoiltype',
            'bano_tipo_suelo_estrenar' : 'typeOfSoilbrandNew',
            'bano_tipo_suelo_cambiado'(db, obj) {
                // db separado por -
                const yearAndMount = db['bano_tipo_suelo_cambiado'].split('-');

                if (yearAndMount[0]) {
                    _.set(obj, 'typeOfSoilchangedyear', yearAndMount[0]);
                }

                if (yearAndMount[1]) {
                    _.set(obj, 'typeOfSoilchangedmonth', yearAndMount[1]);
                }
            },
            'bano_tipo_suelo_puesto'(db, obj) {
                // db separado por -
                const yearAndMount = db['bano_tipo_suelo_puesto'].split('-');

                if (yearAndMount[0]) {
                    _.set(obj, 'typeOfSoilputtingyear', yearAndMount[0]);
                }

                if (yearAndMount[1]) {
                    _.set(obj, 'typeOfSoilputtingmonth', yearAndMount[1]);
                }
            }
        }
    },
    restrooms: {
        type: 5,
        fields: {
            'id': 'id',
            'aseo_aprox_pasillo' : 'size',
			'sepuede_sacar_algo_mueble_restrooms' : 'take',
        }
    },
    hallways: {
        type: 6,
        fields: {
            'id': 'id',
            'tamano_aprox_pasillo' : 'size',
            'almacenamiento_pasillo' : 'storage',
            'armario_pasillo' : 'closet',
            'pasillo_puertas' : 'closetdoors',
            'sepuede_sacar_algo_mueble_pasillo' : 'take',
        }
    },
    dealers: {
        type: 7,
        fields: {
            'id': 'id',
            'tanano_aprox_distribuidor' : 'size',
            'armarios_distribuidor': 'closet',
            'distribuidor_armarios_puertas' : 'closetdoors',
            'sepuede_sacar_algo_mueble_distribuidor' : 'take',
        }
    },
    serviceRooms: {
        type: 8,
        fields: {
            'id': 'id',
            'tanano_aprox_habitacion_servicio' : 'size',
			'sepuede_sacar_algo_mueble_serviceRooms' : 'take',
        }
    },
    bathServices: {
        type: 9,
        fields: {
            'id': 'id',
            'tamano_aprox_bano_servicios' : 'size',
			'sepuede_sacar_algo_mueble_bathServices' : 'take',
        }
    },
    transportes: {
		type: 23,
        fields: {
            'id': 'id',
            'tipo_transporte' : 'type',
			'parada' : 'name',
			 'lineas' : 'lines',
			'medida' : 'measure',
			            'unidad_medida' : 'units',
			'medio' : 'medio',
        }
    },
	place: {
        type: 24,
        fields: {
            'id': 'id',
            'lineas': 'description',
            'medida': 'measure',
            'unidad_medida': 'units',
            'medio': 'medio',
            'lineas_1': 'description_1',
            'medida_1': 'measure_1',
            'unidad_medida_1': 'units_1',
            'medio_1': 'medio_1',  
            'lineas_2': 'description_2',
            'medida_2': 'measure_2',
            'unidad_medida_2': 'units_2',
            'medio_2': 'medio_2',
            'lineas_3': 'description_3',
            'medida_3': 'measure_3',
            'unidad_medida_3': 'units_3',
            'medio_3': 'medio_3',  	
            'lineas_4': 'description_4',
            'medida_4': 'measure_4',
            'unidad_medida_4': 'units_4',
            'medio_4': 'medio_4', 
            'lineas_5': 'description_5',
            'medida_5': 'measure_5',
            'unidad_medida_5': 'units_5',
            'medio_5': 'medio_5',  
            'lineas_6': 'description_6',
            'medida_6': 'measure_6',
            'unidad_medida_6': 'units_6',
            'medio_6': 'medio_6', 
            'lineas_7': 'description_7',
            'medida_7': 'measure_7',
            'unidad_medida_7': 'units_7',
            'medio_7': 'medio_7', 			
			            'lineas_8': 'description_8',
            'medida_8': 'measure_8',
            'unidad_medida_8': 'units_8',
            'medio_8': 'medio_8', 
			            'lineas_9': 'description_9',
            'medida_9': 'measure_9',
            'unidad_medida_9': 'units_9',
            'medio_9': 'medio_9',
            'barrio': 'barrio'
        }
    }
}
	
const formDefault = {
    door: {
        id: null,
        type: '0',
        files: []
    },
    receiver: {
        id: null,
        sideboard: null,
        storage: null,
        closet: null,
        type: null,
        size: null,
        take: null,
        videos: [],
        files: [],
    },
    garage: {
        id: null,
        description: null,
        size: null,
        type: null,
        number: null,
        situation: null,
        videos: [],
        files: [],
    },	
    boxroom: {
        id: null,
        description: null,
        size: null,
        videos: [],
        files: [],
    },	
    facade: {
        id: null,
        description: null,
        /*size: null,
        type: null,
        number: null,
        situation: null,*/
        videos: [],
        files: [],
    },
    portal: {
        id: null,
        description: null,
        /*size: null,
        type: null,
        number: null,
        situation: null,*/
        videos: [],
        files: [],
    },
    lift: {
        id: null,
        description: null,
        number: null,
        videos: [],
        files: [],
    },
    swimming: {
        id: null,
        description: null,
       /* size: null,
        type: null,
        number: null,
        situation: null,*/
        videos: [],
        files: [],
    },
    garden: {
        id: null,
        description: null,
        /*size: null,
        type: null,
        number: null,
        situation: null,*/
        videos: [],
        files: [],
    },
    gym: {
        id: null,
        description: null,
        /*size: null,
        type: null,
        number: null,
        situation: null,*/
        videos: [],
        files: [],
    },
    sauna: {
        id: null,
        description: null,
        /*size: null,
        type: null,
        number: null,
        situation: null,*/
        videos: [],
        files: [],
    },
    sports: {
        id: null,
        description: null,
        /*size: null,
        type: null,
        number: null,
        situation: null,*/
        videos: [],
        files: [],
    },
    childarea: {
        id: null,
        description: null,
        /*size: null,
        type: null,
        number: null,
        situation: null,*/
        videos: [],
        files: [],
    },
    place: {
        id: null,
        description: null,
        measure: null,
        units: null,
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
    salons: [{
        id: null,
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
        id: null,
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
        id: null,
        airConditioner: null,
        sizeBedroom: null,
        orientation: null,
		typeOfWindowwindoww: '',
		typeOfWindowbrandNew: null,
		typeOfWindowchangedyear: null,
		typeOfWindowchangedmonth: null,
		typeOfWindowputtingyear: null,
		typeOfWindowputtingmonth: null,
        /*typeOfWindow: {
            //brandNew: null,
            changed: {
                //year: null,
                //month: null
            },
            putting: {
                //year: null,
                //month: null
            }
			//,
            //windoww: ''
        },*/
        /*closet: {
            closet: '',
            doors: null
        },*/
		closet: '',
        doors: null,
		typeOfSoilbrandNew: null,
		typeOfSoilchangedyear: null,
		typeOfSoilchangedmonth: null,
		typeOfSoilputtingyear: null,
		typeOfSoilputtingmonth: null,
		typeOfSoiltype: '',
        /*typeOfSoil: {
            //brandNew: null,
            changed: {
                //year: null,
                //month: null
            },
            putting: {
                //year: null,
                //month: null
            },
            //type: ''
        },*/
		paintspaintedMakesyear: null,
		paintspaintedMakesmonth: null,
		paintsjustPaintedyear: null,
		paintsjustPaintedmonth: null,
        /*paints: {
            paintedMakes: {
                //year: null,
                //month: null
            },
            justPainted: {
                //year: null,
                //month: null
            }
        },*/
		sofa: null,
		sofa_cama: null,
		tv: null,
		mesa_comedor: null,
		escritorio: null,
		comoda: null,
		/*					muebles: {
								//sofa: null,
								//sofa_cama: null,
								//tv: null,
								//mesa_comedor: null,
								//escritorio: null,
								//comoda: null
							},		*/
        dclimalit: null,
        painting: null,
        balcony: null,
        terrace: null,
		typeBed: null,
		canape: null,
        windoww: null,
        suite: null,
        wall: null,
        take: null,
        size: null,
        videos: [],
        files: []
    }],
    livingRoomBedrooms: [{
        id: null,
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
        id: null,
        bathroomInBedroom: null,
        dclimalit: null,
		reformStatusbrandNew: null,
		reformStatusreformedAgoyear: null,
		reformStatusreformedAgomonth: null,
		reformStatusstate: '',
       /* reformStatus: {
            //brandNew: null,
            reformedAgo: {
             //   year: null,
               // month: null
            },
            //state: '',
        },*/
		typeOfWindowbrandNew: null,
		typeOfWindowchangedyear: null,
		typeOfWindowchangedmonth: null,
		typeOfWindowputtingyear: null,
		typeOfWindowputtingmonth: null,
		typeOfWindowwindoww: '',
        /*typeOfWindow: {
            //brandNew: null,
            changed: {
              //  year: null,
               // month: null
            },
            putting: {
                //year: null,
               // month: null
            },
            //windoww: ''
        },*/
		typeOfSoilbrandNew: null,
		typeOfSoilchangedyear: null,
		typeOfSoilchangedmonth: null,
		typeOfSoilputtingyear: null,
		typeOfSoilputtingmonth: null,
		typeOfSoiltype: '',
       /* typeOfSoil: {
            //brandNew: null,
            changed: {
              //  year: null,
              //  month: null
            },
            putting: {
               // year: null,
               // month: null
            },
            //type: ''
        },*/
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
        id: null,
        size: null,
		take: null,
        videos: [],
        files: []
    }],
    hallways: [{
        id: null,
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
        id: null,
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
        id: null,
        size: null,
		take: null,
        videos: [],
        files: []
    }],
    bathServices: [{
        id: null,
        size: null,
		take: null,
        videos: [],
        files: []
    }],
    transportes: [{
        id: null,
                            type: null,
							name: null,
							lines: null,
							measure: null,
							units: null,
							medio: null
    }],	
    trash: [],
	tipo_inmueble: null,
    isSale: null
}