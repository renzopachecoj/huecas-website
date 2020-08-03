<?php
    require("conexion.php");
    //DATOS DE FORMULARIO
    $search = $_POST['search'];
    
    $conn = mysqli_connect($server, $username, $password, $database);
    if ($conn-> connect_error){
      die("Conection failed". $conn->connect_error);
    }
    $sql = "SELECT nombre, telefono, direccion, facebook, instagram, twitter from huecas";
    $result = $conn-> query($sql);
    if ($result->num_rows > 0){
      while($row = $result->fetch_assoc()){
        echo "<tr><td>".
        $row["nombre"]."</td><td>".
        $row["telefono"]."</td><td>".
        $row["direccion"]."</td><td>".
        $row["facebook"]."</td><td>".
        $row["instagram"]."</td><td>".
        $row["twitter"]."</td></tr>";
      }
      echo "</table>";
    }/*else{
      echo "0 resultados";
    }
    
    

    if (!empty($search)){
      $conn = new mysqli($server, $username, $password, $database);
      if (mysqli_connect_error()){
        die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
      }else{
        $SELECT = "SELECT nombre, telefono, direccion, facebook, instagram, twitter
                    FROM huecas
                    WHERE nombre like $search";
        //PREPARAR SELECT
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("ssssssss", $nombre, $telefono, $direccion, $facebook, $instagram, $twitter);
        $stmt->execute();
        echo "Datos recividos";
        echo "<script>alert('¡Hueca agregada correctamente!');document.location='../huecas'</script>";
      }
    }else{
      echo "Error al guardar";
      die();
    }
?>