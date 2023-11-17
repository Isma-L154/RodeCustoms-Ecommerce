$('#Form_Login').on('submit', function (event) {
    
    //Previene lo que  hace el formulario por defecto (osea redireccionarlo a otra pagina)
    event.preventDefault();
  
    //Deshabilitar el boton de registrar despues de haberse presionado 1 vez
    $('#btnLogin').prop('disabled', true);
    
    //Obtener cada usuario y convertirlo en un objeto, (Formdata, es una clase predefinida de JS)
    var formData = new FormData($('#Form_Login')[0]);
    $.ajax({
      //url del controlador en este caso
      url: '../Controllers/LoginController.php?op=Login',
      type: 'POST',
      data: formData,
      contentType: false,
      processData: false,
      
      success: function (datos) {
        switch (datos) {
          case '1':
            toastr.success(
              'Sesion Iniciada'
            );
            $('#Form_Login')[0].reset();
            tabla.api().ajax.reload();
            break;
  
          case '2':
            toastr.error(
            'No se logro '
                );
            break;
  
          case '3':
            toastr.error('No se logro');
            break;
          /*
          case '4':
            toastr.success('Usuario registrado exitosamente.');
            $('#usuario_add')[0].reset();
            tabla.api().ajax.reload();
            toastr.error('Error al enviar el correo.');
            break;*/
  
          default:
            toastr.error('No estan entrando los datos');
            break;
        }
        $('#btnRegistar').removeAttr('disabled');
      },
    });
  });