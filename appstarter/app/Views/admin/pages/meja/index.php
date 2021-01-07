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
                    <h4 class="card-title">Meja</h4>
                    <div class="card-content">
                        <a href="<?= base_url(); ?>/admin/meja/create">
                            <button type="button" rel="tooltip" class="btn btn-rose btn-fill">
                                <i class="material-icons">library_add</i> Tambah
                            </button>
                        </a>
                        <div class="material-datatables">
                            <table class="table table-striped table-no-bordered table-hover" id="jenis-table">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Nomor Meja</th>
                                        <th>Unique Key</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($meja) : ?>
                                        <?php $i = 1; ?>
                                        <?php foreach ($meja as $type) : ?>
                                            <tr id="<?= $type['meja_id']; ?>">
                                                <td><?= $i; ?></td>
                                                <?php $i++; ?>
                                                <td><?php echo $type['nomor_meja']; ?></td>
                                                <td><?php echo $type['unique_key']; ?></td>

                                                <td class="td-actions text-right">
                                                    <button type="button" rel="tooltip" class="btn btn-raised btn-round btn-info showQr">
                                                        <i class="fa fa-qrcode" aria-hidden="true"></i> Lihat QR
                                                    </button>

                                                    <?= csrf_field(); ?>
                                                    <a href="/admin/meja/edit/<?= $type['unique_key']; ?>">
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

<?= $this->section('modals'); ?>

<div class="modal fade" id="qrModals" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notice">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                <h5 class="modal-title" id="QRLabel">QR Code Meja</h5>
            </div>
            <div class="modal-body">
                <div class="instruction">
                    <div class="row text-center">
                        <div class="col-md-12 printContent">
                            <img class="img-fluid" src="" alt="" id="QRImage">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer text-center">
                <button type="button" class="btn btn-info btn-round printQR" data-dismiss="modal">Print!</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
    $(document).ready(function() {
        //show qr
        $(".showQr").click(function() {
            var id = $(this).parents("tr").attr("id");
            $.ajax({
                type: 'POST',
                url: "/admin/meja/getQR",
                data: {
                    id: id,
                },
                dataType: "json",
                success: function(data) {
                    document.getElementById('QRLabel').innerHTML = 'QR Code Meja ' + data.nomor_meja;
                    $("#QRImage").attr("src", "<?= base_url(); ?>/image/meja/" + data.qr);
                    $('#qrModals').modal('show');

                },
            })
        });

        $('.printQR').click(function() {
            var printWindow = window.open('', '', 'height=400,width=800');
            var divContents = $(".printContent").html() +
                "<script>" +
                "window.onload = function() {" +
                "     window.print();" +
                "};" +
                "<" + "/script>";
            printWindow.document.write(divContents);
            printWindow.document.close();
        });



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
                    url: "/admin/meja/delete",
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