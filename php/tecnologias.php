<section id="contenidoTecnologias">
    <h2>Tecnologias</h2>
    <section id="tecnologias">
        <form action="php/modificador.php" method="POST" class="tecnologias">
            <input type="text" name="nombre" placeholder="Nombre" required>
            <input type="text" name="descripcion" placeholder="Descripción" required>
            <input type="text" name="enlace" placeholder="Enlace" required>
            <label for="submit">
                <input type="submit" name="subirTecnologia" value="Tecnología" id="submit">
                <i class="bi bi-upload"></i>
            </label>
        </form>
    </section>
    <?php
    require_once "conexion.php";
    if ($recursos = (new Conexion)->verTecnologias($_SESSION["usuario"]->id)) {
        echo "<table class=\"tablarecursos\"><tr><th>Tecnología</th><th>Descripción</th><th>Enlace</th><th>Eliminar</th></tr>";
        foreach ($recursos as $recurso) {
            echo "<tr><td>{$recurso->nombre}</td><td>{$recurso->descripcion}</td><td><a href={$recurso->enlace}><i class=\"bi bi-eye-fill\"></i></a></td><td><a href=\"php/modificador.php?cod_Tecnologia={$recurso->cod_Tecnologia}\"><i class=\"bi bi-trash\"></i></a></td></tr>";
        }
    }
    ?>

    </table>
</section>