<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://dert98.github.io/Porfolio/global.css">
</head>
<body>
    <div class="container">
        <div class="text-center">
            <?php
            echo '<label class="bb2 h2 p-2 m-2">';
            if (isset($_GET["idcat"])) {
                echo 'Categoria '.ucfirst($_GET["categoria"]);
            }else{
                echo 'Todas las Categorias';
            }
            echo "</label>";
            ?>
        </div>
        <div>
        <?php
            $dbml = new dbManager("producto","id_producto");
            $dbml->select();
            if (isset($_GET["idcat"])) {
                $idb = $_GET["idcat"];
                $dbml->where('categoria_id','=',$idb);
            }
            $regs = $dbml->getArray();
                echo '<div class="container row">';
                foreach ($regs as $reg) {
                    $pro = new obj($reg);
                    $nomimg1 = "id-".$pro->id_producto;
                    $nomimg2 = "_c-".$pro->categoria_id;
                    $nomimg = $nomimg1.$nomimg2;
                    echo '<div class="card col-md-3">
                        <h5 class="card-header"></h5>
                        <div class="card-body m-1 p-1">
                            <img src="./Assets/img/'.$nomimg.'.jpg" style="width: 200px; height: 200px;" class="hr3 hr1" >
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