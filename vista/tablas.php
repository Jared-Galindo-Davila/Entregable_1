<?php include 'includes/header.php'; ?> <!-- Incluye el encabezado de la página -->

<!-- Incluye archivos de estilos -->
<link rel="stylesheet" href="estilo.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<table border="1"> <!-- Comienza la tabla -->
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Teléfono</th>
            <th>Cargo</th>
            <th>Género</th>
        </tr>
    </thead>
    <tbody>
        <?php
            include '../config/db.php'; // Incluye el archivo de configuración de la base de datos
            include '../modelo/empleado.php'; // Incluye el archivo del modelo Empleado
            
            $database = new Database(); // Crea una nueva instancia de Database para la conexión
            $db = $database->getConnection(); // Obtiene la conexión a la base de datos

            $empleado = new Empleado($db); // Crea una nueva instancia de Empleado
            $result = $empleado->obtenerTodos(); // Obtiene todos los registros de empleados

            if ($result->num_rows > 0) { // Si hay registros en el resultado
                while ($row = $result->fetch_assoc()) { // Itera sobre cada registro
                    // Imprime cada fila de la tabla con los datos del empleado
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['nombre']}</td>
                            <td>{$row['apellido']}</td>
                            <td>{$row['correo']}</td>
                            <td>{$row['telefono']}</td>
                            <td>{$row['cargo']}</td>
                            <td>{$row['genero']}</td>
                          </tr>";
                }
            } else {
                // Si no hay registros, muestra un mensaje en una sola celda de la tabla
                echo "<tr><td colspan='7'>No hay datos disponibles</td></tr>";
            }
        ?>
    </tbody>
</table>

<?php include 'includes/footer.php'; ?> <!-- Incluye el pie de página -->
