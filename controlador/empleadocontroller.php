<?php
include '../config/db.php';
include '../modelo/Empleado.php';

class EmpleadoController {
    private $empleado;

    public function __construct($db) {
        $this->empleado = new Empleado($db);
    }

    // Función para buscar empleados por nombre
    public function buscarEmpleado($search) {
        if (is_numeric($search)) {
            return $this->empleado->buscarPorId($search);
        } else {
            return $this->empleado->buscar($search);
        }
    }

    // Función para editar un empleado
    public function editarEmpleado($id, $column, $value) {
        return $this->empleado->editar($id, $column, $value);
    }

    // Función para eliminar un empleado
    public function eliminarEmpleado($id) {
        return $this->empleado->eliminar($id);
    }

    // Función para obtener todos los empleados
    public function obtenerEmpleados() {
        return $this->empleado->obtenerTodos();
    }
}

$database = new Database();
$db = $database->getConnection();

$employeeController = new EmpleadoController($db);

$action = isset($_GET['action']) ? $_GET['action'] : '';
?>
