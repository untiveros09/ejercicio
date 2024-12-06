<?php
include_once 'conexion.php';

class Permiso {
    private $conn;
    
    public function __construct() {
        $this->conn = $GLOBALS['conn'];
    }

    public function obtenerPermisos() {
        $sql = "SELECT * FROM permisos";
        $result = $this->conn->query($sql);
        return $result;
    }
}
?>