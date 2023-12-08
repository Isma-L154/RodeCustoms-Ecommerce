function listarTodos() {
    // Realizar la petición AJAX para obtener los datos
      $.ajax({
          url: '../Controllers/PersonalizableController.php?op=listar_articulos_persona',
          type: 'POST',
          dataType: 'html',
          success: function(data) {
              // Insertar el HTML generado en el contenedor deseado
              $('#contenedorPersonalizable').html(data);
          },
          error: function(e) {
              console.log(e.responseText);
          }
      });
  
  }
  
  
  //FUNCIONES PRINCIPALES PARA DISEÑOS DEL CATALOGO
  $(function(){
    listarTodos();
  });