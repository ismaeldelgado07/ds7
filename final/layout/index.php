<?php include ("header.php"); 
    
       /* Funciona perfecto!
        require_once("../class/properties.php");
            $oProperties = new properties();
            $propiedades = $oProperties->consultar_propiedades();

            // Verificamos si hay propiedades disponibles
            if (!empty($propiedades)) {
                $countColumns = 0; // Inicializamos el contador de columnas

                echo '<div class="row">';

                foreach ($propiedades as $resultado) {
                    echo '<div class="column">
                            <div class="card">
                                <h3>' . $resultado['Titulo'] . '</h3>
                                <img src="../img/ejemplo.jpg" alt="Descripción de la imagen">
                                <h3>Baños: ' . $resultado['Baños'] . '</h3>
                                <h3>Dormitorios: ' . $resultado['Dormitorios'] . '</h3>
                                <h3>Ubicacion: ' . $resultado['Ubicacion'] . '</h3>
                                <h3>Precio: ' . $resultado['Precio'] . '</h3>
                                <input type="hidden" class="propiedadIDCase1" value="'. $resultado['PropiedadID'] .'">' . $resultado['PropiedadID'] . '</input>
                                <button type="button">Ver propiedad</button>
                            </div>    
                        </div>';

                    $countColumns++;

                    if ($countColumns == 3) {
                        echo '</div>'; // Cerramos la fila actual
                        echo '<div class="content">
                                <div class="row">';
                        $countColumns = 0; // Reiniciamos el contador
                    }
                }

                echo '</div>'; // Cerramos la última fila
                echo '</div>'; // Cerramos el contenedor principal
            } else {
                print("No hay Propiedades disponibles");
            }
           */ ?>

    <?php
    //Funciona perfecto!
            require_once("../class/properties.php");
            $oProperties = new properties();
            $propiedades = $oProperties->consultar_propiedades();
            
            // Verificamos si hay propiedades disponibles
            if (!empty($propiedades)) {
                $countColumns = 0; // Inicializamos el contador de columnas

                echo '<div class="container">';
              
                foreach ($propiedades as $resultado) {        
                $numero_formateado = number_format( $resultado['Precio'] , 2, '.', ',');
                $descripcion = $resultado['Descripcion'];
                $maxCaracteres = 100;
                $textoRecortado = (strlen($descripcion) > $maxCaracteres) ? substr($descripcion, 0, $maxCaracteres) . '...' : $descripcion;

                echo ' 
                <div class="box">
                        <div class="top" >
                        <img src="data:' . $resultado['Tipo_mime'] . ';base64,' . base64_encode($resultado['Rutaimagen']) . '" style="width:100%">
                            <span>
                                <i class="fas fa-heart"></i>
                                <i class="fas fa-exchange-alt"></i>
                            </span>
                            </div>
                            <div class="bottom">
                            <h3>' . $resultado['Titulo'] . '</h3>
                                <p>
                                ' . $textoRecortado . '
                                </p>
                                    <div class="advants">
                                        <div>
                                        <input type="hidden" class="propiedadID" value="'. $resultado['PropiedadID'] .'"></input>
                                            <span>Dormitorios</span>
                                            <div><i class="fas fa-th-large"></i>
                                            <span>' . $resultado['Dormitorios'] . '</span></div>
                                            </div>
                                            <div>
                                            <span>Baños</span>
                                            <div><i class="fas fa-shower"></i>
                                                <span>' . $resultado['Baños'] . '</span>
                                            </div>
                                            </div>
                                            <div>
                                                <span>Area</span>
                                            <div>
                                                <i class="fas fa-vector-square"></i>
                                                <span>' .  $resultado['Tamaño'] . '<span>Sq Ft</span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="price">
                                      <span>$' . $numero_formateado . '</span>
                                    </div>    
                            </div>
                            <button class="card-button-ver-propiedad" onclick="enviarParametro('.$resultado["PropiedadID"].')">Ver propiedad</button>
                    </div>';
                ?>
                             
                <?php
                    $countColumns++;

                    if ($countColumns == 3) {
                        
                        echo '</div>'; // Cerramos la fila actual
                        echo '<div class="container">
                            ';
                        $countColumns = 0; // Reiniciamos el contador
                    }
                    }
                        echo '</div>'; // Cerramos la última fila
                        echo '</div>'; // Cerramos el contenedor principal
                    } else {
                        print("No hay Propiedades disponibles");
                    }
                ?>

          

<?php include ("footer.php"); ?>