<!DOCTYPE html>
<html>

<head>
  <title>Huecas</title>
  <link rel="stylesheet" href="styles.css">
  <script src="map.js"></script>
</head>

<body>
  <h1>Support Me: Huecas Locales</h1>
  <div id="content">
    <div class="row">
      <div class="col">
        <h2>Destaca tu hueca favorita</h2>
        <form action="datos.php" method="post" target="#content">
          Nombre: <input type="text" name="nombre"><br>
          Telefono: <input type="text" name="telefono"><br>
          Direccion: <input type="text" name="direccion"><br>
          Latidud: <input type="text" name="latitud"><br>
          Longitud: <input type="text" name="longitud"><br>
          Facebook: <input type="text" name="facebook"><br>
          Instagram: <input type="text" name="instagram"><br>
          Twitter: <input type="text" name="twitter"><br>
          <input type="submit" value="Enviar">
        </form>
      </div>
      <div class="col">
        <h2>Huecas agregadas</h2>
        <div id="map" onload="initMap()"></div>
      </div>
    </div>
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
          require("conexion.php");
          $conn = mysqli_connect($server, $username, $password, $database);
          if ($conn-> connect_error){
            die("Conection failed". $conn->connect_error);
          }
          $sql = "SELECT nombre, telefono, direccion, facebook, instagram, twitter from huecas";
          $result = $conn->query($sql);
          if ($result->num_row > 0){
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
            echo "0 resultados";
          }
          $conn->close();
        ?>
      </table>
    </div>

  </div>
  <script defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap">
  </script>
</body>

</html>