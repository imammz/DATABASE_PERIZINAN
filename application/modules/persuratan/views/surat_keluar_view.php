<?php $this->load->view('../../includes/header_view'); ?>
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
                        <h1 class="mainTitle">Surat Keluar</h1>
                    </div>
                </div>
            </section>
            <div class="container-fluid container-fullw bg-white">
                <ol class="breadcrumb">
                    <li><a href="#">Persuratan</a></li>
                    <li><a href="#">Surat Keluar</a></li>
                </ol>
                <div id="tabs">
                    <ul class="nav-tabs btn-group">
                        <li class="btn btn-default"><a href="#tabs-1">Daftar Surat Keluar</a></li>
                    </ul>
                    <div id="tabs-1" class="tabs-content">
                        <div class="text-right"> 
                            <a class="btn btn-info show-modal" href="<?php echo site_url('persuratan/surat_keluar/form'); ?>"><i class="fa fa-plus-circle"></i> Create Surat Keluar</a>
                        </div>
                        <div><div class="col-sm-12"><br/></div> </div>
                        <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                            <thead>
                                <tr>
                                    <th class="center">No.</th>
                                    <th>Tanggal</th>
                                    <th class="hidden-xs">Dari</th>
                                    <th class="hidden-xs">Kepada</th>
                                    <th class="hidden-xs">Perihal</th>
                                    <th class="hidden-xs">Baca</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php 
                              $no = 1;
                              foreach($surat as $row) { ?>  
                                <tr>
                                    <td class="center"><?php echo $no ?></td>
                                    <td><?php echo Tanggal::formatDate($row['tanggal']) ?></td>
                                    <td class="hidden-xs"><?php echo $row['dari']?></td>
                                    <td class="hidden-xs"><?php echo $row['kepada']?></td>
                                    <td class="hidden-xs"><?php echo $row['perihal']?></td>
                                    <td><a class="show-modal btn btn-info" href="<?php echo site_url('persuratan/surat_keluar/baca/'.$row['id_surat']).'/0' ?>"><i class="fa fa-book"></i></a></td>
                                </tr>
                              <?php $no++; } ?>
                                
                            </tbody>
                        </table>
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