<?php
    session_start();

    if(isset($_REQUEST['usuario'])&& isset($_REQUEST['clave'])){
        $usuario = $_REQUEST['usuario'];
        $clave = $_REQUEST['clave'];

        $salt = substr ($usuario,0, 2);
        $clave_crypt = crypt ($clave,$salt);

        require_once("class/usuarios.php");

        $obj_usuarios = new usuarios();
        $usuario_validado = $obj_usuarios->validar_usuario ($usuario,$clave_crypt);

        foreach ($usuario_validado as $array_resp){
            foreach ($array_resp as $value){
                $nfilas = $value;
            }
        }

        if ($nfilas >0){
            $usuario_valido = $usuario;
            $_SESSION ["usuario_valido"] = $usuario_valido;
        }
    }
?>
<!doctype html public "-//W3c/DTD HTML 4.0//EN" "http://www.w3.org/tr/html4/strict.dtd">
<html lang= "es">
    <head>
        <title>
            Laboratorio 14 - Login al sitio de noticias 
            <link rel ="stylesheet" type="text/css" href="css/estilo.css">
        </title>
    </head>

    <body>
        <?php 
        if (isset($_SESSION['usuario_validado'])){
        ?>

        <h1>Gestion de noticias</h1>
        <hr>
        <ul>
            <li><A HREF="lab142.php">Listar todas la noticias</A>
            <li><A HREF="lab143.php">Listar noticias partes</A>
            <li><A HREF="lab144.php">Buscar noticias</A>
        </ul>
        <hr>
        <p>[ <a href="logout.php"> Desconectar</a> ]</p>

        <?php 
        }

        else if (isset($usuario)){
            print ("<br><br>\n");
            print ("<p align='CENTER'> Acceso no autorizado</p>\n");
            print ("<p align='CENTER'> [ <a href='login.php'>Conectar</a> ] </p>\n");
        }

        else{
            print ("<br><br>\n");
            print ("<p class='parrafocentrado'> Esta zona tiene el acceso restringido.<br>  Para entrar debe identificarse<p>\n");
            print ("<form class='entrada' name='login' action='login.php' method='post'>\n");
            print ("<p><label class= 'etiqueta-entrada'>Usuario:</label></p>");
            print ("<input type='text' NAME='usuario' size='15'>\n");
            print ("<p><label class= 'etiqueta-entrada'>Clave:</label></p>");
            print ("<input type='password' NAME='clave' size='15'>\n");
            print ("<p><input type='submit' value='Entrar'></p>\n");
            print ("</form>");

            print ("<p class='parraforcentrado'> NOTA: Si no dispone de identificacion o tiene problemas para entrar <br> pongase en contacto con el " .
            " <a href='MAILTO:webmaster@localhost'> Administrador</a> del sitio </p> .");
        }
        ?>
    </body>
</html>