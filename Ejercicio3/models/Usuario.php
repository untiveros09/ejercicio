<?php
include_once 'conexion.php';

class Usuario {
    private $conn;
    
    public function __construct() {
        $this->conn = $GLOBALS['conn'];
    }

    public function crearUsuario($nombre_usuario, $contrasena, $id_perfil) {
        $sql = "INSERT INTO usuarios (nombre_usuario, contraseña, id_perfil) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssi", $nombre_usuario, password_hash($contrasena, PASSWORD_DEFAULT), $id_perfil);
        $stmt->execute();
    }

    public function obtenerUsuarios() {
        $sql = "SELECT * FROM usuarios";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function actualizarUsuario($id_usuario, $nombre_usuario, $contrasena, $id_perfil) {
        $sql = "UPDATE usuarios SET nombre_usuario = ?, contraseña = ?, id_perfil = ? WHERE id_usuario = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssii", $nombre_usuario, password_hash($contrasena, PASSWORD_DEFAULT), $id_perfil, $id_usuario);
        $stmt->execute();
    }

    public function eliminarUsuario($id_usuario) {
        $sql = "DELETE FROM usuarios WHERE id_usuario = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id_usuario);
        $stmt->execute();
    }
}
?>