@extends('layouts.iamovingto')
@section('title', 'IAMOVING to Spain Consulta')
@section('description', 'IAMOVING to Spain')
@section('image', 'https://iamoving.com/img/iamoving.png')
@section('content')
<section class="content-section">
    <div class="container">
        <div class="text-center mt-4 mb-4">
            <a href="#" class="btn btn-iamoving btn-lg show-form" id="topButton">Agendar Consulta</a>
        </div>
        <div class="content-wrapper mb-4">
            <p class="content-paragraph">Para el asesoramiento en extranjería, debido a la complejidad y la diversidad de situaciones, es esencial que tengas una consulta individual.</p>
            <p class="content-paragraph">La primera consulta consiste en una reunión contigo, en la que podrás explicarnos tu situación para que podamos analizar los pasos a seguir y orientarte en los procesos más convenientes para ti. Es fundamental proporcionarte una orientación adecuada, ya que cada caso es distinto.</p>
            <p class="content-paragraph">En esta reunión también se te informará sobre los costes y tiempos de tramitación. Si estás de acuerdo, se te enviará un contrato de servicios detallando lo que incluye.</p>
            <p class="content-paragraph"></p>
        </div>
        <div class="text-center mb-4">
            <a href="#" class="btn btn-iamoving btn-lg show-form">Agendar Consulta</a>
        </div>
        <div id="consultaForm" style="display: none;">
            <!--<form id="agendarConsulta" novalidate>-->
            <!--<form id="agendarConsulta" method="POST" action="{{ route('enviar.consulta') }}" novalidate>-->
            <form id="agendarConsulta" method="POST" action="{{ route('crear.sesion.pago') }}" novalidate>
                @csrf            
                <div class="form-group">
                    <input type="text" id="nombre" name="nombre" maxlength="25" required class="form-control" placeholder="Nombre">
                    <div class="invalid-feedback">Por favor, ingrese su nombre.</div>
                </div>
                <div class="form-group">
                    <input type="text" id="apellidos" name="apellidos" maxlength="55" required class="form-control" placeholder="Apellidos">
                    <div class="invalid-feedback">Por favor, ingrese sus apellidos.</div>
                </div>
                <div class="form-group">
                    <select id="pais" name="pais" required class="form-control">
                        <option value="">Seleccione un país</option>
                        <option value="Argentina">Argentina</option>
                        <option value="Bolivia">Bolivia</option>
                        <option value="Chile">Chile</option>
                        <option value="Colombia">Colombia</option>
                        <option value="Costa Rica">Costa Rica</option>
                        <option value="Cuba">Cuba</option>
                        <option value="Ecuador">Ecuador</option>
                        <option value="El Salvador">El Salvador</option>
                        <option value="Guatemala">Guatemala</option>
                        <option value="Honduras">Honduras</option>
                        <option value="México">México</option>
                        <option value="Nicaragua">Nicaragua</option>
                        <option value="Otros">Otros</option>
                        <option value="Panamá">Panamá</option>
                        <option value="Paraguay">Paraguay</option>
                        <option value="Perú">Perú</option>
                        <option value="Puerto Rico">Puerto Rico</option>
                        <option value="República Dominicana">República Dominicana</option>
                        <option value="Uruguay">Uruguay</option>
                        <option value="Venezuela">Venezuela</option>
                    </select>
                    <div class="invalid-feedback">Por favor, seleccione un país.</div>
                </div>
		<!--Otro País-->
        		<div class="form-group" id="otroPaisGroup" style="display: none;">
        		    <input type="text" id="otroPais" name="otroPais" maxlength="50" class="form-control" placeholder="Especifica tu país">
        		    <div class="invalid-feedback">Por favor, especifica su país.</div>
        		</div>
        <!--Otro País-->                
                <div class="form-group">
                    <input type="tel" id="telefono" name="telefono" maxlength="20" pattern="[0-9+ ]+" required class="form-control" placeholder="Número de teléfono con WhatsApp">
                    <div class="invalid-feedback">Por favor, ingrese un número de teléfono válido.</div>
                </div>
                <div class="form-group">
                    <input type="email" id="email" name="email" maxlength="125" required class="form-control" placeholder="Email">
                    <div class="invalid-feedback">Por favor, ingrese un email válido.</div>
                </div>
                <div class="form-group">
                    <input type="email" id="repeatEmail" name="repeatEmail" maxlength="25" required class="form-control" placeholder="Repetir email" onpaste="return false;">
                    <div class="invalid-feedback">Por favor, repita el email correctamente.</div>
                </div>
                <div class="form-group">
                    <label for="mesConsulta">¿Qué mes te gustaría realizar tu consulta?</label>
                    <select id="mesConsulta" name="mesConsulta" required class="form-control">
                        <option value="">Seleccione un mes</option>
                        <!-- Las opciones se llenarán con JavaScript -->
                    </select>
                    <div class="invalid-feedback">Por favor, seleccione un mes válido.</div>
                    <div id="mesError" class="error-message" style="display: none; color: red; margin-top: 5px;"></div>
                </div>
                <p class="info-text"><i>Una vez que hayamos recibido el pago de tu consulta entraremos en contacto contigo lo antes posible para concretar día y horario en el mes que tú has establecido.</i></p>
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="terminos" name="terminos" required>
                        <label class="custom-control-label" for="terminos">He leído y aceptado los términos y condiciones de IAMOVING.</label>
                        <div class="invalid-feedback">Debe aceptar los términos y condiciones para continuar.</div>
                    </div>
                </div>
                <div class="form-group text-center">
                    <button type="button" id="stripe-button" class="btn btn-iamoving btn-lg btn-enviar">
                        <span class="precio-texto">Pagar consulta</span>
                        <span class="precio-valor">80€</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
