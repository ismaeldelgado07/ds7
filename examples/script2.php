<?php
 
/*
* Write your logic to manage the data
* like storing data in database
*/
 
// Inicializa el array con valores por defecto
$data = array(
    'name' => '',
    'email' => null,
    'message' => null
);

// Verifica si las claves existen en la solicitud POST
if (isset($_POST['firstName']) && isset($_POST['lastName'])) {
    $data['name'] = $_POST['firstName'] . " " . $_POST['lastName'];
}

if (isset($_POST['email'])) {
    $data['email'] = $_POST['email'];
}

if (isset($_POST['message'])) {
    $data['message'] = $_POST['message'];
}

// Retorna el array como JSON
echo json_encode($data);
exit;
?>