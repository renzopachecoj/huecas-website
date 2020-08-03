<!--
    <div class="row">
        <table>
          <tr>
            <th>Nombre</th>
            <th>Telefono</th>
            <th>Direccion</th>
            <th>Facebook</th>
            <th>Instagram</th>
            <th>Twitter</th>
          </tr>
          <?php
              /*require("conexion.php");
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
              $conn->close();*/
            ?>
        </table>
    </div>-->