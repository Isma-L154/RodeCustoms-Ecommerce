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

  <section class="h-100 h-custom" style="background-color: #d2c9ff;">
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


                      <h6 class="mb-0 text-muted">Items</h6>
                    </div>
                    <!--Lineas divisoras hechas con Bootstrap-->
                    <hr class="my-4">

                    <!--INCIO DE ESTRUCTURA PARA EL INGRESO DE PRODUCTOS AL CARRITO-->

                    <div class="row mb-4 d-flex justify-content-between align-items-center">
                      <div class="col-md-2 col-lg-2 col-xl-2">
                        <!--Ingresar la imagen del producto que se ingresa aqui-->
                      </div>
                      <div class="col-md-3 col-lg-3 col-xl-3">
                        <h6 class="text-muted"><!--Aqui va la clase de producto que es--></h6>
                        <h6 class="text-black mb-0"><!--Aqui va el nombre del producto que se ingreso--></h6>
                      </div>
                      <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                        <button class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                          <i class="fas fa-minus"></i>
                        </button>

                        <input id="form1" min="0" name="quantity" value="1" type="number" class="form-control form-control-sm" />

                        <button class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                          <i class="fas fa-plus"></i>
                        </button>
                      </div>
                      <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                        <h6 class="mb-0"><!--Aqui va el Precio del producto--></h6>
                      </div>

                      <!--se debe ingresar una funcion que elimine el producto, por unidad, no que elimine todos-->
                      <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                        <a href="#!" class="text-muted"><i class="fas fa-times"></i></a>
                      </div>
                    </div>
                    <!--FIN DE ESTRUCTURA PARA EL INGRESO DE PRODUCTOS AL CARRITO-->


                    <hr class="my-4">

                    <div class="pt-5">
                      <h6 class="mb-0"><a href="./Catalogo.php" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Atras</a></h6>
                    </div>
                  </div>
                </div>

                <!--INCIO DE LA ESTRUCTURA PARA EL RESUMEN DE PAGOD DEL CARRITO-->

                <div class="col-lg-4 bg-grey">
                  <div class="p-5">
                    <h3 class="fw-bold mb-5 mt-2 pt-1">Resumen de Compra</h3>
                    <hr class="my-4">

                    <div class="d-flex justify-content-between mb-4">
                      <h5 class="text-uppercase">Items</h5>
                      <!--Aqui se tiene que Ingresar la vraible que nos de el total de productos que esten dentro del carrito-->
                    </div>

                    <hr class="my-4">

                    <div class="d-flex justify-content-between mb-5">
                      <h5 class="text-uppercase">Total</h5>
                      <!--Aqui se tiene que Ingresar la variable que nos de el total a pagar -->

                    </div>

                    <button type="button" class="btn btn-dark btn-block btn-lg" data-mdb-ripple-color="dark">Pagar</button>
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

</body>

</html>