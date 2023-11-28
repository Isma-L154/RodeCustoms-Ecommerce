<?php

require_once '../Config/Conexion.php';

final class Usuario extends Conexion{
    
//ATRIBUTOS DE USUARIOS
    protected static $cnx;
    private $idUsuario = null;
    private $nombre = null;
    private $apellidos = null;
    private $email = null;
    private $clave = null;
    private $Rol = null;

//Constructor
public function __construct() {}

//Encapsuladores
public function getIdUsuario()
        {
            return $this->idUsuario;
        }
        public function setIdUsuario($idUsuario)
        {
            $this->idUsuario = $idUsuario;
        }
        
        public function getEmail()
        {
            return $this->email;
        }
        public function setEmail($email)
        {
            $this->email = $email;
        }
        public function getNombre()
        {
            return $this->nombre;
        }
        public function setNombre($nombre)
        {
            $this->nombre = $nombre;
        }
        public function getApellidos()
        {
            return $this->apellidos;
        }
        public function setApellidos($apellidos)
        {
            $this->apellidos = $apellidos;
        }
        public function getClave()
        {
            return $this->clave;
        }
        public function setClave($clave)
        {
            $this->clave = $clave;
        }
        public function getRol()
        {
            return $this->Rol;
        }
        public function setRol($Rol)
        {
            $this->Rol = $Rol;
        }
       
        //Funciones de Conexion y Desconexion de Base de Datos
        public static function getConexion(){
            self::$cnx = Conexion::conectar();
        }

        public static function desconectar(){
            self::$cnx = null;
        }

        //Ver si es un usuario que ya esta registrado en la base de datos

