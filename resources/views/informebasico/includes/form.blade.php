{{-- Alquiler == '0' --}}
{{-- Venta == '1' --}}
<form @submit.prevent="onSubmit" class="form-fieldset">
    {{-- Imagen/Video Principal --}}
    <fieldset>
        <legend>Imagen Principal</legend>
        <div class="form-group">
            <input-file name="path_image_primary" :reference="reference.id" accept="image/*"></input-file>
        </div>
		<legend>Video Principal</legend>
        <div class="form-group">
            <!--<label for="">video principal</label>-->
           <!-- <input type="text" class="form-control" v-model="form.video_primary">-->
		               <textarea  rows="3" class="form-control" v-model="form.video_primary" maxlength="2999"></textarea>
        </div>
       <div class="form-group">
		  <div class="row">
			<div class="col-md-4">
				<legend>Fecha alta refencia:</legend>
				<input type="date" v-model="form.time" class="form-control" /> 
			</div>
		   </div>
        </div>
    <fieldset>
        <div class="form-group">
			<div class="row">
				<div class="col-md-12">
					<legend style="color: #4B0082; font-weight: bold;">Ciudad:</legend>
                    <select v-model="form.municipio" class="form-control" id="municipio" name="municipio"  >
                        <option value="">Seleccione Ciudad...</option>
                        <option value="Boadilla del Monte">Boadilla del Monte</option>
                        <option value="Las Rozas">Las Rozas</option>
                        <option value="Madrid">Madrid</option>
                        <option value="Majadahonda">Majadahonda</option>
                        <option value="Pozuelo de Alarcón">Pozuelo de Alarcón</option>
                    </select>					
				</div>				
			</div>
        </div>        
        <div class="form-group">
			<div class="row">
				<div class="col-md-6">
					<legend style="color: #4B0082; font-weight: bold;">Provincia</legend>
					<select name="ciudad" v-model="form.city" id="ciudad" class="form-control">
						@foreach(App\Ciudad::where('estado', true)->get() as $city)
							<option value="{{ $city->id }}" >{{$city->name}}</option>
						@endforeach
					</select>
				</div>
				<div class="col-md-6">
					<legend style="color: #4B0082; font-weight: bold;">C.P.:</legend>
					<input type="text" v-model="form.codigo_postal" class="form-control" id="codigo_postal" name="codigo_postal"  placeholder="C.P." maxlength="5"/> 
				</div>				
			</div>
        </div>
    </fieldset>

		<legend>Dirección</legend>
        <div class="form-group">
		    <div class="row">
    		     <div class="col-md-4">
                    <label for="road3">CALLE ANUNCIO:</label>
                    <input type="text" class="form-control" id="road" name="road" v-model="form.road"  placeholder="Calle anuncio...">
                </div> 
    
			</div>
		    <div class="row" >
    		     <div class="col-md-4">
                    <label for="road4" style="color: #4B0082; font-weight: bold;">CALLE REAL:</label>
                    <input type="text" class="form-control" id="road_real" name="road_real" v-model="form.road_real"  placeholder="Calle real...">
                </div> 
    
                <div class="col-md-4">
                    <label for="road5" style="color: #4B0082; font-weight: bold;">NUMERO#:</label>
                    <input type="text" class="form-control" id="numero" name="numero" v-model="form.numero"  placeholder="Numero">
                </div> 
    			<div class="col-md-4">
    				<label for="" style="color: #4B0082; font-weight: bold;">Numero del departamento</label>
    				<input type="text" class="form-control" v-model="form.number_apartment">
    			</div>
			</div>			
        </div>
		<div class="form-group mt-2">
         <div class="row">
                <div class="col-md-2">
                    <div id="map" class="form-group"> 
						<label for="">&nbsp;</label>
                        <input type="hidden" class="form-control" id="direccion" name="direccion" v-model="form.address">
                        <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#mapModal">Ubicación</button>
                    </div>
                </div>		 
                <div class="col-md-4">
                    <label for="latitud">LATITUD:</label>
                    <input type="text" class="form-control" id="latitud" name="latitud" v-model="form.latitud"  placeholder="form.latitud" readonly>
                </div>
                <div class="col-md-4">
                    <label for="longitud">LONGITUD:</label>
                    <input type="text" class="form-control" id="longitud" name="longitud" v-model="form.longitud"  placeholder="form.longitud" readonly>
                </div>

           </div>
		</div>
    </fieldset>
    <fieldset>
        <legend style="color: #4B0082; font-weight: bold;">Si hay más de un garaje o trastero separado por ; el número</legend>
        <div class="form-group">
			<div class="row">
				<div class="col-md-6">
					<legend style="color: #4B0082; font-weight: bold;">Ref. plaza(s) garaje(s):</legend>
					<input type="text" v-model="form.garaje_numero" class="form-control" id="garaje_numero" name="garaje_numero"  placeholder="Ref. plaza(s) garaje(s)" maxlength="20"/> 
				</div>
				<div class="col-md-6">
					<legend style="color: #4B0082; font-weight: bold;">Ref. plaza trastero:</legend>
					<input type="text" v-model="form.trastero_numero" class="form-control" id="trastero_numero" name="trastero_numero"  placeholder="Ref. plaza trastero" maxlength="20"/> 
				</div>				
			</div>
        </div>
    </fieldset>
    <fieldset>
        <legend style="color: #4B0082; font-weight: bold;">Si hay más de un garaje o trastero separado por ; el número</legend>
        <div class="form-group">
			<div class="row">
				<div class="col-md-6">
					<legend style="color: #4B0082; font-weight: bold;">Plazo de escritura (días):</legend>
					<input type="text" v-model="form.plazo_escritura" class="form-control" id="plazo_escritura" name="plazo_escritura"  placeholder="Plazo de escritura (días)" maxlength="4"/> 
					<small class="form-text text-muted">Días plazo de escritura, por defecto 60 si es nulo o vacío</small>
				</div>
			</div>
        </div>
    </fieldset>
    <fieldset>
        <!--<legend>Si hay más de un garaje o trastero separado por ; el número</legend>-->
        <div class="form-group">
			<div class="row">
				<div class="col-md-6">
					<legend style="color: #4B0082; font-weight: bold;">Comisión Iamoving (%):</legend>
					<input type="text" v-model="form.comision_iamoving" class="form-control" id="comision_iamoving" name="comision_iamoving"  placeholder="Comisión Iamoving" maxlength="5"/> 
					<small class="form-text text-muted">Valor por defecto de 3% si nulo o vacío</small>
				</div>
			</div>
        </div>
    </fieldset>


<fieldset>
    <div class="row">
        <div class="col-md-6">
            <div class="checkbox">
                <label style="display: flex; align-items: center;">
                    <input type="checkbox" value="1" name="comision_iva" v-model="form.comision_iva">
                    <span style="color: #4B0082; font-weight: bold; margin-left: 5px; font-size: 20px;">Comisión iva</span>
                </label>
                <small class="form-text text-muted">(valor por defecto más iva, si chequeado valor (iva incluido))</small>
            </div>
        </div>
    </div>                
