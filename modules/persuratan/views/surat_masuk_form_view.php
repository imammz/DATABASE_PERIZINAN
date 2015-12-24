<?php 
$persuratan_model = new Persuratan_model();

$this->load->view('../../includes/header_view') ?>



<link href="<?php echo PATH_ASSETS ?>vendor/select2/select2.min.css" rel="stylesheet" media="screen">

  <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" />
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
<body onload="init();">
<div class="box-login nyro-content">
    <form role="form" class="form-horizontal" method="post" action="<?php echo site_url('persuratan/surat_masuk/proccess/'); ?>" enctype="multipart/form-data">
        <div id="tabs">

            <div id="tabs-1" class="tabs-content fade in active"> 

                <fieldset>
                    <legend>Form Surat Masuk</legend>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            Nomor Surat
                        </label>
                        <div class="col-sm-10">
                            <input  type="text"  placeholder="Nomor Surat" name="nomor"  class="form-control symbol required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            Tanggal
                        </label>
                        <div class="col-sm-10">
                            <input  type="text" placeholder="Tanggal" name="tanggal" value="<?php echo date('d-m-Y') ?>"  class="form-control datepicker">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                           Dari
                        </label>
                        <div class="col-sm-10">
                            <input  type="text" placeholder="Dari" name="dari" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                          Kepada
                        </label>
                        <div class="col-sm-10">
                            <select class="form-control" name="kepada" id="kepada">
                               <?php 
                              
                               foreach($persuratan_model->_loadPejabatBPPT() as $row) { 
                                   ?>
                                <option value="<?php echo $row['id_pejabat'].'#'.$row['nama_pejabat'] ?>"> 
                                    <?php echo $row['nama_pejabat'].' ('.$row['jabatan'].')' ?>
                                </option>
                                   <?php
                               }
                               ?>
                            
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            Perihal Surat
                        </label>
                        <div class="col-sm-10">
                            <input  type="text" placeholder="Perihal" name="perihal"  class="form-control">
                        </div>
                    </div>
                  
                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            Isi / Ringkasan Surat
                        </label>
                        <div class="col-sm-10">
                            <textarea class="ckeditor form-control"  name="isi" cols="80" rows="5">   </textarea>
                        </div>
                    </div>
                    
                </fieldset>
                
                <fieldset>
                    <legend>Hasil Scan Surat Masuk</legend>
                 <div class="form-group">
                        <label class="col-sm-2 control-label">
                         <span id="multipleFileLabel">Upload </span>
                        </label>
                        <div class="col-sm-10">
                            <input  type="file" placeholder="file" name="scann[]" class="form-control" multiple="multiple">
                        </div>
                    </div>
                </fieldset>  

            </div>


            <div id="tabs-4" class="tabs-content"> 
                <div class="form-group">
                    <div class="col-sm-5">                        
                        <!--                            <button class="btn btn-blue" type="submit">
                                                        Batal
                                                    </button>-->
                        <a class="btn btn-dark-blue" href="#" onclick="closeModal();">
                            Batal
                        </a>                        
                    </div>                    
                    <div class="col-sm-offset-2 col-sm-5">
                        <div class="pull-right">
<!--                            <a class="btn btn-danger" onclick="return confirm('anda yakin TIDAK MENERBITKAN Rekomendasi untuk <?php echo $permohonan['pemohon']['nama'].' ('.$permohonan['no_permohonan'].')' ?>');" href="<?php echo site_url('skpd/tatakota/tidaklayak/'.$permohonan['id_permohonan']) ?>" >
                                Simpan Data Perubahan
                            </a>-->
                            <input class="btn btn-blue" type="submit" value="Simpan Data"/>
                        </div>
                    </div>
                </div>

            </div>    

        </div>
    </form>
</div>
</body>


<?php $this->load->view('../../includes/footer_view') ?>

<script>
    jQuery(document).ready(function() {
      TextEditor.init();
      
    });
</script>