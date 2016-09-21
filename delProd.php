<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){

  require "conection.php";

  global $connect;

  $idProducto = $_POST["idProducto"];


  /*$query = "Insert into usuario(nombre,apellido,username,contrasenia) values ('$nombre','$apellido','$username','$contrasenia');";*/
  $query = "DELETE FROM productos WHERE id_producto=$idProducto;";

  mysqli_query($connect, $query) or die (mysqli_error($connect));
  mysqli_close($connect);

}

?>