</fieldset>            
    <fieldset>
        <!--<legend>Si hay más de un garaje o trastero separado por ; el número</legend>-->
        <div class="form-group">
			<div class="row">
				<div class="col-md-6">
					<legend style="color: #4B0082; font-weight: bold;">Cantidad Arras (€):</legend>
					<input type="text" v-model="form.arras" class="form-control" id="arras" name="arras"  placeholder="Arras Cantidad (€)" maxlength="8"/> 
					<small class="form-text text-muted">Es la cantidad en euros de arras, por defecto del valor ofertado del inmueble. El 10% si nulo o vacío</small>
				</div>
			</div>
        </div>
    </fieldset>
    <fieldset>
        <!--<legend>Si hay más de un garaje o trastero separado por ; el número</legend>-->
        <div class="form-group">
			<div class="row">
				<div class="col-md-6">
					<legend style="color: #4B0082; font-weight: bold;">Plazo Formalizar Oferta (días):</legend>
					<input type="text" v-model="form.plazo_formalizar" class="form-control" id="plazo_formalizar" name="plazo_formalizar"  placeholder="Dias Formalizar Oferta" maxlength="3"/>
					<small class="form-text text-muted">Días plazo de formalización de oferta, por defecto 5 si es nulo o vacío</small>
					
				</div>
			</div>
        </div>
    </fieldset> 
    {{-- Enlaces de oferta de compra --}}
    <fieldset>
        <div class="form-group">
            <div class="row">
                <div class="col-md-12">
                    <div style="margin-bottom: 10px;">
                        <a href="javascript:void(0)" 
                           @click="copyToClipboard('https://iamoving.com/ofertacompra/' + reference.id, 'link1')" 
                           style="color: #4B0082; text-decoration: underline; cursor: pointer; margin-right: 20px;">
                            LINK DE OFERTA DE COMPRA REAL
                        </a>
                        <span v-if="copiedLink === 'link1'" style="color: green; font-size: 12px;">✓ Copiado LINK REAL</span>
                    </div>
                    <div>
                        <a href="javascript:void(0)" 
                           @click="copyToClipboard('https://iamoving.com/ofertacompra/' + reference.id + '?test_email=1', 'link2')" 
                           style="color: #4B0082; text-decoration: underline; cursor: pointer; margin-right: 20px;">
                            Link oferta de compra PRUEBA
                        </a>
                        <span v-if="copiedLink === 'link2'" style="color: green; font-size: 12px;">✓ Copiado LINK PRUEBA</span>
                    </div>
                </div>
            </div>
        </div>
    </fieldset>    
    {{-- Datos Basicos --}}
    <fieldset>
       <!-- <legend>DATOS BÁSICOS </legend>-->
          
        {{--  new andres  --}}
        <input type="hidden" v-model="orientacionSalon">
	<!--<div id="caparepresentante"  v-if="form.telefono_e != null">-->
	<div id="caparepresentante">
		<br>
          <legend> Datos del propietario:</legend>
              <br>

		<div class="row" style="color: #cc0000;">
                <div class="col-md-5">
                    <label>Nombre del propietario:</label>
                    <input type="text" class="form-control" name="telefono" v-model="form.nombre_e"  placeholder="Nombre del propietario">
                </div> 		
                 <div class="col-md-5">
                    <label>Email del propietario:</label>
                    <input type="email" class="form-control" name="email" v-model="form.email_e"  placeholder="Email del propietario">
                </div>
        </div>			
		<div class="row">

                  
                <div class="col-md-5" style="color: #cc0000;">
                    <label>Numero de telefono:</label>
                    <input type="text" class="form-control" id="telefono_e" name="telefono_e" v-model="form.telefono_e"  placeholder="Numero de telefono...">
                </div>
		</div>
		<div class="row" style="color: #cc0000;">
		
			<div class="form-group" v-show="reference.is_sale == '0'">
				<div class="col-md-10">
				<label for="nota"><b><u>FIANZA del propietario</u></b></label>
				<!--<input type="number" class="form-control" v-model="form.condiciones">-->
				<input type="number" min="0" max="24" step="0.5"  class="form-control" v-model="form.condiciones">
				</div>
			</div>
		</div>	
		<div class="row" style="color: #cc0000;">
			<div class="form-group" v-show="reference.is_sale == '0'">
				<div class="col-md-10"  id="capaburocracia" style="display:block;">
					<div class="checkbox">
								<label>
									<input type="checkbox" name="sin_burocracia" v-model="form.sin_burocracia" true-value="1" false-value="0"> Sin burocracia
								</label>
					</div>
				</div>
			</div>
		</div>					
	</div>
	<div v-else-if="form.email_e != null">
		<br>
          <legend> Datos representante:</legend>
              <br>
            <div class="row">
              
                <div class="col-md-2">
                    <label>Tipo de identificación</label>
                    <select v-model="form.tipo_dni_e" class="form-control">
                        <option value="DNI">DNI</option>
                        <option value="NIF">NIF</option>
                        <option value="NIE">NIE</option>
                        <option value="PASAPORTE">PASAPORTE</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label>Documento</label>
                    <input type="text" class="form-control" id="dni_e" name="dni_e"  v-model="form.dni_e" placeholder="Documento del representante...">
                </div>

                <div class="col-md-5">
                    <label>Nombre</label>
                    <input type="text" class="form-control" id="nombre_e" name="nombre_e" v-model="form.nombre_e" placeholder="Nombre del representante...">
                </div>
		</div>
		<div class="row">
                 <div class="col-md-5">
                    <label>Email</label>
                    <input type="email" class="form-control" id="email_e"  name="email_e" v-model="form.email_e"  placeholder="Email...">
                </div>
                  
                <div class="col-md-5">
                    <label>Numero de telefono:</label>
                    <input type="text" class="form-control" id="telefono_e" name="telefono_e" v-model="form.telefono_e"  placeholder="Numero de telefono...">
                </div>
		</div>
	</div>	
	
	
	<div v-if="form.telefono_agencia != null">
         <legend> Datos agencia:</legend>
              <br>
            <div class="row">
              
                <div class="col-md-2">
                    <label>Tipo de identificación</label>
                    <select v-model="form.tipo_dni_agencia" class="form-control">
                        <option value="DNI">DNI</option>
						<option value="CIF">CIF</option>
                        <option value="NIF">NIF</option>
                        <option value="NIE">NIE</option>
                        <option value="PASAPORTE">PASAPORTE</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label>Documento</label>
                    <input type="text" class="form-control"  v-model="form.dni_agencia" placeholder="Documento de la agencia...">
                </div>

                <div class="col-md-5">
                    <label>Nombre</label>
                    <input type="text" class="form-control" v-model="form.nombre_agencia" placeholder="Nombre de la agencia...">
                </div>
			</div>
			<div class="row">
                 <div class="col-md-5">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email_agencia" v-model="form.email_agencia"  placeholder="Email...">
                </div>
                  
                <div class="col-md-5">
                    <label>Numero de telefono:</label>
                    <input type="text" class="form-control" name="telefono_agencia" v-model="form.telefono_agencia"  placeholder="Numero de telefono...">
                </div>
			</div>	
	</div>
	<div v-else-if="form.email_agencia != null">
         <legend> Datos agencia:</legend>
              <br>
            <div class="row">
              
                <div class="col-md-2">
                    <label>Tipo de identificación</label>
                    <select v-model="form.tipo_dni_agencia" class="form-control">
                        <option value="DNI">DNI</option>
						<option value="CIF">CIF</option>
                        <option value="NIF">NIF</option>
                        <option value="NIE">NIE</option>
                        <option value="PASAPORTE">PASAPORTE</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label>Documento</label>
                    <input type="text" class="form-control"  v-model="form.dni_agencia" placeholder="Documento de la agencia...">
                </div>

                <div class="col-md-5">
                    <label>Nombre</label>
                    <input type="text" class="form-control" v-model="form.nombre_agencia" placeholder="Nombre de la agencia...">
                </div>
			</div>
			<div class="row">
                 <div class="col-md-5">
                    <label>Email</label>
                    <input type="email" class="form-control"  name="email_agencia" v-model="form.email_agencia"  placeholder="Email...">
                </div>
                  
                <div class="col-md-5">
                    <label>Numero de telefono:</label>
                    <input type="text" class="form-control"  name="telefono_agencia" v-model="form.telefono_agencia"  placeholder="Numero de telefono...">
                </div>
			</div>
	</div>
	
        <!--<div class="form-group">
		<legend>Datos colaborador visita:</legend>

            <select name="email_visita" v-model="form.email_visita" id="email_visita" class="form-control">
                <option value="">Seleccionar...</option>
                <option value="santiago@iamoving.com-Santiago_1156">Santiago</option>
                <option value="dalessandrorachel@iamoving.com-Raquel_1245">Raquel</option>
				<option value="h2000servicios@gmail.com-Roberto_1159">Roberto</option>
            </select>
        </div>	-->	
        <div class="form-group">
		<legend>Tipo de inmueble:</legend>
       <!--     <span>Tipo de inmueble: </span>-->
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1" name="contiene_estudio" v-model="form.study">
                    Estudio
                </label>
                </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1" name="contiene_loft" v-model="form.loft">
                    Loft
                </label>
                </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1" name="contiene_apartamento" v-model="form.apartment">
                    Apartamento
                </label>
                </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1" name="contiene_piso" v-model="form.floor">
                    Piso
                </label>
                </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1" name="contiene_chalet" v-model="form.chalet">
                    Chalet
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1" name="contiene_chalet" v-model="form.low">
                    Bajo
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1" name="contiene_chalet" v-model="form.penthouse">
                    Atico
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1" name="contiene_casa" v-model="form.casa">
                    Casa
                </label>
            </div>  
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1" name="contiene_duplex" v-model="form.duplex">
                    Dúplex
                </label>
            </div>            
        </div>

        <div class="form-group">
		<legend>Precio:</legend>
            <!--<label for="precio">Precio:</label>-->
            <!--<input-currency class="form-control" v-model="form.price_property"  :value="form.price_property"></input-currency>-->
			            <!--<currency-input v-model="form.price_property" :currency="currency" locale="de" :decimal-length="2" class="form-control"/>-->
			    <currency-input v-model="form.price_property" :value="form.price_property" class="form-control"/>
        </div>

        <div class="form-group" v-if="reference.is_sale == '1'">
            <!--<label for="precio">Alquiler aproximado:</label>-->
			<legend>Alquiler aproximado:</legend>
            <!--<input-currency class="form-control" v-model="form.alquiler_aproximado"  :value="form.alquiler_aproximado"></input-currency>-->
			    <currency-input class="form-control" v-model="form.alquiler_aproximado"  :value="form.alquiler_aproximado"/>
            <label for="comentario_alquiler_aprox">Comentario alquiler aproximado:</label>
            <input type="text" name="comentario_alquiler_aprox" v-model="form.comentario_alquiler_aprox" id="comentario_alquiler_aprox" class="form-control" placeholder="Comentario alquiler aproximado...">
        </div>

        <div class="form-group">
            <!--<label for="numero_dormitorio">Numero de dormitorios</label>-->
			<legend v-if="reference.tipo_inmueble == 'Local/Oficina'">Número de Estancias</legend>
			<legend v-if="reference.tipo_inmueble == 'Habitaciones'">Número de dormitorios</legend>
			<legend v-if="reference.tipo_inmueble == 'Pisos y casas'">Número de dormitorios</legend>
            <!--<input type="number" min="0" max="9999" class="form-control" id="numero_dormitorio" name="numero_dormitorio" v-model="form.bedrooms" placeholder="Numero de dormitorios..." readonly>-->
			<input type="number" min="0" max="9999" class="form-control" id="numero_dormitorio" name="numero_dormitorio" v-model="form.bedrooms" placeholder="Numero de dormitorios...">
        </div>
        
         <div class="form-group">
            <!--<label for="numero_banos">Numero de baños</label>-->
			<legend>Número de baños</legend>
            <!--<input type="number" min="0" max="9999" class="form-control" id="numero_banos" name="numero_banos" v-model="form.bathrooms" placeholder="Numero de baños..." readonly>-->
			<input type="number" min="0" max="9999" class="form-control" id="numero_banos" name="numero_banos" v-model="form.bathrooms" placeholder="Numero de baños..." >
        </div> 
         <div class="form-group">
            <!--<label for="numero_banos">Numero de baños</label>-->
			<legend>Número de aseos</legend>
            <!--<input type="number" min="0" max="9999" class="form-control" id="numero_banos" name="numero_banos" v-model="form.bathrooms" placeholder="Numero de baños..." readonly>-->
			<input type="number" min="0" max="9999" class="form-control" id="numero_aseos" name="numero_aseos" v-model="form.aseos" placeholder="Numero de aseos..." >
        </div> 
        <div class="form-group">
            <!--<label for="metros_cuadrados">Metros cuadrados</label>-->
			<legend>Metros cuadrados</legend>
            <input type="number" min="0" max="9999" class="form-control" id="metros_cuadrados" name="metros_cuadrados" v-model="form.meters" placeholder="Metros cuadrados...">
        </div>
    </fieldset>
    {{-- Calendario --}}
    <fieldset>
