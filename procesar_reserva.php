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
    <title>Padel</title>
</head>
<body>
    <p>Reserva completada ..</p><a href="./bulto">Volver</a>
</body>
</html>
