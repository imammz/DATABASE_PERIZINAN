<!DOCTYPE html>
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
    <!--<![endif]-->
    <!-- start: HEAD -->

    <?php echo Modules::run('templates/'.TEMPLATE.'/meta_css'); ?>
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

    <script type="text/javascript" src="<?php echo base_url() ?>assets/library/gb/greybox.js"></script>
    <link type="text/css" href="<?php echo base_url() ?>assets/library/gb/greybox.css" rel="stylesheet" />
                <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
        <!-- end: HEADER -->
        <!-- start: MAIN CONTAINER -->
        <div class="main-container" style="margin-top:125px;">
            <?php echo Modules::run('templates/'.TEMPLATE.'/menu'); ?>
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
                                        Pemindahan
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Pencarian
                                    </a>
                                </li>

                                
                            </ol>

                            <div class="page-header">
                                <h1>Hasil Pencarian</h1>
                                <h4>Ditemukan <strong><?php echo $count ?></strong> Arsip</h4>
                            </div>
                            <!-- end: PAGE TITLE & BREADCRUMB -->
                            <p align="left">
                            <div id="demo"> </div>				
                            
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
        <?php echo Modules::run('templates/'.TEMPLATE.'/footer'); ?>
        <!-- end: FOOTER -->

        <!-- start: MAIN JAVASCRIPTS -->
        <?php echo Modules::run('templates/'.TEMPLATE.'/js'); ?>
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
                                        
    $('#demo').html( '<table border="0" class="table table-striped table-bordered table-hover table-full-width" id="example"></table>' );
    $('#example').dataTable( {
        "aaData": [
            /* Reduced data set */
            <?php 
            $no = 1;
            foreach($result as $row) { ?>
            [ 
                "<?php echo $no ?>", 
                "<?php echo $row['nomor_definitif'] ?>", 
                "<?php echo $row['kode_klasifikasi'] ?>", 
                "<?php echo $row['unit_kerja'] ?>", 
                "<?php echo htmlspecialchars($row['uraian'], ENT_QUOTES); ?>",
                "<a href='#' role='button' onclick='formDetilPenerimaan(<?php echo $row['id_arsip']?>);' class='btn btn-default' > Detail </a>"],
            <?php $no++; } ?>        
        ],
       
        "oLanguage": {
                        "sLengthMenu": "Show _MENU_ Rows",
                        "sSearch": "",
                        "oPaginate": {
                            "sPrevious": "",
                            "sNext": ""
                        }
                    },
                  
                    "aoColumns": [
                        {"sTitle": "No", "sClass": "center"},
                        {"sTitle": "Nomor Definitif"},
                        {"sTitle": "Kode Klasifikasi"},
                        {"sTitle": "Unit Kerja", "sClass": "center"},
                        {"sTitle": "Uraian", "sClass": "center", sWidth: '30%'},
                        {"sTitle": "Detail", "sClass": "center"}
                    ],
                    // set the initial value
                    "iDisplayLength": 10,
    } );  
                                        
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
    
     function formDetilPenerimaan(id) {
            GB_show("Detil Data Arsip", '<?php echo base_url(); ?>pemindahan/penerimaan/detil/'+id, 900, 1070);
           $('html, body').animate({ scrollTop: 0 }, 'slow');
        }
    
        </script>
        
        
  
    </body>
    <!-- end: BODY -->

    <!-- Mirrored from www.cliptheme.com/clip-one/ by HTTrack Website Copier/3.x [XR&CO'2013], Sat, 16 Nov 2013 08:37:43 GMT -->
</html>