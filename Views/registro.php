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
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="mb-4">Registrate</h2>
                <form>
                    <div class="form-group">
                        <label for="username">Nombre de usuario</label>
                        <input type="text" class="form-control" id="username" placeholder="Ingrese su correo electronico" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" id="password" placeholder="Ingrese su contraseña" required>
                    </div>
                    <button type="submit" class="btn btn-primary" style="background-color: goldenrod; border-color: goldenrod;" href="./index.html">Iniciar sesión</button>
                </form>
            </div>
        </div>
    </div>
</main>

<!--Zona del footer generico de todas las paginas para el Contacto, Copyrigth, Redes sociales y Politicas de uso/Privacidad-->>


<?php
include "./Fragments/Footer_BK.php";
?>




</body>
</html>