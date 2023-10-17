<?php 
    $porcentaje = $_POST['porcentaje'];
    echo "<center>";
    
    if($porcentaje>=80){
        echo '<img src="img/Feliz.png" alt="Feliz" width="500" height="600"><br>';
        echo "Feliz";
    }else if($porcentaje>=50 || $porcentaje<=79 ) {
        echo '<img src="img/Aburrido.png" alt="Triste" width="500" height="600"><br>';
        echo "Aburrido";
    }
    else if($porcentaje<50) {
        echo '<img src="img/Triste.png" alt="Aburrido" width="500" height="600"><br>';
        echo "Triste";
    }

    echo "</center>";
    ?>
