<?php

require_once '../Models/Articulo.php';

switch ($_GET["op"]) {
    case 'listar_articulos':

        $articulo = new Articulo();
        $articulos = $articulo ->listarTodosDb();
        $datos = array();

        foreach ($articulos as $reg) {
            if  ($reg-> getRuta_imagen() != '' && $reg-> getRuta_imagen() != null ) {

                $Ruta = $articulos['ruta_imagen'].$reg->getRuta_imagen();
                }else{
                    $Ruta = '../Views/Img/Logo.png';
                }
                $datos[] = array(
                    "0" => $reg->getId(),
                    "1" => $reg->getNombre(),
                    "2" => $reg->getDescripcion(),
                    "3" => '<img src="'. $imagen.'',
                    "4" => $reg->getPrecio(),   
                );
            }
            $Resultado = array(
                "sEcho" => 1, ##informacion para datatables
                "aaData" => $data
            );
            echo json_encode($Resultado);
        break;
    
    
    
    }


?>