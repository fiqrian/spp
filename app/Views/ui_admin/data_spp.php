<div class="main-container">
    <div class="pd-ltr-20">
        <div class="page-header">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="title">
                        <h4>Form SPP</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">SPP</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="pd-ltr-20">
            <div class="card-box pd-20 height-100-p mb-30">
                <div class="row align-items-center">
                </div>

                <!-- <form action="<?php echo base_url() ?>/Admin/Ui_admin/Simpanspp" method="post"> -->
                <?php echo form_open('simpanspp'); ?>
                <?= csrf_field(); ?>
                <!-- cek validasi -->
                <?php
                $inputs = session()->getFlashdata('inputs');
                $errors = session()->getFlashdata('errors');
                $success = session()->getFlashdata('success');
                $hapus = session()->getFlashdata('hapus');
                $error = session()->getFlashdata('error');
                $ubah = session()->getFlashdata('add');
                $gagal = session()->getFlashdata('gagal');
                if (!empty($errors)) { ?>
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
                    <div class="alert alert-danger" role="alert">
                        Sukses! Berhasil dihapus.!
                    </div>
                <?php }
                if (!empty($gagal)) { ?>
                    <div class="alert alert-danger" role="alert">
                        Sukses! Berhasil dihapus.!
                    </div>
                <?php }
                if (!empty($error)) { ?>
                    <div class="alert alert-danger" role="alert">
                        GAGAL dihapus.!
                    </div>
                <?php }
                if (!empty($ubah)) { ?>
                    <div class="alert alert-primary" role="alert">
                        Berhasil diubah.!
                    </div>
                <?php
                }
                if (!empty($success)) { ?>
                    <div class="alert alert-success" role="alert">
                        Sukses! Berhasil menambah.
                    </div>
                <?php }
                ?>
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p><i class="icon fa fa-warning"></i> INPUT DATA SPP! </p>
                </div>
                Tahun
                <select name="tahun" id="" class='form-control'>
                    <?php
                    for ($i = 2021; $i < 2050; $i++) {
                        echo "<option value='$i'>$i</option>";
                    }
                    ?>
                </select>

                Nominal <input type="number" name="nominal" value="" class="form-control">

                <br></br>
                <button type="submit" class="btn btn-primary btn-md pull-right">SIMPAN</button>
                <br></br>
                <?php echo form_close(); ?>
            </div>
        </div>
        <div class="pd-ltr-20">
            <div class="card-box pd-20 height-100-p mb-30">
                <div class="row align-items-center">
                </div>
                <strong>Data SPP</strong>
                <table class="table table-bordered table-hover" id="example1">
                    <thead>
                        <tr>
                            <td>
                                ID SPP
                            </td>
                            <td>
                                Tahun
                            </td>
                            <td>
                                Nominal
                            </td>
                            <td>
                                Aksi
                            </td>
                        </tr>
                    </thead>
                    <?php

                    foreach ($data_spp as $tampilkan) {
                        echo "<tr>";
                        echo "<td>$tampilkan->id_spp</td>";
                        echo "<td>$tampilkan->tahun</td>";
                        echo "<td>$tampilkan->nominal</td>";
                        echo "<td><a href='Admin/Ui_admin/Editspp/$tampilkan->id_spp'><button class='btn btn-primary btn-xs'>Edit</button></a> <button class='btn btn-danger btn-xs' onClick='hapus($tampilkan->id_spp)'>Hapus</button></td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>
        </div>

        <!-- JS -->
        <script>
            $('#form_hapus')[0].reset();

            function hapus(id) {
                $.ajax({
                    url: "<?php echo base_url('/Admin/Ui_Admin/Getidspp') ?>/" + id,
                    type: "GET",
                    dataType: "JSON",
                    success: function(data) {
                        $('[name="id_spp"]').val(data.id_spp);
                        $('#modal-pesan').modal('show');
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Gagal ambil Ajax');
                    }
                });
            }
        </script>

        <!-- Modal -->
        <div class="modal fade" id="modal-pesan" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body text-center font-18">
                        <h4 class="padding-top-30 mb-30 weight-500">Are you sure you want to continue?</h4>
                        <div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto;">
                            <div class="col-6">
                                <form action="<?php echo base_url('/Admin/Ui_admin/Hapusspp') ?>" id="form_spp" method="post">
                                    <input type="hidden" name="id_spp" value="" id="">
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
    <!-- 
        <div class="modal fade" id="modal-pesan">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Default Modal</h4>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo base_url('/Admin/Ui_admin/Hapusspp') ?>" id="form_spp" method="post">
                            <input type="hidden" name="id_spp" value="" id="">
                            <p>
                                Apakah anda yakin akan menghapus data tersebut.!?
                            </p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        </form>
                    </div>
                </div>
                <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div> -->