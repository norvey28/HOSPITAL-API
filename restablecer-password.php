<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include_once('./vista/encabezado.php');
    include_once('./modelo/class.php');
    include_once('./vista/scripts.php');
    $id = $_REQUEST['consultaId'];
    $personaDAO = new PersonaDAO();
    $persona = $personaDAO->traerPorId($id);
    ?>
</head>

<body class="bg-light">

    <?php
    if ($persona->getId() == null) {
        echo "No existe un usuario con ese id";
    } else {
    ?>
        <form action="./controlador/validarCambioPassword.php" method="post">
            <input class="form-control d-none" name="id" type="text" value="<?php echo $id; ?>">
            <div class="form-floating">
                <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Ingrese nombres" required>
                <label for="nombres">ingrese nombres</label>
            </div>
            <div>
                <select class="form-select form-control select-index" name="departamentoResidencia" id="departamentoResidencia" required>
                    <option value="" selected>--Departamento Residencia--</option>
                    <?php
                    $objDAO = new DepartamentoDAO();
                    $departamentos = $objDAO->consultarTodos();
                    foreach ($departamentos as $dep) {
                    ?>
                        <option value="<?php echo $dep->getId(); ?>"><?php echo $dep->getNombre(); ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div>
                <button class="btn btn-danger">Validar</button>
            </div>

            
        </form>
    <?php

    }
    ?>


    <?php
    echo $persona->getId();
    ?>

    <?php include_once('./vista/scripts.php'); ?>
</body>

</html>