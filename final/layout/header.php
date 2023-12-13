<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BienesRaices</title>
    <link rel="icon" type="image/png" href="../img/building-ios-16-16.png">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/slideshow.css">
    <link rel="stylesheet" href="../css/propertie.css">
    <link rel="stylesheet" href="../css/search.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
                function enviarParametro(propiedadID) {
                    let endpoint = `propertie.php?propertieID=${propiedadID}`
                    console.log('propertie : ' , propiedadID ); // Para comprobar que estamos armando el url correctamente
                    document.location = endpoint
                    }
            </script>
    
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />


</head>
    <body>
        <div class="container-header">
            <div class="centered-title"><h1> <span class="bold-text" >Bienes</span><span class="normal-text">Raices</span> </h1></div>
            <div class="centered-p"><p>Tenemos tu nuevo Hogar</p></div>
        </div>

        <div class="topnav">
            <a class="active" href="index.php">Inicio</a>
            <a href="#contact">Nosotros</a>
            <a href="#contact">Agentes</a>
            <a href="#contact">Contactanos</a>
            <a href="#contact">Trabaja con nosotros</a>
            <a href="search.php">Buscar</a>
            <a href="login.php" class="split">Iniciar sesión</a>
        </div>
     
        <div class="block">
            <center>
                <h1>
                    <span class="bold-text" >Bienes</span><span class="normal-text">Raices</span>
                </h1>
            </center>
        </div>

        

        