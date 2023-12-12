<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>RODECUSTOMS</title>
    <?php
    include "./assets/Fragments/Librerias.php"
    ?>
    
    <link rel="stylesheet" href="./Pluggins/toastr/toastr.css">
    <link href="./assets/StyleSheets/Factura.css" rel="stylesheet" />


</head>

<body>
    <?php
    include "./assets/Fragments/Header_BK.php"
    ?>
    
<div id="loadingDiv">
    <div class="loader"></div>
    <p>Cargando...</p>
</div>

<div id="thankYouMessage" style="display:none;">
    <h1>¡Muchas gracias por su compra!</h1>
</div>


    <?php
    include "./assets/Fragments/Footer_BK.php"
    ?>
    <!--Scripts propios de JS para la pagina-->
    <script src="./Pluggins/toastr/toastr.js"></script>
    <script src="./assets/JavaScript/Factura.js"></script>
</body>

</html>