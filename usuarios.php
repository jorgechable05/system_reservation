<?php
require_once 'php/acceso.php';
require_once 'config/db.php';
require_once 'config/conexion.php';
require_once 'php/funciones.php';
?>
<!DOCTYPE html>
<html lang="es">
<?php
$titulo = 'Usuarios';
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
                        <h4 class="text-themecolor"><?php echo $titulo; ?></h4>
                    </div>
                    <!--
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button>
                        </div>
                    -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- -->
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Usuarios registrados</h4>
                                            <br>
                                            <div class="table-responsive">
                                                <table class="table color-table success-table">
                                                    <thead>
                                                        <tr>
                                                            <th>Id</th>
                                                            <th>Nombre</th>
                                                            <th>Apellido</th>
                                                            <th>Email</th>
                                                            <th>Nivel</th>
                                                            <th>Estatus</th>
                                                            <th>Acciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <?php 
                                                        //require('config/conexion.php');
                                                        //id_usr, nombre_usr, apellido_usr, email_usr, nivel_usr, estado_usr
                                                        $consulta = $con->query("SELECT * FROM user
                                                                                INNER JOIN niveles ON user.nivel_usr = niveles.id_lvl
                                                                                INNER JOIN estado ON user.estado_usr = estado.id_estado
                                                                                ");
                                                        while ($datos = $consulta->fetch_assoc()){
                                                        ?>

                                                        <tr>
                                                            <td><?php echo $datos['id_usr']?></td>
                                                            <td><?php echo $datos['nombre_usr']?></td>
                                                            <td><?php echo $datos['apellido_usr']?></td>
                                                            <td><?php echo $datos['email_usr']?></td>
                                                            <td><?php echo $datos['nombre_lvl']?></td>
                                                            <td><?php echo $datos['nombre_estado']?></td>
                                                            <td>
                                                            <a href="usuario_editar.php?id_usr=<?php echo $datos['id_usr']?>"><button type="button" class="btn waves-effect waves-light btn-primary btn-sm">Editar</button></a>
                                                            
                                                            </td>
                                                        </tr>
                                                        
                                                        <?php 
                                                        }
                                                        ?>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- -->
                            </div>
                        </div>
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