<?php
$ruta_archivo = "../repositorios/{$_GET["download"]}/index.php";
$nombre_zip = $_GET["repo"] . '.zip';

$zip = new ZipArchive();

// Abrir el archivo ZIP para escribir
if ($zip->open($nombre_zip, ZipArchive::CREATE) === TRUE) {
    // Agregar el archivo a comprimir al archivo ZIP
    $zip->addFile($ruta_archivo, basename($ruta_archivo));

    // Cerrar el archivo ZIP
    $zip->close();

    // Cabeceras para descargar el archivo ZIP
    header('Content-Type: application/zip');
    header('Content-disposition: attachment; filename=' . $nombre_zip);
    header('Content-Length: ' . filesize($nombre_zip));

    // Enviar el archivo ZIP al navegador
    readfile($nombre_zip);

    // Eliminar el archivo ZIP después de la descarga
    unlink($nombre_zip);
} else {
    echo 'No se pudo crear el archivo ZIP.';
}
