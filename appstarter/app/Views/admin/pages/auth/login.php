<!doctype html>
<html lang="en">


<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/pages/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:32:19 GMT -->

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>/mdb/assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>/mdb/assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title><?= $title; ?></title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Canonical SEO -->
    <link rel="canonical" href="//www.creative-tim.com/product/material-dashboard-pro" />
    <!--  Social tags      -->
    <meta name="keywords" content="material dashboard, bootstrap material admin, bootstrap material dashboard, material design admin, material design, creative tim, html dashboard, html css dashboard, web dashboard, freebie, free bootstrap dashboard, css3 dashboard, bootstrap admin, bootstrap dashboard, frontend, responsive bootstrap dashboard, premiu material design admin">
    <meta name="description" content="Material Dashboard PRO is a Premium Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design.">
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="Material Dashboard PRO by Creative Tim | Premium Bootstrap Admin Template">
    <meta itemprop="description" content="Material Dashboard PRO is a Premium Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design.">
    <meta itemprop="image" content="s3.amazonaws.com/creativetim_bucket/products/51/opt_mdp_thumbnail.jpg">
    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@creativetim">
    <meta name="twitter:title" content="<?= $title; ?>">
    <meta name="twitter:description" content="Material Dashboard PRO is a Premium Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design.">
    <meta name="twitter:creator" content="@creativetim">
    <meta name="twitter:image" content="s3.amazonaws.com/creativetim_bucket/products/51/opt_mdp_thumbnail.jpg">
    <!-- Open Graph data -->
    <meta property="fb:app_id" content="655968634437471">
    <meta property="og:title" content="Material Dashboard PRO by Creative Tim | Premium Bootstrap Admin Template" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="http://www.creative-tim.com/product/material-dashboard-pro" />
    <meta property="og:image" content="s3.amazonaws.com/creativetim_bucket/products/51/opt_mdp_thumbnail.jpg" />
    <meta property="og:description" content="Material Dashboard PRO is a Premium Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design." />
    <meta property="og:site_name" content="Creative Tim" />
    <!-- Bootstrap core CSS     -->
    <link href="<?php echo base_url(); ?>/mdb/assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="<?php echo base_url(); ?>/mdb/assets/css/material-dashboard.css" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?php echo base_url(); ?>/mdb/assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="<?php echo base_url(); ?>/mdb/assets/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>/mdb/assets/css/google-roboto-300-700.css" rel="stylesheet" />
</head>

<body>

    <div class="wrapper wrapper-full-page">
        <div class="full-page login-page" filter-color="black" data-image="<?php echo base_url(); ?>/mdb/assets/img/login.jpg">
            <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                            <?= $validation->listErrors(); ?>
                            <form method="POST" action="/login">
                                <?= csrf_field(); ?>
                                <div class="card card-login card-hidden">
                                    <div class="card-header text-center" data-background-color="rose">
                                        <h4 class="card-title">Login</h4>
                                    </div>
                                    <div class="card-content">
                                        <?php
                                        $error = array();
                                        if (session()->get('error')) {
                                            $error = session()->get('error');
                                        ?>
                                            <div class="alert alert-rose mt-4" id="alert1">
                                                <button type="button" aria-hidden="true" class="close" id="close1">
                                                    <i class="material-icons">close</i>
                                                </button>
                                                <span>
                                                    <b>Gagal - </b> <?= $error; ?></span>
                                            </div>
                                        <?php } ?>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">face</i>
                                            </span>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Username</label>
                                                <input type="text" class="form-control" name="username">
                                            </div>
                                        </div>

                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">lock_outline</i>
                                            </span>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Password</label>
                                                <input type="password" class="form-control" name="password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer text-center">
                                        <button type="submit" class="btn btn-rose btn-simple btn-wd btn-lg">Login</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>
