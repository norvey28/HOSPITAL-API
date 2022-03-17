<?php
include_once('../modelo/class.php');


$id = $_POST['id'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$departamentoNacimiento = $_POST['departamentoNacimiento'];
$departamentoResidencia = $_POST['departamentoResidencia'];
$numeroSeguridad = $_POST['numeroSeguridadSocial'];
$codigoPostal = $_POST['codigoPostal'];
$idRol = $_POST['rol'];

$objPersona = new Persona();
$objPersonaDAO = new PersonaDAO();
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
$objPersonaDAO->actualizar($objPersona);

