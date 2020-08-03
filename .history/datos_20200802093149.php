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
echo "Hueca agregada correctamente!"
?>