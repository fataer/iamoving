@extends('layouts.iamovingpro')
@section('title', 'IAMOVING - Fácil de alquilar, comprar y vender')
@section('description', '¡Fácil de alquilar, comprar y vender!')
@section('image', 'https://iamoving.com/img/iamoving.png')
<style type="text/css">
   .color-letra{
     color: #2d2e35;
   } 
</style>

@section('content')
<br>
<br>
    <div class="container my-5">


        
        <div class="row text-center justify-content-center">
            <div class="col-12">
                <h1>Perfil</h1>
            

                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                
                @if ($message = Session::get('error'))                
                    <div class="alert alert-danger alert-block">
                        <strong>{{ $message }}</strong>
                    </div>
                @endif

            </div>
        </div>

        <div class="w-75 mx-auto">
            <div class="bg-warning my-4" style="min-height: 1px;"></div>
        </div>   

        <div class="row">
            <div class="col-12">
            <form id="profileForm" method="post" @submit.prevent="profileSubmitHandle" ref="pform">
                {!! csrf_field() !!}    
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input placeholder="Nombre" type="text" id="name" name="name" class="form-control"  autofocus required onkeyup="preventSpecials(event)">
                        </div>
                        <div class="form-group">
                            <label>E-mail</label>
                            <input placeholder="E-mail" type="email" id="email" name="email" class="form-control" required onkeyup="preventSpecials(event)">
                        </div>
                        <div class="form-group">
                            <label>Teléfono</label>
                            <input placeholder="Telefono" type="text" id="phone" name="phone" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  required onkeyup="preventSpecials(event)">
                        </div>
                       <!-- <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Fecha de Nacimiento</label>
                                    <input type="text" id="birthday" name="birthday" class="form-control pickdate" maxlength="10" readonly style="background-color:white;" required>
                                </div>
                            </div>
                            <label></label>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Sexo</label>
                                    <select id="genre" name="genre" class="form-control">
                                        <option value="">Seleccione</option>
                                        <option value="Masculino">Masculino</option>
                                        <option value="Femenino">Femenino</option>
                                    </select>
                                </div>
                            </div>
                            <label></label>
                        </div>	-->					

                    </div>
                    <div class="col-md-7">
                        <!--<div class="form-group">
                            <label>¿Estudias o trabajas?</label>
                            <select id="study_work" name="study_work" class="form-control">
                                <option value="">Seleccione</option>
                                <option value="estudio">Estudio</option>
                                <option value="trabajo">Trabajo</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>¿Te mudas con <b>alguien mas</b>?</label>
                            <select id="number_moving" name="number_moving" class="form-control">
                                <option value="">Seleccione</option>
                                <option value="1 Persona">1 Persona</option>
                                <option value="2 Personas">2 Personas</option>
                                <option value="3 Personas">3 Personas</option>
                                <option value="Mas de 3">Mas de 3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Por favor cuentanos mas sobre ti y donde vas a trabajar estudiar</label>
                            <textarea class="form-control" name="comment" id="comment" rows="4" onkeydown="preventSpecials(event)"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Nota: Recuerda que tu información adicional, puede ser muy valiosa para el propietario</label>
                            
                        </div>-->
                        <div class="form-group">
                            <label><b>Si quieres alquilar, recuerda que tu información es muy valiosa para el propietario porque suelen dar preferencia cuando saben más de ti. Te dejamos algunas sencillas preguntas que a ellos normalmente les gusta saber antes de concretar una visita o aceptar una oferta:</b></label>
                            
                        </div>							
                        <div class="form-group">
						   <div class="row">
                                <div class="col-md-6">
									<label>¿Cuántos inquilinos vais a vivir?</label>
									<select id="numero_personas" name="numero_personas" class="form-control" required>
										@for ($i = 1; $i <= 20; $i++)
											<option value="{{ $i }}">{{ $i }}</option>    
										@endfor
									</select>
                                </div>
                                <div class="col-md-6">	
									<label>¿Tipo de relación entre los inquilinos?</label>
                                  <select id="tipo_personas" name="tipo_personas" class="form-control" required>
									<option value=""></option>
									<option value="Solo para mi">Solo para mi</option>
									<option value="Pareja">Pareja</option>
									<option value="Familia">Familia</option>
									<option value="Compañeros de trabajo">Compañeros de trabajo</option>
									<option value="Estudiantes">Estudiantes</option>
									<option value="Amigos">Amigos</option>
								</select>
                                </div>								
                        </div>
						<div class="row">
							<div class="form-group col-md-6">
								<label>¿Los inquilinos estáis Trabajando o Estudiando?</label>
								<select id="estudias_o_trabajas" name="estudias_o_trabajas" class="form-control" required>
									<option value=""></option>							
									<option value="Trabajando">Trabajando</option>
									<option value="Estudiando">Estudiando</option>
									<!--<option value="Pensionista">Pensionista</option>-->
									<option value="Sin trabajar">Sin trabajar</option>
									<option value="Estudiando y trabajando">Estudiando y trabajando</option>
								</select>							
							</div>
							<div class="form-group col-md-6">
								<label>¿Tenéis mascotas?</label>
								<select id="mascotas" name="mascotas" class="form-control" required>
									<option value=""></option>							
									<option value="No">No</option>
									<option value="Perro">Perro</option>
									<option value="Gato">Gato</option>
									<option value="2 perros">2 perros</option>
									<option value="2 gatos">2 gatos</option>
									<option value="Perro y gato">Perro y gato</option>
									<option value="+ de 2 perros o gatos">+ de 2 perros o gatos</option>
								</select>							
							</div>						
						</div>
					<div class="row" id="trabajando1">
						<div class="form-group col-md-6">
								<label>¿Dónde trabajáis los inquilinos y/o los avalistas?</label>
							<input type="text" id="trabajo" name="trabajo" class="form-control"  maxlength="160" required>							
						</div>
						<div class="form-group col-md-6">

								<label>¿Función que desempeñáís los inquilinos y/o los avalistas?</label>							
								<input type="text" id="tipo_trabajo" name="tipo_trabajo" class="form-control" maxlength="160" required>							
						</div>						
					</div>
					<div class="row" id="trabajando2">
						<div class="form-group col-md-6">

								<label>Tipo de contrato de los inquilinos y/o los avalistas: autónomo, indefinido, temporal, obra y servicio, becario, ¿otros?</label>					
							<!--<label>Tipo de contrato: autónomo, indefinido, temporal, obra y servicio, becario, ¿otros?</label>-->
								<input type="text" id="tipo_contrato" name="tipo_contrato" class="form-control"  maxlength="160" required>		
						</div>
						<div class="form-group col-md-6">
								<label>Sueldo neto mensual aproximado entre todos los inquilinos y los avalistas</label>

							<input type="text" id="sueldo_aproximado" name="sueldo_aproximado" class="form-control" maxlength="18" required>				
						</div>						
					</div>
					<div class="row">
						<div class="form-group col-md-6">
							<label>¿Entraríais a partir de cuándo?</label>
	          				<input type="text" id="fecha_desde" name="fecha_desde" class="form-control" autocomplete="off" maxlength="10" readonly style="background-color:white;" required>							
						</div>
						<div class="form-group col-md-6">
							<label>¿Duración mínima del alquiler?</label>
							<select id="duracion_alquiler" name="duracion_alquiler" class="form-control" required>
								<option value=""></option>							
								<option value="1 mes">1 mes</option>
								<option value="3 meses">3 meses</option>
								<option value="6 meses">6 meses</option>
								<option value="9 meses">9 meses</option>
								<option value="1 año">1 año</option>
								<option value="1 año y medio">1 año y medio</option>
								<option value="2 años">2 años</option>
								<option value="3 años">3 años</option>
								<option value="4 años">4 años</option>
								<option value="5 años">5 años</option>
								<option value="+ de 5 años">+ de 5 años</option>
								<option value="indefinido">indefinido</option>								
							</select>							
						</div>						
					</div>
					<div class="row">
	            		<div class="form-group  col-md-12">
	            			<label>Cuéntanos un poco sobre ti</label>
	            			<textarea id="comentario_persona" name="comentario_persona" class="form-control" rows="2" maxlength="250"></textarea>
	            		</div>
					</div>					
                        
                    </div>
                </div>
                <div class="row">
                    
                </div>    
                <hr>
                <div class="text-center">
                    <button id="btnSave" type="submit" class="btn btn-dark" style="color:#EADD1B;">GUARDAR CAMBIOS</button>
                </div>
            </form>
            </div>
        </div>
                

    </div>

    <div id="modalPerfil" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="modal-request-title" class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <h5>Guardando su petición</h5><br>
                    <div class="waiting"></div>
                    <br>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/jquery.form.min.js') }}" defer></script>
    <script src="{{ asset('js/sweetalert2.min.js') }}" defer></script>
    <script>
        $(document).ready(function() { 

		
			var today = new Date();
			var dd = today.getDate();
			var mm = today.getMonth() + 1;
			var yyyy = today.getFullYear();
			if (dd < 10) {
  				dd = '0' + dd;
			} 
			if (mm < 10) {
  				mm = '0' + mm;
			} 
			var today = dd + '/' + mm + '/' + yyyy;
			$('#fecha_desde').datepicker({
                language: "es",
                format: "dd/mm/yyyy",
    			startDate: today,
    			autoclose: true,
    			ignoreReadonly: true
				//orientation: 'top'
    			//daysOfWeekDisabled: disable_days
            });	

			$("#btnSave").click(function(){
				$("#fecha_desde").removeAttr("readonly");
				//$("#birthday").removeAttr("readonly");
			});
            /*function processJson(data) { 
                $("#btnSave").prop("disabled",false);
                $("#btnSave").html('GUARDAR CAMBIOS');
                if(data.success){
                    $("#modalPerfil").modal('hide');
                    Swal.fire(
                        'Gracias',
                        'Su información ha sido recibida!',
                        'success'
                    );
                }else{
                    Swal.fire(
                        'Lo sentimos',
                        'No hemos podido recibir su información. Intente nuevamente',
                        'error'
                    );
                }
            }

            function errorRequest(){
                $("#btnSave").prop("disabled",false);
                $("#btnSave").html('GUARDAR CAMBIOS');
                Swal.fire(
                    'Lo sentimos',
                    'No hemos podido recibir su información. Intente nuevamente',
                    'error'
                );
            }
            
            $('#profileForm').ajaxForm({ 
                dataType:  'json',         
                success:   processJson,
                beforeSubmit: function(arr, $form, options) {                  
                    $("#btnSave").prop("disabled",true);
                    $("#btnSave").html('Enviando su información');
                    $("#modalPerfil").modal('show');
                },
                error: errorRequest
            });
            
            $("#btnSave").click(function(){
                $('#profileForm').submit();              
            });*/

            var user = JSON.parse(localStorage.getItem("user"));
            console.log(user);
            $("#name").val(user.name);
            $("#email").val(user.email);
            $("#phone").val(user.phone);
            /*$("#birthday").val(user.fecha_nacimiento);
            if(user.sexo){
                $("#genre").val(user.sexo);
            }*/
            /*if(user.trabajas){
                $("#study_work").val((user.trabajas == "S") ? "trabajo" : "estudio");   
            }
            if(user.numero_mudar){
                $("#number_moving").val(user.numero_mudar);      
            }
            $("#comment").val(user.comentario);*/

            $("#numero_personas").val(user.numpersonas_alquiler);
            $("#tipo_personas").val(user.familia_alquiler);
			$("#estudias_o_trabajas").val(user.estudias_o_trabajas);
			$("#mascotas").val(user.mascotas);
			$("#trabajo").val(user.dondetrabajas_alquiler);
			$("#tipo_trabajo").val(user.trabajo_alquiler);
			$("#tipo_contrato").val(user.tipocontrato_alquiler);
			$("#sueldo_aproximado").val(user.sueldoaproximado_alquiler);
			$("#fecha_desde").val(user.fecha_desde_alquiler);
			$("#duracion_alquiler").val(user.duracion_alquiler);
			
			$("#comentario_persona").val(user.sobreti_alquiler);
           /* $("#trabajo").val(user.dondetrabajas_alquiler);
            $("#tipo_trabajo").val(user.trabajo_alquiler);
            $("#estudiante").val(user.estudias_alquiler);
            $("#tipo_estudiante").val(user.queestuias_alquiler);
            $("#comentario_persona").val(user.sobreti_alquiler);*/

            
        });
        function preventSpecials(evt){
            evt.target.value = evt.target.value.replace("'","").replace('"',"").replace("?","").replace("¿","").replace(">","").replace("<","").replace("!","").replace("¡","").replace('&',"").replace('=',"");
        }
    </script>
<script type="text/javascript">
var idleTime = 0;
$(document).ready(function () {
    //Increment the idle time counter every minute.
    var idleInterval = setInterval(timerIncrement, 60000); // 1 minute

    //Zero the idle timer on mouse movement.
    $(this).mousemove(function (e) {
        idleTime = 0;
    });
    $(this).keypress(function (e) {
        idleTime = 0;
    });
});

function timerIncrement() {
    idleTime = idleTime + 1;
    if (idleTime > 8) { // 7 minutes
        window.location.reload();
    }
}
</script>	
@endsection