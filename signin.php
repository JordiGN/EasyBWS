<?php
  if($_SERVER["REQUEST_METHOD"]=="POST"){
    require 'conection.php';

    global $connect;

    $nombre = $_POST["nombre"];
    $apellido= $_POST["apellido"];
    $email= $_POST["email"];
    $pass= $_POST["pass"];

   $query = "INSERT INTO usuarios(nombre,apellido,correo,contrasenia) VALUES ('$nombre','$apellido','$email','$pass')";

    mysqli_query($connect,$query) or die(mysqli_error($connect));
    mysqli_close($connect);
  }
 ?>



<!-- public function signin($email,$nombre,$apellido,$password){
    $this->db->set('correo',$email)
            ->set('nombre',$nombre)
            ->set('apellido',$apellido)
            ->set('contrasenia',$password)
            ->insert('usuarios');
 -->
