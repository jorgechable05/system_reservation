<?php
//require_once 'php/acceso.php';
require_once 'config/db.php';
require_once 'config/conexion.php';
require_once 'php/funciones.php';
?>
<!DOCTYPE html>
<html lang="es">
<?php
$titulo = 'Nuevo usuario';
//include_once 'head.php';
?>

<head>
    <link href="css/login.css" rel="stylesheet">
</head>

<body class="fixed-layout" style="background-color: #f5f5f5;">
    <?php include_once 'loader.php'; ?>
    <div id="main-wrapper">
        <?php
        //include_once 'topbar.php';
        //include_once 'navbar.php';
        ?>

        <div class="container">
            <br>
            <div class="card">
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-md-12 align-self-center">
                            <!-- <h4 class="text-themecolor"><?php echo $titulo; ?></h4> -->
                            <br>
                            <img class="mb-4" src="assets/images/logo-icon.png" alt="" width="50" height="auto" class="img-fluid">
                            <h3>Events <strong>App</strong></h3>
                        </div>
                        <div class="col-md-7 align-self-center text-right">
                            <div class="d-flex justify-content-end align-items-center">

                            </div>
                        </div>
                    </div>
                    <!--  -->
                    <h3 class="box-title m-b-0 " style="margin-left: 10%;">Regístrate</h3>
                    <p class="text-muted m-b-30 font-13" style="margin-left: 10%;"> Se parte de la mejor comunidad de eventos</p>
                    <main class="form-signin" style="margin-left: 10%;">
                        <form class="" action="usuario_insert.php" method="POST">
                            <div class="form-group">
                                <label for="exampleInputuname3" class="col-sm-3 control-label">Nombre*</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="ti-user"></i></span></div>
                                        <input type="text" class="form-control" id="exampleInputuname3" placeholder="Primer nombre" name="nombre">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputuname3" class="col-sm-3 control-label">Apellido*</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="ti-user"></i></span></div>
                                        <input type="text" class="form-control" id="exampleInputuname3" placeholder="Apellido" name="apellido">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3" class="col-sm-3 control-label">Email*</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="ti-email"></i></span></div>
                                        <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Ingresa tu email" name="email">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword4" class="col-sm-3 control-label">Contraseña*</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="ti-lock"></i></span></div>
                                        <input type="password" class="form-control" id="exampleInputpwd4" placeholder="Ingresa tu contraseña" name="password">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword4" class="col-sm-3 control-label">Tipo de usuario*</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="ti-crown"></i></span></div>
                                        <select class="form-control" id="exampleInputuname4" name="nivel">
                                            <option disabled selected value="">Selecciona una opción</option>
                                            <option value="2">Organziador</option>
                                            <option value="3">Asistente</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group m-b-0">
                                <div class="offset-sm-3 col-sm-9">
                                    <button type="reset" class="btn btn-primary waves-effect waves-light">Cancelar</button>
                                    <button type="submit" class="btn btn-success waves-effect waves-light">Registrarme</button>
                                </div>
                            </div>
                            <br>
                            <div class="form-group m-b-0">
                                <div class="offset-sm-3 col-sm-9">
                                    <p class="text-muted m-b-30 font-13"> Si ya tienes una cuenta <a href="login.php"><strong>inicia sesión</strong> </a></p>
                                </div>
                            </div>
                            
                        </form>
                        <p class="mt-5 mb-3 text-muted" style="margin-left: 20%;">Desarrollado por: Erick Torres y Edisson Sanchez | &copy; <?php echo date('Y'); ?> </p>

                    </main>


                </div>


                <!-- -->
            </div>


        </div>
    </div>

    <?php //include_once 'rightbar.php'; 
    ?>
    </div>
    <br>
    </div>
    <?php include_once 'scripts.php'; ?>

    <!-- Sweet-Alert  -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>