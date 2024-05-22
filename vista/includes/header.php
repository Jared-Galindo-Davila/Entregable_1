<!-- header.php -->

<!DOCTYPE html> <!-- Declaración del tipo de documento como HTML5 -->
<html lang="es"> <!-- Inicio del elemento html con el atributo de idioma establecido en español -->
<head>
    <meta charset="UTF-8"> <!-- Especificación de la codificación de caracteres -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Configuración de la vista adaptable para dispositivos móviles -->
    <title>Proyecto MVC</title> <!-- Título de la página -->
    <link rel="stylesheet" href="/vista/estilo.css"> <!-- Enlace a la hoja de estilos local -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> <!-- Enlace a la hoja de estilos de Bootstrap -->
</head>
<body>
    <header> <!-- Inicio del encabezado de la página -->
        <h1>Proyecto MVC</h1> <!-- Título principal de la página -->
        <nav> <!-- Inicio de la barra de navegación -->
            <ul> <!-- Lista no ordenada de elementos de navegación -->
                <li><a href="/vista/index.php">Inicio</a></li> <!-- Elemento de navegación para la página de inicio -->
                <li class="dropdown"> <!-- Elemento de navegación desplegable -->
                    <a href="">Gestiones</a> <!-- Texto del enlace principal -->
                    <ul class="dropdown-content"> <!-- Lista desplegable de gestiones -->
                        <li><a href="/vista/buscar.php">Buscar</a></li> <!-- Enlace a la página de búsqueda -->
                        <li><a href="/vista/crear.php">Formularios</a></li> <!-- Enlace a la página de formularios -->
                        <li><a href="/vista/tablas.php">Tablas</a></li> <!-- Enlace a la página de tablas -->
                    </ul>
                </li>
                <li class="dropdown"> <!-- Elemento de navegación desplegable -->
                    <a href="">Modificaciones</a> <!-- Texto del enlace principal -->
                    <ul class="dropdown-content"> <!-- Lista desplegable de modificaciones -->
                        <li><a href="/vista/editar.php">Editar</a></li> <!-- Enlace a la página de edición -->
                        <li><a href="/vista/eliminar.php">Eliminar</a></li> <!-- Enlace a la página de eliminación -->
                    </ul>
                </li>
            </ul>
        </nav> <!-- Fin de la barra de navegación -->
    </header> <!-- Fin del encabezado de la página -->
    <main> <!-- Inicio del contenido principal de la página -->
    