<?php
require('head.php');
require_once('navbar_m.php');
?>





<!--este Form va en el footer-->
<form method="post" enctype="multipart/form-data" class="form-group col-7 col-md-9 col-lg-12 mt-5">
    <h3>Trabajá con nosotros</h3>
    <label class="mb-3" for="exampleFormControlFile1">Cargá tu cv y te tendremos en cuenta cuando se abra una vacante</label>
    <input type="file" class="form-control-file mx-auto" style="width: 280px;" name="in_archivo" id="exampleFormControlFile1">
    </div>

    <div class="form-group col-8 col-md-10 col-lg-12">
        <input type=submit class=btn botonenviar name=in_contacto>
    </div>
    <div class="form-group">

</form>











<?php
require('footer.php');
?>