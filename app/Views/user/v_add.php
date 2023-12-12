<?= $this->extend('layout/main') ?>
<?= $this->section('main') ?>
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Form Tambah User</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ?>">Home</a></li>
                <li class="breadcrumb-item active"><a href="<?= base_url('/user') ?>">User</a></li>
                <li class="breadcrumb-item active"><a href="<?= base_url('/user/add') ?>">Tambah User</a></li>
            </ol>
        </div>
    </div>

    <!-- row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <?= form_open('user/tambah') ?>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label text-dark">Nama User</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama_user">
                            <div class="text-danger">
                                <?= $validation->getError('nama_user') ?>
                            </div>
                        </div>

                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label text-dark">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email">
                            <div class="text-danger">
                                <?= $validation->getError('email') ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label text-dark">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="pw">
                            <div class="text-danger">
                                <?= $validation->getError('pw') ?>
                            </div>
                        </div>

                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label text-dark">Level</label>
                        <div class="col-sm-10">
                            <select name="level" class="form-control">
                                <option>---Pilih Level---</option>
                                <option value="1">Admin</option>
                                <option value="2">User</option>
                            </select>
                            <div class="text-danger">
                                <?= $validation->getError('level') ?>
                            </div>
                        </div>

                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label text-dark">Departemen</label>
                        <div class="col-sm-10">
                            <select name="id_dep" class="form-control">
                                <option>---Pilih Departemen---</option>
                                <?php foreach ($dep as $d) : ?>
                                    <option value="<?= $d['id_dep'] ?>"><?= $d['nama_dep'] ?></option>
                                <?php endforeach ?>
                            </select>
                            <div class="text-danger">
                                <?= $validation->getError('id_dep') ?>
                            </div>
                        </div>

                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                        <a href="<?= base_url('/user') ?>" class="btn btn-secondary ml-2">Batal</a>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>