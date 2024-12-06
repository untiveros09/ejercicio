<?php
include_once 'models/Usuario.php';

class UsuarioController {
    public function crear() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre_usuario = $_POST['nombre_usuario'];
            $contrasena = $_POST['contrasena'];
            $id_perfil = $_POST['id_perfil'];

            $usuario = new Usuario();
            $usuario->crearUsuario($nombre_usuario, $contrasena, $id_perfil);
            header("Location: index.php");  // Redirigir después de crear
        }
    }

    public function listar() {
        $usuario = new Usuario();
        return $usuario->obtenerUsuarios();
    }

    public function eliminar($id_usuario) {
        $usuario = new Usuario();
        $usuario->eliminarUsuario($id_usuario);
        header("Location: index.php");
    }

    public function actualizar() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id_usuario = $_POST['id_usuario'];
            $nombre_usuario = $_POST['nombre_usuario'];
            $contrasena = $_POST['contrasena'];
            $id_perfil = $_POST['id_perfil'];

            $usuario = new Usuario();
            $usuario->actualizarUsuario($id_usuario, $nombre_usuario, $contrasena, $id_perfil);
            header("Location: index.php");
        }
    }
}
?>