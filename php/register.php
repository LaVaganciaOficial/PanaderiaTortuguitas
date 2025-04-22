<!-- register.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro - Panadería</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    <div class="form-container">
        <h2>Registro</h2>
        <form action="procesar_registro.php" method="POST">
            <input type="text" name="nombre" placeholder="Nombre completo" required>
            <input type="email" name="correo" placeholder="Correo electrónico" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <label for="rol">¿Eres empleado?</label>
            <select name="rol" id="rol" onchange="mostrarCodigo(this.value)">
                <option value="cliente">No</option>
                <option value="empleado">Sí</option>
            </select>
            <div id="codigo-empleado" style="display: none;">
                <input type="text" name="codigo_empleado" placeholder="Código de empleado">
            </div>
            <button type="submit">Registrarse</button>
            <p>¿Ya tienes cuenta? <a href="login.php">Inicia sesión</a></p>
        </form>
    </div>
    <script>
        function mostrarCodigo(valor) {
            const campo = document.getElementById("codigo-empleado");
            campo.style.display = valor === "empleado" ? "block" : "none";
        }
    </script>
</body>
</html>