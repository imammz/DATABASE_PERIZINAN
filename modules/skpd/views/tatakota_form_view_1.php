<?php $this->load->view('../../includes/header_view') ?>

<link href="<?php echo PATH_ASSETS ?>vendor/select2/select2.min.css" rel="stylesheet" media="screen">
<div class="box-login nyro-content">
    <form role="form" class="form-horizontal">
        <div id="tabs">

            <div id="tabs-1" class="tabs-content fade in active"> 

                <fieldset>
                    <legend>Data Permohonan</legend>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            Nama Pemohon
                        </label>
                        <div class="col-sm-10">
                            <input disabled="disabled" type="text" placeholder="" value="<?php echo $permohonan['pemohon']['nama'] ?>"  class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                           Nomor
                        </label>
                        <div class="col-sm-10">
                            <input disabled="disabled" type="text" placeholder="" value="<?php echo $permohonan['no_permohonan'] ?>"  class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label"  for="inputPassword3">
                            Nomor KTP
                        </label>
                        <div class="col-sm-10">
                            <input disabled="disabled" type="text" placeholder="" value="<?php echo $permohonan['pemohon']['ktp'] ?>"  class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="inputPassword3">
                            NPWP
                        </label>
                        <div class="col-sm-10">
                            <input disabled="disabled" type="text" placeholder="" value="<?php echo $permohonan['pemohon']['npwp'] ?>"  class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="inputPassword3">
                            Alamat
                        </label>
                        <div class="col-sm-10">
                            <textarea disabled="disabled" name="alamat" cols="80" rows="3"> <?php echo $permohonan['pemohon']['alamat'] ?>   </textarea>
                        </div>
                    </div>




                </fieldset>
                <fieldset>
                    <legend>Data Berkas</legend>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="inputPassword3">
                            No Izin Perinsip
                        </label>
                        <div class="col-sm-4">
                            <input disabled="disabled" type="text" placeholder="" value="<?php echo $permohonan['berkas']['no_izin_prinsip'] ?>"  class="form-control">
                        </div>
                        <label class="col-sm-2 control-label"  for="inputPassword3">
                            Tgl Izin Perinsip
                        </label>
                        <div class="col-sm-4">
                            <input disabled="disabled" type="text" placeholder="" value="<?php echo Tanggal::formatDate($permohonan['berkas']['tgl_izin_prinsip']) ?>" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="inputPassword3">
                            Nomor IPPL
                        </label>
                        <div class="col-sm-4">
                            <input disabled="disabled" type="text" placeholder="" value="<?php echo $permohonan['berkas']['no_ippl'] ?>" class="form-control">
                        </div>
                        <label class="col-sm-2 control-label" for="inputPassword3">
                            Nomor SitePlan
                        </label>
                        <div class="col-sm-4">
                            <input disabled="disabled" type="text" placeholder="" value="<?php echo $permohonan['berkas']['no_rencana_tapak'] ?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="inputPassword3">
                            No IMB Lama <br/><sup>*Jika Perpanjangan, Perluasan, atau Pemutihan</sup>
                        </label>
                        <div class="col-sm-4">
                            <input disabled="disabled" type="text" placeholder="" class="form-control">
                        </div>
                        <label class="col-sm-2 control-label" value="<?php echo $permohonan['berkas']['no_imb_lama'] ?>" for="inputPassword3">
                            No Surat Tanah
                        </label>
                        <div class="col-sm-4">
                            <input disabled="disabled" type="text" placeholder="" value="<?php echo $permohonan['berkas']['no_surat_tanah'] ?>" class="form-control">
                        </div>
                    </div>




                </fieldset>
                <fieldset>
                    <legend>Data IMB</legend>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="inputPassword3">
                            Peruntukan Bangunan
                        </label>
                        <div class="col-sm-4">
                            <select name="id_peruntukan_bangunan">
                               <?php foreach($this->orm->tbl_m_peruntukkan_bangunan() as $row) { ?> 
                                <option value="<?php echo $row['id_peruntukkan_bangunan'] ?>"><?php echo $row['deskripsi'] ?></option>
                               <?php } ?>
                                    
                            </select>
                        </div>
                        <label class="col-sm-2 control-label" for="inputPassword3">
                           Sub Peruntukan
                        </label>
                        <div class="col-sm-4">
                             <select name="id_sub_peruntukkan_bangunan" class="form-control">
                               <?php foreach($this->orm->tbl_m_sub_peruntukkan_bangunan() as $row) { ?> 
                                <option value="<?php echo $row['id_sub_peruntukkan_bangunan'] ?>"><?php echo $row['nm_sub_peruntukkan_bangunan'] ?></option>
                               <?php } ?>
                                    
                            </select>
                        </div>
                    </div> 
                    <div class="form-group">
                        
                        <label class="col-sm-2 control-label" for="inputPassword3">
                            Kelas Jalan
                        </label>
                        <div class="col-sm-4">
                            <select name="">
                               <?php foreach($this->orm->tbl_m_koef_kelas_jalan_imb() as $row) { ?> 
                                <option><?php echo $row['kelas_jalan'] ?></option>
                               <?php } ?>
                                    
                            </select>
                        </div>
                        
                        <label class="col-sm-2 control-label" for="inputPassword3">
                            Lokasi Alamat Bangunan
                        </label>
                        <div class="col-sm-4">
                            <input type="text" placeholder="" name="alamat_bangunan" class="form-control">
                        </div>
                        
                        
                    </div>  

                </fieldset>
                <fieldset>
                    <legend>Kontruksi</legend>
                    <table width="100%" border="0.5">
                        <tr><th style="padding-left: 10px;"> No </th> <th style="padding-left: 10px;"> &nbsp; Kontruksi Bangunan </th> <th> &nbsp;</th> <th style="padding-left: 10px;"> Luas </th><th> &nbsp;</th> <th style="padding-left: 10px;"> Tingkat </th> <th> &nbsp;</th> <th style="padding-left: 10px;"> Jumlah </th> <th> &nbsp;</th> <th style="padding-left: 10px;"> Pengenaan Tarif </th> </tr>

                        <?php for ($i = 1; $i <= 10; $i++) { ?>       
                            <tr>
                                <td> <?php echo $i ?>.</td>
                                <td><input type="text" size="30"/></td>
                                  <td>&nbsp;</td>
                                <td><div class="input-group">
                                        <input type="text" class="form-control">
                                        <span class="input-group-addon">M<sup>2</sup></span>
                                    </div> &nbsp;&nbsp;&nbsp;</td>
                                <td>&nbsp;</td>
                                    <td>
                                        <select>
                                            <option>I</option>
                                            <option>II</option>
                                            <option>III</option>
                                            <option>IV</option>
                                        </select>
                                    </td>
                                      <td>&nbsp;</td>
                                <td><input type="text" size="8"/></td>
                                  <td>&nbsp;</td>
                                <td>
                                    <select class="form-control">
                                        <option> -- Pilih Pengenaan Tarif --</option>
                                        <?php foreach ($this->orm->tbl_m_shdb() as $row) { ?>      
                                            <option> <b><?php echo $row['nama_bangunan'] ?></b> (<?php echo $row['shb'] . ' ' . $row['satuan'] ?>)   </option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                        <?php } ?>   

                    </table>  

                </fieldset>

            </div>


            <div id="tabs-4" class="tabs-content"> 
                <div class="form-group">
                    <div class="col-sm-5">                        
                        <!--                            <button class="btn btn-blue" type="submit">
                                                        Batal
                                                    </button>-->
                        <button class="btn btn-dark-yellow" type="submit">
                            Batal
                        </button>                        
                    </div>                    
                    <div class="col-sm-offset-2 col-sm-5">
                        <div class="pull-right">
                            <a class="btn btn-danger" onclick="return confirm('anda yakin TIDAK MENERBITKAN Rekomendasi untuk <?php echo $permohonan['pemohon']['nama'].' ('.$permohonan['no_permohonan'].')' ?>');" href="<?php echo site_url('skpd/tatakota/tidaklayak/'.$permohonan['id_permohonan']) ?>" >
                                Tidak Layak Terbit
                            </a>
                            <a class="btn btn-blue" onclick="return confirm('anda yakin AKAN MENERBITKAN Rekomendasi untuk <?php echo $permohonan['pemohon']['nama'].' ('.$permohonan['no_permohonan'].')' ?>');" href="<?php echo site_url('skpd/tatakota/layak/'.$permohonan['id_permohonan']) ?>" >
                                Terbitkan Rekomendasi
                            </a>
                        </div>
                    </div>
                </div>

            </div>    

        </div>
    </form>
</div>


<?php $this->load->view('../../includes/footer_view') ?>