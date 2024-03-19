<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudiante - Impresión de Carnet</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <div class="container">
        <h1>Estudiante</h1>
        <form action="guardar.php" method="post" enctype="multipart/form-data">
            <label for="nombre_completo">Nombre completo:</label>
            <input type="text" id="nombre_completo" name="nombre_completo" required>
            <label for="apellido_completo">Apellido completo:</label>
            <input type="text" id="apellido_completo" name="apellido_completo" required>
            <label for="documento">Documento de identidad:</label>
            <input type="text" id="documento" name="documento" required>
            <label for="tipo_documento">Tipo de documento:</label>
            <select id="tipo_documento" name="tipo_documento">
                <option value="CC">Cédula de Ciudadanía</option>
                <option value="CE">Cédula de Extranjería</option>
                <option value="TI">Tarjeta de Identidad</option>
            </select>
            <label for="rh">RH:</label>
            <input type="text" id="rh" name="rh" required>
            <label for="foto">Foto:</label>
            <input type="file" id="foto" name="foto" accept="image/*">
            <button type="submit">Guardar</button>
        </form>
    </div>
</body>
</html>
