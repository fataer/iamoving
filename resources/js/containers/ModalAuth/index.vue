<template>
    <Modal>
        <template v-slot:content>
            <div class="modal-header">
                <h5 class="modal-title" v-show="mode == 1">
                    Iniciar sesión
                </h5>
                <h5 class="modal-title" v-show="mode == 2">
                    Registrarse
                </h5>
                <h5 class="modal-title" v-show="mode == 3">
                    ¿Has olvidado tu clave?
                </h5>
                <h5 class="modal-title" v-show="mode == 4">
                    Reestablece tu clave
                </h5>                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div v-if="mode == 1 || mode == 2">
                    <nav class="nav nav-pills nav-justified" role="tablist">
                        <a href="#" class="nav-item nav-link"
                            :class="{ active: mode == 1 }"
                            @click.prevent="mode = 1">Iniciar sesión</a>
                        <a href="#" class="nav-item nav-link"
                            :class="{ active: mode == 2 }"
                            @click.prevent="mode = 2">¿No estas registrado?</a>
                    </nav>
                </div>
                <br>
                <transition name="slide-fade">
                    <div class="alert alert-danger" role="alert" v-show="alert.error">
                        {{alert.message}}
                    </div>
                </transition>
                <transition name="slide-fade">
                    <div class="alert alert-success" v-show="alert.active">
                        {{alert.message}}
                    </div>
                </transition>
                <Login ref="loginComponent" class="modal-body" v-if="mode == 1" @login="login"></Login>
                <Register class="modal-body" v-if="mode == 2" @register="register"></Register>
                <Forgot class="modal-body" v-if="mode == 3" @forgot="forgot" @back="back"></Forgot>
                <Reset class="modal-body" v-if="mode == 4" @reset="reset" :secret="secret"></Reset>
            </div>
            <div class="text-center terms" v-if="mode == 1">
                Al iniciar sesión estás aceptando los <a href="/terminosC-condiciones" target="_blank">términos y condiciones</a> y las <a href="/politica-privacidad" target="_blank">politicas de privacidad</a> de <b>IAMOVING</b>
            </div>
            <div class="text-center terms" v-if="mode == 2">
                Al registrarte estás aceptando los <a href="/terminosC-condiciones" target="_blank">términos y condiciones</a> y las <a href="/politica-privacidad" target="_blank">politicas de privacidad</a> de <b>IAMOVING</b>
            </div>			
            <div class="form-group" v-if="mode == 1|| mode == 2">
                <button type="button" class="btn btn-link btn-block" v-on:click="retrieve">¿HAS OLVIDADO TU CLAVE?</button>
            </div>
        </template>
    </Modal>
</template>

<script>
import Modal from "../ModalContainer";
import Login from "./Login";
import Register from "./Register";
import Forgot from "./Forgot";
import Reset from "./Reset";
import VuePassword from 'vue-password';

