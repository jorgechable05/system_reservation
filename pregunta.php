<?php
require_once 'php/acceso.php';
require_once 'config/db.php';
require_once 'config/conexion.php';
require_once 'php/funciones.php';
?>
<!DOCTYPE html>
<html lang="es">
<?php
$titulo = 'Mis Preguntas';
include_once 'head.php';
?>

<body class="skin-blue fixed-layout">
    <?php //include_once 'loader.php'; 
    ?>
    <div id="main-wrapper">
        <?php
        include_once 'topbar.php';
        include_once 'navbar.php';
        ?>
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor"><?php echo $titulo; ?></h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <a href="#"><button type="button" class="btn btn-success d-none d-lg-block m-l-15" data-toggle="modal" data-target="#responsive-modal"><i class="fa fa-hand-o-up"></i> Nueva pregunta</button></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Preguntas</h4>
                                <form class="form-material m-t-40" action="pregunta_crear.php" method="POST">
                                    <div class="form-group row">
                                        <div class="col-sm-9">
                                            <?php
                                            //include('config/conexion.php');
                                            $sql = "SELECT * FROM user WHERE id_usr =" . $_REQUEST['id_usr'];
                                            $resultado = $con->query($sql);
                                            $row = $resultado->fetch_assoc();
                                            ?>
                                            <input type="hidden" class="form-control" name="usuario" placeholder="" value="<?php echo $row['id_usr'] ?>">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>¿Cuál es su pregunta?</label>
                                        <input type="text" class="form-control" placeholder="Redacte la pregunta">
                                    </div>
                                    <div class="form-group m-b-0">
                                        <div class="offset-sm-3 col-sm-9">
                                            <button type="submit" class="btn btn-info waves-effect waves-light m-t-10">Enviar</button>
                                            <a href="eventos.php" class="btn btn-secondary waves-effect waves-light m-t-10">Regreasar</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>


                        <?php include_once 'rightbar.php'; ?>
                    </div>
                </div>
                <?php include_once 'footer.php'; ?>
            </div>
            <?php include_once 'scripts.php'; ?>
</body>

</html>