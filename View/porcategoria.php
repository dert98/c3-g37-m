<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="text-center">
            <?php
            if (isset($_GET["idcat"])) {
                echo '<h2>Categoria '.ucfirst($_GET["categoria"]).'</h2>';
            }else{
                echo '<h2>Todas las Categorias</h2>';
            }
            ?>
        </div>
        <div>
        <?php
            $dbml = new dbManager("producto","id_producto");
            if (isset($_GET["idcat"])) {
                $idb = $_GET["idcat"];
                $dbml->where('categoria_id','=',$idb);
            }
            $dbml->select();
            $regs = $dbml->getArray();
                echo '<div class="container row">';
                foreach ($regs as $reg) {
                    $pro = new obj($reg);
                    $nomimg1 = "id-".$pro->id_producto;
                    $nomimg2 = "_c-".$pro->categoria_id;
                    $nomimg = $nomimg1.$nomimg2;
                    echo '<div class="card col-md-3">
                        <h5 class="card-header"></h5>
                        <div class="card-body">
                            <img src="./Assets/img/'.$nomimg.'.jpg" style="width: 200px; height: 200px;" class="hr1" >
                            <h5 class="card-title">'.$pro->nombre.'</h5>
                            <p class="card-text">Materiales:'.$pro->materialidad.' </p>
                            <p class="card-text">Colores:'.$pro->color.' </p>
                            <a href="View/prod-individual.php?idp='.$pro->id_producto.'" class="btn btn-primary">Comprar</a><label> '.$pro->precio.'</label> 
                        </div>
                    </div>';
                }
                echo '</div>';
        ?>
        </div>
    </div>
</body>
</html>