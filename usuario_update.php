<?php
require_once 'config/db.php';
require_once 'config/conexion.php';

$id_user = $_POST['id_user'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$nivel = $_POST['nivel'];
$estado = $_POST['estado'];

$sql = "UPDATE user SET nombre_usr='$nombre', apellido_usr='$apellido', email_usr='$email', 
nivel_usr='$nivel', estado_usr='$estado' WHERE id_usr='".$id_user."'";
$insert = mysqli_query($con, $sql);

if ($insert) {
    echo '<script type="text/javascript">;
    alert("Usuario Editado Correctamente...");
    window.location.href="usuarios.php";</script>';
}else {
    echo '<script type="text/javascript">;
    alert("Error! Al Editar el Evento...'.mysqli_error($con).'");
    window.location.href="usuarios.php";</script>';
}
?>