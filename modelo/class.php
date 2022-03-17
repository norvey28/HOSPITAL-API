<?php

/** ---------------------------------------------------------------------------------------------------------------------------- */
/**Clase Conexion */
class Conexion
{
    public static function conectar()
    {
        $host = "localhost";
        $user = "root";
        $pass = "";
        $dbname = "hospital";
        //contectarnos a la bd
        $link = mysqli_connect($host, $user, $pass) or die("Error al conectar a la BD " . mysqli_error($link));
        //seleccionar base de datos con la que se va a trabajar
        mysqli_select_db($link, $dbname) or die("Error al seleccionar la BD " . mysqli_error($link));
        return $link;
    }
}

/** ---------------------------------------------------------------------------------------------------------------------------- */
/**Clase Departamento */
class Departamento
{
    private $id;
    private $nombre;

    public function __construct($id = "", $nombre = "")
    {
        $this->id = $id;
        $this->nombre = $nombre;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getNombre()
    {
        return $this->nombre;
    }
}

/** ---------------------------------------------------------------------------------------------------------------------------- */
/**Clase DepartamentoDAO */
class DepartamentoDAO
{
    private $objDepartamento;
    private $departamentos;

    public function __construct()
    {
        $this->departamentos = array();
    }



    public function consultarTodos()
    {
        $conexion = new Conexion();
        $link = $conexion->conectar();
        $sql = "SELECT * FROM departamentos";
        $resultado = mysqli_query($link, $sql) or die("ERROR al traer los departamentos" . mysqli_error($link));
        while (($r = $resultado->fetch_row()) != null) {
            $this->objDepartamento = new Departamento($r[0], $r[1]);
            array_push($this->departamentos, $this->objDepartamento);
        }
        mysqli_close($link);
        return $this->departamentos;
    }
}

/** ---------------------------------------------------------------------------------------------------------------------------- */
/**Clase Persona */
class Persona
{
    private $id;
    private $nombres;
    private $apellidos;
    private $direccion;
    private $telefono;
    private $departamentoNacimiento;
    private $departamentoResidencia;
    private $codigoPostal;
    private $numSeguridadSocial;
    private $idRol;

    public function __construct($id = "", $nombres = "", $apellidos = "", $direccion = "", $telefono = "", $departamentoNacimiento = "", $departamentoResidencia = "", $codigoPostal = "", $numSeguridadSocial = "", $idRol = "")
    {
        $this->id = $id;
        $this->nombres = $nombres;
        $this->apellidos = $apellidos;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->departamentoNacimiento = $departamentoNacimiento;
        $this->departamentoResidencia = $departamentoResidencia;
        $this->codigoPostal = $codigoPostal;
        $this->numSeguridadSocial = $numSeguridadSocial;
        $this->idRol = $idRol;
    }

    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;
    }


    public function getNombres()
    {
        return $this->nombres;
    }


    public function setNombres($nombres)
    {
        $this->nombres = $nombres;
    }


    public function getApellidos()
    {
        return $this->apellidos;
    }


    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }


    public function getDireccion()
    {
        return $this->direccion;
    }


    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }


    public function getTelefono()
    {
        return $this->telefono;
    }


    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }


    public function getDepartamentoNacimiento()
    {
        return $this->departamentoNacimiento;
    }


    public function setDepartamentoNacimiento($departamentoNacimiento)
    {
        $this->departamentoNacimiento = $departamentoNacimiento;
    }


    public function getDepartamentoResidencia()
    {
        return $this->departamentoResidencia;
    }


    public function setDepartamentoResidencia($departamentoResidencia)
    {
        $this->departamentoResidencia = $departamentoResidencia;
    }


    public function getCodigoPostal()
    {
        return $this->codigoPostal;
    }


    public function setCodigoPostal($codigoPostal)
    {
        $this->codigoPostal = $codigoPostal;
    }


    public function getNumSeguridadSocial()
    {
        return $this->numSeguridadSocial;
    }


    public function setNumSeguridadSocial($numSeguridadSocial)
    {
        $this->numSeguridadSocial = $numSeguridadSocial;
    }


    public function getIdRol()
    {
        return $this->idRol;
    }


    public function setIdRol($idRol)
    {
        $this->idRol = $idRol;
    }
}

