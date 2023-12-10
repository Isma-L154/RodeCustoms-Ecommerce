<?php

require_once '../Models/Articulo.php';
require_once  '../Models/Usuario.php';
require_once '../Models/Reports.php';
require_once '../Models/Articulo_Pers.php';

switch ($_GET["op"]) {
        //CRUD ARTICULOS


    case "MostrarArticulos":
        //BUG Arreglar el Bug que hay en el campo 3, que es la imagen, ya que al modificar se queda el texto del src
        $articulo = new Articulo();
        $articulos = $articulo->listarTodosDb();
        $datos = array();

        foreach ($articulos as $reg) {
            if ($reg->getRuta_imagen() != '' && $reg->getRuta_imagen() != null) {

                $Ruta = $reg->getRuta_imagen();
            } else {
                $Ruta = '../Views/assets/Img/' . 'Logo2.png';
            }
            $datos[] = array(
                "0" => $reg->getId(),
                "1" => $reg->getNombre(),
                "2" => $reg->getDescripcion(),
                "3" => '<img src="' . $Ruta . '" width="70px" heigth="70px"/>',
                "4" => $reg->getPrecio(),
                "5" => $reg->getCategoria(),
                //Campo 6 para completar las opciones del CRUD en articulos
                "6" => '<button class="btn btn-warning" id="modificarArticulo">Modificar</button> ' .
                    '<button class="btn btn-danger" onclick="Eliminar(\'' . $reg->getId() . '\')">Eliminar</button>'
            );
        }
        $Resultado = array(
            "sEcho" => 1, ##informacion para datatables
            "iTotalRecords" => count($datos), ## total de registros al datatable
            "iTotalDisplayRecords" => count($datos), ## enviamos el total de registros a visualizar
            "aaData" => $datos
        );
        echo json_encode($Resultado);
        break;

    case "Agregar_Articulos":
        //FIXME No inserta la imagen de forma correcta
        //Lo parametros que se van a recibir por POST del form
        $nombre = isset($_POST["nombreArt"]) ? trim($_POST["nombreArt"]) : "";
        $descripcion = isset($_POST["descripcion"]) ? trim($_POST["descripcion"]) : "";
        $imagen = isset($_POST["ruta_imagen"]) ? trim($_POST["ruta_imagen"]) : "";
        $precio = isset($_POST["precio"]) ? trim($_POST["precio"]) : "";
        $Categoria = isset($_POST["idCategoria"]) ? trim($_POST["idCategoria"]) : 3;
        $Tipo = 1;

        $articulo = new Articulo();
        $articulo->setNombre($nombre);
        $encontrado = $articulo->verificarExistenciaDb();

        if ($encontrado == false) {
            $articulo->setNombre($nombre);
            $articulo->setDescripcion($descripcion);
            $articulo->setRuta_imagen($imagen);
            $articulo->setPrecio($precio);
            $articulo->setCategoria($Categoria);
            $articulo->setidTipoProducto($Tipo);
            $articulo->guardarEnDb();

            if ($articulo->verificarExistenciaDb()) {
                echo 1; //usuario registrado y envio de correo exitos
            } else {
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
        } else {
            echo 2;
        }
        break;

    case "Eliminar_Articulos":

        $ul = new Articulo();
        $ul->setId(trim($_POST['idArticulo']));
        $rspta = $ul->EliminarArticulo();
        echo $rspta;
        break;



        //CRUD USUARIOS

    case "MostrarUsuarios":
        $usuario = new Usuario();
        $usuarios = $usuario->listarTodosUsuarios();
        $datos = array();

        foreach ($usuarios as $reg) {
            $datos[] = array(
                "0" => $reg->getIdUsuario(),
                "1" => $reg->getNombre(),
                "2" => $reg->getApellidos(),
                "3" => $reg->getEmail(),
                "4" => $reg ->getClave(),
                "5" => $reg->getRol(),
                "6" => '<button class="btn btn-warning" id="modificarUsuario">Modificar</button> ' .
                    '<button class="btn btn-danger" onclick="Eliminar(\'' . $reg->getIdUsuario() . '\')">Eliminar</button>'
            );
        }
        $Resultado = array(
            "sEcho" => 1, 
            "iTotalRecords" => count($datos), 
            "iTotalDisplayRecords" => count($datos), 
            "aaData" => $datos
        );
        echo json_encode($Resultado);
        break;

    case 'Aregar_Usuarios':
        $nombre = isset($_POST["nombreUsu"]) ? trim($_POST["nombreUsu"]) : "";
        $apellidos = isset($_POST["ApellidosUsu"]) ? trim($_POST["ApellidosUsu"]) : "";
        $email = isset($_POST["EmailUsu"]) ? trim($_POST["EmailUsu"]) : "";
        $password = isset($_POST["ClaveUsu"]) ? trim($_POST["ClaveUsu"]) : "";
        $Rol = isset($_POST["idRol"]) ? trim($_POST["idRol"]) : 1;

        $clavehash = password_hash($password, PASSWORD_BCRYPT); ;
        $usuario = new Usuario();
        $usuario->setEmail($email);
        $encontrado = $usuario->verificarExistenciaDb();

        if ($encontrado == false) {
            $usuario->setNombre($nombre);
            $usuario->setApellidos($apellidos);
            $usuario->setEmail($email);
            $usuario->setClave($clavehash);
            $usuario->setRol($Rol);
            $usuario->guardarEnDb();

            if ($usuario->verificarExistenciaDb()) {
                echo 1; //usuario registrado y envio de correo exitos
            } else {
                echo 3; //Fallo al realizar el registro
            }
        } else {
            echo 2; //el usuario ya existe
        }
        break;

        break;

    case 'Editar_Usuarios':
        $idUsuario = isset($_POST["UsId"]) ? trim($_POST["UsId"]) : "";
        $nombreUsuario = isset($_POST["UsNombre"]) ? trim($_POST["UsNombre"]) : "";
        $Apellidos = isset($_POST["UsApellidos"]) ? trim($_POST["UsApellidos"]) : "";
        $Email = isset($_POST["UsEmail"]) ? trim($_POST["UsEmail"]) : "";
        $Clave = isset($_POST["UsClave"]) ? trim($_POST["UsClave"]) : "";
        $Rol = isset($_POST["UsRol"]) ? trim($_POST["UsRol"]) : 2;

        $usuario = new Usuario();
        $usuario->setEmail($Email);
        $encontrado = $usuario->verificarExistenciaDb();

        if ($encontrado == true) {
            $usuario->setIdUsuario($idUsuario);
            $usuario->setNombre($nombreUsuario);
            $usuario->setApellidos($Apellidos);
            $usuario->setEmail($Email);
            $usuario->setClave($Clave);
            $usuario->setRol($Rol);

            $modificados = $usuario->ActualizarUsuario();

            if ($modificados > 0) {
                echo 1; //Usuario modificado
            } else {
                echo 0; //Usuario no modificado
            }
        } else {
            echo 2; //No se encontro el usuario
        }

        break;

    case 'Eliminar_Usuarios':
        $ul = new Usuario();
        $ul->setIdUsuario(trim($_POST['idUsuario']));
        $rspta = $ul->EliminarUsuario();
        echo $rspta;

        break;

        //REPORTES

        case 'MostrarReports':
        $Report = new Reports();
        $Art_pers = new Articulo_Pers();
        $Reports = $Report ->listarTodosReportes();
        $datos = array();

        foreach ($Reports as $reg) {
            
            $Personalizados = $Art_pers->MostrarArticulo_Especifico($reg->getidArtPersonalizado());
            if ($Personalizados != null) {
                $Prenda = $Personalizados['ruta_imagen'];
            }

            if ($reg->getRutaImagen() != '' && $reg->getRutaImagen() != null) {
                $Ruta = '../Views/' . $reg->getRutaImagen();
            } else {
                $Ruta = '../Views/assets/Img/' . 'Logo2.png';
            }
            

            $datos[] = array(
                "0" => $reg->getID(),
                "1" => '<img src="' . $Prenda . '" width="70px" heigth="70px"/>',
                "2" => '<div class="color-box" data-color="' . $reg->getColor() . '" style="background-color: ' . $reg->getColor() . '; width: 100%px; height: 40px; border: 1px solid #000;"></div>',
                "3" => $reg-> getTalla(),
                "4" => $reg->getCantidad(),
                "5" => '<img src="' . $Ruta . '" width="70px" heigth="70px"/>',
                "6" => '<button class="btn btn-success" onclick="Realizado(\'' . $reg->getID() . '\')">Realizado <i class="fa-solid fa-check"></i></button>'
            );
        }
        $Resultado = array(
            "sEcho" => 1, 
            "iTotalRecords" => count($datos), 
            "iTotalDisplayRecords" => count($datos), 
            "aaData" => $datos
        );
        echo json_encode($Resultado);
            break;


        case 'InsertarReport':
            if (isset($_POST['id'])) {
                
                $idProductoEspecifico = $_POST['id'];
                $TallaSelec = isset($_POST['talla']) ? $_POST['talla'] : 'S';
                $CantidadSelec = isset($_POST['cantidad']) ? $_POST['cantidad'] : 1;
                $ColorSelec = isset($_POST['color']) ? $_POST['color'] : 'Blanco';

                $nombre_archivo = $_FILES['archivo1']['name'];
                $tipo_archivo = $_FILES['archivo1']['type'];
                $tamano_archivo = $_FILES['archivo1']['size'];
                $nombreArchivoParaBD = 'assets/Manejo_Archivos_Ropa/' . $nombre_archivo;

                if (!((strpos($tipo_archivo, "png")) && ($tamano_archivo < 1000000))) {
                    echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .png<br><li>se permiten archivos de 300 Kb máximo.</td></tr></table>";
             }else{
                 $rutafinal = 'C:\xampp\htdocs\Proyecto_AmbienteWeb\Views\assets\Manejo_Archivos_Ropa\/'.$nombre_archivo;
                    if (move_uploaded_file($_FILES['archivo1']['tmp_name'], $rutafinal)){
                    }else{
                           echo "<script>
                           toastr.error('Tu archivo no se pudo reconocer');
                           </script>";
                    }
             }

                $Reports = new Reports();
                $articulo_pers = new Articulo_Pers();           
                $articulo_espec = $articulo_pers ->MostrarArticulo_Especifico($idProductoEspecifico);
                
                if ($articulo_espec !== null && $articulo_espec !== false) {
                    $Reports -> setidArtPersonalizado($idProductoEspecifico);
                    $Reports -> setColor($ColorSelec);
                    $Reports -> setTalla($TallaSelec);
                    $Reports -> setCantidad($CantidadSelec);
                    $Reports -> setRutaImagen($nombreArchivoParaBD);
                    
                    $Reports -> guardarReporteDB();
                    
                    echo 1; //Se ingreso
                }else {
                    echo 2; //No se ingreso
                }
            }else{
                echo 2;

            }             
            
            break;


            case 'ReporteCompleto':
                $ul = new Reports();
                $ul->setID(trim($_POST['ID']));
                $rspta = $ul->EliminarReporte();
                
                if ($rspta) {
                    $archivo = '../Views/' . $ul -> getRutaImagen();
                    unlink($archivo);
                }

                echo $rspta;
                break;

}
