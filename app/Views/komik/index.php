<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <a href="/komik/create"><button class="btn btn-primary mb-3">Tambah Komik</button></a>
            <h1>Daftar Komik</h1>

            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan') ?>
                </div>
            <?php endif; ?>

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Sampul</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($komik as $k) : ?>
                        <tr>
                            <th scope="row"><?= $i++ ?></th>
                            <td><img class="sampul" src="/images/<?= $k['sampul'] ?>"></td>
                            <td><?= $k['judul'] ?></td>
                            <td><a href="/komik/<?= $k['slug'] ?>"><button class="btn btn-success">Lihat Detail</button></a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>