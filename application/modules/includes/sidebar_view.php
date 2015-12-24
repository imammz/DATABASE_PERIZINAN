<?php 
$persuratan_model = new Persuratan_model();
$notification = $persuratan_model->getNewInbox($_SESSION['user']['id_pejabat']); ?>
<div class="sidebar app-aside" id="sidebar">
    <div class="sidebar-container perfect-scrollbar">
        <nav>
            <!-- start: SEARCH FORM -->
            <div class="search-form">
                <a class="s-open" href="#">
                    <i class="ti-search"></i>
                </a>
                <form class="navbar-form" role="search">
                    <a class="s-remove" href="#" target=".navbar-form">
                        <i class="ti-close"></i>
                    </a>
                    
                </form>
            </div>
            <!-- end: SEARCH FORM -->
            <!-- start: MAIN NAVIGATION MENU -->
            <div class="navbar-title">
                <span>Main Navigation</span>
            </div>
            <ul class="main-navigation-menu">
                <li class="<?php if($class == 'home') { echo "active"; } ?>">
                    <a href="<?php echo site_url(); ?>/home">
                        <div class="item-content">
                            <div class="item-media">
                                <i class="ti-home"></i>
                            </div>
                            <div class="item-inner">
                                <span class="title"> Beranda </span>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="<?php if($class == 'persuratan') { echo "active open"; } ?>">
                    <a href="javascript:void(0)">
                        <div class="item-content">
                            <div class="item-media">
                                <i class="ti-email"></i>
                            </div>
                            <div class="item-inner">
                                <span class="title"> Persuratan </span><i class="icon-arrow"></i>
                            </div>
                        </div>
                    </a>
                    <ul class="sub-menu">
                        <li class="<?php if($menu == 'inbox') { echo "active2"; } ?>">
                            <a href="<?php echo site_url(); ?>/persuratan/inbox">
                                <span class="title"> Inbox <?php echo ($notification['surat_masuk']) ? '<span class="badge">'.$notification['surat_masuk'].'</span>' : ''?> | <?php echo ($notification['disposisi']) ? '<span class="badge">'.$notification['disposisi'].'</span>' : ''?> </span>
                            </a>
                        </li>
                        <li class="<?php if($menu == 'surat-masuk') { echo "active2"; } ?>">
                            <a href="<?php echo site_url(); ?>/persuratan/surat_masuk">
                                <span class="title">Data Surat Masuk </span>
                            </a>
                        </li>
                        <li class="<?php if($menu == 'surat-keluar') { echo "active2"; } ?>">
                            <a href="<?php echo site_url(); ?>/persuratan/surat_keluar">
                                <span class="title">Data Surat Keluar </span>
                            </a>
                        </li>
