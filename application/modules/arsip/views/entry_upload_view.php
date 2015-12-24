

<!-- end: HEAD -->
<!-- start: BODY -->
<body>
    <!-- start: HEADER -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
    
   <script src="<?php echo base_url() ?>assets/plugins/jquery.form.js"></script>
<style>
    form { display: block; margin: 20px auto; background: #eee; border-radius: 10px; padding: 15px }
    #progress { position:relative; width:400px; border: 1px solid #ddd; padding: 1px; border-radius: 3px; }
    #bar { background-color: #B4F5B4; width:0%; height:20px; border-radius: 3px; }
    #percent { position:absolute; display:inline-block; top:3px; left:48%; }
</style>
    
    <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
    <!-- end: HEADER -->
    <!-- start: MAIN CONTAINER -->
    
        <div style="background-color: #ffffff">

         
            

                       <div class="modal-body">
                                
                           
 <form id="myForm" action="<?php echo base_url() ?>pemindahan/entry/upload_process/<?php echo $id_arsip ?>" method="post" enctype="multipart/form-data">
    <div>
        Tipe File Lampiran :
    <select id="attachment_type" name="attachment_type" class="form-control">
                                                                             <option value="" selected>-- Pilih Tipe File Lampiran --</option>
                                                                            <?php foreach ($attachment_type as $row) { ?>

                                                                                <option value="<?php echo $row['id_file_type'] ?>"><?php echo $row['file_type'] ?> - ( <?php echo $row['keterangan'] ?> )</option>

                                                                            <?php } ?>

                                                                        </select>
    </div>
     <div><hr/></div>
    <div>   <input type="file" size="60" name="file_arsip[]" class="file-input" multiple> </div>
    <div style="text-align: right"> <input type="submit" value="Upload" class="btn btn-default"> </div>
 </form>
 
 
 <div id="progress">
        <div id="bar"></div>
        <div id="percent">0%</div >
</div>
<br/>
    
<div id="message"></div>
                                    
                        </div>
                                   

                



        </div>
        <!-- end: PAGE -->
   
   

    <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
    <script>
$(document).ready(function () {

	var options = { 
    beforeSend: function() 
    {
    	$("#progress").show();
    	//clear everything
    	$("#bar").width('0%');
    	$("#message").html("");
		$("#percent").html("0%");
    },
    uploadProgress: function(event, position, total, percentComplete) 
    {
    	$("#bar").width(percentComplete+'%');
    	$("#percent").html(percentComplete+'%');

    
    },
    success: function() 
    {
        $("#bar").width('100%');
    	$("#percent").html('100%');

    },
	complete: function(response) 
	{
		$("#message").html("<font color='green'>"+response.responseText+"</font>");
	},
	error: function()
	{
		$("#message").html("<font color='red'> ERROR: unable to upload files</font>");

	}
     
}; 

     $("#myForm").ajaxForm(options);

});

</script>
    
</body>
<!-- end: BODY -->

<!-- Mirrored from www.cliptheme.com/clip-one/ by HTTrack Website Copier/3.x [XR&CO'2013], Sat, 16 Nov 2013 08:37:43 GMT -->
</html>