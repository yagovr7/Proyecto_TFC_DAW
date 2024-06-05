<div id="miDialogo">
    <div>
        <i class="bi bi-person-circle"> <?php echo $_SESSION["usuario"] -> nombre?></i>
        <i class="bi bi-x-circle" onclick="slideClose()"></i>
    </div>
    <ul>
        <li><a href="dashboard.php?perfil"><i class="bi bi-person"></i> Profile</a></li>
        <li><a href="php/logout.php"><i class="bi bi-box-arrow-right"></i> Sing out</a></li>
    </ul>
</div>