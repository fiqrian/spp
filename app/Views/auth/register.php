<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>Login Pembayaran SPP</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon-16x16.png">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
    <link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="vendors/styles/style.css">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-119386393-1');
    </script>
</head>

<body class="login-page">
    <div class="login-header box-shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="brand-logo ">
                <div class="header-left">
                    <img src="<?php echo base_url('assets/vendors/images/Group 1.png')  ?>" alt="">
                    </a>
                </div>
            </div>
            <div class="login-menu">
            </div>
        </div>
    </div>
    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-7">
                    <img src="<?php echo base_url('assets/vendors/images/online.svg') ?>" alt="">
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="login-box bg-white box-shadow border-radius-10">
                        <div class="login-title">
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn active">
                                    <div class="icon"><img src="<?php echo base_url('assets/vendors/images/person.svg') ?>" class="svg" alt=""></div>
                                    <h2>Aplikasi Pembayaran SPP</h2>
                            </div>

                            <?= view('Myth\Auth\Views\_message_block') ?>

                            <form action="<?= route_to('register') ?>" method="post">
                                <?= csrf_field() ?>
                        </div>
                        <small id="emailHelp" class="form-text text-muted"><?= lang('Auth.weNeverShare') ?></small>
                        <div class="input-group custom">
                            <input type="text" class="form-control form-control-lg  <?php if (session('errors.email')) : ?>is-invalid<?php endif ?> " name="email" placeholder="Alamat Email" value="<?= old('email') ?>">
                            <div class="input-group-append custom">
                                <span class="input-group-text"><i class="icon-copy fi-mail"></i></span>
                            </div>
                        </div>

                        <div class="input-group custom">
                            <input type="text" class="form-control form-control-lg  <?php if (session('errors.username')) : ?>is-invalid<?php endif ?> " name="username" placeholder="Username">
                            <div class="input-group-append custom">
                                <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                            </div>
                        </div>
                        <div class="input-group custom">
                            <input type="password" class="form-control form-control-lg <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" placeholder="Password" autocomplete="off">
                            <div class="input-group-append custom">
                                <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                            </div>
                        </div>
                        <div class="input-group custom">
                            <input type="password" class="form-control form-control-lg <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?> " name="pass_confirm" placeholder="Masukan ulang password" autocomplete="off">
                            <div class="input-group-append custom">
                                <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                            </div>
                        </div>
                        <div class="row pb-30">
                            <div class="col-6">
                            </div>
                            <div class="col-6">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="input-group mb-0">

                                    <!-- use code for form submit -->
                                    <button type="submit" class="btn btn-primary btn-block"><?= lang('Auth.register') ?></button>
                                    <!-- <input class="btn btn-primary btn-lg btn-block" type="submit" value="Daftar"> -->


                                </div>
                            </div>
                        </div>
                        </form>
                        <hr>

                        <p><?= lang('Auth.alreadyRegistered') ?> <a href="<?= route_to('login') ?>"><?= lang('Auth.signIn') ?></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- js -->
    <script src="vendors/scripts/core.js"></script>
    <script src="vendors/scripts/script.min.js"></script>
    <script src="vendors/scripts/process.js"></script>
    <script src="vendors/scripts/layout-settings.js"></script>
</body>

</html>