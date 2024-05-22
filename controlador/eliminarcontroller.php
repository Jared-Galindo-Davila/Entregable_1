<?php
// Incluir archivos de configuración y definiciones de clases
include '../config/db.php';
include '../modelo/empleado.php';

// Crear una instancia de la clase Database para obtener la conexión a la base de datos
$database = new Database();
$db = $database->getConnection();

// Crear una instancia de la clase Empleado utilizando la conexión a la base de datos
$empleado = new Empleado($db);

// Verificar si se ha enviado el formulario para eliminar un empleado
if (isset($_POST['eliminar']) && isset($_POST['id'])) {
    // Obtener el ID del empleado a eliminar desde el formulario
    $id = $_POST['id'];
    
    // Llamar al método eliminar de la clase Empleado y verificar el resultado
    if ($empleado->eliminar($id)) {
        // Mostrar un mensaje de éxito si el empleado se eliminó correctamente
        echo "<script>alert('Empleado eliminado exitosamente.');</script>";
    } else {
        // Mostrar un mensaje de error si hubo un problema al eliminar el empleado
        echo "<script>alert('Error al eliminar empleado.');</script>";
    }
    
    // Redirigir a otra página después de la eliminación
    header("Location: ../vista/eliminar.php");
    exit(); // Asegurar que el script se detenga después de la redirección
}
?>
