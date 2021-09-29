<?php include 'header.php';?>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
	  <form action="<?php echo admin_base_url();?>/faqs/update?id=<?php echo $faqData->id;?>" method="POST" enctype="multipart/form-data">
		<div class="row">
		  <div class="col-sm-8">
			  <div class="x_panel">
				  <div class="x_title">
					  <h2 class="sub_title">Edit Faq</h2>
					  <ul class="nav navbar-right panel_toolbox">
						  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						  <li><a class="close-link"><i class="fa fa-close"></i></a></li>
					  </ul>
					  <div class="clearfix"></div>
				  </div>
				  <div class="x_content">
					<div class="form-group has-feedback" style="position: relative;">
					  <label for="name" class="hws_form_label">Title:<span class="text-danger small">* </span></label>
					  <input type="text" name="title" class="form-control" required value="<?php echo $faqData->title;?>">
					  <span class="hws_error text-right text-danger"></span>
					</div>
					
					<div class="form-group has-feedback" style="position: relative;">
					  <label for="name" class="hws_form_label">Description:<span class="text-danger small">* </span></label>
					  <textarea name="description" id="editor" class="form-control"><?php echo $faqData->description;?></textarea>
					  <span class="hws_error text-right text-danger"></span>
					</div>
					
				  </div>
			  </div>
		  </div>
		    <div class="col-sm-4">
                
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
