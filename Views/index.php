<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RODECUSTOMS</title>    
    <?php
    include "./assets/Fragments/Librerias.php";
    ?>

</head>
<body>

    <!--Header y Menu de Nav--->
    <?php
        
        include "./assets/Fragments/Header_BK.php";
        
        ?>  
    

    <main class="Seccion_Principal">
        <section class="bg-light" id="Section_Servicios" >
            <div class="container py-5">
                <div class="row text-center py-3">
                    <div class="col-lg-6 m-auto">
                        <h1>Servicios</h1>
                    </div>
                </div>
                <div class="row">
                    <!--Seccion de Productos de la marca-->
                    <div class="col-12 col-md-4 mb-4" >
                        <div class="card h-100">
                            <a class="h2 text-decoration-none text-dark fs-3 text-center" >Productos hechos por nosotros </a>
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
                                <img  class="card-img-top" src="./assets/img/PZ1.png" style="height: 300px; width: 400px; padding-top: 10px;">
                            </a>
                            <div class="card-body">
                                <p class="card-text">
                                    Tenemos la posibilidad de crear tu prenda soñada 
                                    con los logos que tu elijas, ademas podemos agregarle tu toque personal a tus propios aritculos!

                                </p>
                                <button type="button" class="btn btn-primary">Personalizar mi producto</button>

                            </div>

                        </div>
                    </div>
                    <!--Personalizacion de productos varios(Que no es ropa)-->
                    <div class="col-12 col-md-4 mb-4">
                        <div class="card h-100">
                            <a class="h2 text-decoration-none text-dark fs-3 text-center">Stickers Personalizadas</a> 
                            <a >
                                <img  class="card-img-top" src="./assets/img/Logo.png" style="height: 300px; width: 400px; padding-top: 10px;">
                            </a>
                            <div class="card-body">
                                <p class="card-text">
                                    Podemos realizar stickers con el logo que tu desees!A tan solo un click de poder tener pequeños
                                    diseños para tu empresa, compañia, tienda y demas...!
                                </p>
                                <button type="button" class="btn btn-primary">Personalizar mi sticker</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!--Linea divisora para separar las secciones en la pagina -->
        <hr class="m-0" />

        <section id="Section_QS">
            <h2 style="text-align: center;">Quienes Somos?</h2>
                    <p class="lead mb-5">
                    En RodeCustoms, nuestra pasión radica en dar vida a tus ideas y expresar tu creatividad a través de nuestros tres 
                    pilares de servicio: la personalización de productos, la venta de productos y los stickers personalizables. 
                    Fundada con el propósito de ofrecer a nuestros clientes una experiencia única y auténtica, hemos trabajado incansablemente para convertir tus deseos en realidad. La personalización de productos es el núcleo de nuestra misión. No solo te ofrecemos una amplia gama de productos de alta calidad,
                     sino que también te brindamos la libertad de darles un toque personal.                   
                     </p>
                    <p class="lead mb-5">
                    Ofrecemos una selección cuidadosamente curada de productos de tendencia que te inspirarán. 
                    nuestro compromiso es proporcionar a nuestros clientes una plataforma versátil para la autoexpresión y la individualidad.
                     Estamos entusiasmados de ser tu socio en el camino hacia la personalización y la creatividad sin límites.
                     Además, los productos personalizables son una forma divertida y creativa de añadir un toque único a tus pertenencias y proyectos.
                    </p>    
            </section>
        
        
        
        <hr class="m-0" />
        <section id="Section_Direccion">
            <h2 style="text-align: center;">Donde nos ubicamos?</h2>
            <p class="lead mb-5">
            la era digital ha transformado radicalmente la forma en que operamos los negocios. En RodeCustoms, hemos abrazado por completo esta nueva era, optando por operar exclusivamente de manera virtual, sin locales físicos.  
            Te atenderemos de manera impecable y efectiva a través de plataformas en línea. 
            Esto nos permite adaptarnos de manera ágil a las cambiantes demandas y preferencias de nuestros clientes. A través de nuestro sitio web y redes sociales, garantizamos que tu experiencia con nosotros sea impecable, 
            brindándote productos de calidad y atención personalizada.   
        </p>
                
        </section>
    </main>


    <!--Hay que poner la info del footer en medio para que quede mejor-->
    
    <!--Footer-->
    <?php
        
        include "./assets/Fragments/Footer_BK.php";
        
        ?>

</body>
</html>