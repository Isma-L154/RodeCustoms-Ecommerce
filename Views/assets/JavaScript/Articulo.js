
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
$(function(){
  listarTodosArticulos();
});
