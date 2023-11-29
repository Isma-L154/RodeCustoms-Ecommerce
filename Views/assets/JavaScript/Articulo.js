
function listarTodosArticulos() {
  // Realizar la petición AJAX para obtener los datos
    $.ajax({
        url: '../Controllers/CatalogoController.php?op=listar_articulos',
        type: 'POST',
        dataType: 'html',
        success: function(data) {
            // Insertar el HTML generado en el contenedor deseado
            $('#contenedorCards').html(data);
        },
        error: function(e) {
            console.log(e.responseText);
        }
    });

}

$('#filtroContent').on('submit', function (event) {
  event.preventDefault();
  $.ajax({
        url: '../Controllers/CatalogoController.php?op=Filtro_Tipo',
        type: 'POST',
        dataType: 'html',
        success: function(data) {
            // Insertar el HTML generado en el contenedor deseado
            $('#contenedorCards').html(data);
        },
        error: function(e) {
            console.log(e.responseText);
        }
    });

});

//FUNCIONES PRINCIPALES PARA DISEÑOS DEL CATALOGO
$(function(){
  listarTodosArticulos();
});

$('.buy').click(function(){
  $('.bottom').addClass("clicked");
});

$('.remove').click(function(){
  $('.bottom').removeClass("clicked");
});

//Funcion para desplegar los filtros de la pagina
document.addEventListener('DOMContentLoaded', function () {
  const btnFiltros = document.getElementById('btnFiltros');
  const filtroContent = document.getElementById('filtroContent');

  btnFiltros.addEventListener('click', function () {
    // Alternar la visibilidad de la ventana de filtros
    filtroContent.style.display = filtroContent.style.display === 'block' ? 'none' : 'block';
  });

  // Cierra la ventana de filtros si se hace clic fuera de ella
  window.addEventListener('click', function (event) {
    if (!filtroContent.contains(event.target) && event.target !== btnFiltros) {
      filtroContent.style.display = 'none';
    }
  });
});