function listarTodosUsuarios() {
  tabla = $('#admin_usuarios').dataTable({
      processing: true,
      serverSide: true,
      dom: 'Bfrtip',
      ajax: {
          url: '../Controllers/AdminController.php?op=MostrarUsuarios',
          type: 'get',
          dataType: 'json',
          error: function (e) {
              console.log(e.responseText);
          },
      },
      bDestroy: true,
      displayLength: 5,
      columnDefs: [
          {
              targets: 5,
              render: function (data, type, row, meta) {
                  switch (data) {
                      case 1:
                          return 'Administrador';
                      case 2:
                          return 'Usuario';
                      default:
                          return 'Sin Rol';
                  }
              }
          }
      ],
  });
}
  

//FUNCIONES PRINCIPALES
$(function(){
    listarTodosUsuarios();
  });

  function limpiarForms() {
    $('#add_articulos').trigger('reset');
}  
function openForm() {
    document.getElementById("Form_add").style.display = "block";
  }

  function closeForm() {
    document.getElementById("Form_add").style.display = "none";
  }
//FIN DE FUNCIONES PRINCIPALES

 $('#add_usuario').on('submit', function (event) {
    event.preventDefault();  
    $('#btnAnadirUsuario').prop('disabled', true);
    
    var formData = new FormData($('#add_usuario')[0]);
    $.ajax({
      url: '../Controllers/AdminController.php?op=Aregar_Usuarios',
      type: 'POST',
      data: formData,
      contentType: false,
      processData: false,
      
      success: function (datos) {
        switch (datos) {
          case '1':
            toastr.success(
              'Usuario agregado con exito'
            );
            tabla.api().ajax.reload();
            $('#add_usuario')[0].reset();
            break;
  
          case '2':
            toastr.error(
              'El usuario ya existe'
            );
            break;
  
          case '3':
            toastr.error('Hubo un error al tratar de ingresar los datos.');
            break;
  
          default:
            toastr.error('No entran los datos');
            break;
        }
        $('#btnAnadirUsuario').removeAttr('disabled');
      },
    });
  });


  /*Habilitacion de form de modificacion al presionar el boton en la tabla*/
$('#admin_usuarios').on('click', 'button[id="modificarUsuario"]', function () {
    var modal = document.getElementById("Form_Update_Usuarios");
    var span = document.getElementsByClassName("close")[0];
  
    // Abrir el Modal
    modal.style.display = "block";
  
    // Cerrar el modal con la "x"
    span.onclick = function() {
        modal.style.display = "none";
    }  
    
    // Cerrar el Modal con un clic fuera del Modal
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
  
    var data = $('#admin_usuarios').DataTable().row($(this).parents('tr')).data();
    limpiarForms();
    $('#UsId').val(data[0]);
    $('#UsNombre').val(data[1]);
    $('#UsApellidos').val(data[2]);
    $('#UsEmail').val(data[3]);
    $('#UsClave').val(data[4]);
    $('#UsRol').val(data[5]);
    return false;
  });


   //Modificar los datos del Usuario
   $('#update_usuario').on('submit', function (event) {
    event.preventDefault();
    var result = confirm("¿Desea actualizar los datos?");
    
    if (result) {
        var formData = new FormData($('#update_usuario')[0]);
        $.ajax({
            url: '../Controllers/AdminController.php?op=Editar_Usuarios',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (datos) {
                switch (datos) {
                    case '0':
                        toastr.error('Error: No se pudieron actualizar los datos');
                        break;
                    case '1':
                        toastr.success('Datos actualizados correctamente');
                        tabla.api().ajax.reload();
                        break;
                    case '2':
                        toastr.error('Error: El ID es incorrecto');
                        break;
                default:
                  toastr.error('Los datos no estan entrando')
                      }
            },
            error: function (xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
    }
});

function Eliminar(id) {
  var result = confirm('¿Esta seguro de activar el usuario?');
    if (result) {
      $.post(
        '../Controllers/AdminController.php?op=Eliminar_Usuarios',
        { idUsuario: id },
        function (data) {
          switch (data) {
            case '1':
              toastr.success('Eliminado correctamente');
              tabla.api().ajax.reload();
              break;

            case '0':
              toastr.error(
                'Error: No se pudo eliminar el Usuario'
              );
              break;

            default:
              toastr.error("Error: No se encontro el ID");
              break;
          }
        }
      );
    }
  }