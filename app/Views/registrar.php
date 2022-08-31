<?= $this->extend("layouts/app") ?>
<?= $this->section("body") ?>


<main class="d-flex w-100">
    <div class="container d-flex flex-column">
        <div class="row vh-100">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">

                    <div class="text-center mt-4">
                        <h1 class="h2">Comencemos</h1>
                        <p class="lead">
                            Ingresa tus datos para el registro.
                        </p>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <?php if (isset($validation)) : ?>
                                <div class="col-12">
                                    <div class="alert alert-danger" role="alert">
                                        <?= $validation->listErrors() ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="m-sm-4">
                                <form action="<?= base_url('public/registrar') ?>" method="post" autocomplete="off">
                                    <div class="mb-3">
                                        <label class="form-label">Nombre</label>
                                        <input class="form-control form-control-lg" type="text" name="nombre" placeholder="Enter your name" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Correo Electronico</label>
                                        <input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Telefono</label>
                                        <input class="form-control form-control-lg" type="text" name="telefono" placeholder="Enter your company name" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Usuario</label>
                                        <input class="form-control form-control-lg" type="text" name="usuario" placeholder="Enter your company name" autocomplete="off" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input class="form-control form-control-lg" type="password" name="password" placeholder="Enter password" autocomplete="off" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Confirmar Password</label>
                                        <input class="form-control form-control-lg" type="password" name="confirmar_password" placeholder="Enter password" />
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-md-auto mt-3" align="center">
                                            <a href="javascript:window.history.go(-1)" class="btn btn-success" role="button">Ir Atras</a>
                                        </div>
                                        <div class="col-md-auto mt-3" align="center">
                                            <button type="submit" class="btn btn-primary">Registrar</button>
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