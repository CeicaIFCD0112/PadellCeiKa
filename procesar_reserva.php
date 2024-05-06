<?php
// Conectar a la base de datos

// Recuperar los datos del formulario
$pista_id = $_POST['pista_id'];
$hora = $_POST['hora'];
$fecha = $_POST['fecha'];
$usuario = $_POST['usuario'];
$jugadores = $_POST['jugadores'];

// Validar los datos (puedes hacer más validaciones aquí)

// Guardar la reserva en la base de datos
// Aquí deberías ejecutar una consulta SQL para insertar los datos en la tabla de reservas

// Redirigir de vuelta a la página principal
header("Location: index.php");
exit();
?>
