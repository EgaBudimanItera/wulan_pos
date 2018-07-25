</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
        <div id="footer">
            <?php echo date("Y"); ?> &copy; .
            <div class="span pull-right">
                <span class="go-top"><i class="icon-arrow-up"></i></span>
            </div>
        </div>
        <!-- END FOOTER -->
        <!-- BEGIN JAVASCRIPTS -->
        <!-- Load javascripts at bottom, this will reduce page load time -->
        <script src="<?php echo base_url() ?>assets/js/jquery-1.8.3.min.js"></script>
        <script src="<?php echo base_url() ?>assets/assets/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>assets/assets/jquery-slimscroll/jquery-ui-1.9.2.custom.min.js"></script>
        <script src="<?php echo base_url() ?>assets/assets/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="<?php echo base_url() ?>assets/assets/fullcalendar/fullcalendar/fullcalendar.min.js"></script>
        <script src="<?php echo base_url() ?>assets/assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/jquery.blockui.js"></script>
        <script src="<?php echo base_url() ?>assets/js/jquery.cookie.js"></script>
        <!-- ie8 fixes -->
        <!--[if lt IE 9]>
        <script src="js/excanvas.js"></script>
        <script src="js/respond.js"></script>
        <![endif]-->
        <script src="<?php echo base_url() ?>assets/assets/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>assets/assets/jquery-knob/js/jquery.knob.js"></script>
        

        <script src="<?php echo base_url() ?>assets/js/jquery.peity.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/assets/uniform/jquery.uniform.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/assets/data-tables/jquery.dataTables.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/assets/data-tables/DT_bootstrap.js"></script>

        <script src="<?php echo base_url() ?>assets/js/scripts.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/assets/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/assets/uniform/jquery.uniform.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/scripts.js"></script>
        <script src="<?php echo base_url() ?>assets/js/ui-jqueryui.js"></script>
        <script>
          jQuery(document).ready(function() {       
             // initiate layout and plugins
             App.init();
             UIJQueryUI.init();
          });
        </script>
        <!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->

</html>
<?php
  if (!empty($script))$this->load->view($script);
?>
<script type="text/javascript">
  $(document).ready(function(){
      
      $("#info-alert").fadeTo(2000,50).slideUp(50,function(){
          $("#info-alert").slideUp(50);
      });
    })    
</script>