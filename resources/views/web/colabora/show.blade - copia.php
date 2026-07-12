@extends('layouts.iamovingpro')
@section('title', 'IAMOVING - Fácil de alquilar, comprar y vender')
@section('description', '¡Fácil de alquilar, comprar y vender!')
@section('image', 'https://iamoving.com/img/iamoving.png')
@section('content')

    <div class="container">
		<div  class="text-center mt-4">
			<img src="{{asset('img/branding.transparente.png')}}" style="margin-right: 50px;margin-bottom: 15px;" alt="" width="233px">
		</div>
        <div  class="text-center mt-1">
            <h1>
              AGENTE COLABORADOR
            </h1>
		</div>
		<div  class="text-center mt-4">
			<img class="card-img-top" style="background-color:#EADD03;width:20%;"  src="/storage/{{$service->avatar}}" alt="Card image cap">
		</div>
		<div  class="text-center mt-4">
			<h4>nombre: <b>{{$service->name}}</b></h4>
	   <h4>móvil: <b>{{$service->phone}}</b></h4>
        </div>
        <hr>
        
        <hr>
        <div class="fb-comments" data-href="{{ env('APP_DEBUG') ? 'http://localhost' : url()->current() }}" data-width="100%" data-numposts="5"></div>
    </div>
@endsection
