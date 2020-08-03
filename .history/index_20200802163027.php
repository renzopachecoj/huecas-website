<?php
  require("conexion.php");
  if (isset($_POST['search'])){

  }else{
    $query = "SELECT nombre, telefono, direccion, facebook, instagram, twitter from huecas";
  }
  function filterTable($query){
    $conn = mysqli_connect($server, $username, $password, $database);
    $filter_Result = mysqli_query($conn, $query);
    return $filter_Result;
  }
?>
<!DOCTYPE html>
<html>

<head>
  <title>Huecas</title>
  <link rel="stylesheet" href="styles.css">
  <script src="map.js"></script>
  <script src="cargarHuecas.js"></script>
</head>

<body>
  <h1>Support Me: Huecas Locales</h1>
  <div class="col">
    <div class="contenido">
      <div class="formulario">
        <h2>Destaca tu hueca favorita</h2>
        <form action="datos.php" method="get" target="#content">
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
      <div class="mapa">
        <h2>Mapa</h2>
        <div id="map" onload="initMap()"></div>
      </div>
    </div>
    <div class="tabla" id="tabla">
      <!--
      <div class="search-container">
        <form>
          <input type="text" placeholder="Buscar huecas..." name="search" id="search-box">
          <button type="submit" onclick="filtrarHuecas()">Buscar</button>
        </form>
      </div>
    -->
      <div id="table">
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
              echo "<tr><td>".
              $row["nombre"]."</td><td>".
              $row["telefono"]."</td><td>".
              $row["direccion"]."</td><td>".
              $row["facebook"]."</td><td>".
              $row["instagram"]."</td><td>".
              $row["twitter"]."</td></tr>";
          }
          echo "</table>";
          $conn->close();
        ?>
      </div>
    </div>
  </div>
  </div>
  <script defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap">
  </script>
</body>

</html>