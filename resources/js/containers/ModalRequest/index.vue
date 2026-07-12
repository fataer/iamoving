<template>
    <Modal :id="id">
        <template v-slot:content>
            <div class="modal-header" v-show="step < 3">
                <h5 class="modal-title">
                    Solicitar una visita
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <Feedback :show="feedback.show" title="Aviso:">
                <template v-slot:message>
                    <ul v-if="feedback.errors">
                        <li v-for="(field, index) in feedback.errors" :key="index">
                            <span v-text="field.join(', ')"></span>
                        </li>
                    </ul>
                </template>
            </Feedback>
            <div class="modal-body">
                <template v-if="step == 0">
                    <div class="form-group" v-if="reference.is_sale == '0'">
                        <input placeholder="¿Cuantas personas van a vivir en el piso en total?"  class="form-control" min="0" type="number" v-model="form.you_live_with">
                        <small aria-hidden="true" class="form-text text-muted text-right">
                            Solamente asignar las que son mayores de 18 años
                        </small>
                    </div>
                    <div v-if="!auth">
                        <div class="form-group">
                            <input placeholder="Nombre" type="text" v-model="account.name" class="form-control" autofocus>
                        </div>
                        <div class="form-group">
                            <input placeholder="Apellidos" type="text" v-model="account.lastname" class="form-control">
                        </div>
                        <div class="form-group">
                            <input placeholder="Teléfono móvil" type="text" v-model="account.phone" class="form-control">
                        </div>
                        <div class="form-group">
                            <input placeholder="Email" type="email" v-model="account.email" class="form-control">
                        </div>
                        <div class="form-group">
                            <input placeholder="confirmar email" type="email" v-model="account.email_confirmation" class="form-control" autocomplete="false">
                        </div>
                        <div class="form-group">
                            <input placeholder="Clave" type="password" v-model="account.password" class="form-control">
                        </div>
                        <div class="form-group">
                            <input placeholder="Confimar Clave" type="password" v-model="account.password_confirmation" class="form-control"  autocomplete="false">
                        </div>
                    </div>
                </template>

                <template v-else-if="step == 1">
                    <div class="form-group">
                        <input placeholder="¿Donde trabajas?"  class="form-control" type="text" v-model="form.your_company">
                    </div>
                    <div class="form-group">
                        <input placeholder="¿A que se dedica?"  class="form-control" type="text" v-model="form.your_job">
                    </div>
                    <div class="form-group">
                        <input placeholder="Estudiantes: ¿En cual universidad, master, escuela?"  class="form-control" type="text" v-model="form.your_educational_level">
                    </div>
                    <div class="form-group">
                        <input placeholder="¿Que estudias?"  class="form-control" type="text" v-model="form.your_profession">
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" v-model="form.state" class="form-check-input" id="check">
                        <label class="form-check-label" for="check">
                            <!-- Acepto los termos y condiciones y la información básica de protección de datos -->
                            Aviso legal
                        </label>
                    </div>
                </template>

                <template v-else-if="step == 2">
                    <fieldset>
                        <legend>¿Cuando  puedo visitar el inmueble?</legend>
                        <i>¡Disponibilidad de visitas del propietario!</i>
                        <p>El propietario puedes enseñar su casa de Lunes a Viernes de: 17: 00 a las 21: 00</p>
                        <div class="form-group">
                            <label>Fecha:</label>
                            <input type="date" v-model="form.date" :min="now" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Hora:</label>
                            <input type="time" v-model="form.time" class="form-control" />
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>El día o horario no te va bien?</legend>
                        <i>¡Envié al propietario que días y horario lo prefieres!</i>
                        <div class="form-group">
                            <label>Fecha:</label>
                            <input type="date" v-model="form.exception_date" :min="now" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Hora:</label>
                            <input type="time" v-model="form.exception_time" class="form-control" />
                        </div>
                        <div class="form-group">
                            <input type="hidden" v-model="form.referencia" class="form-control" />
                        </div>-->
                    </fieldset>
                </template>
                <template v-else-if="step == 3">
                    <div class="d-flex align-items-center justify-content-center my-3">
                        <div class="spinner-grow text-warning" role="status" aria-hidden="true"></div>
                        <strong class="d-block">Enviando...</strong>
                    </div>
                </template>

                <template v-else>
                    <h4 :class="'text-' + request.state" class="mt-3">
                        <i v-if="request.state == 'success'" class="fas fa-fw fa-check-circle"></i>
                        <i v-if="request.state == 'danger'" class="fas fa-fw fa-ban"></i>
                        {{request.error ? 'Error:' : 'Su solicitud ha sido enviada.'}}    
                    </h4> 
                    <p :class="'text-' + request.state">
                        <span v-html="request.message"></span>
                        <!-- <button class="btn btn-block btn-iamoving" @click="step = 2; action()">Reintentar</button> -->
                    </p>
                </template>
            </div>
            <div class="modal-footer" v-show="step < 3">
                <!-- Fase 1 -->
                <button type="button" class="btn btn-default" data-dismiss="modal" v-show="step < 2" @click="clear">Cancelar</button>
                <button type="button" class="btn btn-iamoving" :disabled="valid" v-show="step < 2" @click="action">Continue</button>
                <!-- Fase 2 -->
                <button type="button" class="btn btn-default" data-dismiss="modal" v-show="step > 2">Cerrar</button>
                <button type="button" class="btn btn-success" :disabled="valid" v-show="step === 2" @click="action">Agendar cita.</button>
            </div>
		</template>
    </Modal>
