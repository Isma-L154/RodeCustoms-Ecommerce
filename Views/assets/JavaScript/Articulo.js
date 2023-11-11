
function listarTodosArticulos(){
    card = $('#cards').dataTable({    
      aProcessing: true, //actiavmos el procesamiento de datatables
      aServerSide: true, //paginacion y filtrado del lado del serevr
      dom: 'Bfrtip', //definimos los elementos del control de tabla
      ajax: ({
          //URL del controlador
          url: '../Controllers/CatalogoController.php?op=listar_articulos',
          type: 'get',
          dataType: 'json',
          
          error: function (e) {
            console.log(e.responseText);
          },
          bDestroy: true,
          iDisplayLength: 5,
        }),
    });  
}