<style>
    .content-section {
        padding: 4rem 0;
    }
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 15px;
    }
    .content-wrapper {
        max-width: 800px;
        margin: 0 auto;
    }
    .content-paragraph {
        margin-bottom: 1rem;
        text-align: justify;
    }
    .btn-iamoving {
        background-color: #ffff00;
        border-color: #ffff00;
        color: #000000;
        font-size: 1.25rem;
        padding: 10px 30px;
        font-weight: bold;
    }
    .btn-iamoving:hover {
        background-color: #e6e600;
        border-color: #e6e600;
        color: #000000;
    }
    .form-group {
        margin-bottom: 1rem;
    }
    .form-control {
        width: 100%;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }
    .form-control.is-invalid {
        border-color: #dc3545;
        padding-right: calc(1.5em + 0.75rem);
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='none' stroke='%23dc3545' viewBox='0 0 12 12'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23dc3545' stroke='none'/%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right calc(0.375em + 0.1875rem) center;
        background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
    }
    .invalid-feedback {
        display: none;
        width: 100%;
        margin-top: 0.25rem;
        font-size: 80%;
        color: #dc3545;
    }
    label {
        display: block;
        margin-bottom: 0.5rem;
    }

    
    .btn-enviar {
        font-size: 1.25rem;
        padding: 15px 40px;
        margin-top: 2rem;
        margin-bottom: 3rem;
        display: inline-flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        min-width: 200px;
    }
    
    .precio-texto {
        display: block;
        margin-bottom: 5px;
    }
    
    .precio-valor {
        display: block;
        font-size: 1.5rem;
        font-weight: bold;
    }

    @media (max-width: 768px) {
        .content-wrapper {
            max-width: 100%;
        }
        .btn-enviar {
            min-width: 180px;
            padding: 12px 30px;
        }
    }  
    .info-text {
        font-style: italic;
        margin-bottom: 1rem;
        color: #6c757d;
    }
    
    .custom-control {
        position: relative;
        display: block;
        min-height: 1.5rem;
        padding-left: 1.5rem;
    }
    
    .custom-control-input {
        position: absolute;
        z-index: -1;
        opacity: 0;
    }
    
    .custom-control-label {
        position: relative;
        margin-bottom: 0;
        vertical-align: top;
    }
    
    .custom-control-label::before {
        position: absolute;
        top: 0.25rem;
        left: -1.5rem;
        display: block;
        width: 1rem;
        height: 1rem;
        pointer-events: none;
        content: "";
        background-color: #fff;
        border: #adb5bd solid 1px;
    }
    
    .custom-control-label::after {
        position: absolute;
        top: 0.25rem;
        left: -1.5rem;
        display: block;
        width: 1rem;
        height: 1rem;
        content: "";
        background: no-repeat 50% / 50% 50%;
    }
    
    .custom-checkbox .custom-control-input:checked ~ .custom-control-label::after {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 8'%3e%3cpath fill='%23fff' d='M6.564.75l-3.59 3.612-1.538-1.55L0 4.26 2.974 7.25 8 2.193z'/%3e%3c/svg%3e");
    }  
