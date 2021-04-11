<div class="main-container">
    <div class="pd-ltr-20">
        <div class="card-box pd-20 height-100-p mb-30">
            <div class="row align-items-center">
            </div>
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <p><i class="icon fa fa-warning"></i>DATA TIDAK KELUAR! SILAHKAN KAITKAN NISN DI AKUN ANDA KLIK <a href="/Users/Ui/profile/<?php echo user()->id; ?>" class="text-primary"> DISINI!.</a>
                    <br> Jika sudah abaikan pesan ini!
                </p>
            </div>
            <div class="box-header">
                <strong> Laporan SPP</strong>

            </div>
            <table class="table table-bordered table-hover" id="example1">
                <thead>
                    <tr>

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
                    </tr>
                </thead>
                <?php
                foreach ($bayar as $tampilkan_transaksi) {
                    echo "<tr>";
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

                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>