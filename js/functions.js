$(document).ready(function() {
    $(document).on("click", "#cerrarSesion", function() {
        $('.mensajes-ajax').html("<script>alert('Procesando, por favor espere...');</script>");
        $.ajax({
            url: "./controlador/cerrar_sesion.php",
            type: "POST",
            cache: false,
            success: function() {
                $('.mensajes-ajax').html("<script>alert('Sesion finalizada correctmente');</script>");
                $('.mensajes-ajax').html("<script>window.location.assign('./index.php');</script>");

            },
            error: function() {
                $('.mensajes-ajax').html("<script>alert('No se pudo cerrar sesion');</script>");
            }
        });
    });
});