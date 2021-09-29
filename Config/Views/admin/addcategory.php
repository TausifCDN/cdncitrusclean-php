<?php include 'header.php';?>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
	  <form action="<?php echo admin_base_url();?>/categories/create" method="POST" enctype="multipart/form-data">
		
		  <!--<div class="alert alert-danger">
		
			  
		  </div>-->

		<div class="row">
		  <div class="col-sm-8">
			  <div class="x_panel">
				  <div class="x_title">
					  <h2 class="sub_title">Add Category</h2>
					  <ul class="nav navbar-right panel_toolbox">
						  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						  <li><a class="close-link"><i class="fa fa-close"></i></a></li>
					  </ul>
					  <div class="clearfix"></div>
				  </div>
				  <div class="x_content">
					<div class="form-group has-feedback" style="position: relative;">
					  <label for="name" class="hws_form_label">Category Name:<span class="text-danger small">* </span></label>
					  <input type="text" name="category_name" class="form-control" required>
					  <span class="hws_error text-right text-danger"></span>
					</div>
					<div class="form-group has-feedback" style="position: relative;">
					  <label for="name" class="hws_form_label">Banner Title:<span class="text-danger small">* </span></label>
					  <input type="text" name="banner_title" class="form-control" required>
					  <span class="hws_error text-right text-danger"></span>
					</div>
					<div class="form-group has-feedback" style="position: relative;">
					  <label for="name" class="hws_form_label">Banner Desc:<span class="text-danger small">* </span></label>
					  <textarea name="banner_desc" id="editor" class="form-control"></textarea>
					  <span class="hws_error text-right text-danger"></span>
					</div>
					<div class="form-group has-feedback" style="position: relative;">
					  <label for="name" class="hws_form_label">Category Page:<span class="text-danger small">* </span></label>
					  <textarea name="page_desc" id="editor2" class="form-control"></textarea>
					  <span class="hws_error text-right text-danger"></span>
					</div>
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
                            <label>Category Thumbnail:</label>
                            <input class="form-control" id="icon" onchange="preview(this,'#category_image');" name="category_image" type="file">
                        </div>
                        <div id="category_image">
                        </div>
                        <div class="form-group">
                            <label>Category Banner:</label>
                            <input class="form-control" id="icon1" onchange="preview(this,'#banner_image');" name="banner_image" type="file">
                        </div>
                        <div id="banner_image">
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
