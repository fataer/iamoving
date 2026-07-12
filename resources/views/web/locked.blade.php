@extends('layouts.web')
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
        <div class="row text-center">
            <div class="col-12">
                <div class="animated">
                    <h4>¡Tu area de perfil esta bloqueada!</h4>
                </div>
            </div>
        </div>
        
        <div class="w-75 mx-auto">
            <div class="bg-warning my-4" style="min-height: 1px;"></div>
        </div>    

        <div class="row">
            <div class="col-12">
                <div class="animated text-center">
                    <p>Para obtener acceso a tus datos personales porfavor valida tu cuenta</p>
                    <button id="btnResend" class="btn btn-dark resend" style="color:#EADD1B;" type="button" @click.prevent="resend">
                        Reenviar enlace
                    </button>
                </div>
            </div>
        </div>

       

    </div>

    
@endsection
@section('scripts')
    <script>

    </script>
@endsection