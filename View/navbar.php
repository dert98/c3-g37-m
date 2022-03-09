<?php
    require('head.php');
?>
<nav class="navbar navbar-expand-md navbar-light fondo-color menu">
    <div class="container-fluid mx-auto">
        <a class="navbar-brand" href="index.php"><img src="Assets/img/img_menu/logodelmenu.png" alt="Ziba" width="80px" height="60px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Productos<span class="sr-only"></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="View/quienes_somos.php">Quienes Somos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="View/contacto.php">Contacto</a>
                </li>
                <?php
                session_start();
                if (isset($_SESSION["usuario"])) {
                    echo '<li class="nav-item">
                              <a class="nav-link bb3" href="Controller/salir.php">' . ucfirst($_SESSION["usuario"]) . ' Salir</a>
                          </li>';

                    $carrito = json_decode(file_get_contents('Config/pcarrito.json'), true);
                    $cantPro = count($carrito);
                    echo '<a href="view/mostrarcarrito.php"><svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-cart4 mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                          </svg>' . $cantPro . '</a>';
                } else {
                    echo '<li class="nav-item">
                              <a class="nav-link" href="view/login.php">Login</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="Model/app/usuario-create.php">Registrarse</a>
                            </li>';
                }
                ?>
            </ul>
        </div>
    </div>


</nav>
<div class="menu-btn">
    <i class="fa fas-bars">
        <ion-icon name="chevron-forward-outline"></ion-icon>
    </i>
</div>
<div class="side-bar">
    <div class="close-btn">
        <i class="fas fa-times">
            <ion-icon name="close-outline"></ion-icon>
        </i>
    </div>
    <div class="menu">
        <div class="item">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <?php
                $cate = new dbManager("categoria", "id_categoria");
                $cate->select();
                if (isset($_GET['id_categoria'])) {
                    # code...
                }
                $categorias = $cate->getArray();
                foreach ($categorias as $categoria) {
                    $cat = new obj($categoria);
                    echo '<li class="nav-item">
                            <a class="nav-link" href="index.php?idcat=' . $cat->id_categoria . '&categoria=' . $cat->nombre . '">' . $cat->nombre . '</a>
                        </li>';
                }
                ?>
            </ul>
        </div>

    </div>
</div>

<!--jquery for expand and collapse the sidebar-->
<script type="text/javascript">
    $('.menu-btn').click(function() {
        $('.side-bar').addClass('active');
        $('.menu-btn').css("visibility", "hidden");
    });

    $('.close-btn').click(function() {
        $('.side-bar').removeClass('active');
        $('.menu-btn').css("visibility", "visible");
    });
</script>




<?php
/*******************************************************************************

<nav class="navbar navbar-expand-lg bg5 fixed-top">
       <div class="container-fluid">
           <a class="navbar-brand" href="index.php"> <img src="Assets/img/img_menu/logodelmenu.png" alt="Ziba" width="80px" height="60px"> </a>
           <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
               data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
               aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
           </button>
           <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                   <li class="nav-item">
                       <a class="nav-link active" aria-current="page" href="/">Home</a>
                   </li>
                   <?php
                        $cate = new dbManager("categoria","id_categoria");
                        $cate->select();
                        $categorias = $cate->getArray();
                        foreach ($categorias as $categoria) {
                            $cat = new obj($categoria);
                            echo '<li class="nav-item">
                            <a class="nav-link" href="@">'.$cat->nombre.'</a>
                        </li>';
                        }
                   ?>
               </ul>
           </div>
           <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
       </div>
   </nav>
   





   






 *                          <nav class="navbar navbar-expand-md navbar-light fondo-color menu">
        <div class="container">
            <a class="navbar-brand" href="index.php"><img src="Assets/img/img_menu/logodelmenu.png" alt="Ziba" width="80px" height="60px"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                   <li class="nav-item">
                       <a class="nav-link active" aria-current="page" href="/">Home</a>
                   </li>
                    <?php
                        $cate = new dbManager("categoria","id_categoria");
                        $cate->select();
                        $categorias = $cate->getArray();
                        foreach ($categorias as $categoria) {
                            $cat = new obj($categoria);
                            echo '<li class="nav-item">
                            <a class="nav-link" href="@">'.$cat->nombre.'</a>
                        </li>';
                        }
                   ?>
                </ul>
            </div>
        </div>
    </nav>
 *******************************************************************************/





?>