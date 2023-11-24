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
    <link rel="stylesheet" href="./Pluggins/toastr/toastr.css">
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
                                    <th>Opciones</th>
                                </thead>
                            </table>
                        </div>
                        <div class="col-md-1"></div>
                        <button class="open-button" onclick="openForm()">Agregar Producto</button>
                    </div>
                </div>
            </div>
        </div>

        <!--Model para poder modificar la informacion-->
        <div id="Formulario_Update" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">&times;</span>
                <form class="form" name="update_articulo" id="update_articulo" method="POST">

                    <h1>Modificar un Producto</h1>
                    <input type="hidden" class="form-control" id="EId" name="EId">

                    <label for="Enombre">Nombre</label>
                    <input type="text" class="form-control" id="Enombre" name="Enombre" placeholder="Nombre" required>

                    <label for="Edescripcion">Descripcion</label>
                    <input type="text" class="form-control" id="Edescripcion" name="Edescripcion" placeholder="Descripcion">

                    <label for="Eruta_imagen">Imagen</label>
                    <input type="text" class="form-control" id="Eruta_imagen" name="Eruta_imagen" placeholder="Ruta de la Imagen" required>


                    <label for="Eprecio">Precio</label>
                    <input type="double" class="form-control" id="Eprecio" name="Eprecio" placeholder="Precio" required>


                    <label for="Ecategoria">Categoria</label>
                    <select name="Ecategoria" id="Ecategoria" class="form-control">
                        <option value="2" selected>Camiseta</option>
                        <option value="1">Sudadera</option>
                        <option value="3">Otros</option>
                    </select>

                    <button type="submit" class="btn-Modificar" id="btnModificar">Modificar</button>
            </div>
            </form>
        </div>

        </div>

        <!--Pop-Up para poder agreagr productos-->
        <div class="form-popup" id="Form_add">
            <form class="form-container" name="modulo_add" id="add_articulo" method="POST">

                <h1>Agregar Producto</h1>
                <label for="nombreArt"></label>
                <input type="text" class="form-control" id="nombreArt" name="nombreArt" placeholder="Nombre" required>

                <label for="descripcion"></label>
                <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion">

                <label for="ruta_imagen"></label>
                <input type="text" class="form-control" id="ruta_imagen" name="ruta_Imagen" placeholder="Ruta de la Imagen" required>


                <label for="precio"></label>
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
    <script src="./Pluggins/bootbox/bootbox.min.js"></script>  
    <script src="./Pluggins/toastr/toastr.js"></script>
    <script src="./assets/JavaScript/Admin_Articulo.js"></script>
</body>

</html>