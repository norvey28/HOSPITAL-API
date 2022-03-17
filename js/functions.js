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

function alertaCorrecto(texto, ruta) {
    let mensaje = "<script type='text/javascript'> Swal.fire({ title: 'Éxito',text: '" + texto + " ',icon: 'success',allowOutsideClick: false,}).then((result) => {if (result.value) {window.location = '" + ruta + "' ;}}); </script>";
    return mensaje;
}