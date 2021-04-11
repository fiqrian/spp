<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Form</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">invoice spp</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="invoice-wrap">
            <div class="invoice-box">
                <div class="invoice-header">
                    <div class="logo text-center">
                        <img src="vendors/images/deskapp-logo.png" alt="">
                    </div>
                </div>

                <h4 class="text-center mb-30 weight-600">INVOICE SPP </h4>
                <div class="row pb-30">
                    <div class="col-md-6">
                        <h5 class="mb-15"><?= $invoice->fullname; ?></h5>
                        <p class="font-14 mb-5">Invoice No: <strong class="weight-600"><?= $invoice->id_invoice; ?></strong></p>
                        <p class="font-14 mb-5">No Handphone <br> <?= $invoice->no_telepon; ?> </p>

                    </div>
                    <div class="col-md-6">
                        <div class="text-right">
                            <p class="font-14 mb-5"> Nama Anda <br> <?= $invoice->nama ?></strong></p>
                            <p class="font-14 mb-5">(<?= $invoice->nis ?>)</strong></p>
                            <p class="font-14 mb-5">Alamat Anda <br> <?= $invoice->alamat; ?> </p>

                        </div>
                    </div>
                </div>
                <div class="invoice-desc pb-30">
                    <div class="invoice-desc-head clearfix">
                        <div class="invoice-sub">Kategori SPP</div>
                        <div class="invoice-rate">Tanggal Bayar SPP</div>
                        <div class="invoice-subtotal">Nominal SPP</div>
                    </div>
                    <div class="invoice-desc-body">
                        <ul>
                            <li class="clearfix">
                                <div class="invoice-sub"><?= $invoice->tahun ?></div>
                                <div class="invoice-rate"><?= $invoice->tgl_bayar; ?></div>
                                <div class="invoice-subtotal"><?= $invoice->nominal; ?> </div>
                            </li>
                        </ul>
                    </div>
                    <div class="invoice-desc-footer">
                        <div class="invoice-desc-head clearfix">
                            <div class="invoice-sub">Info Bank </div>
                            <div class="invoice-rate">Batas Bayar</div>
                            <div class="invoice-subtotal">Total bayar</div>
                        </div>
                        <div class="invoice-desc-body">
                            <ul>
                                <li class="clearfix">
                                    <div class="invoice-sub">
                                        <p class="font-14 mb-5"> No Bank: <strong class="weight-600"><br> <?php echo $invoice->bank; ?></strong></p>
                                    </div>
                                    <div class="invoice-rate font-20 weight-600"><?= $invoice->batas_bayar; ?></div>
                                    <div class="invoice-subtotal"><span class="weight-600 font-24 text-danger"><?php echo $invoice->nominal ?></span></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <h4 class="text-center pb-20">Terima Kasih!!</h4>
            </div>

        </div>
    </div>
</div>