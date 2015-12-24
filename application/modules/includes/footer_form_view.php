<footer>
    <div class="footer-inner">
        <div class="pull-left">
            &copy; <span class="current-year"></span><span class="text-bold text-uppercase">BPPT Kota Bekasi</span>. <span>All rights reserved</span>
        </div>
    </div>
</footer>

<!-- start: MAIN JAVASCRIPTS -->
<script src="<?php echo PATH_ASSETS ?>vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo PATH_ASSETS ?>vendor/modernizr/modernizr.js"></script>
<script src="<?php echo PATH_ASSETS ?>vendor/jquery-cookie/jquery.cookie.js"></script>
<script src="<?php echo PATH_ASSETS ?>vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="<?php echo PATH_ASSETS ?>vendor/switchery/switchery.min.js"></script>
<!-- end: MAIN JAVASCRIPTS -->
<script src="<?php echo PATH_ASSETS; ?>vendor/maskedinput/jquery.maskedinput.min.js"></script>
<script src="<?php echo PATH_ASSETS; ?>vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
<script src="<?php echo PATH_ASSETS; ?>vendor/autosize/autosize.min.js"></script>
<script src="<?php echo PATH_ASSETS; ?>vendor/selectFx/classie.js"></script>
<script src="<?php echo PATH_ASSETS; ?>vendor/selectFx/selectFx.js"></script>
<script src="<?php echo PATH_ASSETS; ?>vendor/select2/select2.min.js"></script>
<script src="<?php echo PATH_ASSETS; ?>vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="<?php echo PATH_ASSETS; ?>vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
<script src="<?php echo PATH_ASSETS; ?>assets/js/jquery.treetable.js"></script>
<script src="<?php echo PATH_ASSETS; ?>assets/js/jquery.nyroModal.custom.min.js"></script>
<script src="<?php echo PATH_ASSETS; ?>vendor/select2/select2.min.js"></script>
<script src="<?php echo PATH_ASSETS; ?>vendor/DataTables/jquery.dataTables.min.js"></script>
<!-- start: CLIP-TWO JAVASCRIPTS -->
<script src="<?php echo PATH_ASSETS ?>assets/js/main.js"></script>
<!-- start: JavaScript Event Handlers for this page -->
<script src="<?php echo PATH_ASSETS; ?>assets/js/form-elements.js"></script>
	<script src="<?php echo PATH_ASSETS; ?>assets/js/table-data.js"></script>
<script>
    jQuery(document).ready(function() {
        Main.init();
        FormElements.init();
    });
</script>
<script type="text/javascript">
    $(function() {
        $('#tabs').tabs();
        $("#example-advanced").treetable({ expandable: true });

        // Highlight selected row
        $("#example-advanced tbody").on("mousedown", "tr", function() {
            $(".selected").not(this).removeClass("selected");
            $(this).toggleClass("selected");
        });

      
    })
</script>

 <script type="text/javascript">
//  $('select').select2();
</script>

<!-- end: JavaScript Event Handlers for this page -->
<!-- end: CLIP-TWO JAVASCRIPTS -->
</body>
</html>
