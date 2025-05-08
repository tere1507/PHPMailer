<?php
//Propósito: Centraliza la configuración para el envío de correo.

//configuracion del servidor de correo

// Configuración del servidor de correo
define('MAIL_HOST', 'smtp.gmail.com');
define('MAIL_PORT', 465);
define('MAIL_USERNAME', 'dulceirauga03@gmail.com');     // ← cambia esto
define('MAIL_PASSWORD', 'iaem ihvv xoth efvy');        // ← contrasena de aplicaciones de gmail no clave de gmail.
define('MAIL_FROM', 'dulceirauga03@gmail.com');
define('MAIL_FROM_NAME', 'Formulario Web');
define('MAIL_SECURE', 'ssl'); // Puedes usar 'tls' con puerto 587

// Análisis:
// Se definen constantes con define().
// Esto evita tener información sensible repetida en varios archivos.
// Si cambias el correo o la clave, lo haces solo aquí.

// Analysis:
// Constants are defined with define().
// This avoids having sensitive information repeated in several files.
// If you change the email or the password, you do it only here.
?>