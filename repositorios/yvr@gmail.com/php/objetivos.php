<section id="contenidoObjetivos">
    <h2>Objetivos</h2>
    <form action="php/modificador.php" method="POST" class="contobjetivo">
        <input type="text" name="contenido" required>
        <label for="submit">
            <input type="submit" name="subirobjetivo" value="Agregar" id="submit">
            <i class="bi bi-upload"></i>
        </label>
        
    </form>
    <?php
    require_once "conexion.php";
    if ($objetivos = (new Conexion)->verObjetivos($_SESSION["usuario"]->id)) {
        foreach ($objetivos as $objetivo) {
            echo "<dvi class=\"objetivo\">{$objetivo->descripcion}
            <a href=\"php/modificador.php?eliminarobjetivo={$objetivo->cod_Objetivo}\"><i class=\"bi bi-trash\"></i></a>
            </dvi>";
        }
    }
    ?>

</section>