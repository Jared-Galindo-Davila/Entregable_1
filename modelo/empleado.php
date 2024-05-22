<?php
// Definición de la clase Empleado
class Empleado {
    private $conn; // Objeto de conexión a la base de datos
    private $table_name = "empleados"; // Nombre de la tabla en la base de datos

    // Propiedades públicas que representan los campos de un empleado
    public $id;
    public $nombre;
    public $apellido;
    public $correo;
    public $telefono;
    public $cargo;
    public $genero;

    // Constructor que recibe la conexión a la base de datos
    public function __construct($db) {
        $this->conn = $db;
    }

    // Función para buscar empleados por nombre
    public function buscar($nombre) {
        $query = "SELECT * FROM empleados WHERE nombre LIKE ?";
        $stmt = $this->conn->prepare($query);

        $nombre = '%' . htmlspecialchars(strip_tags($nombre)) . '%'; // Escapar y formatear el nombre
        $stmt->bind_param('s', $nombre); // Bind del parámetro

        $stmt->execute(); // Ejecutar la consulta

        return $stmt->get_result(); // Devolver el resultado de la consulta
    }

    // Función para buscar empleados por ID
    public function buscarPorId($id) {
        $query = "SELECT * FROM empleados WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        $id = htmlspecialchars(strip_tags($id)); // Escapar y formatear el ID
        $stmt->bind_param('i', $id); // Bind del parámetro

        $stmt->execute(); // Ejecutar la consulta

        return $stmt->get_result(); // Devolver el resultado de la consulta
    }

    // Función para crear un nuevo empleado
    public function crear() {
        $query = "INSERT INTO " . $this->table_name . " (nombre, apellido, correo, telefono, cargo, genero) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ssssss', $this->nombre, $this->apellido, $this->correo, $this->telefono, $this->cargo, $this->genero);
        return $stmt->execute(); // Ejecutar la inserción y devolver el resultado
    }

    // Función para editar un empleado
    public function editar($id, $column, $value) {
        $allowedColumns = array('nombre', 'apellido', 'correo', 'telefono', 'cargo', 'genero');
        if (!in_array($column, $allowedColumns)) {
            return false; // Verificar si la columna a editar es válida
        }
    
        $query = "UPDATE " . $this->table_name . " SET " . $column . " = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
    
        $stmt->bind_param('si', $value, $id); // Bind de los parámetros
        $result = $stmt->execute(); // Ejecutar la actualización
    
        if ($result) {
            return $value; // Devolver el nuevo valor si la actualización fue exitosa
        } else {
            return false; // Devolver false si hubo un error en la actualización
        }
    }
    
    // Función para eliminar un empleado
    public function eliminar($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $id); // Bind del parámetro

        if ($stmt->execute()) {
            return true; // Devolver true si la eliminación fue exitosa
        } else {
            return false; // Devolver false si hubo un error en la eliminación
        }
    }

    // Función para obtener todos los empleados
    public function obtenerTodos() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->query($query); // Ejecutar la consulta
        return $stmt; // Devolver el resultado de la consulta
    }
}
?>
