<?php
$carpeta = "";
$repositorio = $_SESSION["usuario"]->correo;
$ruta = "repositorios/" . $repositorio;
if (isset($_GET["carpeta"])) {
    $carpeta = $_GET["carpeta"];
    $ruta = "repositorios/$repositorio/$carpeta";
}
?>

<section id="repositorio">
    <section id="contenidoRepositorio">
        <?php
        $archivos = glob($ruta . '/*');
        $extensionesComprimidas = array('zip', 'rar', 'tar', 'gz');
        echo "<ul>";
        echo "<li><a href=\"dashboard.php?repositorio\">. . / <i class=\"bi bi-folder\"></i></a><a href=\"php/download.php?repo={$_SESSION["usuario"]->correo}\"><i class=\"bi bi-braces\"></i> Code</i></a></li>";
        foreach ($archivos as $archivo) {
            $nombre = basename($archivo);
            if (is_dir($archivo)) {
                echo "<li><i class=\"bi bi-folder\"></i> <a href=\"dashboard.php?repositorio&carpeta={$nombre}\">" . basename($archivo) . "</a></li>";
            }
        }

        foreach ($archivos as $archivo) {
            $extension = pathinfo($archivo, PATHINFO_EXTENSION);
            $nombre = basename($archivo);
            if (is_file($archivo) && !in_array($extension, $extensionesComprimidas)) {
                echo "<li><i class=\"bi bi-file-code-fill\"></i> <a href=\"dashboard.php?repositorio&archivo={$nombre}&carpeta={$carpeta}\">" . basename($archivo) . "</a></li>";
            }
        }

        foreach ($archivos as $archivo) {
            $extension = pathinfo($archivo, PATHINFO_EXTENSION);
            if (in_array($extension, $extensionesComprimidas)) {
                echo "<li><i class=\"bi bi-file-earmark-zip\"></i> " . basename($archivo) . "</li>";
            }
        }
        echo "</ul>";
        ?>
    </section>

    <section id="view">
        <?php
        if (isset($_GET["archivo"])) {
            $rutaCompleta = $ruta . "/" . $_GET["archivo"];
            $contenido = file_get_contents($rutaCompleta);
            echo "<pre>" . htmlspecialchars($contenido) . "<br><br></pre>";

        }

        ?>
    </section>

</section>