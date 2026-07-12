<script>
    var id_aterrizaje = null;

    // Definir isMobileDevice FUERA del document.ready para que esté disponible globalmente
    function isMobileDevice() {
console.log('isMobileDevice:', isMobileDevice());
console.log('window.innerWidth:', window.innerWidth);        
        return (window.innerWidth <= 768) || 
               (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent));
    }

    // Definir abrirWhatsApp GLOBALMENTE para que funcione con onclick
    window.abrirWhatsApp = function(tipoBoton, botonId, pagina) {
        console.log('abrirWhatsApp llamado:', tipoBoton, botonId, pagina);
        
        // Personaliza el mensaje según el botón
        var mensaje = tipoBoton === 'Ayuda precio' 
            ? "Hola! Estoy interesado en vender mi casa.\n\n¿Podríais ayudarme a saber en qué precio la anuncio?" 
            : "Hola! Estoy interesado en vender mi casa con IAMOVING de forma gratuita y sin exclusividad.\n\n¿Podríais darme más información?";
        
        // Añadir UTMs si existen
        var urlParams = new URLSearchParams(window.location.search);
        var utm_source = urlParams.get('utm_source') || '';
        var utm_campaign = urlParams.get('utm_campaign') || '';
        
        if (utm_source || utm_campaign) {
            mensaje += `\n\nFuente: ${utm_source} ${utm_campaign}`;
        }
        
        // Añadir la página de origen al mensaje para referencia
        //mensaje += `\nPágina: ${pagina === 'vender_gratis' ? 'Vender Gratis' : 'Vender'}`;
        
        var telefono = "34649623700";
        var mensajeCodificado = encodeURIComponent(mensaje);
        
        // Abrir WhatsApp
        window.open(`https://wa.me/${telefono}?text=${mensajeCodificado}`, '_blank');
        
        // Registrar el click en la base de datos
        if (id_aterrizaje) {
            $.ajax({
                url: "{{ url('registrar_click_vendedor') }}",
                type: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    id_aterrizaje: id_aterrizaje,
                    tipo_boton: tipoBoton + '_whatsapp',
                    boton_especifico: botonId,
                    pagina: pagina
                },
                success: function(response) {
                    console.log('Click WhatsApp registrado correctamente');
                    
                    // Solo para "Me interesa", registrar lead automático
                    if (response.success && response.id_click && tipoBoton !== 'Ayuda precio') {
                        registrarLeadWhatsAppAuto(response.id_click, tipoBoton, botonId, pagina);
                    }
                },
                error: function(xhr, status, error) {
                    console.log('Error registrando click WhatsApp:', error);
                }
            });
        } else {
            console.log('No hay id_aterrizaje para registrar el click WhatsApp');
            // Registrar click sin aterrizaje
            $.ajax({
                url: "{{ url('registrar_click_vendedor') }}",
                type: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    id_aterrizaje: null,
                    tipo_boton: tipoBoton + '_whatsapp',
                    boton_especifico: botonId,
                    pagina: pagina
                },
                success: function(response) {
                    if (response.success && response.id_click && tipoBoton !== 'Ayuda precio') {
                        registrarLeadWhatsAppAuto(response.id_click, tipoBoton, botonId, pagina);
                    }
                }
            });
        }
    }

    // Función auxiliar para registrar lead automático
    function registrarLeadWhatsAppAuto(id_click, tipoBoton, botonId, pagina) {
        $.ajax({
            url: "{{ url('registrar_lead_whatsapp_auto') }}",
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id_click: id_click,
                id_aterrizaje: id_aterrizaje,
                tipo_boton: tipoBoton,
                boton_especifico: botonId,
                pagina: pagina,
                user_agent: navigator.userAgent,
                screen_size: screen.width + 'x' + screen.height,
                url_referrer: window.location.href
            },
            success: function(response) {
                console.log('Lead WhatsApp registrado automáticamente');
            },
            error: function(xhr, status, error) {
                console.log('Error registrando lead WhatsApp:', error);
            }
        });
    }

