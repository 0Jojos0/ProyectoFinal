<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir datos del formulario
    $email = $_POST["email"];
    $documento = $_POST["documento"];

    // Consultar si el estudiante existe en la base de datos
    $sql = "SELECT * FROM estudiantes WHERE email = '$email' AND documento = '$documento'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Usuario encontrado, redirigir a página de estudiante
        header("Location: estudiante.php");
        exit(); // Importante: detener la ejecución del script después de redirigir
    } else {
        // Usuario no encontrado, redirigir a página de error
        header("Location: error.php");
        exit(); // Importante: detener la ejecución del script después de redirigir
    }
}

$conn->close();
?>
