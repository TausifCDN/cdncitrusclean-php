<?php include 'header.php';?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
              <h2>All Categorys</h2> 
              <div class="navbar-right">
                <a href="<?php echo admin_base_url();?>/categories/add" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;Add New</a>
              </div>         
              <div class="clearfix"></div>
            </div>
            <div class="x_content hws_table_responsive" id="ajax_data">
                <table  class="all_users table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                          <th>Category Name</th>
                          <th>Thumbnail</th>
                          <th>Banner</th>
                          <th>Banner Title</th>
                          <th style="width: 112px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($categories as $category){
                            ?>
                            <tr>
                                <td><?php echo $category->category_name;?></td>
                                <td><?php if($category->category_image!=""){?><img class="cat_image" src="<?= base_url(); ?>/uploads/category/<?php echo $category->category_image;?>"><?php } ?></td>
                                <td><?php if($category->banner_image!=""){?><img class="cat_image" src="<?= base_url(); ?>/uploads/category/<?php echo $category->banner_image;?>"><?php } ?></td>
                                <td><?php echo $category->banner_title;?></td>
                                <td>
                                <a href="<?php echo admin_base_url();?>/categories/edit?id=<?php echo $category->id;?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                                <a href="<?php echo admin_base_url();?>/categories/delete?id=<?php echo $category->id;?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash"></i></a>
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
