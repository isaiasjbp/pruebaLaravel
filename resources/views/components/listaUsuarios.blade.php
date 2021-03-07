  <div class="card">
      <div class="card-header">
          <div class="col-12">
              <div class="card-title col-md-6 ">Listado de usuarios</div>
              <div class=" col-md-6"><button class="btn btn-success" onClick="llamarComponente('nuevo/usuario', 'visorCompontes')"><i
                          class="fas fa-plus"> Nuevo</i></button></div>
          </div>


      </div>
      <!-- /.card-header -->
      <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
              <thead>
                  <tr>
                      <th>Id</th>
                      <th>Nombre</th>
                      <th>Email</th>
                      <th>Roll</th>
                      <th>Registro</th>
                      <th>Acciones</th>
                  </tr>
              </thead>
              <tbody>

                  @foreach ($usuarios as $usuario)
                      <tr>
                          <td>{{ $usuario->id }}</td>
                          <td>{{ $usuario->name }}</td>
                          <td>{{ $usuario->email }}</td>
                          <td>@php echo $roll = ($usuario->roll == 0) ? 'Piloto' : 'Admin' @endphp</td>
                          <td>{{ $usuario->created_at }}</td>
                          <td>
                              <button class="btn btn-info btn-sm"
                                  onClick="enviarDatos('editar/usuario', '{{ $usuario->id }}' );"> <i
                                      class="fas fa-edit"></i> Editar</button>
                              @if($usuario->estado == 0) 
                              <button class="btn btn-success btn-sm"
                                  onClick="enviarDatos('activar/usuario', '{{ $usuario->id }}' );"> <i
                                      class="fas fa-ban"></i> Activar</button>
                             @else
                              <button class="btn btn-warning btn-sm"
                                  onClick="enviarDatos('desactivar/usuario', '{{ $usuario->id }}' );"> <i
                                      class="fas fa-ban"></i> Desactivar</button>
                             @endif
                              <button class="btn btn-danger btn-sm"
                                  onClick="enviarDatos('eliminar/usuario', '{{ $usuario->id }}' );"> <i
                                      class="fas fa-trash"></i> Eliminar</button>
                          </td>
                      </tr>
                  @endforeach

              </tbody>
              </tfoot>
          </table>

      </div>
  </div>
  <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script>
      $(function() {
          $("#example1").DataTable({
              "responsive": true,
              "autoWidth": false,
              "language": {
                  "url": "https://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"
              }
          });
      });

  </script>
