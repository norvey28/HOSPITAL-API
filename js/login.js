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



(function() {
    $(document).ready(function() {
        $('.alt-form').click(function() {
            //$('.form-content').toggle("slow");
            $('.animacion').toggle("slow");
        });
    });
}())