<?php
require_once 'php/acceso.php';
require_once 'config/db.php';
require_once 'config/conexion.php';
require_once 'php/funciones.php';
?>
<!DOCTYPE html>
<html lang="es">
<?php
$titulo = 'Detalle del Evento'; 
include_once 'head.php';
$id_evento = $_GET['id'];
?>
<body class="skin-blue fixed-layout">
    <?php //include_once 'loader.php'; ?>
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
                    <?php 
                    $sql = "SELECT * FROM event_app.evento, event_app.user WHERE id_codigo_evento='$id_evento' AND evento.id_usr = user.id_usr";
                    $query = mysqli_query($con,$sql);
                    $datos = mysqli_fetch_array($query);
                    ?>
                    <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                            <?php 
                            if($nivel_usr<3){
                                ?>
                                <a href="evento_editar.php?id=<?php echo $datos['id_codigo_evento'];?>"><button type="button" class="btn btn-warning d-none d-lg-block m-l-15"><i class="fa fa-pencil"></i> Editar</button></a>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 m-b-20">
                                        <img class="img-responsive" width="" src="<?php echo $datos['poster_evt'];?>" alt="posterEvento">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"> 
                                        <br>
                                        <img class="img-responsive" src="<?php echo $datos['foto_evt'];?>"/>
                                    </div>
                                    <div class="col-md-3 border-right"> <strong><?php echo $datos['nombre_evt'] ?></strong>
                                        <br>
                                        <p class="text-muted">Nombre</p>
                                    </div>
                                    <div class="col-md-3 border-right"> <strong><?php echo $datos['nombre_usr']." ".$datos['apellido_usr']; ?></strong>
                                        <br>
                                        <p class="text-muted">Organizador</p>
                                    </div>
                                    <div class="col-md-3 border-right"> <strong><?php echo $datos['fecha_evt']." | ".$datos['hora_evt']; ?></strong>
                                        <br>
                                        <p class="text-muted">Fecha | Hora</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p><?php echo $datos['descripcion_evt'] ?></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row p-b-15">
                                    <div class="col-md-4">
                                        <ul class="list-icons">
                                            <li><a target="_blank" href="<?php echo $datos['link_evt'] ?>"><i class="fa fa-check text-success"></i> <?php echo $datos['link_evt'] ?></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <hr>
                                <?php 
                                if($nivel_usr==3){ 
                                ?>
                                <form method="POST" action="php/evento_incripcion.php">
                                <input hidden type="text" name="id_usr" value="<?php echo $id_usr; ?>">
                                <input hidden type="text" name="id_evt" value="<?php echo $id_evento ?>">
                                <div class="row text-center p-10">
                                    <?php if(validar_inscripcion($id_evento,$id_usr)==false){ ?>
                                    <button class="btn btn-success btn-lg" type="submit">Inscribirse</button>
                                    <?php }else{?>
                                    <a href="evento_sala.php?id=<?php echo$id_evento; ?>"><button type=button class="btn btn-info btn-lg">Sala Evento</button></a>
                                    <?php }?>
                                </div>
                                </form>
                                <?php 
                                }
                                if($nivel_usr<3){
                                ?>
                                <div class="row text-center p-10">
                                    <a href="evento_sala.php?id=<?php echo$id_evento; ?>"><button class="btn btn-info btn-lg">Sala Evento</button></a>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include_once 'rightbar.php';?>
            </div>
        </div>
        <?php include_once 'footer.php';?>
    </div>
    <?php include_once 'scripts.php';?>
</body>
</html>