/** ---------------------------------------------------------------------------------------------------------------------------- */
/**Clase PersonaDAO */



class PersonaDAO
{
    private $objPersona;
    private $personas;
    private $conexion;
    private $link;



    public function __construct()
    {
        $this->objPersona = new Persona();
        $this->personas = array();
        $this->conexion = new Conexion();
        $this->link = $this->conexion->conectar();
    }

    public function registrar($persona)
    {
        
        $sql = "INSERT INTO persona VALUES (
            " . $persona->getId() . ",
            '" . $persona->getNombres() . "',
            '" . $persona->getApellidos() . "',
            '" . $persona->getDireccion() . "',
            '" . $persona->getTelefono() . "',
            '" . $persona->getDepartamentoNacimiento() . "',
            '" . $persona->getDepartamentoResidencia() . "',
            '" . $persona->getCodigoPostal() . "',
            '" . $persona->getNumSeguridadSocial() . "',
            " . $persona->getIdRol() . ")";
        $resultado = mysqli_query($this->link, $sql)  or die(alertaError("Error al insertar Persona ", mysqli_error($this->link)));
        alertaCorrecto("Registro Exitoso");
    }

    public function validar($id)
    {

        $sql = "SELECT * FROM persona WHERE id =
            " . $id . "";
        $resultado = mysqli_query($this->link, $sql)  or die("Error en consulta");
        if (mysqli_num_rows($resultado) != 0) {
            return true;
        } else {
            return false;
        }
    }

    public function traerPorId($id)
    {
        $sql = "SELECT * FROM persona WHERE id =
            " . $id . "";
        $resultado = mysqli_query($this->link, $sql)  or die(alertaError("Error en consulta ingresar ", mysqli_error($this->link)));
        while (($r = $resultado->fetch_row()) != null) {
            $this->objPersona->setId($r[0]);
            $this->objPersona->setNombres($r[1]);
            $this->objPersona->setApellidos($r[2]);
            $this->objPersona->setDireccion($r[3]);
            $this->objPersona->setTelefono($r[4]);
            $this->objPersona->setDepartamentoNacimiento($r[5]);
            $this->objPersona->setDepartamentoResidencia($r[6]);
            $this->objPersona->setCodigoPostal($r[7]);
            $this->objPersona->setNumSeguridadSocial($r[8]);
            $this->objPersona->setIdRol($r[9]);
        }
        return $this->objPersona;
    }

    public function traerTodo()
    {
        $sql = "SELECT * FROM persona ";
        $resultado = mysqli_query($this->link, $sql)  or die(alertaError("Error en consulta traer todas las personas ", mysqli_error($this->link)));
        while (($r = $resultado->fetch_row()) != null) {
            $this->objPersona = new Persona();
            $this->objPersona->setId($r[0]);
            $this->objPersona->setNombres($r[1]);
            $this->objPersona->setApellidos($r[2]);
            $this->objPersona->setDireccion($r[3]);
            $this->objPersona->setTelefono($r[4]);
            $this->objPersona->setDepartamentoNacimiento($r[5]);
            $this->objPersona->setDepartamentoResidencia($r[6]);
            $this->objPersona->setCodigoPostal($r[7]);
            $this->objPersona->setNumSeguridadSocial($r[8]);
            $this->objPersona->setIdRol($r[9]);
            array_push($this->personas,$this->objPersona);
        }
        return $this->personas;
    }

    public function actualizar($persona)
    {
        
        $sql = "UPDATE persona SET 
            nombres = '" . $persona->getNombres() . "',
            apellidos = '" . $persona->getApellidos() . "',
            direccion = '" . $persona->getDireccion() . "',
            telefono = '" . $persona->getTelefono() . "',
            departamentoNacimiento = '" . $persona->getDepartamentoNacimiento() . "',
            departamentoResidencia = '" . $persona->getDepartamentoResidencia() . "',
            codigoPostal = '" . $persona->getCodigoPostal() . "',
            numSeguridadSocial = '" . $persona->getNumSeguridadSocial() . "'
             WHERE id=".$persona->getId()."";
             var_dump($sql);
        $resultado = mysqli_query($this->link, $sql)  or die(alertaError("Error al actualizar Persona ", mysqli_error($this->link)));
        alertaCorrecto("Cambio Exitoso","../home.php");
    }
}
/** ---------------------------------------------------------------------------------------------------------------------------- */
/**Clase Rol */

