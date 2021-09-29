<?php $session = service('session');?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <!--  
    Document Title
    =============================================
    -->
    <title>Admin | Login </title>
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <!-- Default stylesheets-->
    <link href="<?php echo base_url();?>/assets/admin_assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url();?>/assets/admin_assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/assets/admin_assets/css/custom.min.css" rel="stylesheet">
  </head>
    <body class="login">
        <div>
        <div class="login_wrapper">
          
        <div class="animate form login_form">
          	<section class="login_content">
	           <form id="registerForm" method="post" action="<?= base_url(); ?>/admin/signin">
	                <?php 
                        if(isset($session->login_error)){ ?>
                          <div class="alert alert-danger">
                            <strong><?php echo $session->login_error;?></strong>
                          </div>
                        <?php 
                    } ?>
					<h3 style="text-align: center;"><img src="<?php echo base_url();?>/assets/images/logo.png" class="img-fluid"></h3>
					<div class="form-group">
						<label for="email1">Email</label>
						<input class="form-control" id="email" placeholder="Enter Email" required="required" name="email" type="text" value=""> 
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input class="form-control" placeholder="Enter Password" required="required" name="password" type="password" value="">
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="position:relative;padding:0px;">
						<div class="form-group">
							<input type="submit" class="btn btn-sm btn-lg btn-primary hws_btn" value="Login" style="width: 100%;padding: 10px;font-size: 16px;">
						</div>
					</div>
				</form>
            </section>
        </div>
      </div>
    </div>
  </body>
</html>