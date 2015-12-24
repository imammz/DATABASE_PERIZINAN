<?php 
$persuratan_model = new Persuratan_model();

 ?>



<body onload="init();">
<div class="box-login nyro-content">
    <form role="form" class="form-horizontal" method="post" action="<?php echo site_url('persuratan/surat_keluar/proccess/'); ?>" enctype="multipart/form-data"
          data-toggle="validator">
        <div id="tabs2">

            <ul class="nav-tabs btn-group">
                <li class="btn btn-default"><a href="#tabs-1">Form </a></li>
                <li class="btn btn-default"><a href="#tabs-4">Hasil Scan</a></li>
            </ul>
            
            <div id="tabs-1" class="tabs-content fade in active"> 

                <fieldset>
                    <legend>Form Surat Keluar</legend>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            Nomor Surat 
                        </label>
                        <div class="col-sm-10">
                            <input  type="text" placeholder="Nomor Surat" name="nomor"  class="form-control" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            Tanggal
                        </label>
                        <div class="col-sm-10">
                            <input  type="text" placeholder="Tanggal" name="tanggal" value="<?php echo date('d-m-Y') ?>"  class="form-control datepicker" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                           Kepada
                        </label>
                        <div class="col-sm-10">
                            <input  type="text" placeholder="Kepada" name="kepada" class="form-control">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                          Dari (Penandatangan)
                        </label>
                        <div class="col-sm-10">
                            <select class="js-example-basic-single js-states form-control" name="dari" id="dari">
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
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            Perihal Surat
                        </label>
                        <div class="col-sm-10">
                            <input  type="text" placeholder="Perihal" name="perihal"  class="form-control">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                  
                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            Isi / Ringkasan Surat
                        </label>
                        <div class="col-sm-10">
                            <textarea class="ckeditor form-control"  name="isi" cols="80" rows="5">   </textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    
                </fieldset>
                
                

            </div>


            <div id="tabs-4" class="tabs-content"> 
                
                <fieldset>
                    <legend>Hasil Scan Surat Keluar</legend>
                 <div class="form-group">
                        <label class="col-sm-2 control-label">
                         <span id="multipleFileLabel">Upload </span>
                        </label>
                        <div class="col-sm-10">
                            <input  type="file" placeholder="file" name="scann[]" class="form-control" multiple="multiple">
                        </div>
                    </div>
                </fieldset>  
                
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




