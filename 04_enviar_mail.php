<?php
//Propósito: Contiene la función que construye y envía el correo usando PHPMailer.

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

function enviarCorreo($datos) {
    $mail = new PHPMailer(true); ///crea una nueva instancia de PHPMailer es decir una maquina de enviar correo y true activa excepciones


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
        $mail->isHTML(true);//Le dice a PHPMailer que el contenido principal del email será en formato HTML.
        $mail->Subject = 'Contacto desde formulario - WEB';//Establece el asunto del correo electrónico.


        //Aquí se construye el contenido principal del email (la versión HTML) usando los datos que llegaron del formulario ($datos)
        //{$datos['nombre']}-->interpolacion de datos-->dice ve al array datos y busca el valor nombre que el usuario escribio y escribelo en esta misma posision.
        $mail->Body = "
        <strong>Nombre : </strong> {$datos['nombre']}<br>
        <strong>Apellidos : </strong>{$datos['apellido']}<br>
        <strong>Email : </strong> {$datos['email']}<br>
        <strong>Telefono : </strong> {$datos['telefono']}<br>
        <strong>Observaciones : </strong><br>" . nl2br($datos['observaciones']);//nl2br() es útil aquí para convertir 
        //los saltos de línea que el usuario pueda haber puesto en el textarea de observaciones (\n) en etiquetas HTML <br> para que se visualicen correctamente en el email HTML.


        //Crea una versión alternativa del cuerpo del email en texto plano., Similar a $mail->Body, usa interpolación de variables, pero usa \n para los saltos 
        //de línea en lugar de <br>, ya que es texto plano. No necesita nl2br aquí.Proporciona un contenido legible para clientes de correo que no interpretan HTML, o como respaldo.
        $mail->AltBody = "Nombre : {$datos['nombre']}\nApellido : {$datos['apellido']}\nEmail : {$datos['email']}\nTelefono : {$datos['telefono']}\nObservaciones : {$datos['observaciones']}";

        $mail->send();//Llama al método send() del objeto $mail

        return true;//La función enviarCorreo reporta este éxito retornando el valor booleano true al script que la llamó (02_procesar_formulario.php).

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