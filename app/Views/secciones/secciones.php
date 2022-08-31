<?= $this->extend("layouts/dash") ?>
<?= $this->section("body") ?>

<div class="container p-5">
    <a href="<?php echo base_url('public/secciones/crear') ?>" class="btn btn-success mb-2">Crear Secciones</a>
    <div class="row mt-3">
        <table class="table table-bordered" id="secciones">
            <thead>
                <th>Id</th>
                <th>Nombre</th>
                <th>Asignatura</th>
                <th>Horario</th>
                <th>Opciones</th>
            </thead>
            <tbody>
                <?php if($secciones) : ?>
                    <?php foreach($secciones as $seccion): ?>
                        <tr>
                            <td><?php echo $seccion['id']; ?></td>
                            <td><?php echo $seccion['nombre']; ?></td>
                            <td><?php echo $seccion['idasignaturas']; ?></td>
                            <td><?php echo $seccion['horario']; ?></td>
                            <td>
                                <a href="<?php echo base_url('public/secciones/editar/'.$seccion['id']); ?>" class="btn btn-success">Editar</a>
                                <a href="<?php echo base_url('public/secciones/eliminar/'.$seccion['id']); ?>" class="btn btn-danger">Eliminar</a>
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
       $('#secciones').DataTable();
    });
</script>

<?= $this->endSection() ?>