.btn-iamoving:disabled {
    opacity: 0.7;
    cursor: not-allowed;
}    
</style>
<script src="https://js.stripe.com/v3/"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var consultaButton = document.getElementById('stripe-button');
    if (consultaButton) {
        consultaButton.addEventListener('click', function() {
            if (typeof gtag === 'function') {
                gtag('event', 'click', {
                    'event_category': 'Button',
                    'event_label': 'Pago',
                    'value': 1
                });
            }
        });
    }
    
    const buttons = document.querySelectorAll('.show-form');
    const form = document.getElementById('consultaForm');
    //const topButton = document.getElementById('topButton');
    const nombreInput = document.getElementById('nombre');
    const emailInput = document.getElementById('email');
    const repeatEmailInput = document.getElementById('repeatEmail');
    const mesConsultaSelect = document.getElementById('mesConsulta');
    const mesError = document.getElementById('mesError');

    buttons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            form.style.display = 'block';
            //if (this === topButton) {
                nombreInput.scrollIntoView({ behavior: 'smooth' });
            //}
        });
    });

    // Llenar el select de meses
    const meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
    const fechaActual = new Date();
    let mesActual = fechaActual.getMonth();
    
    for (let i = 0; i < 12; i++) {
        mesActual = (mesActual + 1) % 12;
        const option = document.createElement('option');
        option.value = meses[mesActual];
        option.textContent = meses[mesActual];
        mesConsultaSelect.appendChild(option);
    }

    // Validación del mes seleccionado
    mesConsultaSelect.addEventListener('change', function() {
        const mesSeleccionado = this.value;
        const mesActualNombre = meses[fechaActual.getMonth()];
        
        if (mesSeleccionado === mesActualNombre) {
            mesError.textContent = "Lamentablemente este mes en curso ya no tenemos disponibles más horarios, intente otro mes. Gracias.";
            mesError.style.display = 'block';
            this.value = ''; // Reseteamos la selección
        } else {
            mesError.style.display = 'none';
        }
    });

const paisSelect = document.getElementById('pais');
const otroPaisGroup = document.getElementById('otroPaisGroup');
const otroPaisInput = document.getElementById('otroPais');