<div id="capacalendario" style="display:block;">
        <legend>Días y horarios que la propiedad prefiere enseñar el inmueble</legend>
        <div class="form-group">
            <label>Dias de la semana</label>
            <select class="form-control" multiple v-model="form.calendar">
                <option value="Lunes">Lunes</option>
                <option value="Martes">Martes</option>
                <option value="Miercoles">Miercoles</option>
                <option value="Jueves">Jueves</option>
                <option value="Viernes">Viernes</option>
                <option value="Sabado">Sabado</option>
                <option value="Domingo">Domingo</option>
            </select>
        </div>
		<div class="form-group">
		<label for="nota"><u>Durante todo el día:</u></label>
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col-xs-2">
					<label for="nota">Desde</label>
				</div>
				<div class="col-xs-8">
				<div class="input-group">
					<!--<input type="number" min="00" max="24" step="1"  class="form-control" v-model="form.hora_dia">-->
					<select name="hora_dia" v-model="form.hora_dia" id="hora_dia" class="form-control">
						<option value="">hora...</option>
						<option value="0">0</option>
						@for ($i = 1; $i <= 23; $i++)
							<option value="{{$i}}">{{$i}}</option>
						@endfor
						<option value="24">24</option>
					</select>
					<span class="input-group-addon">-</span>				
					<!--<input type="number" min="00" max="45" step="15"  class="form-control" v-model="form.minuto_dia">-->
					<select name="minuto_dia" v-model="form.minuto_dia" id="minuto_dia" class="form-control">
						<option value="">min...</option>
						<option value="00">00</option>
						<option value="15">15</option>
						<option value="30">30</option>
						<option value="45">45</option>
					</select>					
				 </div>
				</div>
				<div class="col-xs-4">
				</div>
			</div>
			<div class="row">	
				<div class="col-xs-2">
				</div>			
				<div class="col-xs-2">
					<label for="nota">hasta</label>
				</div>
				<div class="col-xs-8">
					<div class="input-group">
					<!--<input type="number" min="00" max="24" step="1"  class="form-control" v-model="form.hora_dia_hasta">-->
					<select name="hora_dia_hasta" v-model="form.hora_dia_hasta" id="hora_dia_hasta" class="form-control">
						<option value="">hora...</option>
						<option value="0">0</option>
						@for ($i = 1; $i <= 23; $i++)
							<option value="{{$i}}">{{$i}}</option>
						@endfor
						<option value="24">24</option>
					</select>					
					<span class="input-group-addon">-</span>				
					<!--<input type="number" min="00" max="45" step="15"  class="form-control" v-model="form.minuto_dia_hasta">-->
					<select name="minuto_dia_hasta" v-model="form.minuto_dia_hasta" id="minuto_dia_hasta" class="form-control">
						<option value="">min...</option>
						<option value="00">00</option>
						<option value="15">15</option>
						<option value="30">30</option>
						<option value="45">45</option>
					</select>						
				   </div>
			   </div>
			</div>
		</div>			
		<div class="form-group">
		<label for="nota"><u>Por la mañana:</u></label>
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col-xs-2">
					<label for="nota">Desde</label>
				</div>
				<div class="col-xs-8">
				<div class="input-group">
					<!--<input type="number" min="00" max="24" step="1"  class="form-control" v-model="form.hora_manana">-->
					<select name="hora_manana" v-model="form.hora_manana" id="hora_manana" class="form-control">
						<option value="">hora...</option>
						<option value="0">0</option>
						@for ($i = 1; $i <= 23; $i++)
							<option value="{{$i}}">{{$i}}</option>
						@endfor
						<option value="24">24</option>
					</select>
					<span class="input-group-addon">-</span>				
					<!--<input type="number" min="00" max="45" step="15"  class="form-control" v-model="form.minuto_manana">-->
					<select name="minuto_manana" v-model="form.minuto_manana" id="minuto_manana" class="form-control">
						<option value="">min...</option>
						<option value="00">00</option>
						<option value="15">15</option>
						<option value="30">30</option>
						<option value="45">45</option>
					</select>					
				 </div>
				</div>
				<div class="col-xs-4">
				</div>
			</div>
			<div class="row">	
				<div class="col-xs-2">
				</div>			
				<div class="col-xs-2">
					<label for="nota">hasta</label>
				</div>
				<div class="col-xs-8">
					<div class="input-group">
					<!--<input type="number" min="00" max="24" step="1"  class="form-control" v-model="form.hora_manana_hasta">-->
					<select name="hora_manana_hasta" v-model="form.hora_manana_hasta" id="hora_manana_hasta" class="form-control">
						<option value="">hora...</option>
						<option value="0">0</option>
						@for ($i = 1; $i <= 23; $i++)
							<option value="{{$i}}">{{$i}}</option>
						@endfor
						<option value="24">24</option>
					</select>					
					<span class="input-group-addon">-</span>				
					<!--<input type="number" min="00" max="45" step="15"  class="form-control" v-model="form.minuto_manana_hasta">-->
					<select name="minuto_manana_hasta" v-model="form.minuto_manana_hasta" id="minuto_manana_hasta" class="form-control">
						<option value="">min...</option>
						<option value="00">00</option>
						<option value="15">15</option>
						<option value="30">30</option>
						<option value="45">45</option>
					</select>						
				   </div>
			   </div>
			</div>
		</div>	
		<div class="form-group">
		<label for="nota"><u>A la hora de la comida:</u></label>
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col-xs-2">
					<label for="nota">Desde</label>
				</div>
				<div class="col-xs-8">
				<div class="input-group">
					<!--<input type="number" min="00" max="24" step="1"  class="form-control" v-model="form.hora_manana">-->
					<select name="hora_manana" v-model="form.hora_comida" id="hora_comida" class="form-control">
						<option value="">hora...</option>
						<option value="0">0</option>
						@for ($i = 1; $i <= 23; $i++)
							<option value="{{$i}}">{{$i}}</option>
						@endfor
						<option value="24">24</option>
					</select>
					<span class="input-group-addon">-</span>				
					<!--<input type="number" min="00" max="45" step="15"  class="form-control" v-model="form.minuto_comida">-->
					<select name="minuto_comida" v-model="form.minuto_comida" id="minuto_comida" class="form-control">
						<option value="">min...</option>
						<option value="00">00</option>
						<option value="15">15</option>
						<option value="30">30</option>
						<option value="45">45</option>
					</select>					
				 </div>
				</div>
				<div class="col-xs-4">
				</div>
			</div>
			<div class="row">	
				<div class="col-xs-2">
				</div>			
				<div class="col-xs-2">
					<label for="nota">hasta</label>
				</div>
				<div class="col-xs-8">
					<div class="input-group">
					<!--<input type="number" min="00" max="24" step="1"  class="form-control" v-model="form.hora_comida_hasta">-->
					<select name="hora_comida_hasta" v-model="form.hora_comida_hasta" id="hora_comida_hasta" class="form-control">
						<option value="">hora...</option>
						<option value="0">0</option>
						@for ($i = 1; $i <= 23; $i++)
							<option value="{{$i}}">{{$i}}</option>
						@endfor
						<option value="24">24</option>
					</select>					
					<span class="input-group-addon">-</span>				
					<!--<input type="number" min="00" max="45" step="15"  class="form-control" v-model="form.minuto_comida_hasta">-->
					<select name="minuto_comida_hasta" v-model="form.minuto_comida_hasta" id="minuto_comida_hasta" class="form-control">
						<option value="">min...</option>
						<option value="00">00</option>
						<option value="15">15</option>
						<option value="30">30</option>
						<option value="45">45</option>
					</select>						
				   </div>
			   </div>
			</div>
		</div>			
		<div class="form-group">
		<label for="nota"><u>Por la tarde</u></label>
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col-xs-2">
					<label for="nota">Desde</label>
				</div>
				<div class="col-xs-8">
				<div class="input-group">
					<!--<input type="number" min="00" max="24" step="1"  class="form-control" v-model="form.hora_manana">-->
					<select name="hora_manana" v-model="form.hora_tarde" id="hora_tarde" class="form-control">
						<option value="">hora...</option>
						<option value="0">0</option>
						@for ($i = 1; $i <= 23; $i++)
							<option value="{{$i}}">{{$i}}</option>
						@endfor
						<option value="24">24</option>
					</select>
					<span class="input-group-addon">-</span>				
					<!--<input type="number" min="00" max="45" step="15"  class="form-control" v-model="form.minuto_tarde">-->
					<select name="minuto_tarde" v-model="form.minuto_tarde" id="minuto_tarde" class="form-control">
						<option value="">min...</option>
						<option value="00">00</option>
						<option value="15">15</option>
						<option value="30">30</option>
						<option value="45">45</option>
					</select>					
				 </div>
				</div>
				<div class="col-xs-4">
				</div>
			</div>
			<div class="row">	
				<div class="col-xs-2">
				</div>			
				<div class="col-xs-2">
					<label for="nota">hasta</label>
				</div>
				<div class="col-xs-8">
					<div class="input-group">
					<!--<input type="number" min="00" max="24" step="1"  class="form-control" v-model="form.hora_tarde_hasta">-->
					<select name="hora_tarde_hasta" v-model="form.hora_tarde_hasta" id="hora_tarde_hasta" class="form-control">
						<option value="">hora...</option>
						<option value="0">0</option>
						@for ($i = 1; $i <= 23; $i++)
							<option value="{{$i}}">{{$i}}</option>
						@endfor
						<option value="24">24</option>
					</select>					
					<span class="input-group-addon">-</span>				
					<!--<input type="number" min="00" max="45" step="15"  class="form-control" v-model="form.minuto_tarde_hasta">-->
					<select name="minuto_tarde_hasta" v-model="form.minuto_tarde_hasta" id="minuto_tarde_hasta" class="form-control">
						<option value="">min...</option>
						<option value="00">00</option>
						<option value="15">15</option>
						<option value="30">30</option>
						<option value="45">45</option>
					</select>						
				   </div>
			   </div>
			</div>
		</div>
        <div class="form-group">
            <label for="calefaccion">Flexibilidad horaria</label>
            <select name="flexibilidad" v-model="form.flexibilidad" id="flexibilidad" class="form-control">
                <option value="">Seleccionar...</option>
                <option value="Tengo flexibilidad para realizar visitas en otros horarios también.">Tengo flexibilidad para realizar visitas en otros horarios también.</option>
                <option value="No tengo flexibilidad de realizar visitas en otros horarios, lo siento.">No tengo flexibilidad de realizar visitas en otros horarios, lo siento.</option>
				<option value="Solicitar la visita con un mínimo de 24 horas de antelación, por favor.">Solicitar la visita con un mínimo de 24 horas de antelación, por favor.</option>
            </select>
        </div>		
        <div class="form-group">
            <label for="">Nota de calendario</label>
            <input type="text" class="form-control" v-model="form.schedule">
        </div>
