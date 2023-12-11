<?php

require_once '../Models/Stickers.php';


switch ($_GET["op"]) {

    case 'AgregarSticker':

        $nombre_archivo = $_FILES['archivoSticker']['name'];
        $tipo_archivo = $_FILES['archivoSticker']['type'];
        $tamano_archivo = $_FILES['archivoSticker']['size'];
        $nombreArchivoParaBD = 'assets/Manejo_Archivos/Stickers/' . $nombre_archivo;

        $TamanioSelec = isset($_POST['tamanio']) ? $_POST['tamanio'] : '4x4 cm';
        $CantidadSelec = isset($_POST['cantidad']) ? $_POST['cantidad'] : 10;
        $Precio = isset($_POST['Precio']) ? $_POST['Precio'] : 5000;
        if($Precio == 0){
            $Precio = 5000;
        }
        $Tipo = 3;
        
        if (!((strpos($tipo_archivo, "png")) && ($tamano_archivo < 1000000))) {
            echo "La extensión o el tamaño de los archivos no es correcta.";
        } else {
            $rutafinal = 'C:\xampp\htdocs\Proyecto_AmbienteWeb\Views\assets\Manejo_Archivos\Stickers\/' . $nombre_archivo;
            if (move_uploaded_file($_FILES['archivoSticker']['tmp_name'], $rutafinal)) {
            } else {
                echo "<script>
                       toastr.error('Tu archivo no se pudo reconocer');
                       </script>";
            }
        }

        $Sticker = new Stickers();
        
            $Sticker->setRutaLogo($nombreArchivoParaBD);
            $Sticker->setTamanio($TamanioSelec);
            $Sticker->setPrecio($Precio);
            $Sticker->setCantidad($CantidadSelec);
            $Sticker->setidTipoProducto($Tipo);
            $idDevuelta = $Sticker->guardarStickerDB();
            if ($idDevuelta) {
                echo $idDevuelta;
            }else{
                echo "Error";
            }
           
        
        break;

        case 'StickerEspecifico':
            if (isset($_GET['idSticker'])) {
                $idSticker = $_GET['idSticker'];
                $Sticker = new Stickers();
                $Sticker_espec = $Sticker->MostrarSticker_Especifico($idSticker);

                if ($Sticker_espec['RutaLogo'] != '' && $Sticker_espec['RutaLogo'] != null) {
                    $Ruta = '../Views/' . $Sticker_espec['RutaLogo'];
                } else {
                    $Ruta = '../Views/assets/Img/' . 'Logo2.png';
                }

                echo '<div class="container d-flex justify-content-center" id="StickerEspecifico">
           <figure class="card card-product-grid card-lg">
               <a class="img-wrap" data-abc="true">
                   <img src="'.$Ruta.'" alt="Sticker" class="img-responsive" />
               </a>
               <hr class="my-4">
               <figcaption class="info-wrap">
                   <div class="row">
                       <div style="text-align: center; font-size: 20px; font-weight: bold;" >       
                       Precio:  <span id="Precio_Sticker">'.$Sticker_espec['Precio'].'</span> 
                       </div>
                   </div>
               </figcaption>
               <div class="bottom-wrap-payment">
                   <figcaption class="info-wrap">
                       <div class="row">
                           <!-- Precio -->
                           <div class="col-md-9 col-xs-9" style="font-size: 20px; font-weight: bold;" >
                           Tamaño: <span id="Tamanio_Sticker">'.$Sticker_espec['Tamanio'].'</span>
                           </div>
                           <div class="col-md-3 col-xs-3">
                               
                               <div class="rating text-right" style="font-size: 20px; font-weight: bold;">
                               Cantidad:   <span id="Cantidad_Sticker">'.$Sticker_espec['Cantidad'].'</span>
                               </div>

                           </div>
                       </div>
                   </figcaption>
                   <div class="bottom-wrap">
                       <div class="price-wrap row">
                           <button type="button" class="btn btn-primary float-right" id="btnCarritoSticker">Confirmar</button>
                           <button type="button" class="btn" id="Regresar">Cancelar</button>
                       </div>
                   </div>
               </div>
           </figure>
       </div>';
            }else{
                echo
                '<script>
                    toastr.error("Error: No encontrado");
                    </script>';
            }

           
            break;
}