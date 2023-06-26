<div class="card" style="margin-left: 1em; margin-right: 1em; margin-bottom: .5em; margin-top: .5em;">
    <div class="col-sm-11 col-xl-12">
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">DATOS CARNET</h6>
            <?php foreach ($consulta as $usuario_data ) { ?>
            <form action="<?= getUrl("user", "user", "postUpdateDatos"); ?>" method="POST" enctype="multipart/form-data" onsubmit="return validaCotizacion();">

            <div class="row mb-1">

                <label for="nombres" class="col-sm-3 col-form-label">Nombres:</label>
                <div class="col-sm-7">
                <input type="text" class="form-control" name="nombres" id="nombres" value="<?php echo $usuario_data['usu_nombre']; ?>" required minlength="3" aria-label="" aria-describedby="basic-addon1" placeholder="ingresa tu nombre"><br>
                </div>
            </div>

            <div class="row mb-1">

                <label for="apellidos" class="col-sm-3 col-form-label">Apellidos:</label>
                <div class="col-sm-7">
                <input type="text" class="form-control" name="apellidos" id="apellidos" minlength="3"  value="<?php echo $usuario_data['usu_apellido']; ?>" required aria-label="" aria-describedby="basic-addon1" placeholder="ingresa tu apellido"><br>
                </div>
            </div>

            
            <div class="row mb-1">

                <label for="apellidos" class="col-sm-3 col-form-label">Sede:</label>
                <div class="col-sm-7">
                <select name="area" id="area" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example" >
                        <option value="<?php echo $usuario_data['usu_sede'] ?>" selected="selected"><?php echo $usuario_data['usu_sede']; ?></option>
                            <option value="Comercial">Chile</option>
                            <option value="Administración">Colombia</option>
                            <option value="Calidad de Potencia">Mexico</option>
                            <option value="Comercial">USA</option>
                            
                </select>
                </div>
            </div>

            <div class="row mb-1">
                  <label for="area" class="col-sm-3 col-form-label">Area:</label>
                   <div class="col-sm-7">
                        <select name="area" id="area" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example" >
                        <option value="<?php echo $usuario_data['usu_area'] ?>" selected="selected"><?php echo $usuario_data['usu_area']; ?></option>
                            
                            <option value="Administración">Administración</option>
                            <option value="EPC Construcción de Proyecto">EPC Construcción de Proyecto</option>
                            <option value="Diseños e Interventorías">Diseños e Interventorías</option>
                            <option value="Eficiencia y Calidad de la Energía">Eficiencia y Calidad de la Energía</option>
                            <option value="Estudios">Estudios</option>
                            <option value="Estudios Internacionales">Estudios Internacionales</option>
                            <option value="NEPLAN">NEPLAN</option>
                            <option value="PAC">PAC</option>
                            <option value="Proyectos GIS">Proyectos GIS</option>
                            <option value="Soluciones Integrales de Equipos">Soluciones Integrales de Equipos</option>
                            </select>
                    </div>
            </div>
            <div class="row mb-1">

                        <label for="cargo" class="col-sm-3 col-form-label">Cargo:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="cargo" id="cargo" value="<?php echo $usuario_data['usu_cargo']; ?>" required aria-label="" aria-describedby="basic-addon1" placeholder="cargo en el area"><br>
                        </div>
            </div>
            <div class="row mb-1">
                <label for="tipo" class="col-sm-3 ">Tipo de identificación:</label>

                <div class="col-sm-7">
                <select name="tipo" id="tipo" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
                <option value="<?php echo $usuario_data['usu_tipo'] ?>" selected="selected"><?php echo $usuario_data['usu_tipo']; ?></option>
                <option value="Cédula de ciudadanía">Cédula de ciudadanía.</option>
                    <option value="Tarjeta de identidad">Tarjeta de identidad.</option>
                    <option value="Cédula de extranjería">Cédula de extranjería.</option>
                    <option value="Pasaporte">Pasaporte.</option>
                 </select>
                </div>
            </div>


            <div class="row mb-1">

            <label for="inputEmail3" class="col-sm-3 col-form-label ">Numero de identificación:</label>
            <div class="col-sm-7">
            <input type="number" class="form-select form-select-sm mb-3" name="identificacion" id="identificacion" value="<?php echo $usuario_data['usu_identificacion']; ?>" required minlength="5" aria-label="" aria-describedby="basic-addon1" placeholder="000 000 000"><br>
            </div>
            </div>
            <div class="row mb-1">

                <label for="rh" class="col-sm-3 col-form-label">RH:</label>
                <div class="col-sm-7">
                <input type="text" class="form-control" name="rh" id="rh" required value="<?php echo $usuario_data['usu_rh']; ?>"  aria-label="" aria-describedby="basic-addon1" placeholder="tipo de sangre"><br>
                </div>
            </div>


            
            <div class="row mb-1">

                <label for="eps" class="col-sm-3 col-form-label">EPS:</label>
                <div class="col-sm-7">
                <input type="text" class="form-control" name="eps" id="eps" required value="<?php echo $usuario_data['usu_eps']; ?>" aria-label="" aria-describedby="basic-addon1" placeholder="eps"><br>
                </div>
            </div>

            <div class="row mb-1">

                        <label for="arl" class="col-sm-3 col-form-label">ARL:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="arl" id="arl" required value="<?php echo $usuario_data['usu_arl']; ?>" aria-label="" aria-describedby="basic-addon1" placeholder="arl"><br>
                        </div>
            </div>

            <div class="row mb-1">

                        <label for="celular" class="col-sm-3 col-form-label">Celular:</label>
                        <div class="col-sm-7">
                            <input type="number" class="form-control" name="celular" id="celular" value="<?php echo $usuario_data['usu_celular']; ?>" required minlength="5" aria-label="" aria-describedby="basic-addon1" placeholder="000 000 000"><br>
                        </div>
            </div>

            <div class="row mb-1">

                        
            <label for="telefono" class="col-sm-3 col-form-label">Telefono:</label>
                        <div class="col-sm-7">
                            <input type="number" class="form-control" name="telefono" id="telefono" value="<?php echo $usuario_data['usu_telefono']; ?>" required minlength="3" aria-label="" aria-describedby="basic-addon1" placeholder="000 000 000"><br>
                        </div>
            </div>
            
            <div class="row mb-1">

                <label for="correo" class="col-sm-3 col-form-label">Correo:</label>
                <div class="col-sm-7">
                <input type="email" class="form-control" name="correo" id="correo" value="<?php echo $usuario_data['usu_correo']; ?>" required aria-label="" aria-describedby="basic-addon1" placeholder="@hotmail.com"><br>
                </div>
            </div>

            <div class="mx-auto" style="width: 200px;">
                 <div class="box">
                     <img src="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/gestionintegral'.$usuario_data['url_qr'] ?>" alt="Cargando imagen...">
                </div>
            </div>
            <br>

            <input type="hidden" id="usuID" name="usuID" value="<?php echo $_SESSION['idUser'] ?>">

            <div class="card-action row">
                        <button class="btn btn-primary">Registrar</button>
            </div>
            </form>
            <?php } ?>
        </div>
    </div>

</div>

