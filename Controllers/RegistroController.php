<?php

require_once '../Models/Usuario.php';

switch ($_GET["op"]) {

    case 'insertar':
        $nombre = isset($_POST["nombre"]) ? trim($_POST["nombre"]) : "";
        $apellidos = isset($_POST["apellidos"]) ? trim($_POST["apellidos"]) : "";
        $email = isset($_POST["email"]) ? trim($_POST["email"]) : "";
        $password = isset($_POST["password"]) ? trim($_POST["password"]) : "";
        $Rol = isset($_POST["idRol"]) ? trim($_POST["idRol"]) : 2;

        //$clave=randomPassword();
        $clavehash = password_hash($password, PASSWORD_BCRYPT); ;
        $usuario = new Usuario();
        $usuario->setEmail($email);
        $encontrado = $usuario->verificarExistenciaDb();

        if ($encontrado == false) {
            $usuario->setNombre($nombre);
            $usuario->setApellidos($apellidos);
            $usuario->setEmail($email);
            $usuario->setClave($clavehash);
            $usuario->setRol($Rol);
            
            $usuario->guardarEnDb();

            if ($usuario->verificarExistenciaDb()) {
                session_start();
                $_SESSION['user_id'] = $usuario->getIdUsuario(); 
                $_SESSION['user_nombre'] = $nombre;
                $_SESSION['user_apellidos'] = $apellidos;
                $_SESSION['user_email'] = $email;
                $_SESSION['user_Rol'] = $Rol;

                echo 1;
            } else {
                echo 3; //Fallo al realizar el registro
            }
        } else {
            echo 2; //el usuario ya existe
        }
        break;
}