export default {
    components: {
        VuePassword,
        Modal,
        Login,
        Register,
        Forgot,
        Reset
    },
    props: {
        user: String,
        secret: String,
        recover: String
    },
    data() {
        return {
            mode: 1,
            alert: {
                error: false,
                active: false,
                message: ''
            }
        }
    },
    created() {
        this.mode = 1;
        if (this.user) {
            this.$parent.setUser(JSON.parse(this.user));
        }
        if(this.secret){
            this.mode = 4;
        }
        if(this.recover){
            this.mode = 3;
        }
    },
    methods: {
        register(request) {
            // Limpiar alertas previas
            this.clearAlerts();
            
            axios.post('/auth/register', request)
                .then((response) => {
                    console.log('Registro exitoso:', response);
                    if (response.status == 200 || response.status == 201) {
                        this.feedback("¡Registro exitoso! Ahora inicia sesión con tu email y contraseña.", false);
                        
                        // Cambiar a modo login
                        this.mode = 1;
                        
                        // Prellenar el email en el formulario de login
                        this.$nextTick(() => {
                            if (this.$refs.loginComponent) {
                                this.$refs.loginComponent.setEmail(request.email);
                            }
                        });
                    }
                })
                .catch((exception) => {
                    console.log('Error en registro:', exception.response);
                    this.extractError(exception.response);
                })
        },
        
        login(request) {
            // Limpiar alertas previas
            this.clearAlerts();
            
            axios.post('/auth/login', request)
                .then((response) => {
                    console.log('Login exitoso:', response);
                    if (response.status == 200) {
                        console.log(response.data);
                        this.$parent.setUser(response.data.user);
                        localStorage.setItem("token", response.data.access_token);
                        localStorage.setItem("user", JSON.stringify(response.data.user));
                        
                        $(this.$el).modal('hide');
                        
                        // Manejar acciones pendientes
                        this.handlePendingActions();
                    }
                })
                .catch((exception) => {
                    console.log('Error en login:', exception.response);
                    this.extractError(exception.response);
                })
        },
        
        extractError(response) {
            let errorMessage = "Ha ocurrido un error. Por favor, inténtelo de nuevo.";
            
            if (!response) {
                this.feedback(errorMessage, true);
                return;
            }
            
            console.log('Analizando error:', response.status, response.data);
            
            if (response.status == 422) {
                // Errores de validación
                if (response.data && response.data.errors) {
                    const errors = response.data.errors;
                    const errorKey = Object.keys(errors)[0];
                    if (errorKey && errors[errorKey] && errors[errorKey][0]) {
                        errorMessage = errors[errorKey][0];
                    }
                }
            } else if (response.status == 401) {
                // Error de autenticación
                if (response.data && response.data.message) {
                    errorMessage = response.data.message;
                } else {
                    errorMessage = "Credenciales incorrectas. Verifique su email y contraseña.";
                }
            } else if (response.status == 409) {
                // Conflicto (email ya existe)
                errorMessage = "El email ya está registrado. Inicie sesión o use la opción '¿Has olvidado tu clave?'";
            } else if (response.status == 500) {
                errorMessage = "Error del servidor. Por favor, inténtelo más tarde.";
            } else if (response.data && response.data.message) {
                errorMessage = response.data.message;
            }
            
            this.feedback(errorMessage, true);
        },
        
        feedback(message, error) {
            this.clearAlerts();
            this.alert.message = message;
            
            if (error) {
                this.alert.error = true;
                setTimeout(() => {
                    this.alert.error = false;
                }, 7000);
            } else {
                this.alert.active = true;
                setTimeout(() => {
                    this.alert.active = false;
                }, 7000);
            }
        },
        
        clearAlerts() {
            this.alert.error = false;
            this.alert.active = false;
            this.alert.message = '';
        },
        
        handlePendingActions() {
            const action = localStorage.getItem("action");
            if (action) {
                const actionData = localStorage.getItem("action_data");
                
                switch(action) {
                    case "visita":
                        $("#step1").show();
                        $("#step2").hide();
                        $('#modalCita').modal('show');
                        break;
                    case "pedido":
                        $("#step1").hide();
                        $("#btnAtras").hide();
                        $("#date").prop('required', true);
                        $("#time").prop('required', true);                                
                        $("#step2").show();                                
                        $('#modalCita').modal('show');
                        break;
                    case "alquilar_comprar":
                        this.$parent.request(actionData);
                        break;
                    case "favorito":
                        this.$parent.agregarFavorito(actionData);
                        break;
                    case "pedido_reserva":
                        $('#modalPedido').modal('show');
                        break;
                }
                
                // Limpiar acciones pendientes
                localStorage.removeItem("action");
                localStorage.removeItem("action_data");
            }
        },
        
        retrieve() {
            this.clearAlerts();
            this.mode = 3;
        },
        
        back(request) {
            this.clearAlerts();
            this.mode = 1;
        },
        
        forgot(request) {
            this.clearAlerts();
            console.log(request);
            
            axios.post('/auth/retrieve', request)
                .then((response) => {
                    console.log('Forgot password response:', response);
                    this.feedback("Le hemos enviado un correo electrónico con instrucciones. Si no recibe el correo mire en su bandeja de spam.", false);
                    this.mode = 1;
                })
                .catch((exception) => {
                    console.log('Error en forgot password:', exception.response);
                    // Siempre mostrar mensaje positivo por seguridad
                    this.feedback("Le hemos enviado un correo electrónico con instrucciones. Si no recibe el correo mire en su bandeja de spam.", false);
                    this.mode = 1;
                })
        },
        
        reset(request, valid) {
            this.clearAlerts();
            
            if (valid) {
                console.log(request);
                axios.post('/auth/reset', request)
                    .then((response) => {
                        console.log('Reset password response:', response);
                        if (response.status == 200) {
                            this.feedback("Tu clave ha sido reestablecida correctamente", false);
                            this.mode = 1;
                        }
                    })
                    .catch((exception) => {
                        console.log('Error en reset password:', exception.response);
                        this.extractError(exception.response);
                    })
            } else {
                this.feedback("Las claves deben coincidir", true);
            }
        }
    }
}
</script>

<style lang="scss">
.nav {
    .nav-item.nav-link {
        border-radius: 0;
        color: #333;
        &.active {
            color: #eadd03;
            background-color: #333 !important;
        }
    }
}

.slide-fade-enter-active {
  transition: all .3s ease-in;
}
.slide-fade-leave-active {
  transition: all .3s ease-out;
}
.slide-fade-enter, .slide-fade-leave-to {
  transform: translateX(10px);
  opacity: 0;
}

.terms {
    font-size: 12px;
}
.terms a {
    color: #AEEB3D;
}
</style>