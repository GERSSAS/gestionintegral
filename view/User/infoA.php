<div class="card" style="margin-left: 1em; margin-right: 1em; margin-bottom: .5em; margin-top: .5em;">
    <div class="col-sm-11 col-xl-12">
        <div class="bg-secondary rounded h-100 p-4">
            <h5 class="mb-4">INFORMACION DE CONTACTOS</h5>
            <?php foreach ($consulta2 as $usuario_data ) { ?>
           
                    <div class="row mb-1">

                        <label for="inputEmail3" class="col-sm-3 col-form-label">Nombre:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="nombreEmpresa" id="nombreEmpresa" value="<?php echo $usuario_data['nombre_empresa']; ?>" required minlength="3" aria-label="" aria-describedby="basic-addon1" placeholder="nombres"><br>
                        </div>
                    </div>

                    <div class="row mb-1">

                        <label for="inputEmail3" class="col-sm-3 col-form-label">NIT:</label>
                        <div class="col-sm-7">
                        <input type="number" class="form-control" name="nit" id="nit" minlength="3" value="<?php echo $usuario_data['contacto_nit']; ?>" required aria-label="" aria-describedby="basic-addon1" placeholder="apellidos"><br>
                        </div>
                    </div>

                    <div class="row mb-1">

                        <label for="telefono" class="col-sm-3 col-form-label">Telefono:</label>
                        <div class="col-sm-7">
                        <input type="number" class="form-control" name="telefonoEmpresa" id="telefonoEmpresa" value="<?php echo $usuario_data['contacto_telefono']; ?>" required minlength="3" aria-label="" aria-describedby="basic-addon1" placeholder="000 000 000"><br>
                        </div>
                    </div>
                    

                    <div class="row mb-1">

                        <label for="telefono" class="col-sm-3 col-form-label">Direccion:</label>
                        <div class="col-sm-7">
                        <input type="text" class="form-control" name="direccionEmpresa" id="direccionEmpresa" value="<?php echo $usuario_data['contacto_direccion']; ?>" required minlength="3" aria-label="" aria-describedby="basic-addon1" placeholder="000 000 000"><br>
                        </div>
                    </div>
                    
                    
                 
            <?php } ?>

            <br />
            <?php foreach ($consulta as $usuario_data ) { ?>
            <form action="<?= getUrl("user", "user", "postUpdateContacto"); ?>" method="POST" enctype="multipart/form-data" onsubmit="return validaCotizacion();">
                    <h6 class="mb-4">CONTACTO DE EMERGENCIA</h6>
                  

                    
                    <div class="row mb-1">
                        <label for="direccion2" class="col-sm-3 col-form-label">Nombre:</label>
                        <div class="col-sm-7">
                        <input type="text" class="form-control" name="nombreContacto" id="nombreContacto" value="<?php echo $usuario_data['nombre_contacto']; ?>" required minlength="3" aria-label="" aria-describedby="basic-addon1" placeholder="direccion de residencia"><br>
                        </div>
                    </div>

                    <div class="row mb-1">

                        <label for="inputEmail3" class="col-sm-3 col-form-label">Parentesco:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="parentescoContacto" id="parentescoContacto" value="<?php echo $usuario_data['parentesco_contacto']; ?>" required minlength="3" aria-label="" aria-describedby="basic-addon1" placeholder="madre, padre, hermano..."><br>
                        </div>
                    </div>

                    <div class="row mb-1">

                        <label for="telefono" class="col-sm-3 col-form-label">Telefono:</label>
                        <div class="col-sm-7">
                        <input type="number" class="form-control" name="telefonoContacto" id="telefonoContacto" value="<?php echo $usuario_data['telefono_contacto']; ?>" required minlength="3" aria-label="" aria-describedby="basic-addon1" placeholder="000 000 000"><br>
                        </div>
                    </div>
                    

                    <div class="row mb-1">

                        <label for="telefono" class="col-sm-3 col-form-label">Direccion:</label>
                        <div class="col-sm-7">
                        <input type="text" class="form-control" name="direccionContacto" id="direccionContacto" value="<?php echo $usuario_data['direccion_contacto']; ?>" required minlength="3" aria-label="" aria-describedby="basic-addon1" placeholder="000 000 000"><br>
                        </div>
                    </div>

                    <input type="hidden" id="usuID" name="usuID" value="<?php echo $_SESSION['idUser'] ?>">
                    <input type="hidden" id="id_contacto" name="id_contacto" value="<?php echo $usuario_data['id_contacto']; ?>">
                    <div class="card-action row">
                        <button class="btn btn-primary">Registrar</button>
                    </div>
                    
                    </form>
            <?php } ?>

           
        </div>
    </div>

</div>

