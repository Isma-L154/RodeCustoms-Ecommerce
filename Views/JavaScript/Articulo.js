
function listarTodosArticulos(){
        $.ajax ({
          //URL del controlador
          url: '../Controllers/CatalogoController.php?op=listar_articulos',
          type: 'get',
          dataType: 'json',
          success: function (data) {
            if (data.length > 0) {
                // Iterar sobre los datos y construir tarjetas
                $.each(data, function (Articulo) {
                    // Aquí debes personalizar según la estructura de tus datos
                    var nombre = Articulo.nombre;
                    var descripcion = Articulo.descripcion;
                    var ruta = Articulo.ruta_imagen;
                    var precio = Articulo.precio;

                    // Construir tarjeta
                    var tarjetaHTML = `
                    <div class="col mb-5 " >
                    <div class="card h-100">
                        <!-- Product image-->
                        <img class="card-img-top" src="${ruta}"  alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">${nombre}</h5>
                                <p>${descripcion}</p>
                                <!-- Product price-->
                                ${precio}
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View options</a></div>
                        </div>
                    </div>
                </div>`;

                    // Agregar la tarjeta al contenedor
                    $('#contenedorTarjetas').append(tarjetaHTML);
                });
            } else {
                // Manejar el caso en el que no hay datos
                $('#contenedorTarjetas').html('<p>No hay usuarios disponibles.</p>');
            }
        },
          error: function (e) {
            console.log(e.responseText);
          },
          bDestroy: true,
          iDisplayLength: 5,
        });
}