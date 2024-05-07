<?php
if (isset($_POST["username"])) {
    try {
        require_once("conexion.php");
        $user = $_POST["username"];
        $password = $_POST["password"];
        $sql = "select * from users where username=? and password=?";
        $stm = $conexion->prepare($sql);
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
            header("Location: ./pistas.php");
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
    <title>Document</title>
    <link rel="stylesheet" href="assets\css\login.css">
</head>

<body>
    <div class="container contenedor-productos row">
        <form action="login.php" method="post">
            <div class="modal-body">
                <h5 class="title_login">iniciar sesión</h5>
                <hr>
                <input class="form-control " type="text" name="username" id="email" placeholder="username" required>
                <input class="form-control" placeholder="Password" type="text" name="password" id="password" required>
            </div>
            <div class="m5px">
                <button type="submit" class="btn_primary">Login</button>
            </div>
        </form>
        <a href="register">
            <p>Create new account</p>
        </a>
    </div>


</body>

</html>