class Rol
{
    private $id;
    private $nombre;

    public function __construct($id = "", $nombre = "")
    {
        $this->id = $id;
        $this->nombre = $nombre;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
}
/** ---------------------------------------------------------------------------------------------------------------------------- */
/**Clase RolDAO */

class RolDAO
{
    private $objRol;
    private $roles;

    public function __construct()
    {
        $this->roles = array();
    }

    public function consultarTodos()
    {
        $conexion = new Conexion();
        $link = $conexion->conectar();
        $sql = "SELECT * FROM rol";
        $resultado = mysqli_query($link, $sql) or die("ERROR al traer los roles" . $link);
        while (($r = $resultado->fetch_row()) != null) {
            $this->objRol = new Rol($r[0], $r[1]);
            array_push($this->roles, $this->objRol);
        }
        mysqli_close($link);
        return $this->roles;
    }
}

/** ---------------------------------------------------------------------------------------------------------------------------- */
/**Clase Credenciales */

class Credenciales
{
    private $idPersona;
    private $password;
    private $idRol;

    public function __construct($idPersona = "", $password = "", $idRol = "")
    {
        $this->$idPersona = $idPersona;
        $this->$password = $password;
        $this->$idRol = $idRol;
    }

    public function setIdPersona($idPersona)
    {
        $this->idPersona = $idPersona;
    }

    public function getIdPersona()
    {
        return $this->idPersona;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setIdRol($idRol)
    {
        $this->idRol = $idRol;
    }

    public function getIdRol()
    {
        return $this->idRol;
    }
}

/** ---------------------------------------------------------------------------------------------------------------------------- */
/**Clase CredencialesDAO */

class CredencialesDAO
{
    private $objCredenciales;
    private $conexion;
    private $link;

    public function  __construct()
    {
        $this->conexion = new Conexion();
        $this->link = $this->conexion->conectar();
        $this->objCredenciales = new Credenciales();
    }

    public function registrar($objCredenciales)
    {
        $conexion = new Conexion();
        $link = $conexion->conectar();
        $sql = "INSERT INTO credenciales VALUES (
            " . $objCredenciales->getIdPersona() . ",
            '" . $objCredenciales->getPassword() . "',
            " . $objCredenciales->getIdRol() . ")";
        $resultado = mysqli_query($link, $sql)  or die(alertaError("Error al crear credenciales ", $link));
    }

    public function validar($id)
    {
        $sql = "SELECT * FROM credenciales WHERE idPersona = " . $id . "";
        $resultado = mysqli_query($this->link, $sql)  or die(alertaError("Error en consulta validar ", mysqli_error($this->link)));
        if (mysqli_num_rows($resultado) != 0) {
            return true;
        } else {
            return false;
        }
    }

    public function ingresar($id, $password, $idRol)
    {

        $sql = "SELECT * FROM credenciales WHERE idPersona =
            " . $id . " AND
            password = '" . $password . "' AND
            idRol = " . $idRol . "";
        echo "<script>alert('$sql');</script>";
        $resultado = mysqli_query($this->link, $sql)  or die(alertaError("Error en consulta ingresar ", mysqli_error($this->link)));
        while (($r = $resultado->fetch_row()) != null) {
            $this->objCredenciales->setIdPersona($r[0]);
            $this->objCredenciales->setIdRol($r[2]);
        }
        return $this->objCredenciales;
    }



    public function getCredenciales()
    {
        return $this->objCredenciales;
    }

