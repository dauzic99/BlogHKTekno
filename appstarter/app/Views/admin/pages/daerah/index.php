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
                    <h4 class="card-title">Wilayah</h4>
                    <div class="card-content">
                        <a href="<?= base_url(); ?>/admin/daerah/create">
                            <button type="button" rel="tooltip" class="btn btn-rose btn-fill">
                                <i class="material-icons">library_add</i> Tambah
                            </button>
                        </a>
                        <div class="material-datatables">
                            <table class="table table-striped table-no-bordered table-hover" id="jenis-table">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Nama Daerah</th>
                                        <th>Ongkos</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($daerah) : ?>
                                        <?php $i = 1; ?>
                                        <?php foreach ($daerah as $type) : ?>
                                            <tr id="<?= $type['daerah_id']; ?>">
                                                <td><?= $i; ?></td>
                                                <?php $i++; ?>
                                                <td><?php echo $type['nama_daerah']; ?></td>
                                                <td><?php echo $type['ongkos']; ?></td>
                                                <td class="td-actions text-right">

                                                    <?= csrf_field(); ?>
                                                    <a href="/admin/daerah/edit/<?= $type['slug_daerah']; ?>">

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
                    url: "/admin/daerah/delete",
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