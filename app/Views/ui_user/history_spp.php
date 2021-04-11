<div class="main-container">
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
                <?php foreach ($invoice as $tampilkan_siswa) {


                    echo "<tr>";
                    echo "<td>$tampilkan_siswa->nisn</td>";
                    echo "<td>$tampilkan_siswa->nis</td>";
                    echo "<td>$tampilkan_siswa->nama</td>";
                    echo "<td>$tampilkan_siswa->nama_kelas</td>";
                    echo "<td>$tampilkan_siswa->alamat</td>";
                    echo "<td>$tampilkan_siswa->no_telepon</td>";
                    echo "<td>$tampilkan_siswa->tahun</td>";
                    echo "<td><a href='/Users/Ui/invoice_spp/$tampilkan_siswa->id_invoice' class='btn btn-info'>invoice</a></td>";


                    echo "</tr>";
                }
                ?>
            </table>
        </div>

    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>