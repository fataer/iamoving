<!DOCTYPE html>
<html>
<head>
	<title>facebook</title>


<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
<!-- HTTPS required. HTTP will give a 403 forbidden response -->
<script src="https://sdk.accountkit.com/es_ES/sdk.js"></script>


</head>
<body>

 

  


{{-- <input value="+34" id="country_code" />
<input placeholder="phone number" id="phone_number"/>
<button type="submit" onclick="smsLogin();">Login via SMS</button>
<div>OR</div>
<input placeholder="email" id="email"/>
<button onclick="emailLogin();">Login via Email</button>
 --}}
 <div id="app">
<form  @submit.prevent="smsLogin()">

<input value="+34" v-model="country_code"  id="country_code" />
<input placeholder="phone number"  v-model="phone_number"  id="phone_number"/>

<button type="submit">Login via SMS</button>
<pre>@{{responseStatus}} as</pre>
{{-- <div>OR</div>
<input placeholder="email" id="email"/>
<button onclick="emailLogin();">Login via Email</button> --}}

</form>  

 </div>



 



    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.17/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script type="text/javascript">
   

  AccountKit_OnInteractive = function(){
    AccountKit.init(
      {
        appId:"2449164851785159", 
        // appId: "505908576898846",
        state:"{{ csrf_token() }}", 
        version:"v1.0",
        fbAppEventsEnabled:true,
        redirect:"http://localhost:8000/pruebacel",
        debug:true
      }
    );
  };


  const app = new Vue({
       el: "#app",
       mounted(){
         
       },
       data(){
        return{
            country_code:"+34",
            phone_number:"",
            responseStatus:"",
            responseData:{
               "callback": function loginCallback(response) {
                      this.responseStatus= response;
                      console.log(this.responseStatus);
                if (response.status === "PARTIALLY_AUTHENTICATED") {
                  var code = response.code;
                  var csrf = response.state;
                 /// redirect
                
              }
              else if (response.status === "NOT_AUTHENTICATED") {
                //  falla 
              }
              else if (response.status === "BAD_PARAMS") {
                // no parametros
                }
              }
            }
         }
       },

       methods:{
        
        /// cel validete
         smsLogin(){
           var countryCode = this.country_code;
           var phoneNumber = this.phone_number;
            AccountKit.login(
              'PHONE', 
              {countryCode: countryCode, phoneNumber: phoneNumber}, // valores del formulario
               this.responseData.callback 
            );
         },

           // email validate
         emailLogin() {
            var emailAddress = document.getElementById("email").value;
            AccountKit.login(
              'EMAIL',
              {emailAddress: emailAddress},
              this.responseData.callback
            );
          },

       }
   
      }); 

    </script>


{{-- <script>
  // initialize Account Kit with CSRF protection
  AccountKit_OnInteractive = function(){
    AccountKit.init(
      {
        appId:"2449164851785159", 
        state:"{{ csrf_token() }}", 
        version:"v1.0",
        fbAppEventsEnabled:true,
        redirect:"http://localhost:8000/pruebacel",
        debug:true
      }
    );
  };

  // login callback
  function loginCallback(response) {
     console.log(response);
    if (response.status === "PARTIALLY_AUTHENTICATED") {
      var code = response.code;
      var csrf = response.state;
      // Send code to server to exchange for access token
    }
    else if (response.status === "NOT_AUTHENTICATED") {
      // handle authentication failure
    }
    else if (response.status === "BAD_PARAMS") {
      // handle bad parameters
    }
  }

  // phone form submission handler
  function smsLogin() {
    var countryCode = document.getElementById("country_code").value;
    var phoneNumber = document.getElementById("phone_number").value;
    AccountKit.login(
      'PHONE', 
      {countryCode: countryCode, phoneNumber: phoneNumber}, // will use default values if not specified
      loginCallback
    );
  }


  // email form submission handler
  function emailLogin() {
    var emailAddress = document.getElementById("email").value;
    AccountKit.login(
      'EMAIL',
      {emailAddress: emailAddress},
      loginCallback
    );
  }
</script> --}}

    
</body>
</html>

{{-- <html>
  <head>
    <title>Account kit By Facebook - HackerRahul</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  </head>
  
  <body>
  <div class="w3-container w3-blue">
    <h1 class="w3-center">Account kit By Facebook</h1>
  </div><br>
  <h3 class="w3-center">Just Tap the button below and login through sms.<br> <b>OR</b> <br>you can also use this to verify the mobile no. of users...</h3>

  <br>
  
  <div class="w3-container w3-center">
    <form method="get" action="https://www.accountkit.com/v1.0/basic/dialog/sms_login/">
      <input type="hidden" name="app_id" value="2449164851785159">
      <input type="hidden" name="redirect" value="https://alquilacali.com/pruebacel">
      <input type="hidden" name="debug" value="true">
      <input type="hidden" name="state" value="{{csrf_token()}}">
      <input type="hidden" name="fbAppEventsEnabled" value=true>
      <button type="submit" class="w3-button w3-ripple w3-round w3-hover-blue w3-blue">Login with sms</button>


    </form>

  </div>  
  </body>

</html> --}}