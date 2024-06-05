<section id="contenidoER">
    <?php
    require "conexion.php";
    if ($imagen = (new Conexion)->verER($_SESSION["usuario"]->id)) {
        $nombre = $imagen->id_Alumno;
        $nombreImagen = $imagen->imagen;
        echo "<h2>Entidad Realación<a href=\"php/modificador.php?eliminarER=$nombre&imagen=$nombreImagen\" id=\"eliminarER\"><i class=\"bi bi-trash\"></i></a></h2>";
        echo "<figure id=\"ER\">
        <img src=\"ER/" . $imagen->imagen . "\" alt=\"E-R\">
        </figure>";
        
    } else {
        echo "<form action=\"php/modificador.php\" method=\"POST\" enctype=\"multipart/form-data\">";
        echo '<label for="file"><input type="file" name="imagen" id="file" required><i class="bi bi-file-earmark-zip"></i></label>';
        echo "<input type=\"submit\" value=\"Upload\" name=\"subirer\">";
        echo "</form>";
    }
    ?>
</section>