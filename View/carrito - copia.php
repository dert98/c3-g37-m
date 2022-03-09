<?php

use LDAP\Result;

$a_carrito = json_decode(file_get_contents('../Config/pcarrito.json'), true);

if (isset($_POST['in_carrito'])) {
    $id_p = $_POST['in_id'];
    $id_n = $_POST['in_nombre'];
    $id_pr = $_POST['in_precio'];
    
    array_push($a_carrito, array(
        'id_p' => $id_p,
        'nombre' => $id_n,
        'precio' => $id_pr,


    ));
    // ahora pisamos el producto y lo metemos en el json de carrito
    file_put_contents('../Config/pcarrito.json', json_encode($a_carrito));

    }
    header("Location: ../view/mostrarcarrito.php");
?>
