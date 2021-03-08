@php
 if(auth()->user()){
  //   echo '<pre>'; print_r(time()); '</pre>'; die;
    header("location:/dashboard");
    die;
}
@endphp

<x-guest-layout>

    <main class="">
        <div class="p-4 p-md-5 mb-4 text-white banner bg-dark ">
          <div class="col-md-6 px-0">

          </div>
        </div>
    </main>

    <div class=" container login_form col-md-5  ">

        <div class="">
            <center><p class="uppercase titulo_login ">Inicio de sesión  </p></center>
        </div>

        <x-jet-validation-errors class="mb-4 error_login" />
        @if (session('status'))
             <div class="mb-4 font-medium text-sm text-green-600 ">
                {{ session('status') }}
            </div>
        @endif


            <div class="form-login">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class= "div-subtitulo_login centrar">
                        <span class="text-subtitulo-login"> Si ya eres usuario, inicia sesión con tu correo electónico y contraseña registrada </span>
                    </div>
                    <div class="form-group input-icono-usuario">
                         <x-jet-input id="email" class="block mt-1 w-full form-control "
                         placeholder="Correo electrónico o usuario" type="email" name="email" :value="old('email')" required  />
                    </div>

                    <div class="mt-4 from-group input-icono-pass">
                        <x-jet-input id="password" class="block mt-1 w-full form-control"
                        placeholder="***********"  type="password" name="password" required autocomplete="current-password" />
                    </div>

                    <div class="flex items-center justify-end mt-4 centrar">
                       {{--  @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif --}}

                        <button class="ml-4 btn   btn-login">
                            {{ __('Ingresar') }}
                        </button>

                    </div>


                </form>

            </div>
    </div>

</div>
</x-guest-layout>
