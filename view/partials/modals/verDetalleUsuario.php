<?php
foreach ($verDetalleUsuario as $datos) { ?>

    <div class="col-md-12">
    <h6 class="mb-4">Datos personales</h6><br>
        <label for="inputEmail3" class=" ">Tipo de identificación:  <?= $datos['usu_identificacion']; ?></label>
        <br>
        <label for="inputEmail3" class=" ">Nombres: <?= $datos['usu_nombre']?></label><br>
        <label for="inputEmail3" class=" ">Apellidos: <?= $datos['usu_apellido'] ?></label><br>
        <label for="inputEmail3" class=" ">N&uacute;mero de identificacion: <?= $datos['usu_identificacion']; ?></label><br>
        <label for="inputEmail3" class=" ">Correo: <?= $datos['usu_correo'] ?> </label><br>
      
        
    </div>
<?php   }
?>