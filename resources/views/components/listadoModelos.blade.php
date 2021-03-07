  <div class="card">
      <div class="card-header">
          <div class="col-12">
              <div class="card-title col-md-6 ">Listado de modelos</div>
              <div class=" col-md-6"><button class="btn btn-success"
                      onClick="llamarComponente('nuevo/modelo', 'visorCompontes')"><i class="fas fa-plus">
                          Nuevo</i></button></div>
          </div>


      </div>
      <!-- /.card-header -->
      <div class="card-body">
          <table id="example2" class="table table-bordered table-striped">
              <thead>
                  <tr>
                      <th>Id</th>
                      <th>Modelo</th>
                      <th>Descripcion</th>
                      <th>Marca</th>
                      <th>Registro</th>
                      <th>Acciones</th>
                  </tr>
              </thead>
              <tbody>

                  @foreach ($modelos as $modelo)
                      <tr>
                          <td>{{ $modelo->id }}</td>
                          <td>{{ $modelo->modelo }}</td>
                          <td>{{ $modelo->descripcion }}</td>
                           <td>{{ $modelo->nombre }}</td>
                          <td>{{ $modelo->created_at }}</td>
                          <td>
                              <button class="btn btn-info btn-sm"
                                  onClick="enviarDatosModelo('editar/modelo', '{{ $modelo->id }}' );"> <i
                                      class="fas fa-edit"></i> Editar</button>

                              <button class="btn btn-danger btn-sm"
                                  onClick="enviarDatosModelo('eliminar/modelo', '{{ $modelo->id }}' );"> <i
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
          $("#example2").DataTable({
              "responsive": true,
              "autoWidth": false,
              "language": {
                  "url": "https://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"
              }
          });
      });

  </script>
