/**
 * // "-" "1-" "-1" "1-1" "+10-1" "1-+10"
 * @param {String} field 
 * @return {Array}
 */
function getTime(field) 
{
    const dates = field.split('-'); // 0 = años, 1 = meses
    const years = dates[0];
    const months = dates[1];
    let template = [];

    if (years) {
        template.push(years, ((years > 1) ? 'años' : 'año'));
    }
    if (years) {
        if (months) {
            template.push('y', months, ((months > 1) ? 'meses' : 'mes'));
        }
    }
    else
    {
         if (months) {
            template.push(months, ((months > 1) ? 'meses' : 'mes'));
        }   
    }

    return template.join(' ');
}


export default {
    fields: [
        // Salon
        {
            'tamano_aproximado_salon': 'M<sup>2</sup> aprox:',
            'muebles_salon': {
                label: 'Muebles:',
                template: (data) => JSON.parse(data.muebles_salon).join(', ')
            },
            'venta_salon': {
                label: 'Ventana:',
                template(data) {
                    let template = [data.venta_salon];
                    
                    if (data.salon_dclimati == 1)
                        template.push('Climalit');

                    return template.join(' / ');
                }
            },
            'orientacion_salon': 'Orientación:',
    'tipo_ventana_salon': {
      label: 'Tipo de ventana:',
      template: function template(data) {
        if (data.cabecera.is_sale == '1' ) {
            var template = [];
            if (data.tipo_ventana_salon.length>0) template.push(data.tipo_ventana_salon);
            if (data.salon_estrenar_tipo_ventana==1)  template.push('A estrenar ventana');
            if (data.salon_cambiado_hace_tipo_ventana != '-')
                            template.push(`Ha sido cambiada hace ${getTime(data.salon_cambiado_hace_tipo_ventana)}`);
            if (data.salon_puesta_hace_tipo_ventana != '-')
                            template.push(`Ha sido puesta hace ${getTime(data.salon_puesta_hace_tipo_ventana)}`);
            return template.join(' / ');
        }   
      }
    },
            'pintura_salon': {
                label: 'Pintura:',
                template(data) {
                    let template = [];

                    //if (data.pintura_salon>0) 
					if (data.pintura_salon == '1' )
					{
			            template.push('Recién pintado'); 
					}
					else if (data.pintura_salon == '2' )
					{
			            template.push('En buen estado'); 
					}

                    if (data.salon_pintuta_cambiada_hace != '-')
                        template.push(`Pintado hace ${getTime(data.salon_pintuta_cambiada_hace)}`); 

                    return template.join(' / ')
                }
            },
            'salon_pared': 'Pared:',
            'tipo_suelo_salon': {
                label: 'Tipo de suelo:',
                template(data) {
					if (data.tipo_suelo_salon.length>0) {					
						let template = [data.tipo_suelo_salon];

						if (data.salon_tipo_suelo_estrenar== '1')
						{
							template.push('A estrenar');
						}
						else if (data.salon_tipo_suelo_estrenar== '2')
						{
							template.push('En buen estado');
						}						
						else if (data.salon_tipo_suelo_estrenar== '3')
						{
							template.push('Recién cambiado');
						}												
						if (data.salon_tipo_suelo_cambiado != '-')
							template.push(`Ha sido cambiado hace ${getTime(data.salon_tipo_suelo_cambiado)}`);
						if (data.salon_tipo_suelo_puesto != '-')
							template.push(`Ha sido puesto hace ${getTime(data.salon_tipo_suelo_puesto)}`);
						
						return template.join(' / ')
					}
                }
            },
            'salon_dormitorio_balcon_m': 'Con balcón M<sup>2</sup> aprox:',
            'salon_dormitorio_tereza_m': 'Con terraza M<sup>2</sup> aprox:',
    'salon_equipada': {
      label: 'Salón equipado con:',
      template: function template(data) {
        if (data.cabecera.is_sale == '0' ) {
			var template = [];
			if (data.salon_muebles_sofa > 0) template.push('Sofa');
			if (data.salon_muebles_sofa_cama > 0) template.push('Sofa cama');
			if (data.salon_muebles_tv > 0) template.push('TV');
			if (data.salon_muebles_mesa_comedor > 0) template.push('Mesa Comedor');
			return template.join(' / ');
		}	
	  }
    },			
    'aire_condicionado_salon': {
        label: 'Aire acondicionado:',
      template: function template(data) {
          //alert(data.aire_condicionado_salon);
        if ( data.aire_condicionado_salon == '1') {
            //alert(data.aire_condicionado_salon);
          return 'Si';
        }
//return 'No';
        return null;
      }
    },  
            'sepuede_sacar_algo_mueble_salon': {
                label: '¿Se pueden sacar algunos muebles?',
                template: (data) => {
					if (data.cabecera.is_sale == '0' ) {//&& data.sepuede_sacar_algo_mueble_salon !== null) {
						if ( data.sepuede_sacar_algo_mueble_salon == '1')
						{return 'Si';}
						else
						{
							if ( data.sepuede_sacar_algo_mueble_salon == '0')
							{return 'No';}
							else
							{
								return null;
							}
						}  
					}
                    return null;
                }
            },
        },
        // Cocina
        {
            'tanano_aproximado_cocina': 'M<sup>2</sup> aprox:',
            'estado_cocina': {
                label: 'Estado de reforma:',
                template(data) {
                    let template = [data.estado_cocina];

                    // if (data.cocina_estado_estrenar)
                    //     template.push(data.cocina_estado_estrenar);

                    if (data.cocina_estado_reformada != '-' && data.estado_cocina.includes('Reformada hace'))
                        template.push(getTime(data.cocina_estado_reformada));

                    return template.join(' ');
                }
            },
            'tipo_cocina': 'Tipo de cocina:',
            'ventana_cocina': {
                label: 'Ventana:',
                template(data) {
                    let template = [data.ventana_cocina];

                    if (data.cocina_dclimati == 1)
                        template.push('Climalit');
  /*                  
                    if (data.cocina_balcon_m)
                        template.push(`Con balcón ${data.cocina_balcon_m} M<sup>2</sup> aprox`);

                    if (data.cocina_terreza_m)
                        template.push(`Con terraza ${data.cocina_terreza_m} M<sup>2</sup> aprox`);
*/
                    return template.join(' / ');
                }
            },
    'tipo_ventana_cocina': {
      label: 'Tipo de ventana:',
      template: function template(data) {
        if (data.cabecera.is_sale == '1' ) {
            var template = [];
            if (data.tipo_ventana_cocina.length>0) template.push(data.tipo_ventana_cocina);
            if (data.cocina_tipo_ventana_estrenar==1)  template.push('A estrenar ventana');
            if (data.cocina_tipo_ventana_cambiado != '-')
                            template.push(`Ha sido cambiada hace ${getTime(data.cocina_tipo_ventana_cambiado)}`);
            if (data.cocina_tipo_ventana_puesta != '-')
                            template.push(`Ha sido puesta hace ${getTime(data.cocina_tipo_ventana_puesta)}`);
            return template.join(' / ');
        }   
      }
    },           
            'cocina_balcon_m': 'Con balcón M<sup>2</sup> aprox:',
            'cocina_terreza_m': 'Con terraza M<sup>2</sup> aprox:',
            'cocina_equipada': {
                label: 'Cocina equipada con:',
                template(data) {
                    let template = [];

                    if (data.cocina_equipaje_extractor>0) 
                        template.push('Extractor');

                    if (data.cocina_equipaje_microondas>0)
                        template.push('Microondas');
                        
                    if (data.cocina_equipaje_horno>0)
                        template.push('Horno');

                    if (data.cocina_equipaje_nevera>0) 
                        template.push('Nevera');
                    
                    if (data.cocina_equipaje_lavadora>0) 
                        template.push('Lavadora');

                    if (data.cocina_equipaje_secadora>0) 
                        template.push('Secadora');
					
					if (data.cocina_equipaje_lavaseca>0) 
						template.push('Lavadora-Secadora');
					
                    if (data.cocina_equipaje_lavavajillas>0)
                        template.push('Lavavajillas');
					if (data.cabecera.is_sale == '0' ) {	
						if (data.cocina_equipaje_menaje > 0) template.push('Menaje y utensilios de cocina');
					}
                    return template.join(' / ');
                } 
            },
            'cocina_fuego': {
                label: 'Tipo de fuego:',
                template(data) {
                    let template = [];

                    if (data.cocina_fuego_vitroceramica>0)
                        template.push('Vitrocerámica');
                    if (data.cocina_fuego_induccion>0)
                        template.push('Inducción');					

                    if (data.cocina_fuego_gas_nuevo>0)
                        template.push('Gas natural');

                   /* if (data.cocina_fuego_placa_electronica>0)
                        template.push('Placa eléctrica');*/
        if (data.cocina_fuego_placa_electronica > 0) {
            //alert(data.id);
          if (data.id==3727)
          {
            template.push('Inducción');
          }
          else
          {
            template.push('Placa eléctrica');
          }
        }                        

                    if (data.cocina_fuego_bombanra_gas>0)
                        template.push('Bombona de gas');

                    return template.join(' / ');
                }
            },
            'tipo_suelo_cocina': {
                label: 'Tipo de suelo:',
                template(data) {
					if (data.tipo_suelo_cocina.length>0) {					
						let template = [data.tipo_suelo_cocina];

						if (data.cocina_tipo_suelo_estrenar== '1')
						{
							template.push('A estrenar');
						}
						else if (data.cocina_tipo_suelo_estrenar== '2')
						{
							template.push('En buen estado');
						}						
						else if (data.cocina_tipo_suelo_estrenar== '3')
						{
							template.push('Recién cambiado');
						}	
						if (data.cocina_tipo_suelo_cambiado != '-')
							template.push(`Ha sido cambiado hace ${getTime(data.cocina_tipo_suelo_cambiado)}`);
						if (data.cocina_tipo_suelo_puesto != '-')
							template.push(`Ha sido puesto hace ${getTime(data.cocina_tipo_suelo_puesto)}`);
						
						return template.join(' / ')
					}
                }
            },	
            'sepuede_sacar_algo_mueble_cocina': {
                label: '¿Se pueden sacar algunos muebles?',
                template: (data) => {
        if (data.cabecera.is_sale == '0' ) {//&& data.sepuede_sacar_algo_mueble_cocina !== null) {
            if ( data.sepuede_sacar_algo_mueble_cocina == '1')
            {return 'Si';}
            else
            {
                if ( data.sepuede_sacar_algo_mueble_cocina == '0')
                {return 'No';}
                else
                {
                    return null;
                }
            }  
        }

                    return null;
                }
            }
        },
        // Dormitorio
  {
	/*'precio': 'Precio habitación (€):',*/
            'precio': {
                label: 'Precio habitación (€):',
                template(data) {
                    let template = [];

                    if (data.precio>0)
						return data.precio;
                }
            },	
    'tamano_aproximado_dormitorio': 'M<sup>2</sup> aprox.:',
    /*'en_suite': {
      label: 'BaÃ±o incorporado en el dormitorio',
      template: function template() {
        return ' ';
      }
    },*/
            'en_suite': {
        label: 'Baño incorporado en el dormitorio:',
      template: function template(data) {
          //alert(data.en_suite);
        if ( data.en_suite == '1') {
            //alert(data.en_suite);
          return 'Si';
        }
return 'No';
        //return null;
      }
    },
          //  'tipo_cama_dormitorio': 'Tipo de cama:',
            'tipo_cama_dormitorio': {
                label: 'Tipo de cama:',
                template(data) {
                    let template = [data.tipo_cama_dormitorio];

                    if (data.canape_dormitorio == 1)
                        template.push(`Con canapé bajo la cama`);

                    return template.join(' / '); 
                }
            },		  
            'armarios_dormitorio': {
                label: 'Armario:',
                template(data) {
                    //alert(data.armarios_dormitorio);
                    //alert(data.armarios_dormitorio.length);
					if (data.armarios_dormitorio.length>0) {
						let template = [data.armarios_dormitorio];

						if (data.dormitorio_armarios_dormitorio_puertas)
							template.push(`Número de puertas del armario: ${data.dormitorio_armarios_dormitorio_puertas}`);

						return template.join(' / ');
					}						
                }
            },
            'ventana_dormitorio': {
                label: 'Ventana:',
                template(data) {
                    let template = [data.ventana_dormitorio];

                    if (data.dormitorio_dclimati == 1)
                        template.push(`Climalit`);

                    return template.join(' / '); 
                }
            },
            'orientacion_dormitorio': 'Orientación:',
            'dormitorio_pintura_recien': {
                label: 'Pintura:',
                template(data) {
                    let template = [];
                    //alert(dormitorio_pintura_recien);
                    /*if (data.dormitorio_pintura_recien == '1-')
                        template.push('Recién pintado'); 
                    if (data.dormitorio_pintura_recien == '2-')
                        template.push('En buen estado');*/
					if (data.dormitorio_pintura_recien == '1-' )
					{
			            template.push('Recién pintado'); 
					}
					else if (data.dormitorio_pintura_recien == '2-' )
					{
			            template.push('En buen estado'); 
					} 					
                    //alert(dormitorio_pintura_recien_pintada);
                    if (data.dormitorio_pintura_recien_pintada != '-')
                        template.push(`Pintado hace ${getTime(data.dormitorio_pintura_recien_pintada)}`);

                    return template.join(' / '); 
                }
            },
            'dormirotio_pared': 'Pared:',
    'tipo_ventana_dormitorio': {
      label: 'Tipo de ventana:',
      template: function template(data) {
        if (data.cabecera.is_sale == '1' ) {
            var template = [];
            if (data.tipo_ventana_dormitorio.length>0) template.push(data.tipo_ventana_dormitorio);
            if (data.dormitorio_tipo_ventana_estrenar==1)  template.push('A estrenar ventana');
            if (data.dormitorio_tipo_ventana_cambiado != '-')
                            template.push(`Ha sido cambiada hace ${getTime(data.dormitorio_tipo_ventana_cambiado)}`);
            if (data.dormitorio_tipo_ventana_puesto != '-')
                            template.push(`Ha sido puesta hace ${getTime(data.dormitorio_tipo_ventana_puesto)}`);
            return template.join(' / ');
        }   
      }
    },

            'dormitorio_balcon_m': 'Con balcón M<sup>2</sup> aprox:',
            'dormitorio_terreza_m': 'Con terraza M<sup>2</sup> aprox:',
    'dormitorio_equipada': {
      label: 'Dormitorio equipado con:',
      template: function template(data) {
		if (data.cabecera.is_sale == '0' ) {
			var template = [];
			if (data.dormitorio_muebles_sofa > 0) template.push('Sofa');
			if (data.dormitorio_muebles_sofa_cama > 0) template.push('Sofa cama');
			if (data.dormitorio_muebles_tv > 0) template.push('TV');
			if (data.dormitorio_muebles_mesa_comedor > 0) template.push('Mesa Comedor');
			if (data.dormitorio_muebles_escritorio > 0) template.push('Escritorio');
			if (data.dormitorio_muebles_comoda > 0) template.push('Cómoda');
			return template.join(' / ');
		}
	  }
    },			
    'aire_condicionado_dormitorio': {
        label: 'Aire acondicionado:',
      template: function template(data) {
          //alert(data.aire_condicionado_dormitorio);
        if ( data.aire_condicionado_dormitorio == '1') {
            //alert(data.aire_condicionado_dormitorio);
          return 'Si';
        }
		//return 'No';
        return null;
      }
    },
            'tipo_suelo': {
                label: 'Tipo de suelo:',
                template(data) {
					if (data.tipo_suelo_dormitorio.length>0) {					
						let template = [data.tipo_suelo_dormitorio];

						if (data.dormitorio_tipo_suelo_estrenar== '1')
						{
							template.push('A estrenar');
						}
						else if (data.dormitorio_tipo_suelo_estrenar== '2')
						{
							template.push('En buen estado');
						}						
						else if (data.dormitorio_tipo_suelo_estrenar== '3')
						{
							template.push('Recién cambiado');
						}						
						if (data.dormitorio_tipo_suelo_cambiado != '-')
							template.push(`Ha sido cambiado hace ${getTime(data.dormitorio_tipo_suelo_cambiado)}`);
						if (data.dormitorio_tipo_suelo_puesto != '-')
							template.push(`Ha sido puesto hace ${getTime(data.dormitorio_tipo_suelo_puesto)}`);
						
						return template.join(' / ')
					}
                }
            },
    'sepuede_sacar_algo_mueble_dormirorio': {
      label: '¿Se pueden sacar algunos muebles?',
      template: function template(data) {
		  //alert(data.sepuede_sacar_algo_mueble_dormirorio);
        if (data.cabecera.is_sale == '0') {
          //&& data.sepuede_sacar_algo_mueble_dormirorio !== null) {
          if (data.sepuede_sacar_algo_mueble_dormirorio == '1') {
            return 'Si';
          } else {
                if ( data.sepuede_sacar_algo_mueble_dormirorio == '0')
                {return 'No';}
                else
                {
                    return null;
                }
          }
        }

        return null;
      }
    }
  },
        // Salon - dormitorio
        {
			'precio': 'Precio (€):',
            'tamano_aprox_salon': 'M<sup>2</sup> aprox:',
            'muebles_dormitorio_salon': {
                label: 'Muebles:',
                template: (data) => JSON.parse(data.muebles_dormitorio_salon).join(', ')
            },
            'ventana_dormitorio_salon': {
                label:'Ventana:',
                template(data) {
                    let template = [data.ventana_dormitorio_salon];

                    if (data.salon_dormitorio_dclimati == 1)
                        template.push('Climalit');

                    return template.join(' / ')
                    
                }
            },
            'orientacion_dormitorio_salon': 'Orientación:',
            'salon_dormitorio_balcon_m': 'Con balcón M<sup>2</sup> aprox:',
            'salon_dormitorio_tereza_m': 'Con terraza M<sup>2</sup> aprox:',
    'tipo_ventana_dormitorio_salon': {
      label: 'Tipo de ventana:',
      template: function template(data) {
        if (data.cabecera.is_sale == '1' ) {
            var template = [];
            if (data.tipo_ventana_dormitorio_salon.length>0) template.push(data.tipo_ventana_dormitorio_salon);
            if (data.salon_tipo_ventana_estrenar==1)  template.push('A estrenar ventana');
            if (data.salon_tipo_ventana_cambiado != '-')
                            template.push(`Ha sido cambiada hace ${getTime(data.salon_tipo_ventana_cambiado)}`);
            if (data.salon_tipo_ventana_puesto != '-')
                            template.push(`Ha sido puesta hace ${getTime(data.salon_tipo_ventana_puesto)}`);
            return template.join(' / ');
        }   
      }
    },
            'salon_pintura_recien': {
                label: 'Pintura:',
                template(data) {
                    let template = [];
                    //alert(dormitorio_pintura_recien);
                    /*if (data.salon_pintura_recien == '1-')
                        template.push('Recién pintado'); */
					if (data.salon_pintura_recien == '1-' )
					{
			            template.push('Recién pintado'); 
					}
					else if (data.salon_pintura_recien == '2-' )
					{
			            template.push('En buen estado'); 
					} 					
                    //alert(dormitorio_pintura_recien_pintada);
                    if (data.salon_pintura_recien_pintada != '-')
                        template.push(`Pintado hace ${getTime(data.salon_pintura_recien_pintada)}`);

                    return template.join(' / '); 
                }
            },
            'salon_dormitorio_pared': 'Pared:',
            'tipo_suelo_dormitorio_salon': {
                label: 'Tipo de suelo:',
                template(data) {
					if (data.tipo_suelo_dormitorio_salon.length>0) {					
						let template = [data.tipo_suelo_dormitorio_salon];
	
						if (data.salon_dormitorio_tipo_suelo_estrenar== '1')
						{
							template.push('A estrenar');
						}
						else if (data.salon_dormitorio_tipo_suelo_estrenar== '2')
						{
							template.push('En buen estado');
						}						
						else if (data.salon_dormitorio_tipo_suelo_estrenar== '3')
						{
							template.push('Recién cambiado');
						}						
						if (data.salon_dormitorio_tipo_suelo_cambiado != '-')
							template.push(`Ha sido cambiado hace ${getTime(data.salon_dormitorio_tipo_suelo_cambiado)}`);
						if (data.salon_dormitorio_tipo_suelo_puesto != '-')
							template.push(`Ha sido puesto hace ${getTime(data.salon_dormitorio_tipo_suelo_puesto)}`);
						
						return template.join(' / ')
					}
                }
            },	/**/
            //'tipo_cama_dormitorio_salon': 'Tipo de cama:',
            'tipo_cama_dormitorio_salon': {
                label: 'Tipo de cama:',
                template(data) {
                    let template = [data.tipo_cama_dormitorio_salon];

                    if (data.canape_dormitorio_salon == 1)
                        template.push(`Con canapé bajo la cama`);

                    return template.join(' / '); 
                }
            },				
            'armarios_dormitorio_saldon': {
                label: 'Armario:',
                template(data) {
					if (data.armarios_dormitorio_saldon.length>0) {
						let template = [data.armarios_dormitorio_saldon];

						if (data.salon_dorimitorio_puertas)
							template.push(`Número de puertas del armario: ${data.salon_dorimitorio_puertas}`);

						return template.join(' / ')
					}
                }
            },
    'salon_dormitorio_equipada': {
      label: 'Salón dormitorio equipado con:',
      template: function template(data) {
		if (data.cabecera.is_sale == '0' ) {
			var template = [];
			if (data.salon_dormitorio_muebles_sofa > 0) template.push('Sofa');
			if (data.salon_dormitorio_muebles_sofa_cama > 0) template.push('Sofa cama');
			if (data.salon_dormitorio_muebles_tv > 0) template.push('TV');
			if (data.salon_dormitorio_muebles_mesa_comedor > 0) template.push('Mesa Comedor');
			if (data.salon_dormitorio_muebles_escritorio > 0) template.push('Escritorio');
			if (data.salon_dormitorio_muebles_comoda > 0) template.push('Cómoda');
			return template.join(' / ');
		}
	  }
    },			
        'aire_condicionado_dormitorio_salon': {
        label: 'Aire acondicionado:',
      template: function template(data) {
          //alert(data.aire_condicionado_dormitorio_salon);
        if ( data.aire_condicionado_dormitorio_salon == '1') {
            //alert(data.aire_condicionado_dormitorio_salon);
          return 'Si';
        }
		//return 'No';
        return null;
      }
    },
    'sepuede_sacar_algo_mueble_salon_dormitorio': {
      label: '¿Se pueden sacar algunos muebles?',
      template: function template(data) {
		  //alert(data.sepuede_sacar_algo_mueble_salon_dormitorio);
        if (data.cabecera.is_sale == '0') {
          //&& data.sepuede_sacar_algo_mueble_salon_dormitorio !== null) {
          if (data.sepuede_sacar_algo_mueble_salon_dormitorio == '1') {
            return 'Si';
          } else {
                if ( data.sepuede_sacar_algo_mueble_salon_dormitorio == '0')
                {return 'No';}
                else
                {
                    return null;
                }
          }
        }

        return null;
      }
    }
  },
        // baño
  {
    'tamano_aprox_banos': 'M<sup>2</sup> aprox:',
    /*'banos_suite': {
      label: 'BaÃ±o incorporado en el dormitorio',
      template: function template() {
        return ' ';
      }
    },*/
            'banos_suite': {
        label: 'Baño incorporado en el dormitorio:',
      template: function template(data) {
          //alert(data.banos_suite);
        if ( data.banos_suite == '1') {
            //alert(data.banos_suite);
          return 'Si';
        }
return 'No';
        //return null;
      }
    },
            'estado_reforma_banos': {
                label: 'Estado reformado:',
                template: (data) => {
                    let template = [];

                    if (data.estado_reforma_banos)
                        template.push(data.estado_reforma_banos);

                    if (data.banos_estado_reformada != '-')
                        template.push(getTime(data.banos_estado_reformada));

                    return template.join(' ');
                }
            },
            'venta_banos': {
                label: 'Ventana:',
                template(data) {
                    let template = [data.venta_banos];

                    if (data.bano_dclimati == 1)
                        template.push('Climalit');

                    return template.join(' / ');
                }
            },
    'tipo_ventana': {
      label: 'Tipo de ventana:',
      template: function template(data) {
        if (data.cabecera.is_sale == '1' ) {
            var template = [];
            if (data.tipo_ventana.length>0) template.push(data.tipo_ventana);
            if (data.bano_tipo_ventana_estrenar==1)  template.push('A estrenar ventana');
            if (data.bano_tipo_ventana_cambiado != '-')
                            template.push(`Ha sido cambiada hace ${getTime(data.bano_tipo_ventana_cambiado)}`);
            if (data.bano_tipo_ventana_puesto != '-')
                            template.push(`Ha sido puesta hace ${getTime(data.bano_tipo_ventana_puesto)}`);
            return template.join(' / ');
        }   
      }
    },
    
            'bano_equipado': {
                label: 'Baño con:',
                template(data) {
                    let template = [];

                    if (data.banos_banera>0)
                        template.push('Bañera');

                    if (data.banos_ducha>0)
                        template.push('Ducha');

                    if (data.banos_bide>0)
                        template.push('Bide');

                    if (data.banos_jacuzzi>0)
                        template.push('jacuzzi');

                    return template.join(' / ');
                }
            },
            'tipo_suelo_banos': {
                label: 'Tipo de suelo:',
                template(data) {
					if (data.tipo_suelo_banos.length>0) {					
						let template = [data.tipo_suelo_banos];


						if (data.bano_tipo_suelo_estrenar== '1')
						{
							template.push('A estrenar');
						}
						else if (data.bano_tipo_suelo_estrenar== '2')
						{
							template.push('En buen estado');
						}						
						else if (data.bano_tipo_suelo_estrenar== '3')
						{
							template.push('Recién cambiado');
						}							
						if (data.bano_tipo_suelo_cambiado != '-')
							template.push(`Ha sido cambiado hace ${getTime(data.bano_tipo_suelo_cambiado)}`);
						if (data.bano_tipo_suelo_puesto != '-')
							template.push(`Ha sido puesto hace ${getTime(data.bano_tipo_suelo_puesto)}`);
						
						return template.join(' / ')
					}
                }
            },
            // 'bano_tipo_suelo_estrenar': 'a estrenar',
            // 'bano_tipo_suelo_cambiado': 'cambiado hace',
            // 'bano_tipo_suelo_puesto': 'puesta hace  año / s',
            'sepuede_sacar_algo_mueble_bano': {
                label: '¿Se pueden sacar algunos muebles?',
                template: (data) => {
        if (data.cabecera.is_sale == '0' ) {//&& data.sepuede_sacar_algo_mueble_bano !== null) {
                    if ( data.sepuede_sacar_algo_mueble_bano == '1')
            {return 'Si';}
            else
            {
                if ( data.sepuede_sacar_algo_mueble_bano == '0')
                {return 'No';}
                else
                {
                    return null;
                }

            }  
        }
                    return null;
                }
            }
        },
        // Aseo
        {
            'aseo_aprox_pasillo': 'M<sup>2</sup> aprox:',
			      'sepuede_sacar_algo_mueble_restrooms': {
                label: '¿Se pueden sacar algunos muebles?',
                template: (data) => {
        if (data.cabecera.is_sale == '0' ) {//&& data.sepuede_sacar_algo_mueble_restrooms !== null) {
                    if ( data.sepuede_sacar_algo_mueble_restrooms == '1')
            {return 'Si';}
            else
            {
                if ( data.sepuede_sacar_algo_mueble_restrooms == '0')
                {return 'No';}
                else
                {
                    return null;
                }

            }  
        }
                    return null;
                }
            }
        },
        // Pasillo
        {
            'tamano_aprox_pasillo': 'M<sup>2</sup> aprox:',
            'almacenamiento_pasillo': 'Almacenamiento:',
            'armario_pasillo': {
                label: 'Armario:',
                template(data) {
					if (data.armario_pasillo.length>0) {
						let template = [data.armario_pasillo];

						if (data.pasillo_puertas)
							template.push(`Número de puertas del armario: ${data.pasillo_puertas}`);

						return template.join(' / ');
					}						
                }
            },
            'sepuede_sacar_algo_mueble_pasillo': {
                label: '¿Se pueden sacar algunos muebles?',
                template: (data) => {
        if (data.cabecera.is_sale == '0' ) {//&& data.sepuede_sacar_algo_mueble_pasillo !== null) {
                    if ( data.sepuede_sacar_algo_mueble_pasillo == '1')
            {return 'Si';}
            else
            {
                if ( data.sepuede_sacar_algo_mueble_pasillo == '0')
                {return 'No';}
                else
                {
                    return null;
                }
            }  
        }

                    return null;
                }
            }
        },
        // distribuidor
        {
            'tanano_aprox_distribuidor': 'M<sup>2</sup> aprox:',
            'armarios_distribuidor': {
                label: 'Armario:',
                template(data) {
				if (data.armarios_distribuidor.length>0) {					
                    let template = [data.armarios_distribuidor];

                    if (data.distribuidor_armarios_puertas)
                        template.push(`Número de puertas del armario: ${data.distribuidor_armarios_puertas}`);

                    return template.join(' / ');
					}
                }
            },
            'sepuede_sacar_algo_mueble_distribuidor': {
                label: '¿Se pueden sacar algunos muebles?',
                template: (data) => {
        if (data.cabecera.is_sale == '0' ) {//&& data.sepuede_sacar_algo_mueble_distribuidor !== null) {
                    if ( data.sepuede_sacar_algo_mueble_distribuidor == '1')
            {return 'Si';}
            else
            {
                if ( data.sepuede_sacar_algo_mueble_distribuidor == '0')
                {return 'No';}
                else
                {
                    return null;
                }

            }  
        }

                    return null;
                }
            }
        },
        // habitacion de servicio
        {
            'tanano_aprox_habitacion_servicio': 'M<sup>2</sup> aprox:',
			            'sepuede_sacar_algo_mueble_serviceRooms': {
                label: '¿Se pueden sacar algunos muebles?',
                template: (data) => {
        if (data.cabecera.is_sale == '0' ) {//&& data.sepuede_sacar_algo_mueble_serviceRooms !== null) {
                    if ( data.sepuede_sacar_algo_mueble_serviceRooms == '1')
            {return 'Si';}
            else
            {
               if ( data.sepuede_sacar_algo_mueble_serviceRooms == '0')
                {return 'No';}
                else
                {
                    return null;
                }
            }  
        }
                    return null;
                }
            }
        },
        // baños-servicio
        {
            'tamano_aprox_bano_servicios': 'M<sup>2</sup> aprox:',
			            'sepuede_sacar_algo_mueble_bathServices': {
                label: '¿Se pueden sacar algunos muebles?',
                template: (data) => {
        if (data.cabecera.is_sale == '0' ) {//&& data.sepuede_sacar_algo_mueble_bathServices !== null) {
                    if ( data.sepuede_sacar_algo_mueble_bathServices == '1')
            {return 'Si';}
            else
            {
                if ( data.sepuede_sacar_algo_mueble_bathServices == '0')
                {return 'No';}
                else
                {
                    return null;
                }
            }  
        }
                    return null;
                }
            }
        },

        // RECIBIDOR
  {
    'tamano_prox_recibidor': 'M<sup>2</sup> aprox.:',
      /*  'aparador': {
      label: 'Aparador',
      template: function template() {
        return ' ';
      }
    },*/
            'aparador': {
        label: 'Aparador: ',
      template: function template(data) {
          //alert(data.aparador);
        if ( data.aparador == '1') {
            //alert(data.aparador);
          return 'Si';
        }
		//return 'No';
        return null;
      }
    },
    'armario': {
      label: 'Armario:',

                      template(data) {
                        let template = [data.armario];
                        if (data.armario_num_puertas)
                            template.push("Número de puertas del armario: ".concat(data.armario_num_puertas));
                        return template.join(' / ');
                }
    },
      /*  'almacenamiento': {
      label: 'Almacenamiento',
      template: function template() {
        return ' ';
      }
    },*/
            'almacenamiento': {
        label: 'Almacenamiento: ',
      template: function template(data) {
          //alert(data.aparador);
        if ( data.almacenamiento == '1') {
            //alert(data.almacenamiento);
          return 'Si';
        }
		//return 'No';
        return null;
      }
    },
            'sepuede_sacar_algo_mueble_recibidor': {
                label: '¿Se pueden sacar algunos muebles?',
                template: (data) => {
        if (data.cabecera.is_sale == '0' ) {// && data.sepuede_sacar_algo_mueble_recibidor !== null) {
            if ( data.sepuede_sacar_algo_mueble_recibidor == '1')
            {return 'Si';}
            else
            {
                if ( data.sepuede_sacar_algo_mueble_recibidor == '0')
                {return 'No';}
                else
                {
                    return null;
                }
            }  
        }
                    return null;
                }
            }
        },
        // PUERTA
        {
            'puerta': {
                label: 'Puerta :',
                template: (data) => data.puerta == 1 ? 'Blindada' : 'No es Blindada'
            }
        },
		//GARAJE
		{
			'tamano': 'M<sup>2</sup> aprox.:',
			'descripcion': 'Descripción:',
			'tipo': 'Tipo:',
			'numero': 'Número de plazas:',
			'situacion': '¿Está en el mismo edificio?:'
        },
		//trastero
		{
			'tamano': 'M<sup>2</sup> aprox.:',
			'descripcion': 'Descripción:'
        },
		//fachada
		{
			'descripcion': 'Descripción:'
        },
		//Portal
		{
			'descripcion': 'Descripción:'
        },
		//Ascensor
		{
			'descripcion': 'Descripción:',
			'numero': 'Número de plazas:'
        },
		//Piscina
		{
			'descripcion': 'Descripción:'
        },
		//Jardin
		{
			'descripcion': 'Descripción:'
        },
		//Ginmasio
		{
			'descripcion': 'Descripción:'
        },
		//Sauna
				{
			'descripcion': 'Descripción:'
        },
		//zona deportiva
		{
			'descripcion': 'Descripción:'
        },
		//zona infantil
				{
			'descripcion': 'Descripción:'
        },
		//transporte
				{
			'lineas': 'Descripción:'
        },
		//lugares de interés
		{
			'lineas': {
                label: '·',
                
				template(data) {
					if (data.lineas == null) { return null;}
					if (data.lineas.length>0) {
						let template = [data.lineas];
						if (data.medida == null) {
							template.push('');
						}
						else
						{
							if (data.medida>0) {
								template.push('>>');
								template.push(data.medida);
							}
							if (data.unidad_medida.length>0) {	
								template.push(data.unidad_medida);
							}
						}
						if (data.medio==null)
						{
							template.push('');
						}
						else
						{
							if (data.medio.length>0) {	
									template.push(' ');
									template.push(`<img src=/storage/lugar/`);
									template.push(data.medio);
									template.push(`.png>`);
							}					
						}
						return template.join('')
					}
                }
            },
			'lineas_1': {
                label: '·',
                
				template(data) {
					if (data.lineas_1 == null) { return null;}
					if (data.lineas_1.length>0) {
						let template = [data.lineas_1];
						if (data.medida_1 == null) {
							template.push('');
						}
						else
						{
							if (data.medida_1>0) {
								template.push('>>');
								template.push(data.medida_1);
							}
							if (data.unidad_medida_1.length>0) {	
								template.push(data.unidad_medida_1);
							}
						}
						if (data.medio_1==null)
						{
							template.push('');
						}
						else
						{
							if (data.medio_1.length>0) {	
									template.push(' ');
									template.push(`<img src=/storage/lugar/`);
									template.push(data.medio_1);
									template.push(`.png>`);
							}					
						}
						return template.join('')
					}
                }
            },
			'lineas_2': {
                label: '·',
                
				template(data) {
					if (data.lineas_2 == null) { return null;}
					if (data.lineas_2.length>0) {
						let template = [data.lineas_2];
						if (data.medida_2 == null) {
							template.push('');
						}
						else
						{
							if (data.medida_2>0) {
								template.push('>>');
								template.push(data.medida_2);
							}
							if (data.unidad_medida_2.length>0) {	
								template.push(data.unidad_medida_2);
							}
						}
						if (data.medio_2==null)
						{
							template.push('');
						}
						else
						{
							if (data.medio_2.length>0) {	
									template.push(' ');
									template.push(`<img src=/storage/lugar/`);
									template.push(data.medio_2);
									template.push(`.png>`);
							}					
						}
						return template.join('')
					}
                }
            },
			'lineas_3': {
                label: '·',
                
				template(data) {
					if (data.lineas_3 == null) { return null;}
					if (data.lineas_3.length>0) {
						let template = [data.lineas_3];
						if (data.medida_3 == null) {
							template.push('');
						}
						else
						{
							if (data.medida_3>0) {
								template.push('>>');
								template.push(data.medida_3);
							}
							if (data.unidad_medida_3.length>0) {	
								template.push(data.unidad_medida_3);
							}
						}
						if (data.medio_3==null)
						{
							template.push('');
						}
						else
						{
							if (data.medio_3.length>0) {	
									template.push(' ');
									template.push(`<img src=/storage/lugar/`);
									template.push(data.medio_3);
									template.push(`.png>`);
							}					
						}
						return template.join('')
					}
                }
            },
			'lineas_4': {
                label: '·',
                
				template(data) {
					if (data.lineas_4 == null) { return null;}
					if (data.lineas_4.length>0) {
						let template = [data.lineas_4];
						if (data.medida_4 == null) {
							template.push('');
						}
						else
						{
							if (data.medida_4>0) {
								template.push('>>');
								template.push(data.medida_4);
							}
							if (data.unidad_medida_4.length>0) {	
								template.push(data.unidad_medida_4);
							}
						}
						if (data.medio_4==null)
						{
							template.push('');
						}
						else
						{
							if (data.medio_4.length>0) {	
									template.push(' ');
									template.push(`<img src=/storage/lugar/`);
									template.push(data.medio_4);
									template.push(`.png>`);
							}					
						}
						return template.join('')
					}
                }
            },
			'lineas_5': {
                label: '·',
                
				template(data) {
					if (data.lineas_5 == null) { return null;}
					if (data.lineas_5.length>0) {
						let template = [data.lineas_5];
						if (data.medida_5 == null) {
							template.push('');
						}
						else
						{
							if (data.medida_5>0) {
								template.push('>>');
								template.push(data.medida_5);
							}
							if (data.unidad_medida_5.length>0) {	
								template.push(data.unidad_medida_5);
							}
						}
						if (data.medio_5==null)
						{
							template.push('');
						}
						else
						{
							if (data.medio_5.length>0) {	
									template.push(' ');
									template.push(`<img src=/storage/lugar/`);
									template.push(data.medio_5);
									template.push(`.png>`);
							}					
						}
						return template.join('')
					}
                }
            },
			'lineas_6': {
                label: '·',
                
				template(data) {
					if (data.lineas_6 == null) { return null;}
					if (data.lineas_6.length>0) {
						let template = [data.lineas_6];
						if (data.medida_6 == null) {
							template.push('');
						}
						else
						{
							if (data.medida_6>0) {
								template.push('>>');
								template.push(data.medida_6);
							}
							if (data.unidad_medida_6.length>0) {	
								template.push(data.unidad_medida_6);
							}
						}
						if (data.medio_6==null)
						{
							template.push('');
						}
						else
						{
							if (data.medio_6.length>0) {	
									template.push(' ');
									template.push(`<img src=/storage/lugar/`);
									template.push(data.medio_6);
									template.push(`.png>`);
							}					
						}
						return template.join('')
					}
                }
            },
			'lineas_7': {
                label: '·',
                
				template(data) {
					if (data.lineas_7 == null) { return null;}
					if (data.lineas_7.length>0) {
						let template = [data.lineas_7];
						if (data.medida_7 == null) {
							template.push('');
						}
						else
						{
							if (data.medida_7>0) {
								template.push('>>');
								template.push(data.medida_7);
							}
							if (data.unidad_medida_7.length>0) {	
								template.push(data.unidad_medida_7);
							}
						}
						if (data.medio_7==null)
						{
							template.push('');
						}
						else
						{
							if (data.medio_7.length>0) {	
									template.push(' ');
									template.push(`<img src=/storage/lugar/`);
									template.push(data.medio_7);
									template.push(`.png>`);
							}					
						}
						return template.join('')
					}
                }
            },
			'lineas_8': {
                label: '·',
                
				template(data) {
					if (data.lineas_8 == null) { return null;}
					if (data.lineas_8.length>0) {
						let template = [data.lineas_8];
						if (data.medida_8 == null) {
							template.push('');
						}
						else
						{
							if (data.medida_8>0) {
								template.push('>>');
								template.push(data.medida_8);
							}
							if (data.unidad_medida_8.length>0) {	
								template.push(data.unidad_medida_8);
							}
						}
						if (data.medio_8==null)
						{
							template.push('');
						}
						else
						{
							if (data.medio_8.length>0) {	
									template.push(' ');
									template.push(`<img src=/storage/lugar/`);
									template.push(data.medio_8);
									template.push(`.png>`);
							}					
						}
						return template.join('')
					}
                }
            },
			'lineas_9': {
                label: '·',
                
				template(data) {
					if (data.lineas_9 == null) { return null;}
					if (data.lineas_9.length>0) {
						let template = [data.lineas_9];
						if (data.medida_9 == null) {
							template.push('');
						}
						else
						{
							if (data.medida_9>0) {
								template.push('>>');
								template.push(data.medida_9);
							}
							if (data.unidad_medida_9.length>0) {	
								template.push(data.unidad_medida_9);
							}
						}
						if (data.medio_9==null)
						{
							template.push('');
						}
						else
						{
							if (data.medio_9.length>0) {	
									template.push(' ');
									template.push(`<img src=/storage/lugar/`);
									template.push(data.medio_9);
									template.push(`.png>`);
							}					
						}
						return template.join('')
					}
                }
            }			
        }
    ]   
}

  