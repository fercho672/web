<script>
    emailjs.init("ayJFj7Wg1PyKi7YUN2fJR"); // Reemplaza "tu_user_id" con tu ID de usuario de Email.js

    function enviarCorreoConfirmacion(emailDestino) {
        // Configura el contenido del correo
        var contenidoCorreo = {
            to_email: emailDestino,
            subject: "Confirmación de Registro",
            message: "¡Gracias por registrarte en Paid Taxi! Tu registro ha sido exitoso.",
        };

        // Envía el correo utilizando tu template_id
        emailjs.send("service_9de3y3i", "template_1ivqvxn", contenidoCorreo)
            .then(function(response) {
                console.log("Correo enviado con éxito", response);
            })
            .catch(function(error) {
                console.log("Error al enviar el correo", error);
            });
    }
</script>
