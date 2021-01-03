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
                    <h4 class="card-title">Tambah Pegawai</h4>
                    <div class="card-content">
                        <?php
                        $error = array();
                        if (session()->get('error')) {
                            $error = session()->get('error');
                        } ?>
                        <form method="POST" action="<?= base_url(); ?>/admin/pegawai/save" class="form-horizontal">
                            <?= csrf_field(); ?>
                            <div class="row">
                                <div class="col-sm-12 col-m-12 col-lg-8">
                                    <div class="row">
                                        <label class="col-sm-2 label-on-left">Nama</label>
                                        <div class="col-sm-10">
                                            <div class="form-group label-floating is-empty <?= (array_key_exists('nama_lengkap', $error)) ? 'has-error' : ''; ?>">
                                                <label class="control-label"></label>
                                                <input type="text" class="form-control" name="nama_lengkap" value="<?= old('nama_lengkap') ?>">
                                                <span class="help-block"><?= (array_key_exists('nama_lengkap', $error)) ? $error['nama_lengkap'] : 'Nama Lengkap Pegawai.'; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 label-on-left">Role</label>
                                        <div class="col-sm-10">
                                            <select class="selectpicker is-invalid" data-style="select-with-transition" title="Klik Disini Untuk Memilih Role Pegawai" name="role_id">
                                                <?php foreach ($role as $roles) { ?>
                                                    <option value="<?= $roles['role_id']; ?>" <?= (old('role_id') == $roles['role_id']) ? 'selected' : ''; ?>><?= $roles['nama_role']; ?> </option>
                                                <?php  } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 label-on-left">Username</label>
                                        <div class="col-sm-10">
                                            <div class="form-group label-floating is-empty <?= (array_key_exists('username', $error)) ? 'has-error' : ''; ?>">
                                                <label class="control-label"></label>
                                                <input type="text" class="form-control" name="username" value="<?= old('username') ?>">
                                                <span class="help-block"><?= (array_key_exists('username', $error)) ? $error['username'] : 'Username untuk login.'; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 label-on-left">Password</label>
                                        <div class="col-sm-10">
                                            <div class="form-group label-floating is-empty <?= (array_key_exists('password', $error)) ? 'has-error' : ''; ?>">
                                                <label class="control-label"></label>
                                                <input type="password" class="form-control" name="password" value="<?= old('password') ?>">
                                                <span class="help-block"><?= (array_key_exists('password', $error)) ? $error['password'] : 'Password untuk login.'; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-fill btn-rose">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection(); ?>