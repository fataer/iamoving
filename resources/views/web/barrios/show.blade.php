@extends('layouts.iamovingpro')
@section('title', 'IAMOVING - Fácil de alquilar, comprar y vender')
@section('description', '¡Fácil de alquilar, comprar y vender!')
@section('image', 'https://iamoving.com/img/iamoving.png')
@section('styles')
    <style>
    [aria-expanded]:focus {
        box-shadow: none;
    }
    </style>
@endsection

@section('content')
    <div id="fb-root"></div>
    <div style="background-color: black;">
        {{-- <video src="{{$zone->video}}" width="100%" height="400" autoplay controls></video> --}}
        <div class="embed-responsive embed-responsive-21by9">
            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$zone->video_principal}}"></iframe>
        </div>
     {{-- <iframe width="100%" height="400" src="https://www.youtube.com/embed/{{$zone->video_principal}}"
      frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
      allowfullscreen></iframe> --}}
    
    </div>
    <div class="container">
        <div class="row">
            <div class="col mt-5">
                <span class="font-weight-bold" style="font-size: 2.25rem;">
                    {{$zone->nombre}}
                </span>
                 <!--|<a href="/canal/{{$zone->id}}">Explorar</a>
             |<button class="btn btn-default p-0" data-toggle="collapse" data-target="#comments" role="button" aria-expanded="true" aria-controls="comments">
                    <span class="collapsed">
                        Mostrar comentarios
                    </span>
                    <span class="expanded">
                        Ocultar comentarios
                    </span>
                </button>-->
                <hr>
                <!--<div class="collapse" id="show">
                    <p class="m-0 pt-2 pb-4">
                        {{$zone->descripcion}}
                    </p>
                </div>
                <button class="btn btn-default p-0 text-uppercase" data-toggle="collapse" data-target="#show" role="button" aria-expanded="false" aria-controls="show">
                    <span class="collapsed">
                        Mostrar más
                    </span>
                    <span class="expanded">
                        Mostrar menos
                    </span>
                </button>
                <hr>
            </div>-->
        </div>
        <!--<div class="row mb-5">
            <div class="col">
                <div class="collapse show" id="comments">
                    <div class="fb-comments" data-href="{{ env('APP_DEBUG') ? 'http://localhost' : url()->current() }}" data-width="100%" data-numposts="5"></div>
                </div>
            </div>
        </div>-->
    </div>
@endsection

@section('scripts')
    <script async defer src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.2"></script>
@endsection
