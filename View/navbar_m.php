<?php
    require('head.php');
?>
<nav class="navbar navbar-expand-md navbar-light fondo-color menu">
    <div class="container-fluid mx-auto">
        <a class="navbar-brand" href="../index.php"><img src="../Assets/img/img_menu/logodelmenu.png" alt="Ziba" width="80px" height="60px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
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
                if (isset($_SESSION["usuario"])) {
                    echo '<li class="nav-item">
                            <a class="nav-link" href="../Controller/salir.php">' . ucfirst($_SESSION["usuario"]) . ' Salir</a>
                        </li>';
                    $carrito = json_decode(file_get_contents('../Config/pcarrito.json'), true);
                    $cantPro = count($carrito);
                    echo '<li>
                        <a href="mostrarcarrito.php"><svg width="2em" height="2em" viewBox="0 0 16 16" class="" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                    </svg>' . $cantPro . '</a>
                    </li>';
                } else {
                    echo '<li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../Model/app/usuario-create.php">Registrarse</a>
                        </li';
                }
                ?>


            </ul>
        </div>
    </div>
</nav>