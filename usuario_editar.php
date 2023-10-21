<?php
require_once 'php/acceso.php';
require_once 'config/db.php';
require_once 'config/conexion.php';
require_once 'php/funciones.php';
?>
<!DOCTYPE html>
<html lang="es">
<?php
$titulo = 'Editar usuario';
include_once 'head.php';
?>

<body class="skin-blue fixed-layout">
    <?php include_once 'loader.php'; 
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
                    <!-- 
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button> 
                        </div>
                    -->
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card card-body">
                        <h3 class="box-title m-b-0">Actualizar la información de usuario</h3>
                        <p class="text-muted m-b-30 font-13"></p>
                        <form class="form-horizontal" action="usuario_update.php" method="POST">

                            <?php
                            //include('config/conexion.php');
                            $sql = "SELECT * FROM user WHERE id_usr =" . $_REQUEST['id_usr'];
                            $resultado = $con->query($sql);
                            $row = $resultado->fetch_assoc();
                            ?>
                            <div class="form-group row">
                                <div class="col-sm-9">
                                    <input type="hidden" class="form-control" name="id_user" placeholder="" value="<?php echo $row['id_usr'] ?>">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 text-right control-label col-form-label">Nombre</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nombre" placeholder="" value="<?php echo $row['nombre_usr'] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 text-right control-label col-form-label">Apellido</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="apellido" placeholder="" value="<?php echo $row['apellido_usr'] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 text-right control-label col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" name="email" placeholder="" value="<?php echo $row['email_usr'] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 text-right control-label col-form-label">Nivel</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="exampleInputuname4" name="nivel">
                                        <option disabled value="">Selecciona una opción</option>
                                        <!-- Datos de Nivel -->
                                        <?php 
                                        $sql2 = "SELECT * FROM niveles WHERE id_lvl=".$row['nivel_usr'];
                                        $resultado2 = $con->query($sql2);
                                        
                                        $row2 = $resultado2->fetch_assoc();
                                        echo "<option value='" . $row2['id_lvl'] . "'>" . $row2['nombre_lvl'] . "</option>";

                                        $sql3 = "SELECT * FROM niveles";
                                        $resultado3 = $con->query($sql3);
                                        while($fila = $resultado3->fetch_array()){
                                            echo "<option value='" . $fila['id_lvl'] . "'>" . $fila['nombre_lvl'] . "</option>";
                                        }

                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword4" class="col-sm-3 text-right control-label col-form-label">Estado</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="exampleInputuname4" name="estado">
                                        <option disabled value="">Selecciona una opción</option>

                                        <!-- Datos de Estado -->
                                        <?php 
                                        $sql4 = "SELECT * FROM estado WHERE id_estado=".$row['estado_usr'];
                                        $resultado4 = $con->query($sql4);
                                        
                                        $row4 = $resultado4->fetch_assoc();
                                        echo "<option value='" . $row4['id_estado'] . "'>" . $row4['nombre_estado'] . "</option>";

                                        $sql5 = "SELECT * FROM estado";
                                        $resultado5 = $con->query($sql5);
                                        while($fila2 = $resultado5->fetch_array()){
                                            echo "<option value='" . $fila2['id_estado'] . "'>" . $fila2['nombre_estado'] . "</option>";
                                        }

                                        ?>
                                    </select>
                                </div>
                            </div>        
                            <div class="form-group m-b-0">
                                <div class="offset-sm-3 col-sm-9">
                                    <button type="submit" class="btn btn-info waves-effect waves-light m-t-10">Actualizar</button>
                                    <a href="usuarios.php" class="btn btn-secondary waves-effect waves-light m-t-10">Regreasar</a>
                                </div>
                            </div>
                        </form>
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