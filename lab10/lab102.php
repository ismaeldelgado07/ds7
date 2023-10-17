<html>
    <head>
        <title>
            laboratorio 10.2
        </title>
        <link REL = "stylesheet" type ="text/css" HREF = "css/estilo.css" >
    </head>
    <body>
    <h1>
        Encuesta. Resultados de la votación
    </h1>

    <?php
        require_once("class/votos.php");

        $obj_votos = new votos();
        $result_votos = $obj_votos->listar_votos();

        foreach ($result_votos as $result_voto){
            $votos1=$result_voto['votos1'];
            $votos2=$result_voto['votos2'];
        }

        $totalVotos = $votos1 + $votos2;

        print ("<table>\n");

        print ("<tr>\n");
        print ("<TH>Respuesta</TH>\n");
        print ("<TH>Votos</TH>\n");
        print ("<TH>Porcentaje</TH>\n");
        print ("<TH>Representación gráfica</TH>\n");
        print ("</tr>\n");

        $porcentaje = round (($votos1/$totalVotos)*100,2);
        print ("<tr>\n");
        print ("<TD CLASS='izquierda'>Si</TD>\n");
        print ("<TD CLASS='derecha'>$votos1</TD>\n");
        print ("<TD CLASS='derecha'>$porcentaje%</TD>\n");
        print ("<TD CLASS='izquierda' width='400'><IMG SRC='img/puntoamarillo.gif height='10' width'" . $porcentaje*4 . "'</TD>\n");
        print ("</tr>\n");

        $porcentaje = round (($votos2/$totalVotos)*100,2);
        print ("<tr>\n");
        print ("<TD CLASS='izquierda'>No</TD>\n");
        print ("<TD CLASS='derecha'>$votos2</TD>\n");
        print ("<TD CLASS='derecha'>$porcentaje%</TD>\n");
        print ("<TD CLASS='izquierda' width='400'><IMG SRC='img/puntoamarillo.gif height='10' width'" . $porcentaje*4 . "'</TD>\n");
        print ("</tr>\n");

        print ("</table>\n");
        print ("<p>Numero total de votos emitidos: $totalVotos </p>");
        print ("<p><a HREF='lab101.php'>Pagina de votacion</a></p>");
        



    ?>

    </body>
</html>