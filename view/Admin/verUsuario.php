
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">LISTA DE USUARIOS</h6>
                    </div>
                </div>

                <div class="table-responsive mt-2 ">
                    <table id="table" class="table ">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Identificaci&oacute;n</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nombres</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Apellidos</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"> Correo</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ver</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Editar</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Estado</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php foreach ($consulta as $usuario) { ?>
                                    <tr role="row" class="odd">

                                        <td class="sorting_1"><?= $usuario['usu_id'] ?></td>
                                        <td><?= $usuario['usu_identificacion'] ?></td>
                                        <td><?= $usuario['usu_nombre'] ?></td>
                                        <td><?= $usuario['usu_apellido'] ?></td>
                                        <td><?= $usuario['usu_correo'] ?></td>

                                        <?= $pdf_requerido = "";

if($usuario['estado'] == "Desactivo") {
                                        

    $pdf_requerido = substr_replace($usuario['url_pdf'], "_inactivo", (strlen($usuario['url_pdf'])-4), 0);
}else {
    $pdf_requerido = $usuario['url_pdf'];
}
?>
    <td><a href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/gestionintegral' . $pdf_requerido ?>" type="button" target="_blank" data-original-title="Ver Detalles">
            <i class="fas fa-eye"></i>
        </a></td>
                                        <td><a href="<?= getUrl("admin", "admin", "updateUsuario", array("usu_id" => $usuario['usu_id'])); ?>" type="button" class="" data-original-title="Editar cotizacion">
                                                <i class="bi bi-pencil-square">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                    </svg></i>
                                            </a></td>
                                        <td><a href="#" data-url="<?= getUrl("admin", "admin", "cambiarEstado", array("usu_id" => $usuario['usu_id']), "ajax"); ?>" class="cambiarEstado ">
                                                <i class="fa fa-cog " aria-hidden="true"></i> <?= $usuario['estado'] ?></a></td>
                                        <td class=""><a href="<?php echo getUrl("admin", "admin", "eliminarUsuario", array("usu_id" => $usuario['usu_id'])); ?>">
                                                <i class="fas fa-user-times "></i>
                                            </a></td>
                                    </tr>
                                    <?php } ?>                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content  bg-secondary">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title" id="exampleModalCenterTitle">Datos del usuario</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body  bg-secondary" id="reemplazoDato">
                Esto sera reemplazado
            </div>
            <div class="modal-footer  bg-secondary">
                <button type="button" class="btn btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <!-- <button type="button" class="btn btn-primary">Aceptar</button> -->
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.js" defer></script>


<script>
    $(document).ready(function() {

        var table = $('#table').DataTable({
            "pagingType": "simple",
            paging: false,
            language: {
                url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json',
            },
        });

        table.order([3, 'desc']).draw();
    });
</script>
<style>
    .dataTables_filter{
        float: left !important;
    }
</style>