<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];
    $confirmarContrasena = $_POST["confirmar_contrasena"];

    // Validar datos aquí...

    // Enviar correo de confirmación (necesitarás configurar un servidor de correo o usar un servicio de envío de correo)
    $asunto = "Confirmación de Registro en Paid Taxi";
    $mensaje = "¡Gracias por registrarte en Paid Taxi, $nombre $apellido! Tu registro ha sido confirmado.";

    // Ajusta la siguiente línea para configurar el remitente y el encabezado del correo
    mail($correo, $asunto, $mensaje, 'From: tu@email.com');

    // Puedes redirigir a una página de confirmación después de enviar el correo
    header("Location: confirmacion_registro.html");
    exit;
}
?>


