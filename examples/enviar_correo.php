<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $mensaje = $_POST["mensaje"];

    $destinatario = "destinatario@example.com";
    $asunto = "Nuevo mensaje de contacto de $nombre";
    $correoNoReply = "noreply@example.com";

    $cuerpoMensaje = "Nombre: $nombre\n";
    $cuerpoMensaje .= "Correo electrónico: $email\n";
    $cuerpoMensaje .= "Mensaje:\n$mensaje";

    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Cambia esto al servidor SMTP que estés utilizando
        $mail->SMTPAuth = true;
        $mail->Username = 'bienesraciesds7@gmail.com';
        $mail->Password = 'Prueba123##';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Configuración del mensaje
        $mail->setFrom($correoNoReply);
        $mail->addAddress($destinatario);
        $mail->Subject = $asunto;
        $mail->Body = $cuerpoMensaje;

        // Envía el correo
        $mail->send();
        echo "El mensaje ha sido enviado correctamente.";
    } catch (Exception $e) {
        echo "Error al enviar el mensaje. Detalles del error: {$mail->ErrorInfo}";
    }
} else {
    echo "Acceso denegado.";
}
?>
