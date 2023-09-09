<?php include(APPPATH . 'Views/templates/head.php'); ?>

<div class="row">
    <div class="col">
        <div class="card border-success mt-3">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h2 class="text-success">Crear nuevo integrante <i class="fa-solid fa-person-rays"></i></h2>
                    </div>
                    <div class="col d-flex justify-content-end">
                        <a href="<?php echo base_url('integrantes/index/'); ?>" class="btn btn-warning btn-lg">Regresar <i class="fas fa-backward"></i></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="<?php echo base_url('integrantes/store'); ?>" method="post" name="formStore" id="formStore" accept-charset="utf-8" autocomplete="off">
                    <div class="row mt-3">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="nombre">Nombres: <small class="text-danger">*</small></label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?= old('nombre') ?>">
                                </div>
                                <?php if (session('errors.nombre')) : ?>
                                    <small class="text-danger"><?= session('errors.nombre') ?></small>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="apellido">Apellidos: <small class="text-danger">*</small></label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="far fa-user"></i></span>
                                    <input type="text" class="form-control" id="apellido" name="apellido" value="<?= old('apellido') ?>">
                                </div>
                                <?php if (session('errors.apellido')) : ?>
                                    <small class="text-danger"><?= session('errors.apellido') ?></small>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="pais_id">País: <small class="text-danger">*</small></label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fas fa-globe-americas"></i></span>
                                    <select name="pais_id" id="pais_id" class="form-control">
                                        <option value="" selected>- Seleccione -</option>
                                        <?php foreach ($paises as $pais) : ?>
                                            <option value="<?= $pais->pais_id; ?>" <?= (old('pais_id') == $pais->pais_id) ? 'selected' : ''; ?>>
                                                <?= $pais->nombre; ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <?php if (session('errors.pais_id')) : ?>
                                    <small class="text-danger"><?= session('errors.pais_id') ?></small>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="web_oficial">Sitio Web:</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fas fa-globe"></i></span>
                                    <input type="text" class="form-control" id="web_oficial" name="web_oficial" value="<?= old('web_oficial') ?>">
                                </div>
                                <?php if (session('errors.web_oficial')) : ?>
                                    <small class="text-danger"><?= session('errors.web_oficial') ?></small>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="fecha_nacimiento">Fecha de nacimiento: <small class="text-danger">*</small></label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="<?= old('fecha_nacimiento') ?>">
                                </div>
                                <?php if (session('errors.fecha_nacimiento')) : ?>
                                    <small class="text-danger"><?= session('errors.fecha_nacimiento') ?></small>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="fecha_muerte">Fecha de muerte:</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fas fa-calendar-plus"></i></span>
                                    <input type="date" class="form-control" id="fecha_muerte" name="fecha_muerte" value="<?= old('fecha_muerte') ?>">
                                </div>
                                <?php if (session('errors.fecha_muerte')) : ?>
                                    <small class="text-danger"><?= session('errors.fecha_muerte') ?></small>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-xs-12 text-center">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg" name="submit" id="submit">Guardar <i class="fas fa-save"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
if (isset($_SESSION['message'])) {
?>
    <script type="text/javascript">
        Swal.fire('Información', '<?php echo $_SESSION['message']; ?>', '<?php echo $_SESSION['alert-class']; ?>');
    </script>
<?php
}
?>
<?php include(APPPATH . 'Views/templates/foot.php'); ?>