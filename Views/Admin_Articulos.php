<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RODECUSTOMS</title>
    <?php
    include "./assets/Fragments/Librerias.php"
    ?>
    <script src="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css"></script>
    <link href="./assets/StyleSheets/Admin.css" rel="stylesheet" />

</head>

<body>
    <?php
    include "./assets/Fragments/Header_BK.php"
    ?>
    <main>

        <!--Table para imprimir la informacion-->
        <div class="col-md-12">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title" style="text-align: center;">Articulos existentes</h3>
                </div>
                <div class="card-body p-0">
                    <div class="row mt-2">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <table id="admin_articulos" class="table table-striped table-bordered table-hover">
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
                        <button class="open-button" onclick="openForm()">Agregar Producto</button>
                    </div>
                </div>
            </div>
        </div>
        </div>
        
        <div class="form-popup" id="Form_add">
            <form class="form-container" name="modulo_add" id="add_articulo" method="POST">
                
                    <h1>Agregar Producto</h1>
                            <label for="nombre"></label>
                            <input type="text" class="form-control" id="nombreArt" name="nombreArt" placeholder="Nombre" required>

                            <label for="descripcion"></label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion">

                            <label for="ruta_Imagen"></label>
                            <input type="text" class="form-control" id="ruta_imagen" name="ruta_Imagen" placeholder="Ruta de la Imagen" required>
                       

                            <label for="Precio"></label>
                            <input type="double" class="form-control" id="precio" name="precio" placeholder="Precio" required>
                        

                            <label for="idCategoria"></label>
                            <select name="idCategoria" id="idCategoria" class="form-control">
                                <option value="2" selected>Camiseta</option>
                                <option value="1">Sudadera</option>
                                <option value="3">Otros</option>
                            </select>

                <button type="submit" class="btn" id="btnAnadir">Agregar</button>
                <button type="button" class="btn cancel" onclick="closeForm()">Cerrar</button>
</div>
            </form>
    </main>

    <?php
    include "./assets/Fragments/Footer_BK.php"
    ?>

    <!--Scripts propios de JS para la pagina-->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>
    <script src="./assets/JavaScript/Admin_Articulo.js"></script>
</body>

</html>