$(document).ready(function() {
    registrarAterrizaje();
    $("#tipo_publicacion").val("venta");

    function processJson(data) {
        $("#btnSend").prop("disabled", false);
        $("#btnSend").html('Enviar');
        if (data.success) {
            $("#modalAnuncia").modal('toggle');
            Swal.fire('Gracias', 'Su información ha sido recibida!', 'success');
            $('#publicarForm')[0].reset();
        } else {
            Swal.fire('Lo sentimos', 'No hemos podido recibir su información. Intente nuevamente', 'error');
        }
    }

    function errorRequest() {
        $("#btnSend").prop("disabled", false);
        $("#btnSend").html('Enviar');
        Swal.fire('Lo sentimos', 'No hemos podido recibir su información. Intente nuevamente', 'error');
    }

    // Versión corregida de processJsonVenta
    function processJsonVenta(data) {
        console.log('processJsonVenta llamado con data:', data); // Debug
        
        // Habilitar el botón nuevamente
        $("#btnSendVenta").prop("disabled", false);
        $("#btnSendVenta").html('Enviar');
        
        if (data.success) {
            // ✅ Con event_id para deduplicación
            var eventID = 'lead_' + Date.now() + '_' + Math.random().toString(36).substring(7);
            if (typeof fbq !== 'undefined') {
                fbq('track', 'Lead', {}, { eventID: eventID });
            }
            
            // Guardar eventID para enviarlo al servidor
            sessionStorage.setItem('last_lead_event_id', eventID);
            
            // Cerrar el modal
            $("#modalVenta").modal('hide');
            
            // Mostrar el SweetAlert de éxito
            Swal.fire({
                title: 'Gracias',
                text: 'Su información ha sido recibida!',
                icon: 'success',
                confirmButtonText: 'Aceptar'
            }).then((result) => {
                // Limpiar el formulario después de cerrar la alerta
                $('#ventaForm')[0].reset();
                // Limpiar clases de validación
                $('#confirm_phone_venta').removeClass('is-valid is-invalid');
                $('#phone_match_message').hide();
                $('#phone_match_success').hide();
            });
        } else {
            Swal.fire({
                title: 'Lo sentimos',
                text: data.message || 'No hemos podido recibir su información. Intente nuevamente',
                icon: 'error',
                confirmButtonText: 'Aceptar'
            });
        }
    }

    function errorRequestVenta() {
        console.log('errorRequestVenta llamado'); // Debug
        
        $("#btnSendVenta").prop("disabled", false);
        $("#btnSendVenta").html('Enviar');
        Swal.fire({
            title: 'Lo sentimos',
            text: 'No hemos podido recibir su información. Intente nuevamente',
            icon: 'error',
            confirmButtonText: 'Aceptar'
        });
    }

    // Configurar ajaxForm para publicarForm
    $('#publicarForm').ajaxForm({
        dataType: 'json',
        success: processJson,
        beforeSubmit: function(arr, $form, options) {
            $("#btnSend").prop("disabled", true);
            $("#btnSend").html('Enviando su información');
        },
        error: errorRequest
    });

    // Configurar ajaxForm para ventaForm con manejo mejorado
    $('#ventaForm').ajaxForm({
        dataType: 'json',
        success: processJsonVenta,
        beforeSubmit: function(arr, $form, options) {
            console.log('Antes de enviar ventaForm'); // Debug
            
            // Validar que los teléfonos coincidan antes de enviar
            var phone = $('#phone_venta').val();
            var confirmPhone = $('#confirm_phone_venta').val();
            
            if (phone !== confirmPhone) {
                Swal.fire({
                    title: 'Error',
                    text: 'Los teléfonos no coinciden',
                    icon: 'error',
                    confirmButtonText: 'Aceptar'
                });
                return false; // Cancelar el envío
            }
            
            $("#btnSendVenta").prop("disabled", true);
            $("#btnSendVenta").html('Enviando su información');
            
            var eventID = sessionStorage.getItem('last_lead_event_id');
            var fbp = getCookie('_fbp');
            var urlParams = new URLSearchParams(window.location.search);
            var fbclid = urlParams.get('fbclid') || '';
            var idClick = $('#id_click_venta').val();
            
            arr.push({ name: 'event_id', value: eventID });
            arr.push({ name: 'fbp', value: fbp });
            arr.push({ name: 'fbclid', value: fbclid });
            arr.push({ name: 'id_click', value: idClick });
            
            return true; // Permitir el envío
        },
        error: errorRequestVenta
    });

    // ✅ Función helper para obtener cookies
    function getCookie(name) {
        var value = "; " + document.cookie;
        var parts = value.split("; " + name + "=");
        if (parts.length == 2) return parts.pop().split(";").shift();
        return '';
    }

        $("#btn_inicio").click(function() {
            $("#tipo_publicacion").val("propietario_vender_inicio");
        });

        $("#btn_inquilino").click(function() {
            $("#tipo_publicacion").val("propietario_vender_extranjero");
        });

        $("#btn_plano").click(function() {
            $("#tipo_publicacion").val("propietario_vender_plano");
        });

        $("#btn_contrato").click(function() {
            $("#tipo_publicacion").val("propietario_vender_juridico");
        });

        $("#btn_open").click(function() {
            $("#tipo_publicacion").val("propietario_vender_visitas");
        });

        $("#btn_iampremium").click(function() {
            $("#tipo_publicacion").val("propietario_vender_iampremium");
        });

        $("#btn_vender").click(function() {
            $("#tipo_publicacion").val("propietario_vender_iamoving");
        });

        // Manejadores de los botones para comportamiento diferenciado
        // Incluye TODOS los botones: btn_ayuda, btn_me_interesa_1, btn_me_interesa_2, btn_me_interesa_3, btn_me_interesa_4
        $("#btn_ayuda, #btn_me_interesa_1, #btn_me_interesa_2, #btn_me_interesa_3, #btn_me_interesa_4").click(function(event) {
            var botonId = $(this).attr('id');
            var tipoBoton = botonId === 'btn_ayuda' ? 'Ayuda precio' : 'Me interesa';
            var pagina = window.location.pathname.includes('vender_gratis') ? 'vender_gratis' : 'vender';
            var botonEspecifico = botonId;
            console.log('Botón clickeado:', botonId, 'Tipo:', tipoBoton); // Debug
            if (isMobileDevice()) {
                // En móvil: registrar click y luego abrir WhatsApp
                event.preventDefault();
                event.stopPropagation();
                
                // Registrar en Facebook primero
                fbq('trackCustom', 'BotonFormulario', { 
                    boton: tipoBoton, 
                    boton_id: botonId, 
                    pagina: pagina,
                    dispositivo: 'movil',
                    accion: 'whatsapp'
                });
                
                // Primero registrar el click (síncrono para asegurar que se guarde)
                if (id_aterrizaje) {

                    $.ajax({
                        url: "{{ url('registrar_click_vendedor') }}",
                        type: 'POST',
                        async: false,
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            id_aterrizaje: id_aterrizaje,
                            tipo_boton: tipoBoton + '_whatsapp',
                            boton_especifico: botonEspecifico,
                            pagina: pagina
                        },
                        success: function(response) {
                            console.log('Click registrado en móvil:', response);
                        },
                        error: function(xhr, status, error) {
                            console.log('Error registrando click:', error);
                        }
                    });
                } else {
                    // Si no hay id_aterrizaje, registrar sin él
                    $.ajax({
                        url: "{{ url('registrar_click_vendedor') }}",
                        type: 'POST',
                        async: false,
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            id_aterrizaje: null,
                            tipo_boton: tipoBoton + '_whatsapp',
                            boton_especifico: botonEspecifico,
                            pagina: pagina
                        },
                        success: function(response) {
                            console.log('Click registrado en móvil (sin aterrizaje):', response);
                            if (response.success && response.id_click && tipoBoton !== 'Ayuda precio') {
                                // Guardar id_click para usarlo después si es necesario
                                sessionStorage.setItem('ultimo_click_id', response.id_click);
                            }
                        }
                    });
                }
                
                // Abrir WhatsApp después de registrar el click
                window.abrirWhatsApp(tipoBoton, botonEspecifico, pagina);
                return false;
            } else {
                // En escritorio: registrar click normal y mostrar modal
                registrarClick(tipoBoton, botonEspecifico, pagina);
                fbq('trackCustom', 'BotonFormulario', { 
                    boton: tipoBoton, 
                    boton_id: botonId, 
                    pagina: pagina,
                    dispositivo: 'escritorio'
                });
                
                $("#tipo_publicacion_venta").val("propietario_vender_" + 
                    (botonId === 'btn_ayuda' ? 'ayuda_precio' : 'me_interesa'));
                $("#tituloModal").text(
                    botonId === 'btn_ayuda' 
                        ? "¿Deseas saber el precio de mercado de tu casa sin coste alguno?"
                        : "¿Eres propietario y quieres vender tu casa gratis y sin exclusividad?"
                );
                $("#descripcionModal").text("Déjanos tus datos y entraremos en contacto contigo para echarte una mano.");
                $("#puntosAdicionales").toggle(botonId !== 'btn_ayuda');
                $("#modalVenta").modal('show');
            }
        });
        
