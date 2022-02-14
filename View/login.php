
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://dert98.github.io/Porfolio/global.css">
</head>

<body>
  <div class="text-center mt-3">
    <label for="" class="h1 bb3">Iniciar Sesión</label>
  </div>
  <section id="login" class="f2 cp1">
    <div class="container col-md-12 text-center m-auto mt-5">
      <div class="col-md-6 col-lg-6 col-xs-6 text-center m-auto img-thumbnail">
        <form _ngcontent-c0="" novalidate="" class="p-2 m-2 bg1" action="../auth/validar.php" method="POST">
          <img src="../img/m.png" alt="" class="cp1 w200 h200 b1 rounded-circle">
          <div _ngcontent-c0="" class="inputGroup inputGroup1 m-3">
            <label _ngcontent-c0="" for="usuario" class="h3">Usuario</label>
            <input _ngcontent-c0="" class="usuario ng-untouched ng-pristine ng-invalid" id="usuario" maxlength="256"
              name="usuario" required="" type="text">
            <span _ngcontent-c0="" class="indicator"></span>
          </div>
          <div _ngcontent-c0="" class="inputGroup inputGroup2 m-3">
            <label _ngcontent-c0="" for="password" class="h3">Password</label>
            <input _ngcontent-c0="" class="password ng-untouched ng-pristine ng-invalid" id="password" name="password"
              required="" type="password">
          </div>
          <div _ngcontent-c0="" class="">
            <button class="btn btn-success">Log in</button>
            <a href="" class="btn btn-success">Regresar</a>
          </div>
        </form>
      </div>
    </div>
    </div>
  </section>
</body>
    