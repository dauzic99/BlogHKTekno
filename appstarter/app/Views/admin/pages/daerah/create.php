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
                    <h4 class="card-title">Tambah Daerah</h4>
                    <div class="card-content">
                        <?php
                        $error = array();
                        if (session()->get('error')) {
                            $error = session()->get('error');
                        } ?>
                        <form method="POST" action="<?= base_url(); ?>/admin/daerah/save" class="form-horizontal">
                            <?= csrf_field(); ?>
                            <div class="row">
                                <div class="col-sm-12 col-m-12 col-lg-8">
                                    <div class="row">
                                        <label class="col-sm-2 label-on-left">Nama Daerah</label>
                                        <div class="col-sm-10">
                                            <div class="form-group label-floating is-empty <?= (array_key_exists('nama_daerah', $error)) ? 'has-error' : ''; ?>">
                                                <label class="control-label"></label>
                                                <input type="text" class="form-control" name="nama_daerah" value="<?= old('nama_daerah') ?>">
                                                <span class="help-block"><?= (array_key_exists('nama_daerah', $error)) ? $error['nama_daerah'] : 'Nama Daerah Pengantaran.'; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 label-on-left">Ongkos</label>
                                        <div class="col-sm-10">
                                            <div class="form-group label-floating is-empty <?= (array_key_exists('ongkos', $error)) ? 'has-error' : ''; ?>">
                                                <label class="control-label">Rp</label>
                                                <input type="number" class="form-control" name="ongkos" inputmode="numeric" value="<?= old('ongkos') ?>">
                                                <span class=" help-block"><?= (array_key_exists('ongkos', $error)) ? $error['ongkos'] : 'Ongkos Pengantaran Pesanan ke Daerah Tersebut.'; ?></span>
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