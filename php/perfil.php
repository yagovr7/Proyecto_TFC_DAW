<section id="newuser">
    <h2>Update data</h2>
    <section id="forms">
    <form action="php/modificador.php" method="POST" class="tecnologias">
        <input type="text" name="nombre" placeholder="Nombre" value="<?php echo $_SESSION["usuario"] -> nombre ?>" required>
        <input type="text" name="apellidos" placeholder="Apellidos" value ="<?php echo $_SESSION["usuario"] -> apellidos ?>" required>
        <input type="text" name="correo" placeholder="Correo" value="<?php echo $_SESSION["usuario"] -> correo ?>" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" name="updateData" value="Update">
    </form>

    <form action="php/modificador.php" method="POST" class="tecnologias">
        <input type="password" name="current" placeholder="Current password" required>
        <input type="password" name="password" placeholder="New Password" required>
        <input type="password" name="password2" placeholder="Repeat password" required>
        <input type="submit" name="updatePassword" value="Update">
    </form>
    </section>
    
</section>