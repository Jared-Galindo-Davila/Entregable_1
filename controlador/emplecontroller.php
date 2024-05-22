<?php
// Incluir archivos de configuración y definición de la clase Empleado
include '../config/db.php';
include '../modelo/Empleado.php';

// Crear una instancia de la clase Database para obtener la conexión a la base de datos
$database = new Database();
$db = $database->getConnection();

// Crear una instancia de la clase Empleado utilizando la conexión a la base de datos
$empleado = new Empleado($db);

// Obtener el valor del parámetro 'action' de la URL, o establecerlo como vacío si no está presente
$action = isset($_GET['action']) ? $_GET['action'] : '';

// Verificar el valor del parámetro 'action' para determinar qué acción tomar
if ($action == 'buscar') {
    // Obtener el valor del parámetro 'search' de la URL, o establecerlo como vacío si no está presente
    $search = isset($_GET['search']) ? $_GET['search'] : '';
    
    // Redirigir a la página de búsqueda con el parámetro 'search'
    header("Location: ../vista/buscar.php?search={$search}");
} elseif ($action == 'crear') {
    // Verificar si se está enviando un formulario con el método POST para crear un empleado
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Obtener los datos del formulario y asignarlos a las propiedades del objeto Empleado
        $empleado->nombre = $_POST['nombre'];
        $empleado->apellido = $_POST['apellido'];
        $empleado->correo = $_POST['correo'];
        $empleado->telefono = $_POST['telefono'];
        $empleado->cargo = $_POST['cargo'];
        $empleado->genero = $_POST['genero'];

        // Llamar al método crear de la clase Empleado y verificar el resultado
        if ($empleado->crear()) {
            // Redirigir a la página de creación con el estado de éxito
            header("Location: ../vista/crear.php?status=success");
        } else {
            // Redirigir a la página de creación con el estado de error
            header("Location: ../vista/crear.php?status=error");
        }
    }
} 
?>
