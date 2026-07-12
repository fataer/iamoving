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
        template.push(years, ((years > 1) ? 'years' : 'year'));
    }
    if (years) {
        if (months) {
            template.push('y', months, ((months > 1) ? 'motnhs' : 'motnh'));
        }
    }
    else
    {
         if (months) {
            template.push(months, ((months > 1) ? 'motnhs' : 'motnh'));
        }   
    }

    return template.join(' ');
}


export default {
    fields: [
        // Salon
        {
            'tamano_aproximado_salon': 'M<sup>2</sup> approx:',
            'muebles_salon': {
                label: 'Furniture:',
                template: (data) => JSON.parse(data.muebles_salon).join(', ')
            },
            'venta_salon': {
                label: 'Window:',
                template(data) {
                    let template = [data.venta_salon];
                    
                    if (data.salon_dclimati == 1)
                        template.push('Climalit');

                    return template.join(' / ');
                }
            },
            'orientacion_salon': {
                label: 'Orientation:',
                template(data) {
                    let template = [];

                    //if (data.pintura_salon>0) 
					if (data.orientacion_salon == 'Norte' )
					{
			            template.push('North'); 
					}
					else if (data.orientacion_salon == 'Sur' )
					{
			            template.push('South'); 
					}
					else if (data.orientacion_salon == 'Este' )
					{
			            template.push('East'); 
					}
					else if (data.orientacion_salon == 'Oeste' )
					{
			            template.push('West'); 
					}
					else if (data.orientacion_salon == 'Noreste' )
					{
			            template.push('Northeast'); 
					}
					else if (data.orientacion_salon == 'Noroeste' )
					{
			            template.push('Northwest'); 
					}
					else if (data.orientacion_salon == 'Sureste' )
					{
			            template.push('Southeast'); 
					}
					else if (data.orientacion_salon == 'Suroeste' )
					{
			            template.push('Southwest'); 
					}					

                    return template.join(' / ')
                }
            },
    'tipo_ventana_salon': {
      label: 'Window type:',
      template: function template(data) {
        if (data.cabecera.is_sale == '1' ) {
            var template = [];
            if (data.tipo_ventana_salon.length>0) template.push(data.tipo_ventana_salon);
            if (data.salon_estrenar_tipo_ventana==1)  template.push('New window');
            if (data.salon_cambiado_hace_tipo_ventana != '-')
                            template.push(`It has been changed ${getTime(data.salon_cambiado_hace_tipo_ventana)} ago`);
            if (data.salon_puesta_hace_tipo_ventana != '-')
                            template.push(`It has been set ${getTime(data.salon_puesta_hace_tipo_ventana)} ago`);
            return template.join(' / ');
        }   
      }
    },
            'pintura_salon': {
                label: 'Painting:',
                template(data) {
                    let template = [];

                    //if (data.pintura_salon>0) 
					if (data.pintura_salon == '1' )
					{
			            template.push('Just painted'); 
					}
					else if (data.pintura_salon == '2' )
					{
			            template.push('In good state'); 
					}

                    if (data.salon_pintuta_cambiada_hace != '-')
                        template.push(`It was painted ${getTime(data.salon_pintuta_cambiada_hace)} ago`); 

                    return template.join(' / ')
                }
            },
            'salon_pared': {
                label: 'Wall:',
                template(data) {
                    let template = [];
					if (data.salon_pared == 'Lisa' )
					{
			            template.push('Smooth'); 
					}
					else if (data.salon_pared == 'Gotelé' )
					{
			            template.push('Stippling'); 
					}
                    return template.join(' / ')
                }
            },
            'tipo_suelo_salon': {
                label: 'Soil type:',
                template(data) {
					if (data.tipo_suelo_salon.length>0) {					
						//let template = [data.tipo_suelo_salon];
						let template = [];
						if (data.tipo_suelo_salon == 'Moqueta' )
						{
							template.push('Carpet');
						}
						else if (data.tipo_suelo_salon == 'Hormigón' )
						{
							template.push('Concrete');
						}
						else if (data.tipo_suelo_salon == 'Cerámica' )
						{
							template.push('Ceramic');
						}
						else if (data.tipo_suelo_salon == 'Mármol' )
						{
							template.push('Marble');
						}
						else if (data.tipo_suelo_salon == 'Pizarra' )
						{
							template.push('Slated');
						}
						else if (data.tipo_suelo_salon == 'Parquet' )
						{
							template.push('Parquet');
						}
						else if (data.tipo_suelo_salon == 'Tarima flotante' )
						{
							template.push('Laminated flooring');
						}
						else if (data.tipo_suelo_salon == 'Vinilo' )
						{
							template.push('Vinyl');
						}							

						if (data.salon_tipo_suelo_estrenar== '1')
						{
							template.push('New');
						}
						else if (data.salon_tipo_suelo_estrenar== '2')
						{
							template.push('In good state');
						}						
						else if (data.salon_tipo_suelo_estrenar== '3')
						{
							template.push('Just changed');
						}												
						if (data.salon_tipo_suelo_cambiado != '-')
							template.push(`it has been changed ${getTime(data.salon_tipo_suelo_cambiado)} ago`);
						if (data.salon_tipo_suelo_puesto != '-')
							template.push(`It has been set ${getTime(data.salon_tipo_suelo_puesto)} ago`);
						
						return template.join(' / ')
					}
                }
            },
            'salon_dormitorio_balcon_m': 'With balcony M<sup>2</sup> approx:',
            'salon_dormitorio_tereza_m': 'With terrace M<sup>2</sup> approx:',
    'salon_equipada': {
      label: 'Living room equipped with:',
      template: function template(data) {
        if (data.cabecera.is_sale == '0' ) {
			var template = [];
			if (data.salon_muebles_sofa > 0) template.push('Sofa');
			if (data.salon_muebles_sofa_cama > 0) template.push('sofa bed');
			if (data.salon_muebles_tv > 0) template.push('TV');
			if (data.salon_muebles_mesa_comedor > 0) template.push('Dining table');
			return template.join(' / ');
		}	
	  }
    },			
    'aire_condicionado_salon': {
        label: 'Air conditioning:',
      template: function template(data) {
          //alert(data.aire_condicionado_salon);
        if ( data.aire_condicionado_salon == '1') {
            //alert(data.aire_condicionado_salon);
          return 'Yes';
        }
//return 'No';
        return null;
      }
    },  
            'sepuede_sacar_algo_mueble_salon': {
                label: 'Can some furniture be removed?',
                template: (data) => {
					if (data.cabecera.is_sale == '0' ) {//&& data.sepuede_sacar_algo_mueble_salon !== null) {
						if ( data.sepuede_sacar_algo_mueble_salon == '1')
						{return 'Yes';}
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
            'tanano_aproximado_cocina': 'M<sup>2</sup> approx:',
            'estado_cocina': {
                label: 'Reform status:',
                template(data) {
                    //let template = [data.estado_cocina];
					let template = [];
					if (data.estado_cocina == 'A estrenar' )
					{
						template.push('New');
					}
					else if (data.estado_cocina == 'En buen estado' )
					{
						template.push('In good state');
					}
					else if (data.estado_cocina == 'Recién reformada' )
					{
						template.push('Newly renovated');
					}					

                    // if (data.cocina_estado_estrenar)
                    //     template.push(data.cocina_estado_estrenar);

                    if (data.cocina_estado_reformada != '-' && data.estado_cocina.includes('Reformada hace'))
                        template.push(getTime(data.cocina_estado_reformada));

                    return template.join(' ');
                }
            },
            'tipo_cocina': {
                label: 'Kitchen type:',
                template(data) {
                    //let template = [data.tipo_cocina];
					let template = [];
					if (data.tipo_cocina == 'Independiente' )
					{
						template.push('Independent');
					}
					else if (data.tipo_cocina == 'Americana' )
					{
						template.push('American');
					}
					else if (data.tipo_cocina == 'Francesa' )
					{
						template.push('French');
					}	
					else if (data.tipo_cocina == 'Office' )
					{
						template.push('Office');
					}					

                    // if (data.cocina_estado_estrenar)
                    //     template.push(data.cocina_estado_estrenar);

                    if (data.cocina_estado_reformada != '-' && data.estado_cocina.includes('Reformada hace'))
                        template.push(getTime(data.cocina_estado_reformada));

                    return template.join(' ');
                }
            },
            'ventana_cocina': {
                label: 'Window:',
                template(data) {
                    let template = [data.ventana_cocina];

                    if (data.cocina_dclimati == 1)
                        template.push('Climalit');
  /*                  
                    if (data.cocina_balcon_m)
                        template.push(`With balcony ${data.cocina_balcon_m} M<sup>2</sup> approx`);

                    if (data.cocina_terreza_m)
                        template.push(`With terrace ${data.cocina_terreza_m} M<sup>2</sup> approx`);
*/
                    return template.join(' / ');
                }
            },
    'tipo_ventana_cocina': {
      label: 'Window Type:',
      template: function template(data) {
        if (data.cabecera.is_sale == '1' ) {
            var template = [];
            if (data.tipo_ventana_cocina.length>0) template.push(data.tipo_ventana_cocina);
            if (data.cocina_tipo_ventana_estrenar==1)  template.push('New window');
            if (data.cocina_tipo_ventana_cambiado != '-')
                            template.push(`it has been changed ${getTime(data.cocina_tipo_ventana_cambiado)} ago`);
            if (data.cocina_tipo_ventana_puesta != '-')
                            template.push(`It has been set ${getTime(data.cocina_tipo_ventana_puesta)} ago`);
            return template.join(' / ');
        }   
      }
    },           
            'cocina_balcon_m': 'With balcony M<sup>2</sup> approx:',
            'cocina_terreza_m': 'With terrace M<sup>2</sup> approx:',
            'cocina_equipada': {
                label: 'Kitchen equipped with:',
                template(data) {
                    let template = [];

                    if (data.cocina_equipaje_extractor>0) 
                        template.push('Extractor');

                    if (data.cocina_equipaje_microondas>0)
                        template.push('Microwave');
                        
                    if (data.cocina_equipaje_horno>0)
                        template.push('Oven');

                    if (data.cocina_equipaje_nevera>0) 
                        template.push('Fridge');
                    
                    if (data.cocina_equipaje_lavadora>0) 
                        template.push('Washing machine');

                    if (data.cocina_equipaje_secadora>0) 
                        template.push('Dryer');
					
					if (data.cocina_equipaje_lavaseca>0) 
						template.push('Washer dryer');
					
                    if (data.cocina_equipaje_lavavajillas>0)
                        template.push('Dishwasher');
					if (data.cabecera.is_sale == '0' ) {	
						if (data.cocina_equipaje_menaje > 0) template.push('Kitchenware and utensils');
					}
                    return template.join(' / ');
                } 
            },
            'cocina_fuego': {
                label: 'Kitchen fires:',
                template(data) {
                    let template = [];

                    if (data.cocina_fuego_vitroceramica>0)
                        template.push('Ceramic cooker');
                    if (data.cocina_fuego_induccion>0)
                        template.push('Induction cooker');					

                    if (data.cocina_fuego_gas_nuevo>0)
                        template.push('Gas cooker');

                   /* if (data.cocina_fuego_placa_electronica>0)
                        template.push('Placa eléctrica');*/
        if (data.cocina_fuego_placa_electronica > 0) {
            //alert(data.id);
          if (data.id==3727)
          {
            template.push('Induction cooker');
          }
          else
          {
            template.push('Electric plate cooker');
          }
        }                        

                    if (data.cocina_fuego_bombanra_gas>0)
                        template.push('Gas bottle');

                    return template.join(' / ');
                }
            },
            'tipo_suelo_cocina': {
                label: 'Soil type:',
                template(data) {
					if (data.tipo_suelo_cocina.length>0) {					
						//let template = [data.tipo_suelo_cocina];
						let template = [];
						if (data.tipo_suelo_cocina == 'Moqueta' )
						{
							template.push('Carpet');
						}
						else if (data.tipo_suelo_cocina == 'Hormigón' )
						{
							template.push('Concrete');
						}
						else if (data.tipo_suelo_cocina == 'Cerámica' )
						{
							template.push('Ceramic');
						}
						else if (data.tipo_suelo_cocina == 'Mármol' )
						{
							template.push('Marble');
						}
						else if (data.tipo_suelo_cocina == 'Pizarra' )
						{
							template.push('Slated');
						}
						else if (data.tipo_suelo_cocina == 'Parquet' )
						{
							template.push('Parquet');
						}
						else if (data.tipo_suelo_cocina == 'Tarima flotante' )
						{
							template.push('Laminated flooring');
						}
						else if (data.tipo_suelo_cocina == 'Vinilo' )
						{
							template.push('Vinyl');
						}
						
						if (data.cocina_tipo_suelo_estrenar== '1')
						{
							template.push('New');
						}
						else if (data.cocina_tipo_suelo_estrenar== '2')
						{
							template.push('In good state');
						}						
						else if (data.cocina_tipo_suelo_estrenar== '3')
						{
							template.push('Just changed');
						}	
						if (data.cocina_tipo_suelo_cambiado != '-')
							template.push(`It has been changed ${getTime(data.cocina_tipo_suelo_cambiado)} ago`);
						if (data.cocina_tipo_suelo_puesto != '-')
							template.push(`It has been set ${getTime(data.cocina_tipo_suelo_puesto)} ago`);
						
						return template.join(' / ')
					}
                }
            },	
            'sepuede_sacar_algo_mueble_cocina': {
                label: 'Can some furniture be removed?',
                template: (data) => {
        if (data.cabecera.is_sale == '0' ) {//&& data.sepuede_sacar_algo_mueble_cocina !== null) {
            if ( data.sepuede_sacar_algo_mueble_cocina == '1')
            {return 'Yes';}
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
                label: 'Room price (€):',
                template(data) {
                    let template = [];

                    if (data.precio>0)
						return data.precio;
                }
            },	
    'tamano_aproximado_dormitorio': 'M<sup>2</sup> approx.:',
    /*'en_suite': {
      label: 'BaÃ±o incorporado en el dormitorio',
      template: function template() {
        return ' ';
      }
    },*/
            'en_suite': {
        label: 'Ensuite bathroom in the bedroom:',
      template: function template(data) {
          //alert(data.en_suite);
        if ( data.en_suite == '1') {
            //alert(data.en_suite);
          return 'Yes';
        }
return 'No';
        //return null;
      }
    },
          //  'tipo_cama_dormitorio': 'Tipo de cama:',
            'tipo_cama_dormitorio': {
                label: 'Bed type:',
                template(data) {
                    //let template = [data.tipo_cama_dormitorio];
					let template = [];
					if (data.tipo_cama_dormitorio == 'Individual' )
					{
						template.push('Single');
					}
					else if (data.tipo_cama_dormitorio == '2 Individuales' )
					{
						template.push('2 Singles');
					}	
					else if (data.tipo_cama_dormitorio == 'Mediana' )
					{
						template.push('Medium size');
					}	
					else if (data.tipo_cama_dormitorio == 'Matrimonio' )
					{
						template.push('Double');
					}					
					else if (data.tipo_cama_dormitorio == 'King' )
					{
						template.push('King size');
					}						

                    if (data.canape_dormitorio == 1)
                        template.push(`With couch under the bed`);

                    return template.join(' / '); 
                }
            },		  
            'armarios_dormitorio': {
                label: 'Closet:',
                template(data) {
                    //alert(data.armarios_dormitorio);
                    //alert(data.armarios_dormitorio.length);
					if (data.armarios_dormitorio.length>0) {
						//let template = [data.armarios_dormitorio];
						let template = [];
						if (data.armarios_dormitorio == 'Empotrado' )
						{
							template.push('Built-in');
						}
						else if (data.armarios_dormitorio == 'Normal' )
						{
							template.push('Normal');
						}						
						

						if (data.dormitorio_armarios_dormitorio_puertas)
							template.push(`Number of closet doors: ${data.dormitorio_armarios_dormitorio_puertas}`);

						return template.join(' / ');
					}						
                }
            },
            'ventana_dormitorio': {
                label: 'Window:',
                template(data) {
                    let template = [data.ventana_dormitorio];

                    if (data.dormitorio_dclimati == 1)
                        template.push(`Climalit`);

                    return template.join(' / '); 
                }
            },
            'orientacion_dormitorio': {
                label: 'Orientation:',
                template(data) {
                    let template = [];

                    //if (data.pintura_salon>0) 
					if (data.orientacion_dormitorio == 'Norte' )
					{
			            template.push('North'); 
					}
					else if (data.orientacion_dormitorio == 'Sur' )
					{
			            template.push('South'); 
					}
					else if (data.orientacion_dormitorio == 'Este' )
					{
			            template.push('East'); 
					}
					else if (data.orientacion_dormitorio == 'Oeste' )
					{
			            template.push('West'); 
					}
					else if (data.orientacion_dormitorio == 'Noreste' )
					{
			            template.push('Northeast'); 
					}
					else if (data.orientacion_dormitorio == 'Noroeste' )
					{
			            template.push('Northwest'); 
					}
					else if (data.orientacion_dormitorio == 'Sureste' )
					{
			            template.push('Southeast'); 
					}
					else if (data.orientacion_dormitorio == 'Suroeste' )
					{
			            template.push('Southwest'); 
					}					

                    return template.join(' / ')
                }
            },
            'dormitorio_pintura_recien': {
                label: 'Painting:',
                template(data) {
                    let template = [];
                    //alert(dormitorio_pintura_recien);
                    /*if (data.dormitorio_pintura_recien == '1-')
                        template.push('Just painted'); 
                    if (data.dormitorio_pintura_recien == '2-')
                        template.push('In good state');*/
					if (data.dormitorio_pintura_recien == '1-' )
					{
			            template.push('Just painted'); 
					}
					else if (data.dormitorio_pintura_recien == '2-' )
					{
			            template.push('In good state'); 
					} 					
                    //alert(dormitorio_pintura_recien_pintada);
                    if (data.dormitorio_pintura_recien_pintada != '-')
                        template.push(`It was painted ${getTime(data.dormitorio_pintura_recien_pintada)} ago`);

                    return template.join(' / '); 
                }
            },
            'dormirotio_pared': {
                label: 'Wall:',
                template(data) {
                    let template = [];
					if (data.dormirotio_pared == 'Lisa' )
					{
			            template.push('Smooth'); 
					}
					else if (data.dormirotio_pared == 'Gotelé' )
					{
			            template.push('Stippling'); 
					}
                    return template.join(' / ')
                }
            },
    'tipo_ventana_dormitorio': {
      label: 'Window type:',
      template: function template(data) {
        if (data.cabecera.is_sale == '1' ) {
            var template = [];
            if (data.tipo_ventana_dormitorio.length>0) template.push(data.tipo_ventana_dormitorio);
            if (data.dormitorio_tipo_ventana_estrenar==1)  template.push('New window');
            if (data.dormitorio_tipo_ventana_cambiado != '-')
                            template.push(`It has been changed ${getTime(data.dormitorio_tipo_ventana_cambiado)} ago`);
            if (data.dormitorio_tipo_ventana_puesto != '-')
                            template.push(`It has been set ${getTime(data.dormitorio_tipo_ventana_puesto)} ago`);
            return template.join(' / ');
        }   
      }
    },

            'dormitorio_balcon_m': 'With balcony M<sup>2</sup> approx:',
            'dormitorio_terreza_m': 'With terrace M<sup>2</sup> approx:',
    'dormitorio_equipada': {
      label: 'Bedroom equipped with:',
      template: function template(data) {
		if (data.cabecera.is_sale == '0' ) {
			var template = [];
			if (data.dormitorio_muebles_sofa > 0) template.push('Sofa');
			if (data.dormitorio_muebles_sofa_cama > 0) template.push('Sofa Bed');
			if (data.dormitorio_muebles_tv > 0) template.push('TV');
			if (data.dormitorio_muebles_mesa_comedor > 0) template.push('Dinning table');
			if (data.dormitorio_muebles_escritorio > 0) template.push('Desk');
			if (data.dormitorio_muebles_comoda > 0) template.push('Bureau');
			return template.join(' / ');
		}
	  }
    },			
    'aire_condicionado_dormitorio': {
        label: 'Air conditioning:',
      template: function template(data) {
          //alert(data.aire_condicionado_dormitorio);
        if ( data.aire_condicionado_dormitorio == '1') {
            //alert(data.aire_condicionado_dormitorio);
          return 'Yes';
        }
		//return 'No';
        return null;
      }
    },
            'tipo_suelo': {
                label: 'Soil type:',
                template(data) {
					if (data.tipo_suelo_dormitorio.length>0) {					
						//let template = [data.tipo_suelo_dormitorio];
						let template = [];
						if (data.tipo_suelo_dormitorio == 'Moqueta' )
						{
							template.push('Carpet');
						}
						else if (data.tipo_suelo_dormitorio == 'Hormigón' )
						{
							template.push('Concrete');
						}
						else if (data.tipo_suelo_dormitorio == 'Cerámica' )
						{
							template.push('Ceramic');
						}
						else if (data.tipo_suelo_dormitorio == 'Mármol' )
						{
							template.push('Marble');
						}
						else if (data.tipo_suelo_dormitorio == 'Pizarra' )
						{
							template.push('Slated');
						}
						else if (data.tipo_suelo_dormitorio == 'Parquet' )
						{
							template.push('Parquet');
						}
						else if (data.tipo_suelo_dormitorio == 'Tarima flotante' )
						{
							template.push('Laminated flooring');
						}
						else if (data.tipo_suelo_dormitorio == 'Vinilo' )
						{
							template.push('Vinyl');
						}
						
						if (data.dormitorio_tipo_suelo_estrenar== '1')
						{
							template.push('New');
						}
						else if (data.dormitorio_tipo_suelo_estrenar== '2')
						{
							template.push('In good state');
						}						
						else if (data.dormitorio_tipo_suelo_estrenar== '3')
						{
							template.push('Just changed');
						}						
						if (data.dormitorio_tipo_suelo_cambiado != '-')
							template.push(`it has been changed ${getTime(data.dormitorio_tipo_suelo_cambiado)} ago`);
						if (data.dormitorio_tipo_suelo_puesto != '-')
							template.push(`It has been set ${getTime(data.dormitorio_tipo_suelo_puesto)} ago`);
						
						return template.join(' / ')
					}
                }
            },
    'sepuede_sacar_algo_mueble_dormirorio': {
      label: 'Can some furniture be removed?',
      template: function template(data) {
		  //alert(data.sepuede_sacar_algo_mueble_dormirorio);
        if (data.cabecera.is_sale == '0') {
          //&& data.sepuede_sacar_algo_mueble_dormirorio !== null) {
          if (data.sepuede_sacar_algo_mueble_dormirorio == '1') {
            return 'Yes';
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
            'tamano_aprox_salon': 'M<sup>2</sup> approx:',
            'muebles_dormitorio_salon': {
                label: 'Furniture:',
                template: (data) => JSON.parse(data.muebles_dormitorio_salon).join(', ')
            },
            'ventana_dormitorio_salon': {
                label:'Window:',
                template(data) {
                    let template = [data.ventana_dormitorio_salon];

                    if (data.salon_dormitorio_dclimati == 1)
                        template.push('Climalit');

                    return template.join(' / ')
                    
                }
            },
            'orientacion_dormitorio_salon': {
                label: 'Orientation:',
                template(data) {
                    let template = [];

                    //if (data.pintura_salon>0) 
					if (data.orientacion_dormitorio_salon == 'Norte' )
					{
			            template.push('North'); 
					}
					else if (data.orientacion_dormitorio_salon == 'Sur' )
					{
			            template.push('South'); 
					}
					else if (data.orientacion_dormitorio_salon == 'Este' )
					{
			            template.push('East'); 
					}
					else if (data.orientacion_dormitorio_salon == 'Oeste' )
					{
			            template.push('West'); 
					}
					else if (data.orientacion_dormitorio_salon == 'Noreste' )
					{
			            template.push('Northeast'); 
					}
					else if (data.orientacion_dormitorio_salon == 'Noroeste' )
					{
			            template.push('Northwest'); 
					}
					else if (data.orientacion_dormitorio_salon == 'Sureste' )
					{
			            template.push('Southeast'); 
					}
					else if (data.orientacion_dormitorio_salon == 'Suroeste' )
					{
			            template.push('Southwest'); 
					}					

                    return template.join(' / ')
                }
            },
            'salon_dormitorio_balcon_m': 'With balcony M<sup>2</sup> approx:',
            'salon_dormitorio_tereza_m': 'With terrace M<sup>2</sup> approx:',
    'tipo_ventana_dormitorio_salon': {
      label: 'Window Type:',
      template: function template(data) {
        if (data.cabecera.is_sale == '1' ) {
            var template = [];
            if (data.tipo_ventana_dormitorio_salon.length>0) template.push(data.tipo_ventana_dormitorio_salon);
            if (data.salon_tipo_ventana_estrenar==1)  template.push('New window');
            if (data.salon_tipo_ventana_cambiado != '-')
                            template.push(`it has been changed ${getTime(data.salon_tipo_ventana_cambiado)} ago`);
            if (data.salon_tipo_ventana_puesto != '-')
                            template.push(`It has been set ${getTime(data.salon_tipo_ventana_puesto)} ago`);
            return template.join(' / ');
        }   
      }
    },
            'salon_pintura_recien': {
                label: 'Painting:',
                template(data) {
                    let template = [];
                    //alert(dormitorio_pintura_recien);
                    /*if (data.salon_pintura_recien == '1-')
                        template.push('Just painted'); */
					if (data.salon_pintura_recien == '1-' )
					{
			            template.push('Just painted'); 
					}
					else if (data.salon_pintura_recien == '2-' )
					{
			            template.push('In good state'); 
					} 					
                    //alert(dormitorio_pintura_recien_pintada);
                    if (data.salon_pintura_recien_pintada != '-')
                        template.push(`It was painted ${getTime(data.salon_pintura_recien_pintada)}  ago`);

                    return template.join(' / '); 
                }
            },
            'salon_dormitorio_pared':  {
                label: 'Wall:',
                template(data) {
                    let template = [];
					if (data.salon_dormitorio_pared == 'Lisa' )
					{
			            template.push('Smooth'); 
					}
					else if (data.salon_dormitorio_pared == 'Gotelé' )
					{
			            template.push('Stippling'); 
					}
                    return template.join(' / ')
                }
            },
            'tipo_suelo_dormitorio_salon': {
                label: 'Soil type:',
                template(data) {
					if (data.tipo_suelo_dormitorio_salon.length>0) {					
						//let template = [data.tipo_suelo_dormitorio_salon];
						let template = [];
						if (data.tipo_suelo_dormitorio_salon == 'Moqueta' )
						{
							template.push('Carpet');
						}
						else if (data.tipo_suelo_dormitorio_salon == 'Hormigón' )
						{
							template.push('Concrete');
						}
						else if (data.tipo_suelo_dormitorio_salon == 'Cerámica' )
						{
							template.push('Ceramic');
						}
						else if (data.tipo_suelo_dormitorio_salon == 'Mármol' )
						{
							template.push('Marble');
						}
						else if (data.tipo_suelo_dormitorio_salon == 'Pizarra' )
						{
							template.push('Slated');
						}
						else if (data.tipo_suelo_dormitorio_salon == 'Parquet' )
						{
							template.push('Parquet');
						}
						else if (data.tipo_suelo_dormitorio_salon == 'Tarima flotante' )
						{
							template.push('Laminated flooring');
						}
						else if (data.tipo_suelo_dormitorio_salon == 'Vinilo' )
						{
							template.push('Vinyl');
						}
						
						if (data.salon_dormitorio_tipo_suelo_estrenar== '1')
						{
							template.push('New');
						}
						else if (data.salon_dormitorio_tipo_suelo_estrenar== '2')
						{
							template.push('In good state');
						}						
						else if (data.salon_dormitorio_tipo_suelo_estrenar== '3')
						{
							template.push('Just changed');
						}						
						if (data.salon_dormitorio_tipo_suelo_cambiado != '-')
							template.push(`it has been changed ${getTime(data.salon_dormitorio_tipo_suelo_cambiado)}  ago`);
						if (data.salon_dormitorio_tipo_suelo_puesto != '-')
							template.push(`It has been set ${getTime(data.salon_dormitorio_tipo_suelo_puesto)}  ago`);
						
						return template.join(' / ')
					}
                }
            },	/**/
            //'tipo_cama_dormitorio_salon': 'Tipo de cama:',
            'tipo_cama_dormitorio_salon': {
                label: 'Bed type:',
                template(data) {
                    let template = [data.tipo_cama_dormitorio_salon];

                    if (data.canape_dormitorio_salon == 1)
                        template.push(`With wardrobe under the bed`);

                    return template.join(' / '); 
                }
            },				
            'armarios_dormitorio_saldon': {
                label: 'Closet:',
                template(data) {
					if (data.armarios_dormitorio_saldon.length>0) {
						//let template = [data.armarios_dormitorio_saldon];
						let template = [];
						if (data.armarios_dormitorio_saldon == 'Empotrado' )
						{
							template.push('Built-in');
						}
						else if (data.armarios_dormitorio_saldon == 'Normal' )
						{
							template.push('Normal');
						}
						

						if (data.salon_dorimitorio_puertas)
							template.push(`Number of closet doors: ${data.salon_dorimitorio_puertas}`);

						return template.join(' / ')
					}
                }
            },
    'salon_dormitorio_equipada': {
      label: 'Living bedroom equipped with:',
      template: function template(data) {
		if (data.cabecera.is_sale == '0' ) {
			var template = [];
			if (data.salon_dormitorio_muebles_sofa > 0) template.push('Sofa');
			if (data.salon_dormitorio_muebles_sofa_cama > 0) template.push('Sofa bed');
			if (data.salon_dormitorio_muebles_tv > 0) template.push('TV');
			if (data.salon_dormitorio_muebles_mesa_comedor > 0) template.push('Dining table');
			if (data.salon_dormitorio_muebles_escritorio > 0) template.push('Desk');
			if (data.salon_dormitorio_muebles_comoda > 0) template.push('Bureau');
			return template.join(' / ');
		}
	  }
    },			
        'aire_condicionado_dormitorio_salon': {
        label: 'Air conditioning:',
      template: function template(data) {
          //alert(data.aire_condicionado_dormitorio_salon);
        if ( data.aire_condicionado_dormitorio_salon == '1') {
            //alert(data.aire_condicionado_dormitorio_salon);
          return 'Yes';
        }
		//return 'No';
        return null;
      }
    },
    'sepuede_sacar_algo_mueble_salon_dormitorio': {
      label: 'Can some furniture be removed?',
      template: function template(data) {
		  //alert(data.sepuede_sacar_algo_mueble_salon_dormitorio);
        if (data.cabecera.is_sale == '0') {
          //&& data.sepuede_sacar_algo_mueble_salon_dormitorio !== null) {
          if (data.sepuede_sacar_algo_mueble_salon_dormitorio == '1') {
            return 'Yes';
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
    'tamano_aprox_banos': 'M<sup>2</sup> approx:',
    /*'banos_suite': {
      label: 'BaÃ±o incorporado en el dormitorio',
      template: function template() {
        return ' ';
      }
    },*/
            'banos_suite': {
        label: 'Ensuite bathroom in the bedroom:',
      template: function template(data) {
          //alert(data.banos_suite);
        if ( data.banos_suite == '1') {
            //alert(data.banos_suite);
          return 'Yes';
        }
return 'No';
        //return null;
      }
    },
            'estado_reforma_banos': {
                label: 'Reform status:',
                template: (data) => {
                    let template = [];
                    /*if (data.estado_reforma_banos)
                        template.push(data.estado_reforma_banos);*/

					if (data.estado_reforma_banos == 'A estrenar' )
					{
						template.push('New');
					}
					else if (data.estado_reforma_banos == 'En buen estado' )
					{
						template.push('In good state');
					}
					else if (data.estado_reforma_banos == 'Recién reformado' )
					{
						template.push('Newly renovated');
					}						

                    if (data.banos_estado_reformada != '-')
                        template.push(getTime(data.banos_estado_reformada));

                    return template.join(' ');
                }
            },
            'venta_banos': {
                label: 'Window:',
                template(data) {
                    let template = [data.venta_banos];

                    if (data.bano_dclimati == 1)
                        template.push('Climalit');

                    return template.join(' / ');
                }
            },
    'tipo_ventana': {
      label: 'Window Type:',
      template: function template(data) {
        if (data.cabecera.is_sale == '1' ) {
            var template = [];
            if (data.tipo_ventana.length>0) template.push(data.tipo_ventana);
            if (data.bano_tipo_ventana_estrenar==1)  template.push('New window');
            if (data.bano_tipo_ventana_cambiado != '-')
                            template.push(`it has been changed ${getTime(data.bano_tipo_ventana_cambiado)} ago`);
            if (data.bano_tipo_ventana_puesto != '-')
                            template.push(`it has been set ${getTime(data.bano_tipo_ventana_puesto)} ago`);
            return template.join(' / ');
        }   
      }
    },
    
            'bano_equipado': {
                label: 'Bathroom equipped with:',
                template(data) {
                    let template = [];

                    if (data.banos_banera>0)
                        template.push('Bathtub');

                    if (data.banos_ducha>0)
                        template.push('Shower');

                    if (data.banos_bide>0)
                        template.push('Bidet');

                    if (data.banos_jacuzzi>0)
                        template.push('Jacuzzi');

                    return template.join(' / ');
                }
            },
            'tipo_suelo_banos': {
                label: 'Soil type:',
                template(data) {
					if (data.tipo_suelo_banos.length>0) {					
						//let template = [data.tipo_suelo_banos];
						let template = [];
						if (data.tipo_suelo_banos == 'Moqueta' )
						{
							template.push('Carpet');
						}
						else if (data.tipo_suelo_banos == 'Hormigón' )
						{
							template.push('Concrete');
						}
						else if (data.tipo_suelo_banos == 'Cerámica' )
						{
							template.push('Ceramic');
						}
						else if (data.tipo_suelo_banos == 'Mármol' )
						{
							template.push('Marble');
						}
						else if (data.tipo_suelo_banos == 'Pizarra' )
						{
							template.push('Slated');
						}
						else if (data.tipo_suelo_banos == 'Parquet' )
						{
							template.push('Parquet');
						}
						else if (data.tipo_suelo_banos == 'Tarima flotante' )
						{
							template.push('Laminated flooring');
						}
						else if (data.tipo_suelo_banos == 'Vinilo' )
						{
							template.push('Vinyl');
						}
						

						if (data.bano_tipo_suelo_estrenar== '1')
						{
							template.push('New');
						}
						else if (data.bano_tipo_suelo_estrenar== '2')
						{
							template.push('In good state');
						}						
						else if (data.bano_tipo_suelo_estrenar== '3')
						{
							template.push('Just changed');
						}							
						if (data.bano_tipo_suelo_cambiado != '-')
							template.push(`it has been changed ${getTime(data.bano_tipo_suelo_cambiado)} ago`);
						if (data.bano_tipo_suelo_puesto != '-')
							template.push(`It has been set ${getTime(data.bano_tipo_suelo_puesto)} ago`);
						
						return template.join(' / ')
					}
                }
            },
            // 'bano_tipo_suelo_estrenar': 'New',
            // 'bano_tipo_suelo_cambiado': 'cambiado hace',
            // 'bano_tipo_suelo_puesto': 'puesta hace  año / s',
            'sepuede_sacar_algo_mueble_bano': {
                label: 'Can some furniture be removed?',
                template: (data) => {
					if (data.cabecera.is_sale == '0' ) {//&& data.sepuede_sacar_algo_mueble_bano !== null) {
								if ( data.sepuede_sacar_algo_mueble_bano == '1')
						{return 'Yes';}
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
            'aseo_aprox_pasillo': 'M<sup>2</sup> approx:',
			      'sepuede_sacar_algo_mueble_restrooms': {
                label: 'Can some furniture be removed?',
                template: (data) => {
        if (data.cabecera.is_sale == '0' ) {//&& data.sepuede_sacar_algo_mueble_restrooms !== null) {
                    if ( data.sepuede_sacar_algo_mueble_restrooms == '1')
            {return 'Yes';}
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
            'tamano_aprox_pasillo': 'M<sup>2</sup> approx:',
            'almacenamiento_pasillo': 'Storage:',
            'armario_pasillo': {
                label: 'Closet:',
                template(data) {
					if (data.armario_pasillo.length>0) {
						//let template = [data.armario_pasillo];
						let template = [];
						if (data.armario_pasillo == 'Empotrado' )
						{
							template.push('Built-in');
						}
						else if (data.armario_pasillo == 'Normal' )
						{
							template.push('Normal');
						}
						if (data.pasillo_puertas)
							template.push(`Number of closet doors: ${data.pasillo_puertas}`);

						return template.join(' / ');
					}						
                }
            },
            'sepuede_sacar_algo_mueble_pasillo': {
                label: 'Can some furniture be removed?',
                template: (data) => {
        if (data.cabecera.is_sale == '0' ) {//&& data.sepuede_sacar_algo_mueble_pasillo !== null) {
                    if ( data.sepuede_sacar_algo_mueble_pasillo == '1')
            {return 'Yes';}
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
            'tanano_aprox_distribuidor': 'M<sup>2</sup> approx:',
            'armarios_distribuidor': {
                label: 'Closet:',
                template(data) {
				if (data.armarios_distribuidor.length>0) {					
                    //let template = [data.armarios_distribuidor];
					let template = [];
					if (data.armarios_distribuidor == 'Empotrado' )
					{
						template.push('Built-in');
					}
					else if (data.armarios_distribuidor == 'Normal' )
					{
						template.push('Normal');
					}					

                    if (data.distribuidor_armarios_puertas)
                        template.push(`Number of closet doors: ${data.distribuidor_armarios_puertas}`);

                    return template.join(' / ');
					}
                }
            },
            'sepuede_sacar_algo_mueble_distribuidor': {
                label: 'Can some furniture be removed?',
                template: (data) => {
        if (data.cabecera.is_sale == '0' ) {//&& data.sepuede_sacar_algo_mueble_distribuidor !== null) {
                    if ( data.sepuede_sacar_algo_mueble_distribuidor == '1')
            {return 'Yes';}
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
            'tanano_aprox_habitacion_servicio': 'M<sup>2</sup> approx:',
			            'sepuede_sacar_algo_mueble_serviceRooms': {
                label: 'Can some furniture be removed?',
                template: (data) => {
        if (data.cabecera.is_sale == '0' ) {//&& data.sepuede_sacar_algo_mueble_serviceRooms !== null) {
                    if ( data.sepuede_sacar_algo_mueble_serviceRooms == '1')
            {return 'Yes';}
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
            'tamano_aprox_bano_servicios': 'M<sup>2</sup> approx:',
			            'sepuede_sacar_algo_mueble_bathServices': {
                label: 'Can some furniture be removed?',
                template: (data) => {
        if (data.cabecera.is_sale == '0' ) {//&& data.sepuede_sacar_algo_mueble_bathServices !== null) {
                    if ( data.sepuede_sacar_algo_mueble_bathServices == '1')
            {return 'Yes';}
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
    'tamano_prox_recibidor': 'M<sup>2</sup> approx.:',
      /*  'aparador': {
      label: 'Aparador',
      template: function template() {
        return ' ';
      }
    },*/
            'aparador': {
        label: 'Sideboard: ',
      template: function template(data) {
          //alert(data.aparador);
        if ( data.aparador == '1') {
            //alert(data.aparador);
          return 'Yes';
        }
		//return 'No';
        return null;
      }
    },
    'armario': {
		label: 'Closet:',
		  template(data) {
			//let template = [data.armario];
			let template = [];
			if (data.armario == 'Empotrado')
			{
				template.push('Built-in');
			}
			else if (data.armario == 'Normal')
			{
				template.push('Normal');
			}						
			if (data.armario_num_puertas)
				template.push("Number of closet doors: ".concat(data.armario_num_puertas));
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
        label: 'Storage: ',
      template: function template(data) {
          //alert(data.aparador);
        if ( data.almacenamiento == '1') {
            //alert(data.almacenamiento);
          return 'Yes';
        }
		//return 'No';
        return null;
      }
    },
            'sepuede_sacar_algo_mueble_recibidor': {
                label: 'Can some furniture be removed?',
                template: (data) => {
        if (data.cabecera.is_sale == '0' ) {// && data.sepuede_sacar_algo_mueble_recibidor !== null) {
            if ( data.sepuede_sacar_algo_mueble_recibidor == '1')
            {return 'Yes';}
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
                label: 'Door:',
                template: (data) => data.puerta == 1 ? 'Armored' : 'Not Armored'
            }
        },
		//GARAJE
		{
			'tamano': 'M<sup>2</sup> approx.:',
			'descripcion': 'Description:',
			'tipo':  {
			label: 'Type:',
			template(data) {
			let template = [];
			if (data.tipo == 'Particular')
			{
				template.push('Private');
			}
			else if (data.tipo == 'Comunitario')
			{
				template.push('Community');
			}						
			return template.join(' / ');
			}
		},
			'numero': 'Number of places:',
			'situacion': {
			label: 'Is it in the same building?:',
			template(data) {
				let template = [];
				if (data.situacion == 'Si')
				{
					template.push('Yes');
				}
				else if (data.situacion == 'No, está en un parking exterior')
				{
					template.push('No, it is in an exterior parking');
				}	
				else if (data.situacion == 'No, esta en un parking cercano')
				{
					template.push('No, it is in an near parking');
				}				
				return template.join(' / ');
			}
			}
		},
		//trastero
		{
			'tamano': 'M<sup>2</sup> approx.:',
			'descripcion': 'Description:'
        },
		//fachada
		{
			'descripcion': 'Description:'
        },
		//Portal
		{
			'descripcion': 'Description:'
        },
		//Ascensor
		{
			'descripcion': 'Description:',
			'numero': 'Number of places:'
        },
		//Piscina
		{
			'descripcion': 'Description:'
        },
		//Jardin
		{
			'descripcion': 'Description:'
        },
		//Ginmasio
		{
			'descripcion': 'Description:'
        },
		//Sauna
				{
			'descripcion': 'Description:'
        },
		//zona deportiva
		{
			'descripcion': 'Description:'
        },
		//zona infantil
				{
			'descripcion': 'Description:'
        },
		//transporte
				{
			'lineas': 'Description:'
        },
		//lugares de interés
		{
			'lineas': {
                label: '·',
                
				template(data) {
					if (data.lineas == null) { return null;}
					if (data.lineas.length>0) {
						//let template = [data.medida];
						let template = [];
						if (data.lineas.trim()=='Farmacia'){
							template.push('Pharmacy');
						}
						else if (data.lineas.trim()=='Supermercado'){
							template.push('Supermarket');
						}
						else if (data.lineas.trim()=='Ferretería'){
							template.push('Hardware store');
						}	
						else if (data.lineas.trim()=='Ferreteria'){
							template.push('Hardware store');
						}	
						else if (data.lineas.trim()=='Frutería'){
							template.push('Fruit store');
						}
						else if (data.lineas.trim()=='Frutería'){
							template.push('Fruit store');
						}	
						else if (data.lineas.trim()=='Gimnasio'){
							template.push('Gym');
						}						
						else if (data.lineas.trim()=='Parque'){
							template.push('Park');
						}							
						else
						{
							template.push(data.lineas.trim().replace('Farmacia','Pharmacy').replace('Ferretería','Hardware store').replace('Centro Comercial','Mall').replace('Supermercado','Supermarket').replace('Mercado local','Local Market').replace('Fruteria','Fruit store').replace('Parque','Park').replace('Gimnasio','Gym'));
						}
						
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
						//let template = [data.lineas_1];						
						let template = [];
						if (data.lineas_1.trim()=='Farmacia'){
							template.push('Pharmacy');
						}
						else if (data.lineas_1.trim()=='Supermercado'){
							template.push('Supermarket');
						}
						else if (data.lineas_1.trim()=='Ferretería'){
							template.push('Hardware store');
						}	
						else if (data.lineas_1.trim()=='Ferreteria'){
							template.push('Hardware store');
						}	
						else if (data.lineas_1.trim()=='Frutería'){
							template.push('Fruit store');
						}
						else if (data.lineas_1.trim()=='Frutería'){
							template.push('Fruit store');
						}	
						else if (data.lineas_1.trim()=='Gimnasio'){
							template.push('Gym');
						}						
						else if (data.lineas_1.trim()=='Parque'){
							template.push('Park');
						}							
						else
						{
							template.push(data.lineas_1.trim().replace('Farmacia','Pharmacy').replace('Ferretería','Hardware store').replace('Centro Comercial','Mall').replace('Supermercado','Supermarket').replace('Mercado local','Local Market').replace('Fruteria','Fruit store').replace('Parque','Park').replace('Gimnasio','Gym'));
						}	
						
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
						//let template = [data.lineas_2];						
						let template = [];
						if (data.lineas_2.trim()=='Farmacia'){
							template.push('Pharmacy');
						}
						else if (data.lineas_2.trim()=='Supermercado'){
							template.push('Supermarket');
						}
						else if (data.lineas_2.trim()=='Ferretería'){
							template.push('Hardware store');
						}	
						else if (data.lineas_2.trim()=='Ferreteria'){
							template.push('Hardware store');
						}	
						else if (data.lineas_2.trim()=='Frutería'){
							template.push('Fruit store');
						}
						else if (data.lineas_2.trim()=='Frutería'){
							template.push('Fruit store');
						}	
						else if (data.lineas_2.trim()=='Gimnasio'){
							template.push('Gym');
						}						
						else if (data.lineas_2.trim()=='Parque'){
							template.push('Park');
						}							
						else
						{
							template.push(data.lineas_2.trim().replace('Farmacia','Pharmacy').replace('Ferretería','Hardware store').replace('Centro Comercial','Mall').replace('Supermercado','Supermarket').replace('Mercado local','Local Market').replace('Fruteria','Fruit store').replace('Parque','Park').replace('Gimnasio','Gym'));
						}	
						
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
						//let template = [data.lineas_3];
						let template = [];
						if (data.lineas_3.trim()=='Farmacia'){
							template.push('Pharmacy');
						}
						else if (data.lineas_3.trim()=='Supermercado'){
							template.push('Supermarket');
						}
						else if (data.lineas_3.trim()=='Ferretería'){
							template.push('Hardware store');
						}	
						else if (data.lineas_3.trim()=='Ferreteria'){
							template.push('Hardware store');
						}	
						else if (data.lineas_3.trim()=='Frutería'){
							template.push('Fruit store');
						}
						else if (data.lineas_3.trim()=='Frutería'){
							template.push('Fruit store');
						}	
						else if (data.lineas_3.trim()=='Gimnasio'){
							template.push('Gym');
						}						
						else if (data.lineas_3.trim()=='Parque'){
							template.push('Park');
						}							
						else
						{
							template.push(data.lineas_3.trim().replace('Farmacia','Pharmacy').replace('Ferretería','Hardware store').replace('Centro Comercial','Mall').replace('Supermercado','Supermarket').replace('Mercado local','Local Market').replace('Fruteria','Fruit store').replace('Parque','Park').replace('Gimnasio','Gym'));
						}	
						
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
						//let template = [data.lineas_4];
						let template = [];
						if (data.lineas_4.trim()=='Farmacia'){
							template.push('Pharmacy');
						}
						else if (data.lineas_4.trim()=='Supermercado'){
							template.push('Supermarket');
						}
						else if (data.lineas_4.trim()=='Ferretería'){
							template.push('Hardware store');
						}	
						else if (data.lineas_4.trim()=='Ferreteria'){
							template.push('Hardware store');
						}	
						else if (data.lineas_4.trim()=='Frutería'){
							template.push('Fruit store');
						}
						else if (data.lineas_4.trim()=='Frutería'){
							template.push('Fruit store');
						}	
						else if (data.lineas_4.trim()=='Gimnasio'){
							template.push('Gym');
						}						
						else if (data.lineas_4.trim()=='Parque'){
							template.push('Park');
						}							
						else
						{
							template.push(data.lineas_4.trim().replace('Farmacia','Pharmacy').replace('Ferretería','Hardware store').replace('Centro Comercial','Mall').replace('Supermercado','Supermarket').replace('Mercado local','Local Market').replace('Fruteria','Fruit store').replace('Parque','Park').replace('Gimnasio','Gym'));
						}	
						
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
						//let template = [data.lineas_5];
						let template = [];
						if (data.lineas_5.trim()=='Farmacia'){
							template.push('Pharmacy');
						}
						else if (data.lineas_5.trim()=='Supermercado'){
							template.push('Supermarket');
						}
						else if (data.lineas_5.trim()=='Ferretería'){
							template.push('Hardware store');
						}	
						else if (data.lineas_5.trim()=='Ferreteria'){
							template.push('Hardware store');
						}	
						else if (data.lineas_5.trim()=='Frutería'){
							template.push('Fruit store');
						}
						else if (data.lineas_5.trim()=='Frutería'){
							template.push('Fruit store');
						}	
						else if (data.lineas_5.trim()=='Gimnasio'){
							template.push('Gym');
						}						
						else if (data.lineas_5.trim()=='Parque'){
							template.push('Park');
						}							
						else
						{
							template.push(data.lineas_5.trim().replace('Farmacia','Pharmacy').replace('Ferretería','Hardware store').replace('Centro Comercial','Mall').replace('Supermercado','Supermarket').replace('Mercado local','Local Market').replace('Fruteria','Fruit store').replace('Parque','Park').replace('Gimnasio','Gym'));
						}							
						
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
						//let template = [data.lineas_6];
						let template = [];
						if (data.lineas_6.trim()=='Farmacia'){
							template.push('Pharmacy');
						}
						else if (data.lineas_6.trim()=='Supermercado'){
							template.push('Supermarket');
						}
						else if (data.lineas_6.trim()=='Ferretería'){
							template.push('Hardware store');
						}	
						else if (data.lineas_6.trim()=='Ferreteria'){
							template.push('Hardware store');
						}	
						else if (data.lineas_6.trim()=='Frutería'){
							template.push('Fruit store');
						}
						else if (data.lineas_6.trim()=='Frutería'){
							template.push('Fruit store');
						}	
						else if (data.lineas_6.trim()=='Gimnasio'){
							template.push('Gym');
						}						
						else if (data.lineas_6.trim()=='Parque'){
							template.push('Park');
						}							
						else
						{
							template.push(data.lineas_6.trim().replace('Farmacia','Pharmacy').replace('Ferretería','Hardware store').replace('Centro Comercial','Mall').replace('Supermercado','Supermarket').replace('Mercado local','Local Market').replace('Fruteria','Fruit store').replace('Parque','Park').replace('Gimnasio','Gym'));
						}	
						
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
						//let template = [data.lineas_7];
						let template = [];
						if (data.lineas_7.trim()=='Farmacia'){
							template.push('Pharmacy');
						}
						else if (data.lineas_7.trim()=='Supermercado'){
							template.push('Supermarket');
						}
						else if (data.lineas_7.trim()=='Ferretería'){
							template.push('Hardware store');
						}	
						else if (data.lineas_7.trim()=='Ferreteria'){
							template.push('Hardware store');
						}	
						else if (data.lineas_7.trim()=='Frutería'){
							template.push('Fruit store');
						}
						else if (data.lineas_7.trim()=='Frutería'){
							template.push('Fruit store');
						}	
						else if (data.lineas_7.trim()=='Gimnasio'){
							template.push('Gym');
						}						
						else if (data.lineas_7.trim()=='Parque'){
							template.push('Park');
						}							
						else
						{
							template.push(data.lineas_7.trim().replace('Farmacia','Pharmacy').replace('Ferretería','Hardware store').replace('Centro Comercial','Mall').replace('Supermercado','Supermarket').replace('Mercado local','Local Market').replace('Fruteria','Fruit store').replace('Parque','Park').replace('Gimnasio','Gym'));
						}		
						
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
						//let template = [data.lineas_8];
						let template = [];
						if (data.lineas_8.trim()=='Farmacia'){
							template.push('Pharmacy');
						}
						else if (data.lineas_8.trim()=='Supermercado'){
							template.push('Supermarket');
						}
						else if (data.lineas_8.trim()=='Ferretería'){
							template.push('Hardware store');
						}	
						else if (data.lineas_8.trim()=='Ferreteria'){
							template.push('Hardware store');
						}	
						else if (data.lineas_8.trim()=='Frutería'){
							template.push('Fruit store');
						}
						else if (data.lineas_8.trim()=='Frutería'){
							template.push('Fruit store');
						}	
						else if (data.lineas_8.trim()=='Gimnasio'){
							template.push('Gym');
						}						
						else if (data.lineas_8.trim()=='Parque'){
							template.push('Park');
						}							
						else
						{
							template.push(data.lineas_8.trim().replace('Farmacia','Pharmacy').replace('Ferretería','Hardware store').replace('Centro Comercial','Mall').replace('Supermercado','Supermarket').replace('Mercado local','Local Market').replace('Fruteria','Fruit store').replace('Parque','Park').replace('Gimnasio','Gym'));
						}
						
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
						//let template = [data.lineas_9];
						let template = [];
						if (data.lineas_9.trim()=='Farmacia'){
							template.push('Pharmacy');
						}
						else if (data.lineas_9.trim()=='Supermercado'){
							template.push('Supermarket');
						}
						else if (data.lineas_9.trim()=='Ferretería'){
							template.push('Hardware store');
						}	
						else if (data.lineas_9.trim()=='Ferreteria'){
							template.push('Hardware store');
						}	
						else if (data.lineas_9.trim()=='Frutería'){
							template.push('Fruit store');
						}
						else if (data.lineas_9.trim()=='Frutería'){
							template.push('Fruit store');
						}	
						else if (data.lineas_9.trim()=='Gimnasio'){
							template.push('Gym');
						}						
						else if (data.lineas_9.trim()=='Parque'){
							template.push('Park');
						}							
						else
						{
							template.push(data.lineas_9.trim().replace('Farmacia','Pharmacy').replace('Ferretería','Hardware store').replace('Centro Comercial','Mall').replace('Supermercado','Supermarket').replace('Mercado local','Local Market').replace('Fruteria','Fruit store').replace('Parque','Park').replace('Gimnasio','Gym'));
						}						
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

  