<?php
require_once "conexion.php";

if (!(new Conexion)->descripcionProyecto($_SESSION["usuario"]->id)) {
    echo '
        <form action="php/modificador.php" method="POST" id="formSubir">
            <div>
                <label for="upload">
                    <input type="submit" name="subirdescripcion" id="upload">
                    <i class="bi bi-upload"></i>
                </label>
            </div>
            <input type="text" placeholder="Título" name="titulo">
            <textarea name="contenido" id="read-only-cursor-text-area" placeholder="Descripción" data-testid="read-only-cursor-text-area"
                aria-label="file content" aria-readonly="true" inputmode="none" tabindex="0" aria-multiline="true"
                aria-haspopup="false" data-gramm="false" data-gramm_editor="false" data-enable-grammarly="false"
                spellcheck="false" autocorrect="off" autocapitalize="off" autocomplete="off"
                data-ms-editor="false"></textarea>
        </form>';
} else {
    if (isset($_GET["modificar"])) {
        $descripcion = (new Conexion)->descripcionProyecto($_SESSION["usuario"]->id);
        echo '
            <form action="php/modificador.php" method="POST" id="formModificar">
                <div>
                    <label for="upload">
                        <input type="submit" name="modificardescripcion" id="upload">
                        <i class="bi bi-upload"></i>
                    </label>
                </div>
                <input type="text" placeholder="Título" name="titulo" value="' . $descripcion["titulo"] . '">
                <textarea name="contenido" id="read-only-cursor-text-area" placeholder="Descripción" data-testid="read-only-cursor-text-area"
                    aria-label="file content" aria-readonly="true" inputmode="none" tabindex="0" aria-multiline="true"
                    aria-haspopup="false" data-gramm="false" data-gramm_editor="false" data-enable-grammarly="false"
                    spellcheck="false" autocorrect="off" autocapitalize="off" autocomplete="off"
                    data-ms-editor="false">' . $descripcion["descripcion"] . '</textarea>
            </form>';

    } else {
        $descripcion = (new Conexion)->descripcionProyecto($_SESSION["usuario"]->id);
        echo "<div id=\"contenidoDescripcion\">
        <div id=\"botones\">
            <form action=\"dashboard.php\" method=\"GET\">
                <button type=\"submit\" name=\"modificar\"><i class=\"bi bi-pencil\"></i></button>
                <input type=\"hidden\" name=\"descripcion\" value=\"true\">
            </form>
            <form action=\"php/modificador.php\" method=\"GET\">
                <button type=\"submit\" name=\"eliminardescripcion\"><i class=\"bi bi-trash\"></i></button>
                <input type=\"hidden\" name=\"id\" value=\"" . $_SESSION["usuario"]->id . "\">
            </form>
        </div>
        <h2>{$descripcion["titulo"]}</h2>
        <p>{$descripcion["descripcion"]}</p>
    </div>";

    }
}
?>