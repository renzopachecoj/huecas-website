<?php
    require("conexion.php");
    $conn = mysqli_connect($server, $username, $password, $database);
    if ($conn-> connect_error){
        die("Conection failed". $conn->connect_error);
    }
    $sql = "SELECT nombre, telefono, direccion, facebook, instagram, twitter from huecas";
    $result = $conn-> query($sql);
    echo "
    <table>
        <caption>Huecas agregadas</caption>
        <tr>
          <th>Nombre</th>
          <th>Teléfono</th>
          <th>Dirección</th>
          <th>Facebook</th>
          <th>Instagram</th>
          <th>Twitter</th>
        </tr>";
while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['FirstName'] . "</td>";
  echo "<td>" . $row['LastName'] . "</td>";
  echo "<td>" . $row['Age'] . "</td>";
  echo "<td>" . $row['Hometown'] . "</td>";
  echo "<td>" . $row['Job'] . "</td>";
  echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>



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
          }else{
            echo "<h2>0 resultados</h2>";
          }
          $conn->close();
        ?>