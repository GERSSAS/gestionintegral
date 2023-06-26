<div class="card" style="margin-left: 1em; margin-right: 1em; margin-bottom: .5em; margin-top: .5em;">
    <div class="col-sm-11 col-xl-12">
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">DATOS COMPLEMENTARIOS</h6>
            <?php foreach ($consulta as $usuario_data ) { ?>
            <form action="<?= getUrl("user", "user", "postUpdateDatosC"); ?>" method="POST" enctype="multipart/form-data" onsubmit="return validaCotizacion();">


            <div class="row mb-1">

                <label for="direccion2" class="col-sm-3 col-form-label">Direccion:</label>
                <div class="col-sm-7">
                <input type="text" class="form-control" name="direccion" id="direccion" value="<?php echo $usuario_data['direccion_usuario']; ?>" required minlength="3" aria-label="" aria-describedby="basic-addon1" placeholder="direccion de residencia"><br>
                </div>
            </div>

            <div class="row mb-1">

                    <label for="barrio" class="col-sm-3 col-form-label">Barrio:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="barrio" id="barrio" value="<?php echo $usuario_data['barrio_usuario']; ?>" required minlength="3" aria-label="" aria-describedby="basic-addon1"placeholder="barrio"><br>
                        </div>
            </div>


            <div class="row mb-1">

            <label for="celular" class="col-sm-3 col-form-label">Celular:</label>
                        <div class="col-sm-7">
                            <input type="number" class="form-control" name="celular" id="celular" value="<?php echo $usuario_data['usu_celular']; ?>" required minlength="5" aria-label="" aria-describedby="basic-addon1" placeholder="000-000-00-00"><br>
                        </div>
            </div>

            <div class="row mb-1">

                <label for="telefono1" class="col-sm-3 col-form-label">Telefono:</label>
                <div class="col-sm-7">
                <input type="number" class="form-control" name="telefono" id="telefono" value="<?php echo $usuario_data['usu_telefono']; ?>"  required minlength="3" aria-label="" aria-describedby="basic-addon1"placeholder="000-000-000"><br>
                </div>
            </div>
            <div class="row mb-1">

                <label for="correo" class="col-sm-3 col-form-label">Correo:</label>
                <div class="col-sm-7">
                <input type="email" class="form-control" name="correo" id="correo" value="<?php echo $usuario_data['usu_correo']; ?>" required aria-label="" aria-describedby="basic-addon1" placeholder="correo electronico"><br>
                </div>
            </div>
            <input type="hidden" id="usuID" name="usuID" value="<?php echo $_SESSION['idUser'] ?>">
            <input id="pais" type="hidden" name="pais" value="">
                    <input id="estado" type="hidden" name="estado" value="">
                    <input id="ciudad" type="hidden" name="ciudad" value="">
                    <input id="paisesEstados" type="hidden" data-url="<?php echo getUrl("user", "user", "consultarPaises", false, "ajax"); ?>">
                    <input id="estadosCiudades" type="hidden" data-url="<?php echo getUrl("user", "user", "consultarCiudades", false, "ajax"); ?>">
            <div class="card-action row">
                        <button class="btn btn-primary">Registrar</button>
            </div>
            </form>
            <?php } ?>
        </div>
    </div>

</div>

<script>

$("#pais").val($("#hist_pais option:selected").text());
    $("#estado").val($("#hist_estado option:selected").text());
    $("#ciudad").val($("#hist_ciudad option:selected").text());

    $(document).on('change', '#hist_pais', function() {

        var url = $("#paisesEstados").attr("data-url");
        $("#paisesEstados").attr("data-url");
        $("#pais").val($("#hist_pais option:selected").text());

        var countryID = $(this).val();

        if (countryID) {
            $.ajax({
                type: 'POST',
                url: url,
                data: 'id_pais=' + countryID,
                success: function(html) {
                    $('#hist_estado').html(html);
                    $('#hist_ciudad').html('<option value="">Selecionar estado/provincia primero</option>');
                }
            });
        } else {
            $('#hist_estado').html('<option value="">Select country first</option>');
            $('#hist_ciudad').html('<option value="">Selecionar estado/provincia primero</option>');
        }

    });

    $(document).on('change', '#hist_estado', function() {

        var url = $("#paisesEstados").attr("data-url");

        $("#estado").val($("#hist_estado option:selected").text());

        var stateID = $(this).val();
        if (stateID) {
            $.ajax({
                type: 'POST',
                url: url,
                data: 'id_estado=' + stateID,
                success: function(html) {
                    $('#hist_ciudad').html(html);
                }
            });
        } else {
            $('#hist_ciudad').html('<option value="">Selecionar estado/provincia primero</option>');
        }
    });

    $(document).on('change', '#hist_ciudad', function() {

        $("#ciudad").val($("#hist_ciudad option:selected").text());

    });
</script>