    public function setCredenciales($objCredenciales)
    {
        $this->objCredenciales = $objCredenciales;
    }
}

/** ---------------------------------------------------------------------------------------------------------------------------- */
/** Clase Medico */

class Medico
{
    private $idPersona;
    private $numColegiado;
    private $idTipoMedico;

    public function __construct($idPersona = "", $numColegiado = "", $idTipoMedico = "")
    {
        $this->idPersona = $idPersona;
        $this->numColegiado = $numColegiado;
        $this->idTipoMedico = $idTipoMedico;
    }

    public function getIdPersona()
    {
        return $this->idPersona;
    }

    public function setIdPersona($idPersona)
    {
        $this->idPersona = $idPersona;
    }

    public function getNumColegiado()
    {
        return $this->numColegiado;
    }

    public function setNumColegiado($numColegiado)
    {
        $this->numColegiado = $numColegiado;
    }

    public function getIdTipoMedico()
    {
        return $this->idTipoMedico;
    }

    public function setIdTipoMedico($idTipoMedico)
    {
        $this->idTipoMedico = $idTipoMedico;
    }
}

/** ---------------------------------------------------------------------------------------------------------------------------- */
/** Clase TipoMedico */

class TipoMedico
{
    private $id;
    private $nombre;

    public function __construct($id = "", $nombre = "")
    {
        $this->id = $id;
        $this->nombre = $nombre;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
}

/** ---------------------------------------------------------------------------------------------------------------------------- */
/** Clase MedicoDAO */

class MedicoDAO
{
    private $conexion;
    private $link;
    private $tiposMedicos;

    public function __construct()
    {
        $this->conexion = new Conexion();
        $this->link = $this->conexion->conectar();
        $this->tiposMedicos = array();
    }

    public function insertarIdPersona($idPersona)
    {
        $sql = "INSERT INTO medico (idPersona) VALUES (
            " . $idPersona . ")";
        mysqli_query($this->link, $sql)  or die(alertaError("Error al insertar id en tabla medico", mysqli_error($this->link)));
    }

    public function insertarDatos($objMedico)
    {
        $sql = "INSERT INTO medico  VALUES (
            " . $objMedico->getIdPersona() . ",
            '" . $objMedico->getNumColegiado() . "',
            " . $objMedico->getIdTipoMedico() . "
            )";
        mysqli_query($this->link, $sql)  or die(alertaError("Error al insertar id en tabla medico", mysqli_error($this->link)));
    }


    public function consultarTiposMedicos()
    {

        $sql = "SELECT * FROM tipo_medico";
        $resultado = mysqli_query($this->link, $sql) or die(alertaError("ERROR al traer los tipos de medicos", mysqli_error($this->link)));
        while (($r = $resultado->fetch_row()) != null) {
            $objTipoMedico = new TipoMedico($r[0], $r[1]);
            array_push($this->tiposMedicos, $objTipoMedico);
        }
        mysqli_close($this->link);
        return $this->tiposMedicos;
    }
}


/** ---------------------------------------------------------------------------------------------------------------------------- */
/** Clase Empleado */

class Empleado
{
    private $idPersona;
    private $idTipoEmpleado;

    public function __construct($idPersona = "", $idTipoEmpleado = "")
    {
        $this->idPersona = $idPersona;
        $this->idTipoEmpleado = $idTipoEmpleado;
    }

    public function getIdPersona()
    {
        return $this->idPersona;
    }


    public function setIdPersona($idPersona)
    {
        $this->idPersona = $idPersona;
    }

    public function getIdTipoEmpleado()
    {
        return $this->idTipoEmpleado;
    }


    public function setIdTipoEmpleado($idTipoEmpleado)
    {
        $this->idTipoEmpleado = $idTipoEmpleado;
    }
}

/** ---------------------------------------------------------------------------------------------------------------------------- */
/** Clase TipoMedico */

class TipoEmpleado
{
    private $id;
    private $nombre;

