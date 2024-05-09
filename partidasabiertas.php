

<?php
include 'conexion.php';
session_start();

// Obtener el ID del usuario logueado
if(isset($_SESSION["iduser"])){
    $username=$_SESSION["username"];
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
            group by P.idreserva,R.idreserva,H.descripcion,Pi.nombrepista, R.fecha_reserva having R.fecha_reserva >= current_date() and jugadores<4";
             

              

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
            $tabla.= "<td><a href='addjugadorespartida.php?idreserva=".$reserva['idreserva']."'>Apuntarme</a></td>";
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
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Partidas cerradas</title>
</head>
<body>
<div class="diagonal-gradient">
<nav class="navbar navbar-expand-lg navbar-light bg-light" id="navi">
  <div class="container-fluid">
    <a class="navbar-brand" href="index">Padel Xtreme</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="pistas">Reservar Pista</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="partidasabiertas">Partidas abiertas</a>
        </li>
        <li class="nav-item dropdown ms-auto" style="margin-left: auto;">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo $username; ?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
            <li><a class="dropdown-item" href="mispartidasX">Partidas Jugadas</a></li>
            <li><a class="dropdown-item" href="mispartidasA">Partidas pendientes</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="logout">Logout</a></li>
          </ul>
        </li>
        
      </ul>
     
    </div>
  </div>
</nav>
    <!-- Contenido de tu página -->
    <h1>Partidas Abiertas</h1>
    <?php  echo $tabla;?>
</div>

</body>
</html>