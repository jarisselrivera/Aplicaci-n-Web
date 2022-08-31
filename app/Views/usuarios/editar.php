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
                                <form action="<?php echo base_url('public/usuarios/actualizar'); ?>" name="crear_usuario" id="crear_usuario" method="post" accept-charset="utf-8">
                                    <input type="hidden" name="id" , id="id" value="<?php echo $usuario['id'] ?>">
                                    <div class="mb-3">
                                        <label for="nombre">Nombre Completo:</label>
                                        <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $usuario['nombre'] ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="correo">Correo Electronico:</label>
                                        <input type="text" name="correo" id="correo" class="form-control" value="<?php echo $usuario['email'] ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="telefono">Telefono:</label>
                                        <input type="text" name="telefono" id="telefono" class="form-control" value="<?php echo $usuario['telefono'] ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="usuario">Usuario:</label>
                                        <input type="text" name="usuario" id="usuario" class="form-control" value="<?php echo $usuario['usuario'] ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password">Password:</label>
                                        <input type="password" name="password" id="password" class="form-control" autocomplete="new-password">
                                    </div>
                                    <div class="mb-3">
                                        <label for="confirmar_password">Confirmar Password:</label>
                                        <input type="password" name="confirmar_password" id="confirmar_password" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label class="control-label col-sm-2" for="imagenperfil"></label>
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