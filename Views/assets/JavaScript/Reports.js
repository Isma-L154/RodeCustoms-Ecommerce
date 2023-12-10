

var urlParams = new URLSearchParams(window.location.search);
var idPersonalize = urlParams.get('id');

$(document).ready(function () {
    $(document).on('click', '#btnAnadirCarritoPers', function (event) {
        event.preventDefault();
        $("#btnAnadirCarritoPers").prop("disabled", true);

        var formData = new FormData();
        formData.append('talla', $("#talla").val());
        formData.append('cantidad', $("#cantidad").val());
        formData.append('color', $("#colorPicker").val()); 
        formData.append('id', idPersonalize);

        var archivo = document.getElementById('archivo1').files[0];
        formData.append('archivo1', archivo);

        $.ajax({
            url: '../Controllers/AdminController.php?op=InsertarReport',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                switch (response) {
                    case '1':
                        console.log(response);
                        break;
                    
                        case '2':
                        toastr.error('No se pudo añadir el Producto')
                        break;
                    default:
                        console.log(response)
                        break;
                }
            },

        });
    });
});

function listarReportes() {
    reportes = $('#Reports').dataTable({
      aProcessing: true, 
      aServerSide: true, 
      dom: 'Bfrtip', 
      ajax: {
        url: '../Controllers/AdminController.php?op=MostrarReports',
        type: 'get',
        dataType: 'json',
        error: function (e) {
          console.log(e.responseText);
        },
        bDestroy: true,
        iDisplayLength: 5,
      },
    });
  }
  $(function(){
    listarReportes();
  });

  function Realizado(ID) {
    var result = confirm('¿Esta seguro de activar el usuario?');
      if (result) {  
        $.post(
          '../Controllers/AdminController.php?op=ReporteCompleto',
          { ID: ID },
          function (data) {
            switch (data) {
              case '1':
                toastr.success('Sigue Asi!');
                break;
  
              case '0':
                toastr.error(
                  'Error'
                );
                break;
  
              default:
                console.log(data);
                break;
            }
          }
        );
      }
    }

  //Esta funcion es par darle click al color y saber que color especifico selecciono el cliente
  $(document).ready(function() {
    $(document).on('click', '.color-box', function() {
        var color = $(this).data('color');
        bootbox.alert({
            title: "Tipo de color",
            message: "Color seleccionado: " + color,
            callback: function() {
                
            }
        });
        
    });
});







