<?php
    session_start();
    ini_set('display_errors', 1); 
    if(isset($_REQUEST['uname'])&& isset($_REQUEST['psw'])){
        $usuario = $_REQUEST['uname'];
        $clave = $_REQUEST['psw'];

        $salt = substr ($usuario,0, 2);
        $clave_crypt = crypt ($clave,$salt);

        require_once("../class/usuarios.php");

        $obj_usuarios = new usuarios();
        $usuario_validado = $obj_usuarios->validar_usuario ($usuario,$clave_crypt);

        foreach ($usuario_validado as $array_resp){
            foreach ($array_resp as $value){
                $nfilas = $value;
            }  
        }

        $nfilas = 0;

        if ($nfilas >0){
            $usuario_valido = $usuario;
            $_SESSION ["usuario_valido"] = $usuario_valido; 
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>BienesRaices</title>
        <link rel="icon" type="image/png" href="../img/building-ios-16-16.png">
        <link rel="stylesheet" href="../css/styles.css">
        <link rel="stylesheet" href="../css/footer.css">
        <link rel="stylesheet" href="../css/login.css">
        <link rel="stylesheet" href="../css/slideshow.css">
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    </head>

    <body>
        <div class="container-header">
            <div class="centered-title"><h1> <span class="bold-text" >Bienes</span><span class="normal-text">Raices</span> </h1></div>
            <div class="centered-p"><p>Tenemos tu nuevo Hogar</p></div>
        </div>

    <?php 
        if (isset($_SESSION['usuario_validado'])){
        ?>
        <div class="alert-succesful">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
            <strong>Inicio de sesión exitoso!</strong> Redirigiendo ...
        </div> 
        <script>
           setTimeout(function(){
            goBackAfterLogin();
            }, 3000); // 3000 milisegundos = 3 segundos

            function goBackAfterLogin() {window.history.go(-2);}
            </script>
        
        <?php 
        }

        else if (isset($usuario)){
            ?>
             <div class="alert-wrong-credentials">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                <strong>Acceso no autorizado</strong> Revisa tus credenciales e intenta nuevamente
            </div> 
            <?php
        }

        else{
         //   print ("<p class='parraforcentrado'> NOTA: Si no dispone de identificacion o tiene problemas para entrar <br> pongase en contacto con el " .
          //  " <a href='MAILTO:webmaster@localhost'> Administrador</a> del sitio </p> .");
        }
        ?>
        
    <form class="form-login" action="login.php" method="post">
    <div class="imgcontainer">
    <center>
            <h1>
                <span class="bold-text" >Bienes</span><span class="normal-text">Raices</span>
            </h1>
        </center>
    </div>

    <div class="container-login">
        <label for="uname"><b>Nombre de usuario</b></label>
        <input type="text" placeholder="Ingresa nombre de usuario" name="uname" required>

        <label for="psw"><b>Contraseña</b></label>
        <input type="password" placeholder="Ingresa contraseña" name="psw" required>
            
        <button type="submit">Iniciar sesión</button>
        <label>
    <!--   <input type="checkbox" checked="checked" name="remember"> Remember me! -->
        <span class="textlink">¿No tienes una cuenta?<a href="#"> Regístrate aquí</a></span>
        </label>
    </div>

    <div class="container-login" style="background-color:#f1f1f1">
        <button type="button" class="cancelbtn-login"  onclick="goBack()">Cancel</button>
        <script>function goBack() {window.history.back();}</script>
        <span class="psw">Olvidó <a href="#">contraseña?</a></span>
        
    </div>
    </form>

<?php include ("footer.php"); ?>