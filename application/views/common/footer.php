      </section>
            <!-- END CONTENT -->

            <!-- //////////////////////////////////////////////////////////////////////////// -->
            <!-- START RIGHT SIDEBAR NAV-->
            <aside id="right-sidebar-nav">
               <?php include(APPPATH.'views/common/right_navigation.php');?>
            </aside>
            <!-- LEFT RIGHT SIDEBAR NAV-->

        </div>
        <!-- END WRAPPER -->

    </div>
    <!-- END MAIN -->



    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <!-- START FOOTER -->
    <footer class="page-footer">
        <div class="footer-copyright">
            <div class="container">
                Copyright © 2017 <a class="grey-text text-lighten-4" href="#" target="_blank">RSU</a> All rights reserved.
                <span class="right"> Design and Developed by <a class="grey-text text-lighten-4" href="#">RSU</a></span>
                <input type="hidden" name="" id="hiddenField" value="<?php echo $this->session->userdata['logged_in']['role'];?>" />
            </div>
        </div>

    </footer>
    <!-- END FOOTER -->


    <!-- ================================================
    Scripts
    ================================================ -->

    <!--scrollbar-->
    <script type="text/javascript" src="<?php echo base_url();?>js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    


        <!--prism-->
    <script type="text/javascript" src="<?php echo base_url();?>js/prism.js"></script>

      <!-- data-tables -->
    <script type="text/javascript" src="<?php echo base_url();?>js/plugins/data-tables/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/plugins/data-tables/data-tables-script.js"></script>
      <!-- chartist -->
       <!-- <script type="text/javascript" src="<?php echo base_url();?>js/plugins/chartist-js/chartist.min.js"></script> -->

    <script type="text/javascript" src="<?php echo base_url();?>js/plugins/chartist-js/chartist.js"></script> 
    <script type="text/javascript" src="<?php echo base_url();?>js/plugins/chartjs/chart.min.js"></script>
    <?php if($home === 1) { ?>
    
    <script type="text/javascript" src="<?php echo base_url();?>js/plugins/chartjs/Chart.bundle.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/plugins/chartjs/Chart.bundle.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/plugins/chartjs/utils.js"></script>

    <?php } ?>



    <!-- sparkline -->
    <script type="text/javascript" src="<?php echo base_url();?>js/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/plugins/sparkline/sparkline-script.js"></script>
    
    <!-- google map api -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAZnaZBXLqNBRXjd-82km_NO7GUItyKek"></script>

    <!--jvectormap-->
    <script type="text/javascript" src="<?php echo base_url();?>js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/plugins/jvectormap/vectormap-script.js"></script>


    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="<?php echo base_url();?>js/plugins.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/custom.js"></script>


</body>

</html>