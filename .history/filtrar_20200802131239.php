<?php
    require("conexion.php");
    //DATOS DE FORMULARIO
    $search = $_GET['search'];

    $conn = mysqli_connect($server, $username, $password, $database);
    if ($conn-> connect_error){
      die("Conection failed". $conn->connect_error);
    }
    $sql = "SELECT nombre, telefono, direccion, facebook, instagram, twitter from huecas where nombre like %$search%";
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
    }
?>