<?php 
require_once '../Config/Conexion.php';

final class Stickers extends Conexion{

    protected static $cnx;
    private $idSticker= null;
    private $RutaLogo = null;
    private $Tamanio = null;
    private $Precio = null;
    private $Cantidad = null;
    private $idTipoProducto = null;

    public function __construct() {}

    public function getidSticker()
    {
        return $this->idSticker;
    }
    public function setidSticker($idSticker)
    {
        $this->idSticker = $idSticker;
    }

    public function getRutaLogo()
    {
        return $this->RutaLogo;
    }
    public function setRutaLogo($RutaLogo)
    {
        $this->RutaLogo = $RutaLogo;
    }

    public function getTamanio()
    {
        return $this->Tamanio;
    }
    public function setTamanio($Tamanio)
    {
        $this->Tamanio = $Tamanio;
    }

    public function getPrecio()
    {
        return $this->Precio;
    }
    public function setPrecio($Precio)
    {
        $this->Precio = $Precio;
    }

    public function getCantidad()
    {
        return $this->Cantidad;
    }
    public function setCantidad($Cantidad)
    {
        $this->Cantidad = $Cantidad;
    }

    public function getidTipoProducto()
    {
        return $this->idTipoProducto;
    }
    public function setidTipoProducto($idTipoProducto)
    {
        $this->idTipoProducto = $idTipoProducto;
    }

    public static function getConexion()
    {
        self::$cnx = Conexion::conectar();
    }

    public static function desconectar()

    {
        self::$cnx = null;
    }

    public function guardarStickerDB(){
        $query = "INSERT INTO Stickers (RutaLogo, Tamanio, Precio, Cantidad ,idTipoProducto) 
        VALUES (:RutaLogo,:Tamanio,:Precio,:Cantidad,:idTipoProducto)";
     try {
         self::getConexion();
         $RutaLogo = $this->getRutaLogo();
         $Tamanio=$this->getTamanio();
         $Precio =$this->getPrecio(); 
         $Cantidad=$this->getCantidad();
         $idTipoProducto=$this->getidTipoProducto();
         
         $resultado = self::$cnx->prepare($query);
        $resultado->bindParam(":RutaLogo",$RutaLogo,PDO::PARAM_STR);
        $resultado->bindParam(":Tamanio",$Tamanio,PDO::PARAM_STR);
        $resultado->bindParam(":Precio",$Precio,PDO::PARAM_INT);
        $resultado->bindParam(":Cantidad",$Cantidad,PDO::PARAM_INT);
        $resultado->bindParam(":idTipoProducto",$idTipoProducto,PDO::PARAM_INT);
            $resultado->execute();
            //Esta vara es para agarrar el id que se inserto de ultimo, pero como el mae lo agarra en String por que asi es la funcion, pues hay que convertirlo con intval
            $ultimoId = intval(self::$cnx->lastInsertId());
            self::desconectar();
            return $ultimoId;
            
           } catch (PDOException $Exception) {
               self::desconectar();
               $error = "Error ".$Exception->getCode( ).": ".$Exception->getMessage( );;
             return json_encode($error);
           }
    }

    public static function MostrarSticker_Especifico($idSticker){
        $query = "SELECT * FROM Stickers where idSticker=:id";
        $idSticker = $idSticker;
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":id",$idSticker,PDO::PARAM_INT); 
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