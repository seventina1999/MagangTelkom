<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h2>
        <spann class="badge badge-success" style="background-color: #008080"><?= $judul; ?></span>
    </h2>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header justify-content-center">
                Ubah Password
            </div>
            <div class="card-body">
                <?= $this->session->flashdata('message'); ?>
                <form action="<?= base_url('profil/ubahpassword'); ?>" method="post">
                    <div class="form-group">
                        <label for="current_password">Current password</label>
                        <input type="password" class="form-control" id="current_password" name="current_password">
                        <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="new_password1">New password</label>
                        <input type="password" class="form-control" id="new_password1" name="new_password1">
                        <?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="new_password2">Repeat new password</label>
                        <input type="password" class="form-control" id="new_password2" name="new_password2">
                        <?= form_error('new_password2', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
            </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->