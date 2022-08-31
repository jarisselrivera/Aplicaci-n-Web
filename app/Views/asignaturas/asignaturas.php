<?= $this->extend("layouts/dash") ?>
<?= $this->section("body") ?>

<div class="container p-5">
    <a href="<?php echo base_url('public/asignaturas/crear') ?>" class="btn btn-success mb-2">Crear Asignatura</a>
    <div class="row mt-3">
        <table class="table table-bordered" id="asignaturas">
            <thead>
                <th>Id</th>
                <th>Nombre Asignatura</th>
                <th>Id Catedratico</th>
                <th>Opciones</th>
            </thead>
            <tbody>
                <?php if($asignaturas) : ?>
                    <?php foreach($asignaturas as $asignatura): ?>
                        <tr>
                            <td><?php echo $asignatura['id']; ?></td>
                            <td><?php echo $asignatura['nombre']; ?></td>
                            <td><?php echo $asignatura['catedraticos_id']; ?></td>
                            <td>
                                <a href="<?php echo base_url('public/asignaturas/editar/'.$asignatura['id']); ?>" class="btn btn-success">Editar</a>
                                <a href="<?php echo base_url('public/asignaturas/eliminar/'.$asignatura['id']); ?>" class="btn btn-danger">Eliminar</a>
                            </td>
                        </tr>                                
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready(function () {
       $('#asignaturas').DataTable();
    });
</script>

<?= $this->endSection() ?>