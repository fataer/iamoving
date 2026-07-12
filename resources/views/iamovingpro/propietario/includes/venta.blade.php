<div id="modalVenta" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content col-md-12">
            <div class="modal-header">
                <h4 id="modal-request-title">
                    <label id="tituloModal">¿Deseas saber el precio de mercado de tu casa sin coste alguno?</label>
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <br>
            </div>

            <div class="modal-body" style="padding: 0.5rem;">
                <form id="ventaForm" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div id="texto_modal_venta" class="form-group text-left" style="margin-bottom: 0.5rem;">
                        <label id="descripcionModal">Déjanos tus datos y entraremos en contacto contigo para echarte una mano.</label>
                    </div>

                    <input type="hidden" id="tipo_publicacion_venta" name="tipo_publicacion" />
                    <input type="hidden" id="id_click_venta" name="id_click" />
                    
                    <!-- Nombre -->
                    <div class="row">
                        <div class="form-group col-md-12">
                            <input placeholder="Nombre y apellidos" 
                                   type="text" 
                                   id="name_venta" 
                                   name="name" 
                                   class="form-control" 
                                   maxlength="120" 
                                   minlength="2"
                                   autofocus 
                                   required 
                                   pattern="[A-Za-zÁÉÍÓÚáéíóúÑñÜü\s]{2,120}"
                                   title="El nombre debe tener al menos 2 caracteres y solo puede contener letras y espacios"
                                   oninvalid="this.setCustomValidity('Por favor, introduce tu nombre y apellidos')"
                                   oninput="this.setCustomValidity(''); 
                                            this.value = this.value.replace(/[^A-Za-zÁÉÍÓÚáéíóúÑñÜü\s]/g, '')"
                                   onkeyup="preventSpecials(event)">
                        </div>
                    </div>

                    <!-- Teléfono móvil -->
                    <div class="row">
                        <div class="form-group col-md-12">
                            <input placeholder="Teléfono móvil" 
                                   type="tel" 
                                   id="phone_venta" 
                                   name="phone" 
                                   class="form-control" 
                                   maxlength="20" 
                                   pattern="[0-9+\s]{9,20}" 
                                   title="El teléfono debe tener al menos 9 dígitos (números, + y espacios)"
                                   required 
                                   oninvalid="this.setCustomValidity('Por favor, introduce tu teléfono móvil')"
                                   oninput="this.setCustomValidity('')"
                                   onkeyup="preventSpecials(event)">
                            <small class="form-text text-muted">Formato: +34 123456789 o 123456789</small>
                        </div>
                    </div>

                    <!-- Confirmar teléfono móvil -->
                    <div class="row">
                        <div class="form-group col-md-12">
                            <input placeholder="Confirmar teléfono móvil" 
                                   type="tel" 
                                   id="confirm_phone_venta" 
                                   name="confirm_phone" 
                                   class="form-control" 
                                   maxlength="20" 
                                   pattern="[0-9+\s]{9,20}" 
                                   required 
                                   oninvalid="this.setCustomValidity('Por favor, confirma tu teléfono móvil')"
                                   oninput="this.setCustomValidity(''); 
                                            if(this.value !== document.getElementById('phone_venta').value) {
                                                this.setCustomValidity('Los teléfonos no coinciden');
                                            } else {
                                                this.setCustomValidity('');
                                            }">
                        </div>
                    </div>

                    <!-- Checkbox de condiciones -->
                    <div class="form-group form-check text-center">
                        <input type="checkbox" class="form-check-input" id="conditions_venta" name="conditions" required
                               oninvalid="this.setCustomValidity('Debes aceptar la política de privacidad')"
                               oninput="this.setCustomValidity('')">
                        <label class="form-check-label" for="conditions_venta">Acepto la <a href="/politica-privacidad" target="_blank">política de privacidad</a></label>
                    </div>

                    <hr>

                    <!-- Botón de envío -->
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

