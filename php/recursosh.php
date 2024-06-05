<section id="recursos">
    <h2>Recursos Humanos</h2>
    <section id="formrecursos">
        <form action="php/modificador.php" method="POST" class="recursoH">
            <input type="text" name="contenido" placeholder="Descripción" required>
            <input type="text" name="horas" placeholder="Horas" required>
            <input type="text" name="precio" placeholder="Precio" required>
            <label for="submit">
                <input type="submit" name="subirRecursoH" value="Recurso Humano" id="submit">
                <i class="bi bi-upload"></i>
            </label>
            
        </form>
    </section>
    <?php
    require_once "conexion.php";
    $total = 0;
    if ($recursos = (new Conexion)->verRecursosH($_SESSION["usuario"]->id)) {
        echo "<table class=\"tablarecursos\"><tr><th>Recursos Humanos</th><th>Horas</th><th>Precio</th><th>Eliminar</th></tr>";
        foreach ($recursos as $recurso) {
            echo "<tr><td>{$recurso->descripcion}</td><td>{$recurso->horas}h</td><td>{$recurso->precio}€</td><td><a href=\"php/modificador.php?cod_RecursoH={$recurso->cod_Recurso}\"><i class=\"bi bi-trash\"></i></a></td><tr>";
        }
        foreach ($recursos as $recurso) {
            $total = $total + ($recurso -> horas * $recurso -> precio);
        }
        echo "<tr><td colspan=\"3\" style=\"text-align: center;font-weight: bold;font-style: italic;\">Total -> {$total}€</td></tr>";
    }
    ?>
    </table>
</section>