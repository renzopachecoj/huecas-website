function cargarHuecas() {
    document.getElementById("table").innerHTML = "";
    xmlhttp.open("GET", "getuser.php?q=" + str, true);
    xmlhttp.send();
}