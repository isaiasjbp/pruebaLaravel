
<x-guest-layout>

    <main class="">
        <div class="p-4 p-md-5 mb-4 text-white banner bg-dark ">
          <div class="col-md-6 px-0">
            
          </div>
        </div>
    </main>
    
    <div class=" container login_form col-md-5  ">    
    
        <div class="tituloPaginas">
           <p class="uppercase titulo_login ">Registro de usuario</p>           
        </div>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

            <div class="form-login">
                <form method="POST" action="{{ URL::to('/registrar/usuario') }}">
                    @csrf
                    <div class= "div-subtitulo_login centrar">
                        <span class="text-subtitulo-login"> Por favor rellene el formulario.</span>
                    </div>                        
                        <table class="table">
                             
                            <tbody> 
                                     {{-- segunda fila 1 --}}                       
                                     <tr>
                                        <td colspan="2">
                                            <div class="form-group  col-12">             
                                                <div class="form-group ">             
                                                    <input  required  class="form-control input_recto" type="text" name="nombres" id="nombres" placeholder="Nombres" >    
                                                  </div>
                                          </div>
                                        </td>                       
                                      </tr>      

                                       {{-- segunda fila 2 --}}                                
                                    <tr>
                                        <td>
                                            <div class="form-group ">             
                                                <div class="form-group ">             
                                            <input  required  class="form-control input_recto" type="text" name="correo" id="correo" placeholder="Correo electrónico" >    
                                          </div>
                                          </div>
                                        </td>
                                        <td>
                                         <div class="form-group ">             
                                            <input  required  class="form-control input_recto" type="text" name="confirmar_correo" id="confirmar_correo" placeholder="Correo electrónico" >    
                                          </div>
                                        </td>                               
                                      </tr>  
                                      
                                 {{-- segunda fila 6 --}}                       
                                 <tr>
                                    <td>
                                        <div class="form-group ">             
                                            <div class="form-group ">             
                                                <input  required  class="form-control input_recto" type="text" name="password" id="password" placeholder="Contraseña" onkeyup="confirmaPass('#password', '#repeat_pass');" >    
                                              </div>
                                      </div>
                                    </td>
                                    <td>
                                     <div class="form-group ">             
                                        <input  required  class="form-control input_recto" type="text" name="repeat_pass" id="repeat_pass" placeholder="Confirmar contraseña"  onkeyup="confirmaPass('#password', '#repeat_pass');">    
                                      </div>
                                    </td>                               
                                  </tr>  
                                      
                            </tbody>
                          </table>

        
                    <div class="flex items-center justify-end mt-4 centrar"> 
                       {{--  @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif --}}
                        <div class="flex items-center justify-end mt-4 centrar">
                            <span class="text-invitacion d-none" id="mensaje"></span>
                        </div>
                        <span class="  btn  d-none btn_login_diable" id="btn_enviar2">
                            {{ __('Enviar') }}
                        </span>

                        <x-jet-button class="ml-4  btn-login" id="btn_enviar">
                            {{ __('Enviar') }}
                        </x-jet-button>

                        <div class="flex items-center justify-end mt-4 centrar">
                            <span class="text-invitacion">°Todos los campos son obligatorios</span>
                        </div>
                       
                    </div>
 
                </form>

            </div>
    </div>

</div>
</x-guest-layout>
 
<script>
    function confirmaPass(pass1, pass2) {
       pass1 = $(pass1).val();
       pass2 = $(pass2).val();
     //   console.log(pass1  + ' ----' +pass2);
       if(pass1 != pass2){
          $("#btn_enviar2").removeClass('d-none');
           $("#btn_enviar").addClass('d-none'); 
           $("#mensaje").addClass('text-error');
           $("#mensaje").removeClass('d-none');
           $("#mensaje").html('Las contraseñas son diferentes').show();
        //console.log('Las contraseñas son diferentes');
       }else{
          $("#btn_enviar").removeClass('d-none');
          $("#btn_enviar2").addClass('d-none'); 
           $("#mensaje").html('').addClass("d-none");
       }
    }

    function registraPersona() {
        console.log('Registro');
    }
</script>