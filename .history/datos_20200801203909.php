<?php
    require("conexion.php");
    // Start XML file, create parent node
    $dom = new DOMDocument("1.0");
    $node = $dom->createElement("huecas");
    $parnode = $dom->appendChild($node);
// Opens a connection to a MySQL server
    $connection=mysqli_connect ($server, $username, $password);
    if (!$connection) {
        die('No se ha conectado : ' . mysqli_error($connection));
    }
// Set the active MySQL database
$db_selected = mysqli_select_db($connection, $database);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysqli_error($connection));
}

// Select all the rows in the markers table
$query = "SELECT * FROM huecas WHERE 1";
$result = mysqli_query($connection, $query);
if (!$result) {
  die('Invalid query: ' . mysqli_error($connection));
}
header("Content-type: text/xml");

// Iterate through the rows, adding XML nodes for each
while ($row = @mysql_fetch_assoc($result)){
    // Add to XML document node
    $node = $dom->createElement("huecas");
    $newnode = $parnode->appendChild($node);
    $newnode->setAttribute("id",$row['id']);
    $newnode->setAttribute("nombre",$row['nombre']);
    $newnode->setAttribute("telefono", $row['telefono']);
    $newnode->setAttribute("direccion", $row['direccion']);
    $newnode->setAttribute("latitud", $row['latitud']);
    $newnode->setAttribute("longitud", $row['longitud']);
    $newnode->setAttribute("facebook", $row['facebook']);
    $newnode->setAttribute("instagram", $row['instagram']);
    $newnode->setAttribute("twitter", $row['twitter']);
  }
  
  echo $dom->saveXML();

?>