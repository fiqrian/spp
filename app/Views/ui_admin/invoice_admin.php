<div class="main-container">
    <div class="pd-ltr-20">
        <div class="card-box pd-20 mb-30" ">
            <strong>Laporan Pembayaran SPP Online</strong>
            <table class=" table table-hover table-bordered" id="example1">
            <thead>
                <tr>
                    <td>Id Invoice
                    </td>
                    <td>NISN</td>
                    <td>Nama Lengkap</td>
                    <td>Tanggal Bayar</td>
                    <td>Batas Pembayaran</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <?php foreach ($data_invoice as $tampilkan) {
                echo "<tr>";
                echo "<td>$tampilkan->id_invoice</td>";
                echo "<td>$tampilkan->nisn</td>";
                echo "<td>$tampilkan->nama</td>";
                echo "<td>$tampilkan->tgl_bayar</td>";
                echo "<td>$tampilkan->batas_bayar</td>";
                echo "<td><a href=' /Admin/Ui_admin/detail_invoice/$tampilkan->id_invoice' class='btn btn-info'>Detail</a></td>";
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