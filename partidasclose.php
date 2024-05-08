<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Partidas cerradas</title>
</head>
<body>
<div class="diagonal-gradient">
    <!-- Contenido de tu página -->
    <h1>Partidas Abiertas</h1>
    <form action="procesar_reserva.php" method="post">
       
        
        <input type="text" name="jugador" min="1" max="4" placeholder="Jugador 1" ><br>
        <input type="text" name="jugador" min="1" max="4" placeholder="Jugador 2" ><br>
        <input type="text" name="jugador" min="1" max="4" placeholder="Jugador 3" ><br>
        <input type="text" name="jugador" min="1" max="4" placeholder="Jugador 4" ><br>

        <button type="submit">Reservar</button>
    </form>
    </div>
</body>
</html>