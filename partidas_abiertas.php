<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Partidas cerradas</title>
</head>
<body>

<?php
include 'conexion.php';
session_start();

// Obtener el ID del usuario logueado
if(isset($_SESSION["iduser"])){
    $iduser = $_SESSION["iduser"];
} else {
    // Si no hay sesión iniciada, establecer un valor predeterminado para fines de prueba
    $iduser = 1;
}

try {
    // Preparar la consulta SQL para obtener las partidas jugadas por el usuario logueado
    $query = "SELECT r.fecha_reserva, h.descripcion, u.username, p.nombrepista 
              FROM reservas AS r
              INNER JOIN horas AS h ON r.idhoras = h.idhoras
              INNER JOIN users AS u ON r.iduser = u.iduser
              INNER JOIN pista AS p ON r.idpista = p.idpista
              WHERE r.fecha_reserva >= NOW() AND r.iduser = :iduser";

    // Preparar la declaración
    $statement = $conn->prepare($query);

    // Asociar el parámetro :iduser con el valor de $iduser
    $statement->bindValue(':iduser', $iduser);

    // Ejecutar la consulta
    $statement->execute();

    // Obtener todas las filas de resultados como un array asociativo
    $partidas = $statement->fetchAll(PDO::FETCH_ASSOC);

    // Si hay partidas encontradas
    if ($partidas) {
        echo '<table border="1">';
        echo '<tr><th>Fecha</th><th>Hora</th><th>Participantes</th></tr>';
        // Iterar sobre cada partida y mostrar los detalles en filas de tabla
        foreach ($partidas as $reserva) {
            echo "<tr>";
            echo "<td>" . $reserva['fecha_reserva'] . "</td>";
            echo "<td>" . $reserva['descripcion'] . "</td>";
            // Otros detalles de la partida...
            echo "</tr>";
        }
        echo '</table>';
    } else {
        echo "No se encontraron partidas para el usuario.";
    }
} catch (PDOException $e) {
    // En caso de error, mostrar el mensaje de error
    echo "Error al obtener las partidas: " . $e->getMessage();
}
?>

<div class="diagonal-gradient">
    <!-- Contenido de tu página -->
    <h1>Partidas Abiertas</h1>
    <table border="1">
        <tr>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Jugadores</th>
        </tr>
        <!-- Aquí puedes agregar las filas de la tabla con los datos de las partidas abiertas -->
        <tr>
            <td>Fecha de la partida</td>
            <td>Hora de la partida</td>
            <td>Jugador 1, Jugador 2, Jugador 3, Jugador 4</td>
        </tr>
        <!-- Puedes repetir este patrón para cada partida abierta -->
    </table>
    <form action="procesar_reserva.php" method="post">
        <input type="hidden" name="pista_id" value="<?php echo $_GET['pista_id']; ?>">
        <input type="hidden" name="hora" value="<?php echo $_GET['hora']; ?>">
        <input type="hidden" name="fecha" value="<?php echo $_GET['fecha']; ?>">
        

        <button type="submit">Reservar</button>
    </form>
</div>

</body>
</html>


