@extends('layouts.iamovingpro')
@section('title', 'IAMOVING - Fácil de alquilar, comprar y vender')
@section('description', '¡Fácil de alquilar, comprar y vender!')
@section('image', 'https://iamoving.com/img/iamoving.png')
@section('content')

    <div class="container">
        <div  class="text-center mt-4">
            <h1>
              COLABORADOR IAMOVING
            </h1>
            
			<h4>{{$service->name}}</h4>
        </div>
        <hr>
        
        <hr>
        <div class="fb-comments" data-href="{{ env('APP_DEBUG') ? 'http://localhost' : url()->current() }}" data-width="100%" data-numposts="5"></div>
    </div>
@endsection
