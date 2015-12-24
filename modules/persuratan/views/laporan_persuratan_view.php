<?php $this->load->view('../../includes/header_view'); ?>
<div id="app">
    <!-- sidebar -->
    <?php $this->load->view('../../includes/sidebar_view'); ?>
    <?php $this->load->view('../../includes/navbar_header_view') ?>
    <div class="main-content" >
        <div class="wrap-content container" id="container">
            <!-- start: PAGE TITLE -->
            <section id="page-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h1 class="mainTitle">Laporan Persuratan</h1>
                    </div>
                </div>
            </section>
            <div class="container-fluid container-fullw bg-white">
                <ol class="breadcrumb">
                    <li><a href="#">Persuratan</a></li>
                    <li><a href="#">Laporan Persuratan</a></li>
                </ol>
                <fieldset>
                    <legend>Data Persuratan</legend>
                    <form role="form" class="form-horizontal" method="post" action="<?php echo site_url('laporan_persuratan/proccess') ?>">
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="inputEmail3">
                                Jenis Surat
                            </label>
                            <div class="col-sm-10">
                                <select class="cs-select cs-skin-elastic">
                                    <option value="" disabled selected>Pilih Jenis Surat</option>
                                    <?php foreach ($this->db->get('dp_jenis_surat')->result_array() as $row) { ?>
                                        <option value="<?php echo $row['id_jenis_surat'] ?>"> <?php echo $row['jenis_surat'] ?></option> 
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="inputPassword3">
                                Nomor Surat
                            </label>
                            <div class="col-sm-10">
                                <input type="text" name="nomor" autocomplete="off" list="list_nomor" placeholder="Nomor Surat" class="form-control">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="inputPassword3">
                                Dari
                            </label>
                            <div class="col-sm-10">
                                <input type="text" name="dari" autocomplete="off" list="list_dari" placeholder="Dari"  class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="inputPassword3">
                                Kepada
                            </label>
                            <div class="col-sm-10">
                                <input type="text" name="kepada" autocomplete="off" list="list_kepada" placeholder="Kepada" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="inputPassword3">
                                Perihal
                            </label>
                            <div class="col-sm-10">
                                <input type="text" name="perihal" autocomplete="off" list="list_perihal" placeholder="Perihal" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 text-right">
                                <button class="btn btn-blue pull-right" type="submit">
                                    Cari
                                </button>
                            </div>
                        </div>

                        <datalist id="list_nomor">
                            <?php foreach ($this->db->group_by('nomor')->get('dp_surat')->result_array() as $row) { ?>
                                <option value="<?php echo $row['nomor'] ?>">
                                <?php } ?>                          
                        </datalist>
                        <datalist id="list_dari">
                            <?php foreach ($this->db->group_by('dari')->get('dp_surat')->result_array() as $row) { 
                                $dari = explode('#', $row['dari']);
                                if(isset($dari[1])) { $dari = $dari[1]; }
                                else { $dari = $row['dari']; }
                                ?>
                                <option value="<?php echo $dari ?>">
                                <?php } ?>                          
                        </datalist>
                         
                        <datalist id="list_kepada">
                            <?php foreach ($this->db->group_by('kepada')->get('dp_surat')->result_array() as $row) {
                                 $kepada = explode('#', $row['kepada']);
                                if(isset($kepada[1])) { $kepada = $kepada[1]; }
                                else { $kepada = $row['kepada']; }
                                ?>
                                <option value="<?php echo $kepada ?>">
                                <?php } ?>                          
                        </datalist>
                        <datalist id="list_perihal">
                            <?php foreach ($this->db->group_by('perihal')->get('dp_surat')->result_array() as $row) { ?>
                                <option value="<?php echo $row['perihal'] ?>">
                                <?php } ?>                          
                        </datalist>
                        
                        
                         

                    </form>
                    <input class="form-control datepicker" type="text">
                </fieldset>
            </div>
            <!-- end: PAGE TITLE -->
            <!-- start: YOUR CONTENT HERE -->
            <!-- end: YOUR CONTENT HERE -->
        </div>
    </div>
</div>
<!-- start: FOOTER -->
<?php $this->load->view('../../includes/footer_view') ?>
<!-- end: FOOTER -->
