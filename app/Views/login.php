<?= $this->extend("layouts/app") ?>
<?= $this->section("body") ?>

<main class="d-flex w-100">
    <div class="container d-flex flex-column">
        <div class="row vh-100">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">

                    <div class="text-center mt-4">
                        <h1 class="h2">Bienvenidos!</h1>
                        <p class="lead">
                            Ingresa tus datos para continuar
                        </p>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="m-sm-4">
                                <div class="text-center">
                                    <img src="img/avatars/logo.jpg" alt="UJCV"
                                        class="img-fluid" width="132" height="132" />
                                </div>
                                <?php if (isset($validation)) : ?>
                                    <div class="col-12">
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->listErrors() ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <form action="<?= base_url('public/login') ?>" method="post" autocomplete="off">
                                    <div class="mb-3">
                                        <label class="form-label">Usuario</label>
                                        <input class="form-control form-control-lg" type="text" name="usuario"
                                            placeholder="Ingrese su usuario" autocomplete="off"/>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input class="form-control form-control-lg" type="password" name="password"
                                            placeholder="Ingrese su password" autocomplete="off"/>
                                        <!-- <small>
                                            <a href="index.html">Forgot password?</a>
                                        </small> -->
                                    </div>
                                    <!-- <div>
                                        <label class="form-check">
                                            <input class="form-check-input" type="checkbox" value="remember-me"
                                                name="remember-me" checked>
                                            <span class="form-check-label">
                                                Remember me next time
                                            </span>
                                        </label>
                                    </div> -->
                                    <div class="row justify-content-center">
                                        <div class="col-md-auto">
                                            <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
                                        </div>
                                        <div class="col-md-auto">
                                            <a href="<?= base_url('public/registrar')?>" class="btn btn-primary"
                                                role="button">Registrar</a>
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