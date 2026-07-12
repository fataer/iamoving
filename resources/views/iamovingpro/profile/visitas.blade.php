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

    
@endsection
