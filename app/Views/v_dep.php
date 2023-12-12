<?= $this->extend('layout/main') ?>
<?= $this->section('main') ?>
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Data Departemen</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ?>">Home</a></li>
                <li class="breadcrumb-item active"><a href="<?= base_url('/departemen') ?>">Departemen</a></li>
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
                        <table id="tableDepartemen" class="display" style="min-width: 845px">
                            <thead align="center">
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Departemen</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-dark">
                                <?php
                                $i = 1;
                                foreach ($departemen as $d) : ?>
                                    <tr>
                                        <td align="center" class="w-5"><?= $i++ ?></td>
                                        <td><?= $d['nama_dep'] ?></td>
                                        <td align="center" class="w-15">
                                            <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target=".modalEdit<?= $d['id_dep'] ?>"><i class="fas fa-pen"></i></button>
                                            <button type="button" class="btn btn-sm btn-danger ml-2" data-toggle="modal" data-target=".modalHapus<?= $d['id_dep'] ?>"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                            <tfoot align="center">
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Departemen</th>
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
                <h5 class="modal-title">Form Tambah Departemen</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open(base_url('departemen/tambah')) ?>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label text-dark">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama_dep" required>
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
<?php foreach ($departemen as $d) : ?>
    <div class="modal fade modalEdit<?= $d['id_dep'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Form Edit Departemen</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?= form_open(base_url('departemen/edit/' . $d['id_dep'])) ?>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label text-dark">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama_dep" value="<?= $d['nama_dep'] ?>" required>
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
<?php foreach ($departemen as $d) : ?>
    <div class="modal fade modalHapus<?= $d['id_dep'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Pesan</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Yakin ingin menghapus <strong><?= $d['nama_dep'] ?></strong> ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <a href="<?= base_url('departemen/hapus/' . $d['id_dep']) ?>" class="btn btn-danger">Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>
<!-- End Modal Hapus -->
<?= $this->endSection() ?>