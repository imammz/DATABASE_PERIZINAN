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
                        <h1 class="mainTitle">Dinas Pemuda Olahraga Kebudayaan dan Pariwisata</h1>
                    </div>
                </div>
            </section>
            <div class="container-fluid container-fullw bg-white">
                <ol class="breadcrumb">
                    <li><a href="<?php echo PATH_ASSETS; ?>skpd">SKPD</a></li>
                    <li><a href="<?php echo PATH_ASSETS; ?>skpd">Dinas Pemuda Olahraga Kebudayaan dan Pariwisata</a></li>
                </ol>

                <div id="tabs">
                    <ul class="nav-tabs btn-group">
                        <li class="btn btn-default"><a href="#tabs-1">SIUK </a></li>
                    </ul>
                    <div id="tabs-1" class="tabs-content fade in active"> 

                        <div class="tabbable tabs-right">
                            <ul id="myTab5" class="nav nav-tabs">
                                <li class="active">
                                    <a href="#belum" data-toggle="tab">
                                        Belum Di Proses
                                    </a>
                                </li>
                                <li class="">
                                    <a href="#terbit" data-toggle="tab">
                                        Terbit Rekom
                                    </a>
                                </li>
                                <li class="">
                                    <a href="#tidak_terbit" data-toggle="tab">
                                        Tidak Terbit Rekom
                                    </a>
                                </li>
<!--                                <li class="">
                                    <a href="#cetak" data-toggle="tab">
                                        Cetak Laporan
                                    </a>
                                </li>-->
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="belum" style="min-height: 400px;">
                                    <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                                        <thead>
                                            <tr>
                                                <th class="center">No.</th>
                                                <th width="20%">Tanggal</th>
                                                <th class="hidden-xs">Nomor Permohonan</th>
                                                <th class="hidden-xs">Pemohon</th>
                                                <th class="hidden-xs">Jenis Bangunan</th>
                                                <th class="hidden-xs">Entry Data Teknis</th>
                                                <th class="hidden-xs">Proses</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            
                                            $no = 1;
                                            foreach($this->orm->tbl_t_permohonan->where('id_status_permohonan',6)->order('tgl_permohonan DESC') as $row) { 
                                                    $pemohon = $this->orm->tbl_t_pemohon->where('id_permohonan',$row['id_permohonan'])->fetch();
                                                    $berkas = $this->orm->tbl_t_imb_berkas->where('id_permohonan',$row['id_permohonan'])->fetch();
                                                    $imb = $this->orm->tbl_t_imb_bangunan->where('id_imb_berkas',$berkas['id_imb_berkas'])->fetch();
                                                ?>
                                            <tr>
                                                <td style="text-align: center"><?php echo $no ?></td>
                                                <td style="text-align: left"><?php echo Tanggal::formatDate($row['tgl_permohonan']); ?></td>
                                                <td style="text-align: left"><?php echo $row['no_permohonan'] ?></td>
                                                <td style="text-align: left"><?php echo $pemohon['nama'] ?></td>
                                                <td style="text-align: left"><?php echo $imb['jenis_bangunan_rekom'] ?></td>
                                                <td style="text-align: center"> <a class="show-modal btn btn-dark-orange" href="<?php echo site_url('skpd/tatakota/form/'.$row['id_permohonan']); ?>"><i class="fa fa-pencil"></i></a> </td>
                                                <td style="text-align: center"> <a class="show-modal btn btn-blue" href="<?php echo site_url('skpd/tatakota/rekom/'.$row['id_permohonan']); ?>"><i class="fa fa-angle-right"></i></a> </td>
                                            </tr>
                                            <?php $no++; } ?>
                                        </tbody>
