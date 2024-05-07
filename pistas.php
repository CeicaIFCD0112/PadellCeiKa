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
    <h2>Selecion de Pistas</h2>
    <div class="container">
        <?php

        foreach ($pistas as $key => $pista) {
            echo '<div class="pista">
            <img src="assets/img/'.$pista["foto"].'" alt="">
            <p>'.$pista["nombrepista"].'</p>
           <a href="reservapista.php?pista_id='.$pista["idpista"].'"><button>Ver pista</button></a>
        </div>';
        }
        ?>
    </div>
    


</body>

</html>