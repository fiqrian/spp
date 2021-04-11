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
                            <li class="breadcrumb-item"><a href="<?= base_url('walikelas'); ?>">walikelas</a></li>
                            <li class="breadcrumb-item active" aria-current="page">edit wali kelas</li>
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
                    <p><i class="icon fa fa-warning"></i> EDIT WALI KELAS! </p>
                </div>

                <?php echo form_open('updatewali'); ?>
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
                        GAGAL ditambah.!
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
                <?php foreach ($cari_data_wali as $tampilkan) {
                ?>
                    <input type="hidden" name="id_wali" value="<?php echo $tampilkan->id_wali ?>">
                    Nama <input type="text" name="nama" value="<?php echo $tampilkan->nama ?> " class="form-control" required>
                    Kelas Binaan <select name="id_kelas" id="id_kelas" value="<?php echo set_value('id_kelas') ?><?php echo $tampilkan->id_kelas ?>" class=" form-control" onchange="return autofill()">
                        <?php
                        foreach ($data_kelas as $tampilkan_kelas) {
                            echo "<option  name='id_kelas' id='id_kelas' value='$tampilkan_kelas->id_kelas'>$tampilkan_kelas->nama_kelas</option>";
                        }
                        ?>
                    </select>
                    kompetensi_keahlian <input type="text" name="kompetensi_keahlian" id="kompetensi_keahlian" class="form-control" required disabled>


                    <br>
                    <button type="submit" class="btn btn-primary btn-md pull-right">SIMPAN</button>
                    <!-- </form> -->
                    <?php echo form_close(); ?>
                <?php } ?>
                <br></br>
            </div>
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
            url: "<?php echo base_url('index.php/Admin/Getidkelas') ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('[name="id_kelas"]').val(data.id_kelas);
                $('#form_modal_hapus').modal('show');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Gagal ambil ajax');
            }
        });
    }
</script>
<!-- Modal -->
<div class="modal fade" id="form_modal_hapus">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Modal Peringatan</h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url() ?>index.php/Admin/Hapuskelas" id="form_hapus" method="POST">
                    <input type="hidden" name="id_kelas" value="">
                    <p>
                        Apakah anda yakin akan menghapus data tersebut.?
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
</div>
</div>
</div>