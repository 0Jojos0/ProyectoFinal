<?php
// crud.php

include("conexion.php");

// Obtener la lista de cursos
$sql_cursos = "SELECT id, nombre, numFicha FROM cursos";
$result_cursos = $conn->query($sql_cursos);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - Impresión de Carnets</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <div class="container">
        <h1>CRUD</h1>

        <!-- Mostrar lista de cursos -->
        <ul>
            <?php
            if ($result_cursos->num_rows > 0) {
                while ($row_curso = $result_cursos->fetch_assoc()) {
                    echo "<li>";
                    echo "<a href='crud.php?curso_id=" . $row_curso['id'] . "'>";
                    echo $row_curso['nombre'] . " - Ficha: " . $row_curso['numFicha'];
                    echo "</a>";
                    echo "</li>";
                }
            } else {
                echo "<li>No hay cursos disponibles</li>";
            }
            ?>
        </ul>

        <!-- Mostrar estudiantes inscritos en el curso seleccionado -->
        <?php
        if (isset($_GET['curso_id'])) {
            $curso_id = $_GET['curso_id'];
            $sql_estudiantes = "SELECT * FROM inscritos WHERE id_curso = $curso_id";
            $result_estudiantes = $conn->query($sql_estudiantes);

            echo "<h2>Estudiantes inscritos en el curso</h2>";
            echo "<table>";
            echo "<tr><th>Nombre completo</th><th>Documento</th><th>Tipo de documento</th><th>RH</th><th>Acciones</th></tr>";
            while ($row_estudiante = $result_estudiantes->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row_estudiante["nombre_completo"] . " " . $row_estudiante["apellido_completo"] . "</td>";
                echo "<td>" . $row_estudiante["documento"] . "</td>";
                echo "<td>" . $row_estudiante["tipo_documento"] . "</td>";
                echo "<td>" . $row_estudiante["rh"] . "</td>";
                echo "<td>";
                echo "<a href='editar.php?id=" . $row_estudiante["id"] . "'>Editar</a> | ";
                echo "<a href='eliminar.php?id=" . $row_estudiante["id"] . "'>Eliminar</a> | ";
                echo "<a href='estudiante.php?id=" . $row_estudiante["id"] . "'>Crear estudiante</a> | ";
                echo "<a href='generar_pdf.php" . $row_estudiante["id"] . "'>Generar PDF</a>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        ?>
        <a href="estudiante.php">Crear nuevo estudiante</a> <!-- Agregar enlace para crear nuevo estudiante -->
    </div>
</body>
</html>

<?php
$conn->close();
?>
