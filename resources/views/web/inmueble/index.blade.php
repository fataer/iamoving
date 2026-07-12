@extends('layouts.iamovingpro')
@section('title', 'IAMOVING - Busca tu casa')
@section('description', '¡Busca tu casa!')
@section('image', 'https://iamoving.com/img/iamoving.png')
@section('content')
@if (strpos(url()->current(),"/en")) 
    <div class="container mt-5">
	
        <h1 class="display-4 text-center">Estates</h1>
        <div class="row mt-5">
            @foreach ($inmuebles as $inmueble)
                <div class="col-lg-4 mb-4">
                    <show-case-en :data="{{$inmueble}}"></show-case-en>
                </div>
            @endforeach
        </div>
        <div>
            {{ $inmuebles->links() }}
        </div>
    </div>
@else
    <div class="container mt-5">
		<h1 class="display-4 text-center">Inmuebles</h1>
        <div class="row mt-5">
            @foreach ($inmuebles as $inmueble)
                <div class="col-lg-4 mb-4">
                    <show-case :data="{{$inmueble}}"></show-case>
                </div>
            @endforeach
        </div>
        <div>
            {{ $inmuebles->links() }}
        </div>
    </div>
@endif	
@endsection