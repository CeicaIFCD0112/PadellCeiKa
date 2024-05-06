<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
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
            background-color:rgba(red, green, blue, alpha);
            padding: 20px 0;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="ruta/a/tu/logotipo.png" alt="Logotipo de tu Compañía" class="logo">
        <h1 class="company-name">XTREME PADEL</h1>
        <h2>El mejor sitio de padel!!</h2>
        <!-- Aquí puedes agregar el calendario y otras funcionalidades -->
        <a href="login.php" class="login-button">Log In</a>
    </div>

    <footer class="footer">
        <p>Datos de Contacto: contact@example.com | Teléfono: 123-456-7890</p>
        <p>&copy; <?php echo date("Y"); ?>ARSERILU. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
