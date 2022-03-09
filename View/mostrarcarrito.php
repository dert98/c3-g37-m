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
    foreach ($carro as $producto) {
        $pr_id = $producto['id_p'];
        $pr_no = $producto['nombre'];
        $pr_pr = $producto['precio'];
        $pr_ca = $producto['cantidad'];
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
                <p class="card-text preciot">$'.$pr_pr*$pr_ca.'</p>
            </td>
            <td>                              
            <a href="carrito.php?id='.$id.'&accion=r" class="btn btn-primary">-</a>
            <a href="carrito.php?id='.$id.'&accion=s" class="btn btn-primary">+</a>
            <a href="carrito.php?id='.$id.'&accion=e" class="btn btn-primary">Eliminar</a>';
            $id++;
    }
    ?>
            </td>
        </tr>
    </tbody>
</table>
<?php
require_once("footer.php");
?>