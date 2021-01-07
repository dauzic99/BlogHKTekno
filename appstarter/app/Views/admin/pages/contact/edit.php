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
                    <h4 class="card-title">Edit Contact</h4>
                    <div class="card-content" style="padding-top: 40px;">
                        <ul class="nav nav-pills nav-pills-warning">
                            <li class="<?= (session()->get('Pass_success') || session()->get('error')) ? '' : 'active' ?>">
                                <a href="#pill1" data-toggle="tab">Contact</a>
                            </li>
                            <li class="<?= (session()->get('Pass_success') || session()->get('error')) ? 'active' : '' ?>">
                                <a href="#pill2" data-toggle="tab">Social Media</a>
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

                                <form method="POST" action="<?= base_url(); ?>/admin/contact/edit-contact" class="form-horizontal">
                                    <?= csrf_field(); ?>
                                    <div class="row">
                                        <div class="col-sm-12 col-m-12 col-lg-8">
                                            <div class="row">
                                                <label class="col-sm-2 label-on-left">No Telepon</label>
                                                <div class="col-sm-10">
                                                    <div class="form-group label-floating is-empty <?= (array_key_exists('no_telp', $error)) ? 'has-error' : ''; ?>">
                                                        <label class="control-label"></label>
                                                        <input type="text" class="form-control" name="no_telp" value="<?= $kontak['no_telp'] ?>">
                                                        <span class="help-block"><?= (array_key_exists('no_telp', $error)) ? $error['no_telp'] : 'No Telepon Warjam.'; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-sm-2 label-on-left">Alamat</label>
                                                <div class="col-sm-10">
                                                    <div class="form-group label-floating is-empty <?= (array_key_exists('alamat', $error)) ? 'has-error' : ''; ?>">
                                                        <label class="control-label"></label>
                                                        <textarea class="form-control" name="alamat" cols="30" rows="10"><?= $kontak['alamat'] ?></textarea>

                                                        <span class="help-block"><?= (array_key_exists('alamat', $error)) ? $error['alamat'] : 'Alamat Warjam.'; ?></span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-fill btn-rose">Update Kontak</button>
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

                                <form method="POST" action="<?= base_url(); ?>/admin/contact/edit-socmed" class="form-horizontal">
                                    <?= csrf_field(); ?>
                                    <div class="row">
                                        <div class="col-sm-12 col-m-12 col-lg-8">
                                            <div class="row">
                                                <label class="col-sm-2 label-on-left">Email</label>
                                                <div class="col-sm-10">
                                                    <div class="form-group label-floating is-empty <?= (array_key_exists('email', $error)) ? 'has-error' : ''; ?>">
                                                        <label class="control-label"></label>
                                                        <input type="email" class="form-control" name="email" value="<?= $kontak['email'] ?>">
                                                        <span class="help-block"><?= (array_key_exists('email', $error)) ? $error['email'] : 'Email Warjam.'; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-sm-2 label-on-left">Facebook</label>
                                                <div class="col-sm-10">
                                                    <div class="form-group label-floating is-empty <?= (array_key_exists('facebook', $error)) ? 'has-error' : ''; ?>">
                                                        <label class="control-label"></label>
                                                        <input type="url" class="form-control" name="facebook" value="<?= $kontak['facebook'] ?>">
                                                        <span class="help-block"><?= (array_key_exists('facebook', $error)) ? $error['facebook'] : 'Link Profil Facebook Warjam Lengkap dengan https://'; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-sm-2 label-on-left">Twitter</label>
                                                <div class="col-sm-10">
                                                    <div class="form-group label-floating is-empty <?= (array_key_exists('twitter', $error)) ? 'has-error' : ''; ?>">
                                                        <label class="control-label"></label>
                                                        <input type="url" class="form-control" name="twitter" value="<?= $kontak['twitter'] ?>">
                                                        <span class="help-block"><?= (array_key_exists('twitter', $error)) ? $error['twitter'] : 'Link Profil Twitter Warjam Lengkap dengan https://'; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-sm-2 label-on-left">Instagram</label>
                                                <div class="col-sm-10">
                                                    <div class="form-group label-floating is-empty <?= (array_key_exists('instagram', $error)) ? 'has-error' : ''; ?>">
                                                        <label class="control-label"></label>
                                                        <input type="url" class="form-control" name="instagram" value="<?= $kontak['instagram'] ?>">
                                                        <span class="help-block"><?= (array_key_exists('instagram', $error)) ? $error['instagram'] : 'Link Profil Instagram Warjam Lengkap dengan https://'; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-sm-2 label-on-left">Youtube</label>
                                                <div class="col-sm-10">
                                                    <div class="form-group label-floating is-empty <?= (array_key_exists('youtube', $error)) ? 'has-error' : ''; ?>">
                                                        <label class="control-label"></label>
                                                        <input type="url" class="form-control" name="youtube" value="<?= $kontak['youtube'] ?>">
                                                        <span class="help-block"><?= (array_key_exists('youtube', $error)) ? $error['youtube'] : 'Link Channel Youtube Lengkap dengan https://'; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-sm-2 label-on-left">Google Maps</label>
                                                <div class="col-sm-10">
                                                    <div class="form-group label-floating is-empty <?= (array_key_exists('gmaps', $error)) ? 'has-error' : ''; ?>">
                                                        <label class="control-label"></label>
                                                        <input type="url" class="form-control" name="gmaps" value="<?= $kontak['gmaps'] ?>">
                                                        <span class="help-block"><?= (array_key_exists('gmaps', $error)) ? $error['gmaps'] : 'Link Google Maps Warjam Lengkap dengan https://'; ?></span>
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