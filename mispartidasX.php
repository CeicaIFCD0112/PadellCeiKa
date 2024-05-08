<?php
include("header2.php");
$username="PEPE"
?>
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
                <button class="user-button"><?php echo $username; ?></button>
                <div class="dropdown-content">
                    <a href="#">Editar Perfil</a>
                    <a href="mispartidasX.php">Partidas Jugadas</a>
                    <a href="mispartidasA.php">Partidas Pendientes</a>
                </div>
            </div>
            <div class="logout-button">
                <a href="logout.php">Log Out</a>
            </div>
        </div>
    </div>
</header>
<?php
include 'conexion.php';
session_start();

// Obtener el ID del usuario logueado
if(isset($_SESSION["iduser"])){
    $iduser = $_SESSION["iduser"];
} else {
    // Si no hay sesión iniciada, establecer un valor predeterminado para fines de prueba
    $iduser = 1;
}

try {
    // Preparar la consulta SQL para obtener las partidas jugadas por el usuario logueado
    $query = "SELECT r.fecha_reserva, h.descripcion, u.username, p.nombrepista 
              FROM reservas AS r
              INNER JOIN horas AS h ON r.idhora = h.idhoras
              INNER JOIN users AS u ON r.iduser = u.iduser
              INNER JOIN pista AS p ON r.idpista = p.idpista
              WHERE r.fecha_reserva < NOW() AND r.iduser = :iduser";

    // Preparar la declaración
    $statement = $conn->prepare($query);

    // Asociar el parámetro :iduser con el valor de $iduser
    $statement->bindValue(':iduser', $iduser);

    // Ejecutar la consulta
    $statement->execute();

    // Obtener todas las filas de resultados como un array asociativo
    $partidas = $statement->fetchAll(PDO::FETCH_ASSOC);

    // Si hay partidas encontradas
    if ($partidas) {
        echo '<table border="1">';
        echo '<tr><th>Usuario</th><th>Fecha</th><th>Hora</th><th>Pista</th></tr>';
        // Iterar sobre cada partida y mostrar los detalles en filas de tabla
        foreach ($partidas as $reserva) {
            echo "<tr>";
            echo "<td>" . $reserva['username'] . "</td>";
            echo "<td>" . $reserva['fecha_reserva'] . "</td>";
            echo "<td>" . $reserva['descripcion'] . "</td>";
            echo "<td>" . $reserva['nombrepista'] ."</td>";
            // Otros detalles de la partida...
            echo "</tr>";
        }
        echo '</table>';
    } else {
        echo "No se encontraron partidas para el usuario.";
    }
} catch (PDOException $e) {
    // En caso de error, mostrar el mensaje de error
    echo "Error al obtener las partidas: " . $e->getMessage();
}
?>
