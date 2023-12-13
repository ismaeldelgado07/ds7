<?php 
    session_start();

?>

<html lang ="es">
    <head>
        <title>
            Desconectar
        </title>
        <link rel="stylesheet" type="text/css" href="css/estilo.css">

        <body>
            <?php
                if (isset($_SESSION["usuario_valido"])){
                    session_destroy();
                    print ("<br><br><p align='center'>Conexion finalizada</p>");
                    print ("<br><br><p align='center'> [ <a href='login.php'> Conectar </a>] </p>\n");
                }else{
                    print ("<br><br>");
                    print ("<p align='center'>No existe una conexión activa</p>");
                    print ("<br><br><p align='center'> [ <a href='login.php'> Conectar </a>] </p>\n");
                }
            ?>
        </body>
    </head>

</html>