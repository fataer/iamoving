<template>
    <div>
        <form id="resetForm" @submit.prevent="submitHandle" v-if="loading == 0">
            <input type="hidden" v-model="form.token" />
            <div class="form-group">
                <input placeholder="E-mail" type="email" v-model="form.email" class="form-control" required>
            </div>
            <div class="form-group">
                <input placeholder="Clave" type="password" v-model="form.password" class="form-control" minlength="6" maxlength="15" required>
            </div>
            <div class="form-group">
                <input placeholder="Repite la clave" type="password" v-model="form.password_confirmation" class="form-control" minlength="6" maxlength="15" required>
            </div>
            <hr>
            <div class="form-group">
                <button class="btn btn-warning btn-block" type="submit">
                    Reestablecer
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
    props: {
        secret: String
    },
    data() {
        return {
            loading: 0,
            form: {
                email: null,
                password: null,
                password_confirmation: null,
                token: null
            }
        }
    },
    created() {
        this.form.token = this.secret;

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
            if(this.form.password != this.form.password_confirmation){
                this.$emit('reset', null,false);
            }else{
                this.$emit('reset', this.form,true);
            }
            
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
