<div class="card" style="margin-left: 5px; margin-right: 5px; margin-bottom: .3em; margin-top: .3em;">
    <div class="col-sm-11 col-xl-12">

        <div class=" rounded h-100 p-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">DATOS PERSONALES</h6>
                </div>
                <div class="container g-3 mt-3 ">

                    <form class="row g-4 mt-3" action="<?= getUrl("admin", "admin", "postCrearUsuarios"); ?>" method="POST" enctype="multipart/form-data" onsubmit="return validaCotizacion();">

                        <div class="col-6">
                            <label for="tipo" class="form-label">Tipo de identificación:</label>
                            <select name="tipo" id="tipo" class="form-select " aria-label=".form-select-sm example">
                                <option value="Cédula de ciudadanía">Cédula de ciudadanía.</option>
                                <option value="Tarjeta de identidad">Tarjeta de identidad.</option>
                                <option value="Cédula de extranjería">Cédula de extranjería.</option>
                                <option value="Pasaporte">Pasaporte.</option>
                            </select>
                        </div>

                        <div class="col-6">
                            <label for="identificacion" class="form-label">Número de identificación:</label>
                            <input type="number" class="form-control" name="identificacion" id="identificacion" required minlength="5" aria-describedby="basic-addon1">
                        </div>

                        <div class=" col-6">
                            <label for="nombres" class="inputEmail3" class="form-label">Nombres:</label>
                            <input type="text" class="form-control" style="text-transform:uppercase;" name="nombres" id="nombres">
                        </div>

                        <div class="col-6 ">
                            <label for="apellidos" class="inputEmail3" class="form-label">Apellidos:</label>
                            <input type="text" class="form-control" style="text-transform:uppercase;" name="apellidos" id="apellidos" minlength="3" required aria-label="" aria-describedby="basic-addon1">
                        </div>

                        <div class="col-6">
                            <label for="correo" class="inputEmail3" class="form-label">Correo:</label>
                            <input type="email" class="form-control" name="correo" id="correo" required aria-label="" aria-describedby="basic-addon1">
                        </div>

                        <div class="col-6">
                            <label for="sede" class="form-label">Sede:</label>
                            <select name="sede" id="sede" class="form-select" aria-label=".form-select-sm example">
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
                                <option value=""></option>
                                <option value="ADMINISTRACION">ADMINISTRACIÓN</option>
                                <option value="EPC CONSTRUCCION DE PROYECTOS">EPC CONSTRUCCIÓN DE PROYECTO</option>
                                <option value="DISEÑO E INVENTORIAS">DISEÑO E INVENTORIAS</option>
                                <option value="EFICIENCIA Y CALIDAD DE LA ENERGIA">EFICIENCIA Y CALIDAD DE LA ENERGIA</option>
                                <option value="ESTUDIOS">ESTUDIOS</option>
                                <option value="ESTUDIOS INTERNACIONALES">ESTUDIOS INTERNACIONALES</option>
                                <option value="NEPLAN">NEPLAN</option>
                                <option value="PAC">PAC</option>
                                <option value="PROYECTOS GIS">PROYECTOS GIS</option>
                                <option value="SOLUCIONES INTEGRALES DE EQUIPOS">SOLUCIONES INTEGRALES DE EQUIPOS</option>
                            </select>
                        </div>

                        <div class="col-6">
                            <label for="cargo" class="inputEmail3" class="form-label">Cargo:</label>
                            <input type="text" class="form-control" style="text-transform:uppercase;" name="cargo" id="cargo" required aria-label="" aria-describedby="basic-addon1">
                        </div>

                        <div class="col-6">
                            <label for="celular" class="inputEmail3" class="form-label">Celular:</label>
                            <input type="number" class="form-control" name="celular" id="celular" required minlength="5" aria-label="" aria-describedby="basic-addon1">
                        </div>

                        <div class="col-6">
                            <label for="telefonoUser" class="inputEmail3" class="form-label">Telefono:</label>
                            <input type="number" class="form-control" name="telefonoUser" id="telefonoUser" required minlength="3" aria-label="" aria-describedby="basic-addon1">
                        </div>

                        <div class="col-6">
                            <label for="rh" class="form-label">RH:</label>
                            <input type="text" class="form-control" style="text-transform:uppercase;" name="rh" id="rh" required aria-label="" aria-describedby="basic-addon1">
                        </div>

                        <div class="col-6">
                            <label for="eps" class="form-label">EPS:</label>
                            <input type="text" class="form-control" style="text-transform:uppercase;" name="eps" id="eps" required aria-label="" aria-describedby="basic-addon1">
                        </div>

                        <div class="col-6">
                            <label for="arl" class="form-label">ARL:</label>
                            <input type="text" class="form-control" style="text-transform:uppercase;" name="arl" id="arl" required aria-describedby="basic-addon1">
                        </div>

                        <div class=" col-6">
                            <label for="direccionUser" class="form-label">Direccion:</label>
                            <input type="text" class="form-control" name="direccionUser" id="direccionUser" required aria-describedby="basic-addon1">
                        </div>

                        <div class="col-12 mb-6">
                            <h6>Seleccione imagen a cargar</h6>
                            <input  id="cartapresentacion" type="file" name="usu_img" class="eme2 estiloinput" required>
                        </div>


                        <!-- CONTACTO PERSONAL -->
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 mb-4">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3" style="text-align: center;">CONTACTO DE EMERGENCIA</h6>
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="nombreContacto2 " class="form-label">Nombres</label>
                            <input type="text" class="form-control" style="text-transform:uppercase;" name="nombreContacto2" id="nombreContacto2" required minlength="3" aria-label="" aria-describedby="basic-addon1">
                        </div>

                        <div class="col-6">
                            <label for="parentesco2" class="form-label">Parentesco:</label>
                            <input type="text" class="form-control" style="text-transform:uppercase;" name="parentesco2" id="parentesco2" required minlength="3" aria-label="" aria-describedby="basic-addon1">
                        </div>

                        <div class="col-6">
                            <label for="telefono2" class="form-label">Telefono:</label>
                            <input type="number" class="form-control" name="telefono2" id="telefono2" required minlength="3" aria-label="" aria-describedby="basic-addon1">
                        </div>

                        <div class=" col-6">
                            <label for="direccion2" class="form-label">Direccion:</label>
                            <input type="text" class="form-control" name="direccion2" id="direccion2" required minlength="3" aria-label="" aria-describedby="basic-addon1">
                        </div>

                        <div class="col-12">
                            <input type="submit" style="float:center;" type="button" class="radios btn btn-primary" value="Guardar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">
    function generar() {

        var Caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!#$@%&';
        var tam = 7;
        var pass = "";

        for (var i = 0; i < tam; i++) {

            var rand = Math.floor(Math.random() * Caracteres.length);
            pass += Caracteres.substring(rand, rand + 1);
        }

        document.getElementById("contrasena").value = pass;
    }
</script>