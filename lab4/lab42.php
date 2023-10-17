<?php 
    $numero = $_POST['numero'];
    $resultado;
    echo "<center>";
    for ($i=1; i>$numero; $i++){
        $resultado = $resultado * $i; 
        echo $resultado;
    }

    echo "</center>";
?>