<html>
    <head>
        <title>
            Laboratorio 20
        </title>
    </head>

    <body>
        <form action="lab201.php" method="POST">
            Nombre: <input type="text" name="nombre" required><br>
            Apellido: <input type="text" name="apellido" required><br>
            Email: <input type="text" name="email" required><br>
            Edad: <input type="text" name="edad" min="0" max="120"required><br><br>
            <input type="submit" name="guardar" value="Guardar datos">
        </form>
    <?php
        include("UsuariosMDB.php");
        $usrs = new UsuariosMDB();

        if(array_key_exists('guardar', $_POST)){
            $usrs->insertarRegistro ($_REQUEST['nombre'],$_REQUEST['apellido'],$_REQUEST['email'],$_REQUEST['edad']);
            echo " Registro insertado exitosamente<br><br>";   
        }

        echo "Registro en la colección usuarios: <br>";
        $usrs->obtenerRegistros();
    ?>

    </body>
</html>