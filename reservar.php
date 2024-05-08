<?php
session_start();

if(isset($_GET["idpista"]) && isset($_GET["fecha"]) && isset($_GET["idhora"]) && isset($_SESSION["username"])){
    include("conexion.php");
    $iduser=$_SESSION["iduser"];
    $idpista=$_GET["idpista"];
    $fecha=$_GET["fecha"];
    $idhora=$_GET["idhora"];

    $sql="insert into reservas (fecha_reserva,iduser,idhora,idpista) values (?,?,?,?)";
    $stm=$conn->prepare($sql);
    $stm->bindParam(1,$fecha);
    $stm->bindParam(2,$iduser);
    $stm->bindParam(3,$idhora);
    $stm->bindParam(4,$idpista);
    $stm->execute();
    if($stm->rowCount()>0){
        $mensaje="Pista reservada correctamente. Añada los jugadores";
        $idreserva=$conn->lastInsertId();
    }else{
        $mensaje="Error al reservar la pista";
    }
    
}else{
    header("Location: ./");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/addjugadores.css">
    <title>Partidas cerradas</title>
</head>
<body>
<div class="diagonal-gradient">

    <!-- Contenido de tu página -->
    <h1><?php echo $mensaje; ?></h1>
    <form action="procesar_reserva.php" method="post">
        <input type="hidden" name="idreserva" value="<?php echo $idreserva; ?>"> 
        <input type="text" name="jugador1" min="1" max="4" placeholder="Jugador 1" required ><br>
        <input type="text" name="jugador2" min="1" max="4" placeholder="Jugador 2" ><br>
        <input type="text" name="jugador3" min="1" max="4" placeholder="Jugador 3" ><br>
        <input type="text" name="jugador4" min="1" max="4" placeholder="Jugador 4" ><br>

        <button type="submit">Reservar</button>
    </form>
    </div>
</body>
</html>