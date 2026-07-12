@extends('layouts.iamovingpro')
@section('title', 'IAMOVING - Fácil de alquilar, comprar y vender')
@section('description', '¡Fácil de alquilar, comprar y vender!')
@section('image', 'https://iamoving.com/img/iamoving.png')
<style type="text/css">
   .color-letra{
     color: #2d2e35;
   } 
</style>

@section('content')
<br>
<br>
    <div class="container mb-5">
        <div class="row text-center justify-content-center">
            <div class="col-10">
                <!--<h1>Solicitud de publicación y contenido audiovisual de IAMOVING</h1>-->
                <div class="row justify-content-center mb-4">
                    <div class="col text-center">
                        <img src="/img/iamoving_free_grey_transparent.png" alt="IAMPRO logotipo" width="175" class="m-0">
                    </div>
                </div>				

                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                
                @if ($message = Session::get('error'))                
                    <div class="alert alert-danger alert-block">
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                

                <form action="{{ url('publicado_iamovingfree') }}" method="post" id="frm_publicado" onsubmit="loading()" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                   <!-- <div class="row">
                        <div class="form-group col-md-6">
                            <input placeholder="Nombre de la Empresa" type="text" id="company" name="company" class="form-control" autofocus required>
                        </div>
                        <div class="form-group col-md-6">
                            <input placeholder="Sitio Web" type="text" id="web" name="web" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <input placeholder="Dirección de la Empresa" type="text" id="address" name="address" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <input placeholder="E-mail" type="email" id="email" name="email" class="form-control" required>
                        </div>
                    </div>-->
             <div class="form-group">
			                 <h2 class="my-1 text-center"><b>Sin intermediación de IAMOVING</b></h2>
                 <p class="my-1 text-center">
                    
                    <b>Alquila o Vende de forma independiente, como particular o inmobiliaria.</b>
				</p>
                
                <!--<a  @click.prevent="modalAhorra"><img src="/img/info.png"  width="15" height="15" style="margin-bottom:5px;" alt="info"></a></h2>	-->
                <p class="my-1 text-center">
                    
                    Publicación de 1 inmueble...<b>99€</b> <img src="/img/info.png" title="+iva" rel="tooltip"  id="blah3"  width="15" height="15" style="margin-bottom:5px;" alt="info">
                
                </p>
                <p class="my-1 text-center">
                
                   Pago único, sin tarifa de renovación y de manera ilimitada.

                
                </p>
                    <!--<label class="radio-inline">
                        <input type="radio" id="plan" name="plan" value="Plan_Prepago" checked onclick="javascript:document.getElementById('postpago').style.display = 'none';document.getElementById('prepago').style.display = 'block';"> Plan Prepago
                    </label>
                    <label class="radio-inline">
                        <input type="radio"  id="plan" name="plan" value="Plan_Postpago" onclick="javascript:document.getElementById('prepago').style.display = 'none';document.getElementById('postpago').style.display = 'block';"> Plan Postpago
                    </label>
                </div>

							  <div id="prepago" class="card-body text-success" style="padding:.01rem;">
								<p class="card-text text-center">
														  <button type="button" class="btn btn-dark btn-lg btn-block border-warning"  aria-haspopup="true" 
														  style="font-weight:bold;color:#EADD1B;border-radius:0%; !important;;outline:none !important;outline-width: 0 !important; box-shadow: none;-moz-box-shadow: none;-webkit-box-shadow: none;" >
														  Plan Prepago
														  </button>						
								</p>
								<p class="card-text text-center  d-none d-sm-none d-md-block"><u>Se paga una vez que te entregamos todo el contenido audiovisual</u> (video, fotos y la publicación en iamoving.com).</p>												
								<p class="card-text text-center d-block d-sm-block d-md-none"><u>Se paga una vez que te entregamos todo el contenido audiovisual</u> (video, fotos y la publicación en iamoving.com).</p>						
								<p class="card-text text-center">1 visita virtual....<b>49€</b> <img src="/img/info.png" title="+iva" rel="tooltip"  id="blah3"  width="15" height="15" style="margin-bottom:5px;" alt="info"></p>						
								<p class="card-text text-center">Pago único, sin tarifa de renovación y de manera ilimitada.</p>						
								
							  </div>

							  <div id="postpago"  class="card-body text-success ml-3"  style="padding:.01rem;display:none;">
								<p class="card-text text-center">
														<button type="button" class="btn btn-dark btn-lg btn-block border-warning"  aria-haspopup="true" 
														  style="font-weight:bold;color:#EADD1B;border-radius:0%; !important;;outline:none !important;outline-width: 0 !important; box-shadow: none;-moz-box-shadow: none;-webkit-box-shadow: none;" >
														  Plan Postpago
														  </button>	
								</p>						
								<p class="card-text text-center">Te enviamos todo el contenido audiovisual (video, fotos y la publicación en iamoving.com). <u>Solo pagas cuando el inmueble que ha sido publicado en Iamoving, haya sido alquilado o vendido a través de Iamoving o de otros canales.</u> <img src="/img/info.png" title="También se pagará, una vez que el inmueble que se publicó no fue alquilado ni vendido 12 meses después de su fecha de publicación." rel="tooltip"  id="blah7"  width="15" height="15" style="margin-bottom:5px;" alt="info"></p>		
								<p class="card-text text-center">1 visita virtual....<b>99€</b> <img src="/img/info.png" title="+iva" rel="tooltip"  id="blah6"  width="15" height="15" style="margin-bottom:5px;" alt="info"></p>						
								<p class="card-text text-center">Pago único, sin tarifa de renovación y de manera ilimitada.</p>
							  </div>-->
							<br>
