<?php $this->load->view('../../includes/header_view'); ?>
<div id="app">
    <!-- sidebar -->
    <?php $this->load->view('../../includes/sidebar_view'); ?>
    <?php $this->load->view('../../includes/navbar_header_view') ?>

    <style>
        .navlist li
        {
            display: inline;
            list-style-type: none;
            padding-right: 20px;
        }
    </style>

    <div class="main-content" >
        <div class="wrap-content container" id="container">
            <!-- start: PAGE TITLE -->
            <section id="page-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h1 class="mainTitle">PILIH SKPD</h1>
                    </div>
                </div>
            </section>
            <div class="container-fluid container-fullw bg-white">
                <ol class="breadcrumb">
                    <li><a href="<?php echo site_url(); ?>skpd">SKPD</a></li>
                </ol>

                <div class="row">

                    <?php foreach ($this->orm->dp_skpd->order('id_skpd') as $row) { ?>     
                        <div class="col-sm-6">
                            <div class="panel panel-white no-radius text-center">
                                <a href="<?php echo site_url('skpd/' . $row['skpd_class'] . '/') ?>">
                                    <div class="panel-body">
                                        <span class="fa-stack fa-2x"> 
                                            <img src="<?php echo PATH_ASSETS ?>assets/images/logo-kota-bekasi.png" alt="" width="40"/>
                                        </span>
                                        <h2 class="StepTitle"><?php echo $row['skpd_prefix'] ?></h2>
                                        <p class="text-large">
                                            <?php echo $row['skpd_prefix'] ?>
                                        </p>
                                        <p class="text-small">
                                            <strong>  
                                                <ul class="navlist">
                                                <?php foreach ($this->orm->dp_skpd_rekom->where('id_skpd', $row['id_skpd']) as $row_rekom) { ?>
                                                    <li><?php echo $row_rekom['rekom'] ?></li>
                                                <?php } ?>
                                                </ul>
                                            </strong>
                                        </p>
                                    </div>
                                </a>  
                            </div>
                        </div>
                    <?php } ?>  



                </div>



            </div>
            <!-- end: PAGE TITLE -->
            <!-- start: YOUR CONTENT HERE -->
            <!-- end: YOUR CONTENT HERE -->
        </div>
    </div>
</div>
<!-- start: FOOTER -->
<?php $this->load->view('../../includes/footer_view') ?>
<!-- end: FOOTER -->
