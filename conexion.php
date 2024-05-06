<?php
// Datos de conexión a la base de datos
$host = "localhost"; // Cambia esto si tu base de datos está en un servidor diferente
$usuario_bd = "root"; // Cambia esto por el nombre de usuario de tu base de datos
$contrasena_bd = ""; // Cambia esto por la contraseña de tu base de datos
$nombre_bd = "padelceika"; // Cambia esto por el nombre de tu base de datos

// Crear conexión
$conexion = new mysqli($host, $usuario_bd, $contrasena_bd, $nombre_bd);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Establecer el juego de caracteres de la conexión
$conexion->set_charset("utf8");

// Opcional: puedes definir esta constante para usarla en otros archivos donde necesites la conexión
define('DB_CONN', $conexion);
?>
