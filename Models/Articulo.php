<?php

require_once "../Config/Conexion.php";

class Articulo extends Conexion{

    //ATRIBUTOS DE LA CLASE
    protected static $cnx;
    private $id = null;
    private $nombre = null;
    private $descripcion = null;
    private $ruta_imagen = null;
    private $precio = null;
    private $categoria = null;

    //CONSTRUCTOR
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


    //METODOS DE ARTICULO
    
    //Conexion con la base de datos
    public static function getConexion(){
        self::$cnx = Conexion::conectar();
    }

    public static function desconectar(){
        self::$cnx = null;
    }

    //Listar articulos 
    public function listarTodosDb(){
        $query = "SELECT * FROM Articulo";
        //Almacenar los articulos
        $arr = array();
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->execute();
            self::desconectar();
            foreach ($resultado->fetchAll() as $encontrado) {
                $artic = new Articulo();
                $artic->setId($encontrado['idArticulo']);
                $artic->setNombre($encontrado['nombre']);
                $artic->setDescripcion($encontrado['descripcion']);
                $artic->setRuta_imagen($encontrado['ruta_imagen']);
                $artic->setPrecio($encontrado['precio']);
                $artic->setCategoria($encontrado['idCategoria']);
                //Almacenamos todos los datos de la tabla dentro del Array
                $arr[] = $artic;
            }
            return $arr;

        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error ".$Exception->getCode( ).": ".$Exception->getMessage( );;
            return json_encode($error);
        }
    }

    //Mostar un articulo en especifico con respecto al ID

    public static function MostrarArticulo_Especifico($id){
        $query = "SELECT * FROM Articulo where idArticulo=:id";
        $idArticulo = $id;
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":id",$idArticulo,PDO::PARAM_STR); //Param_str, este represante una variable en la BD (Varchar. y demas)
            $resultado->execute();
            self::desconectar();
            return $resultado->fetch();


        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
            return $error;
        }

    }





}
?>