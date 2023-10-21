<?php
require_once 'php/acceso.php';
require_once 'config/db.php';
require_once 'config/conexion.php';
require_once 'php/funciones.php';
?>
<!DOCTYPE html>
<html lang="es">
<?php
$titulo = 'Reporte de Evento'; 
$id_evt = $_GET['id'];
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
                            <button type="button" onClick="window.location.reload();" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-refresh"></i> Actualizar</button>
                        </div>
                    </div>
                </div>
                <?php 
                $sql = "SELECT COUNT(pregunta1) FROM event_app.encuesta WHERE pregunta1=TRUE AND id_codigo_evento='$id_evt'";
                $query = mysqli_query($con,$sql);
                $data = mysqli_fetch_array($query);
                $si1 = $data['0'];
                $sql = "SELECT COUNT(pregunta1) FROM event_app.encuesta WHERE pregunta1=FALSE AND id_codigo_evento='$id_evt'";
                $query = mysqli_query($con,$sql);
                $data = mysqli_fetch_array($query);
                $no1 = $data['0'];
                ?>
                <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">¿Primera vez en nuestros eventos?</h4>
                            <div class="flot-chart">
                                <div class="flot-chart-content" id="pre-1"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
                $sql = "SELECT COUNT(pregunta6) FROM event_app.encuesta WHERE pregunta6=TRUE AND id_codigo_evento='$id_evt'";
                $query = mysqli_query($con,$sql);
                $data = mysqli_fetch_array($query);
                $si6 = $data['0'];
                $sql = "SELECT COUNT(pregunta6) FROM event_app.encuesta WHERE pregunta6=FALSE AND id_codigo_evento='$id_evt'";
                $query = mysqli_query($con,$sql);
                $data = mysqli_fetch_array($query);
                $no6 = $data['0'];
                ?>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">¿Qué tan útil fue la información presentada en este evento?</h4>
                            <div class="flot-chart">
                                <div class="flot-chart-content" id="pre-6"></div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <?php 
                $sql = "SELECT COUNT(pregunta10) FROM event_app.encuesta WHERE pregunta10=TRUE AND id_codigo_evento='$id_evt'";
                $query = mysqli_query($con,$sql);
                $data = mysqli_fetch_array($query);
                $si10 = $data['0'];
                $sql = "SELECT COUNT(pregunta10) FROM event_app.encuesta WHERE pregunta10=FALSE AND id_codigo_evento='$id_evt'";
                $query = mysqli_query($con,$sql);
                $data = mysqli_fetch_array($query);
                $no10 = $data['0'];
                $porcentaje10Si = ($si10 * 100 / ($no10 + $si10));
                ?>
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <h3><?php echo $porcentaje10Si; ?>%</h3>
                                        <h6 class="card-subtitle">¿Qué probabilidad existe de que asistas a uno de nuestros eventos en el futuro?</h6></div>
                                    <div class="col-12">
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $porcentaje10Si; ?>%; height: 7px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                    $sql = "SELECT COUNT(pregunta7) FROM event_app.encuesta WHERE pregunta7=TRUE AND id_codigo_evento='$id_evt'";
                    $query = mysqli_query($con,$sql);
                    $data = mysqli_fetch_array($query);
                    $si7 = $data['0'];
                    $sql = "SELECT COUNT(pregunta7) FROM event_app.encuesta WHERE pregunta7=FALSE AND id_codigo_evento='$id_evt'";
                    $query = mysqli_query($con,$sql);
                    $data = mysqli_fetch_array($query);
                    $no7 = $data['0'];
                    $porcentaje7Si = ($si7 * 100 / ($no7 + $si7));
                    ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <h3><?php echo $porcentaje7Si; ?>%</h3>
                                        <h6 class="card-subtitle">¿El curso mejoró tus habilidades?</h6></div>
                                    <div class="col-12">
                                        <div class="progress">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $porcentaje7Si; ?>%; height: 7px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                    $sql = "SELECT COUNT(pregunta9) FROM event_app.encuesta WHERE pregunta9=TRUE AND id_codigo_evento='$id_evt'";
                    $query = mysqli_query($con,$sql);
                    $data = mysqli_fetch_array($query);
                    $si9 = $data['0'];
                    $sql = "SELECT COUNT(pregunta9) FROM event_app.encuesta WHERE pregunta9=FALSE AND id_codigo_evento='$id_evt'";
                    $query = mysqli_query($con,$sql);
                    $data = mysqli_fetch_array($query);
                    $no9 = $data['0'];
                    $porcentaje9Si = ($si9 * 100 / ($no9 + $si9));
                    ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <h3><?php echo $porcentaje9Si; ?>%</h3>
                                        <h6 class="card-subtitle">¿Recomendarias este evento a tus amigos?</h6></div>
                                    <div class="col-12">
                                        <div class="progress">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $porcentaje9Si; ?>%; height: 7px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                    $sql = "SELECT COUNT(pregunta4) FROM event_app.encuesta WHERE pregunta4=TRUE AND id_codigo_evento='$id_evt'";
                    $query = mysqli_query($con,$sql);
                    $data = mysqli_fetch_array($query);
                    $si4 = $data['0'];
                    $sql = "SELECT COUNT(pregunta4) FROM event_app.encuesta WHERE pregunta4=FALSE AND id_codigo_evento='$id_evt'";
                    $query = mysqli_query($con,$sql);
                    $data = mysqli_fetch_array($query);
                    $no4 = $data['0'];
                    $porcentaje4Si = ($si4 * 100 / ($no4 + $si4));
                    ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <h3><?php echo $porcentaje4Si; ?>%</h3>
                                        <h6 class="card-subtitle">¿El Organizador respondio sus dudas?</h6></div>
                                    <div class="col-12">
                                        <div class="progress">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $porcentaje4Si; ?>%; height: 7px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
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
    <script src="assets/node_modules/flot/excanvas.min.js"></script>
    <script src="assets/node_modules/flot/jquery.flot.js"></script>
    <script src="assets/node_modules/flot/jquery.flot.pie.js"></script>
    <script src="assets/node_modules/flot/jquery.flot.time.js"></script>
    <script src="assets/node_modules/flot/jquery.flot.stack.js"></script>
    <script src="assets/node_modules/flot/jquery.flot.crosshair.js"></script>
    <script src="assets/node_modules/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script>
    $(function () {
    var data = [{
        label: "NO"
        , data: <?php echo $no1?>
        , color: "#4f5467"
    , }, {
        label: "SI"
        , data: <?php echo $si1 ?>
        , color: "#26c6da"
    , }];
    var plotObj = $.plot($("#pre-1"), data, {
        series: {
            pie: {
                innerRadius: 0.5
                , show: true
            }
        }
        , grid: {
            hoverable: true
        }
        , color: null
        , tooltip: true
        , tooltipOpts: {
            content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
            shifts: {
                x: 20
                , y: 0
            }
            , defaultTheme: false
        }
    });
}); 
$(function () {
    var data = [{
        label: "NO"
        , data: <?php echo $no6?>
        , color: "#4f5467"
    , }, {
        label: "SI"
        , data: <?php echo $si6 ?>
        , color: "#26c6da"
    , }];
    var plotObj = $.plot($("#pre-6"), data, {
        series: {
            pie: {
                innerRadius: 0.5
                , show: true
            }
        }
        , grid: {
            hoverable: true
        }
        , color: null
        , tooltip: true
        , tooltipOpts: {
            content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
            shifts: {
                x: 20
                , y: 0
            }
            , defaultTheme: false
        }
    });
});    
</script>
</body>
</html>