<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <!-- Formulario para crear un nuevo usuario -->
    <div class="card">
        <div class="card-header">
            <h3>Crear Nuevo Usuario</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="usuario_controller.php?action=crear">
                <div class="mb-3">
                    <label for="nombre_usuario" class="form-label">Nombre de Usuario</label>
                    <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" required>
                </div>
                <div class="mb-3">
                    <label for="contrasena" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="contrasena" name="contrasena" required>
                </div>
                <div class="mb-3">
                    <label for="id_perfil" class="form-label">Seleccionar Perfil</label>
                    <select class="form-control" id="id_perfil" name="id_perfil" required>
                        <?php
                        include_once 'models/Perfil.php';
                        $perfil = new Perfil();
                        $perfiles = $perfil->obtenerPerfiles();
                        while ($row = $perfiles->fetch_assoc()) {
                            echo "<option value='" . $row['id_perfil'] . "'>" . $row['nombre_perfil'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-custom">Crear Usuario</button>
            </form>
        </div>
    </div>

    <!-- Lista de Usuarios -->
    <div class="card mt-4">
        <div class="card-header">
            <h3>Lista de Usuarios</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre de Usuario</th>
                        <th>Perfil</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include_once 'controllers/UsuarioController.php';
                    $controller = new UsuarioController();
                    $usuarios = $controller->listar();
                    while ($row = $usuarios->fetch_assoc()) {
                        // Obtener nombre de perfil
                        $perfil = new Perfil();
                        $perfil_data = $perfil->obtenerPerfiles($row['id_perfil'])->fetch_assoc();
                    ?>
                    <tr>
                        <td><?php echo $row['id_usuario']; ?></td>
                        <td><?php echo $row['nombre_usuario']; ?></td>
                        <td><?php echo $perfil_data['nombre_perfil']; ?></td>
                        <td>
                            <a href='usuario_controller.php?action=eliminar&id_usuario=<?php echo $row['id_usuario']; ?>' class="btn btn-danger btn-sm">Eliminar</a>
                            <a href='editar_usuario.php?id_usuario=<?php echo $row['id_usuario']; ?>' class="btn btn-warning btn-sm">Editar</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>