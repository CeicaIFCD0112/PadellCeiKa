
<?php include("header.php"); ?>

<?php
if (isset($_POST["username"])) {
    include("conexion.php");

    $username = $_POST["username"];
    $password = $_POST["password"];

    // Procesar la imagen
    $foto = $_FILES["file"]["name"];
    $target_dir = "assets/img/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $fotoFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $uploadOk = 1;
    $fotoFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


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
    //if (file_exists($target_file)) {
       // echo "Sorry, file already exists.";
        //$uploadOk = 0;    }

    // Verificar el tamaño de la imagen
    if ($_FILES["file"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Permitir ciertos formatos de archivo
    if (
        $fotoFileType != "jpg" && $fotoFileType != "png" && $fotoFileType != "jpeg"
        && $fotoFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Verificar si $uploadOk está configurado en 0 por un error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            

                $sql = "insert into users (username, password, foto) VALUES (?, ?, ?)";
                $stm = $conn->prepare($sql);
                $stm->bindParam(1, $username);
                $stm->bindParam(2, $password);
                $stm->bindParam(3, $foto);
                $stm->execute();

                if ($stm->rowCount() > 0) {
                    $msg = "Usuario creado correctamente";
                    header("Location: register.php");
                    exit(); 
                } else {
                    $msg = "Error al crear el Usuario";
                }
           
            
        
            }
    }
}
?>


<div class="container ">
    <form class="form " action="" method="post" enctype="multipart/form-data">
        <input class="form-control" type="text" name="username" id="" placeholder="username">
  
        <input class="form-control" type="password" name="password" placeholder="password">
        <input class="form-control" type="file" name="file" id="" required>
        <button class="btn btn-success btn-large" type="submit">New user</button>
    </form>
    <?php
    if (isset($msg)) {
        echo "<p>" . $msg . "</p>";
    }
    ?>
</div>

