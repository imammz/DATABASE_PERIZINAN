<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ORP Project Dashboard</title>
        <link href="<?php echo base_url() ?>front_assets/css/root.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>front_assets/css/bootstrapValidator.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>front_assets/css/jquery.treegrid.css">
	</head>
    <body>
        <div class="loading"><img src="<?php echo base_url(); ?>front_assets/img/loading.gif" alt="loading-img"></div>

        <!-- START TOP -->
        <div id="top" class="clearfix">

            <!-- Start App Logo -->
            <div class="applogo">
                <a href="" class="logo">BIZON</a>
            </div>
            <!-- End App Logo -->

            <!-- Start Sidebar Show Hide Button -->
            <a href="#" class="sidebar-open-button"><i class="fa fa-bars"></i></a>
            <a href="#" class="sidebar-open-button-mobile"><i class="fa fa-bars"></i></a>
            <!-- End Sidebar Show Hide Button -->

            <!-- Start Searchbox -->
            <form class="searchform">
                <input type="text" class="searchbox" id="searchbox" placeholder="Search">
                <span class="searchbutton"><i class="fa fa-search"></i></span>
            </form>
            <!-- End Searchbox -->

            <!-- Start Sidepanel Show-Hide Button -->
            <a href="#sidepanel" class="sidepanel-open-button"><i class="fa fa-outdent"></i></a>
            <!-- End Sidepanel Show-Hide Button -->

            <!-- Start Top Right -->
            <ul class="top-right">

                <li class="dropdown link">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle profilebox"><img src="<?php echo base_url() ?>front_assets/img/profileimg.png" alt="img">
                       <?php echo $_SESSION['user']['namalengkap']; ?> | <b><?php 
                        $account_model = new account_model;
                        echo $account_model->_getStoreName($_SESSION['user']['idrefstore']) ?></b><span class="caret"></span></a>
                    <ul class="dropdown-menu dropdown-menu-list dropdown-menu-right">
                        <li role="presentation" class="dropdown-header">Profile</li>
                        <li><a href="<?php echo base_url() ?>index.php/setting"><i class="fa falist fa-wrench"></i>Settings</a></li>
                        <li><a href="<?php echo base_url() ?>index.php/login/logout"><i class="fa falist fa-power-off"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
            <!-- End Top Right -->
        </div>
        <!-- END TOP -->

