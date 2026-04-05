# Hospital Management System

Aplicación web para la gestión de personal hospitalario y pacientes, construida con PHP y MySQL. Permite registrar usuarios con distintos roles (Administrador, Médico, Empleado, Paciente) y acceder a un panel personalizado según el rol.

> Proyecto académico / de práctica. Funcionalidad parcialmente implementada.

---

## Stack

- **Backend:** PHP + MySQLi
- **Frontend:** Bootstrap 5.1.3, jQuery 3.6.0, SweetAlert2
- **Base de datos:** MySQL / MariaDB
- **Servidor local:** XAMPP (Apache)

---

## Funcionalidades implementadas

- Registro de usuarios con campos dinámicos según el rol seleccionado
  - Médico: número de colegiado y tipo de médico (Titular, Interino, Sustituto)
  - Empleado: tipo de empleado (ATS, Auxiliar de enfermería, Celador, Administrativo...)
  - Paciente: registro básico
- Inicio de sesión multi-rol con redirección al panel correspondiente
- Recuperación de contraseña por verificación de identidad (nombre + departamento de residencia)
- Panel de Administrador: tabla con todos los usuarios registrados y opción de editar sus datos
- Listado de 32 departamentos de Colombia para datos de ubicación
- Logout vía AJAX

---

## Funcionalidades pendientes / incompletas

- Los paneles de Médico, Empleado y Paciente muestran un placeholder "Coming Soon"
- Gestión de horarios de médicos (tabla `horario_medico` creada pero sin uso)
- Gestión de vacaciones y sustituciones (tablas creadas pero sin uso)
- Asignación de médico a paciente (tabla `paciente` sin datos)
- No existe funcionalidad de eliminar registros
- No hay búsqueda ni filtrado en la tabla de administrador

---

## Arquitectura

El proyecto sigue un patrón MVC informal:

```
├── index.php                  # Login y registro
├── home.php                   # Dashboard (carga vistas según rol)
├── actualizar-persona.php     # Edición de personas (solo admin)
├── restablecer-password.php   # Recuperación de contraseña
│
├── modelo/
│   └── class.php              # Clases de entidad + DAOs + conexión a BD
│
├── controlador/               # Lógica de negocio (POST handlers)
│
└── vista/
    ├── menu/                  # Menús por rol
    └── body/                  # Contenido del dashboard por rol
```

---

## Instalación local

1. Clonar el repositorio en `htdocs` de XAMPP:
   ```bash
   git clone <repo-url> C:/xampp/htdocs/HOSPITAL-API
   ```

2. Importar la base de datos en phpMyAdmin o desde consola:
   ```bash
   mysql -u root -p < hospital.sql
   ```

3. Iniciar Apache y MySQL desde el panel de XAMPP.

4. Abrir en el navegador:
   ```
   http://localhost/HOSPITAL-API/
   ```

**Credenciales de prueba incluidas en el SQL:**

| ID  | Contraseña | Rol          |
|-----|-----------|--------------|
| 123 | 123       | Administrador |
| 1   | 1         | Médico       |
| 2   | 2         | Médico       |
| 4   | 4         | Empleado     |

---

## Limitaciones conocidas

Este proyecto tiene vulnerabilidades de seguridad que lo hacen **no apto para producción**:

- Las contraseñas se almacenan en texto plano (sin hashing)
- Las consultas SQL usan concatenación de strings directa (riesgo de SQL injection)
- No hay validación ni sanitización de entradas del usuario
- No hay protección CSRF en los formularios
- La conexión a la base de datos tiene credenciales hardcodeadas en `modelo/class.php`

---

## Notas

El nombre "HOSPITAL-API" no refleja con precisión el proyecto: no es una REST API sino una aplicación web tradicional con vistas renderizadas en servidor. El nombre fue el elegido durante el desarrollo inicial.
