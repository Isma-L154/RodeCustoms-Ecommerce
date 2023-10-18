<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RODECUSTOMS</title>
    <link  rel="stylesheet" href="./StyleSheets/Login&Sign.css">

    <?php
    include "./Fragments/Librerias.php";
    ?>

</head>
<body>
    <!--Zona del header para el logo-->
    <header>
        <?php
        include "./Fragments/Header_BK.php";
        ?>
    </header>
   
   <!--Zona del main que lleva los campos de inicio de sesion-->
    <main>

    <div class="container">
<!--Seccion para el recuadro que contiene el texto-->
<section class="text-center">
  <div class="p-5" style="
        height: 200px;
        "></div>

  <div class="card mx-4 mx-md-5 shadow-5-strong" style="
        margin-top: -100px;
        margin-bottom: 100px;
        background: #2A2A2A;
        backdrop-filter: blur(40px);
        border-color: #2A2A2A;
        ">
    <div class="card-body py-5 px-md-5">

      <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
          <h2 class="fw-bold mb-5 fs-2" style="color: white;">Registrate</h2>
          
          <!--Form para el registro de datos del cliente-->
          <form>
          <!--Columnas para la informacion del cliente-->  
          <div class="row">
              <div class="col-md-6 mb-4">
                <div class="form-outline">
                  <input type="text" id="form3Example1" class="form-control"     />
                  <label class="form-label" for="form3Example1" style="color: white;">Nombre</label>
                </div>
              </div>
              <div class="col-md-6 mb-4">
                <div class="form-outline">
                  <input type="text" id="form3Example2" class="form-control" />
                  <label class="form-label" for="form3Example2" style="color: white; ">Apellidos</label>
                </div>
              </div>
            </div>

            <div class="form-outline mb-4">
              <input type="email" id="form3Example3" class="form-control" />
              <label class="form-label" for="form3Example3" style="color: white;">Email </label>
            </div>

            <div class="form-outline mb-4">
              <input type="password" id="form3Example4" class="form-control" />
              <label class="form-label" for="form3Example4" style="color: white;">Contraseña</label>
            </div>

            

            <button type="submit" class="btn btn-primary btn-block mb-4" style="background-color: goldenrod; border-color: goldenrod;">
              Registrarse
            </button>

          </form>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
</main>

<!--Zona del footer generico de todas las paginas para el Contacto, Copyrigth, Redes sociales y Politicas de uso/Privacidad-->>


<?php
include "./Fragments/Footer_BK.php";
?>




</body>
</html>