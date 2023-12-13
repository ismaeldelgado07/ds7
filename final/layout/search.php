<?php include('header.php');?>

    <div class="search-container">
            <div class="search-header">
                <h2>Busqueda avanzada</h2>
            </div>
            <form action="search.php" method="POST" class="search-form" >
                <div class="form-group">
                    <label for="keyword">Palabra clave:</label>
                    <input type="text" id="keyword" name="keyword" placeholder="Ingresa palabra clave">
                </div>
                <div class="form-group">
                    <label for="province">Provincia:</label>
                    <select id="province" name="province">
                        <option value=""></option>
                        <option value="Panamá">Panamá</option>
                        <option value="Panamá Oeste">Panamá Oeste</option>
                        <option value="Colón">Colón</option>
                        <option value="Chiriquí">Chiriquí</option>
                        <option value="Bocas del Toro">Bocas del Toro</option>
                        <option value="Coclé">Coclé</option>
                        <option value="Herrera">Herrera</option>
                        <option value="Los Santos">Los Santos</option>
                        <option value="Veraguas">Veraguas</option>
                        <option value="Darién">Darién</option>
                        <option value="Ngäbe-Buglé">Ngäbe-Buglé</option>
                        <option value="Guna Yala">Guna Yala</option>
                        <!-- Add more options as needed -->
                    </select>
                </div>
                <div class="form-group-search">
                    <label for="location">Ubicación:</label>
                    <input type="text" id="location" name="location" placeholder="Ingresar ubicación">
                </div>
                <div class="form-group-search">
                    <label for="property-type">Tipo de propiedad:</label>
                    <select id="property-type" name="property-type">
                        <option value=""></option>
                        <option value="Apartmentos">Apartmentos</option>
                        <option value="Casa">Casa</option>
                        <option value="Terreno">Terreno</option>
                        <option value="Cabañas">Cabañas</option>
                        <!-- Add more options as needed -->
                    </select>
                </div>
                <div class="form-group-search">
                    <label for="min-price">Precio Mínimo:</label>
                    <input type="text" id="min-price" name="min-price" placeholder="Precio mínimo">
                </div>
                <div class="form-group-search">
                    <label for="max-price">Precio Máximo:</label>
                    <input type="text" id="max-price" name="max-price" placeholder="Precio máximo">
                </div>
                <div class="form-group-search">
                    <label for="max-price">Año de construcción:</label>
                    <input type="text" id="year-construction" name="year-construction" placeholder="Año de construcción">
                </div>
                <div class="form-group-search">
                    <label for="max-price">Tamaño:</label>
                    <input type="text" id="size" name="size" placeholder="Tamaño">
                </div>
                <div class="form-group-search">
                    <input type="submit" value="Buscar"> 
                </div>
            </form>
    </div>

    <?php
    //Funciona perfecto!
          
            $keyword = isset($_POST['keyword']) ? $_POST['keyword'] : null;
            $province = isset($_POST['province']) ? $_POST['province'] : null;
            $location = isset($_POST['location']) ? $_POST['location'] : null;
            $property_type = isset($_POST['property-type']) ? $_POST['property-type'] : null;
            $min_price = isset($_POST['min-price']) ? $_POST['min-price'] : null;
            $max_price = isset($_POST['max-price']) ? $_POST['max-price'] : null;
            $construction = isset($_POST['year-construction']) ? $_POST['year-construction'] : null;
            $size = isset($_POST['size']) ? $_POST['size'] : null;
            
            echo "$keyword,$province,$location,$property_type,$min_price,$max_price,$construction,$size";

            require_once("../class/properties.php");
            $oProperties = new properties();
            $propiedades = $oProperties->busqueda_avanzada($keyword,$province,$location,$property_type,$min_price,$max_price,$construction,$size);
            
            // Verificamos si hay propiedades disponibles
            if (!empty($propiedades)) {
                $countColumns = 0; // Inicializamos el contador de columnas
                
                echo '
                <div class="contenedor-name-price">
                    <div class="izquierda">
                        <h2>Tú búsqueda:</h2>
                    </div>
                    <div class="derecha">
                        <h2></h2>
                    </div>
                </div>';  

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

<?php include('footer.php');?>