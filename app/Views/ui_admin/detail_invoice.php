<div class="main-container">
    <div class="pd-ltr-20">
        <div class="card-box pd-20 mb-30" ">
            <strong>Invoice Pembayaran SPP</strong>
            <table class=" table table-hover table-bordered" id="example5">
            <thead>
                <tr>
                    <td>Nama Akun</td>
                    <td>NISN</td>
                    <td>Nama Lengkap</td>
                    <td>nama Kelas</td>
                    <td>Alamat</td>
                    <td>No Telp</td>
                </tr>
            </thead>
            <?php foreach ($invoice as $tampilkan) : ?>


                <tr>
                    <td><?php echo $tampilkan->fullname ?></td>
                    <td><?php echo $tampilkan->nisn ?></td>
                    <td><?php echo $tampilkan->nama ?></td>
                    <td><?php echo $tampilkan->nama_kelas ?></td>
                    <td><?php echo $tampilkan->alamat ?></td>
                    <td><?php echo $tampilkan->no_telepon ?></td>

                </tr>


                </table>
                <div align="center">
                    <strong>Bukti Pembayaran SPP</strong>
                </div>
                <div class="profile-photo">
                    <a href="modal" data-toggle="modal" data-target="#modal" class="edit-avatar"><i class="fa fa-search-plus"></i></a>
                    <img src="<?php base_url(); ?>/uploads/<?= $tampilkan->invoice_image; ?>" alt="" class="avatar-photo">
                    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-body pd-5">
                                    <div class="img-container">
                                        <img id="image" src="<?php base_url(); ?>/uploads/<?= $tampilkan->invoice_image; ?>" alt="Picture">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="#" class="btn btn-primary">Feedback</a>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
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