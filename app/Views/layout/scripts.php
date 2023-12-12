<script>
    $(function() {
        <?php if (session()->getFlashdata('swal_icon')) { ?>
            Swal.fire({
                icon: '<?= session()->getFlashdata('swal_icon') ?>',
                title: '<?= session()->getFlashdata('swal_title') ?>',
                text: '<?= session()->getFlashdata('swal_text') ?> !',
            })
        <?php } ?>
    });
</script>

<script>
    $(document).ready(function() {
        $('#tableKategori').DataTable();
    });
</script>
<script>
    $(document).ready(function() {
        $('#tableDepartemen').DataTable();
    });
</script>