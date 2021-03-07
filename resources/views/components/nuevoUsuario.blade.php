    @php
        $nombres = '';
        $email = '';
        $password = '';
        $accion = '';
        $checked = '';
        $id='';
        if (isset($datosUsuario)) {
            $id= $datosUsuario[0]->id;
            $nombres = $datosUsuario[0]->name;
            $email = $datosUsuario[0]->email;
            $checked = $datosUsuario[0]->roll == 1 ? 'checked' : '';
            $accion = 'editar';
        }
        
    @endphp

    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Registro<small>de usuarios</small></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="quickForm" method="POST">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nombres">Nombres</label>
                            <input required value="{{ $nombres }}" type="text" name="nombres" class="form-control"
                                id="nombres" placeholder="Nombres">
                        </div>
                        <div class="form-group">
                            <label for="InputEmail">Correo</label>
                            <input required value="{{ $email }}" type="email" name="email" class="form-control"
                                id="InputEmail" placeholder="Ingrese email">
                        </div>
                        <div class="form-group">
                            <label for="InputPassword1">Contraseña</label>
                            <input required type="password" name="password" class="form-control" id="InputPassword1"
                                placeholder="Contraseña">
                        </div>
                        <div class="form-group mb-0">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" {{ $checked }} name="roll" value="1"
                                    class="custom-control-input" id="exampleCheck1">
                                <label class="custom-control-label" for="exampleCheck1">Administrador </label>
                            </div>
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
                        enviarDatos('actualizar/usuario', datos);
                    } else {
                        enviarDatos('registrar/usuario', datos);
                    }
                }
            });
            jQuery.validator.addMethod("lettersonly", function(value, element) {
                return this.optional(element) || /^[a-zA-Z ]+$/i.test(value);
            }, "");
            $('#quickForm').validate({
                rules: {
                    nombres: {
                        required: true,
                        minlength: 3,
                        lettersonly: true
                    },
                    email: {
                        required: true,
                        email: true,
                    },
                    password: {
                        required: true,
                        minlength: 5
                    },
                },
                messages: {
                    nombres: {
                        required: "Por favor ingrese  su nombre completo ",
                        minlength: "Deben ser almenos 3 letras",
                        lettersonly: "Solo se admiten lestras y espacios"
                    },
                    email: {
                        required: "Por favor ingrese una dirección de correo ",
                        email: "Por favor ingrese un una dirección de correo válida"
                    },
                    password: {
                        required: "Se necesita una contraseña",
                        minlength: "La contraseña debe tene almenos 5 caracteres de logitud"
                    }
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
