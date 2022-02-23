<nav class="navbar navbar-expand-md navbar-light fondo-color menu">
    <div class="container">
        <a class="navbar-brand" href="index.php"><img src="Assets/img/img_menu/logodelmenu.png" alt="Ziba" width="80px" height="60px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
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
                    if (isset($_SESSION["usuario"])){
                      echo '<li class="nav-item">
                              <a class="nav-link" href="Controller/salir.php">'.ucfirst($_SESSION["usuario"]).' Salir</a>
                          </li>';
                    }else{
                      echo '<li class="nav-item">
                              <a class="nav-link" href="view/login.php">Login</a>
                          </li>';
                    }
                ?>
            </ul>
        </div>
    </div>


    </nav>
<div class="menu-btn">
<i class="fa fas-bars"><ion-icon name="chevron-forward-outline"></ion-icon></i>
</div>
<div class="side-bar">
    <div class="close-btn">
        <i class="fas fa-times"><ion-icon name="close-outline"></ion-icon></i>
    </div>
    <div class="menu">
        <div class="item"> 
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  
                   <?php
                        $cate = new dbManager("categoria","id_categoria");
                        $cate->select();
                        if (isset($_GET['id_categoria'])) {
                            # code...
                        }
                        $categorias = $cate->getArray();
                        foreach ($categorias as $categoria) {
                            $cat = new obj($categoria);
                            echo '<li class="nav-item">
                            <a class="nav-link" href="index.php?idcat='.$cat->id_categoria.'&categoria='.$cat->nombre.'">'.$cat->nombre.'</a>
                        </li>';
                        }
                   ?>
               </ul>
            </div>
        
    </div>
</div>

<!--jquery for expand and collapse the sidebar-->
<script type="text/javascript">

$('.menu-btn').click(function(){
    $('.side-bar').addClass('active');
    $('.menu-btn').css("visibility", "hidden");
});

$('.close-btn').click(function(){
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
