
<x-guest-layout>

    <main class="">
        <div class="p-4 p-md-5 mb-4 text-white banner bg-dark ">
          <div class="col-md-6 px-0">
            
          </div>
        </div>
    </main>
    
    <div class=" container login_form col-md-12 ">    
    
        <div class="">
            <center><p class="uppercase titulo_login text-uppercase ">Información de suscriptores </p>
              <table>
                <tr>
                    <td>
                        <form method="POST" action="{{ route('logout') }}">
                        @csrf
    
                        <a href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                        <i class="fas fa-2x fa-sign-out-alt link-button">Salir</i>
                           
                        </a>
                        </form>
                </td>
                <td>
                    <a href="{{url('planes')}}" class=""> <i class="fas fa-2x fa-store link-button">  planes </i></a>
                </td>
                <td>
                    <a href="{{url('planes/usuario')}}" class=""> <i class="fas fa-2x fa-list-ul link-button"> Mis planes </i></a>
                </td>
                </tr>
            </table>
            </center>            
        </div>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

            <div class="form-login">
                <table class="table text-center" style="border: solid #ccc 0px !important;">
                    <thead>
                      <tr class=" text-uppercase font-bold  "  >
                        <th scope="col"></th>
                        <th scope="col">usuario</th>
                        <th scope="col">número de documento</th>
                        <th scope="col">plan actual</th>
                        <th scope="col">Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                         $i=1; //$planes = ["s", "d", 2 ,4]
                      @endphp
                      @foreach ($planes as $plan)
                      @php
                      $bg_estado='';
                           switch ($plan->estado) {
                             case 1:
                             $bg_estado='bg_activo';
                               break;
                               case 0:
                             $bg_estado='bg_inactivo';
                               break;
                               case 3:
                             $bg_estado='bg_eliminado';
                               break;
                             
                             default:
                               # code...
                               break;
                           }
                      @endphp
                      <tr class="table_tr {{$bg_estado}}">
                        <th scope="row" class="table_space">{{$i++}}</th>
                        <td class="table_space" >{{$plan->nombres .' ' . $plan->apellidos}}</td>
                        <td class="table_space" >{{$plan->identificacion}}</td>
                        <td class="table_space" >{{$plan->plan_name }}</td>
                        <td  class="table_space">
                          <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modaInfo{{$i}}">
                            <i class="fas fa-info"></i>
                          </button>
                          <button type="button" class="btn btn-warning"  onclick="CancelarPlan( {{$plan->plan_id}},  {{$plan->id}}, '{{url('cancelar/plan')}}');">
                            <i class="fas fa-ban"> Cancelar</i>
                          </button>
                         </td>
                      </tr> 
                      <!-- Modal -->
                        <div class="modal fade" id="modaInfo{{$i}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{$plan->plan_name }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                {{$plan->plan_description}}
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button> 
                              </div>
                            </div>
                          </div>
                        </div>
                      @endforeach
                       
                    </tbody>
                  </table>
            </div>
    </div>

</div>
</x-guest-layout>
 
<button type="button" class="d-none" data-bs-toggle="modal"  id="Mensaje" data-bs-target="#Mensajes"></button>
 <!-- Modal -->
 <div class="modal fade " id="Mensajes" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content bg-info"> 
      <div class="modal-body"> 
       <p id="descr_mensaje" class=" center">...</p>
      </div> 
    </div>
  </div>
</div>
<script>
  function CancelarPlan(id_plan, id_subscripcion,url) {
   
    datos = {
      "id_subscripcion": id_subscripcion,
      "id_plan" : id_plan,
    };
     //console.log(datos);
    $.ajax({
      url:url,
      data: datos,
      type:"POST",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    }).done(function (data, status, xhr) {
      var tipo = xhr.getResponseHeader('content-type');
      if(tipo.indexOf('json')){
        $("#Mensaje").click();
        $("#descr_mensaje").html(data.response.mensaje);
        //window.location.replace(data.response.redirect);
        var delay = 2000; 
        var url = data.response.redirect;
        setTimeout(function(){ window.location = url; }, delay);

        // console.log(tipo);
      }else if(tipo.indexOf('html')){
        console.log(tipo);
      }
      console.log(data.response.redirect);
    });
  }
</script>
