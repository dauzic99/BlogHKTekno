<?= $this->extend('front/layout/templates'); ?>

<!-- sidebar -->
<?= $this->section('sidebar'); ?>
<section class="ct-sidebar ct-js-sidebar ct-js-background ct-u-displayNone ct-big-gallery" data-bg="<?= base_url(); ?>/depan/assets/images/content/full1-home.jpg">
    <div class="ct-js-owl " data-animations="true" data-height="100%" data-snap-ignore="true">
        <div class="item">
            <hr class="hr-custom ct-js-background animated" data-fx="fadeInDown" data-bg="<?= base_url(); ?>/depan/assets/images/hr2.png" data-bgrepeat="no-repeat">
            <h2 class="ct-u-font2 text-uppercase animated" data-fx="flipInY">We love<br>coffee</h2>
            <p class="animated" data-fx="fadeIn">Vivamus iaculis placerat diam, laoreet posuere<br>dui aliquet ut.Praesent lacinia eleifend<br>eros, ac venenatis orci.</p>
            <a href="about.html" class="btn btn-lg btn-default animated" data-fx="fadeIn" data-hover="It's Delicious"><span>More about us</span></a>
            <hr class="hr-custom ct-js-background animated ct-u-paddingTop60" data-fx="fadeInDown" data-bg="<?= base_url(); ?>/depan/assets/images/hr2.png" data-bgrepeat="no-repeat">
        </div>
        <div class="item">
            <hr class="hr-custom ct-js-background animated" data-fx="fadeInDown" data-bg="<?= base_url(); ?>/depan/assets/images/hr2.png" data-bgrepeat="no-repeat">
            <h2 class="ct-u-font2 text-uppercase animated" data-fx="flipInY">Coffee<br>& Breakfast</h2>
            <p class="animated" data-fx="fadeIn"> Donec fermentum eros at mauris mollis tincidunt.<br>Sed sit amet bibendum tellus, non commodo lacus.</p>
            <a href="menu.html" class="btn btn-lg btn-default animated" data-fx="fadeIn" data-hover="It's Delicious"><span>See our menu</span></a>
            <hr class="hr-custom ct-js-background animated ct-u-paddingTop60" data-fx="fadeInDown" data-bg="<?= base_url(); ?>/depan/assets/images/hr2.png" data-bgrepeat="no-repeat">
        </div>
        <div class="item">
            <hr class="hr-custom ct-js-background animated" data-fx="fadeInDown" data-bg="<?= base_url(); ?>/depan/assets/images/hr2.png" data-bgrepeat="no-repeat">
            <h2 class="ct-u-font2 text-uppercase animated" data-fx="flipInY">Catering service</h2>
            <p class="animated" data-fx="fadeIn">Aliquam erat volutpat. Morbi nisl nibh, interdum<br> vitae ultricies vitae, lobortis sit amet tellus<br> mauris dolor velit.</p>
            <a href="catering.html" class="btn btn-lg btn-default animated" data-fx="fadeIn" data-hover="It's Delicious"><span>Get an estimate</span></a>
            <hr class="hr-custom ct-js-background animated ct-u-paddingTop60" data-fx="fadeInDown" data-bg="<?= base_url(); ?>/depan/assets/images/hr2.png" data-bgrepeat="no-repeat">
        </div>
    </div>
