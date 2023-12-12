<?= $this->include('layout/header') ?>

<div id="main-wrapper">
    <?= $this->include('layout/nav') ?>

    <div class="content-body">
        <?= $this->renderSection('main') ?>
    </div>

    <div class="footer">
        <div class="copyright">
            <p>
                © 2023. SISTEM INFORMASI A. Designed &amp; Developed with <i class="fas fa-heart text-danger"></i> by
                <a href="https://www.youtube.com/@sisteminformasimu22" target="_blank">E-Arsip Team</a>
            </p>
            <p>
                Distributed by
                <a href="https://themewagon.com/" target="_blank">Themewagon</a>
            </p>
        </div>
    </div>
</div>

<?= $this->include('layout/footer') ?>