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
        <?php echo Modules::run('templates/' . TEMPLATE . '/header'); ?>
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
                                        Kearsipan
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Perizinan
                                    </a>
                                </li>


                            </ol>

                            <div class="page-header">
                                <h1>Perizinan</h1>
                                <p>Fungsi modul untuk mencatat arsip/dokumen Perizinan yang meliputi -	Dokumen peryaratan perizinan pemohon (ex: fotocopy KTP, fotocopy sertifikat tanah, fotocopy PBB, dll) - Surat izin pemohon yang sudah ditanda tangan Kepala Badan 
 . &nbsp; <a href="#modalMore" data-toggle="modal" class="btn btn-default btn-xs"> <i class="clip-expand"></i> </a> </p>
                            </div>
                            <!-- end: PAGE TITLE & BREADCRUMB -->
                            <p align="right">
                                <a href="#modalImportExcel" data-toggle="modal" class="btn btn-success"><i class="clip-file-excel "></i> Import From Excel </a> &nbsp;
                                <a href="#modalAddItem" data-toggle="modal" class="btn btn-primary"><i class="fa fa-plus"></i> Add Item </a>
                            </p>

                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                                        <thead>
                                            <tr>
                                                <th class="center" width="30">No</th>
                                                <th class="hidden-xs" width="80">Kode Klasifikasi</th>
                                                <th class="hidden-xs" width="120" style="text-align: center">Kurun Waktu</th>
                                                <th class="hidden-xs" >Jenis Izin</th>
                                                <th class="hidden-xs" >Uraian Arsip</th>
                                                <th  class="center" width="40"> Tingkat Perkembangan</th>																							
                                                <th  class="center" width="40"> Jumlah Berkas</th>																							
                                                <th class="center" width="55"> Upload Files </th>	
                                                <th class="center" width="55"> Detail </th>		

                                            </tr>
                                        </thead>
                                        <tbody>


                                        </tbody>    
                                    </table>

                                    <?php $this->load->view('entry_data_form_view'); ?>


                                    <div id="modalImportExcel" class="modal fade" tabindex="-1" data-width="760" style="display: none;">
                                        <form method="POST" action="<?php echo base_url() ?>pemindahan/entry/importExcel" enctype="multipart/form-data">                                   
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                    &times;
                                                </button>
                                                <h4 class="modal-title">Import From Excel</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">                                                
                                                        <div class="form-group">

                                                            <label class="col-sm-3 control-label" for="excel_file">Select Excel File</label>
                                                            <div class="col-sm-9">

                                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                                    <div class="input-group">
                                                                        <div class="form-control uneditable-input">
                                                                            <i class="fa fa-file fileupload-exists"></i>
                                                                            <span class="fileupload-preview"></span>
                                                                        </div>
                                                                        <div class="input-group-btn">
                                                                            <div class="btn btn-light-grey btn-file">
                                                                                <span class="fileupload-new"><i class="fa fa-folder-open-o"></i> Select file</span>
                                                                                <span class="fileupload-exists"><i class="fa fa-folder-open-o"></i> Change</span>
                                                                                <input type="file" class="file-input" name="file_import">
                                                                            </div>
                                                                            <a href="#" class="btn btn-light-grey fileupload-exists" data-dismiss="fileupload">
                                                                                <i class="fa fa-times"></i> Remove
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <p><strong>Download Contoh Template Untuk Import </strong> <a href="<?php echo base_url() ?>public/template_data_arsip.xls" data-toggle="modal" class="btn btn-success btn-xs"> <i class="clip-file-excel"></i> </a> </p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" data-dismiss="modal" class="btn btn-light-grey">
                                                    Close
                                                </button>

                                                <input type="submit" value="Proses Import" class="btn btn-blue"/>
                                            </div>
                                        </form>
                                    </div>


                                    <div id="modalMore" class="modal fade" tabindex="-1" data-width="760" style="display: none;">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                &times;
                                            </button>
                                            <h4 class="modal-title">Modul Penerimaan</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p>
                                                       Fungsi modul untuk mencatat arsip/dokumen Perizinan yang meliputi -	Dokumen peryaratan perizinan pemohon (ex: fotocopy KTP, fotocopy sertifikat tanah, fotocopy PBB, dll) - Surat izin pemohon yang sudah ditanda tangan Kepala Badan 
                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" data-dismiss="modal" class="btn btn-light-grey">
                                                Close
                                            </button>
                                            <button type="button" class="btn btn-blue">
                                                Process Import
                                            </button>
                                        </div>
                                    </div>


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
        <script src="<?php echo base_url() ?>assets/pages/penerimaan/form-validation.js"></script>
        <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
        <script>
              jQuery(document).ready(function() {
                  Main.init();
                  TableData1.init();
                  UIElements.init();
                  FormElements.init();
                  FormValidator.init();
              });
        </script>
        <script>

              function formDetilPenerimaan(id) {
                  GB_show("Detil Data Arsip", '<?php echo base_url(); ?>pemindahan/entry/detil/' + id, 900, 1070);
                  $('html, body').animate({scrollTop: 0}, 'slow');
              }
              function formUpload(id) {
                  GB_show("Upload File Arsip", '<?php echo base_url(); ?>pemindahan/entry/upload/' + id, 300, 500);
                  $('html, body').animate({scrollTop: 0}, 'slow');
              }


              function getJRA() {

                  var selected = document.getElementById('kode_jra');
                  var kode_jra = selected.options[selected.selectedIndex].value;

                  var url = '<?php echo base_url() ?>master/jra/get_jra/';


                  $.post(url,
                          {
                              kode_jra: kode_jra,
                              kurun_waktu_awal: $('#kurun_waktu_awal').val()

                          },
                  function(data, status) {

                      if (data.result) {
                          $('#jra_aktif').val(data.retensi_aktif_note),
                                  $('#jra_inaktif').val(data.retensi_inaktif_note),
                                  $('#jra_status').val(data.status_akhir),
                                  $('#jra_tahun_musnah').val(data.tahun_musnah);
                      }
                      else {
                          alert('Gagal Load JRA');
                      }

                  }, "json");

              }

              // function combox ajax
              function changeDepo() {

                  var get_nomor_depo = $('#nomor_depo').val();

                  var url = '<?php echo base_url() ?>pemindahan/entry/comboRuangByDepo/' + get_nomor_depo;
                  $.post(url, {
                      nomor_depo: get_nomor_depo},
                  function(data, status) {
                      var data_ruang = '<option value="" selected>-- Pilih Lokasi Ruang --</option>';
                      if (data.result) {

                          $.each(data.ruang, function() {
                              data_ruang += '<option value="' + this.nomor_depo + '|' + this.nomor_ruang + '"> ' + this.nomor_ruang + ' </option>';
                          });
                      }
                      $('#nomor_ruang').html(data_ruang);
                      changeRuang();
                      changeLemari()

                  }, "json"
                          );
              }

              function changeRuang() {

                  var get_nomor_depo = $('#nomor_depo').val();
                  var get_nomor_ruang_temp = $('#nomor_ruang').val();
                  get_nomor_ruang_temp = get_nomor_ruang_temp.split("|");
                  get_nomor_ruang = get_nomor_ruang_temp[1];

                  var url = '<?php echo base_url() ?>pemindahan/entry/comboLemariByRuang/' + get_nomor_depo + '/' + get_nomor_ruang;
                  $.post(url, {
                      nomor_depo: get_nomor_depo,
                      nomor_ruang: get_nomor_ruang

                  },
                  function(data, status) {

                      var data_lemari = '<option value="" selected>-- Pilih Lokasi Lemari --</option>';
                      if (data.result) {

                          $.each(data.lemari, function() {
                              data_lemari += '<option value="' + this.nomor_depo + '|' + this.nomor_ruang + '|' + this.nomor_lemari + '"> ' + this.nomor_lemari + ' </option>';
                          });
                      }
                      $('#nomor_lemari').html(data_lemari);
                      changeLemari();
                  }, "json"
                          );
              }

              function changeLemari() {

                  var get_nomor_depo = $('#nomor_depo').val();
                  var get_nomor_ruang_temp = $('#nomor_ruang').val();
                  get_nomor_ruang_temp = get_nomor_ruang_temp.split("|");

                  var get_nomor_ruang = get_nomor_ruang_temp[1];

                  var get_nomor_lemari = $('#nomor_lemari').val();
                  var get_nomor_lemari_temp = $('#nomor_lemari').val();
                  get_nomor_lemari_temp = get_nomor_lemari_temp.split("|");

                  var get_nomor_lemari = get_nomor_lemari_temp[2];

                  var url = '<?php echo base_url() ?>pemindahan/entry/comboBoksByLemari/' + get_nomor_depo + '/' + get_nomor_ruang + '/' + get_nomor_lemari;
                  $.post(url, {
                      nomor_depo: get_nomor_depo,
                      nomor_ruang: get_nomor_ruang,
                      nomor_lemari: get_nomor_lemari

                  },
                  function(data, status) {

                      var data_boks = '<option value="" selected>-- Pilih Lokasi Boks --</option>';
                      if (data.result) {

                          $.each(data.boks, function() {
                              data_boks += '<option value="' + this.nomor_depo + '|' + this.nomor_ruang + '|' + this.nomor_lemari + '|' + this.nomor_boks + '"> ' + this.nomor_boks + ' </option>';
                          });
                      }
                      $('#nomor_boks').html(data_boks);
                  }, "json"
                          );
              }



              function processSubmitForm() {


                  var url = '<?php echo base_url() ?>pemindahan/entry/process/insert';

                  $.post(url,
                          {
                              kode_klasifikasi: $('#kode_klasifikasi').val(),
                              nomor_definitif: $('#nomor_definitif').val(),
                              kurun_waktu_awal: $('#kurun_waktu_awal').val(),
                              kurun_waktu_akhir: $('#jra_tahun_musnah').val(),
                              kode_jra: $('#kode_jra').val(),
                              kode_unit_kerja: $('#kode_unit_kerja').val(),
                              tingkat_perkembangan: $('#tingkat_perkembangan').val(),
                              kondisi_fisik: $('#kondisi_fisik').val(),
                              media_simpan: $('#media_simpan').val(),
                              jumlah_berkas: $('#jumlah_berkas').val(),
                              uraian: $('#uraian').val(),
                              nomor_boks: $('#nomor_boks').val(),
                              nomor_folder: $('#nomor_folder').val()
                          },
                  function(data, status) {

                      if (data.result) {

                          var oTable = $('#sample_1').dataTable();
                          oTable.fnClearTable();
                          oTable.fnDraw();

                          $('#kode_klasifikasi').val(''),
                                  $('#nomor_definitif').val(''),
                                  $('#kurun_waktu_awal').val('<?php echo date('Y') ?>'),
                                  $('#kode_jra').val(''),
                                  $('#kode_unit_kerja').val(''),
                                  $('#tingkat_perkembangan').val(''),
                                  $('#kondisi_fisik').val(''),
                                  $('#media_simpan').val(''),
                                  $('#jumlah_berkas').val(''),
                                  $('#uraian').val(''),
                                  $('#jra_aktif').val(''),
                                  $('#jra_inaktif').val(''),
                                  $('#jra_status').val(''),
                                  $('#jra_tahun_musnah').val(''),
                                  $('#nomor_folder').val(''),
                                  $('#nomor_depo').val('')

                          changeDepo();
                          successNotification();
                      }
                      else {
                          errorNotification();
                      }

                  }, "json");

              }

              var successNotification = function() {
                  $.extend($.gritter.options, {
                      class_name: 'gritter-light', // for light notifications (can be added directly to $.gritter.add too)
                      position: 'top-right', // possibilities: bottom-left, bottom-right, top-left, top-right
                      fade_in_speed: 90, // how fast notifications fade in (string or int)
                      fade_out_speed: 90, // how fast the notices fade out
                      time: 6000 // hang on the screen for...
                  });


                  var unique_id = $.gritter.add({
                      title: 'SUCCESS',
                      text: 'Berhasil Tambah Data Arsip!',
                      sticky: false,
                      image: '<?php echo base_url() ?>assets/images/success.png',
                      time: '',
                      class_name: 'my-sticky-class'
                  });
              };


              var errorNotification = function() {
                  $.extend($.gritter.options, {
                      class_name: 'gritter-light', // for light notifications (can be added directly to $.gritter.add too)
                      position: 'top-right', // possibilities: bottom-left, bottom-right, top-left, top-right
                      fade_in_speed: 90, // how fast notifications fade in (string or int)
                      fade_out_speed: 90, // how fast the notices fade out
                      time: 6000 // hang on the screen for...
                  });


                  var unique_id = $.gritter.add({
                      title: 'ERROR',
                      text: 'Gagal Tambah Data Arsip, Check Kelengkapan Data!',
                      sticky: false,
                      image: '<?php echo base_url() ?>assets/images/error.png',
                      time: '',
                      class_name: 'my-sticky-class'
                  });
              };




              // Start Table 1
              var TableData1 = function() {
                  //function to initiate DataTable
                  //DataTable is a highly flexible tool, based upon the foundations of progressive enhancement, 
                  //which will add advanced interaction controls to any HTML table
                  //For more information, please visit https://datatables.net/

                  var runDataTable = function() {
                      var oTable = $('#sample_1').dataTable({
                          "bProcessing": true,
                          "bServerSide": true,
                          "sAjaxSource": "<?php echo base_url() ?>pemindahan/perizinan/load/",
                          "aoColumnDefs": [{
                                  "aTargets": [0]
                              }],
                          "oLanguage": {
                              "sLengthMenu": "Show _MENU_ Rows",
                              "sSearch": "",
                              "oPaginate": {
                                  "sPrevious": "",
                                  "sNext": ""
                              }
                          },
                          "aoColumns": [
                              {"sClass": "table_center"},
                              null,
                              null,
                              null,
                              {"sClass": "center"},
                              {"sClass": "center"},
                              {"sClass": "center"},
                              {"sClass": "center"}
                          ],
                          // set the initial value
                          "iDisplayLength": 10,
                      });

                      $('#sample_1_wrapper .dataTables_filter input').addClass("form-control input-sm").attr("placeholder", "Search");
                      // modify table search input
                      $('#sample_1_wrapper .dataTables_length select').addClass("m-wrap small");
                      // modify table per page dropdown
                      $('#sample_1_wrapper .dataTables_length select').select2();
                      // initialzie select2 dropdown
                      $('#sample_1_column_toggler input[type="checkbox"]').change(function() {
                          /* Get the DataTables object again - this is not a recreation, just a get of the object */
                          var iCol = parseInt($(this).attr("data-column"));
                          var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
                          oTable.fnSetColumnVis(iCol, (bVis ? false : true));
                      });

                  };
                  return {
                      //main function to initiate template pages
                      init: function() {
                          runDataTable();
                      }
                  };
              }();

        </script>
    </body>
    <!-- end: BODY -->

    <!-- Mirrored from www.cliptheme.com/clip-one/ by HTTrack Website Copier/3.x [XR&CO'2013], Sat, 16 Nov 2013 08:37:43 GMT -->
</html>