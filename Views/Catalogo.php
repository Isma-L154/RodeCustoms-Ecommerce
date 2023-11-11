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
        <script src="./assets/JavaScript/Articulo.js"></script>
        <link href="./assets/StyleSheets/Catalogo.css" rel="stylesheet" />
    </head>
    <body>
        <?php
        include "./assets/Fragments/Header_BK.php"
        ?>    

        <!-- Section-->
        <section class="py-5">
            <table id="#cards">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <div class="col mb-5 " >
                   
                   <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src=""  alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"></h5>
                                    <!-- Product price-->
                                    
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View options</a></div>
                            </div>
                        </div>
                    </div>
                          
                </div>
            </div>
            </table>
            
        </section>
        <!-- Footer-->
        <?php
        include "./assets/Fragments/Footer_BK.php"
        ?>
        <!--Scripts propios de JS para la pagina-->
    </body>
</html>
