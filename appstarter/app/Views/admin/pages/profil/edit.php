<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">library_add</i>
                    </div>
                    <h4 class="card-title">Edit Profile</h4>
                    <div class="card-content" style="padding-top: 40px;">
                        <ul class="nav nav-pills nav-pills-warning">
                            <li class="<?= (session()->get('Pass_success') || session()->get('error')) ? '' : 'active' ?>">
                                <a href="#pill1" data-toggle="tab">Profile</a>
                            </li>
                            <li class="<?= (session()->get('Pass_success') || session()->get('error')) ? 'active' : '' ?>">
                                <a href="#pill2" data-toggle="tab">Password</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane <?= (session()->get('Pass_success') || session()->get('error')) ? '' : 'active' ?>" id="pill1">
                                <?php
                                $error = array();
                                if (session()->get('error')) {
                                    $error = session()->get('error');
                                } ?>
                                <?php
                                if (session()->get('success')) {
                                    $success = session()->get('success');
                                ?>
                                    <div class="alert alert-success mt-4" id="alert1">
                                        <button type="button" aria-hidden="true" class="close" id="close1">
                                            <i class="material-icons">close</i>
                                        </button>
                                        <span>
                                            <b>Berhasil - </b> <?= $success; ?></span>
                                    </div>
                                <?php } ?>

                                <form method="POST" action="<?= base_url(); ?>/admin/user/edit-profile" class="form-horizontal">
                                    <?= csrf_field(); ?>
                                    <div class="row">
                                        <div class="col-sm-12 col-m-12 col-lg-8">
                                            <div class="row">
                                                <label class="col-sm-2 label-on-left">Nama</label>
                                                <div class="col-sm-10">
                                                    <div class="form-group label-floating is-empty <?= (array_key_exists('nama_lengkap', $error)) ? 'has-error' : ''; ?>">
                                                        <label class="control-label"></label>
                                                        <input type="text" class="form-control" name="nama_lengkap" value="<?= $user['nama_lengkap'] ?>">
                                                        <span class="help-block"><?= (array_key_exists('nama_lengkap', $error)) ? $error['nama_lengkap'] : 'Nama Lengkap Pegawai.'; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-sm-2 label-on-left">Username</label>
                                                <div class="col-sm-10">
                                                    <div class="form-group label-floating is-empty <?= (array_key_exists('username', $error)) ? 'has-error' : ''; ?>">
                                                        <label class="control-label"></label>
                                                        <input type="text" class="form-control" name="username" value="<?= $user['username'] ?>">
                                                        <span class="help-block"><?= (array_key_exists('username', $error)) ? $error['username'] : 'Username untuk login.'; ?></span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-fill btn-rose">Update Profil</button>
                                </form>
                            </div>
                            <div class="tab-pane <?= (session()->get('Pass_success') || session()->get('error')) ? 'active' : '' ?>" id="pill2">

                                <?php
                                $error = array();
                                if (session()->get('error')) {
                                    $error = session()->get('error');
                                ?>
                                    <div class="alert alert-danger mt-4" id="alert2">
                                        <button type="button" aria-hidden="true" class="close" id="close2">
                                            <i class="material-icons">close</i>
                                        </button>
                                        <span>
                                            <b>Gagal - </b> Anda gagal memperbaharui password. Cek Kesalahan anda pada form berwarna merah</span>
                                    </div>
                                <?php } ?>
                                <?php
                                if (session()->get('Pass_success')) {
                                    $success = session()->get('Pass_success');
                                ?>
                                    <div class="alert alert-success mt-4" id="alert1">
                                        <button type="button" aria-hidden="true" class="close" id="close1">
                                            <i class="material-icons">close</i>
                                        </button>
                                        <span>
                                            <b>Berhasil - </b> <?= $success; ?></span>
                                    </div>
                                <?php } ?>

                                <form method="POST" action="<?= base_url(); ?>/admin/user/edit-password" class="form-horizontal">
                                    <?= csrf_field(); ?>
                                    <div class="row">
                                        <div class="col-sm-12 col-m-12 col-lg-8">
                                            <div class="row">
                                                <label class="col-sm-2 label-on-left">Old Password</label>
                                                <div class="col-sm-10">
                                                    <div class="form-group label-floating is-empty <?= (array_key_exists('old-password', $error)) ? 'has-error' : ''; ?>">
                                                        <label class="control-label"></label>
                                                        <input type="password" class="form-control" name="old-password">
                                                        <span class="help-block"><?= (array_key_exists('old-password', $error)) ? $error['old-password'] : 'Masukkan Password Anda.'; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-sm-2 label-on-left">New Password</label>
                                                <div class="col-sm-10">
                                                    <div class="form-group label-floating is-empty <?= (array_key_exists('new-password', $error)) ? 'has-error' : ''; ?>">
                                                        <label class="control-label"></label>
                                                        <input type="password" class="form-control" name="new-password">
                                                        <span class=" help-block"><?= (array_key_exists('new-password', $error)) ? $error['new-password'] : 'Masukkan Password yang baru.'; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-sm-2 label-on-left">Repeat New Password</label>
                                                <div class="col-sm-10">
                                                    <div class="form-group label-floating is-empty <?= (array_key_exists('confirm-new-password', $error)) ? 'has-error' : ''; ?>">
                                                        <label class="control-label"></label>
                                                        <input type="password" class="form-control" name="confirm-new-password">
                                                        <span class="help-block"><?= (array_key_exists('confirm-new-password', $error)) ? $error['confirm-new-password'] : 'Ulangi Password yang baru.'; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-fill btn-rose">Update Password</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script type="text/javascript">
    $(document).ready(function() {
        $("#close1").on("click", function() {
            $("#alert1").remove();
        });
        $("#close2").on("click", function() {
            $("#alert2").remove();
        });
    });
</script>
<?= $this->endSection(); ?>