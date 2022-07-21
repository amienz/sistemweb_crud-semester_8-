<?= $this->extend('template/layout'); ?>

<?= $this->section('kontainer'); ?>

                    <?php if (session()->getflashdata('label') != '') { ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->getflashdata('label'); ?>
                        </div>
                    <?php } ?>
                    <!-- <a href="user/create" id="tambah" class="btn btn-rounded btn-success mb-3">Tambah Anggota</a> -->
                    <a href="#" id="tambah" class="btn btn-rounded btn-success mb-3">Tambah Anggota</a>
                    <div id="viewdata"></div>

        <div id="viewmodal" style="display:none ;"></div>                
    <?php echo $this->endSection(); ?>