</div>
        <template v-if="reference.is_sale == '0'">
		<div id="capadisponible" style="display:block;">
            <div class="form-group row">
                <div class="col-lg-6">
                    <label for="calendario_inicio">Inmueble disponible a partir de:</label>
                    <input type="date" class="form-control" id="calendario_inicio" name="calendario_inicio" v-model="form.home_rental" placeholder="Inicio alquiler...">
                </div>
                <div class="col-lg-6">
                    <label for="calendario_fin">fecha de salida si es con límite de salida:</label>
                    <input type="date" class="form-control" id="calendario_fin" name="calendario_fin" v-model="form.departure_date" placeholder="Fin alquiler...">
                </div>
            </div>
		</div>
            <div class="form-group">
			<legend>Tiempo mínimo del contrato</legend>
                <!--<label for="contrato_tiempo">Tiempo mínimo del contrato</label>-->
                <select name="contrato_tiempo" v-model="form.contract" id="contrato_tiempo" class="form-control">
                    <option value="">Seleccionar...</option>
                    <option value="1">1 mes</option>
                    @for ($i = 2; $i <= 23; $i++)
                        <option value="{{$i}}">{{$i}} meses</option>
                    @endfor
                    <option value="24">hasta 24 meses</option>
                </select>
            </div>
            <div class="form-group">
			<legend>Tiempo máximo del contrato</legend>
                <!--<label for="tiempo_maximo">Tiempo mínimo del contrato</label>-->
                <select name="tiempo_maximo" v-model="form.tiempo_maximo" id="tiempo_maximo" class="form-control">
                    <option value="">Seleccionar...</option>
                    <option value="3">3 meses</option>
					<option value="6">6 meses</option>
					<option value="1">1 año</option>
					<option value="18">18 meses</option>
					<option value="24">24 meses</option>
					<option value="5">5 años</option>
                </select>
            </div>			
        </template>
        
    </fieldset>
    {{-- Estado --}}
    <fieldset>
        <legend>Antigüedad</legend>
        <div class="form-group">
            <select name="state_property" v-model="form.state_property" id="state_property" class="form-control">
                <option value="">Seleccionar...</option>
                <option value="Obra nueva">Obra nueva</option>
               <!-- <option value="Antigüedad hasta 10 años">Antigüedad hasta 10 años</option>-->
                <option value="Reformado a estrenar">Reformado a estrenar</option>
				<option value="A reformar">A reformar</option>
                <!--<option value="Ha sido reformado a menos de 10 años">Ha sido reformado a menos de 10 años</option>
                <option value="Reformado o antigüedad hace más de 10 años.">Reformado o antigüedad hace más de 10 años</option>-->
				<option value="En buen estado">En buen estado</option>
				<option value="Recién reformado">Recién reformado</option>
            </select>
        </div>
    </fieldset>
    {{-- Estado del Amueblado  --}}
    <fieldset v-if="reference.is_sale == '0'">
        <legend>¿Se encuentra amueblado?</legend>
        <div class="form-group">
            <select name="estado_amueblado" v-model="form.furnished" id="estado_amueblado" class="form-control">
                <option value="">Seleccionar...</option>
                <option value="Totalmente sin muebles">Totalmente sin muebles</option>
                <option value="Sin muebles con cocina equipada">Vacío c/ la cocina equipada</option>
                <option value="Semi-Amueblado">Semi amueblado</option>
                <option value="Amueblado">Amueblado</option>
            </select>
        </div>
		 <div class="form-group">
            <label for="">Comentario amueblado</label>
            <textarea  name="comentario_inmueble" rows="3" class="form-control" v-model="form.comentario_inmueble" maxlength="999"></textarea>
        </div>
    </fieldset>
    {{-- Habitacion Amueblada  --}}
    <fieldset v-if="reference.tipo_inmueble == 'Habitaciones'">
        <legend>¿Buscando habitación amueblada o vacía?</legend>
        <div class="form-group">
            <select name="habitacion_vacia" v-model="form.habitacion_vacia" id="habitacion_vacia" class="form-control">
                <option value="">Seleccionar...</option>
                <option value="Totalmente sin muebles">Totalmente sin muebles</option>
                <option value="Semi-Amueblada">Semi amueblada</option>
                <option value="Amueblada">Amueblada</option>
            </select>
        </div>
    </fieldset>	
    {{-- Estado del Amueblado  --}}
    <fieldset v-if="reference.is_sale == '1'">
        <legend>¿Se vende amueblado?</legend>
        <div class="form-group">
            <select name="estado_amueblado" v-model="form.furnished" id="estado_amueblado" class="form-control">
                <option value="">Seleccionar...</option>
                <option value="Totalmente sin muebles">Totalmente sin muebles</option>
                <option value="Sin muebles con cocina equipada">Vacío c/ la cocina equipada</option>
                <option value="Semi-Amueblado">Semi amueblado</option>
                <option value="Amueblado">Amueblado</option>
            </select>
        </div>
		 <div class="form-group">
            <label for="">Comentario amueblado</label>
            <textarea  name="comentario_inmueble" rows="3" class="form-control" v-model="form.comentario_inmueble" maxlength="999"></textarea>
        </div>
    </fieldset>	
    {{-- Transporte --}}

    {{-- Loque es importante para mi --}}
    <fieldset>
        <legend>Muy importante</legend>
        <div class="form-group">
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1" name="acceso_ascensor" v-model="form.lift">
                    Ascensor
                </label>
            </div>            
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1" name="patio_externo" v-model="form.exterior">
                    Exterior
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1" name="patio_interno" v-model="form.inside">
                    Interior
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1" name="tiene_terraza" v-model="form.terrace">
                    Terraza
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1" name="tiene_balcon" v-model="form.balcony">
                    Balcón
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1" name="patio" v-model="form.patio">
                    Patio
                </label>
            </div>            
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1" name="acepta_mascotas" v-model="form.pets">
                    NO acepta Mascotas
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1" name="acepta_tenderos" v-model="form.storekeepers">
                    Tendederos
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1" name="acepta_aire" v-model="form.air_conditioner">
                    Aire Acondicionado
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1" name="ventana_climalit" v-model="form.ventana_climalit">
                    Ventana Climalit
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1" name="acceso_rampa" v-model="form.ramp">
                    Acceso a minusválidos en el portal
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1" name="acceso_carrito" v-model="form.baby_cart_lift">
                    Ascensor entra un carrito de bebé
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1" name="portero" v-model="form.portero">
                    Portero
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1" name="video_portero" v-model="form.video_portero">
                    Video Portero
                </label>
            </div>			
        </div>
        <div class="form-group">
            <label for="orientacion_solar">Orientación:</label>
            <select name="orientacion_solar" v-model="form.orientacion_solar" id="orientacion_solar" class="form-control">
                <option value="">Seleccionar...</option>
				<option value="Norte">Norte</option>
		                <option value="Sur">Sur</option>
		                <option value="Este">Este</option>
		                <option value="Oeste">Oeste</option>
				<option value="Noreste">Noreste</option>
				<option value="Sureste">Sureste</option>
				<option value="Noroeste">Noroeste</option>
		                <option value="Suroeste">Suroeste</option>
            </select>
        </div>		
        <div class="form-group">
            <label for="calefaccion">Tipo de Suelo:</label>
            <select name="tipo_suelo" v-model="form.tipo_suelo" id="tipo_suelo" class="form-control">
                    <option></option>
                    <option>Moqueta</option>
                    <option>Hormigón</option>
                    <option>Cerámica</option>
                    <option>Mármol</option>
                    <option>Pizarra</option>
                    <option>Parquet</option>
                    <option>Tarima flotante</option>
                    <option>Vinilo</option>
            </select>
        </div>		
        <div class="form-group">
            <label for="calefaccion">Pared:</label>
            <select name="tipo_pared" v-model="form.tipo_pared" id="tipo_pared" class="form-control">
                    <option></option>
                    <option>Gotelé</option>
                    <option>Lisa</option>
            </select>
        </div>	
            <div class="form-group">
                <label for="brand-new">Pintura Estado:</label>
                        <select name="pintura_estado" v-model="form.pintura_estado" id="pintura_estado" class="form-control">
							<option value=""></option>
							<option value="1">Recién pintado</option>
							<option value="2">En buen estado</option>
                        </select>				
            </div>			
