<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Jugadas Players</title>
    <!-- Agregar estilos CSS personalizados u hojas de estilo externas aquí -->
    <style>
        /* Estilos CSS personalizados */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        .container {
            text-align: center;
            margin-top: 50px;
        }
        .logo {
            width: 150px; /* Ajusta el tamaño de tu logotipo según sea necesario */
            height: auto;
        }
        .company-name {
            font-size: 32px;
            font-weight: bold;
            margin-top: 20px;
        }
        .login-button {
            background-color: yellowgreen;
            color: blue;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
            margin-top: 20px;
            cursor: pointer;
        }
        .footer {
            background-color: rgba(red, green, blue, alpha);
            padding: 20px 0;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        .calendar {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 5px;
            margin-top: 20px;
        }
        .hour-grid {
            display: grid;
            grid-template-columns: repeat(13, 1fr);
            gap: 5px;
            margin-top: 20px;
        }
        .form-container {
            margin-top: 50px;
            display: flex;
            justify-content: center;
        }
        .form {
            width: 50%;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
        }
        .form input[type="text"],
        .form input[type="date"],
        .form input[type="time"],
        .form input[type="submit"] {
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
            box-sizing: border-box;
        }
        /* Estilos para el calendario */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }

                /* Estilos para la tabla de horarios */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        table {
            border-collapse: collapse;
            align-content: center;
            width: 60%;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: right;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<hr>
<table>
        <thead>
            <tr> 
                <th>Lunes</th>
                <th>Martes</th>
                <th>Miércoles</th>
                <th>Jueves</th>
                <th>Viernes</th>
                <th>Sábado</th>
                <th>Domingo</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
                <td>5</td>
                <td>6</td>
                <td>7</td>
            </tr>
            <tr>
                <td>8</td>
                <td>9</td>
                <td>10</td>
                <td>11</td>
                <td>12</td>
                <td>13</td>
                <td>14</td>
            </tr>
            <tr>
                <td>15</td>
                <td>16</td>
                <td>17</td>
                <td>18</td>
                <td>19</td>
                <td>20</td>
                <td>21</td>
            </tr>
            <tr>
                <td>22</td>
                <td>23</td>
                <td>24</td>
                <td>25</td>
                <td>26</td>
                <td>27</td>
                <td>28</td>
            </tr>
            <tr>
                <td>29</td>
                <td>30</td>
                <td>31</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
<hr>
<table>
        <thead>
            <tr>
                <th>Horario</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>10:00 - 11:00</td>
            </tr>
            <tr>
                <td>11:00 - 12:00</td>
            </tr>
            <tr>
                <td>12:00 - 13:00</td>
            </tr>
            <tr>
                <td>13:00 - 14:00</td>
            </tr>
            <tr>
                <td>14:00 - 15:00</td>
            </tr>
            <tr>
                <td>15:00 - 16:00</td>
            </tr>
            <tr>
                <td>16:00 - 17:00</td>
            </tr>
            <tr>
                <td>17:00 - 18:00</td>
            </tr>
            <tr>
                <td>18:00 - 19:00</td>
            </tr>
            <tr>
                <td>19:00 - 20:00</td>
            </tr>
            <tr>
                <td>20:00 - 21:00</td>
            </tr>
            <tr>
                <td>21:00 - 22:00</td>
            </tr>
        </tbody>
    </table>
        <div class="form-container">
            <form class="form" action="tu_archivo_php.php" method="post">
                <input type="text" name="nombre_usuario" placeholder="Nombre de usuario" required>
                <input type="text" name="pista_seleccionada" placeholder="Pista seleccionada" required>
                <input type="date" name="fecha_reserva" required>
                <input type="time" name="hora_reserva" min="10:00" max="22:00" required>
                <input type="submit" value="Reservar">
            </form>
        </div>
    </div>
<hr>
    <footer class="footer">
        <p>Xtremme Padel: contact@extremmepadel.com | Teléfono: +1.800-456-7890</p>
        <p>&copy; <?php echo date("Y"); ?>CONCEPT IDEAS. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
