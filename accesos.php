<?php
date_default_timezone_set('America/Guatemala');

require_once 'db.php';
require_once 'conexion.php';

$session_id= session_id();

$idUser=$_SESSION['user_id'];
define('user_id_global',$idUser);

//$idUser=1;
$sUser="SELECT * FROM users WHERE user_id='$idUser'";
$qUser=mysqli_query($con,$sUser);
$rUser=mysqli_fetch_array($qUser);

$nAccess=$rUser['level_access'];
$fullNameUser=$rUser['firstname']." ".$rUser['lastname'];

if($nAccess==1){
    $puesto="Developer";

}elseif($nAccess==2){
    $puesto="Organizador";
}elseif($nAccess==3){
    $puesto="Asistente";
}

?>
