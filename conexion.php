<?php
// Datos de conexión a la base de datos
$host = "localhost"; // Cambia esto si tu base de datos está en un servidor diferente
$usuario_bd = "root"; // Cambia esto por el nombre de usuario de tu base de datos
$contrasena_bd = ""; // Cambia esto por la contraseña de tu base de datos
$nombre_bd = "padelceika"; // Cambia esto por el nombre de tu base de datos

try {
    // Crear conexión usando PDO
    $conexion = new PDO("mysql:host=$host;dbname=$nombre_bd;charset=utf8", $usuario_bd, $contrasena_bd);
    
    // Habilitar el manejo de errores de PDO
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Opcional: puedes definir esta constante para usarla en otros archivos donde necesites la conexión
    define('DB_CONN', $conexion);
} catch(PDOException $e) {
    // En caso de error, mostrar el mensaje de error
    die("Error de conexión: " . $e->getMessage());
}
?>
