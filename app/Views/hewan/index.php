<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col-6">
            <h1>Daftar Hewan</h1>
            <form action="" method="POST">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Masukan Cari Pencarian..." name="keyword" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" type="submit" name="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <a href="/komik/create"><button class="btn btn-primary mb-3">Tambah Hewan</button></a>


            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan') ?>
                </div>
            <?php endif; ?>

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Hewan</th>
                        <th scope="col">Harga Hewan</th>
                        <th scope="col">Nama Owner</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1 + (10 * ($currentPage - 1));
                    foreach ($hewan as $h) : ?>
                        <tr>
                            <th scope="row"><?= $i++ ?></th>
                            <td><?= $h['nama_hewan'] ?></td>
                            <td><?= $h['harga_hewan'] ?></td>
                            <td><?= $h['nama_owner'] ?></td>
                            <td><a href="/hewan/<?= $h['id'] ?>"><button class="btn btn-success">Lihat Detail</button></a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?= $pager->links('hewan', 'hewan_pagination'); ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>