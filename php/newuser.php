<section id="newuser">
    <h2>New User</h2>
    <form action="php/modificador.php" method="POST" class="tecnologias">
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="text" name="apellidos" placeholder="Apellidos" required>
        <input type="text" name="password" placeholder="Password" required>
        <input type="text" name="password2" placeholder="Confirm Password" required>
        <input type="text" name="correo" placeholder="Correo" required>
        
        <select name="profesor">
            <option value="" default>Profesor</option>
            <?php
            if ($profesores = (new Conexion())->Profesores()) {
                foreach ($profesores as $profesor) {
                    echo "<option value=\"" . $profesor -> id . "\">" . $profesor -> nombre . " " . $profesor -> apellidos . "</option>";
                }
            }
            ?>
        </select>
        <input type="submit" name="newUser" value="Add User">
    </form>
</section>