<template>
    <div>
        <form @submit.prevent="submitHandle" v-if="loading == 0">
            <div class="form-group">
                <input placeholder="Name" type="text" v-model="form.name" class="form-control" maxlength="50" autofocus required>
            </div>
            <div class="form-group">
                <input placeholder="Lastname" type="text" v-model="form.lastname" maxlength="100" class="form-control" required>
            </div>
            <!--<div class="form-group">
                <input placeholder="Tu DNI/NIE/NIF/CIF/Pasaporte" type="text" v-model="form.identification" class="form-control"  maxlength="15" required>
            </div>-->
            <div class="form-group">
                <input placeholder="Mobile" type="text"  maxlength="15" v-model="form.phone" class="form-control" required>
            </div>
            <div class="form-group">
                <input placeholder="Email" type="email"  maxlength="120" v-model="form.email" class="form-control" required>
            </div>
            <div class="form-group">
                <input placeholder="Repeat email" type="email" maxlength="120" v-model="form.email_confirmation" class="form-control" autocomplete="false"  required>
            </div>
            <div class="form-group">
                <!--<input placeholder="Clave" type="password" v-model="form.password" class="form-control" minlength="6" maxlength="15" required >-->
				<VuePassword  placeholder="Password"  v-model="form.password" type="text" disableStrength="true"  minlength="6" maxlength="15" required />
            </div>
            <div class="form-group">
                <!--<input placeholder="Confimar Clave" type="password" v-model="form.password_confirmation" class="form-control"  autocomplete="false" minlength="6" maxlength="15" required>-->
				<VuePassword  placeholder="Repeat Password"  v-model="form.password_confirmation" type="text" disableStrength="true"  minlength="6" maxlength="15" required />
            </div>
            <div class="form-group">
                <input type="checkbox" v-model="form.notification" /> Notify me of the properties that have just entered please
            </div>
            <hr>

            <div class="form-group">
                <button class="btn btn-warning btn-block" type="submit">
                    Register
                </button>
            </div>
        </form>
        <div class="text-center" v-if="loading == 1">
            <h5>Processing your registration</h5><br>
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
                identification:null,
                notification: false				
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
                alert('The email and confirmation email must match in order to register.');
                //this.feedback("El email y confirmación email deben coincidir para poder registrarse.");
                //this.console(his.feedback("EROROR"));
                reurn;
            }
            if (this.form.password!=this.form.password_confirmation)
            {
                alert('The password and password confirmation must match in order to register.');
                reurn;
            }
             if (this.form.phone.length<8)
            {
                alert('The mobile phone must have at least 8 digits.');
                reurn;
            }
             if (this.form.password.length<6)
            {
                alert('The password must have at least 6 characters.');
                reurn;
            }  
             if (this.form.password.length>15)
            {
                alert('The password must have a maximum of 15 characters.');
                reurn;
            }                        
             if (this.form.password.length<6)
            {
                alert('The document NIF/NIE/Pasaporte must be at least 6 characters.');
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
