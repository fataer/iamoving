@extends('layouts.iamovingpro')
@section('title', 'IAMOVING - Fácil de alquilar, comprar y vender')
@section('description', '¡Fácil de alquilar, comprar y vender!')
@section('image', 'https://iamoving.com/img/iamoving.png')
<style type="text/css">
   .color-letra{
     color: #2d2e35;
   } 
</style>

@section('content')
    <br>
    <br>
    <div class="container my-5" style="min-height:300px;">
        <div class="row text-center">
            <div class="col-12">
                <div class="animated">
                    <button type="button" class="btn btn-link btn-block" id="btn_forgot" style="font-size:20px;">¿Has olvidado tu contraseña?</button>
                </div>
            </div>
        </div>
        
        
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="modalRetrieve">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div  class="modal-header">
                    <h5 class="modal-title">
                        Recuperar contraseña
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <form>
                            <div class="form-group">
                                <input placeholder="Email" type="email" id="email" class="form-control" autofocus maxlength="100" required>
                            </div>
                            <hr>
                            <div class="form-group">
                                <button class="btn btn-warning btn-block" type="button" id="btnSend">
                                    Enviar link para reetablecer contraseña
                                </button>
                            </div>
                        </form>
                        <div class="text-center" id="msg">
                            <h5>Procesando su petición</h5><br>
                            <div class="loader" ></div>
                            <br>
                        </div>
                
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
    $(document).ready(function(){
        console.log("ok");
        $("#msg").hide();
        $("body").bind("ajaxSend", function(elm, xhr, s){
            if (s.type == "POST") {
                xhr.setRequestHeader('X-CSRF-Token', getCSRFTokenValue());
            }
        });
        $("#btn_forgot").click(function(){
            $("#modalRetrieve").modal('show'); 
        });
        
        $("#btnSend").click(function(){
            var email = $("#email").val();
            if(email.trim()!=''){
                var postData = { email:email};
                $("#btnSend").prop('disabled', true);
                $("#msg").show();
               
                $.post("/auth/retrieve_pass",
                  postData,
                  function(data, status){
                      $("#msg").hide();
                       $("#btnSend").prop('disabled', false);
                       if(status == 'success'){
                        alert("Le hemos enviado un correo con instrucciones");
                        location.href = "/";
                       }else{
                        alert("No hemos podido procesar su petición");
                       }
                  });
            }
        });
    });
    </script>
@endsection
