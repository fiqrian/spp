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
                            <li class="breadcrumb-item active" aria-current="page">user detail</li>
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
                    <p><i class="icon fa fa-warning"></i> INPUT KELAS! </p>
                </div>
                <!-- <form action="<?php echo base_url('simpankelas') ?>" method="post"> -->
                <?php echo form_open('simpankelas'); ?>
                <?= csrf_field(); ?>
                <!-- cek validasi -->
                <?php
                $inputs = session()->getFlashdata('inputs');
                $errors = session()->getFlashdata('errors');
                $success = session()->getFlashdata('success');
                $hapus = session()->getFlashdata('pesan');
                $ubah = session()->getFlashdata('add');
                $ubah = session()->getFlashdata('gagal');
                if (!empty($errors)) { ?>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <div class="alert alert-danger" role="alert">
                        Whoops! Ada kesalahan saat input data, yaitu:
                        <ul>
                            <?php foreach ($errors as $error) : ?>
                                <li><?= esc($error) ?></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                <?php }
                if (!empty($hapus)) { ?>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <div class="alert alert-danger" role="alert">
                        Sukses! Berhasil dihapus.!
                    </div>
                <?php }
                if (!empty($gagal)) { ?>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <div class="alert alert-danger" role="alert">
                        GAGAL! Dihapus/tabel berhubungan dengan yang lain.!
                    </div>
                <?php }
                if (!empty($ubah)) { ?>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <div class="alert alert-primary" role="alert">
                        Berhasil diubah.!
                    </div>
                <?php
                }
                if (!empty($success)) { ?>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <div class="alert alert-success" role="alert">
                        Sukses! Berhasil menambah.
                    </div>
                <?php }
                ?>
                Nama Kelas <input list="list-wali" type="text" name="nama_kelas" id="nama_kelas" class="form-control">

                Kompetensi Keahlian <input type="text" id=" Kompetensi_Keahlian" name=" Kompetensi_Keahlian" class="form-control">

                <br></br>
                <button type="submit" class="btn btn-primary btn-md pull-right">SIMPAN</button>
                <br></br>
                <?php echo form_close(); ?>
                <!-- </form> -->
            </div>
        </div>
        <div class="pd-ltr-20">
            <div class="card-box pd-20 height-100-p mb-30">
                <div class="row align-items-center">
                </div>
                <strong>Data Kelas </strong>
                <table class="table table-bordered table-hover" id="example12">
                    <thead>
                        <tr>
                            <td>
                                ID Kelas
                            </td>
                            <td>
                                Nama Kelas
                            </td>
                            <td>
                                Kompetensi Keahlian
                            </td>
                            <td>
                                Aksi
                            </td>
                        </tr>
                    </thead>
                    <?php

                    foreach ($data_kelas as $tampilkan) {
                        echo "<tr>";
                        echo "<td>$tampilkan->id_kelas</td>";
                        echo "<td>$tampilkan->nama_kelas</td>";
                        echo "<td>$tampilkan->kompetensi_keahlian</td>";
                        echo "<td><a href='Admin/Ui_admin/Editkelas/$tampilkan->id_kelas'><button class='btn btn-primary btn-xs'>Edit</button></a>
                        <button class='btn btn-danger btn-xs' onClick='hapus($tampilkan->id_kelas)'>Hapus</button>
                        </td>
                        </td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>


    <!-- JS -->


    <script>
        function hapus(id) {
            $('#form_hapus')[0].reset();
            $.ajax({
                url: "<?php echo base_url('/Admin/Ui_admin/Getidkelas') ?>/" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('[name=id_kelas]').val(data.id_kelas);
                    $('#form_modal_hapus').modal('show');
                },
                error: function(jQueryXHR, textStatus, errorThrown) {
                    alert('Gagal ambil ajax');
                }
            });
        }

        function edit(id) {
            $('#form_hapus')[0].reset();
            $.ajax({
                url: "<?php echo base_url('/Admin/Ui_admin/Getidkelas') ?>/" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('[name=id_kelas]').val(data.id_kelas);
                    $('#form_modal_hapus').modal('show');
                },
                error: function(jQueryXHR, textStatus, errorThrown) {
                    alert('Gagal ambil ajax');
                }
            });
        }
    </script>
    <!-- Modal -->
    <!-- Modal -->

    <div class="modal fade" id="form_modal_hapus" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body text-center font-18">
                    <h4 class="padding-top-30 mb-30 weight-500">Are you sure you want to continue?</h4>
                    <div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto;">
                        <div class="col-6">
                            <form action="<?= base_url('/admin/Ui_admin/hapuskelas') ?>" id="form_hapus" method="post">
                                <input type="hidden" name="id_kelas" value="">
                                <button type="button" class="btn btn-secondary border-radius-100 btn-block confirmation-btn" data-dismiss="modal"><i class="fa fa-times"></i></button>
                                NO
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary border-radius-100 btn-block confirmation-btn"><i class="fa fa-check"></i></button>
                            YES
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="form_modal_hapus">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Peringatan Menghapus!</h4>
            </div>
            <div class="modal-body">

                <p>
                    Apakah anda yakin akan menghapus data tersebut.?
                </p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">TUTUP</button>
                <!-- <a href="/Admin/Ui_admin/hapuskelas/ $tampilkan->id_kelas" class="btn btn-primary">HAPUS</a> -->
                <button type="submit" class="btn btn-primary">HAPUS</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
</div>