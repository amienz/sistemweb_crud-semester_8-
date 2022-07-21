<?= $this->extend('template/layout'); ?>

<?= $this->section('kontainer'); ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Hello, <?= $nama ?> !</h1>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
                    Nesciunt ad non eligendi nisi, rem, beatae nobis soluta quis ducimus ipsam 
                    perspiciatis atque corrupti possimus? Animi neque inventore odit labore 
                    voluptatibus.</p>
                <h1>Daftar Peserta :</h1>
                <ul>
                    <?php foreach ($list as $item) {
                        echo "<li> $item </li>";
                    } ?>
                </ul>
            </div>
        </div>
    </div>
    <?php echo $this->endSection(); ?>