<?php
var_dump($_POST);
  if (isset($_POST["usuario"]) && isset($_POST["password"])){
    $u = $_POST["usuario"];
    $p = $_POST["password"];
    if (($u == 'admin') && ($p =='123456')){
      session_start();
      $_SESSION["usuario"]=$u;
      header("Location: ../Model/app/index.php");
    }
  }else{
    header("Location: login.php");
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