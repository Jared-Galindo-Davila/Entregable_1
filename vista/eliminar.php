<?php include 'includes/header.php'; ?>

<div class="content">
    <?php
    // Incluir archivos de configuración y la clase Empleado
    include '../config/db.php';
    include '../modelo/empleado.php';

    // Crear instancia de la clase Database para obtener la conexión
    $database = new Database();
    $db = $database->getConnection();

    // Crear instancia de la clase Empleado
    $empleado = new Empleado($db);

    // Obtener todos los registros de empleados
    $result = $empleado->obtenerTodos();    
    ?>

    <!-- Título de la sección -->
    <h2>Registros de Empleados</h2>

    <!-- Tabla para mostrar los registros de empleados -->
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Cargo</th>
                <th>Género</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <!-- Filas de la tabla -->
                <tr>
                    <!-- Celdas con datos de empleados -->
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['nombre'] ?></td>
                    <td><?= $row['apellido'] ?></td>
                    <td><?= $row['correo'] ?></td>
                    <td><?= $row['telefono'] ?></td>
                    <td><?= $row['cargo'] ?></td>
                    <td><?= $row['genero'] ?></td>
                    <!-- Formulario para eliminar empleados por ID -->
                    <td>
                        <form action="../controlador/eliminarcontroller.php" method="post">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <button type="submit" name="eliminar">Eliminar</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <!-- Sección para eliminar empleados por ID -->
    <h2>Eliminar Empleado por ID</h2>

    <form method="post" action="../controlador/eliminarcontroller.php">
        <label for="id">ID del Empleado a Eliminar:</label>
        <input type="text" id="id" name="id" required>
        <button type="submit" name="eliminar">Eliminar</button>
    </form>
</div>

<?php include 'includes/footer.php'; ?>
