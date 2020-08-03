function cargarHuecas() {
    document.getElementById("table").innerHTML = "";
    xmlhttp.open("GET", "table.php", true);
    xmlhttp.send();
}