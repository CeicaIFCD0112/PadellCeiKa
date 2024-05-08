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
              INNER JOIN horas AS h ON r.idhora = h.idhoras
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
        echo '<tr><th>Usuario</th><th>Fecha</th><th>Hora</th><th>Pista</th></tr>';
        // Iterar sobre cada partida y mostrar los detalles en filas de tabla
        foreach ($partidas as $reserva) {
            echo "<tr>";
            echo "<td>" . $reserva['username'] . "</td>";
            echo "<td>" . $reserva['fecha_reserva'] . "</td>";
            echo "<td>" . $reserva['descripcion'] . "</td>";
            echo "<td>" . $reserva['nombrepista'] ."</td>";
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
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Mis partidas pendientes</title>
 
</head>
<body>