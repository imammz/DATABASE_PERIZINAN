<!DOCTYPE html>
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
    <!--<![endif]-->
    <!-- start: HEAD -->

    <?php echo Modules::run('templates/' . TEMPLATE . '/meta_css'); ?>
    <!-- end: HEAD -->
    <!-- start: BODY -->
    <body>
        <!-- start: HEADER -->
        <?php// echo Modules::run('templates/' . TEMPLATE . '/header'); ?>
        	<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/plugins/select2/select2.css" />
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/DataTables/media/css/DT_bootstrap.css" />
                <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/gritter/css/jquery.gritter.css">
                <link href="<?php echo base_url() ?>assets/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url() ?>assets/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css"/>
            <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/select2/select2.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datepicker/css/datepicker.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/jQuery-Tags-Input/jquery.tagsinput.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/summernote/build/summernote.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/ckeditor/contents.css">
                <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
        <!-- end: HEADER -->
        <!-- start: MAIN CONTAINER -->
        <div class="main-container" style="margin-top:-10px;">
            <?php //echo Modules::run('templates/' . TEMPLATE . '/menu'); ?>
            <!-- start: PAGE -->
            <div class="main-content">

                <div class="container">
                    <!-- start: PAGE HEADER -->
                    <div class="row">
                        <div class="col-sm-12">							
                            <!-- start: PAGE TITLE & BREADCRUMB -->
                            <ol class="breadcrumb">
                                <li>
                                    <i class="clip-stack"></i>
                                    <a href="#">
                                        Kearsipan
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Pencarian
                                    </a>
                                </li>

                                
                            </ol>

                            <div class="page-header">
                                <h1>Pencarian</h1>
                                <p>Fungsi modul untuk mencari arsip inaktif di Pusat Arsip,
									arsip/dokumen inaktif yang masih dipinjam unit kerja serta daftar pertelaan arsip/dokumen yang
									pernah disusutkan &nbsp; <a href="#modalMore" data-toggle="modal" class="btn btn-default btn-xs"> <i class="clip-expand"></i> </a> </p>
                            </div>
                            <!-- end: PAGE TITLE & BREADCRUMB -->
                            <p align="left">
								
                                 <form role="form" id="form-entry" class="form-horizontal" method="POST" action="<?php echo base_url() ?>pemindahan/pencarian/result" enctype="multipart/form-data">
                                               
                            <table align="center" width="80%" >
									<tr width="100%">
										<td width="30%" valign="top">Pencarian Untuk Arsip</td>
										<td width="5%" valign="top">:</td>
										<td>
                                                                                  
                                                                                    <select id="status_arsip" name="status_arsip" class="form-control search-select">
                                                                         
                                                                                         <option value="" selected> ------------------ Semua Arsip ----------------------- </option>
                                                                            <?php foreach ($status_arsip as $row) { ?>

                                                                                <option value="<?php echo $row['status'] ?>"><?php echo $row['title'] ?></option>

                                                                            <?php } ?>

                                                                        </select>
											
										</td>
										<td>
										    
											
										</td>
									</tr>
									<tr width="100%">
										<td width="30%" valign="top">Kode Klasifikasi</td>
										<td width="5%" valign="top">:</td>
										<td colspan="2">
											 <select id="kode_klasifikasi" name="kode_klasifikasi" class="form-control search-select">
                                                                             <option value="" selected>-- Semua Kode Klasifikasi --</option>
                                                                            <?php foreach ($klasifikasi as $row) { ?>

                                                                                <option value="<?php echo $row['kode_klasifikasi'] ?>"><?php echo $row['kode_klasifikasi'] ?> - <?php echo $row['nama_klasifikasi'] ?></option>

                                                                            <?php } ?>

                                                                        </select>
										</td>
									</tr>
									
									<tr width="100%">
										<td width="30%" valign="top">Unit Pengolah</td>
										<td width="5%" valign="top">:</td>
										<td colspan="2">
											<select class="form-control search-select" id="kode_unit_kerja" name="kode_unit_kerja">
                                                                            <option value="" selected>--Semua Unit Pengelola--</option>
                                                                            <?php foreach ($unit_kerja as $row) { ?>

                                                                                <option value="<?php echo $row['kode_unit_kerja'] ?>"><?php echo $row['kode_unit_kerja'] ?> - <?php echo $row['nama_unit_kerja'] ?></option>

                                                                            <?php } ?>
                                                                        </select>
										</td>
										
									</tr>
									<tr width="100%">
										<td width="30%" valign="top">Uraian</td>
										<td width="5%" valign="top">:</td>
										<td colspan="2">
											       <textarea class="autosize form-control" id="uraian" name="uraian" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 69px;"></textarea>
                                                                 
										</td>
									</tr>
									<tr width="100%">
										<td width="30%" valign="top">Kurun Waktu</td>
										<td width="5%" valign="top">:</td>
										<td width="30%"> Awal :
											       <input type="text" placeholder="Kurun Waktu Awal Arsip" id="kurun_waktu_awal" name="kurun_waktu_awal" value="" class="form-control" number="true" requered="true">
                                                                                              
										</td>
										<td width="30%"> Akhir :
											       <input type="text" placeholder="Kurun Waktu Akhir Arsip" id="kurun_waktu_akhir" name="kurun_waktu_akhir" value="" class="form-control" number="true" requered="true">
                                                                 
										</td>
									</tr>
									
                                                                        <tr width="100%">
                                                                            <td width="30%" valign="top">Lokasi Simpan</td>
										<td width="5%" valign="top">:</td>
										
                                                                            <td>
                                                                                   <div class="row">
                                            <div class="col-md-12">
                                                                                <p>
								<div class="form-group">
                                                                    <label class="control-label" for="nomor_depo">Nomor Depo</label>
                                                                    <div class="">
                                                                    <select id="nomor_depo" name="nomor_depo" class="form-control " onchange="changeDepo()">  <!--  for search select -->
                                                                            <option value="" selected>-- Semua Lokasi Depo --</option>
                                                                            <?php foreach ($depo as $row) { ?>

                                                                                <option value="<?php echo $row['nomor_depo'] ?>"> <?php echo $row['nomor_depo'] ?> - <?php echo $row['nama_depo'] ?> </option>

                                                                            <?php } ?>
                                                                        </select>
                                                                         </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label" for="nomor_ruang">Nomor Ruang</label>
                                                                    <div class="">
                                                                    <select id="nomor_ruang" name="nomor_ruang" class="form-control " onchange="changeRuang()">  <!--  for search select -->
                                                                            <option value="" selected>-- Semua Lokasi Ruang --</option>                                                                           
                                                                     </select>
                                                                        </div>
                                                                </div>	
                                                                <div class="form-group">
                                                                    <label class="control-label" for="nomor_lemari">Nomor Lemari</label>
                                                                    <div class="">
                                                                    <select id="nomor_lemari" name="nomor_lemari" class="form-control " onchange="changeLemari()">  <!--  for search select -->
                                                                            <option value="" selected>-- Semua Lokasi Lemari --</option>                                                                           
                                                                     </select>
                                                                      </div>
                                                                </div>	
                                                                <div class="form-group">
                                                                    <label class="control-label" for="nomor_boks">Nomor Boks</label>
                                                                    <div class="">
                                                                    <select id="nomor_boks" name="nomor_boks" class="form-control ">  <!--  for search select -->
                                                                            <option value="" selected>-- Semua Lokasi Boks --</option>                                                                           
                                                                     </select>                                                                         
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label" for="nomor_folder">Nomor Folder  </label>
                                                                    <div>
                                                                        <input type="text" placeholder="Nomor Folder" id="nomor_folder" name="nomor_folder" class="form-control">
                                                                 </div>
                                                                </div>                                                
                                                                                                                
                                                                                                                
                                                                                                                </p>
                                            </div> </div>
                                                                            </td>
                                                                        </tr>
									
								
									
									<tr width="100%">
										<td width="30%" valign="top" colspan="2"></td>
										<td style="text-align: right">
											<input type="submit" class="btn btn-blue" value="SEARCH"/>
										</td>
									</tr>
									
								</table>
                                 </form>
                             </p>
				
                        </div>
                    </div>
                    <!-- end: PAGE HEADER -->
                    <!-- start: PAGE CONTENT -->



                    <!-- end: PAGE CONTENT-->
                </div>
            </div>
            <!-- end: PAGE -->
        </div>
        <!-- end: MAIN CONTAINER -->
        <!-- start: FOOTER -->
        <?php echo Modules::run('templates/' . TEMPLATE . '/footer'); ?>
        <!-- end: FOOTER -->

        <!-- start: MAIN JAVASCRIPTS -->
        <?php echo Modules::run('templates/' . TEMPLATE . '/js'); ?>
        <!-- end: MAIN JAVASCRIPTS -->
        <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
        <script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/select2/select2.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/DataTables/media/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/DataTables/media/js/DT_bootstrap.js"></script>
		<script src="<?php echo base_url() ?>assets/js/table-data.js"></script>
                <script src="<?php echo base_url() ?>assets/plugins/bootstrap-paginator/src/bootstrap-paginator.js"></script>
		<script src="<?php echo base_url() ?>assets/plugins/jquery.pulsate/jquery.pulsate.min.js"></script>
		<script src="<?php echo base_url() ?>assets/plugins/gritter/js/jquery.gritter.min.js"></script>
		<script src="<?php echo base_url() ?>assets/js/ui-elements.js"></script>
                <script src="<?php echo base_url() ?>assets/plugins/bootstrap-modal/js/bootstrap-modal.js"></script>
		<script src="<?php echo base_url() ?>assets/plugins/bootstrap-modal/js/bootstrap-modalmanager.js"></script>
		<script src="<?php echo base_url() ?>assets/js/ui-modals.js"></script>
                <script src="<?php echo base_url() ?>assets/plugins/jquery-inputlimiter/jquery.inputlimiter.1.3.1.min.js"></script>
		<script src="<?php echo base_url() ?>assets/plugins/autosize/jquery.autosize.min.js"></script>
		<script src="<?php echo base_url() ?>assets/plugins/select2/select2.min.js"></script>
		<script src="<?php echo base_url() ?>assets/plugins/jquery.maskedinput/src/jquery.maskedinput.js"></script>
		<script src="<?php echo base_url() ?>assets/plugins/jquery-maskmoney/jquery.maskMoney.js"></script>
		<script src="<?php echo base_url() ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="<?php echo base_url() ?>assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
		<script src="<?php echo base_url() ?>assets/plugins/bootstrap-daterangepicker/moment.min.js"></script>
		<script src="<?php echo base_url() ?>assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
		<script src="<?php echo base_url() ?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
		<script src="<?php echo base_url() ?>assets/plugins/bootstrap-colorpicker/js/commits.js"></script>
		<script src="<?php echo base_url() ?>assets/plugins/jQuery-Tags-Input/jquery.tagsinput.js"></script>
		<script src="<?php echo base_url() ?>assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
		<script src="<?php echo base_url() ?>assets/plugins/summernote/build/summernote.min.js"></script>
		<script src="<?php echo base_url() ?>assets/plugins/ckeditor/ckeditor.js"></script>
		<script src="<?php echo base_url() ?>assets/plugins/ckeditor/adapters/jquery.js"></script>
		<script src="<?php echo base_url() ?>assets/js/form-elements.js"></script>
        <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
        <script>
                                    			jQuery(document).ready(function() {
                                        Main.init();
                                        TableData1.init();
                                        UIElements.init();
                                        FormElements.init();
                                    });
                                    
                                    
                                     function changeDepo() {
        
        var get_nomor_depo = $('#nomor_depo').val();
        
        var url = '<?php echo base_url() ?>pemindahan/entry/comboRuangByDepo/'+get_nomor_depo;
        $.post(url,{
            nomor_depo: get_nomor_depo },
            function(data, status) { 
                 var data_ruang = '<option value="" selected>-- Semua Lokasi Ruang --</option>';  
                 if(data.result) { 
                     
                                      
                  
                    $.each(data.ruang, function () {
                            data_ruang += '<option value="'+this.nomor_ruang+'"> '+this.nomor_ruang+' </option>';
                    });
                  
                     
                     
        }   
        $('#nomor_ruang').html(data_ruang);
        changeRuang();
        changeLemari()
        
    },"json"
            );
    }
    
    function changeRuang() {
        
        var get_nomor_depo = $('#nomor_depo').val();
        var get_nomor_ruang = $('#nomor_ruang').val();        
       
        
        var url = '<?php echo base_url() ?>pemindahan/entry/comboLemariByRuang/'+get_nomor_depo+'/'+get_nomor_ruang;
        $.post(url,{
            nomor_depo: get_nomor_depo, 
            nomor_ruang: get_nomor_ruang 
        
    },
            function(data, status) { 
                
         var data_lemari = '<option value="" selected>-- Semua Lokasi Lemari --</option>';
               if(data.result) { 
                     
                                        
                  
                    $.each(data.lemari, function () {
                            data_lemari += '<option value="'+this.nomor_lemari+'"> '+this.nomor_lemari+' </option>';
                    });
                  
                     
                     
        } 
        $('#nomor_lemari').html(data_lemari);
        changeLemari();
    },"json"
            );
    }
    
    function changeLemari() {
        
        var get_nomor_depo = $('#nomor_depo').val();
        var get_nomor_ruang = $('#nomor_ruang').val();        
        
        var get_nomor_lemari = $('#nomor_lemari').val();
        
        var url = '<?php echo base_url() ?>pemindahan/entry/comboBoksByLemari/'+get_nomor_depo+'/'+get_nomor_ruang+'/'+get_nomor_lemari;
        $.post(url,{
            nomor_depo: get_nomor_depo, 
            nomor_ruang: get_nomor_ruang, 
            nomor_lemari: get_nomor_lemari 
        
    },
            function(data, status) { 
                 
        var data_boks = '<option value="" selected>-- Semua Lokasi Boks --</option>'; 
                       if(data.result) { 
                           
                    $.each(data.boks, function () {
                            data_boks += '<option value="'+this.nomor_boks+'"> '+this.nomor_boks+' </option>';
                    });
        }
         $('#nomor_boks').html(data_boks);
    },"json"
            );
    }
        </script>
        
        
  
    </body>
    <!-- end: BODY -->

    <!-- Mirrored from www.cliptheme.com/clip-one/ by HTTrack Website Copier/3.x [XR&CO'2013], Sat, 16 Nov 2013 08:37:43 GMT -->
</html>