<?php
if($_SERVER["REQUEST_METHOD"]=="GET") {
    require 'conection.php';
    //$id_usuario = $_GET['id_usuario'];

    global $connect;

    $query= "SELECT catalogo_gastos.id_usuario as id_usuario, rubros.nombre as nombrerubro, rubros.id_rubro as rubro, catalogo_gastos.id_concepto as id_concepto, catalogo_gastos.nombre as nombre, catalogo_gastos.costo as costo
    FROM catalogo_gastos JOIN rubros ON catalogo_gastos.id_rubro=rubros.id_rubro ORDER BY rubros.id_rubro ASC";


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

