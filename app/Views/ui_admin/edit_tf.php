<div class="main-container">
    <div class="pd-ltr-20">
        <div class="page-header">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="title">
                        <h4>Form Edit Transaksi</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('transaksi') ?>">transaksi</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Transaksi</li>
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
                <?php echo form_open('updatetf'); ?>
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?= user()->id; ?>">
                <?php foreach ($cari_data_tf as $tampilkan) { ?>
                    <input type="hidden" name="id_pembayaran" value="<?php echo $tampilkan->id_pembayaran ?>">
                    <input type="hidden" name="id" value="<?= user()->id; ?>">
                    NISN<input type="read" name="nisn" id="nisn" class="form-control" value="<?php echo $tampilkan->nisn ?>" disabled>
                    Tanggal Bayar <input type="date" name="tanggal" value="<?php echo $tampilkan->tgl_bayar ?>" id=" tanggal" class="form-control">
                    Bulan Bayar
                    <select name="bulan_bayar" id="bulan_bayar" class="form-control" value="<?php echo $tampilkan->bulan_dibayar ?>" required>
                        <option value=" Januari">Januari</option>
                        <option value="Februari">Februari</option>
                        <option value="Maret">Maret</option>
                        <option value="April">April</option>
                        <option value="Mei">Mei</option>
                        <option value="Juni">Juni</option>
                        <option value="Juli">Juli</option>
                        <option value="Agustus">Agustus</option>
                        <option value="September">September</option>
                        <option value="Oktober">Oktober</option>
                        <option value="November">November</option>
                        <option value="Desember">Desember</option>
                    </select>
                    Tahun Bayar
                    <select name="tahun_bayar" id="tahun_bayar" value="<?php echo $tampilkan->tahun_dibayar ?>" required class="form-control">
                        <?php
                        for ($i = 2021; $i < 2030; $i++) {
                            echo "<option value='$i'>$i</option>";
                        }
                        ?>
                    </select>
                    Jumlah Bayar <input type=" number" name="jumlah_bayar" id="jumlah_bayar" value="<?php echo $tampilkan->jumlah_bayar ?>" class=" form-control" required>
                    <br></br>


                    <button type="submit" class="btn btn-primary btn-md pull-right">SIMPAN</button>

                    <br></br>
                    <?php echo form_close(); ?>
                <?php } ?>
            </div>
        </div>
    </div>




    <!-- LANJUT BESOKK BOSSS
SEMANGAT KODING YOKKK
JANGAN PUTUS ASA !
BANYAK JALAN !
TETAP OPTIMIS!
KARENA ERROR AKAN DATANG, SAAT TIDAK OPTIMIS! -->