</section>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<section class="ct-content">
    <div class="row ct-js-masonry">

        <div class="col-sm-6 ct-js-masonryItem">
        </div>

        <div class="col-sm-12 ct-js-masonryItem">
            <div class="ct-imageBox">
                <a href="menu.html">
                    <img src="<?= base_url(); ?>/depan/assets/images/content/promo1.jpg" alt="Breakfast menu">
                    <article class="ct-imageBox-inner">
                        <div class="ct-imageBox-innerAlign">
                            <div class="row">
                                <div class="col-sm-6 col-sm-offset-6 text-center">
                                    <hr class="hr-custom ct-js-background" data-bg="<?= base_url(); ?>/depan/assets/images/hr2.png" data-bgrepeat="no-repeat">
                                    <h5 class="ct-u-colorMotive ct-u-font3 text-uppercase">Come taste our</h5>
                                    <h3 class="ct-u-font2 text-uppercase">Breakfast Menu</h3>
                                </div>
                            </div>
                        </div>
                    </article>
                </a>
            </div>
        </div>
        <div class="col-sm-6 ct-js-masonryItem text-center ct-breakfastSection">
            <section class="ct-frame ct-frame--motive">
                <h4 class="ct-u-font1 text-uppercase ct-u-colorMotive ct-smallTitle">Breakfast<br>Special</h4>
                <h4 class="ct-u-font2 text-uppercase ct-u-colorWhite">Western Croissant</h4>
                <p>
                    Ham, green peppers, onions, on buttered croissant, with a mild chipotle sause
                </p>
                <hr class="hr-custom ct-js-background animated" data-fx="fadeInDown" data-bg="<?= base_url(); ?>/depan/assets/images/hr1.png" data-bgrepeat="repeat">

                <h4 class="ct-u-font1 text-uppercase ct-u-colorMotive ct-smallTitle">Lunch<br>Special</h4>
                <h4 class="ct-u-font2 text-uppercase ct-u-colorWhite">Sausage & Monterey Jack Quesadilla</h4>
                <p>
                    with red & green peppers, and sides of salsa & sour cream
                </p>
                <hr class="hr-custom ct-js-background animated" data-fx="fadeInDown" data-bg="<?= base_url(); ?>/depan/assets/images/hr1.png" data-bgrepeat="repeat">

                <h4 class="ct-u-font1 text-uppercase ct-u-colorMotive ct-smallTitle">Soups</h4>
                <h4 class="ct-u-font2 text-uppercase ct-u-colorWhite ">Tomato Bisque</h4>
                <h4 class="ct-u-font2 text-uppercase ct-u-colorWhite">Cream of potato</h4>
            </section>
        </div>
        <div class="col-sm-6 ct-js-masonryItem ct-deliveredSection">
            <div class="ct-imageBox">
                <a href="catering.html">
                    <img src="<?= base_url(); ?>/depan/assets/images/content/promo2.jpg" alt="Croissant">
                    <article class="ct-imageBox-inner">
                        <div class="ct-imageBox-innerAlign">
                            <div class="row">
                                <div class="col-sm-12 text-center">
                                    <hr class="hr-custom ct-js-background" data-bg="<?= base_url(); ?>/depan/assets/images/hr3.png" data-bgrepeat="no-repeat">
                                    <h5 class="ct-u-font3 text-uppercase ct-u-colorWhite">Fresh Pastries</h5>
                                    <h3 class="ct-u-font2 text-uppercase ct-u-colorWhite">Delivered Daily</h3>
                                </div>
                            </div>
                        </div>
                    </article>
                </a>
            </div>
        </div>
        <div class="col-sm-6 ct-js-masonryItem ct-coffeesSection">
            <div class="ct-imageBox">
                <a href="booking.html">
                    <img src="<?= base_url(); ?>/depan/assets/images/content/promo3.jpg" alt="Coffee">
                    <article class="ct-imageBox-inner">
                        <div class="ct-imageBox-innerAlign">
                            <div class="row">
                                <div class="col-sm-12 text-center">
                                    <hr class="hr-custom ct-js-background" data-bg="<?= base_url(); ?>/depan/assets/images/hr3.png" data-bgrepeat="no-repeat">
                                    <h5 class="ct-u-font3 text-uppercase ct-u-colorWhite">Fresh Roasted</h5>
                                    <h3 class="ct-u-font2 text-uppercase ct-u-colorWhite">Seasonal Coffees</h3>
                                </div>
                            </div>
                        </div>
                    </article>
                </a>
            </div>
        </div>
        <div class="col-sm-6 ct-js-masonryItem ct-small-gallery" data-snap-ignore="true">
            <div class="ct-js-owl ct-js-popupGallery" data-items="2" data-single="false" data-navigation="true" data-pagination="false" data-lgItems="2" data-mdItems="2" data-smItems="1">
                <div class="item ct-u-padding10">
                    <a href="<?= base_url(); ?>/depan/assets/images/content/gallery-full-1.jpg" class="ct-js-popup ct-gallerySlider-image" title="The Croissants"><img src="<?= base_url(); ?>/depan/assets/images/content/gallery-thumb-1.jpg" alt="thumbnail"></a>
                    <a href="<?= base_url(); ?>/depan/assets/images/content/gallery-full-2.jpg" class="ct-js-popup ct-gallerySlider-image" title="The Space"><img src="<?= base_url(); ?>/depan/assets/images/content/gallery-thumb-2.jpg" alt="thumbnail"></a>
                </div>
                <div class="item ct-u-padding10">
                    <a href="<?= base_url(); ?>/depan/assets/images/content/gallery-full-3.jpg" class="ct-js-popup ct-gallerySlider-image" title="The Lamps"><img src="<?= base_url(); ?>/depan/assets/images/content/gallery-thumb-3.jpg" alt="thumbnail"></a>
                    <a href="<?= base_url(); ?>/depan/assets/images/content/gallery-full-4.jpg" class="ct-js-popup ct-gallerySlider-image" title="The Coffee"><img src="<?= base_url(); ?>/depan/assets/images/content/gallery-thumb-4.jpg" alt="thumbnail"></a>
                </div>
                <div class="item ct-u-padding10">
                    <a href="<?= base_url(); ?>/depan/assets/images/content/gallery-full-5.jpg" class="ct-js-popup ct-gallerySlider-image" title="The balcon"><img src="<?= base_url(); ?>/depan/assets/images/content/gallery-thumb-5.jpg" alt="thumbnail"></a>
                    <a href="<?= base_url(); ?>/depan/assets/images/content/gallery-full-6.jpg" class="ct-js-popup ct-gallerySlider-image" title="The bread"><img src="<?= base_url(); ?>/depan/assets/images/content/gallery-thumb-6.jpg" alt="thumbnail"></a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 ct-js-masonryItem">
            <section class="ct-frame ct-frame--white">
                <h3 class="ct-u-font1 text-uppercase text-center">Welcome</h3>
                <hr class="hr-custom ct-js-background" data-bg="<?= base_url(); ?>/depan/assets/images/hr2.png" data-bgrepeat="no-repeat">
                <p>
                    Quisque non sapien sed ante tempor posuere nec a ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere risus cubilia. Donec vel magna at enim eget molestie fermentum. Nulla sagittis ex et mauris ultrices, ut convallis nulla molestie. Ut efficitur cursus ipsum eget semper. Aenean pretium risus nec hendrerit convallis.
                </p>
                <div class="text-center ct-u-paddingBoth20">
                    <a href="about.html" class="btn btn-lg btn-inverse animated" data-fx="fadeIn" data-hover="Our Tradition"><span>More About Us</span></a>
                </div>
            </section>
        </div>
        <div class="col-sm-12 ct-js-masonryItem">
            <div class="ct-imageBox">
                <a href="menu.html">
                    <img src="<?= base_url(); ?>/depan/assets/images/content/promo4.jpg" alt="Seasonal desserts">
                    <article class="ct-imageBox-inner">
                        <div class="ct-imageBox-innerAlign">
                            <div class="row">
                                <div class="col-sm-12 text-center">
                                    <hr class="hr-custom ct-js-background" data-bg="<?= base_url(); ?>/depan/assets/images/hr2.png" data-bgrepeat="no-repeat">
                                    <h5 class="ct-u-colorMotive ct-u-font3 text-uppercase">Come taste our</h5>
                                    <h3 class="ct-u-font2 text-uppercase ct-u-colorWhite">Seasonal desserts</h3>
                                </div>
                            </div>
                        </div>
                    </article>
                </a>
            </div>
        </div>
        <div class="col-sm-12 ct-js-masonryItem">
            <section class="ct-frame ct-frame--white">
                <h3 class="ct-u-font1 text-uppercase text-center">From The Blog</h3>
                <hr class="hr-custom ct-js-background" data-bg="<?= base_url(); ?>/depan/assets/images/hr2.png" data-bgrepeat="no-repeat">
                <article class="ct-blogItem ct-formatPhoto ct-u-paddingBottom20">
                    <a href="blog-single.html" class="ct-js-popup ct-frame-image" title="The Space"><img src="<?= base_url(); ?>/depan/assets/images/content/gallery-thumb-7.jpg" alt="thumbnail"></a>
                    <div class="ct-innerMargin">
                        <div class="ct-entryMeta">
                            <div class="ct-entryDateFirst">Oct 22, 2014</div>
                        </div>
                        <h3 class="ct-entryTitle ct-u-font2"><a href="blog-single.html">Standard Post Format with Preview Image</a></h3>
                        <p class="ct-entryDescription">
                            Etiam nunc tortur, ultrices quis turpis, tempor lacinia ligula. Sed at odio vel est lobortis eleifend ac vitae enim. Maecenas mattis nibg.
                            Nulla sagittis ex et mauris ultrices, ut convallis nulla molestie. Ut efficitur cursus ipsum eget semper.
                        </p>
                        <div class="clearfix"></div>
                    </div>
                </article>
            </section>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>