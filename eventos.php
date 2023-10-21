<?php
require_once 'php/acceso.php';
require_once 'config/db.php';
require_once 'config/conexion.php';
require_once 'php/funciones.php';
?>
<!DOCTYPE html>
<html lang="es">
<?php
$titulo = 'Eventos'; 
include_once 'head.php';
?>
<body class="skin-blue fixed-layout">
    <?php include_once 'loader.php'; ?>
    <div id="main-wrapper">
        <?php 
        include_once 'topbar.php';
        include_once 'navbar.php';
        ?>
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor"><?php echo $titulo;?></h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <?php 
                            if($nivel_usr==2){
                                ?>
                                <a href="evento_crear.php"><button type="button" class="btn btn-success d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Nuevo Evento</button></a>
                                <?php
                            }else{

                            }
                            ?>
                        </div>
                    </div>
                </div>
                <?php
                if($nivel_usr==1){
                    $sql = "SELECT * FROM event_app.evento";
                }elseif($nivel_usr==2){
                    $sql = "SELECT * FROM event_app.evento WHERE id_usr = '$id_usr'";
                }elseif($nivel_usr==3){
                    $sql = "SELECT * FROM event_app.evento WHERE estatus_evt<5";
                }
                if(isset($sql)){
                    
                ?>
                <div class="row">
                    <?php 
                    $query=mysqli_query($con, $sql);
                    while($datos=mysqli_fetch_array($query)){
                    ?>
                    <div class="col-md-3">
                        <img class="rounded mx-auto d-block" alt="miniaturaEvento" height="230" src="<?php echo $datos['foto_evt'];?>"/>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $datos['nombre_evt'];?></h5>
                                <div class="d-flex no-block align-items-center">
                                    <span><i class="ti-alarm-clock"></i> Hora: <?php echo $datos['hora_evt'];?></span>
                                </div>
                                <div class="d-flex no-block align-items-center p-t-10">
                                    <span><i class="ti-calendar"></i> Fecha: <?php echo $datos['fecha_evt'];?></span>
                                </div>
                                <div class="d-flex no-block align-items-center p-t-10">
                                    <span><i class="fa fa-graduation-cap"></i> Asistencia: <?php echo contar_asistencia($datos['id_codigo_evento'])."/".$datos['cupo_evt'];?></span>
                                </div>
                                <a href="evento_detalle.php?id=<?php echo $datos['id_codigo_evento'];?>"><button class="btn btn-info btn-rounded waves-effect waves-light m-t-30">Detalles</button></a>
                            </div>
                        </div>
                    </div>
                
                <?php 
                }
                ?>
                </div>
                <?php 
                }else{
                ?>
                
                <div class="alert alert-danger">
                    <h3 class="text-danger"><i class="fa fa-exclamation-triangle"></i> ADVERTENCIA</h3> ERROR DE VALIDACION DE USUARIO, PUEDA QUE NO TENGA ACCESO A ESTA SECCION. CONTACTE A SOPORTE TECNICO
                </div>
                <?php
                }
                ?>
                <?php include_once 'rightbar.php';?>
            </div>
        </div>
        <?php include_once 'footer.php';?>
    </div>
    <?php include_once 'scripts.php';?>
</body>
</html>