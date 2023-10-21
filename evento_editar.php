<?php
require_once 'php/acceso.php';
require_once 'config/db.php';
require_once 'config/conexion.php';
require_once 'php/funciones.php';
?>
<!DOCTYPE html>
<html lang="es">
<?php
$titulo = 'Editar Evento'; 
include_once 'head.php';
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
                    <div class="col-md-7 align-self-center text-right">
                    </div>
                </div>
                <?php
                $id_evento = $_GET['id'];
                $sql = "SELECT * FROM event_app.evento WHERE id_codigo_evento='$id_evento'";
                $query = mysqli_query($con,$sql);
                $row = mysqli_fetch_array($query);
                ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-uppercase">DETALLES DEL EVENTO</h5>
                                <form class="form-material m-t-40" method="POST" action="php/evento_edit.php" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-md-12" for="example-text">Nombre</span>
                                            </label>
                                            <div class="col-md-12">
                                                <input type="text" id="example-text" name="nombre" class="form-control" placeholder="ingrese el nombre" value="<?php echo $row['nombre_evt'];?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-md-12" for="bdate">Fecha</span>
                                            </label>
                                            <div class="col-md-12">
                                                <input type="date" name="fecha" class="form-control" placeholder="selecciones la fecha" value="<?php echo $row['fecha_evt'];?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-md-12" for="bdate">Hora</span>
                                            </label>
                                            <div class="col-md-12">
                                                <input class="form-control" name="hora" type="time" id="example-time-input" value="<?php echo $row['hora_evt'];?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-md-12" for="example-text">Lugar</span>
                                            </label>
                                            <div class="col-md-12">
                                                <input type="text" id="example-text" name="lugar" class="form-control" placeholder="ingrese el lugar" value="<?php echo $row['lugar_evt'];?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-md-12" for="example-text">Cupos</span>
                                            </label>
                                            <div class="col-md-12">
                                                <input type="number" id="example-text" name="cupo" class="form-control" placeholder="" value="<?php echo $row['cupo_evt'];?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-md-12" for="example-text">Enlace Reunion</span>
                                            </label>
                                            <div class="col-md-12">
                                                <input type="text" id="example-text" name="link" class="form-control" placeholder="ingrese el lugar" value="<?php echo $row['link_evt'];?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-12">Minuatura Evento</label>
                                            <div class="col-sm-6">
                                                <img class="img-responsive" width="200" src="<?php echo $row['foto_evt'];?>"/>
                                            </div>
                                            <div class="col-sm-6">
                                                <input name="file1" type="file" class="dropify" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-12">Poster Evento</label>
                                            <div class="col-sm-6">
                                                <img class="img-responsive" src="<?php echo $row['poster_evt'];?>"/>
                                            </div>
                                            <div class="col-sm-6">
                                                <input name="poster" type="file" class="dropify" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-md-12">Descripcion</label>
                                            <div class="col-md-12">
                                                <textarea class="form-control" name="descripcion" rows="3"><?php echo $row['descripcion_evt'];?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <input hidden type="text" name="id" value="<?php echo $id_evento; ?>">
                                    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Editar</button>
                                    <a href="evento_detalle.php?id=<?php echo $id_evento; ?>"><button type="button" class="btn btn-danger waves-effect waves-light">Cancelar</button></a>
                                </form>
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
    <script src="assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="assets/node_modules/dropify/dist/js/dropify.min.js"></script>
    <script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove: 'Supprimer',
                error: 'Désolé, le fichier trop volumineux'
            }
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element) {
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function(event, element) {
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
    </script>
</body>
</html>