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
    <div class="container mb-5">
        <div class="row text-center justify-content-center">
            <div class="col-10">
                <h1>COLOBORADOR COMERCIAL AUDIOVISUAL A MITAD DE OBJETIVOS</h1>

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
                

                <form action="{{ url('colabora_notificar_mitad_objetivo') }}" method="post" id="frm_colabora" onsubmit="loading()" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                   <!-- <div class="row">
                        <div class="form-group col-md-6">
                            <input placeholder="Nombre de la Empresa" type="text" id="company" name="company" class="form-control" autofocus required>
                        </div>
                        <div class="form-group col-md-6">
                            <input placeholder="Sitio Web" type="text" id="web" name="web" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <input placeholder="Dirección de la Empresa" type="text" id="address" name="address" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <input placeholder="E-mail" type="email" id="email" name="email" class="form-control" required>
                        </div>
                    </div>-->

                    <div class="form-group">
                        <input placeholder="Nombre y apellidos" type="text" id="name" name="name" maxlength="100" class="form-control" required>
                    </div>
                        <div class="form-group">
                            <input placeholder="E-mail" type="email" id="email" name="email" maxlength="100" class="form-control" required>
                        </div>
                    <div class="form-group">
                        <input placeholder="Movil" type="text"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  id="phone" name="phone" maxlength="15" class="form-control" required>
                    </div>
                        <div class="form-group">
                            <input placeholder="Dirección" type="text" id="address" name="address" maxlength="120"  class="form-control" required>
                        </div>					
                        <div class="form-group">
                            <input placeholder="Número DNI/NIE" type="text" id="nif" name="nif" maxlength="20" class="form-control" required>
                        </div>	
                        <div class="form-group" style="text-align:left;">
                            <label>Foto Selfie</label>
                            <input type="file"class="form-control" id="avatar" name="avatar" accept="image/*" max-file-size="5" required/>
                        </div>
                        <div class="form-group" style="text-align:left;">
                            <label>DNI/NIE(envíanos fotos de ambas caras de tu documento)</label>
                            <input type="file"class="form-control" id="nif_img" name="nif_img[]" accept="image/*" max-file-size="5" max="2" multiple required/>
                        </div>
                        
                    <div class="form-group form-check text-center">
						<input type="checkbox" class="form-check-input" id="conditions" name="conditions"  required>
						<label class="form-check-label" for="conditions">He leído y estoy de acuerdo con <a href="/terminos-comercial-audiovisual-mitad-objetivos" target="_blank">los términos de colaboración Comercial AudioVisual a mitad de objetivos</a> y <a href="/politica-privacidad" target="_blank">la política de privacidad </a>de IAMOVING</label>
                    </div>							
                    <!--<div class="form-group">
                        <textarea id="body" name="body" class="form-control" rows="4" placeholder="Descríbenos por favor tus servicios. ¡Cuéntenos en que te diferencias! " required></textarea>
                    </div>-->
                    <hr>
                    <div class="form-group">
                        <button class="btn btn-success btn-block" type="submit" id="btn_submit_colabora">
                            Enviar
                        </button>
                        
                    </div>
                </form>
            </div>
        </div>
  

    </div>
    
@endsection
@section('scripts')
<script>
    function loading(){
        $("#btn_submit_colabora").text('Enviando...');
        $("#btn_submit_colabora").prop('disabled', true);
    }
    
    </script>
@endsection
