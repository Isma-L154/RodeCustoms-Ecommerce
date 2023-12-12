
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RODECUSTOMS</title>

  <?php
  include "./assets/Fragments/Librerias.php"
  ?>
</head>

<body>
  <?php
  include "./assets/Fragments/Header_BK.php"
  ?>

  <section class="h-100 h-custom" style="background-color: #eae8e8;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12">
          <div class="card card-registration card-registration-2" style="border-radius: 15px;">
            <div class="card-body p-0">
              <div class="row g-0">
                <div class="col-lg-8">
                  <div class="p-5">
                    <div class="d-flex justify-content-between align-items-center mb-5">
                      <h1 class="fw-bold mb-0 text-black">Carrito de Compras</h1>

                    </div>
                    <!--Lineas divisoras hechas con Bootstrap-->
                    <div class="row mb-4 d-flex justify-content-between align-items-center">
                      <div class="col-md-2 col-lg-2 col-xl-2">
                        <h6 class=" mb-0">Imagen</h6>
                      </div>
                      <div class="col-md-3 col-lg-2 col-xl-2">
                        <h6 class=" mb-0">Nombre</h6>
                      </div>
                      <div class="col-md-3 col-lg-2 col-xl-2">
                        <h6 class=" mb-0">Talla</h6>
                      </div>
                      <div class="col-md-3 col-lg-2 col-xl-2">
                        <h6 class=" mb-0">Precio P/U</h6>
                      </div>
                      <div class="col-md-3 col-lg-2 col-xl-2">
                        <h6 class=" mb-0">Cantidad</h6>
                      </div>
                      <div class="col-md-3 col-lg-2 col-xl-2">
                        <h6 class=" mb-0">Total</h6>
                      </div>

                    </div>
                    <hr class="my-4">
                    <div id="ContenedorCarrito"></div>
                    <div class="pt-5">
                      <h6 class="mb-0"><a href="./index.php" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Atras</a></h6>
                    </div>
                  </div>
                </div>

                <!--INCIO DE LA ESTRUCTURA PARA EL RESUMEN DE PAGOD DEL CARRITO-->

                <div class="col-lg-4 bg-grey">
                  <div class="p-5" style="padding: 4rem!important; margin-top: 4rem;">
                    <h3 class="fw-bold mb-5 mt-2 pt-1">Resumen de Compra</h3>
                    <hr class="my-4">

                    <div id="Resumen"></div>
                    <!--TODO Buscar la forma en la que cuando le de al boton de pagar pueda borrar los productos que estan en el carrito, recordar que la BD esta en modo seguro-->
                    <?php
                      if (isset($_SESSION['user_Rol'])) {
                          $tieneProductos = isset($_SESSION['Cant_Product']) && $_SESSION['Cant_Product'] > 0;
                          echo '<a href="./Facturacion.php"><button type="button" id="btnPagar" data-sesion="true" data-productos="' . ($tieneProductos ? 'true' : 'false') . '" class="btn btn-dark btn-block btn-lg" style="width: 100%;">Pagar</button></a>';
                      } else {
                          echo '<button type="button" id="btnPagar" data-sesion="false" class="btn btn-dark btn-block btn-lg" style="width: 100%;">Pagar</button>';
                      }
                        ?>
                  </div>
                </div>
                <!--FIN DE LA ESTRUCTURA PARA EL RESUMEN DE PAGOD DEL CARRITO-->


              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <?php
  include "./assets/Fragments/Footer_BK.php"
  ?>
  <script src="./assets/JavaScript/Producto_Espec.js"></script>
  <script src="./assets/JavaScript/Carrito.js"></script>


</body>

</html>