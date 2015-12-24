<?php 
$persuratan_model = new Persuratan_model();

$this->load->view('../../includes/header_view') ?>



<link href="<?php echo PATH_ASSETS ?>vendor/select2/select2.min.css" rel="stylesheet" media="screen">

  <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" />
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
<body onload="init();">
<div class="box-login nyro-content">
    <form role="form" class="form-horizontal" method="post"  enctype="multipart/form-data">
        <div id="tabs">

             <div id="tabs-4" class="tabs-content"> 
             <?php if($read_only==false) { ?>
                <div class="form-group">
                    <div class="col-sm-5">                        
                        <a class="show-modal btn btn-danger" onclick="return confirm('Apakah Anda Yakin Akan Menghapus Surat ini  (<?php echo $surat['perihal'];?>) ?')" href="<?php echo site_url('persuratan/surat_keluar/hapus/'.$surat['id_surat']) ?>"><i class="fa fa-trash"></i> Hapus</a> 
                                             
                    </div>                    
                    <div class="col-sm-7">
                        <div class="pull-right">

                            <a class="show-modal btn btn-warning" href="<?php echo site_url('persuratan/surat_keluar/edit/'.$surat['id_surat']) ?>"><i class="fa fa-pencil-square"></i> Edit </a>
                            &nbsp;
                             <input onclick="closeModal();" class="btn btn-dark-blue" type="button" value="Tutup"/>
                        </div>
                    </div>
                </div>
                <?php } ?>  
             </div>
            
            
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