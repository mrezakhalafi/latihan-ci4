<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-8">
            <h2>Form Tambah Data Komik</h2>
            <?php // echo($validation->listErrors()); 
            ?>
            <form class="mt-4" action="/komik/save" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group row">
                    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= $validation->hasError('Judul') ? 'is-invalid' : '' ?>" id="judul" name="Judul" placeholder="Judul" value="<?= old('Judul') ?>" autofocus>
                        <div class="invalid-feedback"><?= $validation->getError('Judul') ?></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= $validation->hasError('Penulis') ? 'is-invalid' : '' ?>" id="penulis" name="Penulis" placeholder="Penulis" value="<?= old('Penulis') ?>">
                        <div class="invalid-feedback"><?= $validation->getError('Penulis') ?></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= $validation->hasError('Penerbit') ? 'is-invalid' : '' ?>" id="penerbit" name="Penerbit" placeholder="Penerbit" value="<?= old('Penerbit') ?>">
                        <div class="invalid-feedback"><?= $validation->getError('Penerbit') ?></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Sampul</label>
                    <div class="col-sm-2">
                        <img src="/images/default.svg" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-10">
                        <!-- <input type="text" class="form-control <?= $validation->hasError('Sampul') ? 'is-invalid' : '' ?>" id="sampul" name="Sampul" placeholder="Sampul" value="<?= old('Sampul') ?>"> -->
                        <div class="custom-file">
                            <input onchange="previewImage()" type="file" name="Sampul" class="custom-file-input <?= $validation->hasError('Sampul') ? 'is-invalid' : '' ?>" id="sampul">
                            <label class="custom-file-label" for="sampul">Choose file</label>
                            <div class="invalid-feedback"><?= $validation->getError('Sampul') ?></div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>