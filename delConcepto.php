<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){

  require "conection.php";

  global $connect;

  $idConcepto = $_POST["idConcepto"];


  /*$query = "Insert into usuario(nombre,apellido,username,contrasenia) values ('$nombre','$apellido','$username','$contrasenia');";*/
  $query = "DELETE FROM catalogo_gastos WHERE id_concepto=$idConcepto;";

  mysqli_query($connect, $query) or die (mysqli_error($connect));
  mysqli_close($connect);

}

?>
