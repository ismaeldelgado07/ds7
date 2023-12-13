<?php 
    session_start();

    include ("header.php"); 

    if (isset($_GET['propertieID'])) {
        // Obtiene el valor del parámetro
        $propertieID = $_GET['propertieID'];
    
        // Ahora puedes utilizar $propertieID en tu lógica de PHP
        //echo "El valor de propertieID es: " . $propertieID;

    } else {
       // echo "No se proporcionó el parámetro propertieID en la URL.";
    }

    require_once("../class/properties.php");
            $oProperties = new properties();
            $propiedades = $oProperties->consultar_propiedad($propertieID);
            

            // Verificamos si hay propiedades disponibles
            if (!empty($propiedades)) {
                $countColumns = 0; // Inicializamos el contador de columnas

                foreach ($propiedades as $resultado) {        
                    $numero_formateado = number_format( $resultado['Precio'] , 2, '.', ',');
                    echo '
                    <div class="links">
                        <a class="textlink" href="index.php">Inicio</a> > <a class="textlink" href="index.php">'. $resultado["TipoPropiedad"] .'</a> > '. $resultado["NombrePropiedad"] .'
                    </div>
                
                    <div class="contenedor-name-price">
                        <div class="izquierda">
                            <h2>'. $resultado["NombrePropiedad"] .'</h2>
                        </div>
                        <div class="derecha">
                            <h2>$'. $numero_formateado.'</h2>
                        </div>
                    </div>   

                    <div class="slideshow-container">
                    
                        <div class="mySlides1">
                            <img src="data:' . $resultado['Tipo_mime'] . ';base64,' . base64_encode($resultado['Rutaimagen']) . '" style="width:100%">
                        </div>
                    
                        <div class="mySlides1">
                            <img src="data:' . $resultado['Tipo_mime'] . ';base64,' . base64_encode($resultado['Rutaimagen2']) . '" style="width:100%">
                        </div>

                        <div class="mySlides1">
                            <img src="data:' . $resultado['Tipo_mime'] . ';base64,' . base64_encode($resultado['RutaImagen3']) . '" style="width:100%">
                        </div>
                    
                        <div class="mySlides1">
                            <img src="data:' . $resultado['Tipo_mime'] . ';base64,' . base64_encode($resultado['RutaImagen4']) . '" style="width:100%">
                        </div>

                        <div class="mySlides1">
                            <img src="data:' . $resultado['Tipo_mime'] . ';base64,' . base64_encode($resultado['RutaImagen5']) . '" style="width:100%">
                        </div>



                        
                
                    <a class="prev" onclick="plusSlides(-1, 0)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1, 0)">&#10095;</a>
                    </div>
                   
                    <script>
                        let slideIndex = [1,1];
                        let slideId = ["mySlides1", "mySlides2"]
                        showSlides(1, 0);
                        showSlides(1, 1);
                
                        function plusSlides(n, no) {
                            showSlides(slideIndex[no] += n, no);
                        }
                
                        function showSlides(n, no) {
                            let i;
                            let x = document.getElementsByClassName(slideId[no]);
                        if (n > x.length) {slideIndex[no] = 1}    
                        if (n < 1) {slideIndex[no] = x.length}
                        for (i = 0; i < x.length; i++) {
                            x[i].style.display = "none";  
                        }
                        x[slideIndex[no]-1].style.display = "block";  
                        }
                    </script>

                    <div class="contenido">
                    <div class="horizontal-divider"></div>
                        <div class="section">
                            <h2>Dirección</h2>
                            <div class="info">
                                <div class="left-text"><img src="../img/icons/icons8-america-world-map-32.png" alt=""> Provincia: '. $resultado["Provincia"] .'</div>
                                <div class="right-text"><img src="../img/icons/icons8-world-map-32.png" alt=""> Dirección: '. $resultado["Barrio"] .'</div>
                            </div>
                           
                            <div class="info">
                                <div class="left-text"><img src="../img/icons/icons8-skyscrapers-32.png" alt=""> Ciudad: '. $resultado["Provincia"] .'</div>
                                <div class="right-text"><img src="../img/icons/icons8-treasure-map-32.png" alt=""> Área: '. $resultado["Barrio"] .'</div>
                            </div>
                           
                        </div>

                        <div class="horizontal-divider"></div>

                        <div class="section">
                            <h2>Descripción General</h2>
                            <div class="info">
                                <div class="left-text">  <img src="../img/icons/icons8-id-verified-32.png" alt=""> Id Propiedad: '. $resultado["PropiedadID"] .'</div> 
                                <div class="right-text"> <img src="../img/icons/icons8-city-block-32.png" alt=""> Tipo de Propiedad: '. $resultado["TipoPropiedad"] .'</div>
                            </div>
                            <div class="info">
                                <div class="left-text"> <img src="../img/icons/icons8-bed-32.png" alt=""> Dormitorios: '. $resultado["Dormitorios"] .'</div> 
                                <div class="right-text"> <img src="../img/icons/icons8-toilet-room-32.png" alt=""> Baños: '. $resultado["Baños"] .'</div>
                            </div>
                            <div class="info">
                                 <div class="left-text"> <img src="../img/icons/icons8-car-32.png" alt=""> Estacionamientos: '. $resultado["Parkings"] .'</div> 
                                <div class="right-text"> <img src="../img/icons/icons8-size-32.png" alt="">Tamaño metros cuadrados: '. $resultado["Tamaño"] .' </div> 
                            </div>
                            <div class="info">
                                <div class="left-text"><img src="../img/icons/icons8-constructing-32.png" alt="">Año de Construcción: '. $resultado["AñoDeConstruccion"] .' </div>
                                <div class="right-text"></div>
                            </div>
                ';
                }
            }
