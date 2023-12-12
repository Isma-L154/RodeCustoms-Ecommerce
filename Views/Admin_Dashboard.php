<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user_id']) || $_SESSION['user_Rol'] != 1) {
    header('Location: Error-404.php'); 
    exit(); 
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RODECUSTOMS</title>

    <link href="./assets/StyleSheets/Admin.css" rel="stylesheet" />

    <?php
    include "./assets/Fragments/Librerias.php"
    ?>
</head>

<body>
    <?php
    include "./assets/Fragments/Header_BK.php"
    ?>
    <main>
        <section class="container mw-100">
            <div class="container button-container">
                <div class="row" id="Dashboard">
                    <div class="col-sm d-flex justify-content-center text-center">
                        <a href="./Admin_Articulos.php">
                            <div class="backgrounds justify-content-center">
                                <h2>Productos</h2>
                                <img src="./assets/Img/ProductIcon.png" alt="delivery-settings" width="50%" />
                            </div>
                        </a>
                    </div>
                    <div class="col-sm d-flex justify-content-center text-center">
                        <a href="./Admin_Usuarios.php">
                            <div class="backgrounds justify-content-center">
                                <h2>Usuarios</h2>
                                <img src="./assets/Img/ClientIcon.png" alt="delivery-settings" width="50%" />
                            </div>
                        </a>
                    </div>
                    <div class="col-sm d-flex justify-content-center text-center">
                        <a href="./Reportes.php">
                            <div class="backgrounds justify-content-center">
                                <h2>Reportes</h2>
                                <img src="./assets/Img/ReportIcon.png" alt="delivery-settings" width="50%" />
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <?php
    include "./assets/Fragments/Footer_BK.php"
    ?>
    <!--Scripts propios de JS para la pagina-->
</body>

</html>