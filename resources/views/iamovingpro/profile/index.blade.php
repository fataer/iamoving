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
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Fecha de Nacimiento</label>
                                    <input type="text" id="birthday" name="birthday" class="form-control pickdate"  required>
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
                        </div>						

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
                            <label>¿Cuántas personas vais a vivir en el piso?</label>
                            <select id="numero_personas" name="numero_personas" class="form-control">
                                @for ($i = 1; $i <= 20; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>    
                                @endfor
                            </select>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
									<label>¿Sois pareja, amigos, estudiantes,...?</label>
                                    <input type="text" id="tipo_personas" name="tipo_personas" class="form-control" placeholder="¿Sois pareja, amigos, estudiantes, compañeros de trabajo, es para ti solo?" maxlength="60" onkeyup="preventSpecials(event)">
                                </div>
                                <div class="col-md-6">
									<label>¿Dónde trabajas?</label>
                                    <input type="text" id="trabajo" name="trabajo" class="form-control" placeholder="¿Dónde trabajas?" maxlength="60" onkeyup="preventSpecials(event)">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
								<label>¿A qué te dedicas?</label>
                                    <input type="text" id="tipo_trabajo" name="tipo_trabajo" class="form-control" placeholder="¿A qué te dedicas?" maxlength="60" onkeyup="preventSpecials(event)">
                                </div>
                                <div class="col-md-6">
								<label>Si sois estudiantes, ¿Dónde estudiáis?</label>
                                    <input type="text" id="estudiante" name="estudiante" class="form-control" placeholder="¿Estudiantes? ¿En qué universidad, máster, escuela?" maxlength="60" onkeyup="preventSpecials(event)">
                                </div>
                            </div>
                            
                        </div>
                        <div class="form-group">
						<label>¿Qué estudias?</label>
                            <input type="text" id="tipo_estudiante" name="tipo_estudiante" class="form-control" placeholder="¿Qué estudias?" maxlength="60" onkeyup="preventSpecials(event)">
                        </div>
                        
                        <div class="form-group">
                            <label>Por favor, cuéntanos mas sobre ti</label>
                            <textarea id="comentario_persona" name="comentario_persona" class="form-control" rows="2" onkeyup="preventSpecials(event)"></textarea>
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
                    <h5>Procesando su petición</h5><br>
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
            $("#birthday").val(user.fecha_nacimiento);
            if(user.sexo){
                $("#genre").val(user.sexo);
            }
            /*if(user.trabajas){
                $("#study_work").val((user.trabajas == "S") ? "trabajo" : "estudio");   
            }
            if(user.numero_mudar){
                $("#number_moving").val(user.numero_mudar);      
            }
            $("#comment").val(user.comentario);*/

            $("#numero_personas").val(user.numpersonas_alquiler);
            $("#tipo_personas").val(user.familia_alquiler);
            $("#trabajo").val(user.dondetrabajas_alquiler);
            $("#tipo_trabajo").val(user.trabajo_alquiler);
            $("#estudiante").val(user.estudias_alquiler);
            $("#tipo_estudiante").val(user.queestuias_alquiler);
            $("#comentario_persona").val(user.sobreti_alquiler);

            
        });
        function preventSpecials(evt){
            evt.target.value = evt.target.value.replace("'","").replace('"',"").replace("?","").replace("¿","").replace(">","").replace("<","").replace("!","").replace("¡","").replace('&',"").replace('=',"");
        }
    </script>
@endsection