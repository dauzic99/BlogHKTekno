<?= $this->extend('front/layout/templates'); ?>

<!-- sidebar -->
<?= $this->section('sidebar'); ?>

<section class="ct-sidebar ct-js-sidebar">
    <style>
        .responsive-iframe {
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            width: 100%;
            height: 100%;
        }
    </style>
    <div class="ct-googleMap ct-js-googleMap">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15955.456219324758!2d116.7673858!3d-1.2531537!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x185d955646b3f6e0!2sWarjam%20Rest-Orasi!5e0!3m2!1sen!2sid!4v1609718936379!5m2!1sen!2sid" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0" class="responsive-iframe"></iframe>
    </div>

</section>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<section class="ct-content text-center ct-u-OverflowHidden">
    <section class="ct-frame ct-frame--white">
        <h3 class="ct-u-font1 text-uppercase text-center ct-u-marginTop5">contact us</h3>
        <hr class="hr-custom ct-js-background" data-bg="<?= base_url(); ?>/depan/assets/images/hr2.png" data-bgrepeat="no-repeat">
        <h5 class="ct-u-colorMotive ct-u-font3 ct-u-size14 text-uppercase ct-u-marginBottom5">Location</h5>
        <p class="ct-address ct-u-font2">
            <?= $contact['alamat']; ?>
        </p>
        <hr class="hr-custom ct-js-background" data-bg="<?= base_url(); ?>/depan/assets/images/hr2.png" data-bgrepeat="no-repeat">
        <h5 class="ct-u-colorMotive ct-u-font3 ct-u-size14 text-uppercase ct-u-marginBottom5">Phone</h5>
        <p class="ct-address ct-u-font2">
            <?= $contact['no_telp']; ?>
        </p>
        <hr class="hr-custom ct-js-background" data-bg="<?= base_url(); ?>/depan/assets/images/hr2.png" data-bgrepeat="no-repeat">
        <h5 class="ct-u-colorMotive ct-u-font3 ct-u-size14 text-uppercase ct-u-marginBottom5">We are open</h5>
        <p class="ct-address ct-u-font2">
            Monday—Sunday: 5pm–12am <br>
        </p>
        <div class="ct-hrContainer ct-u-paddingTop15 ct-u-paddingBottom30">
            <hr class="hr-custom ct-js-background" data-bg="<?= base_url(); ?>/depan/assets/images/hr1.png">
        </div>
        <ul class="list-unstyled list-inline ct-socials--square">
            <li>
                <a href="<?= $contact['facebook']; ?>" target="_blank">
                    <i class="fa fa-fw fa-facebook"></i>
                </a>
            </li>
            <li>
                <a href="<?= $contact['twitter']; ?>" target="_blank">
                    <i class="fa fa-fw fa-twitter"></i>
                </a>
            </li>
            <li>
                <a href="<?= $contact['youtube']; ?>" target="_blank">
                    <i class="fa fa-fw fa-youtube"></i>
                </a>
            </li>
            <li>
                <a href="<?= $contact['instagram']; ?>" target="_blank">
                    <i class="fa fa-instagram"></i>
                </a>
            </li>
            <li>
                <a href="<?= $contact['gmaps']; ?>" target="_blank">
                    <i class="fa fa-map-marker"></i>
                </a>
            </li>
        </ul>
        <div class="ct-hrContainer ct-u-paddingTop20 ct-u-paddingBottom5">
            <hr class="hr-custom ct-js-background" data-bg="<?= base_url(); ?>/depan/assets/images/hr1.png">
        </div>
        <h3 class="ct-u-font1 text-uppercase text-center ct-u-paddingBottom25">latest tweet</h3>
        <!--<hr class="hr-custom ct-js-background" data-bg="assets/images/hr2.png" data-bgrepeat="no-repeat">-->
        <!--<div class="ct-twitterContent">
            <h5 class="ct-twitterContent ct-twitterTime ct-u-colorMotive ct-u-font3 ct-u-size14 text-uppercase ct-u-marginBottom5">An hour ago</h5>
               <span>Only 4% of WordPress themes on ThemeForest have earned less than $1,000 in their lifetime.</span><br>
                <span class="ct-twitterContent ct-twitterLink">
                        <a href="http://inside.envato.com/pressnomics/">http://inside.envato.com/pressnomics/</a>
                </span>
            </div>-->
        <div class="tweets_display">

        </div>

        <div class="clearfix"></div>
        <div class="ct-hrContainer ct-u-paddingTop20 ct-u-paddingBottom5">
            <hr class="hr-custom ct-js-background" data-bg="<?= base_url(); ?>/depan/assets/images/hr1.png">
        </div>
        <h3 class="ct-u-font1 text-uppercase text-center">drop us a line</h3>
        <hr class="hr-custom ct-js-background" data-bg="<?= base_url(); ?>/depan/assets/images/hr2.png" data-bgrepeat="no-repeat">
        <form role="form" action="assets/form/send.php" method="post" class="contactForm validateIt ct-u-paddingTop10" data-email-subject="Contact Form" data-show-errors="true">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <input id="contact_name" placeholder="Your name" required type="text" name="field[]" class="form-control input-lg">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <input id="contact_email" placeholder="Email address" required type="email" name="field[]" class="form-control input-lg">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="form-group">
                        <textarea id="contact_message" placeholder="Message" class="form-control input-lg" rows="8" name="field[]" required></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="form-group">
                        <input type="submit" class="btn btn-lg btn-block btn-button--dark" value="send message">
                    </div>
                </div>
            </div>
        </form>

        <div class="successMessage alert alert-success" style="display: none">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Thank You!
        </div>
        <div class="errorMessage alert alert-danger" style="display: none">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Ups! An error occured. Please try again later.
        </div>

    </section>
</section>

</section>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>

<?= $this->endSection(); ?>