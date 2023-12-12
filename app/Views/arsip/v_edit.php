<?= $this->extend('layout/main') ?>
<?= $this->section('main') ?>
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Form Edit Arsip</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ?>">Home</a></li>
                <li class="breadcrumb-item active"><a href="<?= base_url('/arsip') ?>">Arsip</a></li>
                <li class="breadcrumb-item active"><a href="<?= base_url('/arsip/edit/' . $arsip['id_arsip']) ?>">Edit Arsip</a></li>
            </ol>
        </div>
    </div>

    <!-- row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <?= form_open_multipart('arsip/update/' . $arsip['id_arsip']);
                    helper('text');
                    ?>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label text-dark">Nomor Arsip</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="no_arsip" value="<?= $arsip['no_arsip'] ?>" readonly>
                            <div class="text-danger">
                                <?= $validation->getError('no_arsip') ?>
                            </div>
                        </div>

                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label text-dark">Kategori</label>
                        <div class="col-sm-10">
                            <select name="id_kategori" class="form-control">
                                <option value="<?= $arsip['id_kategori'] ?>"><?= $arsip['nama_kategori'] ?></option>
                                <?php foreach ($kategori as $k) : ?>
                                    <option value="<?= $k['id_kategori'] ?>"><?= $k['nama_kategori'] ?></option>
                                <?php endforeach ?>
                            </select>
                            <div class="text-danger">
                                <?= $validation->getError('id_kategori') ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label text-dark">Nama Arsip</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama_file" value="<?= $arsip['nama_file'] ?>">
                            <div class="text-danger">
                                <?= $validation->getError('nama_file') ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label text-dark">Deskripsi</label>
                        <div class="col-sm-10">
                            <textarea name="deskripsi" class="form-control" id="" rows="4"><?= $arsip['deskripsi'] ?></textarea>
                            <div class="text-danger">
                                <?= $validation->getError('deskripsi') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label text-dark">Ubah File</label>
                        <div class="col-sm-10">
                            <input type="file" name="file_arsip" class="form-control">
                            <div class="text-danger">
                                <?= $validation->getError('file_arsip') ?>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary">Edit</button>
                        <a href="<?= base_url('/arsip') ?>" class="btn btn-secondary ml-2">Batal</a>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>