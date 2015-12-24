<html>
    <head>
        <title><?php echo WEB_TITLE; ?></title>
        <!-- start: META -->
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- end: META -->
        <!-- start: GOOGLE FONTS -->
        <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
        <!-- end: GOOGLE FONTS -->
        <!-- start: MAIN CSS -->
        <link rel="stylesheet" href="<?php echo PATH_ASSETS; ?>vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo PATH_ASSETS; ?>vendor/fontawesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo PATH_ASSETS; ?>vendor/themify-icons/themify-icons.min.css">
        <link href="<?php echo PATH_ASSETS; ?>vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
        <link href="<?php echo PATH_ASSETS; ?>vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
        <link href="<?php echo PATH_ASSETS; ?>vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
        <!-- end: MAIN CSS -->
        <!-- start: CLIP-TWO CSS -->
        <link rel="stylesheet" href="<?php echo PATH_ASSETS ?>assets/css/styles.css">
        <link rel="stylesheet" href="<?php echo PATH_ASSETS ?>assets/css/plugins.css">
        <!-- end: CLIP-TWO CSS -->
        <!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
        <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
    </head>

    <body class="login custom-login-page">
        <div class="row">
            <div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
                <img class="login-logo" src="<?php echo PATH_ASSETS; ?>assets/images/logobppt_rev4.png" width="250px">
                <div class="box-login">
                    <form class="form-login" action="<?php echo site_url('config/login/proccess') ?>" method="post">
                        <fieldset>
                            <legend>
                                Halaman login anggota
                            </legend>
                            <p>
                                Silahkan mengisi username & password anda
                            </p>
                            <div class="form-group">
                                <span class="input-icon">
                                    <input type="text" class="form-control" name="username" placeholder="Username">
                                    	<i class="fa fa-user"></i> </span>
                            </div>
                            <div class="form-group form-actions">
                                <span class="input-icon">
                                    <input type="password" class="form-control password" name="password" placeholder="Password">
                                    <i cass="fa fa-lock"></i>
                                    <a class="forgot" href="#">
                                        Lupa password
                                    </a> 
                                </span>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary pull-right">
                                    Login <i class="fa fa-arrow-circle-right"></i>
                                </button>
                            </div>

                        </fieldset>
                    </form>
                </div>
            </div>
        </div>

        <!-- start: MAIN JAVASCRIPTS -->
        <script src="<?php echo PATH_ASSETS ?>vendor/jquery/jquery.min.js"></script>
        <script src="<?php echo PATH_ASSETS ?>vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo PATH_ASSETS ?>vendor/modernizr/modernizr.js"></script>
        <script src="<?php echo PATH_ASSETS ?>vendor/jquery-cookie/jquery.cookie.js"></script>
        <script src="<?php echo PATH_ASSETS ?>vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        <script src="<?php echo PATH_ASSETS ?>vendor/switchery/switchery.min.js"></script>
        <!-- end: MAIN JAVASCRIPTS -->
        <!-- start: CLIP-TWO JAVASCRIPTS -->
        <script src="<?php echo PATH_ASSETS ?>assets/js/main.js"></script>
        <!-- start: JavaScript Event Handlers for this page -->
        <script>
            jQuery(document).ready(function () {
                Main.init();
            });
        </script>
        <!-- end: JavaScript Event Handlers for this page -->
        <!-- end: CLIP-TWO JAVASCRIPTS -->
    </body>
</html>