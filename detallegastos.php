<?php
if($_SERVER["REQUEST_METHOD"]=="GET") {
    require 'conection.php';
    //$id_rubro = $_GET['id_rubro'];
    //$id_usuario = $_GET['id_usuario'];
    /*$fechaInicio = $_GET['fechaInicio'];
    $fechaFin = $_GET['fechaFin'];*/
    global $connect;

    $query= "SELECT catalogo_gastos.id_usuario as id_usuario, gastos.id_gasto as idgasto, catalogo_gastos.nombre as nombreconcepto, gastos.cantidad as cantidad, gastos.fecha as fecha, gastos.total as totalgasto, catalogo_gastos.id_rubro as rubro FROM gastos JOIN catalogo_gastos ON gastos.id_concepto=catalogo_gastos.id_concepto ORDER BY idgasto ASC";
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
