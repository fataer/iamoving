{{-- Estilos comunes para todas las plataformas --}}
<style type="text/css">
#formGroupExampleInput {
  background-color:red;
  width:300px;
  color:#2D2D37;
}

#formGroupExampleInput::placeholder {
 color:#2D2D37;
}

#formGroupExampleInput::-webkit-input-placeholder {
  color: #2D2D37;
}
#formGroupExampleInput::-moz-placeholder {
  color: #2D2D37;
     opacity:  1;
}
#formGroupExampleInput:-ms-input-placeholder {
  color: #2D2D37;
}
#formGroupExampleInput:-moz-placeholder {
  color: #2D2D37;
   opacity: 1 ;
}

/* Reset completo para TODOS los controles */
.form-control, 
.custom-select,
.btn-group .btn,
.purple_select,
#lblComprar,
#lblAlquilar,
#icity,
#input-filter,
select,
input {
    height: 42px !important;
    min-height: 42px !important;
    max-height: 42px !important;
    line-height: normal !important;
    padding: 0 1rem !important;
    font-size: 16px !important;
    font-weight: 600 !important;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif !important;
    border-radius: .25rem !important;
    box-sizing: border-box !important;
    display: inline-flex !important;
    align-items: center !important;
    vertical-align: middle !important;
    -webkit-font-smoothing: antialiased !important;
    -moz-osx-font-smoothing: grayscale !important;
}

.custom-select, select {
    padding: 0 1rem !important;
}

#lblComprar,
#lblAlquilar {
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    text-align: center !important;
    margin: 0 !important;
    cursor: pointer !important;
    font-weight: 600 !important;
    border: 1px solid #495057 !important;
}

.btn-group .btn.active {
    border: 1px solid #b02c98 !important;
    color: #b02c98 !important;
}

#icity,
#input-filter {
    text-align: center !important;
    background-color: #ffffff !important;
    font-weight: 600 !important;
}

#icity {
    background-color: #ffffff !important;
    border: 1px solid #b02c98 !important;
    color: #b02c98 !important;
}

#input-filter {
    border: 1px solid #495057 !important;
    color: #495057 !important;
}

#input-filter::placeholder {
    font-weight: 600 !important;
    font-size: 16px !important;
    color: #495057 !important;
    opacity: 0.7 !important;
}

#input-filter:focus {
    border: 1px solid #b02c98 !important;
    outline: none !important;
    box-shadow: 0 0 0 2px rgba(176, 44, 152, 0.2) !important;
    color: #b02c98 !important;
}

.btn-group {
    width: 100% !important;
    display: flex !important;
    gap: 10px !important;
}

.btn-group .btn {
    flex: 1 !important;
    margin: 0 !important;
}

.row {
    margin-left: -5px !important;
    margin-right: -5px !important;
}

.col-12, .col-6, .form-group {
    padding-left: 5px !important;
    padding-right: 5px !important;
}

.btn-group-toggle .btn input {
    position: relative !important;
    margin-right: 8px !important;
}

input[type=number]::-webkit-outer-spin-button,
input[type=number]::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

input[type=number] {
    -moz-appearance:textfield;
}

.col-6 .form-control,
.col-6 .custom-select,
.col-6 #icity,
.col-6 #input-filter {
    width: 100% !important;
}

/* Clase para el título con espacio inferior */
.titulo-busca {
    margin-bottom: 30px !important;
}
</style>

{{-- Sistema de detección de dispositivo --}}
@php
    $userAgent = request()->header('User-Agent');
    $isPad = false;
    
    if (stripos($userAgent, 'iPad') !== false || 
    stripos($userAgent, 'Mac OS') !== false || 
        (stripos($userAgent, 'Mac') !== false && stripos($userAgent, 'Tablet') !== false) ||
        (stripos($userAgent, 'Mac') !== false && stripos($userAgent, 'Touch') !== false) || 
        (stripos($userAgent, 'Mac') !== false && stripos($userAgent, 'Mobile') !== false) ||
        (stripos($userAgent, 'Macintosh') !== false && stripos($userAgent, 'Touch') !== false)) {
        $isPad = true;
    }
    
    $isiOSAgent = $isPad || 
                 stripos($userAgent, 'iPhone') !== false || 
                 stripos($userAgent, 'iPod') !== false || 
                 (stripos($userAgent, 'Mac') !== false && stripos($userAgent, 'Mobile') !== false) ||
                 (stripos($userAgent, 'Mac') !== false && stripos($userAgent, 'Safari') !== false && stripos($userAgent, 'Intel') === false);
    
    $isAndroidAgent = stripos($userAgent, 'Android') !== false;
    
    if ($isPad) {
        $showVersion = 'ios';
    } else {
        $showVersion = $isiOSAgent ? 'ios' : 
                      ($isAndroidAgent ? 'android' : 'other');
    }
