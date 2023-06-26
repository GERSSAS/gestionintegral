<?php
include_once './lib/helpers.php';
// include_once './view/partials/header.php';

?>

<!DOCTYPE html>
<html>

<head>
    <!-- De laplantilla -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> MI CARNET </title>
    <!-- CSS Files -->
    <link id="pagestyle" href="assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
    <link rel="stylesheet" href="css/style.css">
    <link href="img/iconoGers.png" rel="icon">
</head>

<body class="bg-gray-200">

    <!-- Contenido Main -->

    <main class="main-content  mt-0 ">
        <div class="page-header align-items-start min-vh-100 buscar_carnet" style="background-image: url('assets/img/login.jpg');">
            <span class="  opacity-6"></span>
            <div class="container ">
                <div class="col-12">
                    <h4 class="text-white mt-7 ">CONSULTA TU CARNET DIGITAL</h4>
                </div>
                <nav class="navbar  justify-content-center">
                    <form class="form-inline " method="POST">
                        <input type="search" id="cedula" class="form-control col-12" placeholder="Digite su número de cédula" />
                        <button id="buscar" type="submit" class="btn btn-primary  col-md-6 offset-md-3 mt-2 ">Buscar</button>
                        <input type="hidden" id="url_carnet" name="" data-url="<?php echo geturl("user", "user", "obtener_carnet", false, "ajax"); ?>" />
                    </form>
                </nav>
            </div>
            <div id="carnet" class=" "></div>

            <!--Contenido Footer-->

            <footer class="footer position-absolute bottom-2 py-2 w-100">
                <div class="container">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-12 col-md-12 my-auto">
                            <div class="copyright text-center text-sm text-white text-lg-start">
                                © <script>
                                    document.write(new Date().getFullYear())
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </main>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

<!------ Include the above in your HEAD tag ---------->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
    $(document).ready(function() {

        $('#buscar').click(function() {
            event.preventDefault();
            var url = $("#url_carnet").attr("data-url");
            console.log(url);
            var cedula = $("#cedula").val();

            if (cedula != "") {
                var data = {
                    "cedula": cedula,
                };

                $.ajax({
                    url: url,
                    data: data,
                    type: "POST",
                    success: function(datos) {

                        $("#carnet").html(datos);
                        console.log($("#carnet_digital").attr("href"))
                        window.open($("#carnet_digital").attr("href"));

                    }
                });
            } else {
                Swal.fire(
                    'Digite por favor su cedula.',
                )
            }
        });

    });
</script>
</body>

</html>
