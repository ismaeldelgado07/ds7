<?php
    session_start ();
?>

<html xmlns = "http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
    <head>
        <title>
            Laboratorio 12
        </title>
        <link rel="stylesheet" type ="text/css" href="css/estilo.css">
    </head>

    <body>
        <h1>Manejo de sesiones</h1>
        <h2>Paso 1: se crea la variable de sesión y se almacena</h2>

        <?php
        $var = "Ejemplo Sesiones";
        $_SESSION['var'] = $var;
        print ("<p>Valor de la variable de sesión: $var</p>\n");
        ?>

        <a href="lab122.php">Paso 2</a>
    </body>

</html>