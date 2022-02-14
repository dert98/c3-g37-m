   <nav class="navbar navbar-expand-lg bg5 fixed-top">
       <div class="container-fluid">
           <a class="navbar-brand" href="#">TuJoyeria</a>
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