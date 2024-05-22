<?php
// Definición de la clase Database
class Database {
    // Propiedades privadas para la información de la base de datos
    private $servername = "localhost"; // Nombre del servidor
    private $username = "root"; // Nombre de usuario de la base de datos
    private $password = ""; // Contraseña de la base de datos
    private $dbname = "ProyectoMVC"; // Nombre de la base de datos
    public $conn; // Objeto de conexión

    // Método para obtener la conexión a la base de datos
    public function getConnection() {
        $this->conn = null; // Inicializa la conexión como nula

        try {
            // Intenta crear una nueva conexión MySQLi
            $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
            // Verifica si hay errores de conexión
            if ($this->conn->connect_error) {
                // Lanza una excepción si la conexión falla
                throw new Exception("Connection failed: " . $this->conn->connect_error);
            }
        } catch (Exception $e) {
            // Captura cualquier excepción y muestra un mensaje de error
            die("Connection error: " . $e->getMessage());
        }

        // Devuelve el objeto de conexión
        return $this->conn;
    }
}
?>
