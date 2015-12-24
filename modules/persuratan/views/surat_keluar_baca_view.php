<?php 
$persuratan_model = new Persuratan_model();

$this->load->view('../../includes/header_view') ?>



<link href="<?php echo PATH_ASSETS ?>vendor/select2/select2.min.css" rel="stylesheet" media="screen">

  <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" />
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
<body onload="init();">
<div class="box-login nyro-content">
    <form role="form" class="form-horizontal" method="post" action="<?php echo site_url('persuratan/surat_keluar/proccess/'); ?>" enctype="multipart/form-data">
        <div id="tabs">

            <div id="tabs-1" class="tabs-content fade in active"> 

                <fieldset>
                    <legend>Surat Keluar</legend>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            Nomor Surat
                        </label>
                        <div class="col-sm-10">
                            <strong>   <?php echo $surat['nomor'] ?> </strong>
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            Tanggal
                        </label>
                        <div class="col-sm-10">
                            <strong>   <?php echo Tanggal::formatDate($surat['tanggal']) ?> </strong>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                           Dari
                        </label>
                        <div class="col-sm-10">
                              <strong>   <?php echo $surat['dari'] ?> </strong>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                          Kepada
                        </label>
                        <div class="col-sm-10">
                              <strong>   <?php echo $surat['kepada'] ?> </strong>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            Perihal Surat
                        </label>
                        <div class="col-sm-10">
                            <strong>   <?php echo $surat['perihal'] ?> </strong>
                        </div>
                    </div>
                  
                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            Isi / Ringkasan Surat
                        </label>
                        <div class="col-sm-10">
                            <p class="text-justify">   <strong>   <?php echo $surat['isi'] ?> </strong> </p>
                        </div>
                    </div>
                    
                </fieldset>
                
                <fieldset>
                    <legend>Hasil Scan Surat Keluar</legend>
                 <div class="form-group">
                       
                     <?php foreach($surat['lampiran'] as $row) { ?>
                        <div class="col-sm-12">
                           
                            <img src="<?php echo base_url('uploads/'.$row['path_file']) ?>" class="img-thumbnail"  />
                            
                        </div>
                     <?php } ?>
                    </div>
                </fieldset>  

            </div>


            <div id="tabs-4" class="tabs-content"> 
                <div class="form-group">
                    <div class="col-sm-5">                        
                        <!--                            <button class="btn btn-blue" type="submit">
                                                        Batal
                                                    </button>-->
                                             
                    </div>                    
                    <div class="col-sm-offset-2 col-sm-5">
                        <div class="pull-right">
<!--                            <a class="btn btn-danger" onclick="return confirm('anda yakin TIDAK MENERBITKAN Rekomendasi untuk <?php echo $permohonan['pemohon']['nama'].' ('.$permohonan['no_permohonan'].')' ?>');" href="<?php echo site_url('skpd/tatakota/tidaklayak/'.$permohonan['id_permohonan']) ?>" >
                                Simpan Data Perubahan
                            </a>-->
                            <input class="btn btn-dark-blue" type="submit" value="Tutup"/>
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
    function supportMultiple() {
        //do I support input type=file/multiple
        var el = document.createElement("input");

        return ("multiple" in el);
    }

    function init() {
        if(supportMultiple()) {
            document.querySelector("#multipleFileLabel").setAttribute("style","");
        }
    }
</script>