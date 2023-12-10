<?php 
require_once '../Config/Conexion.php';

final class Reports extends Conexion{

    protected static $cnx;
    private $ID = null;
    private $idArtPersonalizado = null;
    private $Color = null;
    private $Talla = null;
    private $Cantidad = null;
    private $RutaImagen = null;


    public function __construct() {}


    public function getID()
    {
        return $this->ID;
    }
    public function setID($ID)
    {
        $this->ID = $ID;
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

    public function getColor()
    {
        return $this->Color;
    }
    public function setColor($Color)
    {
        $this->Color = $Color;
    }

    public function getRutaImagen()
    {
        return $this->RutaImagen;
    }
    public function setRutaImagen($RutaImagen)
    {
        $this->RutaImagen = $RutaImagen;
    }

    public function getidArtPersonalizado()
    {
        return $this->idArtPersonalizado;
    }
    public function setidArtPersonalizado($idArtPersonalizado)
    {
        $this->idArtPersonalizado = $idArtPersonalizado;
    }


    public static function getConexion()
    {
        self::$cnx = Conexion::conectar();
    }

    public static function desconectar()
    {
        self::$cnx = null;
    }

    public function guardarReporteDB(){
        $query = "INSERT INTO Reportes (idArtPersonalizado,Color, Talla, Cantidad, RutaImagen) 
        VALUES (:idArtPersonalizado,:Color,:Talla,:Cantidad,:RutaImagen)";
     try {
         self::getConexion();
         $idArtPersonalizado= $this->getidArtPersonalizado();
         $Color=$this->getColor();
         $Talla=$this->getTalla(); 
         $Cantidad=$this->getCantidad();
         $RutaImagen=$this->getRutaImagen();
         
         $resultado = self::$cnx->prepare($query);
        $resultado->bindParam(":idArtPersonalizado",$idArtPersonalizado,PDO::PARAM_INT);
        $resultado->bindParam(":Color",$Color,PDO::PARAM_STR);
        $resultado->bindParam(":Talla",$Talla,PDO::PARAM_STR);
        $resultado->bindParam(":Cantidad",$Cantidad,PDO::PARAM_INT);
        $resultado->bindParam(":RutaImagen",$RutaImagen,PDO::PARAM_STR);
            $resultado->execute();
            self::desconectar();
           } catch (PDOException $Exception) {
               self::desconectar();
               $error = "Error ".$Exception->getCode( ).": ".$Exception->getMessage( );;
             return json_encode($error);
           }
    }

    public function listarTodosReportes(){
        $query = "SELECT * FROM Reportes";
        $arr = array();
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->execute();
            self::desconectar();
            
            foreach ($resultado->fetchAll() as $encontrado) {
                $Reports = new Reports();
                $Reports->setID($encontrado['ID']);
                $Reports->setidArtPersonalizado($encontrado['idArtPersonalizado']);
                $Reports->setTalla($encontrado['Color']);
                $Reports->setTalla($encontrado['Talla']);
                $Reports->setCantidad($encontrado['Cantidad']);
                $Reports->setRutaImagen($encontrado['RutaImagen']);

                $arr[] = $Reports;
            }
            return $arr;

        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error ".$Exception->getCode( ).": ".$Exception->getMessage( );;
            return json_encode($error);
        }
    }

    public function EliminarReporte(){
        $query = "DELETE FROM Reportes WHERE ID = :id";
        try {
            self::getConexion();
            $ID= $this->getID();
            
            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":id", $ID, PDO::PARAM_INT);
    
            self::$cnx->beginTransaction(); 
            $resultado->execute();
            self::$cnx->commit(); 
            self::desconectar();
    
            return $resultado->rowCount();
        } catch (PDOException $Exception) {
            self::$cnx->rollBack();
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return $error;
        }
    }

    public static function MostrarReporte_Especifico($ID){
        $query = "SELECT * FROM Reportes where ID=:id";
        $IdReport = $ID;
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":id",$IdReport,PDO::PARAM_INT); 
            $resultado->execute();
            self::desconectar();
            return $resultado->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
            return $error;
        }
    }

    public function llenarCampos($ID){
        $query = "SELECT * FROM Reportes where ID=:id";       
        try {
        self::getConexion();
        $resultado = self::$cnx->prepare($query);		 	
        $resultado->bindParam(":id",$ID,PDO::PARAM_INT);
        $resultado->execute();
        self::desconectar();
        foreach ($resultado->fetchAll() as $encontrado) {
            $this->setID($encontrado['ID']);
            $this->setidArtPersonalizado($encontrado['idArtPersonalizado']);
            $this->setTalla($encontrado['Color']);
            $this->setTalla($encontrado['Talla']);
            $this->setCantidad($encontrado['Cantidad']);
            $this->setRutaImagen($encontrado['RutaImagen']);

        }
        } catch (PDOException $Exception) {
        self::desconectar();
        $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();;
        return json_encode($error);
        }
    }

}