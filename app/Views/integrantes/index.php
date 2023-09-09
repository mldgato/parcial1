<?php include(APPPATH . 'Views/templates/head.php'); ?>
<div class="row">
    <div class="col">
        <div class="card border-info mt-3">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h2 class="text-info">Lista de integrantes <i class="fa-solid fa-person-rays"></i></h2>
                    </div>
                    <div class="col d-flex justify-content-end">
                        <a href="<?php echo base_url('integrantes/create/'); ?>" class="btn btn-success btn-lg">Nuevo integrante
                            <i class="fa-solid fa-user-plus"></i></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-hover" id="tableData">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Nacimiento</th>
                                <th>Muerte</th>
                                <th>web</th>
                                <th>Pais</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($integrantes as $integrante) :
                            ?>
                                <tr>
                                    <td><?= $integrante->integrante_id; ?></td>
                                    <td><?= $integrante->nombre; ?></td>
                                    <td><?= $integrante->apellido; ?></td>
                                    <td><?= $integrante->fecha_nacimiento; ?></td>
                                    <td><?= $integrante->fecha_muerte; ?></td>
                                    <td><?= $integrante->web_oficial; ?></td>
                                    <td><?= $integrante->nombre_pais; ?></td>
                                    <td>
                                        <div class="d-flex justify-content-between">
                                            <a href="<?php echo base_url('integrantes/edit/' . $integrante->integrante_id); ?>" class="btn btn-primary btn-sm me-1"><span class="d-none d-md-inline">Editar</span>
                                                <i class="fa-solid fa-pen-to-square"></i></a>
                                            <button type="button" class="btn btn-danger btn-sm ms-1" onclick="confirmarEliminacion('<?php echo base_url('integrantes/delete/' . $integrante->integrante_id); ?>')"><span class="d-none d-md-inline">Eliminar</span>
                                                <i class="fa-solid fa-trash-can"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            endforeach
                            ?>
                        </tbody>
                        <tfoot class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Nacimiento</th>
                                <th>Muerte</th>
                                <th>web</th>
                                <th>Pais</th>
                                <th>&nbsp;</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
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
<script type="text/javascript">
    function confirmarEliminacion(url) {
        Swal.fire({
            title: '¿Eliminar al integrante?',
            text: "¿Está seguro que quiere eliminar al integrante? Ya no podrá usar la información una vez la elimine",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Si, eliminar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        })
    }
    $(document).ready(function() {
        $('#tableData').DataTable();
    });
</script>
<?php include(APPPATH . 'Views/templates/foot.php'); ?>