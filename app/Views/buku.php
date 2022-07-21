<?= $this->extend('template/layout_grocery'); ?>

<?= $this->section('kontainer'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Hello, <?= $nama ?> !</h1>
            <div class="card-body">
                <p>Tabel buku</p>
                <div>
                    <a href='<?php echo site_url('examples/customers_management') ?>'>Customers</a> |
                    <a href='<?php echo site_url('examples/orders_management') ?>'>Orders</a> |
                    <a href='<?php echo site_url('examples/products_management') ?>'>Products</a> |
                    <a href='<?php echo site_url('examples/offices_management') ?>'>Offices</a> |
                    <a href='<?php echo site_url('examples/employees_management') ?>'>Employees</a> |
                    <a href='<?php echo site_url('examples/film_management') ?>'>Films</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo $this->endSection(); ?>