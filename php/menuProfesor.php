<div id="menu">
    <div>
        <i class="bi bi-eye-fill"></i>
        <i class="bi bi-x-circle" onclick="closeMenu()"></i>
    </div>

    <ul>
        <h2>Alumnos</h2>
        <li><a href="dashboard.php?dashboard"><i class="bi bi-house"></i> Home</a></li>
        <?php
        require_once "conexion.php";
            if($alumnos = (new Conexion()) -> verAlumnos($_SESSION["usuario"] -> id)){
                foreach($alumnos as $alumno){
                    echo "<li><a href=\"dashboard.php?id_Alumno={$alumno -> id}\"><i class=\"bi bi-person-fill\"></i> ".$alumno -> nombre." ".$alumno -> apellidos.'</a></li>';
                    echo "<li><a href=\"dashboard.php?repo_Alumno={$alumno -> correo}\"><i class=\"bi bi-arrow-90deg-up\"></i><i class=\"bi bi-git\"></i> Repositorio</a></li>";
                }
            }else{
                echo "<li>Sin alumnos</li>";
            }
        ?>
    </ul>
    <p>© 2024 Tracker, Inc.</p>
</div>