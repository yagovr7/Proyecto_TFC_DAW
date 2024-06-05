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
        <form action="php/modificador.php" method="POST" id="subirCarpeta">
            <input type="text" name="carpeta" placeholder="New Directory" required>
            <input type="hidden" name="ruta" value="<?php echo $ruta?>">
            <label for="enviarCarpeta" style="cursor: pointer"><i class="bi bi-folder-plus"></i></label>
            <input type="submit" id="enviarCarpeta" style="display: none">
        </form>
        <?php
        $repositorio = $_SESSION["usuario"]->correo;
        $archivos = glob($ruta . '/*');
        $extensionesComprimidas = array('zip', 'rar', 'tar', 'gz');
        echo '<form action="php/modificador.php" method="post" enctype="multipart/form-data" id="formArchivos">
        <input type="file" name="archivos[]" id="archivos" multiple style="display: none;">
        <label for="archivos">Archivos</label>
        <label for="subir"><i class="bi bi-cloud-arrow-up"></i><input type="submit" value="Subir" id="subir" name="subirArchivos"></label>';
        echo "<input type=\"hidden\" name=\"repositorio\" value=\"$ruta\">";
        echo "<a href=\"php/download.php?repo={$repositorio}\"><i class=\"bi bi-cloud-arrow-down\"></i></a>";
        echo "<a href=\"php/modificador.php?eliminarRepo={$_SESSION["usuario"]->correo}\" id=\"ados\"><i class=\"bi bi-trash\"></i></a>";
        echo "</form>";
        echo "<ul>";
        echo "<li><a href=\"dashboard.php?repositorio\">. . / <i class=\"bi bi-folder\"></i></a></li>";
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
            if(getimagesize($rutaCompleta)){
                echo "<img src=\"$rutaCompleta\" width=100% height=100%>";
            }else{
                $contenido = file_get_contents($rutaCompleta);
                echo "<pre>" . htmlspecialchars($contenido) . "<br><br></pre>";
            }
            

        }

        ?>
    </section>

</section>
