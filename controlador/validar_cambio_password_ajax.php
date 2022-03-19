<?php
include_once('../modelo/class.php');
$objPersonaDAO = new PersonaDAO();
if (isset($_POST['consultaId'])) {
    $id = $_POST['consultaId'];

    $existe = $objPersonaDAO->validar($id);
    if ($existe) {
?>
        <form id="form-validar-datos">
            <br>
            <h5>Si los datos que ingresa corresponden al usuario con la identificacion dada, se le asignará una nueva contraseña</h5>
            <br>
            <input class="form-control d-none" name="idPersona" type="number" value="<?php echo $id; ?>">
            <div class="form-floating col-8 mx-auto">
                <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Ingrese nombres" required>
                <label for="nombres">ingrese nombres</label>
            </div>
            <div class="col-8 mx-auto">
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
        </form>
        <div>
            <button class="btn btn-danger" id="btn-generarPassword">Validar</button>
        </div>
        <script src="./js/functions.js"></script>
    <?php
    } else {
    ?>
        <script type='text/javascript'>
            Swal.fire({
                title: 'Error',
                text: 'No se encontro la cuenta, imposible generar nueva contraseña',
                icon: 'error',
            });
        </script>
    <?php
    }
}

if (isset($_POST['nombres']) && isset($_POST['departamentoResidencia'])) {
    $id = $_POST['idPersona'];
    $objPersona = new Persona();
    $objPersona->setId($id);
    $objPersona->setNombres($_POST['nombres']);
    $objPersona->setDepartamentoResidencia($_POST['departamentoResidencia']);
    $objPersonaDAO->setObjPersona($objPersona);

    if ($objPersonaDAO->validarDatos()) {
        $objCredencialesDAO = new CredencialesDAO();
        $objCredenciales = new Credenciales();
        $objCredenciales->setIdPersona($id);

        $key = "";
        $pattern = "1234567890abcdefghijklmnopqrstuvwxyz";
        $max = strlen($pattern) - 1;
        for ($i = 0; $i < 10; $i++) {
            $key .= substr($pattern, mt_rand(0, $max), 1);
        }
        $objCredenciales->setPassword($key);
        $objCredencialesDAO->setObjCredenciales($objCredenciales);
        $objCredencialesDAO->nuevaPassword();
    ?>
        <script type='text/javascript'>
            Swal.fire({
                title: 'Éxito',
                text: 'Su nueva contraseña es: <?php echo $key; ?>',
                icon: 'succes',
                allowOutsideClick: false,
            }).then((result) => {
                if (result.value) {
                    window.location = './index.php';
                }
            });
        </script>
    <?php
    } else {
    ?>
        <script type='text/javascript'>
            Swal.fire({
                title: 'Error',
                text: 'No es posible confirmar su identidad',
                icon: 'error',
            });
        </script>
<?php
    }
}
?>