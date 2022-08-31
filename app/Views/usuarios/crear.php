<?= $this->extend("layouts/dash") ?>
<?= $this->section("body") ?>

<main class="d-flex w-100">
    <div class="container d-flex flex-column ">
        <div class="row vh-100">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">
                    <div class="card">
                        <!-- <div class="card-header">
                            <h5 class="card-title mb-0">Registrar Usuario</h5>
                        </div> -->
                        <div class="card-body">
                            <div class="m-sm-4">
                                <form class="form-horizontal" enctype="multipart/form-data" action="javascript:void(0)" id="frm-agregar-usuario">
                                    <div class="mb-3">
                                        <label for="nombre">Nombre Completo:</label>
                                        <input type="text" class="form-control" required id="nombre" placeholder="Ingrese el nombre" name="nombre">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email">Email:</label>
                                        <input type="text" class="form-control" required id="email" placeholder="Ingrese el email" name="email">
                                    </div>
                                    <div class="mb-3">
                                        <label for="telefono">Teléfono:</label>
                                        <input type="text" class="form-control" required id="telefono" placeholder="Ingrese el telefono" name="telefono">
                                    </div>
                                    <div class="mb-3">
                                        <label for="usuario">Usuario:</label>
                                        <input type="text" class="form-control" required id="usuario" placeholder="Ingrese el usuario" name="usuario">
                                    </div>
                                    <div class="mb-3">
                                        <label for="password">Password:</label>
                                        <input type="password" name="password" id="password" placeholder="Ingrese la contraseña" class="form-control" autocomplete="new-password">
                                    </div>
                                    <div class="mb-3">
                                        <label for="confirmar_password">Confirmar Password:</label>
                                        <input type="password" name="confirmar_password" id="confirmar_password" placeholder="Confirmar contraseña" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="imagenperfil">Imagen:</label>
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
        $('#frm-agregar-usuario').validate();

        //Envio de la imagen con Ajax
        $('#frm-agregar-usuario').on('submit', function(e) {
            e.preventDefault();

            var dataFormulario = new FormData(this);

            $.ajax({
                url: "<?= base_url('public/usuarios/almacenar') ?>",
                type: "POST",
                cache: false,
                data: dataFormulario,
                processData: false,
                contentType: false,
                dataType: "JSON",
                success: function(data) {
                    if (data.success == true) {
                        Swal.fire('Ingresado', 'Usuarios ingresado', 'success').then(function() {
                            location.href = '<?= base_url('public/usuarios') ?>';
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