<?php
include("header2.php")
?>
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
    <?php include("footer.php"); ?> <!-- Incluye footer.php al final del cuerpo -->
</body>

</html>
