<?php
  include('../view/dbmlController.php');
  include('../view/productoController.php');
    $u = $_POST["usuario"];
    $p = $_POST["password"];
  $dbml = new dbManager("usuario","id_usuario");
    $dbml->select();
    $dbml->where('usuario','=',$u);
    var_dump($dbml);
    $usu = new obj($dbml->getArray());
    var_dump($usu);
    if (($usu->usuario = $u) && ($usu->contrasenia = $p)){
      session_start();
      $_SESSION["usuario"]=$u;
      echo 'esta registrado';
      header("Location: ../Model/app/index.php");
    }else{
    //header("Location: ../");
  }  
  // include("../dbml.php");
  // $dbml = new dbManager("usuarios","id");
  // $data = $dbml->buscarDbClave("firstname",$u);
  // if ($data->num_rows == 1) {
  //   session_start();
  //   $_SESSION["usuario"] = $u;
  //   $_SESSION["password"] = $p;
  //   $dbml->close();
  //   header("Location: ../index.php");
  // }else{
  //   header("Location: ../sections/login.php");
  exit();
?>