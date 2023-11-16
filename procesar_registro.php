<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los datos del formulario
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $email = $_POST["correo"];
    $contraseña = $_POST["contrasena"];

    // Realiza el procesamiento necesario, como almacenar en una base de datos

    // Envia el correo de confirmación
    $to = $email;
    $subject = "Confirmación de Registro";
    $message = "Gracias por registrarte, $nombre $apellido. Tu registro ha sido confirmado.";
    $headers = "From: tu@email.com";

    mail($to, $subject, $message, $headers);

    // Redirige a la página3.html
    header("Location: pagina3.html");
    exit();
}
?>



