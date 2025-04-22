<?php
require 'includes_db.php';
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
$rol = $_POST['rol'];
$codigo_correcto = "EMP2025PAN";
if ($rol === "empleado") {
    if (!isset($_POST['codigo_empleado']) || $_POST['codigo_empleado'] !== $codigo_correcto) {
        echo "
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Document</title>
        </head>
        <body bgbolor='grey'>
            <center><h1>❌ Código de empleado incorrecto.</h1></center>
            <center><h2>El código ingresado es incorrecto y no corresponde a un código válido de nuestro establecimiento</h2></center>
            <center><h2>Para volver presione aquí --><a href='register.php'>Volver</a></h2></center>
        </body>
        </html>
        ";
        exit;
    }
}
$stmt = $conn->prepare("INSERT INTO usuarios (nombre, correo, password, rol) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $nombre, $correo, $password, $rol);
if ($stmt->execute()) {
    echo "✅ Registro exitoso. <a href='login.php'>Inicia sesión</a>";
} else {
    echo "❌ Error al registrar: " . $conn->error;
}
$stmt->close();
$conn->close();
?>