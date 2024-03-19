<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si el formulario de estudiante fue enviado
    if (isset($_POST["email"]) && isset($_POST["documento"])) {
        $email = $_POST["email"];
        $documento = $_POST["documento"];

        // Consultar si el estudiante existe en la base de datos (usando consultas preparadas)
        $stmt = $conn->prepare("SELECT * FROM estudiantes WHERE email = ? AND documento = ?");
        $stmt->bind_param("ss", $email, $documento);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Usuario encontrado, redirigir a página de estudiante
            header("Location: estudiante.php");
            exit(); // Detener la ejecución del script después de redirigir
        } else {
            // Usuario no encontrado, redirigir a página de error
            header("Location: error.php");
            exit(); // Detener la ejecución del script después de redirigir
        }
    }

    // Verificar si el formulario de funcionario fue enviado
    if (isset($_POST["correo"]) && isset($_POST["contrasena"])) {
        $correo = $_POST["correo"];
        $contrasena = $_POST["contrasena"];

        // Consultar si el funcionario existe en la base de datos (usando consultas preparadas)
        $stmt = $conn->prepare("SELECT * FROM funcionarios WHERE correo = ? AND contrasena = ?");
        $stmt->bind_param("ss", $correo, $contrasena); // Recuerda usar hash de contraseñas en producción
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Funcionario encontrado, redirigir a página de CRUD
            header("Location: crud.php");
            exit(); // Detener la ejecución del script después de redirigir
        } else {
            // Funcionario no encontrado, redirigir a página de error
            header("Location: error.php");
            exit(); // Detener la ejecución del script después de redirigir
        }
    }
}

$conn->close();
?>
