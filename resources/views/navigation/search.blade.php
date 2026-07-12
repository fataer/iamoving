{{-- <style type="text/css">

	
select option {
    margin: 40px;
    background: rgba(0, 0, 0, 0.3);
    color: #fff;
    text-shadow: 0 1px 0 rgba(0, 0, 0, 0.4);
}


</style> --}}
<div class="header--hero-image">
  <div class="container">
	  <div class="header--hero-text">
		<div class="d-block d-md-block d-lg-block d-xl-block">
			<br>
			<br>		
		</div>
	  <h1 class="mb-5">FÁCIL DE ALQUILAR Y COMPRAR</h1>
		<form class="row justify-content-center" action="{{url('/search')}}" method="GET">
			<div class="form-group col-md-4">
				<select name="city" class="custom-select input-iamoving-dark">
					<option value="madrid" ><p class="item-buscador-letra">Madrid<p></option>
				</select>
			</div>
			<div class="form-group col-md-4">
				
				<select name="category" class="custom-select input-iamoving-dark">
					<option value="0">Alquilar</option>
					<option value="1">Comprar</option>
				</select>
			</div>
			<div class="form-group col-md-2">
				<button type="submit" class="btn btn-block btn-iamoving" style="border-radius: 20px;background-color:#EADD03;">
					BUSCAR
				</button>
			</div>
		</form>
		<form class="row justify-content-center" id="form-reference">
						<!--<div class="form-group col-md-3">
				<input type="text"
						class="form-control input-iamoving-dark"
						placeholder="Madrid" readonly />
			</div>-->
			<div class="form-group col-md-4">
				<input type="text"
						id="input-filter"
						class="form-control input-iamoving-dark"
						placeholder="Busqueda rápida con el número de referencia" required onkeydown="preventSpecials(event)" />
			</div>
			<div class="form-group col-md-2">
				<button class="btn btn-block btn-iamoving" style="border-radius: 20px;background-color:#EADD03;"
						type="submit">
					BUSCAR
				</button>
			</div>
		</form>
		<div class="d-none d-md-block d-lg-block d-xl-block">
			<br>
			<br>		
		</div>		
	</div>
  </div>
</div>