<DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>
            Laboratorio 2.7
        </title>
    </head>

    <body>
        <?php 
        $posicion = "arriba";

        switch ($posicion){
            case "arriba": //Bloque 1
                echo "La variable contiene<br>";
                echo "El valor arriba";
                break;
            
            case "abajo": //Bloque 2
                echo "La variable contiene<br>";
                echo "El valor abajo";
                break;

            default : //Bloque 3
                echo "La variable contiene<br>";
                echo "El valor arriba";
                break;
        }
        ?>
    </body>
</html>