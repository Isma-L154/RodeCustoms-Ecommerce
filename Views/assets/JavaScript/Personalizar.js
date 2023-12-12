

var urlParams = new URLSearchParams(window.location.search);
var idPersonalize = urlParams.get('id');

function listarArticuloEspec(idPersonalize) {

    $.ajax({
        url: '../Controllers/PersonalizableController.php?op=Producto_Especifico_Pers&id=' + idPersonalize,
        type: 'GET',
        dataType: 'html',
        success: function (data) {
            // Insertar el HTML generado en el contenedor deseado
            $('#Personalizar').html(data);
        },
        error: function (e) {
            console.log(e.responseText);
        }
    });
}
$(function () {
    listarArticuloEspec(idPersonalize);
});



$(document).ready(function () {
    $(document).on('click', '#btnAnadirCarritoPers', function (event) {
        $("#btnAnadirCarritoPers").prop("disabled", true);

        //Variables especificas que hay que añadir para poder añadir en la funcion de carrito
        var TallaSelec = $("#talla").val();
        var cantidadSeleccionada = $("#cantidad").val();

        $.ajax({
            url: '../Controllers/CarritoController.php?op=AgregarCarritoPers',
            type: 'POST',
            data: {
                id: idPersonalize,
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
                                    window.location.href = '../Views/Cata_Personalizable.php';
                                }
                            }
                        }); 
                        break;
                    
                        case '2':
                        toastr.error('No se pudo añadir el Producto')
                        break;
                    default:
                        toastr.error(response)
                        break;
                }
            },

        });
    });


});





