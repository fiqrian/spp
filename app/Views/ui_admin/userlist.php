<div class="main-container">
    <div class="pd-ltr-20">
        <div class="page-header">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="title">
                        <h4>Form Userlist</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">userl list</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="pd-ltr-20">

        <div class="card-box pd-20 height-100-p mb-30">


            <?php echo form_open('simpanuser'); ?>
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
                    gagal tambah User!
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

            Role
            <select name="group_id" id="" class="form-control">
                <option value="1">SuperAdmin</option>
                <option value="2">Admin</option>
                <option value="3">User</option>
            </select>
            ID <input list="list_user" type="text" name="user_id" value="" class="form-control">
            <datalist id="list_user">
                <?php
                foreach ($groups as $tampilkan) {
                    echo "<option value='$tampilkan->user_id'></option>";
                }
                ?>
            </datalist>

            <button type="submit" class="btn btn-primary btn-md pull-right">SIMPAN</button>
            <br>

            <?php echo form_close(); ?>
        </div>
    </div>

    <div class="pd-ltr-20">
        <div class="card-box pd-20 height-100-p mb-30">
            <!-- <div class="row align-items-center"> -->
            <table class="table table-bordered table-hover" id="example1">
                <thead>
                    <tr>

                        <th scope="col">NO.</th>
                        <th scope="col">ID USER</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <?php $nomor = 1; ?>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td scope="row"><?= $nomor++; ?></td>
                        <td><?= $user->userid; ?></td>
                        <td><?= $user->username; ?></td>
                        <td><?= $user->email; ?></td>
                        <td><?= $user->name; ?></td>
                        <td>
                            <a href="<?php echo base_url('/Admin/Ui_admin/detail/' . $user->userid); ?>" class="btn btn-info">Detail</a>
                            <button class="btn btn-danger btn-xs" onClick="hapus(<?php echo $user->userid ?>)">Hapus</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
    <div class="pd-ltr-20">
        <div class="card-box pd-20 height-100-p mb-30">
            <!-- <div class="row align-items-center"> -->
            <table class="table table-bordered table-hover" id="example11">
                <thead>
                    <tr>

                        <th scope="col">NO.</th>
                        <th scope="col">ID USER</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Name</th>

                    </tr>
                </thead>
                <?php $nomor = 1; ?>
                <?php foreach ($list as $list) : ?>
                    <tr>
                        <td scope="row"><?= $nomor++; ?></td>
                        <td><?= $list->id; ?></td>
                        <td><?= $list->username; ?></td>
                        <td><?= $list->email; ?></td>
                        <td><?= $list->fullname; ?></td>

                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
    <script>
        $('#form_hapus')[0].reset();

        function hapus(id) {
            $.ajax({
                url: "<?php echo base_url('/Admin/Ui_Admin/Getidusers') ?>/" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('[name="userid"]').val(data.id);
                    $('#modal-pesan').modal('show');
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Gagal ambil Ajax');
                }
            });
        }
    </script>
    <!-- Modal -->
    <div class="modal fade" id="modal-pesan" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body text-center font-18">
                    <h4 class="padding-top-30 mb-30 weight-500">Are you sure you want to continue?</h4>
                    <div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto;">
                        <div class="col-6">
                            <form action="<?php echo base_url('/Admin/Ui_admin/Hapususer') ?>" id="form_spp" method="post">
                                <input type="hidden" name="userid" value="">
                                <button type="button" class="btn btn-secondary border-radius-100 btn-block confirmation-btn" data-dismiss="modal"><i class="fa fa-times"></i></button>
                                NO
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary border-radius-100 btn-block confirmation-btn"><i class="fa fa-check"></i></button>
                            YES
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>