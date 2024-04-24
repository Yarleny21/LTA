<?php

include 'conexion_be.php';

$Nombre_completo = $_POST['Nombre_completo'];
$correo = $_POST['Correo'];
$usuario = $_POST['Usuario'];
$contrasena = $_POST['Contrasena'];


$query = "INSERT INTO usuarios(nombre_completo, correo, usuario, contraseña)
          VALUES('$Nombre_completo', '$correo', '$usuario','$contrasena')";
          

$verificar_correo = mysqli_query($conexion, "SELECT * from usuarios where correo ='$correo'");

if(mysqli_num_rows($verificar_correo) > 0){
    echo '
<script>
alert("Este correo ya esta registrado, intenta con uno nuevo");
window.location = "../login.html"
</script>
    ';

    exit();
}
$verificar_usuario = mysqli_query($conexion, "SELECT * from usuarios where usuario ='$usuario'");
if(mysqli_num_rows($verificar_usuario) > 0){
    echo '
<script>
alert("Este usuario ya esta registrado, intenta con uno nuevo");
window.location = "../login.html"
</script>
    ';

    exit();
}

$ejecutar = mysqli_query($conexion, $query);

if($ejecutar){
echo'<script>
alert("Usuario almacenado correctamente");
window.location = "../login.html";
</script>';
}else{
    echo'<script>
    alert("Intentalo de nuevo, usuario no almacenado");
    window.location = "../login.html";
    </script>';
}
mysqli_close($conexion);


?>