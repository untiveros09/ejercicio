<?php
include_once 'conexion.php';

class Perfil {
    private $conn;
    
    public function __construct() {
        $this->conn = $GLOBALS['conn'];
    }

    public function obtenerPerfiles() {
        $sql = "SELECT * FROM perfiles";
        $result = $this->conn->query($sql);
        return $result;
    }
}
?>