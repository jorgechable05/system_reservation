<?php
require_once 'php/acceso.php';
require_once 'config/db.php';
require_once 'config/conexion.php';
require_once 'php/funciones.php';
?>
<!DOCTYPE html>
<html lang="es">
<?php
$titulo = 'Encuesta';

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
                        <h4 class="text-themecolor"><?php echo $titulo; ?></h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">

                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="title">
                                    <h4><strong>Brindanos tu opinión sobre el evento</strong></h4>
                                    <br>
                                </div>
                                <form action="php/encuesta_new.php" method="POST">
                                    <div class="row">
                                        <label>1. ¿Primera vez en nuestros eventos?</label>
                                        <div class="input-group">
                                            <ul class="icheck-list">
                                                <li>
                                                    <input tabindex="7" type="radio" class="check" id="minimal-radio-1" value="true" name="pre_1">
                                                    <label for="minimal-radio-1">Si</label>
                                                </li>
                                            </ul>
                                            <ul class="icheck-list">
                                                <li>
                                                    <input tabindex="7" type="radio" class="check" id="minimal-radio-1" value="false" name="pre_1">
                                                    <label for="minimal-radio-2">No</label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label>2. ¿El Organizador se presento antes de impartir el evento?</label>
                                        <div class="input-group">
                                            <ul class="icheck-list">
                                                <li>
                                                    <input tabindex="7" type="radio" class="check" id="minimal-radio-1" value="true" name="pre_2">
                                                    <label for="minimal-radio-3">Si se presento</label>
                                                </li>
                                            </ul>
                                            <ul class="icheck-list">
                                                <li>
                                                    <input tabindex="7" type="radio" class="check" id="minimal-radio-2" value="false" name="pre_2">
                                                    <label for="minimal-radio-4">No se presento</label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label>3. ¿Tuviste la oportunidad de hacer preguntas durante el evento?</label>
                                        <div class="input-group">
                                            <ul class="icheck-list">
                                                <li>
                                                    <input tabindex="7" type="radio" class="check" id="minimal-radio-3" value="3" name="pre_3">
                                                    <label for="minimal-radio-1">Si pude</label>
                                                </li>
                                            </ul>
                                            <ul class="icheck-list">
                                                <li>
                                                    <input tabindex="7" type="radio" class="check" id="minimal-radio-4" value="2" name="pre_3">
                                                    <label for="minimal-radio-1">No pude</label>
                                                </li>
                                            </ul>
                                            <ul class="icheck-list">
                                                <li>
                                                    <input tabindex="7" type="radio" class="check" id="minimal-radio-4" value="1" name="pre_3">
                                                    <label for="minimal-radio-1">No tenia preguntas</label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label>4. ¿El Organizador respondio sus dudas?</label>
                                        <div class="input-group">
                                            <ul class="icheck-list">
                                                <li>
                                                    <input tabindex="7" type="radio" class="check" id="minimal-radio-3" value="true" name="pre_4">
                                                    <label for="minimal-radio-1">Si</label>
                                                </li>
                                            </ul>
                                            <ul class="icheck-list">
                                                <li>
                                                    <input tabindex="7" type="radio" class="check" id="minimal-radio-4" value="false" name="pre_4">
                                                    <label for="minimal-radio-1">No</label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label>5. ¿Qué probabilidad existe de que asistas a uno de nuestros eventos en el futuro?</label>
                                        <div class="input-group">
                                            <ul class="icheck-list">
                                                <li>
                                                    <input tabindex="7" type="radio" class="check" id="minimal-radio-3" value="1" name="pre_5">
                                                    <label for="minimal-radio-1">Nada Probable</label>
                                                </li>
                                            </ul>
                                            <ul class="icheck-list">
                                                <li>
                                                    <input tabindex="7" type="radio" class="check" id="minimal-radio-4" value="2" name="pre_5">
                                                    <label for="minimal-radio-1">Probable</label>
                                                </li>
                                            </ul>
                                            <ul class="icheck-list">
                                                <li>
                                                    <input tabindex="7" type="radio" class="check" id="minimal-radio-4" value="3" name="pre_5">
                                                    <label for="minimal-radio-1">Seguro que asisto</label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label>6. ¿Qué tan útil fue la información presentada en este evento? </label>
                                        <div class="input-group">
                                            <ul class="icheck-list">
                                                <li>
                                                    <input tabindex="7" type="radio" class="check" id="minimal-radio-3" value="false" name="pre_6">
                                                    <label for="minimal-radio-1">No me fue util</label>
                                                </li>
                                            </ul>
                                            <ul class="icheck-list">
                                                <li>
                                                    <input tabindex="7" type="radio" class="check" id="minimal-radio-4" value="true" name="pre_6">
                                                    <label for="minimal-radio-1">Muy util</label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label>7. ¿El curso mejoró tus habilidades? </label>
                                        <div class="input-group">
                                            <ul class="icheck-list">
                                                <li>
                                                    <input tabindex="7" type="radio" class="check" id="minimal-radio-3" value="false" name="pre_7">
                                                    <label for="minimal-radio-1">Muy poco</label>
                                                </li>
                                            </ul>
                                            <ul class="icheck-list">
                                                <li>
                                                    <input tabindex="7" type="radio" class="check" id="minimal-radio-4" value="true" name="pre_7">
                                                    <label for="minimal-radio-1">Mejoro bastante</label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label>8. ¿Qué temas te gustaría que se trataran en conferencias futuras? </label>
                                        <div class="input-group">
                                            <select class="form-control" name="pre_8" required>
                                                <option value="Tecnologia">Tecnologia</option>
                                                <option value="Sociales">Temas Sociales</option>
                                                <option value="Talleres">Talleres</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label>9. ¿Recomendarias este evento a tus amigos? </label>
                                        <div class="input-group">
                                            <ul class="icheck-list">
                                                <li>
                                                    <input tabindex="7" type="radio" class="check" id="minimal-radio-3" value="false" name="pre_9">
                                                    <label for="minimal-radio-1">Nunca</label>
                                                </li>
                                            </ul>
                                            <ul class="icheck-list">
                                                <li>
                                                    <input tabindex="7" type="radio" class="check" id="minimal-radio-4" value="true" name="pre_9">
                                                    <label for="minimal-radio-1">Si, lo recomiendo</label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label>10. ¿Qué probabilidad existe de que asistas a uno de nuestros eventos en el futuro? </label>
                                        <div class="input-group">
                                            <ul class="icheck-list">
                                                <li>
                                                    <input tabindex="7" type="radio" class="check" id="minimal-radio-3" value="false" name="pre_10">
                                                    <label for="minimal-radio-1">Poco probable</label>
                                                </li>
                                            </ul>
                                            <ul class="icheck-list">
                                                <li>
                                                    <input tabindex="7" type="radio" class="check" id="minimal-radio-4" value="true" name="pre_10">
                                                    <label for="minimal-radio-1">Estare presente</label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <input hidden type="text" name="id_evt" value="<?php echo $_GET['id'];?>"/>
                                    <input hidden type="text" name="id_usr" value="<?php echo $id_usr;?>"/>
                                <div class="form-group m-b-0">
                                    <div class="offset-sm-3 col-sm-9">
                                    <button type="submit" class="btn btn-success waves-effect waves-light">Enviar</button>
                                    <button type="reset" class="btn btn-primary waves-effect waves-light">Cancelar</button>
                                    </div>
                                </div>
                            </div>
                                </div>
                            </form>
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