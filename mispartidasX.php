<?php
// Incluir el archivo de conexión a la base de datos
include 'conexion.php';

// Obtener el nombre de usuario del usuario logueado (esto podría variar dependiendo de cómo estés manejando la autenticación de usuarios)
$nombre_usuario = "nombre_de_usuario"; // Reemplaza esto con el nombre de usuario del usuario logueado

try {
    // Preparar la consulta SQL para obtener las partidas jugadas por el usuario logueado
    $query = "SELECT * FROM partidas WHERE usuario = :usuario";

    // Preparar la declaración
    $statement = $conexion->prepare($query);

    // Asociar el parámetro :usuario con el valor de $nombre_usuario
    $statement->bindParam(':usuario', $nombre_usuario, PDO::PARAM_STR);

    // Ejecutar la consulta
    $statement->execute();

    // Obtener todas las filas de resultados como un array asociativo
    $partidas = $statement->fetchAll(PDO::FETCH_ASSOC);

    // Si hay partidas encontradas
    if ($partidas) {
        echo '<table border="1">';
        echo '<tr><th>ID de Partida</th><th>Fecha</th><th>Hora</th></tr>';
        // Iterar sobre cada partida y mostrar los detalles en filas de tabla
        foreach ($partidas as $partida) {
            echo "<tr>";
            echo "<td>" . $partida['id'] . "</td>";
            echo "<td>" . $partida['fecha'] . "</td>";
            echo "<td>" . $partida['hora'] . "</td>";
            // Otros detalles de la partida...
            echo "</tr>";
        }
        echo '</table>';
    } else {
        echo "No se encontraron partidas para el usuario: " . $nombre_usuario;
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
    <title>Mis partidas jugadas</title>
 
</head>
<body>