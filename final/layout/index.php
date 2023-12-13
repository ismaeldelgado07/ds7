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

            <div class="container-bienes-raices">
                    <div class="title-bienes-raices">EXCELENCIA Y TRAYECTORIA</div>
                    <div class="subtitle-bienes-raices">
                    <p>
                    +36 años de experiencia
                    +20 asociados inmobiliarios
                    +2,000 propiedades
                </p>
                <p>
                    UN EQUIPO DE PROFESIONALES CERTIFICADOS Y
                    COMPROMETIDOS CON NUESTROS CLIENTES
                </p>
                    </div>
                </div>
                
                                
                <div class="contenedor-form">
                <form action="sendEmailToAgent.php"  method="post">

                    <div class="info-row">
                        <div class="info-group">
                            <label for="informacion"><h3>Información del contacto</h3></label>
                        
                        </div>
                       
                    </div>

                    <h4>¿Necesitas ayuda para vender o comprar una propiedad en Panamá?  </h4>
                    <span class="normal-text">¡Uno de nuestros asesores te puede ayudar de manera personalizada a conseguir lo que necesitas!</span>
                    <br>
                    <br>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="input-contact-us" id="nombre" name="nombre" placeholder="Introduzca su nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="telefono">Teléfono</label>
                            <input type="text" class="input-contact-us" id="telefono" name="telefono" placeholder="Introduzca su nombre" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="province">Soy:</label>
                            <select id="province" name="province">
                                <option value=""></option>
                                <option value="Panamá">Inversionista</option>
                                <option value="Panamá Oeste">Comprador</option>
                                <option value="Colón">Agente</option>
                                <option value="Chiriquí">Propietario</option>
                            </select>  
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="correo">Correo Electrónico</label>
                            <input type="email" class="input-contact-us" id="correo" name="correo" placeholder="Introduzca su correo" required>
                        </div>
                    </div>

                    <div class="mensaje-group">
                        <label for="mensaje">Mensaje</label>
                        <textarea class="form-control" id="mensaje" name="mensaje" rows="4" required>   
                        </textarea>
                    </div>

                    <div class="checkbox-group">
                        <input type="checkbox" id="acepto" name="acepto" required>
                        <label for="acepto"> Al enviar este formulario acepto terminos y condiciones de uso</label>
                    </div>

                    <div class="form-row">
                        <button type="submit" value="Enviar correo" class="btn-informacion">Información requerida</button>
                    </div>

                </form>
                </div>


          

<?php include ("footer.php"); ?>