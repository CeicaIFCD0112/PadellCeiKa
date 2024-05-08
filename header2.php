<?php
include("conexion.php");
session_start();
if (isset($_SESSION["username"])) {
    $user = $_SESSION["username"];
    $iduser = $_SESSION["iduser"];
}

?>








<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/header.css">
    <title>home</title>
 
</head>
<body>
<header>
    <div class="container">
        <div class="logo">
            <img src="logo.jpeg" alt="Logo de la Compañía">
        </div>
        <div class="company-name">
            Padel Xtreme
        </div>
        <div class="user-actions">
            <!-- Mostrar imagen de perfil y botón de nombre de usuario -->
            <div class="user-info">
                <img src="ruta/a/tu/foto_de_perfil.jpg" alt="Foto de perfil">
                <button class="user-button"><?php echo $nombreUsuario; ?></button>
                <div class="accordion" id="accordionExample">
                <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
        <a href="index.php"> <!-- Aquí estableces la URL de la página PHP -->
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
               Editar Perfil
            </button>
        </a>
    </h2>
</div>

  <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
        <a href="mispartidasX.php"> <!-- Aquí estableces la URL de la página PHP -->
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Partidas Jugadas
            </button>
        </a>
    </h2>
</div>

  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
        <a href="mispartidasA.php"> <!-- Aquí estableces la URL de la página PHP -->
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Partidas Pendientes
            </button>
        </a>
    </h2>
</div>

  </div>
</div>
            </div>
            <div class="logout-button">
                <a href="logout.php">Log Out</a>
            </div>
        </div>
    </div>
</header>



