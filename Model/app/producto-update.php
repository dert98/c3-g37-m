<?php
// Include config file
require_once "config.php";
require_once "helpers.php";

// Define variables and initialize with empty values
$nombre = "";
$precio = "";
$color = "";
$materialidad = "";
$piedra = "";
$categoria_id = "";

$nombre_err = "";
$precio_err = "";
$color_err = "";
$materialidad_err = "";
$piedra_err = "";
$categoria_id_err = "";


// Processing form data when form is submitted
if(isset($_POST["id_producto"]) && !empty($_POST["id_producto"])){
    // Get hidden input value
    $id_producto = $_POST["id_producto"];

    $nombre = trim($_POST["nombre"]);
		$precio = trim($_POST["precio"]);
		$color = trim($_POST["color"]);
		$materialidad = trim($_POST["materialidad"]);
		$piedra = trim($_POST["piedra"]);
		$categoria_id = trim($_POST["categoria_id"]);
		

    // Prepare an update statement
    $dsn = "mysql:host=$db_server;dbname=$db_name;charset=utf8mb4";
    $options = [
        PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
    ];
    try {
        $pdo = new PDO($dsn, $db_user, $db_password, $options);
    } catch (Exception $e) {
        error_log($e->getMessage());
        exit('Something weird happened');
    }

    $vars = parse_columns('producto', $_POST);
    $stmt = $pdo->prepare("UPDATE producto SET nombre=?,precio=?,color=?,materialidad=?,piedra=?,categoria_id=? WHERE id_producto=?");

    if(!$stmt->execute([ $nombre,$precio,$color,$materialidad,$piedra,$categoria_id,$id_producto  ])) {
        echo "Something went wrong. Please try again later.";
        header("location: error.php");
    } else {
        $stmt = null;
        header("location: producto-read.php?id_producto=$id_producto");
    }
} else {
    // Check existence of id parameter before processing further
	$_GET["id_producto"] = trim($_GET["id_producto"]);
    if(isset($_GET["id_producto"]) && !empty($_GET["id_producto"])){
        // Get URL parameter
        $id_producto =  trim($_GET["id_producto"]);

        // Prepare a select statement
        $sql = "SELECT * FROM producto WHERE id_producto = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Set parameters
            $param_id = $id_producto;

            // Bind variables to the prepared statement as parameters
			if (is_int($param_id)) $__vartype = "i";
			elseif (is_string($param_id)) $__vartype = "s";
			elseif (is_numeric($param_id)) $__vartype = "d";
			else $__vartype = "b"; // blob
			mysqli_stmt_bind_param($stmt, $__vartype, $param_id);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);

                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    // Retrieve individual field value

                    $nombre = $row["nombre"];
					$precio = $row["precio"];
					$color = $row["color"];
					$materialidad = $row["materialidad"];
					$piedra = $row["piedra"];
					$categoria_id = $row["categoria_id"];
					

                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }

            } else{
                echo "Oops! Something went wrong. Please try again later.<br>".$stmt->error;
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);

    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <section class="pt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="page-header">
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">

                        <div class="form-group">
                                <label>nombre</label>
                                <input type="text" name="nombre" maxlength="70"class="form-control" value="<?php echo $nombre; ?>">
                                <span class="form-text"><?php echo $nombre_err; ?></span>
                            </div>
						<div class="form-group">
                                <label>precio</label>
                                <input type="text" name="precio" class="form-control" value="<?php echo $precio; ?>">
                                <span class="form-text"><?php echo $precio_err; ?></span>
                            </div>
						<div class="form-group">
                                <label>color</label>
                                <input type="text" name="color" maxlength="70"class="form-control" value="<?php echo $color; ?>">
                                <span class="form-text"><?php echo $color_err; ?></span>
                            </div>
						<div class="form-group">
                                <label>materialidad</label>
                                <input type="text" name="materialidad" maxlength="70"class="form-control" value="<?php echo $materialidad; ?>">
                                <span class="form-text"><?php echo $materialidad_err; ?></span>
                            </div>
						<div class="form-group">
                                <label>piedra</label>
                                <input type="text" name="piedra" maxlength="70"class="form-control" value="<?php echo $piedra; ?>">
                                <span class="form-text"><?php echo $piedra_err; ?></span>
                            </div>
						<div class="form-group">
                                <label>categoria_id</label>
                                <input type="number" name="categoria_id" class="form-control" value="<?php echo $categoria_id; ?>">
                                <span class="form-text"><?php echo $categoria_id_err; ?></span>
                            </div>

                        <input type="hidden" name="id_producto" value="<?php echo $id_producto; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="producto-index.php" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
