<?php
    if(isset($_GET['errorlogin'])) {
        echo "<script>alert(\"Usuario y contraseña incorrectos\");</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/menu.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="img/favicon.png">
</head>
<body>
    <header id="headerlogin"></header>

    <main id="main-login">
        <i class="bi bi-eye-fill"></i>
        <h2>Sing in to Tracker</h2>
        <form action="php/login.php" accept-charset="UTF-8" method="post">
            <label for="login_field">Username or email address</label>
             <input type="email" name="correo" pattern="^([\w]*[\w\.]*(?!\.)@[a-z]*.com)" required>
            <label for="password">Password</label>
            <input type="password" name="password" pattern="[a-zA-Z0-9._]{4,16}" required>
            <a href="">Forgot password?</a>
            <input type="submit" name="login" value="Sign in"  />
        </form>
        
    </main>

    <footer id="footer-login">
        <p>&copy;Tracker.com web to tracking Proyect FCT</p>
    </footer>

</body>
</html>