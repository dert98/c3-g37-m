<?php

use LDAP\Result;
session_start();
if (isset($_SESSION["usuario"])) {
    header("Location: ../view/login.php");
} 
$carrito = json_decode(file_get_contents('../Config/pcarrito.json'), true);
$pos = $_GET['id'];
$pos--;
var_dump($_POST);
if (isset($_POST['in_carrito'])) {
    $id_p = $_POST['in_id'];
    $id_n = $_POST['in_nombre'];
    $id_pr = $_POST['in_precio'];
    $id_cant = 1;

    array_push($carrito, array(
        'id_p' => $id_p,
        'nombre' => $id_n,
        'precio' => $id_pr,
        'cantidad' => $id_cant,
    ));
}
if ($_GET['accion'] == 'e') {
    unset($carrito[$pos]);
    $carrito = array_values($carrito);  
}
if ($_GET['accion'] == 'r') {
    $pro = $carrito[$pos];
    $cant = $pro['cantidad'];
    $cantn = (int)$cant;
    $cant --;
    $carrito[$pos]['cantidad'] = strval($cant);
}
if ($_GET['accion'] == 's') {
    $pro = $carrito[$pos];
    $cant = $pro['cantidad'];
    $cantn = (int)$cant;
    $cant ++;
    $carrito[$pos]['cantidad'] = strval($cant);
}
file_put_contents('../Config/pcarrito.json', json_encode($carrito));
header("Location: ../view/mostrarcarrito.php");
?>
