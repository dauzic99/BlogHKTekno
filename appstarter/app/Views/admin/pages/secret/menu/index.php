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
                    <h4 class="card-title">Menu <?= $jenis_menu['nama_jenis']; ?></h4>
                    <div class="card-content">
                        <a href="<?= base_url(); ?>/admin/secret-menu/<?= $jenis_menu['slug_jenis']; ?>/create">
                            <button type="button" rel="tooltip" class="btn btn-rose btn-fill">
                                <i class="material-icons">library_add</i> Tambah
                            </button>
                        </a>
                        <div class="material-datatables">
                            <table class="table table-striped table-no-bordered table-hover" id="jenis-table">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Nama</th>
                                        <th>Deskripsi</th>
                                        <th>Harga</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($menu) : ?>
                                        <?php $i = 1; ?>
                                        <?php foreach ($menu as $type) : ?>
                                            <tr id="<?= $type['secret_id']; ?>">
                                                <td><?= $i; ?></td>
                                                <?php $i++; ?>
                                                <td><?php echo $type['nama_menu']; ?></td>
                                                <td><?php echo $type['deskripsi']; ?></td>
                                                <td><?php echo "Rp. " . number_format($type['harga'], 0, ".", ".") ?></td>
                                                <td class="td-actions text-right">
                                                    <?= csrf_field(); ?>
                                                    <a href="/admin/secret-menu/<?= $jenis_menu['slug_jenis']; ?>/edit/<?= $type['slug_menu']; ?>">

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
            var jenis = '<?= $jenis_menu['slug_jenis']; ?>';
            console.log(jenis);
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
                $.ajax({
                    type: 'POST',
                    url: "/admin/secret-menu/" + jenis + "/delete",
                    data: {
                        id: id,
                        jenis: jenis,
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.sukses) {
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