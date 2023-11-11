<?php

require_once '../Models/Articulo.php';

switch ($_GET["op"]) {
    case 'listar_articulos':

        $articulo = new Articulo();
        $articulos = $articulo ->listarTodosDb();
        $datos = array();

        foreach ($articulos as $reg) {
            if  ($reg-> getRuta_imagen() != '' && $reg-> getRuta_imagen() != null ) {

                $Ruta = './assets/Img/Logo.png'.$reg->getRuta_imagen();
                }else{
                    $Ruta = '';
                }
                $datos[] = array(
                    "0" => $reg->getId(),
                    "1" => $reg->getNombre(),
                    "2" => $reg->getDescripcion(),
                    "3" => '<img src="'.$Ruta.'',
                    "4" => $reg->getPrecio(),   
                );
            }
            $Resultado = array(
                "aaData" => $datos
            );
            echo json_encode($Resultado);
        break;
    
    
    
    }


?>