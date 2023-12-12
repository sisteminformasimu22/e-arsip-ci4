<?= $this->extend('layout/main') ?>
<?= $this->section('main') ?>
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Data User</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ?>">Home</a></li>
                <li class="breadcrumb-item active"><a href="<?= base_url('/user') ?>">User</a></li>
            </ol>
        </div>
    </div>

    <!-- row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="<?= base_url('user/add') ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tableKategori" class="display" style="min-width: 845px">
                            <thead align="center">
                                <tr>
                                    <th>No.</th>
                                    <th>Nama User</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Level</th>
                                    <th>Departemen</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-dark">
                                <?php
                                $i = 1;
                                foreach ($user as $u) : ?>
                                    <tr>
                                        <td align="center" class="w-5"><?= $i++ ?></td>
                                        <td><?= $u['nama_user'] ?></td>
                                        <td><?= $u['email'] ?></td>
                                        <td><?= $u['pw'] ?></td>
                                        <td><?php if ($u['level'] == 1) {
                                                echo 'Admin';
                                            } else {
                                                echo 'User';
                                            } ?>
                                        </td>
                                        <td><?= $u['nama_dep'] ?></td>
                                        <td align="center" class="w-15">
                                            <a class="btn btn-sm btn-warning" href="<?= base_url('/user/edit/' . $u['id_user']) ?>"><i class="fas fa-pen"></i></a>
                                            <button type="button" class="btn btn-sm btn-danger ml-2" data-toggle="modal" data-target=".modalHapus<?= $u['id_user'] ?>"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                            <tfoot align="center">
                                <tr>
                                    <th>No.</th>
                                    <th>Nama User</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Level</th>
                                    <th>Departemen</th>
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
<?php foreach ($user as $u) : ?>
    <div class="modal fade modalHapus<?= $u['id_user'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Pesan</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Yakin ingin menghapus <strong><?= $u['nama_user'] ?></strong> ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <a href="<?= base_url('user/hapus/' . $u['id_user']) ?>" class="btn btn-danger">Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>
<?= $this->endSection() ?>