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
                                <form action="<?php echo base_url('public/catedraticos/actualizar'); ?>" name="crear_catedratico" id="crear_catedratico" method="post" accept-charset="utf-8">
                                    <input type="hidden" name="id" , id="id" value="<?php echo $catedraticos['id'] ?>">
                                    <div class="mb-3">
                                        <label for="nombre">Nombre:</label>
                                        <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $catedraticos['nombre'] ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="direccion">Dirección:</label>
                                        <input type="text" name="direccion" id="direccion" class="form-control" value="<?php echo $catedraticos['direccion'] ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email">Correo Electronico:</label>
                                        <input type="text" name="email" id="email" class="form-control" value="<?php echo $catedraticos['email'] ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="telefono">Telefono:</label>
                                        <input type="text" name="telefono" id="telefono" class="form-control" value="<?php echo $catedraticos['telefono'] ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="control-label col-sm-2" for="imagenperfil">Imagen:</label>
                                        <div class="col-sm-10">
                                            <input type="file" accept="image/*" class="form-control" id="imagenperfil" name="imagenperfil">
                                        </div>
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