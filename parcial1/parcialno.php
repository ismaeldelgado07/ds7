<table align ="center" border="1" width="100">
<?php
    // Definir el tamaño de la matriz (6x6 en este caso)
    $filas = 6;
    $columnas = 6;

    echo "<center><h1>Parcial 1 - DS7</h1></center><br>";
    echo "<center> Matriz de " . $nMatriz . "<br> </center>";

    // Inicializar la matriz
    $matriz = array();

    // Llenar la matriz con números aleatorios, y establecer 0 en las columnas 3 y 4
    for ($i = 0; $i < $filas; $i++) {
    
        $matriz[$i] = array();
        for ($j = 0; $j < $columnas; $j++) {
        
            if ($j == 2 || $j == 3 || $i == 2 || $i == 3) {
                $matriz[$i][$j] = 0;
            } else {
                $matriz[$i][$j] = rand(1, 99); // Generar números aleatorios entre 1 y 99
            }
            
        }
    }
    echo "<center> Matriz generada exitosamente </center><br>";

    $sumaPrimerasFilas = array_sum($matriz[0]) + array_sum($matriz[1]);

    // Sumar las dos últimas filas
    $sumaUltimasFilas = array_sum($matriz[$filas - 2]) + array_sum($matriz[$filas - 1]);


    // Imprimir la matriz
    for ($i = 0; $i < $filas; $i++) {
        echo "<tr>";
        for ($j = 0; $j < $columnas; $j++) {
            echo "<td>";
            echo $matriz[$i][$j] ;
        }
        
        echo "</td>";
    }
    
    echo "<center>Suma de las dos primeras filas: $sumaPrimerasFilas </center>";
    echo "<center>Suma de las dos últimas filas: $sumaUltimasFilas </center>";
    echo "<br>";
?>
</table>