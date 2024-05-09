<?php
session_start();
include("conexion.php");
if (isset($_SESSION["username"])) {
    $iduser = $_SESSION["iduser"];
    $username = $_SESSION["username"];
    if (isset($_POST["idreserva"])) {

       
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Partidas abiertas</title>
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
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="logout">Logout</a></li>
                            </ul>
                        </li>

                    </ul>

                </div>
            </div>
        </nav>



        <!-- Contenido de tu página -->
        <h1>Partidas Abiertas</h1>
        <form action="" method="post">
            <input type="hidden" name="idreserva" value="<?php echo $idreserva; ?>">

            <?php
            for ($i = $jugadores + 1; $i <= 4; $i++) {
                echo    '<input type="text" name="jugador' . $i . '" placeholder="Jugador' . $i . '">';
            }
            ?>

            <button type="submit">Reservar</button>

        </form>
    </div>
</body>

</html>