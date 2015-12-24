<?php
$persuratan_model = new Persuratan_model();

$this->load->view('../../includes/header_view')
?>



<link href="<?php echo PATH_ASSETS ?>vendor/select2/select2.min.css" rel="stylesheet" media="screen">

<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" />
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
<body onload="init();">
    <div class="box-login nyro-content">
        <form role="form" class="form-horizontal" method="post" action="<?php echo site_url('persuratan/surat_keluar/edit_proccess/'.$surat['id_surat']); ?>" enctype="multipart/form-data">
            <div id="tabs">

                <div id="tabs-4" class="tabs-content"> 
                    <div class="form-group">
                        <div class="col-sm-5">                        
                            <!--                            <button class="btn btn-blue" type="submit">
                                                            Batal
                                                        </button>-->
                            <a href="#" class="btn btn-dark-blue" onclick="closeModal();">
                                Batal
                            </a>                        
                        </div>                    
                        <div class="col-sm-offset-2 col-sm-5">
                            <div class="pull-right">
    <!--                            <a class="btn btn-danger" onclick="return confirm('anda yakin TIDAK MENERBITKAN Rekomendasi untuk <?php echo $permohonan['pemohon']['nama'] . ' (' . $permohonan['no_permohonan'] . ')' ?>');" href="<?php echo site_url('skpd/tatakota/tidaklayak/' . $permohonan['id_permohonan']) ?>" >
                                    Simpan Data Perubahan
                                </a>-->
                                <input class="btn btn-blue" type="submit" value="Simpan Data Perubahan"/>
                            </div>
                        </div>
                    </div>

                </div>   
                
                <div id="tabs-1" class="tabs-content fade in active"> 

                    <fieldset>
                        <legend>Form Surat Masuk</legend>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">
                                Nomor Surat
                            </label>
                            <div class="col-sm-10">
                                <input  type="text" placeholder="Nomor Surat" name="nomor" value="<?php echo $surat['nomor'] ?>"  class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">
                                Tanggal
                            </label>
                            <div class="col-sm-10">
                                <input  type="text" placeholder="Tanggal" name="tanggal" value="<?php echo Tanggal::fieldDate($surat['tanggal']) ?>"  class="form-control datepicker">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">
                                Dari (Penandatangan)
                            </label>
                            <div class="col-sm-10">
                                <select class="form-control" name="dari" id="dari">
                                    <?php
                                    foreach ($persuratan_model->_loadPejabatBPPT() as $row) {
                                        $selected = ($row['id_pejabat'] == $surat['id_pejabat_kepada']) ? 'selected' : '';
                                        ?>
                                        <option <?php echo $selected; ?> value="<?php echo $row['id_pejabat'] . '#' . $row['nama_pejabat'] ?>"> 
                                            <?php echo $row['nama_pejabat'] . ' (' . $row['jabatan'] . ')' ?>
                                        </option>
                                        <?php
                                    }
                                    ?>

                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">
                                Kepada
                            </label>
                            <div class="col-sm-10">
                                <input  type="text" placeholder="Kepada" name="kepada" value="<?php echo $surat['kepada'] ?>" class="form-control">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">
                                Perihal Surat
                            </label>
                            <div class="col-sm-10">
                                <input  type="text" placeholder="Perihal" name="perihal" value="<?php echo $surat['perihal'] ?>"  class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">
                                Isi / Ringkasan Surat
                            </label>
                            <div class="col-sm-10">
                                <textarea class="ckeditor form-control"  name="isi" cols="80" rows="5" value="<?php echo $surat['isi'] ?>">  <?php echo $surat['isi'] ?>  </textarea>
                            </div>
                        </div>

                    </fieldset>

                    <fieldset>
                        <legend>Hasil Scan Surat Masuk</legend>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">
                                <span id="multipleFileLabel">Upload Baru </span>
                            </label>
                            <div class="col-sm-10">
                                <input  type="file" placeholder="file" name="scann[]" class="form-control" multiple="multiple">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="text-right text-danger">))*Untuk Menghapus File Hasil Scann Lama, Klik Checklist HAPUS</div>
                            <?php
                            $no = 1;
                            foreach ($surat['lampiran'] as $row) {
                                ?>
                                <div class="col-sm-10">

                                    <img src="<?php echo base_url('uploads/' . $row['path_file']) ?>" class="img-thumbnail"  />

                                </div>
                                <div class="col-sm-2 text-danger">
                                    <div class="checkbox clip-check check-danger checkbox-inline">
                                        <input type="checkbox" name="hapus_scann[]" id="hasil_scann_<?php echo $no?>"
                                           value="<?php echo $row['id_lampiran_surat'].'#'.$row['path_file'] ?>"/>
                                        <label for="hasil_scann_<?php echo $no?>">
                                            Hal-<?php echo $no ?> HAPUS
                                        </label>
                                    </div>

                                      </div>

    <?php $no++;
} ?>
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