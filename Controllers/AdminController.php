<?php
require_once '../Models/Articulo.php';
require_once  '../Models/Usuario.php';



switch ($_GET["op"]) {
//CRUD ARTICULOS

    case "MostrarArticulos":
        
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
                    "3" => '<img src="'. $Ruta.'" width="70px" heigth="70px"/>',                   
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
    
    case "Agregar_Articulos":

        //Lo parametros que se van a recibir por POST del form
        $nombre = isset($_POST["nombre"]) ? trim($_POST["nombre"]) : "";
        $descripcion = isset($_POST["descripcion"]) ? trim($_POST["descripcion"]) : "";
        $imagen = isset($_POST["ruta_imagen"]) ? trim($_POST["ruta_imagen"]) : "";
        $precio = isset($_POST["precio"]) ? trim($_POST["precio"]) : "";
        $Categoria = isset($_POST["idCategoria"]) ? trim($_POST["idCategoria"]) : 3;

        $articulo = new Articulo();
        //FIXME Importante que se esta haciendo la verificacion con el nombre, NO es correcto hacerlo pero ya el ID es autoincremental
        $articulo->setNombre($nombre);
        $encontrado = $articulo->verificarExistenciaDb();
        
        if ($encontrado == false) {
            $articulo->setNombre($nombre);
            $articulo->setDescripcion($descripcion);
            $articulo->setRuta_imagen($imagen);
            $articulo->setPrecio($precio);
            $articulo->setCategoria($Categoria);
            $articulo->guardarEnDb();
            
            if($usuario->verificarExistenciaDb()){
                    echo 1; //usuario registrado y envio de correo exitos
            }else{
                echo 3; //Fallo al realizar el registro en la DB
            }   
        } else {
            echo 2; // Articulo ya existe, sin embargo no es correcto por que se verifica por nombre
        }
    break;

        case 'Editar_Articulos':
            //Trim se utiliza para eliminar espacios en blanco adicionales en los campos
              $idArticulo = isset($_POST["idArticulo"]) ? trim($_POST["idArticulo"]) : "";
              $nombre = isset($_POST["nombre"]) ? trim($_POST["nombre"]) : "";
              $descripcion = isset($_POST["descripcion"]) ? trim($_POST["descripcion"]) : "";
              $imagen = isset($_POST["imagen"]) ? trim($_POST["imagen"]) : "";
              $precio = isset($_POST["precio"]) ? trim($_POST["precio"]) : "";
              $idCategoria = isset($_POST["Categoria"]) ? trim($_POST["Categoria"]) : "";
              
              $articulo = new Articulo();
              $articulo->setId($idArticulo);
              $encontrado = $articulo->verificarExistenciaDb();
              if ($encontrado == 1) {
                $articulo->llenarCampos($idArticulo);
                //$modulo->setNombre($nombreModif);
              $articulo->setId($idArticulo);
              $articulo->setNombre($nombre);
              $articulo->setDescripcion($descripcion);
              $articulo->setRuta_imagen($imagen);
              $articulo->setCategoria($idCategoria);
              
              $modificados = $articulo->ActualizarArticulo();
                
                if ($modificados > 0) {
                  echo 1;
                } else {
                  echo 0;
                }
              }else{
                echo 2;	
              }
        break;
        
        case"Eliminar_Articulos":
            //TODO Completar funcion
            break;

        //CRUD USUARIOS

        case "MostrarUsuarios":
            $usuario = new Usuario();
           // $usuarios = $usuario ->listarTodosDb();
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
                    "3" => '<img src="'. $Ruta.'" width="70px" heigth="70px"/>',                   
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