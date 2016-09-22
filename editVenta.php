<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
  require "conection.php";

  global $connect;

  $idAdeudo = $_POST["idAdeudo"];
  $abonoT = $_POST["abonoT"];
  $abonoP = $_POST["abonoP"];

  $query = "UPDATE adeudos SET abono='$abonoT',abono_periodo='$abonoP' WHERE id_adeudo=$idAdeudo;";

  mysqli_query($connect,$query) or die(mysqli_error($connect));


  $query2= "SELECT adeudos.id_usuario as id_usuario, adeudos.deuda as deuda, adeudos.abono as abono, adeudos.id_adeudo as idAdeudo, adeudos.id_venta as idVenta FROM adeudos JOIN ventas ON adeudos.id_venta=ventas.id_venta WHERE adeudos.id_adeudo=$idAdeudo";

  $result = mysqli_query($connect,$query2);

    $number_of_rows= mysqli_num_rows($result);
    $temp_array=array();
    if ($number_of_rows>0) {
      while ($row=mysqli_fetch_assoc($result)) {
          $temp_array[]=$row;
      }
    }
    $comparaAdeudo=$temp_array[0];
    if ($comparaAdeudo["abono"]>=$comparaAdeudo["deuda"]){
      $idV =$comparaAdeudo["idVenta"];

      $query3 = "UPDATE ventas SET modo_pago='0' WHERE id_venta=$idV;";
      mysqli_query($connect,$query3) or die(mysqli_error($connect));

      $query4 = "DELETE FROM adeudos WHERE id_adeudo=$idAdeudo;;";
      mysqli_query($connect, $query4) or die (mysqli_error($connect));
    }
    mysqli_close($connect);
}
?>
