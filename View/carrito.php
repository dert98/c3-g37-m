<?php

use LDAP\Result;
$carrito = json_decode(file_get_contents('../Config/pcarrito.json'), true);
var_dump($carrito);
$pos = $_GET['id'];
$pos = $pos-1;
if ($_GET['accion'] == 'e') {
    unset($carrito[$pos]);
    $carrito = array_values($carrito);
}
echo '<br>';
if ($_GET['accion'] == 'r') {
    $pro = $carrito[$pos];
    $cant = $pro[$pos]['cantidad'];
    $cantn = (int)$cant;
    $cant --;
    $pro['cantidad'] = strval($cantn);
    $carrito[$pos] = $pro;
}
echo '<br>';
if ($_GET['accion'] == 's') {
    $pro = $carrito[$pos];
    $cant = $pro[$pos]['cantidad'];
    $cantn = (int)$cant;
    $cant ++;
    $pro['cantidad'] = strval($cantn);
    $carrito[$pos] = $pro;
}
echo '<br>';
var_dump($carrito);
// file_put_contents('../Config/pcarrito.json', json_encode($carrito));
// header("Location: ../view/mostrarcarrito.php");
?>
