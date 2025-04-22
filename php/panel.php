<?php
session_start();
if (!isset($_SESSION['usuario_id']) || $_SESSION['rol'] !== 'empleado') {
    header("Location: login.php");
    exit;
}
require 'includes_db.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Control - Empleados</title>
    <link rel="stylesheet" href="../css/estilos.css">
    <style>
        .panel-container {
            background-color: var(--blanco);
            padding: 20px;
            border-radius: 12px;
            border: 2px solid var(--marron);
            width: 90%;
            max-width: 800px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        table, th, td {
            border: 1px solid var(--gris);
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: var(--marron);
            color: var(--blanco);
        }
    </style>
</head>
<body>
    <div class="panel-container">
        <h2>Bienvenido, <?php echo $_SESSION['usuario_nombre']; ?> 👨‍🍳</h2>
        <p>Este es tu panel de control de empleados/usuarios.</p>
        <h3>Usuarios registrados:</h3>
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Rol</th>
            </tr>
            <?php
            $resultado = $conn->query("SELECT id, nombre, correo, rol FROM usuarios");
            while ($fila = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$fila['id']}</td>";
                echo "<td>{$fila['nombre']}</td>";
                echo "<td>{$fila['correo']}</td>";
                echo "<td>{$fila['rol']}</td>";
                echo "</tr>";
            }
            ?>
        </table>
        <br>
        <a href="logout.php">Cerrar sesión</a>
    </div>
</body>
</html>