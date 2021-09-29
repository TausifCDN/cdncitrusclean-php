                </div>
                <!-- /page content -->

                <!-- footer content -->
                <footer>
                    <div class="pull-right">
                        
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->
            </div>
        </div>  
        <!-- jQuery -->
        <script src="<?php echo base_url();?>/assets/admin_assets/vendors/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url();?>/assets/admin_assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>/assets/admin_assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
        <script src="<?php echo base_url();?>/assets/admin_assets/vendors/moment/min/moment.min.js"></script>
        <script src="<?php echo base_url();?>/assets/admin_assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
        <script src="<?php echo base_url();?>/assets/admin_assets/vendors/switchery/dist/switchery.min.js"></script>
       
        <!-- Custom Theme Scripts -->
        <script src="<?php echo base_url();?>/assets/admin_assets/js/custom.min.js"></script>
        <script src="<?php echo base_url();?>/assets/admin_assets/vendors/ckeditor/ckeditor.js"></script>
        <script src="<?php echo base_url();?>/assets/admin_assets/vendors/ckeditor/js/sample.js"></script>
        <script src="<?php echo base_url();?>/assets/admin_assets/vendors/pnotify/dist/pnotify.js"></script>
        <script type="text/javascript" language="javascript">
            
            $(function(){
                if($("#editor").length){
                    CKEDITOR.replace('editor',{});
                }
            });
            $(function(){
                if($("#editor2").length){
                    CKEDITOR.replace('editor2',{});
                }
            });
            $(document).ready(function(){
                $('.ui-pnotify').remove();
            });
        </script>
    </body>
</html>