

<?php
if (isset($_POST["username"])) {
    try {
        require_once("conexion.php");
        $user = $_POST["username"];
        $password = $_POST["password"];
        $sql = "select * from users where username=? and password=?";
        $stm = $conn->prepare($sql);
        $stm->bindParam(1, $user);
        $stm->bindParam(2, $password);
       
        $stm->execute();

        if ($stm->rowCount() > 0) {

            $result = $stm->fetchAll(PDO::FETCH_ASSOC);
            $username = $result[0]["username"];
            $iduser = $result[0]["iduser"];
            session_start();
            $_SESSION["username"] = $username;
            $_SESSION["iduser"] = $iduser;
            header("Location: ./pistas_ric.php");
            exit();
        } else {
            $error = "Usuario o Contraseña incorrecto";
        }
    } catch (Exception $e) {
        $error = "Error interno " . $e->getMessage();
    }}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inicial</title>
    <link rel="stylesheet" href="assets\css\index.css">
</head>

<body>
    <div class="container contenedor-productos row">
        
            <div class="m5px">
                
                <a href="login.php" class="btn_primary">Log In</a>
            </div>
        
            
    <div id="top-content">
        <h1>¡NUNCA ES TEMPRANO PARA EMPEZAR!</h1>
    </div>
    <!-- Aquí va el resto del contenido de tu página -->


</body>

</html>