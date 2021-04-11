<div class="main-container">
    <div class="pd-ltr-20">
        <div class="page-header">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="title">
                        <h4>Form Kelas</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('spp') ?>">SPP</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Kelas</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="pd-ltr-20">
            <div class="card-box pd-20 height-100-p mb-30">
                <div class="row align-items-center">
                </div>
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p><i class="icon fa fa-warning"></i> EDIT SPP! </p>
                </div>
                <?php echo form_open('updatespp'); ?>
                <?= csrf_field(); ?>

                Tahun
                <select name="tahun" id="" class='form-control'>
                    <?php
                    for ($i = 2021; $i < 2050; $i++) {
                        echo "<option value='$i'>$i</option>";
                    }
                    ?>
                </select>
                <?php
                foreach ($data_spp as $tampilkan) { ?>


                    <input type="hidden" name="id_spp" value="<?php echo $tampilkan->id_spp ?>">
                    Nominal <input type="number" name="nominal" value="<?php echo $tampilkan->nominal; ?>" class="form-control" required>

                    <br><br>
                    <button type="submit" class="btn btn-primary btn-md pull-right">SIMPAN</button>
                    <br><br>
                    <?php echo form_close(); ?>
                <?php   }
                ?>
            </div>
        </div>
    </div>