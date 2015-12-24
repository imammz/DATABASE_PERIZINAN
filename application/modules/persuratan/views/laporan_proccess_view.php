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
                        <h1 class="mainTitle">Laporan Proses</h1>
                    </div>
                </div>
            </section>
            <div class="container-fluid container-fullw bg-white">
                <ol class="breadcrumb">
                    <li><a href="#">Persuratan</a></li>
                </ol>
                <div id="tabs">
                   
                    <div id="tabs-1" class="tabs-content">
                    
                        <table class="table table-striped table-hover" id="sample-table-2">
                            <thead>
                                <tr>
                                    <th class="center">No.</th>
                                    <th>Tanggal</th>
                                    <th class="hidden-xs">Dari</th>
                                    <th class="hidden-xs">Kepada</th>
                                    <th class="hidden-xs">Perihal</th>
                                    <th class="hidden-xs">Disposisi</th>
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
                                    <td><a class="show-modal btn btn-warning" href="<?php echo site_url('persuratan/surat_masuk/disposisi/'.$row['id_surat']) ?>"><i class="fa fa-pencil-square"></i></a></td>
                                    <td><a class="show-modal btn btn-info" href="<?php echo site_url('persuratan/surat_masuk/baca/'.$row['id_surat']) ?>"><i class="fa fa-book"></i></a></td>
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