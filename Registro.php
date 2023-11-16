<!DOCTYPE html>
<html lang="es">
<head>
    <!-- ... tus encabezados existentes ... -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Agrega jQuery para facilitar las solicitudes AJAX -->
    <script src="https://cdn.emailjs.com/dist/email.min.js"></script>
    <!-- Agrega Email.js para enviar correos electrónicos -->
    <script>
        emailjs.init("ayJFj7Wg1PyKi7YUN2fJR"); // Reemplaza "tu_user_id" con tu ID de usuario de Email.js

        function enviarCorreoConfirmacion(emailDestino) {
            // Configura el contenido del correo
            var contenidoCorreo = {
                to_email: emailDestino,
                subject: "Confirmación de Registro",
                message: "¡Gracias por registrarte en Paid Taxi! Tu registro ha sido exitoso.",
            };

            // Envía el correo
            emailjs.send("service_9de3y3i", "template_1ivqvxn", contenidoCorreo)
                .then(function(response) {
                    console.log("Correo enviado con éxito", response);
                })
                .catch(function(error) {
                    console.log("Error al enviar el correo", error);
                });
        }
    </script>
    <title>Paid Taxi</title>
</head>
<!-- ... resto de tu HTML ... -->
</html>