<!--              <div class="form-group">
                    <label class="radio-inline">
                        <input type="radio" id="owner" name="owner" value="Propietario" checked> Soy Propietario
                       
                    </label>
                    <label class="radio-inline">
                        <input type="radio" id="owner" name="owner" value="Agencia"> Soy Agencia
                    </label>
                </div>-->
				<div class="form-group">
				<b>Confirmanos el día que te gustaría que vayamos para hacer el video, las fotos y los informes del inmueble:</b>
				</div>
	          			<div class="form-group">
						
	          				<!--<label>Escoge la fecha</label>-->
	          				<input type="text" placeholder="Escoge la fecha" id="date" name="date" class="form-control" autocomplete="off" required>
	          			</div>
	          			<!--<div class="form-group">
	          				<div class="input-group clockpicker">
							    <input id="time" name="time" placeholder="Escoge la hora" type="text" class="form-control" autocomplete="off" value="" required>
							    <span class="input-group-addon">
							        <span class="glyphicon glyphicon-time"></span>
							    </span>
							</div>
	          			</div>-->
                    <!--<div class="form-group">
                        La fecha de hoy es: 
                    </div>-->		
                    <div class="form-group">
                        <input placeholder="Ciudad" type="text" id="city" name="city" maxlength="100" class="form-control" required>
                    </div>		
                        <div class="form-group">
                            <input placeholder="Dirección completa del inmueble" type="text" id="address" name="address" maxlength="120"  class="form-control" required>
                        </div>						
                    <div class="form-group">
                        <input placeholder="Nombre y apellidos / Empresa" type="text" id="name" name="name" maxlength="100" class="form-control" required>
                    </div>
                        <div class="form-group">
                            <input placeholder="DNI/NIE/CIF" type="text" id="nif" name="nif" maxlength="20" class="form-control" required>
                        </div>						
                        <div class="form-group">
                            <input placeholder="E-mail" type="email" id="email" name="email" maxlength="100" class="form-control" required>
                        </div>
                    <div class="form-group">
                        <input placeholder="Móvil" type="text"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  id="phone" name="phone" maxlength="15" class="form-control" required>
                    </div>
				

                        
                    <div class="form-group form-check text-center">
						<input type="hidden" id="subject" name="subject"  value="Iamovingfree">
						<input type="checkbox" class="form-check-input" id="conditions" name="conditions"  required>
						<label class="form-check-label" for="conditions">He leído y estoy de acuerdo con <a href="/terminosI-condiciones" target="_blank">los términos y condiciones</a> y <a href="/politica-privacidad" target="_blank">la política de privacidad </a>de IAMOVING</label>
                    </div>							
                    <!--<div class="form-group">
                        <textarea id="body" name="body" class="form-control" rows="4" placeholder="Descríbenos por favor tus servicios. ¡Cuéntenos en que te diferencias! " required></textarea>
                    </div>-->
                    <hr>
                    <div class="form-group">
                        <button class="btn btn-success btn-block" type="submit" id="btn_submit_publicado">
                           SOLICITAR
                        </button>
                        
                    </div>
                </form>
            </div>
        </div>
  

    </div>
    
