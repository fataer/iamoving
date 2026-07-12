<div id="modalVenta" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content col-md-12">
      <div class="modal-header">

			<h4 id="modal-request-title">¿Deseas saber el precio de mercado de tu casa sin coste alguno?</h4>


			                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

	
<br>


      </div>

      <div class="modal-body" style="padding: 0.5rem;">
            <form id="ventaForm" action="{{ url('publicar_vendedor') }}" method="post"  enctype="multipart/form-data">
                    {!! csrf_field() !!}
										<div id="texto_modal_venta" class="form-group text-left" style="margin-bottom: 0.5rem;">
	            	Déjanos tus datos y entraremos en contacto contigo para echarte una mano.
	            		</div>
          <!-- Contenedor para los puntos adicionales -->
          <div id="puntosAdicionales" class="form-group text-left" style="margin-bottom: 0.5rem; display: none;">
            <ul style="list-style-type: none; padding-left: 0;">
              <li>• No tienes que firmar nada</li>
              <li>• No tienes que pagar nada</li>
              <li>• La visita la haces tú</li>
            </ul>
          </div>	            		
                    <input type="hidden" id="tipo_publicacion_venta" name="tipo_publicacion" />
                    <div class="row">
                        <div class="form-group col-md-12">
                            <input placeholder="Nombre" type="text" id="name_venta" name="name" class="form-control" maxlength="120" autofocus required onkeyup="preventSpecials(event)">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12">
                            <input placeholder="Teléfono móvil" type="text" id="phone_venta" name="phone" class="form-control" maxlength="20" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  required onkeyup="preventSpecials(event)">
                        </div>
                    </div>
                    <div class="form-group form-check text-center">
						<input type="checkbox" class="form-check-input" id="conditions_venta" name="conditions"  required>
						<label class="form-check-label" for="conditions_venta">Acepto la <a href="/politica-privacidad" target="_blank">política de privacidad</a></label>
                    </div>					
                    <hr>
                    <div class="form-group">
                        <button id="btnSendVenta" class="btn btn-dark btn-block" style="color:#EADD1B;" type="submit">
                            Enviar
                        </button>
                    </div>
            </form>
      </div>
      
    </div>

  </div>
</div>