function cargarHuecas() {
    document.getElementById("table").innerHTML = "";
    xmlhttp.open("GET", "table.php", true);
    xmlhttp.send();
}

function filtrarHuecas() {
    document.getElementById("table").innerHTML = "";
    let search = document.getElementById("search-box").value;
    xmlhttp.open("GET", "table.php?q="search, true);
    xmlhttp.send();
}