// Función de depuración para verificar registro de clicks
function testRegistroClick() {
    console.log('Probando registro de click...');
    $.ajax({
        url: "{{ url('registrar_click_vendedor') }}",
        type: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            id_aterrizaje: id_aterrizaje,
            tipo_boton: 'test',
            boton_especifico: 'test_button',
            pagina: window.location.pathname.includes('vender_gratis') ? 'vender_gratis' : 'vender'
        },
        success: function(response) {
            console.log('Click registrado correctamente:', response);
        },
        error: function(xhr, status, error) {
            console.log('Error registrando click:', error);
            console.log('Respuesta:', xhr.responseText);
        }
    });
}
    // ✅ AÑADIR AL FINAL del document.ready
    window.registrarClick = registrarClick;
// Descomenta la línea siguiente para probar
 //setTimeout(testRegistroClick, 3000);        
    });

    function registrarAterrizaje() {
        var urlParams = new URLSearchParams(window.location.search);
        var utm_source = urlParams.get('utm_source') || '';
        var utm_ad = urlParams.get('utm_ad') || '';
        var utm_placement = urlParams.get('utm_placement') || '';
        
        var pagina = window.location.pathname.includes('vender_gratis') ? 'vender_gratis' : 'vender';

        $.ajax({
            url: "{{ url('registrar_aterrizaje_vendedor') }}",
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                utm_source: utm_source,
                utm_ad: utm_ad,
                utm_placement: utm_placement,
                pagina: pagina
            },
            success: function(response) {
                if (response.success) {
                    id_aterrizaje = response.id_aterrizaje;
                }
            }
        });
    }

