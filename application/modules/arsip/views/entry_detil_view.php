
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
                                                <a href="#tab1" data-toggle="tab">
                                                    Data Arsip
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#tab2" data-toggle="tab">
                                                   File Lampiran
                                                </a>
                                            </li>    
                                            <li>
                                                <a href="#tab3" data-toggle="tab">
                                                   Lokasi Simpan
                                                </a>
                                            </li>    
                        
                        </ul>
                        <div class="tab-content">
                                            <div class="tab-pane in active" id="tab1">
                                        
                                             <form role="form" id="form-penerimaan" class="form-horizontal">
                                                   <table width="100%">
                                                        <tr>
                                                            <td valign="top">
                                                            	
                                                              
                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label" for="kode_klasifikasi">Kode Klasifikasi</label>
                                                                    <div class="col-sm-9">
                                                                        <select id="kode_klasifikasi" name="kode_klasifikasi" class="form-control search-select">
                                                                             <option value="" selected>-- Pilih Kode Klasifikasi --</option>
                                                                            <?php foreach ($klasifikasi as $row) { ?>
                                                                                   <?php
																										$selected = '';
																										if($row['kode_klasifikasi'] == $arsip['kode_klasifikasi'])
																											$selected = 'selected';
                                                                                   ?>     
                                                                                    
                                                                                <option <?php echo $selected ?> value="<?php echo $row['kode_klasifikasi'] ?>"><?php echo $row['kode_klasifikasi'] ?> - <?php echo $row['nama_klasifikasi'] ?></option>

                                                                            <?php } ?>

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                 <div class="form-group">
                                                                    <label class="col-sm-3 control-label" for="nomor_definitif">Nomor Definitif <span class="symbol required"></span> </label>
                                                                    <div class="col-sm-2">
                                                                        <input type="text" placeholder="Nomor Definitif" id="nomor_definitif" name="nomor_definitif" value="<?php echo $arsip['nomor_definitif']; ?>" class="form-control" number="true" requered="true">
                                                                    </div>
                                                                </div>
                                                                 <div class="form-group">
                                                                    <label class="col-sm-3 control-label" for="kurun_waktu_awal">Kurun Waktu Awal Arsip <span class="symbol required"></span> </label>
                                                                    <div class="col-sm-2">
                                                                        <input type="text" placeholder="Kurun Waktu Awal Arsip" id="kurun_waktu_awal" name="kurun_waktu_awal" value="<?php echo $arsip['kurun_waktu_awal']; ?>" class="form-control" number="true" requered="true">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label" for="kode_jra">Jadwal Retensi Arsip (JRA)</label>
                                                                    <div class="col-sm-9">
                                                                        <select id="kode_jra" name="kode_jra" class="form-control search-select" onchange="getJRA();">
                                                                            <option value="" selected>-- Pilih JRA --</option>
                                                                            <?php foreach ($jra as $row) { ?>

                                                                                <?php
	$selected = '';
	if($row['kode_jra'] == $arsip['kode_jra'])
		$selected = 'selected';
                                                                                   ?>     
                                                                                    
                                                                                <option <?php echo $selected ?> value="<?php echo $row['kode_jra'] ?>"><?php echo $row['kode_jra'] ?> - <?php echo substr($row['jenis_jra'], 0, 150) . '... ' ?></option>

                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label" for="jra_aktif">Aktif</label>
                                                                    <div class="col-sm-3">
                                                                        <input  type="text" id="jra_aktif" name="jra_aktif" placeholder="Text Field"  class="col-sm-4 form-control" disabled="disabled">
                                                                    </div>
                                                                    <label class="col-sm-3 control-label" for="jra_inaktif">In Aktif</label>
                                                                    <div class="col-sm-3">
                                                                        <input type="text" id="jra_inaktif" name="jra_inaktif" placeholder="Text Field"  class="col-sm-4 form-control" disabled="disabled">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label" for="jra_status">Status</label>
                                                                    <div class="col-sm-3">
                                                                        <input type="text" id="jra_status" name="jra_status" placeholder="Text Field"  class="col-sm-4 form-control" disabled="disabled">
                                                                    </div>
                                                                    <label class="col-sm-3 control-label" for="jra_tahun_musnah">Tahun Musnah</label>
                                                                    <div class="col-sm-3">
                                                                        <input type="text" id="jra_tahun_musnah" name="jra_tahun_musnah" placeholder="Text Field"  class="col-sm-4 form-control" disabled="disabled">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label" for="kode_unit_kerja">Unit Pengelola</label>
                                                                    <div class="col-sm-9">
                                                                        <select class="form-control search-select" id="kode_unit_kerja" name="kode_unit_kerja">
                                                                            <option value="" selected>--Unit Pengelola--</option>
                                                                            <?php foreach ($unit_kerja as $row) { ?>

                                                                                <?php
	$selected = '';
	if($row['kode_unit_kerja'] == $arsip['kode_unit_kerja'])
		$selected = 'selected';
                                                                                   ?>     
                                                                                    
                                                                                <option <?php echo $selected ?> value="<?php echo $row['kode_unit_kerja'] ?>"><?php echo $row['kode_unit_kerja'] ?> - <?php echo $row['nama_unit_kerja'] ?></option>

                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label" for="tingkat_perkembangan">Tingkat Perkembangan</label>
                                                                    <div class="col-sm-9">
                                                                    <select id="tingkat_perkembangan" name="tingkat_perkembangan" class="form-control search-select">
                                                                            <option value="" selected>-- Pilih Tingkat Perkembangan --</option>
                                                                            <?php foreach ($tingkat_perkembangan as $row) { ?>

                                                                                <?php
	$selected = '';
	if($row['tingkat_perkembangan'] == $arsip['tingkat_perkembangan'])
		$selected = 'selected';
                                                                                   ?>     
                                                                                    
                                                                                <option <?php echo $selected ?> value="<?php echo $row['tingkat_perkembangan'] ?>"> <?php echo $row['tingkat_perkembangan'] ?> </option>

                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label" for="kondisi_fisik">Kondisi Fisik</label>
                                                                    <div class="col-sm-9">
                                                                    <select id="kondisi_fisik" name="kondisi_fisik" class="form-control search-select">
                                                                            <option value="" selected>-- Pilih Kondisi Fisik --</option>
                                                                            <?php foreach ($kondisi_fisik as $row) { ?>

                                                                                <?php
	$selected = '';
	if($row['kondisi_fisik'] == $arsip['kondisi_fisik'])
		$selected = 'selected';
                                                                                   ?>     
                                                                                    
                                                                                <option <?php echo $selected ?> value="<?php echo $row['kondisi_fisik'] ?>"> <?php echo $row['kondisi_fisik'] ?> </option>

                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label" for="media_simpan">Media Simpan</label>
                                                                    <div class="col-sm-9">
                                                                    <select id="media_simpan" name="media_simpan" class="form-control search-select">  <!--  for search select -->
                                                                            <option value="" selected>-- Pilih Media Simpan --</option>
                                                                            <?php foreach ($media_simpan as $row) { ?>

                                                                                <?php
	$selected = '';
	if($row['media_simpan'] == $arsip['media_simpan'])
		$selected = 'selected';
                                                                                   ?>     
                                                                                    
                                                                                <option <?php echo $selected ?> value="<?php echo $arsip['media_simpan'] ?>"> <?php echo $row['media_simpan'] ?> - <?php echo $row['keterangan'] ?> </option>

                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label" for="jumlah_berkas">Jumlah Berkas <span class="symbol required"></span> </label>
                                                                    <div class="col-sm-2">
                                                                        <input type="text" value="<?php echo $arsip['jumlah_berkas'] ?>" placeholder="Jumlah Berkas" id="jumlah_berkas" value="<?php echo $arsip['jumlah_berkas'] ?>" name="jumlah_berkas" class="form-control" number="true" requered="true">
                                                                    </div>
                                                                </div>


                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label" for="uraian">Uraian</label>
                                                                    <div class="col-sm-9">

                                                                        <textarea class="autosize form-control" id="uraian" name="uraian" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 69px;"><?php echo $arsip['uraian'] ?></textarea>
                                                                    </div>
                                                                </div>
																					
<div class="alert alert-block alert-info">
                                                            		
                                                                    <div class="col-sm-1"><span class="label label-default ">Insert By : </span></div>
                                                                    <div class="col-sm-2">
																							<strong><?php echo Master_model::_getNamaLengkapByUsername($arsip['insert_by']); ?> </strong>
                                                                    </div>
                                                                    <div class="col-sm-1"><span class="label label-default ">Update By : </span></div>
                                                                    <div class="col-sm-2">
                                                                    	<strong>
																								<?php echo Master_model::_getNamaLengkapByUsername($arsip['update_by']); ?>
																								</strong>
                                                                    </div>
                                                                    <br/>
                                                                </div>

                                                            </td>



                                                        </tr>
                                                    </table>
                                                </form> 
                                            </div>
                            <div class="tab-pane" id="tab2">
                                
                                <?php 
                                 if (empty($attachments) || !isset($attachments)) {
                                     
                                 }
                                 
                                 else {
                                 foreach($attachments as $row) { 
                                    if($row['attachment_extension']=='jpg'||$row['attachment_extension']=='png') {
                                    ?>
                                
                                <img src="<?php echo base_url().$row['attachment_file_location'] ?>" width="1000"/> &nbsp; &nbsp; 
                                    
                                    <?php }
													else {
                                        ?>
                                <div>
                                <a class="btn btn-success" href="<?php echo base_url().$row['attachment_file_location'] ?>">
                                <i class="clip-download"></i>
                                Download File Lampiran
                                </a>
                                </div>
                                
                                <?php }
                                 }
											}
 ?>
                            </div>
                            <div class="tab-pane" id="tab3">
														<p>
								<div class="form-group">
                                                                    <label class="col-sm-3 control-label" for="nomor_depo">Nomor Depo</label>
                                                                    <div class="col-sm-5">
                                                                    <select id="nomor_depo" name="nomor_depo" class="form-control" onchange="changeDepo()">  <!--  for search select -->
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
                                                                    <select id="nomor_ruang" name="nomor_ruang" class="form-control" onchange="changeRuang()">  <!--  for search select -->
                                                                            <option value="" selected>-- Pilih Lokasi Ruang --</option>                                                                           
                                                                     </select>
                                                                       
                                                                    </div>
                                                                     <div class="col-sm1"> <img src="<?php echo base_url() ?>assets/images/ruang.png"/>  </div>
                                                                </div>	
                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label" for="nomor_lemari">Nomor Lemari</label>
                                                                    <div class="col-sm-5">
                                                                    <select id="nomor_lemari" name="nomor_lemari" class="form-control" onchange="changeLemari()">  <!--  for search select -->
                                                                            <option value="" selected>-- Pilih Lokasi Lemari --</option>                                                                           
                                                                     </select>
                                                                       
                                                                    </div>
                                                                     <div class="col-sm1"> <img src="<?php echo base_url() ?>assets/images/lemari.png"/>  </div>
                                                                </div>	
                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label" for="nomor_boks">Nomor Boks</label>
                                                                    <div class="col-sm-5">
                                                                    <select id="nomor_boks" name="nomor_boks" class="form-control">  <!--  for search select -->
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
                                              	Main.init();
                                                UIElements.init();
                                                FormElements.init();
                                                FormValidator.init();                                                                                       
                                            });
                                            
                                            function getJRA() {
      
      var selected = document.getElementById('kode_jra');
      var kode_jra =  selected.options[selected.selectedIndex].value;
      
         var url = '<?php echo base_url() ?>master/jra/get_jra/';
       

            $.post(url,
                    {   
                        kode_jra: kode_jra,
                        kurun_waktu_awal: $('#kurun_waktu_awal').val()
                        
                    },
            function(data, status) {
               
               if(data.result) {                     
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

      
            var url = '<?php echo base_url() ?>pemindahan/entry/process/update/<?php echo $id_arsip ?>';

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
                   //alert('SUCCESS! Berhasil Edit Data Arsip');
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
                text: 'Berhasil Edit Data Arsip!',
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
                text: 'Gagal Edit Data Arsip, Check Kelengkapan Data!',
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