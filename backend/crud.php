<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="frontend/css/estilos.css">
</head>
<body>
<?php
include("conexion.php");

// Mostrar tabla de inscritos
$sql = "SELECT id, nombre_completo, apellido_completo, documento, tipo_documento, rh, foto FROM inscritos";
$result = $conn->query($sql);

echo "<table>";
echo "<tr><th>Nombre completo</th><th>Apellido completo</th><th>Documento</th><th>Tipo documento</th><th>RH</th><th>Acciones</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["nombre_completo"] . "</td>";
    echo "<td>" . $row["apellido_completo"] . "</td>";
    echo "<td>" . $row["documento"] . "</td>";
    echo "<td>" . $row["tipo_documento"] . "</td>";
    echo "<td>" . $row["rh"] . "</td>";
    echo "<td>";
    echo "<a href='editar.php?id=" . $row["id"] . "'>Editar</a> | ";
    echo "<a href='eliminar.php?id=" . $row["id"] . "'>Eliminar</a> | ";
    echo "<a href='generar_pdf.php'>Generar PDF</a>"; // Nuevo enlace para generar carnet
    echo "</td>";
    echo "</tr>";
}
echo "</table>";

$conn->close();
?>

</body>
</html>

