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
                    <h4 class="card-title">Edit Meja</h4>
                    <div class="card-content">
                        <?php
                        $error = array();
                        if (session()->get('error')) {
                            $error = session()->get('error');
                        } ?>
                        <form method="POST" action="/admin/meja/update/<?= $meja['meja_id']; ?>" class="form-horizontal">
                            <?= csrf_field(); ?>
                            <div class="row">
                                <div class="col-sm-12 col-m-12 col-lg-8">
                                    <div class="row">
                                        <label class="col-sm-2 label-on-left">Nomor Meja</label>
                                        <div class="col-sm-10">
                                            <div class="form-group label-floating is-empty <?= (array_key_exists('nomor_meja', $error)) ? 'has-error' : ''; ?>">
                                                <label class="control-label">Meja</label>
                                                <input type="number" class="form-control" name="nomor_meja" inputmode="numeric" value="<?= $meja['nomor_meja'] ?>">
                                                <span class=" help-block"><?= (array_key_exists('nomor_meja', $error)) ? $error['nomor_meja'] : 'Nomor Meja Warjam.'; ?></span>
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