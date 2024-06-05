<?php
if (isset($_GET["repo"])) {
    $carpeta_a_descargar = "../repositorios/{$_GET["repo"]}/"; // Carpeta que deseas descargar
    $nombre_zip = $_GET["repo"] . '.zip'; // Nombre del archivo ZIP

    // Crear un archivo ZIP de la carpeta
    $zip = new ZipArchive();
    if ($zip->open($nombre_zip, ZipArchive::CREATE) === TRUE) {
        agregar_carpeta_a_zip($carpeta_a_descargar, $zip);
        $zip->close();
    }

    // Descargar el archivo ZIP
    if (file_exists($nombre_zip)) {
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($nombre_zip) . '"');
        header('Content-Length: ' . filesize($nombre_zip));
        readfile($nombre_zip);
        // Eliminar el archivo ZIP después de descargarlo
    }
    unlink($nombre_zip);
}


// Función para agregar una carpeta a un archivo ZIP
function agregar_carpeta_a_zip($carpeta, $zip)
{
    $archivos = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($carpeta),
        RecursiveIteratorIterator::LEAVES_ONLY
    );

    foreach ($archivos as $nombre => $archivo) {
        // Ignorar "." y ".."
        if (!$archivo->isDir()) {
            $archivo_real = $archivo->getRealPath();
            $archivo_rel = substr($archivo_real, strlen($carpeta) + 1);
            $zip->addFile($archivo_real, $archivo_rel);
        }
    }

    
}
