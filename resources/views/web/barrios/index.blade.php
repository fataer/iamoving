@extends('layouts.iamovingpro')
@section('title', 'IAMOVING - Fácil de alquilar, comprar y vender')
@section('description', '¡Fácil de alquilar, comprar y vender!')
@section('image', 'https://iamoving.com/img/iamoving.png')
@section('content')
    <div class="container mt-5 pt-5">
        <h1 class="display-4 text-center">¿Cuál es tu barrio ideal?</h1>
        <!--<p>
            Preocupada con su completo bienestar, le mostramos el alrededor del inmueble de su interés, para que usted
            conozca el ambiente, el entretenimiento, las facilidades y los servicios que este barrio le ofrece. Creemos
            que vivir en un buen barrio es tan importante como vivir en un buen hogar
        </p>-->

        <div class="row">
            <div style="width:100%;">
                <div class="dropdown col-12">
                    <button onclick="openZones()" class="dropbtn">Búscalo…</button>
                    <div id="barrios" class="dropdown-content">
                        <input type="text" placeholder="Buscar.." id="inputBarrio" onkeyup="filterFunction()">
                        @foreach($zones as $zone) 
                            <a href="/barrio/{{ $zone->id }}">{{$zone->nombre}}</a>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5" id="barrios-anuncios">
            @foreach ($areas as $area)
                <div class="col-lg-3 mb-3">
                    <video-card href="/barrio/{{$area->id}}" 
                        source="https://www.youtube.com/embed/{{$area->video_principal}}" 
                        :body="{{$area}}"></video-card>
                </div>
            @endforeach
        </div>
        <div>
            {{ $areas->links() }}
        </div>
    </div>
@endsection

@section('styles')
<style> 
    select option {
        margin: 40px;
        background: rgba(0, 0, 0, 0.3);
        color: #fff;
        text-shadow: 0 1px 0 rgba(0, 0, 0, 0.4);
    }

    .dropbtn {
        background-color: #C0C0C0;
        color: white;
        padding: 16px;
        font-size: 22px;
        border: none;
        cursor: pointer;
        width:100%;
    }

    .dropbtn:hover, .dropbtn:focus {
        background-color: #C0C0C0;
    }

    
    #inputBarrio {
        border-box: box-sizing;
        background-position: 14px 12px;
        background-repeat: no-repeat;
        font-size: 16px;
        padding: 14px 20px 12px 45px;
        border: none;
        border-bottom: 1px solid #ddd;
        width:100%;
    }

    
    #inputBarrio:focus {outline: 3px solid #ddd;}

    
    .dropdown {
        position: relative;
        display: inline-block;
    }

    
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #2D2E35;
        min-width: 230px;
        border: 1px solid #ddd;
        z-index: 1000;
        width:97.5%;
    }

    
    .dropdown-content a {
        color: white;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    
    .dropdown-content a:hover {background-color: #2D2E35; color:#EADD1B;}

    .show {display:block;}


</style>
@endsection

@section('scripts')
    <script type="text/javascript">
         // window.onscroll= function(ev){
         //     if((window.innerHeight + window.pageYOffset) >= document.body.offsetHeight) {
         //         const barrios = document.getElementById("barrios-anuncios");
         //         barrios.innerHTML +='<br><br><br>';
         //     }

         // }
        function openZones() {
            document.getElementById("barrios").classList.toggle("show");
        }

        function filterFunction() {
            var input, filter, ul, li, a, i;
            input = document.getElementById("inputBarrio");
            filter = input.value.toUpperCase();
            div = document.getElementById("barrios");
            a = div.getElementsByTagName("a");
            for (i = 0; i < a.length; i++) {
                txtValue = a[i].textContent || a[i].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                a[i].style.display = "";
                } else {
                a[i].style.display = "none";
                }
            }
        }
    </script>
@stop