<div id="local" name="local" style="display:block;" class="form-group" v-if="form.tipo_inmueble == 'Local/Oficina'"> 
<legend>+Local/Oficina!</legend>

        <div class="form-group">
            <label for="numero_escaparates">¿Cuántos escaparates tiene el Local/Oficina?</label>
            <input type="number" min="0" max="100" class="form-control" id="numero_escaparates" name="numero_escaparates" v-model="form.numero_escaparates" placeholder="Número de escaparates..">
        </div>
        <div class="form-group">
            <label for="plantas_local">¿Cuántas plantas tiene el Local/Oficina?</label>
            <input type="number" min="0" max="100" class="form-control" id="plantas_local" name="plantas_local" v-model="form.plantas_local" placeholder="Número de plantas del Local/Oficina..">
        </div>			
	<div class="checkbox">
		<label>
			<input type="checkbox" value="1" name="diafano" v-model="form.diafano">
			Diáfano
		</label>
	</div>
	<div class="checkbox">
		<label>
			<input type="checkbox" value="1" name="divido_mamparas" v-model="form.divido_mamparas">
			Dividivo con mamparas
		</label>
	</div>			
	<div class="checkbox">
		<label>
			<input type="checkbox" value="1" name="divido_tabiques" v-model="form.divido_tabiques">
			Dividido con tabiques
		</label>
	</div>
	<div class="checkbox">
		<label>
			<input type="checkbox" value="1" name="salida_humos" v-model="form.salida_humos">
			Salida de humos
		</label>
	</div>	
	<div class="checkbox">
		<label>
			<input type="checkbox" value="1" name="pie_calle" v-model="form.pie_calle">
			A pie de calle
		</label>
	</div>
	<div class="checkbox">
		<label>
			<input type="checkbox" value="1" name="centro_comercial" v-model="form.centro_comercial">
			En centro comercial
		</label>
	</div>
	<div class="checkbox">
		<label>
			<input type="checkbox" value="1" name="entreplanta" v-model="form.entreplanta">
			Entreplanta
		</label>
	</div>
	<div class="checkbox">
		<label>
			<input type="checkbox" value="1" name="subterraneo" v-model="form.subterraneo">
			Subterráneo
		</label>
	</div>	
	<div class="checkbox">
		<label>
			<input type="checkbox" value="1" name="puerta_seguridad" v-model="form.puerta_seguridad">
			Puerta de seguridad
		</label>
	</div>	
	<div class="checkbox">
		<label>
			<input type="checkbox" value="1" name="sistema_alarma" v-model="form.sistema_alarma">
			Sistemas de alarma
		</label>
	</div>
	<div class="checkbox">
		<label>
			<input type="checkbox" value="1" name="circuito_seguridad" v-model="form.circuito_seguridad">
			Circuito cerrado de seguridad
		</label>
	</div>	
	<div class="checkbox">
		<label>
			<input type="checkbox" value="1" name="almacen" v-model="form.almacen">
			Almacén
		</label>
	</div>
		
	<div class="checkbox">
		<label>
			<input type="checkbox" value="1" name="esquina" v-model="form.esquina">
			Hace esquina
		</label>
	</div>
        <div class="form-group">
            <label for="plantas_local">Número de ascensores</label>
            <input type="number" min="0" max="100" class="form-control" id="numero_ascensores" name="numero_ascensores" v-model="form.numero_ascensores" placeholder="Número de ascensores del Local/Oficina..">
        </div>	
	<div class="checkbox">
		<label>
			<input type="checkbox" value="1" name="montacargas" v-model="form.montacargas">
			Montacargas 
		</label>
	</div>	
