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
    $query = //"SELECT r.fecha_reserva, h.descripcion, u.username, p.nombrepista 
              //FROM reservas AS r
              //INNER JOIN horas AS h ON r.idhora = h.idhoras
              //INNER JOIN users AS u ON r.iduser = u.iduser
              //INNER JOIN pista AS p ON r.idpista = p.idpista
             // WHERE r.fecha_reserva >= NOW() AND r.iduser = :iduser";

             " SELECT R.idreserva,H.descripcion,R.fecha_reserva,Pi.nombrepista, count(*) as jugadores 
             from reservas R 
             inner join players P on R.idreserva= P.idreserva
             inner join horas H on H.idhoras=R.idhora
             inner join pista Pi on R.idpista=Pi.idpista
            group by P.idreserva,R.idreserva,H.descripcion,Pi.nombrepista, R.fecha_reserva having R.fecha_reserva >= now() and jugadores<4";
             

              

    // Preparar la declaración
    $statement = $conn->prepare($query);

    // Asociar el parámetro :iduser con el valor de $iduser
   // $statement->bindValue(':iduser', $iduser);

    // Ejecutar la consulta
    $statement->execute();

    // Obtener todas las filas de resultados como un array asociativo
    $partidas = $statement->fetchAll(PDO::FETCH_ASSOC);
    $tabla="";
    // Si hay partidas encontradas
    if ($partidas) {
        $tabla.= '<table border="1">';
        $tabla.= '<tr><th>Fecha</th><th>Hora</th><th>Participantes</th><th></th></tr>';
        // Iterar sobre cada partida y mostrar los detalles en filas de tabla
        foreach ($partidas as $reserva) {
            $tabla.= "<tr>";
            $tabla.= "<td>" . $reserva['fecha_reserva'] . "</td>";
            $tabla.= "<td>" . $reserva['descripcion'] . "</td>";
            $tabla.= "<td>" . $reserva['jugadores'] . "</td>";
            $tabla.= "<td><a href='partidasabiertas.php?idreserva=".$reserva['idreserva']."'>Apuntarme</a></td>";
            $tabla.= "</tr>";
        }
        $tabla.= '</table>';
    } else {
        $tabla.= "No se encontraron partidas para el usuario.";
    }
} catch (PDOException $e) {
    // En caso de error, mostrar el mensaje de error
    echo "Error al obtener las partidas: " . $e->getMessage();
}
?>

<div class="diagonal-gradient">
    <!-- Contenido de tu página -->
    <h1>Partidas Abiertas</h1>
    <?php  echo $tabla;?>
</div>

</body>
</html>


