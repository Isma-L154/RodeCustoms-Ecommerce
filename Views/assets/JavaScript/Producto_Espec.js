

var urlParams = new URLSearchParams(window.location.search);
var idProducto = urlParams.get('id');

function listarArticuloEspec(idProducto) {
    console.log('ID del producto: ' + idProducto);

    $.ajax({
        url: '../Controllers/CatalogoController.php?op=Producto_Especifico&id='+idProducto,
        type: 'GET',
        dataType: 'html',
        success: function(data) {
            // Insertar el HTML generado en el contenedor deseado
            $('#ArtEspec').html(data);
        },
        error: function(e) {
            console.log(e.responseText);
        }
    });
}




$(function(){
    listarArticuloEspec(idProducto);
  });
  