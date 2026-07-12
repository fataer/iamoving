<template>
    <div>
        <form @submit.prevent="submitHandle" v-if="loading == 0">
            <div class="form-group">
                <input placeholder="Nombre" type="text" v-model="form.name" class="form-control" maxlength="50" autofocus required>
            </div>
            <div class="form-group">
                <input placeholder="Apellidos" type="text" v-model="form.lastname" maxlength="100" class="form-control" required>
            </div>
            <div class="form-group">
                <input placeholder="Teléfono móvil" type="text" maxlength="15" v-model="form.phone" class="form-control" required>
            </div>
            <div class="form-group">
                <input placeholder="Email" type="email" maxlength="120" v-model="form.email" class="form-control" required>
            </div>
            <div class="form-group">
                <input placeholder="Confirmar email" type="email" maxlength="120" v-model="form.email_confirmation" class="form-control" autocomplete="off" required>
            </div>
            <div class="form-group">
                <VuePassword placeholder="Clave" v-model="form.password" type="text" disableStrength="true" minlength="6" maxlength="15" required />
            </div>
            <div class="form-group">
                <VuePassword placeholder="Confirmar Clave" v-model="form.password_confirmation" type="text" disableStrength="true" autocomplete="off" minlength="6" maxlength="15" required />
            </div>
            <div class="form-group">
                <input type="checkbox" v-model="form.notification" /> Avísame de los inmuebles que acaban de entrar por favor
            </div>
            <hr>
            <div class="form-group">
                <button class="btn btn-warning btn-block" type="submit">
                    Registrar
                </button>
            </div>
        </form>
        <div class="text-center" v-if="loading == 1">
            <h5>Procesando su registro</h5><br>
            <div class="loader"></div>
            <br>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            loading: 0,
            form: {
                name: null,
                lastname: null,
                phone: null,
                email: null,
                email_confirmation: null,
                password: null,
                password_confirmation: null,
                identification: null,
                notification: false				
            }
        }
    },
    created() {
        axios.interceptors.request.use((config) => {
            console.log("Loading true");
            this.loading = 1;
            return config;
        }, (error) => {
            console.log("Loading false");
            this.loading = 0;
            return Promise.reject(error);
        });

        axios.interceptors.response.use((response) => {
            console.log("Loading false");
            this.loading = 0;
            return response;
        }, (error) => {
            console.log("Loading false");
            this.loading = 0;
            return Promise.reject(error);
        });
    },
    methods: {
        submitHandle(e) {
            // Validaciones del lado cliente
            if (this.form.email != this.form.email_confirmation) {
                alert('El email y confirmación email deben coincidir para poder registrarse.');
                return; // Corregido: era "reurn"
            }
            
            if (this.form.password != this.form.password_confirmation) {
                alert('La clave y confirmación de clave deben coincidir para poder registrarse.');
                return; // Corregido: era "reurn"
            }
            
            if (this.form.phone.length < 8) {
                alert('El teléfono móvil debe tener al menos 8 dígitos.');
                return; // Corregido: era "reurn"
            }
            
            if (this.form.password.length < 6) {
                alert('La clave debe tener al menos 6 caracteres.');
                return; // Corregido: era "reurn"
            }
            
            if (this.form.password.length > 15) {
                alert('La clave debe tener como máximo 15 caracteres.');
                return; // Corregido: era "reurn"
            }
            
            // Validación del nombre
            if (!this.form.name || this.form.name.trim().length < 2) {
                alert('El nombre debe tener al menos 2 caracteres.');
                return;
            }
            
            // Validación de apellidos
            if (!this.form.lastname || this.form.lastname.trim().length < 2) {
                alert('Los apellidos deben tener al menos 2 caracteres.');
                return;
            }
            
            // Validación de email
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(this.form.email)) {
                alert('Por favor, ingrese un email válido.');
                return;
            }
            
            // Validación de teléfono (solo números)
            const phoneRegex = /^[0-9+\-\s()]+$/;
            if (!phoneRegex.test(this.form.phone)) {
                alert('El teléfono solo debe contener números.');
                return;
            }
            
            // Emitir el evento de registro
            this.$emit('register', this.form);
        }
    }
}
</script>

<style>
.loader {
    width: 40px;
    height: 40px;
    position: absolute;
    top: 50%;
    left: 50%;
    margin-top: -13px;
    margin-left: -13px;
    border-radius: 60px;
    animation: loader 0.8s linear infinite;
    -webkit-animation: loader 0.8s linear infinite;
}

@keyframes loader {
    0% { transform: rotate(0deg); border: 4px solid #f3f3f3; border-top: 4px solid #3498db; }
    100% { transform: rotate(360deg); border: 4px solid #f3f3f3; border-top: 4px solid #3498db; }
}

@-webkit-keyframes loader {
    0% { transform: rotate(0deg); border: 4px solid #f3f3f3; border-top: 4px solid #3498db; }
    100% { transform: rotate(360deg); border: 4px solid #f3f3f3; border-top: 4px solid #3498db; }
}
</style>