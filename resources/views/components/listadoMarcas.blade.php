  <div class="card">
      <div class="card-header">
          <div class="col-12">
              <div class="card-title col-md-6 ">Listado de marcas</div>
              <div class=" col-md-6"><button class="btn btn-danger" onClick="llamarComponente('nueva/marca', 'visorCompontes')"><i
                          class="fas fa-plus"> Nueva</i></button></div>
          </div>


      </div>
      <!-- /.card-header -->
      <div class="card-body">
          <table id="example2" class="table table-bordered table-striped">
              <thead>
                  <tr>
                      <th>Id</th>
                      <th>Marca</th>
                      <th>Descripcion</th> 
                      <th>Registro</th>
                      <th>Acciones</th>
                  </tr>
              </thead>
              <tbody>

                  @foreach ($marcas as $marca)
                      <tr>
                          <td>{{ $marca->id }}</td>
                          <td>{{ $marca->nombre }}</td> 
                         <td>{{ $marca->descripcion }}</td> 
                          <td>{{ $marca->created_at }}</td>
                          <td>
                              <button class="btn btn-info btn-sm"
                                  onClick="enviarDatosMarca('editar/marca', '{{ $marca->id }}' );"> <i
                                      class="fas fa-edit"></i> Editar</button>
                              
                              <button class="btn btn-danger btn-sm"
                                  onClick="enviarDatosMarca('eliminar/marca', '{{ $marca->id }}' );"> <i
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
