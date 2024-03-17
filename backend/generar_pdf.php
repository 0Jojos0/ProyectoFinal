<?php
include("conexion.php");
require_once('tcpdf/tcpdf.php');

// Carpeta donde se guardarán los archivos PDF
$carpeta_pdf = 'pdf_carnets/';

// Verificar si la carpeta existe, si no, crearla
if (!file_exists($carpeta_pdf)) {
    mkdir($carpeta_pdf, 0777, true);
}

// Obtener datos de los inscritos
$sql = "SELECT * FROM inscritos";
$result = $conn->query($sql);

// Recorrer registros y agregarlos al PDF
while ($row = $result->fetch_assoc()) {
    // Crear una nueva instancia de TCPDF
    $pdf = new TCPDF('P', 'mm', array(196, 365), true, 'UTF-8', false);
    
    // Establecer propiedades del documento
    $pdf->SetCreator('Impresión de Carnets');
    $pdf->SetAuthor('Nombre de su Autor');
    $pdf->SetTitle('Carnet de Estudiante');
    $pdf->SetSubject('Carnet');
    $pdf->SetKeywords('carnet, estudiante, sena');

    // Agregar una página al documento
    $pdf->AddPage();

    // Obtener el ancho y alto de la imagen de la plantilla de carnet
    list($width, $height) = getimagesize('ada.PNG');

    // Cargar la plantilla de carnet como imagen de fondo en el documento PDF
    $pdf->Image('ada.PNG', 0, 0, $width, $height, '', '', '', false, 300, '', false, false, 0);

    // Imagen del estudiante
    if ($row["foto"] != "") {
        $pdf->Image($row["foto"], 10, 20, 40, 40);
    }

    $pdf->SetTextColor(0, 128, 0);

    // Información del estudiante (convertir a mayúsculas)
    $nombre_completo = strtoupper($row["nombre_completo"]);
    $apellido_completo = strtoupper($row["apellido_completo"]);

    // Color de texto para nombre_completo y apellido_completo (verde)

    $pdf->SetFont('helvetica', '', 30);
    $pdf->Text(20, 160, $nombre_completo);
    $pdf->Text(20, 175, $apellido_completo);

    // Restablecer el color de texto a negro para los campos restantes (documento y rh)
    $pdf->SetTextColor(0, 0, 0); // Negro

    $documento = strtoupper($row["documento"]);

    // Ajustamos otros campos a mayúsculas si es necesario
    $rh = strtoupper($row["rh"]);

    $pdf->SetFont('helvetica', '', 30);
    $pdf->Text(44, 198.7, $documento);
    $pdf->Text(38, 224.5, $rh);

    // Nombre del archivo PDF de salida
    $nombre_pdf = 'carnet_' . str_replace(' ', '_', $row["nombre_completo"]) . '.pdf';
    $pdf_file = $carpeta_pdf . $nombre_pdf;

    // Guardar el PDF en la carpeta especificada
    if (is_writable($carpeta_pdf)) {
        // Generar la ruta absoluta al archivo PDF
        $pdf_path = realpath($carpeta_pdf) . DIRECTORY_SEPARATOR . $nombre_pdf;
        // Guardar el PDF en la ruta especificada
        $pdf->Output($pdf_path, 'F');
    } else {
        die('La carpeta de destino no tiene permisos de escritura.');
    }
}

$conn->close();
?>
