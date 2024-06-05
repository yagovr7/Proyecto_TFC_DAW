<section id="contenidoER">
    <?php
    require "conexion.php";
    if ($imagen = (new Conexion)->verER($_SESSION["usuario"]->id)) {
        foreach ($imagen as $img) {
            $id = $img->id_ER;
            $nombre = $img->id_Alumno;
            $nombreImagen = $img->imagen;
            $cadena = $nombreImagen = $img->imagen;;
            $resultado = strstr($cadena, '.', true);
            echo "<dialog id=\"$resultado\">";
            echo "<figure id=\"ER\"><button onclick=\"window.$resultado.close()\" class=\"boton2\">Close</button><a href=\"php/modificador.php?eliminarER=$id&imagen=$nombreImagen\" id=\"eliminarER\"><i class=\"bi bi-trash\"></i></a>
            <img src=\"ER/" . $img->imagen . "\" alt=\"E-R\">
            </figure></dialog>";
            echo "<button onclick=\"window.$resultado.show()\" class=\"boton\"><img src=\"ER/$img->imagen\"></button>";
        }
        
    }   
    ?>
    
</section>
<form action="php/modificador.php" method="POST" enctype="multipart/form-data" id="formUpload">
        <label for="file"><input type="file" name="imagen" id="file" required><i class="bi bi-file-earmark-zip"></i></label>
        <input type="submit" value="Upload" name="subirer">
</form>