/*
function listarTodosArticulos(){
    tabla = $('#tblcard').dataTable({    
      aProcessing: true, //actiavmos el procesamiento de datatables
      ajax: {
          //URL del controlador
          url: '../Controllers/CatalogoController.php?op=listar_articulos',
          type: 'get',
          dataType: 'json',
          
          error: function (e) {
            console.log(e.responseText);
          },
          bDestroy: true,
          iDisplayLength: 1,
        },
    });  
}
*/

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

$(function(){
  listarTodosArticulos();
});

$('.buy').click(function(){
  $('.bottom').addClass("clicked");
});

$('.remove').click(function(){
  $('.bottom').removeClass("clicked");
});