<?php
    require("conexion.php");

// Opens a connection to a MySQL server
    $connection=mysql_connect ($server, $username, $password);
    if (!$connection) {
        die('No se ha conectado : ' . mysql_error());
    }
    echo "Conectado";
?>