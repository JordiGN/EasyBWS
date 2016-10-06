<?php
if($_SERVER["REQUEST_METHOD"]=="GET") {
    require 'conection.php';
    $id_usuario = $_GET['id_usuario'];
    $fechaInicio = $_GET['fechaInicio'];
    $fechaFin = $_GET['fechaFin'];
    global $connect;

    $query= "SELECT ventas.id_usuario as id_usuario, productos.nombre as nombreproducto, SUM(ventas.unidades_vendidas)as cantidad, ventas.total as totalventa FROM ventas JOIN productos ON ventas.id_producto=productos.id_producto WHERE ventas.id_usuario = '$id_usuario' AND ventas.fecha >= '$fechaInicio' AND ventas.fecha <= '$fechaFin' GROUP BY productos.nombre";

   $result = mysqli_query($connect,$query);

    $number_of_rows= mysqli_num_rows($result);
    $temp_array=array();
    if ($number_of_rows>0) {
      while ($row=mysqli_fetch_assoc($result)) {
          $temp_array[]=$row;
        # code...
      }
      # code...
    }
    header('Content-Type: application/json');
    echo json_encode(array("all"=>$temp_array));
    mysqli_close($connect);
}
?>
