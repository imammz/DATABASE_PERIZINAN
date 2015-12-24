<?php
$persuratan_model = new Persuratan_model();

$this->load->view('../../includes/header_view')
?>



<link href="<?php echo PATH_ASSETS ?>vendor/select2/select2.min.css" rel="stylesheet" media="screen">

<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" />
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
<body>
    <div class="box-login nyro-content">
        <form  class="form-horizontal" method="post" action="<?php echo site_url('persuratan/surat_masuk/disposisi_proses/'.$surat['id_surat']) ?>" >
            <div id="tabs">

                <div id="tabs-5" class="tabs-content"> 
                    <div class="form-group">
                        <div class="col-sm-5">                        
                            <input onclick="closeModal();" class="btn btn-dark-blue" type="button" value="Tutup"/>                       
                        </div>                    
                        <div class="col-sm-7">
                            <div class="pull-right">

                                <button type="submit" class="show-modal btn btn-warning"><i class="fa fa-pencil-square"></i> Proses </button>
                                &nbsp;

                            </div>
                        </div>
                    </div>

                </div> 

                <div id="tabs-1" class="tabs-content fade in active"> 

                    <fieldset>
                        <legend>Surat Masuk</legend>

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
                        <legend>Form Disposisi</legend>
                        <div class="form-group">

                            <div class="col-sm-4">

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">
                                        Sifat
                                    </label>
                                    <div class="col-sm-10">

                                        <select class="form-control" name="id_sifat_disposisi">   
                                            <?php
                                            $sifat = $this->db->get('dp_m_sifat_disposisi')->result_array();

                                            foreach ($sifat as $row) {
                                                ?>

                                                <option value="<?php echo $row['id_sifat_disposisi'] ?>">
                                                    <?php echo $row['sifat'] ?>
                                                </option>

                                                <?php
                                            }
                                            ?>
                                        </select>  
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">
                                        Nomor Disposisi
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" placeholder="Nomor Disposisi" name="nomor_disposisi" value=""  form-control"/>
                                        
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">
                                        Tanggal Disposisi
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" name="tanggal_disposisi" value="<?php echo date('d-m-Y')?>" class="datepicker form-control"/>
                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">
                                        Isi Disposisi
                                    </label>
                                    <div class="col-sm-10">
                                        <textarea name="isi_disposisi" rows="7" class="form-control">  </textarea>
                                        
                                    </div>
                                </div>


                            </div>

                            <div class="col-sm-6">

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">
                                        Disposisi Kepada
                                    </label>
                                    <div class="col-sm-10">

                                        <?php
                                        
                                        if(isset($_SESSION['user']['id_pejabat'])) {
                                        $level = $persuratan_model->_getLevelPejabatById($_SESSION['user']['id_pejabat']);
                                        $disposisi_kepada = $this->db->where('id_pejabat != "' . $_SESSION['user']['id_pejabat'].'" AND level > '.$level)->get('dp_pejabat')->result_array();
                                        $no = 1;
                                        foreach ($disposisi_kepada as $row) {
                                            ?>

                                            <div class="col-sm-12 checkbox clip-check check-primary checkbox-inline text-bold">
                                                <input type="checkbox" name="id_pejabat_kepada[]" id="id_pejabat_kepada_<?php echo $no ?>"
                                                       value="<?php echo $row['id_pejabat'] ?>"/>
                                                <label for="id_pejabat_kepada_<?php echo $no ?>">
                                                    <?php echo $row['nama_pejabat'].' <br/> ('.$row['jabatan'].')' ?>
                                                </label>
                                            </div>

                                            <?php
                                            $no++;
                                        }
                                        
                                        }
                                        ?>
                                        </select>  
                                    </div>
                                </div>

                            </div>


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
        if (supportMultiple()) {
            document.querySelector("#multipleFileLabel").setAttribute("style", "");
        }
    }
</script>