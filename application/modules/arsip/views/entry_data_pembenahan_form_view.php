 <div id="modalAddItem" class="modal fade" tabindex="-1" data-width="1250" style="display: none;">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                            &times;
                                        </button>
                                        <h4 class="modal-title">Form Entry</h4>
                                    </div>
                                    <div class="modal-body">
                                        
                                         <form role="form" id="form-entry" class="form-horizontal" method="POST" action="<?php echo base_url() ?>pemindahan/entrypembenahan/process/insert" enctype="multipart/form-data">
                                               
                                        <div class="row">
                                            <div class="col-md-12">
                                                	<div class="tabbable">
										<ul class="nav nav-tabs tab-bricky">
											<li class="active">
												<a data-toggle="tab" href="#tab1">
												 <i class="green clip-stack"></i> Data Arsip
												</a>
											</li>
											
                                                                                        <li>
														<a data-toggle="tab" href="#tab2">
														   <i class="fa fa-archive"></i> Lokasi Simpan Arsip
														</a>
														
													</li>
										</ul>
                            <div class="tab-content">
											<div id="tab1" class="tab-pane active">                    
                                                <p>
                                                    <table width="100%">
                                                        <tr>
                                                            <td valign="top">
                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label" for="kode_klasifikasi">Kode Klasifikasi</label>
                                                                    <div class="col-sm-9">
                                                                        <select id="kode_klasifikasi" name="kode_klasifikasi" class="form-control search-select">
                                                                             <option value="" selected>-- Pilih Kode Klasifikasi --</option>
                                                                            <?php foreach ($klasifikasi as $row) { ?>

                                                                                <option value="<?php echo $row['kode_klasifikasi'] ?>"><?php echo $row['kode_klasifikasi'] ?> - <?php echo $row['nama_klasifikasi'] ?></option>

                                                                            <?php } ?>

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                               <div class="form-group">
                                                                    <label class="col-sm-3 control-label" for="nomor_definitif">Nomor Definitif Arsip <span class="symbol required"></span> </label>
                                                                    <div class="col-sm-2">
                                                                        <input type="text" placeholder="Nomor Definitif Arsip" id="nomor_definitif" name="nomor_definitif"  class="form-control" number="true" requered="true">
                                                                    </div>
                                                                </div> 
                                                                 <div class="form-group">
                                                                    <label class="col-sm-3 control-label" for="kurun_waktu_awal">Kurun Waktu Awal Arsip <span class="symbol required"></span> </label>
                                                                    <div class="col-sm-1">
                                                                        <input type="text" placeholder="Kurun Waktu Awal Arsip" id="kurun_waktu_awal" name="kurun_waktu_awal" value="<?php echo date("Y"); ?>" class="form-control" number="true" requered="true">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label" for="kode_jra">Jadwal Retensi Arsip (JRA)</label>
                                                                    <div class="col-sm-9">
                                                                        <select id="kode_jra" name="kode_jra" class="form-control search-select" onchange="getJRA();">
                                                                            <option value="" selected>-- Pilih JRA --</option>
                                                                            <?php foreach ($jra as $row) { ?>

                                                                                <option value="<?php echo $row['kode_jra'] ?>"><?php echo $row['kode_jra'] ?> - <?php echo substr($row['jenis_jra'], 0, 150) . '... ' ?></option>

                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label" for="jra_aktif">Aktif</label>
                                                                    <div class="col-sm-3">
                                                                        <input type="text" id="jra_aktif" name="jra_aktif" placeholder="Text Field"  class="col-sm-4 form-control" disabled="disabled">
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

                                                                                <option value="<?php echo $row['kode_unit_kerja'] ?>"><?php echo $row['kode_unit_kerja'] ?> - <?php echo $row['nama_unit_kerja'] ?></option>

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

                                                                                <option value="<?php echo $row['tingkat_perkembangan'] ?>"> <?php echo $row['tingkat_perkembangan'] ?> </option>

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

                                                                                <option value="<?php echo $row['kondisi_fisik'] ?>"> <?php echo $row['kondisi_fisik'] ?> </option>

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

                                                                                <option value="<?php echo $row['media_simpan'] ?>"> <?php echo $row['media_simpan'] ?> - <?php echo $row['keterangan'] ?> </option>

                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label" for="jumlah_berkas">Jumlah Berkas <span class="symbol required"></span> </label>
                                                                    <div class="col-sm-2">
                                                                        <input type="text" placeholder="Jumlah Berkas" id="jumlah_berkas" name="jumlah_berkas" class="form-control" number="true" requered="true">
                                                                    </div>
                                                                </div>


                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label" for="uraian">Uraian</label>
                                                                    <div class="col-sm-9">

                                                                        <textarea class="autosize form-control" id="uraian" name="uraian" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 69px;"></textarea>
                                                                    </div>
                                                                </div>



                                                            </td>



                                                        </tr>
                                                    </table>
                                                
                                                </p>
                            <p style="text-align: right">
															<a href="#tab2" class="btn btn-bricky show-tab">
																Pilih Lokasi Simpan
															</a>
														</p>
                                                                                        
                                                                                        </div>
                                
                                <div class="tab-pane" id="tab2">
														<p>
								<div class="form-group">
                                                                    <label class="col-sm-3 control-label" for="nomor_depo">Nomor Depo</label>
                                                                    <div class="col-sm-5">
                                                                    <select id="nomor_depo" name="nomor_depo" class="form-control " onchange="changeDepo()">  <!--  for search select -->
                                                                            <option value="" selected>-- Pilih Lokasi Depo --</option>
                                                                            <?php foreach ($depo as $row) { ?>

                                                                                <option value="<?php echo $row['nomor_depo'] ?>"> <?php echo $row['nomor_depo'] ?> - <?php echo $row['nama_depo'] ?> </option>

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
                                                                                                                
                                                                                                                <div class="modal-footer">
                                        <button type="button" data-dismiss="modal" class="btn btn-light-grey">
                                            Close
                                        </button>
                                         <button type="button" class="btn btn-blue" onclick="processSubmitForm();">
                                            Save Changes
                                        </button>
                                    
                                    </div>
														
													</div>
                                
                           
                            
                            </div>
                                                        </div>              
                                            </div>
                                        </div>
                                             </form>
                                    </div>
                                    
                                </div>