<html>
    <head>
        <title>
            Laboratorio 16.1
        </title>
        <link REL="stylesheet" type="text/css" HREF="css/estilo.css">
    </head>
    <body>
        <h1>
            Consulta de servicio Web de conversión de temperatura
        </h1>
        <form name="FormConv" method="post" action="lab161.php">
            </br>
            Convertir desde 
            <select name="temp">
                <option value="CtoF" SELECTED>°C a °F
                <option value="FtoC">°F a °C 
            </select> El valor
            <input type="number" name="valor" step="any" required>
            <input type="submit" name="Convertir" value="Convertir">
        </form>
        <?php
            $servicio="https://www.w3schools.com/xml/tempconvert.asmx?wsdl";
            $parametros=array();
            if(array_key_exists('Convertir',$_POST)){
                $valor=$_POST['valor'];
                $temp=$_POST['temp'];
         
                if($temp=="CtoF"){
                        $parametros['Celsius']=$valor;
                        $cliente = new SoapClient ($servicio, $parametros);
                        $resultObj = $cliente ->CelsiusToFahrenheit($parametros) ;
                }
                else{
                    $parametros['Farenheit']=$valor;
                    $cliente = new SoapClient ($servicio, $parametros);
                    $resultObj = $cliente->FarenheitToCelsius($parametros);
                    $resultado = $resultObj->FahrenheitToCelsiusResult;
                }

            print ("<br> La temperatura $valor" .substr($temp,0,1). " es igual a: $resultado ". substr($temp,3,1));
            }
        ?>
    </body>
</html>