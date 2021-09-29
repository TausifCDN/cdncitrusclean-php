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
        <title>Admin</title>
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="theme-color" content="#ffffff">
        <link href="<?php echo base_url();?>/assets/images/favicon.png" type="image/x-icon" rel="icon">
        <!--  
        Stylesheets
        ============================================
        -->
        <!-- Default stylesheets-->
        <link href="<?php echo base_url();?>/assets/admin_assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="<?php echo base_url();?>/assets/admin_assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- bootstrap-progressbar -->
        <link href="<?php echo base_url();?>/assets/admin_assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
        <!-- bootstrap-daterangepicker -->
         <link href="<?php echo base_url();?>/assets/admin_assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
        <!-- bootstrap-datetimepicker -->

        <link href="<?php echo base_url();?>/assets/admin_assets/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
        <link href="<?php echo base_url();?>/assets/admin_assets/css/custom.min.css" rel="stylesheet">
        <link href="<?php echo base_url();?>/assets/admin_assets/css/view_style.css" rel="stylesheet">
        <link href="<?php echo base_url();?>/assets/admin_assets/vendors/pnotify/dist/pnotify.css" rel="stylesheet" type="text/css" />
        
         <link href="<?php echo base_url();?>/assets/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
         
         
    </head>
    <body class="nav-md">
        <div class="loader_html">
            <div class="ajax-loader">
                <div class="loading">Loading...</div>
            </div>
        </div>
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                  <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="" class="site_title"><i class="fa fa-paw"></i> Dashboard <span></span></a>
                    </div>
                    <div class="clearfix"></div>
                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="<?php echo base_url();?>/assets/images/user.png" alt="..." class="img-circle profile_img">
                            <!--<img src="<?php // echo base_url();?>/assets/images/user.png" alt="">-->
                        </div>
                        <div class="profile_info">
                            <span>Welcome</span>
                            <h2>Citrus</h2>
                        </div>
                    </div>
                   
                    <!-- /menu profile quick info -->
                    <br />
                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                           <!--  <h3>General</h3>  -->
                            
                            <ul class="nav side-menu">
                                <li><a href="<?php echo admin_base_url();?>/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li> 
                                <li><a href="<?php echo base_url();?>/home/adminhome"><i class="fa fa-home"></i> Home</a></li> 
                                <li><a href="<?php echo admin_base_url();?>/categories"><i class="fa fa-building-o"></i>Category</a></li>
                                <li><a href="<?php echo admin_base_url();?>/products"><i class="fa fa-shopping-cart"></i>Products</a></li>
                                <li><a href="<?php echo admin_base_url();?>/orders"><i class="fa fa-users"></i>Orders</a></li>
                                <li><a href="<?php echo base_url();?>/admin/careers"><i class="fa fa-users"></i>Careers</a></li>
                                <li><a href="<?php echo base_url();?>/Findus"><i class="fa fa-users"></i>Find Us</a></li>
                                <!--<li><a href="<?php echo admin_base_url();?>/Category"><i class="fa fa-gear"></i>Settings</a></li>-->
                                <li><a href="<?php echo admin_base_url();?>/users"><i class="fa fa-users"></i>Users</a></li>
                                <li><a href="<?php echo admin_base_url();?>/faqs"><i class="fa fa-users"></i>FAQs</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                      <a data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                      </a>
                      <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                      </a>
                      <a data-toggle="tooltip" data-placement="top" title="Lock">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                      </a>
                      <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?php echo admin_base_url();?>/logout">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                      </a>
                    </div>
                    <!-- /menu footer buttons -->
                  </div>
                </div>

                <!-- top navigation -->
                <div class="top_nav">
                  <div class="nav_menu">
                    <nav>
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                              <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <!--<img src="#" alt="">-->
                                <img src="<?php echo base_url();?>/assets/images/user.png" alt="">
                                <?php echo $_SESSION['admin_name'];?>
                                <span class=" fa fa-angle-down"></span>
                              </a>
                              <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <!-- <li><a href="javascript:;"> Profile</a></li>
                                <li>
                                  <a href="javascript:;">
                                    <span class="badge bg-red pull-right">50%</span>
                                    <span>Settings</span>
                                  </a>
                                </li>
                                <li><a href="javascript:;">Help</a></li> -->
                                <li><a href="<?php echo admin_base_url();?>/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                              </ul>
                            </li>
                        </ul>
                    </nav>
                  </div>
                </div>
                <!-- /top navigation -->
	            <!-- page content -->
                <div class="right_col" role="main">
                    
                