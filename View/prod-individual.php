      <body>
          <main>
              <section>
                  <div class='row  product'>
                      <div class='col-8 col-md-4 col-lg-6 text-center'>
                          <?php
                            if (isset($_GET["idp"])) {
                                $idb = $_GET["idp"];
                                include('dbmlController.php');
                                include('productoController.php');
                                $dbml = new dbManager("producto","id_producto");
                                $dbml->select();
                                $dbml->where('id_producto','=',$idb);
                                $prod = $dbml->getArray();
                                $pro = new obj($prod[0]); // ver bien en q posicion devuelve los datos requeridos
                            }
                            $idp = $_GET["idp"];
                            //    y con esto sabemos que comentarios, valoracion y mail se mandaron.
                            if (isset($_GET['in_enviar_comentario'])) { //es importante el id en esta parte porque es lo que relaciona el comentario con el tipo de producto
                                $id_p = $_GET['id_p'];
                                $in_valoracion = $_GET['in_valoracion'];
                                $in_correo = $_GET['in_correo'];
                                $in_comentario = $_GET['in_comentario'];

                                array_push($a_comentarios, array(
                                    'id_p' => $id_p,
                                    'valoracion' => $in_valoracion,
                                    'email' => $in_correo,
                                    'comentario' => $in_comentario
                                ));
                                // ahora pisamos el nuevo comentario y lo metemos en el json
                                file_put_contents('../json/comentarios.json', json_encode($a_comentarios));


                            ?>
                              <!-- Alerta de mensaje enviado-->
                              <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
                                  <strong>Hola <?php echo $in_correo ?> <br>
                                  </strong> Recibimos tú comentario: "<?php echo $in_comentario ?>"
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <!-- fin de alerta de mensaje enviado-->
                          <?php
                            }



                            if (isset($_POST['in_carrito'])) {
                                $id_p = $_POST['id_p'];
                                $in_nombre_c = $_POST['in_nombre'];
                                $in_precio_c = $_POST['in_precio'];
                                $in_color_c = $_POST['in_color'];
                                $in_material_c = $_POST['in_materialidad'];
                                $in_piedra_c = $_POST['in_piedra'];
                                $in_tamaño_c = $_POST['in_tamaño'];
                                $in_c_c = $_POST['id_c'];
                                $im_c_c = $_POST['im_c'];


                                array_push($a_carrito, array(
                                    'id_p' => $id_p,
                                    'nombre' => $in_nombre_c,
                                    'precio' => $in_precio_c,
                                    'color' => $in_color_c,
                                    'Materialidad' => $in_material_c,
                                    'Piedra' => $in_piedra_c,
                                    'tamaño' => $in_tamaño_c,
                                    'id_c' => $in_c_c,
                                    'im_c' => $im_c_c
                                ));
                                // ahora pisamos el producto y lo metemos en el json de carrito
                                file_put_contents('../json/pcarrito.json', json_encode($a_carrito));



                            ?>
                              <!-- Alerta de mensaje enviado-->
                              <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
                                  <strong>Hola <br>
                                  </strong> Su producto se agrego al carrito
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <!-- fin de alerta de mensaje enviado-->
                          <?php
                            }


                            ?>
                            <?php
                            $nomimg1 = "id-".$pro->id_producto;
                            $nomimg2 = "_c-".$pro->categoria_id;
                            $nomimg = $nomimg1.$nomimg2;
                            ?>
                          <img src= <?php echo "../Assets/img/$nomimg.jpg"?> class='card-img-top rounded' alt='...' style="width: 200px; height: 200px;">
                      </div>

                      <div class='col-8 col-md-4 col-lg-6'>




                          <h4 id='tprod'><?php echo  $pr_no ?></h4>

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
                                      <th scope='row'><?php echo  $pro->color?></th>
                                      <td><?php echo  $pro->materialidad ?></td>
                                      <td><?php echo  $pro->piedra ?></td>
                                  </tr>
                              </tbody>
                          </table>


                          <p class='precio'><?php echo  $pr_pre ?></p>

                          <!--   inicio carrito 
                         $pr_no_c = $a_carrito[$carr_id]['nombre'];
                            $pr_col_C = $a_carrito[$carr_id]['color'];
                            $pr_c_c = $a_carrito[$carr_id]['id_c'];
                            $pr_m_c = $a_carrito[$carr_id]['Materialidad'];
                           // $pr_im_c = "../fotos/imagenes-grandes/id-" . $pr_id . "_c-" . $pr_c . ".jpg";
                            $pr_pi_c = $a_carrito[$carr_id]['Piedra'];
                            $pr_ta_c = $a_carrito[$carr_id]['Tamaño'];
                            $pr_pre_c = $a_carrito[$carr_id]['precio'];
                        
                         $pr_no = $a_productos[$pr_id]['nombre'];
                            $pr_col = $a_productos[$pr_id]['color'];
                            $pr_c = $a_productos[$pr_id]['id_c'];
                            $pr_m = $a_productos[$pr_id]['Materialidad'];
                            $pr_im = "../fotos/imagenes-grandes/id-" . $pr_id . "_c-" . $pr_c . ".jpg";
                            $pr_pi = $a_productos[$pr_id]['Piedra'];
                            $pr_ta = $a_productos[$pr_id]['Tamaño'];
                            $pr_pre = $a_productos[$pr_id]['precio'];
                        
                        
                        
                        -->
                          <!--en esta parte esta el form oculto para el carrito de compra, trate de guardar las variales ya establecidas
                            pero no me toma la info ni tampoco me la guarda, me estaria faltando un paso para que me guarde los archivos 
                            que necesito-->
                          <form action="a_prod.php" method="post">
                              <input type="hidden" value="<?= $a_productos[$pr_id]['id_p'] ?>" name="in_id">
                              <input type="hidden" value="<?= $a_productos[$pr_id]['nombre'] ?>" name="in_nombre">
                              <input type="hidden" value="<?= $a_productos[$pr_id]['precio'] ?>" name="in_precio">
                              <input type="hidden" value="<?= $a_productos[$pr_id]['color'] ?>" name="in_color">
                              <input type="hidden" value="<?= $a_productos[$pr_id]['Materialidad'] ?>" name="in_materialidad">
                              <input type="hidden" value="<?= $a_productos[$pr_id]['Piedra'] ?>" name="in_piedra">
                              <input type="hidden" value="<?= $a_productos[$pr_id]['Tamaño'] ?>" name="in_tamaño">
                              <input type="hidden" value="<?= $a_productos[$pr_id]['id_c'] ?>" name="id_c">
                              <input type="hidden" value="<?= "fotos/imagenes-chicas/id-". $pr_id . "_c-" . $pr_c . ".jpg" ?>" name="im_c">
                              <!--   boton CARRITO -->
                              <input type="hidden" name="id_p" value="<?php echo  $carr_id ?>">
                          <!--    <input type="submit" class='btn botonenviar' name="in_carrito">-->

                              <button type='submit' class='btn botonenviar' name="in_carrito">
                                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart4 mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                      <path fill-rule="evenodd" d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                                  </svg>
                                  Agregar al carrito</button>
                          </form>

                      </div>
                  </div>



              </section>



              <section>
                  <div class="container">
                      <div class="row">
                          <div class="col-10 col-md-10 col-lg-10">
                              <h3>Dejá tu comentario</h3>

                              <form action="" method="get">

                                  <!--   inicio de valoracion -->
                                  <div id='valor' class='form-grup'>
                                      <p>Valoración <br>
                                          <div class='form-check form-check-inline '>
                                              <input class='form-check-input' type='radio' name='in_valoracion' id='inlineRadio1' value='1'>
                                              <label for='form-check-label' for='inlineRadio1'>1</label>
                                          </div>
                                          <div class='form-check form-check-inline '>
                                              <input class='form-check-input' type='radio' name='in_valoracion' id='inlineRadio2' value='2'>
                                              <label for='form-check-labe2' for='inlineRadio2'>2</label>
                                          </div>
                                          <div class='form-check form-check-inline'>
                                              <input class='form-check-input' type='radio' name='in_valoracion' id='inlineRadio3' value='3'>
                                              <label for='form-check-labe3' for='inlineRadio3'>3</label>
                                          </div>
                                          <div class='form-check form-check-inline'>
                                              <input class='form-check-input' type='radio' name='in_valoracion' id='inlineRadio4' value='4'>
                                              <label for='form-check-labe4' for='inlineRadio4'>4</label>
                                          </div>
                                          <div class='form-check form-check-inline'>
                                              <input class='form-check-input' type='radio' name='in_valoracion' id='inlineRadio5' value='5'>
                                              <label for='form-check-labe5' for='inlineRadio5'>5</label>
                                          </div>
                                      </p>
                                  </div>
                                  <!--   fin de valoracion -->

                                  <!--   inicio de correo -->
                                  <div class='form-group mt-3'>
                                      <p> <input type='email' name='in_correo' class='form-control' placeholder='Email' value='<?php
                                                                                                                                if (isset($mail)) echo $mail ?>'></input></p>
                                  </div>
                                  <!--   fin de correo -->
                                  <!--    <p>Correo Electronico <br>
    <input type="email" name="in_correo"></p> -->


                                  <!--    si no funciona lo otro se usa este=> <input type="text" name="in_valoracion"></p>            -->
                                  <!--   inicio de comentario -->
                                  <div class='form-group mt-3'>
                                      <p><textarea class='form-control' id='exampleFormControlTextarea1' name='in_comentario' placeholder='Dejá tu comentario' rows='3' value='<?php if (isset($comentario)) echo $comentario ?>'></textarea></p>
                                  </div>
                                  <!--   fin de comentario -->

                                  <!--   por alguna razon no me esta tomando la salida.php y me imprime comentarios vacios-->


                                  <!--el input de type hidden es para que este oculto lo que tomamos del $pr_id -->
                                  <input type="hidden" name="id_p" value="<?php echo  $pr_id ?>">
                                  <!--   boton enviar -->
                                  <input type="submit" class='btn botonenviar' name="in_enviar_comentario">
                                  <?php
                                    echo '<hr>';
                                    include('salida.php');

                                    ?>

                              </form>
                          </div>
                      </div>
                  </div>


                  <div class="container">
                      <div class="row">
                          <div class="col-12 col-md-8 col-lg-8">
                              <h3>Últimos comentarios</h3>
                              <?php
                                $a_comentariosR = array_reverse($a_comentarios);
                                $cont = 1;
                                //recorremos el array de $a_comentarios,
                                //y nos muestra los comentarios ya impresos. 
                                foreach ($a_comentariosR as $a_comentario) { //si el comentario del id_producto es igual a pr_id lo muestra.
                                    if ($a_comentario["id_p"] == $pr_id) {
                                        $a_val =  $a_comentario["valoracion"];
                                        $a_em =  $a_comentario["email"];
                                        $a_co =  $a_comentario["comentario"];
                                        $cont++;
                                        // aca mostramos todos los comentarios guardados en el json  

                                        echo '<p><strong>Valoración: ' . $a_val . '</strong><br>';
                                        echo '<strong>Email: </strong>' . $a_em . '<br>';
                                        echo '<strong>Comentario: </strong>' . $a_co . '</p>';
                                    }

                                    if ($cont >= 4)

                                        break;
                                }
                                ?>

                          </div>
                      </div>
                  </div>
              </section>

          </main>

          <?php
            require_once('footer.php');
            require_once('scripts-footer.php');
            ?>
          <!-- Optional JavaScript -->
          <!-- jQuery first, then Popper.js, then Bootstrap JS 
            <script src='https://code.jquery.com/jquery-3.5.1.min.js'></script>
            <script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js' integrity='sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN' crossorigin='anonymous'></script>
            <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js' integrity='sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV' crossorigin='anonymous'></script>
        -->
          <!-- Script jQuery para que el alerta se valla despues de mostrar la interaccion
            <script>
            $(document).ready(function()
            {
               $("#success-alert").fadeTo(3000, 500).slideUp(500, function()
               {
                $("#success-alert").slideUp(500);
               });
            });
            </script>-->
      </body>

      </html>