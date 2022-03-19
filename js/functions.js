$(document).ready(function() {
    $(document).on("click", "#cerrarSesion", function() {
        $.ajax({
            url: "./controlador/cerrar_sesion.php",
            type: "POST",
            cache: false,
            success: function() {
                $('.mensajes-ajax').html(alertaCorrecto("Sesion finalizada Correctamente", "./index.php"));
            },
            error: function() {
                $('.mensajes-ajax').html(alertaCorrecto("Error al cerrar sesion", "./#"));
            }
        });
    });

});

$("#btn-consultaId").click(function() {
    if ($("#consultaId").val() == "") {
        $("#div-validar-datos").html(alertaError("Ingrese una identificacion", "", false));
    } else {
        $.ajax({
            url: "./controlador/validar_cambio_password_ajax.php",
            type: "POST",
            data: $("#form-validar-id").serialize(),
            success: function(data) {
                $('#div-validar-datos').html(data);
            },
            error: function() {
                $('#div-validar-datos').html("Error al enviar");
            }
        });
    }
});

$("#btn-generarPassword").click(function() {
    console.log("si");
    if ($("#nombres").val() == "" || $("#departamentoResidencia").val() == "") {
        $("#div-generar-password").html(alertaError("Ingrese los datos solicitados primero", "", false));
    } else {
        $.ajax({
            url: "./controlador/validar_cambio_password_ajax.php",
            type: "POST",
            data: $("#form-validar-datos").serialize(),
            success: function(data) {
                $('#div-generar-password').html(data);
            },
            error: function() {
                $('#div-generar-password').html("Error al enviar");
            }
        });
    }
});

function inputs() {

    let rol = document.getElementById('rolRegistro').value;

    let numColegiado = document.getElementById('registroNumeroColegiado');
    let tipoMedico = document.getElementById('registroTipoMedico');
    let tipoEmpleado = document.getElementById('registroTipoEmpleado');
    let divMedico = document.getElementById('div-datos-medico');
    let divEmpleado = document.getElementById('div-datos-empleado');

    divMedico.setAttribute("hidden", "");
    numColegiado.setAttribute("type", "hidden");
    numColegiado.setAttribute("disabled", "");
    tipoMedico.setAttribute("hidden", "");
    tipoMedico.setAttribute("disabled", "");
    divEmpleado.setAttribute("hidden", "");
    tipoEmpleado.setAttribute("disabled", "");
    switch (rol) {
        case "2":
            {
                divMedico.removeAttribute("hidden");
                numColegiado.setAttribute("type", "number");
                numColegiado.removeAttribute("disabled");
                tipoMedico.removeAttribute("hidden");
                tipoMedico.removeAttribute("disabled");
                break;
            }
        case "3":
            {
                divEmpleado.removeAttribute("hidden");
                tipoEmpleado.removeAttribute("hidden");
                tipoEmpleado.removeAttribute("disabled");
                break;
            }
        default:
            {
                break;
            }
    }
}

function validarPassword() {
    let c1 = document.getElementById('registroPassword');
    let c2 = document.getElementById('registro_confirmoPassword');
    let btn = document.getElementById('btn-registro');
    if (c1.value == c2.value) {
        btn.disabled = false;
    } else {
        btn.disabled = true;
    }
}



function alertaCorrecto(texto, ruta) {
    let mensaje = "<script type='text/javascript'> Swal.fire({ title: 'Éxito',text: '" + texto + " ',icon: 'success',allowOutsideClick: false,}).then((result) => {if (result.value) {window.location = '" + ruta + "' ;}}); </script>";
    return mensaje;
}

function alertaError(texto, ruta, activarRuta) {
    let mensaje = "<script type='text/javascript'> Swal.fire({ title: 'Error',text: '" + texto + " ',icon: 'error',allowOutsideClick: false,backdrop: 'rgba(34,40,49,1)',})"
    if (activarRuta) {
        mensaje += ".then((result) => {if (result.value) {window.location = '" + ruta + "' ;}}); </script>";
    } else {
        mensaje += "; </script>";
    }

    return mensaje;
}

(function() {
    $(document).ready(function() {
        $('.alt-form').click(function() {
            //$('.form-content').toggle("slow");
            $('.animacion').toggle("slow");
        });
    });
}());