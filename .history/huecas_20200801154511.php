<?php
   //CONEXION
   $dbhost = 'localhost:3036';
   $dbuser = 'root';
   $dbpass = 'rootpassword';
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   //VALORES DE FORMULARIO
   $nombre = $_POST['nombre'];
   $telefono = $_POST['telefono'];
   $direccion = $_POST['direccion'];
   $facebook = $_POST['facebook'];
   $instagram = $_POST['instagram'];
   $twitter = $_POST['twitter'];

   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   
   $sql = 'INSERT INTO huecas '.
      '(nombre, telefono, direccion, facebook, instagram, twitter) '.
      'VALUES ( "guest", "XYZ", 2000, NOW() )';
      
   mysql_select_db('test_db');
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) {
      die('Could not enter data: ' . mysql_error());
   }
   
   echo "Entered data successfully\n";
   
   mysql_close($conn);
?>