</template>

<script>
import Modal from "../ModalContainer";
import Feedback from '../../components/Feedback';
import { now, smsLogin, validate } from "./data";

export default {
    components: {
        Modal,
        Feedback
    },
    props: {
        id: {
            type: String,
            required: true
        },
        reference: Object
    },
    data() {
        return {
            now,
            step: 0,
            valid: false, // Deshabilitar (true) o habilita (false) el botón continuar.
            account: {
                name: null, 
                lastname: null, 
                phone: null,
                email: null,
                email_confirmation: null,
                password: null,
                password_confirmation: null,
            },
            form: {
                // Preguntas
                you_live_with: 0,
                your_company: null,
                your_job: null,
                your_educational_level: null,
                your_profession: null,
                // Solicitud
                state: false,
                date: null,
                exception_date: null,
                time: null,
                exception_time: null
            },
            feedback: {
                show: false,
                title: null,
                errors: []
            },
            request: {
                error: 0,
                state: '',
                message: '' 
            }
        }
    },
    mounted() {
        $('#' + this.id).on('show.bs.modal', () => {
            if (this.auth && this.reference.is_sale == '1') this.step = 2; 
        })
    },
    methods: {
        next() {
            this.step++;
            this.feedback.show = false;
        },
        clear() {
            this.step = 0;

            for (const key in this.form) 
            {
                this.form[key] = null;
            }
        },
        validate() {
            this.valid = true;

            smsLogin(this.account.phone)
                .then((response) => {
                    return this.register();  
                })
                .then((response) => {
                    if (response.status == 200) {
                        // El $parent es el objeto principal, se encuentra en app.js
                        this.$parent.setUser(response.data);

                        if (this.reference.is_sale == '1') 
                            return this.step = 2
                        
                        return this.step = 1;
                    }
                })
                .catch((error) => {
                    if (error.response.data) {
                        this.feedback.title = error.response.data.message;
                        this.feedback.errors = error.response.data.errors;
                        this.feedback.show = true;
                    }
                })
                .then(() => {
                    this.valid = false;
                });
        },
        register() {            
            return axios.post('/auth/register', this.account);
        },
        submit() {
            this.next();

            axios.post('/solicitud/' + this.reference.id, this.form)
            .then((response) => {
                this.request.message = response.data.message;
                this.request.error = response.data.error;
                this.request.state = response.data.state;
            })
            .catch((error) => {
                console.log(error.message);
                //alert(error.message);
                this.request.message = 'Ha ocurrido un error, intente más tarde.';
                this.request.error = 1;
                this.request.state = 'danger';
            })
            .then(() => {
                this.next();
            })
        },
        action() {
            switch (this.step) {
                case 0:
                    if (!this.auth) {this.validate();}
                    else {this.next();}
                    break;
                case 1:
                    this.next();
                    break;
                case 2:
                    this.submit();
                    break;
                default:
                    console.log(this.step);
                    break;
            }
        }
    },
    computed: {
        auth() {
            return (this.$parent.user)
        }
    }
}
</script>

<style>

</style>

