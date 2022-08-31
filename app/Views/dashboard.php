<?= $this->extend("layouts/dash") ?>
<?= $this->section("body") ?>

<div class="row p-5">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h5 class="card-title mb-0">Dashboard</h5>
            </div>
            <div class="card-body">
                <h1>Bienvenido al Sistema, <?= session()->get('nombre') ?></h1>
                <hr>
                <h3><a href="<?= base_url('public/logout') ?>" class="btn btn-danger">Cerrar Sesión</a></h3>
            </div>   
         </div>
    </div>
</div>

<?= $this->endSection() ?>