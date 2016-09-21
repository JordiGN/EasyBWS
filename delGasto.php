<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){

  require "conection.php";

  global $connect;

  $idGasto = $_POST["idGasto"];


  /*$query = "Insert into usuario(nombre,apellido,username,contrasenia) values ('$nombre','$apellido','$username','$contrasenia');";*/
  $query = "DELETE FROM gastos WHERE id_gasto=$idGasto;";

  mysqli_query($connect, $query) or die (mysqli_error($connect));
  mysqli_close($connect);

}

?>
