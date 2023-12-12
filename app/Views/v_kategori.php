<?= $this->extend('layout/main') ?>
<?= $this->section('main') ?>
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Data Kategori</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ?>">Home</a></li>
                <li class="breadcrumb-item active"><a href="<?= base_url('/kategori') ?>">Kategori</a></li>
            </ol>
        </div>
    </div>

    <!-- row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".modalTambah"><i class="fas fa-plus"></i> Tambah Data</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tableKategori" class="display" style="min-width: 845px">
                            <thead align="center">
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Kategori</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-dark">
                                <?php
                                $i = 1;
                                foreach ($kategori as $k) : ?>
                                    <tr>
                                        <td align="center" class="w-5"><?= $i++ ?></td>
                                        <td><?= $k['nama_kategori'] ?></td>
                                        <td align="center" class="w-15">
                                            <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".modalEdit<?= $k['id_kategori'] ?>"><i class="fas fa-pen"></i></button>
                                            <button type="button" class="btn btn-sm btn-danger ml-2" data-toggle="modal" data-target=".modalHapus<?= $k['id_kategori'] ?>"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                            <tfoot align="center">
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Kategori</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade modalTambah" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Tambah Kategori</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open(base_url('kategori/tambah')) ?>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label text-dark">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama_kategori" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>
<!-- End Modal Tambah -->

<!-- Modal Ubah -->
<?php foreach ($kategori as $k) : ?>
    <div class="modal fade modalEdit<?= $k['id_kategori'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Form Edit Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?= form_open(base_url('kategori/edit/' . $k['id_kategori'])) ?>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label text-dark">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama_kategori" value="<?= $k['nama_kategori'] ?>" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
<?php endforeach ?>
<!-- End Modal Ubah -->

<!-- Modal Hapus -->
<?php foreach ($kategori as $k) : ?>
    <div class="modal fade modalHapus<?= $k['id_kategori'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Pesan</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Yakin ingin menghapus <strong><?= $k['nama_kategori'] ?></strong> ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <a href="<?= base_url('kategori/hapus/' . $k['id_kategori']) ?>" class="btn btn-danger">Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>
<!-- End Modal Hapus -->
<?= $this->endSection() ?>