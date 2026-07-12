
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


</style>

<!--

<div class="d-none d-sm-none d-md-block">Este texto solo visible para escritorio</div>
<div class="d-block d-sm-block d-md-none">Este texto solo visible para smartphone</div>
-->

<div class="header--main-image"  style="background-color:white;">

<!--izquierda-->
  <div class="container">
 <div class="d-none d-sm-none d-md-block">

 </div>
	  <div class="header--main-text">
		<div class="d-block d-md-block d-lg-block d-xl-block">
		
		</div>
		<div class="d-none d-sm-none d-md-block">
			<!--<p class="mt-0 mb-5">&nbsp;</p>
			<p class="mt-0 mb-5">&nbsp;</p>
			<p class="mt-0 mb-5">&nbsp;</p>-->


		</br>
		</div>
		<!--Este texto solo visible para escritorio-->
		<!--<h1 class="mt-1 mb-0 d-none d-sm-none d-md-block"  style="font-size:2.9em;">&nbsp;</h1>-->
		<!--<h1 class="mt-3 mb-2 d-none d-sm-none d-md-block"  style="font-size:2.9em;">Haz tu primera visita sin salir de casa</h1>-->
		<!--<h1 class="mt-3 mb-5 d-none d-sm-none d-md-block"  style="font-size:2.7em;">Fácil de alquilar, vender y comprar</h1>-->
		<!--FIN --Este texto solo visible para escritorio-->
		<!--<h5 class="d-block d-sm-block d-md-none"  style="font-size:1.4em;">VIEWINGS FROM ANYWHERE</h5>-->
		
		<h5 class="mt-4 mb-1 d-block d-sm-block d-md-none" style="font-size:1.2em;"></h5>
		<h5 class="mt-1 mb-0 d-block d-sm-block d-md-none" style="font-size:1.3em;font-weight:bold;">Busca tu casa</h5>
	  <!--<h5 class="mt-1 mb-0"  style="font-size:2.9em;">VIEWINGS FROM ANYWHERE</h5>-->
			<!--<form class="row justify-content-center" action="{{url('iamovingpro/find')}}" method="GET">-->
			<form class="justify-content-center" id="form-reference" onkeypress='pulsar(event)' >

            <div class="row">
    			<div class="form-group col-xs-12" style="width:100%; padding:10px;">
    				
    			<!--	<select name="category" class="custom-select " style="font-size:1.2em;text-align:center;background-color:#EADD03;font-weight:bold;color:#2D2D37;opacity:.9;">
    					<option value="0">Alquilar</option>
    					<option value="1">Comprar</option>
    				</select>-->
					 <div class="d-none d-sm-none d-md-block" style="position: relative;width: 100%;">
						<h2><span>BUSCA TU CASA</span></h2>
					 </div>					
    		       <!-- <div class="btn-group btn-group-toggle" data-toggle="buttons" style="width:67%">
    					<label class="btn btn-outline-dark btn-lg active" id="lblAlquilar" style="border-radius: .01rem;">
    						<input type="radio" name="category" autocomplete="off" checked value="0" id="alquilar" onclick="clickAlquiler();" data-label="#lblAlquilar"> Alquilar
    					</label>    				    
    					<label class="btn btn-outline-dark btn-lg"  id="lblComprar" style="margin-left:5px;border-radius: .01rem;">
    						<input type="radio" name="category" autocomplete="off"  value="1"  id="comprar"  onclick="clickComprar();" data-label="#lblComprar"> Comprar
    					</label>    				    
    				</div>  -->
    <!--codigo para cambiar comprar por alquilar-->				
<div class="btn-group btn-group-toggle" data-toggle="buttons" style="width:67%">
    <label class="btn btn-outline-dark btn-lg active" id="lblComprar" style="border-radius: .01rem;">
        <input type="radio" name="category" autocomplete="off" checked value="1" id="comprar" onclick="clickComprar();" data-label="#lblComprar"> Comprar
    </label>    				    
    <label class="btn btn-outline-dark btn-lg" id="lblAlquilar" style="margin-left:5px;border-radius: .01rem;">
        <input type="radio" name="category" autocomplete="off" value="0" id="alquilar" onclick="clickAlquiler();" data-label="#lblAlquilar"> Alquilar
    </label>    				    
