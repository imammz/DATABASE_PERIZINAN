
<?php echo Modules::run('templates/' . TEMPLATE . '/meta_css'); ?>
<!-- end: HEAD -->
<!-- start: BODY -->
<body onload="changeDepoStart()">
    <!-- start: HEADER -->

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
    <link rel="stylesheet" href="assets/plugins/colorbox/example2/colorbox.css">
    <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
    <!-- end: HEADER -->
    <!-- start: MAIN CONTAINER -->
    
        <div style="background-color: #ffffff">

          <div class="modal-footer">
              <a onclick="return confirm('Anda yakin akan menghapus data arsip ini?')" href="<?php echo base_url() ?>pemindahan/entry/process/delete/<?php echo $id_arsip ?>"> 
<button class="btn btn-red">
Delete
<i class="fa fa-trash-o"></i>
</button>
          </a>
                                        &nbsp;
                                        <button type="button" class="btn btn-blue" onclick="processSubmitForm();">
                                            Save changes
                                        </button>
                                    </div>
            

                    <div class="tabbable">
                        <ul id="myTab4" class="nav nav-tabs tab-padding tab-space-3 tab-blue">
                                            <li class="active">
                                                <a href="#tab3" data-toggle="tab">
                                                   Lokasi Simpan
                                                </a>
                                            </li>    
                        
                        </ul>
                        <div class="tab-content">
                                       
                            <div class="tab-pane in active" id="tab3">
														<p>
								<div class="form-group">
                                                                    <label class="col-sm-3 control-label" for="nomor_depo">Nomor Depo</label>
                                                                    <div class="col-sm-5">
                                                                    <select id="nomor_depo" name="nomor_depo" class="form-control " onchange="changeDepo()">  <!--  for search select -->
                                                                            <option value="">-- Pilih Lokasi Depo --</option>
                                                                            <?php foreach ($depo as $row) { 
                                                                                    $selected = '';                                                                                    
                                                                                    if($row['nomor_depo']==$arsip['nomor_depo']) $selected = 'selected';
                                                                                ?>
                                                                                <option value="<?php echo $row['nomor_depo'] ?>" <?php echo $selected ?>> <?php echo $row['nomor_depo'] ?> - <?php echo $row['nama_depo'] ?> </option>

                                                                            <?php } ?>
                                                                        </select>
                                                                        
                                                                    </div>
                                                                     <div class="col-sm1"> <img src="<?php echo base_url() ?>assets/images/depo.png"/>  </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label" for="nomor_ruang">Nomor Ruang</label>
                                                                    <div class="col-sm-5">
                                                                    <select id="nomor_ruang" name="nomor_ruang" class="form-control " onchange="changeRuang()">  <!--  for search select -->
                                                                            <option value="" selected>-- Pilih Lokasi Ruang --</option>                                                                           
                                                                     </select>
                                                                       
                                                                    </div>
                                                                     <div class="col-sm1"> <img src="<?php echo base_url() ?>assets/images/ruang.png"/>  </div>
                                                                </div>	
                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label" for="nomor_lemari">Nomor Lemari</label>
                                                                    <div class="col-sm-5">
                                                                    <select id="nomor_lemari" name="nomor_lemari" class="form-control " onchange="changeLemari()">  <!--  for search select -->
                                                                            <option value="" selected>-- Pilih Lokasi Lemari --</option>                                                                           
                                                                     </select>
                                                                       
                                                                    </div>
                                                                     <div class="col-sm1"> <img src="<?php echo base_url() ?>assets/images/lemari.png"/>  </div>
                                                                </div>	
                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label" for="nomor_boks">Nomor Boks</label>
                                                                    <div class="col-sm-5">
                                                                    <select id="nomor_boks" name="nomor_boks" class="form-control ">  <!--  for search select -->
                                                                            <option value="" selected>-- Pilih Lokasi Boks --</option>                                                                           
                                                                     </select>                                                                         
                                                                    </div>
                                                                    <div class="col-sm1"> <img src="<?php echo base_url() ?>assets/images/boks.png"/>  </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label" for="nomor_folder">Nomor Folder  </label>
                                                                    <div class="col-sm-2">
                                                                        <input type="text" placeholder="Nomor Folder" id="nomor_folder" name="nomor_folder" class="form-control">
                                                                    </div>
                                                                    <div class="col-sm1"> <img src="<?php echo base_url() ?>assets/images/folder.png"/>  </div>
                                                                </div>                
                                                                                                                </p>
													</div>
                            
                                    </div>
                                   

                



        </div>
        <!-- end: PAGE -->
   
   

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
    <script src="assets/plugins/colorbox/jquery.colorbox-min.js"></script>
		<script src="assets/js/pages-gallery.js"></script>
    <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
    <script>
                                            jQuery(document).ready(function() {
                                              	UIElements.init();                                                                                                
                                            });
          
    function changeDepoStart() {
        
        $('#nomor_depo').val('<?php echo $arsip['nomor_depo'] ?>');
        $('#nomor_folder').val('<?php echo $arsip['nomor_folder'] ?>');
        
        var get_nomor_depo = $('#nomor_depo').val();
        
        var url = '<?php echo base_url() ?>pemindahan/entry/comboRuangByDepo/'+get_nomor_depo;
        $.post(url,{
            nomor_depo: get_nomor_depo },
            function(data, status) { 
                 var data_ruang = '<option value="" selected>-- Pilih Lokasi Ruang --</option>';  
                 if(data.result) { 
                     
                    $.each(data.ruang, function () {
                            data_ruang += '<option value="'+this.nomor_depo+'|'+this.nomor_ruang+'"> '+this.nomor_ruang+' </option>';
                    });      
        }   
        $('#nomor_ruang').html(data_ruang);
        
        $('#nomor_ruang').val('<?php echo $arsip['nomor_depo'].'|'.$arsip['nomor_ruang'] ?>');
        changeRuangStart();
        changeLemariStart();
        
    },"json"
            );
    }
    
    function changeRuangStart() {
        
        var get_nomor_depo = $('#nomor_depo').val();
        var get_nomor_ruang_temp = $('#nomor_ruang').val();        
        get_nomor_ruang_temp = get_nomor_ruang_temp.split("|");        
        get_nomor_ruang = get_nomor_ruang_temp[1];
        
        var url = '<?php echo base_url() ?>pemindahan/entry/comboLemariByRuang/'+get_nomor_depo+'/'+get_nomor_ruang;
        $.post(url,{
            nomor_depo: get_nomor_depo, 
            nomor_ruang: get_nomor_ruang 
        
    },
            function(data, status) { 
                
         var data_lemari = '<option value="">-- Pilih Lokasi Lemari --</option>';
               if(data.result) { 
                                                             
                  
                    $.each(data.lemari, function () {
                            data_lemari += '<option value="'+this.nomor_depo+'|'+this.nomor_ruang+'|'+this.nomor_lemari+'"> '+this.nomor_lemari+' </option>';
                    });
                  
                     
                     
        } 
        $('#nomor_lemari').html(data_lemari);        
        $('#nomor_lemari').val('<?php echo $arsip['nomor_depo'].'|'.$arsip['nomor_ruang'].'|'.$arsip['nomor_lemari'] ?>');
    
       
    },"json"
            );
    }
    
    function changeLemariStart() {
        
        var get_nomor_depo = $('#nomor_depo').val();
        var get_nomor_ruang_temp = $('#nomor_ruang').val();        
        get_nomor_ruang_temp = get_nomor_ruang_temp.split("|");        
      
        var get_nomor_ruang = get_nomor_ruang_temp[1];
        
        $('#nomor_lemari').val('<?php echo $arsip['nomor_depo'].'|'.$arsip['nomor_ruang'].'|'.$arsip['nomor_lemari'] ?>');
        
        var get_nomor_lemari_temp = '<?php echo $arsip['nomor_depo'].'|'.$arsip['nomor_ruang'].'|'.$arsip['nomor_lemari'] ?>';        
        get_nomor_lemari_temp = get_nomor_lemari_temp.split("|");        
       
        var get_nomor_lemari = get_nomor_lemari_temp[2];
        
        var url = '<?php echo base_url() ?>pemindahan/entry/comboBoksByLemari/'+get_nomor_depo+'/'+get_nomor_ruang+'/'+get_nomor_lemari;
        $.post(url,{
            nomor_depo: get_nomor_depo, 
            nomor_ruang: get_nomor_ruang, 
            nomor_lemari: get_nomor_lemari 
        
    },
            function(data, status) { 
                 
        var data_boks = '<option value="" selected>-- Pilih Lokasi Boks --</option>'; 
                       if(data.result) { 
                           
                    $.each(data.boks, function () {
                            data_boks += '<option value="'+this.nomor_depo+'|'+this.nomor_ruang+'|'+this.nomor_lemari+'|'+this.nomor_boks+'"> '+this.nomor_boks+' </option>';
                    });
        }
         $('#nomor_boks').html(data_boks);
          $('#nomor_boks').val('<?php echo $arsip['nomor_depo'].'|'.$arsip['nomor_ruang'].'|'.$arsip['nomor_lemari'].'|'.$arsip['nomor_boks'] ?>');
        
    },"json"
            );
    }
    
    
    function changeDepo() {
        
        var get_nomor_depo = $('#nomor_depo').val();
        
        var url = '<?php echo base_url() ?>pemindahan/entry/comboRuangByDepo/'+get_nomor_depo;
        $.post(url,{
            nomor_depo: get_nomor_depo },
            function(data, status) { 
                 var data_ruang = '<option value="">-- Pilih Lokasi Ruang --</option>';  
                 if(data.result) { 
                     
                    $.each(data.ruang, function () {
                            data_ruang += '<option value="'+this.nomor_depo+'|'+this.nomor_ruang+'"> '+this.nomor_ruang+' </option>';
                    });      
        }   
        $('#nomor_ruang').html(data_ruang);
        changeRuang();
        changeLemari();
        
    },"json"
            );
    }
    
    function changeRuang() {
        
        var get_nomor_depo = $('#nomor_depo').val();
        var get_nomor_ruang_temp = $('#nomor_ruang').val();        
        get_nomor_ruang_temp = get_nomor_ruang_temp.split("|");        
        get_nomor_ruang = get_nomor_ruang_temp[1];
        
        var url = '<?php echo base_url() ?>pemindahan/entry/comboLemariByRuang/'+get_nomor_depo+'/'+get_nomor_ruang;
        $.post(url,{
            nomor_depo: get_nomor_depo, 
            nomor_ruang: get_nomor_ruang 
        
    },
            function(data, status) { 
                
         var data_lemari = '<option value="">-- Pilih Lokasi Lemari --</option>';
               if(data.result) { 
                                                             
                  
                    $.each(data.lemari, function () {
                            data_lemari += '<option value="'+this.nomor_depo+'|'+this.nomor_ruang+'|'+this.nomor_lemari+'"> '+this.nomor_lemari+' </option>';
                    });
                  
                     
                     
        } 
        $('#nomor_lemari').html(data_lemari);        
        changeLemari();
       
    },"json"
            );
    }
    
    function changeLemari() {
        
        var get_nomor_depo = $('#nomor_depo').val();
        var get_nomor_ruang_temp = $('#nomor_ruang').val();        
        get_nomor_ruang_temp = get_nomor_ruang_temp.split("|");        
      
        var get_nomor_ruang = get_nomor_ruang_temp[1];
        
        
        var get_nomor_lemari_temp = $('#nomor_lemari').val();        
        get_nomor_lemari_temp = get_nomor_lemari_temp.split("|");        
       
        var get_nomor_lemari = get_nomor_lemari_temp[2];
        
        var url = '<?php echo base_url() ?>pemindahan/entry/comboBoksByLemari/'+get_nomor_depo+'/'+get_nomor_ruang+'/'+get_nomor_lemari;
        $.post(url,{
            nomor_depo: get_nomor_depo, 
            nomor_ruang: get_nomor_ruang, 
            nomor_lemari: get_nomor_lemari 
        
    },
            function(data, status) { 
                 
        var data_boks = '<option value="" selected>-- Pilih Lokasi Boks --</option>'; 
                       if(data.result) { 
                           
                    $.each(data.boks, function () {
                            data_boks += '<option value="'+this.nomor_depo+'|'+this.nomor_ruang+'|'+this.nomor_lemari+'|'+this.nomor_boks+'"> '+this.nomor_boks+' </option>';
                    });
        }
         $('#nomor_boks').html(data_boks);
        
    },"json"
            );
    }
    
  

        function processSubmitForm() {

      
            var url = '<?php echo base_url() ?>pemindahan/penerimaan/process/<?php echo $id_arsip ?>';

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
               
               if(data.result) {  
                   
                 successNotification();
               }
               else {
                errorNotification();
                //alert('ERROR! Gagal Edit Data Arsip');
               }
               
            }, "json"); 

        }  

        var successNotification = function () {
        $.extend($.gritter.options, {
            class_name: 'gritter-light', // for light notifications (can be added directly to $.gritter.add too)
            position: 'top-right', // possibilities: bottom-left, bottom-right, top-left, top-right
            fade_in_speed: 90, // how fast notifications fade in (string or int)
            fade_out_speed: 90, // how fast the notices fade out
            time: 6000 // hang on the screen for...
        });
        
      
            var unique_id = $.gritter.add({
                title: 'SUCCESS',
                text: 'Proses Penerimaan Berhasil!',
                sticky: false,
                image: '<?php echo base_url() ?>assets/images/success.png',
                time: '',
                class_name: 'my-sticky-class'
            });          
    };
    
    
    var errorNotification = function () {
        $.extend($.gritter.options, {
            class_name: 'gritter-light', // for light notifications (can be added directly to $.gritter.add too)
            position: 'top-right', // possibilities: bottom-left, bottom-right, top-left, top-right
            fade_in_speed: 90, // how fast notifications fade in (string or int)
            fade_out_speed: 90, // how fast the notices fade out
            time: 6000 // hang on the screen for...
        });
        
      
            var unique_id = $.gritter.add({
                title: 'ERROR',
                text: 'Proses Penerimaan Gagal!',
                sticky: false,
                image: '<?php echo base_url() ?>assets/images/error.png',
                time: '',
                class_name: 'my-sticky-class'
            });          
    };                                  
                                            
    </script>
    
    
    
</body>
<!-- end: BODY -->

<!-- Mirrored from www.cliptheme.com/clip-one/ by HTTrack Website Copier/3.x [XR&CO'2013], Sat, 16 Nov 2013 08:37:43 GMT -->
</html>