<?php require "php/session.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/menu.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://account.snatchbot.me/share-bot-widget.js" host="https://account.snatchbot.me"
        apikey="7c2b875ed1d1ab50be51bcd76a01073b"></script>
    <link rel="icon" type="image/x-icon" href="img/favicon.png">
</head>

<body>
    <header id="header-dashboard">
        <button onclick="openMenu()" onblur="closeMenu()" id="button-menu">
            <i class="bi bi-list"></i>
        </button>
        <i class="bi bi-eye-fill"></i>
        <h1>Dashboard</h1>
        <button onclick="slideOpen()" onblur="slideClose()" id="button-perfil">
            <i class="bi bi-person-circle"></i>
        </button>
    </header>

    <?php
    require "php/miDialogo.php";
    if ($_SESSION["usuario"]->tipo_Usuario == "alumno") {
        require "php/menu.php";
    }else if($_SESSION["usuario"]->tipo_Usuario == "profesor"){
        require "php/menuProfesor.php";
    }else{
        require "php/menuAdmin.php";
    }
    ?>
    <main id="main-dashboard">
        <?php
        if ($_SESSION["usuario"]->tipo_Usuario == "alumno") {
            if (isset($_GET["dashboard"])) {
                require "php/dashboard.php";
            } else if (isset($_GET["descripcion"])) {
                require "php/descripcion.php";
            } else if (isset($_GET["objetivos"])) {
                require "php/objetivos.php";
            } else if (isset($_GET["recursosh"])) {
                require "php/recursosh.php";
            } else if (isset($_GET["recursosm"])) {
                require "php/recursosm.php";
            } else if (isset($_GET["tecnologias"])) {
                require "php/tecnologias.php";
            } else if (isset($_GET["er"])) {
                require "php/er.php";
            } else if (isset($_GET["repositorio"])) {
                require "php/repositorio.php";
            } else if (isset($_GET["casosdeuso"])) {
                require "php/casosdeuso.php";
            } else if(isset($_GET["perfil"])){
                require "php/perfil.php";
            } else if(isset($_GET["errorAddUser"])){
                echo "<script>error();</script>";
                require "php/dashboard.php";
            } else {
                require "php/dashboard.php";
            }
        } else if($_SESSION["usuario"]->tipo_Usuario == "profesor"){
            if (isset($_GET["id_Alumno"])) {
                require "php/vistaProfesor.php";
            } else if(isset($_GET["dashboard"])){
                require "php/dashboard.php";
            } else if(isset($_GET["perfil"])){
                require "php/perfil.php";
            } else if(isset($_GET["errorAddUser"])){
                echo "<script>error();</script>";
                require "php/dashboard.php";
            } else{
                require "php/dashboard.php";
            }
        }else{
            if (isset($_GET["newuser"])) {
                require "php/newuser.php";
            } else if(isset($_GET["dashboard"])){
                require "php/vistaAdministrador.php";
            } else if(isset($_GET["errorAddUser"])){
                echo "<script>error();</script>";
                require "php/vistaAdministrador.php";
            } else if(isset($_GET["perfil"])){
                require "php/perfil.php";
            } else{
                require "php/vistaAdministrador.php";
            }
            
        }

        ?>
    </main>

    <footer id="footer-login">
        <p>&copy;Tracker.com web to tracking Proyect FCT</p>
    </footer>
</body>

</html>