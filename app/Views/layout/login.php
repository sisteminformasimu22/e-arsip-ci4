<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title><?= $title ?></title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>/template/focus/simages/favicon.png" />
    <link href="<?= base_url() ?>/template/focus/css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">
</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h4 class="text-center mb-4">Sign in your account</h4>
                                    <form action="auth/cek_login" method="post" autocomplete="off">
                                        <?= csrf_field() ?>
                                        <div class="form-group">
                                            <label><strong>Email</strong></label>
                                            <input type="email" name="email" class="form-control" />
                                            <div class="text-danger">
                                                <?= $validation->getError('email') ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Password</strong></label>
                                            <input type="password" name="password" class="form-control" />
                                            <div class="text-danger">
                                                <?= $validation->getError('password') ?>
                                            </div>
                                        </div>
                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                            <div class="form-group">
                                                <div class="form-check ml-2">
                                                    <input class="form-check-input" type="checkbox" id="basic_checkbox_1" />
                                                    <label class="form-check-label" for="basic_checkbox_1">Remember me</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <a href="page-forgot-password.html">Forgot Password?</a>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">
                                                Sign me in
                                            </button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>
                                            Don't have an account?
                                            <a class="text-primary" href="<?= base_url('/registrasi') ?>">Sign up</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Required vendors -->
    <script src="<?= base_url() ?>/template/focus/vendor/global/global.min.js"></script>
    <script src="<?= base_url() ?>/template/focus/js/quixnav-init.js"></script>
    <script src="<?= base_url() ?>/template/focus/js/custom.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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
</body>

</html>