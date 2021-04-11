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
                            <li class="breadcrumb-item"><a href="<?= base_url('siswa') ?>">Siswa</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Siswa</li>
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
                <?php echo form_open('updatesiswa'); ?>
                <?= csrf_field(); ?>
                <?php foreach ($cari_data_siswa as $tampilkan) { ?>

                    NISN <input type="text" name="nisn" class="form-control" value="<?php echo $tampilkan->nisn ?>">

                    NIS <input type="text" name="nis" class="form-control" value="<?php echo set_value('nis') ?><?php echo $tampilkan->nis ?>">

                    Nama <input type=" text" name="nama" class="form-control" value="<?php echo set_value('nama') ?><?php echo $tampilkan->nama ?>">

                    Alamat <input type="text" name="alamat" class="form-control" value="<?php echo set_value('alamat') ?><?php echo $tampilkan->alamat ?>">

                    No Telepon <input type="text" name="no_telepon" class="form-control" value="<?php echo set_value('no_telepon') ?><?php echo $tampilkan->no_telepon ?>">

                    Kelas <select name="id_kelas" id="" value="<?php echo set_value('id_kelas') ?><?php echo $tampilkan->id_kelas ?>" class="form-control">
                        <?php
                        foreach ($data_kelas as $tampilkan_kelas) {
                            echo "<option value='$tampilkan_kelas->id_kelas'>$tampilkan_kelas->nama_kelas</option>";
                        }
                        ?>
                    </select>

                    TAHUN SPP <select name="id_spp" value="<?php echo set_value('id_spp') ?><?php echo $tampilkan->id_spp ?>" id="" class="form-control">
                        <?php
                        foreach ($data_spp as $tampilkan_spp) {
                            echo "<option value='$tampilkan_spp->id_spp'>$tampilkan_spp->tahun</option>";
                        }
                        ?>
                    </select>
                    <br></br>
                    <button type="submit" class="btn btn-primary btn-md pull-right">SIMPAN</button>
                    <br></br>
                    <?php echo form_close(); ?>
                <?php
                } ?>
            </div>
        </div>
    </div>





    <!-- LANJUT BESOKK BOSSS
SEMANGAT KODING YOKKK
JANGAN PUTUS ASA !
BANYAK JALAN !
TETAP OPTIMIS!
KARENA ERROR AKAN DATANG, SAAT TIDAK OPTIMIS! -->