<section id="recursos">
    <h2>Recursos Materiales</h2>
    <section id="formrecursos">
        <form action="php/modificador.php" method="POST" class="recursoM">
            <input type="text" name="contenido" placeholder="Descripción">
            <input type="text" name="precio" placeholder="Precio">
            <label for="submit">
                <input type="submit" name="subirRecursoM" value="Recurso Material" id="submit">
                <i class="bi bi-upload"></i>
            </label>
        </form>
    </section>
    <?php
    require_once "conexion.php";
    if ($recursos = (new Conexion)->verRecursosM($_SESSION["usuario"]->id)) {
        echo "<table class=\"tablarecursos\"><tr><th>Recursos Materiales</th><th>Precio ud/mes</th><th>Eliminar</th></tr>";
        foreach ($recursos as $recurso) {
            echo "<tr><td>{$recurso->descripcion}</td><td>{$recurso->precio}€</td><td><a href=\"php/modificador.php?cod_RecursoM={$recurso->cod_Recurso}\"><i class=\"bi bi-trash\"></i></a></td></tr>";
        }
    }
    ?>

    </table>
</section>