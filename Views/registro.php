<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RODECUSTOMS</title>
    <link  rel="stylesheet" href="./assets/StyleSheets/Login&Sign.css">
    <link rel="stylesheet" href="./Pluggins/toastr/toastr.css">


    <?php
    include "./assets/Fragments/Librerias.php";
    ?>

</head>
<body>
    <!--Zona del header para el logo-->
    <header>
        <?php
        include "./assets/Fragments/Header_BK.php";
        ?>
    </header>
   
   <!--Zona del main que lleva los campos de inicio de sesion-->
    <main>

    <div class="container">
<!--Seccion para el recuadro que contiene el texto-->
<section class="text-center" id="Formulario_add">
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
          <form name="modulos_add" id="usuario_add" method="POST">
          
          <!--Columnas para la informacion del cliente-->  
          <div class="row">
              
              <div class="col-md-6 mb-4" >
                <div class="form-outline">
                  <input type="text" id="nombre" class="form-control" name="nombre"  required />
                  <label class="form-label" for="nombre" style="color: white;">Nombre</label>
                </div>
              </div>

              <div class="col-md-6 mb-4">
                <div class="form-outline">
                  <input type="text" id="apellidos" class="form-control" name="apellidos" required/>
                  <label class="form-label" for="apellidos" style="color: white; ">Apellidos</label>
                </div>
              </div>
            </div>

            <div class="form-outline mb-4">
              <input type="email" id="email" class="form-control" name="email" required/>
              <label class="form-label" for="email" style="color: white;">Email </label>
            </div>

            <div class="form-outline mb-4">
              <input type="password" id="password" class="form-control" name="password" required/>
              <label class="form-label" for="password" style="color: white;">Contraseña</label>
            </div>
                  <input type="submit" class="btn btn-primary btn-block mb-4" id="btnRegistar" value="Registrar" 
                    style="background-color: goldenrod; border-color: goldenrod;">

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
    include "./assets/Fragments/Footer_BK.php";
  ?>
        
        <script src="./Pluggins/bootbox/bootbox.min.js"></script>
        <script src="./Pluggins/toastr/toastr.js"></script>
        <script src="./assets/JavaScript/Registro.js"></script>


</body>
</html>





<!--Nuevo login

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login y Registro </title>
    
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="assets/css/estilos.css">
</head>
<body>

        <main>

            <div class="contenedor__todo">
                <div class="caja__trasera">
                    <div class="caja__trasera-login">
                        <h3>¿Ya tienes una cuenta?</h3>
                        <p>Inicia sesión para entrar en la página</p>
                        <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                    </div>
                    <div class="caja__trasera-register">
                        <h3>¿Aún no tienes una cuenta?</h3>
                        <p>Regístrate para que puedas iniciar sesión</p>
                        <button id="btn__registrarse">Regístrarse</button>
                    </div>
                </div>

                <Formulario de Login y registro
                <div class="contenedor__login-register">
                    Login
                    <form action="" class="formulario__login">
                        <h2>Iniciar Sesión</h2>
                        <input type="text" placeholder="Correo Electronico">
                        <input type="password" placeholder="Contraseña">
                        <button>Entrar</button>
                    </form>

                    Register
                    <form action="" class="formulario__register">
                        <h2>Regístrarse</h2>
                        <input type="text" placeholder="Nombre completo">
                        <input type="text" placeholder="Correo Electronico">
                        <input type="text" placeholder="Usuario">
                        <input type="password" placeholder="Contraseña">
                        <button>Regístrarse</button>
                    </form>
                </div>
            </div>

        </main>

        <script src="assets/js/script.js"></script>
</body>
</html>