@endphp

{{-- Versión para iOS --}}
@if($showVersion == 'ios')
    <div class="other-version">
      <div class="header--main-image" style="background-color:white;">
        <div class="container">
          <div class="header--main-text">
            <h5 class="mt-2 mb-3 d-block d-sm-block d-md-none" style="font-size:1.3em;font-weight:bold;">Busca tu casa</h5>
            <form class="justify-content-center" id="form-reference" onkeypress='pulsar(event)'>
              
              {{-- Título desktop CON MÁS ESPACIO ABAJO --}}
              <div class="d-none d-sm-none d-md-block" style="position: relative;width: 100%; margin-bottom: 40px !important;">
                <h2><span>BUSCA TU CASA</span></h2>
              </div>
              
              {{-- FILA 1: Comprar y Alquilar --}}
              <div class="row" style="margin-bottom: 25px !important;">
                <div class="col-12">
                  <div class="btn-group btn-group-toggle" data-toggle="buttons" style="width:100%; display:flex; gap:10px;">
                    <label class="btn btn-outline-dark btn-lg active" id="lblComprar" style="border-radius: .25rem; flex:1; display:flex; align-items:center; justify-content:center; height:42px; font-weight:600; font-size:16px; border:1px solid #b02c98; color:#b02c98;">
                      <input type="radio" name="category" autocomplete="off" checked value="1" id="comprar" onclick="clickComprar();" data-label="#lblComprar"> Comprar
                    </label>    				    
                    <label class="btn btn-outline-dark btn-lg" id="lblAlquilar" style="border-radius: .25rem; flex:1; display:flex; align-items:center; justify-content:center; height:42px; font-weight:600; font-size:16px; border:1px solid #495057; color:#495057;">
                      <input type="radio" name="category" autocomplete="off" value="0" id="alquilar" onclick="clickAlquiler();" data-label="#lblAlquilar"> Alquilar
                    </label>    				    
                  </div>
                </div>
              </div>
              
              {{-- FILA 2: Ciudad y Nº Ref. --}}
              <div class="row" style="margin-bottom: 25px !important;">
                <div class="col-6" style="padding-right: 5px;">
                  @if(App\Ciudad::where('estado', true)->count() == 1)
                    <input type="hidden" id="city" name="city" value="{{ App\Ciudad::first()->id }}" />
                    <input type="text" id="icity" value="{{App\Ciudad::first()->name }}" class="form-control" style="text-align:center; height:42px; width:100%; background-color:#ffffff; border:1px solid #b02c98; color:#b02c98; font-weight:600; font-size:16px;" disabled/>
                  @else
                    <select name="city" id="city" class="custom-select purple_select" style="text-align:center; height:42px; width:100%; background-color:#ffffff; border:1px solid #b02c98; color:#b02c98; font-weight:600; font-size:16px;" onchange="setCityRequired()" required>
                      <option value="">Ciudad</option>
                      @foreach(App\Ciudad::where('estado', true)->get() as $city)
                        <option value="{{ $city->id }}">{{$city->name}}</option>
                      @endforeach
                    </select>
                  @endif
                </div>
                <div class="col-6" style="padding-left: 5px;">
                  <input type="number" 
                    id="input-filter"
                    class="form-control ref"
                    placeholder="Nº Ref." 
                    style="text-align:center; height:42px; width:100%; background-color:#ffffff; border:1px solid #495057; color:#495057; font-weight:600; font-size:16px;"  
                    min="1" 
                    max="99999"
                    onkeypress='validateInput(event);pulsar(event)' 
                    onkeyup='validateInputOut(event)' 
                    onfocus="setGrayControls()"
                    onfocusout="restoreControls()"
                  />
                </div>
              </div>
              
              {{-- FILA 3: Botón BUSCAR --}}
              <div class="row">
                <div class="col-12 mb-3">
                  <button id="btnBuscar" class="btn btn-block btn-iamoving" style="background-color:#EADD03; font-weight:bold; color:#2D2D37; height:42px; width:100%; font-size:16px; border:none;" type="submit">
                    BUSCAR
                  </button>
                </div>
              </div>
            </form>
            <div class="d-none d-md-block d-lg-block d-xl-block">
              <br><br>		
            </div>		
          </div>
        </div>
        <div class="d-none d-sm-none d-md-block" style="position: relative;width: 100%;">
          <img src="img/familia_feliz.jpeg" alt="Busca tu casa">
        </div>  
      </div>
    </div>

