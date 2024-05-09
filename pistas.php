<?php
session_start();
include("conexion.php");
$sql = "SELECT * FROM padelceika.pista";
$stm = $conn->prepare($sql);
$stm->execute();
$pistas = $stm->fetchAll(PDO::FETCH_ASSOC);
if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
} else {
    header("Location: ./");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pistas</title>
    <link rel="stylesheet" href="assets\css\pistas.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Padel Xtream</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="reservapista.php">Reservar Pista</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="partidasabiertas.php">Partidas abiertas</a>
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
    <h2>Selección de Pistas</h2>
    
        <div class="row">
            <?php

            foreach ($pistas as $key => $pista) {
                echo '<div class="card col-md-4 col-sm-12">
                <img src="assets/img/' . $pista["foto"] . '" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">' . $pista["nombrepista"] . '</h5>
                  <a href="reservapista.php?pista_id=' . $pista["idpista"] . '">Ver pista</a>
              
                </div>
              </div>';
            }
            ?>
        </div>
        

  



</body>

</html>