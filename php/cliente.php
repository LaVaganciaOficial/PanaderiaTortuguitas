<?php
session_start();
if (!isset($_SESSION['usuario_id']) || $_SESSION['rol'] !== 'cliente') {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido Cliente</title>
</head>
<body>
    <h1>Hola, <?php echo $_SESSION['usuario_nombre']; ?> 👋</h1>
    <p>Bienvenido a la zona de clientes de la panadería.</p>
    <a href="logout.php">Cerrar sesión</a>
</body>
</html>