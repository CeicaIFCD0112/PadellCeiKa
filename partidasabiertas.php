<?php
session_start();

if(isset($_POST["idreserva"])){
    include("conexion.php");
    $iduser = $_SESSION["iduser"];
    $idreserva = $_POST["idreserva"];
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
    header("Location: ./pistas");
}

//if(isset($_GET["idreserva"]) && isset($_SESSION["iduser"])){
if (isset($_GET["idreserva"])) {
    include("conexion.php");
    $idreserva = $_GET["idreserva"];
    $sql = "select count(*) as jugadores from players where idreserva=? group by idreserva";
    $stm = $conn->prepare($sql);
    $stm->bindParam(1, $idreserva);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    $jugadores = $result[0]["jugadores"];
} else {
    header("Location: ./");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Partidas abiertas</title>
</head>

<body>
    <div class="diagonal-gradient">
        <!-- Contenido de tu página -->
        <h1>Partidas Abiertas</h1>
        <form action="" method="post">
            <input type="hidden" name="idreserva" value="<?php echo $idreserva; ?>">

            <?php
            for ($i = $jugadores + 1; $i <= 4; $i++) {
                echo    '<input type="text" name="jugador' . $i . ' " placeholder="Jugador' . $i . '">';
            }
            ?>

            <button type="submit">Reservar</button>

        </form>
    </div>
</body>

</html>