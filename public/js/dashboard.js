

function llamarBotones(ruta) {
    "use strict";
    $.ajax({
        async: true,
        url: urlBase + ruta,
        type: 'post',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        error: function () {
            console.log("No se ha podido obtener la información");
        }
    }).done(function(respuesta) {
         $("#botonesNavbar").html(respuesta);
    });
}


function llamarComponente(ruta, div) {
   "use strict";
    $.ajax({
        async: true,
        url: urlBase + ruta,
        /* data:data, */
        type: 'post',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        error: function () {
            console.log("No se ha podido obtener la información");
        }
    }).done(function (respuesta) {

         $("#"+div).html(respuesta);
         llamarBotones('get/Botones');
    });
}

function enviarDatos(ruta, datos) {
    "user strict";
    if (ruta == 'editar/usuario') {
        datos = {
            id: datos,
            accion: 'editar'
        }
    } if (ruta == 'eliminar/usuario') {
        datos = {
            id: datos,
            accion: 'eliminar'
        }
    } if (ruta == 'desactivar/usuario') {
        datos = {
            id: datos,
            accion: 'desactivar'
        }
    }
    if (ruta == 'activar/usuario') {
        datos = {
            id: datos,
            accion: 'activar'
        }
    }
    $.ajax({
        async: true,
        url: urlBase + ruta,
        data: datos,
        type: 'post',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        error: function () {
            console.log("No se ha podido obtener la información");
        }
    }).done(function (datos) {
          llamarBotones('get/Botones');
        $("#visorCompontes").html(datos);

    });
}



function enviarDatosMarca(ruta, datos) {
    "user strict";
    if (ruta == 'editar/marca') {
        datos = {
            id: datos,
            accion: 'editar'
        }
    } if (ruta == 'eliminar/marca') {
        datos = {
            id: datos,
            accion: 'eliminar'
        }
    } if (ruta == 'desactivar/marca') {
        datos = {
            id: datos,
            accion: 'desactivar'
        }
    }
    if (ruta == 'activar/marca') {
        datos = {
            id: datos,
            accion: 'activar'
        }
    }
    $.ajax({
        async: true,
        url: urlBase + ruta,
        data: datos,
        type: 'post',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        error: function () {
            console.log("No se ha podido obtener la información");
        }
    }).done(function (datos) {
       llamarBotones('get/Botones');
        $("#visorCompontes").html(datos);

    });
}


function enviarDatosModelo(ruta, datos) {
    "user strict";
    if (ruta == 'editar/modelo') {
        datos = {
            id: datos,
            accion: 'editar'
        }
    } if (ruta == 'eliminar/modelo') {
        datos = {
            id: datos,
            accion: 'eliminar'
        }
    } if (ruta == 'desactivar/modelo') {
        datos = {
            id: datos,
            accion: 'desactivar'
        }
    }
    if (ruta == 'activar/modelo') {
        datos = {
            id: datos,
            accion: 'activar'
        }
    }
    $.ajax({
        async: true,
        url: urlBase + ruta,
        data: datos,
        type: 'post',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        error: function () {
            console.log("No se ha podido obtener la información");
        }
    }).done(function (datos) {
      llamarBotones('get/Botones');
        $("#visorCompontes").html(datos);

    });
}
