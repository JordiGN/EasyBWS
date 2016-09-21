<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){

  require "conection.php";

  global $connect;

  $idVenta = $_POST["idVenta"];


  /*$query = "Insert into usuario(nombre,apellido,username,contrasenia) values ('$nombre','$apellido','$username','$contrasenia');";*/
  $query = "DELETE FROM ventas WHERE id_venta=$idVenta;";

  mysqli_query($connect, $query) or die (mysqli_error($connect));
  mysqli_close($connect);

}

?>
