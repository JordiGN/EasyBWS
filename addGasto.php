<?php
  if($_SERVER["REQUEST_METHOD"]=="POST"){
    require 'conection.php';

    global $connect;


  $id_concepto = $_POST["id_concepto"];
  $id_usuario = $_POST["id_usuario"];
  $cantidad = $_POST["cantidad"];
  $fecha = $_POST["fecha"];
  $total = $_POST["total"];

   $query = "INSERT INTO gastos(id_concepto,id_usuario,cantidad,fecha,total) VALUES ('$id_concepto','$id_usuario','$cantidad','$fecha','$total');";
    mysqli_query($connect,$query) or die(mysqli_error($connect));
    mysqli_close($connect);
  }
 ?>

