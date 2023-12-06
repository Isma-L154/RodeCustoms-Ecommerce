<?php   
session_start();  
require_once '../Models/Articulo.php';
require_once '../Models/Carrito.php';

switch ($_GET["op"]) {

    case 'AgregarCarrito':
       
            if (isset($_POST['id'])) {
                $idProductoEspecifico = $_POST['id'];
                $TallaSelec = isset($_POST['talla']) ? $_POST['talla'] : 'S';
                $CantidadSelec = isset($_POST['cantidad']) ? $_POST['cantidad'] : 1;
            
                $Carrito = new Carrito();
                $articulo = new Articulo();           
                $articulo_espec = $articulo ->MostrarArticulo_Especifico($idProductoEspecifico);
    
                if ($articulo_espec !== null && $articulo_espec !== false) {
                    
                    $precio = $articulo_espec['precio'];
                    $Total_Linea = $CantidadSelec * $precio;
    
                    $Carrito -> setidArticulo($idProductoEspecifico);
                    $Carrito -> setTalla($TallaSelec);
                    $Carrito -> setCantidad($CantidadSelec);
                    $Carrito -> setTotal_Linea($Total_Linea);
                    $Carrito -> guardarEnCarritoDB();
                    
                    echo 1; //Se ingreso
                }else {
                    echo 2; //No se ingreso
                }
            }else{
                echo 2;

            }
        
        
        break;
       
        case 'ListarCarrito':
                $Articulo = new Articulo();
                $Cart = new Carrito();
                $Carr_Art = $Cart->listarTodosCarrito();
                $datos = array();

                foreach ($Carr_Art as $reg) {
                    $art = $Articulo->MostrarArticulo_Especifico($reg->getidArticulo());
                    echo '
                    <div class="row mb-4 d-flex justify-content-between align-items-center">
                        <div class="col-md-2 col-lg-2 col-xl-2">
                        <img src="' . $art['ruta_imagen']. '" alt="Product" class="img-responsive" width="85px" heigth="85px" />
                        </div>
                        <div class="col-md-3 col-lg-3 col-xl-2">
                            <h6 class="text-muted">'.$art['nombre'].'</h6>
                        </div>
                        <div class="col-md-3 col-lg-2 col-xl-2">
                            <h6 class="text-muted ">'.$reg->getTalla().'</h6>
                        </div>
                        <div class="col-md-3 col-lg-2 col-xl-2">
                            <h6 class="text-muted">'.$art['precio'].'₡</h6>
                        </div>
                        <div class="col-md-3 col-lg-2 col-xl-2">
                            <h6 class="text-muted">'.$reg->getCantidad().'</h6>
                        </div>
                        <div class="col-md-3 col-lg-2 col-xl-2">
                            <h6 class="text-muted">'.$reg->getTotal_Linea().'₡</h6>
                        </div>
                        
                    </div>
                      <hr class="my-4">
                    ';
                    
                }
                break;
        
            case 'ListarResumen':
            $Cart = new Carrito();
            $Carr_Art = $Cart->listarTodosCarrito();
            $Cant_Total = 0;
            $Cant_Items = 0;

            foreach($Carr_Art as $reg){
                $Cant_Items = 0;
                $Cant_Items += $reg -> getidLinea();
           
            $Cant_Total += $reg ->getTotal_Linea();
            
            }   
            if ($Cant_Items == null) {
                $Cant_Items = 0;
            }
            echo '<div class="d-flex justify-content-between mb-4">
            <h5 class="text-uppercase">Items</h5>
            <span style="font-size: 24px;">'.$Cant_Items.'</span>
            </div>

          <hr class="my-4">

          <div class="d-flex justify-content-between mb-5">
            <h5 class="text-uppercase">Total</h5>
            <span style="font-size: 24px;">'.$Cant_Total.'₡</span>          </div>';
            break;
        
            
        }



?>