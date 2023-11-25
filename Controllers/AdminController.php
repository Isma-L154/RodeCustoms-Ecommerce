<?php
require_once '../Models/Articulo.php';
require_once  '../Models/Usuario.php';



switch ($_GET["op"]) {
//CRUD ARTICULOS


    case "MostrarArticulos":
        //BUG Arreglar el Bug que hay en el campo 3, que es la imagen, ya que al modificar se queda el texto del src
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
                    "5"=> $reg->getCategoria(),
                    //Campo 6 para completar las opciones del CRUD en articulos
                    "6"=> '<button class="btn btn-warning" id="modificarArticulo">Modificar</button> '.
                    '<button class="btn btn-danger" id="EliminarArticulo" onclick="Eliminar(\''.$reg->getId().'\')">Eliminar</button>'
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
        $nombre = isset($_POST["nombreArt"]) ? trim($_POST["nombreArt"]) : "";
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
            
            if($articulo->verificarExistenciaDb()){
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
              $idArticulo = isset($_POST["EId"]) ? trim($_POST["EId"]) : "";
              $nombre = isset($_POST["Enombre"]) ? trim($_POST["Enombre"]) : "";
              $descripcion = isset($_POST["Edescripcion"]) ? trim($_POST["Edescripcion"]) : "";
              $imagen = isset($_POST["Eruta_imagen"]) ? trim($_POST["Eruta_imagen"]) : "";
              $precio = isset($_POST["Eprecio"]) ? trim($_POST["Eprecio"]) : "";
              $idCategoria = isset($_POST["Ecategoria"]) ? trim($_POST["Ecategoria"]) : "";
              
              $articulo = new Articulo();
              $articulo->setId($idArticulo);
              $encontrado = $articulo->verificarExistenciaDb();
              
              if ($encontrado = true) {
              $articulo->setId($idArticulo);
              $articulo->setNombre($nombre);
              $articulo->setDescripcion($descripcion);
              $articulo->setRuta_imagen($imagen);
              $articulo->setPrecio($precio);
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
            
            $idArticulo = isset($_POST["EId"]) ? trim($_POST["EId"]) : "";

            $articulo = new Articulo();
            $articulo->setId($idArticulo);
            
            $encontrado = $articulo->verificarExistenciaDb();
            
            if ($encontrado) {
                $eliminados = $articulo->EliminarArticulo();
            
                if ($eliminados > 0) {
                    echo 1; // Éxito al eliminar
                } else {
                    echo 0; // Error al eliminar
                }
            } else {
                echo 2; // Artículo no encontrado
            }
            
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