<?php
// ... tu código existente ...

// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibe los datos del formulario
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $email = $_POST["correo"];
    $contrasena = password_hash($_POST["contrasena"], PASSWORD_DEFAULT);

    // Genera un código de confirmación
    $codigoConfirmacion = generarCodigoAleatorio();

    // Inserta los datos en la base de datos (ajusta esto según tu estructura de BD)
    $stmt = $conn->prepare("INSERT INTO usuarios (nombre, apellido, correo, contrasena, codigo_confirmacion) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nombre, $apellido, $email, $contrasena, $codigoConfirmacion);

    if ($stmt->execute()) {
        // Envía el correo de confirmación
        enviarCorreoConfirmacion($email);

        // Envía una respuesta al cliente
        $respuesta = array("result" => "success");
        echo json_encode($respuesta);
    } else {
        // Manejo de errores al insertar en la base de datos
        $respuesta = array("result" => "error", "message" => "Error al registrar el usuario.");
        echo json_encode($respuesta);
    }

    $stmt->close();
}

$conn->close();
?>





