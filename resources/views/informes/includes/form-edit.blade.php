<form v-on:submit.prevent="onSubmit">
    
    {{-- Puertas --}}
    <fieldset>
        <legend><b>Puerta</b></legend>
        <div class="form-group">
            <label class="radio-inline">
                <input type="radio" v-model="form.door.type" value="1">Blindada
            </label>
            <label class="radio-inline">
                <input type="radio" v-model="form.door.type" value="0">No es blindada
            </label>
        </div>
        <div class="form-group">
            <div class="table-responsive">
                <table class="table table-hover">
                    <!--<thead>
                        <tr>
                            <th>#</th>
                            <th>Fotos</th>
                        </tr>
                    </thead>-->
                    <tbody>
                        <tr v-if="!form.door.files.length">
                            <td colspan="6">
                                <div class="text-center p-5">
                                    <h4>Listado de fotos</h4>
                                </div>
                            </td>
                        </tr>
                        <tr v-for="(file, index) in form.door.files" :key="file.id">
                            <td>@{{(index + 1)}}</td>
                            <td>
                                <img v-if="file.blob" :src="file.blob" width="40" height="auto" />
                                <span v-else>No Image</span>
                            </td>
                            <td>
                                <div class="filename">@{{file.name}}</div>
                                <div class="progress" v-if="file.active || file.progress !== '0.00'">
                                    <div :class="{'progress-bar': true, 'progress-bar-striped': true, 'bg-danger': file.error, 'progress-bar-animated': file.active}"
                                        role="progressbar" :style="{width: file.progress + '%'}">@{{file.progress}}%
                                    </div>
                                </div>
                            </td>
                            <td>@{{file.size}}</td>
                            <td v-if="file.error">@{{file.error}}</td>
                            <td v-else-if="file.success">success</td>
                            <td v-else-if="file.active">active</td>
                            <td v-else></td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-danger btn-sm dropdown-toggle" type="button" @click.prevent="removeFile(form.door.files, index, file.id)">Eliminar</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <label class="btn btn-info btn-xs btn-block">
                <file-upload v-model="form.door.files" accept="image/jpg,image/jpeg" accept="image/jpg,image/jpeg" :multiple="true" @input-filter="inputFilter"></file-upload>
                <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
            </label>
        </div>
    </fieldset>
    {{-- Recibidor --}}
    <fieldset>
        <legend><b>Recibidor</b></legend>
        <div class="row">
            <div class="col-xs-12">
                <div class="form-group"  style="display: none;">
                    <label for="size">Tamaño aproximado:</label>
                    <input type="text" maxlength="6" v-model="form.receiver.size" class="form-control" placeholder="Mts">
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="sideboard">Aparador:</label>
                    <input type="checkbox" v-model="form.receiver.sideboard" value="1"> Si
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="closet">Armario:</label>
                    <select v-model="form.receiver.type" class="form-control">
                        <option></option>
                        <option>Empotrado</option>
                        <option>Normal</option>
                    </select>
                </div>
                <div class="form-group"  v-if="form.receiver.type != ''">
                    <label for="brand-new">Número puertas del armario:</label>
                    <select class="form-control" v-model="form.receiver.closet">
                        <option></option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>+10</option>
                    </select>
                </div>
            </div>
           <!-- <div class="col-xs-12">
                <div class="form-group">
                    <label for="storage">Almacenamiento:</label>
                    <input type="checkbox" v-model="form.receiver.storage" value="1"> Si
                </div>
            </div>-->
           <!-- <div class="col-xs-12" v-if="form.isSale == '0'">
                <div class="form-group">
                    <label for="sideboard">¿Se pueden sacar algunos muebles?</label>
                    <label class="radio-inline">
                        <input type="radio" v-model="form.receiver.take" value="1">Si
                    </label>
                    <label class="radio-inline">
                        <input type="radio" v-model="form.receiver.take" value="0">No
                    </label>
                </div>
            </div>
        </div>-->
        <div class="row">
            <!--<div class="col-md-6">-->
			<div class="col-xs-12">
                <div class="form-group">
                    <div class="table-responsive">
                        <table class="table table-hover">
                           <!-- <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Fotos</th>
                                </tr>
                            </thead>-->
                            <tbody>
                                <tr v-if="!form.receiver.files.length">
                                    <td colspan="6">
                                        <div class="text-center p-5">
                                            <h4>Listado de fotos</h4>
                                        </div>
                                    </td>
                                </tr>
                                <tr v-for="(file, index) in form.receiver.files" :key="file.id">
                                    <td>@{{(index + 1)}}</td>
                                    <td>
                                        <img v-if="file.blob" :src="file.blob" width="40" height="auto" />
                                        <span v-else>No Image</span>
                                    </td>
                                    <td>
                                        <div class="filename">@{{file.name}}</div>
                                        <div class="progress" v-if="file.active || file.progress !== '0.00'">
                                            <div :class="{'progress-bar': true, 'progress-bar-striped': true, 'bg-danger': file.error, 'progress-bar-animated': file.active}"
                                                role="progressbar" :style="{width: file.progress + '%'}">
                                                @{{file.progress}}%</div>
                                        </div>
                                    </td>
                                    <td>@{{file.size}}</td>
                                    <td v-if="file.error">@{{file.error}}</td>
                                    <td v-else-if="file.success">success</td>
                                    <td v-else-if="file.active">active</td>
                                    <td v-else></td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-danger btn-sm dropdown-toggle" type="button"
                                                @click.prevent="removeFile(form.receiver.files, index, file.id)">Eliminar</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <label class="btn btn-info btn-xs btn-block">
                            <file-upload v-model="form.receiver.files" accept="image/jpg,image/jpeg" accept="image/jpg,image/jpeg"
                                :multiple="true" @input-filter="inputFilter"></file-upload><span
                                class="glyphicon glyphicon-search" aria-hidden="true"></span>
                        </label>    
                    </div>
                </div>
            </div>
          <!--  <div class="col-md-6">
                <div class="form-group">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nota Adicional video</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="!form.receiver.videos.length">
                                    <td colspan="6">
                                        <div class="text-center p-5">
                                            <h4>Listado de videos</h4>
                                        </div>
                                    </td>
                                </tr>
                                <tr v-for="(file, index) in form.receiver.videos" :key="file.id">
                                    <td>@{{(index + 1)}}</td>
                                    <td>
                                        {{-- <img v-if="file.blob" :src="file.blob" width="40" height="auto" /> --}}
                                        <video v-if="file.blob" width="40" height="auto" controls>
                                            <source :src="file.blob"></video>
                                        <span v-else>No Video</span>
                                    </td>
                                    <td>
                                        <div class="filename">@{{file.name}}</div>
                                        <div class="progress" v-if="file.active || file.progress !== '0.00'">
                                            <div :class="{'progress-bar': true, 'progress-bar-striped': true, 'bg-danger': file.error, 'progress-bar-animated': file.active}"
                                                role="progressbar" :style="{width: file.progress + '%'}">
                                                @{{file.progress}}%</div>
                                        </div>
                                    </td>
                                    <td>@{{file.size}}</td>
                                    <td v-if="file.error">@{{file.error}}</td>
                                    <td v-else-if="file.success">success</td>
                                    <td v-else-if="file.active">active</td>
                                    <td v-else></td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-danger btn-sm dropdown-toggle" type="button"
                                                @click.prevent="removeFile(form.receiver.videos, index, file.id)">Eliminar</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <label class="btn btn-danger btn-xs btn-block">
                        <file-upload v-model="form.receiver.videos" accept="video/*" accept="video/*"
                            :multiple="true" @input-filter="inputFilter"></file-upload><span
                            class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    </label>
                </div>
            </div>-->
        </div>
    </fieldset> 
    {{-- Salon --}}
    <fieldset v-for="(salon, index) in form.salons" :key="'salons-' + index">
        <legend>
            <b>Salón</b> 
            <span>@{{form.salons.length > 1 ? `#${index+1}` : null}}</span>
            <span style="margin-left: 1rem;">
                <button class="btn btn-link no-padding"
                    v-on:click.stop.prevent="add('salons')"
                    :disabled="form.salons.length == 10">
                    <span class="glyphicon glyphicon-plus"></span>
                </button>
                <button class="btn btn-link no-padding" 
                        v-on:click.stop.prevent="remove('salons', index)"
                        :disabled="form.salons.length == 1">
                    <span class="glyphicon glyphicon-minus"></span>
                </button>
            </span>
        </legend>

        <div class="fields">
            <div class="form-group" style="display: none;">
                <label for="size">Tamaño aproximado:</label>
                <input type="text" maxlength="6" v-model="salon.size" class="form-control" placeholder="Mts">
            </div>
            {{-- <div class="form-group">
                <label for="furniture">Muebles:</label>
                <select v-model="salon.furniture.pieceOfFurniture" class="form-control" title="Muebles..." multiple>
                    <option></option>
                    <option>Sofá</option>
                    <option>Sofá cama</option>
                    <option>TV</option>
                    <option>Mesa de comedor</option>
                </select>
            </div> --}}
            <div class="form-group">
                <label for="window">Ventana:</label>
                <select class="form-control" v-model="salon.windoww">
                    <option></option>
                    <option>Ext</option>
                    <option>Int</option>
                </select>
            </div>
            <div class="form-group">
                <label for="air">De Climalit</label>
                <input type="checkbox" v-model="salon.dclimalit" value="1"> Si
            </div>			
            <div class="form-group">
                <label for="orientation">Orientación:</label>
                <select class="form-control" v-model="salon.orientation">
                    <option></option>
                    <option>Norte</option>
                    <option>Sur</option>
                    <option>Este</option>
                    <option>Oeste</option>
                    <option>Sureste</option>
                    <option>Noreste</option>
                    <option>Noroeste</option>
                    <option>Suroeste</option>
                </select>
            </div>
           <!-- <div class="form-group">
                <label for="orientation">Tipo de ventana:</label>
                <select class="form-control" v-model="salon.typeOfWindow.windoww">
                    <option></option>
                    <option>Madera</option>
                    <option>PVC</option>
                    <option>Aluminio</option>
					<option>Metal con rotura de puente térmico</option>
                </select>
            </div>
            <div class="form-group"  v-if="salon.typeOfWindow.windoww != ''">
                <label for="brand-new">A estrenar:</label>
                <input type="checkbox" v-model="salon.typeOfWindow.brandNew" value="1"> Si
            </div>
            <div class="form-group" v-if="salon.typeOfWindow.windoww != ''">
                <label for="brand-new">Cambiada hace:</label>
                <div class="row">
                    <div class="col-md-6">
                        <label for="brand-new">Año/s:</label>
                        <select class="form-control" v-model="salon.typeOfWindow.changed.year">
                            <option></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>+10</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="brand-new">Mes/es:</label>
                        <select class="form-control" v-model="salon.typeOfWindow.changed.month">
                            <option></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>+10</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group" v-if="salon.typeOfWindow.windoww != ''">
                <label for="brand-new">Puesta hace:</label>
                <div class="row">
                    <div class="col-md-6">
                        <label for="brand-new">Año/s:</label>
                        <select class="form-control" v-model="salon.typeOfWindow.putting.year">
                            <option></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>+10</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="brand-new">Mes/es:</label>
                        <select class="form-control" v-model="salon.typeOfWindow.putting.month">
                            <option></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>+10</option>
                        </select>
                    </div>
                </div>
            </div>-->

            <!--<div class="form-group">
                <label>Pintura:</label>
            </div>-->
            <!--<div class="form-group">
                <label for="brand-new">Pintura Estado:</label>
                        <select class="form-control" v-model="salon.painting">
							<option value=""></option>
							<option value="1">Recién pintado</option>
							<option value="2">En buen estado</option>
                        </select>				
            </div>-->
           <!-- <div class="form-group">
                <label for="brand-new">Pintado hace:</label>
                <div class="row">
                    <div class="col-md-6">
                        <label for="brand-new">Año/s:</label>
                        <select class="form-control" v-model="salon.paints.justPainted.year">
                            <option></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>+10</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="brand-new">Mes/es:</label>
                        <select class="form-control" v-model="salon.paints.justPainted.month">
                            <option></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>+10</option>
                        </select>
                    </div>
                </div>
            </div>-->
            <!--<div class="form-group" style="display: none;">
                <label for="window">Pared:</label>
                <select class="form-control" v-model="salon.wall">
                    <option></option>
                    <option>Gotelé</option>
                    <option>Lisa</option>
                </select>
            </div>-->
            <div class="form-group" style="display: none;">
                <label for="window">Tipo de suelo:</label>
                <select class="form-control" v-model="salon.typeOfSoil.type">
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
            <div class="form-group" v-if="salon.typeOfSoil.type != ''">
				<label for="brand-new">Estado del suelo:</label>
                <!--<label for="brand-new">A estrenar:</label>-->
                <!--<input type="checkbox" v-model="salon.typeOfSoil.brandNew" value="1"> Si-->
                <select class="form-control" v-model="salon.typeOfSoil.brandNew">
					<option value=""></option>
					<option value="1">A estrenar</option>
					<option value="2">En buen estado</option>
					<option value="3">Recién cambiado</option>
                </select>				
            </div>
            <!--<div class="form-group" v-if="salon.typeOfSoil.type != ''">
                <label for="brand-new">Cambiado hace:</label>
                <div class="row">
                    <div class="col-md-6">
                        <label for="brand-new">Año/s:</label>
                        <select class="form-control" v-model="salon.typeOfSoil.changed.year">
                            <option></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>+10</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="brand-new">Mes/es:</label>
                        <select class="form-control" v-model="salon.typeOfSoil.changed.month">
                            <option></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>+10</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group" v-if="salon.typeOfSoil.type != ''">
                <label for="brand-new">Puesta hace:</label>
                <div class="row">
                    <div class="col-md-6">
                        <label for="brand-new">Año/s:</label>
                        <select class="form-control" v-model="salon.typeOfSoil.putting.year">
                            <option></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>+10</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="brand-new">Mes/es:</label>
                        <select class="form-control" v-model="salon.typeOfSoil.putting.month">
                            <option></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>+10</option>
                        </select>
                    </div>
                </div>
            </div>-->
            <div class="form-group">
                <label for="window">Con balcón - M2 aprox:</label>
                <input type="text" v-model="salon.balcony" maxlength="6" class="form-control" placeholder="Mts">
            </div>
            <div class="form-group">
                <label for="window">Con terraza - M2 aprox:</label>
                <input type="text" v-model="salon.terrace" maxlength="6" class="form-control" placeholder="Mts">
            </div>
		      <div class="form-group" v-if="form.isSale == '0'">
                <label for="window">Salón equipado con:</label>
                <div class="col-md-12">
                    <label for="window">Sofa:</label>
                    <input type="checkbox" v-model="salon.muebles.sofa" value="1"> Si
                </div>
                <div class="col-md-12">
                    <label for="window">Sofa Cama:</label>
                    <input type="checkbox" v-model="salon.muebles.sofa_cama" value="1"> Si
                </div>
                <div class="col-md-12">
                    <label for="window">T.V.:</label>
                    <input type="checkbox" v-model="salon.muebles.tv" value="1"> Si
                </div>
                <div class="col-md-12">
                    <label for="window">Mesa comedor:</label>
                    <input type="checkbox" v-model="salon.muebles.mesa_comedor" value="1"> Si
                </div>
			</div> 			
            <div class="form-group">
                <label for="air">Aire acondicionado:</label>
                <input type="checkbox" v-model="salon.airConditioner" value="1"> Si
            </div>
           <!-- <div class="form-group" v-if="form.isSale == '0'">
                <label for="sideboard">¿Se pueden sacar algunos muebles?</label>
                <label class="radio-inline">
                    <input type="radio" v-model="salon.take" value="1"> Si
                </label>
                <label class="radio-inline">
                    <input type="radio" v-model="salon.take" value="0"> No
                </label>
            </div>-->
            <div class="row">
                <!--<div class="col-md-6">-->
				<div class="col-xs-12">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <!--<thead>
                                <tr>
                                    <th>#</th>
                                    <th>Fotos</th>
                                    {{--  <th>Nombre</th>
                                            <th>Tamaño aproximado</th>
                                            <th>Estado</th>
                                            <th>Acción</th> --}}
                                </tr>
                            </thead>-->
                            <tbody>
                                <tr v-if="!salon.files.length">
                                    <td colspan="6">
                                        <div class="text-center p-5">
                                            <h4>Listado de fotos</h4>
                                        </div>
                                    </td>
                                </tr>
                                <tr v-for="(file, index) in salon.files" :key="file.id">
                                    <td>@{{(index + 1)}}</td>
                                    <td>
                                        <img v-if="file.blob" :src="file.blob" width="40" height="auto" />
                                        <span v-else>No Image</span>
                                    </td>
                                    <td>
                                        <div class="filename">@{{file.name}}</div>
                                        <div class="progress" v-if="file.active || file.progress !== '0.00'">
                                            <div :class="{'progress-bar': true, 'progress-bar-striped': true, 'bg-danger': file.error, 'progress-bar-animated': file.active}"
                                                role="progressbar" :style="{width: file.progress + '%'}">
                                                @{{file.progress}}%</div>
                                        </div>
                                    </td>
                                    <td>@{{file.size}}</td>
                                    <td v-if="file.error">@{{file.error}}</td>
                                    <td v-else-if="file.success">success</td>
                                    <td v-else-if="file.active">active</td>
                                    <td v-else></td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-danger btn-sm dropdown-toggle" type="button"
                                                @click.prevent="removeFile(salon.files, index, file.id)">Eliminar</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <label class="btn btn-info btn-xs btn-block">
                        <file-upload v-model="salon.files" accept="image/jpg,image/jpeg" accept="image/jpg,image/jpeg" :multiple="true"
                            @input-filter="inputFilter"></file-upload><span class="glyphicon glyphicon-search"
                            aria-hidden="true"></span>
                    </label>
                </div>
               <!-- <div class="col-md-6">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nota Adicional video</th>
                                    {{--   <th>Nombre</th>
                                            <th>Tamaño aproximado</th>
                                            <th>Estado</th>
                                            <th>Acción</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="!salon.videos.length">
                                    <td colspan="6">
                                        <div class="text-center p-5">
                                            <h4>Listado de videos</h4>
                                        </div>
                                    </td>
                                </tr>
                                <tr v-for="(file, index) in salon.videos" :key="file.id">
                                    <td>@{{(index + 1)}}</td>
                                    <td>
                                        {{-- <img v-if="file.blob" :src="file.blob" width="40" height="auto" /> --}}
                                        <video v-if="file.blob" width="40" height="auto" controls>
                                            <source :src="file.blob"></video>
                                        <span v-else>No Video</span>
                                    </td>
                                    <td>
                                        <div class="filename">@{{file.name}}</div>
                                        <div class="progress" v-if="file.active || file.progress !== '0.00'">
                                            <div :class="{'progress-bar': true, 'progress-bar-striped': true, 'bg-danger': file.error, 'progress-bar-animated': file.active}"
                                                role="progressbar" :style="{width: file.progress + '%'}">
                                                @{{file.progress}}%</div>
                                        </div>
                                    </td>
                                    <td>@{{file.size}}</td>
                                    <td v-if="file.error">@{{file.error}}</td>
                                    <td v-else-if="file.success">success</td>
                                    <td v-else-if="file.active">active</td>
                                    <td v-else></td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-danger btn-sm dropdown-toggle" type="button"
                                                @click.prevent="removeFile(salon.videos, index, file.id)">Eliminar</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <label class="btn btn-danger btn-xs btn-block">
                        <file-upload v-model="salon.videos" accept="video/*" accept="video/*" :multiple="true"
                            @input-filter="inputFilter"></file-upload><span class="glyphicon glyphicon-search"
                            aria-hidden="true"></span>
                    </label>
                </div>
            </div>-->
        </div>
    </fieldset>
    {{-- Cocina --}}
    <fieldset v-for="(kitchen, index) in form.kitchens" :key="'kitchens-' + index">
        <legend>
            <b>Cocina</b>
            <span>@{{form.kitchens.length > 1 ? `#${index+1}` : null}}</span>
            <button class="btn btn-link no-padding" v-on:click.stop.prevent="add('kitchens')"
                :disabled="form.kitchens.length == 10"><span class="glyphicon glyphicon-plus"></span></button>
            <button class="btn btn-link no-padding" v-on:click.stop.prevent="remove('kitchens', index)"
                :disabled="form.kitchens.length == 1"><span class="glyphicon glyphicon-minus"></span></button>
        </legend>
        <div class="fields">
            <div class="form-group" style="display: none;">
                <label for="size">Tamaño aproximado:</label>
                <input type="text" maxlength="6" v-model="kitchen.size" class="form-control" placeholder="Mts">
            </div>
            <div class="form-group">
                <label for="closet">Estado:</label>
                <select class="form-control" v-model="kitchen.state.state">
                    <option></option>
                    <option>A estrenar</option>
                    <option>En buen estado</option>
                    <option>Recién reformada</option>					
                    <!--<option>Obra nueva</option>
                    <option>No ha sido reformada</option>
                    <option>Reformada a estrenar</option>
                    <option>Reformada hace</option>-->
                </select>
            </div>
            <div class="form-group" v-if="kitchen.state.state == 'Reformada hace'">
                <label for="brand-new">Reformada hace:</label>
                <div class="row">
                    <div class="col-md-6">
                        <label for="brand-new">Año/s:</label>
                        <select class="form-control" v-model="kitchen.state.reformedAgo.year">
                            <option></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>+10</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="brand-new">Mes/es:</label>
                        <select class="form-control" v-model="kitchen.state.reformedAgo.month">
                            <option></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>+10</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="size">Tipo de cocina:</label>
                <select class="form-control" v-model="kitchen.typeOfKitchen">
                    <option></option>
                    <option>Independiente</option>
                    <option>Americana</option>
                    <option>Francesa</option>
					<option>Office</option>
                </select>
            </div>
            <div class="form-group">
                <label for="window">Ventana:</label>
                <select class="form-control" v-model="kitchen.windoww">
                    <option></option>
                    <option>Ext</option>
                    <option>Int</option>
                </select>
            </div>
           <!-- <div class="form-group">
                <label for="orientation">Tipo de ventana:</label>
                <select class="form-control" v-model="kitchen.typeOfWindow.windoww">
                    <option></option>
                    <option>Madera</option>
                    <option>PVC</option>
                    <option>Aluminio</option>
					<option>Metal con rotura de puente térmico</option>
                </select>
            </div>
            <div class="form-group" v-if="kitchen.typeOfWindow.windoww != ''" >
                <label for="brand-new">A estrenar:</label>
                <input type="checkbox" v-model="kitchen.typeOfWindow.brandNew" value="1"> Si
            </div>
            <div class="form-group" v-if="kitchen.typeOfWindow.windoww != ''" >
                <label for="brand-new">Cambiado hace:</label>
                <div class="row">
                    <div class="col-md-6">
                        <label for="brand-new">Año/s:</label>
                        <select class="form-control" v-model="kitchen.typeOfWindow.changed.year">
                            <option></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>+10</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="brand-new">Mes/es:</label>
                        <select class="form-control" v-model="kitchen.typeOfWindow.changed.month">
                            <option></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>+10</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group" v-if="kitchen.typeOfWindow.windoww != ''" >
                <label for="brand-new">Puesta hace:</label>
                <div class="row">
                    <div class="col-md-6">
                        <label for="brand-new">Año/s:</label>
                        <select class="form-control" v-model="kitchen.typeOfWindow.putting.year">
                            <option></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>+10</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="brand-new">Mes/es:</label>
                        <select class="form-control" v-model="kitchen.typeOfWindow.putting.month">
                            <option></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>+10</option>
                        </select>
                    </div>
                </div>
            </div>-->
            <div class="form-group">
                <label for="air">De Climalit</label>
                <input type="checkbox" v-model="kitchen.dclimalit" value="1"> Si
            </div>
            <div class="form-group">
                <label for="window">Con balcón - M2 aprox:</label>
                <input type="text" class="form-control" maxlength="6" v-model="kitchen.balcony" placeholder="Mts">
            </div>
            <div class="form-group">
                <label for="window">Con terraza - M2 aprox:</label>
                <input type="text" class="form-control" maxlength="6" v-model="kitchen.terrace" placeholder="Mts">
            </div>
            <div class="form-group">
                <label for="window">Cocina equipada con:</label>
                <div class="col-md-12">
                    <label for="window">Extractor:</label>
                    <input type="checkbox" v-model="kitchen.luggage.extractor" value="1"> Si
                </div>
                <div class="col-md-12">
                    <label for="window">Microondas:</label>
                    <input type="checkbox" v-model="kitchen.luggage.microwaveOven" value="1"> Si
                </div>
                <div class="col-md-12">
                    <label for="window">Horno:</label>
                    <input type="checkbox" v-model="kitchen.luggage.oven" value="1"> Si
                </div>
                <div class="col-md-12">
                    <label for="window">Nevera:</label>
                    <input type="checkbox" v-model="kitchen.luggage.fridge" value="1"> Si
                </div>
                <div class="col-md-12">
                    <label for="window">Lavadora:</label>
                    <input type="checkbox" v-model="kitchen.luggage.washingMachine" value="1"> Si
                </div>
                <div class="col-md-12">
                    <label for="window">Secadora:</label>
                    <input type="checkbox" v-model="kitchen.luggage.dryer" value="1"> Si
                </div>
                <div class="col-md-12">
                    <label for="window">Lavadora-Secadora:</label>
                    <input type="checkbox" v-model="kitchen.luggage.washingDryer" value="1"> Si
                </div>				
                <div class="col-md-12">
                    <label for="window">Lavavajillas:</label>
                    <input type="checkbox" v-model="kitchen.luggage.dishwasher" value="1"> Si
                </div>
				<div class="col-md-12"  v-if="form.isSale == '0'">
                    <label for="window">Menaje y utensilios de cocina:</label>
                    <input type="checkbox" v-model="kitchen.luggage.menaje" value="1"> Si
                </div>
                <div class="col-md-12">
                    <label for="window">Lavadero:</label>
                    <input type="checkbox" v-model="kitchen.luggage.lavadero" value="1"> Si
                </div>				
            </div>
            <div class="form-group">
                <label for="window">Tipo de fuego:</label>
                <div class="col-md-12">
                    <label for="window">Vitroceramica:</label>
                    <input type="checkbox" v-model="kitchen.typeOfFire.vitroceramica" value="1"> Si
                </div>
                <div class="col-md-12">
                    <label for="window">Inducción:</label>
                    <input type="checkbox" v-model="kitchen.typeOfFire.induccion" value="1"> Si
                </div>				
                <div class="col-md-12">
                    <label for="window">Gas natural:</label>
                    <input type="checkbox" v-model="kitchen.typeOfFire.naturalGas" value="1"> Si
                </div>
                <div class="col-md-12">
                    <label for="window">Placa eléctrica:</label>
                    <input type="checkbox" v-model="kitchen.typeOfFire.electricPlate" value="1"> Si
                </div>
                <div class="col-md-12">
                    <label for="window">Bombona de gas:</label>
                    <input type="checkbox" v-model="kitchen.typeOfFire.dasCylinder" value="1"> Si
                </div>
            </div>
            <div class="form-group" style="display: none;">
                <label for="window">Tipo de suelo:</label>
                <select class="form-control" v-model="kitchen.typeOfSoil.type">
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
            <!--<div class="form-group" v-if="kitchen.typeOfSoil.type != ''">
                <label for="brand-new">A estrenar:</label>
                <input type="checkbox" v-model="kitchen.typeOfSoil.brandNew" value="1"> Si
            </div>-->
            <div class="form-group" v-if="kitchen.typeOfSoil.type != ''">
				<label for="brand-new">Estado del suelo:</label>
                <select class="form-control" v-model="kitchen.typeOfSoil.brandNew">
					<option value=""></option>
					<option value="1">A estrenar</option>
					<option value="2">En buen estado</option>
					<option value="3">Recién cambiado</option>
                </select>				
            </div>			
           <!-- <div class="form-group" v-if="kitchen.typeOfSoil.type != ''">
                <label for="brand-new">Cambiado hace:</label>
                <div class="row">
                    <div class="col-md-6">
                        <label for="brand-new">Año/s:</label>
                        <select class="form-control" v-model="kitchen.typeOfSoil.changed.year">
                            <option></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>+10</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="brand-new">Mes/es:</label>
                        <select class="form-control" v-model="kitchen.typeOfSoil.changed.month">
                            <option></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>+10</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group" v-if="kitchen.typeOfSoil.type != ''">
                <label for="brand-new">Puesta hace:</label>
                <div class="row">
                    <div class="col-md-6">
                        <label for="brand-new">Año/s:</label>
                        <select class="form-control" v-model="kitchen.typeOfSoil.putting.year">
                            <option></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>+10</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="brand-new">Mes/es:</label>
                        <select class="form-control" v-model="kitchen.typeOfSoil.putting.month">
                            <option></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>+10</option>
                        </select>
                    </div>
                </div>
            </div>-->
            <!--<div class="form-group" v-if="form.isSale == '0'">
                <label for="sideboard">¿Se pueden sacar algunos muebles?</label>
                <label class="radio-inline">
                    <input type="radio" v-model="kitchen.take" value="1"> Si
                </label>
                <label class="radio-inline">
                    <input type="radio" v-model="kitchen.take" value="0"> No
                </label>
            </div>-->
            <div class="row">
                <!--<div class="col-md-6">-->
				<div class="col-xs-12">
                    <div class="table-responsive">
                        <table class="table table-hover">
                          <!--  <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Fotos</th>
                                    {{--  <th>Nombre</th>
                                            <th>Tamaño aproximado</th>
                                            <th>Estado</th>
                                            <th>Acción</th> --}}
                                </tr>
                            </thead>-->
                            <tbody>
                                <tr v-if="!kitchen.files.length">
                                    <td colspan="6">
                                        <div class="text-center p-5">
                                            <h4>Listado de fotos</h4>
                                        </div>
                                    </td>
                                </tr>
                                <tr v-for="(file, index) in kitchen.files" :key="file.id">
                                    <td>@{{(index + 1)}}</td>
                                    <td>
                                        <img v-if="file.blob" :src="file.blob" width="40" height="auto" />
                                        <span v-else>No Image</span>
                                    </td>
                                    <td>
                                        <div class="filename">@{{file.name}}</div>
                                        <div class="progress" v-if="file.active || file.progress !== '0.00'">
                                            <div :class="{'progress-bar': true, 'progress-bar-striped': true, 'bg-danger': file.error, 'progress-bar-animated': file.active}"
                                                role="progressbar" :style="{width: file.progress + '%'}">
                                                @{{file.progress}}%</div>
                                        </div>
                                    </td>
                                    <td>@{{file.size}}</td>
                                    <td v-if="file.error">@{{file.error}}</td>
                                    <td v-else-if="file.success">success</td>
                                    <td v-else-if="file.active">active</td>
                                    <td v-else></td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-danger btn-sm dropdown-toggle" type="button"
                                                @click.prevent="removeFile(kitchen.files, index, file.id)">Eliminar</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <label class="btn btn-info btn-xs btn-block">
                        <file-upload v-model="kitchen.files" accept="image/jpg,image/jpeg" :multiple="true"
                            @input-filter="inputFilter"></file-upload><span class="glyphicon glyphicon-search"
                            aria-hidden="true"></span>
                    </label>
                </div>
               <!-- <div class="col-md-6">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nota Adicional video</th>
                                    {{--  <th>Nombre</th>
                                            <th>Tamaño aproximado</th>
                                            <th>Estado</th>
                                            <th>Acción</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="!kitchen.videos.length">
                                    <td colspan="6">
                                        <div class="text-center p-5">
                                            <h4>Listado de videos</h4>
                                        </div>
                                    </td>
                                </tr>
                                <tr v-for="(file, index) in kitchen.videos" :key="file.id">
                                    <td>@{{(index + 1)}}</td>
                                    <td>
                                        {{-- <img v-if="file.blob" :src="file.blob" width="40" height="auto" /> --}}
                                        <video v-if="file.blob" width="40" height="auto" controls>
                                            <source :src="file.blob"></video>
                                        <span v-else>No Video</span>
                                    </td>
                                    <td>
                                        <div class="filename">@{{file.name}}</div>
                                        <div class="progress" v-if="file.active || file.progress !== '0.00'">
                                            <div :class="{'progress-bar': true, 'progress-bar-striped': true, 'bg-danger': file.error, 'progress-bar-animated': file.active}"
                                                role="progressbar" :style="{width: file.progress + '%'}">
                                                @{{file.progress}}%</div>
                                        </div>
                                    </td>
                                    <td>@{{file.size}}</td>
                                    <td v-if="file.error">@{{file.error}}</td>
                                    <td v-else-if="file.success">success</td>
                                    <td v-else-if="file.active">active</td>
                                    <td v-else></td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-danger btn-sm dropdown-toggle" type="button"
                                                @click.prevent="removeFile(kitchen.videos, index, file.id)">Eliminar</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <label class="btn btn-danger btn-xs btn-block">
                        <file-upload v-model="kitchen.videos" accept="video/*" :multiple="true"
                            @input-filter="inputFilter"></file-upload><span class="glyphicon glyphicon-search"
                            aria-hidden="true"></span>
                    </label>
                </div>
            </div>-->
        </div>
    </fieldset>
    {{-- Dormitorio --}}
    <fieldset v-for="(bedroom, index) in form.bedrooms" :key="'bedrooms-' + index">
        <legend>
            <b v-if="form.tipo_inmueble == 'Local/Oficina'">Estancia</b>
			<b v-else>Dormitorio</b>
            <span>@{{form.bedrooms.length > 1 ? `#${index+1}` : null}}</span>
            <button class="btn btn-link no-padding" v-on:click.stop.prevent="add('bedrooms')"
                :disabled="form.bedrooms.length == 10"><span class="glyphicon glyphicon-plus"></span></button>
            <button class="btn btn-link no-padding" v-on:click.stop.prevent="remove('bedrooms', index)"
                :disabled="form.bedrooms.length == 1"><span class="glyphicon glyphicon-minus"></span></button>
        </legend>

        <div class="fields">
            <div class="form-group"  style="display: none;">
                <label for="size">Tamaño aproximado:</label>
                <input type="number" min="0" max="1000" value="0" class="form-control" v-model="bedroom.size" placeholder="Mts">
            </div>
            <div class="form-group" v-if="form.isSale == '0'">
                <label for="window">Tipo de cama:</label>
                <select class="form-control" v-model="bedroom.typeBed">
                    <option></option>
                    <option>Individual</option>
                    <option>2 Individuales</option>
                    <option>Mediana</option>
                    <option>Matrimonio</option>
                    <option>King</option>
                </select>
            </div>
            <div class="form-group"   v-if="form.isSale == '0'">
                <label for="brand-new">Con canapé bajo la cama:</label>
                <input type="checkbox" v-model="bedroom.canape" value="1"> Si
            </div>			
            <div class="form-group">
                <label for="closet">Armarios:</label>
                <select class="form-control" v-model="bedroom.closet">
                    <option></option>
                    <option>Empotrado</option>
                    <option>Normal</option>
                </select>
            </div>
            <div class="form-group" v-if="bedroom.closet != ''">
                <label for="brand-new">Número puertas del armario:</label>
                <select class="form-control" v-model="bedroom.doors">
                    <option></option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <option>+10</option>
                </select>
            </div>
            <div class="form-group">
                <label for="window">Ventana:</label>
                <select class="form-control" v-model="bedroom.windoww">
                    <option></option>
                    <option>Ext</option>
                    <option>Int</option>
                </select>
            </div>
            <div class="form-group">
                <label for="air">De Climalit</label>
                <input type="checkbox" v-model="bedroom.dclimalit" value="1"> Si
            </div>			
            <div class="form-group">
                <label for="orientation">Orientación:</label>
                <select class="form-control" v-model="bedroom.orientation">
                    <option></option>
                    <option>Norte</option>
                    <option>Sur</option>
                    <option>Este</option>
                    <option>Oeste</option>
                    <option>Sureste</option>
                    <option>Noreste</option>
                    <option>Noroeste</option>
                    <option>Suroeste</option>
                </select>
            </div>
            <!--<div class="form-group">
                <label for="orientation">Tipo de ventana:</label>
                <select class="form-control" v-model="bedroom.typeOfWindowwindoww">
                    <option></option>
                    <option>Madera</option>
                    <option>PVC</option>
                    <option>Aluminio</option>
					<option>Metal con rotura de puente térmico</option>
                </select>
            </div>
            <div class="form-group"  v-if="bedroom.typeOfWindowwindoww != ''">
                <label for="brand-new">A estrenar:</label>
                <input type="checkbox" v-model="bedroom.typeOfWindowbrandNew" value="1"> Si
            </div>
            <div class="form-group"  v-if="bedroom.typeOfWindowwindoww != ''">
                <label for="brand-new">Cambiada hace:</label>
                <div class="row">
                    <div class="col-md-6">
                        <label for="brand-new">Año/s:</label>
                        <select class="form-control" v-model="bedroom.typeOfWindowchangedyear">
                            <option></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>+10</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="brand-new">Mes/es:</label>
                        <select class="form-control" v-model="bedroom.typeOfWindowchangedmonth">
                            <option></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>+10</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group"  v-if="bedroom.typeOfWindowwindoww != ''">
                <label for="brand-new">Puesta hace:</label>
                <div class="row">
                    <div class="col-md-6">
                        <label for="brand-new">Año/s:</label>
                        <select class="form-control" v-model="bedroom.typeOfWindowputtingyear">
                            <option></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>+10</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="brand-new">Mes/es:</label>
                        <select class="form-control" v-model="bedroom.typeOfWindowputtingmonth">
                            <option></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>+10</option>
                        </select>
                    </div>
                </div>
            </div>-->

            <div class="form-group">
                <label for="window">Con balcón - M2 aprox:</label>
                <input type="text" class="form-control" maxlength="6" v-model="bedroom.balcony" placeholder="Mts">
            </div>
            <div class="form-group">
                <label for="window">Con terraza - M2 aprox:</label>
                <input type="text" class="form-control" maxlength="6" v-model="bedroom.terrace" placeholder="Mts">
            </div>
		    <div class="form-group" v-if="form.isSale == '0'">
                <label for="window">Dormitorio equipado con:</label>
                <div class="col-md-12">
                    <label for="window">Sofa:</label>
                    <input type="checkbox" v-model="bedroom.sofa" value="1"> Si
                </div>
                <div class="col-md-12">
                    <label for="window">Sofa Cama:</label>
                    <input type="checkbox" v-model="bedroom.sofa_cama" value="1"> Si
                </div>
                <div class="col-md-12">
                    <label for="window">T.V.:</label>
                    <input type="checkbox" v-model="bedroom.tv" value="1"> Si
                </div>
               <!-- <div class="col-md-12">
                    <label for="window">Mesa comedor:</label>
                    <input type="checkbox" v-model="bedroom.mesa_comedor" value="1"> Si
                </div>-->
                <div class="col-md-12">
                    <label for="window">Escritorio:</label>
                    <input type="checkbox" v-model="bedroom.escritorio" value="1"> Si
                </div>				
                <div class="col-md-12">
                    <label for="window">Cómoda:</label>
                    <input type="checkbox" v-model="bedroom.comoda" value="1"> Si
                </div>								
			</div>			
            <div class="form-group">
                <label for="air">Aire acondicionado:</label>
                <input type="checkbox" v-model="bedroom.airConditioner" value="1"> Si
            </div>
            <!--<div class="form-group">
                <label>Pintura:</label>
            </div>-->
            <!--<div class="form-group">
                <label for="brand-new">Pintura Estado:</label>
               
                        <select class="form-control" v-model="bedroom.paintspaintedMakesyear">
							<option value=""></option>
							<option value="1">Recién pintado</option>
							<option value="2">En buen estado</option>
                        </select>				
            </div>-->			
            <!--<div class="form-group">
                <label for="brand-new">Pintado hace:</label>
                <div class="row">
                    <div class="col-md-6">
                        <label for="brand-new">Año/s:</label>
                        <select class="form-control" v-model="bedroom.paintsjustPaintedyear">
                            <option></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>+10</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="brand-new">Mes/es:</label>
                        <select class="form-control" v-model="bedroom.paintsjustPaintedmonth">
                            <option></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>+10</option>
                        </select>
                    </div>
                </div>
            </div>-->
            <!--<div class="form-group"  style="display: none;">
                <label for="window">Pared:</label>
                <select class="form-control" v-model="bedroom.wall">
                    <option></option>
                    <option>Gotelé</option>
                    <option>Lisa</option>
                </select>
            </div>-->
            <div class="form-group"  style="display: none;">
                <label for="window">Tipo de suelo:</label>
                <select class="form-control" v-model="bedroom.typeOfSoiltype">
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
           <!-- <div class="form-group" v-if="bedroom.typeOfSoiltype != ''">
                <label for="brand-new">A estrenar:</label>
                <input type="checkbox" v-model="bedroom.typeOfSoilbrandNew" value="1"> Si
            </div>-->
            <div class="form-group" v-if="bedroom.typeOfSoiltype != ''">
				<label for="brand-new">Estado del suelo:</label>
                <select class="form-control" v-model="bedroom.typeOfSoilbrandNew">
					<option value=""></option>
					<option value="1">A estrenar</option>
					<option value="2">En buen estado</option>
					<option value="3">Recién cambiado</option>
                </select>				
            </div>			
           <!-- <div class="form-group" v-if="bedroom.typeOfSoiltype != ''">
                <label for="brand-new">Cambiado hace:</label>
                <div class="row">
                    <div class="col-md-6">
                        <label for="brand-new">Año/s:</label>
                        <select class="form-control" v-model="bedroom.typeOfSoilchangedyear">
                            <option></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>+10</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="brand-new">Mes/es:</label>
                        <select class="form-control" v-model="bedroom.typeOfSoilchangedmonth">
                            <option></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>+10</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group" v-if="bedroom.typeOfSoiltype != ''">
                <label for="brand-new">Puesta hace:</label>
                <div class="row">
                    <div class="col-md-6">
                        <label for="brand-new">Año/s:</label>
                        <select class="form-control" v-model="bedroom.typeOfSoilputtingyear">
                            <option></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>+10</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="brand-new">Mes/es:</label>
                        <select class="form-control" v-model="bedroom.typeOfSoilputtingmonth">
                            <option></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>+10</option>
                        </select>
                    </div>
                </div>
            </div>-->
            <div class="form-group">
                <label for="air">( baño incorporado en el dormitorio)</label>
                <input type="checkbox" v-model="bedroom.suite" value="1"> Si
            </div>
          <!--  <div class="form-group" v-if="form.isSale == '0'">
                <label for="sideboard">¿Se pueden sacar algunos muebles?</label>
                <label class="radio-inline">
                    <input type="radio" v-model="bedroom.take" value="1"> Si
                </label>
                <label class="radio-inline">
                    <input type="radio" v-model="bedroom.take" value="0"> No
                </label>
            </div>-->
            
           <div class="form-group"   v-if="form.tipo_inmueble == 'Habitaciones'">
                <label for="window">Precio (Solo habitaciones):</label>
                <input type="number" min="0" max="10000" class="form-control" v-model="bedroom.precio" placeholder="NO TOCAR. Solo habitaciones">				
            </div>

            <div class="row">
                                <!--<div class="col-md-6">-->
				<div class="col-xs-12">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <!--<thead>
                                <tr>
                                    <th>#</th>
                                    <th>Fotos</th>
                                    {{-- <th>Nombre</th>
                                            <th>Tamaño aproximado</th>
                                            <th>Estado</th>
                                            <th>Acción</th> --}}
                                </tr>
                            </thead>-->
                            <tbody>
                                <tr v-if="!bedroom.files.length">
                                    <td colspan="6">
                                        <div class="text-center p-5">
                                            <h4>Listado de fotos</h4>
                                        </div>
                                    </td>
                                </tr>
                                <tr v-for="(file, index) in bedroom.files" :key="file.id">
                                    <td>@{{(index + 1)}}</td>
                                    <td>
                                        <img v-if="file.blob" :src="file.blob" width="40" height="auto" />
                                        <span v-else>No Image</span>
                                    </td>
                                    <td>
                                        <div class="filename">@{{file.name}}</div>
                                        <div class="progress" v-if="file.active || file.progress !== '0.00'">
                                            <div :class="{'progress-bar': true, 'progress-bar-striped': true, 'bg-danger': file.error, 'progress-bar-animated': file.active}"
                                                role="progressbar" :style="{width: file.progress + '%'}">
                                                @{{file.progress}}%</div>
                                        </div>
                                    </td>
                                    <td>@{{file.size}}</td>
                                    <td v-if="file.error">@{{file.error}}</td>
                                    <td v-else-if="file.success">success</td>
                                    <td v-else-if="file.active">active</td>
                                    <td v-else></td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-danger btn-sm dropdown-toggle" type="button"
                                                @click.prevent="removeFile(bedroom.files, index, file.id)">Eliminar</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <label class="btn btn-info btn-xs btn-block">
                        <file-upload v-model="bedroom.files" accept="image/jpg,image/jpeg" :multiple="true"
                            @input-filter="inputFilter"></file-upload><span class="glyphicon glyphicon-search"
                            aria-hidden="true"></span>
                    </label>
                </div>
               <!-- <div class="col-md-6">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nota Adicional video</th>
                                    {{--  <th>Nombre</th>
                                            <th>Tamaño aproximado</th>
                                            <th>Estado</th>
                                            <th>Acción</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="!bedroom.videos.length">
                                    <td colspan="6">
                                        <div class="text-center p-5">
                                            <h4>Listado de videos</h4>
                                        </div>
                                    </td>
                                </tr>
                                <tr v-for="(file, index) in bedroom.videos" :key="file.id">
                                    <td>@{{(index + 1)}}</td>
                                    <td>
                                        {{-- <img v-if="file.blob" :src="file.blob" width="40" height="auto" /> --}}
                                        <video v-if="file.blob" width="40" height="auto" controls>
                                            <source :src="file.blob"></video>
                                        <span v-else>No Video</span>
                                    </td>
                                    <td>
                                        <div class="filename">@{{file.name}}</div>
                                        <div class="progress" v-if="file.active || file.progress !== '0.00'">
                                            <div :class="{'progress-bar': true, 'progress-bar-striped': true, 'bg-danger': file.error, 'progress-bar-animated': file.active}"
                                                role="progressbar" :style="{width: file.progress + '%'}">
                                                @{{file.progress}}%</div>
                                        </div>
                                    </td>
                                    <td>@{{file.size}}</td>
                                    <td v-if="file.error">@{{file.error}}</td>
                                    <td v-else-if="file.success">success</td>
                                    <td v-else-if="file.active">active</td>
                                    <td v-else></td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-danger btn-sm dropdown-toggle" type="button"
                                                @click.prevent="removeFile(bedroom.videos, index, file.id)">Eliminar</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <label class="btn btn-danger btn-xs btn-block">
                        <file-upload v-model="bedroom.videos" accept="video/*" :multiple="true"
                            @input-filter="inputFilter"></file-upload><span class="glyphicon glyphicon-search"
                            aria-hidden="true"></span>
                    </label>
                </div>
            </div>-->
        </div>
        
    </fieldset>
    {{-- salon dormitorio --}}
    <fieldset v-for="(livingRoomBedroom, index) in form.livingRoomBedrooms" :key="'livingRoomBedrooms-' + index">
        <legend>
            <b>Salón - Dormitorio</b>
            <span>@{{form.livingRoomBedrooms.length > 1 ? `#${index+1}` : null}}</span>
            <button class="btn btn-link no-padding"
                v-on:click.stop.prevent="add('livingRoomBedrooms')"
                :disabled="form.livingRoomBedrooms.length == 10"><span
                    class="glyphicon glyphicon-plus"></span></button>
            <button class="btn btn-link no-padding"
                v-on:click.stop.prevent="remove('livingRoomBedrooms', index)"
                :disabled="form.livingRoomBedrooms.length == 1"><span
                    class="glyphicon glyphicon-minus"></span></button>
        </legend>
        
        <div class="fields">
            <div class="form-group" style="display: none;">
                <label for="size">Tamaño aproximado:</label>
                <input type="number" min="0" max="1000" value="0" class="form-control" v-model="livingRoomBedroom.size" placeholder="Mts">
            </div>
    
            {{-- <div class="form-group">
                <label for="furniture">Muebles:</label>
                <select class="form-control" title="Muebles..." multiple v-model="livingRoomBedroom.furniture.pieceOfFurniture">
                    <option></option>
                    <option>Sofá</option>
                    <option>Sofá cama</option>
                    <option>TV</option>
                    <option>Mesa de comedor</option>
    
                </select>
            </div> --}}
            
            <div class="form-group">
                <label for="window">Ventana:</label>
                <select class="form-control" v-model="livingRoomBedroom.windoww">
                    <option></option>
                    <option>Ext</option>
                    <option>Int</option>
                </select>
            </div>
            <div class="form-group">
                <label for="air">De Climalit</label>
                <input type="checkbox" v-model="livingRoomBedroom.dclimalit" value="1"> Si
            </div>            
            <div class="form-group">
                <label for="orientation">Orientación:</label>
                <select class="form-control" v-model="livingRoomBedroom.orientation">
                    <option></option>
                    <option>Norte</option>
                    <option>Sur</option>
                    <option>Este</option>
                    <option>Oeste</option>
                    <option>Sureste</option>
                    <option>Noreste</option>
                    <option>Noroeste</option>
                    <option>Suroeste</option>
                </select>
            </div>
            
           <!-- <div class="form-group">
                <label for="orientation">Tipo de ventana:</label>
                <select class="form-control" v-model="livingRoomBedroom.typeOfWindow.windoww">
                    <option></option>
                    <option>Madera</option>
                    <option>PVC</option>
                    <option>Aluminio</option>
					<option>Metal con rotura de puente térmico</option>
                </select>
            </div>
            
            <div class="form-group" v-if="livingRoomBedroom.typeOfWindow.windoww != ''">
                <label for="brand-new">A estrenar:</label>
                <input type="checkbox" v-model="livingRoomBedroom.typeOfWindow.brandNew" value="1"> Si
            </div>
    
            <div class="form-group" v-if="livingRoomBedroom.typeOfWindow.windoww != ''">
                <label for="brand-new">Cambiada hace:</label>
                <div class="row">
                    <div class="col-md-6">
                        <label for="brand-new">Año/s:</label>
                        <select class="form-control"
                            v-model="livingRoomBedroom.typeOfWindow.changed.year">
                            <option></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>+10</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="brand-new">Mes/es:</label>
                        <select class="form-control"
                            v-model="livingRoomBedroom.typeOfWindow.changed.month">
                            <option></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>+10</option>
                        </select>
                    </div>
                </div>
            </div>
    
            <div class="form-group" v-if="livingRoomBedroom.typeOfWindow.windoww != ''">
                <label for="brand-new">Puesta hace:</label>
                <div class="row">
                    <div class="col-md-6">
                        <label for="brand-new">Año/s:</label>
                        <select class="form-control"
                            v-model="livingRoomBedroom.typeOfWindow.putting.year">
                            <option></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>+10</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="brand-new">Mes/es:</label>
                        <select class="form-control"
                            v-model="livingRoomBedroom.typeOfWindow.putting.month">
                            <option></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>+10</option>
                        </select>
                    </div>
                </div>
            </div>-->
    
    
            <!--<div class="form-group">
                <label for="orientation">Pintura:</label>
            </div>-->
    
            <!--<div class="form-group">
                <label for="brand-new">Recién pintado:</label>
                <input type="checkbox" v-model="livingRoomBedroom.paints.paintedMakes.year" value="1"> Si
            </div>-->
            <!--<div class="form-group">
                <label for="brand-new">Pintura estado:</label>
                        <select class="form-control" v-model="livingRoomBedroom.paints.paintedMakes.year">
							<option value=""></option>
							<option value="1">Recién pintado</option>
							<option value="2">En buen estado</option>
                        </select>				
            </div>	-->
    
            <!--<div class="form-group">
                <label for="brand-new">Pintado hace:</label>
                <div class="row">
                    <div class="col-md-6">
                        <label for="brand-new">Año/s:</label>
                        <select class="form-control"
                            v-model="livingRoomBedroom.paints.justPainted.year">
                            <option></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>+10</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="brand-new">Mes/es:</label>
                        <select class="form-control"
                            v-model="livingRoomBedroom.paints.justPainted.month">
                            <option></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>+10</option>
                        </select>
                    </div>
                </div>
            </div>-->
    
            <!--<div class="form-group"  style="display: none;">
                <label for="window">Pared:</label>
                <select class="form-control" v-model="livingRoomBedroom.wall">
                    <option></option>
                    <option>Gotelé</option>
                    <option>Lisa</option>
                </select>
            </div>-->
    
            <div class="form-group" style="display: none;">
                <label for="window">Tipo de suelo:</label>
                <select class="form-control" v-model="livingRoomBedroom.typeOfSoil.type">
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
    
            <!--<div class="form-group" v-if="livingRoomBedroom.typeOfSoil.type != ''">
                <label for="brand-new">A estrenar:</label>
                <input type="checkbox" v-model="livingRoomBedroom.typeOfSoil.brandNew" value="1"> Si
            </div>-->
            <div class="form-group" v-if="livingRoomBedroom.typeOfSoil.type != ''">
				<label for="brand-new">Estado del suelo:</label>
                <select class="form-control" v-model="livingRoomBedroom.typeOfSoil.brandNew">
					<option value=""></option>
					<option value="1">A estrenar</option>
					<option value="2">En buen estado</option>
					<option value="3">Recién cambiado</option>
                </select>				
            </div>				
    
            <!--<div class="form-group" v-if="livingRoomBedroom.typeOfSoil.type != ''">
                <label for="brand-new">Cambiado hace:</label>
                <div class="row">
                    <div class="col-md-6">
                        <label for="brand-new">Año/s:</label>
                        <select class="form-control"
                            v-model="livingRoomBedroom.typeOfSoil.changed.year">
                            <option></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>+10</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="brand-new">Mes/es:</label>
                        <select class="form-control"
                            v-model="livingRoomBedroom.typeOfSoil.changed.month">
                            <option></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>+10</option>
                        </select>
                    </div>
                </div>
            </div>
    
            <div class="form-group" v-if="livingRoomBedroom.typeOfSoil.type != ''">
                <label for="brand-new">Puesta hace:</label>
                <div class="row">
                    <div class="col-md-6">
                        <label for="brand-new">Año/s:</label>
                        <select class="form-control"
                            v-model="livingRoomBedroom.typeOfSoil.putting.year">
                            <option></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>+10</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="brand-new">Mes/es:</label>
                        <select class="form-control"
                            v-model="livingRoomBedroom.typeOfSoil.putting.month">
                            <option></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>+10</option>
                        </select>
                    </div>
                </div>
            </div>-->
    
            <div class="form-group">
                <label for="window">Con balcón - M2 aprox:</label>
                <input type="text" class="form-control" maxlength="6" v-model="livingRoomBedroom.balcony" placeholder="Mts">
            </div>
    
            <div class="form-group">
                <label for="window">Con terraza - M2 aprox:</label>
                <input type="text" class="form-control" maxlength="6" v-model="livingRoomBedroom.terrace" placeholder="Mts">
            </div>
		    <div class="form-group" v-if="form.isSale == '0'">
                <label for="window">Salón dormitorio equipado con:</label>
                <div class="col-md-12">
                    <label for="window">Sofa:</label>
                    <input type="checkbox" v-model="livingRoomBedroom.muebles.sofa" value="1"> Si
                </div>
                 <div class="col-md-12">
                    <label for="window">Sofa Cama:</label>
                    <input type="checkbox" v-model="livingRoomBedroom.muebles.sofa_cama" value="1"> Si
                </div>
                <div class="col-md-12">
                    <label for="window">T.V.:</label>
                    <input type="checkbox" v-model="livingRoomBedroom.muebles.tv" value="1"> Si
                </div>
                <div class="col-md-12">
                    <label for="window">Mesa comedor:</label>
                    <input type="checkbox" v-model="livingRoomBedroom.muebles.mesa_comedor" value="1"> Si
                </div>
                <div class="col-md-12">
                    <label for="window">Escritorio:</label>
                    <input type="checkbox" v-model="livingRoomBedroom.muebles.escritorio" value="1"> Si
                </div>				
                <div class="col-md-12">
                    <label for="window">Cómoda:</label>
                    <input type="checkbox" v-model="livingRoomBedroom.muebles.comoda" value="1"> Si
                </div>	{{-- --}}							
			</div>   
            <div class="form-group">
                <label for="air">Aire acondicionado:</label>
                <input type="checkbox" v-model="livingRoomBedroom.airConditioner" value="1"> Si
            </div>
            <div class="form-group" v-if="form.isSale == '0'">
                <label for="window">Tipo de cama:</label>
                <select class="form-control" v-model="livingRoomBedroom.typeBed">
                    <option></option>
                    <option>Individual</option>
                    <option>2 Individuales</option>
                    <option>Mediana</option>
                    <option>Matrimonio</option>
                    <option>King</option>
                </select>
            </div>
             <div class="form-group"   v-if="form.isSale == '0'">
                <label for="brand-new">Con canapé bajo la cama:</label>
                <input type="checkbox" v-model="livingRoomBedroom.canape" value="1"> Si
            </div>           
            <div class="form-group">
                <label for="closet">Armarios:</label>
                <select class="form-control" v-model="livingRoomBedroom.closet.closet">
                    <option></option>
                    <option>Empotrado</option>
                    <option>Normal</option>
                </select>
            </div>
    
            <div class="form-group" v-if="livingRoomBedroom.closet.closet != ''">
                <label for="brand-new">Número puertas del armario:</label>
                <select class="form-control" v-model="livingRoomBedroom.closet.doors">
                    <option></option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <option>+10</option>
                </select>
            </div>
    
           <!-- <div class="form-group" v-if="form.isSale == '0'">
                <label for="sideboard">¿Se pueden sacar algunos muebles?</label>
                <label class="radio-inline">
                    <input type="radio" v-model="livingRoomBedroom.take" value="1"> Si
                </label>
                <label class="radio-inline">
                    <input type="radio" v-model="livingRoomBedroom.take" value="0"> No
                </label>
            </div>-->
            
            <div class="row">
                <!--<div class="col-md-6">-->
				<div class="col-xs-12">
                    <div class="table-responsive">
                        <table class="table table-hover">
                           <!-- <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Fotos</th>
                                    {{-- <th>Nombre</th>
                                            <th>Tamaño aproximado</th>
                                            <th>Estado</th>
                                            <th>Acción</th> --}}
                                </tr>
                            </thead>-->
                            <tbody>
                                <tr v-if="!livingRoomBedroom.files.length">
                                    <td colspan="6">
                                        <div class="text-center p-5">
                                            <h4>Listado de fotos</h4>
                                        </div>
                                    </td>
                                </tr>
                                <tr v-for="(file, index) in livingRoomBedroom.files" :key="file.id">
                                    <td>@{{(index + 1)}}</td>
                                    <td>
                                        <img v-if="file.blob" :src="file.blob" width="40" height="auto" />
                                        <span v-else>No Image</span>
                                    </td>
                                    <td>
                                        <div class="filename">@{{file.name}}</div>
                                        <div class="progress" v-if="file.active || file.progress !== '0.00'">
                                            <div :class="{'progress-bar': true, 'progress-bar-striped': true, 'bg-danger': file.error, 'progress-bar-animated': file.active}"
                                                role="progressbar" :style="{width: file.progress + '%'}">
                                                @{{file.progress}}%</div>
                                        </div>
                                    </td>
                                    <td>@{{file.size}}</td>
                                    <td v-if="file.error">@{{file.error}}</td>
                                    <td v-else-if="file.success">success</td>
                                    <td v-else-if="file.active">active</td>
                                    <td v-else></td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-danger btn-sm dropdown-toggle" type="button"
                                                @click.prevent="removeFile(livingRoomBedroom.files, index, file.id)">Eliminar</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <label class="btn btn-info btn-xs btn-block">
                        <file-upload v-model="livingRoomBedroom.files" accept="image/jpg,image/jpeg" :multiple="true"
                            @input-filter="inputFilter"></file-upload><span class="glyphicon glyphicon-search"
                            aria-hidden="true"></span>
                    </label>
                </div>
               <!-- <div class="col-md-6">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nota Adicional video</th>
                                    {{-- <th>Nombre</th>
                                            <th>Tamaño aproximado</th>
                                            <th>Estado</th>
                                            <th>Acción</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="!livingRoomBedroom.videos.length">
                                    <td colspan="6">
                                        <div class="text-center p-5">
                                            <h4>Listado de videos</h4>
                                        </div>
                                    </td>
                                </tr>
                                <tr v-for="(file, index) in livingRoomBedroom.videos" :key="file.id">
                                    <td>@{{(index + 1)}}</td>
                                    <td>
                                        {{-- <img v-if="file.blob" :src="file.blob" width="40" height="auto" /> --}}
                                        <video v-if="file.blob" width="40" height="auto" controls>
                                            <source :src="file.blob"></video>
                                        <span v-else>No Video</span>
                                    </td>
                                    <td>
                                        <div class="filename">@{{file.name}}</div>
                                        <div class="progress" v-if="file.active || file.progress !== '0.00'">
                                            <div :class="{'progress-bar': true, 'progress-bar-striped': true, 'bg-danger': file.error, 'progress-bar-animated': file.active}"
                                                role="progressbar" :style="{width: file.progress + '%'}">
                                                @{{file.progress}}%</div>
                                        </div>
                                    </td>
                                    <td>@{{file.size}}</td>
                                    <td v-if="file.error">@{{file.error}}</td>
                                    <td v-else-if="file.success">success</td>
                                    <td v-else-if="file.active">active</td>
                                    <td v-else></td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-danger btn-sm dropdown-toggle" type="button"
                                                @click.prevent="removeFile(livingRoomBedroom.videos, index, file.id)">Eliminar</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <label class="btn btn-danger btn-xs btn-block">
                        <file-upload v-model="livingRoomBedroom.videos" accept="video/*" :multiple="true"
                            @input-filter="inputFilter"></file-upload><span class="glyphicon glyphicon-search"
                            aria-hidden="true"></span>
                    </label>
                </div>
            </div>-->
        </div>

    </fieldset>
    {{-- Baño --}}
    <fieldset v-for="(bathroom, index) in form.bathrooms" :key="'bathrooms-' + index">
        <legend>
            <b>Baño</b> 
            <span>@{{form.bathrooms.length > 1 ? `#${index+1}` : null}}</span>
            <button class="btn btn-link no-padding" v-on:click.stop.prevent="add('bathrooms')"
                :disabled="form.bathrooms.length == 10"><span class="glyphicon glyphicon-plus"></span></button>
            <button class="btn btn-link no-padding" v-on:click.stop.prevent="remove('bathrooms', index)"
                :disabled="form.bathrooms.length == 1"><span class="glyphicon glyphicon-minus"></span></button>
        </legend>
        <div class="fields">
            <div class="form-group" style="display: none;">
                <label for="size">Tamaño aproximado:</label>
                <input type="number" min="0" value="0" max="1000" class="form-control" v-model="bathroom.size" placeholder="Mts">
            </div>
            <div class="form-group">
                <label for="air"> (Baño incorporado en el dormitorio):</label>
                <input type="checkbox" v-model="bathroom.bathroomInBedroom" value="1"> Si
            </div>
            <div class="form-group">
                <label for="brand-new">Estado de reforma:</label>
                <select class="form-control" v-model="bathroom.reformStatusstate">
                    <option></option>
                    <option>A estrenar</option>
                    <option>En buen estado</option>
                    <option>Recién reformado</option>					
                    <!--<option>Obra nueva</option>
                    <option>No ha sido reformado</option>
                    <option>Reformado a estrenar</option>
                    <option>Reformado hace</option>-->
                </select>
            </div>
            <div class="form-group" v-if="bathroom.reformStatusstate == 'Reformado hace'" >
                <label for="brand-new">Reformado hace:</label>
                <div class="row">
                    <div class="col-md-6">
                        <label for="brand-new">Año/s:</label>
                        <select class="form-control" v-model="bathroom.reformStatusreformedAgoyear">
                            <option></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>+10</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="brand-new">Mes/es:</label>
                        <select class="form-control" v-model="bathroom.reformStatusreformedAgomonth">
                            <option></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>+10</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="air">Bañera:</label>
                <input type="checkbox" v-model="bathroom.bath" value="1"> Si
            </div>
            <div class="form-group">
                <label for="air">Ducha:</label>
                <input type="checkbox" v-model="bathroom.shower" value="1"> Si
            </div>
            <div class="form-group">
                <label for="air">Bidé:</label>
                <input type="checkbox" v-model="bathroom.bidet" value="1"> Si
            </div>
            <div class="form-group">
                <label for="air">Jacuzzi:</label>
                <input type="checkbox" v-model="bathroom.jacuzzi" value="1"> Si
            </div>
            <div class="form-group">
                <label for="window">Ventana:</label>
                <select class="form-control" v-model="bathroom.windoww">
                    <option></option>
                    <option>Ext</option>
                    <option>Int</option>
                </select>
            </div>
            <!--<div class="form-group">
                <label for="orientation">Tipo de ventana:</label>
                <select class="form-control" v-model="bathroom.typeOfWindowwindoww">
                    <option></option>
                    <option>Madera</option>
                    <option>PVC</option>
                    <option>Aluminio</option>
					<option>Metal con rotura de puente térmico</option>
                </select>
            </div>
            <div class="form-group"  v-if="bathroom.typeOfWindowwindoww != ''">
                <label for="brand-new">A estrenar:</label>
                <input type="checkbox" v-model="bathroom.typeOfWindowbrandNew" value="1"> Si
            </div>
            <div class="form-group"  v-if="bathroom.typeOfWindowwindoww != ''">
                <label for="brand-new">Cambiado hace:</label>
                <div class="row">
                    <div class="col-md-6">
                        <label for="brand-new">Año/s:</label>
                        <select class="form-control" v-model="bathroom.typeOfWindowchangedyear">
                            <option></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>+10</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="brand-new">Mes/es:</label>
                        <select class="form-control" v-model="bathroom.typeOfWindowchangedmonth">
                            <option></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>+10</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group"  v-if="bathroom.typeOfWindowwindoww != ''">
                <label for="brand-new">Puesta hace:</label>
                <div class="row">
                    <div class="col-md-6">
                        <label for="brand-new">Año/s:</label>
                        <select class="form-control" v-model="bathroom.typeOfWindowputtingyear">
                            <option></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>+10</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="brand-new">Mes/es:</label>
                        <select class="form-control" v-model="bathroom.typeOfWindowputtingmonth">
                            <option></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>+10</option>
                        </select>
                    </div>
                </div>
            </div>-->
            <div class="form-group">
                <label for="air">De Climalit</label>
                <input type="checkbox" v-model="bathroom.dclimalit" value="1"> Si
            </div>
            <div class="form-group"  style="display: none;">
                <label for="window">Tipo de suelo:</label>
                <select class="form-control" v-model="bathroom.typeOfSoiltype">
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
            <!--<div class="form-group" v-if="bathroom.typeOfSoiltype != ''">
                <label for="brand-new">A estrenar:</label>
                <input type="checkbox" v-model="bathroom.typeOfSoilbrandNew" value="1"> Si
            </div>-->
            <div class="form-group" v-if="bathroom.typeOfSoiltype != ''">
				<label for="brand-new">Estado del suelo:</label>
                <select class="form-control" v-model="bathroom.typeOfSoilbrandNew">
					<option value=""></option>
					<option value="1">A estrenar</option>
					<option value="2">En buen estado</option>
					<option value="3">Recién cambiado</option>
                </select>				
            </div>			
           <!-- <div class="form-group" v-if="bathroom.typeOfSoiltype != ''">
                <label for="brand-new">Cambiado hace:</label>
                <div class="row">
                    <div class="col-md-6">
                        <label for="brand-new">Año/s:</label>
                        <select class="form-control" v-model="bathroom.typeOfSoilchangedyear">
                            <option></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>+10</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="brand-new">Mes/es:</label>
                        <select class="form-control" v-model="bathroom.typeOfSoilchangedmonth">
                            <option></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>+10</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group" v-if="bathroom.typeOfSoiltype != ''">
                <label for="brand-new">Puesta hace:</label>
                <div class="row">
                    <div class="col-md-6">
                        <label for="brand-new">Año/s:</label>
                        <select class="form-control" v-model="bathroom.typeOfSoilputtingyear">
                            <option></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>+10</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="brand-new">Mes/es:</label>
                        <select class="form-control" v-model="bathroom.typeOfSoilputtingmonth">
                            <option></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>+10</option>
                        </select>
                    </div>
                </div>
            </div>-->
        <!--    <div class="form-group" v-if="form.isSale == '0'">
                <label for="sideboard">¿Se pueden sacar algunos muebles?</label>
                <label class="radio-inline">
                    <input type="radio" v-model="bathroom.take" value="1"> Si
                </label>
                <label class="radio-inline">
                    <input type="radio" v-model="bathroom.take" value="0"> No
                </label>
            </div>-->
            <div class="row">
                <!--<div class="col-md-6">-->
				<div class="col-xs-12">
                    <div class="table-responsive">
                        <table class="table table-hover">
                           <!-- <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Fotos</th>
                                    {{-- <th>Nombre</th>
                                            <th>Tamaño aproximado</th>
                                            <th>Estado</th>
                                            <th>Acción</th> --}}
                                </tr>
                            </thead>-->
                            <tbody>
                                <tr v-if="!bathroom.files.length">
                                    <td colspan="6">
                                        <div class="text-center p-5">
                                            <h4>Listado de fotos</h4>
                                        </div>
                                    </td>
                                </tr>
                                <tr v-for="(file, index) in bathroom.files" :key="file.id">
                                    <td>@{{(index + 1)}}</td>
                                    <td>
                                        <img v-if="file.blob" :src="file.blob" width="40" height="auto" />
                                        <span v-else>No Image</span>
                                    </td>
                                    <td>
                                        <div class="filename">@{{file.name}}</div>
                                        <div class="progress" v-if="file.active || file.progress !== '0.00'">
                                            <div :class="{'progress-bar': true, 'progress-bar-striped': true, 'bg-danger': file.error, 'progress-bar-animated': file.active}"
                                                role="progressbar" :style="{width: file.progress + '%'}">
                                                @{{file.progress}}%</div>
                                        </div>
                                    </td>
                                    <td>@{{file.size}}</td>
                                    <td v-if="file.error">@{{file.error}}</td>
                                    <td v-else-if="file.success">success</td>
                                    <td v-else-if="file.active">active</td>
                                    <td v-else></td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-danger btn-sm dropdown-toggle" type="button"
                                                @click.prevent="removeFile(bathroom.files, index, file.id)">Eliminar</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <label class="btn btn-info btn-xs btn-block">
                        <file-upload v-model="bathroom.files" accept="image/jpg,image/jpeg" :multiple="true"
                            @input-filter="inputFilter"></file-upload><span class="glyphicon glyphicon-search"
                            aria-hidden="true"></span>
                    </label>
                </div>
              <!--  <div class="col-md-6">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nota Adicional video</th>
                                    {{--  <th>Nombre</th>
                                            <th>Tamaño aproximado</th>
                                            <th>Estado</th>
                                            <th>Acción</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="!bathroom.videos.length">
                                    <td colspan="6">
                                        <div class="text-center p-5">
                                            <h4>Listado de videos</h4>
                                        </div>
                                    </td>
                                </tr>
                                <tr v-for="(file, index) in bathroom.videos" :key="file.id">
                                    <td>@{{(index + 1)}}</td>
                                    <td>
                                        {{-- <img v-if="file.blob" :src="file.blob" width="40" height="auto" /> --}}
                                        <video v-if="file.blob" width="40" height="auto" controls>
                                            <source :src="file.blob"></video>
                                        <span v-else>No Video</span>
                                    </td>
                                    <td>
                                        <div class="filename">@{{file.name}}</div>
                                        <div class="progress" v-if="file.active || file.progress !== '0.00'">
                                            <div :class="{'progress-bar': true, 'progress-bar-striped': true, 'bg-danger': file.error, 'progress-bar-animated': file.active}"
                                                role="progressbar" :style="{width: file.progress + '%'}">
                                                @{{file.progress}}%</div>
                                        </div>
                                    </td>
                                    <td>@{{file.size}}</td>
                                    <td v-if="file.error">@{{file.error}}</td>
                                    <td v-else-if="file.success">success</td>
                                    <td v-else-if="file.active">active</td>
                                    <td v-else></td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-danger btn-sm dropdown-toggle" type="button"
                                                @click.prevent="removeFile(bathroom.videos, index, file.id)">Eliminar</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <label class="btn btn-danger btn-xs btn-block">
                        <file-upload v-model="bathroom.videos" accept="video/*" :multiple="true"
                            @input-filter="inputFilter"></file-upload><span class="glyphicon glyphicon-search"
                            aria-hidden="true"></span>
                    </label>
                </div>
            </div>-->
        </div>
    </fieldset>
    {{-- Cuarto de aseo --}}
    <fieldset v-for="(restroom, index) in form.restrooms" :key="'restrooms-' + index">
        <legend>
            <b>Aseo</b>
            <span>@{{form.restrooms.length > 1 ? `#${index+1}` : null}}</span>
            <button class="btn btn-link no-padding" v-on:click.stop.prevent="add('restrooms')"
                :disabled="form.restrooms.length == 10"><span class="glyphicon glyphicon-plus"></span></button>
            <button class="btn btn-link no-padding" v-on:click.stop.prevent="remove('restrooms', index)"
                :disabled="form.restrooms.length == 1"><span class="glyphicon glyphicon-minus"></span></button>
        </legend>

        <div class="fields">
            <div class="form-group"  style="display: none;">
                <label for="size">Tamaño aproximado:</label>
                <input type="number" min="0" value="0" max="1000" class="form-control" v-model="restroom.size" placeholder="Mts">
            </div>
           <!-- <div class="form-group" v-if="form.isSale == '0'">
                <label for="sideboard">¿Se pueden sacar algunos muebles?</label>
                <label class="radio-inline">
                    <input type="radio" v-model="restroom.take" value="1"> Si
                </label>
                <label class="radio-inline">
                    <input type="radio" v-model="restroom.take" value="0"> No
                </label>
            </div>	-->	
            <div class="row">
                <!--<div class="col-md-6">-->
				<div class="col-xs-12">
                    <div class="table-responsive">
                        <table class="table table-hover">
                           <!-- <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Fotos</th>
                                    {{-- <th>Nombre</th>
                                            <th>Tamaño aproximado</th>
                                            <th>Estado</th>
                                            <th>Acción</th> --}}
                                </tr>
                            </thead>-->
                            <tbody>
                                <tr v-if="!restroom.files.length">
                                    <td colspan="6">
                                        <div class="text-center p-5">
                                            <h4>Listado de fotos</h4>
                                        </div>
                                    </td>
                                </tr>
                                <tr v-for="(file, index) in restroom.files" :key="file.id">
                                    <td>@{{(index + 1)}}</td>
                                    <td>
                                        <img v-if="file.blob" :src="file.blob" width="40" height="auto" />
                                        <span v-else>No Image</span>
                                    </td>
                                    <td>
                                        <div class="filename">@{{file.name}}</div>
                                        <div class="progress" v-if="file.active || file.progress !== '0.00'">
                                            <div :class="{'progress-bar': true, 'progress-bar-striped': true, 'bg-danger': file.error, 'progress-bar-animated': file.active}"
                                                role="progressbar" :style="{width: file.progress + '%'}">
                                                @{{file.progress}}%</div>
                                        </div>
                                    </td>
                                    <td>@{{file.size}}</td>
                                    <td v-if="file.error">@{{file.error}}</td>
                                    <td v-else-if="file.success">success</td>
                                    <td v-else-if="file.active">active</td>
                                    <td v-else></td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-danger btn-sm dropdown-toggle" type="button"
                                                @click.prevent="removeFile(restroom.files, index, file.id)">Eliminar</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <label class="btn btn-info btn-xs btn-block">
                        <file-upload v-model="restroom.files" accept="image/jpg,image/jpeg" :multiple="true"
                            @input-filter="inputFilter"></file-upload><span class="glyphicon glyphicon-search"
                            aria-hidden="true"></span>
                    </label>
                </div>
                <!--<div class="col-md-6">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nota Adicional video</th>
                                    {{-- <th>Nombre</th>
                                            <th>Tamaño aproximado</th>
                                            <th>Estado</th>
                                            <th>Acción</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="!restroom.videos.length">
                                    <td colspan="6">
                                        <div class="text-center p-5">
                                            <h4>Listado de videos</h4>
                                        </div>
                                    </td>
                                </tr>
                                <tr v-for="(file, index) in restroom.videos" :key="file.id">
                                    <td>@{{(index + 1)}}</td>
                                    <td>
                                        {{-- <img v-if="file.blob" :src="file.blob" width="40" height="auto" /> --}}
                                        <video v-if="file.blob" width="40" height="auto" controls>
                                            <source :src="file.blob"></video>
                                        <span v-else>No Video</span>
                                    </td>
                                    <td>
                                        <div class="filename">@{{file.name}}</div>
                                        <div class="progress" v-if="file.active || file.progress !== '0.00'">
                                            <div :class="{'progress-bar': true, 'progress-bar-striped': true, 'bg-danger': file.error, 'progress-bar-animated': file.active}"
                                                role="progressbar" :style="{width: file.progress + '%'}">
                                                @{{file.progress}}%</div>
                                        </div>
                                    </td>
                                    <td>@{{file.size}}</td>
                                    <td v-if="file.error">@{{file.error}}</td>
                                    <td v-else-if="file.success">success</td>
                                    <td v-else-if="file.active">active</td>
                                    <td v-else></td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-danger btn-sm dropdown-toggle" type="button"
                                                @click.prevent="removeFile(restroom.videos, index, file.id)">Eliminar</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <label class="btn btn-danger btn-xs btn-block">
                        <file-upload v-model="restroom.videos" accept="video/*" :multiple="true"
                            @input-filter="inputFilter"></file-upload><span class="glyphicon glyphicon-search"
                            aria-hidden="true"></span>
                    </label>
                </div>
            <div> --> 
        </div>
    </fieldset>
    {{-- Pasillo --}}
    <fieldset v-for="(hallway, index) in form.hallways" :key="'hallways-' + index">
        <legend>
            <b>Pasillo</b>
            <span>@{{form.hallways.length > 1 ? `#${index+1}` : null}}</span>
            <button class="btn btn-link no-padding" v-on:click.stop.prevent="add('hallways')"
                :disabled="form.hallways.length == 10"><span class="glyphicon glyphicon-plus"></span></button>
            <button class="btn btn-link no-padding" v-on:click.stop.prevent="remove('hallways', index)"
                :disabled="form.hallways.length == 1"><span class="glyphicon glyphicon-minus"></span></button>
        </legend>

        <div class="fields">
            <div class="form-group"  style="display: none;">
                <label for="size">Tamaño aproximado:</label>
                <input type="number" min="0" value="0" max="1000" class="form-control" v-model="hallway.size" placeholder="Mts">
            </div>
            <div class="form-group">
                <label for="storage">Almacenamiento:</label>
                <input type="text" maxlength="40" v-model="hallway.storage" class="form-control">
            </div>
            <div class="form-group">
                <label for="closet">Armario:</label>
                <select class="form-control" v-model="hallway.closet">
                    <option></option>
                    <option>Empotrado</option>
                    <option>Normal</option>
                </select>
            </div>
            <div class="form-group" v-if="hallway.closet != ''">
                <label for="closet">Número puertas del armario:</label>
                <select class="form-control" v-model="hallway.closetdoors">
                    <option></option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                </select>
            </div>
           <!-- <div class="form-group" v-if="form.isSale == '0'">
                <label for="sideboard">¿Se pueden sacar algunos muebles?</label>
                <label class="radio-inline">
                    <input type="radio" v-model="hallway.take" value="1"> Si
                </label>
                <label class="radio-inline">
                    <input type="radio" v-model="hallway.take" value="0"> No
                </label>
            </div>-->
            <div class="row">
                <!--<div class="col-md-6">-->
				<div class="col-xs-12">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <!--<thead>
                                <tr>
                                    <th>#</th>
                                    <th>Fotos</th>
                                    {{-- <th>Nombre</th>
                                            <th>Tamaño aproximado</th>
                                            <th>Estado</th>
                                            <th>Acción</th> --}}
                                </tr>
                            </thead>-->
                            <tbody>
                                <tr v-if="!hallway.files.length">
                                    <td colspan="6">
                                        <div class="text-center p-5">
                                            <h4>Listado de fotos</h4>
                                        </div>
                                    </td>
                                </tr>
                                <tr v-for="(file, index) in hallway.files" :key="file.id">
                                    <td>@{{(index + 1)}}</td>
                                    <td>
                                        <img v-if="file.blob" :src="file.blob" width="40" height="auto" />
                                        <span v-else>No Image</span>
                                    </td>
                                    <td>
                                        <div class="filename">@{{file.name}}</div>
                                        <div class="progress" v-if="file.active || file.progress !== '0.00'">
                                            <div :class="{'progress-bar': true, 'progress-bar-striped': true, 'bg-danger': file.error, 'progress-bar-animated': file.active}"
                                                role="progressbar" :style="{width: file.progress + '%'}">
                                                @{{file.progress}}%</div>
                                        </div>
                                    </td>
                                    <td>@{{file.size}}</td>
                                    <td v-if="file.error">@{{file.error}}</td>
                                    <td v-else-if="file.success">success</td>
                                    <td v-else-if="file.active">active</td>
                                    <td v-else></td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-danger btn-sm dropdown-toggle" type="button"
                                                @click.prevent="removeFile(hallway.files, index, file.id)">Eliminar</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <label class="btn btn-info btn-xs btn-block">
                        <file-upload v-model="hallway.files" accept="image/jpg,image/jpeg" :multiple="true"
                            @input-filter="inputFilter"></file-upload><span class="glyphicon glyphicon-search"
                            aria-hidden="true"></span>
                    </label>
                </div>
               <!-- <div class="col-md-6">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nota Adicional video</th>
                                    {{--  <th>Nombre</th>
                                            <th>Tamaño aproximado</th>
                                            <th>Estado</th>
                                            <th>Acción</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="!hallway.videos.length">
                                    <td colspan="6">
                                        <div class="text-center p-5">
                                            <h4>Listado de videos</h4>
                                        </div>
                                    </td>
                                </tr>
                                <tr v-for="(file, index) in hallway.videos" :key="file.id">
                                    <td>@{{(index + 1)}}</td>
                                    <td>
                                        {{-- <img v-if="file.blob" :src="file.blob" width="40" height="auto" /> --}}
                                        <video v-if="file.blob" width="40" height="auto" controls>
                                            <source :src="file.blob"></video>
                                        <span v-else>No Video</span>
                                    </td>
                                    <td>
                                        <div class="filename">@{{file.name}}</div>
                                        <div class="progress" v-if="file.active || file.progress !== '0.00'">
                                            <div :class="{'progress-bar': true, 'progress-bar-striped': true, 'bg-danger': file.error, 'progress-bar-animated': file.active}"
                                                role="progressbar" :style="{width: file.progress + '%'}">
                                                @{{file.progress}}%</div>
                                        </div>
                                    </td>
                                    <td>@{{file.size}}</td>
                                    <td v-if="file.error">@{{file.error}}</td>
                                    <td v-else-if="file.success">success</td>
                                    <td v-else-if="file.active">active</td>
                                    <td v-else></td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-danger btn-sm dropdown-toggle" type="button"
                                                @click.prevent="removeFile(hallway.videos, index, file.id)">Eliminar</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <label class="btn btn-danger btn-xs btn-block">
                        <file-upload v-model="hallway.videos" accept="video/*" :multiple="true"
                            @input-filter="inputFilter"></file-upload><span class="glyphicon glyphicon-search"
                            aria-hidden="true"></span>
                    </label>
                </div>
            </div>-->
        </div>
    </fieldset>
    {{-- Distribuidor --}}
    <fieldset v-for="(dealer, index) in form.dealers" :key="'dealers-' + index">
        <legend>
            <b>Distribuidor</b>
            <span>@{{form.dealers.length > 1 ? `#${index+1}` : null}}</span>
            <button class="btn btn-link no-padding" v-on:click.stop.prevent="add('dealers')"
                :disabled="form.dealers.length == 10"><span class="glyphicon glyphicon-plus"></span></button>
            <button class="btn btn-link no-padding" v-on:click.stop.prevent="remove('dealers', index)"
                :disabled="form.dealers.length == 1"><span class="glyphicon glyphicon-minus"></span></button>
        </legend>
        <div class="fields">
            <div class="form-group"  style="display: none;">
                <label for="size">Tamaño aproximado:</label>
                <input type="number" min="0" value="0" max="1000" class="form-control" v-model="dealer.size" placeholder="Mts">
            </div>
            <div class="form-group">
                <label for="closet">Armario:</label>
                <select class="form-control" v-model="dealer.closet">
                    <option></option>
                    <option>Empotrado</option>
                    <option>Normal</option>
                </select>
            </div>
            <div class="form-group" v-if="dealer.closet != ''">
                <label for="closet">Número puertas del armario:</label>
                <select class="form-control" v-model="dealer.closetdoors">
                    <option></option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                </select>
            </div>
            <!--<div class="form-group" v-if="form.isSale == '0'">
                <label for="sideboard">¿Se pueden sacar algunos muebles?</label>
                <label class="radio-inline">
                    <input type="radio" v-model="dealer.take" value="1"> Si
                </label>
                <label class="radio-inline">
                    <input type="radio" v-model="dealer.take" value="0"> No
                </label>
            </div>-->

            <div class="row">
                <!--<div class="col-md-6">-->
				<div class="col-xs-12">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <!--<thead>
                                <tr>
                                    <th>#</th>
                                    <th>Fotos</th>
                                    {{--  <th>Nombre</th>
                                            <th>Tamaño aproximado</th>
                                            <th>Estado</th>
                                            <th>Acción</th> --}}
                                </tr>
                            </thead>-->
                            <tbody>
                                <tr v-if="!dealer.files.length">
                                    <td colspan="6">
                                        <div class="text-center p-5">
                                            <h4>Listado de fotos</h4>
                                        </div>
                                    </td>
                                </tr>
                                <tr v-for="(file, index) in dealer.files" :key="file.id">
                                    <td>@{{(index + 1)}}</td>
                                    <td>
                                        <img v-if="file.blob" :src="file.blob" width="40" height="auto" />
                                        <span v-else>No Image</span>
                                    </td>
                                    <td>
                                        <div class="filename">@{{file.name}}</div>
                                        <div class="progress" v-if="file.active || file.progress !== '0.00'">
                                            <div :class="{'progress-bar': true, 'progress-bar-striped': true, 'bg-danger': file.error, 'progress-bar-animated': file.active}"
                                                role="progressbar" :style="{width: file.progress + '%'}">
                                                @{{file.progress}}%</div>
                                        </div>
                                    </td>
                                    <td>@{{file.size}}</td>
                                    <td v-if="file.error">@{{file.error}}</td>
                                    <td v-else-if="file.success">success</td>
                                    <td v-else-if="file.active">active</td>
                                    <td v-else></td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-danger btn-sm dropdown-toggle" type="button"
                                                @click.prevent="removeFile(dealer.files, index, file.id)">Eliminar</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <label class="btn btn-info btn-xs btn-block">
                        <file-upload v-model="dealer.files" accept="image/jpg,image/jpeg" :multiple="true"
                            @input-filter="inputFilter"></file-upload><span class="glyphicon glyphicon-search"
                            aria-hidden="true"></span>
                    </label>
                </div>
              <!--  <div class="col-md-6">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nota Adicional video</th>
                                    {{--  <th>Nombre</th>
                                            <th>Tamaño aproximado</th>
                                            <th>Estado</th>
                                            <th>Acción</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="!dealer.videos.length">
                                    <td colspan="6">
                                        <div class="text-center p-5">
                                            <h4>Listado de videos</h4>
                                        </div>
                                    </td>
                                </tr>
                                <tr v-for="(file, index) in dealer.videos" :key="file.id">
                                    <td>@{{(index + 1)}}</td>
                                    <td>
                                        {{-- <img v-if="file.blob" :src="file.blob" width="40" height="auto" /> --}}
                                        <video v-if="file.blob" width="40" height="auto" controls>
                                            <source :src="file.blob"></video>
                                        <span v-else>No Video</span>
                                    </td>
                                    <td>
                                        <div class="filename">@{{file.name}}</div>
                                        <div class="progress" v-if="file.active || file.progress !== '0.00'">
                                            <div :class="{'progress-bar': true, 'progress-bar-striped': true, 'bg-danger': file.error, 'progress-bar-animated': file.active}"
                                                role="progressbar" :style="{width: file.progress + '%'}">
                                                @{{file.progress}}%</div>
                                        </div>
                                    </td>
                                    <td>@{{file.size}}</td>
                                    <td v-if="file.error">@{{file.error}}</td>
                                    <td v-else-if="file.success">success</td>
                                    <td v-else-if="file.active">active</td>
                                    <td v-else></td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-danger btn-sm dropdown-toggle" type="button"
                                                @click.prevent="removeFile(dealer.videos, index, file.id)">Eliminar</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <label class="btn btn-danger btn-xs btn-block">
                        <file-upload v-model="dealer.videos" accept="video/*" :multiple="true"
                            @input-filter="inputFilter"></file-upload><span class="glyphicon glyphicon-search"
                            aria-hidden="true"></span>
                    </label>
                </div>
            </div>-->
        </div>
    </fieldset>
    {{-- Habitacion de servicio --}}
    <fieldset v-for="(serviceRoom, index) in form.serviceRooms" :key="'serviceRooms-' + index">
        <legend>
            <b>Habitación de servicio</b>
            <span>@{{form.serviceRooms.length > 1 ? `#${index+1}` : null}}</span>
            <button class="btn btn-link no-padding" v-on:click.stop.prevent="add('serviceRooms')"
                :disabled="form.serviceRooms.length == 10"><span class="glyphicon glyphicon-plus"></span></button>
            <button class="btn btn-link no-padding" v-on:click.stop.prevent="remove('serviceRooms', index)"
                :disabled="form.serviceRooms.length == 1"><span class="glyphicon glyphicon-minus"></span></button>
        </legend>
        <div class="fields">
            <div class="form-group"  style="display: none;">
                <label for="size">Tamaño aproximado:</label>
                <input type="number" min="0" max="1000" value="0" class="form-control" v-model="serviceRoom.size" placeholder="Mts">
            </div>
          <!--  <div class="form-group" v-if="form.isSale == '0'">
                <label for="sideboard">¿Se pueden sacar algunos muebles?</label>
                <label class="radio-inline">
                    <input type="radio" v-model="serviceRoom.take" value="1"> Si
                </label>
                <label class="radio-inline">
                    <input type="radio" v-model="serviceRoom.take" value="0"> No
                </label>
            </div>-->			
            <div class="row">
                <!--<div class="col-md-6">-->
				<div class="col-xs-12">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <!--<thead>
                                <tr>
                                    <th>#</th>
                                    <th>Fotos</th>
                                    {{-- <th>Nombre</th>
                                            <th>Tamaño aproximado</th>
                                            <th>Estado</th>
                                            <th>Acción</th> --}}
                                </tr>
                            </thead>-->
                            <tbody>
                                <tr v-if="!serviceRoom.files.length">
                                    <td colspan="6">
                                        <div class="text-center p-5">
                                            <h4>Listado de fotos</h4>
                                        </div>
                                    </td>
                                </tr>
                                <tr v-for="(file, index) in serviceRoom.files" :key="file.id">
                                    <td>@{{(index + 1)}}</td>
                                    <td>
                                        <img v-if="file.blob" :src="file.blob" width="40" height="auto" />
                                        <span v-else>No Image</span>
                                    </td>
                                    <td>
                                        <div class="filename">@{{file.name}}</div>
                                        <div class="progress" v-if="file.active || file.progress !== '0.00'">
                                            <div :class="{'progress-bar': true, 'progress-bar-striped': true, 'bg-danger': file.error, 'progress-bar-animated': file.active}"
                                                role="progressbar" :style="{width: file.progress + '%'}">
                                                @{{file.progress}}%</div>
                                        </div>
                                    </td>
                                    <td>@{{file.size}}</td>
                                    <td v-if="file.error">@{{file.error}}</td>
                                    <td v-else-if="file.success">success</td>
                                    <td v-else-if="file.active">active</td>
                                    <td v-else></td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-danger btn-sm dropdown-toggle" type="button"
                                                @click.prevent="removeFile(serviceRoom.files, index, file.id)">Eliminar</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <label class="btn btn-info btn-xs btn-block">
                        <file-upload v-model="serviceRoom.files" accept="image/jpg,image/jpeg" :multiple="true"
                            @input-filter="inputFilter"></file-upload><span class="glyphicon glyphicon-search"
                            aria-hidden="true"></span>
                    </label>
                </div>
                <!--<div class="col-md-6">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nota Adicional video</th>
                                    {{-- <th>Nombre</th>
                                            <th>Tamaño aproximado</th>
                                            <th>Estado</th>
                                            <th>Acción</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="!serviceRoom.videos.length">
                                    <td colspan="6">
                                        <div class="text-center p-5">
                                            <h4>Listado de videos</h4>
                                        </div>
                                    </td>
                                </tr>
                                <tr v-for="(file, index) in serviceRoom.videos" :key="file.id">
                                    <td>@{{(index + 1)}}</td>
                                    <td>
                                        {{-- <img v-if="file.blob" :src="file.blob" width="40" height="auto" /> --}}
                                        <video v-if="file.blob" width="40" height="auto" controls>
                                            <source :src="file.blob"></video>
                                        <span v-else>No Video</span>
                                    </td>
                                    <td>
                                        <div class="filename">@{{file.name}}</div>
                                        <div class="progress" v-if="file.active || file.progress !== '0.00'">
                                            <div :class="{'progress-bar': true, 'progress-bar-striped': true, 'bg-danger': file.error, 'progress-bar-animated': file.active}"
                                                role="progressbar" :style="{width: file.progress + '%'}">
                                                @{{file.progress}}%</div>
                                        </div>
                                    </td>
                                    <td>@{{file.size}}</td>
                                    <td v-if="file.error">@{{file.error}}</td>
                                    <td v-else-if="file.success">success</td>
                                    <td v-else-if="file.active">active</td>
                                    <td v-else></td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-danger btn-sm dropdown-toggle" type="button"
                                                @click.prevent="removeFile(serviceRoom.videos, index, file.id)">Eliminar</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <label class="btn btn-danger btn-xs btn-block">
                        <file-upload v-model="serviceRoom.videos" accept="video/*" :multiple="true"
                            @input-filter="inputFilter"></file-upload><span class="glyphicon glyphicon-search"
                            aria-hidden="true"></span>
                    </label>
                </div>
            </div>-->
        </div>
    </fieldset>
    {{-- Baño del servicio --}}
    <fieldset v-for="(bathService, index) in form.bathServices" :key="'bathServices-' + index">
        <legend>
            <b>Baño de servicio</b>
            <span>@{{form.bathServices.length > 1 ? `#${index+1}` : null}}</span>
            <button class="btn btn-link no-padding" v-on:click.stop.prevent="add('bathServices')"
                :disabled="form.bathServices.length == 10"><span class="glyphicon glyphicon-plus"></span></button>
            <button class="btn btn-link no-padding" v-on:click.stop.prevent="remove('bathServices', index)"
                :disabled="form.bathServices.length == 1"><span class="glyphicon glyphicon-minus"></span></button>
        </legend>
        <div class="fields">
            <div class="form-group"  style="display: none;">
                <label for="size">Tamaño aproximado:</label>
                <input type="number" min="0" max="1000" value="0" class="form-control" v-model="bathService.size" placeholder="Mts">
            </div>
        <!--    <div class="form-group" v-if="form.isSale == '0'">
                <label for="sideboard">¿Se pueden sacar algunos muebles?</label>
                <label class="radio-inline">
                    <input type="radio" v-model="bathService.take" value="1"> Si
                </label>
                <label class="radio-inline">
                    <input type="radio" v-model="bathService.take" value="0"> No
                </label>
            </div>	-->			
            <div class="row">
                <!--<div class="col-md-6">-->
				<div class="col-xs-12">
                    <div class="table-responsive">
                        <table class="table table-hover">
                           <!-- <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Fotos</th>
                                    {{-- <th>Nombre</th>
                                            <th>Tamaño aproximado</th>
                                            <th>Estado</th>
                                            <th>Acción</th> --}}
                                </tr>
                            </thead>-->
                            <tbody>
                                <tr v-if="!bathService.files.length">
                                    <td colspan="6">
                                        <div class="text-center p-5">
                                            <h4>Listado de fotos</h4>
                                        </div>
                                    </td>
                                </tr>
                                <tr v-for="(file, index) in bathService.files" :key="file.id">
                                    <td>@{{(index + 1)}}</td>
                                    <td>
                                        <img v-if="file.blob" :src="file.blob" width="40" height="auto" />
                                        <span v-else>No Image</span>
                                    </td>
                                    <td>
                                        <div class="filename">@{{file.name}}</div>
                                        <div class="progress" v-if="file.active || file.progress !== '0.00'">
                                            <div :class="{'progress-bar': true, 'progress-bar-striped': true, 'bg-danger': file.error, 'progress-bar-animated': file.active}"
                                                role="progressbar" :style="{width: file.progress + '%'}">
                                                @{{file.progress}}%</div>
                                        </div>
                                    </td>
                                    <td>@{{file.size}}</td>
                                    <td v-if="file.error">@{{file.error}}</td>
                                    <td v-else-if="file.success">success</td>
                                    <td v-else-if="file.active">active</td>
                                    <td v-else></td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-danger btn-sm dropdown-toggle" type="button"
                                                @click.prevent="removeFile(bathService.files, index, file.id)">Eliminar</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <label class="btn btn-info btn-xs btn-block">
                        <file-upload v-model="bathService.files" accept="image/jpg,image/jpeg" :multiple="true"
                            @input-filter="inputFilter"></file-upload><span class="glyphicon glyphicon-search"
                            aria-hidden="true"></span>
                    </label>
                </div>
               <!-- <div class="col-md-6">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nota Adicional video</th>
                                    {{-- <th>Nombre</th>
                                            <th>Tamaño aproximado</th>
                                            <th>Estado</th>
                                            <th>Acción</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="!bathService.videos.length">
                                    <td colspan="6">
                                        <div class="text-center p-5">
                                            <h4>Listado de videos</h4>
                                        </div>
                                    </td>
                                </tr>
                                <tr v-for="(file, index) in bathService.videos" :key="file.id">
                                    <td>@{{(index + 1)}}</td>
                                    <td>
                                        {{-- <img v-if="file.blob" :src="file.blob" width="40" height="auto" /> --}}
                                        <video v-if="file.blob" width="40" height="auto" controls>
                                            <source :src="file.blob"></video>
                                        <span v-else>No Video</span>
                                    </td>
                                    <td>
                                        <div class="filename">@{{file.name}}</div>
                                        <div class="progress" v-if="file.active || file.progress !== '0.00'">
                                            <div :class="{'progress-bar': true, 'progress-bar-striped': true, 'bg-danger': file.error, 'progress-bar-animated': file.active}"
                                                role="progressbar" :style="{width: file.progress + '%'}">
                                                @{{file.progress}}%</div>
                                        </div>
                                    </td>
                                    <td>@{{file.size}}</td>
                                    <td v-if="file.error">@{{file.error}}</td>
                                    <td v-else-if="file.success">success</td>
                                    <td v-else-if="file.active">active</td>
                                    <td v-else></td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-danger btn-sm dropdown-toggle" type="button"
                                                @click.prevent="removeFile(bathService.videos, index, file.id)">Eliminar</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <label class="btn btn-danger btn-xs btn-block">
                        <file-upload v-model="bathService.videos" accept="video/*" :multiple="true"
                            @input-filter="inputFilter"></file-upload><span class="glyphicon glyphicon-search"
                            aria-hidden="true"></span>
                    </label>
                </div>
            </div>-->
        </div>
    </fieldset>
<hr>	

    {{-- Garaje --}}
    <fieldset>
        <legend><b>Garaje</b></legend>
        <div class="row">
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="description">Descripción:</label>
                    <input type="text" maxlength="255" v-model="form.garage.description" class="form-control" placeholder="Comentario">
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="size">Tamaño aproximado:</label>
                    <!--<input type="number" min="0" value="0" v-model="form.garage.size" class="form-control" placeholder="Mts">-->
					<input type="text" maxlength="4" v-model="form.garage.size" class="form-control" placeholder="Mts">
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="type">Tipo:</label>
                    <select v-model="form.garage.type" class="form-control">
                        <option></option>
                        <option>Particular</option>
                        <option>Comunitario</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="number">Número de plazas:</label>
                    <select class="form-control" v-model="form.garage.number">
                        <option></option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>						
						<option>10</option>	
                    </select>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="situation">¿Está en el mismo edificio?:</label>
                    <select class="form-control" v-model="form.garage.situation">
                        <option></option>
                        <option>Si</option>
                        <option>No, está en un parking exterior</option>
                        <option>No, esta en un parking cercano</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
                <!--<div class="col-md-6">-->
				<div class="col-xs-12">
                <div class="form-group">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <!--<thead>
                                <tr>
                                    <th>#</th>
                                    <th>Fotos</th>
                                </tr>
                            </thead>-->
                            <tbody>
                                <tr v-if="!form.garage.files.length">
                                    <td colspan="6">
                                        <div class="text-center p-5">
                                            <h4>Listado de fotos</h4>
                                        </div>
                                    </td>
                                </tr>
                                <tr v-for="(file, index) in form.garage.files" :key="file.id">
                                    <td>@{{(index + 1)}}</td>
                                    <td>
                                        <img v-if="file.blob" :src="file.blob" width="40" height="auto" />
                                        <span v-else>No Image</span>
                                    </td>
                                    <td>
                                        <div class="filename">@{{file.name}}</div>
                                        <div class="progress" v-if="file.active || file.progress !== '0.00'">
                                            <div :class="{'progress-bar': true, 'progress-bar-striped': true, 'bg-danger': file.error, 'progress-bar-animated': file.active}"
                                                role="progressbar" :style="{width: file.progress + '%'}">
                                                @{{file.progress}}%</div>
                                        </div>
                                    </td>
                                    <td>@{{file.size}}</td>
                                    <td v-if="file.error">@{{file.error}}</td>
                                    <td v-else-if="file.success">success</td>
                                    <td v-else-if="file.active">active</td>
                                    <td v-else></td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-danger btn-sm dropdown-toggle" type="button"
                                                @click.prevent="removeFile(form.garage.files, index, file.id)">Eliminar</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <label class="btn btn-info btn-xs btn-block">
                            <file-upload v-model="form.garage.files" accept="image/jpg,image/jpeg" accept="image/jpg,image/jpeg"
                                :multiple="true" @input-filter="inputFilter"></file-upload><span
                                class="glyphicon glyphicon-search" aria-hidden="true"></span>
                        </label>    
                    </div>
                </div>
            </div>
            <!--<div class="col-md-6">
                <div class="form-group">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nota Adicional video</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="!form.garage.videos.length">
                                    <td colspan="6">
                                        <div class="text-center p-5">
                                            <h4>Listado de videos</h4>
                                        </div>
                                    </td>
                                </tr>
                                <tr v-for="(file, index) in form.garage.videos" :key="file.id">
                                    <td>@{{(index + 1)}}</td>
                                    <td>
                                        {{-- <img v-if="file.blob" :src="file.blob" width="40" height="auto" /> --}}
                                        <video v-if="file.blob" width="40" height="auto" controls>
                                            <source :src="file.blob"></video>
                                        <span v-else>No Video</span>
                                    </td>
                                    <td>
                                        <div class="filename">@{{file.name}}</div>
                                        <div class="progress" v-if="file.active || file.progress !== '0.00'">
                                            <div :class="{'progress-bar': true, 'progress-bar-striped': true, 'bg-danger': file.error, 'progress-bar-animated': file.active}"
                                                role="progressbar" :style="{width: file.progress + '%'}">
                                                @{{file.progress}}%</div>
                                        </div>
                                    </td>
                                    <td>@{{file.size}}</td>
                                    <td v-if="file.error">@{{file.error}}</td>
                                    <td v-else-if="file.success">success</td>
                                    <td v-else-if="file.active">active</td>
                                    <td v-else></td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-danger btn-sm dropdown-toggle" type="button"
                                                @click.prevent="removeFile(form.garage.videos, index, file.id)">Eliminar</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <label class="btn btn-danger btn-xs btn-block">
                        <file-upload v-model="form.garage.videos" accept="video/*" accept="video/*"
                            :multiple="true" @input-filter="inputFilter"></file-upload><span
                            class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    </label>
                </div>
            </div>-->
        </div>
    </fieldset> 
    {{-- Trastero --}}
    <fieldset>
        <legend><b>Trastero</b></legend>
        <div class="row">
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="description">Descripción:</label>
                    <input type="text" maxlength="255" v-model="form.boxroom.description" class="form-control" placeholder="Comentario">
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="size">Tamaño aproximado:</label>
                    <!--<input type="number" min="0" value="0" v-model="form.boxroom.size" class="form-control" placeholder="Mts">-->
					<input type="text"  maxlength="4" v-model="form.boxroom.size" class="form-control" placeholder="Mts">
                </div>
            </div>
        </div>
        <div class="row">
                <!--<div class="col-md-6">-->
				<div class="col-xs-12">
                <div class="form-group">
                    <div class="table-responsive">
                        <table class="table table-hover">
                        <!--    <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Fotos</th>
                                </tr>
                            </thead>-->
                            <tbody>
                                <tr v-if="!form.boxroom.files.length">
                                    <td colspan="6">
                                        <div class="text-center p-5">
                                            <h4>Listado de fotos</h4>
                                        </div>
                                    </td>
                                </tr>
                                <tr v-for="(file, index) in form.boxroom.files" :key="file.id">
                                    <td>@{{(index + 1)}}</td>
                                    <td>
                                        <img v-if="file.blob" :src="file.blob" width="40" height="auto" />
                                        <span v-else>No Image</span>
                                    </td>
                                    <td>
                                        <div class="filename">@{{file.name}}</div>
                                        <div class="progress" v-if="file.active || file.progress !== '0.00'">
                                            <div :class="{'progress-bar': true, 'progress-bar-striped': true, 'bg-danger': file.error, 'progress-bar-animated': file.active}"
                                                role="progressbar" :style="{width: file.progress + '%'}">
                                                @{{file.progress}}%</div>
                                        </div>
                                    </td>
                                    <td>@{{file.size}}</td>
                                    <td v-if="file.error">@{{file.error}}</td>
                                    <td v-else-if="file.success">success</td>
                                    <td v-else-if="file.active">active</td>
                                    <td v-else></td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-danger btn-sm dropdown-toggle" type="button"
                                                @click.prevent="removeFile(form.boxroom.files, index, file.id)">Eliminar</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <label class="btn btn-info btn-xs btn-block">
                            <file-upload v-model="form.boxroom.files" accept="image/jpg,image/jpeg" accept="image/jpg,image/jpeg"
                                :multiple="true" @input-filter="inputFilter"></file-upload><span
                                class="glyphicon glyphicon-search" aria-hidden="true"></span>
                        </label>    
                    </div>
                </div>
            </div>
          <!--  <div class="col-md-6">
                <div class="form-group">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nota Adicional video</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="!form.boxroom.videos.length">
                                    <td colspan="6">
                                        <div class="text-center p-5">
                                            <h4>Listado de videos</h4>
                                        </div>
                                    </td>
                                </tr>
                                <tr v-for="(file, index) in form.boxroom.videos" :key="file.id">
                                    <td>@{{(index + 1)}}</td>
                                    <td>
                                        {{-- <img v-if="file.blob" :src="file.blob" width="40" height="auto" /> --}}
                                        <video v-if="file.blob" width="40" height="auto" controls>
                                            <source :src="file.blob"></video>
                                        <span v-else>No Video</span>
                                    </td>
                                    <td>
                                        <div class="filename">@{{file.name}}</div>
                                        <div class="progress" v-if="file.active || file.progress !== '0.00'">
                                            <div :class="{'progress-bar': true, 'progress-bar-striped': true, 'bg-danger': file.error, 'progress-bar-animated': file.active}"
                                                role="progressbar" :style="{width: file.progress + '%'}">
                                                @{{file.progress}}%</div>
                                        </div>
                                    </td>
                                    <td>@{{file.size}}</td>
                                    <td v-if="file.error">@{{file.error}}</td>
                                    <td v-else-if="file.success">success</td>
                                    <td v-else-if="file.active">active</td>
                                    <td v-else></td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-danger btn-sm dropdown-toggle" type="button"
                                                @click.prevent="removeFile(form.boxroom.videos, index, file.id)">Eliminar</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <label class="btn btn-danger btn-xs btn-block">
                        <file-upload v-model="form.boxroom.videos" accept="video/*" accept="video/*"
                            :multiple="true" @input-filter="inputFilter"></file-upload><span
                            class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    </label>
                </div>
            </div>-->
        </div>
    </fieldset>	
{{-- Fachada --}}
    <fieldset>
        <legend><b>Fachada</b></legend>
        <div class="row">
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="description">Descripción:</label>
                    <input type="text" maxlength="255" v-model="form.facade.description" class="form-control" placeholder="Comentario">
                </div>
            </div>
            <!--<div class="col-xs-12">
                <div class="form-group">
                    <label for="size">Tamaño aproximado:</label>
                    
					<input type="text" v-model="form.facade.size" class="form-control" placeholder="Mts">
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="type">Tipo:</label>
                    <select v-model="form.facade.type" class="form-control">
                        <option></option>
                        <option>Particular</option>
                        <option>Comunitario</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="number">Número de plazas:</label>
                    <select class="form-control" v-model="form.facade.number">
                        <option></option>
                        <option>1</option>
                        <option>2</option>
                        <option>+2</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="situation">¿Está en el mismo edificio?:</label>
                    <select class="form-control" v-model="form.facade.situation">
                        <option></option>
                        <option>Si</option>
                        <option>No, está en un parking exterior</option>
                        <option>No, esta en un parking cercano</option>
                    </select>
                </div>
            </div>-->
        </div>
        <div class="row">
                <!--<div class="col-md-6">-->
				<div class="col-xs-12">
                <div class="form-group">
                    <div class="table-responsive">
                        <table class="table table-hover">
                          <!--  <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Fotos</th>
                                </tr>
                            </thead>-->
                            <tbody>
                                <tr v-if="!form.facade.files.length">
                                    <td colspan="6">
                                        <div class="text-center p-5">
                                            <h4>Listado de fotos</h4>
                                        </div>
                                    </td>
                                </tr>
                                <tr v-for="(file, index) in form.facade.files" :key="file.id">
                                    <td>@{{(index + 1)}}</td>
                                    <td>
                                        <img v-if="file.blob" :src="file.blob" width="40" height="auto" />
                                        <span v-else>No Image</span>
                                    </td>
                                    <td>
                                        <div class="filename">@{{file.name}}</div>
                                        <div class="progress" v-if="file.active || file.progress !== '0.00'">
                                            <div :class="{'progress-bar': true, 'progress-bar-striped': true, 'bg-danger': file.error, 'progress-bar-animated': file.active}"
                                                role="progressbar" :style="{width: file.progress + '%'}">
                                                @{{file.progress}}%</div>
                                        </div>
                                    </td>
                                    <td>@{{file.size}}</td>
                                    <td v-if="file.error">@{{file.error}}</td>
                                    <td v-else-if="file.success">success</td>
                                    <td v-else-if="file.active">active</td>
                                    <td v-else></td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-danger btn-sm dropdown-toggle" type="button"
                                                @click.prevent="removeFile(form.facade.files, index, file.id)">Eliminar</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <label class="btn btn-info btn-xs btn-block">
                            <file-upload v-model="form.facade.files" accept="image/jpg,image/jpeg" accept="image/jpg,image/jpeg"
                                :multiple="true" @input-filter="inputFilter"></file-upload><span
                                class="glyphicon glyphicon-search" aria-hidden="true"></span>
                        </label>    
                    </div>
                </div>
            </div>
            <!--<div class="col-md-6">
                <div class="form-group">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nota Adicional video</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="!form.facade.videos.length">
                                    <td colspan="6">
                                        <div class="text-center p-5">
                                            <h4>Listado de videos</h4>
                                        </div>
                                    </td>
                                </tr>
                                <tr v-for="(file, index) in form.facade.videos" :key="file.id">
                                    <td>@{{(index + 1)}}</td>
                                    <td>
                                        {{-- <img v-if="file.blob" :src="file.blob" width="40" height="auto" /> --}}
                                        <video v-if="file.blob" width="40" height="auto" controls>
                                            <source :src="file.blob"></video>
                                        <span v-else>No Video</span>
                                    </td>
                                    <td>
                                        <div class="filename">@{{file.name}}</div>
                                        <div class="progress" v-if="file.active || file.progress !== '0.00'">
                                            <div :class="{'progress-bar': true, 'progress-bar-striped': true, 'bg-danger': file.error, 'progress-bar-animated': file.active}"
                                                role="progressbar" :style="{width: file.progress + '%'}">
                                                @{{file.progress}}%</div>
                                        </div>
                                    </td>
                                    <td>@{{file.size}}</td>
                                    <td v-if="file.error">@{{file.error}}</td>
                                    <td v-else-if="file.success">success</td>
                                    <td v-else-if="file.active">active</td>
                                    <td v-else></td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-danger btn-sm dropdown-toggle" type="button"
                                                @click.prevent="removeFile(form.facade.videos, index, file.id)">Eliminar</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <label class="btn btn-danger btn-xs btn-block">
                        <file-upload v-model="form.facade.videos" accept="video/*" accept="video/*"
                            :multiple="true" @input-filter="inputFilter"></file-upload><span
                            class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    </label>
                </div>
            </div>-->
        </div>
    </fieldset>	
    {{-- Portal --}}
    <fieldset>
        <legend><b>Portal</b></legend>
        <div class="row">
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="description">Descripción:</label>
                    <input type="text" maxlength="255" v-model="form.portal.description" class="form-control" placeholder="Comentario">
                </div>
            </div>
           <!-- <div class="col-xs-12">
                <div class="form-group">
                    <label for="size">Tamaño aproximado:</label>
                    
					<input type="text" v-model="form.portal.size" class="form-control" placeholder="Mts">
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="type">Tipo:</label>
                    <select v-model="form.portal.type" class="form-control">
                        <option></option>
                        <option>Particular</option>
                        <option>Comunitario</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="number">Número de plazas:</label>
                    <select class="form-control" v-model="form.portal.number">
                        <option></option>
                        <option>1</option>
                        <option>2</option>
                        <option>+2</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="situation">¿Está en el mismo edificio?:</label>
                    <select class="form-control" v-model="form.portal.situation">
                        <option></option>
                        <option>Si</option>
                        <option>No, está en un parking exterior</option>
                        <option>No, esta en un parking cercano</option>
                    </select>
                </div>
            </div>-->
        </div>
        <div class="row">
                <!--<div class="col-md-6">-->
				<div class="col-xs-12">
                <div class="form-group">
                    <div class="table-responsive">
                        <table class="table table-hover">
                           <!-- <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Fotos</th>
                                </tr>
                            </thead>-->
                            <tbody>
                                <tr v-if="!form.portal.files.length">
                                    <td colspan="6">
                                        <div class="text-center p-5">
                                            <h4>Listado de fotos</h4>
                                        </div>
                                    </td>
                                </tr>
                                <tr v-for="(file, index) in form.portal.files" :key="file.id">
                                    <td>@{{(index + 1)}}</td>
                                    <td>
                                        <img v-if="file.blob" :src="file.blob" width="40" height="auto" />
                                        <span v-else>No Image</span>
                                    </td>
                                    <td>
                                        <div class="filename">@{{file.name}}</div>
                                        <div class="progress" v-if="file.active || file.progress !== '0.00'">
                                            <div :class="{'progress-bar': true, 'progress-bar-striped': true, 'bg-danger': file.error, 'progress-bar-animated': file.active}"
                                                role="progressbar" :style="{width: file.progress + '%'}">
                                                @{{file.progress}}%</div>
                                        </div>
                                    </td>
                                    <td>@{{file.size}}</td>
                                    <td v-if="file.error">@{{file.error}}</td>
                                    <td v-else-if="file.success">success</td>
                                    <td v-else-if="file.active">active</td>
                                    <td v-else></td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-danger btn-sm dropdown-toggle" type="button"
                                                @click.prevent="removeFile(form.portal.files, index, file.id)">Eliminar</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <label class="btn btn-info btn-xs btn-block">
                            <file-upload v-model="form.portal.files" accept="image/jpg,image/jpeg" accept="image/jpg,image/jpeg"
                                :multiple="true" @input-filter="inputFilter"></file-upload><span
                                class="glyphicon glyphicon-search" aria-hidden="true"></span>
                        </label>    
                    </div>
                </div>
            </div>
            <!--<div class="col-md-6">
                <div class="form-group">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nota Adicional video</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="!form.portal.videos.length">
                                    <td colspan="6">
                                        <div class="text-center p-5">
                                            <h4>Listado de videos</h4>
                                        </div>
                                    </td>
                                </tr>
                                <tr v-for="(file, index) in form.portal.videos" :key="file.id">
                                    <td>@{{(index + 1)}}</td>
                                    <td>
                                        {{-- <img v-if="file.blob" :src="file.blob" width="40" height="auto" /> --}}
                                        <video v-if="file.blob" width="40" height="auto" controls>
                                            <source :src="file.blob"></video>
                                        <span v-else>No Video</span>
                                    </td>
                                    <td>
                                        <div class="filename">@{{file.name}}</div>
                                        <div class="progress" v-if="file.active || file.progress !== '0.00'">
                                            <div :class="{'progress-bar': true, 'progress-bar-striped': true, 'bg-danger': file.error, 'progress-bar-animated': file.active}"
                                                role="progressbar" :style="{width: file.progress + '%'}">
                                                @{{file.progress}}%</div>
                                        </div>
                                    </td>
                                    <td>@{{file.size}}</td>
                                    <td v-if="file.error">@{{file.error}}</td>
                                    <td v-else-if="file.success">success</td>
                                    <td v-else-if="file.active">active</td>
                                    <td v-else></td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-danger btn-sm dropdown-toggle" type="button"
                                                @click.prevent="removeFile(form.portal.videos, index, file.id)">Eliminar</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <label class="btn btn-danger btn-xs btn-block">
                        <file-upload v-model="form.portal.videos" accept="video/*" accept="video/*"
                            :multiple="true" @input-filter="inputFilter"></file-upload><span
                            class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    </label>
                </div>
            </div>-->
        </div>
    </fieldset>
    {{-- Ascensor --}}
    <fieldset>
        <legend><b>Ascensor</b></legend>
        <div class="row">
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="description">Descripción:</label>
                    <input type="text" maxlength="255" v-model="form.lift.description" class="form-control" placeholder="Comentario">
                </div>
            </div>
           <!-- <div class="col-xs-12">
                <div class="form-group">
                    <label for="size">Tamaño aproximado:</label>
           
					<input type="text" v-model="form.lift.size" class="form-control" placeholder="Mts">
                </div>
            </div>-->
            <div class="col-xs-12">
                <!--<div class="form-group">
                    <label for="type">Tipo:</label>
                    <select v-model="form.lift.type" class="form-control">
                        <option></option>
                        <option>Particular</option>
                        <option>Comunitario</option>
                    </select>
                </div>-->
                <div class="form-group">
                    <label for="number">Máximo número de plazas:</label>
                    <select class="form-control" v-model="form.lift.number">
                        <option></option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
						<option>4</option>
						<option>5</option>
						<option>6</option>
						<option>7</option>
						<option>8</option>
						<option>9</option>
						<option>10+</option>
                    </select>
                </div>
            </div>
            <!--<div class="col-xs-12">
                <div class="form-group">
                    <label for="situation">¿Está en el mismo edificio?:</label>
                    <select class="form-control" v-model="form.lift.situation">
                        <option></option>
                        <option>Si</option>
                        <option>No, está en un parking exterior</option>
                        <option>No, esta en un parking cercano</option>
                    </select>
                </div>
            </div>-->
        </div>
        <div class="row">
                <!--<div class="col-md-6">-->
				<div class="col-xs-12">
                <div class="form-group">
                    <div class="table-responsive">
                        <table class="table table-hover">
                           <!-- <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Fotos</th>
                                </tr>
                            </thead>-->
                            <tbody>
                                <tr v-if="!form.lift.files.length">
                                    <td colspan="6">
                                        <div class="text-center p-5">
                                            <h4>Listado de fotos</h4>
                                        </div>
                                    </td>
                                </tr>
                                <tr v-for="(file, index) in form.lift.files" :key="file.id">
                                    <td>@{{(index + 1)}}</td>
                                    <td>
                                        <img v-if="file.blob" :src="file.blob" width="40" height="auto" />
                                        <span v-else>No Image</span>
                                    </td>
                                    <td>
                                        <div class="filename">@{{file.name}}</div>
                                        <div class="progress" v-if="file.active || file.progress !== '0.00'">
                                            <div :class="{'progress-bar': true, 'progress-bar-striped': true, 'bg-danger': file.error, 'progress-bar-animated': file.active}"
                                                role="progressbar" :style="{width: file.progress + '%'}">
                                                @{{file.progress}}%</div>
                                        </div>
                                    </td>
                                    <td>@{{file.size}}</td>
                                    <td v-if="file.error">@{{file.error}}</td>
                                    <td v-else-if="file.success">success</td>
                                    <td v-else-if="file.active">active</td>
                                    <td v-else></td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-danger btn-sm dropdown-toggle" type="button"
                                                @click.prevent="removeFile(form.lift.files, index, file.id)">Eliminar</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <label class="btn btn-info btn-xs btn-block">
                            <file-upload v-model="form.lift.files" accept="image/jpg,image/jpeg" accept="image/jpg,image/jpeg"
                                :multiple="true" @input-filter="inputFilter"></file-upload><span
                                class="glyphicon glyphicon-search" aria-hidden="true"></span>
                        </label>    
                    </div>
                </div>
            </div>
            <!--<div class="col-md-6">
                <div class="form-group">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nota Adicional video</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="!form.lift.videos.length">
                                    <td colspan="6">
                                        <div class="text-center p-5">
                                            <h4>Listado de videos</h4>
                                        </div>
                                    </td>
                                </tr>
                                <tr v-for="(file, index) in form.lift.videos" :key="file.id">
                                    <td>@{{(index + 1)}}</td>
                                    <td>
                                        {{-- <img v-if="file.blob" :src="file.blob" width="40" height="auto" /> --}}
                                        <video v-if="file.blob" width="40" height="auto" controls>
                                            <source :src="file.blob"></video>
                                        <span v-else>No Video</span>
                                    </td>
                                    <td>
                                        <div class="filename">@{{file.name}}</div>
                                        <div class="progress" v-if="file.active || file.progress !== '0.00'">
                                            <div :class="{'progress-bar': true, 'progress-bar-striped': true, 'bg-danger': file.error, 'progress-bar-animated': file.active}"
                                                role="progressbar" :style="{width: file.progress + '%'}">
                                                @{{file.progress}}%</div>
                                        </div>
                                    </td>
                                    <td>@{{file.size}}</td>
                                    <td v-if="file.error">@{{file.error}}</td>
                                    <td v-else-if="file.success">success</td>
                                    <td v-else-if="file.active">active</td>
                                    <td v-else></td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-danger btn-sm dropdown-toggle" type="button"
                                                @click.prevent="removeFile(form.lift.videos, index, file.id)">Eliminar</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <label class="btn btn-danger btn-xs btn-block">
                        <file-upload v-model="form.lift.videos" accept="video/*" accept="video/*"
                            :multiple="true" @input-filter="inputFilter"></file-upload><span
                            class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    </label>
                </div>
            </div>-->
        </div>
    </fieldset>
    {{-- Piscina --}}
    <fieldset>
        <legend><b>Piscina</b></legend>
        <div class="row">
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="description">Descripción:</label>
                    <input type="text" maxlength="255" v-model="form.swimming.description" class="form-control" placeholder="Comentario">
                </div>
            </div>
            <!--<div class="col-xs-12">
                <div class="form-group">
                    <label for="size">Tamaño aproximado:</label>
					<input type="text" v-model="form.swimming.size" class="form-control" placeholder="Mts">
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="type">Tipo:</label>
                    <select v-model="form.swimming.type" class="form-control">
                        <option></option>
                        <option>Particular</option>
                        <option>Comunitario</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="number">Número de plazas:</label>
                    <select class="form-control" v-model="form.swimming.number">
                        <option></option>
                        <option>1</option>
                        <option>2</option>
                        <option>+2</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="situation">¿Está en el mismo edificio?:</label>
                    <select class="form-control" v-model="form.swimming.situation">
                        <option></option>
                        <option>Si</option>
                        <option>No, está en un parking exterior</option>
                        <option>No, esta en un parking cercano</option>
                    </select>
                </div>
            </div>-->
        </div>
        <div class="row">
                <!--<div class="col-md-6">-->
				<div class="col-xs-12">
                <div class="form-group">
                    <div class="table-responsive">
                        <table class="table table-hover">
                         <!--   <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Fotos</th>
                                </tr>
                            </thead>-->
                            <tbody>
                                <tr v-if="!form.swimming.files.length">
                                    <td colspan="6">
                                        <div class="text-center p-5">
                                            <h4>Listado de fotos</h4>
                                        </div>
                                    </td>
                                </tr>
                                <tr v-for="(file, index) in form.swimming.files" :key="file.id">
                                    <td>@{{(index + 1)}}</td>
                                    <td>
                                        <img v-if="file.blob" :src="file.blob" width="40" height="auto" />
                                        <span v-else>No Image</span>
                                    </td>
                                    <td>
                                        <div class="filename">@{{file.name}}</div>
                                        <div class="progress" v-if="file.active || file.progress !== '0.00'">
                                            <div :class="{'progress-bar': true, 'progress-bar-striped': true, 'bg-danger': file.error, 'progress-bar-animated': file.active}"
                                                role="progressbar" :style="{width: file.progress + '%'}">
                                                @{{file.progress}}%</div>
                                        </div>
                                    </td>
                                    <td>@{{file.size}}</td>
                                    <td v-if="file.error">@{{file.error}}</td>
                                    <td v-else-if="file.success">success</td>
                                    <td v-else-if="file.active">active</td>
                                    <td v-else></td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-danger btn-sm dropdown-toggle" type="button"
                                                @click.prevent="removeFile(form.swimming.files, index, file.id)">Eliminar</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <label class="btn btn-info btn-xs btn-block">
                            <file-upload v-model="form.swimming.files" accept="image/jpg,image/jpeg" accept="image/jpg,image/jpeg"
                                :multiple="true" @input-filter="inputFilter"></file-upload><span
                                class="glyphicon glyphicon-search" aria-hidden="true"></span>
                        </label>    
                    </div>
                </div>
            </div>
           <!-- <div class="col-md-6">
                <div class="form-group">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nota Adicional video</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="!form.swimming.videos.length">
                                    <td colspan="6">
                                        <div class="text-center p-5">
                                            <h4>Listado de videos</h4>
                                        </div>
                                    </td>
                                </tr>
                                <tr v-for="(file, index) in form.swimming.videos" :key="file.id">
                                    <td>@{{(index + 1)}}</td>
                                    <td>
                                        {{-- <img v-if="file.blob" :src="file.blob" width="40" height="auto" /> --}}
                                        <video v-if="file.blob" width="40" height="auto" controls>
                                            <source :src="file.blob"></video>
                                        <span v-else>No Video</span>
                                    </td>
                                    <td>
                                        <div class="filename">@{{file.name}}</div>
                                        <div class="progress" v-if="file.active || file.progress !== '0.00'">
                                            <div :class="{'progress-bar': true, 'progress-bar-striped': true, 'bg-danger': file.error, 'progress-bar-animated': file.active}"
                                                role="progressbar" :style="{width: file.progress + '%'}">
                                                @{{file.progress}}%</div>
                                        </div>
                                    </td>
                                    <td>@{{file.size}}</td>
                                    <td v-if="file.error">@{{file.error}}</td>
                                    <td v-else-if="file.success">success</td>
                                    <td v-else-if="file.active">active</td>
                                    <td v-else></td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-danger btn-sm dropdown-toggle" type="button"
                                                @click.prevent="removeFile(form.swimming.videos, index, file.id)">Eliminar</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <label class="btn btn-danger btn-xs btn-block">
                        <file-upload v-model="form.swimming.videos" accept="video/*" accept="video/*"
                            :multiple="true" @input-filter="inputFilter"></file-upload><span
                            class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    </label>
                </div>
            </div>-->
        </div>
    </fieldset>
    {{-- Jardin --}}
    <fieldset>
        <legend><b>Jardin</b></legend>
        <div class="row">
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="description">Descripción:</label>
                    <input type="text" maxlength="255" v-model="form.garden.description" class="form-control" placeholder="Comentario">
                </div>
            </div>
            <!--<div class="col-xs-12">
                <div class="form-group">
                    <label for="size">Tamaño aproximado:</label>
					<input type="text" v-model="form.garden.size" class="form-control" placeholder="Mts">
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="type">Tipo:</label>
                    <select v-model="form.garden.type" class="form-control">
                        <option></option>
                        <option>Particular</option>
                        <option>Comunitario</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="number">Número de plazas:</label>
                    <select class="form-control" v-model="form.garden.number">
                        <option></option>
                        <option>1</option>
                        <option>2</option>
                        <option>+2</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="situation">¿Está en el mismo edificio?:</label>
                    <select class="form-control" v-model="form.garden.situation">
                        <option></option>
                        <option>Si</option>
                        <option>No, está en un parking exterior</option>
                        <option>No, esta en un parking cercano</option>
                    </select>
                </div>
            </div>-->
        </div>
        <div class="row">
                <!--<div class="col-md-6">-->
				<div class="col-xs-12">
                <div class="form-group">
                    <div class="table-responsive">
                        <table class="table table-hover">
                          <!--  <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Fotos</th>
                                </tr>
                            </thead>-->
                            <tbody>
                                <tr v-if="!form.garden.files.length">
                                    <td colspan="6">
                                        <div class="text-center p-5">
                                            <h4>Listado de fotos</h4>
                                        </div>
                                    </td>
                                </tr>
                                <tr v-for="(file, index) in form.garden.files" :key="file.id">
                                    <td>@{{(index + 1)}}</td>
                                    <td>
                                        <img v-if="file.blob" :src="file.blob" width="40" height="auto" />
                                        <span v-else>No Image</span>
                                    </td>
                                    <td>
                                        <div class="filename">@{{file.name}}</div>
                                        <div class="progress" v-if="file.active || file.progress !== '0.00'">
                                            <div :class="{'progress-bar': true, 'progress-bar-striped': true, 'bg-danger': file.error, 'progress-bar-animated': file.active}"
                                                role="progressbar" :style="{width: file.progress + '%'}">
                                                @{{file.progress}}%</div>
                                        </div>
                                    </td>
                                    <td>@{{file.size}}</td>
                                    <td v-if="file.error">@{{file.error}}</td>
                                    <td v-else-if="file.success">success</td>
                                    <td v-else-if="file.active">active</td>
                                    <td v-else></td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-danger btn-sm dropdown-toggle" type="button"
                                                @click.prevent="removeFile(form.garden.files, index, file.id)">Eliminar</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <label class="btn btn-info btn-xs btn-block">
                            <file-upload v-model="form.garden.files" accept="image/jpg,image/jpeg" accept="image/jpg,image/jpeg"
                                :multiple="true" @input-filter="inputFilter"></file-upload><span
                                class="glyphicon glyphicon-search" aria-hidden="true"></span>
                        </label>    
                    </div>
                </div>
            </div>
       <!--     <div class="col-md-6">
                <div class="form-group">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nota Adicional video</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="!form.garden.videos.length">
                                    <td colspan="6">
                                        <div class="text-center p-5">
                                            <h4>Listado de videos</h4>
                                        </div>
                                    </td>
                                </tr>
                                <tr v-for="(file, index) in form.garden.videos" :key="file.id">
                                    <td>@{{(index + 1)}}</td>
                                    <td>
                                        {{-- <img v-if="file.blob" :src="file.blob" width="40" height="auto" /> --}}
                                        <video v-if="file.blob" width="40" height="auto" controls>
                                            <source :src="file.blob"></video>
                                        <span v-else>No Video</span>
                                    </td>
                                    <td>
                                        <div class="filename">@{{file.name}}</div>
                                        <div class="progress" v-if="file.active || file.progress !== '0.00'">
                                            <div :class="{'progress-bar': true, 'progress-bar-striped': true, 'bg-danger': file.error, 'progress-bar-animated': file.active}"
                                                role="progressbar" :style="{width: file.progress + '%'}">
                                                @{{file.progress}}%</div>
                                        </div>
                                    </td>
                                    <td>@{{file.size}}</td>
                                    <td v-if="file.error">@{{file.error}}</td>
                                    <td v-else-if="file.success">success</td>
                                    <td v-else-if="file.active">active</td>
                                    <td v-else></td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-danger btn-sm dropdown-toggle" type="button"
                                                @click.prevent="removeFile(form.garden.videos, index, file.id)">Eliminar</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <label class="btn btn-danger btn-xs btn-block">
                        <file-upload v-model="form.garden.videos" accept="video/*" accept="video/*"
                            :multiple="true" @input-filter="inputFilter"></file-upload><span
                            class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    </label>
                </div>
            </div>-->
        </div>
    </fieldset>
    {{-- Gimnasio --}}
    <fieldset>
        <legend><b>Gym</b></legend>
        <div class="row">
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="description">Descripción:</label>
                    <input type="text" maxlength="255" v-model="form.gym.description" class="form-control" placeholder="Comentario">
                </div>
            </div>
            <!--<div class="col-xs-12">
                <div class="form-group">
                    <label for="size">Tamaño aproximado:</label>
					<input type="text" v-model="form.gym.size" class="form-control" placeholder="Mts">
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="type">Tipo:</label>
                    <select v-model="form.gym.type" class="form-control">
                        <option></option>
                        <option>Particular</option>
                        <option>Comunitario</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="number">Número de plazas:</label>
                    <select class="form-control" v-model="form.gym.number">
                        <option></option>
                        <option>1</option>
                        <option>2</option>
                        <option>+2</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="situation">¿Está en el mismo edificio?:</label>
                    <select class="form-control" v-model="form.gym.situation">
                        <option></option>
                        <option>Si</option>
                        <option>No, está en un parking exterior</option>
                        <option>No, esta en un parking cercano</option>
                    </select>
                </div>
            </div>-->
        </div>
        <div class="row">
                <!--<div class="col-md-6">-->
				<div class="col-xs-12">
                <div class="form-group">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <!--<thead>
                                <tr>
                                    <th>#</th>
                                    <th>Fotos</th>
                                </tr>
                            </thead>-->
                            <tbody>
                                <tr v-if="!form.gym.files.length">
                                    <td colspan="6">
                                        <div class="text-center p-5">
                                            <h4>Listado de fotos</h4>
                                        </div>
                                    </td>
                                </tr>
                                <tr v-for="(file, index) in form.gym.files" :key="file.id">
                                    <td>@{{(index + 1)}}</td>
                                    <td>
                                        <img v-if="file.blob" :src="file.blob" width="40" height="auto" />
                                        <span v-else>No Image</span>
                                    </td>
                                    <td>
                                        <div class="filename">@{{file.name}}</div>
                                        <div class="progress" v-if="file.active || file.progress !== '0.00'">
                                            <div :class="{'progress-bar': true, 'progress-bar-striped': true, 'bg-danger': file.error, 'progress-bar-animated': file.active}"
                                                role="progressbar" :style="{width: file.progress + '%'}">
                                                @{{file.progress}}%</div>
                                        </div>
                                    </td>
                                    <td>@{{file.size}}</td>
                                    <td v-if="file.error">@{{file.error}}</td>
                                    <td v-else-if="file.success">success</td>
                                    <td v-else-if="file.active">active</td>
                                    <td v-else></td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-danger btn-sm dropdown-toggle" type="button"
                                                @click.prevent="removeFile(form.gym.files, index, file.id)">Eliminar</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <label class="btn btn-info btn-xs btn-block">
                            <file-upload v-model="form.gym.files" accept="image/jpg,image/jpeg" accept="image/jpg,image/jpeg"
                                :multiple="true" @input-filter="inputFilter"></file-upload><span
                                class="glyphicon glyphicon-search" aria-hidden="true"></span>
                        </label>    
                    </div>
                </div>
            </div>
           <!-- <div class="col-md-6">
                <div class="form-group">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nota Adicional video</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="!form.gym.videos.length">
                                    <td colspan="6">
                                        <div class="text-center p-5">
                                            <h4>Listado de videos</h4>
                                        </div>
                                    </td>
                                </tr>
                                <tr v-for="(file, index) in form.gym.videos" :key="file.id">
                                    <td>@{{(index + 1)}}</td>
                                    <td>
                                        {{-- <img v-if="file.blob" :src="file.blob" width="40" height="auto" /> --}}
                                        <video v-if="file.blob" width="40" height="auto" controls>
                                            <source :src="file.blob"></video>
                                        <span v-else>No Video</span>
                                    </td>
                                    <td>
                                        <div class="filename">@{{file.name}}</div>
                                        <div class="progress" v-if="file.active || file.progress !== '0.00'">
                                            <div :class="{'progress-bar': true, 'progress-bar-striped': true, 'bg-danger': file.error, 'progress-bar-animated': file.active}"
                                                role="progressbar" :style="{width: file.progress + '%'}">
                                                @{{file.progress}}%</div>
                                        </div>
                                    </td>
                                    <td>@{{file.size}}</td>
                                    <td v-if="file.error">@{{file.error}}</td>
                                    <td v-else-if="file.success">success</td>
                                    <td v-else-if="file.active">active</td>
                                    <td v-else></td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-danger btn-sm dropdown-toggle" type="button"
                                                @click.prevent="removeFile(form.gym.videos, index, file.id)">Eliminar</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <label class="btn btn-danger btn-xs btn-block">
                        <file-upload v-model="form.gym.videos" accept="video/*" accept="video/*"
                            :multiple="true" @input-filter="inputFilter"></file-upload><span
                            class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    </label>
                </div>
            </div>-->
        </div>
    </fieldset>	
    {{-- Sauna --}}
    <fieldset>
        <legend><b>Sauna</b></legend>
        <div class="row">
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="description">Descripción:</label>
                    <input type="text" maxlength="255" v-model="form.sauna.description" class="form-control" placeholder="Comentario">
                </div>
            </div>
           <!-- <div class="col-xs-12">
                <div class="form-group">
                    <label for="size">Tamaño aproximado:</label>
					<input type="text" v-model="form.sauna.size" class="form-control" placeholder="Mts">
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="type">Tipo:</label>
                    <select v-model="form.sauna.type" class="form-control">
                        <option></option>
                        <option>Particular</option>
                        <option>Comunitario</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="number">Número de plazas:</label>
                    <select class="form-control" v-model="form.sauna.number">
                        <option></option>
                        <option>1</option>
                        <option>2</option>
                        <option>+2</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="situation">¿Está en el mismo edificio?:</label>
                    <select class="form-control" v-model="form.sauna.situation">
                        <option></option>
                        <option>Si</option>
                        <option>No, está en un parking exterior</option>
                        <option>No, esta en un parking cercano</option>
                    </select>
                </div>
            </div>-->
        </div>
        <div class="row">
                <!--<div class="col-md-6">-->
				<div class="col-xs-12">
                <div class="form-group">
                    <div class="table-responsive">
                        <table class="table table-hover">
                           <!-- <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Fotos</th>
                                </tr>
                            </thead>-->
                            <tbody>
                                <tr v-if="!form.sauna.files.length">
                                    <td colspan="6">
                                        <div class="text-center p-5">
                                            <h4>Listado de fotos</h4>
                                        </div>
                                    </td>
                                </tr>
                                <tr v-for="(file, index) in form.sauna.files" :key="file.id">
                                    <td>@{{(index + 1)}}</td>
                                    <td>
                                        <img v-if="file.blob" :src="file.blob" width="40" height="auto" />
                                        <span v-else>No Image</span>
                                    </td>
                                    <td>
                                        <div class="filename">@{{file.name}}</div>
                                        <div class="progress" v-if="file.active || file.progress !== '0.00'">
                                            <div :class="{'progress-bar': true, 'progress-bar-striped': true, 'bg-danger': file.error, 'progress-bar-animated': file.active}"
                                                role="progressbar" :style="{width: file.progress + '%'}">
                                                @{{file.progress}}%</div>
                                        </div>
                                    </td>
                                    <td>@{{file.size}}</td>
                                    <td v-if="file.error">@{{file.error}}</td>
                                    <td v-else-if="file.success">success</td>
                                    <td v-else-if="file.active">active</td>
                                    <td v-else></td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-danger btn-sm dropdown-toggle" type="button"
                                                @click.prevent="removeFile(form.sauna.files, index, file.id)">Eliminar</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <label class="btn btn-info btn-xs btn-block">
                            <file-upload v-model="form.sauna.files" accept="image/jpg,image/jpeg" accept="image/jpg,image/jpeg"
                                :multiple="true" @input-filter="inputFilter"></file-upload><span
                                class="glyphicon glyphicon-search" aria-hidden="true"></span>
                        </label>    
                    </div>
                </div>
            </div>
            <!--<div class="col-md-6">
                <div class="form-group">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nota Adicional video</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="!form.sauna.videos.length">
                                    <td colspan="6">
                                        <div class="text-center p-5">
                                            <h4>Listado de videos</h4>
                                        </div>
                                    </td>
                                </tr>
                                <tr v-for="(file, index) in form.sauna.videos" :key="file.id">
                                    <td>@{{(index + 1)}}</td>
                                    <td>
                                        {{-- <img v-if="file.blob" :src="file.blob" width="40" height="auto" /> --}}
                                        <video v-if="file.blob" width="40" height="auto" controls>
                                            <source :src="file.blob"></video>
                                        <span v-else>No Video</span>
                                    </td>
                                    <td>
                                        <div class="filename">@{{file.name}}</div>
                                        <div class="progress" v-if="file.active || file.progress !== '0.00'">
                                            <div :class="{'progress-bar': true, 'progress-bar-striped': true, 'bg-danger': file.error, 'progress-bar-animated': file.active}"
                                                role="progressbar" :style="{width: file.progress + '%'}">
                                                @{{file.progress}}%</div>
                                        </div>
                                    </td>
                                    <td>@{{file.size}}</td>
                                    <td v-if="file.error">@{{file.error}}</td>
                                    <td v-else-if="file.success">success</td>
                                    <td v-else-if="file.active">active</td>
                                    <td v-else></td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-danger btn-sm dropdown-toggle" type="button"
                                                @click.prevent="removeFile(form.sauna.videos, index, file.id)">Eliminar</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <label class="btn btn-danger btn-xs btn-block">
                        <file-upload v-model="form.sauna.videos" accept="video/*" accept="video/*"
                            :multiple="true" @input-filter="inputFilter"></file-upload><span
                            class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    </label>
                </div>
            </div>-->
        </div>
    </fieldset>	
    {{-- Zona deportiva --}}
    <fieldset>
        <legend><b>Zona deportiva</b></legend>
        <div class="row">
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="description">Descripción:</label>
                    <input type="text" maxlength="255" v-model="form.sports.description" class="form-control" placeholder="Comentario">
                </div>
            </div>
        <!--    <div class="col-xs-12">
                <div class="form-group">
                    <label for="size">Tamaño aproximado:</label>
					<input type="text" v-model="form.sports.size" class="form-control" placeholder="Mts">
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="type">Tipo:</label>
                    <select v-model="form.sports.type" class="form-control">
                        <option></option>
                        <option>Particular</option>
                        <option>Comunitario</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="number">Número de plazas:</label>
                    <select class="form-control" v-model="form.sports.number">
                        <option></option>
                        <option>1</option>
                        <option>2</option>
                        <option>+2</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="situation">¿Está en el mismo edificio?:</label>
                    <select class="form-control" v-model="form.sports.situation">
                        <option></option>
                        <option>Si</option>
                        <option>No, está en un parking exterior</option>
                        <option>No, esta en un parking cercano</option>
                    </select>
                </div>
            </div>-->
        </div>
        <div class="row">
                <!--<div class="col-md-6">-->
				<div class="col-xs-12">
                <div class="form-group">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <!--<thead>
                                <tr>
                                    <th>#</th>
                                    <th>Fotos</th>
                                </tr>
                            </thead>-->
                            <tbody>
                                <tr v-if="!form.sports.files.length">
                                    <td colspan="6">
                                        <div class="text-center p-5">
                                            <h4>Listado de fotos</h4>
                                        </div>
                                    </td>
                                </tr>
                                <tr v-for="(file, index) in form.sports.files" :key="file.id">
                                    <td>@{{(index + 1)}}</td>
                                    <td>
                                        <img v-if="file.blob" :src="file.blob" width="40" height="auto" />
                                        <span v-else>No Image</span>
                                    </td>
                                    <td>
                                        <div class="filename">@{{file.name}}</div>
                                        <div class="progress" v-if="file.active || file.progress !== '0.00'">
                                            <div :class="{'progress-bar': true, 'progress-bar-striped': true, 'bg-danger': file.error, 'progress-bar-animated': file.active}"
                                                role="progressbar" :style="{width: file.progress + '%'}">
                                                @{{file.progress}}%</div>
                                        </div>
                                    </td>
                                    <td>@{{file.size}}</td>
                                    <td v-if="file.error">@{{file.error}}</td>
                                    <td v-else-if="file.success">success</td>
                                    <td v-else-if="file.active">active</td>
                                    <td v-else></td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-danger btn-sm dropdown-toggle" type="button"
                                                @click.prevent="removeFile(form.sports.files, index, file.id)">Eliminar</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <label class="btn btn-info btn-xs btn-block">
                            <file-upload v-model="form.sports.files" accept="image/jpg,image/jpeg" accept="image/jpg,image/jpeg"
                                :multiple="true" @input-filter="inputFilter"></file-upload><span
                                class="glyphicon glyphicon-search" aria-hidden="true"></span>
                        </label>    
                    </div>
                </div>
            </div>
          <!--  <div class="col-md-6">
                <div class="form-group">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nota Adicional video</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="!form.sports.videos.length">
                                    <td colspan="6">
                                        <div class="text-center p-5">
                                            <h4>Listado de videos</h4>
                                        </div>
                                    </td>
                                </tr>
                                <tr v-for="(file, index) in form.sports.videos" :key="file.id">
                                    <td>@{{(index + 1)}}</td>
                                    <td>
                                        {{-- <img v-if="file.blob" :src="file.blob" width="40" height="auto" /> --}}
                                        <video v-if="file.blob" width="40" height="auto" controls>
                                            <source :src="file.blob"></video>
                                        <span v-else>No Video</span>
                                    </td>
                                    <td>
                                        <div class="filename">@{{file.name}}</div>
                                        <div class="progress" v-if="file.active || file.progress !== '0.00'">
                                            <div :class="{'progress-bar': true, 'progress-bar-striped': true, 'bg-danger': file.error, 'progress-bar-animated': file.active}"
                                                role="progressbar" :style="{width: file.progress + '%'}">
                                                @{{file.progress}}%</div>
                                        </div>
                                    </td>
                                    <td>@{{file.size}}</td>
                                    <td v-if="file.error">@{{file.error}}</td>
                                    <td v-else-if="file.success">success</td>
                                    <td v-else-if="file.active">active</td>
                                    <td v-else></td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-danger btn-sm dropdown-toggle" type="button"
                                                @click.prevent="removeFile(form.sports.videos, index, file.id)">Eliminar</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <label class="btn btn-danger btn-xs btn-block">
                        <file-upload v-model="form.sports.videos" accept="video/*" accept="video/*"
                            :multiple="true" @input-filter="inputFilter"></file-upload><span
                            class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    </label>
                </div>
            </div>-->
        </div>
    </fieldset>	
    {{-- Zona infantil --}}
    <fieldset>
        <legend><b>Zona infantil</b></legend>
        <div class="row">
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="description">Descripción:</label>
                    <input type="text" maxlength="255" v-model="form.childarea.description" class="form-control" placeholder="Comentario">
                </div>
            </div>
           <!-- <div class="col-xs-12">
                <div class="form-group">
                    <label for="size">Tamaño aproximado:</label>
					<input type="text" v-model="form.childarea.size" class="form-control" placeholder="Mts">
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="type">Tipo:</label>
                    <select v-model="form.childarea.type" class="form-control">
                        <option></option>
                        <option>Particular</option>
                        <option>Comunitario</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="number">Número de plazas:</label>
                    <select class="form-control" v-model="form.childarea.number">
                        <option></option>
                        <option>1</option>
                        <option>2</option>
                        <option>+2</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="situation">¿Está en el mismo edificio?:</label>
                    <select class="form-control" v-model="form.childarea.situation">
                        <option></option>
                        <option>Si</option>
                        <option>No, está en un parking exterior</option>
                        <option>No, esta en un parking cercano</option>
                    </select>
                </div>
            </div>-->
        </div>
        <div class="row">
                <!--<div class="col-md-6">-->
				<div class="col-xs-12">
                <div class="form-group">
                    <div class="table-responsive">
                        <table class="table table-hover">
                           <!-- <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Fotos</th>
                                </tr>
                            </thead>-->
                            <tbody>
                                <tr v-if="!form.childarea.files.length">
                                    <td colspan="6">
                                        <div class="text-center p-5">
                                            <h4>Listado de fotos</h4>
                                        </div>
                                    </td>
                                </tr>
                                <tr v-for="(file, index) in form.childarea.files" :key="file.id">
                                    <td>@{{(index + 1)}}</td>
                                    <td>
                                        <img v-if="file.blob" :src="file.blob" width="40" height="auto" />
                                        <span v-else>No Image</span>
                                    </td>
                                    <td>
                                        <div class="filename">@{{file.name}}</div>
                                        <div class="progress" v-if="file.active || file.progress !== '0.00'">
                                            <div :class="{'progress-bar': true, 'progress-bar-striped': true, 'bg-danger': file.error, 'progress-bar-animated': file.active}"
                                                role="progressbar" :style="{width: file.progress + '%'}">
                                                @{{file.progress}}%</div>
                                        </div>
                                    </td>
                                    <td>@{{file.size}}</td>
                                    <td v-if="file.error">@{{file.error}}</td>
                                    <td v-else-if="file.success">success</td>
                                    <td v-else-if="file.active">active</td>
                                    <td v-else></td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-danger btn-sm dropdown-toggle" type="button"
                                                @click.prevent="removeFile(form.childarea.files, index, file.id)">Eliminar</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <label class="btn btn-info btn-xs btn-block">
                            <file-upload v-model="form.childarea.files" accept="image/jpg,image/jpeg" accept="image/jpg,image/jpeg"
                                :multiple="true" @input-filter="inputFilter"></file-upload><span
                                class="glyphicon glyphicon-search" aria-hidden="true"></span>
                        </label>    
                    </div>
                </div>
            </div>
           <!-- <div class="col-md-6">
                <div class="form-group">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nota Adicional video</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="!form.childarea.videos.length">
                                    <td colspan="6">
                                        <div class="text-center p-5">
                                            <h4>Listado de videos</h4>
                                        </div>
                                    </td>
                                </tr>
                                <tr v-for="(file, index) in form.childarea.videos" :key="file.id">
                                    <td>@{{(index + 1)}}</td>
                                    <td>
                                        {{-- <img v-if="file.blob" :src="file.blob" width="40" height="auto" /> --}}
                                        <video v-if="file.blob" width="40" height="auto" controls>
                                            <source :src="file.blob"></video>
                                        <span v-else>No Video</span>
                                    </td>
                                    <td>
                                        <div class="filename">@{{file.name}}</div>
                                        <div class="progress" v-if="file.active || file.progress !== '0.00'">
                                            <div :class="{'progress-bar': true, 'progress-bar-striped': true, 'bg-danger': file.error, 'progress-bar-animated': file.active}"
                                                role="progressbar" :style="{width: file.progress + '%'}">
                                                @{{file.progress}}%</div>
                                        </div>
                                    </td>
                                    <td>@{{file.size}}</td>
                                    <td v-if="file.error">@{{file.error}}</td>
                                    <td v-else-if="file.success">success</td>
                                    <td v-else-if="file.active">active</td>
                                    <td v-else></td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-danger btn-sm dropdown-toggle" type="button"
                                                @click.prevent="removeFile(form.childarea.videos, index, file.id)">Eliminar</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <label class="btn btn-danger btn-xs btn-block">
                        <file-upload v-model="form.childarea.videos" accept="video/*" accept="video/*"
                            :multiple="true" @input-filter="inputFilter"></file-upload><span
                            class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    </label>
                </div>
            </div>-->
        </div>
    </fieldset>	
    <hr />	
    <!--<div class="form-group">
        <button type="submit" class="btn btn-primary btn-block" :disabled="loading">Guardar</button>
    </div>-->
{{-- Sección de feedback para la subida --}}
<div v-if="uploadError" class="alert alert-danger">
    <i class="glyphicon glyphicon-exclamation-sign"></i>
    Error en la subida: @{{ uploadError }}
    <button @click="uploadError = null" class="close">&times;</button>
</div>

<!-- Información de progreso mejorada -->
<!-- Información de progreso mejorada - CON Z-INDEX MAYOR -->
<div v-if="loading" class="alert" id="upload-progress" style="position: relative; z-index: 9999;">
    <div class="upload-status mb-2">
        <i class="glyphicon glyphicon-cloud-upload"></i>
        <strong>@{{ statusMessage }}</strong>
    </div>
    
    <div class="progress">
        <div class="progress-bar progress-bar-striped active" 
             role="progressbar" 
             :style="{ width: uploadProgress + '%' }">
            <span>@{{ uploadProgress }}%</span>
        </div>
    </div>
    
    <div class="upload-details">
        <div class="upload-info-grid">
            <div class="upload-info-item">
<!-- Archivos -->
<span class="label">Archivos</span>
<span class="value">@{{ uploadedFiles || 0 }}/@{{ totalFiles || 0 }}</span>
            </div>
            
            <div class="upload-info-item">
<!-- Velocidad -->
<span class="label">Velocidad</span>
<span class="value speed-meter">
    <i class="glyphicon glyphicon-dashboard speed-icon"></i>
    @{{ getSpeedText ? getSpeedText() : 'Calculando...' }}
</span>
            </div>
            
            <div class="upload-info-item">
                <span class="label">Tiempo estimado</span>
                <span class="value">
                    <i class="glyphicon glyphicon-time"></i>
                    @{{ formattedEstimatedTime }}
                </span>
            </div>
            
            <div class="upload-info-item" v-if="totalSize > 0">
<!-- Tamaño total -->
<span class="label">Tamaño total</span>
<span class="value">@{{ formattedTotalSize ? formattedTotalSize : 'Calculando...' }}</span>
            </div>
        </div>
    </div>
</div>

<!-- Estadísticas antes de subir -->
<div v-if="totalFiles > 0 && !loading" class="upload-stats">
    <div class="row">
        <div class="col-md-12">
            <h5><i class="glyphicon glyphicon-info-sign"></i> Resumen de subida</h5>
            <div class="row mt-2">
                <div class="col-sm-6">
                    <small>
                        <i class="glyphicon glyphicon-file"></i>
                        <strong>Archivos a subir:</strong> @{{ totalFiles }}
                    </small>
                </div>
                <div class="col-sm-6">
                    <small v-if="totalSize > 0">
                        <i class="glyphicon glyphicon-hdd"></i>
                        <strong>Tamaño total:</strong> @{{ formattedTotalSize }}
                    </small>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-md-12">
                    <small>
                        <i class="glyphicon glyphicon-time"></i>
                        <strong>Tiempo estimado:</strong> 
                        @{{ formattedEstimatedTime }}
                        <span v-if="totalFiles > 20" class="text-warning">
                            (Puede tardar varios minutos)
                        </span>
                        <span v-else-if="totalFiles > 10" class="text-info">
                            (Tardará unos minutos)
                        </span>
                        <span v-else class="text-success">
                            (Solo unos segundos)
                        </span>
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Capa bloqueante SOLO durante subida de archivos --}}
<div v-if="isMobile && uploadStatus === 'subiendo'" 
     class="mobile-blocker"
     style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 9998; background: rgba(0,0,0,0.02); pointer-events: all;">
</div>
{{-- Botón de envío mejorado --}}
<div class="form-group mt-4">
    <button type="submit" 
            class="btn btn-primary btn-lg btn-block"
            :disabled="loading"
            :class="{ 'btn-success': uploadStatus === 'completado', 'btn-warning': uploadStatus === 'procesando' }">
        
        <template v-if="!loading">
            <i class="glyphicon glyphicon-upload"></i>
            <span v-if="totalFiles > 0">
                Subir @{{ totalFiles }} archivos (@{{ formattedTotalSize }})
            </span>
            <span v-else>
                Guardar información
            </span>
        </template>
        
        <template v-if="loading">
            <i class="glyphicon glyphicon-refresh spinning"></i>
            <span>@{{ statusMessage }}</span>
        </template>
    </button>
    
    <div v-if="totalFiles > 0 && !loading" class="text-center mt-2">
        <small class="text-muted">
            <i class="glyphicon glyphicon-warning-sign"></i>
            No cierres esta ventana durante la subida
        </small>
    </div>
</div>
</form>