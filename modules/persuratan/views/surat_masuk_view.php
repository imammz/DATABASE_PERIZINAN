<?php $this->load->view('../../includes/header_view'); 
$persuratan_model = new Persuratan_model();

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
                        <h1 class="mainTitle">Surat Masuk</h1>
                    </div>
                </div>
            </section>
            <div class="container-fluid container-fullw bg-white">
                <ol class="breadcrumb">
                    <li><a href="#">Persuratan</a></li>
                    <li><a href="#">Surat Masuk</a></li>
                </ol>
                <div id="tabs">
                    <ul class="nav-tabs btn-group">
                        <li class="btn btn-default"><a href="#tabs-1">Daftar Surat Masuk</a></li>
                        <li class="btn btn-default"><a href="#tabs-2">Disposisi Surat Masuk</a></li>
                    </ul>
                    <div id="tabs-1" class="tabs-content">
                        <div class="text-right"> 
                            <a class="show-modal btn btn-info" href="<?php echo site_url('persuratan/surat_masuk/form'); ?>"><i class="fa fa-plus-circle"></i> Create Surat Masuk</a>
                        </div>
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
                    
                    
                    <div id="tabs-2" class="tabs-content">
                       
                        <table class="table table-striped table-hover" id="sample-table-2">
                            <thead>
                                <tr>
                                    <th class="center">No.</th>
                                    <th>Tanggal Disposisi</th>
                                    <th class="hidden-xs">Nomor Disposisi</th>
                                    <th class="hidden-xs">Surat Masuk</th>
                                     <th class="hidden-xs">Disposisi Dari</th>
                                     <th class="hidden-xs">Disposisi Kepada</th>
                                    <th class="hidden-xs">Baca</th>
                                    <th class="hidden-xs">Teruskan</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php 
                              $no = 1;
                              foreach($disposisi as $row) { ?>  
                                <tr>
                                    <td class="center"><?php echo $no ?></td>
                                    <td><?php echo Tanggal::formatDate($row['tanggal_disposisi']) ?></td>
                                    <td class="hidden-xs"><?php echo $row['nomor_disposisi']?></td>
                                    <td class="hidden-xs">
                                    
                                        Surat Dari : <b>   <?php echo $row['dari']?> </b> <br/>
                                        Tanggal : <b>   <?php echo Tanggal::formatDate($row['tanggal'])?> </b> <br/>
                                        Nomor : <b>   <?php echo $row['nomor']?> </b> <br/>
                                        Perihal : <b>   <?php echo $row['perihal']?> </b> <br/>
                                       
                                    
                                    </td>
                                    
                                    <td class="hidden-xs"> <?php echo $row['nama_pejabat'] ?> <br/> (<?php echo $row['jabatan'] ?>)  </td>
                                    <td class="hidden-xs"> 
                                     Kepada  Yth, <br/>
                                        <ul>
                                        <?php 
                                        $kepada_disposisi = $persuratan_model->_loadDisposisiKepada($row['id_inmail_disposisi']);
                                        foreach($kepada_disposisi as $row) {
                                            ?>
                                            <li><?php echo $row['nama_pejabat'] ?> <br/> (<?php echo $row['jabatan'] ?>) </li>
                                        <?php    
                                        }
                                        ?>
                                        </ul>
                                    </td>
                                    <td><a class="show-modal btn btn-info" href="<?php echo site_url('persuratan/surat_masuk/baca/'.$row['id_surat'].'/true') ?>"><i class="fa fa-book"></i></a></td>
                                    <td><a class="show-modal btn btn-warning" href="<?php echo site_url('persuratan/surat_masuk/disposisi/'.$row['id_surat']) ?>"><i class="fa fa-pencil-square"></i></a></td>
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