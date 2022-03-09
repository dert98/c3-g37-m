   <nav class="navbar navbar-expand-md navbar-light fondo-color menu">
       <div class="container-fluid">
            <a class="navbar-brand" href="../index.php"><img src="../Assets/img/img_menu/logodelmenu.png" alt="Ziba" width="80px" height="60px"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
           <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item active">
                            <a class="nav-link" href="../">Productos<span class="sr-only"></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="quienes_somos.php">Quienes Somos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contacto.php">Contacto</a>
                    </li>
                    <?php
                    session_start();
                    if (isset($_SESSION["usuario"])){
                      echo '<li class="nav-item">
                              <a class="nav-link" href="../Controller/salir.php">'.ucfirst($_SESSION["usuario"]).' Salir</a>
                          </li>';
                    }else{
                      echo '<li class="nav-item">
                              <a class="nav-link" href="login.php">Login</a>
                              <a class="nav-link" href="../Model/app/usuario-create.php">Registrarse</a>
                          </li>';
                    }
                    $carrito = json_decode(file_get_contents('../Config/pcarrito.json'), true);
                    $cantPro= count($carrito);
                    echo '<a href="mostrarcarrito.php">Cant Productos: '.$cantPro.'</a>';
                ?>
                
               </ul>
           </div>
       </div>
   </nav>