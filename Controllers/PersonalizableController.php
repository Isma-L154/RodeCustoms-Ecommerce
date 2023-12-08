<?php

require_once '../Models/Articulo_Pers.php';

switch ($_GET["op"]) {

    case 'listar_articulos_persona':
        $articulo_pers = new Articulo_Pers();
        $articulos = $articulo_pers->listarTodosPersonalizables();
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
                            <div class="wcf-right"><a href="./Personalizar.php?id=' . $reg->getId() . '" class="buy-btn" id="btnVer" ><i class="fa-solid fa-pen-to-square"></i></div></a>
                        </div>
                    </div>
                </div>
            </div>';
        }
        break;

    case 'Producto_Especifico_Pers':
        if (isset($_GET['id'])) {
            $idPers = $_GET['id'];
            $articulo_pers = new Articulo_Pers();
            $articulo_espec_pers = $articulo_pers->MostrarArticulo_Especifico($idPers);

            if ($articulo_espec_pers !== null && $articulo_espec_pers !== false) {
                if (isset($articulo_espec_pers['ruta_imagen']) && $articulo_espec_pers['ruta_imagen'] != '' && $articulo_espec_pers['ruta_imagen'] != null) {
                    $Ruta = $articulo_espec_pers['ruta_imagen'];
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
                                            <a  class="title" data-abc="true">' . $articulo_espec_pers['nombre'] . '</a>
                                            <span class="rated">';
                // Estructura condicional para mostrar el nombre de la categoría
                if ($articulo_espec_pers['idCategoria'] == 1) {
                    echo 'Sudaderas';
                } elseif ($articulo_espec_pers['idCategoria'] == 2) {
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
               <a  class="title" data-abc="true">' . $articulo_espec_pers['precio'] . ' CRC</a>
               <br>
               Color:
               <input type="color" id="colorPicker" name="colorPicker" value="#000000">
           </div>

           <div class="col-md-3 col-xs-3">
               <div class="rating text-right">
                   Talla:
                   <select name="talla" id="talla">
                       <option value="S">S</option>
                       <option value="M">M</option>
                       <option value="L">L</option>
                       <option value="XL">XL</option>
                   </select>
                   <br>
                   Cantidad:
                   <input type="number" name="cantidad" id="cantidad" min="1" value="1">
               </div>
           </div>
       </div>
                    </figcaption>
                    <div class="bottom-wrap">
                    <label for="archivo1" style="background-color: goldenrod; padding: 8px 16px; border-radius: 4px; color: #fff; cursor: pointer; transition: background-color 0.3s, color 0.3s;">
                                                Subir Logo PNG <input type="file" id="archivo1" name="archivo1" style="display: none;" accept=".png"/>
                                            </label>
                    </div>
                    <div class="bottom-wrap">
                        <div class="price-wrap">
                            <a href="./Cata_Personalizable.php" class="btn float-left mr-auto" > Cancelar </a>
                        </div>
                    </div>   
                    </div>
                    </figure>
                    </div>';
                    echo '<script>
    document.getElementById("archivo1").addEventListener("change", function() {
        toastr.success("Archivo seleccionado exitosamente");
    });
</script>';
            } else {
                echo
                '<script>
                    toastr.error("Error: Producto no encontrado");
                    </script>';
            }
        }
        break;

        
}
