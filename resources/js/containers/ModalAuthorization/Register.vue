<template>
    <div>
        <form @submit.prevent="submitHandle" v-if="loading == 0">
            <div class="form-group">
                <input placeholder="Nombre" type="text" v-model="form.name" class="form-control" autofocus required>
            </div>
            <div class="form-group">
                <input placeholder="Apellidos" type="text" v-model="form.lastname" class="form-control" required>
            </div>
            <!--<div class="form-group">
                <input placeholder="Tu DNI/NIE/NIF/CIF/Pasaporte" type="text" v-model="form.identification" class="form-control" required>
            </div>-->
            <div class="form-group">
                <input placeholder="Teléfono móvil" type="text" v-model="form.phone" class="form-control" required>
            </div>
            <div class="form-group">
                <input placeholder="Email" type="email" v-model="form.email" class="form-control" required>
            </div>
            <div class="form-group">
                <input placeholder="confirmar email" type="email" v-model="form.email_confirmation" class="form-control" autocomplete="false" required>
            </div>
            <div class="form-group">
                <input placeholder="Clave" type="password" v-model="form.password" class="form-control"required >
            </div>
            <div class="form-group">
                <input placeholder="Confimar Clave" type="password" v-model="form.password_confirmation" class="form-control"  autocomplete="false" required>
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
            <div class="loader" ></div>
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
                identification:null
            }
        }
    },
    created(){
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
    methods: {
        submitHandle(e) {
            if (this.form.email!=this.form.email_confirmation)
            {
                alert('El email y confirmación email deben coincidir para poder registrarse.');
                //this.feedback("El email y confirmación email deben coincidir para poder registrarse.");
                //this.console(his.feedback("EROROR"));
                reurn;
            }
            if (this.form.password!=this.form.password_confirmation)
            {
                alert('La clave y confirmación de clave deben coincidir para poder registrarse.');
                reurn;
            }
             if (this.form.phone.length<8)
            {
                alert('El teléfono móvil debe teber al menos 8 dígitos.');
                reurn;
            }
             if (this.form.password.length<6)
            {
                alert('La clave debe teber al menos 6 caracteres.');
                reurn;
            }            
             if (this.form.password.length<6)
            {
                alert('El NIF/NIE/Pasaporte debe teber al menos 6 caracteres.');
                reurn;
            }                        
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
</style>
