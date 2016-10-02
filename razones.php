<?php
if($_SERVER["REQUEST_METHOD"]=="GET") {
    require 'conection.php';
    //$id_usuario = $_GET['id_usuario'];
    global $connect;

    $query= "SELECT modo_pago as mp, id_usuario, fecha FROM ventas ORDER BY id_usuario  ASC";

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

<!-- public function getrotacion(){
  return $this->db->select('modo_pago as mp')
                  ->from('ventas')
                  ->where('id_usuario',$this->session->userdata('id_usuario'))
                  ->where('ventas.fecha >=',$this->session->userdata('fechaInicio'))
                  ->where('ventas.fecha <=',$this->session->userdata('fechaFin'))
                  ->get()
                  ->result_array();
 -->
