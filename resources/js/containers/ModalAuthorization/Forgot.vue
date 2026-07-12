<template>
    <div>
        <form @submit.prevent="submitHandle" v-if="loading == 0">
            <div class="form-group">
                <input placeholder="Email" type="email" v-model="form.email" class="form-control" autofocus maxlength="100" required>
            </div>
            <hr>
            <div class="form-group">
                <button class="btn btn-warning btn-block" type="submit">
                    Enviar link para reetablecer contraseña
                </button>
            </div>
            <div class="form-group">
                <button class="btn btn-link btn-block" type="button" v-on:click="back">
                    Volver
                </button>
            </div>
        </form>
        <div class="text-center" v-if="loading == 1">
            <h5>Procesando su petición</h5><br>
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
                email: null
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
    methods: {
        submitHandle() {
            console.log("Request link");
            this.$emit('forgot', this.form);
        },
        back(event){
            console.log("Come back to login");
            this.$emit('back', this.form);
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
