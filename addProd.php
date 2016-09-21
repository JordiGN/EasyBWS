<?php
  if($_SERVER["REQUEST_METHOD"]=="POST"){
    require 'conection.php';

    global $connect;

    $idUsuario = $_POST["idUsuario"];
    $nombre= $_POST["nombre"];
    $precio= $_POST["precio"];

   $query = "INSERT INTO productos(id_usuario,nombre,precio) VALUES ('$idUsuario','$nombre','$precio');";

    mysqli_query($connect,$query) or die(mysqli_error($connect));
    mysqli_close($connect);
  }
 ?>

