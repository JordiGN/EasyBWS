<?php
if($_SERVER["REQUEST_METHOD"]=="GET") {
    require 'conection.php';
    //$id_usuario = $_GET['id_usuario'];
    /*$fechaInicio = $_GET['fechaInicio'];
    $fechaFin = $_GET['fechaFin'];*/
    global $connect;

    $query= "SELECT ventas.id_usuario as id_usuario, MONTH(ventas.fecha) as mes,SUM(ventas.total) as total FROM ventas JOIN productos ON ventas.id_producto = productos.id_producto GROUP BY month(ventas.fecha)";

    /*AND WHERE ventas.fecha >= fechaInicio AND WHERE ventas.fecha <= fechaFin";*/

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
