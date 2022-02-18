<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        include ('head.php');
        include ('navbar_m.php');
        
    ?>
    <title>Document</title>
</head> 
    <body>
          <main>
              <section>
                  <div class='row  product bg2 h400'>
                      <div class='col-8 col-md-4 col-lg-6 text-center mt-2'>
                          <?php
                            if (isset($_GET["idp"])) {
                                $idb = $_GET["idp"];
                                include('dbmlController.php');
                                include('productoController.php');
                                $dbml = new dbManager("producto", "id_producto");
                                $dbml->select();
                                $dbml->where('id_producto', '=', $idb);
                                $prod = $dbml->getArray();
                                $pro = new obj($prod[0]); // ver bien en q posicion devuelve los datos requeridos
                            }
                            $nomimg1 = "id-" . $pro->id_producto;
                            $nomimg2 = "_c-" . $pro->categoria_id;
                            $nomimg = $nomimg1 . $nomimg2;
                            ?>
                          <img src=<?php echo "../Assets/img/$nomimg.jpg" ?> class='card-img-top rounded' alt='...' style="width: 200px; height: 200px;">
                      </div>

                      <div class='col-8 col-md-4 col-lg-6'>
                          <h4 id='tprod'><?php echo  $pro->nombre ?></h4>
                          <table class='table table-bordered mt-3'>
                              <thead>
                                  <tr>
                                      <th scope='col'>Color</th>
                                      <th scope='col'>Materialidad</th>
                                      <th scope='col'>Piedra</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <th scope='row'><?php echo  $pro->color ?></th>
                                      <td><?php echo  $pro->materialidad ?></td>
                                      <td><?php echo  $pro->piedra ?></td>
                                  </tr>
                              </tbody>
                          </table>


                          <p class='precio'>Precio del producto: <?php echo  $pro->precio ?></p>
                          <?php
                            if ($pro->precio < 100) {
                                echo '<label for="" class="text-danger">Oferta</label>';
                            }
                          ?>
              </section>
          </main>
          <?php
            require_once('footer.php');
            ?>
      </body>

      </html>