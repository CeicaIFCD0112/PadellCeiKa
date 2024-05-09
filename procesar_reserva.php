<?php
session_start();

if (isset($_SESSION["iduser"]) && isset($_POST["idreserva"]) && isset($_POST["jugador1"])) {
    include("conexion.php");
    $iduser = $_SESSION["iduser"];
    $idreserva = $_POST["idreserva"];
    $jugador1 = $_POST["jugador1"];
    //Guardo el jugador 1
    $sql = "insert into players (iduser,idreserva,nombre_jugador) values (?,?,?)";
    $stm = $conn->prepare($sql);
    $stm->bindParam(1, $iduser);
    $stm->bindParam(2, $idreserva);
    $stm->bindParam(3, $jugador1);
    $stm->execute();
    $i = 2;
    do {
        $jugador = "jugador" . $i;
        if (isset($_POST[$jugador])) {
            if ($_POST[$jugador] != "") {
                $nombre = $_POST[$jugador];
                $sql = "insert into players (iduser,idreserva,nombre_jugador) values (?,?,?)";
                $stm = $conn->prepare($sql);
                $stm->bindParam(1, $iduser);
                $stm->bindParam(2, $idreserva);
                $stm->bindParam(3, $nombre);
                $stm->execute();
            }
        }
        $i++;
    } while ($i <= 4);
} else {
    header("Location: ./");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="assets/css/procesar.css">
    <title>Padel</title>
</head>
<body>
    <div class="container">
    <p>Reserva completada ..</p>
    <br>
    <br>
    <button class="button" onclick="window.location.href='./bulto'">Volver</button>
    </div>
</body>
</html>