    public function __construct($id = "", $nombre = "")
    {
        $this->id = $id;
        $this->nombre = $nombre;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
}


/** ---------------------------------------------------------------------------------------------------------------------------- */
/** Clase EmpleadoDAO */

class EmpleadoDAO
{
    private $conexion;
    private $link;
    private $tiposEmpleados;

    public function __construct()
    {
        $this->conexion = new Conexion();
        $this->link = $this->conexion->conectar();
        $this->tiposEmpleados = array();
    }

    public function insertarDatos($objEmpleado)
    {
        $sql = "INSERT INTO empleado  VALUES (
                " . $objEmpleado->getIdPersona() . ",
                " . $objEmpleado->getIdTipoEmpleado() . "
                )";
        mysqli_query($this->link, $sql)  or die(alertaError("Error al insertar id en tabla empleado", mysqli_error($this->link)));
    }



    public function consultarTiposEmpleados()
    {

        $sql = "SELECT * FROM tipo_empleado";
        $resultado = mysqli_query($this->link, $sql) or die("ERROR al traer los tipos de medicos" . $this->link);
        while (($r = $resultado->fetch_row()) != null) {
            $objTiposEmpleados = new TipoEmpleado($r[0], $r[1]);
            array_push($this->tiposEmpleados, $objTiposEmpleados);
        }
        mysqli_close($this->link);
        return $this->tiposEmpleados;
    }
}

/** ---------------------------------------------------------------------------------------------------------------------------- */
/** Clase Paciente */

class Paciente
{
    private $idPersona;
    private $idMedico;

    public function __construct($idPersona = "", $idMedico = "")
    {
        $this->idPersona = $idPersona;
        $this->idMedico = $idMedico;
    }

    public function getIdPersona()
    {
        return $this->idEmpleado;
    }


    public function setIdPersona($idPersona)
    {
        $this->idPersona = $idPersona;
    }

    public function getIdMedico()
    {
        return $this->idMedico;
    }


    public function setIdMedico($idMedico)
    {
        $this->idMedico = $idMedico;
    }
}


/** ---------------------------------------------------------------------------------------------------------------------------- */
/** Clase PacienteDAO */

class PacienteDAO
{
    public function __construct()
    {
    }

    public function insertarIdPersona($idPersona)
    {
        $conexion = new Conexion();
        $link = $conexion->conectar();
        $sql = "INSERT INTO paciente (idPersona) VALUES (
            " . $idPersona . ")";
        $resultado = mysqli_query($link, $sql)  or die("Error al insertar id en tabla empleado");
    }
}




/**Fuciones para todos */
function alertaError($mensaje = "", $error = "")
{
?>

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- CSS personalizado -->
<link rel="stylesheet" href="../css/style.css">
        <!--SweetAlert2-->
        <link rel="stylesheet" href="../sweetAlert/dist/sweetalert2.min.css">
    </head>
    <body>
    </body>
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../sweetAlert/dist/sweetalert2.all.min.js"></script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>


    <script type='text/javascript'>
        Swal.fire({
            title: 'Error',
            text: '<?php echo $mensaje; ?> ',
            icon: 'error',
            <?php
            if ($error != "") {
            ?>
                footer: "Mensaje para el desarrollador: <?php echo $error; ?>"
            <?php
            }
            ?>
        }).then((result) => {

            if (result.value) {
                window.location = '../index.php';
            }

        });
    </script>
<?php
    return  "";
}

function alertaCorrecto($mensaje = "", $ruta = "../index.php")
{
?>

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- CSS personalizado -->
<link rel="stylesheet" href="../css/style.css">
        <!--SweetAlert2-->
        <link rel="stylesheet" href="../sweetAlert/dist/sweetalert2.min.css">
    </head>
    <body>
    </body>
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../sweetAlert/dist/sweetalert2.all.min.js"></script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <script type='text/javascript'>
        Swal.fire({
            title: 'Éxito',
            text: '<?php echo $mensaje; ?> ',
            icon: 'success',
        }).then((result) => {
            if (result.value) {
                window.location = '<?php echo $ruta; ?>';
            }
        });
    </script>
<?php


















}
?>