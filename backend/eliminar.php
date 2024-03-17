<?php
include("conexion.php");

// Obtener ID del registro a eliminar
$id = $_GET["id"];

// Eliminar registro de la base de datos
$sql = "DELETE FROM inscritos WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "Registro eliminado correctamente.";
} else {
    echo "Error al eliminar registro: " . $conn->error;
}

$conn->close();
?>
