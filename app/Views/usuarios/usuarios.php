<?= $this->extend("layouts/dash") ?>
<?= $this->section("body") ?>

<div class="container p-5">
    <a href="<?php echo base_url('public/usuarios/crear') ?>" class="btn btn-success mb-2">Crear Usuario</a>
    <div class="row mt-3">
        <table class="table table-bordered" id="usuarios">
            <thead>
                <th>Id</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Opciones</th>
            </thead>
            <tbody>
                <?php if($usuarios) : ?>
                    <?php foreach($usuarios as $usuario): ?>
                        <tr>
                            <td><?php echo $usuario['id']; ?></td>
                            <td><?php echo $usuario['nombre']; ?></td>
                            <td><?php echo $usuario['email']; ?></td>
                            <td>
                                <a href="<?php echo base_url('public/usuarios/editar/'.$usuario['id']); ?>" class="btn btn-success">Editar</a>
                                <a href="<?php echo base_url('public/usuarios/eliminar/'.$usuario['id']); ?>" class="btn btn-danger">Eliminar</a>
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
       $('#usuarios').DataTable();
    });
</script>

<?= $this->endSection() ?>





