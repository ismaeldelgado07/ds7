<?php
// Verifica si se ha recibido una solicitud POST y si se proporciona un parámetro específico
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['accion'])) {
    // Determina la acción solicitada
    $accion = $_POST['accion'];

    // Llama a la función correspondiente según la acción
    if ($accion === 'miFuncion') {
        miFuncion();
    } elseif ($accion === 'otraFuncion') {
        otraFuncion();
    }
    // Agrega más funciones según sea necesario
}

// Ejemplo de función
function miFuncion() {
    echo "¡La función miFuncion ha sido llamada!";
}

// Otra función de ejemplo
function otraFuncion() {
    echo "¡La función otraFuncion ha sido llamada!";
}
?>
