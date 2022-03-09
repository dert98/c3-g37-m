<!DOCTYPE html>
<html lang="en">
<?php
include('head.php');
include('navbar_m.php');
?>

<body>
  <div class="container">
    <div class="row col-md12 mt-4 p-4">
      <div class=" col-md-6 text-center">
      <img src="../Assets/img/id-1_c-1.jpg" alt="" srcset="" class="" style="width: 400px;height: 300px;">
      <p>
        <span>
          El gusto de cada uno es el mejor placer que pueden mirarnos con sus ojos.
        </span>
      </p>
    </div>
    <div class="col-md-6">
      <div class="text-center b5 p-5">
        <form _ngcontent-c0="" novalidate="" sclass="text-center" action="../Controller/validar.php" method="POST">
          <div _ngcontent-c0="" class="inputGroup inputGroup1">
            <label _ngcontent-c0="" for="usuario" class="h3">Usuario</label>
            <input _ngcontent-c0="" required class="usuario ng-untouched ng-pristine ng-invalid" id="usuario" maxlength="256" name="usuario" required="" type="text">
            <span _ngcontent-c0="" class="indicator"></span>
          </div>
          <div _ngcontent-c0="" class="inputGroup inputGroup2 mt-2">
            <label _ngcontent-c0="" for="password" class="h3">Password</label>
            <input _ngcontent-c0="" required class="password ng-untouched ng-pristine ng-invalid" id="password" name="password" required="" type="password">
          </div>
          <?php
            if (isset($_GET['error'])) {
              echo '<h2 class="text-danger animate__animated animate__tada animate__infinite">Ingrese campos requeridos</h2>
              ';
            }
            ?>
          <div _ngcontent-c0="" class="">
            <button class="btn btn-success">Log in</button>
            <a href="../" class="btn btn-success">Regresar</a>
          </div>
        </form>
      </div>
    </div>

  </div>

  </div>

  <?php
  include('footer.php');
  ?>
</body>

</html>