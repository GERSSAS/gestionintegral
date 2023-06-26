<?php
if ($_SESSION['rolId'] == 2) {
?>
<div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="index.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Gers</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?php echo $_SESSION['nameUser'];?></h6>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                   
                    <a href="<?php echo getUrl("user", "user", "datosUsuarios", array("usu_id" => $_SESSION['idUser']))   ?>" class="nav-item nav-link"><i class="fa fa-id-card me-2"></i>Datos carnet</a>
                    <a href="<?php echo getUrl("user", "user", "datosComplementarios", array("usu_id" => $_SESSION['idUser'])) ?>"class="nav-item nav-link"><i class="bi bi-people-fill me-2"></i>Datos complementarios</a>
                    <a href="<?php echo getUrl("user", "user", "contactos", array("usu_id" => $_SESSION['idUser'])) ?>" class="nav-item nav-link"><i class="fa fa-address-book me-2"></i>Informacion de contactos</a>
                </div>
            </nav>
        </div>

        <?php
} else {
    session_destroy();
    redirect("login.php");
}
?>