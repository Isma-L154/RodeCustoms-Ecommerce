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
     $idRol=2;


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


//TODO Hacer la parte del LOGIN

//LOGIN DE USUARIOS


}

?>