@endsection
@section('scripts')
<script>
    function loading(){
        $("#btn_submit_publicado").text('Enviando...');
        $("#btn_submit_publicado").prop('disabled', true);
    }
$(document).ready(function(){
				var today = new Date();
			var dd = today.getDate();
			var mm = today.getMonth() + 1;
			var yyyy = today.getFullYear();
			if (dd < 10) {
  				dd = '0' + dd;
			} 
			if (mm < 10) {
  				mm = '0' + mm;
			} 
			var today = dd + '/' + mm + '/' + yyyy;


			$('#date').datepicker({
                language: "es",
                format: "dd/mm/yyyy",
    			startDate: today,
    			autoclose: true,
    			ignoreReadonly: true
    			//daysOfWeekDisabled: disable_days
            });

			$('#fecha_desde').datepicker({
                language: "es",
                format: "dd/mm/yyyy",
    			startDate: today,
    			autoclose: true,
    			ignoreReadonly: true
    			//daysOfWeekDisabled: disable_days
            });	
			
            $('.clockpicker').clockpicker({
			    placement: 'top',
			    align: 'left',
			    donetext: 'OK'
			});

});

$( function()
{
    var targets = $( '[rel~=tooltip]' ),
        target  = false,
        tooltip = false,
        title   = false;
 
    targets.bind( 'mouseenter', function()
    {
        target  = $( this );
        tip     = target.attr( 'title' );
        tooltip = $( '<div id="tooltip"></div>' );
 
        if( !tip || tip == '' )
            return false;
 
        target.removeAttr( 'title' );
        tooltip.css( 'opacity', 0 )
               .html( tip )
               .appendTo( 'body' );
 
        var init_tooltip = function()
        {
            if( $( window ).width() < tooltip.outerWidth() * 1.5 )
                tooltip.css( 'max-width', $( window ).width() / 2 );
            else
                tooltip.css( 'max-width', 340 );
 
            var pos_left = target.offset().left + ( target.outerWidth() / 2 ) - ( tooltip.outerWidth() / 2 ),
                pos_top  = target.offset().top - tooltip.outerHeight() - 20;
 
            if( pos_left < 0 )
            {
                pos_left = target.offset().left + target.outerWidth() / 2 - 20;
                tooltip.addClass( 'left' );
            }
            else
                tooltip.removeClass( 'left' );
 
            if( pos_left + tooltip.outerWidth() > $( window ).width() )
            {
                pos_left = target.offset().left - tooltip.outerWidth() + target.outerWidth() / 2 + 20;
                tooltip.addClass( 'right' );
            }
            else
                tooltip.removeClass( 'right' );
 
            if( pos_top < 0 )
            {
                var pos_top  = target.offset().top + target.outerHeight();
                tooltip.addClass( 'top' );
            }
            else
                tooltip.removeClass( 'top' );
 
            tooltip.css( { left: pos_left, top: pos_top } )
                   .animate( { top: '+=10', opacity: 1 }, 50 );
        };
 
        init_tooltip();
        $( window ).resize( init_tooltip );
 
        var remove_tooltip = function()
        {
            tooltip.animate( { top: '-=10', opacity: 0 }, 50, function()
            {
                $( this ).remove();
            });
 
            target.attr( 'title', tip );
        };
 
        target.bind( 'mouseleave', remove_tooltip );
        tooltip.bind( 'click', remove_tooltip );
    });
});	

    </script>

@endsection

@section('styles')
	<style>
#tooltip
{
    text-align: center;
    color: #EADD1B;
    background: #2d2e35;
    position: absolute;
    z-index: 100;
    padding: 15px;
}
 
    #tooltip:after /* triangle decoration */
    {
        width: 0;
        height: 0;
        border-left: 10px solid transparent;
        border-right: 10px solid transparent;
        border-top: 10px solid #111;
        content: '';
        position: absolute;
        left: 50%;
        bottom: -10px;
        margin-left: -10px;
    }
 
        #tooltip.top:after
        {
            border-top-color: transparent;
            border-bottom: 10px solid #111;
            top: -20px;
            bottom: auto;
        }
 
        #tooltip.left:after
        {
            left: 10px;
            margin: 0;
        }
 
        #tooltip.right:after
        {
            right: 10px;
            left: auto;
            margin: 0;
        }
		
#more {display: none;}		
#more1 {display: none;}
#more2 {display: none;}
#more3 {display: none;}
#more4 {display: none;}
#more5 {display: none;}

	</style>	
@endsection