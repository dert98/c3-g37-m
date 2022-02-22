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
                  <div class='row cuadro'>
                      <div class='col-8 col-md-4 col-lg-6 text-center'>
                          <img src=<?php echo "../Assets/img/$nomimg.jpg" ?> 
                          class="mt-3" style="width: 380px; height: 300px;">
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

                          <p class='precio text-end h2'>$ <?php echo  $pro->precio ?></p>
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
                           <button type='submit' class='btn botonenviar' name="in_carrito">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart4 mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                        </svg>
                        Agregar al carrito</button>
                    <button class="text-end btn botonenviar" name="in_comprar">
                        <a href="View/prod-individual.php?idp='.$pro->id_producto.'" class="btn ">Comprar</a>
                    </button>
              </section>
          </main>
          <?php
            require_once('footer.php');
            ?>
      </body>

      </html>