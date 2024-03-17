<?php
include("conexion.php");

// Recibir datos del formulario
$id = $_POST["id"];
$nombre_completo = $_POST["nombre_completo"];
$apellido_completo = $_POST["apellido_completo"];
$documento = $_POST["documento"];
$tipo_documento = $_POST["tipo_documento"];
$rh = $_POST["rh"];

// Actualizar datos en la base de datos
$sql = "UPDATE inscritos SET nombre_completo = '$nombre_completo', apellido_completo = '$apellido_completo', documento = '$documento' , tipo_documento = '$tipo_documento', rh = '$rh' WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "Registro actualizado correctamente.";
} else {
    echo "Error al actualizar registro: " . $conn->error;
}

$conn->close();
?>
