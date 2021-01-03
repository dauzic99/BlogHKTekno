<?= $this->extend('admin/layout/template'); ?>

<?= $this->section('content'); ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">assignment</i>
                    </div>
                    <h4 class="card-title">Pegawai</h4>
                    <div class="card-content">
                        <a href="<?= base_url(); ?>/admin/pegawai/create">
                            <button type="button" rel="tooltip" class="btn btn-rose btn-fill">
                                <i class="material-icons">library_add</i> Tambah
                            </button>
                        </a>
                        <div class="material-datatables">
                            <table class="table table-striped table-no-bordered table-hover" id="jenis-table">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Role</th>
                                        <th>Last Login</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($pegawai) : ?>
                                        <?php $i = 1; ?>
                                        <?php foreach ($pegawai->getResult() as $type) : ?>
                                            <?php if ($type->user_id == session()->get('user_id')) {
                                                continue;
                                            } ?>
                                            <tr id="<?= $type->user_id; ?>">
                                                <?php $i++; ?>
                                                <td><?php echo $type->nama_lengkap; ?></td>
                                                <td><?php echo $type->username; ?></td>
                                                <td data-toggle="tooltip" data-placement="top" title="<?php echo $type->password; ?>">**************</td>
                                                <td><?php echo $type->nama_role; ?></td>
                                                <?php if ($type->last_login_at == '') { ?>
                                                    <td><?php echo 'never'; ?></td>
                                                <?php } else { ?>
                                                    <td><?php echo $type->last_login_at; ?></td>
                                                <?php } ?>
                                                <td class="td-actions text-right">
                                                    <?= csrf_field(); ?>
                                                    <a href="/admin/pegawai/edit/<?= $type->user_id; ?>">
                                                        <button type="button" rel="tooltip" class="btn btn-success">
                                                            <i class="material-icons">edit</i>
                                                        </button>
                                                    </a>
                                                    <button type="submit" rel="tooltip" class="btn btn-danger delete">
                                                        <i class="material-icons">delete_forever</i>
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
    $(document).ready(function() {
        $('#jenis-table').DataTable();
        $(".delete").click(function() {
            var id = $(this).parents("tr").attr("id");
            swal({
                title: 'Hapus',
                text: 'Yakin ingin menghapus',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, keep it',
                confirmButtonClass: "btn btn-success",
                cancelButtonClass: "btn btn-danger",
                buttonsStyling: false
            }).then((result) => {
                console.log('id :' + id);
                $.ajax({
                    type: 'POST',
                    url: "/admin/pegawai/delete",
                    data: {
                        id: id,
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.sukses) {
                            console.log(response.id);
                            swal({
                                title: "Berhasil!",
                                text: response.sukses,
                                buttonsStyling: false,
                                confirmButtonClass: "btn btn-success",
                                type: "success"
                            }).then((result) => {
                                location.reload();
                            });
                        }
                    }
                })


            })
        });
    });
</script>
<?= $this->endSection(); ?>