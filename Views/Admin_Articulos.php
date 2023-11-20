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
<div class="col-md-12">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Usuarios existentes</h3>
                </div>
                <div class="card-body p-0">
                    <div class="row mt-2">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <table id="tblArticulos"
                                class="table table-striped table-bordered table-hover">
                                <thead>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Imagen</th>
                                    <th>Precio</th>
                                    <th>Categoria</th>
                                </thead>
                            </table>
                        </div>
                        <div class="col-md-1"></div>
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
</body>
</html>