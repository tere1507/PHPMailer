<?php
//Propósito: Contiene la función que construye y envía el correo usando PHPMailer.

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

function enviarCorreo($datos) {
    $mail = new PHPMailer(true); //true activa excepciones

    try{
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host = MAIL_HOST;
        $mail->SMTPAuth = true;
        $mail->Username = MAIL_USERNAME;
        $mail->Password = MAIL_PASSWORD;
        $mail->SMTPSecure = MAIL_SECURE;
        $mail->Port = MAIL_PORT;

        //informacio del remitente
        $mail->setFrom(MAIL_FROM, MAIL_FROM_NAME);

        //destinatario aqui puedes cambiar o usar el mismo correo
        $mail->addAddress(MAIL_FROM, 'contacto');

        //contenido del mensaje
        $mail->isHTML(true);
        $mail->Subject = 'Contacto desde formulario - WEB';

        $mail->Body = "
        <strong>Nombre : </strong> {$datos['nombre']}<br>
        <strong>Apellidos : </strong>{$datos['apellido']}<br>
        <strong>Email : </strong> {$datos['email']}<br>
        <strong>Telefono : </strong> {$datos['telefono']}<br>
        <strong>Observaciones : </strong><br>" . nl2br($datos['observaciones']);

        $mail->AltBody = "Nombre : {$datos['nombre']}\nApellido : {$datos['apellido']}\nEmail : {$datos['email']}\nTelefono : {$datos['telefono']}\nObservaciones : {$datos['observaciones']}";

        $mail->send();
        return true;
    } catch(Exception $e) {
        return $mail->ErrorInfo;
    }
}

// Análisis paso a paso:
// use importa clases de PHPMailer para poder usarlas con su nombre corto (PHPMailer).
// Se instancia el objeto $mail = new PHPMailer(true) con manejo de errores.
// Se configuran los parámetros SMTP con los valores definidos en config_mail.php.
// setFrom() define quién envía el correo.
// addAddress() define a quién se lo mandas (puede ser el mismo).
// isHTML(true) indica que el cuerpo puede tener HTML.
// El mensaje se arma combinando texto y variables de $datos.
// try/catch captura errores de envío y devuelve un mensaje de error.
?>