</div>
<div id="local" name="local" style="display:none;" class="form-group" v-if="form.tipo_inmueble != 'Local/Oficina'"> 	
<legend>+Local/Oficina!</legend>

        <div class="form-group">
            <label for="numero_escaparates">¿Cuántos escaparates tiene el Local/Oficina?</label>
            <input type="number" min="0" max="100" class="form-control" id="numero_escaparates" name="numero_escaparates" v-model="form.numero_escaparates" placeholder="Número de escaparates..">
        </div>
        <div class="form-group">
            <label for="plantas_local">¿Cuántas plantas tiene el Local/Oficina?</label>
            <input type="number" min="0" max="100" class="form-control" id="plantas_local" name="plantas_local" v-model="form.plantas_local" placeholder="Número de plantas del Local/Oficina..">
        </div>			
	<div class="checkbox">
		<label>
			<input type="checkbox" value="1" name="diafano" v-model="form.diafano">
			Diáfano
		</label>
	</div>
	<div class="checkbox">
		<label>
			<input type="checkbox" value="1" name="divido_mamparas" v-model="form.divido_mamparas">
			Dividivo con mamparas
		</label>
	</div>			
	<div class="checkbox">
		<label>
			<input type="checkbox" value="1" name="divido_tabiques" v-model="form.divido_tabiques">
			Dividido con tabiques
		</label>
	</div>
	<div class="checkbox">
		<label>
			<input type="checkbox" value="1" name="salida_humos" v-model="form.salida_humos">
			Salida de humos
		</label>
	</div>	
	<div class="checkbox">
		<label>
			<input type="checkbox" value="1" name="pie_calle" v-model="form.pie_calle">
			A pie de calle
		</label>
	</div>
	<div class="checkbox">
		<label>
			<input type="checkbox" value="1" name="puerta_seguridad" v-model="form.puerta_seguridad">
			Puerta de seguridad
		</label>
	</div>	
	<div class="checkbox">
		<label>
			<input type="checkbox" value="1" name="sistema_alarma" v-model="form.sistema_alarma">
			Sistemas de alarma
		</label>
	</div>
	<div class="checkbox">
		<label>
			<input type="checkbox" value="1" name="circuito_seguridad" v-model="form.circuito_seguridad">
			Circuito cerrado de seguridad
		</label>
	</div>	
	<div class="checkbox">
		<label>
			<input type="checkbox" value="1" name="almacen" v-model="form.almacen">
			Almacén
		</label>
	</div>
		
	<div class="checkbox">
		<label>
			<input type="checkbox" value="1" name="esquina" v-model="form.esquina">
			Hace esquina
		</label>
	</div>
        <div class="form-group">
            <label for="plantas_local">Número de ascensores</label>
            <input type="number" min="0" max="100" class="form-control" id="numero_ascensores" name="numero_ascensores" v-model="form.numero_ascensores" placeholder="Número de ascensores del Local/Oficina..">
        </div>	
	<div class="checkbox">
		<label>
			<input type="checkbox" value="1" name="montacargas" v-model="form.montacargas">
			Montacargas 
		</label>
	</div>	
