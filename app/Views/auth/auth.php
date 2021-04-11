<body class="login-page">
    <div class="login-header box-shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="brand-logo ">
                <div class="header-left">
                    <img src="<?php echo base_url('assets/vendors/images/SMK.png')  ?>" alt="">
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
                        </div>
                        <?php echo session()->set('redirect_url', base_url(route_to('dashboard'))); ?>
                        <?= view('Myth\Auth\Views\_message_block') ?>
                        <form action="<?= route_to('login') ?>" method="post">
                            <?= csrf_field() ?>

                            <?php if ('validFields' === ['email', 'username']) : ?>
                                <div class="input-group custom">
                                    <input type="email" class="form-control form-control-lg <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="Username Or Email">
                                    <div class="input-group-append custom">
                                        <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                    </div>
                                    <div class="invalid-feedback">
                                        <?= session('errors.login') ?>
                                    </div>
                                </div>
                            <?php else : ?>
                                <div class="input-group custom">
                                    <input type="text" class="form-control form-control-lg <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="Username Or Email">
                                    <div class="input-group-append custom">
                                        <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                    </div>
                                    <div class="invalid-feedback">
                                        <?= session('errors.login') ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="input-group custom">
                                <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="**********">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                </div>
                            </div>
                            <?php if ('allowRemembering') : ?>
                                <div class="row pb-30">
                                    <div class="col-6">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?> id=" customCheck1">
                                            <label class=" "><?= lang('Auth.rememberMe') ?></label>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="col-6">
                                    <?php if ('activeResetter') : ?>
                                        <p><a href="<?= route_to('forgot') ?>">Forgot Password?</a></p>
                                    <?php endif; ?>
                                </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="input-group mb-0">

                                            <!-- use code for form submit -->
                                            <!-- <input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In"> -->

                                            <!-- <a class="btn btn-primary btn-lg btn-block" href="<?php echo base_url('/dashboard') ?>">Masuk</a> -->
                                            <button type="submit" class="btn btn-primary btn-lg btn-block"><?= lang('Auth.loginAction') ?></button>
                        </form>
                    </div>
                    <div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">Or</div>
                    <div class="input-group mb-0">
                        <a class="btn btn-outline-primary btn-lg btn-block" href="<?php echo base_url('/register') ?>">Sign Up Account !!</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    </div>
    </div>