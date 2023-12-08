<?php

require_once "../Config/Conexion.php";

class Articulo_Pers extends Conexion{
    
    protected static $cnx;
    private $id = null;
    private $nombre = null;
    private $descripcion = null;
    private $ruta_imagen = null;
    private $precio = null;
    private $categoria = null;
    private $idTipoProducto = null;


    public function __construct() {}

    //ENCAPSULADORES
	public function getId() {
		return $this->id;
	}
	public function setId($id){
		$this->id = $id;
	}

	public function getNombre() {
		return $this->nombre;
	}
	
	public function setNombre($nombre){
		$this->nombre = $nombre;
		
	}

	public function getDescripcion() {
		return $this->descripcion;
	}
	
	public function setDescripcion($descripcion){
		$this->descripcion = $descripcion;
	}
	
	
	public function getRuta_imagen() {
		return $this->ruta_imagen;
	}
	
	public function setRuta_imagen($ruta_imagen){
		$this->ruta_imagen = $ruta_imagen;
		
	}
	
	
	public function getPrecio() {
		return $this->precio;
	}
	
	
	public function setPrecio($precio){
		$this->precio = $precio;
	}
	
	
	public function getCategoria() {
		return $this->categoria;
	}
	
	public function setCategoria($categoria){
		$this->categoria = $categoria;
	}

    public function getidTipoProducto() {
		return $this->idTipoProducto;
	}
	
	public function setidTipoProducto($idTipoProducto){
		$this->idTipoProducto = $idTipoProducto;
	}


    //METODOS DE ARTICULO
    
    //Conexion con la base de datos
    public static function getConexion(){
        self::$cnx = Conexion::conectar();
    }
    public static function desconectar(){
        self::$cnx = null;
    }

    public function verificarExistenciaDb(){
        $query = "SELECT * FROM Articulo_Personalize where id=:id";
     try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);		
            $id= $this->getId();	
            $resultado->bindParam(":id",$id,PDO::PARAM_STR);
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

    public function listarTodosPersonalizables(){
        $query = "SELECT * FROM Articulo_Personalize";
        $arr = array();
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->execute();
            self::desconectar();
            foreach ($resultado->fetchAll() as $encontrado) {
                $artic_pers = new Articulo_Pers();
                $artic_pers->setId($encontrado['id']);
                $artic_pers->setNombre($encontrado['nombre']);
                $artic_pers->setDescripcion($encontrado['descripcion']);
                $artic_pers->setRuta_imagen($encontrado['ruta_imagen']);
                $artic_pers->setPrecio($encontrado['precio']);
                $artic_pers->setCategoria($encontrado['idCategoria']);
                $arr[] = $artic_pers;
            }
            return $arr;

        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error ".$Exception->getCode( ).": ".$Exception->getMessage( );;
            return json_encode($error);
        }
    }

    public static function MostrarArticulo_Especifico($id){
        $query = "SELECT * FROM Articulo_Personalize where id=:id";
        $id = $id;
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":id",$id,PDO::PARAM_INT); //Param_str, este represante una variable en la BD (Varchar. y demas)
            $resultado->execute();
            self::desconectar();
            return $resultado->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
            return $error;
        }

    }

}