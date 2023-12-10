<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RODECUSTOMS</title>
    <script src="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css"></script>
    <link rel="stylesheet" href="./Pluggins/toastr/toastr.css">
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
    <!--Apartado de lista unicamente par productos-->
<div class="col-md-12">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title" style="text-align: center;">Articulos por Realizar</h3>
                </div>
                <div class="card-body p-0">
                    <div class="row mt-2">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <table id="Reports" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <th>ID</th>
                                    <th>Producto</th>
                                    <th>Color</th>
                                    <th>Talla</th>
                                    <th>Cantidad</th>
                                    <th>Logo</th>
                                    <th>Opciones</th>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<!--Apartado de Lista para Stickers-->
        <div class="col-md-12">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title" style="text-align: center;">Stickers por Realizar</h3>
                </div>
                <div class="card-body p-0">
                    <div class="row mt-2">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <table id="Stickers" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <th>ID</th>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Logo</th>
                                    <th>Opciones</th>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</main>

<?php
        include "./assets/Fragments/Footer_BK.php"
        ?>
        <!--Scripts propios de JS para la pagina-->
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>
        <script src="./Pluggins/bootbox/bootbox.min.js"></script>  
        <script src="./Pluggins/toastr/toastr.js"></script>
        <script src="./assets/JavaScript/Reports.js"></script>

</body>
</html>