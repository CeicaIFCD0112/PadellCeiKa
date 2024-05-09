<?php
include("conexion.php");
$sql = "SELECT * FROM padelceika.news";
$stm = $conexion->prepare($sql);
$stm->execute();
$news = $stm->fetchAll(PDO::FETCH_ASSOC);

?>




<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Distribución Alternada</title>
    <link rel="stylesheet" href="assets\css\bulto.css">
</head>

<body>

    <div class="content-container">
        <?php
        // Aquí suponemos que los datos provienen de una base de datos y se almacenan en un arreglo
        // Por ejemplo, puedes reemplazar esto con una consulta de base de datos
      

        // Iterar a través de los datos
        foreach ($news as $index => $item) {
            // Alternar las posiciones según el índice (par o impar)
            if ($index % 2 == 0) {
                // Índice par: texto a la izquierda, imagen a la derecha
                echo '<div class="text"><h3>' . ($item['news_title']) . '</h3></div>';
                echo '<div class="content-block">';
                echo '<div class="image"><img src="assets/img/' . ($item['news_pic']) . '" alt="Descripción de la imagen"></div>';

                echo '<div class="text"><p>' . ($item['news_descr']) . '</p></div>';
                echo '</div>';
            } else {
                // Índice impar: imagen a la izquierda, texto a la derecha
                echo '<div class="text"><h3>' . ($item['news_title']) . '</h3></div>';
                echo '<div class="content-block alternate">';
                echo '<div class="image"><img src="assets/img/' . ($item['news_pic']) . '" alt="Descripción de la imagen"></div>';
                echo '<div class="text"><p>' . ($item['news_descr']) . '</p></div>';
                echo '</div>';
            }
        }
        ?>
    </div>

</body>

</html>