<div class="main-container">
    <div class="pd-ltr-20">
        <div class="page-header">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="title">
                        <h4>Form Transaksi</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Transaksi</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="pd-ltr-20">
            <div class="card-box pd-20 height-1-p mb-30">
                <div class="row align-items-center">
                </div>

                <!-- <form action="<?php echo base_url('') ?>" method="POST"> -->
                <?php echo form_open('simpantransaksi'); ?>
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

                <input type="hidden" name="id" value="<?= user()->id; ?>">
                NISN<input list="list_siswa" type="text" name="nisn" id="nisn" class="form-control" onchange="return autofill()">
                </select>
                Nama<input type="text" name="nama" id="nama" class="form-control" disabled>
                <input type="hidden" name="id_kelas" id="id_kelas">
                Kelas<input type="text" name="kelas" id="kelas" class="form-control" disabled>
                Alamat<input type="text" name="alamat" id="alamat" class="form-control" disabled>
                No telepon<input type="text" name="no_telepon" id="no_telepon" class="form-control" disabled>
                <input type="hidden" name="id_tahun" id="id_tahun">
                Tahun SPP<input type="text" name="tahun_spp" id="tahun_spp" class="form-control" disabled>
                Tanggal Bayar <input type="date" name="tanggal" id="tanggal" class="form-control">
                Bulan Bayar
                <select name="bulan_bayar" id="bulan_bayar" class="form-control">
                    <option value="Januari">Januari</option>
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
                <select name="tahun_bayar" id="tahun_bayar" class="form-control">
                    <?php
                    for ($i = 2021; $i < 2030; $i++) {
                        echo "<option value='$i'>$i</option>";
                    }
                    ?>
                </select>
                Jumlah Bayar <input type="number" name="jumlah_bayar" id="jumlah_bayar" class="form-control">
                <br></br>

                <button type="submit" class="btn btn-primary btn-md pull-right">SIMPAN</button>

                <br></br>
                <?php echo form_close(); ?>
                <!-- </form> -->
                <datalist id="list_siswa">
                    <?php
                    foreach ($data_siswa as $tampilkan_siswa) {
                        echo "<option value='$tampilkan_siswa->nisn'>$tampilkan_siswa->nama</option>";
                    }
                    ?>
                </datalist>

            </div>
            <div class="pd-ltr-20">
                <div class="card-box pd-20 height-100-p mb-30">
                    <div class="row align-items-center">
                    </div>
                    <div class="box-header">
                        <strong> Data Transaksi Pembayaran</strong>

                    </div>
                    <table class="table table-bordered table-hover" id="example1">
                        <thead>
                            <tr>

                                <td>
                                    ID
                                </td>
                                <td>
                                    Nama Petugas
                                </td>
                                <td>
                                    NISN
                                </td>
                                <td>
                                    Nama Siswa
                                </td>
                                <td>
                                    Tanggal Bayar
                                </td>
                                <td>
                                    Bulan
                                </td>
                                <td>
                                    Tahun SPP
                                </td>
                                <td>
                                    Nominal
                                </td>
                                <td>
                                    Jumlah Bayar
                                </td>
                                <td>
                                    Status
                                </td>
                                <td>
                                    Aksi
                                </td>
                            </tr>
                        </thead>
                        <?php
                        foreach ($data_pembayaran as $tampilkan_transaksi) {
                            echo "<tr>";
                            echo "<td>$tampilkan_transaksi->id_pembayaran</td>";
                            echo "<td>$tampilkan_transaksi->fullname</td>";
                            echo "<td>$tampilkan_transaksi->nisn</td>";
                            echo "<td>$tampilkan_transaksi->nama</td>";
                            echo "<td>$tampilkan_transaksi->tgl_bayar</td>";
                            echo "<td>$tampilkan_transaksi->bulan_dibayar</td>";
                            echo "<td>$tampilkan_transaksi->tahun_dibayar</td>";
                            echo "<td>$tampilkan_transaksi->nominal</td>";
                            echo "<td>$tampilkan_transaksi->jumlah_bayar</td>";
                            if ($tampilkan_transaksi->jumlah_bayar >= $tampilkan_transaksi->nominal) {
                                echo  $status = "<td class=' btn-sm alert-success  '>Lunas</td>";
                            } else {
                                echo  $status = "<td class=' btn-sm alert-danger  '>Menunggak</td>";
                            }

                            echo "<td><a href='Admin/Ui_admin/Edittransaksi/$tampilkan_transaksi->id_pembayaran' class='btn btn-primary btn-xs'>Edit</a></td>";
                            echo "</tr>";
                        }
                        ?>
                    </table>
                </div>
            </div>
            <!-- JS -->

            <script>
                function autofill() {

                    var nisn = document.getElementById('nisn').value;
                    $.ajax({
                        url: "<?php echo base_url('Admin/Ui_admin/Autocomplete') ?>",
                        data: '&nisn=' + nisn,
                        success: function(data) {
                            var hasil = JSON.parse(data);
                            $.each(hasil, function(key, val) {
                                document.getElementById('nisn').value = val.nisn;
                                document.getElementById('nama').value = val.nama;
                                document.getElementById('id_kelas').value = val.id_kelas;
                                document.getElementById('kelas').value = val.nama_kelas;
                                document.getElementById('alamat').value = val.alamat;
                                document.getElementById('no_telepon').value = val.no_telepon;
                                document.getElementById('id_tahun').value = val.id_spp;
                                document.getElementById('tahun_spp').value = val.tahun;
                            });
                        }
                    });
                }
            </script>
        </div>
    </div>