<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>RODECUSTOMS</title>
    <?php
    include "./assets/Fragments/Librerias.php"
    ?>
    <script src="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css"></script>
    <link href="./assets/StyleSheets/Catalogo.css" rel="stylesheet" />

</head>

<body>
    <?php
    include "./assets/Fragments/Header_BK.php"
    ?>
    <div class="filtro-container">
        <button id="btnFiltros"><i class="fa-solid fa-filter"></i>Filtros</button>
        <div class="filtro-content" id="filtroContent">
            <!-- Sección de Filtros de Precios -->
            <div class="filtro-section">
                <h3>Precios</h3>
                <label>
                    <input type="radio" name="precio"> Menos de $50
                </label>
                <label>
                    <input type="radio" name="precio"> $50 - $100
                </label>
                <label>
                    <input type="radio" name="precio"> Más de $100
                </label>
            </div>

            <!-- Sección de Filtros de Tipo -->
            <div class="filtro-section">
                <h3>Tipo</h3>
                <label>
                    <input type="radio" name="tipo" value="2" id="Camisetas_filtro"> Camisetas
                </label>
                <label>
                    <input type="radio" name="tipo" value="1" id="Sudaderas_filtro"> Sudaderas
                </label>
                <label>
                    <input type="radio" name="tipo" value="3"  id="Otros-filtro"> Otros
                </label>
            </div>
            <button class="btnReset"  type="submit" id="BtnFiltrar">Aplicar</button>

            <script>
                function AplicarFiltros() {
                    // Desmarcar las opciones
                    document.querySelectorAll('input[type="radio"]').forEach(input => input.checked = false);
                }
            </script>
        </div>
    </div>
    
    
    <section class="py-5 row">
        <div class="row" id="contenedorCards"></div>
        <!--Inicio de Prueba para comprobar que los datos estan mostrandose en la web-->
    </section>
    <!-- Footer-->
    <?php
    include "./assets/Fragments/Footer_BK.php"
    ?>
    <!--Scripts propios de JS para la pagina-->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>
    <script src="./assets/JavaScript/Articulo.js"></script>

</body>

</html>