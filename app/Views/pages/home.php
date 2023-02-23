<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-12 text-center my-5">
            <h1>INDEX</h1>
            <?= d($title); ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>