<?php
$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$base_datos = "paid_taxi_db";

// Crear la conexión
$conexion = new mysqli($servidor, $usuario, $contrasena, $base_datos);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
?>


