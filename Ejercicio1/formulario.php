<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tabla de Multiplicar</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <h1>Generar Tabla de Multiplicar</h1>
    <form method="POST" action="">
        <label for="numero">Ingrese un número:</label>
        <input type="number" name="numero" id="numero" required>
        <button type="submit">Generar</button>
    </form>
    <hr>
    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['numero'])) {
            $numero = intval($_POST['numero']);
    ?>
    <h2>Tabla de Multiplicar del <?=$numero; ?></h2>
    <table>
    <?php
        for ($i = 1; $i <= 12; $i++) {
            echo "<tr><td>$numero x $i</td><td>" . ($numero * $i) . "</td></tr>";
        }
    ?>
    </table>
    <?php
    }
    ?>
</body>
</html>