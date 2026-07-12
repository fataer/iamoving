@extends('layouts.iamovingpro')
@section('title', 'IAMOVING - Fácil de alquilar, comprar y vender')
@section('description', '¡Fácil de alquilar, comprar y vender!')
@section('image', 'https://iamoving.com/img/iamoving.png')
@section('content')
    <section class="hero-section set-bg" 
        data-setbg="{{ Voyager::image($foto_portoda->foto_principal)}}" 
        style="
            background-color: rgba(0,0,0,0.8); 
            filter:brightness(1);  
            margin-top: -200px;
            box-shadow:  0px -40px 0px #615c5c;
            height: 500px;
        ">
    </section>

    <div class="container mt-5 pt-5">
        <h1 class="display-4 text-center">Barrios</h1>
        <div class="row mt-5">
            @foreach ($canales as $key)
                <div class="col-lg-4 mb-4">
                    <video-card href="/barrio/{{$key->zone_id}}" 
                        source="https://www.youtube.com/embed/{{$key->video_principal}}" 
                        :body="{{$key}}" />
                </div>
            @endforeach
        </div>
    </div>
@endsection