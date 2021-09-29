<?php include 'header.php';?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
              <h2>All Faqs</h2> 
              <div class="navbar-right">
                <a href="<?php echo admin_base_url();?>/faqs/add" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;Add New</a>
              </div>         
              <div class="clearfix"></div>
            </div>
            <div class="x_content hws_table_responsive" id="ajax_data">
                <table  class="all_users table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                          <th>Title</th>
                          <th>Description</th>
                          <th style="width: 112px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($faqs as $faq){
                            ?>
                            <tr>
                                <td><?php echo $faq->title;?></td>
                                <td><?php echo $faq->description;?></td>
                                <td>
                                <a href="<?php echo admin_base_url();?>/faqs/edit?id=<?php echo $faq->id;?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                                <a href="<?php echo admin_base_url();?>/faqs/delete?id=<?php echo $faq->id;?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash"></i></a>
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