<!--                                        <tbody>
                                            <tr>
                                                <td align="center">1</td>
                                                <td>Raisa</td>
                                                <td>12 Juni 2015</td>
                                                <td>IMB</td>
                                                <td><a class="show-modal" href="<?php echo PATH_ASSETS; ?>assets/ajax/form.php">view</a></td>
                                            </tr>
                                        </tbody>-->
                                    </table>
                                </div>
                                <div class="tab-pane" id="terbit" style="min-height: 400px;">
                                    <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1a">
                                        <thead>
                                            <tr>
                                                <th class="center">No.</th>
                                                <th width="20%">Tanggal</th>
                                                <th class="hidden-xs">Nomor Permohonan</th>
                                                <th class="hidden-xs">Pemohon</th>
                                                <th class="hidden-xs">Jenis Bangunan</th>
                                                <th class="hidden-xs">Cetak Rekom</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            
                                            $no = 1;
                                            foreach($this->orm->tbl_t_permohonan->where('id_status_permohonan',8)->order('tgl_permohonan DESC') as $row) { 
                                                    $pemohon = $this->orm->tbl_t_pemohon->where('id_permohonan',$row['id_permohonan'])->fetch();
                                                    $berkas = $this->orm->tbl_t_imb_berkas->where('id_permohonan',$row['id_permohonan'])->fetch();
                                                    $imb = $this->orm->tbl_t_imb_bangunan->where('id_imb_berkas',$berkas['id_imb_berkas'])->fetch();
                                                ?>
                                            <tr>
                                                <td style="text-align: center"><?php echo $no ?></td>
                                                <td style="text-align: left"><?php echo Tanggal::formatDate($row['tgl_permohonan']); ?></td>
                                                <td style="text-align: left"><?php echo $row['no_permohonan'] ?></td>
                                                <td style="text-align: left"><?php echo $pemohon['nama'] ?></td>
                                                <td style="text-align: left"><?php echo $imb['jenis_bangunan_rekom'] ?></td>
                                                <td style="text-align: center"> <a target="_blank" href="<?php echo base_url().'/pdf.pdf'; ?>"> <i class="fa fa-file-pdf-o"></i></a> </td>
                                            </tr>
                                            <?php $no++; } ?>
                                        </tbody>
<!--                                        <tbody>
                                            <tr>
                                                <td align="center">1</td>
                                                <td>Raisa</td>
                                                <td>12 Juni 2015</td>
                                                <td>IMB</td>
                                                <td><a class="show-modal" href="<?php echo PATH_ASSETS; ?>assets/ajax/form.php">view</a></td>
                                            </tr>
                                        </tbody>-->
                                    </table>
                                </div>
                                 <div class="tab-pane" id="tidak_terbit" style="min-height: 400px;">
                                    
                                     <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1b">
                                        <thead>
                                            <tr>
                                                <th class="center">No.</th>
                                                <th width="20%">Tanggal</th>
                                                <th class="hidden-xs">Nomor Permohonan</th>
                                                <th class="hidden-xs">Pemohon</th>
                                                <th class="hidden-xs">Jenis Bangunan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            
                                            $no = 1;
                                            foreach($this->orm->tbl_t_permohonan->where('id_status_permohonan',7)->order('tgl_permohonan DESC') as $row) { 
                                                    $pemohon = $this->orm->tbl_t_pemohon->where('id_permohonan',$row['id_permohonan'])->fetch();
                                                    $berkas = $this->orm->tbl_t_imb_berkas->where('id_permohonan',$row['id_permohonan'])->fetch();
                                                    $imb = $this->orm->tbl_t_imb_bangunan->where('id_imb_berkas',$berkas['id_imb_berkas'])->fetch();
                                                ?>
                                            <tr>
                                                <td style="text-align: center"><?php echo $no ?></td>
                                                <td style="text-align: left"><?php echo Tanggal::formatDate($row['tgl_permohonan']); ?></td>
                                                <td style="text-align: left"><?php echo $row['no_permohonan'] ?></td>
                                                <td style="text-align: left"><?php echo $pemohon['nama'] ?></td>
                                                <td style="text-align: left"><?php echo $imb['jenis_bangunan_rekom'] ?></td>
                                                
                                            </tr>
                                            <?php $no++; } ?>
                                        </tbody>
<!--                                        <tbody>
                                            <tr>
                                                <td align="center">1</td>
                                                <td>Raisa</td>
                                                <td>12 Juni 2015</td>
                                                <td>IMB</td>
                                                <td><a class="show-modal" href="<?php echo PATH_ASSETS; ?>assets/ajax/form.php">view</a></td>
                                            </tr>
                                        </tbody>-->
                                    </table>
                                     
                                </div>
<!--                                <div class="tab-pane" id="cetak" style="min-height: 400px;">
                                    
                                </div>-->
                            </div>
                        </div>




                    </div>
                    <div id="tabs-2" class="tabs-content fade in active">  
                    </div>
                    <div id="tabs-3" class="tabs-content fade in active">  
                    </div>
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
