<section id="newuser">
    <h2>Update User</h2>
    <form action="php/modificador.php" method="POST" class="tecnologias">
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="text" name="apellidos" placeholder="Apellidos" required>
        <input type="submit" name="updateName" value="Update">
    </form>

    <form action="php/modificador.php" method="POST" class="tecnologias">
        <input type="text" name="correo" placeholder="Correo" required>
        <input type="submit" name="updateEmail" value="Update">
    </form>

    <form action="php/modificador.php" method="POST" class="tecnologias">
        <input type="text" name="password" placeholder="Password" required>
        <input type="text" name="password2" placeholder="Confirm Password" required>
        <input type="submit" name="updatePassword" value="Update">
    </form>
</section>