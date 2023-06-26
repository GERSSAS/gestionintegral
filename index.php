<?php
    include_once './lib/helpers.php';
    include_once './view/partials/header.php';
    echo "<body class=''>";
        echo "<div  class='container-fluid position-relative d-flex p-0'>";
            echo "<div class='content '>";
             echo "<div class='main_container'>";
                include_once './view/partials/sidebar.php';
                include_once './view/partials/navbar.php';

                echo "<div>";
                            if (isset($_GET['modulo'])) {
                                resolve();
                            }

                    echo "</div>";
                echo "</div>";
                include_once './view/partials/footer.php';
            echo "</div>";
        echo "</div>";
     
    
    echo "</body>";
    echo "</html>";

?>