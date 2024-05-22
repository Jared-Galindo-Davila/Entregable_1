<?php 
// Incluir el archivo de encabezado (header.php) que contiene la estructura de la página HTML
include 'includes/header.php'; 
?>

<!-- Encabezado del formulario -->
<h2>Formulario de Empleados</h2>
<!-- Formulario para agregar empleados -->
<form method="POST" action="../controlador/emplecontroller.php?action=crear">
    <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="correo">Correo:</label>
        <input type="email" id="correo" name="correo" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="cargo">Cargo:</label>
        <!-- Selección del cargo -->
        <select id="cargo" name="cargo" class="form-control" required>
            <option value="" disabled selected>Selecciona un cargo</option>
            <option value="Gerente">Gerente</option>
            <option value="Analista">Analista</option>
            <option value="Desarrollador">Desarrollador</option>
            <option value="Diseñador">Diseñador</option>
        </select>
    </div>

    <div class="form-group">
        <label for="genero">Género:</label>
        <!-- Selección del género -->
        <select id="genero" name="genero" class="form-control" required>
            <option value="" disabled selected>Selecciona el género</option>
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
        </select>
    </div>

    <!-- Botón para guardar el formulario -->
    <button type="submit" class="btn btn-primary" name="guardar">Guardar</button>
</form>

<?php 
// Incluir el archivo de pie de página (footer.php) que contiene el cierre de la estructura HTML
include 'includes/footer.php'; 
?>
