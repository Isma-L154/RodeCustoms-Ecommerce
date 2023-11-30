<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RODECUSTOMS</title>
    
    <?php
    include "./assets/Fragments/Librerias.php";
    ?>
    <link  rel="stylesheet" href="./assets/StyleSheets/Login&Sign.css">
    <link rel="stylesheet" href="./Pluggins/toastr/toastr.css">

    

</head>
<body>
    <header>
        <?php
        include "./assets/Fragments/Header_BK.php";
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

            <h3 class="mb-5" style="color: white;">Iniciar Sesion</h3>

            <form method="POST" id="Form_Login" name="Form_Login">
            
            <div class="form-outline mb-4" style="border-color: #2A2A2A;">
            <label class="form-label" for="email_login" ></label>  
            <input type="email" id="email_login" class="form-control form-control-lg" placeholder="Email" name="email_login" required/>
            </div>

            <div class="form-outline mb-4" style="border-color: #2A2A2A;">
            <label class="form-label" for="password_login"></label>
            <input type="password" id="password_login" class="form-control form-control-lg" placeholder="Contraseña" name="password_login" required/>
            </div>        

            <input class="btn btn-primary btn-lg btn-block" type="submit" id="btnLogin" name="btnLogin"  value="Iniciar Sesion">

            <!--Seccion par redireccionar al registro-->
            <hr class="my-4" style="color: white;">

            <a href="./registro.php" style="color: white;">¿No tienes cuenta?</a>
            
          </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</main>

<!--Zona del footer generico de todas las paginas para el Contacto, Copyrigth, Redes sociales y Politicas de uso/Privacidad-->


<?php
include "./assets/Fragments/Footer_BK.php";
?>

        <script src="./Pluggins/bootbox/bootbox.min.js"></script>
        <script src="./Pluggins/toastr/toastr.js"></script>
        <script src="./assets/JavaScript/Login.js"></script>


</body>
</html>