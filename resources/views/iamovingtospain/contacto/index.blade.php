@extends('layouts.iamovingto')
@section('title', 'IAMOVING to Spain')
@section('description', '¿Te gustaría trabajar y vivir en España?')
@section('image', 'https://iamoving.com/img/avion.eapanna.png')
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
            <div class="col-10">
                <h1>Contacta con IAMOVING TO SPAIN</h1>
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
                

                <form action="{{ url('contacto_notificar') }}"  method="post" id="frm_colabora" onsubmit="return validateForm()" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <input placeholder="Nombre y Apellidos" type="text" id="name" name="name" class="form-control" maxlength="255" autofocus required>
                    </div>
                    <div class="form-group">
                        <input placeholder="E-mail" type="email" id="email" name="email" class="form-control" maxlength="255" required>
                    </div>
                    <div class="form-group">
                        <input placeholder="Asunto" type="text" id="subject" name="subject" class="form-control" maxlength="255" required>
                    </div>
                    <div class="form-group">
                        <textarea id="body" name="body" placeholder="Mensaje" class="form-control" rows="4" required maxlength="1000" ></textarea>
                        <input type="hidden" name="g-recaptcha-response" id="recaptchaResponse">
                    </div>
                    <hr>
                    <div class="form-group">
                        <button class="btn btn-success btn-block" type="submit"  id="btn_submit_colabora">
                            Enviar
                        </button>
                    </div>
					<div class="form-group form-check text-center">
						<input type="checkbox" class="form-check-input" id="conditions" name="conditions"  required>
						<label class="form-check-label" for="conditions">He leído y estoy de acuerdo con <a href="/politica-privacidad" target="_blank">la política de privacidad </a>de IAMOVING</label>
                    </div>					
                </form>
            </div>
        </div>


    </div>
@endsection
@section('scripts')
<script>
    function validateForm() {
        $("#btn_submit_colabora").text('ENVIANDO CONSULTA...');
        $("#btn_submit_colabora").prop('disabled', true);
        event.preventDefault();
        grecaptcha.ready(function() {
            grecaptcha.execute('{{ env('RECAPTCHA_SITE_KEY') }}', {action: 'submit'}).then(function(token) {
                document.getElementById('recaptchaResponse').value = token;
                document.getElementById('frm_colabora').submit();
            });
        });
        return false;
    }
    function loading(){
        $("#btn_submit_colabora").text('ENVIANDO CONSULTA...');
        $("#btn_submit_colabora").prop('disabled', true);
    }
 </script>
@endsection	