{{-- Versión para Android --}}
@elseif($showVersion == 'android')
    <div class="other-version">
      <div class="header--main-image" style="background-color:white;">
        <div class="container">
          <div class="header--main-text">
            <h5 class="mt-2 mb-3 d-block d-sm-block d-md-none" style="font-size:1.3em;font-weight:bold;">Busca tu casa</h5>
            <form class="justify-content-center" id="form-reference" onkeypress='pulsar(event)'>
              
              {{-- Título desktop CON MÁS ESPACIO ABAJO --}}
              <div class="d-none d-sm-none d-md-block" style="position: relative;width: 100%; margin-bottom: 40px !important;">
                <h2><span>BUSCA TU CASA</span></h2>
              </div>
              
              {{-- FILA 1: Comprar y Alquilar --}}
              <div class="row" style="margin-bottom: 25px !important;">
                <div class="col-12">
                  <div class="btn-group btn-group-toggle" data-toggle="buttons" style="width:100%; display:flex; gap:10px;">
                    <label class="btn btn-outline-dark btn-lg active" id="lblComprar" style="border-radius: .25rem; flex:1; display:flex; align-items:center; justify-content:center; height:42px; font-weight:600; font-size:16px; border:1px solid #b02c98; color:#b02c98;">
                      <input type="radio" name="category" autocomplete="off" checked value="1" id="comprar" onclick="clickComprar();" data-label="#lblComprar"> Comprar
                    </label>    				    
                    <label class="btn btn-outline-dark btn-lg" id="lblAlquilar" style="border-radius: .25rem; flex:1; display:flex; align-items:center; justify-content:center; height:42px; font-weight:600; font-size:16px; border:1px solid #495057; color:#495057;">
                      <input type="radio" name="category" autocomplete="off" value="0" id="alquilar" onclick="clickAlquiler();" data-label="#lblAlquilar"> Alquilar
                    </label>    				    
                  </div>
                </div>
              </div>
              
              {{-- FILA 2: Ciudad y Nº Ref. --}}
              <div class="row" style="margin-bottom: 25px !important;">
                <div class="col-6" style="padding-right: 5px;">
                  @if(App\Ciudad::where('estado', true)->count() == 1)
                    <input type="hidden" id="city" name="city" value="{{ App\Ciudad::first()->id }}" />
                    <input type="text" id="icity" value="{{App\Ciudad::first()->name }}" class="form-control" style="text-align:center; height:42px; width:100%; background-color:#ffffff; border:1px solid #b02c98; color:#b02c98; font-weight:600; font-size:16px;" disabled/>
                  @else
                    <select name="city" id="city" class="custom-select purple_select" style="text-align:center; height:42px; width:100%; background-color:#ffffff; border:1px solid #b02c98; color:#b02c98; font-weight:600; font-size:16px;" onchange="setCityRequired()" required>
                      <option value="">Ciudad</option>
                      @foreach(App\Ciudad::where('estado', true)->get() as $city)
                        <option value="{{ $city->id }}">{{$city->name}}</option>
                      @endforeach
                    </select>
                  @endif
                </div>
                <div class="col-6" style="padding-left: 5px;">
                  <input type="number" 
                    id="input-filter"
                    class="form-control ref"
                    placeholder="Nº Ref." 
                    style="text-align:center; height:42px; width:100%; background-color:#ffffff; border:1px solid #495057; color:#495057; font-weight:600; font-size:16px;"  
                    min="1" 
                    max="99999"
                    onkeypress='validateInput(event);pulsar(event)' 
                    onkeyup='validateInputOut(event)' 
                    onfocus="setGrayControls()"
                    onfocusout="restoreControls()"
                  />
                </div>
              </div>
              
              {{-- FILA 3: Botón BUSCAR --}}
              <div class="row">
                <div class="col-12 mb-3">
                  <button id="btnBuscar" class="btn btn-block btn-iamoving" style="background-color:#EADD03; font-weight:bold; color:#2D2D37; height:42px; width:100%; font-size:16px; border:none;" type="submit">
                    BUSCAR
                  </button>
                </div>
              </div>
            </form>
            <div class="d-none d-md-block d-lg-block d-xl-block">
              <br><br>		
            </div>		
          </div>
        </div>
        <div class="d-none d-sm-none d-md-block" style="position: relative;width: 100%;">
          <img src="img/familia_feliz.jpeg" alt="Busca tu casa">
        </div>  
      </div>
    </div>

