<?php
include("conexion.php");
$sql = "SELECT * FROM padelceika.pista";
$stm = $conexion->prepare($sql);
$stm->execute();
$pistas = $stm->fetchAll(PDO::FETCH_ASSOC);

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pistas</title>
    <link rel="stylesheet" href="assets\css\pistas.css">
</head>

<body>
    <div>
        <?php

        foreach ($pistas as $key => $pista) {
            echo '<div>
            <img src="assets/img/'.$pista["foto"].'" alt="">
            <p>'.$pista["nombrepista"].'</p>
           <a href="reservapista.php?pista_id=2"><button>Ver pista</button></a>
        </div>';
        }
        ?>
    </div>
    <div>
        <img src="assets/img/fondo.png" alt="">
        <p>Nombre pista</p>
        <a href="reservapista.php?pista_id=2"><button>Ver pista</button></a>
    </div>


</body>

</html>