paisSelect.addEventListener('change', function() {
    if (this.value === 'Otros') {
        otroPaisGroup.style.display = 'block';
        otroPaisInput.required = true;
    } else {
        otroPaisGroup.style.display = 'none';
        otroPaisInput.required = false;
        otroPaisInput.value = ''; // Clear the input when hidden
    }
});

    // Validación del formulario
    document.getElementById('agendarConsulta').addEventListener('submit', function(e) {
        e.preventDefault();
        let isValid = true;

    // Validar todos los campos
    this.querySelectorAll('[required]').forEach((field) => {
        if (!field.value && field.type !== 'checkbox') {
            field.classList.add('is-invalid');
            isValid = false;
        } else if (field.type === 'checkbox' && !field.checked) {
            field.classList.add('is-invalid');
            isValid = false;
        } else {
            field.classList.remove('is-invalid');
        }
    });
        
    // Add validation for otroPais
    if (paisSelect.value === 'Otros') {
        if (!otroPaisInput.value.trim()) {
            otroPaisInput.classList.add('is-invalid');
            isValid = false;
        } else {
            otroPaisInput.classList.remove('is-invalid');
        }
    }
    
        // Validar checkbox de términos y condiciones
        const terminosCheckbox = document.getElementById('terminos');
        if (!terminosCheckbox.checked) {
            terminosCheckbox.classList.add('is-invalid');
            isValid = false;
        } else {
            terminosCheckbox.classList.remove('is-invalid');
        }

        // Validar coincidencia de emails
        if (emailInput.value !== repeatEmailInput.value) {
            repeatEmailInput.classList.add('is-invalid');
            repeatEmailInput.nextElementSibling.textContent = 'Los correos electrónicos no coinciden';
            isValid = false;
        }

        // Validar selección de mes
        if (mesConsultaSelect.value === '') {
            mesConsultaSelect.classList.add('is-invalid');
            mesError.textContent = "Por favor, seleccione un mes válido.";
            mesError.style.display = 'block';
            isValid = false;
        }

        if (isValid) {
            fetch(this.action, {
                method: 'POST',
                body: new FormData(this),
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                const contentType = response.headers.get("content-type");
                if (contentType && contentType.indexOf("application/json") !== -1) {
                    return response.json();
                } else {
                    throw new Error('Received non-JSON response from server');
                }
            })
            .then(data => {
                if (data.success) {
                    alert('Su solicitud de consulta ha sido enviada con éxito.');
                    this.reset();
                } else {
                    alert(data.message || 'Ha ocurrido un error al enviar su solicitud. Por favor, inténtelo de nuevo.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Ha ocurrido un error al enviar su solicitud. Por favor, inténtelo de nuevo.');
            });
        }
    });

    const stripe = Stripe('{{ env('STRIPE_KEY') }}');
    const stripeButton = document.getElementById('stripe-button');
    if (!stripeButton) {
        console.error('El botón de pago no se encontró en el DOM');
        return;
    }    
    let isProcessing = false;

    stripeButton.addEventListener('click', function(e) {
        e.preventDefault();
        
        if (isProcessing) {
            return; // Evita múltiples clics
        }

        // Validar el formulario antes de proceder al pago
        let isValid = true;
        document.querySelectorAll('#agendarConsulta [required]').forEach((field) => {
            if (!field.value && field.type !== 'checkbox') {
                field.classList.add('is-invalid');
                isValid = false;
            } else if (field.type === 'checkbox' && !field.checked) {
                field.classList.add('is-invalid');
                isValid = false;
            } else {
                field.classList.remove('is-invalid');
            }
        });
    
        if (!isValid) {
            alert('Por favor, complete todos los campos requeridos antes de proceder al pago.');
            return;
        }
    
        // Cambiar el texto del botón y deshabilitar
        isProcessing = true;
        const originalButtonText = stripeButton.innerHTML;
        stripeButton.innerHTML = 'Procesando...';
        stripeButton.disabled = true;

        // Crear la sesión de pago en el servidor
        fetch('{{ route('crear.sesion.pago') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
    	    //amount: 8000,
                nombre: document.getElementById('nombre').value,
                apellidos: document.getElementById('apellidos').value,
                email: document.getElementById('email').value,
                pais: document.getElementById('pais').value,
                otroPais: document.getElementById('pais').value === 'Otros' ? document.getElementById('otroPais').value : '',                
                telefono: document.getElementById('telefono').value,
                mesConsulta: document.getElementById('mesConsulta').value,
                terminos: document.getElementById('terminos').checked
            })
        })
        .then(response => {
            if (!response.ok) {
                return response.json().then(err => Promise.reject(err));
            }
            return response.json();
        })
        .then(session => {
            return stripe.redirectToCheckout({ sessionId: session.id });
        })
        .then(result => {
            if (result.error) {
	    	//alert(result.error.message);
                throw new Error(result.error.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
	    ////alert('Ha ocurrido un error: ' + (error.error || 'Por favor, inténtelo de nuevo.'));
            alert('Ha ocurrido un error al procesar el pago. Por favor, inténtelo de nuevo.');
        })
        .finally(() => {
            // Restaurar el botón a su estado original
            isProcessing = false;
            stripeButton.innerHTML = originalButtonText;
            stripeButton.disabled = false;
        });
    });
});
</script>
@endsection