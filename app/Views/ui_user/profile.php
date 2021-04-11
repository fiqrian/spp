<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h4>Profile</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">profile</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <p><i class="icon fa fa-warning"></i>SILAHKAN KAITKAN NISN <br> Jika sudah abaikan pesan ini!
                </p>
            </div>
            <div class="row align-items-center">
                <div class="main-container">
                    <div class="pd-ltr-20">
                        <div class="card-box pd-20 height-100-p mb-30">

                            <div class="profile-photo">
                                <a href="modal" data-toggle="modal" data-target="#modal" class="edit-avatar"><i class="fa fa-pencil"></i></a>
                                <img src="<?php base_url(); ?>/image/<?= user()->user_image; ?>" alt="" class="avatar-photo">
                                <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body pd-5">
                                                <div class="img-container">
                                                    <img id="image" src="<?php base_url(); ?>/image/<?= user()->user_image; ?>" alt="Picture">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="submit" value="Update" class="btn btn-primary">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h5 class="text-center h5 mb-0"><?php echo user()->fullname ?></h5>
                            <p class="text-center text-muted font-14">Lorem ipsum dolor sit amet</p>
                            <div class="profile-info">
                                <h5 class="mb-20 h5 text-blue">Contact Information</h5>
                                <ul>
                                    <li>
                                        <span>Email Address:</span>
                                        <?php echo user()->email  ?>
                                    </li>
                                    <li>
                                        <span>Username:</span>
                                        <?php echo user()->username  ?>
                                    </li>

                                    <li>
                                        <span>Siswa Terkait:</span>
                                        Nama:<?php echo $siswa->nama ?>(<?php echo $siswa->nis ?>)

                                    </li>
                                    <form action="<?php echo base_url('kaitkan') ?>" method="post">
                                        <input type="hidden" name="id" value="<?= user()->id; ?>">
                                        <input type="hidden" name="email" value="<?= user()->email; ?>">
                                        <input list="list_siswa" type="text" name="nisn" id="nisn" value="<?php echo user()->nisn; ?>" placeholder="KAITKAN NISN SISWA" class="form-control">
                                        <datalist id="list_siswa">
                                            <?php
                                            foreach ($data_siswa as $tampilkan_siswa) {
                                                echo "<option value='$tampilkan_siswa->nisn'>$tampilkan_siswa->nama</option>";
                                            }
                                            ?>
                                        </datalist>

                                        <button class="btn btn-primary btn-sm pull-right mt-2">simpan</button>
                                        <br>
                                    </form>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>