<?php
require_once 'php/acceso.php';
require_once 'config/db.php';
require_once 'config/conexion.php';
require_once 'php/funciones.php';
?>
<!DOCTYPE html>
<html lang="es">
<?php
$titulo = 'Sala Evento'; 

include_once 'head.php';
?>
<body class="skin-blue fixed-layout">
    <?php include_once 'loader.php'; ?>
    <div id="main-wrapper">
        <?php 
        include_once 'topbar.php';
        include_once 'navbar.php';
        $id_evento=$_GET['id'];
        ?>
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor"><?php echo $titulo;?></h4>
                    </div>
                    <?php
                    include_once 'ventanas/hacer_pregunta.php';
                    $sql = "SELECT * FROM event_app.evento, event_app.user WHERE id_codigo_evento='$id_evento' AND evento.id_usr = user.id_usr";
                    $query = mysqli_query($con,$sql);
                    $datos = mysqli_fetch_array($query);
                    if($datos['estatus_evt']==1){
                        $modoEv="Programado";
                        $msg="";
                        $colorEv="info";
                        $valorP=100;
                    }elseif($datos['estatus_evt']==2){
                        $modoEv="Por Comenzar";
                        $msg="Dentro de Poco Empezamos";
                        $colorEv="warning";
                        $valorP=80;
                    }elseif($datos['estatus_evt']==3){
                        $modoEv="Iniciado";
                        $msg="¡Disfruta de nuestro Evento!";
                        $colorEv="success";
                        $valorP=7;
                    }elseif($datos['estatus_evt']==4){
                        $modoEv="Iniciado";
                        $msg="¡Disfruta de nuestro Evento!";
                        $colorEv="success";
                        $valorP=100;
                    }elseif($datos['estatus_evt']==5){
                        $modoEv="Finalizado";
                        $msg="¡Disfruta de nuestro Evento!";
                        $colorEv="danger";
                        $valorP=100;
                    }
                    ?>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                        <?php if($nivel_usr < 3 AND $datos['estatus_evt']<6){
                            if($datos['estatus_evt']==1){
                                $boto_txt="Alertar de Comienzo";
                                $boto_clr="info";
                                $boto_ref="php/estado_evt_update.php?id=$id_evento&st=2";
                                $pregunta_txt="Lista de Preguntas";
                            }elseif($datos['estatus_evt']==2){
                                $boto_txt="Empezar Evento";
                                $boto_clr="success";
                                $boto_ref="php/estado_evt_update.php?id=$id_evento&st=3";
                            }elseif($datos['estatus_evt']==3){
                                $boto_txt="Empezar Preguntas";
                                $boto_clr="primary";
                                $boto_ref="php/estado_evt_update.php?id=$id_evento&st=4";
                            }elseif($datos['estatus_evt']==4){
                                $boto_txt="Finalizar Evento";
                                $boto_clr="danger";
                                $boto_ref="php/estado_evt_update.php?id=$id_evento&st=5";
                            }elseif($datos['estatus_evt']==5){
                                $boto_txt="Reporte de Encuesta";
                                $boto_clr="info";
                                $boto_ref="evento_reporte.php?id=$id_evento";
                            }
                            ?>
                            <a href="<?php echo $boto_ref ;?>"<button type="button" class="btn btn-<?php echo $boto_clr; ?> d-none d-lg-block m-l-15"><?php echo $boto_txt;?></button></a>
                        <?php }?>
                        <?php if($datos['estatus_evt']==4 && $nivel_usr ==3){?>
                            <button type="button" class="btn btn-primary d-none d-lg-block m-l-15" data-toggle="modal" data-target="#responsive-modal"><i class="fa fa-hand-o-up"></i> Nueva pregunta</button>
                        <?php }?>
                        <?php if($datos['estatus_evt']==5 && $nivel_usr ==3){?>
                            <a href="encuesta.php?id=<?php echo $id_evento;?>"><button type="button" class="btn btn-info d-none d-lg-block m-l-15"> Encuesta</button></a>
                        <?php }?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <center class="m-t-30"> <img src="<?php echo $datos['foto_evt'];?>" class="img-rounded" width="200" />
                                    <h4 class="card-title m-t-10"><?php echo $datos['nombre_evt'] ?></h4>
                                    <h6 class="card-subtitle"><?php echo $datos['nombre_usr']." ".$datos['apellido_usr']; ?></h6>
                                    <div class="row text-center justify-content-md-center">
                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i> <font class="font-medium"> <?php echo contar_asistencia($datos['id_codigo_evento']);?></font></a></div>
                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-bubble"></i> <font class="font-medium">54</font></a></div>
                                    </div>
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Estado del Evento</h3>
                                <div class="table-responsive">
                                    <table class="table m-b-0  m-t-30 no-border">
                                        <tbody>
                                            <tr>
                                                <td style="width:200px;">
                                                    <h4 class="card-title"><?php echo $modoEv;?></h4>
                                                    <h6 class="card-subtitle"><?php echo $msg;?></h6></td>
                                                <td class="vm">
                                                    <div class="progress">
                                                        <div class="progress-bar bg-<?php echo $colorEv;?>" role="progressbar" style="width: <?php echo $valorP; ?>%; height:7px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php 
                                            if($datos['estatus_evt']==4){
                                            ?>
                                            <tr>
                                                <td style="width:200px;">
                                                    <h4 class="card-title">Preguntas</h4>
                                                    <h6 class="card-subtitle">Ya puedes hacer tus preguntas</h6></td>
                                                <td class="vm">
                                                    <div class="progress">
                                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 7%; height:7px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
                if($datos['estatus_evt']==4){
                    
                ?>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Preguntas</h4>
                            <div class="table-responsive m-t-40">
                                <table id="myTable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Usuario</th>
                                            <th>Pregunta</th>
                                            <th>Estado</th>
                                            <?php if($nivel_usr < 3) {?>
                                            <th>Accion</th>
                                            <?php }?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if($nivel_usr <3){
                                            $sPreguntas = "SELECT * FROM event_app.pregunta WHERE id_codigo_evento = '$id_evento' AND estado_pre=0 ORDER BY id_codigo_evento ASC";
                                        }elseif($nivel_usr == 3 ){
                                            $sPreguntas = "SELECT * FROM event_app.pregunta WHERE id_usr = '$id_usr' AND id_codigo_evento = '$id_evento' ORDER BY id_codigo_evento DESC";
                                            
                                        }
                                        $qPreguntas = mysqli_query($con,$sPreguntas);
                                        while($rPre=mysqli_fetch_array($qPreguntas)){
                                            $id_p=$rPre['id_pre'];
                                            $id_usr_db=$rPre['id_usr'];
                                            if($rPre['estado_pre']==true){
                                                $estado_txt="Respondida";
                                                $estado_clr="success";
                                            }else{
                                                $estado_txt="Pendiente";
                                                $estado_clr="primary";
                                            }
                                        ?>
                                        <tr>
                                            <td><?php echo fullnameUser($id_usr_db);?></td>
                                            <td><?php echo $rPre['pregunta_pre'];?></td>
                                            <td>
                                                <span class="label label-<?php echo $estado_clr;?>"><?php echo $estado_txt?></span> 
                                            </td>
                                            <?php if($nivel_usr < 3 ){?>
                                            <td>
                                                <a href="php/pregunta_update.php?id=<?php echo $id_p.'&evt='.$id_evento;?>"><button type="button" class="btn btn-outline-success" control-id="ControlID-84"><i class="fa fa-check"></i></button></a>
                                            </td>
                                            <?php }?>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <?php }?>
                <?php include_once 'rightbar.php';?>
            </div>
        </div>
        <?php include_once 'footer.php';?>
    </div>
    <?php include_once 'scripts.php';?>
    <script src="assets/node_modules/datatables/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    }); 
    </script>
</body>
</html>