?>

        <!-- Otras secciones similares -->
        <div class="google-maps">
         
            <!-- Contenedor para el mapa -->
            <div id="map"></div>

            <!-- Incluye la biblioteca Leaflet -->
            <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

            <!-- Script para inicializar el mapa -->
            <script>
                // Coordenadas del centro del mapa, variabilizar y traer del querie
                <?php 
                echo 'var center = ['. $resultado["Coordenada_x"] .', '. $resultado["Coordenada_y"] .'];';
                ?>
                
                // Crea el mapa y establece la vista
                var map = L.map('map').setView(center, 13);

                // Añade un mosaico de OpenStreetMap al mapa
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

                // Añade un marcador en el centro del mapa
                L.marker(center).addTo(map)
                    .bindPopup('Hola, este es el centro del mapa.');

                // Puedes añadir más capas, marcadores, etc. según tus necesidades
            </script>
        </div>
    </div>
    
    <?php 
        echo '
        <div class="horizontal-divider"></div>

        <div class="section">
            <h2>Descripción</h2>
            <p>'. $resultado["Descripcion"] .'</p>
            <br>
            <p>Mantenimiento: '. $resultado["Mantenimiento"] .' $</p>
        </div>

        <div class="horizontal-divider"></div> 
        </div>
        ';
    ?>    
  
<div class="contenedor-form">
<form action="sendEmailToAgent.php"  method="post">

    <div class="info-row">
        <div class="info-group">
            <label for="informacion"><h3>Información del contacto</h3></label>
          
        </div>
        <div class="btn-ver-listados">
            <button type="button" class="btn btn-dark">Ver Listados</button>
        </div>
    </div>

    <h4>Consultar sobre esta propiedad</h4>
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
            <label for="correo">Correo Electrónico</label>
            <input type="email" class="input-contact-us" id="correo" name="correo" placeholder="Introduzca su correo" required>
        </div>
    </div>

    <div class="mensaje-group">
        <label for="mensaje">Mensaje</label>
        <textarea class="form-control" id="mensaje" name="mensaje" rows="4" required>
            Estoy interesado en la propiedad 
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

<div class="contenedor-agente">
    <div class="agente-izquierdo">
        <img src="../img/agente.png" alt="Foto del agente">
        <br>
        <h4>Ismael Delgado Rodríguez </h4>
        <br> 
        <h5>Agente de ventas</h5>
        <br> 
        <h5>Grupo BienesRaices Paitilla</h5>
        <br>
    
        <p>El mejor agente de venta Grupo BienesRaices Punta Paitlla, frente al supermercado Kosher</p>
        <br>
        <h4>Télefono</h4>
        <div class="telefono-info">
            <br>
            <img src="../img/call-16.png" alt="Icono de teléfono"> 6159-4914
        
        </div>
        <br>
        <div class="telefono-info">
            <img src="../img/call-16.png" alt="Icono de teléfono" > 240-8842
        </div>

        <button class="btn-agente">Más anuncios de este vendedor</button>
    </div>

    <div class="agente-derecho">
        <h4>Horas de contacto</h4>
        <br>
        <h5> <img src="../img/icons8-time-16.png" alt=""> Hoy (Abierto)  00:00 - 00:00</h5>
            <br><br><br><br><br><br>
            <br>
            <p>Lunes 00:00 - 00:00</p>
            <p>Martes 00:00 - 00:00</p>
            <p>Miércoles 00:00 - 00:00</p>
            <p>Jueves 00:00 - 00:00</p>
            <p>Viernes 00:00 - 00:00</p>
            <p>Sábado 00:00 - 00:00</p>
            <p>Domingo 00:00 - 00:00</p>
            <br><br><br><br><br><br><br><br><br><br><br><br><br>
        <button class="btn-whatsapp">Enviar WhatsApp</button>
    </div>
</div>



<!-- Contenedor opaco -->
<div class="contenedor-form contenedor-opaco">
    <form action="sendEmailToAgent.php" method="post">

        <div class="info-row">
            <div class="info-group">
                <label for="informacion"><h3>Información del contacto</h3></label>
            </div>
            <div class="btn-ver-listados">
                <button type="button" class="btn btn-dark" disabled>Ver Listados</button>
            </div>
        </div>

        <h4>Para contactar al anunciante, inicia sesión</h4>

        <div class="form-row">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="input-contact-us" id="nombre" name="nombre" placeholder="Introduzca su nombre" required disabled>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" class="input-contact-us" id="telefono" name="telefono" placeholder="Introduzca su nombre" required disabled>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="correo">Correo Electrónico</label>
                <input type="email" class="input-contact-us" id="correo" name="correo" placeholder="Introduzca su correo" required disabled>
            </div>
        </div>

        <div class="mensaje-group">
            <label for="mensaje">Mensaje</label>
            <textarea class="form-control" id="mensaje" name="mensaje" rows="4" required disabled>
                Estoy interesado en la propiedad [Propiedad]
            </textarea>
        </div>

        <div class="checkbox-group">
            <input type="checkbox" id="acepto" name="acepto" required disabled>
            <label for="acepto"> Al enviar este formulario acepto términos y condiciones de uso</label>
        </div>

        <div class="form-row">
            <button type="submit" value="Enviar correo" class="btn-informacion" disabled>Información requerida</button>
        </div>

    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<?php include ("footer.php"); ?>