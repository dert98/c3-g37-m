
<!DOCTYPE html>
<html lang="en">

<?php
  require_once("head.php");
?>
<body class="fondo-color">
  <div class="text-center">
    <label for="" class="h1 bb3 mt-3">Iniciar Sesión</label>
  </div>
  <section id="login" class="">
    <div class="container col-md-12 text-center m-auto">
      <div class="col-md-6 col-lg-6 col-xs-6 text-center m-auto b2 border-circule">
        <form _ngcontent-c0="" novalidate="" class="p-2 m-2" action="../Controller/validar.php" method="POST">
          <img src="../Assets/img/id-3_c-1.jpg" alt="" class="w200 h200 cp5">
          <div _ngcontent-c0="" class="inputGroup inputGroup1 m-3">
            <label _ngcontent-c0="" for="usuario" class="h3">Usuario</label>
            <input _ngcontent-c0="" class="usuario ng-untouched ng-pristine ng-invalid" id="usuario" maxlength="256"
              name="usuario" required="" type="text">
            <span _ngcontent-c0="" class="indicator"></span>
          </div>
          <div _ngcontent-c0="" class="inputGroup inputGroup2 mt-2">
            <label _ngcontent-c0="" for="password" class="h3">Password</label>
            <input _ngcontent-c0="" class="password ng-untouched ng-pristine ng-invalid" id="password" name="password"
              required="" type="password">
          </div>
          <div _ngcontent-c0="" class="mt-4">
            <button class="btn btn-success">Log in</button>
            <a href="../" class="btn btn-success">Regresar</a>
          </div>
        </form>
      </div>
    </div>
    </div>
  </section>
</body>
    