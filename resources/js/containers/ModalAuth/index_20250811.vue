<template>
    <Modal>
        <template v-slot:content>
            <div  class="modal-header">
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
                <Login  class="modal-body" v-if="mode == 1" @login="login"></Login>
                <Register  class="modal-body" v-if="mode == 2" @register="register"></Register>
                <Forgot  class="modal-body" v-if="mode == 3" @forgot="forgot" @back="back"></Forgot>
                <Reset  class="modal-body" v-if="mode == 4" @reset="reset" :secret="secret"></Reset>
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
// Locally import the VuePassword component.
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
        if (this.user) {
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
            axios.post('/auth/register', request)
                .then((response) => {
                    if (response.status == 200) {
                        //this.login(request);
                        this.feedback("Te has registrado correctamente. Ingresa a tu Email y Clave para iniciar sesión. Gracias", false);
                        this.mode = 1;
                    }else{
                        console.log("No");
                        console.log(response);
                    }
                })
                .catch((exception) => {
                    console.log(exception.response);
                    this.extractError(exception.response);
                })
        },
        login(request) {
            axios.post('/auth/login', request)
                .then((response) => {
                    if (response.status == 200) {
                        console.log(response.data);
                        this.$parent.setUser(response.data.user);
                        console.log("login1");
                        localStorage.setItem("token", response.data.access_token);
                        console.log("login2");
                        localStorage.setItem("user", JSON.stringify(response.data.user));
                        console.log(localStorage.getItem("action"));
                        $(this.$el).modal('hide');
                        if(localStorage.getItem("action")){
                            if(localStorage.getItem("action")=="visita"){
                                $("#step1").show();
                                $("#step2").hide();
                                $('#modalCita').modal('show');
                                //alert('hola1');
                            }
                            if(localStorage.getItem("action")=="pedido"){
                                $("#step1").hide();
                                $("#btnAtras").hide();
                                $("#date").prop('required',true);
                                $("#time").prop('required',true);                                
                                $("#step2").show();                                
                                $('#modalCita').modal('show');
                            }                            
                            if(localStorage.getItem("action")=="alquilar_comprar"){
                                this.$parent.request(localStorage.getItem("action_data"));
                                localStorage.removeItem("action_data");
                                 //alert('adios');
                            }
                            if(localStorage.getItem("action")=="favorito"){
                                this.$parent.agregarFavorito(localStorage.getItem("action_data"));
                                localStorage.removeItem("action_data");
                            }
                            if(localStorage.getItem("action")=="pedido_reserva"){
                                $('#modalPedido').modal('show');
                                localStorage.removeItem("action_data");
                            }
                            localStorage.removeItem("action");
                        }
                        //location.reload();
                    }
                })
                .catch((exception) => {
                    console.log(exception.response);
                    this.extractError(exception.response);
                })
        },
        extractError(response){
            if(response.status == 422){
                var error = response.data.errors;
                var errorKey = Object.keys(error)[0];
                console.log(error[errorKey][0]);
                this.feedback(error[errorKey][0], true);
            }else if(response.status == 401){
                var error = response.data.message;
                console.log(error);
                this.feedback(error, true);
            }else{
                this.feedback("Email ya registrado. Inicie sesión o acceda a ¿Has olvidado tu contraseña?", true);
            }
             //this.feedback("Email ya registrado. Inicie sesión o acceda a ¿Has olvidado tu contraseña?", true);
        },
        feedback(message,error) {
            this.alert.message = message;
            if(error){
                this.alert.error = error;
                setTimeout(() => {
                    this.alert.error = false;
                }, 5000);
            }else{
                this.alert.active = true;
                setTimeout(() => {
                    this.alert.active = false;
                }, 5000);
            }
        },
        retrieve(){
            this.mode = 3;
        },
        back(request){
            this.mode = 1;
        },
        forgot(request){
            console.log(request);
            axios.post('/auth/retrieve', request)
                .then((response) => {
                    if (response.status == 200) {
                        console.log(response);
                        this.feedback("Le hemos enviado un correo electrónico con instrucciones. Si no recibe el correo mire en su bandeja de spam o intente registrase.", false);
                        this.mode = 1;
                    }else{
                        this.feedback("Le hemos enviado un correo electrónico con instrucciones. Si no recibe el correo mire en su bandeja de spam o intente registrase.", false);
                        this.mode = 1;
                    }                    
                })
                .catch((exception) => {
                    console.log(exception.response);
                    //this.extractError(exception.response.data.errors);
                        this.feedback("Le hemos enviado un correo electrónico con instrucciones. Si no recibe el correo mire en su bandeja de spam o intente registrase.", false);
                        this.mode = 1;                    
                })
        },
        reset(request,valid){
            if(valid){
                console.log(request);
                axios.post('/auth/reset', request)
                    .then((response) => {
                        if (response.status == 200) {
                            console.log(response);
                            this.feedback("Tu clave ha sido reestablecida", false);
                            this.mode = 1;
                        }
                    })
                    .catch((exception) => {
                        console.log(exception.response);
                        this.extractError(exception.response.data.errors);
                    })
            }else{
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

.terms{
    font-size:12px;
}
.terms .a{
    color:#AEEB3D;
}
</style>
