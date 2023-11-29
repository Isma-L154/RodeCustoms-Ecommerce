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
    <script src="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css"></script>
    <link href="./assets/StyleSheets/Catalogo.css" rel="stylesheet" />

</head>

<body>
    <?php
    include "./assets/Fragments/Header_BK.php"
    ?>

    <!-- Section-->
    <section class="py-5 row">
                    <div class="row" id ="contenedorCards"></div>
                    <!--Inicio de Prueba para comprobar que los datos estan mostrandose en la web-->
    </section>
    <!-- Footer-->
    <?php
    include "./assets/Fragments/Footer_BK.php"
    ?>
    <!--Scripts propios de JS para la pagina-->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>
    <script src="./assets/JavaScript/Articulo.js"></script>
</body>

</html>