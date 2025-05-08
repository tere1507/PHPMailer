<?php
require 'vendor/autoload.php';// Incluir el autoloader de Composer
require_once '03_config_mail.php'; //carga configuracion
require_once '04_enviar_mail.php'; //cargar la funcion de envio

//confirmar si el formulario que se solicito se envio mediante el metodo de envio post
if( $_SERVER['REQUEST_METHOD'] === 'POST') {//server - request -contiene el metodo usado y lo compara si es post ejecuta el codigo
    $datos = [#creamos un array asociativo
        'nombre' => $_POST['nombre'] ?? '',  //Clave 'nombre', Valor: $_POST['nombre']-->este a la vez contiene el valor de 'nombre' que le usuario relleno
        'apellido' => $_POST['apellido'] ?? '',//usamos ?? '' , para evitar el Undefined array key Warning si algun campo esta ausente en el post
        'email' => $_POST['email'] ?? '',
        'telefono' => $_POST['telefono'] ?? '',
        'observaciones' => $_POST['observaciones'] ?? '',
    ];

    $resultado = enviarCorreo($datos);//esta es una excelente demostración de abstracción y delegación. 

    if($resultado === true) {
        echo "<p style='color:green'>Congratulations, your details have been sent, someone will call you shortly.</p>";
    } else {
        echo "<p style='color:red'>Error sending your data : " . $resultado . "</p>";
    }
}else {
    echo "<p style='color:red'>Access not allowed </p>";
}

echo "<a href='01_formulario.php'>Back to form</a>";

#Analisis:
#Se valida que el acceso esa por post
#se organiza la informacion recibida en un array asociativo llamado $datos
#se llama a la funcion enviarCorreos para enviar el correo
#devuelve un mgs segun si puedo enviar o no

// Analysis:
// We validate that the access is by post
// organize the received information in an associative array called $data
// we call the function sendPost to send the mail
// it returns a msg according to the result that if I can send or not.
?>