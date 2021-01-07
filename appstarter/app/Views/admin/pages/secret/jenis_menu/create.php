<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <a href="<?= base_url(); ?>/admin/secret-menu">
                        <div class="card-header card-header-icon" data-background-color="rose">
                            <i class="material-icons">arrow_back</i>
                        </div>
                    </a>
                    <h4 class="card-title">
                        Tambah Secret Menu
                    </h4>
                    <div class="card-content">

                        <form method="POST" action="<?= base_url(); ?>/admin/secret-menu/save">
                            <?= csrf_field(); ?>
                            <div class="form-group label-floating">
                                <label class="control-label">Nama Jenis</label>
                                <input type="text" class="form-control" name="nama_jenis">
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