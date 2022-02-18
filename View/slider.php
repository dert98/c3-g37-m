<!DOCTYPE html>
<html>
<head>
    <title>Joyeria</title>
</head>
<body>
    <div class="container bg mt-4">
        <div class="" style="height: 120px">
            <h1 class="text-center align-middle">Producto de Calidad</h1>
        </div>
    </div>
    <div class="container">
        <?php
            $dbml = new dbManager("categoria","id_categoria");
            $dbml->select();
            $dbml = new dbManager("producto","id_producto");
            $dbml->select();
            $regs = $dbml->getArray();
            echo '<div class="container row">';
            foreach ($regs as $reg) {
                $pro = new obj($reg);
                $nomimg1 = "id-".$pro->id_producto;
                $nomimg2 = "_c-".$pro->categoria_id;
                $nomimg = $nomimg1.$nomimg2;
                echo '<div class="card col-12 col-m-6 col-lg-3">
                    <h5 class="card-header"></h5>
                    <div class="card-body">
                        <img src="Assets/img/'.$nomimg.'.jpg" style="width: 250px; height: 200px;" >
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
    <p>
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quos, corporis. Eaque aut doloremque molestiae enim error ex eligendi ea quasi beatae! Nam labore at iste eum ut vero numquam illo odit vel obcaecati!
    </p>
</body>
</html>