<section id="contenidoCasosDeUso">
    <h2>Casos de Uso</h2>
    <section id="formcasosdeuso">
        <form action="php/modificador.php" method="POST" class="recursoH">
            <input type="text" name="contenido" placeholder="Uso" required>
            <input type="text" name="descripcion" placeholder="Descripcion" required>
            <input type="text" name="tiempo" placeholder="Tiempo" required>
            <label for="submit">
                <input type="submit" name="subirCaso" value="Caso de Uso" id="submit">
                <i class="bi bi-upload"></i>
            </label>
            
        </form>
    </section>
    <?php
    require_once "conexion.php";
    if ($recursos = (new Conexion)->verCasosDeUso($_SESSION["usuario"]->id)) {
        echo "<table class=\"tablarecursos\"><tr><th>Uso</th><th>Descripcion</th><th>Tiempo</th><th>Eliminar</th></tr>";
        foreach ($recursos as $recurso) {
            echo "<tr><td>{$recurso->uso}</td><td>{$recurso->descripcion}</td><td>{$recurso->tiempo} h</td><td><a href=\"php/modificador.php?cod_Caso={$recurso->cod_Caso}\"><i class=\"bi bi-trash\"></i></a></td></tr>";
        }
    }
    ?>
    </table>
</section>