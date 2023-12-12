<?= $this->extend('layout/main') ?>
<?= $this->section('main') ?>
<div class="mx-4">
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="stat-widget-one card-body">
                    <div class="stat-icon d-inline-block">
                        <i class="fas fa-user text-success"></i>
                    </div>
                    <div class="stat-content d-inline-block">
                        <div class="stat-text">User</div>
                        <div class="stat-digit"><?= $tot_user ?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="stat-widget-one card-body">
                    <div class="stat-icon d-inline-block">
                        <i class="fa-solid fa-building text-primary"></i>
                    </div>
                    <div class="stat-content d-inline-block">
                        <div class="stat-text">Departemen</div>
                        <div class="stat-digit"><?= $tot_dep ?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="stat-widget-one card-body">
                    <div class="stat-icon d-inline-block">
                        <i class="fa-solid fa-layer-group text-warning"></i>
                    </div>
                    <div class="stat-content d-inline-block">
                        <div class="stat-text">Kategori</div>
                        <div class="stat-digit"><?= $tot_kategori ?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="stat-widget-one card-body">
                    <div class="stat-icon d-inline-block">
                        <i class="fa-solid fa-folder-open  text-danger"></i>
                    </div>
                    <div class="stat-content d-inline-block">
                        <div class="stat-text">Arsip</div>
                        <div class="stat-digit"><?= $tot_arsip ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>