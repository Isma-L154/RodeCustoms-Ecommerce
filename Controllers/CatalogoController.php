<?php

require_once '../Models/Articulo.php';

switch ($_GET["op"]) {
   
    case 'listar_articulos':
        $articulo = new Articulo();
        $articulos = $articulo ->listarTodosDb();
        $datos = array();

        foreach ($articulos as $reg) {
            if  ($reg-> getRuta_imagen() != '' && $reg-> getRuta_imagen() != null ) {

                $Ruta = $reg->getRuta_imagen();
                }else{
                    $Ruta = '../Views/assets/Img/'.'Logo2.png';
                }
                $datos[] = array(
                    "0" => $reg->getId(),
                    "1" => $reg->getNombre(),
                    "2" => $reg->getDescripcion(),
                    "3" => '<img src="'. $Ruta.'" width="50px" heigth="50px"/>',                   
                    "4" => $reg->getPrecio(),   
                );
            }
            $Resultado = array(
                "sEcho" => 1, ##informacion para datatables
                "iTotalRecords" =>count($datos), ## total de registros al datatable
                "iTotalDisplayRecords" => count($datos), ## enviamos el total de registros a visualizar
                "aaData" => $datos
            );
            echo json_encode($Resultado);
        break;
    
    
    
    }
?>