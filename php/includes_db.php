<?php
$host = "localhost";
$usuario = "root";
$contrasena = ""; // o tu contraseña si la tienes
$bd = "panaderia";
$conn = new mysqli($host, $usuario, $contrasena, $bd);
if ($conn->connect_error) {
    die("❌ Error de conexión: " . $conn->connect_error);
}
?>