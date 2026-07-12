@extends('layouts.iamovingpro')
@section('title', 'IAMOVING - Busca tu casa')
@section('description', '¡Busca tu casa!')
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
            <div class="col-10">
                <h1>Trabaja con nosotros</h1>

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
                

                <form action="{{ url('unete_notificar') }}" method="post">
                    {!! csrf_field() !!}
                    <div class="row">
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
                    </div>

                    <div class="form-group">
                        <input placeholder="Nombre completo" type="text" id="name" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input placeholder="Teléfono de contacto" type="text" id="phone" name="phone" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <textarea id="body" name="body" class="form-control" rows="4" placeholder="Descríbenos por favor tus servicios. ¡Cuéntenos en que te diferencias! " required></textarea>
                    </div>
                    <hr>
                    <div class="form-group">
                        <button class="btn btn-success btn-block" type="submit">
                            Enviar
                        </button>
                    </div>
                </form>
            </div>
        </div>


    </div>
@endsection