<!-- / sidebar -->
<div class="app-content">
    <!-- start: TOP NAVBAR -->
    <header class="navbar navbar-default navbar-static-top">
        <!-- start: NAVBAR HEADER -->
        <div class="navbar-header">
            <a href="#" class="sidebar-mobile-toggler pull-left hidden-md hidden-lg" class="btn btn-navbar sidebar-toggle" data-toggle-class="app-slide-off" data-toggle-target="#app" data-toggle-click-outside="#sidebar">
                <i class="ti-align-justify"></i>
            </a>
            <a class="navbar-brand" href="#">
                <img src="<?php echo PATH_ASSETS; ?>assets/images/logobppt_rev4.png" alt="BPPT" width="195px"/>
            </a>
            <a href="#" class="sidebar-toggler pull-right visible-md visible-lg" data-toggle-class="app-sidebar-closed" data-toggle-target="#app">
                <i class="ti-align-justify"></i>
            </a>
            <a class="pull-right menu-toggler visible-xs-block" id="menu-toggler" data-toggle="collapse" href=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <i class="ti-view-grid"></i>
            </a>
        </div>
        <!-- end: NAVBAR HEADER -->
        <!-- start: NAVBAR COLLAPSE -->
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-right">
                <!-- start: MESSAGES DROPDOWN -->
                
                <!-- end: MESSAGES DROPDOWN -->
                <!-- start: ACTIVITIES DROPDOWN -->
                
                <!-- end: ACTIVITIES DROPDOWN -->
                <!-- start: LANGUAGE SWITCHER -->
               
                <!-- start: LANGUAGE SWITCHER -->
                <!-- start: USER OPTIONS DROPDOWN -->
                <li class="dropdown current-user">
                    <a href class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo PATH_ASSETS; ?>assets/images/avatar-1.jpg" alt="Peter"> <span class="username"> <b> <?php echo $_SESSION['user']['nama_lengkap'] ?> </b> <i class="ti-angle-down"></i></i></span>
                    </a>
                    <ul class="dropdown-menu dropdown-dark">
<!--                        <li>
                            <a href="#">
                                My Profile
                            </a>
                        </li>
                        
                        <li>
                            <a href="#">
                                Lock Screen
                            </a>
                        </li>-->
                        <li>
                            <a href="<?php echo site_url('config/login/logout') ?>">
                                Log Out
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- end: USER OPTIONS DROPDOWN -->
            </ul>
            <!-- start: MENU TOGGLER FOR MOBILE DEVICES -->
            <div class="close-handle visible-xs-block menu-toggler" data-toggle="collapse" href=".navbar-collapse">
                <div class="arrow-left"></div>
                <div class="arrow-right"></div>
            </div>
            <!-- end: MENU TOGGLER FOR MOBILE DEVICES -->
        </div>
        <!-- end: NAVBAR COLLAPSE -->
    </header>
    <!-- end: TOP NAVBAR -->