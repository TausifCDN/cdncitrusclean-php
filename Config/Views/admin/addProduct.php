<?php include 'header.php';?>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
	  <form action="<?php echo admin_base_url();?>/products/create" method="POST" enctype="multipart/form-data">
		<div class="row">
		  <div class="col-sm-8">
			  <div class="x_panel">
				  <div class="x_title">
					  <h2 class="sub_title">Add Product</h2>
					  <ul class="nav navbar-right panel_toolbox">
						  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						  <li><a class="close-link"><i class="fa fa-close"></i></a></li>
					  </ul>
					  <div class="clearfix"></div>
				  </div>
				  <div class="x_content">
				      <div class="row">
					<div class="col-sm-12 form-group has-feedback" style="position: relative;">
					  <label for="name" class="hws_form_label">Name:<span class="text-danger small">* </span></label>
					  <input type="text" name="product_name" class="form-control" required>
					  <span class="hws_error text-right text-danger"></span>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12 form-group has-feedback" style="position: relative;">
					  <label for="name" class="hws_form_label">Price:<span class="text-danger small">* </span></label>
					  <input type="number" name="was_price" class="form-control" required>
					  <span class="hws_error text-right text-danger"></span>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12 form-group has-feedback" style="position: relative;">
					  <label for="name" class="hws_form_label">Sale Price:<span class="text-danger small">* </span></label>
					  <input type="number" name="sale_price" class="form-control" required>
					  <span class="hws_error text-right text-danger"></span>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12 form-group has-feedback" style="position: relative;">
					  <label for="name" class="hws_form_label">Quantity Discount:<span class="text-danger small">* </span></label>
					  <input type="number" name="on_qty_discount" class="form-control" required value="0">
					  <span class="hws_error text-right text-danger"></span>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12 form-group has-feedback" style="position: relative;">
					  <label for="name" class="hws_form_label">Discount(%):<span class="text-danger small">* </span></label>
					  <input type="number" name="discount_percentage" class="form-control" required value="0">
					  <span class="hws_error text-right text-danger"></span>
					</div>
					<div class="col-sm-12 form-group has-feedback" style="position: relative;">
                        <label for="category_id" class="hws_form_label">Category</label>
                        <select class="form-control" id="category_id" name="category_id">
                            <?php 
                            foreach($categories as $category){
                                ?>
                                <option  value="<?php echo $category->id;?>"><?php echo $category->category_name;?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <span class="hws_error text-danger text-right"></span>                                        
                    </div>
					<div class="col-sm-12 form-group has-feedback" style="position: relative;">
					  <label for="name" class="hws_form_label">Description:<span class="text-danger small">* </span></label>
					  <textarea name="description" id="editor" class="form-control"></textarea>
					  <span class="hws_error text-right text-danger"></span>
					</div>
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
                            <label>Product Thumbnail:</label>
                            <input class="form-control" id="icon" onchange="preview(this,'#product_image');" name="product_image" type="file">
                        </div>
                        <div id="product_image">
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