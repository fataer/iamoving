@extends('layouts.iamovingpro')
@section('title', 'IAMOVING - Fácil de alquilar, comprar y vender')
@section('description', '¡Fácil de alquilar, comprar y vender!')
@section('image', 'https://iamoving.com/img/iamoving.png')
<style type="text/css">
   .color-letra{
     color: #2d2e35;
   } 

   .
</style>

@section('content')
<br>
<br>
    <div class="container my-5">

       
        <div class="row text-center justify-content-center">
            <div class="col-12">
                <h1>Visitas</h1>
            </div>
        </div>

        <div class="w-75 mx-auto">
            <div class="bg-warning my-4" style="min-height: 1px;"></div>
        </div>   

        <div class="row">
        	<div class="container">
            	<visitas></visitas>
            </div>
        </div>
                

    </div>
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
    if (idleTime > 8) { // 27 minutes
        window.location.reload();
    }
}
</script> 	
    
@endsection
