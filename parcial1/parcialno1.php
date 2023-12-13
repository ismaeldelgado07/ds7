<table align ="center" border="1" width="100">
<?php
    $nMatriz = $_POST['numeroMatriz'];
   
    $sumaUltimasFilas;
    $sumaPrimerasFilas;

    echo "<center><h1>Parcial 1 - DS7</h1></center><br>";
  
    if ($nMatriz>=6 && $nMatriz % 2 == 0){
        echo "<center> Matriz de " . $nMatriz . "<br> </center>";
        $matriz = [$nMatriz,$nMatriz];

        $mitadFilas = 1;
        $mitadColumnas = 2;
     
        for ($i=0; $i<$nMatriz; $i++){
            echo "<tr>";
            $matriz[$i] = rand (1,100);
            echo "$matriz[$i]";
           
            for($k=0;$k<$nMatriz;$k++){
                
                echo "<td>";
                $matriz[$k] = rand (1,100);
                echo "$matriz[$k]";
                echo "</td>";
                
                if ($i == $mitadFilas || $k == $mitadColumnas) {
                    echo "<td>";
                    $matriz[$k] = 0;
                    echo "$matriz[$k]";
                    echo "</td>";
                  }
                  else{

                  }
            }
        }
        //echo "<center> Suma de las primeras filas:" . $sumresult ." <br>";
        //echo "<center> Suma de las ultimas filas: . $sumaUltimasFilas . <br>";
        echo "<center> Matriz generada exitosamente </center><br>";
    }else{
        echo "<center> Introduzca un numero mayor o igual a 6. El numero debe ser par. </center><br>";
    }
   
?>
</table>