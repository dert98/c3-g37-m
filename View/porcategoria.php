<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        // include('View/navbar.php');
    ?>
    <div class="container">
        <div class="text-center">
            <?php
            echo '<h2>Categoria '.$_GET["categoria"].'</h2>';
            echo '<h2>Id de Categoria '.$_GET["idcat"].'</h2>';
            ?>
        </div>
        <div>
        <?php
            include('dbmlController.php');
            include('productoController.php');
            $dbml = new dbManager("producto","id_producto");
            $dbml->select();
            $idb = $_GET["idcat"];
            $dbml->where('categoria_id','=',$idb);
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
                        <img src="../Assets/img/'.$nomimg.'.jpg" style="width: 200px; height: 200px;" >
                        <h5 class="card-title">Colores: '.$pro->nombre.'</h5>
                        <p class="card-text">Materiales:'.$pro->materialidad.' </p>
                        <p class="card-text">Colores:'.$pro->color.' </p>
                        <a href="View/prod-individual.php?idp='.$pro->id_producto.'" class="btn btn-primary">Comprar</a><label>S/.'.$pro->precio.'</label> 
                    </div>
                </div>';
            }
            echo '</div>';
        ?>
        </div>
    </div>
</body>
</html>