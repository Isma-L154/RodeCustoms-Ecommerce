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


    public function verificarExistenciaDb(){
        $query = "SELECT * FROM Articulo where idArticulo=:id";
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

    public function guardarEnDb(){
        $query = "INSERT INTO Articulo (nombre, descripcion, ruta_imagen, precio, idCategoria) 
        VALUES (:nombre,:descripcion,:imagen,:precio,:categoria)";
     try {
         self::getConexion();
         $nombre=($this->getNombre());
         $descripcion=($this->getDescripcion());
         $imagen=$this->getRuta_imagen();
         $precio=$this->getPrecio();
         $idCategoria=$this->getCategoria();
    
    
         //PDO establece una conexion de php y la BD
        $resultado = self::$cnx->prepare($query);
        $resultado->bindParam(":nombre",$nombre,PDO::PARAM_STR);
        $resultado->bindParam(":descripcion",$descripcion,PDO::PARAM_STR);
        $resultado->bindParam(":imagen",$imagen,PDO::PARAM_STR);
        $resultado->bindParam(":precio",$precio,PDO::PARAM_STR);
        $resultado->bindParam(":categoria",$idCategoria,PDO::PARAM_INT);
            $resultado->execute();
            self::desconectar();
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
            $resultado->bindParam(":id",$idArticulo,PDO::PARAM_INT); //Param_str, este represante una variable en la BD (Varchar. y demas)
            $resultado->execute();
            self::desconectar();
            return $resultado->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
            return $error;
        }

    }
    
    public function llenarCampos($id){
        $query = "SELECT * FROM Articulo where idArticulo=:id";
        try {
        self::getConexion();
        $resultado = self::$cnx->prepare($query);		 	
        $resultado->bindParam(":id",$id,PDO::PARAM_INT);
        $resultado->execute();
        self::desconectar();
        foreach ($resultado->fetchAll() as $encontrado) {
            $this->setId($encontrado['idArticulo']);
            $this->setNombre($encontrado['nombre']);
            $this->setDescripcion($encontrado['descripcion']);
            $this->setRuta_imagen($encontrado['imagen']);
            $this->setPrecio($encontrado['precio']);
            $this->setCategoria($encontrado['idCategoria']);

        }
        } catch (PDOException $Exception) {
        self::desconectar();
        $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();;
        return json_encode($error);
        }
    }


    public function ActualizarArticulo(){
        $query = "UPDATE Articulo SET nombre=:nombre, descripcion=:descripcion ,
         precio=:precio, ruta_imagen=:imagen , idCategoria=:Categoria where idArticulo=:id";
        try {
            self::getConexion();
            $id=$this->getId();
            $nombre=$this->getNombre();
            $descripcion=$this->getDescripcion();
            $precio=$this->getPrecio();
            $ruta_imagen =$this->getRuta_imagen();
            $Categoria=$this->getCategoria();
            
            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":id",$id,PDO::PARAM_INT);
            $resultado->bindParam(":nombre",$nombre,PDO::PARAM_STR);
            $resultado->bindParam(":descripcion",$descripcion,PDO::PARAM_STR);
            $resultado->bindParam(":precio",$precio,PDO::PARAM_STR);
            $resultado->bindParam(":imagen",$ruta_imagen,PDO::PARAM_STR);
            $resultado->bindParam(":Categoria",$Categoria,PDO::PARAM_INT);

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

    public function EliminarArticulo(){
        $query = "DELETE FROM Articulo WHERE idArticulo = :id";
        try {
            self::getConexion();
            $id = $this->getId();
            
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
    
    //Funcion para poder filtrar articulos
    public function FiltrarPorCategoria(){
        $query = "SELECT * FROM Articulo WHERE idCategoria = :idCategoria";
        try {
            self::getConexion();
            $idCategoria = $this->getCategoria();
            // Si deseas filtrar solo por categoría
    
            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":idCategoria", $idCategoria, PDO::PARAM_INT);
            $resultado->execute();
    
            $resultados = $resultado->fetchAll(PDO::FETCH_ASSOC);
    
            self::desconectar();
    
            return $resultados;
    
        } catch (PDOException $Exception) {
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return $error;
        }
    }
    


}
?>