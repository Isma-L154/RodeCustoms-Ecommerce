<?php
//La forma de hacer llamados a la clase
require_once "global.php";

class Conexion
{
    function __construct()
    {
        # code...
    }
    
    public static function conectar(){
        //conexion mysql
        
        //Aqui hace la conexion a la base de datos, las variables se encuentran en la clase global
        try {
            $cn = new PDO("mysql:host=".DB_HOST_MYSQL.
            ";dbname=".DB_NAME_MYSQL.
            ";charset=utf8",
            DB_USER_MYSQL,
            DB_PASSWORD_MYSQL);
            $cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $cn;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

}

//Linea de codigo que ayuda a saber si esta correctamente conectada la BD
//Se necesita ir a la web y llamar esta carpeta en especifico


//Se debe dejar esta linea de codigo comentada para que muestre los datos de la BD en la pagina web
//var_dump(Conexion::conectar());