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
                                <form action="<?php echo base_url('public/asignaturas/actualizar'); ?>" name="crear_asignatura" id="crear_asignatura" method="post" accept-charset="utf-8">
                                    <input type="hidden" name="id" , id="id" value="<?php echo $asignaturas['id'] ?>">
                                    <div class="mb-3">
                                        <label for="nombre">Nombre:</label>
                                        <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $asignaturas['nombre'] ?>" required>
                                    </div>
                                    <div class="row justify-content-center">
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

<?= $this->endSection() ?>