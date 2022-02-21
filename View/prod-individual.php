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
                  <div class='row h400 m-2 p-2 b4'>
                      <div class='col-8 col-md-4 col-lg-6 text-center'>
                          <img src=<?php echo "../Assets/img/$nomimg.jpg" ?> 
                          class="mt-3" style="width: 300px; height: 300px;">
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

                          <p class='precio text-end'>Precio del producto: <?php echo  $pro->precio ?></p>
                          <p>
                            <label>Cantidad de productos</label>
                            <select name="select">
                              <option value="1" selected>1</option>
                              <?php
                                for ($i=2; $i < 10 ; $i++) { 
                                  echo '<option value="'.$i.'">'.$i.'</option>';
                                }
                              ?>
                            </select>
                          </p>
                          <?php
                            if ($pro->precio%2==0) {
                                echo '<label for="" class="text-danger">Oferta</label>';
                            }
                          ?>
                          <p class="text-end">                            
                            <a href="View/prod-individual.php?idp='.$pro->id_producto.'" class="btn btn-primary">Comprar</a>
                          </p>
              </section>
          </main>
          <?php
            require_once('footer.php');
            ?>
      </body>

      </html>