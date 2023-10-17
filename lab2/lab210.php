<DOCTYPE html>
    <html>
        <head>
            <meta http-equiv = "Content-Type" content="text/html; charset=UTF-8">
        </head>

        <body>
            <?php 
                $persona = array (
                    array ("nombre" => "Rosa", "Estatura" => 168, "Sexo" => "F"),
                    array ("nombre" => "Ignacio", "Estatura" => 175, "Sexo" => "M"),
                    array ("nombre" => "Daniel", "Estatura" => 172, "Sexo" => "M"),
                    array ("nombre" => "Rubén", "Estatura" => 182, "Sexo" => "M")
                );

                echo "<b>Datos sobre el personal<b><b><hr>";
                $numPersonas = count ($persona);

                for ($i=0; $i< $numPersonas; $i++){
                    echo "Nombre: <b>", $persona[$i]['nombre'], ", <b></b>";
                    echo "Estatura: <b>", $persona[$i]['Estatura'], ", <b></b>";
                    echo "Sexo: <b>", $persona[$i]['Sexo'], " <b></b> <br>";
                }
            ?>
        </body>
    </html>