<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RODECUSTOMS</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <?php
    include "./assets/Fragments/Librerias.php";
    ?>

</head>

<body>

    <!--Header y Menu de Nav--->
    <?php

    include "./assets/Fragments/Header_BK.php";

    ?>
    <div class="bienvenida" style="background-image: url('https://img.freepik.com/foto-gratis/tienda-ropa-efecto-borroso_23-2148164717.jpg');">
    <div class="contenido-bienvenida">
        <img src="./assets/Img/Logo3.png" alt="Logo"> 
        <a href="#Seccion_Principal" class="flecha-bienvenida">↓</a>
    </div>
</div>



    <main class="Seccion_Principal" id="Seccion_Principal">
        <section class="bg-light" id="Section_Servicios">
            <div class="container py-5">
                <div class="row text-center py-3">
                    <div class="col-lg-6 m-auto">
                        <h1>Servicios</h1>
                    </div>
                </div>
                <div class="row">
                    <!--Seccion de Productos de la marca-->

                    <div class="col-12 col-md-4 mb-4">
                        <div class="card h-100">
                            <a class="h2 text-decoration-none text-dark fs-3 text-center">Productos hechos por nosotros </a>
                            <a>
                                <img class="card-img-top" src="./assets/img/Supra_1-Negro.png" style="height: 300px; width: 400px; padding-top: 10px;">
                            </a>
                            <div class="card-body">
                                <p class="card-text">
                                    Tenemos varios productos de diseños hechos por nosotros, para que no tengas que pensar
                                    en nada y solo disfrutes de nuestros productos.
                                </p>
                                <a href="./Catalogo.php"><button type="button" class="btn btn-primary">Catalogo</button></a>
                            </div>
                        </div>
                    </div>
                    <!--Carta de Personalizacion de productos-->
                    <div class="col-12 col-md-4 mb-4">
                        <div class="card h-100">
                            <a class="h2 text-decoration-none text-dark fs-3 text-center">Personalizacion de Productos</a>
                            <a>
                                <img class="card-img-top" src="./assets/img/PZ1.png" style="height: 300px; width: 400px; padding-top: 10px;">
                            </a>
                            <div class="card-body">
                                <p class="card-text">
                                    Tenemos la posibilidad de crear tu prenda soñada
                                    con los logos que tu elijas, ademas podemos agregarle tu toque personal a tus propios aritculos!

                                </p>
                                <a href="./Cata_Personalizable.php"><button type="button" class="btn btn-primary">Personalizar</button></a>

                            </div>

                        </div>
                    </div>
                    <!--Personalizacion de productos varios(Que no es ropa)-->
                    <div class="col-12 col-md-4 mb-4">
                        <div class="card h-100">
                            <a class="h2 text-decoration-none text-dark fs-3 text-center">Stickers Personalizadas</a>
                            <a>
                                <img class="card-img-top" src="./assets/img/Logo.png" style="height: 300px; width: 400px; padding-top: 10px;">
                            </a>
                            <div class="card-body">
                                <p class="card-text">
                                    Podemos realizar stickers con el logo que tu desees!A tan solo un click de poder tener pequeños
                                    diseños para tu empresa, compañia, tienda y demas...!
                                </p>
                                <a href="./Stickers.php"><button type="button" class="btn btn-primary">Stickers</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--Linea divisora para separar las secciones en la pagina -->
        <hr class="m-0" />
        <div class="w3-content" style="max-width:1100px">

            <!-- About Section -->
            <div class="w3-row w3-padding-64" id="about">
                
                <div class="w3-row w3-padding-64" id="about">
                    <div class="w3-col m6 w3-padding-large w3-hide-small">
                        <img src="./assets/Img/Logo.png" class="w3-round w3-image w3-opacity-min" alt="Table Setting" width="500" height="450">
                    </div>

                    <div class="w3-col m6 w3-padding-large">
                        <h1 class="w3-center">Quienes Somos </h1><br>
                        
                        <p class="w3-large">En RodeCustoms, nuestra pasión radica en dar vida a tus ideas y expresar tu creatividad a través de nuestros tres
                            pilares de servicio: la personalización de productos, la venta de productos y los stickers personalizables.
                            Fundada con el propósito de ofrecer a nuestros clientes una experiencia única y auténtica, hemos trabajado incansablemente para convertir tus deseos en realidad. La personalización de productos es el núcleo de nuestra misión. No solo te ofrecemos una amplia gama de productos de alta calidad,
                            sino que también te brindamos la libertad de darles un toque personal. </p>
                    </div>
                </div>
    </main>
    <!--Footer-->
    <?php

    include "./assets/Fragments/Footer_BK.php";

    ?>

</body>

</html>