<?= $this->extend('template/layout'); ?>

<?= $this->section('kontainer'); ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Hello, <?= $nama ?> !</h1>
                <div class="card-body">
                    <p>Ini halaman about</p>
                </div>
            </div>
        </div>
    </div>
    <?php echo $this->endSection(); ?>