<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partidas abiertas</title>
</head>
<body>
    <h1>Partidas Abiertas</h1>
    <form action="procesar_reserva.php" method="post">
        <input type="hidden" name="pista_id" value="<?php echo $_GET['pista_id']; ?>">
        <input type="hidden" name="hora" value="<?php echo $_GET['hora']; ?>">
        <input type="hidden" name="fecha" value="<?php echo $_GET['fecha']; ?>">
        
        Jugador1: <input type="number" name="jugador" min="1" max="4" required><br>
        Jugador2: <input type="number" name="jugador" min="1" max="4" required><br>
        Jugador3: <input type="number" name="jugador" min="1" max="4" required><br>
        Jugador4: <input type="number" name="jugador" min="1" max="4" required><br>

        <button type="submit">Reservar</button>
    </form>
</body>
</html>
