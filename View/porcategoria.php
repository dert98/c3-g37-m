<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
<div class="container todas">
    <div class="text-center">
        <?php
        echo '<label class="bb2 h2 m-5">';
        if (isset($_GET["idcat"])) {
            echo 'Categoria ' . ucfirst($_GET["categoria"]);
        } else {
            echo 'Todas las Categorias';
        }
        echo "</label>";
        ?>
    </div>
    <div>
        <?php
        $dbml = new dbManager("producto", "id_producto");
        $dbml->select();
        if (isset($_GET["idcat"])) {
            $idb = $_GET["idcat"];
            $dbml->where('categoria_id', '=', $idb);
        }
        $regs = $dbml->getArray();
        echo '<div class="row m-3 p-3 bg3">';

        foreach ($regs as $reg) {
            $pro = new obj($reg);
            $nomimg1 = "id-" . $pro->id_producto;
            $nomimg2 = "_c-" . $pro->categoria_id;
            $nomimg = $nomimg1 . $nomimg2;
            echo '<div class="card col-md-4 col-lg-4 text-center fondo-color">
                    <div class="card-body">
                        <a href="View/prod-individual.php?idp=' . $pro->id_producto . '"> <img src="./Assets/img/' . $nomimg . '.jpg" style="" class="hr3 hr1 img-fluid"></a>
                        <h3 class="card-title">' . $pro->nombre . '</h3>
                        <p class="card-text">Materiales:' . $pro->materialidad . ' </p>
                        <p class="card-text" id="colores";>';
            $cadena = $pro->color;
            $separador = ' ';
            $separada = explode($separador, $cadena);
            for ($i = 0; $i <= count($separada) - 1; $i++) {
                echo '<img src="./Assets/img/colores/' . $separada[$i] . '.jpg" style="width: 25px; height: 25px;"  class="m-1" alt="' . $separada[$i] . '">';
            }
            echo '
                </p>
                <p class"h3 t3"><label class="precio">Precio: $' . $pro->precio . ' </label></p>
                <p>
                <a href="view/prod-individual.php?idp=' . $pro->id_producto . '" class="btn btn-primary">Detalle</a>
                <form action="view/addcarrito.php" method="post">
                        <input type="hidden" value="'.$pro->id_producto .'" name="in_id">
                        <input type="hidden" value="'.$pro->nombre .'" name="in_nombre">
                        <input type="hidden" value="'.$pro->precio .'" name="in_precio">
                        <a href="view/addcarrito.php?idp=$pro->id_producto"> <button type="submit" class="btn btn-success" name="in_carrito">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart4 mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                                </svg>
                                Agregar al carrito</button>
                            </a>
                    </form>
            </div>
        </div>';
        }
        ?>
    </div>
    
</div>
