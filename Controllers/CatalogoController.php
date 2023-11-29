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
                echo '<div class="col-md-3">
                <div class="wsk-cp-product">
                    <div class="wsk-cp-img">
                        <img src="' . $Ruta . '" alt="Product" class="img-responsive" />
                    </div>
                    <div class="wsk-cp-text">
                        <div class="category">
                            <span>';
                            
            // Estructura condicional para mostrar el nombre de la categoría
            if ($reg->getCategoria() == 1) {
                echo 'Sudaderas';
            } elseif ($reg->getCategoria() == 2) {
                echo 'Camisetas';
            } else {
                echo 'Varios'; // Puedes agregar más condiciones según sea necesario
            }
            
            echo '</span>
                        </div>
                        <div class="title-product">
                            <h3>' . $reg->getNombre() . '</h3>
                        </div>
                        <div class="description-prod">
                            <p>' . $reg->getDescripcion() . '</p>
                            <span class="size"> S, M, L, XL </span>
                        </div>
                                               
                        <div class="card-footer">
                            <div class="wcf-left"><span class="price">' . $reg->getPrecio() . 'CRC</span></div>
                            <div class="wcf-right"><a href="./Carrito.php" class="buy-btn"><i class="fa-solid fa-cart-shopping"></i></div></a>
                        </div>
                    </div>
                </div>
            </div>';
            
            }
        break;
    

    case 'Filtro_Tipo':
        $articulo = new Articulo();
        $Tipo_Filtro = isset($_POST["tipo"]) ? trim($_POST["tipo"]) : "";
        $Tipo_Filtro = $articulo ->FiltrarPorCategoria();
        $datos = array();
        if ($Tipo_Filtro > 1) {
            foreach ($Tipo_Filtro as $filtro) {
                if  ($filtro-> getRuta_imagen() != '' && $filtro-> getRuta_imagen() != null ) {
    
                    $Ruta = $filtro->getRuta_imagen();
                    }else{
                        $Ruta = '../Views/assets/Img/'.'Logo2.png';
                    }
                    echo '<div class="col-md-3">
                    <div class="wsk-cp-product">
                        <div class="wsk-cp-img">
                            <img src="' . $Ruta . '" alt="Product" class="img-responsive" />
                        </div>
                        <div class="wsk-cp-text">
                            <div class="category">
                                <span>'. $filtro->getCategoria(). '</span>
                            </div>
                            <div class="title-product">
                                <h3>' . $filtro->getNombre() . '</h3>
                            </div>
                            <div class="description-prod">
                                <p>' . $filtro->getDescripcion() . '</p>
                                <span class="size"> S, M, L, XL </span>
                            </div>
                                                   
                            <div class="card-footer">
                                <div class="wcf-left"><span class="price">' . $filtro->getPrecio() . 'CRC</span></div>
                                <div class="wcf-right"><a href="./Carrito.php" class="buy-btn"><i class="fa-solid fa-cart-shopping"></i></div></a>
                            </div>
                        </div>
                    </div>
                </div>';
                
                }
        
        }else{
           echo '<p>No se encontraron resultados para la búsqueda.</p>';
        }
        
        break;    
    }
?>