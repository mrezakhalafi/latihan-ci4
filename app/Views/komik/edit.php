<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-8">
            <h2>Form Edit Data Komik</h2>
            <?php // echo($validation->listErrors()); 
            ?>
            <form class="mt-4" action="/komik/update/<?= $komik['id'] ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group row">
                    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= $validation->hasError('Judul') ? 'is-invalid' : '' ?>" id="judul" name="Judul" placeholder="Judul" value="<?= old('Judul') ? old('Judul') : $komik['judul'] ?>" autofocus>
                        <div class="invalid-feedback"><?= $validation->getError('Judul') ?></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= $validation->hasError('Penulis') ? 'is-invalid' : '' ?>" id="penulis" name="Penulis" placeholder="Penulis" value="<?= old('Penulis') ? old('Penulis') : $komik['penulis'] ?>">
                        <div class="invalid-feedback"><?= $validation->getError('Penulis') ?></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= $validation->hasError('Penerbit') ? 'is-invalid' : '' ?>" id="penerbit" name="Penerbit" placeholder="Penerbit" value="<?= old('Penerbit') ? old('Penerbit') : $komik['penerbit'] ?>">
                        <div class="invalid-feedback"><?= $validation->getError('Penerbit') ?></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
                    <div class="col-sm-2">
                        <img src="/images/<?= $komik['sampul'] ?>" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-10">
                        <!-- <input type="text" class="form-control <?= $validation->hasError('Sampul') ? 'is-invalid' : '' ?>" id="sampul" name="Sampul" placeholder="Sampul" value="<?= old('Sampul') ?>"> -->
                        <div class="custom-file">
                            <input onchange="previewImage()" type="file" name="Sampul" class="custom-file-input <?= $validation->hasError('Sampul') ? 'is-invalid' : '' ?>" id="sampul">
                            <label class="custom-file-label" for="sampul"><?= $komik['sampul'] ?></label>
                            <div class="invalid-feedback"><?= $validation->getError('Sampul') ?></div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="Slug" value="<?= $komik['slug'] ?>">
                <input type="hidden" name="sampulLama" value="<?= $komik['sampul'] ?>">
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Edit Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>