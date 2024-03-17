<?php
include("conexion.php");

// Recibir datos del formulario
$nombre_completo = $_POST["nombre_completo"];
$apellido_completo = $_POST["apellido_completo"];
$documento = $_POST["documento"];
$tipo_documento = $_POST["tipo_documento"];
$rh = $_POST["rh"];

// Guardar datos en la base de datos
$sql = "INSERT INTO inscritos (nombre_completo, apellido_completo, documento, tipo_documento, rh) VALUES ('$nombre_completo', '$apellido_completo', '$documento', '$tipo_documento', '$rh')";

if ($conn->query($sql) === TRUE) {
    echo "Datos guardados correctamente.";
} else {
    echo "Error al guardar datos: " . $conn->error;
}

$conn->close();
?>