<?php include 'header.php';?>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
	  <form action="<?php echo base_url();?>/admin/careers/update?id=<?php echo $categoryData->id;?>" method="POST" enctype="multipart/form-data">
		<div class="row">
		  <div class="col-sm-8">
			  <div class="x_panel">
				  <div class="x_title">
					  <h2 class="sub_title">Edit Careers</h2>
					  <ul class="nav navbar-right panel_toolbox">
						  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						  <li><a class="close-link"><i class="fa fa-close"></i></a></li>
					  </ul>
					  <div class="clearfix"></div>
				  </div>
				  <div class="x_content">
					<div class="form-group has-feedback" style="position: relative;">
					  <label for="name" class="hws_form_label">First Name:<span class="text-danger small">* </span></label>
					  <input type="text" name="first_name" class="form-control" required value="<?php echo $categoryData->first_name;?>">
					  <span class="hws_error text-right text-danger"></span>
					</div>
					<div class="form-group has-feedback" style="position: relative;">
					  <label for="name" class="hws_form_label">Last Name:<span class="text-danger small">* </span></label>
					  <input type="text" name="last_name" class="form-control" required value="<?php echo $categoryData->last_name;?>">
					  <span class="hws_error text-right text-danger"></span>
					</div>
					
				
					       <?php 
					       
					       $details = $categoryData->department; 
					       //$mosl= [$categoryData->department];
                            // $depars = (explode(',',$departments));
                            // print_r ($details);
                            ?>
                            
                            	<?php  
                                $worklooks	=   explode(',', $details);
                                $worklooks = array_map('trim',$worklooks);
                                // print_r ($worklooks);
                            ?>
                            
					<div class="form-group has-feedback" style="position: relative;">
					  <label for="name" class="hws_form_label">Department:<span class="text-danger small">* </span></label>
					 
					  <div>
					      
					      
					 <label class="hws_form_label">Sales</label>
					  <input type="checkbox" name="department[]" class="" value="Sales" <?php if(in_array("Sales", $worklooks)){echo 'checked';} ?> >
					  <label class="hws_form_label">Tech</label>
					  <input type="checkbox" name="department[]" class="" value="Tech" <?php if(in_array("Tech", $worklooks)){echo 'checked';} ?>>
					  <label class="hws_form_label">Marketing</label>
					  <input type="checkbox" name="department[]" class="" value="Marketing" <?php if(in_array("Marketing", $worklooks)){echo 'checked';} ?> >
					  <label class="hws_form_label">Media</label>
					  <input type="checkbox" name="department[]" class="" value="Media" <?php if(in_array("Media", $worklooks)){echo 'checked';} ?> >
					  <span class="hws_error text-right text-danger"></span>
					  </div>
					</div>
					
					<div class="form-group has-feedback" style="position: relative;">
					  <label for="name" class="hws_form_label">E-Mail:<span class="text-danger small">* </span></label>
					  <input type="text" name="email" class="form-control" required value="<?php echo $categoryData->email;?>">
					  <span class="hws_error text-right text-danger"></span>
					</div>
					<div class="form-group has-feedback" style="position: relative;">
					  <label for="name" class="hws_form_label">Phone No.:<span class="text-danger small">* </span></label>
					  <input type="text" name="phones" class="form-control" required value="<?php echo $categoryData->phone;?>">
					  <span class="hws_error text-right text-danger"></span>
					</div>
					
					<!--<div class="form-group has-feedback" style="position: relative;">-->
					<!--  <label for="name" class="hws_form_label">RECAPTCHA:<span class="text-danger small">* </span></label>-->
					<!--  <input type="text" name="recaptcha" class="form-control" required value="<?php // echo $categoryData->recaptcha;?>">-->
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
                            <label>Resume:</label>
                            <input class="form-control" id="icon" onchange="preview(this,'#resume');" name="resume" type="file">
                        </div>
                        <div id="resume">
                            <?php 
                            if($categoryData->resume!=""){?>
                                <img class="side_img" src="<?= base_url(); ?>/uploads/careers/<?php echo $categoryData->resume;?>">
                            <?php } ?>
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
