<?= $this->extend("layouts/dash") ?>
<?= $this->section("body") ?>

<main class="d-flex w-100">
    <div class="container d-flex flex-column ">
        <div class="row vh-100">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Registrar Catedratico</h5>
                        </div>
                        <div class="card-body">
                            <div class="m-sm-4">
                                <form class="form-horizontal" enctype="multipart/form-data" action="javascript:void(0)" id="frm-agregar-catedratico">
                                    <div class="mb-3">
                                        <label class="control-label col-sm-2" for="nombre">Nombre:</label>
                                        <input type="text" class="form-control" required id="nombre" placeholder="Ingrese el nombre" name="nombre">
                                    </div>
                                    <div class="mb-3">
                                        <label class="control-label col-sm-2" for="direccion">Dirección:</label>
                                        <input type="text" class="form-control" required id="direccion" placeholder="Ingrese la direccion" name="direccion">
                                    </div>
                                    <div class="mb-3">
                                        <label class="control-label col-sm-2" for="email">Email:</label>
                                        <input type="text" class="form-control" required id="email" placeholder="Ingrese el email" name="email">
                                    </div>
                                    <div class="mb-3">
                                        <label class="control-label col-sm-2" for="telefono">Teléfono:</label>
                                        <input type="text" class="form-control" required id="telefono" placeholder="Ingrese el telefono" name="telefono">
                                    </div>
                                    <div class="mb-3">
                                        <label class="control-label col-sm-2" for="imagenperfil">Imagen:</label>
                                        <input type="file" accept="image/*" class="form-control" required id="imagenperfil" name="imagenperfil">
                                    </div>
                                    <br>
                                    <div class="row justify-content-center">
                                        <div class="col-md-auto mt-3" align="center">
                                            <a href="javascript:window.history.go(-1)" class="btn btn-success" role="button">Ir Atras</a>
                                        </div>
                                        <div class="col-md-auto mt-3" align="center">
                                            <button type="submit" class="btn btn-success">Submit</button>
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
        $('#frm-agregar-catedratico').validate();

        //Envio de la imagen con Ajax
        $('#frm-agregar-catedratico').on('submit', function(e) {
            e.preventDefault();

            var dataFormulario = new FormData(this);

            $.ajax({
                url: "<?= base_url('public/catedraticos/salvarCatedratico') ?>",
                type: "POST",
                cache: false,
                data: dataFormulario,
                processData: false,
                contentType: false,
                dataType: "JSON",
                success: function(data) {
                    if (data.success == true) {
                        Swal.fire('Ingresado', 'catedratico ingresado', 'success').then(function() {
                            location.href = '<?= base_url('public/catedraticos') ?>';
                        });
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error al agregar datos');
                }
            });
        });
    });
</script>
<?= $this->endSection() ?>