<script>
$(document).ready(function() {
    // Prevenir el envío normal del formulario y usar AJAX manual
    $('#ventaForm').on('submit', function(e) {
        e.preventDefault();
        e.stopPropagation();
        
        console.log('Formulario enviado - Modo escritorio');
        
        // Validar que los teléfonos coincidan
        var phone = $('#phone_venta').val();
        var confirmPhone = $('#confirm_phone_venta').val();
        
        if (phone !== confirmPhone) {
            Swal.fire('Error', 'Los teléfonos no coinciden', 'error');
            return false;
        }
        
        // Validar checkbox
        if (!$('#conditions_venta').is(':checked')) {
            Swal.fire('Error', 'Debes aceptar la política de privacidad', 'error');
            return false;
        }
        
        // Validar nombre
        var name = $('#name_venta').val();
        if (name.length < 2) {
            Swal.fire('Error', 'Por favor, introduce tu nombre completo', 'error');
            return false;
        }
        
        // Validar teléfono
        var phoneValue = $('#phone_venta').val();
        if (phoneValue.length < 9) {
            Swal.fire('Error', 'Por favor, introduce un teléfono válido (mínimo 9 dígitos)', 'error');
            return false;
        }
        
        // Deshabilitar botón y cambiar texto
        var $btn = $(this).find('button[type="submit"]');
        $btn.prop('disabled', true);
        $btn.html('Enviando su información...');
        
        // Preparar datos para enviar
        var formData = new FormData(this);
        
        // Agregar datos adicionales
        var eventID = 'lead_' + Date.now() + '_' + Math.random().toString(36).substring(7);
        var fbp = getCookie('_fbp');
        var urlParams = new URLSearchParams(window.location.search);
        var fbclid = urlParams.get('fbclid') || '';
        var idClick = $('#id_click_venta').val();
        
        formData.append('event_id', eventID);
        formData.append('fbp', fbp);
        formData.append('fbclid', fbclid);
        formData.append('id_click', idClick);
        
        // Enviar por AJAX
        $.ajax({
            url: '{{ url("publicar_vendedor") }}',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log('Respuesta del servidor:', response);
                
                // Habilitar botón nuevamente
                $btn.prop('disabled', false);
                $btn.html('Enviar');
                
                if (response.success) {
                    // Intentar registrar en Facebook SOLO si fbq existe y no está causando error
                    if (typeof fbq !== 'undefined' && typeof fbq === 'function') {
                        try {
                            fbq('track', 'Lead', {}, { eventID: eventID });
                        } catch(e) {
                            console.log('Error al llamar a fbq:', e);
                        }
                    }
                    
                    // Guardar eventID
                    sessionStorage.setItem('last_lead_event_id', eventID);
                    
                    // Cerrar modal
                    $('#modalVenta').modal('hide');
                    
                    // Limpiar el formulario
                    $('#ventaForm')[0].reset();
                    $('#confirm_phone_venta').removeClass('is-valid is-invalid');
                    
                    // ✅ Usar SweetAlert con sintaxis compatible (sin objeto, con parámetros simples)
                    setTimeout(function() {
                        Swal.fire(
                            '¡Gracias!',
                            '¡Su información ha sido recibida!',
                            'success'
                        );
                    }, 100);
                    
                } else {
                    Swal.fire(
                        'Lo sentimos',
                        response.message || 'No hemos podido recibir su información. Intente nuevamente',
                        'error'
                    );
                }
            },
            error: function(xhr, status, error) {
                console.error('Error en AJAX:', status, error);
                console.error('Respuesta del servidor:', xhr.responseText);
                
                // Habilitar botón nuevamente
                $btn.prop('disabled', false);
                $btn.html('Enviar');
                
                Swal.fire(
                    'Error',
                    'Ha ocurrido un error al enviar el formulario. Por favor, intente nuevamente.',
                    'error'
                );
            }
        });
        
        return false;
    });
    
    // Función para obtener cookies
    function getCookie(name) {
        var value = "; " + document.cookie;
        var parts = value.split("; " + name + "=");
        if (parts.length == 2) return parts.pop().split(";").shift();
        return '';
    }
    
    // Asignar ID de click cuando se abre el modal
    $('#modalVenta').on('show.bs.modal', function() {
        var idClick = sessionStorage.getItem('ultimo_click_id');
        if (idClick) {
            $('#id_click_venta').val(idClick);
            console.log('ID Click asignado al modal:', idClick);
        } else {
            console.log('No hay ID Click en sessionStorage');
        }
    });
});
</script>