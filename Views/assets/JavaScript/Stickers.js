
var urlParams = new URLSearchParams(window.location.search);
var idSticker = urlParams.get('idSticker');

//Esta es la funcion que verifica el archivo y verifica que el usuario haya selecionado una cantidad par que no quede en 0
function verificarCondiciones() {
    var archivoSeleccionado = document.getElementById("archivoSticker").files.length > 0;
    var cantidadSeleccionada = document.getElementById("cantidad").value !== "";

    var tipoArchivoValido = true;
    var tamanoArchivoValido = true;

    if (archivoSeleccionado) {
        var archivo = document.getElementById("archivoSticker").files[0];
        var tipoArchivo = archivo.type;
        var tamanoArchivo = archivo.size;

        tipoArchivoValido = tipoArchivo === "image/png";
        tamanoArchivoValido = tamanoArchivo <= 1048576;

        if (!tipoArchivoValido) {
            toastr.error("Por favor, selecciona un archivo PNG.");
        } else if (!tamanoArchivoValido) {
            toastr.error("El archivo es demasiado grande. El tamaño debe ser menor a 1 MB.");
        } 
    }

    document.getElementById("btnAnadirSticker").disabled = !(archivoSeleccionado && cantidadSeleccionada && tipoArchivoValido && tamanoArchivoValido);
}

document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("archivoSticker").addEventListener("change", verificarCondiciones);
    document.getElementById("cantidad").addEventListener("change", verificarCondiciones);
});


//Para ir cambiando el campo del precio segun la cantidad que elija el usuario

document.getElementById('cantidad').addEventListener('change', function() {
    var precioBase = 5000; // Precio base para 10 unidades
    var cantidad = parseInt(this.value);
    var precioTotal = precioBase * (cantidad / 10); 
    
    document.getElementById('Precio').innerText = precioTotal + ' CRC';
});



//Añadir Sticekrs a la respectiva tabla que despues usamos en los Reportes
$(document).ready(function () {
    $(document).on('click', '#btnAnadirSticker', function (event) {
       
        var tamanioSelec = $("#tamanio").val();
        var cantidadSeleccionada = $("#cantidad").val();
        var precio = $('#Precio').text().split(' ')[0]; 
        var archivo = document.getElementById('archivoSticker').files[0];

        var formData = new FormData();
        formData.append('tamanio', tamanioSelec);
        formData.append('cantidad', cantidadSeleccionada);
        formData.append('Precio', precio);
        formData.append('archivoSticker', archivo);

        $.ajax({
            url: '../Controllers/StickerController.php?op=AgregarSticker',
            type: 'POST',
            processData: false, 
            contentType: false, 
            data: formData,
            success: function(response) {                
                if (!isNaN(response)) { 
                    var idSticker = response;
                    window.location.href = './Sticker_Espec.php?idSticker=' + idSticker;
                } else {
                    console.log('Error:' + response);
                }
                
            },
            error: function () {
                toastr.error('Error al procesar la solicitud');
            }
        });
    });
});

