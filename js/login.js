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

(function() {
    $(document).ready(function() {
        $('.alt-form').click(function() {
            //$('.form-content').toggle("slow");
            $('.animacion').toggle("slow");
        });
    });
}())