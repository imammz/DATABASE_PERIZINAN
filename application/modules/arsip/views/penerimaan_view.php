
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
                                    Penerimaan
                                </a>
                            </li>

                        </ol>

                        <div class="page-header">
                            <h1>Penerimaan</h1>
                            <p>Fungsi modul untuk mencatat lokasi simpan arsip/dokumen yang sudah diterima Pusat Arsip. &nbsp; <a href="#modalMore" data-toggle="modal" class="btn btn-default btn-xs"> <i class="clip-expand"></i> </a> </p>
                        </div>
                       

                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                                    <thead>
                                        <tr>
                                            <th class="center" width="30">No</th>
                                            <th class="hidden-xs" width="60">Kode Klasifikasi</th>
                                            <th class="hidden-xs" width="60">Nomor Definitif</th>
                                            <th class="hidden-xs" width="120" style="text-align: center">Kurun Waktu</th>
                                            <th class="hidden-xs" >Uraian</th>
                                            <th  class="center" width="40"> Tingkat Perkembangan</th>																							
                                            <th  class="center" width="40"> Jumlah Berkas</th>																							
                                            <th class="center" width="50"> Detail </th>												
                                            <th class="center" width="50"> Lokasi Simpan </th>												
                                        </tr>
                                    </thead>
                                    <tbody>


                                    </tbody>    
                                </table>

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
                                                    Petunjuk Pemakaian : <br/>
                                                    Proses penerimaan fisik arsip/dokumen : isi atau pilih field pada tabel, untuk field yang berwarna atau mandatory berarti harus diisi kemudian klik tombol Search untuk menampilkan data arsip/dokumen yang telah disetujui oleh Unit Kerja untuk disimpan di Pusat Arsip, isi kode lokasi simpan fisik arsip/dokumen pada kolom tabel daftar arsip/dokumen pindah, klik tombol 'Pemindahan' untuk menyimpan data.
                                                </p>
                                                <p>
                                                    Keterangan Field : <br/>
                                                    Unit Pengolah : Unit kerja yang memindahkan arsip/dokumen ke pusat arsip <br/>
                                                    Tahun Pindah : Tahun dipindahkan ke pusat arsip <br/>
                                                    Lokasi Simpan : Kode default lokasi simpan fisik arsip/dokumen
                                                </p> <p>
                                                    Contoh Pengisian : <br/>
                                                    Unit Pengolah : Pilih <br/>
                                                    Tahun Pindah : Pilih <br/>
                                                    Lokasi Simpan : D1.20 [Ruang.Rak] / 000 [No. Boks]

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
            GB_show("Detil Data Arsip", '<?php echo base_url(); ?>pemindahan/penerimaan/detil/'+id, 500, 1070);
            $('html, body').animate({ scrollTop: 0 }, 'slow');
        }
     
      function formPemindahan(id) {
            GB_show("Pemindahan Arsip", '<?php echo base_url(); ?>pemindahan/penerimaan/pindah/'+id, 500, 1070);
            $('html, body').animate({ scrollTop: 0 }, 'slow');
        }


        function processSubmitForm() {
        

            var url = '<?php echo base_url() ?>pemindahan/penerimaan/process/insert';

            $.post(url,
                    {
                        kode_klasifikasi: $('#kode_klasifikasi').val(),
                        kode_jra: $('#kode_jra').val(),
                        kode_unit_kerja: $('#kode_unit_kerja').val(),
                        tingkat_perkembangan: $('#tingkat_perkembangan').val(),
                        kondisi_fisik: $('#kondisi_fisik').val(),
                        media_simpan: $('#media_simpan').val(),
                        jumlah_berkas: $('#jumlah_berkas').val(),
                        uraian: $('#uraian').val()
                    },
            function(data, status) {
               
               if(data.result) {  
                   
                    var oTable = $('#sample_1').dataTable();
                      oTable.fnClearTable();
                      oTable.fnDraw();

                   $('#tingkat_perkembangan').val(''),
                   $('#kondisi_fisik').val(''),
                   $('#media_simpan').val(''),
                   $('#jumlah_berkas').val(''),
                   $('#uraian').val('')
                    alert('Berhasil Tambah Data');
               }
               else {
                   alert('Gagal Tambah Data!');
               }
               
            }, "json");

        }

       


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
                    "sAjaxSource": "<?php echo base_url() ?>pemindahan/penerimaan/load/",
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