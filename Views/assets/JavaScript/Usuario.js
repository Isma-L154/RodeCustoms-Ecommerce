
//TODO Terminar esta funcion de JS y enlazarla con el formulario de Registro
$('#usuario_add').on('submit', function (event) {
    
    //Previene lo que  hace el formulario por defecto (osea redireccionarlo a otra pagina)
    event.preventDefault();

    //Deshabilitar el boton de registrar despues de haberse presionado 1 vez
    $('#btnRegistrar').prop('disabled', true);
    
    //Obtener cada usuario y convertirlo en un objeto, (Formdata, es una clase predefinida de JS)
    var formData = new FormData($('#usuario_add')[0]);
    $.ajax({
      //url del controlador en este caso
      url: '../Controllers/UsuarioController.php?op=Insertar',
      type: 'POST',
      data: formData,
      contentType: false,
      processData: false,
      
      success: function (datos) {
        switch (datos) {
          case '1':
            toastr.success(
              'Usuario registrado'
            );
            $('#usuario_add')[0].reset();
            tabla.api().ajax.reload();
            break;
  
          case '2':
            toastr.error(
              'El correo ya existe... Corrija e inténtelo nuevamente...'
            );
            break;
  
          case '3':
            toastr.error('Hubo un error al tratar de ingresar los datos.');
            break;
          /*
          case '4':
            toastr.success('Usuario registrado exitosamente.');
            $('#usuario_add')[0].reset();
            tabla.api().ajax.reload();
            toastr.error('Error al enviar el correo.');
            break;*/
  
          default:
            toastr.error(datos);
            break;
        }
        $('#btnRegistar').removeAttr('disabled');
      },
    });
  });

  function limpiarForms() {
    $('#modulos_add').trigger('reset');
  }
  

