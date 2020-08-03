<?php
    require("conexion.php");
    //DATOS DE FORMULARIO
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $latitud = $_POST['latitud'];
    $longitud = $_POST['longitud'];
    $facebook = $_POST['facebook'];
    $instagram = $_POST['instagram'];
    $twitter = $_POST['twitter'];

    if (!empty($nombre) || !empty($telefono) || !empty($direccion) || !empty($latitud)
    || !empty($longitud) || !empty($facebook)){
      $conn = new mysqli($server, $username, $password, $database);
      if (mysqli_connect_error()){
        die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
      }else{
        $INSERT = "INSERT INTO huecas 
        (nombre, telefono, direccion, latitud, longitud, facebook, instagram, twitter)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?) ";
        //PREPARAR INSERT
        $stmt = $conn->prepara($INSERT);
        $stmt->bind_param("ssssssss", $nombre, $telefono, $direccion, $latitud, $longitud, $facebook, $instagram, $twitter);
        $stmt->execute();
        echo "Hueca agregada correctamente";
      }
    }else{
      echo "Error al guardar";
      die();
    }
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
$query = "INSERT INTO huecas ('nombre', 'telefono', 'direccion', 'latitud', 'longitud', 'facebook', 'instagram', 'twitter')
           VALUES ($nombre, $telefono, $direccion, $latitud, $longitud, $facebook, $instagram, $twitter)" ;
$result = mysqli_query($connection, $query);
if (!$result) {
  die('Invalid query: ' . mysqli_error($connection));
}
echo "Hueca agregada correctamente!";
?>