<?php
include("conexion.php");

// Recibir datos del formulario
$nombre_completo = $_POST["nombre_completo"];
$apellido_completo = $_POST["apellido_completo"];
$documento = $_POST["documento"];
$tipo_documento = $_POST["tipo_documento"];
$rh = $_POST["rh"];

// Procesar la foto
$foto_nombre = $_FILES['foto']['name'];
$foto_temp = $_FILES['foto']['tmp_name'];
$foto_ruta = "images/" . $foto_nombre;

// Mover la foto a la carpeta de imágenes
move_uploaded_file($foto_temp, $foto_ruta);

// Guardar datos en la base de datos
$sql = "INSERT INTO inscritos (nombre_completo, apellido_completo, documento, tipo_documento, rh, foto) VALUES ('$nombre_completo', '$apellido_completo', '$documento', '$tipo_documento', '$rh', '$foto_ruta')";

if ($conn->query($sql) === TRUE) {
    echo "Datos guardados correctamente.";
} else {
    echo "Error al guardar datos: " . $conn->error;
}

$conn->close();
?>