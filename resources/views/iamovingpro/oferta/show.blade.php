@extends('layouts.iamovingpro')
@section('title')
    {{ App\Helpers\InmuebleHelper::generarTitulo($detalle, $ciudad ?? null) }}
@endsection

@section('description')
    {{ App\Helpers\InmuebleHelper::generarDescripcion($detalle) }}
@endsection

@section('image')
    {{ App\Helpers\InmuebleHelper::generarUrlImagen($detalle) }}
@endsection
@section('content')
    <section class="gallery-section spad" style="padding-top: 20px;padding-bottom: 0px;">
											<div class="container my-2">
													<!--  <div class="row mt-3">
														<div class="col-md-2">
														</div>
												
															<div class="col-md-8 text-center mb-3">
																	<img src="/img/icono.png"  width="450" height="150" style="margin-bottom:10px;">
															</div>
														<div class="col-md-2">
														</div>
													</div>	-->
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
														<!--	 <div class="row mt-3">
																<div class="col-md-2">
																</div>
														
																	<div class="col-md-8 text-center mb-3">
																			<img src="/img/owner.png"  width="70" height="70" style="margin-bottom:10px;" alt="playa">
																	</div>
																<div class="col-md-2">
																</div>
															</div>	-->					
				
															<h2 class="card-text text-center mb-0">OFERTA DE ARRENDAMIENTO</h2>
															<h2 class="card-text text-center mb-5">Ref. {{$detalle->id}} </h2>																
										
										


			
			<div class="container my-0 mt-3">				
					
						<div class="container my-0 mt-1">											
							<div class="container" style="background-color:white;">
							</div>
						</div>
				<form action="{{ url('oferta-formulario') }}" method="post" id="frm_colabora" onsubmit="loading()" enctype="multipart/form-data">

                    {!! csrf_field() !!}
					<div class="form-group">
                            <input placeholder="E-mail de contacto de uno de los arrendatarios" type="email" id="email" name="email" maxlength="100" class="form-control" required>
                    </div>					
					<h5 class="card-text text-center mb-4"><b>AVISO IMPORTANTE</b>: Por favor, envíanos los datos y la documentación de todos los que serán los arrendatarios del contrato de arrendamiento. Lo mismo, en el caso de haber avalistas.</h5>	
					
					<h5 class="card-text text-center mb-0"><b>ARRENDATARIOS</b></h5>
					@if ($_GET['inqui']==1)
						<input type="hidden" id="numero_arrendatarios"  name="numero_arrendatarios"  value="1" />
                    <div class="form-group">
						<label><u><b>Datos del Arrendatario</b></u></label>
                        <input placeholder="Nombre y apellidos" type="text" id="name" name="name" maxlength="100" class="form-control" required>
                    </div>
					<div class="form-group">
						<input placeholder="Número DNI/NIE" type="text" id="nif" name="nif" maxlength="10" class="form-control" required>
					</div>						
					@endif
					@if ($_GET['inqui']==2)
						<input type="hidden" id="numero_arrendatarios"  name="numero_arrendatarios"  value="2" />
                    <div class="form-group">
						<label><u><b>Datos del primer Arrendatario</b></u></label>
                        <input placeholder="Nombre y apellidos" type="text" id="name" name="name" maxlength="100" class="form-control" required>
                    </div>
					<div class="form-group">
						<input placeholder="Número DNI/NIE" type="text" id="nif" name="nif" maxlength="10" class="form-control" required>
					</div>	
                    <div class="form-group">
						<label><u><b>Datos del segundo Arrendatario</b></u></label>
                        <input placeholder="Nombre y apellidos" type="text" id="name2" name="name2" maxlength="100" class="form-control" required>
                    </div>
					<div class="form-group">
						<input placeholder="Número DNI/NIE" type="text" id="nif2" name="nif2" maxlength="10" class="form-control" required>
					</div>						
					@endif
					@if ($_GET['inqui']==3)
						<input type="hidden" id="numero_arrendatarios"  name="numero_arrendatarios"  value="3" />
                    <div class="form-group">
						<label><u><b>Datos del primer Arrendatario</b></u></label>
                        <input placeholder="Nombre y apellidos" type="text" id="name" name="name" maxlength="100" class="form-control" required>
                    </div>
					<div class="form-group">
						<input placeholder="Número DNI/NIE" type="text" id="nif" name="nif" maxlength="10" class="form-control" required>
					</div>	
                    <div class="form-group">
						<label><u><b>Datos del segundo Arrendatario</b></u></label>
                        <input placeholder="Nombre y apellidos" type="text" id="name2" name="name2" maxlength="100" class="form-control" required>
                    </div>
					<div class="form-group">
						<input placeholder="Número DNI/NIE" type="text" id="nif2" name="nif2" maxlength="10" class="form-control" required>
					</div>
                    <div class="form-group">
						<label><u><b>Datos del tercer Arrendatario</b></u></label>
                        <input placeholder="Nombre y apellidos" type="text" id="name3" name="name3" maxlength="100" class="form-control" required>
                    </div>
					<div class="form-group">
						<input placeholder="Número DNI/NIE" type="text" id="nif3" name="nif3" maxlength="10" class="form-control" required>
					</div>					
					@endif
					@if ($_GET['inqui']==4)
						<input type="hidden" id="numero_arrendatarios"  name="numero_arrendatarios"  value="4" />
                    <div class="form-group">
						<label><u><b>Datos del primer Arrendatario</b></u></label>
                        <input placeholder="Nombre y apellidos" type="text" id="name" name="name" maxlength="100" class="form-control" required>
                    </div>
					<div class="form-group">
						<input placeholder="Número DNI/NIE" type="text" id="nif" name="nif" maxlength="10" class="form-control" required>
					</div>	
                    <div class="form-group">
						<label><u><b>Datos del segundo Arrendatario</b></u></label>
                        <input placeholder="Nombre y apellidos" type="text" id="name2" name="name2" maxlength="100" class="form-control" required>
                    </div>
					<div class="form-group">
						<input placeholder="Número DNI/NIE" type="text" id="nif2" name="nif2" maxlength="10" class="form-control" required>
					</div>
                    <div class="form-group">
						<label><u><b>Datos del tercer Arrendatario</b></u></label>
                        <input placeholder="Nombre y apellidos" type="text" id="name3" name="name3" maxlength="100" class="form-control" required>
                    </div>
					<div class="form-group">
						<input placeholder="Número DNI/NIE" type="text" id="nif3" name="nif3" maxlength="10" class="form-control" required>
					</div>					
                    <div class="form-group">
						<label><u><b>Datos del cuarto Arrendatario</b></u></label>
                        <input placeholder="Nombre y apellidos" type="text" id="name4" name="name4" maxlength="100" class="form-control" required>
                    </div>
					<div class="form-group">
						<input placeholder="Número DNI/NIE" type="text" id="nif4" name="nif4" maxlength="10" class="form-control" required>
					</div>					
					@endif
					@if ($_GET['inqui']==5)
						<input type="hidden" id="numero_arrendatarios"  name="numero_arrendatarios"  value="5" />
                    <div class="form-group">
						<label><u><b>Datos del primer Arrendatario</b></u></label>
                        <input placeholder="Nombre y apellidos" type="text" id="name" name="name" maxlength="100" class="form-control" required>
                    </div>
					<div class="form-group">
						<input placeholder="Número DNI/NIE" type="text" id="nif" name="nif" maxlength="10" class="form-control" required>
					</div>	
                    <div class="form-group">
						<label><u><b>Datos del segundo Arrendatario</b></u></label>
                        <input placeholder="Nombre y apellidos" type="text" id="name2" name="name2" maxlength="100" class="form-control" required>
                    </div>
					<div class="form-group">
						<input placeholder="Número DNI/NIE" type="text" id="nif2" name="nif2" maxlength="10" class="form-control" required>
					</div>
                    <div class="form-group">
						<label><u><b>Datos del tercer Arrendatario</b></u></label>
                        <input placeholder="Nombre y apellidos" type="text" id="name3" name="name3" maxlength="100" class="form-control" required>
                    </div>
					<div class="form-group">
						<input placeholder="Número DNI/NIE" type="text" id="nif3" name="nif3" maxlength="10" class="form-control" required>
					</div>					
                    <div class="form-group">
						<label><u><b>Datos del cuarto Arrendatario</b></u></label>
                        <input placeholder="Nombre y apellidos" type="text" id="name4" name="name4" maxlength="100" class="form-control" required>
                    </div>
					<div class="form-group">
						<input placeholder="Número DNI/NIE" type="text" id="nif4" name="nif4" maxlength="10" class="form-control" required>
					</div>	
                    <div class="form-group">
						<label><u><b>Datos del quinto Arrendatario</b></u></label>
                        <input placeholder="Nombre y apellidos" type="text" id="name5" name="name5" maxlength="100" class="form-control" required>
                    </div>
					<div class="form-group">
						<input placeholder="Número DNI/NIE" type="text" id="nif5" name="nif5" maxlength="10" class="form-control" required>
					</div>						
					@endif						
					<label><u><b>Datos de la oferta</b></u></label>
						 <div class="form-group">
							<label><b>Importe de la Oferta (€)</b>:</label>
							<!--<input type="number" min="100" max="700000" step="1" placeholder="Oferta" id="importe" name="importe"  class="form-control" maxlength="7" required>-->
							<input type="text" id="importe1" name="importe1"  class="form-control" maxlength="10" readonly value="{{ number_format($detalle->propiedad_precio, 0, ',', '.') }}" required>
						</div>	
	          			<div class="form-group">
	          				<input type="text" placeholder="Fecha de entrada" id="date" name="date" class="form-control" autocomplete="off" required>
	          			</div>						
						<h5 class="card-text text-center mb-0"><b><u>SUBIR DOCUMENTACIÓN ARRENDATARIOS</u></h5>	
                        <div class="form-group" style="text-align:left;">
                            <label>DNI/NIE o Pasaporte de los arrendatarios  (envíanos fotos de ambas caras de tu documento)</label>
                            <input type="file"class="form-control" id="nif_img" name="nif_img[]" accept="image/*,.pdf" max-file-size="15" max="10" multiple required />
                        </div>
                        <div class="form-group" style="text-align:left;">
                            <label>Contratos de trabajo de los arrendatarios</label>
                            <input type="file"class="form-control" id="contrato_img" name="contrato_img[]" accept="image/*,.pdf" max-file-size="15" max="10" multiple />
                        </div>
                        <div class="form-group" style="text-align:left;">
                            <label>2 últimas nóminas de los arrendatarios</label>
                            <input type="file"class="form-control" id="nomina_img" name="nomina_img[]" accept="image/*,.pdf" max-file-size="15" max="10" multiple />
                        </div>						
						@if ($_GET['aval']=='S')
						<h5 class="card-text text-center mb-0"><b><u>SUBIR DOCUMENTACIÓN AVALISTAS</u></h5>	
							<input type="hidden" id="avalistas"  name="avalistas"  value="S" />
                        <div class="form-group" style="text-align:left;">
                            <label>DNI/NIE o Pasaporte de los avalistas (envíanos fotos de ambas caras de tu documento)</label>
                            <input type="file"class="form-control" id="nif_img_aval" name="nif_img_aval[]" accept="image/*,.pdf" max-file-size="15" max="10" multiple required/>
                        </div>
						<div class="form-group" style="text-align:left;">
                            <label>Contratos de trabajo de los avalistas</label>
                            <input type="file"class="form-control" id="contrato_img_aval" name="contrato_img_aval[]" accept="image/*,.pdf" max-file-size="15" max="10" multiple />
                        </div>						
						<div class="form-group" style="text-align:left;">
                            <label>2 últimas nóminas de los avalistas</label>
                            <input type="file"class="form-control" id="nomina_img_aval" name="nomina_img_aval[]" accept="image/*,.pdf" max-file-size="15" max="10" multiple />
                        </div>												
						@else
						<input type="hidden" id="avalistas"  name="avalistas"  value="N" />
						@endif

							<input type="hidden" id="referencia" name="referencia"  value="{{ $detalle->id }}" />	
						<input type="hidden" id="road" name="road"  value="{{ $detalle->road }}" />
						<input type="hidden" id="numero_direccion"  name="numero_direccion"  value="{{ $detalle->numero_direccion }}" />
						<input type="hidden" id="number_apartment"  name="number_apartment"  value="{{ $detalle->number_apartment }}" />
						<input type="hidden" id="codigo_postal" name="codigo_postal"  value="{{ $detalle->codigo_postal }}" />
						<input type="hidden" id="ciudad" name="ciudad"  value="{{ $ciudad }}" />
						<input type="hidden" id="email_e" name="email_e"  value="{{ $detalle->email_e }}" />
						<input type="hidden" id="fianza" name="fianza"  value="{{ $detalle->condiciones }}" />
						<input type="hidden" id="importe" name="importe"  value="{{ $detalle->propiedad_precio }}" />
                    <div class="form-group">
                        <button class="btn btn-success btn-block" style="height:50px;" type="submit" id="btn_submit_colabora">
                            ENVIAR OFERTA
                        </button>
                        
                    </div>						
                    <!--<div class="form-group form-check text-center">
						<input type="checkbox" class="form-check-input" id="conditions" name="conditions"  required>
						<label class="form-check-label" for="conditions">He leído y estoy de acuerdo con <a href="/terminosI-condiciones" target="_blank">los términos y condiciones</a> y <a href="/politica-privacidad" target="_blank">la política de privacidad </a>de IAMOVING</label>
                    </div>-->							
                    <!--<div class="form-group">
                        <textarea id="body" name="body" class="form-control" rows="4" placeholder="Descríbenos por favor tus servicios. ¡Cuéntenos en que te diferencias! " required></textarea>
                    </div>-->
                    <hr>

                </form>

            {{-- fin contenido centrado --}}

</section>
<!-- page end-->
@endsection
@section('scripts')
<script>
    function loading(){
        $("#btn_submit_colabora").text('ENVIANDO OFERTA...');
        $("#btn_submit_colabora").prop('disabled', true);
    }
 
$(document).ready(function(){
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


			$('#date').datepicker({
                language: "es",
                format: "dd/mm/yyyy",
    			startDate: today,
    			autoclose: true,
    			ignoreReadonly: true
    			//daysOfWeekDisabled: disable_days
            });

			$('#fecha_desde').datepicker({
                language: "es",
                format: "dd/mm/yyyy",
    			startDate: today,
    			autoclose: true,
    			ignoreReadonly: true
    			//daysOfWeekDisabled: disable_days
            });	
			
            $('.clockpicker').clockpicker({
			    placement: 'top',
			    align: 'left',
			    donetext: 'OK'
			});

});
 
 </script>
@endsection