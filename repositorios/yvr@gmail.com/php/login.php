<?php
require "conexion.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $correo = $_POST['correo'];
    $password = $_POST['password'];
    if ($objectUsuario = (new Conexion())->loginCorrecto($correo, $password)) {
        session_start();
        $_SESSION['usuario'] = $objectUsuario;
        header("Location: ../dashboard.php?dashboard");
    } else {
        header("Location: ../index.php?errorlogin=Usuario y contraseña incorrectos");
    }
}