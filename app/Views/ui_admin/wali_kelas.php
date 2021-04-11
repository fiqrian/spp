<div class="main-container">
    <div class="pd-ltr-20">
        <div class="page-header">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="title">
                        <h4>Form Wali Kelas</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">wali kelas</li>
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
                    <p><i class="icon fa fa-warning"></i> INPUT WALI KELAS! </p>
                </div>
                <?php echo form_open('simpanwali'); ?>
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
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
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
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Sukses! Berhasil dihapus.!
                    </div>
                <?php }
                if (!empty($gagal)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        gagal dihapus.!
                    </div>
                <?php }
                if (!empty($error)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        GAGAL ditambah.!
                    </div>
                <?php }
                if (!empty($ubah)) { ?>
                    <div class="alert alert-primary" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Berhasil diubah.!
                    </div>
                <?php
                }
                if (!empty($success)) { ?>
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Sukses! Berhasil menambah.
                    </div>
                <?php }
                ?>
                Nama <input type="text" name="nama" value="" class="form-control">
                Kelas Binaan <select name="id_kelas" id="id_kelas" class="form-control" onchange="return autofill()">
                    <?php
                    foreach ($data_kelas as $tampilkan_kelas) {
                        echo "<option value='$tampilkan_kelas->id_kelas'>$tampilkan_kelas->nama_kelas</option>";
                    }
                    ?>
                </select>
                kompetensi_keahlian <input type="text" name="kompetensi_keahlian" id="kompetensi_keahlian" class="form-control" required disabled>

                <br>
                <button type="submit" class="btn btn-primary btn-md pull-right">SIMPAN</button>
                <?php echo form_close(); ?>
                <br></br>
            </div>
        </div>
        <div class="pd-ltr-20">
            <div class="card-box pd-20 height-100-p mb-30">
                <!-- <div class="row align-items-center"> -->
                <div class="box-header ">
                    <div class="title">
                        <strong>Data Wali Kelas </strong>
                    </div>
                </div>
                <br></br>
                <table class="table table-bordered table-hover" id="example11">
                    <thead>
                        <tr>
                            <td>
                                ID Wali Kelas
                            </td>
                            <td>
                                Nama Wali Kelas
                            </td>
                            <td>
                                Kelas Binaan
                            </td>
                            <td>
                                kompetensi Keahlian
                            </td>
                            <td>
                                Aksi
                            </td>
                        </tr>
                    </thead>
                    <?php foreach ($data_wali as $tampilkan) {


                        echo "<tr>";
                        echo "<td>$tampilkan->id_wali</td>";
                        echo "<td>$tampilkan->nama</td>";
                        echo "<td>$tampilkan->nama_kelas</td>";
                        echo "<td>$tampilkan->kompetensi_keahlian</td>";
                        echo "<td><a href='Admin/Ui_admin/Editwali/$tampilkan->id_wali'><button class='btn btn-primary btn-xs'>Edit</button></a>
                        <button class='btn btn-danger btn-xs' onclick='hapus($tampilkan->id_wali)'>Hapus</button></td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>


    <!-- JS -->
    <script>
        function autofill() {

            var id_kelas = document.getElementById('id_kelas').value;
            $.ajax({
                url: "<?php echo base_url('Admin/Ui_admin/Autocomplete1') ?>",
                data: '&id_kelas=' + id_kelas,
                success: function(data) {
                    var hasil = JSON.parse(data);
                    $.each(hasil, function(key, val) {
                        document.getElementById('id_kelas').value = val.id_kelas;
                        document.getElementById('kompetensi_keahlian').value = val.kompetensi_keahlian;
                    });
                }
            });
        }


        function hapus(id) {
            $('#form_hapus')[0].reset();
            $.ajax({
                url: "<?php echo base_url('Admin/Ui_admin/Getidwali') ?>/" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('[name="id_wali"]').val(data.id_wali);
                    $('#modal-default').modal('show');
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Gagal ambil ajax');
                }

            });
        }
    </script>
    <!-- Confirmation modal -->

    <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body text-center font-18">
                    <h4 class="padding-top-30 mb-30 weight-500">Are you sure you want to continue?</h4>
                    <div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto;">
                        <div class="col-6">
                            <form action="<?php echo base_url('hapuswali') ?>" id="form_hapus" method="post">
                                <input type="hidden" name="id_wali" value="">
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

<!-- <div class="footer-wrap pd-20 mb-20 card-box">
    <!-- Modal
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Pesan Peringatan Hapus</h4>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('hapuswali') ?>" id="form_hapus" method="post">
                        <input type="hidden" name="id_wali" value="">
                        Apakah anda yakin akan menghapus data tersebut.?!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Hapus</button>
                </div>
                </form>
            </div> -->
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div> -->