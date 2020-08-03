<?php
    require("conexion.php");
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
while ($row = @mysqli_fetch_assoc($result)){
  // Add to XML document node
  $node = $doc->create_element("huecas");
  $newnode = $parnode->append_child($node);

  $newnode->set_attribute("id", $row['id']);
  $newnode->set_attribute("nombre", $row['nombre']);
  $newnode->set_attribute("telefono", $row['telefono']);
  $newnode->set_attribute("direccion", $row['direccion']);
  $newnode->set_attribute("latitud", $row['latitud']);
  $newnode->set_attribute("longitud", $row['longitud']);
  $newnode->set_attribute("facebook", $row['facebook']);
  $newnode->set_attribute("instagram", $row['instagram']);
  $newnode->set_attribute("twitter", $row['twitter']);
}

$xmlfile = $doc->dump_mem();
echo $xmlfile;

?>