<!--                        <li class="<?php if($menu == 'surat-lainya') { echo "active2"; } ?>">
                            <a href="<?php echo site_url(); ?>/persuratan/surat_lainya">
                                <span class="title"> Surat Lainya </span>
                            </a>
                        </li>-->
                        <li class="<?php if($menu == 'laporan-persuratan') { echo "active2"; } ?>">
                            <a href="<?php echo site_url(); ?>/persuratan/laporan_persuratan">
                                <span class="title"> Laporan Persuratan </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="<?php if($class == 'skpd') { echo "active open"; } ?>">
                    <a href="#">
                        <div class="item-content">
                            <div class="item-media">
                                <i class="ti-layout-grid2"></i>
                            </div>
                            <div class="item-inner">
                                <span class="title"> SKPD </span><i class="icon-arrow"></i>
                            </div>
                        </div>
                    </a>
                    <ul class="sub-menu">
                        <li class="<?php if($menu == 'prosesrekom') { echo "active2"; } ?>">
                            <a href="<?php echo site_url('skpd'); ?>">
                                <span class="title">Proses Rekomendasi Izin</span>
                            </a>
                        </li>
                        <li class="<?php if($menu == 'perindustrian-perdagangan') { echo "active2"; } ?>">
                            <a href="<?php echo site_url('skpd/laporan'); ?>">
                                <span class="title">Laporan</span>
                            </a>
                        </li>
                        <li class="<?php if($menu == 'kesehatan') { echo "active2"; } ?>">
                            <a href="<?php echo site_url('skpd/setting'); ?>">
                                <span class="title">Setting</span>
                            </a>
                        </li>
                      
                    </ul>
                </li>
                <li class="<?php if($class == 'arsip') { echo "active open"; } ?>">
                    <a href="javascript:void(0)">
                        <div class="item-content">
                            <div class="item-media">
                                <i class="ti-briefcase"></i>
                            </div>
                            <div class="item-inner">
                                <span class="title"> Arsip Perizinan </span><i class="icon-arrow"></i>
                            </div>
                        </div>
                    </a>
                    <ul class="sub-menu">
                      
                         <li class="<?php if($menu == 'entry') { echo "active2"; } ?>">
                            <a href="<?php echo site_url('arsip/entry'); ?>/">
                                <span class="title">Perekaman Arsip</span>
                            </a>
                        </li>
                         <li class="<?php if($menu == 'cari') { echo "active2"; } ?>">
                            <a href="<?php echo site_url('arsip/entry/cari'); ?>/">
                                <span class="title">Pencarian Arsip</span>
                            </a>
                        </li>
                        <li class="<?php if($menu == 'pinjam') { echo "active2"; } ?>">
                            <a href="<?php echo site_url('arsip/entry/pinjam'); ?>">
                                <span class="title">Peminjaman Arsip</span>
                            </a>
                        </li>
                       
                    </ul>
                </li>
                <li class="<?php if($class == 'bankdata') { echo "active open"; } ?>">
                    <a href="javascript:void(0)">
                        <div class="item-content">
                            <div class="item-media">
                                <i class="ti-server"></i>
                            </div>
                            <div class="item-inner">
                                <span class="title"> Bank Data Perizinan </span><i class="icon-arrow"></i>
                            </div>
                        </div>
                    </a>
                    <ul class="sub-menu">
                        <li class="<?php if($menu == 'perizinan') { echo "active2"; } ?>" >
                            <a href="<?php echo site_url('bankdata/perizinan') ?>">
                                <span  class="title"> Data Perizinan </span>
                            </a>
                        </li>
                        <li class="<?php if($menu == 'pemohon') { echo "active2"; } ?>">
                            <a href="<?php echo site_url('bankdata/pemohon') ?>">
                                <span class="title"> Data Pemohon</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <div class="item-content">
                            <div class="item-media">
                                <i class="ti-key"></i>
                            </div>
                            <div class="item-inner">
                                <span class="title"> Master Data </span><i class="icon-arrow"></i>
                            </div>
                        </div>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="#">
                                <span class="title">Master Data Surat Masuk</span>
                            </a>
                        </li>
                        <li>
                            <a href="pages_invoice.html">
                                <span class="title">Master Data Surat Keluar</span>
                            </a>
                        </li>
                        <li>
                            <a href="pages_timeline.html">
                                <span class="title">Master Data Surat Lainya</span>
                            </a>
                        </li>
                        <li>
                            <a href="pages_calendar.html">
                                <span class="title">Master Data SKPD</span>
                            </a>
                        </li>
                        <li>
                            <a href="pages_messages.html">
                                <span class="title">Master Data Penyimpanan Arsip</span>
                            </a>
                        </li>
                        <li class="active">
                            <a href="pages_blank_page.html">
                                <span class="title">Konfigurasi</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li> 
                    <a href="javascript:void(0)">
                        <div class="item-content">
                            <div class="item-media">
                                <i class="ti-settings"></i>
                            </div>
                            <div class="item-inner">
                                <span class="title"> Setting </span><i class="icon-arrow"></i>
                            </div>
                        </div>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="utilities_search_result.html">
                                <span class="title">User Management</span>
                            </a>
                        </li>
                        <li>
                            <a href="utilities_error_404.html">
                                <span class="title">Tampilan Aplikasi</span>
                            </a>
                        </li>
                        <li>
                            <a href="utilities_error_500.html">
                                <span class="title">Logs History</span>
                            </a>
                        </li>
                    </ul>
                </li>
                
            </ul>
            <!-- end: MAIN NAVIGATION MENU -->
        </nav>
    </div>
</div>