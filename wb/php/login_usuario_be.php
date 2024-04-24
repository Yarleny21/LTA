<?php
session_start();
include 'conexion_be.php';

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario='$usuario'
and contraseña='$contrasena'");

if(mysqli_num_rows($validar_login) > 0){
    $_SESSION ['usuario'] = $usuario;
    header("location: ./index.html");
    exit;
}else{
        echo'
        <script>
            alert("El usuario que acaba de ingresar no existe, por favor verifique los datos");
            window.location = "../login.html";
        </script>';
        exit;
    }


?>