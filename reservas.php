<?php
$reserva_realizada = false;
$nombre = $apellido = $dni = $telefono = $correo = $fecha = $hora = $personas = $evento = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $dni = $_POST['dni'];
    $telefono = $_POST['telefono'];
    $correo = isset($_POST['correo']) ? $_POST['correo'] : 'No proporcionado'; 


    if (isset($_POST['reservar_mesa'])) {
        $fecha = $_POST['fecha'];
        $hora = $_POST['hora'];
        $personas = $_POST['personas'];
    } elseif (isset($_POST['reservar_evento'])) {
        $evento = $_POST['evento'];
        $fecha = $_POST['fecha_evento'];
        $hora = $_POST['hora_evento'];
        $personas = $_POST['personas_evento'];
    }
    $reserva_realizada = true;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panadería - Reservas</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Panadería - Reservas</h1>
    </header>

    <?php if (!$reserva_realizada): ?>
        <section id="formulario-reserva">
            <h2>Realiza tu Reserva</h2>
            
            <form action="reservas.php" method="POST">
             
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>

                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" name="apellido" required>

                <label for="dni">Número de DNI:</label>
                <input type="text" id="dni" name="dni" required>

                <label for="telefono">Número de Teléfono:</label>
                <input type="tel" id="telefono" name="telefono" required>

                <label for="correo">Correo Electrónico (opcional):</label>
                <input type="email" id="correo" name="correo">

                <label for="tipo_reserva">¿Qué deseas reservar?</label>
                <select id="tipo_reserva" name="tipo_reserva" required onchange="mostrarFormularioReserva()">
                    <option value="">Selecciona una opción</option>
                    <option value="mesa">Reserva de Mesa</option>
                    <option value="evento">Reserva de Evento</option>
                </select>

                <div id="reserva-mesa" style="display:none;">
                    <h3>Reserva de Mesa</h3>
                    <label for="fecha">Fecha de Reserva:</label>
                    <input type="date" id="fecha" name="fecha">

                    <label for="hora">Hora de Reserva:</label>
                    <input type="time" id="hora" name="hora">

                    <label for="personas">Número de personas:</label>
                    <input type="number" id="personas" name="personas">
                    
                    <button type="submit" name="reservar_mesa">Confirmar Reserva de Mesa</button>
                </div>
                <div id="reserva-evento" style="display:none;">
                    <h3>Reserva de Evento</h3>
                    <select id="tipo_evento" name="tipo_evento" required>
                    <option value="">Selecciona una opción</option>
                    <option value="mesa">elcafe</option>
                    <option value="evento">banda jazz</option>
                </select>

                    <label for="fecha_evento">Fecha del Evento:</label>
                    <input type="date" id="fecha_evento" name="fecha_evento">

                    <label for="hora_evento">Hora del Evento:</label>
                    <input type="time" id="hora_evento" name="hora_evento">

                    <label for="personas_evento">Número de personas:</label>
                    <input type="number" id="personas_evento" name="personas_evento">

                    <button type="submit" name="reservar_evento">Confirmar Reserva de Evento</button>
                </div>
            </form>
        </section>

    <?php else: ?>
        <section class="confirmacion">
            <h2>Confirmación de tu Reserva</h2>

            <p><strong>Nombre:</strong> <?php echo htmlspecialchars($nombre); ?></p>
            <p><strong>Apellido:</strong> <?php echo htmlspecialchars($apellido); ?></p>
            <p><strong>DNI:</strong> <?php echo htmlspecialchars($dni); ?></p>
            <p><strong>Teléfono:</strong> <?php echo htmlspecialchars($telefono); ?></p>
            <p><strong>Correo Electrónico:</strong> <?php echo htmlspecialchars($correo); ?></p>

            <?php if ($evento): ?>
                <p><strong>Nombre del Evento:</strong> <?php echo htmlspecialchars($evento); ?></p>
                <p><strong>Fecha del Evento:</strong> <?php echo htmlspecialchars($fecha); ?></p>
                <p><strong>Hora del Evento:</strong> <?php echo htmlspecialchars($hora); ?></p>
                <p><strong>Número de personas:</strong> <?php echo htmlspecialchars($personas); ?></p>
            <?php else: ?>
                <p><strong>Fecha de Reserva:</strong> <?php echo htmlspecialchars($fecha); ?></p>
                <p><strong>Hora de Reserva:</strong> <?php echo htmlspecialchars($hora); ?></p>
                <p><strong>Número de personas:</strong> <?php echo htmlspecialchars($personas); ?></p>
            <?php endif; ?>

            <p>¡Gracias por realizar tu reserva con nosotros!</p>
        </section>
    <?php endif; ?>
    <script>
        function mostrarFormularioReserva() {
            var tipoReserva = document.getElementById('tipo_reserva').value;
            if (tipoReserva === 'mesa') {
                document.getElementById('reserva-mesa').style.display = 'block';
                document.getElementById('reserva-evento').style.display = 'none';
            } else if (tipoReserva === 'evento') {
                document.getElementById('reserva-evento').style.display = 'block';
                document.getElementById('reserva-mesa').style.display = 'none';
            } else {
                document.getElementById('reserva-mesa').style.display = 'none';
                document.getElementById('reserva-evento').style.display = 'none';
            }
        }
    </script>

</body>
</html>
