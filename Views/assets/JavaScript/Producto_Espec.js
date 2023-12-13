

var urlParams = new URLSearchParams(window.location.search);
var idProducto = urlParams.get('id');

function listarArticuloEspec(idProducto) {

    $.ajax({
        url: '../Controllers/CatalogoController.php?op=Producto_Especifico&id=' + idProducto,
        type: 'GET',
        dataType: 'html',
        success: function (data) {
            // Insertar el HTML generado en el contenedor deseado
            $('#ArtEspec').html(data);
        },
        error: function (e) {
            console.log(e.responseText);
        }
    });
}
$(function () {
    listarArticuloEspec(idProducto);
});

$(document).ready(function () {
    $(document).on('click', '#btnAnadirCarrito', function (event) {
        $("#btnAnadirCarrito").prop("disabled", true);

        //Variables especificas que hay que añadir para poder añadir en la funcion de carrito
        var TallaSelec = $("#talla").val();
        var cantidadSeleccionada = $("#cantidad").val();

        $.ajax({
            url: '../Controllers/CarritoController.php?op=AgregarCarrito',
            type: 'POST',
            data: {
                id: idProducto,
                talla: TallaSelec,
                cantidad: cantidadSeleccionada
            },
            success: function (response) {
                switch (response) {
                    case '1':
                        toastr.success('Producto Añadido!')
                        bootbox.confirm({
                            message: "¿Quieres seguir comprando o ir al carrito?",
                            buttons: {
                                confirm: {
                                    label: 'Ir al carrito',
                                    className: 'btn-success'
                                },
                                cancel: {
                                    label: 'Seguir comprando',
                                    className: 'btn-secondary'
                                }
                            },
                            callback: function (result) {
                                if (result) {
                                    window.location.href = '../Views/Carrito.php';
                                } else {
                                    window.location.href = '../Views/Catalogo.php';
                                }
                            }
                        }); 
                        break;
                    
                        case '2':
                        toastr.error('No se pudo añadir el Producto')
                        break;
                    default:
                        toastr.error("Error");
                        break;
                }
            },

        });
    });


});



