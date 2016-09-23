<?php
  if($_SERVER["REQUEST_METHOD"]=="POST"){
    require 'conection.php';

    global $connect;


    $id_usuario = $_POST["id_usuario"];
    $idP = $_POST["idP"];
    $precio = $_POST["precio"];
    $cantidad = $_POST["cantidad"];
    $modopago = $_POST["modopago"];
    $deudor = $_POST["deudor"];
    //$fecha = $_POST["fecha"];
    $fecha=date('Y-m-d');


    $total=intval($precio)*intval($cantidad);


    if ($modopago=='Contado') {
      $query="INSERT INTO ventas(id_producto,id_usuario,unidades_vendidas,fecha,modo_pago,total) VALUES ('$idP','$id_usuario','$cantidad','$fecha','0','$total')";
      mysqli_query($connect,$query) or die(mysqli_error($connect));
    }else{
      $query="INSERT INTO ventas(id_producto,id_usuario,unidades_vendidas,fecha,modo_pago,total) VALUES ('$idP','$id_usuario','$cantidad','$fecha','1','$total')";

      mysqli_query($connect,$query) or die(mysqli_error($connect));
      $query3= "SELECT id_venta as lasventa FROM ventas ORDER BY lasventa  DESC LIMIT 1";

      $result = mysqli_query($connect,$query3);

      $number_of_rows= mysqli_num_rows($result);
      $temp_array=array();
      if ($number_of_rows>0) {
        while ($row=mysqli_fetch_assoc($result)) {
            $temp_array[]=$row;
        }
      }
      $newRubro2 = $temp_array[0];
      print_r($newRubro2);
       $lV=$newRubro2['lasventa'];

      $query2 = "INSERT INTO adeudos(id_usuario,id_venta,deudor, deuda ) VALUES ('$id_usuario','$lV','$deudor','$total');";
      mysqli_query($connect,$query2) or die(mysqli_error($connect));
    }
    mysqli_close($connect);
  }
 ?>
