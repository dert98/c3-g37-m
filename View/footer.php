<!DOCTYPE html>
<html lang="en">
<?php
    require('head.php');
?>

<body>
  <!-- add 'footer' snippet in css -->
  <div class="p-5 m-5 text-center fondo-color">
    <div class="footer">
      <div class="container">
        <div class="row">
          <div class="col-md-4 p-1">
            <h3 class="h4">FORMAS DE PAGO</h3>
            <p>Tarjetas Crédito / Débito</p>
            <p>Transferencia bancaria</p>
          </div>
          <div class="col-md-4 p-1">
            <h3 class="h4">CONTACTO</h3>
            <p>joyerias_zb@gmail.com</p>
            <p>(011) 1428 – 0267</P>
            <p> <a href="View/trabajo.php" target="new">
                <h3 class="h5 trabajo">Trabajá con nosotros</h3>
              </a>
            </p>
          </div>
          <div class="col-md-4 p-1">
            <!-- inicio del area de suscripcion -->
            <form class="align-items-center">
              <label class="visually-hidden" for="inlineFormInputGroupUsername"></label>
              <div class="input-group">
                <div class="input-group-text">#</div>
                <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Username" name="in_mail">
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="inlineFormCheck" name="in_acepto" value="acepto_las_condiciones">
                <label class="form-check-label" for="inlineFormCheck">
                  Acepto los terminos y condiciones.
                </label>
                <label class="">Escribe tu user de twiter</label>
              </div>
              <div class="">
                <button type="submit" class="btn " name="in_suscipcion">Suscribirse</button>
              </div>
            </form>
            <!-- fin del area de suscripcion -->
          </div>
        </div>
      </div>
    </div>
  </div>
</html>