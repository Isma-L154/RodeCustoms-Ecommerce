<?php

require_once '../Models/Usuario.php';

switch ($_GET["op"]) {

    case 'Login':
        session_start();
        $Email_Login =  isset($_POST["email_login"]) ? $_POST["email_login"] : "";
        $Clave = isset($_POST["password_login"]) ? $_POST["password_login"] : "";

        $Usuario = new Usuario();
        $Usuario->setEmail($Email_Login);
        $Usuario->setClave($Clave);

        $UsuarioData = $Usuario->verificarCredencialesDb();

        if ($UsuarioData !== false && $UsuarioData !== null) {

            $_SESSION['user_id'] = $UsuarioData['idUsuario'];
            $_SESSION['user_nombre'] = $UsuarioData['nombre'];
            $_SESSION['user_apellidos'] = $UsuarioData['apellidos'];
            $_SESSION['user_email'] = $UsuarioData['email'];
            $_SESSION['user_Password'] = $UsuarioData['clave'];
            $_SESSION['user_Rol'] = $UsuarioData['idRol'];

            if ($UsuarioData['idRol'] == 2) {
                echo 1; //Redireccion al Perfil
            } elseif ($UsuarioData['idRol'] == 1) {
                echo 3; //Redireccion al DashBoard de Admin
            } else {
                echo
                '<script>
                toastr.error("Error: Credenciales invalidos");
                </script>';
            }
        } else {
            echo 2;
        }
        break;


    case 'CerrarSesion':
        // LoginController.php

if ($_POST['action'] == 'CerrarSesion') {
    session_unset();
    session_destroy();
    echo 'Sesión cerrada correctamente';
    exit;
}

        break;
}
