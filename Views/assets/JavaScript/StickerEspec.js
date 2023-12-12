var urlParams = new URLSearchParams(window.location.search);
var idSticker = urlParams.get('idSticker');

//Mostrar el especifico
function listarStickerEspec(idSticker) {
    $.ajax({
        url: '../Controllers/StickerController.php?op=StickerEspecifico&idSticker=' + idSticker,
        type: 'GET',
        dataType: 'html',
        success: function (data) {
            // Insertar el HTML generado en el contenedor deseado
            $('#StickerEspec').html(data);
        },
        error: function (e) {
            console.log(e.responseText);
        }
    });
}
$(function () {
    listarStickerEspec(idSticker);
});

//Para añadir ese producto al carrito

$(document).ready(function () {
    $(document).on('click', '#btnCarritoSticker', function (event) {
        $("#btnCarritoSticker").prop("disabled", true);

        //Variables especificas que hay que añadir para poder añadir en la funcion de carrito
        var Tamanio = $("#Tamanio_Sticker").text();
        var Cantidad = $("#Cantidad_Sticker").text();
        var Precio = $('#Precio_Sticker').text().split(' ')[0]; 

        $.ajax({
            url: '../Controllers/CarritoController.php?op=AgregarCarritoSticker',
            type: 'POST',
            data: {
                idSticker: idSticker,
                Tamanio: Tamanio,
                Cantidad: Cantidad,
                Precio: Precio
            },
            success: function (response) {
                switch (response) {
                    case '1':
                        toastr.success('Producto Añadido!')
                        bootbox.confirm({
                            message: "¿Quieres realizar otro o ir al carrito?",
                            buttons: {
                                confirm: {
                                    label: 'Ir al carrito',
                                    className: 'btn-success'
                                },
                                cancel: {
                                    label: 'Realizar Otro',
                                    className: 'btn-secondary'
                                }
                            },
                            callback: function (result) {
                                if (result) {
                                    window.location.href = '../Views/Carrito.php';
                                } else {

                                    window.location.href = '../Views/Stickers.php';
                                }
                            }
                        }); 
                        break;
                    
                        case '2':
                        toastr.error('No se pudo añadir el Producto')
                        break;
                    default:
                        console.log(response);
                        break;
                }
            },

        });
    });
});

function StickerRealizado(idSticker) {
      if (result) {  
        $.ajax(
          '../Controllers/AdminController.php?op=StickerCompleto',
          { idSticker: idSticker },
          function (data) {
            switch (data) {
              case '1':
                toastr.success('Sigue Asi!');
                reportSticker.api().ajax.reload();
                break;
  
              case '0':
                toastr.error(
                  'Error'
                );
                break;
  
              default:
                console.log(data);
                break;
            }
          }
        );
      }
     
  }

  $(document).ready(function() {
    $(document).on('click', '#Regresar', function (event) { 
        if (idSticker) {
            $.post({
                url:  '../Controllers/StickerController.php?op=StickerIncorrecta',
                type: 'GET',
                data: { idSticker: idSticker },
                success: function(response) {
                    console.log(response);
                    if (response == "1") {
                        window.location.href = './Stickers.php';
                    } else {
                        alert("Error al eliminar el sticker.");
                    }
                },
                error: function(xhr, status, error) {
                    alert("Ocurrió un error: " + error);
                }
            });
        } else {
            alert("No se encontró el ID del sticker.");
        }
    });
});
