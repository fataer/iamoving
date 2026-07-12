@extends('layouts.iamovingpro')
@section('title', 'IAMOVING - Fácil de alquilar, comprar y vender')
@section('description', '¡Fácil de alquilar, comprar y vender!')
@section('image', 'https://iamoving.com/img/iamoving.png')
@section('content')

    <div class="container mt-5">
        <h1 class="display-4 text-center">Estates</h1>
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
@endsection