<?php
include("conexion.php");
session_start();
if (isset($_SESSION["username"])) {
    $user = $_SESSION["username"];
    $iduser = $_SESSION["iduser"];
}

?>




<?php
include("header2.php")
?>
<body>
    <nav>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button"
             id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo $user; ?>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="mispartidasX.php"> Partidas Jugadas</a></li>
                <li><a class="dropdown-item" href="mispartidasA.php">Partidas Pendientes </a></li>
            </ul>
        </div>


    </nav>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
    crossorigin="anonymous"></script>
<?php
include("footer.php");
?>