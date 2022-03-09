<?php

use LDAP\Result;
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: ../");
} 
$carrito = json_decode(file_get_contents('../Config/pcarrito.json'), true);
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
    file_put_contents('../Config/pcarrito.json', json_encode($carrito));
}
header("Location: ../");
