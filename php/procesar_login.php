<?php
session_start();
require 'includes_db.php';
$correo = $_POST['correo'];
$password = $_POST['password'];
$stmt = $conn->prepare("SELECT * FROM usuarios WHERE correo = ?");
$stmt->bind_param("s", $correo);
$stmt->execute();
$resultado = $stmt->get_result();
if ($resultado->num_rows === 1) {
    $usuario = $resultado->fetch_assoc();
    if (password_verify($password, $usuario['password'])) {
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['usuario_nombre'] = $usuario['nombre'];
        $_SESSION['rol'] = $usuario['rol'];
        if ($usuario['rol'] === 'empleado') {
            header("Location: panel.php");
        } else {
            header("Location: landingpage.php");
        }
        exit;
    } else {
        echo "❌ Contraseña incorrecta. <a href='login.php'>Volver</a>";
    }
} else {
    echo "❌ Usuario no encontrado. <a href='login.php'>Volver</a>";
}
$stmt->close();
$conn->close();
?>