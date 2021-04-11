<div class="main-container">
    <div class="pd-ltr-20">
        <div class="card-box bg-white pd-20 height-100-p mb-30">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <h3 class="text-dark translate-middle-y mb-2 "><i class="micon dw dw-money-1">Form Pembayaran SPP</i></h3>
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
                            Sukses! Berhasil Dikirim! cek history pembayaran <a href="Users/Ui/history_spp/<?= user()->id ?>" target="_blank" class="text-area blue">Klik Disini!</a>.
                        </div>
                    <?php }
                    ?>


                    <form method="post" class=" tombol-pesan" enctype="multipart/form-data" action="<?php echo base_url(route_to('bayarspp')); ?>">
                        <div class="form-group">

                            <input type="hidden" name="id_user" id="id_user" value="<?= user()->id; ?>">
                            <label class="text-dark">NISN</label>
                            <input type="text" list="list_siswa" name="nisn" placeholder="KAITKAN NISN" id="nisn" onchange="return autofill()" required="" class=" form-control ">
                        </div>
                        <div class=" form-group">
                            <label class="text-dark">NIS</label>
                            <input type="text" name="nis" id="nis" placeholder="NIS Anda" required="" disabled class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="text-dark">Nama Lengkap</label>
                            <input type="text" name="nama" id="nama" placeholder="Nama Lengkap Anda" required="" disabled class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="text-dark">Kelas</label>
                            <input type="hidden" name="id_kelas" id="id_kelas" placeholder="Alamat Lengkap Anda" required="" class="form-control">
                            <input type="text" name="kelas" id="kelas" placeholder="Kelas" required="" disabled class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="text-dark">Alamat Lengkap</label>
                            <input type="text" name="alamat" id="alamat" placeholder="Alamat Lengkap Anda" required="" disabled class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="text-dark">No. Telepon</label>
                            <input type="number" name="no_telepon" id="no_telepon" placeholder="Nomor Telepon Anda" disabled required="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="text-dark">Tahun SPP</label>
                            <input type="hidden" name="id_spp" id="id_spp">
                            <input type="text" name="tahun" id="tahun" placeholder="Alamat Lengkap Anda" required="" disabled class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="text-dark">nominal SPP</label>
                            <input type="hidden" name="id_spp" id="id_spp">
                            <input type="text" name="nominal" id="nominal" placeholder="Nominal" required="" disabled class="form-control">
                        </div>
                        <div class="form-group">

                            <label class="text-dark">Bank Transfer</label>
                            <select class="form-control" name="bank">
                                <option value="BCA -XXXX">BCA -xxxxxx</option>
                                <option value="BCA -XXXX">BRI -xxxxxx</option>
                                <option value="BCA -XXXX">BNI -xxxxxx</option>
                                <option value="BCA -XXXX">MANDIRI -xxxxxx</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="text-dark">scan/foto bukti bayar/bukti transfer SPP</label>
                            <input type="file" name="file_upload" required="" class="form-control">
                        </div>
                        <br>
                        <div align="right">
                            <button type="submit" class="btn btn-dark btn-outline-danger  btn-lg " id="sa-success"><i class="icon-copy fa fa-send-o" aria-hidden="true">Kirim</i></button>
                        </div>
                </div>
                <datalist id="list_siswa">
                    <?php
                    foreach ($data_siswa as $tampilkan_siswa) {
                        echo "<option value='$tampilkan_siswa->nisn'>$tampilkan_siswa->nama</option>";
                    }
                    ?>
                </datalist>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    Dropzone.autoDiscover = false;
    $(".dropzone").dropzone({
        addRemoveLinks: true,
        removedfile: function(file) {
            var name = file.name;
            var _ref;
            return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
        }
    });

    function autofill() {

        var nisn = document.getElementById('nisn').value;
        $.ajax({
            url: "<?php echo base_url('Users/Ui/Autocomplete') ?>",
            data: '&nisn=' + nisn,
            success: function(data) {
                var hasil = JSON.parse(data);
                $.each(hasil, function(key, val) {
                    document.getElementById('nisn').value = val.nisn;
                    document.getElementById('nis').value = val.nis;
                    document.getElementById('nama').value = val.nama;
                    document.getElementById('id_kelas').value = val.id_kelas;
                    document.getElementById('kelas').value = val.nama_kelas;
                    document.getElementById('alamat').value = val.alamat;
                    document.getElementById('no_telepon').value = val.no_telepon;
                    document.getElementById('id_spp').value = val.id_spp;
                    document.getElementById('tahun').value = val.tahun;
                    document.getElementById('nominal').value = val.nominal;
                });
            }
        });
    }

    $('#form_hapus')[0].reset();

    function bayar() {
        $.ajax({

            success: $('#bayar-modal').modal('show'),

            error: function(jqXHR, textStatus, errorThrown) {
                alert('Gagal ambil Ajax');
            }
        });
    }
</script>
<!-- Login modal -->
<div class="modal fade" id="bayar-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="login-box bg-dark box-shadow border-radius-10">
                <div class="modal fade" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-body text-center font-18">
                                <h3 class="mb-20">Form Submitted!</h3>
                                <div class="mb-30 text-center"><img src="vendors/images/success.png"></div>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            </div>
                            <div class="modal-footer justify-content-center">
                                <a href="ui_user/history_spp" type="button" class="btn btn-primary" data-dismiss="modal">Done</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>