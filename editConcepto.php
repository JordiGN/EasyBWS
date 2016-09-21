<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
  require "conection.php";

  global $connect;

  $idConcepto = $_POST["idConcepto"];
  $idRubro = $_POST["idRubro"];
  $nombre = $_POST["nombre"];
  $costo = $_POST["costo"];

  $query = "UPDATE catalogo_gastos SET id_rubro='$idRubro',nombre='$nombre',costo='$costo' WHERE id_concepto='$idConcepto';";


  mysqli_query($connect, $query) or die (mysqli_error($connect));
  mysqli_close($connect);
}
?>
