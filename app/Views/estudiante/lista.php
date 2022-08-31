
<?= $this->extend("layouts/dash") ?>
<?= $this->section("body") ?>


<div class="container p-5">
    <a href="<?php echo base_url('public/estudiante/agregarEstudiante') ?>" class="btn btn-success mb-2">Crear Alumno</a>
    <br>
    <div class="row mt-3">
        <table class="table table-bordered" id="estudiantes">
            <thead>
                <th>Id</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Opciones</th>
            </thead>
            <tbody>
                <?php if($estudiantes) : ?>
                    <?php foreach($estudiantes as $estudiante): ?>
                        <tr>
                            <td><?php echo $estudiante['id']; ?></td>
                            <td><?php echo $estudiante['nombre']; ?></td>
                            <td><?php echo $estudiante['email']; ?></td>
                            <td>
                                <a href="<?php echo base_url('public/estudiante/editarEstudiante/'.$estudiante['id']); ?>" class="btn btn-success">Editar</a>
                                <a href="<?php echo base_url('public/estudiante/eliminarEstudiante/'.$estudiante['id']); ?>" class="btn btn-danger">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>        
 

<!-- Bootstrap JavaScript Libraries -->
<script>
    $(document).ready(function () {
       $('#estudiantes').DataTable();
    });
</script>

<?= $this->endSection() ?>




