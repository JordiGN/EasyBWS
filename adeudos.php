<?php
if($_SERVER["REQUEST_METHOD"]=="GET") {
    require 'conection.php';
    //$id_usuario = $_GET['id_usuario'];
    /*$fechaInicio = $_GET['fechaInicio'];
    $fechaFin = $_GET['fechaFin'];*/
    global $connect;

    $query= "SELECT productos.nombre as nombreproducto, adeudos.deudor as deudor, adeudos.deuda as deuda, adeudos.abono as abono, adeudos.abono_periodo,ventas.fecha as fechaventa, adeudos.id_adeudo as idAdeudo FROM adeudos JOIN ventas ON adeudos.id_venta = ventas.id_venta JOIN productos ON ventas.id_producto=productos.id_producto ORDER BY id_adeudo ASC";
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
