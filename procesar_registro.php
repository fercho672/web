<?php
// ... tu código existente ...

// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibe los datos del formulario
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $email = $_POST["correo"];
    $contrasena = $_POST["contrasena"];

    // Genera un código de confirmación
    $codigoConfirmacion = generarCodigoAleatorio();

    // Inserta los datos en la base de datos (ajusta esto según tu estructura de BD)
    $stmt = $conn->prepare("INSERT INTO usuarios (nombre, apellido, correo, contrasena, codigo_confirmacion) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nombre, $apellido, $email, $contrasena, $codigoConfirmacion);

    if ($stmt->execute()) {
        // Envía el correo de confirmación
        $para = $email;
        $asunto = "Confirmación de Registro en Paid Taxi";
        $mensaje = "¡Gracias por registrarte en Paid Taxi! Tu código de confirmación es: $codigoConfirmacion";

        // Ajusta estos valores según tu configuración de Email.js
        $usuario_emailjs = "user_ayJFj7Wg1PyKi7YUN2fJR";
        $template_emailjs = "template_1ivqvxn";
        $servicio_emailjs = "service_9de3y3i";

        // Envía el correo a través de Email.js
        $emailjs_url = "https://api.emailjs.com/api/v1.0/email/send";
        $data = array(
            'service_id' => $servicio_emailjs,
            'template_id' => $template_emailjs,
            'user_id' => $usuario_emailjs,
            'template_params' => json_encode(array('to_email' => $para, 'subject' => $asunto, 'message' => $mensaje))
        );

        $options = array(
            'http' => array(
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data),
            ),
        );

        $context = stream_context_create($options);
        $result = file_get_contents($emailjs_url, false, $context);

        if ($result !== FALSE) {
            // Redirige a la página de confirmación
            header("Location: pagina3.html");
            exit;
        } else {
            // Manejo de errores al enviar el correo
            echo "Error al enviar el correo de confirmación.";
        }
    } else {
        // Manejo de errores al insertar en la base de datos
        echo "Error al registrar el usuario.";
    }

    $stmt->close();
}

$conn->close();
?>




