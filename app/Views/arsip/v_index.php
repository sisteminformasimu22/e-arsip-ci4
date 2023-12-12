<?= $this->extend('layout/main') ?>
<?= $this->section('main') ?>
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Data Arsip</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ?>">Home</a></li>
                <li class="breadcrumb-item active"><a href="<?= base_url('/arsip') ?>">Arsip</a></li>
            </ol>
        </div>
    </div>

    <!-- row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="<?= base_url('arsip/add') ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tableKategori" class="display" style="min-width: 845px">
                            <thead align="center">
                                <tr>
                                    <th>No.</th>
                                    <th>No Arsip</th>
                                    <th>Nama Arsip</th>
                                    <th>Kategori</th>
                                    <th>Upload</th>
                                    <th>Update</th>
                                    <th>User</th>
                                    <th>Departemen</th>
                                    <th>File</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-dark">
                                <?php
                                $i = 1;
                                foreach ($arsip as $a) : ?>
                                    <tr>
                                        <td align="center" class="w-5"><?= $i++ ?></td>
                                        <td><?= $a['no_arsip'] ?></td>
                                        <td><?= $a['nama_file'] ?></td>
                                        <td><?= $a['nama_kategori'] ?></td>
                                        <td><?= $a['tgl_upload'] ?></td>
                                        <td><?= $a['tgl_update'] ?></td>
                                        <td><?= $a['nama_user'] ?></td>
                                        <td><?= $a['nama_dep'] ?></td>
                                        <td class="text-center"><a href="<?= base_url('arsip/viewpdf/' . $a['id_arsip']) ?>"><i class="fa-solid fa-file-pdf-o text-danger"></i></a>
                                            <br>
                                            <?= number_format($a['ukuran']) . 'KB' ?>
                                        </td>
                                        <td align="center" class="w-15">
                                            <a class="btn btn-sm btn-warning" href="<?= base_url('/arsip/edit/' . $a['id_arsip']) ?>"><i class="fas fa-pen"></i></a>
                                            <button type="button" class="btn btn-sm btn-danger ml-2" data-toggle="modal" data-target=".modalHapus<?= $a['id_arsip'] ?>"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                            <tfoot align="center">
                                <tr>
                                    <th>No.</th>
                                    <th>No Arsip</th>
                                    <th>Nama Arsip</th>
                                    <th>Kategori</th>
                                    <th>Upload</th>
                                    <th>Update</th>
                                    <th>User</th>
                                    <th>Departemen</th>
                                    <th>File</th>
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
<!-- Modal Hapus -->
<?php foreach ($arsip as $a) : ?>
    <div class="modal fade modalHapus<?= $a['id_arsip'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Pesan</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Yakin ingin menghapus <strong><?= $a['nama_file'] ?></strong> ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <a href="<?= base_url('arsip/hapus/' . $a['id_arsip']) ?>" class="btn btn-danger">Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>
<?= $this->endSection() ?>