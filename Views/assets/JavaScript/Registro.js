function limpiarForms() {
  $('#modulos_add').trigger('reset');
}

$('#usuario_add').on('submit', function (event) {
    
  //Previene lo que  hace el formulario por defecto (osea redireccionarlo a otra pagina)
  event.preventDefault();

  //Deshabilitar el boton de registrar despues de haberse presionado 1 vez
  $('#btnRegistar').prop('disabled', true);
  
  //Obtener cada usuario y convertirlo en un objeto, (Formdata, es una clase predefinida de JS)
  var formData = new FormData($('#usuario_add')[0]);
  $.ajax({
    //url del controlador en este caso
    url: '../Controllers/RegistroController.php?op=insertar',
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
          window.location.href = '../Views/Perfil.php'; 
          break;

        case '2':
          toastr.error(
            'El correo ya existe... Corrija e inténtelo nuevamente...'
          );
          break;

        case '3':
          toastr.error('Hubo un error al tratar de ingresar los datos.');
          break;

        default:
          toastr.error(datos);
          break;
      }
      $('#btnRegistar').removeAttr('disabled');
    },
  });
});


  

