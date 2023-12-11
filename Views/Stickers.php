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
    <link href="./assets/StyleSheets/Producto_Espec.css" rel="stylesheet" />


</head>

<body>
    <?php
    include "./assets/Fragments/Header_BK.php"
    ?>
    <main>
        <div class="container d-flex justify-content-center" id="ArticuloEspecifico">
            <figure class="card card-product-grid card-lg">
                <a class="img-wrap" data-abc="true">
                    <img src="./assets/Img/Logo.png" alt="Sticker" class="img-responsive" />
                </a>
                <hr class="my-4">
                <figcaption class="info-wrap">
                    <div class="row">
                        <!-- Nombre del producto y Categoría -->
                        <div class="col-md-9 col-xs-9">
                        <label for="archivoSticker" style="background-color: goldenrod; padding: 8px 16px; border-radius: 4px; color: #fff; cursor: pointer; transition: background-color 0.3s, color 0.3s;">
                            Subir Logo<input type="file" id="archivoSticker" name="archivoSticker" style="display: none;" accept=".png"/>
                        </label>
                        <p style = "font-size: 11px;" >*Unicamente archivos PNG y menos de 1Mb*</p>
                        </div>
                        <div class="col-md-3 col-xs-3">
                            <div class="rating text-right">
                                <div class="rating text-right">
                                    Tamaño:
                                    <select name="tamanio" id="tamanio">
                                        <option value="5x5">4x4</option>
                                        <option value="4x4">5x5</option>
                                        <option value="6x6">6x6</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
                </figcaption>
                <div class="bottom-wrap-payment">
                    <figcaption class="info-wrap">
                        <div class="row">
                            <!-- Precio -->
                            <div class="col-md-9 col-xs-9">
                            Precio: <span id="Precio"> Por Determinar</span>
                            </div>
                            <div class="col-md-3 col-xs-3">
                                
                                <div class="rating text-right">
                                    Cantidad
                                    <select name="cantidad" id="cantidad">
                                    <option value="" disabled selected>Seleccionar</option>
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="30">30</option>
                                        <option value="50">50</option>
                                    </select>

                                </div>

                            </div>
                        </div>
                    </figcaption>
                    <div class="bottom-wrap">
                        <div class="price-wrap row">
                            <button type="button" class="btn btn-primary float-right" id="btnAnadirSticker" style="margin: auto;" disabled >Siguiente</button>
                            <a href="./index.php" class="btn float-left mr-auto"> Cancelar </a>
                        </div>
                    </div>
                </div>
            </figure>
        </div>

    </main>
    <?php
    include "./assets/Fragments/Footer_BK.php"
    ?>
    <!--Scripts propios de JS para la pagina-->
    <script src="./Pluggins/toastr/toastr.js"></script>
    <script src="./assets/JavaScript/Stickers.js"></script>
</body>

</html>