</div>		
        <div class="form-group">
            <label for="referencia_piso">¿Que Planta es?</label>
            <input type="text" name="referencia_piso" v-model="form.important_floor" id="referencia_piso" class="form-control" placeholder="Piso...">
        </div>
        <div class="form-group">
            <label for="plantas_edificio">¿Cuántas plantas tiene el edificio?</label>
            <input type="number" min="0" max="999" class="form-control" id="plantas_edificio" name="plantas_edificio" v-model="form.plantas_edificio" placeholder="Número de plantas edificio..">
        </div>		
        <div class="form-group">
            <label for="plantas_edificio">¿Cuántas plantas tiene el chalet?</label>
            <input type="number" min="0" max="999" class="form-control" id="plantas_chalet" name="plantas_chalet" v-model="form.plantas_chalet" placeholder="Número de plantas chalet..">
        </div>			
        <div class="form-group">
            <label for="adosado_chalet">¿Tipo de chalet?</label>
                        <select name="adosado_chalet" v-model="form.adosado_chalet" id="adosado_chalet" class="form-control">
                <option value="0">Seleccionar...</option>
				<option value="1">Chalet Adosado</option>
                <option value="2">Chalet Independiente</option>
                <option value="3">Chalet Pareado</option>
            </select>
        </div>        
        <div class="form-group">
            <label for="calefaccion">Calefacción</label>
            <select name="calefaccion" v-model="form.heating" id="calefaccion" class="form-control">
                <option value="">Seleccionar...</option>
				<option value="Individual por gas natural (Suelo radiante)">Individual por gas natural (Suelo radiante)</option>
                <option value="Individual por gas natural">Individual por gas natural</option>
                <option value="Eléctrica">Eléctrica</option>
                <option value="Central">Central</option>
				<!--<option value="Central Biomasa">Central Biomasa</option>-->
				<option value="Eléctrica (Bomba de frío/calor)">Eléctrica (Bomba de frío/calor)</option>
				<option value="Solar">Solar</option>
				<option value="Aerotermia">Aerotermia</option>
				<option value="Por conductos">Por conductos</option>
                <option value="Sin calefacción">Sin calefacción</option>
            </select>
        </div>
        <div class="form-group">
            <label for="caldera">Caldera de agua</label>
            <select name="caldera" v-model="form.water_boiler" id="caldera" class="form-control">
                <option value="">Seleccionar...</option>
                <option value="Gas natural">Gas natural</option>
                <option value="Eléctrica">Eléctrica</option>
                <option value="Central">Central</option>
                <option value="Aerotermia">Aerotermia</option>
            </select>
        </div>
    </fieldset>
    {{-- Gastos Aproximados --}}
    <fieldset  v-if="reference.is_sale == '1'">
	<!--<div id="garaje_trastero" style="display:none;"></div>-->
				<div id="capadisponible" style="display:none;"></div>
				<div id="capaburocracia" style="display:none;"></div>
        <legend>Gastos aprox</legend>
        <div class="form-group">
            <label for="aproximado_comunidad">Comunidad</label>
            <!--<input-currency class="form-control" v-model="form.community_expenses" :value="form.community_expenses"></input-currency>-->
			    <currency-input class="form-control" v-model="form.community_expenses" :value="form.community_expenses"/>
        </div>
        <div class="form-group">
            <label for="incluido_comunidad">Incluido precio Comunidad</label>
            <select name="incluido_comunidad" v-model="form.incluido_comunidad" id="incluido_comunidad" class="form-control">
                <option value="">Seleccionar...</option>
                <option value="incluidos agua y calefacción en el precio de la comunidad">incluidos agua y calefacción</option>
                <option value="incluida agua en el precio de la comunidad">incluida agua</option>
                <option value="incluida calefacción en el precio de la comunidad">incluida calefacción</option>
                <option value="incluido aire acondicionado en el precio de la comunidad">incluido aire acondicionado</option>
                <option value="incluidos calefacción y aire acondicionado en el precio de la comunidad">incluidos calefacción y aire acondicionado</option>
                <option value="incluidos agua, calefacción y aire acondicionado en el precio de la comunidad">incluidos agua, calefacción y aire acondicionado</option>
                <option value="incluidos agua y aire acondicionado en el precio de la comunidad">incluidos agua y aire acondicionado</option>
                <option value="incluidos calefacción y agua caliente en el precio de la comunidad">Incluidos calefacción y agua caliente</option>
            </select>
        </div>		
        <div class="form-group">
            <label for="aproximado_ibi">ibi</label>
            <!--<input-currency class="form-control" v-model="form.ibi_expenses" :value="form.ibi_expenses"></input-currency>-->
			    <currency-input class="form-control" v-model="form.ibi_expenses" :value="form.ibi_expenses"/>
        </div>
        <div class="form-group">
            <label for="aproximado_tbasura">Tasa basura</label>
			    <currency-input class="form-control" v-model="form.gastos_tbasura" :value="form.gastos_tbasura"/>
        </div>        
		<!--<div id="garaje_y_trastero" style="display:block;">-->
        <legend>Incluido en el precio de venta</legend>		
			 <div class="form-group">
			 	<div class="row">
					<div class="col-md-6">
						<div class="checkbox">
							<label>
								<input type="checkbox" value="1" name="datos_edificio_garaje_en_precio" v-model="form.garage_included_price">
								Garaje incluido en el precio
							</label>
						</div>
					</div>
					<div class="col-md-6">
						<div class="checkbox">
							<label for="plazas_garaje">Nº plazas</label>
							<select name="plazas_garaje" v-model="form.plazas_garaje" id="plazas_garaje" class="form-control">
								<option value="">Seleccionar...</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
							</select>					
							<!--&nbsp;&nbsp;
							<label>
								<input type="checkbox" value="1" name="datos_edificio_garaje_2_plazas" v-model="form.garage_two_places">
								2 plazas
							</label>-->
						</div>
					</div>
				</div>
			</div>
			 <div class="form-group">
				<div class="checkbox">
					<label>
						<input type="checkbox" value="1" name="datos_edificio_testero_incluido" v-model="form.testero_included">
						Trastero incluido en el precio
					</label>
				</div>
			</div>
		<!--</div>-->
    </fieldset>
    {{-- Gastos incluidos --}}
    <fieldset v-if="reference.is_sale == '0'">
	<!--<div id="garaje_y_trastero" style="display:none;"></div>-->

        <legend>Lo que está incluido en el precio</legend>
        <div class="form-group">
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1" name="gastos_calefaccion" v-model="form.expenses_included_heating">
                    Calefacción
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1" name="gastos_agua" v-model="form.expenses_included_water">
                    Agua
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1" name="gastos_luz" v-model="form.expenses_included_light ">
                    Luz
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1" name="gastos_gas" v-model="form.expenses_included_gas">
                    Gas natural
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1" name="gastos_tasa_basura" v-model="form.expenses_included_garbage">
                    Tasa de basura
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1" name="gastos_comunidad" v-model="form.expenses_included_community">
                    Comunidad
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1" name="gastos_ibi" v-model="form.expenses_included_ibi">
                    Ibi
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1" name="gastos_incluido_tbasura" v-model="form.gastos_incluido_tbasura">
                    Tasa Basura
                </label>
            </div>            
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1" name="gastos_internet" v-model="form.expenses_included_internet">
                    Internet
                </label>
            </div>
			<!-- <div id="garaje_trastero" style="display:block;">-->
				<div class="checkbox">
					<label>
						<input type="checkbox" value="1" name="datos_edificio_garaje_en_precio" v-model="form.garage_included_price">
						Garaje incluido en el precio
					</label>
					<!--&nbsp;&nbsp;
					<label>
						<input type="checkbox" value="1" name="datos_edificio_garaje_2_plazas" v-model="form.garage_two_places">
						2 plazas
					</label>-->
				</div>
				<div class="checkbox">
					<label>
						<input type="checkbox" value="1" name="datos_edificio_testero_incluido" v-model="form.testero_included">
						Trastero incluido en el precio
					</label>
				</div>
			<!--</div>-->
        </div>
    </fieldset>
    {{-- Datos del edificio --}}
    <div id="datos_edificio" style="display:block;">
	<fieldset>
        <legend>Datos del edificio</legend>
        <div class="form-group">
           <!-- <div class="checkbox">
                <label>
                    <input type="checkbox" value="1" name="datos_edificio_jardin" v-model="form.yard">
                    Jardín
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1" name="datos_edificio_piscina" v-model="form.swimming_pool">
                    Piscina
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1" name="datos_edificio_gym" v-model="form.gym">
                    Gym
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1" name="datos_edificio_sauna" v-model="form.sauna">
                    Sauna
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1" name="datos_edificio_zona_deportiva" v-model="form.sport_zone">
                    Zona deportiva
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1" name="datos_edificio_zona_infantil" v-model="form.childish_zone">
                    Zona infantil
                </label>
            </div>-->
		</div>
	</div>	
        <legend>Más información</legend>
        <div class="form-group">
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1" name="datos_edificio_jardin" v-model="form.yard">
                    Jardín
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1" name="datos_edificio_piscina" v-model="form.swimming_pool">
                    Piscina
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1" name="datos_edificio_gym" v-model="form.gym">
                    Gym
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1" name="datos_edificio_sauna" v-model="form.sauna">
                    Sauna
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1" name="datos_edificio_zona_deportiva" v-model="form.sport_zone">
                    Zona deportiva
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1" name="datos_edificio_zona_infantil" v-model="form.childish_zone">
                    Zona infantil
                </label>
            </div>		
            <!--<div class="checkbox">
                <label>
                    <input type="checkbox" value="1" name="datos_edificio_garaje_mismo_edificio" v-model="form.garage_option">
                    Opción de garaje en el mismo edificio
                </label>
            </div>

            <div class="checkbox">
                <label>
                    <input type="checkbox" value="1" name="datos_edificio_opcion_trasteo" v-model="form.storage_room_option_building">
                    Opción de trastero en el mismo edificio
                </label>
            </div>
        </div>-->
        <!--<div class="form-group">
            <label for="zona_garaje">Precio aproximadamente de plaza de garaje en alquiler por la zona</label>
			    <currency-input class="form-control" v-model="form.approximate_cost_garages" :value="form.approximate_cost_garages"/>
        </div>
        <div class="form-group">
            <label for="zona_garaje">Precio aproximadamente de plaza de garaje en venta por la zona</label>
                <currency-input class="form-control" v-model="form.venta_cost_garage" :value="form.venta_cost_garage"/>
        </div>-->   
