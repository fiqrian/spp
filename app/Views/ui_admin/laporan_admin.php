<div class="main-container">
    <div class="pd-ltr-20">
        <center>
            <a href="<?= base_url('printpdf'); ?>" class="btn btn-primary"><i class="icon-copy fa fa-print" aria-hidden="true"></i>PDF</a>
        </center>
        <div class="card-box pd-20 height-100-p mb-30">
            <div class="row align-items-center">
            </div>


            <strong>Data Kelas </strong>
            <table class="table table-bordered table-hover" id="example2">
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

                    </tr>
                </thead>
                <?php

                foreach ($data_kelas as $tampilkan) {
                    echo "<tr>";
                    echo "<td>$tampilkan->id_kelas</td>";
                    echo "<td>$tampilkan->nama_kelas</td>";
                    echo "<td>$tampilkan->kompetensi_keahlian</td>";
                    echo "</tr>";
                }
                ?>

            </table>
        </div>
    </div>

    <div class="pd-ltr-20">
        <div class="card-box pd-20 height-100-p mb-30">

            <div class="box-header ">
                <div class="title">
                    <strong>Data Wali Kelas </strong>
                </div>
            </div>
            <br></br>
            <table class="table table-bordered table-hover" id="example3">
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
                    </tr>
                </thead>
                <?php foreach ($data_wali as $tampilkan) {


                    echo "<tr>";
                    echo "<td>$tampilkan->id_wali</td>";
                    echo "<td>$tampilkan->nama</td>";
                    echo "<td>$tampilkan->nama_kelas</td>";
                    echo "<td>$tampilkan->kompetensi_keahlian</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>



    <div class="pd-ltr-20">
        <div class="card-box pd-20 height-100-p mb-30">
            <div class="row align-items-center">
            </div>
            <div class="box-header">
                <strong> Data Siswa</strong>
            </div>

            <table class="table table-bordered table-hover" id="example4">
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
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>

    <div class="pd-ltr-20">
        <div class="card-box pd-20 height-100-p mb-30">
            <div class="row align-items-center">
            </div>
            <strong>Data SPP</strong>
            <table class="table table-bordered table-hover" id="example5">
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
                    </tr>
                </thead>
                <?php

                foreach ($data_spp as $tampilkan) {
                    echo "<tr>";
                    echo "<td>$tampilkan->id_spp</td>";
                    echo "<td>$tampilkan->tahun</td>";
                    echo "<td>$tampilkan->nominal</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>


    <div class="pd-ltr-20">
        <div class="card-box pd-20 height-100-p mb-30">
            <div class="row align-items-center">
            </div>
            <div class="box-header">
                <strong> Data Transaksi Pembayaran</strong>

            </div>
            <table class="table table-bordered table-hover" id="example6">
                <thead>
                    <tr>
                        <td>
                            ID Pembayaran
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
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>

</div>
</div>