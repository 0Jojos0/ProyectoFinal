<?php
include("conexion.php");

// Obtener ID del registro a eliminar
$id = $_GET["id"];

// Obtener la foto del estudiante antes de eliminarlo
$sql_foto = "SELECT foto FROM inscritos WHERE id = $id";
$result_foto = $conn->query($sql_foto);
$row_foto = $result_foto->fetch_assoc();
$foto_a_borrar = $row_foto['foto'];

// Eliminar registro de la base de datos
$sql = "DELETE FROM inscritos WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    if (file_exists($foto_a_borrar)) {
        unlink($foto_a_borrar);
        echo "Foto eliminada correctamente.";
    } else {
        echo "Foto no encontrada.";
    }
    echo "Registro eliminado correctamente.";
} else {
    echo "Error al eliminar registro: " . $conn->error;
}

$conn->close();
?>
