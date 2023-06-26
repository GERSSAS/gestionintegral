<div class="card" style="margin-left: 5px; margin-right: 5px; margin-bottom: .3em; margin-top: .3em;">
    <div class="col-sm-11 col-xl-12">
        <div class=" rounded h-100 p-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">ACTUALIZAR USUARIO</h6>
                </div>
                <?php foreach ($consulta as $usuario_data) { ?>
                    <div class="container g-3 mt-3 ">
                        <form class="row g-4 mt-3" action="<?= getUrl("admin", "admin", "postUpdateUsuario"); ?>" method="POST" enctype="multipart/form-data" onsubmit="return validaCotizacion();">
                            <div class="col-12">
                                <label>
                                    <h6>Estado del usuario: <?php echo $usuario_data['estado'] ?></h6>
                                </label>
                            </div>
                            <div class="col-12 ">
                                <label class="title">
                                    <h6>DATOS PERSONALES</h6>
                                </label>
                            </div>

                            <div class="col-6">
                                <label for="tipo" class="form-label ">Tipo de identificación:</label>
                                <select name="tipo" id="tipo" class="form-select" aria-label=".form-select-sm example">
                                    <option value="<?php echo $usuario_data['usu_tipo'] ?>" selected="selected"><?php echo $usuario_data['usu_tipo']; ?></option>
                                    <option value="Cédula de ciudadanía">Cédula de ciudadanía.</option>
                                    <option value="Tarjeta de identidad">Tarjeta de identidad.</option>
                                    <option value="Cédula de extranjería">Cédula de extranjería.</option>
                                    <option value="Pasaporte">Pasaporte.</option>
                                </select>
                            </div>

                            <div class="col-6">
                                <label for="identificacion" class="form-label">Número de identificación:</label>
                                <input type="number" class="form-control" name="identificacion" id="identificacion" value="<?php echo $usuario_data['usu_identificacion']; ?>" required minlength="5" aria-label="" aria-describedby="basic-addon1">
                            </div>

                            <div class="col-6">
                                <label for="nombres" class="form-label">Nombres:</label>
                                <input type="text" class="form-control" name="nombres" id="nombres" value="<?php echo $usuario_data['usu_nombre']; ?>" required minlength="3" aria-label="" aria-describedby="basic-addon1">
                            </div>

                            <div class="col-6">
                                <label for="apellidos" class="form-label">Apellidos:</label>
                                <input type="text" class="form-control" name="apellidos" id="apellidos" value="<?php echo $usuario_data['usu_apellido']; ?>" minlength="3" required aria-label="" aria-describedby="basic-addon1">
                            </div>

                            <div class="col-6">
                                <label for="correo" class="form-label">Correo:</label>
                                <input type="email" class="form-control" name="correo" id="correo" value="<?php echo $usuario_data['usu_correo']; ?>" required aria-label="" aria-describedby="basic-addon1">
                            </div>
                            <div class="col-6">
                            <label for="sede" class="form-label">Sede:</label>
                            <select name="sede" id="sede" class="form-select" aria-label=".form-select-sm example">
                            <option value="<?php echo $usuario_data['usu_sede'] ?>" selected="selected"><?php echo $usuario_data['usu_sede']; ?></option>    
                            <option value=""></option>
                                <option value="CHILE">CHILE</option>
                                <option value="COLOMBIA">COLOMBIA</option>
                                <option value="MEXICO">MEXICO</option>
                                <option value="USA">USA</option>
                            </select>
                        </div>
                            <div class="col-6">
                                <label for="area" class="form-label">Area:</label>
                                <select name="area" id="area" class="form-select" aria-label=".form-select-sm example">
                                    <option value="<?php echo $usuario_data['usu_area'] ?>" selected="selected"><?php echo $usuario_data['usu_area']; ?></option>
                                    <option value=" "> </option>
                                    <option value="Administración">Administración</option>
                                    <option value="Calidad de Potencia">Calidad de Potencia</option>
                                    <option value="Comercial">Comercial</option>
                                    <option value="Diseños e Interventorías">Diseños e Interventorías</option>
                                    <option value="Estudios">Estudios</option>
                                    <option value="Gestión Integral">Gestión Integral</option>
                                    <option value="Gestión Corporativa">Gestión Corporativa</option>
                                    <option value="NEPLAN">NEPLAN</option>
                                    <option value="Pruebas, Automatización y Control - PAC">Pruebas, Automatización y Control - PAC</option>
                                    <option value="Soluciones Integrales de Equipos">Soluciones Integrales de Equipos</option>
                                </select>
                            </div>
                            <div class="col-6">
                            <label for="celular" class="inputEmail3" class="form-label">Celular:</label>
                            <input type="number" class="form-control" name="celular" id="celular" required minlength="5" value="<?php echo $usuario_data['usu_celular']; ?>" aria-label="" aria-describedby="basic-addon1">
                        </div>

                        <div class="col-6">
                            <label for="telefonoUser" class="inputEmail3" class="form-label">Telefono:</label>
                            <input type="number" class="form-control" name="telefonoUser" id="telefonoUser" required minlength="3" aria-label="" value="<?php echo $usuario_data['usu_telefono']; ?>" aria-describedby="basic-addon1">
                        </div>
                            <div class="col-6">
                                <label for="cargo" class="form-label">Cargo:</label>
                                <input type="text" class="form-control" name="cargo" id="cargo" value="<?php echo $usuario_data['usu_cargo']; ?>" required aria-label="" aria-describedby="basic-addon1">
                            </div>

                            <div class="col-6">
                                <label for="rh" class="form-label">RH:</label>
                                <input type="text" class="form-control" name="rh" id="rh" value="<?php echo $usuario_data['usu_rh']; ?>" required aria-label="" aria-describedby="basic-addon1">
                            </div>

                            <div class="col-6">
                                <label for="eps" class="form-label">EPS:</label>
                                <input type="text" class="form-control" name="eps" id="eps" value="<?php echo $usuario_data['usu_eps']; ?>" required aria-label="" aria-describedby="basic-addon1">
                            </div>

                            <div class="col-6">
                                <label for="arl" class="form-label">ARL:</label>
                                <input type="text" class="form-control" name="arl" id="arl" value="<?php echo $usuario_data['usu_arl']; ?>" required aria-label="" aria-describedby="basic-addon1">
                            </div>
                            <div class=" col-6">
                            <label for="direccion2" class="form-label">Direccion:</label>
                            <input type="text" class="form-control" name="direccion" id="direccion" required value="<?php echo $usuario_data['direccion_usuario']; ?>" minlength="3" aria-label="" aria-describedby="basic-addon1">
                        </div>

                        
                        <div class="card-header p-0 position-relative mt-5 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3" style="text-align: center;">CONTACTO DE EMERGENCIA</h6>
                            </div>
                        </div>

                        <div class="container g-3 mt-3 ">

                        <div class="row g-4 mt-3" >

                            <?php foreach ($consulta3 as $usuario_data) { ?>

                        <div class="col-6">
                            <label for="nombreContacto2" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" name="nombreContacto2" id="nombreContacto2" value="<?php echo $usuario_data['nombre_contacto']; ?>" required minlength="3" aria-label="" aria-describedby="basic-addon1">
                        </div>

                        <div class="col-6">
                            <label for="parentesco2" class="form-label">Parentesco:</label>
                            <input type="text" class="form-control" name="parentesco2" id="parentesco2" value="<?php echo $usuario_data['parentesco_contacto']; ?>" required minlength="3" aria-label="" aria-describedby="basic-addon1">
                        </div>

                        <div class="col-6">
                            <label for="telefono2" class="form-label">Telefono:</label>
                            <input type="number" class="form-control" name="telefono2" id="telefono2" value="<?php echo $usuario_data['telefono_contacto']; ?>" required minlength="3" aria-label="" aria-describedby="basic-addon1">
                        </div>

                        <div class="col-6">
                            <label for="direccion2" class="form-label">Direccion:</label>
                            <input type="text" class="form-control" name="direccion2" id="direccion2" value="<?php echo $usuario_data['direccion_contacto']; ?>" required minlength="3" aria-label="" aria-describedby="basic-addon1">
                        </div>

                            <input type="hidden" id="usuID" name="usuID" value="<?php echo $usuario_data['id_usuario_contacto'] ?>">
                            <input type="hidden" id="id_contacto" name="id_contacto" value="<?php echo $usuario_data['id_contacto']; ?>">

                            <div class="col-12 mt-4">
                                <button class="btn btn-primary">ACTUALIZAR</button>
                            </div>
                            </form>

                    </div>
                    </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>