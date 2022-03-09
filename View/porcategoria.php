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
        echo '<div class="container row card_p">';

        foreach ($regs as $reg) {
            $pro = new obj($reg);
            $nomimg1 = "id-" . $pro->id_producto;
            $nomimg2 = "_c-" . $pro->categoria_id;
            $nomimg = $nomimg1 . $nomimg2;
            echo '<div class="card col-md-3 col-lg-3 categorias prod card_p">
                    <h5 class="card-header"></h5>
                    <div class="card-body m-1">
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
                <a href="view/carrito.php?'.$pro->id_producto.'" class="btn btn-success ">Comprar</a>
                </p>
            </div>
        </div>';
        }
        ?>
    </div>
    
</div>
<script src="../Assets/js/app.js"></script>
