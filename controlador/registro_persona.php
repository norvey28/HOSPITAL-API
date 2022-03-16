<?php

include_once('../modelo/class.php');


$id = $_POST['registroId'];
$nombres = $_POST['registroNombres'];
$apellidos = $_POST['registroApellidos'];
$telefono = $_POST['registroTelefono'];
$direccion = $_POST['registroDireccion'];
$departamentoNacimiento = $_POST['registroDepartamentoNacimiento'];
$departamentoResidencia = $_POST['registroDepartamentoResidencia'];
$numeroSeguridad = $_POST['registroNumeroSeguridad'];
$codigoPostal = $_POST['registroCodigoPostal'];
$idRol = $_POST['rolRegistro'];
$password = $_POST['registroPassword'];

$objPersona = new Persona();

$objPersonaDAO = new PersonaDAO();

if ($objPersonaDAO->validar($id)) {
    alertaError("Ups, ya existe una persona con esa identificacion", "");
} else {
    $objPersona->setId($id);
    $objPersona->setNombres($nombres);
    $objPersona->setApellidos($apellidos);
    $objPersona->setTelefono($telefono);
    $objPersona->setDireccion($direccion);
    $objPersona->setDepartamentoNacimiento($departamentoNacimiento);
    $objPersona->setDepartamentoResidencia($departamentoResidencia);
    $objPersona->setNumSeguridadSocial($numeroSeguridad);
    $objPersona->setCodigoPostal($codigoPostal);
    $objPersona->setIdRol($idRol);
    $objPersonaDAO->registrar($objPersona);

    switch ($idRol) {
        case 2: {
                $objMedicoDAO = new MedicoDAO();
                $objMedicoDAO->insertarIdPersona($id);
                break;
            }
        case 3: {
                $objEmpleadoDAO = new EmpleadoDAO();
                $objEmpleadoDAO->insertarIdPersona($id);
                break;
            }
        case 4: {
                $objPacienteDAO = new PacienteDAO();
                $objPacienteDAO->insertarIdPersona($id);
                break;
            }
        default: {
            echo "<script>alert('Se ha registrdo un administrador');</script>";
            }
    }


    $objCredenciales = new Credenciales();


    $objCredencialesDAO = new CredencialesDAO();
    $objCredenciales->setIdPersona($id);
    $objCredenciales->setPassword($password);
    $objCredenciales->setIdRol($idRol);
    $objCredencialesDAO->registrar($objCredenciales);
}
