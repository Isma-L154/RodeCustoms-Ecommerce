function listarTodosCarrito() {
      $.ajax({
          url: '../Controllers/CarritoController.php?op=ListarCarrito',
          type: 'POST',
          dataType: 'html',
          success: function(data) {
              // Insertar el HTML generado en el contenedor 
              $('#ContenedorCarrito').html(data);
          },
          error: function(e) {
              console.log(e.responseText);
          }
      });
  
  }

  function listarResumen() {
      $.ajax({
          url: '../Controllers/CarritoController.php?op=ListarResumen',
          type: 'POST',
          dataType: 'html',
          success: function(data) {
              // Insertar el HTML generado en el contenedor 
              $('#Resumen').html(data);
          },
          error: function(e) {
              toastr.error("Error");
          }
      });
  
  }

 //Agarro el ID y elimino la Fila que tiene ese ID
  $(document).ready(function () {
    $(document).on('click', '.eliminar-linea', function () {
        var id = $(this).data('id');
        //Para eliminar el producto sin necesidad de recargar la pagina
        var fila = $(this).closest('.row'); 
        EliminarLinea(id ,fila);
    });
});

function EliminarLinea(id, fila) {
    bootbox.confirm('¿Desea Eliminarlo?', function (result) {
        if (result) {
            $.post(
                '../Controllers/CarritoController.php?op=EliminarLinea',
                { idLinea: id },
                function (data) {
                    switch (data) {
                        case '1':
                            toastr.success('Eliminado correctamente');
                            //Hacer los cambios en vivo
                            fila.remove(); 
                            listarResumen();
                            break;
    
                        case '0':
                            toastr.error('Error: No se pudo eliminar el producto');
                            break;
    
                        default:
                            toastr.error("Error: No se encontró el ID");
                            break;
                    }
                }
            );
        };
    });
}
$(document).ready(function () {
    $(document).on('click', '#btnPagar', function(event) {
        var sesionIniciada = $(this).data('sesion') === true;
        var tieneProductos = $(this).data('productos') === true;

        if (!sesionIniciada) {
            toastr.error('Debe iniciar sesión antes de pagar.');
            event.preventDefault();
        } else if (!tieneProductos) {
            toastr.error('Debe agregar al menos un producto al carrito antes de pagar.');
            event.preventDefault();
        } else {
            // Si la sesión está iniciada y hay productos
            $.ajax({
                url: '../Controllers/CarritoController.php?op=EliminarCarrito',
                type: 'POST',
                success: function(response) {
                    if (response == "1") {
                        
                        window.location.href = 'pagina_confirmacion.php';
                    } else {
                        toastr.error('Error al Pagar');
                    }
                },
                error: function(xhr, status, error) {
                    toastr.error('Error en la solicitud AJAX: ' + error);
                }
            });
        }
    });
});



$(function(){
    listarTodosCarrito();
  });
  $(function(){
    listarResumen();
  });