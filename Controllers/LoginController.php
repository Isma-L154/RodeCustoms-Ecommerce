<!--POR TERMINAR-->
<?php

include 'Conexion.php';

$email_login = $_POST['email'];
$password_login = $_POST['clave'];

/*Validar en BD si el correo y la contraseña estan registrados y correctos*/
$validar_login = mysqli_query($Conexion, "SELECT * FROM Usuario WHERE email='$email_login'
AND clave='$password_login'");

if(mysqli_num_rows($validar_login) > 0) {

    header("location: ../index.php");

    exit;

}else{

    echo '

        <script>

            alert("Usuario no existe, por favor verificar el correo o la contraseña");
            window.location = "./login.php";   

        </script>

    ';

    exit;

}


?>