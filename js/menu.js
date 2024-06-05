function slideOpen() {
    var dialog = document.getElementById('miDialogo');
    dialog.style.right = "0"; // Mostrar el diálogo
}

function slideClose() {
    var dialog = document.getElementById('miDialogo');
    dialog.style.right = "-300px"; // Mostrar el diálogo
}

function openMenu() {
    var dialog = document.getElementById("menu");
    dialog.style.left = "0"; // Mostrar el diálogo
}

function closeMenu() {
    var dialog = document.getElementById("menu");
    dialog.style.left = "-300px"; // Mostrar el diálogo
}

function error(){
    alert("La contraseña no coincide");
}

function error2(){
    alert("Las contraseñas no coinciden");
}

function confirm(){
    confirm("Desea eliminar el usuario?");
}
