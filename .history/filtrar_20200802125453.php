<?php
    require("conexion.php");
    //DATOS DE FORMULARIO
    $search = $_POST['search'];

    if (!empty($search)){
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
        echo "<script>alert('¡Hueca agregada correctamente!');document.location='../huecas'</script>";
      }
    }else{
      echo "Error al guardar";
      die();
    }
?>