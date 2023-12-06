<?php

require_once '../Models/Articulo.php';

switch ($_GET["op"]) {

    case 'listar_articulos':
        $articulo = new Articulo();
        $articulos = $articulo->listarTodosDb();
        $datos = array();

        foreach ($articulos as $reg) {
            if ($reg->getRuta_imagen() != '' && $reg->getRuta_imagen() != null) {

                $Ruta = $reg->getRuta_imagen();
            } else {
                $Ruta = '../Views/assets/Img/' . 'Logo2.png';
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
                        </div>
                                               
                        <div class="card-footer">
                            <div class="wcf-left"><span class="price">' . $reg->getPrecio() . 'CRC</span></div>
                            <div class="wcf-right"><a href="./Producto_Espec.php?id=' . $reg->getId() . '" class="buy-btn" id="btnVer" ><i class="fa-regular fa-eye"></i></div></a>
                        </div>
                    </div>
                </div>
            </div>';
        }
        break;


    case 'Producto_Especifico':
        if (isset($_GET['id'])) {
            $idProductoEspecifico = $_GET['id'];
            $articulo = new Articulo();
            $articulo_espec = $articulo->MostrarArticulo_Especifico($idProductoEspecifico);

            if ($articulo_espec !== null && $articulo_espec !== false) {
                if (isset($articulo_espec['ruta_imagen']) && $articulo_espec['ruta_imagen'] != '' && $articulo_espec['ruta_imagen'] != null) {
                    $Ruta = $articulo_espec['ruta_imagen'];
                } else {
                    $Ruta = '../Views/assets/Img/' . 'Logo2.png';
                }

                echo '<div class="container d-flex justify-content-center" id="ArticuloEspecifico">
                        <figure class="card card-product-grid card-lg">
                            <a class="img-wrap" data-abc="true">
                                <img src="' . $Ruta . '" alt="Product" class="img-responsive" />
                            </a>
                            <figcaption class="info-wrap">
                                <div class="row">
                                    <!-- Nombre del producto y Categoría -->
                                    <div class="col-md-9 col-xs-9">
                                        <a  class="title" data-abc="true">' . $articulo_espec['nombre'] . '</a>
                                        <span class="rated">';
                // Estructura condicional para mostrar el nombre de la categoría
                if ($articulo_espec['idCategoria'] == 1) {
                    echo 'Sudaderas';
                } elseif ($articulo_espec['idCategoria'] == 2) {
                    echo 'Camisetas';
                } else {
                    echo 'Varios'; // Puedes agregar más condiciones según sea necesario
                }
                echo  '</span>
                                   </div>
                                    <div class="col-md-3 col-xs-3">
                                        <div class="rating text-right">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <span class="rated">Rated 4.0/5</span>
                                        </div>
                                    </div>
                                </div>
                            </figcaption>
                            <div class="bottom-wrap-payment">
                                <figcaption class="info-wrap">
                                    <div class="row">
                                        <!-- Precio -->
                                        <div class="col-md-9 col-xs-9">
                                            <a  class="title" data-abc="true">' . $articulo_espec['precio'] . ' CRC</a>
                                        </div>
                                        <div class="col-md-3 col-xs-3">
                                            <!-- Tallas, botones para escoger la talla (Select) -->
                                            <div class="rating text-right">
                                            Talla:
                                            <select name="talla" id="talla">
                                                <option value="S">S</option>
                                                <option value="M">M</option>
                                                <option value="L">L</option>
                                                <option value="XL">XL</option>
                                            </select>
                                            Cantidad:
                                                <input type="number" name="cantidad" id="cantidad" min="1" value="1">
                                            </div>

                                        </div>
                                    </div>
                                </figcaption>
                                <div class="bottom-wrap">
                            <div class="price-wrap">
                                    <a href="./Catalogo.php" class="btn float-left mr-auto" > Cancelar </a>
                                </div>
                            </div>   
                            </div>
                        </figure>
                    </div>';
            } else {
                echo
                '<script>
                toastr.error("Error: Producto no encontrado");
                </script>';
            }
        }
        break;
}
