<div class="mobile-menu-overlay"></div>
<div class="main-container">
    <div class="pd-ltr-20">
        <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <p><i class="icon fa fa-warning"></i>Jika tidak ada Menu! Silahkan Tunggu Verifikasi dari Admin!<br> Jika sudah abaikan pesan ini!
            </p>
        </div>
        <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <p><i class="icon fa fa-warning"></i>SILAHKAN KAITKAN NISN DI AKUN ANDA KLIK <a href="/Users/Ui/profile/<?php echo user()->id; ?>" class="text-primary"> DISINI!.</a>
                <br> Jika sudah abaikan pesan ini!
            </p>
        </div>
        <div class="card-box pd-20 height-100-p mb-30">
            <div class="row align-items-center">

                <div class="col-md-4">
                    <img src="<?php


                                echo base_url('assets/vendors/images/banner-img.png') ?>" alt="">
                </div>
                <div class="col-md-8">
                    <h4 class="font-20 weight-500 mb-10 text-capitalize">
                        Selamat Datang ! di aplikasi Pembayaran SPP <div class="weight-600 font-30 text-blue"><?= user()->username; ?></div>
                    </h4>
                </div>
            </div>
        </div>
    </div>
    <?php if (in_groups('super_admin')) : ?>
        <div class="row">
            <div class="col-xl-3 mb-30">
                <div class="card-box height-100-p widget-style1">
                    <div class="d-flex flex-wrap align-items-center">
                        <div class="progress-data">
                            <div><img src="<?php echo base_url('/image/user.png') ?>" alt=""> </div>
                        </div>
                        <div class="widget-data">
                            <div class="h4 mb-0">
                                <?php
                                echo $users;

                                ?>


                            </div>
                            <div class="weight-600 font-14">Jumlah Siswa</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 mb-30">
                <div class="card-box height-100-p widget-style1">
                    <div class="d-flex flex-wrap align-items-center">
                        <div class="progress-data">
                            <div><img src="<?php echo base_url('/image/invoice.png') ?>" alt=""> </div>
                        </div>
                        <div class="widget-data">
                            <div class="h4 mb-0">
                                <?php
                                echo $invoice;

                                ?>

                            </div>
                            <div class="weight-600 font-14">Invoice Masuk</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 mb-30">
                <div class="card-box height-100-p widget-style1">
                    <div class="d-flex flex-wrap align-items-center">
                        <div class="progress-data">
                            <div><img src="<?php echo base_url('/image/jumlah_tf.png') ?>" alt=""></div>
                        </div>
                        <div class="widget-data">
                            <div class="h4 mb-0">
                                <?php
                                echo $bayar;

                                ?>
                            </div>
                            <div class="weight-600 font-14">Jumlah Transaksi </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 mb-30">
                <div class="card-box height-100-p widget-style1">
                    <div class="d-flex flex-wrap align-items-center">
                        <div class="progress-data">
                            <div><img src="<?php echo base_url('/image/pemasukan.png') ?>" alt=""> </div>
                        </div>
                        <div class="widget-data">
                            <div class="h4 mb-0">
                                <?php
                                echo $total->jumlah_bayar;
                                ?>


                            </div>
                            <div class="weight-600 font-14">Pemasukan</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="bg-white pd-20 card-box mb-30">
            <h4 class="h4 text-blue">Column Chart</h4>
            <div id="chart5"></div>
        </div>
    <?php endif; ?>
    <?php if (in_groups('Admin')) : ?>
        <div class="row">
            <div class="col-xl-3 mb-30">
                <div class="card-box height-100-p widget-style1">
                    <div class="d-flex flex-wrap align-items-center">
                        <div class="progress-data">
                            <div><img src="<?php echo base_url('/image/user.png') ?>" alt=""> </div>
                        </div>
                        <div class="widget-data">
                            <div class="h4 mb-0">
                                <?php
                                echo $users;

                                ?>


                            </div>
                            <div class="weight-600 font-14">Jumlah Siswa</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 mb-30">
                <div class="card-box height-100-p widget-style1">
                    <div class="d-flex flex-wrap align-items-center">
                        <div class="progress-data">
                            <div><img src="<?php echo base_url('/image/invoice.png') ?>" alt=""> </div>
                        </div>
                        <div class="widget-data">
                            <div class="h4 mb-0">
                                <?php
                                echo $invoice;

                                ?>

                            </div>
                            <div class="weight-600 font-14">Invoice Masuk</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 mb-30">
                <div class="card-box height-100-p widget-style1">
                    <div class="d-flex flex-wrap align-items-center">
                        <div class="progress-data">
                            <div><img src="<?php echo base_url('/image/jumlah_tf.png') ?>" alt=""></div>
                        </div>
                        <div class="widget-data">
                            <div class="h4 mb-0">
                                <?php
                                echo $bayar;

                                ?>
                            </div>
                            <div class="weight-600 font-14">Jumlah Transaksi </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 mb-30">
                <div class="card-box height-100-p widget-style1">
                    <div class="d-flex flex-wrap align-items-center">
                        <div class="progress-data">
                            <div><img src="<?php echo base_url('/image/pemasukan.png') ?>" alt=""> </div>
                        </div>
                        <div class="widget-data">
                            <div class="h4 mb-0">
                                <?php
                                echo $total->jumlah_bayar;
                                ?>


                            </div>
                            <div class="weight-600 font-14">Pemasukan</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="bg-white pd-20 card-box mb-30">
            <h4 class="h4 text-blue">Column Chart</h4>
            <div id="chart5"></div>
        </div>
</div>
</div>
<?php endif; ?>
<?php if (in_groups('user')) : ?>
    <div class="pd-ltr-20 customscroll-10-p height-100-p xs-pd-20-10">
        <div class="pd-20 card-box mb-30">
            <div class="clearfix mb-20">
                <div class="pull-left">
                    <h4 class="text-blue h4">Cara Pengunaan Aplikasi SPP Berbasis website</h4>
                    <p class="font-14 ml-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi cupiditate architecto soluta itaque labore adipisci debitis molestiae animi laborum commodi aperiam minus aspernatur eos, iste maiores possimus suscipit alias vel! </p>
                </div>

            </div>
        </div>
    </div>



<?php endif; ?>