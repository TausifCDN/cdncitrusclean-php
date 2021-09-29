<?php include 'header.php';?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
              <h2>All Products</h2> 
              <div class="navbar-right">
                <a href="<?php echo admin_base_url();?>/products/add" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;Add New</a>
              </div>         
              <div class="clearfix"></div>
            </div>
            <div class="x_content hws_table_responsive" id="ajax_data">
                <table  class="all_users table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                          <th>Name</th>
                          <th>Image</th>
                          <th>Price</th>
                          <th>Sale Price</th>
                          <th style="width: 112px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($products as $product){
                            ?>
                            <tr>
                                <td><?php echo $product->product_name;?></td>
                                <td><?php if($product->product_image!=""){?><img class="cat_image" src="<?= base_url(); ?>/uploads/products/<?php echo $product->product_image;?>"><?php } ?></td>
                                <td>$<?php echo $product->was_price;?></td>
                                <td>$<?php echo $product->sale_price;?></td>
                                <td>
                                <a href="<?php echo admin_base_url();?>/products/edit?id=<?php echo $product->id;?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                                <a href="<?php echo admin_base_url();?>/products/delete?id=<?php echo $product->id;?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php 
                        }
                        ?>
                        <!--<tr><td colspan="7" class="text-center">No Record Found</td></tr>-->
                  </tbody>
                </table>
            </div>  
        </div>
    </div> 
</div>
<?php include 'footer.php';?>
