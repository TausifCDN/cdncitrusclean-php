<?php include 'header.php';?>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
	  <form action="<?php echo base_url();?>/Findus/createfindus" method="POST" enctype="multipart/form-data">
		
		  <!--<div class="alert alert-danger">
		
			  
		  </div>-->

		<div class="row">
		  <div class="col-sm-8">
			  <div class="x_panel">
				  <div class="x_title">
					  <h2 class="sub_title">Add Find Us</h2>
					  <ul class="nav navbar-right panel_toolbox">
						  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						  <li><a class="close-link"><i class="fa fa-close"></i></a></li>
					  </ul>
					  <div class="clearfix"></div>
				  </div>
				  <div class="x_content">
					<div class="form-group has-feedback" style="position: relative;">
					  <label for="name" class="hws_form_label">Name:<span class="text-danger small">* </span></label>
					  <input type="text" name="name" class="form-control" required>
					  <span class="hws_error text-right text-danger"></span>
					</div>
					<!--<div class="form-group has-feedback" style="position: relative;">-->
					<!--  <label for="name" class="hws_form_label">Banner Title:<span class="text-danger small">* </span></label>-->
					<!--  <input type="text" name="banner_title" class="form-control" required>-->
					<!--  <span class="hws_error text-right text-danger"></span>-->
					<!--</div>-->
					
				  </div>
			  </div>
		  </div>
		    <div class="col-sm-4">
                <div class="x_panel">
                    <div class="x_title">
                        <h2 class="sub_title">Page Image</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="form-group">
                            <label>Logo:</label>
                            <input class="form-control" id="icon1" onchange="preview(this,'#logo');" name="logo" type="file">
                        </div>
                        <div id="logo">
                        </div>
                    </div>
                </div>
			<div class="x_panel">
			  <div class="x_content text-center">
				  <button class="btn btn-primary btn-fw" type="submit"><i class="fa fa-check"></i> Update &amp; Save</button>
			  </div>
			</div>
		  </div>
		</div>
	  </form>
	</div> 
  </div>
<?php include 'footer.php';?>
