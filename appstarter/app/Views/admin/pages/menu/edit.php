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
                    <h4 class="card-title">Edit <?= $jenis['nama_jenis']; ?></h4>
                    <div class="card-content">
                        <?php
                        $error = array();
                        if (session()->get('error')) {
                            $error = session()->get('error');
                        } ?>
                        <form method="POST" action="/admin/menu/<?= $jenis['jenis_menu_id']; ?>/update/<?= $menu['menu_id']; ?>" class="form-horizontal" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="menu_id" value="<?= $menu['menu_id']; ?>">
                            <div class="row">
                                <div class="col-sm-12 col-m-12 col-lg-8">
                                    <div class="row">
                                        <label class="col-sm-2 label-on-left">Nama Menu</label>
                                        <div class="col-sm-10">
                                            <div class="form-group label-floating is-empty <?= (array_key_exists('nama_menu', $error)) ? 'has-error' : ''; ?>">
                                                <label class="control-label"></label>
                                                <input type="text" class="form-control" name="nama_menu" value="<?= $menu['nama_menu']; ?>">
                                                <span class="help-block"><?= (array_key_exists('nama_menu', $error)) ? $error['nama_menu'] : 'Nama Menu.'; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 label-on-left">Deskripsi</label>
                                        <div class="col-sm-10">
                                            <div class="form-group label-floating is-empty <?= (array_key_exists('deskripsi', $error)) ? 'has-error' : ''; ?>">
                                                <label class="control-label"></label>
                                                <textarea name="deskripsi" class="form-control" cols="30" rows="5"><?= $menu['deskripsi']; ?></textarea>
                                                <span class="help-block"><?= (array_key_exists('deskripsi', $error)) ? $error['deskripsi'] : 'Deskripsi singkat tentang menu.'; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 label-on-left">Harga</label>
                                        <div class="col-sm-10">
                                            <div class="form-group label-floating is-empty <?= (array_key_exists('harga', $error)) ? 'has-error' : ''; ?>">
                                                <label class="control-label"></label>
                                                <input type="number" class="form-control" name="harga" inputmode="numeric" value="<?= $menu['harga']; ?>">
                                                <span class="help-block"><?= (array_key_exists('harga', $error)) ? $error['harga'] : 'Harga menu dalam Rupiah.'; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-m-12 col-lg-4">
                                    <div class="row justify-content-center">
                                        <div class="col-12 align-items-center">
                                            <label class="col-sm-12 col-lg-4">Foto Menu</label>
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label"></label>
                                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail">
                                                        <img src="<?= base_url(); ?>/image/menu/<?= $jenis['slug_jenis']; ?>/<?= $menu['foto']; ?>" alt="...">
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                                    <div>
                                                        <span class="btn btn-rose btn-round btn-file">
                                                            <span class="fileinput-new">Select image</span>
                                                            <span class="fileinput-exists">Change</span>
                                                            <input type="file" name="foto" accept="image/gif,image/jpeg,image/jpg,image/png" />
                                                        </span>
                                                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                                    </div>
                                                </div>
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