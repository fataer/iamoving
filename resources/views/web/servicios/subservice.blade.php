@extends('layouts.iamovingpro')


@section('content')
    <div class="bg-black"  style="height: 450px; overflow-y: hidden;">
        <video id="primary-video" src="/storage/{{$subservice->video}}" class="video-fluid z-depth-1" width="100%" height="100%" controls></video>
    </div>
    <div class="container py-4">
        <h2 class="display-3">
            ⭐
            <i class="fas fa-star text-warning"></i>
            {{$subservice->nombre}}
        </h2>
        <hr>
        <p>{!!$subservice->descripcion !!}</p>
        <hr>
        <div class="fb-comments" data-href="{{ env('APP_DEBUG') ? 'http://localhost' : url()->current() }}" data-width="100%" data-numposts="5"></div>
    </div>
@endsection

@section('scripts')
  <!--  <script async defer src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.2"></script>

    <script>
        window.addEventListener('DOMContentLoaded', function() {
            const primary = '/storage/{{$subservice->video}}';
            const primaryVideo = $('#primary-video');
            const videoCards = $('.card.video-card');

            videoCards.on('click', function(e) {
                const src = $(this).find('video').attr('src');

                primaryVideo.attr('src', src);
                primaryVideo[0].load();
            });
        });
    </script>-->
@endsection