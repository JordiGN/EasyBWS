<?php
  if($_SERVER["REQUEST_METHOD"]=="POST"){
    require 'conection.php';

    global $connect;


    $idUsuario = $_POST["idUsuario"];
    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];
    $rubroExistente = $_POST["rubroExistente"];
    $tiporubro = $_POST["tiporubro"];
    $rubroNuevo = $_POST["rubroNuevo"];

   if ($tiporubro=="Existe") {
   $query = "INSERT INTO catalogo_gastos(id_usuario,id_rubro,nombre, costo ) VALUES ('$idUsuario','$rubroExistente','$nombre','$precio');";

  }else{
     $query2 = "INSERT INTO rubros(id_usuario,nombre) VALUES ('$idUsuario','$rubroNuevo');";

     mysqli_query($connect,$query2) or die(mysqli_error($connect));

    $query3= "SELECT id_rubro as lastrubro FROM rubros ORDER BY lastrubro  DESC LIMIT 1";

     $result = mysqli_query($connect,$query3);

     $number_of_rows= mysqli_num_rows($result);
    $temp_array=array();
    if ($number_of_rows>0) {
      while ($row=mysqli_fetch_assoc($result)) {
          $temp_array[]=$row;
        # code...
      }
      # code...
    }

    $newRubro2 = $temp_array[0];
     $newRubro=$newRubro2['lastrubro'];

    $query = "INSERT INTO catalogo_gastos(id_usuario,id_rubro,nombre, costo ) VALUES ('$idUsuario','$newRubro','$nombre','$precio');";
  }

    mysqli_query($connect,$query) or die(mysqli_error($connect));
    mysqli_close($connect);
  }
 ?>
