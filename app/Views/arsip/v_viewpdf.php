<?= $this->extend('layout/main') ?>
<?= $this->section('main') ?>
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>View PDF Data Arsip</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('/dashboard') ?>">Home</a></li>
                <li class="breadcrumb-item active"><a href="<?= base_url('/arsip') ?>">Arsip</a></li>
                <li class="breadcrumb-item active"><a href="<?= base_url('/arsip/viewpdf/' . $arsip['id_arsip']) ?>">View PDF</a></li>
            </ol>
        </div>
    </div>

    <!-- row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <table class="col-12 text-dark">
                        <tr>
                            <th width="100px">No. Arsip</th>
                            <th width="30px">:</th>
                            <td width="600px"><?= $arsip['no_arsip'] ?></td>
                            <th width="120px">Tgl. Upload</th>
                            <th width="30px">:</th>
                            <td class="text-right"><?= $arsip['tgl_upload'] ?></td>
                        </tr>
                        <tr>
                            <th width="100px">Nama Arsip</th>
                            <th width="30px">:</th>
                            <td><?= $arsip['nama_file'] ?></td>
                            <th width="120px">Tgl. Update</th>
                            <th width="30px">:</th>
                            <td class="text-right"><?= $arsip['tgl_update'] ?></td>
                        </tr>
                        <tr>
                            <th width="100px">Deskripsi</th>
                            <th width="30px">:</th>
                            <td><?= $arsip['deskripsi'] ?></td>
                            <th width="120px">Ukuran File</th>
                            <th width="30px">:</th>
                            <td class="text-right"><?= number_format($arsip['ukuran']) . " KB" ?></td>
                        </tr>
                        <tr>
                            <th width="100px">Departemen</th>
                            <th width="30px">:</th>
                            <td><?= $arsip['nama_dep'] ?></td>
                            <th width="120px">User</th>
                            <th width="30px">:</th>
                            <td class="text-right"><?= $arsip['nama_user'] ?></td>
                        </tr>
                    </table>
                </div>
                <div class="card-body">
                    <iframe src="<?= base_url('file_arsip/' . $arsip['file_arsip']) ?>" width="100%" height="1000px" frameborder="0"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>