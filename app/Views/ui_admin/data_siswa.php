<div class="main-container">
    <div class="pd-ltr-20">
        <div class="page-header">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="title">
                        <h4>Form Siswa</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">siswa</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="pd-ltr-20">
            <div class="card-box pd-20 height-100-p mb-30">
                <div class="row align-items-center">
                </div>
                <!-- <form action="<?php echo base_url() ?>index.php/Admin/Simpansiswa" method="POST"> -->
                <?php echo form_open('simpansiswa'); ?>
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
                        GAGAL Ditambah.!
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
                    <p><i class="icon fa fa-warning"></i> INPUT SISWA! </p>
                </div>

                NISN <input type="text" name="nisn" class="form-control" value="">

                NIS <input type="text" name="nis" class="form-control" value="">

                Nama <input type="text" name="nama" class="form-control" value="">

                Kelas
                <select name="kelas" id="" class="form-control">
                    <?php
                    foreach ($data_kelas as $tampilkan_kelas) {
                        echo "<option value='$tampilkan_kelas->id_kelas'>$tampilkan_kelas->nama_kelas</option>";
                    }

                    ?>
                </select>
                Alamat <input type="text" name="alamat" class="form-control" value="">

                No Telepon <input type="text" name="no_telepon" class="form-control" value="">

                TAHUN SPP
                <select name="spp" id="" class="form-control">
                    <?php
                    foreach ($data_spp as $tampilkan_spp) {
                        echo "<option value='$tampilkan_spp->id_spp'>$tampilkan_spp->tahun</option>";
                        // echo "Nominal <input type='read' name='nominal' value='$tampilkan_spp->id_spp->$tampilkan_spp->nominal'>";
                    }
                    ?>
                </select>
                <br></br>
                <button type="submit" class="btn btn-primary btn-md pull-right">SIMPAN</button>
                <br></br>

                <!-- </form> -->
                <?php echo form_close(); ?>
            </div>
        </div>
        <div class="pd-ltr-20">
            <div class="card-box pd-20 height-100-p mb-30">
                <div class="row align-items-center">
                </div>
                <div class="box-header">
                    Data Siswa
                </div>

                <table class="table table-bordered table-hover" id="example2">
                    <thead>
                        <tr>
                            <td>
                                NISN
                            </td>
                            <td>
                                NIS
                            </td>
                            <td>
                                Nama
                            </td>
                            <td>
                                Nama Kelas
                            </td>
                            <td>
                                Alamat
                            </td>
                            <td>
                                No Telepon
                            </td>
                            <td>
                                Tahun SPP
                            </td>
                            <td>
                                Aksi
                            </td>
                        </tr>
                    </thead>
                    <?php foreach ($data_siswa as $tampilkan_siswa) {


                        echo "<tr>";
                        echo "<td>$tampilkan_siswa->nisn</td>";
                        echo "<td>$tampilkan_siswa->nis</td>";
                        echo "<td>$tampilkan_siswa->nama</td>";
                        echo "<td>$tampilkan_siswa->nama_kelas</td>";
                        echo "<td>$tampilkan_siswa->alamat</td>";
                        echo "<td>$tampilkan_siswa->no_telepon</td>";
                        echo "<td>$tampilkan_siswa->tahun</td>";
                        echo "<td> <a href='Admin/Ui_admin/Editsiswa/$tampilkan_siswa->nisn'><button class='btn btn-primary btn-xs'>Edit</button></a>
                        <button class='btn btn-danger btn-xs' onClick='hapus($tampilkan_siswa->nisn)'>Hapus</button> </td>";


                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>
        </div>

        <!-- JS -->
        <script>
            function hapus(id) {
                $('#form_hapus')[0].reset();
                $.ajax({
                    url: "<?php echo base_url('/Admin/Ui_admin/Getnisnsiswa') ?>/" + id,
                    type: "GET",
                    dataType: "JSON",
                    success: function(data) {
                        $('[name="nisn"]').val(data.nisn);
                        $('#modal-default').modal('show');
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Gagal ambil ajax');
                    }

                });
            }
        </script>
        <!-- Modal -->

        <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body text-center font-18">
                        <h4 class="padding-top-30 mb-30 weight-500">Are you sure you want to continue?</h4>
                        <div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto;">
                            <div class="col-6">
                                <form action="<?php echo base_url('hapussiswa') ?>" id="form_hapus" method="post">
                                    <input type="hidden" name="nisn" value="">
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

    <!-- <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Pesan Peringatan Hapus</h4>
                </div>
                <div class="modal-body">

                    Apakah anda yakin akan menghapus data tersebut.?!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Hapus</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div> -->