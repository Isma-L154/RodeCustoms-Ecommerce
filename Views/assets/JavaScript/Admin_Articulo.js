
function listarTodosArticulos(){
    tabla = $('#tbl').dataTable({    
      aProcessing: true, //actiavmos el procesamiento de datatables
      ajax: {
          //URL del controlador
          url: '../Controllers/AdminController.php?op=MostrarArticulos',
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
//FUNCIONES PRINCIPALES
$(function(){
  listarTodosArticulos();
});

function limpiarForms() {
    $('#admin_articulos').trigger('reset');
    $('#admin_edit_art').trigger('reset');
}  



$('#add_articulo').on('submit', function (event) {
    event.preventDefault();  
    $('#btnAnadir').prop('disabled', true);
    
    var formData = new FormData($('#add_articulo')[0]);
    $.ajax({
      url: '../Controllers/AdminController.php?op=Agregar_Articulos',
      type: 'POST',
      data: formData,
      contentType: false,
      processData: false,
      
      success: function (datos) {
        switch (datos) {
          case '1':
            toastr.success(
              'Articulo Agregado Correctamente'
            );
            $('#usuario_add')[0].reset();
            break;
  
          case '2':
            toastr.error(
              'El Articulo ya existe'
            );
            break;
  
          case '3':
            toastr.error('Hubo un error al tratar de ingresar los datos.');
            break;
  
          default:
            toastr.error(datos);
            break;
        }
        $('#btnAnadir').removeAttr('disabled');
      },
    });
  });


  //Modificar los datos del Articulo
  $('#update_articulo').on('submit', function (event) {
    event.preventDefault();
    bootbox.confirm('¿Desea modificar los datos?', function (result) {
      
        if (result) {
        var formData = new FormData($('#update_articulo')[0]);
        $.ajax({
          url: '../Controllers/AdminController.php?op=Editar_Articulos',
          type: 'POST',
          data: formData,
          contentType: false,
          processData: false,
          success: function (datos) {
            //alert(datos);
            switch (datos) {
              case '0':
                toastr.error('Error: No se pudieron actualizar los datos');
                break;
              case '1':
                toastr.success('Datos actualizados correctamente');
                tabla.api().ajax.reload();
                limpiarForms();
                break;
              case '2':
                toastr.error('Error: El ID es incorrecto');
                break;
            }
          },
        });
      }
    });
  });