<!-- NUEVOS SELECTS PARA GARAJE -->
<div class="form-group" v-if="reference.is_sale == '1'">
    <legend>¿Opción de garaje para comprar?</legend>
    <select name="garaje_comprar" v-model="form.garaje_comprar" id="garaje_comprar" class="form-control" @change="onGarajeComprarChange">
        <option value="">Seleccionar...</option>
        <option value="Opción de garaje en el mismo edificio">Opción de garaje en el mismo edificio</option>
        <option value="Opción de garaje en el mismo edificio con acceso directo">Opción de garaje en el mismo edificio con acceso directo</option>
        <option value="Opción de garaje en los alrededores">Opción de garaje en los alrededores</option>
    </select>
</div>

<div class="form-group" v-if="reference.is_sale == '1' && form.garaje_comprar != '' && form.garaje_comprar != null" id="capa_precio_compra_garaje">
    <label for="precio_garaje_compra">Precio aproximadamente de plaza de garaje de compra</label>
    <currency-input class="form-control" v-model="form.precio_compra_garaje" :value="form.precio_compra_garaje"/>
</div>

<div class="form-group" v-if="reference.is_sale == '1'">
    <legend>¿Opción de garaje para alquilar?</legend>
    <select name="garaje_alquilar" v-model="form.garaje_alquilar" id="garaje_alquilar" class="form-control" @change="onGarajeAlquilarChange">
        <option value="">Seleccionar...</option>
        <option value="Opción de garaje en el mismo edificio">Opción de garaje en el mismo edificio</option>
        <option value="Opción de garaje en el mismo edificio con acceso directo">Opción de garaje en el mismo edificio con acceso directo</option>
        <option value="Opción de garaje en los alrededores">Opción de garaje en los alrededores</option>
    </select>
</div>

<div class="form-group" v-if="reference.is_sale == '1' && form.garaje_alquilar != '' && form.garaje_alquilar != null" id="capa_precio_alquilar_garaje">
    <label for="precio_garaje_alquilar">Precio aproximadamente de plaza de garaje de alquilar</label>
    <currency-input class="form-control" v-model="form.precio_alquilar_garaje" :value="form.precio_alquilar_garaje"/>
</div>        
        <div class="form-group">
            <label for="zona_antiguedad">Antigüedad del edificio</label>
            <input type="text" name="zona_antiguedad" v-model="form.antiquity_building" id="zona_antiguedad" class="form-control" placeholder="Antigüedad del edificio...">
        </div>
        <div class="form-group">
            <label for="certificado_energetico">Certificado energético</label>
            <select name="certificado_energetico" v-model="form.energy_certificate" id="certificado_energetico" class="form-control">
                <option value="">Seleccionar...</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
				<option value="E">E</option>
                <option value="Y">Y</option>
                <option value="R">R</option>
				<option value="F">F</option>
                <option value="G">G</option>
                <option value="En trámite">En trámite</option>
            </select>
        </div>
    </fieldset>
	
    <div class="form-group text-left">
        <div class="checkbox">
            <label>
                <legend><input type="checkbox" name="publised" v-model="form.published" true-value="1" false-value="0"> Publicar</legend>
            </label>
        </div>
    </div>

    <div class="form-group" v-if="reference.is_sale == '1'">
        <!--<label for="certificado_energetico">Estado</label>-->
		<legend>Estado</legend>
        <select name="estado_inmueble" v-model="form.inmueblestate" id="estado_inmueble" class="form-control" @change="onEstadoChange(this.value)">
            <option value="" selected>En oculto</option>
			<option value="Disponible">Disponible</option>
            <option value="Reservado">Reservado</option>
            <option value="Vendido">Vendido</option>
			<option value="Registro">Registro</option>
        </select>
    </div>

    <div class="form-group" v-if="reference.is_sale == '0'">
        <!--<label for="certificado_energetico">Estado</label>-->
		<legend>Estado</legend>
        <select name="estado_inmueble" v-model="form.inmueblestate" id="estado_inmueble" class="form-control" @change="onEstadoChange(this.value)">
            <option value="" selected>En oculto</option>
			<option value="Disponible">Disponible</option>
            <option value="Reservado">Reservado</option>
            <option value="Alquilado">Alquilado</option>
			<option value="Registro">Registro</option>			
        </select>
    </div>
    
    <!--<div class="form-group" v-if="reference.is_sale == '0' && estadoInmueble === 'Disponible'">-->
		<div class="form-group" v-if="estadoInmueble === 'Disponible'">
        
        <div class="checkbox" v-if="!reference.email_enviado">
            <label>
                
                    <input type="checkbox" name="enviar_correo" true-value="1" false-value="0" v-model="form.email_enviado"> 
                    Enviar correo al propietario
                
            </label>
        </div>
        <div v-if="form.email_enviado && form.email_enviado.length > 1">
            <label style="color:red;">@{{form.email_enviado}}</label>
        </div>
        
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">ACTUALIZAR</button>
    </div>


    

</form>