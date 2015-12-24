<?php $this->load->view('../../includes/header_view'); 

?>
<div id="app">
    <!-- sidebar -->
    <?php $this->load->view('../../includes/sidebar_view'); ?>
    <?php $this->load->view('../../includes/navbar_header_view') ?>
    <div class="main-content" >
        <div class="wrap-content container" id="container">
            <!-- start: PAGE TITLE -->
            <section id="page-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h1 class="mainTitle">Bank Data Perizinan</h1>
                    </div>
                </div>
            </section>
            <div class="container-fluid container-fullw bg-white">
                <ol class="breadcrumb">
                    <li><a href="#">Bank Data</a></li>
                    <li><a href="#">Perizinan</a></li>
                </ol>
                <div id="tabs">
                  
                    <div id="tabs-1" class="tabs-content">
                        
                          <iframe width="100%" style="min-height: 1250px" 
                                  src="<?php echo site_url('bankdata/perizinan/data') ?>">
                          </iframe> 


                        
                    </div>
                    
                </div>
                <!-- YANG LAMA -->
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