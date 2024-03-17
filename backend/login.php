<?php
include("conexion.php");

// Recibir datos del formulario
$email = $_POST["email"];
$documento = $_POST["documento"];

// Validar usuario
$sql = "SELECT * FROM estudiantes WHERE email = '$email' AND documento = '$documento'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Usuario encontrado, redirigir a página de estudiante
    header("Location: estudiante.php");
} else {
    // Usuario no encontrado, redirigir a página de error
    header("Location: error.php");
}

$conn->close();
?>
