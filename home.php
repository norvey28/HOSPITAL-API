<!DOCTYPE html>
<html lang="en">


<head>
    <title>Hospital</title>
    <?php
    session_start();
    include_once('./modelo/class.php');
    include_once('./vista/encabezado.php');
    ?>



</head>

<body>

    <?php
    switch ($_SESSION['rol']) {
        case "1": {
                include_once('./vista/menu/menuAdmin.php');
                include_once('./vista/body/bodyAdmin.php');
                break;
            }
        case "2": {
                include_once('./vista/menu/menuMedico.php');
                include_once('./vista/body/bodyMedico.php');
                break;
            }
        case "3": {
                include_once('./vista/menu/menuEmpleado.php');
                include_once('./vista/body/bodyEmpleado.php');
                break;
            }
        case "4": {
                include_once('./vista/menu/menuPaciente.php');
                include_once('./vista/body/bodyPaciente.php');
                break;
            }
    }
    ?>




    
    <div class="mensajes-ajax"></div>


<div>
    <br>
    <br>
</div>











    <!-- Modal -->
    <div class="modal fade " id="modalModificar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content rounded-5 shadow">
                <div class="modal-header p-5 pb-4 border-bottom-0">
                    <!-- <h5 class="modal-title">Modal title</h5> -->
                    <h2 class="fw-bold mb-0">Modificar Datos</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body p-5 pt-0">
                    <form class="">

                    </form>
                </div>
            </div>
        </div>
    </div>











    <?php include_once('./vista/scripts.php'); ?>
    <?php
    if ($_SESSION['id'] == "") {
        session_destroy();
        echo "<script type='text/javascript'>
        Swal.fire({
            title: 'ERROR',
            text: 'Inicie sesion primero',
            icon: 'error',
            backdrop: 'rgba(34,40,49,1)',
            allowOutsideClick: false,
        }).then((result) => {
            if (result.value) {
                window.location = './index.php';
            }
        });
    </script>";
    }
    ?>
</body>

</html>