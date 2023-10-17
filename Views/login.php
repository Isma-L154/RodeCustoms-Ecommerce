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
    <header>
        <?php
        include "./Fragments/Header_BK.php";
        ?>
    </header>
   
   <!--Zona del main que lleva los campos de inicio de sesion-->
<main>

<section class="vh-100" style="background-color: white;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border: 2px solid; border-radius: 2rem; border-color: #2A2A2A; background-color: #2A2A2A;"  >
          <div class="card-body p-5 text-center">

            <h3 class="mb-5" style="color: white;">Sign in</h3>

            <div class="form-outline mb-4" style="border-color: #2A2A2A;">
              <input type="email" id="typeEmailX-2" class="form-control form-control-lg" placeholder="Email" />
              <label class="form-label" for="typeEmailX-2" ></label>
            </div>

            <div class="form-outline mb-4" style="border-color: #2A2A2A;">
              <input type="password" id="typePasswordX-2" class="form-control form-control-lg" placeholder="Contraseña" />
              <label class="form-label" for="typePasswordX-2"></label>
            </div>        

            <button class="btn btn-primary btn-lg btn-block" type="submit">Iniciar Sesion</button>

            <hr class="my-4" style="color: white;">

            <p style="color: white;">¿No tienes cuenta?</p>
            <a href="./registro.php"><button class="btn btn-lg btn-block btn-primary" style="background-color: goldenrod; border-color: goldenrod;"
              type="submit" > Registrarse</button></a>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</main>

<!--Zona del footer generico de todas las paginas para el Contacto, Copyrigth, Redes sociales y Politicas de uso/Privacidad-->


<?php
include "./Fragments/Footer_BK.php";
?>




</body>
</html>