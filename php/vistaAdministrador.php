<section id="contenidoTecnologias">
    <?php
    if ($usuarios = (new Conexion())->AllUsers()) {
        echo "<table class=\"tablarecursos\"><th>ID</th><th>Usuario</th><th>Nombre</th><th>Apellidos</th><th>Correo</th><th>Eliminar</th></tr>";
        foreach ($usuarios as $usuario) {
            echo "<tr><td>{$usuario->id}</td><td>{$usuario->tipo_Usuario}</td><td>{$usuario->nombre}</td><td>{$usuario->apellidos}</td><td>{$usuario->correo}</td><td><a href=\"php/modificador.php?eliminarUsuario={$usuario->id}&correo={$usuario->correo}\"><i class=\"bi bi-trash\"></i></a></td></tr>";
        }
        echo "</table>";
    }
    ?>
</section>