{{-- Versión para otros dispositivos --}}
@else
    <div class="other-version">
      <div class="header--main-image" style="background-color:white;">
        <div class="container">
          <div class="header--main-text">
            <h5 class="mt-1 mb-0 d-block d-sm-block d-md-none" style="font-size:1.3em;font-weight:bold;">Busca tu casa</h5>
            <form class="justify-content-center" id="form-reference" onkeypress='pulsar(event)'>
              
              <div class="d-none d-sm-none d-md-block" style="position: relative;width: 100%; margin-bottom: 15px;">
                <h2><span>BUSCA TU CASA</span></h2>
              </div>
              
              {{-- FILA 1: Comprar y Alquilar --}}
              <div class="row" style="margin-bottom: 25px !important;">
                <div class="col-12">
                  <div class="btn-group btn-group-toggle" data-toggle="buttons" style="width:100%; display:flex; gap:10px;">
                    <label class="btn btn-outline-dark btn-lg active" id="lblComprar" style="border-radius: .25rem; flex:1; display:flex; align-items:center; justify-content:center; height:42px; font-weight:600; font-size:16px; border:1px solid #b02c98; color:#b02c98;">
                      <input type="radio" name="category" autocomplete="off" checked value="1" id="comprar" onclick="clickComprar();" data-label="#lblComprar"> Comprar
                    </label>    				    
                    <label class="btn btn-outline-dark btn-lg" id="lblAlquilar" style="border-radius: .25rem; flex:1; display:flex; align-items:center; justify-content:center; height:42px; font-weight:600; font-size:16px; border:1px solid #495057; color:#495057;">
                      <input type="radio" name="category" autocomplete="off" value="0" id="alquilar" onclick="clickAlquiler();" data-label="#lblAlquilar"> Alquilar
                    </label>    				    
                  </div>
                </div>
              </div>
              
              {{-- FILA 2: Ciudad y Nº Ref. --}}
              <div class="row" style="margin-bottom: 25px !important;">
                <div class="col-6" style="padding-right: 5px;">
                  @if(App\Ciudad::where('estado', true)->count() == 1)
                    <input type="hidden" id="city" name="city" value="{{ App\Ciudad::first()->id }}" />
                    <input type="text" id="icity" value="{{App\Ciudad::first()->name }}" class="form-control" style="text-align:center; height:42px; width:100%; background-color:#ffffff; border:1px solid #b02c98; color:#b02c98; font-weight:600; font-size:16px;" disabled/>
                  @else
                    <select name="city" id="city" class="custom-select purple_select" style="text-align:center; height:42px; width:100%; background-color:#ffffff; border:1px solid #b02c98; color:#b02c98; font-weight:600; font-size:16px;" onchange="setCityRequired()" required>
                      <option value="">Ciudad</option>
                      @foreach(App\Ciudad::where('estado', true)->get() as $city)
                        <option value="{{ $city->id }}">{{$city->name}}</option>
                      @endforeach
                    </select>
                  @endif
                </div>
                <div class="col-6" style="padding-left: 5px;">
                  <input type="number" 
                    id="input-filter"
                    class="form-control ref"
                    placeholder="Nº Ref." 
                    style="text-align:center; height:42px; width:100%; background-color:#ffffff; border:1px solid #495057; color:#495057; font-weight:600; font-size:16px;"  
                    min="1" 
                    max="99999"
                    onkeypress='validateInput(event);pulsar(event)' 
                    onkeyup='validateInputOut(event)' 
                    onfocus="setGrayControls()"
                    onfocusout="restoreControls()"
                  />
                </div>
              </div>
              
              {{-- FILA 3: Botón BUSCAR --}}
              <div class="row">
                <div class="col-12">
                  <button id="btnBuscar" class="btn btn-block btn-iamoving" style="background-color:#EADD03; font-weight:bold; color:#2D2D37; height:42px; width:100%; font-size:16px; border:none;" type="submit">
                    BUSCAR
                  </button>
                </div>
              </div>
            </form>
            <div class="d-none d-md-block d-lg-block d-xl-block">
              <br><br>		
            </div>		
          </div>
        </div>
        <div class="d-none d-sm-none d-md-block" style="position: relative;width: 100%;">
          <img src="img/familia_feliz.jpeg" alt="Busca tu casa">
        </div>  
      </div>
    </div>
@endif
