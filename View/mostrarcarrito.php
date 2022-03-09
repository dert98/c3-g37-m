<?php

use LDAP\Result;

require('head.php');
require_once('navbar_m.php');
$carro = json_decode(file_get_contents('../Config/pcarrito.json'), true);
?>
<table class="table">
    <thead>
        <tr>
            <th scope='col'>S/N</th>
            <th scope='col'>ID</th>
            <th scope='col'>Color</th>
            <th scope='col'>Precio por c/u</th>
            <th scope='col'>Cantidad</th>
            <th scope='col'>precio total</th>
            <th scope='col'>operaciones</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $id= 1;
    $Total = 0;
    foreach ($carro as $producto) {
        $pr_id = $producto['id_p'];
        $pr_no = $producto['nombre'];
        $pr_pr = $producto['precio'];
        $pr_ca = $producto['cantidad'];
        $preciot = $pr_pr*$pr_ca;
        echo '
        <tr class="mt-1">
            <td>
                <p class="card-text">'.$id.'</p>
            </td>
            <td>
                <p class="card-text">'.$pr_id.'</p>
            </td>
            <td>
                <h5 class="card-text">'.$pr_no.'</h5>
            </td>
            <td>
                <p class="card-text precio">$'.$pr_pr.'</p>
            </td>
            <td>
                <p class="card-text precio">'.$pr_ca.'</p>
            </td>
            <td>
                <p class="card-text preciot">$'.$preciot.'</p>
            </td>
            <td>                              
            <a href="carrito.php?id='.$id.'&accion=r" class="btn btn-primary">-</a>
            <a href="carrito.php?id='.$id.'&accion=s" class="btn btn-primary">+</a>
            <a href="carrito.php?id='.$id.'&accion=e" class="btn btn-primary">Eliminar</a>';
            $id++;
            $Total= $Total + $preciot;
    }
    ?>
            </td>
        </tr>
    </tbody>
</table>
<table class="table">
    <thead>
        <tr>
            <th>Total a Pagar:</th>
            <th><?php echo 'S/. '.$Total ?></th>
        </tr>
    </thead>
</table>
<div class="text-center">
    <p><a href="" class="btn btn-success">Comprar</a></p>
</div>
<?php
require_once("footer.php");
?>