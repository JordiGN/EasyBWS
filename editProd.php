<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
  require "conection.php";

  global $connect;

  $idProd = $_POST["idProd"];
  $nombre = $_POST["nombre"];
  $precio = $_POST["precio"];

  $query = "UPDATE productos SET nombre='$nombre',precio='$precio' WHERE id_producto='$idProd'; ";

  mysqli_query($connect, $query) or die (mysqli_error($connect));
  mysqli_close($connect);
}
?>
