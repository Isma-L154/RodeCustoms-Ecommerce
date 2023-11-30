

$('#Form_Login').on('submit', function (event) {
    event.preventDefault();
    $('#btnLogin').prop('disabled', true);
    var formData = new FormData($('#Form_Login')[0]);
    $.ajax({
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
              window.location.href = '../Views/Perfil.php'; 
              $('#Form_Login')[0].reset();
              break;
    
            case '2':
              toastr.error(
              'Credenciales incorrectas '
                  );
              break;
  
              case '3':
              toastr.success(
                'Sesion Iniciada'
              );
              window.location.href = '../Views/Admin_Dashboard.php'; 
              $('#Form_Login')[0].reset();
              break;
            case '0':
              toastr.error(
                'Error, no se encontro'  
                );
              break;
    
            default:
              //Me va tirar el error que esta dando el sistema
              toastr.error(datos);
              break;
          }
          $('#btnLogin').removeAttr('disabled');

        }
      }) 
});   

