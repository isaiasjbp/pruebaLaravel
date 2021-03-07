    @php
        $nombre = '';
        $descripcion = ''; 
        $accion = ''; 
        $id='';
        if (isset($datosMarca)) {
            $id= $datosMarca[0]->id;
            $nombre = $datosMarca[0]->nombre;
            $descripcion = $datosMarca[0]->descripcion;  
            $accion = 'editar';
        }
        
    @endphp

    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- jquery validation -->{{--  --}}
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">Registro<small> de marcas</small></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="quickForm" method="POST">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input required value="{{ $nombre }}" type="text" name="nombre" class="form-control"
                                id="nombre" placeholder="Nombre">
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción</label> 
                                <textarea type="textarea"  name="descripcion"    class="form-control"
                                id="descripcion" placeholder="Ingrese descripcion">{{ $descripcion }}</textarea>
                        </div> 
                        
                        <input type="hidden" value="{{ $accion }}" name="accion">
                         <input type="hidden" value="{{ $id }}" name="id">
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- jquery-validation -->
    <script src="{{ asset('plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-validation/additional-methods.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $.validator.setDefaults({
                submitHandler: function() {
                    var datos = $("#quickForm").serialize();
                    var accion = '{{ $accion }}';
                    if (accion === 'editar') {
                        enviarDatos('actualizar/marca', datos);
                    } else {
                        enviarDatos('registrar/marca', datos);
                    }
                }
            });
            jQuery.validator.addMethod("lettersonly", function(value, element) {
                return this.optional(element) || /^[a-zA-Z ]+$/i.test(value);
            }, "");
            $('#quickForm').validate({
                rules: {
                    nombre: {
                        required: true,
                        minlength: 3,
                        lettersonly: true
                    },
                    
                    
                },
                messages: {
                    nombre: {
                        required: "Por favor ingrese  su nombre completo ",
                        minlength: "Deben ser almenos 3 letras",
                        lettersonly: "Solo se admiten lestras y espacios"
                    },
                     
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });

    </script>
