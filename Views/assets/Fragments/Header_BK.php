<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
}?>
<header>
  <div class="container_logo">
    <a href="./index.php">
      <img src="./assets/Img/Logo2.png" alt="LogoRode" class="Mi_logo" style="height: 85px; width: 96px;"></a>
  </div>
    

  <nav id="navbar">

    <div class="SearchBar">
      <form class="d-flex m-4 b-4" role="search">
        <input class="form-control me-3 " type="search" placeholder="Buscar" aria-label="Search">
        <button class="btn btn-outline-success" id="Button_Search" type="submit" onmouseover="this.style.backgroundColor='#007bff';" onmouseout="this.style.backgroundColor='#D4AF37';">Buscar
        </button>

      </form>

    </div>

    <!--Menu del Navbar-->
    <div class="navbar navbar-dark bg-dark m-2" style="background-color: #2A2A2A!important;">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation" fdprocessedid="23sb5r">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 m-3">

              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="./Carrito.php" style="color: #2A2A2A; font-size: x-large;"><i class="fa-solid fa-cart-shopping" style="margin-right: 15px;"></i> Carrito</a>
              </li>

              <?php
              if (isset($_SESSION['user_Rol'])) {
                // El usuario ha iniciado sesión, muestra el enlace al perfil
                echo '<li class="nav-item">
                        <a class="nav-link" href="./Perfil.php" style="color: #2A2A2A; font-size: x-large;">
                            <i class="fa-solid fa-address-card" style="margin-right: 15px;"></i> Perfil
                        </a>
                      </li>';
            } else {

              echo '<li class="nav-item">
            <a class="nav-link" href="javascript:void(0);" onclick="redirectToProfile()" style="color: #2A2A2A; font-size: x-large;">
                <i class="fa-solid fa-address-card" style="margin-right: 15px;"></i> Perfil
            </a>
          </li>';

              } 
              ?>

              <?php
              if (!isset($_SESSION['user_Rol'])) {
                echo '<li class="nav-item">
                <a class="nav-link" href="./login.php" style="color: #2A2A2A; font-size: x-large;"><i class="fa-solid fa-user"style="margin-right: 15px;"></i>Login</a>
              </li>';
              }
              ?>
            <?php
              if (!isset($_SESSION['user_Rol'])) {
                echo '<li class="nav-item">
                <a class="nav-link" href="./registro.php" style="color: #2A2A2A; font-size: x-large;"><i class="fa-solid fa-right-to-bracket" style="margin-right: 15px;"></i>Registro</a>
              </li>';
              }
              ?>

              <?php
              if (isset($_SESSION['user_Rol']) && $_SESSION['user_Rol'] == 1) {
                echo '<li class="nav-item">
                <a class="nav-link" href="./Admin_Dashboard.php" style="color: #2A2A2A; font-size: x-large;"><i class="fa-solid fa-screwdriver-wrench"style="margin-right: 15px;"></i>Administrador</a>
              </li>';
              }

              if (isset($_SESSION['user_Rol'])) {
                echo '<li class="nav-item">
                <button id="btnCerrarSesion" class="nav-link" style="color: #2A2A2A; font-size: x-large;" data-action="cerrarSesion">
                <i class="fa-solid fa-right-from-bracket" style="margin-right: 15px;"></i>Cerrar Sesión
            </button>
                </li>';        
              }
            
            

              
              ?>
            </ul>

          </div>
        </div>


      </div>
    </div>
  </nav>
  <script>
    // Función para redirigir al usuario al perfil
    function redirectToProfile() {
      window.location.href = "../Views/Login.php";
    }
    
    document.getElementById('btnCerrarSesion').addEventListener('click', function() {
        var action = this.getAttribute('data-action');
        
        // Realizar la acción correspondiente mediante Ajax
        if (action === 'cerrarSesion') {
            cerrarSesion();
        }
    });

    function cerrarSesion() {
        // Realizar una solicitud Ajax para cerrar la sesión
        $.ajax({
            url: '../Controllers/LoginController.php?op=CerrarSesion', // Ajusta la ruta según tu estructura de archivos
            type: 'GET',
            success: function(data) {
                // Redirigir a la página de inicio de sesión después de cerrar la sesión
                window.location.href = '../Views/index.php';
            },
            error: function(e) {
                console.log(e.responseText);
            }
        });
    }
</script>
</header>