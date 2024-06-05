<?php
session_start();
require "conexion.php";
if (isset($_POST["subirdescripcion"])) {

    (new Conexion)->subirDescripcion($_SESSION["usuario"]->id, $_POST["titulo"], $_POST["contenido"]);
    header("Location: ../dashboard.php?descripcion");

} else if (isset($_GET["eliminardescripcion"])) {

    (new Conexion)->eliminarDescripcion($_SESSION["usuario"]->id);
    header("Location: ../dashboard.php?descripcion");

} else if (isset($_POST["modificardescripcion"])) {
    (new Conexion)->modificarDescripcion($_SESSION["usuario"]->id, $_POST["titulo"], $_POST["contenido"]);
    header("Location: ../dashboard.php?descripcion");

} else if (isset($_POST["subirobjetivo"])) {
    (new Conexion)->subirObjetivo($_POST["contenido"], $_SESSION["usuario"]->id);
    header("Location: ../dashboard.php?objetivos");
} else if (isset($_GET["eliminarobjetivo"])) {
    (new Conexion)->eliminarObjetivo($_GET["eliminarobjetivo"]);
    header("Location: ../dashboard.php?objetivos");
} else if (isset($_POST["subirer"])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["imagen"])) {
        // Directorio donde se almacenarán las imágenes
        $directorio_destino = "../ER/";
        // Obtener el nombre y la ubicación temporal del archivo subido
        $nombre_archivo = $_FILES["imagen"]["name"];
        $ruta_temporal = $_FILES["imagen"]["tmp_name"];
        $partes = explode(".", $nombre_archivo);
        $extension = end($partes);
        $nombre_final = $_SESSION["usuario"]->correo . "." . $extension;
        // Mover el archivo a su ubicación final
        $ruta_final = $directorio_destino . $nombre_final;
        move_uploaded_file($ruta_temporal, $ruta_final);
        (new Conexion)->subirER($_SESSION["usuario"]->id, $nombre_final);
    }
    header("Location: ../dashboard.php?er");
} else if (isset($_GET["eliminarER"])) {
    (new Conexion)->eliminarER($_GET["eliminarER"]);
    $imagen = $_GET["imagen"];
    unlink("../ER/$imagen");
    header("Location: ../dashboard.php?er");
} else if (isset($_POST["subirRecursoH"])) {
    (new Conexion)->subirRecursosH($_POST["contenido"], $_POST["precio"], $_SESSION["usuario"]->id);
    header("Location: ../dashboard.php?recursosh");
} else if (isset($_POST["subirRecursoM"])) {
    (new Conexion)->subirRecursosM($_POST["contenido"], $_POST["precio"], $_SESSION["usuario"]->id);
    header("Location: ../dashboard.php?recursosm");
} else if (isset($_GET["cod_RecursoH"])) {
    (new Conexion)->eliminarRecursosH($_GET["cod_RecursoH"]);
    header("Location: ../dashboard.php?recursosh");
} else if (isset($_GET["cod_RecursoM"])) {
    (new Conexion)->eliminarRecursosM($_GET["cod_RecursoM"]);
    header("Location: ../dashboard.php?recursosm");
} else if (isset($_POST["subirTecnologia"])) {
    (new Conexion)->subirTecnologias($_POST["nombre"], $_POST["descripcion"], $_POST["enlace"], $_SESSION["usuario"]->id);
    header("Location: ../dashboard.php?tecnologias");
} else if (isset($_GET["cod_Tecnologia"])) {
    (new Conexion)->eliminarTecnologias($_GET["cod_Tecnologia"]);
    header("Location: ../dashboard.php?tecnologias");
} else if (isset($_POST["subirCaso"])) {
    (new Conexion)->subirCasoDeUso($_POST["contenido"], $_POST["descripcion"], $_POST["tiempo"], $_SESSION["usuario"]->id);
    header("Location: ../dashboard.php?casosdeuso");
} else if (isset($_GET["cod_Caso"])) {
    (new Conexion)->eliminarCasoDeUso($_GET["cod_Caso"]);
    header("Location: ../dashboard.php?casosdeuso");
} else if (isset($_POST["newUser"])) {
    $id_Profesor = NULL;
    $tipo_Usuario = "profesor";
    if($_POST["profesor"] != ""){
        $id_Profesor = $_POST["profesor"];
        $tipo_Usuario = "alumno";
    }
    if($_POST["password"] == $_POST["password2"]){
        (new Conexion)->newUser($_POST["correo"], $_POST["password"], $_POST["password2"], $_POST["nombre"], $_POST["apellidos"], $id_Profesor, $tipo_Usuario);
        $nombreDirectorio = $_POST["correo"];
        $rutaDirectorio = '../repositorios/' . $nombreDirectorio;
        mkdir($rutaDirectorio, 7777, true);
        header("Location: ../dashboard.php?dashboard");
    }else{
        header("Location: ../dashboard.php?errorAddUser");
    }
} else if (isset($_GET["eliminarUsuario"])) {
    (new Conexion)->eliminarUsuario($_GET["eliminarUsuario"]);
    header("Location: ../dashboard.php?dashboard");
} else if (isset($_POST["updateName"])) {
    (new Conexion)->updateName($_POST["nombre"], $_POST["apellidos"], $_SESSION["usuario"]->id);
    header("Location: logout.php");
} else if (isset($_POST["updateEmail"])) {
    (new Conexion)->updateEmail($_POST["correo"], $_SESSION["usuario"]->id);
    header("Location: logout.php");
} else if (isset($_POST["updatePassword"])) {
    if($_POST["password"] == $_POST["password2"]){
        (new Conexion)->updatePassword($_POST["password"],  $_SESSION["usuario"]->id);
        header("Location: logout.php");
    }else{
        header("Location: ../dashboard.php?errorAddUser");
    }
}