<?php
if (isset($_POST["username"])) {
    include("conexion.php");

    $username = $_POST["username"];
    $password = $_POST["password"];

    // Procesar la imagen
    $foto = $_FILES["foto"]["name"];
    $target_dir = "assets/img/";
    $target_file = $target_dir . basename($_FILES["foto"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $uploadOk = 1;

    // Verificar si la imagen es real o falsa
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["file"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an foto - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an foto.";
            $uploadOk = 0;
        }
    }

    // Verificar si el archivo ya existe
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Verificar el tamaño de la imagen
    if ($_FILES["foto"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Permitir ciertos formatos de archivo
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Verificar si $uploadOk está configurado en 0 por un error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
            try {
                $conn = new PDO("mysql:host=$host;dbname=$nombre_bd;charset=utf8", $usuario_bd, $contrasena_bd);
    

                $sql = "INSERT INTO users (username, password, foto) VALUES (?, ?, ?)";
                $stm = $conn->prepare($sql);
                $stm->bindParam(1, $username);
                $stm->bindParam(2, $password);
                $stm->bindParam(3, $target_foto);
                $stm->execute();

                if ($stm->rowCount() > 0) {
                    $msg = "Usuario creado correctamente";
                } else {
                    $msg = "Error al crear el Usuario";
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            $conn = null;
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>


<div class="container row container-register">
    <form class="form register col-md-8 col-sm-12" action="" method="post" enctype="multipart/form-data">
        <input class="form-control" type="text" name="username" id="" placeholder="username">
     
        <input class="form-control" type="password" name="password" placeholder="password">
        <input class="form-control" type="file" name="foto" id="">
        <button class="btn btn-success btn-large" type="submit">New user</button>
    </form>
    <?php
    if (isset($msg)) {
        echo "<p>" . $msg . "</p>";
    }
    ?>
</div>