function registrarClick(tipo_boton, boton_especifico, pagina) {
    console.log('Intentando registrar click:', tipo_boton, boton_especifico, pagina);
    
    var datos = {
        _token: $('meta[name="csrf-token"]').attr('content'),
        tipo_boton: tipo_boton,
        boton_especifico: boton_especifico,
        pagina: pagina
    };
    
    // Agregar id_aterrizaje solo si existe
    if (id_aterrizaje) {
        datos.id_aterrizaje = id_aterrizaje;
        console.log('Con aterrizaje ID:', id_aterrizaje);
    } else {
        console.log('Sin aterrizaje');
    }
    
    $.ajax({
        url: "{{ url('registrar_click_vendedor') }}",
        type: 'POST',
        data: datos,
        success: function(response) {
            console.log('Click registrado con éxito:', response);
            if (response.success && response.id_click) {
                sessionStorage.setItem('ultimo_click_id', response.id_click);
                console.log('ID Click guardado:', response.id_click);
            }
        },
        error: function(xhr, status, error) {
            console.log('ERROR registrando click:', error);
            console.log('Detalles:', xhr.responseText);
        }
    });
}    

    function preventSpecials(evt) {
        evt.target.value = evt.target.value.replace("'", "").replace('"', "").replace("?", "").replace("¿", "").replace(">", "").replace("<", "").replace("!", "").replace("¡", "").replace('&', "").replace('=', "");
    }

    // Funciones para "Ver más / Ver menos"
    function myFunction() {
        var dots = document.getElementById("dots");
        var moreText = document.getElementById("more");
        var btnText = document.getElementById("myBtn");

        if (dots.style.display === "none") {
            dots.style.display = "inline";
            btnText.innerHTML = "Ver más...";
            moreText.style.display = "none";
        } else {
            dots.style.display = "none";
            btnText.innerHTML = "Ver menos...";
            moreText.style.display = "inline";
        }
    }

    function myFunction1() {
        var dots = document.getElementById("dots1");
        var moreText = document.getElementById("more1");
        var btnText = document.getElementById("myBtn1");

        if (dots.style.display === "none") {
            dots.style.display = "inline";
            btnText.innerHTML = "Ver más...";
            moreText.style.display = "none";
        } else {
            dots.style.display = "none";
            btnText.innerHTML = "Ver menos...";
            moreText.style.display = "inline";
        }
    }

    function myFunction2() {
        var dots = document.getElementById("dots2");
        var moreText = document.getElementById("more2");
        var moreText3 = document.getElementById("more3");
        var btnText = document.getElementById("myBtn2");

        if (dots.style.display === "none") {
            dots.style.display = "inline";
            btnText.innerHTML = "Ver más...";
            moreText.style.display = "none";
            moreText3.style.display = "none";
        } else {
            dots.style.display = "none";
            btnText.innerHTML = "Ver menos...";
            moreText.style.display = "inline";
            moreText3.style.display = "inline";
        }
    }

    function myFunction3() {
        var dots = document.getElementById("dots3");
        var moreText3 = document.getElementById("more4");
        var btnText = document.getElementById("myBtn3");

        if (dots.style.display === "none") {
            dots.style.display = "inline";
            btnText.innerHTML = "Ver más...";
            moreText3.style.display = "none";
        } else {
            dots.style.display = "none";
            btnText.innerHTML = "Ver menos...";
            moreText3.style.display = "inline";
        }
    }

    function myFunction4() {
        var dots = document.getElementById("dots4");
        var moreText3 = document.getElementById("more5");
        var btnText = document.getElementById("myBtn4");

        if (dots.style.display === "none") {
            dots.style.display = "inline";
            btnText.innerHTML = "Ver más...";
            moreText3.style.display = "none";
        } else {
            dots.style.display = "none";
            btnText.innerHTML = "Ver menos...";
            moreText3.style.display = "inline";
        }
    }

    // Tooltip functionality
    $(function() {
        var targets = $('[rel~=tooltip]'),
            target = false,
            tooltip = false,
            title = false;

        targets.bind('mouseenter', function() {
            target = $(this);
            tip = target.attr('title');
            tooltip = $('<div id="tooltip"></div>');

            if (!tip || tip == '') return false;

            target.removeAttr('title');
            tooltip.css('opacity', 0).html(tip).appendTo('body');

            var init_tooltip = function() {
                if ($(window).width() < tooltip.outerWidth() * 1.5)
                    tooltip.css('max-width', $(window).width() / 2);
                else
                    tooltip.css('max-width', 340);

                var pos_left = target.offset().left + (target.outerWidth() / 2) - (tooltip.outerWidth() / 2),
                    pos_top = target.offset().top - tooltip.outerHeight() - 20;

                if (pos_left < 0) {
                    pos_left = target.offset().left + target.outerWidth() / 2 - 20;
                    tooltip.addClass('left');
                } else
                    tooltip.removeClass('left');

                if (pos_left + tooltip.outerWidth() > $(window).width()) {
                    pos_left = target.offset().left - tooltip.outerWidth() + target.outerWidth() / 2 + 20;
                    tooltip.addClass('right');
                } else
                    tooltip.removeClass('right');

                if (pos_top < 0) {
                    var pos_top = target.offset().top + target.outerHeight();
                    tooltip.addClass('top');
                } else
                    tooltip.removeClass('top');

                tooltip.css({ left: pos_left, top: pos_top }).animate({ top: '+=10', opacity: 1 }, 50);
            };

            init_tooltip();
            $(window).resize(init_tooltip);

            var remove_tooltip = function() {
                tooltip.animate({ top: '-=10', opacity: 0 }, 50, function() {
                    $(this).remove();
                });
                target.attr('title', tip);
            };

            target.bind('mouseleave', remove_tooltip);
            tooltip.bind('click', remove_tooltip);
        });
    });

    $(document).ready(function() {
        $('body').addClass('propietario-vender');

        if ($('body').hasClass('propietario-vender')) {
            $("button.btn-collapse").off('click').on('click', function() {
                $(this).css('color', "#EADD1B");
                let collapse = $(this).attr('href');
                console.log(collapse);
                if (!self.collapse_data.includes(collapse)) {
                    self.collapse_data.push(collapse);
                }
            });
        }
    });
