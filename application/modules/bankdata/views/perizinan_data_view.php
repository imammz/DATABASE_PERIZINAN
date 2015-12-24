<?php $this->load->view('../../includes/header_view'); 

?>

<link rel="stylesheet" href="<?php echo base_url() ?>assets/library/tree/css/screen.css" media="screen" />
<link rel="stylesheet" href="<?php echo base_url() ?>assets/library/tree/css/jquery.treetable.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>assets/library/tree/css/jquery.treetable.theme.default.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>assets/library/gb/greybox.css" />



<!-- end: HEAD -->
<body>
    <!-- start: YOUR CONTENT HERE -->
    <div class="container-fluid container-fullw bg-white" style="min-height: 1900px;">

        <div class="row">

            <div class="col-md-12"> 
                <div class="row">
<!--                    <div class="col-sm-2"> 
                        <a class="btn btn-danger btn-xs" href="<?php echo base_url('index.php/entry/puskesmas/data') ?>">
                            <i class="fa fa-refresh"></i>    Refresh Data
                        </a>
                    </div>-->
                    <div class="col-sm-4"> &nbsp; </div>

                    <div class="col-sm-6">
                        <form method="get" action="<?php echo base_url() ?>index.php/entry/puskesmas/get/">

                            <select class="js-example-basic-single js-states form-control" name="faskes_kode" onchange="this.form.submit()" required>
                            <option value="">-- Cari Surat Izin --</option>
                            
                        </select>
                        </form>

                    </div>
                </div>
                <br/>
               
                <table id="example-advanced">
                    <caption>
                        <a href="#" onclick="jQuery('#example-advanced').treetable('expandAll');
                                return false;">+ Buka Semua Data</a>
                        &nbsp; &nbsp;
                        <a href="#" onclick="jQuery('#example-advanced').treetable('collapseAll');
                                return false;">- Tutup Semua Data</a>
                    </caption>
                    <thead>
                        <tr>
                            <th>Tahun</th>
                            <th>Jumlah Izin</th>
                            <th>#</th>
                            
                        </tr>
                    </thead>
               
                    <?php 

                    
                    $no1 = 1;
                    for($th = 2013;$th<=date('Y');$th++) {
                        
                                 $count2 = $this->db->select('count(id_permohonan) as jml')->where("id_status_permohonan > 12 AND YEAR(tgl_permohonan) = $th")
                            ->get('tbl_t_permohonan')->row_array();
               
                    ?>
                         

                        <tr  data-tt-id='<?php echo $no1 ?>'><td><span class='folder' style="font-size: 18px;"> <strong> 
                                    <?php echo $th; ?></strong> </span></td><td><strong><?php echo $count2['jml'] ?></strong></td><td>-</td></tr>
                        
                   <?php 
                   $jenis_ijin = $this->db->get('tbl_m_nama_ijin')->result_array();
                   $no2 = 1;
                   foreach($jenis_ijin as $row2) {
                       
                        $count3 = $this->db->select('count(id_permohonan) as jml')->where("id_status_permohonan > 12 AND SUBSTR(no_permohonan,1,2) = '".$row2['kode']."' AND YEAR(tgl_permohonan) = $th")
                            ->get('tbl_t_permohonan')->row_array();
                    
                   ?>     
                        
                        <tr data-tt-id='<?php echo $no1.'-'.$no2 ?>' data-tt-parent-id='<?php echo $no1; ?>'><td><span class='folder' style="font-size: 17px;"> <?php echo $row2['nama_ijin'] ?></span></td><td><strong><?php echo $count3['jml'] ?></strong></td><td> <a href="#" class="show-modal btn btn-primary btn-xs" type="button" > <i class="fa fa-plus"></i> STATISTIK</a> </td></tr>
                     
                    <?php 
                    $permohonan = $this->db->where("id_status_permohonan > 12 AND SUBSTR(no_permohonan,1,2) = '".$row2['kode']."' AND YEAR(tgl_permohonan) = $th")
                            ->join('tbl_t_pemohon','tbl_t_pemohon.id_permohonan = tbl_t_permohonan.id_permohonan')->get('tbl_t_permohonan')->result_array();
                    
                   
                    $no3 = 1;
                    foreach($permohonan as $row3) {
                    ?>     
                         <tr data-tt-id='<?php echo $no1.'-'.$no2.'-'.$no3 ?>' data-tt-parent-id='<?php echo $no1.'-'.$no2 ?>'><td><span class='file' style="font-size: 17px;"> <?php echo $row3['no_permohonan'].' a/n '.$row3['nama'] ?> </span></td><td>-</td><td> <a href="http://localhost/DATABASE_PERIZINAN/pdf.pdf" class="show-modal btn btn-primary btn-xs" type="button" > <i class="fa fa-plus"></i> LIHAT DATA</a> </td></tr>

                         
                   <?php $no3++; } ?>     
                   <?php $no2++; } ?>     
                    <?php $no1++; } ?>    
                    
                </table>



            </div>
        </div>


        <!-- end: YOUR CONTENT HERE -->

    </div>





    <script>


        $("#example-advanced").treetable({expandable: true});



// Highlight selected row
        $("#example-advanced tbody").on("mousedown", "tr", function () {
            $(".selected").not(this).removeClass("selected");
            $(this).toggleClass("selected");
        });


        $("#example-advanced .folder").each(function () {
            $(this).parents("#example-advanced tr").droppable({
                accept: ".file, .folder",
                drop: function (e, ui) {
                    var droppedEl = ui.draggable.parents("tr");
                    $("#example-advanced").treetable("move", droppedEl.data("ttId"), $(this).data("ttId"));
                },
                hoverClass: "accept",
                over: function (e, ui) {
                    var droppedEl = ui.draggable.parents("tr");
                    if (this != droppedEl[0] && !$(this).is(".expanded")) {
                        $("#example-advanced").treetable("expandNode", $(this).data("ttId"));
                    }
                }
            });
        });
    </script>
    <!-- end: JavaScript Event Handlers for this page -->
    <!-- end: CLIP-TWO JAVASCRIPTS -->
    
    
    
</body>
</html>


<?php $this->load->view('../../includes/footer_view') ?>


<script>

        function tambahFaskes(NO_KAB) {
            GB_show("Tambah Data Faskes", '<?php echo base_url() ?>index.php/entry/puskesmas/tambahFaskes/' + NO_KAB, 700, 900);
            $('html, body').animate({scrollTop: 0}, 'slow');
        }
</script>