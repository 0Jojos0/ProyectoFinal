<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Sena";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Checkear conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>