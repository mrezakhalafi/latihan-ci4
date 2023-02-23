<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <img class="card-img-top" src="/images/<?= $komik['sampul'] ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?= $komik['judul'] ?></h5>
                    <p class="card-text"><?= $komik['penulis'] ?></p>
                    <p class="card-text"><small class="text-muted"><?= $komik['penerbit'] ?></small></p>

                    <a href="/komik/edit/<?= $komik['slug'] ?>"><button class="btn btn-warning">Edit</button></a>
                    <form action="/komik/<?= $komik['id'] ?>" method="POST" class="d-inline">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-danger" type="submit" onclick="return confirm('Apakah anda yakin?')">Delete</button></a>
                    </form>
                    <!-- <a href="/komik/delete/<?= $komik['id'] ?>"><button class="btn btn-danger">Delete</button></a> -->
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->endSection(); ?>