<?php
// Incluir el archivo de encabezado (header.php) que contiene la estructura de la página HTML
include 'includes/header.php';
// Incluir el controlador de empleados
include '../controlador/empleadocontroller.php';

// Verificar si se ha enviado el parámetro 'search' en la URL
if (isset($_GET['search'])) {
    // Crear una instancia de la clase Database para obtener la conexión a la base de datos
    $database = new Database();
    $db = $database->getConnection();

    // Crear una instancia del controlador de empleados utilizando la conexión a la base de datos
    $empleadoController = new EmpleadoController($db);
    
    // Llamar al método buscarEmpleado del controlador de empleados y obtener el resultado
    $result = $empleadoController->buscarEmpleado($_GET['search']);

    // Verificar si se encontraron empleados
    if ($result->num_rows > 0) {
?>
        <!-- Mostrar el encabezado para los resultados de la búsqueda -->
        <h3>Resultados de la Búsqueda:</h3>
        <!-- Crear una tabla para mostrar los resultados -->
        <table border='1'>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Cargo</th>
                <th>Género</th>
            </tr>
<?php
            // Iterar sobre los resultados y mostrar cada empleado en una fila de la tabla
            while ($row = $result->fetch_assoc()):
?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['nombre'] ?></td>
                <td><?= $row['apellido'] ?></td>
                <td><?= $row['correo'] ?></td>
                <td><?= $row['telefono'] ?></td>
                <td><?= $row['cargo'] ?></td>
                <td><?= $row['genero'] ?></td>
            </tr>
<?php
            endwhile;
?>
        </table>
<?php 
    } else {
?>
        <!-- Mostrar un mensaje si no se encontraron resultados para la búsqueda -->
        <p>No se encontraron resultados para la búsqueda.</p>
<?php 
    }
}
?>

<!-- Formulario para buscar empleados por nombre o ID -->
<h2>Buscar por Nombre o ID</h2>
<form method="GET" action="buscar.php">
    <div class="form-group">
        <label for="search">Buscar por Nombre o ID:</label>
        <input type="text" id="search" name="search" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Buscar</button>
</form>

<?php 
// Incluir el archivo de pie de página (footer.php) que contiene el cierre de la estructura HTML
include 'includes/footer.php';
?>
