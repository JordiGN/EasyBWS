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





$total=intval($precio)*intval($cantidad);

    if ($modopago=='Contado') {
      $this->db->set('id_producto',$nombre)//$nombre trae el id del producto
                ->set('id_usuario',$id_usuario)
                ->set('unidades_vendidas',$cantidad)
                ->set('fecha',$fecha)
                ->set('modo_pago',0)
                ->set('total',$total)
                ->insert('ventas');
    }else{
      $this->db->set('id_producto',$nombre)//$nombre trae el id del producto
                ->set('id_usuario',$id_usuario)
                ->set('unidades_vendidas',$cantidad)
                ->set('fecha',$fecha)
                ->set('modo_pago',1)
                ->set('total',$total)
                ->insert('ventas');

      $venta=$this->db->select('id_venta as lastventa')
              ->from('ventas')
              ->order_by("lastventa","DESC")
              ->limit(1)
              ->get()
              ->result_array();
      $idventa=$venta[0];

      $this->db->set('id_usuario',$id_usuario)
                ->set('id_venta',$idventa['lastventa'])
                ->set('deudor',$deudor)
                ->set('deuda',$precio*$cantidad)
                ->insert('adeudos');
    }
