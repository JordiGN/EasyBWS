<?php
if($_SERVER["REQUEST_METHOD"]=="GET") {
    require 'conection.php';
    //$id_usuario = $_GET['id_usuario'];
    /*$fechaInicio = $_GET['fechaInicio'];
    $fechaFin = $_GET['fechaFin'];*/
    global $connect;

    $query= "SELECT gastos.id_usuario as id_usuario, rubros.nombre as nombrerubro, rubros.id_rubro as rubro, SUM(gastos.total) as totalgasto, gastos.fecha as fechaGasto FROM gastos JOIN catalogo_gastos ON gastos.id_concepto = catalogo_gastos.id_concepto LEFT JOIN rubros ON catalogo_gastos.id_rubro=rubros.id_rubro GROUP BY nombrerubro ORDER BY rubros.id_rubro ASC";
    /*AND WHERE gastos.fecha >= fechaInicio AND WHERE gastos.fecha <= fechaFin";*/
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
