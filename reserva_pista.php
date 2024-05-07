<?php
function obtenerNombreMes($mes)
{
    $nombresMeses = array(
        1 => 'Enero',
        2 => 'Febrero',
        3 => 'Marzo',
        4 => 'Abril',
        5 => 'Mayo',
        6 => 'Junio',
        7 => 'Julio',
        8 => 'Agosto',
        9 => 'Septiembre',
        10 => 'Octubre',
        11 => 'Noviembre',
        12 => 'Diciembre'
    );
    return $nombresMeses[intval($mes)];
}

function generarCalendario($mes, $anio)
{
    // Obtener el nombre completo del mes en castellano
    $nombreMes = obtenerNombreMes($mes);

    // Obtener el número de días en el mes dado
    $numDias = cal_days_in_month(CAL_GREGORIAN, $mes, $anio);

    // Obtener el primer día de la semana y el número de la semana
    $primerDiaSemana = date('N', strtotime("$anio-$mes-01"));
    $numSemana = date('W', strtotime("$anio-$mes-01"));

    // Obtener el día actual
    $diaActual = date('d');

    // Calcula el mes anterior y siguiente
    $mesAnterior = ($mes == 1) ? 12 : $mes - 1;
    $anioAnterior = ($mes == 1) ? $anio - 1 : $anio;
    $mesSiguiente = ($mes == 12) ? 1 : $mes + 1;
    $anioSiguiente = ($mes == 12) ? $anio + 1 : $anio;

    // Crear la tabla del calendario
    $output = '<table>';
    $output .= '<caption>';
    $output .= '<a href="?mes=' . $mesAnterior . '&anio=' . $anioAnterior . '">&laquo; Mes anterior</a>';
    $output .= ' ' . $nombreMes . ' ' . $anio . ' ';
    $output .= '<a href="?mes=' . $mesSiguiente . '&anio=' . $anioSiguiente . '">Mes siguiente &raquo;</a>';
    $output .= '</caption>';
    $output .= '<thead>';
    $output .= '<tr>';
    $output .= '<th>Lun</th>';
    $output .= '<th>Mart</th>';
    $output .= '<th>Mie</th>';
    $output .= '<th>Jue</th>';
    $output .= '<th>Vie</th>';
    $output .= '<th>Sab</th>';
    $output .= '<th>Dom</th>';
    $output .= '</tr>';
    $output .= '</thead>';
    $output .= '<tbody>';

    // Inicializar el contador de días
    $dia = 1;

    // Crear las filas y columnas de la tabla
    for ($i = 1; $i <= 6; $i++) {
        $output .= '<tr>';
        for ($j = 1; $j <= 7; $j++) {
            if (($i === 1 && $j < $primerDiaSemana) || $dia > $numDias) {
                $output .= '<td></td>';
            } else {
                // Verificar si el día es anterior al día actual
                if ($dia < $diaActual && $mes == date('m') && $anio == date('Y')) {
                    $output .= '<td style="text-decoration: line-through;">' . $dia . '</td>';
                } else {
                    $output .= '<td>' . $dia . '</td>';
                }
                $dia++;
            }
        }
        $output .= '</tr>';
        if ($dia > $numDias) {
            break;
        }
    }

    $output .= '</tbody>';
    $output .= '</table>';

    return $output;
}

function getHorasLibres($fechaReserva, $idPista)
{
    // Configuración de la conexión a la base de datos
    include("conexion.php");
    // Verificar la conexión


    // Consulta para obtener las horas reservadas para la fecha y la pista específica
    $consulta = "SELECT idhoras,descripcion FROM horas WHERE idhoras NOT IN (
        SELECT idhora FROM reservas 
        WHERE idpista = :idPista AND fecha_reserva = :fechaReserva
    )";
    try {
        // Preparar la consulta
        $statement = $conn->prepare($consulta);

        // Asignar valores a los parámetros y ejecutar la consulta
        $statement->execute(array(':idPista' => $idPista, ':fechaReserva' => $fechaReserva));

        // Obtener las horas libres
        $horasLibres = $statement->fetchAll(PDO::FETCH_ASSOC);

        // Cerrar la conexión
        $conexion = null;

        // Devolver las horas libres
        return $horasLibres;
    } catch (PDOException $e) {
        // En caso de error, mostrar el mensaje de error
        return "Error: " . $e->getMessage();
    }
}
function getHoras()
{
    // Configuración de la conexión a la base de datos
    include("conexion.php");
    // Verificar la conexión


    // Consulta para obtener las horas reservadas para la fecha y la pista específica
    $consulta = "SELECT idhoras,descripcion FROM horas";
    try {
        // Preparar la consulta
        $statement = $conn->prepare($consulta);

        // Asignar valores a los parámetros y ejecutar la consulta
        $statement->execute();

        // Obtener las horas libres
        $horas = $statement->fetchAll(PDO::FETCH_ASSOC);

        // Cerrar la conexión
        $conexion = null;

        // Devolver las horas libres
        return $horas;
    } catch (PDOException $e) {
        // En caso de error, mostrar el mensaje de error
        return "Error: " . $e->getMessage();
    }
}
$horas=getHoras();
$horasLibres=getHorasLibres('20240507',1);


// Obtener el mes y el año actual si no se proporcionan como parámetros
$mesActual = isset($_GET['mes']) ? $_GET['mes'] : date('m');
$anioActual = isset($_GET['anio']) ? $_GET['anio'] : date('Y');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horarios y Calendarios</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <?php echo generarCalendario($mesActual, $anioActual); ?>
            </div>
            <div class="col-md-6">
                <table class="table table-sm">
                    <caption>Horarios</caption>
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Horarios</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($horas as $key => $hora) {
                                $estado=in_array($hora,$horasLibres)?'libre':'ocupado';
                                echo "<tr id=hora".$hora['idhoras']."  class='".$estado."'>
                                <td>".$hora['descripcion']."</td>
                            </tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <a href="index.php" class="btn btn-primary">Regresar al Home</a>
            </div>
        </div>
    </div>
    <hr>
</body>
</html>