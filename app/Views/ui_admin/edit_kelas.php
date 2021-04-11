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
                            <li class="breadcrumb-item"><a href="<?= base_url('kelas') ?>">Kelas</a></li>
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
                    <p><i class="icon fa fa-warning"></i> EDIT KELAS! </p>
                </div>
                <?php echo form_open('updatekelas') ?>
                <?= csrf_field(); ?>
                <?php
                foreach ($cari_data_kelas as $tampilkan) { ?>
                    <input type="hidden" name="id_kelas" value="<?php echo $tampilkan->id_kelas ?>">
                    Nama Kelas <input type="text" name="nama_kelas" value="<?php echo set_value('nama_kelas') ?><?php echo $tampilkan->nama_kelas ?>" class="form-control">
                    Kompetensi Keahlian <input type="text" name="kompetensi_keahlian" value="<?php echo set_value('kompetensi_keahlian') ?><?php echo $tampilkan->kompetensi_keahlian ?>" class="form-control">
                    <br></br>
                    <button type="submit" value="updatekelas" class="btn btn-primary btn-md pull-right">SIMPAN</button>
                    <br></br>
                    <?php echo form_close(); ?>
                <?php }
                ?>
            </div>
        </div>
    </div>

</div>