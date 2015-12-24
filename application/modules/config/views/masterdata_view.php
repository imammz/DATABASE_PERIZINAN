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
      <?php echo Modules::run('templates/'.TEMPLATE.'/header'); ?>
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
    <script type="text/javascript" src="<?php echo base_url() ?>assets/library/gb/greybox.js"></script>
    <link type="text/css" href="<?php echo base_url() ?>assets/library/gb/greybox.css" rel="stylesheet" />
    <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
    <!-- end: HEADER -->
    <!-- start: MAIN CONTAINER -->
    <div class="main-container" style="margin-top:125px;">
        <?php echo Modules::run('templates/' . TEMPLATE . '/menu'); ?>
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
                                        Master Data
                                    </a>
                                </li>
                            </ol>

                            <div class="page-header">
                                <h1>Master Data</h1>
                            </div>
                            <!-- end: PAGE TITLE & BREADCRUMB -->
                        
                       <div class="row">                                
                                <div class="col-sm-12">                                
                                    <div class="col-sm-2"><button class="btn btn-icon btn-block" onclick="formKlasifikasi()"><i class="clip-stack-empty"></i>Kode Klasifikasi</button></div>
                                    <div class="col-sm-2"><button class="btn btn-icon btn-block" onclick="formUnitKerja()"><i class="clip-users-3"></i>Unit Kerja</button></div>
                                    <div class="col-sm-2"><button class="btn btn-icon btn-block" onclick="formTingkatPerkembangan()"><i class="clip-copy-2"></i>Tingkat Perkembangan</button></div>
                                    <div class="col-sm-2"><button class="btn btn-icon btn-block" onclick="formKondisiFisik()"><i class="clip-file-check"></i>Kondisi Fisik</button></div>
                                    <div class="col-sm-2"><button class="btn btn-icon btn-block" onclick="formJRA()"><i class="clip-file-2"></i>JRA</button></div>
                                    <div class="col-sm-2"><button class="btn btn-icon btn-block" onclick="formMediaSimpan()"><i class="clip-database"></i>Media Simpan</button></div>
                                    <div class="col-sm-2"><button class="btn btn-icon btn-block" onclick="formFileTypeLampiran()"><i class="fa fa-tags"></i>File Type Lampiran</button></div>
                                    <div class="col-sm-2"><button class="btn btn-icon btn-block" onclick="formLokasiSimpanDepo()"><i class="fa fa-home"></i>Lokasi Simpan Depo</button></div>
                                    <div class="col-sm-2"><button class="btn btn-icon btn-block" onclick="formLokasiSimpanRuang()"><i class="clip-enter"></i>Lokasi Simpan Ruang</button></div>
                                    <div class="col-sm-2"><button class="btn btn-icon btn-block" onclick="formLokasiSimpanLemari()"><i class="clip-keyboard-2"></i>Lokasi Simpan Lemari</button></div>
                                    <div class="col-sm-2"><button class="btn btn-icon btn-block" onclick="formLokasiSimpanBoks()"><i class="clip-archive"></i>Lokasi Simpan Boks</button></div>                                
                                </div>
                            </div>

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
                                     
                                        UIElements.init();
                                        FormElements.init();
                                            });
                                            
         function formKlasifikasi() {
            GB_show("Master Data Kode Klasifikasi", '<?php echo base_url() ?>master/masterdata/klasifikasi', 900, 1080);
           $('html, body').animate({ scrollTop: 0 }, 'slow');
        }
         function formUnitKerja() {
            GB_show("Master Data Unit Kerja", '<?php echo base_url() ?>master/masterdata/unit_kerja', 900, 1080);
           $('html, body').animate({ scrollTop: 0 }, 'slow');
        }
         function formTingkatPerkembangan() {
            GB_show("Master Data Tingkat Perkembangan", '<?php echo base_url() ?>master/masterdata/tingkat_perkembangan', 900, 1080);
           $('html, body').animate({ scrollTop: 0 }, 'slow');
        }
         function formKondisiFisik() {
            GB_show("Master Data Kondisi Fisik", '<?php echo base_url() ?>master/masterdata/kondisi_fisik', 900, 1080);
           $('html, body').animate({ scrollTop: 0 }, 'slow');
        }
         function formJRA() {
            GB_show("Master Data JRA", '<?php echo base_url() ?>master/masterdata/jra', 900, 1080);
           $('html, body').animate({ scrollTop: 0 }, 'slow');
        }
         function formMediaSimpan() {
            GB_show("Master Data Media Simpan", '<?php echo base_url() ?>master/masterdata/media_simpan', 900, 1080);
           $('html, body').animate({ scrollTop: 0 }, 'slow');
        }
         function formFileTypeLampiran() {
            GB_show("Master Data Kode Klasifikasi", '<?php echo base_url() ?>master/masterdata/file_type_lampiran', 900, 1080);
           $('html, body').animate({ scrollTop: 0 }, 'slow');
        }
         function formLokasiSimpanDepo() {
            GB_show("Master Data Lokasi Simpan Depo", 'http://localhost:88/masterdata/main/lokasi_simpan_depo', 900, 1080);
           $('html, body').animate({ scrollTop: 0 }, 'slow');
        }
         function formLokasiSimpanRuang() {
            GB_show("Master Data Lokasi Simpan Ruang", '<?php echo base_url() ?>master/masterdata/lokasi_simpan_ruang', 900, 1080);
           $('html, body').animate({ scrollTop: 0 }, 'slow');
        }
         function formLokasiSimpanLemari() {
            GB_show("Master Data Lokasi Simpan Lemari", '<?php echo base_url() ?>master/masterdata/lokasi_simpan_lemari', 900, 1080);
           $('html, body').animate({ scrollTop: 0 }, 'slow');
        }
         function formLokasiSimpanBoks() {
            GB_show("Master Data Lokasi Simpan Boks", '<?php echo base_url() ?>master/masterdata/lokasi_simpan_boks', 900, 1080);
           $('html, body').animate({ scrollTop: 0 }, 'slow');
        }
    </script>
   
</body>
<!-- end: BODY -->

<!-- Mirrored from www.cliptheme.com/clip-one/ by HTTrack Website Copier/3.x [XR&CO'2013], Sat, 16 Nov 2013 08:37:43 GMT -->
</html>