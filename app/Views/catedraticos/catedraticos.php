<?= $this->extend("layouts/dash") ?>
<?= $this->section("body") ?>


<div class="container p-5">
    <a href="<?php echo base_url('public/catedraticos/crear') ?>" class="btn btn-success mb-2">Crear Catedrático</a>
    <div class="row mt-3">
        <table class="table table-bordered" id="catedraticos">
            <thead>
                <th>Id</th>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Email</th>
                <th>Telefono</th>
                <th>Opciones</th>
             </thead>
            <tbody>
                <?php if($catedraticos) : ?>
                    <?php foreach($catedraticos as $catedratico): ?>
                        <tr>
                            <td><?php echo $catedratico['id']; ?></td>
                            <td><?php echo $catedratico['nombre']; ?></td>
                            <td><?php echo $catedratico['direccion']; ?></td>
                            <td><?php echo $catedratico['email']; ?></td>
                            <td><?php echo $catedratico['telefono']; ?></td>
                            <td>
                                <a href="<?php echo base_url('public/catedraticos/editar/'.$catedratico['id']); ?>" class="btn btn-success">Editar</a>
                                <a href="<?php echo base_url('public/catedraticos/eliminar/'.$catedratico['id']); ?>" class="btn btn-danger">Eliminar</a>
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
       $('#catedraticos').DataTable();
    });
</script>

<?= $this->endSection() ?>