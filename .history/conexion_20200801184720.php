<?php
$username="root";
$password="";
$database="huecas";
$servidor="localhost"
?>





<?php
   //VALORES DE FORMULARIO
   $nombre = $_POST['nombre'];
   $telefono = $_POST['telefono'];
   $direccion = $_POST['direccion'];
   $facebook = $_POST['facebook'];
   $instagram = $_POST['instagram'];
   $twitter = $_POST['twitter'];

   //CONEXION MYSQL
   $dbhost = 'localhost:3008';
   $dbuser = 'root';
   $dbpass = '';
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);

   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   
   $sql = 'INSERT INTO huecas '.
      '(nombre, telefono, direccion, facebook, instagram, twitter) '.
      'VALUES ($nombre, $telefono, $direccion, $facebook, $instagram, $twitter)';
      
   mysql_select_db('test_db');
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) {
      die('Could not enter data: ' . mysql_error());
   }
   
   echo "Entered data successfully\n";
   
   mysql_close($conn);
?>