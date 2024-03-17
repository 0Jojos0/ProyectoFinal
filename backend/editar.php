<?php
include("conexion.php");

// Obtener ID del registro a editar
$id = $_GET["id"];

// Obtener datos del registro
$sql = "SELECT * FROM inscritos WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Registro - Impresión de Carnets</title>
    <link rel="stylesheet" href="frontend/css/estilos.css">
</head>
<body>
    <div class="container">
        <h1>Editar Registro</h1>
        <form action="actualizar.php" method="post">
            <input type="hidden" id="id" name="id" value="<?php echo $row["id"]; ?>">
            <label for="nombre_completo">Nombre completo:</label>
            <input type="text" id="nombre_completo" name="nombre_completo" value="<?php echo $row["nombre_completo"]; ?>">
            <label for="apellido_completo">Apellido completo:</label>
            <input type="text" id="apellido_completo" name="apellido_completo" value="<?php echo $row["apellido_completo"]; ?>">
            <label for="documento">Documento de identidad:</label>
            <input type="text" id="documento" name="documento" value="<?php echo $row["documento"]; ?>" >
            <label for="tipo_documento">Tipo de documento:</label>
            <select id="tipo_documento" name="tipo_documento">
                <option value="CC" <?php if ($row["tipo_documento"] == "CC") echo "selected"; ?>>Cédula de Ciudadanía</option>
                <option value="CE" <?php if ($row["tipo_documento"] == "CE") echo "selected"; ?>>Cédula de Extranjería</option>
                <option value="TI" <?php if ($row["tipo_documento"] == "TI") echo "selected"; ?>>Tarjeta de Identidad</option>
            </select>
            <label for="rh">RH:</label>
            <input type="text" id="rh" name="rh" value="<?php echo $row["rh"]; ?>">
            <button type="submit">Actualizar</button>
        </form>
    </div>
</body>
</html>
