<?php

require_once '../Models/Usuario.php';

switch ($_GET["op"]) {
//FIXME
case 'insertar':
    $nombre = isset($_POST["nombre"]) ? trim($_POST["nombre"]) : "";
    $apellidos = isset($_POST["apellidos"]) ? trim($_POST["apellidos"]) : "";
    $email = isset($_POST["email"]) ? trim($_POST["email"]) : "";
    $password = isset($_POST["password"]) ? trim($_POST["password"]) : "";
    $Rol = isset($_POST["idRol"]) ? trim($_POST["idRol"]) : 2;

    //$clave=randomPassword();
    $clavehash = hash('SHA256', trim($password));
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
            
            if($usuario->verificarExistenciaDb()){
                //if(enviarCorreo($email,$clave,$nombre)){
                    echo 1; //usuario registrado y envio de correo exitos
                //}else{
                  //  echo 4; //usuario registrado y envio de correo fallido
                //}
            }else{
                echo 3; //Fallo al realizar el registro
            }   
        } else {
            echo 2; //el usuario ya existe
        }
break;


case 'existeUsuario':
      //FIXME  COMPLETAR ESTA FUNCION   
    
    $usuario = isset($_POST["user"]) ? $_POST["user"] : "";
    $user_login = new Usuario();
    //$user_login->setUsuario($usuario);
    $encontrado = $user_login->verificarExistenciaDb();
    
    if ($encontrado != null) {
        echo 1;
    }else{
        echo 0;
    }
break;



}




?>