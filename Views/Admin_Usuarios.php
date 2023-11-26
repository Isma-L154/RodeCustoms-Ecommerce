<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>RODECUSTOMS</title>

        <?php
        include "./assets/Fragments/Librerias.php"
        ?>
        <script src="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css"></script>
        <link rel="stylesheet" href="./Pluggins/toastr/toastr.css">
        <link href="./assets/StyleSheets/Admin.css" rel="stylesheet" />
</head>

<body>
        <?php
        include "./assets/Fragments/Header_BK.php"
        ?>
        <main>
                <!--Tabla para mostrar los datos del usuario-->
                <div class="col-md-12">
                        <div class="card card-dark">
                                <div class="card-header">
                                        <h3 class="card-title" style="text-align: center;">Usuarios existentes</h3>
                                </div>
                                <div class="card-body p-0">
                                        <div class="row mt-2">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-10">
                                                        <table id="admin_usuarios" class="table table-striped table-bordered table-hover">
                                                                <thead>
                                                                        <th>ID</th>
                                                                        <th>Nombre</th>
                                                                        <th>Apellidos</th>
                                                                        <th>Email</th>
                                                                        <th>Clave</th>
                                                                        <th>Rol</th>
                                                                        <th>Opciones</th>
                                                                </thead>
                                                        </table>
                                                </div>
                                                <div class="col-md-1"></div>
                                                <button class="open-button" onclick="openForm()">Agregar Usuario</button>
                                        </div>
                                </div>
                        </div>
                </div>

                <!--Modulo para agregar usuarios, aqui se da la opcion de agregar usuarios administradores tambien-->
                <div class="form-popup" id="Form_add">
                        <form class="form-container" name="modulo_add_usuarios" id="add_usuario" method="POST">

                                <h1>Agregar Usuario Admin</h1>
                                <label for="nombreUsu"></label>
                                <input type="text" class="form-control" id="nombreUsu" name="nombreUsu" placeholder="Nombre" required>

                                <label for="ApellidosUsu"></label>
                                <input type="text" class="form-control" id="ApellidosUsu" name="ApellidosUsu" placeholder="Apellidos">

                                <label for="EmailUsu"></label>
                                <input type="text" class="form-control" id="EmailUsu" name="EmailUsu" placeholder="Email" required>

                                <label for="ClaveUsu"></label>
                                <input type="password" class="form-control" id="ClaveUsu" name="ClaveUsu" placeholder="Clave" required>

                                <button type="submit" class="btn" id="btnAnadirUsuario">Agregar</button>
                                <button type="button" class="btn cancel" onclick="closeForm()">Cerrar</button>
                        </form>
                </div>

                <!--Modulo de Pop up para poder editar a los usuarios / Que se pueda modificar todo menos la clave-->
                <div id="Form_Update_Usuarios" class="modal">

                        <!-- Modal content -->
                        <div class="modal-content">
                                <span class="close">&times;</span>
                                <form class="form" name="update_usuario" id="update_usuario" method="POST">

                                        <h1>Modificar Usuarios</h1>
                                        <input type="hidden" class="form-control" id="UsId" name="UsId">

                                        <div class="row">
                                        <label for="UsNombre">Nombre</label>
                                        <input type="text" class="form-control" id="UsNombre" name="UsNombre" placeholder="Nombre" required>
                                        </div>

                                        <div class="row">
                                        <label for="UsApellidos">Apellidos</label>
                                        <input type="text" class="form-control" id="UsApellidos" name="UsApellidos" placeholder="Apellidos" required>
                                        </div>

                                        <div class="row">
                                        <label for="UsEmail">Email</label>
                                        <input type="text" class="form-control" id="UsEmail" name="UsEmail" placeholder="Email" readonly>
                                        </div>

                                        <input type="hidden" class="form-control" id="UsClave" name="UsClave">

                                        <div class="row">
                                        <label for="UsRol">Rol de Usuario</label>
                                        <select name="UsRol" id="UsRol" class="form-control" >
                                                <option value="1" selected>Administrador</option>
                                                <option value="2">Cliente</option>
                                        </select>
                                        </div>

                                        <button type="submit" class="btn-Modificar" id="btnModificarUsuario">Modificar</button>
                                        </form>

                                </div>
                </div>

        </main>

        <?php
        include "./assets/Fragments/Footer_BK.php"
        ?>

        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>
        <script src="./Pluggins/bootbox/bootbox.min.js"></script>
        <script src="./Pluggins/toastr/toastr.js"></script>
        <script src="./assets/JavaScript/Admin_Usuarios.js"></script>
</body>

</html>