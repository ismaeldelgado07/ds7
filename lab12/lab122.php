<?php
    session_start();
?>

<html lang ="es">
    <head>
        <title>
            Laboratorio 12
        </title>
        <link rel="stylesheet" type="text/css" href ="css/estilo.css">
    </head>

    <body>
        <h1>Manejo de sesiones</h1>
        <h2>Paso 2: se accede a la variable de sesión almacenada y se destruye</h2>
        <?php
        if(isset($_SESSION['var'])){
            $var = $_SESSION ['var'];
            print ("<p>Valor de la variable de sesión: $var</p>\n");
            unset ($_SESSION['var']);
            print ("<a href='lab123.php'>Paso 3</a>");
        }else{
            print ("Sesion no iniciada, ir al <a href='lab121.php'>Paso 1</a>Para iniciar la sesión");
        }
        ?>
    </body>
</html>