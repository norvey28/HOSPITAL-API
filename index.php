<?php
require_once "modelo/class.php";
?>

<!doctype html>
<html lang="en">

<head>
    <?php include_once('./vista/encabezado.php'); ?>

    <title>Login</title>
</head>

<body class="text-center body_login">

    <div class="container">
        <div class="login mx-auto animacion">
            <main class="form-signin form-content">

                <form method="post" action="controlador/login.php" id="forumlario_login">
                    <img class="mb-4" src="img/hospital.png" alt="" width="80" height="100">
                    <h1 class="h2 mb-3 ">Bienvenido</h1>

                    <div class="form-floating">
                        <input type="number" class="form-control" id="idLogin" name="idLogin" placeholder="Identificación" autofocus required>
                        <label for="idLogin">Identificación</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="passwordLogin" name="passwordLogin" placeholder="Contraseña" required>
                        <label for="passwordLogin">Contraseña</label>
                    </div>

                    <br>
                    <div class="mb-3">
                        <label><a href="#">He olvidado mi contraseña</a></label>
                    </div>

                    <div>

                        <select class="form-select form-control select-index" name="idRolLogin" id="idRolLogin" required>
                            <option value="" selected>Seleccione su Rol</option>
                            <?php
                            $objDAO = new rolDAO();
                            $roles = $objDAO->consultarTodos();
                            foreach ($roles as $rol) {
                            ?>
                                <option value="<?php echo $rol->getId(); ?>"><?php echo $rol->getNombre() . "\n"; ?></option>
                            <?php
                            }
                            ?>

                        </select>

                    </div>
                    <br>


                    <button class="w-100 btn btn-lg btn-primary" type="submit">Ingresar</button>
                    <div class="mb-3">
                        <br>
                        <label>¿No estás registrado?
                            <button class="btn btn-link btn-sm alt-form" type="reset" onmouseup="inputs()" >Registrate</button>
                        </label>

                    </div>
                    <p class="mt-5 mb-3 text-muted">&copy; Norvey Peña - 2022</p>
                </form>


            </main>


        </div>
        <div class="login mx-auto animacion" id="div-registro">

            <main class="form-signin form-content " id="form-registro">
                <img class="mb-4" src="img/hospital.png" alt="" width="80" height="100">
                <h1 class="h2 mb-3 ">Registrate</h1>


                <form method="post" action="./controlador/registro_persona.php" id="formularioPaciente" class="formulariosRegistro">
                    <div class="row">
                        <label for="">Seleccione el tipo de cuenta a crear</label>
                        <div class="col-8 mx-auto ">
                            <select class="form-select form-control select-index" id="rolRegistro" name="rolRegistro" onchange='inputs()' required>
                                <option value="" selected>--Seleccione su Rol--</option>
                                <?php
                                $objDAO = new rolDAO();
                                $roles = $objDAO->consultarTodos();
                                foreach ($roles as $rol) {
                                ?>
                                    <option value="<?php echo $rol->getId(); ?>"><?php echo $rol->getNombre(); ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <br><br><br>



                        <div class="col-md-6 col-9">
                            <div class="form-floating">
                                <input type="number" class="form-control" id="registroId" name="registroId" placeholder="Identificación" required>
                                <label for="registroId">Identificación</label>
                            </div>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="registroApellidos" name="registroApellidos" placeholder="Apellidos" required>
                                <label for="registroApellidos">Apellidos</label>
                            </div>
                            <div>
                                <select class="form-select form-control select-index" name="registroDepartamentoNacimiento" id="registroDepartamentoNacimiento" required>
                                    <option value="" selected>--Departamento de Nacimiento--</option>
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
                            <div class="form-floating">
                                <input type="number" class="form-control tel" id="registroTelefono" name="registroTelefono" placeholder="Telefono" required>
                                <label for="registroTelefono">Telefono</label>
                            </div>



                            <div class="form-floating">
                                <input type="password" class="form-control" id="registroPassword" name="registroPassword" placeholder="Contraseña" onkeyup="validarPassword()">
                                <label for="registroPassword">Contraseña</label>
                            </div>
                            <div class="form-floating">
                                <input type="password" class="form-control" id="registro_confirmoPassword" name="registro_confirmoPassword" placeholder=" Confirmar Contraseña" onkeyup="validarPassword()" required>
                                <label for="registro_confirmoPassword">Confirmar Contraseña</label>
                            </div>


                        </div>

                        <div class="col-md-6 col-9">

                            <div class="form-floating">
                                <input type="text" class="form-control" id="registroNombres" name="registroNombres" placeholder="Nombres" required>
                                <label for="registroNombres">Nombres</label>
                            </div>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="registroDireccion" name="registroDireccion" placeholder="Direccion" required>
                                <label for="registroDireccion">Direccion</label>
                            </div>

                            <div>
                                <select class="form-select form-control select-index" name="registroDepartamentoResidencia" id="registroDepartamentoResidencia" required>
                                    <option value="" selected>--Departamento de Residencia--</option>
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
                            <div class="form-floating">
                                <input type="number" class="form-control" id="registroCodigoPostal" name="registroCodigoPostal" placeholder="Codigo postal" required>
                                <label for="registroCodigoPostal">Codigo postal</label>
                            </div>
                            <div class="form-floating">
                                <input type="number" class="form-control" id="registroNumeroSeguridad" name="registroNumeroSeguridad" placeholder="Numero seguridad social" required>
                                <label for="registroNumeroSeguridad">Numero Seguridad Social</label>
                            </div>

                            <div id="div-datos-medico" hidden>
                                <div class="form-floating">
                                    <input type="hidden" class="form-control" id="registroNumeroColegiado" name="registroNumeroColegiado" placeholder="Numero colegiado" required>
                                    <label for="registroNumeroColegiado">Numero de colegiado</label>
                                </div>
                                <select class="form-select form-control select-index" name="registroTipoMedico" id="registroTipoMedico" required hidden disabled>
                                    <option value="" selected>--Tipo de Medico--</option>
                                    <?php
                                    $objMedicoDAO = new MedicoDAO();
                                    $tipos = $objMedicoDAO->consultarTiposMedicos();
                                    foreach ($tipos as $t) {
                                    ?>
                                        <option value="<?php echo $t->getId(); ?>"><?php echo $t->getNombre(); ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>


                            </div>
                            <div id="div-datos-empleado" hidden>
                                <select class="form-select form-control select-index" name="registroTipoEmpleado" id="registroTipoEmpleado" required hidden disabled>
                                    <option value="" selected>--Tipo de Empleado--</option>
                                    <?php
                                    $objEmpleadoDAO = new EmpleadoDAO();
                                    $tipos = $objEmpleadoDAO->consultarTiposEmpleados();
                                    foreach ($tipos as $t) {
                                    ?>
                                        <option value="<?php echo $t->getId(); ?>"><?php echo $t->getNombre(); ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>



                        </div>

                    </div>




                    <button id="btn-registro" class="w-100 btn btn-lg btn-primary" type="submit" disabled>Registrar</button>

                    <div class="mb-3">
                        <br>
                        <label>¿Ya tienes una cuenta?
                            <button class="btn btn-link btn-sm alt-form" type="reset" >Inicia sesión</button>
                        </label>
                    </div>
                    <p class="mt-5 mb-3 text-muted">&copy; Norvey Peña - 2022</p>
                </form>


            </main>
        </div>




    </div>


    <?php include_once('./vista/scripts.php'); ?>

</body>

</html>