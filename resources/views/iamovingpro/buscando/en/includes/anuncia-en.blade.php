<div id="modalAnuncia" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content col-md-12">
      <div class="modal-header">

			<h4 id="modal-request-title">INFORM FOR FREE</h4>


			                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

	
<br>


      </div>

      <div class="modal-body" style="padding: 0.5rem;">
            <form id="publicarForm" action="{{ url('publicar_gratis') }}" method="post"  enctype="multipart/form-data">
                    {!! csrf_field() !!}
					<div class="form-group text-left" style="margin-bottom: 0.5rem;">
	            	We will call you to solve doubts!
	            		</div>
                    <input type="hidden" id="tipo_publicacion" name="tipo_publicacion" />
                    <div class="row">
                        <div class="form-group col-md-12">
                            <input placeholder="Name" type="text" id="name" name="name" class="form-control" maxlength="150" autofocus required onkeyup="preventSpecials(event)">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12">
                            <input placeholder="Mobile" type="text" id="phone" name="phone" class="form-control"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  required onkeyup="preventSpecials(event)">
                        </div>
                    </div>
                    <div class="form-group form-check text-center">
						<input type="checkbox" class="form-check-input" id="conditions" name="conditions"  required>
						<label class="form-check-label" for="conditions">I accept the <a href="/politica-privacidad" target="_blank">private policy</a></label>
                    </div>					
                    <hr>
                    <div class="form-group">
                        <button id="btnSend" class="btn btn-dark btn-block" style="color:#EADD1B;" type="submit">
                            Send
                        </button>
                    </div>
            </form>
      </div>
      
    </div>

  </div>
</div>