</script>

    <script>
        // Script de emergencia para botones WhatsApp
        (function() {
            console.log('🟢 Botones WhatsApp - Script de emergencia cargado');
            
            function isMobileDevice() {
                return (window.innerWidth <= 768) || 
                       (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent));
            }
            
            function abrirWhatsAppDirecto(botonId) {
                console.log('📱 Abriendo WhatsApp desde botón:', botonId);
                
                var tipoBoton = botonId === 'btn_ayuda' ? 'Ayuda precio' : 'Me interesa';
                var pagina = window.location.pathname.includes('vender_gratis') ? 'vender_gratis' : 'vender';
                
                var mensaje = tipoBoton === 'Ayuda precio' 
                    ? "Hola! Estoy interesado en vender mi casa.\n\n¿Podríais ayudarme a saber en qué precio la anuncio?" 
                    : "Hola! Estoy interesado en vender mi casa con IAMOVING de forma gratuita y sin exclusividad.\n\n¿Podríais darme más información?";
                
                var urlParams = new URLSearchParams(window.location.search);
                var utm_source = urlParams.get('utm_source') || '';
                var utm_campaign = urlParams.get('utm_campaign') || '';
                
                if (utm_source || utm_campaign) {
                    mensaje += `\n\nFuente: ${utm_source} ${utm_campaign}`;
                }
                
                //Eliminamos 
                //mensaje += `\nPágina: ${pagina === 'vender_gratis' ? 'Vender Gratis' : 'Vender'}`;
                
                var telefono = "34649623700";
                var mensajeCodificado = encodeURIComponent(mensaje);
                
                window.location.href = `https://wa.me/${telefono}?text=${mensajeCodificado}`;
                
                return false;
            }
            
            function initBotones() {
                console.log('🟢 Inicializando botones...');
                
                const botones = ['btn_ayuda', 'btn_me_interesa_1', 'btn_me_interesa_2', 'btn_me_interesa_3', 'btn_me_interesa_4'];
                
                botones.forEach(function(botonId) {
                    const boton = document.getElementById(botonId);
                    if (boton) {
                        console.log('✅ Botón encontrado:', botonId);
                        
                        const nuevoBoton = boton.cloneNode(true);
                        boton.parentNode.replaceChild(nuevoBoton, boton);
                        
                        nuevoBoton.addEventListener('click', function(event) {
                            event.preventDefault();
                            event.stopPropagation();
                        
                            var botonId = this.id;
                            var tipoBoton = botonId === 'btn_ayuda' ? 'Ayuda precio' : 'Me interesa';
                            var pagina = window.location.pathname.includes('vender_gratis') ? 'vender_gratis' : 'vender';
                        
                            if (isMobileDevice()) {
                                console.log('📱 Móvil detectado, abriendo WhatsApp...');
                                // ✅ Usar abrirWhatsApp (que SÍ registra en BD) en vez de abrirWhatsAppDirecto
                                window.abrirWhatsApp(tipoBoton, botonId, pagina);
                            } else {
                                console.log('💻 Escritorio detectado, mostrando modal...');
                                // ✅ Registrar el click antes de mostrar el modal
                                if (typeof window.registrarClick === 'function') {
                                    window.registrarClick(tipoBoton, botonId, pagina);
                                }
                                if (typeof $ !== 'undefined') {
                                    $("#tipo_publicacion_venta").val("propietario_vender_" + 
                                        (botonId === 'btn_ayuda' ? 'ayuda_precio' : 'me_interesa'));
                                    $("#tituloModal").text(
                                        botonId === 'btn_ayuda' 
                                            ? "¿Deseas saber el precio de mercado de tu casa sin coste alguno?"
                                            : "¿Eres propietario y quieres vender tu casa gratis y sin exclusividad?"
                                    );
                                    $("#descripcionModal").text("Déjanos tus datos y entraremos en contacto contigo para echarte una mano.");
                                    $("#puntosAdicionales").toggle(botonId !== 'btn_ayuda');
                                    $('#modalVenta').modal('show');
                                }
                            }
                            return false;
                        });                        
                    }
                });
            }
            
            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', initBotones);
            } else {
                initBotones();
            }
            
            setTimeout(initBotones, 1000);
            
            // Escuchar cuando el banner de cookies esté listo
            document.addEventListener('cookieBannerReady', function() {
                console.log('🟢 Banner de cookies listo, reinicializando botones...');
                initBotones();
            });
            
            window.abrirWhatsAppDirecto = abrirWhatsAppDirecto;
            window.isMobileDevice = isMobileDevice;
        })();
    </script>