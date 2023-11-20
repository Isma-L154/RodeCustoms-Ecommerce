<?php

require '../Models/Usuario.php';
//FIXME Arreglar las funciones para que el login sea funcional

switch ($_GET["op"]){
    
    case 'Login':
            session_start();
            if (isset($_POST['email_login']) && isset($_POST['password_login'])){
                $email_login = $_POST['email_login']; 
                $usuario_login = new Usuario();
                $usuario_login->setEmail($email_login);
                $encontrado = $usuario_login->verificarExistenciaDb();
        
                if($encontrado != null){
                    $Rol = $usuario_login->getRol();
                    $_SESSION['Rol'] = $Rol;
                    if (isset($_SESSION['Rol'])){
                        switch ($_SESSION['Rol']){
                        case 1:
                            header('location: ./Views/Perfil.php');
                            
                            break;

                        case 2:
                            header('location: ./Views/index.php');
                            
                            break;
                            
                            default:
                    }
                }
                }
            }

            

        break;

        case 'CerrarSesion':
            function cerrar_sesion(){
                if (isset($_GET['cerrar_sesion'])){
                    session_unset();
                    session_destroy();
                }
            }
            break;
        }


?>