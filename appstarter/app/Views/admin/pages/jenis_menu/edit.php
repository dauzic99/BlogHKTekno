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
                    <h4 class="card-title">Edit Jenis Menu</h4>
                    <div class="card-content">

                        <form method="POST" action="/admin/menu/update/<?= $jenis['jenis_menu_id']; ?>">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="slug" value="<?= $jenis['slug_jenis']; ?>">
                            <div class="form-group label-floating">
                                <label class="control-label">Nama Jenis</label>
                                <input type="text" class="form-control" name="nama_jenis" value="<?= $jenis['nama_jenis']; ?>">
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