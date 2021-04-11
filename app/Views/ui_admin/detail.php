<!-- cek User Detail -->
<!-- <div class="main-container">
    <div class="pd-ltr-20">
        <div class="card-box pd-20 height-100-p mb-30">
            <div class="row align-items-center">
                <h1 class="h3 mb-4 text-black-800">User Detail</h2>
                    <?= d($user); ?>
                    <div class="row">
                        <div class="col-lg-8">

                        </div>
                    </div>
            </div>
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
<br>
<br> -->



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
                                <li class="breadcrumb-item"><a href="<?= base_url('userlist') ?>">user list</a></li>
                                <li class="breadcrumb-item active" aria-current="page">user detail</li>
                            </ol>
                        </nav>
                    </div>
                </div>
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
                            <h5 class="text-center h5 mb-0"><?php echo $user->fullname ?></h5>
                            <p class="text-center text-muted font-14">Lorem ipsum dolor sit amet</p>
                            <div class="profile-info">
                                <h5 class="mb-20 h5 text-blue">Contact Information</h5>
                                <ul>
                                    <li>
                                        <span>Email Address:</span>
                                        <?php echo $user->email  ?>
                                    </li>
                                    <li>
                                        <span>Username:</span>
                                        <?php echo $user->name  ?>
                                    </li>

                                    <li>
                                        <span>Siswa Terkait:</span>
                                        Fiqrian Faturachman(181912070072)
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>