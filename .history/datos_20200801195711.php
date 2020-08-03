<?php
require("conexion.php");

// Opens a connection to a MySQL server
$connection=mysql_connect ($server, $username, $password);
if (!$connection) {
  die('Not connected : ' . mysql_error());
}

// Set the active MySQL database
$db_selected = mysql_select_db($database, $connection);
if (!$db_selected) {
  die ('No se ha conectado : ' . mysql_error());
}
echo "Conectado";
?>