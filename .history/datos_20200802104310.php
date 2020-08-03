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
        $stmt = $conn->prepare($INSERT);
        $stmt->bind_param("ssssssss", $nombre, $telefono, $direccion, $latitud, $longitud, $facebook, $instagram, $twitter);
        $stmt->execute();
        echo "Hueca agregada correctamente";
        //header("Location: ../huecas");
        echo "<script>alert('¡Hueca agregada correctamente!');document.location='admin/ahm/panel'</script>";
      }
    }else{
      echo "Error al guardar";
      die();
    }
?>