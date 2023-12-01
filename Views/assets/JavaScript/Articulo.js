
function listarTodosArticulos() {
  // Realizar la petición AJAX para obtener los datos
    $.ajax({
        url: '../Controllers/CatalogoController.php?op=listar_articulos',
        type: 'POST',
        dataType: 'html',
        success: function(data) {
            // Insertar el HTML generado en el contenedor deseado
            $('#contenedorCards').html(data);
        },
        error: function(e) {
            console.log(e.responseText);
        }
    });

}


//FUNCIONES PRINCIPALES PARA DISEÑOS DEL CATALOGO
$(function(){
  listarTodosArticulos();
});


