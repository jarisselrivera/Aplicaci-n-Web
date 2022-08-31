<?= $this->extend("layouts/dash") ?>
<?= $this->section("body") ?>

<main class="d-flex w-100">
    <div class="container d-flex flex-column ">
        <div class="row vh-100">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">
                    <div class="card p-3">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Registrar Secciones</h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="m-sm-4">
                                <form class="form-horizontal" enctype="multipart/form-data" action="javascript:void(0)" id="frm-agregar-secciones">
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="seccion">Nombre de la Sección:</label>
                                        <input type="text" class="form-control" required id="seccion" placeholder="Ingrese el nombre" name="seccion">
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="secciones">Asignatura:</label>
                                        <select name="seccion" id="seccion" class="form-select">
                                            <option value="" selected disabled>Seleccionar Asignatura</option>
                                            <?php foreach ($secciones as $key => $seccion) { ?>
                                                <option value="<?= $seccion['idasignaturas'] ?>"> <?= $seccion['idasignaturas'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="horario">Horario:</label>
                                        <input type="text" class="form-control" required id="horario" placeholder="Ingrese el horario" name="horario">
                                    </div>
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
<!-- Bootstrap JavaScript Libraries -->

<script>
    $(function() {
        //Agregar validacion al formulario
        $('#frm-agregar-secciones').validate();

        //Envio de la imagen con Ajax
        $('#frm-agregar-secciones').on('submit', function(e) {
            e.preventDefault();

            var dataFormulario = new FormData(this);

            $.ajax({
                url: "<?= base_url('public/secciones/salvarSecciones') ?>",
                type: "POST",
                cache: false,
                data: dataFormulario,
                processData: false,
                contentType: false,
                dataType: "JSON",
                success: function(data) {
                    if (data.success == true) {
                        Swal.fire('Ingresado', 'secciones ingresada', 'success').then(function() {
                            location.href = '<?= base_url('public/secciones') ?>';
                        });
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR, textStatus, errorThrown);
                    alert('Error al agregar datos');
                }
            });
        });
    });
</script>

<?= $this->endSection() ?>