</div>
    			</div>
    		</div>
    		<div class="row">
    			<div class="form-group col-4 offset-2" style="padding-top: 0px; padding-bottom: 0px; padding-right: 0px;padding-left:5px;">
    				<!--<select name="city" class="custom-select" style="font-size:1.4em;text-align:center;background-color:#EADD03;font-weight:bold;color:#2D2D37;opacity:.9;">
    					<option value="madrid" ><p class="item-buscador-letra">Madrid<p></option>
    				</select>-->
    			    
    			        @if(App\Ciudad::where('estado', true)->count() == 1)
    			            <input type="hidden" id="city" name="city" style="width: 97.448%;height: 95.48%;padding: .498rem 1.126rem;background-color:#ffffff;" value="{{ App\Ciudad::first()->id }}" />
    			            <input type="text" id="icity" value="{{App\Ciudad::first()->name }}"  class="form-control input-purple" style="padding: .498rem 1.126rem;width: 97.448%;height: 95.48%;border-radius: .01rem;background-color:#ffffff;" disabled/>
    			            
    			        @else
    			            <select name="city" id="city" class="custom-select purple_select" style="padding: .498rem 1.126rem;width: 97.448%;font-size: 1.125rem;height: 95.88%;border-radius: .01rem;background-color:#ffffff;text-align: center;" onchange="setCityRequired()" required>
    						<option value="">Ciudad</option>
        					@foreach(App\Ciudad::where('estado', true)->get() as $city)
        						<option value="{{ $city->id }}" ><p class="item-buscador-letra">{{$city->name}}<p></option>
        					@endforeach
        					</select>
        				@endif
    				
    			</div>
    			<!--<div class="form-group col-md-2">
    				<button type="submit" class="btn btn-block btn-iamoving" style="background-color:#EADD03;font-weight:bold;color:#2D2D37;">
    					BUSCAR
    				</button>
    			</div>-->
    		<!--</form>
    		<form class="row justify-content-center" id="form-reference">-->
    						<!--<div class="form-group col-md-3">
    				<input type="text"
    						class="form-control input-iamoving-dark"
    						placeholder="Madrid" readonly />
    			</div>-->
    			<div class="form-group col-6"  style="padding:0">
    				<input type="number" 
    						id="input-filter"
    						class="form-control ref"
    						placeholder="Nº Ref." style="height: 95.78%;width:64.92%;text-align:center;color:#495057;opacity:.9;border:1px solid #495057;font-size:1.125rem;border-radius: .01rem;padding: .498rem 1.126rem;"  min="1" max="99999"
    						onkeypress='validateInput(event);pulsar(event)' 
    						onkeyup='validateInputOut(event)' 
    						onfocus="setGrayControls()"
    						onfocusout="restoreControls()"
    						  
    						/>
    						
    			</div>

    		</div>
    		<div class="row">
    		    <div class="form-group col-8 offset-2" style="padding-left: 5px; padding-right: 5px;">
    				<!--<button class="btn btn-block btn-iamoving" style="border-radius: 20px;background-color:#EADD03;"-->
    				<button id="btnBuscar" class="btn btn-block btn-iamoving" style="background-color:#EADD03;font-weight:bold;color:#2D2D37;"
    						type="submit">
    					BUSCAR
    				</button>
    			</div>
    		</div>
		</form>
		<div class="d-none d-md-block d-lg-block d-xl-block">
			<br>
			<br>		
		</div>		
	</div>
  </div>
  <!--derecha-->
  <div class="d-none d-sm-none d-md-block" style="position: relative;width: 100%;">
  <img src="img/familia_feliz.jpeg" alt="Busca tu casa">
  </div>  
</div>	

<style type="text/css">

input[type=number]::-webkit-outer-spin-button,

input[type=number]::-webkit-inner-spin-button {

    -webkit-appearance: none;

    margin: 0;

}

 

input[type=number] {

    -moz-appearance:textfield;

}


/* Estilos comunes para los inputs, selects y botones del formulario */
.form-control, 
.custom-select,
.btn-group .btn,
.purple_select {
    height: 48px !important; /* Altura fija igual al botón Comprar */
    padding: .498rem 1.126rem !important;
    font-size: 1.125rem !important;
    border-radius: .01rem !important;
    width: 100% !important;
}

/* Ajuste específico para el grupo de botones Comprar/Alquilar */
.btn-group {
    width: 100% !important;
    display: flex !important;
    gap: 5px !important;
}

.btn-group .btn {
    flex: 1 !important;
    margin-left: 0 !important;
}

/* Ajustes para la disposición en columnas */
.form-group {
    padding: 5px !important;
}

/* Ajuste específico para el input de referencia */
#input-filter {
    width: 100% !important;
    text-align: center;
}

</style>

