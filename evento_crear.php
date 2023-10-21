<?php
require_once 'php/acceso.php';
require_once 'config/db.php';
require_once 'config/conexion.php';
require_once 'php/funciones.php';
?>
<!DOCTYPE html>
<html lang="es">
<?php
$titulo = 'Registro de Evento'; 
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

                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-uppercase">DETALLES DEL EVENTO</h5>
                                <form class="form-material m-t-40" method="POST" action="php/evento_new.php" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-md-12" for="example-text">Nombre</span>
                                            </label>
                                            <div class="col-md-12">
                                                <input type="text" id="example-text" name="nombre" class="form-control" placeholder="ingrese el nombre" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-md-12" for="bdate">Fecha</span>
                                            </label>
                                            <div class="col-md-12">
                                                <input type="date" name="fecha" class="form-control" placeholder="selecciones la fecha" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-md-12" for="bdate">Hora</span>
                                            </label>
                                            <div class="col-md-12">
                                                <input class="form-control" name="hora" type="time" value="" id="example-time-input" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-md-12" for="example-text">Lugar</span>
                                            </label>
                                            <div class="col-md-12">
                                                <input type="text" id="example-text" name="lugar" class="form-control" placeholder="ingrese el lugar" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-md-12" for="example-text">Cupos</span>
                                            </label>
                                            <div class="col-md-12">
                                                <input type="number" id="example-text" name="cupo" class="form-control" placeholder="" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-md-12" for="example-text">Enlace Reunion</span>
                                            </label>
                                            <div class="col-md-12">
                                                <input type="text" id="example-text" name="link" class="form-control" placeholder="ingrese el lugar" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-12">Minuatura Evento</label>
                                            <div class="col-sm-12">
                                                <input name="file1" type="file"  class="dropify" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-12">Banner Evento</label>
                                            <div class="col-sm-12">
                                                <input name="poster" type="file"  class="dropify" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-md-12">Descripcion</label>
                                            <div class="col-md-12">
                                                <textarea class="form-control" name="descripcion" rows="3" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <input hidden type="text" name="id_user" value="<?php echo $id_usr; ?>">
                                    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Registrar</button>
                                    <button type="reset" class="btn btn-warning waves-effect waves-light">Resetear</button>
                                    <a href="eventos.php"><button class="btn btn-danger waves-effect waves-light">Cancelar</button></a>
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
    <script src="js/pages/jasny-bootstrap.js"></script>
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