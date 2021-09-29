<?php include 'header.php';?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
              <h2>All Categorys</h2> 
              <div class="navbar-right">
                <!--<a href="<?php // echo admin_base_url();?>/categories/add" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;Add New</a>-->
              </div>         
              <div class="clearfix"></div>
            </div>
            <div class="x_content hws_table_responsive" id="ajax_data">
                <table  class="all_users table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>DEPARTMENT</th>
                          <th>E-Mail</th>
                          <th>Phone No.</th>
                          <!--<th>RECAPTCHA</th>-->
                          <th>CV</th>
                          <th style="width: 112px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($categories as $category){
                            ?>
                            <tr>
                                <td><?php echo $category->first_name;?></td>
                                <td><?php echo $category->last_name;?></td>
                                <td><?php echo $category->department;?></td>
                                <td><?php echo $category->email;?></td>
                                <td><?php echo $category->phone;?></td>
                                <!--<td><?php // echo $category->recaptcha;?></td>-->
                                <td><?php if($category->resume!=""){?>
                                
                                 <a download id="link" href="<?= base_url(); ?>/uploads/careers/<?php echo $category->resume;?>" class="btn btn-info btn-xs"  style="padding: 17px;" > <i class="fa fa-download" aria-hidden="true"></i>
                                 </a>
                                 <img class="cat_image" src="<?= base_url(); ?>/uploads/careers/<?php echo $category->resume;?>"><?php } ?> 
                               <div class="preview"></div>
                                </td>
                                
                                <td>
                                <a href="<?php echo base_url();?>/admin/careers/edit?id=<?php echo $category->id;?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                                <a href="<?php echo base_url();?>/Careers/jobs_delete?id=<?php echo $category->id;?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash"></i></a>
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
<script>
		$(document).ready(function () {
			$("#link").click(function (e) {
				e.preventDefault();
				
				window.location.href
					= "<?= base_url(); ?>/uploads/careers/<?php echo $category->resume;?>";
			});
		});
	</script>
<?php include 'footer.php';?>
