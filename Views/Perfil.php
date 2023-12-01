
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RODECUSTOMS</title>
    <?php
    include "./assets/Fragments/Librerias.php"
    ?>
    <link rel="stylesheet" href="./assets/StyleSheets/Perfil.css">


</head>

<body>

    <?php
    include "./assets/Fragments/Header_BK.php"
    ?>


    <div class="container mt-5">

        <div class="row d-flex justify-content-center">

            <div class="col-md-7">

                <div class="card p-3 py-4">

                    <div class="text-center">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2c/Default_pfp.svg/2048px-Default_pfp.svg.png" width="100" class="rounded-circle">
                    </div>

                    <div class="text-center mt-3">
                        <span class="bg-secondary p-1 px-4 rounded text-white"><?php if (isset($_SESSION['user_Rol']) && $_SESSION['user_Rol'] == 1) {
                                                                                    echo "Administrador";
                                                                                }else{
                                                                                    echo "Cliente";
                                                                                }
                                                                                 ?>
                                                                                </span>
                        
                        <h5 class="mt-2 mb-0"><?php echo $_SESSION['user_nombre'] ."&nbsp". $_SESSION['user_apellidos'] ?></h5>
                          <br>                                                      
                        <div class="px-4 mt-1">
                            <h6 class="fonts" style="font-size: medium;"> <?php echo $_SESSION['user_email']  ?> </h6>

                        </div>
                           <br>                                                     
                        <ul class="social-list">
                            <li><i class="fa fa-facebook"></i></li>
                            <li><i class="fa fa-dribbble"></i></li>
                            <li><i class="fa fa-instagram"></i></li>
                            <li><i class="fa fa-linkedin"></i></li>
                            <li><i class="fa fa-google"></i></li>
                        </ul>

                        <div class="buttons">

                            <button class="btn btn-outline-primary px-4">Editar Perfil</button>
                        </div>


                    </div>




                </div>

            </div>

        </div>

    </div>

    <?php
    include "./assets/Fragments/Footer_BK.php"
    ?>

</body>

</html>