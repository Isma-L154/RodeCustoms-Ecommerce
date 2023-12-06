function listarTodosCarrito() {
    // Realizar la petición AJAX para obtener los datos
      $.ajax({
          url: '../Controllers/CarritoController.php?op=ListarCarrito',
          type: 'POST',
          dataType: 'html',
          success: function(data) {
              // Insertar el HTML generado en el contenedor deseado
              $('#ContenedorCarrito').html(data);
          },
          error: function(e) {
              console.log(e.responseText);
          }
      });
  
  }

  function listarResumen() {
    // Realizar la petición AJAX para obtener los datos
      $.ajax({
          url: '../Controllers/CarritoController.php?op=ListarResumen',
          type: 'POST',
          dataType: 'html',
          success: function(data) {
              // Insertar el HTML generado en el contenedor deseado
              $('#Resumen').html(data);
          },
          error: function(e) {
              console.log(e.responseText);
          }
      });
  
  }
  //FUNCIONES PRINCIPALES PARA DISEÑOS DEL CATALOGO
  $(function(){
    listarTodosCarrito();
  });
  $(function(){
    listarResumen();
  });