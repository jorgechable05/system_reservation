<?php
require_once 'config/db.php';
require_once 'config/conexion.php';

//Campos
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$passw = $_POST['password'];
$nivel = $_POST['nivel'];
$estatus = true;
$encry_passw = password_hash($passw,PASSWORD_DEFAULT);

if($con -> connect_error){
    die("Conección falló: " . $con->connect_error);
}
else {
    $sql_query="INSERT INTO user (nombre_usr,apellido_usr,email_usr,nivel_usr,password_usr,estado_usr)
                        VALUES ('$nombre','$apellido','$email','$nivel','$encry_passw','$estatus')";
    if($con->query($sql_query) === TRUE){
        echo '<script type="text/javascript">;
        alert("Usuario Creado Correctamente...");
        window.location.href="login.php";</script>';
    }
    else{
        echo '<script type="text/javascript">;
        alert("Error al crear el usuario");
        window.location.href="login.php";</script>';
    }
}

?>