<div class="fixed-plugin">
    <div class="dropdown show-dropdown">
        <a href="#" data-toggle="dropdown">
            <i class="fa fa-cog fa-2x"> </i>
        </a>
        <ul class="dropdown-menu">
            <li class="header-title">Background Style</li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger">
                    <p>Background Image</p>
                    <div class="togglebutton switch-sidebar-image">
                        <label>
                            <input type="checkbox" checked="">
                        </label>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger active-color">
                    <p>Filters</p>
                    <div class="badge-colors pull-right">
                        <span class="badge filter active" data-color="black"></span>
                        <span class="badge filter badge-blue" data-color="blue"></span>
                        <span class="badge filter badge-green" data-color="green"></span>
                        <span class="badge filter badge-orange" data-color="orange"></span>
                        <span class="badge filter badge-red" data-color="red"></span>
                        <span class="badge filter badge-purple" data-color="purple"></span>
                        <span class="badge filter badge-rose" data-color="rose"></span>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li class="header-title">Background Images</li>
            <li class="active">
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="<?php echo base_url(); ?>/mdb/assets/img/sidebar-1.jpg" data-src="<?php echo base_url(); ?>/mdb/assets/img/login.jpeg" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="<?php echo base_url(); ?>/mdb/assets/img/sidebar-2.jpg" data-src="<?php echo base_url(); ?>/mdb/assets/img/lock.jpeg" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="<?php echo base_url(); ?>/mdb/assets/img/sidebar-3.jpg" data-src="<?php echo base_url(); ?>/mdb/assets/img/header-doc.jpeg" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="<?php echo base_url(); ?>/mdb/assets/img/sidebar-4.jpg" data-src="<?php echo base_url(); ?>/mdb/assets/img/bg-pricing.jpeg" alt="" />
                </a>
            </li>
            <li class="button-container">
                <div class="">
                    <a href="http://www.creative-tim.com/product/material-dashboard-pro" target="_blank" class="btn btn-primary btn-block btn-fill">Buy Now!</a>
                </div>
                <div class="">
                    <a href="http://www.creative-tim.com/product/material-dashboard" target="_blank" class="btn btn-info btn-block">Get Free Demo</a>
                </div>
            </li>
            <li class="header-title">Thank you for 95 shares!</li>
            <li class="button-container">
                <button id="twitter" class="btn btn-social btn-twitter btn-round"><i class="fa fa-twitter"></i> &middot; 45</button>
                <button id="facebook" class="btn btn-social btn-facebook btn-round"><i class="fa fa-facebook-square"></i> &middot; 50</button>
            </li>
        </ul>
    </div>
</div>
</body>
<!--   Core JS Files   -->
<script src="<?php echo base_url(); ?>/mdb/assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>/mdb/assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>/mdb/assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>/mdb/assets/js/material.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>/mdb/assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="<?php echo base_url(); ?>/mdb/assets/js/jquery.validate.min.js"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="<?php echo base_url(); ?>/mdb/assets/js/moment.min.js"></script>
<!--  Charts Plugin -->
<script src="<?php echo base_url(); ?>/mdb/assets/js/chartist.min.js"></script>
<!--  Plugin for the Wizard -->
<script src="<?php echo base_url(); ?>/mdb/assets/js/jquery.bootstrap-wizard.js"></script>
<!--  Notifications Plugin    -->
<script src="<?php echo base_url(); ?>/mdb/assets/js/bootstrap-notify.js"></script>
<!--   Sharrre Library    -->
<script src="<?php echo base_url(); ?>/mdb/assets/js/jquery.sharrre.js"></script>
<!-- DateTimePicker Plugin -->
<script src="<?php echo base_url(); ?>/mdb/assets/js/bootstrap-datetimepicker.js"></script>
<!-- Vector Map plugin -->
<script src="<?php echo base_url(); ?>/mdb/assets/js/jquery-jvectormap.js"></script>
<!-- Sliders Plugin -->
<script src="<?php echo base_url(); ?>/mdb/assets/js/nouislider.min.js"></script>
<!--  Google Maps Plugin    -->
<!--<script src="https://maps.googleapis.com/maps/api/js"></script>-->
<!-- Select Plugin -->
<script src="<?php echo base_url(); ?>/mdb/assets/js/jquery.select-bootstrap.js"></script>
<!--  DataTables.net Plugin    -->
<script src="<?php echo base_url(); ?>/mdb/assets/js/jquery.datatables.js"></script>
<!-- Sweet Alert 2 plugin -->
<script src="<?php echo base_url(); ?>/mdb/assets/js/sweetalert2.js"></script>
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="<?php echo base_url(); ?>/mdb/assets/js/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin    -->
<script src="<?php echo base_url(); ?>/mdb/assets/js/fullcalendar.min.js"></script>
<!-- TagsInput Plugin -->
<script src="<?php echo base_url(); ?>/mdb/assets/js/jquery.tagsinput.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="<?php echo base_url(); ?>/mdb/assets/js/material-dashboard.js"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="<?php echo base_url(); ?>/mdb/assets/js/demo.js"></script>
<script type="text/javascript">
    $().ready(function() {
        demo.checkFullPageBackgroundImage();

        setTimeout(function() {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700)
    });


    $("#close1").on("click", function() {
        $("#alert1").remove();
    });
</script>


<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/pages/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:32:19 GMT -->

</html>