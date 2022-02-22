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
if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nombre = trim($_POST["nombre"]);
		$precio = trim($_POST["precio"]);
		$color = trim($_POST["color"]);
		$materialidad = trim($_POST["materialidad"]);
		$piedra = trim($_POST["piedra"]);
		$categoria_id = trim($_POST["categoria_id"]);
		

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
          exit('Something weird happened'); //something a user can understand
        }

        $vars = parse_columns('producto', $_POST);
        $stmt = $pdo->prepare("INSERT INTO producto (nombre,precio,color,materialidad,piedra,categoria_id) VALUES (?,?,?,?,?,?)");

        if($stmt->execute([ $nombre,$precio,$color,$materialidad,$piedra,$categoria_id  ])) {
                $stmt = null;
                header("location: producto-index.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <section class="pt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="page-header">
                        <h2>Create Record</h2>
                    </div>
                    <p>Please fill this form and submit to add a record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

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

                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="producto-index.php" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>