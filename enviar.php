<?php
// Configura tu dirección de destino
$destinatario = "alejandrobjosch@gmail.com"; // <-- Cambia por tu email

// Recoge y filtra los datos
$nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$mensaje = isset($_POST['mensaje']) ? trim($_POST['mensaje']) : '';

// Validación
if ($nombre && $email && $mensaje && filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $asunto = "Mensaje de contacto AdsMedia Estudio";
    $contenido = "Nombre: $nombre\nEmail: $email\nMensaje:\n$mensaje";
    $headers = "From: $email\r\nReply-To: $email\r\n";

    if (mail($destinatario, $asunto, $contenido, $headers)) {
        // Mensaje de éxito y redirección tras 4 segundos
        echo "<!DOCTYPE html>
        <html lang='es'>
        <head>
          <meta charset='utf-8'>
          <meta name='viewport' content='width=device-width,initial-scale=1'>
          <title>Mensaje enviado</title>
          <style>
            body{background:#181818;font-family:'Poppins',sans-serif;color:#fff;text-align:center;padding-top:90px;}
            .msg{background:#1d1d1d;padding:30px 26px;border-radius:12px;display:inline-block;box-shadow:0 2px 8px #0003;}
            h3{color:#ff6f00;margin-top:0;}
            a{color:#ff6f00;text-decoration:underline;margin-top:20px;display:block;}
          </style>
          <meta http-equiv='refresh' content='4;url=index.html'>
        </head>
        <body>
          <div class='msg'>
            <h3>¡Tu mensaje se ha enviado exitosamente!</h3>
            <p>Gracias por contactarnos. Te respondemos pronto.<br>Serás redirigido en unos segundos</p>
            <a href='index.html'>Volver manualmente</a>
          </div>
        </body>
        </html>";
        exit;
    } else {
        $error = "Hubo un error al enviar tu mensaje. Por favor, intenta nuevamente.";
    }
} else {
    $error = "Por favor, completa todos los campos y utiliza un correo válido.";
}

// Mensaje de error con estilos y redirección lenta (7 s)
echo "<!DOCTYPE html>
<html lang='es'>
<head>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width,initial-scale=1'>
  <title>Error al enviar</title>
  <style>
    body{background:#181818;font-family:'Poppins',sans-serif;color:#fff;text-align:center;padding-top:90px;}
    .msg{background:#1d1d1d;padding:30px 26px;border-radius:12px;display:inline-block;box-shadow:0 2px 8px #0003;}
    h3{color:#ff6f00;margin-top:0;}
    a{color:#ff6f00;text-decoration:underline;margin-top:20px;display:block;}
  </style>
  <meta http-equiv='refresh' content='7;url=index.html'>
</head>
<body>
  <div class='msg'>
    <h3>$error</h3>
    <a href='index.html'>Volver</a>
  </div>
</body>
</html>";
?>
