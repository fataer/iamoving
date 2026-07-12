
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Components
//Vue.component('video-card', require('./components/VideoCard/VideoCard.vue').default);
Vue.component('show-case', require('./components/ShowCase/ShowCase.vue').default);
//Vue.component('input-currency', require('./components/InputCurrency/InputCurrency.vue').default);
//Vue.component('orientaciones', require('./components/Orientaciones').default);
Vue.component('visitas', require('./components/Visita/Visita.vue').default);
Vue.component('favoritos', require('./components/Favourite/Favourite.vue').default);
//Vue.component('language-switcher', require('./components/LanguageSwitcher/LanguageSwitcher.vue').default);

// Containers
Vue.component('modal-auth', require('./containers/ModalAuth').default);
Vue.component('modal-request', require('./containers/ModalRequest').default);
//Vue.component('modal-quiero', require('./containers/ModalQuiero').default);
Vue.component('report-content', require('./containers/ReportContent').default);
//Vue.component('report-basico', require('./containers/ReportBas').default);
Vue.component('report-lugar', require('./containers/ReportLugar').default);
/*Vue.component('calculator-app', require('./containers/CalculatorContainer/Calculator.vue').default);
Vue.component('rate-calculator', require('./containers/CalculatorContainer/RateCalculator.vue').default);
Vue.component('bon-calculator', require('./containers/CalculatorContainer/BonCalculator.vue').default);
Vue.component('sale-calculator', require('./containers/CalculatorContainer/SaleCalculator.vue').default);
Vue.component('rental-calculator', require('./containers/CalculatorContainer/RentalCalculator.vue').default);
*/

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data: {
        user: null,
         /*informe_foto: false,
		 informe_barrio: false,
		 informe_mapa: false,
         informe_plano: false,*/
		 collapse_data: [],
		 fianza_deposito:false,
		 tarifa_servicio:false,
		 mes_en_curso:false,
         requisitos_alquiler: false,
         total_collapse_data: 0,
         is_sale: false
    },
    created() {
		//console.log(localStorage.getItem("user"));
        if(localStorage.getItem("user")){
            this.user = JSON.parse(localStorage.getItem("user"));
            if (this.user.role_id != "4")
			{
			
				this.user =null;
			}
            console.log("User Logged");
			
        }
		//console.log(this.user.role_id);
        console.log(this.user);
		console.log("App created");
     },
     mounted(){
        console.log("App Mounted");
        let self = this;
        this.collapse_data = [];
        this.total_collapse_data = $(".collapse-item").length;
        /*$("#informe_fotos").click(function(){
            $(this).removeClass('btn-warning');
            $(this).addClass('btn-success');
            self.informe_foto = true;
         });
         
         $("#informe_barrio").click(function(){
            $(this).removeClass('btn-warning');
            $(this).addClass('btn-success');
            self.informe_barrio = true;
         });
         
         $("#informe_mapa").click(function(){
            $(this).removeClass('btn-warning');
            $(this).addClass('btn-success');
            self.informe_mapa = true;
         });

         $("#informePlano").click(function(){
            $(this).removeClass('btn-warning');
            $(this).addClass('btn-success');
            self.informe_plano = true;
         });*/

         $("button.btn-collapse").click(function(){
             //$(this).css('color',"#EADD1B"); //amarillo
			$(this).css('color',"#38c172"); //verde
            let collapse = $(this).attr('href');
            console.log(collapse);
            if(!self.collapse_data.includes(collapse)){
                self.collapse_data.push(collapse);
            }
         });

         $("a#fian_dep").click(function(){
            $(this).css('color',"#38c172");
            self.fianza_deposito = true;
        });

         $("a#tar_servicio").click(function(){
            $(this).css('color',"#38c172");
            self.tarifa_servicio = true;
        });

         $("a#mes_curso").click(function(){
            $(this).css('color',"#38c172");
            self.mes_en_curso = true;
        });		

         $("a#req_alquilar").click(function(){
            $(this).css('color',"#38c172");
            self.requisitos_alquiler = true;
        });

        if($("#view_mode").length > 0){
            self.is_sale = true;
        }
    },
    methods: {
        setUser(user) {
			if (user.role_id==4)
			{
				this.user = user;
                console.log("setUser");				
                console.log("setUser");
				console.log(this.user);
				console.log("0,0");
				console.log("0");
				if ($("#step1").attr('class'))
				{
					$("#citaForm")[0].reset();
					console.log("1");
					
					$("#citaFormPedido")[0].reset();
					//if (user.numpersonas_alquiler !== null){
						$("#numero_personas").val(user.numpersonas_alquiler);
					//}
					$("#tipo_personas").val(user.familia_alquiler);
					$("#estudias_o_trabajas").val(user.estudias_o_trabajas);
					console.log("1.5");
					$("#mascotas").val(user.mascotas);
					$("#trabajo").val(user.dondetrabajas_alquiler);
					$("#tipo_trabajo").val(user.trabajo_alquiler);
					$("#tipo_contrato").val(user.tipocontrato_alquiler);
					$("#sueldo_aproximado").val(user.sueldoaproximado_alquiler);
					console.log("2");
					var today = new Date();
					var dd = today.getDate();

					var mm = today.getMonth()+1; 
					var yyyy = today.getFullYear();
					if(dd<10) 
					{
						dd='0'+dd;
					} 

					if(mm<10) 
					{
						mm='0'+mm;
					} 			
					today = dd+'/'+mm+'/'+yyyy;
					console.log("3.5");
					var fechaFormulario = user.fecha_desde_alquiler;
					// Comparamos solo las fechas => no las horas!!
					//hoy.setHours(0,0,0,0);
					//fechaFormulario.setHours(0,0,0,0); // Lo iniciamos a 00:00 horas

					if (today <= fechaFormulario) {
						//alert('mayor');
						$("#fecha_desde").val(user.fecha_desde_alquiler);
					}
					else{
						//alert('menor');
						$("#fecha_desde").val('');
					}			
					$("#duracion_alquiler").val(user.duracion_alquiler);
					$("#comentario_persona").val(user.sobreti_alquiler);			
					
					$("#p_numero_personas").val(user.numpersonas_alquiler);
					$("#p_tipo_personas").val(user.familia_alquiler);			
					$("#p_estudias_o_trabajas").val(user.estudias_o_trabajas);
					$("#p_mascotas").val(user.mascotas);
					$("#p_trabajo").val(user.dondetrabajas_alquiler);
					$("#p_tipo_trabajo").val(user.trabajo_alquiler);
					$("#p_tipo_contrato").val(user.tipocontrato_alquiler);
					$("#p_sueldo_aproximado").val(user.sueldoaproximado_alquiler);
					//$("#p_fecha_desde").val(user.fecha_desde_alquiler);
					var p_today = new Date();
					var p_dd = p_today.getDate();

					var p_mm = p_today.getMonth()+1; 
					var p_yyyy = p_today.getFullYear();
					if(p_dd<10) 
					{
						p_dd='0'+p_dd;
					} 

					if(p_mm<10) 
					{
						p_mm='0'+p_mm;
					} 			
					console.log("4.5");
					p_today = p_dd+'/'+p_mm+'/'+p_yyyy;
					var p_fechaFormulario = user.fecha_desde_alquiler;
					// Comparamos solo las fechas => no las horas!!
					//p_hoy.setHours(0,0,0,0);
					//p_fechaFormulario.setHours(0,0,0,0); // Lo iniciamos a 00:00 horas
					
					//alert(user.fecha_desde_alquiler);
					//alert(p_hoy);
					//alert(p_fechaFormulario);
					if (p_today <= p_fechaFormulario) {
						//alert(p_fechaFormulario);
						//alert(p_today);
						
						//alert('mayor');
						$("#p_fecha_desde").val(user.fecha_desde_alquiler);
					}
					else{
						//alert(p_fechaFormulario);
						//alert(p_today);
										
						//alert('menor');
						$("#p_fecha_desde").val('');
					}
					$("#p_duracion_alquiler").val(user.duracion_alquiler);
					$("#p_comentario_persona").val(user.sobreti_alquiler);
					if($('select[name=p_estudias_o_trabajas]').val() == 'Trabajando' || $('select[name=p_estudias_o_trabajas]').val() == 'Jubilados'){
							$("#p_trabajando1").show();
                            if($('select[name=p_estudias_o_trabajas]').val() == 'Jubilados'){
                                $("#p_trabajando1").hide();
                            }
							$("#p_trabajando2").show();
							$("#p_estudiando0").hide();
                            $("#p_estudiando01").hide();
                            $("#p_estudiando02").hide();
							$("#p_trabajo").prop('required',true);
							$("#p_tipo_trabajo").prop('required',true);
                            if($('select[name=p_estudias_o_trabajas]').val() == 'Jubilados'){
                                $("#p_trabajo").prop('required',false);
                                $("#p_tipo_trabajo").prop('required',false);
                            }                            
							$("#p_tipo_contrato").prop('required',true);
							$("#p_sueldo_aproximado").prop('required',true);  
							
							$("#p_trabajo_normal").show();
							$("#p_trabajo_estudiar").hide();
							$("#p_trabajo_estudiar_trabajar").hide();                 
			
							$("#p_tipo_trabajo_normal").show();
							$("#p_tipo_trabajo_estudiar").hide();
							$("#p_tipo_trabajo_estudiar_trabajar").hide();    
			
							$("#p_tipo_contrato_normal").show();
							$("#p_tipo_contrato_estudiar").hide();
							$("#p_tipo_contrato_estudiar_trabajar").hide();
			
							$("#p_sueldo_aproximado_normal").show();
							$("#p_sueldo_aproximado_estudiar").hide();
							$("#p_sueldo_aproximado_estudiar_trabajar").hide();                   
						}
						if($('select[name=p_estudias_o_trabajas]').val() == 'Estudiando' || $('select[name=p_estudias_o_trabajas]').val() =='Sin trabajar'){
							$("#p_trabajando1").show();
							$("#p_trabajando2").show();
							$("#p_estudiando0").hide();
                            if($('select[name=p_estudias_o_trabajas]').val() == 'Estudiando'){
                                $("#p_estudiando01").show();
                                $("#p_estudiando02").hide();
                            }
                            if($('select[name=p_estudias_o_trabajas]').val() == 'Sin trabajar'){
                                $("#p_estudiando01").hide();
                                $("#p_estudiando02").show();
                            }							
							$("#p_trabajo").prop('required',true);
							$("#p_tipo_trabajo").prop('required',true);
							$("#p_tipo_contrato").prop('required',true);
							$("#p_sueldo_aproximado").prop('required',true);
							
							
							$("#p_trabajo_normal").hide();
							$("#p_trabajo_estudiar").show();
							$("#p_trabajo_estudiar_trabajar").hide();                 
			
							$("#p_tipo_trabajo_normal").hide();
							$("#p_tipo_trabajo_estudiar").show();
							$("#p_tipo_trabajo_estudiar_trabajar").hide();    
			
							$("#p_tipo_contrato_normal").hide();
							$("#p_tipo_contrato_estudiar").show();
							$("#p_tipo_contrato_estudiar_trabajar").hide();
			
							$("#p_sueldo_aproximado_normal").hide();
							$("#p_sueldo_aproximado_estudiar").show();
							$("#p_sueldo_aproximado_estudiar_trabajar").hide();                   
										   
						}
			
						if($('select[name=p_estudias_o_trabajas]').val() == 'Estudiando y trabajando'){
							$("#p_trabajando1").show();
							$("#p_trabajando2").show();
							$("#p_estudiando0").show();
                            $("#p_estudiando01").hide();
                            $("#p_estudiando02").hide();
							$("#p_trabajo").prop('required',true);
							$("#p_tipo_trabajo").prop('required',true);
							$("#p_tipo_contrato").prop('required',true);
							$("#p_sueldo_aproximado").prop('required',true);  
							$("#p_trabajo_normal").hide();
							$("#p_trabajo_estudiar").hide();
							$("#p_trabajo_estudiar_trabajar").show();                 
			
							$("#p_tipo_trabajo_normal").hide();
							$("#p_tipo_trabajo_estudiar").hide();
							$("#p_tipo_trabajo_estudiar_trabajar").show();    
			
							$("#p_tipo_contrato_normal").hide();
							$("#p_tipo_contrato_estudiar").hide();
							$("#p_tipo_contrato_estudiar_trabajar").show();
			
							$("#p_sueldo_aproximado_normal").hide();
							$("#p_sueldo_aproximado_estudiar").hide();
							$("#p_sueldo_aproximado_estudiar_trabajar").show();                   
						}
						
						if($('select[name=p_estudias_o_trabajas]').val() == ''){
							$("#p_trabajando1").hide();
							$("#p_trabajando2").hide();
							$("#p_estudiando0").hide();
                            $("#p_estudiando1").hide();
                            $("#p_estudiando2").hide();
							
							$("#p_trabajo").prop('required',false);
							$("#p_tipo_trabajo").prop('required',false);
							$("#p_tipo_contrato").prop('required',false);
							$("#p_sueldo_aproximado").prop('required',false); 
							
							$("#p_trabajo_normal").hide();
							$("#p_trabajo_estudiar").hide();
							$("#p_trabajo_estudiar_trabajar").hide();                 
			
							$("#p_tipo_trabajo_normal").hide();
							$("#p_tipo_trabajo_estudiar").hide();
							$("#p_tipo_trabajo_estudiar_trabajar").hide();    
			
							$("#p_tipo_contrato_normal").hide();
							$("#p_tipo_contrato_estudiar").hide();
							$("#p_tipo_contrato_estudiar_trabajar").hide();
			
							$("#p_sueldo_aproximado_normal").hide();
							$("#p_sueldo_aproximado_estudiar").hide();
							$("#p_sueldo_aproximado_estudiar_trabajar").hide();                           
							
						}		
				}

			}
        },

         refreshToken(){
             var self = this;
             axios.post('/auth/refresh', {},{
                     headers: {
                         Authorization: 'Bearer ' + localStorage.getItem('token')
                     }
                 })
                 .then((response) => {
                     if (response.status === 200) {
                        localStorage.setItem("token", response.data.access_token);
                     }
                 })
                 .catch((exception) => {
                     self.user = null;
                     localStorage.removeItem("user");
                     localStorage.removeItem("token");
                 })
         },
         logout() {
             var self = this;
             console.log(this);
             axios.post('/auth/logout', {},{
                     headers: {
                         Authorization: 'Bearer ' + localStorage.getItem('token')
                     }
                 })
                 .then((response) => {
                     if (response.status === 200) {
                        self.user = null; 
                        localStorage.removeItem("token");
                        localStorage.removeItem("user");
                        location.href = '/';
                     }
                 })
                 .catch((exception) => {
                     self.user = null;
                     localStorage.removeItem("user");
                     localStorage.removeItem("token");
                     location.href = '/';
                 })
         },
         request(reference){
                         //alert('request.app');
             console.log("Send request:" + reference);
             if(this.user.email_verified_at!=null){
                 $('#modalRequest').modal('show');
                 axios.post('/comprar_alquilar', {user_id:this.user.id, reference: reference})
                     .then((response) => {
                         $('#modalRequest').modal('hide');
                         if (response.status == 200) {
                             Swal.fire(
                                 'Gracias',
                                 'Su solicitud ha sido procesada, lo estaremos contactando',
                                 'success'
                             );
                         }
                     })
                     .catch((exception) => {
                         $('#modalRequest').modal('hide');
                         console.log(exception.response);
                         Swal.fire(
                             'Disculpe',
                             'No hemos podido procesar su solicitud , intente de nuevo',
                             'error'
                         );
                     })
             }else{
                 location.href = "/bloqueado"
             }
             
         },
 
         resend(){
             console.log("Resend");
             if(this.user!=null){
                 $('#modalResend').modal('show');
                 axios.post('/auth/resend', {id:this.user.id})
                     .then((response) => {
                         $('#modalResend').modal('hide');
                         if (response.status == 200) {
                             Swal.fire(
                                 'Gracias',
                                 'Su solicitud ha sido procesada, le hemos reenviado el correo de verificación',
                                 'success'
                             );
                         }
                     })
                     .catch((exception) => {
                         $('#modalResend').modal('hide');
                         console.log(exception.response);
                         Swal.fire(
                             'Disculpe',
                             'No hemos podido procesar su solicitud , intente de nuevo',
                             'error'
                         );
                     })
             }
         },
 
         profile(){
             if(this.user.email_verified_at!=null){
                 location.href = "/perfil"
             }else{
                 location.href = "/bloqueado"
             }
         },
         profileSubmitHandle(form){
             console.log("profileSubmited");
             var formData = new FormData(this.$refs.pform);
             //$('#modalResend').modal('show');
             axios.post('/guardar_perfil',formData,{
                         headers: {
                             Authorization: 'Bearer ' + localStorage.getItem('token')
                         }
                     })
                     .then((response) => {
                         $('#modalResend').modal('hide');
                         if (response.status == 200) {
 
                             localStorage.setItem("user", JSON.stringify(response.data.user));
                             this.user = response.data.user;
 
                             Swal.fire(
                                 'Gracias',
                                 'Su perfil ha sido actualizado',
                                 'success'
                             );
                         }
                     })
                     .catch((exception) => {
                         $('#modalResend').modal('hide');
                         Swal.fire(
                             'Disculpe',
                             'No hemos podido procesar su solicitud , intente de nuevo',
                             'error'
                         );
                     })
         },
    pedidoSubmitHandle() {
      console.log("pedidoSubmited");
      var form = this.$refs.cform_pedido;
	  console.log("pedidoSubmited1");
      var formData = new FormData(form);
      $('#modalCita').modal('hide');
      $('#modalPedido').modal('hide');
      $('#modalResend').modal('show');
	  console.log("pedidoSubmited2");
      axios.post('/agendar_visita', formData, {
        headers: {
		
          Authorization: 'Bearer ' + localStorage.getItem('token')

        }
      })
       .then((response) => {
        $('#modalResend').modal('hide');
		console.log("pedidoSubmited3.5");
        if (response.status == 200) {
          $("#citaForm")[0].reset();
		  $("#citaFormPedido")[0].reset();
		console.log("pedidoSubmited4.5");
          if (response.data.success) {
			  console.log("pedidoSubmited5.5");
			  if (this.user){
				localStorage.setItem("user", JSON.stringify(response.data.user));
				console.log("pedidoSubmited6.5");
				this.user = response.data.user;	
			  }				
			console.log("pedidoSubmited7.5");
            Swal.fire({
              type: 'success',
              title: 'Gracias',
              //html: '<p>Te hemos enviado un correo con la información de su visita</p><b>Recuerda</b><br><b>Fecha:</b>' + response.data.fecha + '<br><b>Lugar:</b>' + response.data.lugar,
              html: '<p>Solicitud enviada<span style=font-family:Segoe UI Emoji,sans-serif;mso-bidi-font-family:Segoe UI Emoji>&#128578;</span></p><p>Te confirmaremos lo antes posible, ya que necesitamos de la aprobación del propietario para confirmarte la contraoferta.</p>'
            });
          } else {
            Swal.fire('Aviso', 'Usted ya tiene una visita programada para este inmueble', 'info');
          }
        }
      })
                    .catch((exception) => {
                        $('#modalResend').modal('hide');
                        Swal.fire(
                            'Disculpe',
                            'No hemos podido procesar su solicitud , inténtelo de nuevo',
                            'error'
                        );
                    })
        },
        citaSubmitHandle(){
            console.log("visitaSubmited");
            var form = this.$refs.cform;
            var formData = new FormData(form);
			console.log("visitaSubmited1");
            $('#modalCita').modal('hide');
			$('#modalPedido').modal('hide');
            $('#modalResend').modal('show');
            console.log("visitaSubmited2");
			axios.post('/agendar_visita',formData,{
                        headers: {
                            Authorization: 'Bearer ' + localStorage.getItem('token')
                        }
                    })
                    .then((response) => {
						console.log("visitaSubmited3");
                        $('#modalResend').modal('hide');
                        if (response.status == 200) {
							console.log("visitaSubmited4");
                            $("#citaForm")[0].reset();
							$("#citaFormPedido")[0].reset();
							console.log("visitaSubmited4.1");
                            if(response.data.success){
								console.log("visitaSubmited5.1");
								if (this.user){
									localStorage.setItem("user", JSON.stringify(response.data.user));
									console.log("visitaSubmited6.1");
									this.user = response.data.user;
								}
                                 Swal.fire({
                                   type: 'success',
                                   title: 'Gracias',
                                  //html: '<p>Te hemos enviado un correo con la información de su visita</p><b>Recuerda</b><br><b>Fecha:</b>' + response.data.nombre
								  html: '<p>Solicitud enviada<span style=font-family:Segoe UI Emoji,sans-serif;mso-bidi-font-family:Segoe UI Emoji>&#128578;</span></p><p>Te confirmaremos lo antes posible, ya que necesitamos de la aprobación del propietario para confirmarte la cita.</p>'

                                   
                                 })
                             }else{
                                 Swal.fire(
                                     'Aviso',
                                     'Usted ya tiene una visita programada para este inmueble',
                                     'info'
                                 );    
                             }
                             
                         }
                     })
                     .catch((exception) => {
                         $('#modalResend').modal('hide');
                         Swal.fire(
                             'Disculpe',
                             'No hemos podido procesar su solicitud , intente de nuevo',
                             'error'
                         );
                     })
         },
         visitas(){
             if(this.user.email_verified_at!=null){
                 location.href = "/visitas"
             }else{
                 location.href = "/bloqueado"
             }
         },
 
         favoritos(){
             if(this.user.email_verified_at!=null){
                 location.href = "/favoritos"
             }else{
                 location.href = "/bloqueado"
             }
         },
 
         agregarFavorito(reference){
             console.log("favoritoSubmited");
             if(this.user.email_verified_at!=null){
                 axios.post('/guardar_favorito',{reference:reference},{
                             headers: {
                                 Authorization: 'Bearer ' + localStorage.getItem('token')
                             }
                         })
                         .then((response) => {
                             if (response.status == 200) {
                                 $.notify({
                                     message: 'Agregado a favoritos'
                                 },{
                                     type: 'success'
                                 });
                             }
                         })
                         .catch((exception) => {
                             console.log(exception);
                         })
             }
         },
 
         auth(action,data){
             //alert('auth.app');
             console.log("modalAuth");
             localStorage.setItem("action",action);
             localStorage.setItem("action_data",data);
			 //$("#modal-auth").addClass("modal-dialog-centered");
			 //$("#modal-auth").css('flex-direction', 'unset');
             $("#modal-auth").modal('show');
         },
         modalVisita(){
			 //alert(this.fian_dep.length);
			 //alert(this.tar_servicio.length);
			 //alert(this.mes_curso.length);
             if(this.is_sale){

                /*if(this.informe_foto && this.informe_barrio && this.informe_mapa && 
                    this.collapse_data.length === this.total_collapse_data){*/
				if(this.collapse_data.length === this.total_collapse_data){					

                    if(this.user){
                        $("#step1").show();
                        $("#step2").hide();
                        $("#modalCita").modal('show');
                    }
		    else{
                        $("#step1").show();
                        $("#step2").hide();
                        $("#modalCita").modal('show');		    
		    }		    
                }else{
                    let htmlMsg = '<p><span style=font-weight:bold;>Para poder solicitar una visita debe visualizar los siguientes contenidos:</span></p>';
                    htmlMsg += this.buildHtmlModal();

                    Swal.fire({
                        title:'Aviso',
                        html: htmlMsg,
						icon:'info',
						iconColor:'#EADD03',
						confirmButtonColor: '#EADD03',
						confirmButtonText: '<span style=color:#2D2D37>OK</span>'
                    });  
                }

             }else{

             
                /*if(this.informe_foto && this.informe_barrio && this.informe_mapa && 
                    this.collapse_data.length === this.total_collapse_data && this.requisitos_alquiler 
					&& this.fianza_deposito && this.mes_en_curso && this.tarifa_servicio){*/
					if(/*this.informe_foto && this.informe_barrio && this.informe_mapa && */
                    this.collapse_data.length === this.total_collapse_data /*&& this.requisitos_alquiler 
					&& this.fianza_deposito && this.mes_en_curso && this.tarifa_servicio*/){
                    if(this.user){
                        $("#step1").show();
                        $("#step2").hide();
                        $("#modalCita").modal('show');
                    }
		    else{
                        $("#step1").show();
                        $("#step2").hide();
                        $("#modalCita").modal('show');		    
		    }
                }else{
                    let htmlMsg = '<p><span style=font-weight:bold;>Para poder solicitar una visita debe visualizar los siguientes contenidos:</span></p>';
                    htmlMsg += '<ul style="list-style-type:none;">';
                    htmlMsg += this.buildHtmlModal();

                    Swal.fire({
                        title:'Aviso',
                        html: htmlMsg,
						icon:'info',
						iconColor:'#EADD03',
						confirmButtonColor: '#EADD03',
						confirmButtonText: '<span style=color:#2D2D37>OK</span>'
                    });  
                }
            }
         },

         buildHtmlModal(){
            //let htmlMsg = '<ul style="list-style-type:none;">';
			let htmlMsg = '<ul style="list-style-type:none;">';
            let self = this;
           /* if(!this.informe_foto){
                htmlMsg += '<li>- Botón fotos</li>';
            }
            if(!this.informe_mapa){
                htmlMsg += '<li>- Botón mapa</li>';
            }
            if(!this.informe_barrio){
                htmlMsg += '<li>- Botón barrio</li>';
            }

            if($("[data-plano]").length > 0){
                if(!this.informe_plano){
                    htmlMsg += '<li>- Botón plano</li>';
                }
            }*/

            $(".btn-collapse").each(function(i, obj) {
                var elem = $(obj);
                var excluded = ["#collapseDetails","#collapselugares"];
                if(elem.attr('href') !="" && elem.attr('href')!="" && elem.attr('href')!="")
                if(!excluded.includes(elem.attr('href'))){
                    if(!self.collapse_data.includes(elem.attr('href'))){
                        htmlMsg += '<li>- ' + elem.text() +'</li>';
                    }
                }
                //console.log(obj.text());
            });
            if($("a#fian_dep").length > 0){
                if(!this.fianza_deposito){
                    htmlMsg += '<li>- Fianza/Depósito</li>';
                }
            }
            if($("a#tar_servicio").length > 0){
                if(!this.tarifa_servicio){
                    htmlMsg += '<li>- Tarifa de Servicio</li>';
                }
            }
            if($("a#mes_curso").length > 0){
                if(!this.mes_en_curso){
                    htmlMsg += '<li>- Mes en curso</li>';
                }
            }			

            if($("a#req_alquilar").length > 0){
                if(!this.requisitos_alquiler){
                    htmlMsg += '<li>- Requisitos para alquilar</li>';
                }
            }
            
            htmlMsg += '</ul>';
            return htmlMsg;
         },
         modalPedido(){
            if(this.is_sale){
                if(/*this.informe_foto && this.informe_barrio && this.informe_mapa && */
                    this.collapse_data.length === this.total_collapse_data){

                    if(this.user){
                        //$("#step1").show();
                        //$("#step2").hide();
                        $("#modalPedido").modal('show');
                    }
					else
					{
						$("#modalPedido").modal('show');
					}
                }else{
                    let htmlMsg = '<p><span style=font-weight:bold;>Para poder hacer contraoferta debe visualizar los siguientes contenidos:</span></p>';
                    htmlMsg += this.buildHtmlModal();

                    Swal.fire({
                        title:'Aviso',
                        html: htmlMsg,
						icon:'info',
						iconColor:'#EADD03',
						confirmButtonColor: '#EADD03',
						confirmButtonText: '<span style=color:#2D2D37>OK</span>'
  /*icon: "warning",
  title: "Attention...",
  text: "Change color of this text",
  background: "#1e2122",
  confirmButtonColor: "#ff6600",
  confirmButtonText: "OK",
  iconColor: "#ff6600",					*/
                    });  
                }
            }else{
                if(/*this.informe_foto && this.informe_barrio && this.informe_mapa && */
                    this.collapse_data.length === this.total_collapse_data  /*&& this.requisitos_alquiler 
					&& this.fianza_deposito && this.mes_en_curso && this.tarifa_servicio*/){

                    if(this.user){
                        //$("#pstep1").show();
                        //$("#pstep2").hide();
                        $("#modalPedido").modal('show');
                    }
		    else{
		        $("#modalPedido").modal('show');
		    }
                }else{
                    let htmlMsg = '<p><span style=font-weight:bold;>Para poder hacer contraoferta debe visualizar los siguientes contenidos:</span></p>';
                    htmlMsg += this.buildHtmlModal();

                    Swal.fire({
                        title:'Aviso',
                        html: htmlMsg,
						icon:'info',
						iconColor:'#EADD03',
						confirmButtonColor: '#EADD03',
						confirmButtonText: '<span style=color:#2D2D37>OK</span>'
                    });  
                }
            }
         },	
         modalAhorra(){
                 $("#modalAhorrando").modal('show');
         },
         modalAumenta(){
                 $("#modalAumentando").modal('show');
         },
         modalAumentaArriba(){
                 $("#modalAumentandoArriba").modal('show');
         },        
         modalEvita(){
                 $("#modalEvitando").modal('show');
         },
         modalInfo(){
                 $("#modalInformacion").modal('show');
         },
         modalVeri(){
                 $("#modalVerificado").modal('show');
         } 		
     }
 });
 