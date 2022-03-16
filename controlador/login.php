<?php
session_start();
include_once("../modelo/class.php");

$id = (isset($_POST['idLogin']))?$_POST['idLogin']:'';
$password = (isset($_POST['passwordLogin']))?$_POST['passwordLogin']:'';
$idRol = (isset($_POST['idRolLogin']))?$_POST['idRolLogin']:'';

$objCredencialesDAO = new CredencialesDAO();
if($objCredencialesDAO->validar($id)){
    $objCredenciales = $objCredencialesDAO->ingresar($id,$password,$idRol);
    if($objCredenciales->getIdPersona()==""){
        alertaError("Credenciales incorrectas, intente de nuevo");
        session_destroy();
    }else{
        $_SESSION['id']= $objCredenciales->getIdPersona();
        $_SESSION['rol']= $objCredenciales->getIdRol();
        $objPersonaDAO = new PersonaDAO();
        $objPersona = $objPersonaDAO->traerPorId($_SESSION['id']);
        $_SESSION['nombres']=$objPersona->getNombres(); 
        $_SESSION['apellidos']=$objPersona->getApellidos(); 
        alertaCorrecto("Bienvenido ".$_SESSION['nombres']."","../home.php");
    }
    
}else{
    alertaError("No existe un usuario con esas credenciales");
}


?>

