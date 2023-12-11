<?php 
require_once '../Config/Conexion.php';
final class Carrito extends Conexion{

    protected static $cnx;
    private $idLinea = null;
    private $Cantidad = null;
    private $Talla = null;
    private $Total_Linea = null;
    private $idArticulo = null;
    private $idArtPersonalizado = null;
    private $idSticker = null;


public function __construct() {}


public function getidLinea()
    {
        return $this->idLinea;
    }
    public function setidLinea($idLinea)
    {
        $this->idLinea = $idLinea;
    }

    public function getCantidad()
    {
        return $this->Cantidad;
    }
    public function setCantidad($Cantidad)
    {
        $this->Cantidad = $Cantidad;
    }

    public function getTalla()
    {
        return $this->Talla;
    }
    public function setTalla($Talla)
    {
        $this->Talla = $Talla;
    }

    public function getTotal_Linea()
    {
        return $this->Total_Linea;
    }
    public function setTotal_Linea($Total_Linea)
    {
        $this->Total_Linea = $Total_Linea;
    }

    public function getidArticulo()
    {
        return $this->idArticulo;
    }
    public function setidArticulo($idArticulo)
    {
        $this->idArticulo = $idArticulo;
    }

    public function getidArtPersonalizado()
    {
        return $this->idArtPersonalizado;
    }
    public function setidArtPersonalizado($idArtPersonalizado)
    {
        $this->idArtPersonalizado = $idArtPersonalizado;
    }

    public function getidSticker()
    {
        return $this->idSticker;
    }
    public function setidSticker($idSticker)
    {
        $this->idSticker = $idSticker;
    }


    public static function getConexion()
    {
        self::$cnx = Conexion::conectar();
    }

    public static function desconectar()
    {
        self::$cnx = null;
    }


    public function guardarEnCarritoDB(){
        $query = "INSERT INTO Carrito (idArticulo, idArtPersonalizado,idSticker,Cantidad, Talla, Total_Linea) 
        VALUES (:idArticulo,:idArtPersonalizado,:idSticker,:Cantidad,:Talla,:Total_Linea)";
     try {
         self::getConexion();
         $idArticulo=$this->getidArticulo();
         $idArtPersonalizado= $this->getidArtPersonalizado();
         $idSticker= $this-> getidSticker();
         $Cantidad=$this->getCantidad();
         $Talla=$this->getTalla();
         $Total_Linea=$this->getTotal_Linea();
         
         $resultado = self::$cnx->prepare($query);
        $resultado->bindParam(":idArticulo",$idArticulo,PDO::PARAM_INT);
        $resultado->bindParam(":idArtPersonalizado",$idArtPersonalizado,PDO::PARAM_INT);
        $resultado->bindParam(":idSticker",$idSticker,PDO::PARAM_INT);
        $resultado->bindParam(":Cantidad",$Cantidad,PDO::PARAM_INT);
        $resultado->bindParam(":Talla",$Talla,PDO::PARAM_STR);
        $resultado->bindParam(":Total_Linea",$Total_Linea,PDO::PARAM_INT);
            $resultado->execute();
            self::desconectar();
           } catch (PDOException $Exception) {
               self::desconectar();
               $error = "Error ".$Exception->getCode( ).": ".$Exception->getMessage( );;
             return json_encode($error);
           }
    }
    public function listarTodosCarrito(){
        $query = "SELECT * FROM Carrito";
        //Almacenar los articulos
        $arr = array();
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->execute();
            self::desconectar();
            foreach ($resultado->fetchAll() as $encontrado) {
                $cart = new Carrito();
                $cart->setidLinea($encontrado['idLinea']);
                $cart->setidArticulo($encontrado['idArticulo']);
                $cart->setidArtPersonalizado($encontrado['idArtPersonalizado']);
                $cart->setidSticker($encontrado['idSticker']);
                $cart->setCantidad($encontrado['Cantidad']);
                $cart->setTalla($encontrado['Talla']);
                $cart->setTotal_Linea($encontrado['Total_Linea']);
                //Almacenamos todos los datos de la tabla dentro del Array
                $arr[] = $cart;
            }
            return $arr;

        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error ".$Exception->getCode( ).": ".$Exception->getMessage( );;
            return json_encode($error);
        }
    }

    public function EliminarLinea()
    {
        $query = "DELETE FROM Carrito WHERE idLinea=:id";
        try {
            self::getConexion();
            $id = $this->getidLinea();

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



}


?>