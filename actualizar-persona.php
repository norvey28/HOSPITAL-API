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
                break;
            }
        case "2": {
                include_once('./vista/menu/menuMedico.php');
                break;
            }
        case "3": {
                include_once('./vista/menu/menuEmpleado.php');
                break;
            }
        case "4": {
                include_once('./vista/menu/menuPaciente.php');
                break;
            }
    }

    $id = $_REQUEST['id'];
    ?>


    <div class="col-10 mx-auto">
        <div class="p-5 mb-4 bg-light rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">Editar Datos Basicos Personas</h1>
                <div>
                    <table class="table table-responsive table-dark table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombres</th>
                                <th scope="col">Apellidos</th>
                                <th scope="col">Direccion</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">C. Nacimiento</th>
                                <th scope="col">C. Residencia</th>
                                <th scope="col">Codigo Postal</th>
                                <th scope="col">Num Seg Social</th>
                                <th scope="col">Tipo Usuario⠀⠀⠀⠀⠀⠀⠀⠀</th>
                                <th scope="col">Confirmar</th>

                            </tr>
                        </thead>
                        <tbody>
                            <form action="./controlador/editarPersona.php" method="post">
                                <?php
                                $objPersonaDAO = new PersonaDAO();
                                $persona = $objPersonaDAO->traerPorId($id);

                                ?>
                                <tr>
                                    <th scope="col">
                                        <input readonly class="form-control" type="text" name="id" value="<?php echo $persona->getId(); ?>">
                                    </th>
                                    <th>
                                        <input required class="form-control" type="text" name="nombres" value="<?php echo $persona->getNombres(); ?>">
                                    </th>
                                    <th>
                                        <input required class="form-control" type="text" name="apellidos" value="<?php echo $persona->getApellidos(); ?>">
                                    </th>
                                    <th>
                                        <input required class="form-control" type="text" name="direccion" value="<?php echo $persona->getDireccion(); ?>">
                                    </th>
                                    <th>
                                        <input required class="form-control" type="text" name="telefono" value="<?php echo $persona->getTelefono(); ?>">
                                    </th>
                                    <th>
                                        <select class="form-select form-control" name="departamentoNacimiento" required>
                                            <?php
                                            $objDAO = new DepartamentoDAO();
                                            $departamentos = $objDAO->consultarTodos();
                                            foreach ($departamentos as $dep) {
                                            ?>
                                                <option <?php if ($dep->getId() == $persona->getDepartamentoNacimiento()) {
                                                            echo "selected";
                                                        }?> value="<?php echo $dep->getId(); ?>"><?php echo $dep->getNombre(); ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                       
                                    </th>
                                    <th>
                                        <select class="form-select form-control" name="departamentoResidencia" required>
                                            <?php
                                            $objDAO = new DepartamentoDAO();
                                            $departamentos = $objDAO->consultarTodos();
                                            foreach ($departamentos as $dep) {
                                            ?>
                                                <option <?php if ($dep->getId() == $persona->getDepartamentoResidencia()) {
                                                            echo "selected";
                                                        } ?> value="<?php echo $dep->getId(); ?>"><?php echo $dep->getNombre(); ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                      
                                    </th>
                                    <th>
                                        <input required class="form-control" type="text" name="codigoPostal" value="<?php echo $persona->getCodigoPostal(); ?>">

                                    </th>
                                    <th>
                                        <input required class="form-control" type="text" name="numeroSeguridadSocial" value="<?php echo $persona->getNumSeguridadSocial(); ?>">

                                    </th>
                                    <th>
                                        <select class="form-select form-control" name="rol" readonly  required>
                                            <?php
                                            $objDAO = new rolDAO();
                                            $roles = $objDAO->consultarTodos();
                                            foreach ($roles as $rol) {
                                                 if ($rol->getId() == $persona->getIdRol()) {
                                                    
                                                
                                            ?>
                                                <option <?php echo "selected" ?> value="<?php echo $rol->getId(); ?>"><?php echo $rol->getNombre(); ?></option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </th>
                                    <th>
                                        <button class="btn btn-primary " > Confirmar </button>
                                    </th>


                                </tr>

                            </form>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>



    <div class="mensajes-ajax"></div>














    <!-- Modal -->
    <div class="modal fade" id="modalModificar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
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