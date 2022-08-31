<?= $this->extend("layouts/dash") ?>
<?= $this->section("body") ?>


<main class="d-flex w-100">
    <div class="container d-flex flex-column ">
        <div class="row vh-100">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">
                    <div class="card">
                        <div class="card-body">
                            <div class="m-sm-4">
                                <form class="form-horizontal" enctype="multipart/form-data" action="javascript:void(0)" id="frm-editar-estudiante">
                                    <div class="row justify-content-center">
                                        <div class="col-3 mt-3" align="center">
                                            <img src="<?php echo base_url('public/') ?>/<?php echo $estudiante['imagenperfil'] ?>" alt="" width="40%">
                                        </div>
                                    </div>

                                    <input type="hidden" name="id" id="id" value="<?php echo $estudiante['id'] ?>">
                                    <input type="hidden" name="img" id="img" value="<?php echo $estudiante['imagenperfil'] ?>">
                                    <div class="mb-3">
                                        <label class="control-label col-sm-2" for="nombre">Nombre:</label>
                                        <input type="text" class="form-control" required id="nombre" value="<?php echo $estudiante['nombre'] ?>" name="nombre">
                                    </div>
                                    <div class="mb-3">
                                        <label class="control-label col-sm-2" for="email">Email:</label>
                                        <input type="text" class="form-control" required id="email" value="<?php echo $estudiante['email'] ?>" name="email">
                                    </div>
                                    <div class="mb-3">
                                        <label class="control-label col-sm-2" for="telefono">Teléfono:</label>
                                        <input type="text" class="form-control" required id="telefono" value="<?php echo $estudiante['telefono'] ?>" name="telefono">
                                    </div>
                                    <div class="mb-3">
                                        <label class="control-label col-sm-2" for="imagenperfil">Imagen:</label>
                                        <input type="file" accept="image/*" class="form-control" id="imagenperfil" name="imagenperfil">
                                    </div>

                                    <div class="row justify-content-center mt-3">
                                        <div class="col-md-auto mt-3" align="center">
                                            <a href="javascript:window.history.go(-1)" class="btn btn-success" role="button">Ir Atras</a>
                                        </div>
                                        <div class="col-md-auto mt-3" align="center">
                                            <button type="submit" class="btn btn-success float-md-left">Guardar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    $(function() {
        //Agregar validacion al formulario
        $('#frm-editar-estudiante').validate();

        //Envio de la imagen con Ajax
        $('#frm-editar-estudiante').on('submit', function(e) {
            e.preventDefault();
            var dataFormulario = new FormData(this);
            $.ajax({
                url: "<?= base_url('public/estudiante/actualizarEstudiante') ?>",
                type: "POST",
                cache: false,
                data: dataFormulario,
                processData: false,
                contentType: false,
                dataType: "JSON",
                success: function(data) {
                    if (data.success == true) {
                        Swal.fire('Actualizado', 'Estudiante Actualizado', 'success').then(function() {
                            location.href = '<?= base_url('public/estudiantes') ?>';
                        });
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error al actualizar datos');
                }
            });
        });
    });
</script>

<?= $this->endSection() ?>