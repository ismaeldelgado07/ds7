<html>
    <head>
        <title>
            Laboratorio 2.4
        </title>
    </head>
    <body>
        <center>
            <?php 
            //Creación del arreglo array ("clave" => "valor")
            $personas = array ("juan"=> "Panama",
            "john"=> "USA",
            "Eika"=> "Finlandia",
            "Kusanagi"=> "Japon");

            //Recorrer todo el arreglo
            foreach ($personas as $persona => $pais){
                print "$persona es de $pais <br>";
            }

            //Impresion especifica
            echo "<br>" . $personas["juan"];
            echo "<br>" . $personas["Eika"];
            ?>
        </center>
    </body>
</html>