        public function verificarExistenciaDb(){
            $query = "SELECT * FROM Usuario where email=:email";
         try {
                self::getConexion();
                $resultado = self::$cnx->prepare($query);		
                $email= $this->getEmail();	
                $resultado->bindParam(":email",$email,PDO::PARAM_STR);
                $resultado->execute();
                self::desconectar();
                
                $encontrado = false;
                foreach ($resultado->fetchAll() as $reg) {
                    $encontrado = true;
                }
                return $encontrado;
               } catch (PDOException $Exception) {
                   self::desconectar();
                   $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
                 return $error;
               }
        }
public function guardarEnDb(){
    $query = "INSERT INTO Usuario (nombre, apellidos, email, clave, idRol) 
    VALUES (:nombre,:apellidos,:email,:clave,:idRol)";
 try {
     self::getConexion();
     $nombre=strtoupper($this->getNombre());
     $apellidos=strtoupper($this->getApellidos());
     $email=$this->getEmail();
     $clave=$this->getClave();
     $idRol=$this ->getRol();


     //PDO establece una conexion de php y la BD
    $resultado = self::$cnx->prepare($query);
    $resultado->bindParam(":nombre",$nombre,PDO::PARAM_STR);
    $resultado->bindParam(":apellidos",$apellidos,PDO::PARAM_STR);
    $resultado->bindParam(":email",$email,PDO::PARAM_STR);
    $resultado->bindParam(":clave",$clave,PDO::PARAM_STR);
    $resultado->bindParam(":idRol",$idRol,PDO::PARAM_INT);
        $resultado->execute();
        self::desconectar();
       } catch (PDOException $Exception) {
           self::desconectar();
           $error = "Error ".$Exception->getCode( ).": ".$Exception->getMessage( );;
         return json_encode($error);
       }
}

public function listarTodosUsuarios(){
    $query = "SELECT * FROM Usuario";
    $arr = array();
    try {
        self::getConexion();
        $resultado = self::$cnx->prepare($query);
        $resultado->execute();
        self::desconectar();
        foreach ($resultado->fetchAll() as $encontrado) {
            $user = new Usuario();
            $user->setIdUsuario($encontrado['idUsuario']);
            $user->setNombre($encontrado['nombre']);
            $user->setApellidos($encontrado['apellidos']);
            $user->setEmail($encontrado['email']);
            $user->setClave($encontrado['clave']);
            $user->setRol($encontrado['idRol']);
            $arr[] = $user;
        }
        return $arr;
    } catch (PDOException $Exception) {
        self::desconectar();
        $error = "Error ".$Exception->getCode( ).": ".$Exception->getMessage( );;
        return json_encode($error);
    }
}

//Ver si el email que ingresa el usuario es correcto
public function verificarExistenciaEmail(){
    $query = "SELECT idUsuario,nombre,apellidos,email FROM Usuario where email=:email";
    try {
    self::getConexion();
    $resultado = self::$cnx->prepare($query);		
    $email= $this->getEmail();		
    $resultado->bindParam(":email",$email,PDO::PARAM_STR);
    $resultado->execute();
    self::desconectar();
    $encontrado = false;
    $arr=array();
    foreach ($resultado->fetchAll() as $reg) {
        $arr[]=$reg['idUsuario'];
        $arr[]=$reg['nombre'];
        $arr[]=$reg['apellidos'];   
        $arr[]=$reg['email'];  
    }
    return $arr;
   // return $encontrado;
    } catch (PDOException $Exception) {
        self::desconectar();
        $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
    return $error;
    }
}

//PRUEBA de ver si la contraseña que ingresa es valida (POR TERMINAR)

public function verificarContraseñas(){
    $query = "SELECT idUsuario, nombre, apellidos, email, clave FROM Usuario WHERE email=:email";
    
    try {
        self::getConexion();
        $resultado = self::$cnx->prepare($query);
        
        $email = $this->getEmail();
        $resultado->bindParam(":email", $email, PDO::PARAM_STR);
        
        $resultado->execute();
        
        // Verificar si hay al menos un resultado
        if ($resultado->rowCount() > 0) {
            $reg = $resultado->fetch(PDO::FETCH_ASSOC);
            $arr = [
                'idUsuario' => $reg['idUsuario'],
                'nombre' => $reg['nombre'],
                'apellidos' => $reg['apellidos'],
                'email' => $reg['email'],
                'clave' => $reg['clave']
            ];
            
            return $arr;
        } else {
            return false; // Indicar que no se encontraron resultados
        }
    } catch (PDOException $Exception) {
        $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
        // Puedes registrar el error o tomar otras acciones según el contexto
        return $error;
    } finally {
        self::desconectar(); // Asegurarse de desconectar la base de datos, incluso si hay una excepción
    }
}


public function ActualizarUsuario(){
    $query = "UPDATE Usuario SET nombre=:nombre, apellidos=:Apellidos, idRol=:Rol where idUsuario=:id AND email=:email" ;
    try {
        self::getConexion();
        $idUsuario=$this->getIdUsuario();
        $nombreUsuario=$this->getNombre();
        $Apellidos=$this->getApellidos();
        $email=$this->getEmail();
        $Rol=$this->getRol();
        
        $resultado = self::$cnx->prepare($query);
        $resultado->bindParam(":id",$idUsuario,PDO::PARAM_INT);
        $resultado->bindParam(":email",$email,PDO::PARAM_STR);
        $resultado->bindParam(":nombre",$nombreUsuario,PDO::PARAM_STR);
        $resultado->bindParam(":Apellidos",$Apellidos,PDO::PARAM_STR);
        $resultado->bindParam(":Rol",$Rol,PDO::PARAM_INT);

        self::$cnx->beginTransaction();//desactiva el autocommit
        $resultado->execute();
        self::$cnx->commit();//realiza el commit y vuelve al modo autocommit
        self::desconectar();
        
        return $resultado->rowCount();

    } catch (PDOException $Exception) {
        self::$cnx->rollBack();
        self::desconectar();
        $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
        return $error;
    }
}

public function EliminarUsuario(){
    $query = "DELETE FROM Usuario WHERE idUsuario=:id";
    try {
        self::getConexion();
        $id = $this->getIdUsuario();
        
        $resultado = self::$cnx->prepare($query);
        $resultado->bindParam(":id", $id, PDO::PARAM_INT);

        self::$cnx->beginTransaction(); // Desactiva el autocommit
        $resultado->execute();
        self::$cnx->commit(); // Realiza el commit y vuelve al modo autocommit
        self::desconectar();

        return $resultado->rowCount();
    } catch (PDOException $Exception) {
        self::$cnx->rollBack();
        self::desconectar();
        $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
        return $error;
    }
}


//TODO Hacer la parte del LOGIN

//LOGIN DE USUARIOS


}

?>