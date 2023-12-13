<?php
    echo "<center><h1>Parcial 1 - DS7</h1></center><br>";
    if (isset($_POST['tamano']) && is_numeric($_POST['tamano'])) {
        $size = (int)$_POST['tamano'];

        if ($size>=6){
            echo "<center> Matriz de " . $size . " x " . $size . "<br> </center>";

            $matriz = array();

            for ($i = 0; $i < $size; $i++) {
                $matriz[$i] = array();
                for ($j = 0; $j < $size; $j++) {
                    if ($j == $size / 2 || $j == ($size / 2) - 1 || $i == $size / 2 || $i == ($size / 2) - 1) {
                        $matriz[$i][$j] = 0;
                    } else {
                        $matriz[$i][$j] = rand(1, 99); 
                    }
                }
            }
            
            $sumaPrimerasFilas = array_sum($matriz[0]) + array_sum($matriz[1]);
            $sumaUltimasFilas = array_sum($matriz[$size - 2]) + array_sum($matriz[$size - 1]);

            echo "<center> Matriz generada exitosamente </center><br>";
            echo "<table align ='center' border='1'>";
            for ($i = 0; $i < $size; $i++) {
                echo "<tr>";
                for ($j = 0; $j < $size; $j++) {
                    echo "<td>" . $matriz[$i][$j] . "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";

            echo "<center>";
            echo "Suma de las dos primeras filas: $sumaPrimerasFilas<br>";
            echo "Suma de las dos últimas filas: $sumaUltimasFilas";
            echo "</center>";

        }else{
            echo "<center><h1>Introduce un valor mayor a 6</h1></center>";
            
        }
    
    } else {
        echo "Por favor, introduce un valor válido para el tamaño de la matriz.";
    }
?>