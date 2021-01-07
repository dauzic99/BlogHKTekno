<?= $this->extend('front/layout/templates'); ?>

<!-- sidebar -->
<?= $this->section('sidebar'); ?>
<section class="ct-sidebar ct-js-sidebar ct-js-background ct-u-displayTable ct-u-hideAnimateBg" data-bg="<?= base_url(); ?>/image/tampilan/full2-menu.jpg">
    <div class="ct-sidebar-inner">
        <div class="item">
            <hr class="hr-custom ct-js-background animated" data-fx="fadeInDown" data-bg="<?= base_url(); ?>/depan/assets/images/hr2.png" data-bgrepeat="no-repeat">
            <h2 class="ct-u-font2 text-uppercase animated " data-fx="flipInY">our<br>menu</h2>
            <p class="animated" data-fx="fadeIn">Nunc fermentrum sem et enim fringilla<br> luctus.
                Nunc sagittis, nibh vel elementum<br> hendrerit, sem erat placerat.</p>
            <ul class="ct-restaurantMenu">
                <?php foreach ($jenis as $type) { ?>
                    <li class="ct-u-paddingBottom15 onepage">
                        <a href="#<?= $type['nama_jenis']; ?>" class="btn btn-lg btn-default ct-js-btnScroll animated ct-u-paddingTop10" data-fx="fadeIn" data-hover="<?= $type['nama_jenis']; ?>"><span><?= $type['nama_jenis']; ?></span></a>
                    </li>
                <?php } ?>
            </ul>
            <hr class="hr-custom ct-js-background ct-u-paddingTop40 animated" data-fx="fadeInDown" data-bg="<?= base_url(); ?>/depan/assets/images/hr2.png" data-bgrepeat="no-repeat">
        </div>
    </div>
</section>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<section class="ct-content">
    <section class="ct-frame ct-frame--white">
        <?php foreach ($jenis as $type) { ?>
            <section class="ct-foodBox">
                <div class="ct-imageBox ct-u-marginTop5 section" id="<?= $type['nama_jenis']; ?>">
                    <?php
                    $db      = \Config\Database::connect();
                    $builder = $db->table('menu');
                    $query   = $builder->getWhere(['jenis_menu_id' => $type['jenis_menu_id']]);
                    $menuFirst = $query->getResult();
                    ?>
                    <?php if ($menuFirst) { ?>
                        <img src="<?= base_url(); ?>/image/menu/<?= $type['slug_jenis']; ?>/<?= $menuFirst[0]->foto; ?>" alt="breakfast" />
                    <?php } ?>

                </div>
                <h3 class="text-center text-uppercase ct-u-font1 ct-fw-600"><?= $type['nama_jenis']; ?></h3>
                <hr class="hr-custom ct-js-background" data-bg="<?= base_url(); ?>/depan/assets/images/hr2.png" data-bgrepeat="no-repeat">
                <ul>
                    <?php
                    $db      = \Config\Database::connect();
                    $builder = $db->table('menu');
                    $query   = $builder->getWhere(['jenis_menu_id' => $type['jenis_menu_id']]);
                    helper('number');
                    foreach ($query->getResult() as $menu) {
                    ?>
                        <li class="ct-foodMenu">

                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="ct-dottedBg"></div>
                                    <label class="ptn13 ct-u-font2">
                                        <?= $menu->nama_menu; ?>
                                    </label>
                                </div>
                                <div class="col-lg-4">
                                    <span class="ptn13 ct-u-font1">
                                        <?php echo number_to_currency($menu->harga, 'IDR'); ?>
                                    </span>
                                </div>
                                <div class="col-lg-3">
                                    <span class="ptn13 ct-u-font1">
                                        <button class="btn btn-sm btn-button--brown addCart" data-id="<?= $menu->menu_id; ?>">Add To Cart</button>
                                    </span>
                                </div>
                                <div class="clearfix">
                                </div>
                            </div>



                            <div class="ct-u-foodIngredients"><?= $menu->deskripsi; ?></div>
                        </li>
                    <?php } ?>
                </ul>
                <div class="ct-hrContainer ct-u-paddingTop15 ct-u-paddingBottom10">
                    <hr class="hr-custom ct-js-background" data-bg="<?= base_url(); ?>/depan/assets/images/hr1.png">
                </div>
            </section>
        <?php } ?>
    </section>
</section>


<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
    $(document).ready(function() {

        $(document).on('click', '.addCart', function() {
            var id = $(this).data('id');
            $.ajax({
                type: 'POST',
                url: "/add-cart",
                data: {
                    id: id,
                },
                dataType: "json",
                success: function(data) {
                    alert(data.sukses);
                }
            })
        });


    });
</script>
<?= $this->endSection(); ?>


<?= $this->section('modals'); ?>
<!-- Modal -->

<?= $this->endSection(); ?>